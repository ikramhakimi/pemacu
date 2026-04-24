<?php
declare(strict_types=1);

/**
 * Component: button
 * Purpose: Render one reusable button element as `<button>` or `<a>` using an API-driven prop model.
 * Anatomy:
 * - .btn.btn--{tone}.btn--{size}
 * - .btn--gradient
 * - Optional: .btn--icon-only
 * - Optional children: svg.button__icon.opacity-75, .button__label
 * Data Contract:
 * - Flat props: label, href, type, variant, size, class, id, name, target, rel, aria_label
 * - Flat props: icon_name, icon_size, icon_class, icon_only, icon_position, disabled, attributes
 * - Structured API:
 *   - icon: [name, size, class, only, position]
 *   - state: [disabled]
 *   - link: [href, target, rel]
 * - loading_center: bool (center loading icon with transparent label text)
 */

$props      = isset($component_props) && is_array($component_props) ? $component_props : [];
$icon_props = isset($props['icon']) && is_array($props['icon']) ? $props['icon'] : [];
$state_props = isset($props['state']) && is_array($props['state']) ? $props['state'] : [];
$link_props = isset($props['link']) && is_array($props['link']) ? $props['link'] : [];

$label      = isset($props['label']) ? (string) $props['label'] : 'Button';
$type       = isset($props['type']) ? (string) $props['type'] : 'button';
$variant    = isset($props['variant']) ? (string) $props['variant'] : 'neutral';
$size       = isset($props['size']) ? (string) $props['size'] : 'md';
$class      = isset($props['class']) ? trim((string) $props['class']) : '';
$id         = isset($props['id']) ? (string) $props['id'] : '';
$name       = isset($props['name']) ? (string) $props['name'] : '';
$aria_label = isset($props['aria_label']) ? (string) $props['aria_label'] : '';

$href = '';
if (isset($link_props['href'])) {
  $href = (string) $link_props['href'];
} elseif (isset($props['href'])) {
  $href = (string) $props['href'];
}

$target = '';
if (isset($link_props['target'])) {
  $target = (string) $link_props['target'];
} elseif (isset($props['target'])) {
  $target = (string) $props['target'];
}

$rel = '';
if (isset($link_props['rel'])) {
  $rel = (string) $link_props['rel'];
} elseif (isset($props['rel'])) {
  $rel = (string) $props['rel'];
}

$icon_name = '';
if (isset($icon_props['name'])) {
  $icon_name = (string) $icon_props['name'];
} elseif (isset($props['icon_name'])) {
  $icon_name = (string) $props['icon_name'];
}

$icon_size = null;
if (isset($icon_props['size'])) {
  $icon_size = (int) $icon_props['size'];
} elseif (isset($props['icon_size'])) {
  $icon_size = (int) $props['icon_size'];
}

$icon_class = '';
if (isset($icon_props['class'])) {
  $icon_class = trim((string) $icon_props['class']);
} elseif (isset($props['icon_class'])) {
  $icon_class = trim((string) $props['icon_class']);
}

$icon_only = false;
if (isset($icon_props['only'])) {
  $icon_only = (bool) $icon_props['only'];
} elseif (isset($props['icon_only'])) {
  $icon_only = !empty($props['icon_only']);
}

$icon_position = 'left';
if (isset($icon_props['position'])) {
  $icon_position = (string) $icon_props['position'];
} elseif (isset($props['icon_position'])) {
  $icon_position = (string) $props['icon_position'];
}

$disabled = false;
if (isset($state_props['disabled'])) {
  $disabled = (bool) $state_props['disabled'];
} elseif (isset($props['disabled'])) {
  $disabled = !empty($props['disabled']);
}

$loading_center = isset($props['loading_center']) ? (bool) $props['loading_center'] : false;

$attributes = isset($props['attributes']) && is_array($props['attributes']) ? $props['attributes'] : [];

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
  'xl'      => 'xl',
];

$resolved_tone = isset($variant_map[$variant]) ? $variant_map[$variant] : 'default';
$resolved_size = isset($size_map[$size]) ? $size_map[$size] : 'md';

$icon_size_map = [
  'sm' => 16,
  'md' => 16,
  'lg' => 20,
  'xl' => 20,
];
$resolved_icon_size = $icon_size === null ? $icon_size_map[$resolved_size] : $icon_size;

$resolved_icon_name = trim($icon_name);

if ($icon_position !== 'right') {
  $icon_position = 'left';
}

$has_icon = $resolved_icon_name !== '';
$is_link  = $href !== '';

$tone_modifier      = 'btn--' . $resolved_tone;
$size_modifier      = 'btn--' . $resolved_size;
$gradient_modifier  = 'btn--gradient';
$icon_only_modifier = $icon_only ? 'btn--icon-only' : '';

$core_classes = button_class([
  'tone'      => $resolved_tone,
  'size'      => $resolved_size,
  'disabled'  => $disabled,
  'icon_only' => $icon_only,
  'extra'     => !$icon_only && $has_icon && !$loading_center ? 'gap-2' : '',
]);

$class_name = trim(implode(' ', array_filter([
  'btn',
  $tone_modifier,
  $size_modifier,
  $gradient_modifier,
  $icon_only_modifier,
  $loading_center ? 'relative' : '',
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

$render_icon = static function () use (
  $has_icon,
  $resolved_icon_name,
  $resolved_icon_size,
  $resolved_size,
  $icon_class,
  $icon_only,
  $icon_position,
  $loading_center
): string {
  if (!$has_icon) {
    return '';
  }

  $icon_spacing_class = '';

  if (!$icon_only && !$loading_center) {
    $icon_spacing_class_by_size = [
      'sm' => [
        'left'  => '-ml-1',
        'right' => '-mr-1',
      ],
      'md' => [
        'left'  => '-ml-1',
        'right' => '-mr-1',
      ],
      'lg' => [
        'left'  => '-ml-2',
        'right' => '-mr-2',
      ],
      'xl' => [
        'left'  => '-ml-2',
        'right' => '-mr-2',
      ],
    ];
    $size_spacing = isset($icon_spacing_class_by_size[$resolved_size]) ? $icon_spacing_class_by_size[$resolved_size] : $icon_spacing_class_by_size['md'];
    $icon_spacing_class = $icon_position === 'right' ? $size_spacing['right'] : $size_spacing['left'];
  }

  $resolved_icon_class = trim(implode(' ', array_filter([
    'button__icon',
    'opacity-75',
    $icon_spacing_class,
    $icon_class,
  ])));

  ob_start();
  icon($resolved_icon_name, [
    'icon_size'  => (string) $resolved_icon_size,
    'icon_class' => $resolved_icon_class,
  ]);
  $icon_markup = (string) ob_get_clean();

  if ($loading_center) {
    return '<span class="pointer-events-none absolute inset-0 flex items-center justify-center leading-none">'
      . '<span class="flex animate-spin leading-none">' . $icon_markup . '</span>'
      . '</span>';
  }

  return $icon_markup;
};

$button_content = '';

if ($icon_only) {
  $button_content = $render_icon();
} elseif ($loading_center && $has_icon) {
  $button_content = '<span class="button__label opacity-0">' . e($label) . '</span>' . $render_icon();
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
