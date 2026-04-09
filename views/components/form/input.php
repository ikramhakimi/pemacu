<?php
declare(strict_types=1);

/**
 * Component: input
 * Purpose: Render one text input with size and state variants.
 * Anatomy:
 * - input.input.input--{size|state}
 * Data Contract:
 * - type, id, name, value, placeholder, size, state, class, disabled, readonly, required, attributes
 */

$type        = isset($type) ? (string) $type : 'text';
$id          = isset($id) ? (string) $id : '';
$name        = isset($name) ? (string) $name : '';
$value       = isset($value) ? (string) $value : '';
$placeholder = isset($placeholder) ? (string) $placeholder : '';
$size        = isset($size) ? (string) $size : 'md';
$state       = isset($state) ? (string) $state : 'default';
$class       = isset($class) ? trim((string) $class) : '';
$disabled    = !empty($disabled);
$readonly    = !empty($readonly);
$required    = !empty($required);
$attributes  = isset($attributes) && is_array($attributes) ? $attributes : [];

$size_map = [
  'sm' => [
    'height'  => 'h-[var(--ui-h-sm)]',
    'padding' => 'px-[var(--ui-px-sm)]',
    'text'    => 'text-xs',
  ],
  'md' => [
    'height'  => 'h-[var(--ui-h-md)]',
    'padding' => 'px-[var(--ui-px-md)]',
    'text'    => 'text-sm',
  ],
  'lg' => [
    'height'  => 'h-[var(--ui-h-lg)]',
    'padding' => 'px-[var(--ui-px-lg)]',
    'text'    => 'text-base',
  ],
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
  'disabled' => 'bg-brand-100 ring-1 ring-brand-200 ring-inset placeholder:text-brand-400 text-brand-400',
];

if (!isset($state_map[$state])) {
  $state = 'default';
}

$input_classes = trim(implode(' ', array_filter([
  'input input--' . $size,
  'w-full rounded-md text-brand-900',
  $size_map[$size]['height'],
  $size_map[$size]['padding'],
  $size_map[$size]['text'],
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

if ($readonly) {
  $input_attributes['readonly'] = true;
}

if ($required) {
  $input_attributes['required'] = true;
}
?>
<input<?= $render_attributes($input_attributes); ?>>
