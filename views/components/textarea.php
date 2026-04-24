<?php
declare(strict_types=1);

/**
 * Component: textarea
 * Purpose: Render one API-driven multiline input with size and state variants.
 * Anatomy:
 * - textarea.textarea.textarea--{size}
 * Data Contract:
 * - `id` (string, optional): textarea id.
 * - `name` (string, optional): textarea name.
 * - `rows` (int, optional): visible row count. Minimum: 2. Default: 2.
 * - `value` (string, optional): textarea value.
 * - `placeholder` (string, optional): placeholder text.
 * - `size` (string, optional): `sm`, `md`, `lg`. Default: `md`.
 * - `state` (string, optional): `default`, `positive`, `negative`, `disabled`. Default: `default`.
 * - `class` (string, optional): additional classes.
 * - `disabled` (bool, optional): disabled state.
 * - `readonly` (bool, optional): readonly state.
 * - `required` (bool, optional): required state.
 * - `attributes` (array, optional): additional textarea attributes.
 */

$resolved_id          = isset($id) ? (string) $id : '';
$resolved_name        = isset($name) ? (string) $name : '';
$resolved_rows        = isset($rows) ? (int) $rows : 2;
$resolved_value       = isset($value) ? (string) $value : '';
$resolved_placeholder = isset($placeholder) ? (string) $placeholder : '';
$resolved_size        = isset($size) ? (string) $size : 'md';
$resolved_state       = isset($state) ? (string) $state : 'default';
$resolved_class       = isset($class) ? trim((string) $class) : '';
$resolved_disabled    = !empty($disabled);
$resolved_readonly    = !empty($readonly);
$resolved_required    = !empty($required);
$resolved_attributes  = isset($attributes) && is_array($attributes) ? $attributes : [];

if ($resolved_rows < 2) {
  $resolved_rows = 2;
}

$size_map = [
  'sm' => 'px-[var(--ui-px-sm)] py-[var(--ui-py-sm)] text-xs',
  'md' => 'px-[var(--ui-px-md)] py-[var(--ui-py-md)] ',
  'lg' => 'px-[var(--ui-px-lg)] py-[var(--ui-py-lg)] text-base',
];

if (!isset($size_map[$resolved_size])) {
  $resolved_size = 'md';
}

if ($resolved_disabled) {
  $resolved_state = 'disabled';
}

$state_map = [
  'default'  => 'block bg-white ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500',
  'positive' => 'block bg-white ring-1 ring-positive-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-positive-500',
  'negative' => 'block bg-white ring-1 ring-negative-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-negative-500',
  'disabled' => 'block bg-brand-100 text-brand-400 ring-1 ring-brand-200 ring-inset placeholder:text-brand-400',
];

if (!isset($state_map[$resolved_state])) {
  $resolved_state = 'default';
}

$textarea_classes = trim(implode(' ', array_filter([
  'textarea textarea--' . $resolved_size,
  'w-full rounded-md text-brand-900',
  $size_map[$resolved_size],
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

$textarea_attributes            = $resolved_attributes;
$textarea_attributes['rows']    = $resolved_rows;
$textarea_attributes['class']   = $textarea_classes;

if ($resolved_id !== '') {
  $textarea_attributes['id'] = $resolved_id;
}

if ($resolved_name !== '') {
  $textarea_attributes['name'] = $resolved_name;
}

if ($resolved_placeholder !== '') {
  $textarea_attributes['placeholder'] = $resolved_placeholder;
}

if ($resolved_disabled) {
  $textarea_attributes['disabled'] = true;
}

if ($resolved_readonly) {
  $textarea_attributes['readonly'] = true;
}

if ($resolved_required) {
  $textarea_attributes['required'] = true;
}
?>
<textarea<?= $render_attributes($textarea_attributes); ?>><?= e($resolved_value); ?></textarea>
