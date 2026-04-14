<?php
declare(strict_types=1);

/**
 * Component: button
 * Purpose: Render one reusable button element as either `<button>` or `<a>`.
 * Anatomy:
 * - .btn.btn--{tone}.btn--{size}
 * - Optional: .btn--gradient, .btn--icon-only
 * - Optional children: svg.button__icon.opacity-75, .button__label
 * Data Contract:
 * - label, href, type, variant, size, class, id, name, target, rel, aria_label
 * - icon_name, icon_size, icon_class, icon_only, icon_position, disabled, gradient, attributes
 */

$label         = isset($label) ? (string) $label : 'Button';
$type          = isset($type) ? (string) $type : 'button';
$href          = isset($href) ? (string) $href : '';
$variant       = isset($variant) ? (string) $variant : 'neutral';
$size          = isset($size) ? (string) $size : 'md';
$class         = isset($class) ? trim((string) $class) : '';
$id            = isset($id) ? (string) $id : '';
$name          = isset($name) ? (string) $name : '';
$target        = isset($target) ? (string) $target : '';
$rel           = isset($rel) ? (string) $rel : '';
$aria_label    = isset($aria_label) ? (string) $aria_label : '';
$icon_name     = isset($icon_name) ? (string) $icon_name : '';
$icon_class    = isset($icon_class) ? trim((string) $icon_class) : '';
$icon_only     = !empty($icon_only);
$icon_position = isset($icon_position) ? (string) $icon_position : 'left';
$disabled      = !empty($disabled);
$gradient      = !empty($gradient);
$attributes    = isset($attributes) && is_array($attributes) ? $attributes : [];

$variant_map = [
  'neutral'   => 'default',
  'default'   => 'default',
  'primary'   => 'primary',
  'secondary' => 'secondary',
  'positive'  => 'positive',
  'danger'    => 'negative',
  'negative'  => 'negative',
];

$size_map = [
  'default' => 'md',
  'sm'      => 'sm',
  'md'      => 'md',
  'lg'      => 'lg',
];

$resolved_tone = isset($variant_map[$variant]) ? $variant_map[$variant] : 'default';
$resolved_size = isset($size_map[$size]) ? $size_map[$size] : 'md';

$icon_size_map = [
  'sm' => 16,
  'md' => 20,
  'lg' => 24,
];
$icon_size = isset($icon_size) ? (int) $icon_size : $icon_size_map[$resolved_size];

$icon_alias_map = [
  'plus'          => 'add-line',
  'close'         => 'close-line',
  'x'             => 'close-line',
  'chevron-right' => 'arrow-right-s-line',
  'chevron-left'  => 'arrow-left-s-line',
];
$resolved_icon_name = trim($icon_name);
if ($resolved_icon_name !== '' && isset($icon_alias_map[$resolved_icon_name])) {
  $resolved_icon_name = $icon_alias_map[$resolved_icon_name];
}

if ($icon_position !== 'right') {
  $icon_position = 'left';
}

$has_icon = $resolved_icon_name !== '';
$is_link  = $href !== '';

$tone_modifier      = 'btn--' . $resolved_tone;
$size_modifier      = 'btn--' . $resolved_size;
$gradient_modifier  = $gradient ? 'btn--gradient' : '';
$icon_only_modifier = $icon_only ? 'btn--icon-only' : '';

$core_classes = button_class([
  'tone'      => $resolved_tone,
  'size'      => $resolved_size,
  'gradient'  => $gradient,
  'disabled'  => $disabled,
  'icon_only' => $icon_only,
  'extra'     => !$icon_only && $has_icon ? 'gap-2' : '',
]);

$class_name = trim(implode(' ', array_filter([
  'btn',
  $tone_modifier,
  $size_modifier,
  $gradient_modifier,
  $icon_only_modifier,
  $core_classes,
  $class,
])));

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value)) {
      if ($value) {
        $compiled[] = $key;
      }

      continue;
    }

    if ($value === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$render_icon = static function () use ($has_icon, $resolved_icon_name, $icon_size, $icon_class): string {
  if (!$has_icon) {
    return '';
  }

  $resolved_icon_class = trim(implode(' ', array_filter([
    'button__icon',
    'opacity-75',
    $icon_class,
  ])));

  ob_start();
  icon($resolved_icon_name, [
    'icon_size'  => (string) $icon_size,
    'icon_class' => $resolved_icon_class,
  ]);
  return (string) ob_get_clean();
};

$button_content = '';

if ($icon_only) {
  $button_content = $render_icon();
} elseif ($has_icon && $icon_position === 'right') {
  $button_content = '<span class="button__label">' . e($label) . '</span>' . $render_icon();
} elseif ($has_icon) {
  $button_content = $render_icon() . '<span class="button__label">' . e($label) . '</span>';
} else {
  $button_content = '<span class="button__label">' . e($label) . '</span>';
}

if ($is_link) {
  $link_attributes          = $attributes;
  $link_attributes['href']  = $disabled ? '#' : $href;
  $link_attributes['class'] = $class_name;

  if ($id !== '') {
    $link_attributes['id'] = $id;
  }

  if ($target !== '') {
    $link_attributes['target'] = $target;
  }

  if ($rel !== '') {
    $link_attributes['rel'] = $rel;
  } elseif ($target === '_blank') {
    $link_attributes['rel'] = 'noopener noreferrer';
  }

  if ($disabled) {
    $link_attributes['aria-disabled'] = 'true';
    $link_attributes['tabindex']      = '-1';
  }

  if ($icon_only) {
    $link_attributes['aria-label'] = $aria_label !== '' ? $aria_label : $label;
  } elseif ($aria_label !== '') {
    $link_attributes['aria-label'] = $aria_label;
  }
  ?>
  <a<?= $render_attributes($link_attributes); ?>><?= $button_content; ?></a>
  <?php
  return;
}

$button_attributes          = $attributes;
$button_attributes['type']  = $type;
$button_attributes['class'] = $class_name;

if ($id !== '') {
  $button_attributes['id'] = $id;
}

if ($name !== '') {
  $button_attributes['name'] = $name;
}

if ($disabled) {
  $button_attributes['disabled'] = true;
}

if ($icon_only) {
  $button_attributes['aria-label'] = $aria_label !== '' ? $aria_label : $label;
} elseif ($aria_label !== '') {
  $button_attributes['aria-label'] = $aria_label;
}
?>
<button<?= $render_attributes($button_attributes); ?>><?= $button_content; ?></button>
