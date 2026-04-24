<?php
declare(strict_types=1);

/**
 * Component: input-group
 * Purpose: Render one API-driven input with an inline icon at the start or end.
 * Anatomy:
 * - .input-group.relative
 *   - .input-group__icon
 *   - .input-group__input
 * Data Contract:
 * - `type` (string, optional): input type. Default: `text`.
 * - `id` (string, optional): input id.
 * - `name` (string, optional): input name.
 * - `value` (string, optional): input value.
 * - `placeholder` (string, optional): placeholder text.
 * - `size` (string, optional): `sm`, `md`, `lg`. Default: `md`.
 * - `state` (string, optional): `default`, `positive`, `negative`, `disabled`. Default: `default`.
 * - `icon_name` (string, optional): icon name. Default: `search-line`.
 * - `icon_size` (string|int, optional): icon size.
 * - `icon_position` (string, optional): `left` or `right`. Default: `left`.
 * - `class` (string, optional): additional input classes.
 * - `disabled` (bool, optional): disabled state.
 * - `attributes` (array, optional): additional input attributes.
 */

$resolved_type          = isset($type) ? (string) $type : 'text';
$resolved_id            = isset($id) ? (string) $id : '';
$resolved_name          = isset($name) ? (string) $name : '';
$resolved_value         = isset($value) ? (string) $value : '';
$resolved_placeholder   = isset($placeholder) ? (string) $placeholder : '';
$resolved_size          = isset($size) ? (string) $size : 'md';
$resolved_state         = isset($state) ? (string) $state : 'default';
$resolved_icon_name     = isset($icon_name) ? (string) $icon_name : 'search-line';
$resolved_icon_size     = isset($icon_size) ? (string) $icon_size : '';
$resolved_icon_position = isset($icon_position) ? (string) $icon_position : 'left';
$resolved_class         = isset($class) ? trim((string) $class) : '';
$resolved_disabled      = !empty($disabled);
$resolved_attributes    = isset($attributes) && is_array($attributes) ? $attributes : [];

$size_map = [
  'sm' => [
    'height'       => 'h-[var(--ui-h-sm)]',
    'text'         => 'text-xs',
    'padding'      => 'px-[var(--ui-px-sm)]',
    'icon_size'    => '16',
    'left_offset'  => 'pl-9',
    'right_offset' => 'pr-9',
  ],
  'md' => [
    'height'       => 'h-[var(--ui-h-md)]',
    'text'         => '',
    'padding'      => 'px-[var(--ui-px-md)]',
    'icon_size'    => '20',
    'left_offset'  => 'pl-11',
    'right_offset' => 'pr-11',
  ],
  'lg' => [
    'height'       => 'h-[var(--ui-h-lg)]',
    'text'         => 'text-base',
    'padding'      => 'px-[var(--ui-px-lg)]',
    'icon_size'    => '24',
    'left_offset'  => 'pl-12',
    'right_offset' => 'pr-12',
  ],
];

if (!isset($size_map[$resolved_size])) {
  $resolved_size = 'md';
}

if ($resolved_icon_position !== 'right') {
  $resolved_icon_position = 'left';
}

if ($resolved_icon_size !== '' && !in_array($resolved_icon_size, ['12', '16', '20', '24', '32', '40'], true)) {
  $resolved_icon_size = '';
}

if ($resolved_disabled) {
  $resolved_state = 'disabled';
}

$state_map = [
  'default'  => 'bg-white ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500',
  'positive' => 'bg-white ring-1 ring-positive-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-positive-500',
  'negative' => 'bg-white ring-1 ring-negative-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-negative-500',
  'disabled' => 'bg-brand-100 ring-1 ring-brand-200 ring-inset placeholder:text-brand-400 text-brand-400',
];

if (!isset($state_map[$resolved_state])) {
  $resolved_state = 'default';
}

$position_padding = $resolved_icon_position === 'right'
  ? $size_map[$resolved_size]['right_offset'] . ' ' . $size_map[$resolved_size]['padding']
  : $size_map[$resolved_size]['left_offset'] . ' ' . $size_map[$resolved_size]['padding'];

$input_classes = trim(implode(' ', array_filter([
  'input-group__input w-full rounded-md text-brand-900',
  $size_map[$resolved_size]['height'],
  $size_map[$resolved_size]['text'],
  $position_padding,
  $state_map[$resolved_state],
  $resolved_class,
])));

$icon_classes = $resolved_icon_position === 'right'
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

$input_attributes            = $resolved_attributes;
$input_attributes['type']    = $resolved_type;
$input_attributes['class']   = $input_classes;

if ($resolved_id !== '') {
  $input_attributes['id'] = $resolved_id;
}

if ($resolved_name !== '') {
  $input_attributes['name'] = $resolved_name;
}

if ($resolved_value !== '') {
  $input_attributes['value'] = $resolved_value;
}

if ($resolved_placeholder !== '') {
  $input_attributes['placeholder'] = $resolved_placeholder;
}

if ($resolved_disabled) {
  $input_attributes['disabled'] = true;
}
?>
<div class="input-group relative">
  <span class="<?= e($icon_classes); ?>">
    <?php icon($resolved_icon_name, [
      'icon_size' => $resolved_icon_size !== '' ? $resolved_icon_size : $size_map[$resolved_size]['icon_size'],
    ]); ?>
  </span>
  <input<?= $render_attributes($input_attributes); ?>>
</div>
