<?php
declare(strict_types=1);

/**
 * Component: checkbox
 * Purpose: Render one API-driven checkbox control with optional label and disabled/checked states.
 * Anatomy:
 * - .choice.choice--checkbox
 *   - input.checkbox.peer.sr-only
 *   - .checkbox__box
 *     - .checkbox__icon
 *   - .choice__label
 * Data Contract:
 * - `id` (string, optional): input id. Default: generated.
 * - `name` (string, optional): input name.
 * - `value` (string, optional): input value. Default: `1`.
 * - `label` (string, optional): visible label text. Default: `Checkbox`.
 * - `checked` (bool, optional): checked state. Default: false.
 * - `disabled` (bool, optional): disabled state. Default: false.
 * - `required` (bool, optional): required state. Default: false.
 * - `show_label` (bool, optional): render label text. Default: true.
 * - `label_position` (string, optional): `end` or `start`. Default: `end`.
 * - `label_icon_name` (string, optional): icon rendered before label text.
 * - `label_icon_size` (string|int, optional): icon size. Default: `20`.
 * - `label_icon_class` (string, optional): icon class.
 * - `label_text_class` (string, optional): label text class.
 * - `class` (string, optional): extra wrapper class.
 * - `input_class` (string, optional): extra input class.
 * - `box_class` (string, optional): extra checkbox box class.
 * - `label_class` (string, optional): extra label class.
 * - `icon_name` (string, optional): check icon name. Default: `check-fill`.
 * - `icon_size` (string|int, optional): check icon size. Default: `16`.
 * - `icon_class` (string, optional): check icon class. Default: `checkbox__icon`.
 * - `attributes` (array, optional): additional input attributes.
 */

$resolved_id = isset($id) && is_string($id) && trim($id) !== ''
  ? trim($id)
  : 'checkbox-' . substr(md5(uniqid('', true)), 0, 8);
$resolved_name = isset($name) && is_string($name) ? trim($name) : '';
$resolved_value = isset($value) ? (string) $value : '1';
$resolved_label = isset($label) && is_string($label) && trim($label) !== ''
  ? trim($label)
  : 'Checkbox';
$resolved_checked = isset($checked) ? (bool) $checked : false;
$resolved_disabled = isset($disabled) ? (bool) $disabled : false;
$resolved_required = isset($required) ? (bool) $required : false;
$resolved_show_label = isset($show_label) ? (bool) $show_label : true;
$resolved_label_position = isset($label_position) && is_string($label_position) ? trim($label_position) : 'end';
$resolved_label_position = in_array($resolved_label_position, ['start', 'end'], true) ? $resolved_label_position : 'end';
$resolved_label_icon_name = isset($label_icon_name) && is_string($label_icon_name) ? trim($label_icon_name) : '';
$resolved_label_icon_size = isset($label_icon_size) ? trim((string) $label_icon_size) : '20';
$resolved_label_icon_class = isset($label_icon_class) && is_string($label_icon_class) ? trim($label_icon_class) : '';
$resolved_label_text_class = isset($label_text_class) && is_string($label_text_class) ? trim($label_text_class) : '';

$resolved_class = isset($class) && is_string($class) ? trim($class) : '';
$resolved_input_class = isset($input_class) && is_string($input_class) ? trim($input_class) : '';
$resolved_box_class = isset($box_class) && is_string($box_class) ? trim($box_class) : '';
$resolved_label_class = isset($label_class) && is_string($label_class) ? trim($label_class) : '';
$resolved_icon_name = isset($icon_name) && is_string($icon_name) && trim($icon_name) !== ''
  ? trim($icon_name)
  : 'check-fill';
$resolved_icon_size = isset($icon_size) ? trim((string) $icon_size) : '16';
$resolved_icon_class = isset($icon_class) && is_string($icon_class) && trim($icon_class) !== ''
  ? trim($icon_class)
  : 'checkbox__icon';

$resolved_attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

$wrapper_classes = trim(implode(' ', array_filter([
  'choice choice--checkbox inline-flex items-center gap-2',
  $resolved_label_position === 'start' ? 'flex-row-reverse justify-end' : '',
  $resolved_class,
])));

$label_classes = trim(implode(' ', array_filter([
  'choice__label text-sm',
  $resolved_label_icon_name !== '' ? 'inline-flex items-center gap-2' : '',
  $resolved_disabled ? 'text-brand-400' : 'text-brand-700',
  $resolved_label_class,
])));
$label_text_classes = trim(implode(' ', array_filter([
  $resolved_label_text_class,
])));

$box_classes = trim(implode(' ', array_filter([
  'checkbox__box inline-flex h-5 w-5 items-center justify-center rounded-sm border transition-colors',
  $resolved_disabled && $resolved_checked
    ? 'border-blue-500/60 bg-blue-500/60 text-white/80'
    : ($resolved_disabled
      ? 'border-brand-200 bg-brand-100 text-brand-300'
      : 'border-brand-300 bg-white text-transparent peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500'),
  $resolved_box_class,
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

$input_attributes = $resolved_attributes;
$input_attributes['id'] = $resolved_id;
$input_attributes['type'] = 'checkbox';
$input_attributes['class'] = trim('checkbox peer sr-only ' . $resolved_input_class);
$input_attributes['value'] = $resolved_value;

if ($resolved_name !== '') {
  $input_attributes['name'] = $resolved_name;
}

if (!$resolved_show_label && !isset($input_attributes['aria-label']) && !isset($input_attributes['aria-labelledby'])) {
  $input_attributes['aria-label'] = $resolved_label;
}

if ($resolved_checked) {
  $input_attributes['checked'] = true;
}

if ($resolved_disabled) {
  $input_attributes['disabled'] = true;
}

if ($resolved_required) {
  $input_attributes['required'] = true;
}
?>
<label class="<?= e($wrapper_classes); ?>" for="<?= e($resolved_id); ?>">
  <input<?= $render_attributes($input_attributes); ?>>
  <span class="<?= e($box_classes); ?>">
    <?php icon($resolved_icon_name, ['icon_size' => $resolved_icon_size, 'icon_class' => $resolved_icon_class]); ?>
  </span>
  <?php if ($resolved_show_label): ?>
    <span class="<?= e($label_classes); ?>">
      <?php if ($resolved_label_icon_name !== ''): ?>
        <?php icon($resolved_label_icon_name, [
          'icon_size'  => $resolved_label_icon_size,
          'icon_class' => $resolved_label_icon_class,
        ]); ?>
      <?php endif; ?>
      <span class="<?= e($label_text_classes); ?>"><?= e($resolved_label); ?></span>
    </span>
  <?php endif; ?>
</label>
