<?php
declare(strict_types=1);

/**
 * Component: input-group
 * Purpose: Render one input field with inline icon at left or right position.
 * Anatomy:
 * - .input-group.relative
 *   - .input-group__icon
 *   - .input-group__input
 * Data Contract:
 * - type, id, name, value, placeholder, size, state, icon_name, icon_size, icon_position, class, disabled, attributes
 */

$type          = isset($type) ? (string) $type : 'text';
$id            = isset($id) ? (string) $id : '';
$name          = isset($name) ? (string) $name : '';
$value         = isset($value) ? (string) $value : '';
$placeholder   = isset($placeholder) ? (string) $placeholder : '';
$size          = isset($size) ? (string) $size : 'md';
$state         = isset($state) ? (string) $state : 'default';
$icon_name     = isset($icon_name) ? (string) $icon_name : 'search-line';
$icon_size     = isset($icon_size) ? (string) $icon_size : '';
$icon_position = isset($icon_position) ? (string) $icon_position : 'left';
$class         = isset($class) ? trim((string) $class) : '';
$disabled      = !empty($disabled);
$attributes    = isset($attributes) && is_array($attributes) ? $attributes : [];

$size_map = [
  'sm' => [
    'height'      => 'h-[var(--ui-h-sm)]',
    'text'        => 'text-xs',
    'padding'     => 'px-[var(--ui-px-sm)]',
    'icon_size'   => '16',
    'left_offset' => 'pl-9',
    'right_offset'=> 'pr-9',
  ],
  'md' => [
    'height'      => 'h-[var(--ui-h-md)]',
    'text'        => 'text-sm',
    'padding'     => 'px-[var(--ui-px-md)]',
    'icon_size'   => '20',
    'left_offset' => 'pl-11',
    'right_offset'=> 'pr-11',
  ],
  'lg' => [
    'height'      => 'h-[var(--ui-h-lg)]',
    'text'        => 'text-base',
    'padding'     => 'px-[var(--ui-px-lg)]',
    'icon_size'   => '24',
    'left_offset' => 'pl-12',
    'right_offset'=> 'pr-12',
  ],
];

if (!isset($size_map[$size])) {
  $size = 'md';
}

if ($icon_position !== 'right') {
  $icon_position = 'left';
}

if ($icon_size !== '' && !in_array($icon_size, ['12', '16', '20', '24', '32', '40'], true)) {
  $icon_size = '';
}

if ($disabled) {
  $state = 'disabled';
}

$state_map = [
  'default'  => 'bg-white ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500',
  'positive' => 'bg-white ring-1 ring-positive-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-positive-500',
  'negative' => 'bg-white ring-1 ring-negative-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-negative-500',
  'disabled' => 'bg-brand-100 ring-1 ring-brand-200 ring-inset placeholder:text-brand-400 text-brand-400',
];

if (!isset($state_map[$state])) {
  $state = 'default';
}

$position_padding = $icon_position === 'right'
  ? $size_map[$size]['right_offset'] . ' ' . $size_map[$size]['padding']
  : $size_map[$size]['left_offset'] . ' ' . $size_map[$size]['padding'];

$input_classes = trim(implode(' ', array_filter([
  'input-group__input w-full rounded-md text-brand-900',
  $size_map[$size]['height'],
  $size_map[$size]['text'],
  $position_padding,
  $state_map[$state],
  $class,
])));

$icon_classes = $icon_position === 'right'
  ? 'input-group__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-brand-500'
  : 'input-group__icon pointer-events-none absolute inset-y-0 left-3 inline-flex items-center text-brand-500';

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value_attr) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value_attr)) {
      if ($value_attr) {
        $compiled[] = $key;
      }
      continue;
    }

    if ($value_attr === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value_attr) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$input_attributes              = $attributes;
$input_attributes['type']      = $type;
$input_attributes['class']     = $input_classes;

if ($id !== '') {
  $input_attributes['id'] = $id;
}

if ($name !== '') {
  $input_attributes['name'] = $name;
}

if ($value !== '') {
  $input_attributes['value'] = $value;
}

if ($placeholder !== '') {
  $input_attributes['placeholder'] = $placeholder;
}

if ($disabled) {
  $input_attributes['disabled'] = true;
}
?>
<div class="input-group relative">
  <span class="<?= e($icon_classes); ?>">
    <?php icon($icon_name, ['icon_size' => $icon_size !== '' ? $icon_size : $size_map[$size]['icon_size']]); ?>
  </span>
  <input<?= $render_attributes($input_attributes); ?>>
</div>
