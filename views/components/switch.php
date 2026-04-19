<?php
declare(strict_types=1);

/**
 * Component: switch
 * Purpose: Render a reusable binary switch control with accessible labeling and state styling.
 * Anatomy:
 * - .switch
 *   - .switch__control
 *     - .switch__input
 *     - .switch__track
 *     - .switch__thumb
 *   - .switch__label
 * Data Contract:
 * - `id` (string, optional): input id. Default: generated.
 * - `name` (string, optional): input name. Default: same as id.
 * - `label` (string, optional): visible label text. Default: `Switch`.
 * - `value` (string, optional): input value. Default: `1`.
 * - `checked` (bool, optional): checked state. Default: false.
 * - `disabled` (bool, optional): disabled state. Default: false.
 * - `required` (bool, optional): required state. Default: false.
 * - `show_label` (bool, optional): render label text. Default: true.
 * - `label_position` (string, optional): `end` or `start`. Default: `end`.
 * - `label_icon_name` (string, optional): icon rendered before label text.
 * - `label_icon_size` (string|int, optional): icon size. Default: `20`.
 * - `label_icon_class` (string, optional): icon class.
 * - `label_text_class` (string, optional): label text class.
 * - `state_icon_on_name` (string, optional): icon shown on checked side.
 * - `state_icon_off_name` (string, optional): icon shown on unchecked side.
 * - `state_icon_size` (string|int, optional): size for both state icons. Default: `14`.
 * - `state_icon_on_class` (string, optional): class for checked-side icon.
 * - `state_icon_off_class` (string, optional): class for unchecked-side icon.
 * - `class` (string, optional): extra class for root wrapper.
 * - `input_class` (string, optional): extra class for `.switch__input`.
 * - `track_class` (string, optional): extra class for `.switch__track`.
 * - `thumb_class` (string, optional): extra class for `.switch__thumb`.
 * - `label_class` (string, optional): extra class for `.switch__label`.
 * - `attributes` (array, optional): extra attributes for input element.
 */

$resolved_id = isset($id) && is_string($id) && trim($id) !== ''
  ? trim($id)
  : 'switch-' . uniqid();
$resolved_name = isset($name) && is_string($name) && trim($name) !== ''
  ? trim($name)
  : $resolved_id;
$resolved_label = isset($label) && is_string($label) && trim($label) !== ''
  ? trim($label)
  : 'Switch';
$resolved_value = isset($value) ? (string) $value : '1';
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
$resolved_state_icon_on_name = isset($state_icon_on_name) && is_string($state_icon_on_name)
  ? trim($state_icon_on_name)
  : '';
$resolved_state_icon_off_name = isset($state_icon_off_name) && is_string($state_icon_off_name)
  ? trim($state_icon_off_name)
  : '';
$resolved_state_icon_size = isset($state_icon_size) ? trim((string) $state_icon_size) : '14';
$resolved_state_icon_on_class = isset($state_icon_on_class) && is_string($state_icon_on_class)
  ? trim($state_icon_on_class)
  : '';
$resolved_state_icon_off_class = isset($state_icon_off_class) && is_string($state_icon_off_class)
  ? trim($state_icon_off_class)
  : '';
$resolved_has_state_icons = $resolved_state_icon_on_name !== '' || $resolved_state_icon_off_name !== '';

$resolved_class = isset($class) && is_string($class) ? trim($class) : '';
$resolved_input_class = isset($input_class) && is_string($input_class) ? trim($input_class) : '';
$resolved_track_class = isset($track_class) && is_string($track_class) ? trim($track_class) : '';
$resolved_thumb_class = isset($thumb_class) && is_string($thumb_class) ? trim($thumb_class) : '';
$resolved_label_class = isset($label_class) && is_string($label_class) ? trim($label_class) : '';
$resolved_attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

$root_classes = trim(implode(' ', array_filter([
  'switch inline-flex items-center gap-3',
  $resolved_label_position === 'start' ? 'flex-row-reverse justify-end' : '',
  $resolved_class,
])));
$input_classes = trim(implode(' ', array_filter([
  'switch__input peer sr-only',
  $resolved_input_class,
])));
$track_classes = trim(implode(' ', array_filter([
  'switch__track absolute inset-0 rounded-full transition-colors z-0',
  $resolved_disabled
    ? ($resolved_checked ? 'bg-blue-500/60' : 'bg-brand-200/60')
    : 'bg-brand-200 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500 peer-checked:bg-blue-500',
  $resolved_track_class,
])));
$thumb_classes = trim(implode(' ', array_filter([
  'switch__thumb absolute left-0.5 top-0.5 h-5 w-5 rounded-full shadow-sm z-20',
  $resolved_disabled
    ? ($resolved_checked ? 'translate-x-5 bg-white/90' : 'bg-white/80')
    : 'bg-white transition-transform peer-checked:translate-x-5',
  $resolved_thumb_class,
])));
$label_classes = trim(implode(' ', array_filter([
  'switch__label inline-flex items-center gap-3 text-sm',
  $resolved_disabled ? 'text-brand-400' : 'text-brand-700',
  $resolved_label_class,
])));
$label_text_classes = trim(implode(' ', array_filter([
  $resolved_label_text_class,
])));

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value)) {
      if ($value) {
        $compiled[] = $key;
      }
      continue;
    }

    if ($value === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$input_attributes = $resolved_attributes;
$input_attributes['id'] = $resolved_id;
$input_attributes['class'] = $input_classes;
$input_attributes['type'] = 'checkbox';
$input_attributes['name'] = $resolved_name;
$input_attributes['value'] = $resolved_value;
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
<label class="<?= e($root_classes); ?>" for="<?= e($resolved_id); ?>">
  <span class="switch__control relative inline-block h-6 w-11">
    <input<?= $render_attributes($input_attributes); ?>>
    <span class="<?= e($track_classes); ?>"></span>
    <?php if ($resolved_has_state_icons): ?>
      <span class="switch__icons pointer-events-none absolute inset-0 z-10 flex items-center justify-between px-1.5">
        <?php if ($resolved_state_icon_off_name !== ''): ?>
          <?php icon($resolved_state_icon_off_name, [
            'icon_size'  => $resolved_state_icon_size,
            'icon_class' => $resolved_state_icon_off_class,
          ]); ?>
        <?php else: ?>
          <span aria-hidden="true"></span>
        <?php endif; ?>

        <?php if ($resolved_state_icon_on_name !== ''): ?>
          <?php icon($resolved_state_icon_on_name, [
            'icon_size'  => $resolved_state_icon_size,
            'icon_class' => $resolved_state_icon_on_class,
          ]); ?>
        <?php endif; ?>
      </span>
    <?php endif; ?>
    <span class="<?= e($thumb_classes); ?>"></span>
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
