<?php
declare(strict_types=1);

/**
 * Component: otp-input
 * Purpose: Render grouped one-character inputs for OTP or verification code entry.
 * Anatomy:
 * - .otp-input
 *   - input.otp-input__cell (repeated)
 * Data Contract:
 * - length, name, size, class, disabled, autocomplete, values, attributes
 */

$length       = isset($length) ? (int) $length : 6;
$name         = isset($name) ? (string) $name : 'otp';
$size         = isset($size) ? (string) $size : 'md';
$class        = isset($class) ? trim((string) $class) : '';
$disabled     = !empty($disabled);
$autocomplete = isset($autocomplete) ? (string) $autocomplete : 'one-time-code';
$values       = isset($values) && is_array($values) ? $values : [];
$attributes   = isset($attributes) && is_array($attributes) ? $attributes : [];

if ($length < 4) {
  $length = 4;
}

if ($length > 8) {
  $length = 8;
}

$size_map = [
  'sm' => 'h-[var(--ui-h-sm)] w-[var(--ui-h-sm)] text-xs',
  'md' => 'h-[var(--ui-h-md)] w-[var(--ui-h-md)] text-sm',
  'lg' => 'h-[var(--ui-h-lg)] w-[var(--ui-h-lg)] text-base',
];

if (!isset($size_map[$size])) {
  $size = 'md';
}

$cell_classes = trim(implode(' ', array_filter([
  'otp-input__cell rounded-md bg-white text-center text-brand-900 ring-1 ring-brand-300 ring-inset',
  'focus:outline-none focus:ring-2 focus:ring-brand-500',
  $size_map[$size],
  $disabled ? 'bg-brand-100 text-brand-400 ring-brand-200' : '',
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
?>
<div class="otp-input flex items-center gap-2">
  <?php for ($index = 0; $index < $length; $index++): ?>
    <?php
    $input_attributes                = $attributes;
    $input_attributes['type']        = 'text';
    $input_attributes['class']       = $cell_classes;
    $input_attributes['name']        = $name . '[]';
    $input_attributes['maxlength']   = 1;
    $input_attributes['inputmode']   = 'numeric';
    $input_attributes['pattern']     = '[0-9]*';
    $input_attributes['autocomplete']= $autocomplete;
    $input_attributes['aria-label']  = 'Digit ' . (string) ($index + 1);

    if (isset($values[$index])) {
      $input_attributes['value'] = (string) $values[$index];
    }

    if ($disabled) {
      $input_attributes['disabled'] = true;
    }
    ?>
    <input<?= $render_attributes($input_attributes); ?>>
  <?php endfor; ?>
</div>
