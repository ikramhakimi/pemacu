<?php
declare(strict_types=1);

/**
 * Component: checkbox
 * Purpose: Render one checkbox control with optional label and disabled/checked states.
 * Anatomy:
 * - .choice.choice--checkbox
 *   - input.checkbox.peer.sr-only
 *   - .checkbox__box
 *     - .checkbox__icon
 *   - .choice__label
 * Data Contract:
 * - id, name, value, label, class, checked, disabled, attributes
 */

$id         = isset($id) ? (string) $id : 'checkbox-' . substr(md5(uniqid('', true)), 0, 8);
$name       = isset($name) ? (string) $name : '';
$value      = isset($value) ? (string) $value : '1';
$label      = isset($label) ? (string) $label : 'Checkbox';
$class      = isset($class) ? trim((string) $class) : '';
$checked    = !empty($checked);
$disabled   = !empty($disabled);
$attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

$wrapper_classes = trim(implode(' ', array_filter([
  'choice choice--checkbox inline-flex items-center gap-2',
  $class,
])));

$label_classes = $disabled
  ? 'choice__label text-sm text-brand-400'
  : 'choice__label text-sm text-brand-700';

$box_classes = 'checkbox__box inline-flex h-5 w-5 items-center justify-center rounded-sm border transition-colors';

if ($disabled && $checked) {
  $box_classes .= ' border-blue-500/60 bg-blue-500/60 text-white/80';
} elseif ($disabled) {
  $box_classes .= ' border-brand-200 bg-brand-100 text-brand-300';
} else {
  $box_classes .= ' border-brand-300 bg-white text-transparent';
  $box_classes .= ' peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white';
  $box_classes .= ' peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500';
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
$input_attributes['type']    = 'checkbox';
$input_attributes['class']   = 'checkbox peer sr-only';
$input_attributes['value']   = $value;

if ($name !== '') {
  $input_attributes['name'] = $name;
}

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
    <?php icon('check-fill', ['icon_size' => '16', 'icon_class' => 'checkbox__icon']); ?>
  </span>
  <span class="<?= e($label_classes); ?>"><?= e($label); ?></span>
</label>
