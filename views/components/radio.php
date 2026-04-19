<?php
declare(strict_types=1);

/**
 * Component: radio
 * Purpose: Render one API-driven radio control with optional label and disabled/checked states.
 * Anatomy:
 * - .choice.choice--radio
 *   - input.radio.peer.sr-only
 *   - .radio__box
 *     - .radio__dot
 *   - .choice__label
 * Data Contract:
 * - `id` (string, optional): input id. Default: generated.
 * - `name` (string, optional): input name.
 * - `value` (string, optional): input value. Default: `1`.
 * - `label` (string, optional): visible label text. Default: `Radio`.
 * - `checked` (bool, optional): checked state. Default: false.
 * - `disabled` (bool, optional): disabled state. Default: false.
 * - `required` (bool, optional): required state. Default: false.
 * - `show_label` (bool, optional): render label text. Default: true.
 * - `label_position` (string, optional): `end` or `start`. Default: `end`.
 * - `label_icon_name` (string, optional): icon rendered before label text.
 * - `label_icon_size` (string|int, optional): icon size. Default: `20`.
 * - `label_icon_class` (string, optional): icon class.
 * - `label_end` (string, optional): trailing text aligned to the right of the main label.
 * - `label_end_position` (string, optional): `inline` or `below`. Default: `inline`.
 * - `label_end_class` (string, optional): extra trailing label text class.
 * - `description` (string, optional): secondary text rendered below the label.
 * - `description_class` (string, optional): extra description text class.
 * - `label_text_class` (string, optional): label text class.
 * - `class` (string, optional): extra wrapper class.
 * - `input_class` (string, optional): extra input class.
 * - `box_class` (string, optional): extra radio box class.
 * - `dot_class` (string, optional): extra radio dot class.
 * - `label_class` (string, optional): extra label class.
 * - `attributes` (array, optional): additional input attributes.
 */

$resolved_id = isset($id) && is_string($id) && trim($id) !== ''
  ? trim($id)
  : 'radio-' . substr(md5(uniqid('', true)), 0, 8);
$resolved_name = isset($name) && is_string($name) ? trim($name) : '';
$resolved_value = isset($value) ? (string) $value : '1';
$resolved_label = isset($label) && is_string($label) && trim($label) !== ''
  ? trim($label)
  : 'Radio';
$resolved_checked = isset($checked) ? (bool) $checked : false;
$resolved_disabled = isset($disabled) ? (bool) $disabled : false;
$resolved_required = isset($required) ? (bool) $required : false;
$resolved_show_label = isset($show_label) ? (bool) $show_label : true;
$resolved_label_position = isset($label_position) && is_string($label_position) ? trim($label_position) : 'end';
$resolved_label_position = in_array($resolved_label_position, ['start', 'end'], true) ? $resolved_label_position : 'end';
$resolved_label_icon_name = isset($label_icon_name) && is_string($label_icon_name) ? trim($label_icon_name) : '';
$resolved_label_icon_size = isset($label_icon_size) ? trim((string) $label_icon_size) : '20';
$resolved_label_icon_class = isset($label_icon_class) && is_string($label_icon_class) ? trim($label_icon_class) : '';
$resolved_label_end = isset($label_end) && is_string($label_end) ? trim($label_end) : '';
$resolved_label_end_position = isset($label_end_position) && is_string($label_end_position)
  ? trim($label_end_position)
  : 'inline';
$resolved_label_end_position = in_array($resolved_label_end_position, ['inline', 'below'], true)
  ? $resolved_label_end_position
  : 'inline';
$resolved_label_end_class = isset($label_end_class) && is_string($label_end_class) ? trim($label_end_class) : '';
$resolved_description = isset($description) && is_string($description) ? trim($description) : '';
$resolved_description_class = isset($description_class) && is_string($description_class) ? trim($description_class) : '';
$resolved_label_text_class = isset($label_text_class) && is_string($label_text_class) ? trim($label_text_class) : '';
$has_label_end = $resolved_label_end !== '';
$has_description = $resolved_description !== '';

$resolved_class = isset($class) && is_string($class) ? trim($class) : '';
$resolved_input_class = isset($input_class) && is_string($input_class) ? trim($input_class) : '';
$resolved_box_class = isset($box_class) && is_string($box_class) ? trim($box_class) : '';
$resolved_dot_class = isset($dot_class) && is_string($dot_class) ? trim($dot_class) : '';
$resolved_label_class = isset($label_class) && is_string($label_class) ? trim($label_class) : '';

$resolved_attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

$wrapper_classes = trim(implode(' ', array_filter([
  'choice choice--radio inline-flex gap-2',
  $has_description ? 'items-start' : 'items-center',
  $resolved_label_position === 'start' ? 'flex-row-reverse justify-end' : '',
  $resolved_class,
])));

$label_classes = trim(implode(' ', array_filter([
  'choice__label',
  ($has_description || $has_label_end) ? 'flex w-full flex-col gap-1' : 'text-sm',
  $resolved_label_icon_name !== '' && !$has_description ? 'inline-flex items-center gap-2' : '',
  $resolved_label_class,
])));
$label_text_classes = trim(implode(' ', array_filter([
  $resolved_disabled
    ? 'text-brand-400'
    : ($has_description ? 'font-medium text-brand-900' : 'text-brand-700'),
  $resolved_label_text_class,
])));
$description_classes = trim(implode(' ', array_filter([
  $resolved_disabled ? 'text-brand-400' : 'text-brand-600',
  $resolved_description_class,
])));
$label_end_classes = trim(implode(' ', array_filter([
  $resolved_disabled ? 'text-brand-400' : 'text-brand-700',
  $resolved_label_end_class,
])));

$box_classes = trim(implode(' ', array_filter([
  'radio__box inline-flex h-5 w-5 items-center justify-center rounded-full border transition-colors',
  $resolved_disabled && $resolved_checked
    ? 'border-blue-500/60 bg-brand-100'
    : ($resolved_disabled
      ? 'border-brand-200 bg-brand-100'
      : 'border-brand-300 bg-white peer-checked:border-blue-500 peer-checked:[&>.radio-dot]:opacity-100 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500'),
  $resolved_box_class,
])));

$dot_classes = trim(implode(' ', array_filter([
  'radio__dot radio-dot h-2.5 w-2.5 rounded-full transition-opacity',
  $resolved_disabled && $resolved_checked
    ? 'bg-blue-500/70 opacity-100'
    : ($resolved_disabled ? 'bg-brand-300 opacity-0' : 'bg-blue-500 opacity-0'),
  $resolved_dot_class,
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
$input_attributes['type'] = 'radio';
$input_attributes['class'] = trim('radio peer sr-only ' . $resolved_input_class);
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
    <span class="<?= e($dot_classes); ?>"></span>
  </span>
  <?php if ($resolved_show_label): ?>
    <span class="<?= e($label_classes); ?>">
      <?php if ($resolved_label_icon_name !== ''): ?>
        <?php icon($resolved_label_icon_name, [
          'icon_size'  => $resolved_label_icon_size,
          'icon_class' => $resolved_label_icon_class,
        ]); ?>
      <?php endif; ?>
      <?php if ($has_label_end && $resolved_label_end_position === 'inline'): ?>
        <span class="flex w-full items-center justify-between gap-3">
          <span class="<?= e($label_text_classes); ?>"><?= e($resolved_label); ?></span>
          <span class="<?= e($label_end_classes); ?>"><?= e($resolved_label_end); ?></span>
        </span>
      <?php elseif ($has_label_end): ?>
        <span class="<?= e($label_text_classes); ?>"><?= e($resolved_label); ?></span>
        <span class="<?= e($label_end_classes); ?>"><?= e($resolved_label_end); ?></span>
      <?php else: ?>
        <span class="<?= e($label_text_classes); ?>"><?= e($resolved_label); ?></span>
      <?php endif; ?>
      <?php if ($has_description): ?>
        <span class="<?= e($description_classes); ?>"><?= e($resolved_description); ?></span>
      <?php endif; ?>
    </span>
  <?php endif; ?>
</label>
