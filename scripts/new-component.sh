#!/usr/bin/env bash

set -euo pipefail

if [ "$#" -ne 1 ]; then
  echo "Usage: ./scripts/new-component.sh <component-name>"
  echo "Example: ./scripts/new-component.sh card-package"
  exit 1
fi

component_name="$1"

if ! [[ "$component_name" =~ ^[a-z0-9]+(-[a-z0-9]+)*$ ]]; then
  echo "Error: component name must be kebab-case (lowercase, digits, and single hyphens)." >&2
  exit 1
fi

component_path="views/components/${component_name}.php"

if [ -e "$component_path" ]; then
  echo "Error: ${component_path} already exists." >&2
  exit 1
fi

cat > "$component_path" <<PHP
<?php

declare(strict_types=1);

\$component_title = \$title ?? 'Component title';
\$component_text  = \$text ?? 'Component description';
\$component_class = build_component_class('${component_name}', \$states ?? []);
?>
<section class="<?= e(\$component_class); ?> ${component_name} rounded-2xl border border-zinc-200 bg-white p-6 shadow-sm">
  <h3 class="${component_name}__title text-lg font-semibold text-zinc-900"><?= e(\$component_title); ?></h3>
  <p class="${component_name}__text mt-2 text-sm text-zinc-600"><?= e(\$component_text); ?></p>
</section>
PHP

echo "Created ${component_path}"
echo "Next: lint with php -l ${component_path}"
