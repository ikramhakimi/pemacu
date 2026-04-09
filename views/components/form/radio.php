<?php
declare(strict_types=1);

/**
 * Component: radio
 * Purpose: Render one radio control with optional label and checked/disabled states.
 * Anatomy:
 * - .choice.choice--radio
 *   - input.radio.peer.sr-only
 *   - .radio__box
 *     - .radio__dot
 *   - .choice__label
 * Data Contract:
 * - id, name, value, label, class, checked, disabled, attributes
 */

$id         = isset($id) ? (string) $id : 'radio-' . substr(md5(uniqid('', true)), 0, 8);
$name       = isset($name) ? (string) $name : 'radio-group';
$value      = isset($value) ? (string) $value : '1';
$label      = isset($label) ? (string) $label : 'Radio';
$class      = isset($class) ? trim((string) $class) : '';
$checked    = !empty($checked);
$disabled   = !empty($disabled);
$attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

$wrapper_classes = trim(implode(' ', array_filter([
  'choice choice--radio inline-flex items-center gap-2',
  $class,
])));

$label_classes = $disabled
  ? 'choice__label text-sm text-brand-400'
  : 'choice__label text-sm text-brand-700';

$box_classes = 'radio__box inline-flex h-5 w-5 items-center justify-center rounded-full border transition-colors';
$dot_classes = 'radio__dot h-2.5 w-2.5 rounded-full transition-opacity';

if ($disabled && $checked) {
  $box_classes .= ' border-blue-500/60 bg-brand-100';
  $dot_classes .= ' bg-blue-500/70 opacity-100';
} elseif ($disabled) {
  $box_classes .= ' border-brand-200 bg-brand-100';
  $dot_classes .= ' bg-brand-300 opacity-0';
} elseif ($checked) {
  $box_classes .= ' border-blue-500 bg-white';
  $dot_classes .= ' bg-blue-500 opacity-100';
} else {
  $box_classes .= ' border-brand-300 bg-white peer-checked:border-blue-500';
  $box_classes .= ' peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500';
  $dot_classes .= ' bg-blue-500 opacity-0 peer-checked:opacity-100';
}

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

$input_attributes            = $attributes;
$input_attributes['id']      = $id;
$input_attributes['type']    = 'radio';
$input_attributes['name']    = $name;
$input_attributes['class']   = 'radio peer sr-only';
$input_attributes['value']   = $value;

if ($checked) {
  $input_attributes['checked'] = true;
}

if ($disabled) {
  $input_attributes['disabled'] = true;
}
?>
<label class="<?= e($wrapper_classes); ?>" for="<?= e($id); ?>">
  <input<?= $render_attributes($input_attributes); ?>>
  <span class="<?= e($box_classes); ?>">
    <span class="<?= e($dot_classes); ?>"></span>
  </span>
  <span class="<?= e($label_classes); ?>"><?= e($label); ?></span>
</label>
