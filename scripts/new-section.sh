#!/usr/bin/env bash

set -euo pipefail

usage() {
  echo "Usage:"
  echo "  ./scripts/new-section.sh <section-name> [--inject <page-path>]"
  echo ""
  echo "Examples:"
  echo "  ./scripts/new-section.sh home-packages"
  echo "  ./scripts/new-section.sh home-packages --inject views/pages/home.php"
}

section_name=""
inject_path=""

while [ "$#" -gt 0 ]; do
  case "$1" in
    --inject)
      if [ "$#" -lt 2 ]; then
        echo "Error: --inject requires a page path." >&2
        usage
        exit 1
      fi
      inject_path="$2"
      shift 2
      ;;
    --inject=*)
      inject_path="${1#*=}"
      shift
      ;;
    -h|--help)
      usage
      exit 0
      ;;
    -*)
      echo "Error: unknown option '$1'." >&2
      usage
      exit 1
      ;;
    *)
      if [ -n "$section_name" ]; then
        echo "Error: section name already provided ('${section_name}')." >&2
        usage
        exit 1
      fi
      section_name="$1"
      shift
      ;;
  esac
done

if [ -z "$section_name" ]; then
  echo "Error: section name is required." >&2
  usage
  exit 1
fi

if ! [[ "$section_name" =~ ^[a-z0-9]+(-[a-z0-9]+)*$ ]]; then
  echo "Error: section name must be kebab-case (lowercase, digits, and single hyphens)." >&2
  exit 1
fi

if [ -n "$inject_path" ] && [ ! -f "$inject_path" ]; then
  echo "Error: inject target not found: ${inject_path}" >&2
  exit 1
fi

mkdir -p views/sections

section_path="views/sections/${section_name}.php"

if [ -e "$section_path" ]; then
  echo "Error: ${section_path} already exists." >&2
  exit 1
fi

cat > "$section_path" <<PHP
<?php

declare(strict_types=1);

\$section_class       = isset(\$section_class) ? (string) \$section_class : build_component_class('${section_name}', \$states ?? []);
\$section_class_name  = isset(\$class_name) ? trim((string) \$class_name) : '';
\$section_title       = \$title ?? 'Section title';
\$section_lead        = \$lead ?? 'Section lead';
\$section_class_names = trim(
  implode(
    ' ',
    array_filter([
      \$section_class,
      '${section_name}',
      'py-12',
      \$section_class_name,
    ]),
  ),
);
?>
<section class="<?= e(\$section_class_names); ?>">
  <div class="${section_name}__inner mx-auto max-w-6xl px-4">
    <h2 class="${section_name}__title text-2xl font-semibold text-zinc-900"><?= e(\$section_title); ?></h2>
    <p class="${section_name}__lead mt-2 max-w-2xl text-base text-zinc-600"><?= e(\$section_lead); ?></p>
  </div>
</section>
PHP

echo "Created ${section_path}"
echo "Next: lint with php -l ${section_path}"

if [ -n "$inject_path" ]; then
  snippet="<?php section('${section_name}'); ?>"

  if rg -F "$snippet" "$inject_path" >/dev/null 2>&1; then
    echo "Skip inject: snippet already exists in ${inject_path}"
    exit 0
  fi

  tmp_file="$(mktemp)"

  if ! awk -v snippet="$snippet" '
    BEGIN { inserted = 0 }
    {
      if (inserted == 0 && index($0, "layout('\''layout-end'\''") > 0) {
        print snippet
        inserted = 1
      }
      print
    }
    END {
      if (inserted == 0) {
        exit 7
      }
    }
  ' "$inject_path" > "$tmp_file"; then
    rm -f "$tmp_file"
    echo "Error: could not find layout('layout-end') anchor in ${inject_path}" >&2
    exit 1
  fi

  mv "$tmp_file" "$inject_path"
  echo "Injected section call into ${inject_path}"
fi
