<?php
declare(strict_types=1);

/**
 * Component: textarea
 * Purpose: Render one multiline text input with size and state variants.
 * Anatomy:
 * - textarea.textarea.textarea--{size|state}
 * Data Contract:
 * - id, name, rows, value, placeholder, size, state, class, disabled, readonly, required, attributes
 */

$id          = isset($id) ? (string) $id : '';
$name        = isset($name) ? (string) $name : '';
$rows        = isset($rows) ? (int) $rows : 2;
$value       = isset($value) ? (string) $value : '';
$placeholder = isset($placeholder) ? (string) $placeholder : '';
$size        = isset($size) ? (string) $size : 'md';
$state       = isset($state) ? (string) $state : 'default';
$class       = isset($class) ? trim((string) $class) : '';
$disabled    = !empty($disabled);
$readonly    = !empty($readonly);
$required    = !empty($required);
$attributes  = isset($attributes) && is_array($attributes) ? $attributes : [];

if ($rows < 2) {
  $rows = 2;
}

$size_map = [
  'sm' => 'px-[var(--ui-px-sm)] py-[var(--ui-py-sm)] text-xs',
  'md' => 'px-[var(--ui-px-md)] py-[var(--ui-py-md)] text-sm',
  'lg' => 'px-[var(--ui-px-lg)] py-[var(--ui-py-lg)] text-base',
];

if (!isset($size_map[$size])) {
  $size = 'md';
}

if ($disabled) {
  $state = 'disabled';
}

$state_map = [
  'default'  => 'bg-white ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500',
  'positive' => 'bg-white ring-1 ring-positive-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-positive-500',
  'negative' => 'bg-white ring-1 ring-negative-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-negative-500',
  'disabled' => 'bg-brand-100 text-brand-400 ring-1 ring-brand-200 ring-inset placeholder:text-brand-400',
];

if (!isset($state_map[$state])) {
  $state = 'default';
}

$textarea_classes = trim(implode(' ', array_filter([
  'textarea textarea--' . $size,
  'w-full rounded-md text-brand-900',
  $size_map[$size],
  $state_map[$state],
  $class,
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

$textarea_attributes             = $attributes;
$textarea_attributes['rows']     = $rows;
$textarea_attributes['class']    = $textarea_classes;

if ($id !== '') {
  $textarea_attributes['id'] = $id;
}

if ($name !== '') {
  $textarea_attributes['name'] = $name;
}

if ($placeholder !== '') {
  $textarea_attributes['placeholder'] = $placeholder;
}

if ($disabled) {
  $textarea_attributes['disabled'] = true;
}

if ($readonly) {
  $textarea_attributes['readonly'] = true;
}

if ($required) {
  $textarea_attributes['required'] = true;
}
?>
<textarea<?= $render_attributes($textarea_attributes); ?>><?= e($value); ?></textarea>
