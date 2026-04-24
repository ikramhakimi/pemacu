<?php
declare(strict_types=1);

/**
 * Component: input
 * Purpose: Render one API-driven text input with size and state variants.
 * Anatomy:
 * - input.input.input--{size}
 * Data Contract:
 * - `type` (string, optional): input type. Default: `text`.
 * - `id` (string, optional): input id.
 * - `name` (string, optional): input name.
 * - `value` (string, optional): input value.
 * - `placeholder` (string, optional): placeholder text.
 * - `size` (string, optional): `sm`, `md`, `lg`. Default: `md`.
 * - `state` (string, optional): `default`, `positive`, `negative`, `disabled`. Default: `default`.
 * - `class` (string, optional): additional classes.
 * - `disabled` (bool, optional): disabled state.
 * - `readonly` (bool, optional): readonly state.
 * - `required` (bool, optional): required state.
 * - `attributes` (array, optional): additional input attributes.
 */

$resolved_type        = isset($type) ? (string) $type : 'text';
$resolved_id          = isset($id) ? (string) $id : '';
$resolved_name        = isset($name) ? (string) $name : '';
$resolved_value       = isset($value) ? (string) $value : '';
$resolved_placeholder = isset($placeholder) ? (string) $placeholder : '';
$resolved_size        = isset($size) ? (string) $size : 'md';
$resolved_state       = isset($state) ? (string) $state : 'default';
$resolved_class       = isset($class) ? trim((string) $class) : '';
$resolved_disabled    = !empty($disabled);
$resolved_readonly    = !empty($readonly);
$resolved_required    = !empty($required);
$resolved_attributes  = isset($attributes) && is_array($attributes) ? $attributes : [];

$size_map = [
  'sm' => [
    'height'  => 'h-[var(--ui-h-sm)]',
    'padding' => 'px-[var(--ui-px-sm)]',
    'text'    => 'text-xs',
  ],
  'md' => [
    'height'  => 'h-[var(--ui-h-md)]',
    'padding' => 'px-[var(--ui-px-md)]',
    'text'    => '',
  ],
  'lg' => [
    'height'  => 'h-[var(--ui-h-lg)]',
    'padding' => 'px-[var(--ui-px-lg)]',
    'text'    => 'text-base',
  ],
];

if (!isset($size_map[$resolved_size])) {
  $resolved_size = 'md';
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

$input_classes = trim(implode(' ', array_filter([
  'input input--' . $resolved_size,
  'w-full rounded-md text-brand-900',
  $size_map[$resolved_size]['height'],
  $size_map[$resolved_size]['padding'],
  $size_map[$resolved_size]['text'],
  $state_map[$resolved_state],
  $resolved_class,
])));

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

if ($resolved_readonly) {
  $input_attributes['readonly'] = true;
}

if ($resolved_required) {
  $input_attributes['required'] = true;
}
?>
<input<?= $render_attributes($input_attributes); ?>>
