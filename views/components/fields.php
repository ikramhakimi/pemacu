<?php
declare(strict_types=1);

/**
 * Component: fields
 * Purpose: Render one API-driven field wrapper with label, form control, and helper text across states.
 * Anatomy:
 * - .field[.field--disabled|.field--positive|.field--negative|.field--info]
 *   - .field__label
 *   - .field__input
 *     - component('{control.component}') or component('form/{control.component}')
 *   - .field__helper
 * Data Contract:
 * - `label` (string, optional): field label text.
 * - `helper_text` (string, optional): helper or validation message below the control.
 * - `state` (string, optional): `default`, `disabled`, `positive`, `negative`, `info`.
 * - `show_label` (bool, optional): render label node. Default: true.
 * - `label_tag` (string, optional): `label`, `p`, `span`, `div`. Default: `label`.
 * - `label_for` (string, optional): explicit `for` target when `label_tag` is `label`.
 * - `id` (string, optional): control id. Auto-generated if omitted.
 * - `helper_id` (string, optional): helper id. Auto-generated if omitted.
 * - `class` (string, optional): extra classes for field wrapper.
 * - `control` (array, optional): new control API.
 *   - `component` (string): input component key under `views/components`.
 *   - `props` (array): props forwarded to selected component.
 */

$label                 = isset($label) ? (string) $label : 'Label';
$helper_text           = isset($helper_text) ? (string) $helper_text : '';
$state                 = isset($state) ? (string) $state : 'default';
$label_tag             = isset($label_tag) ? (string) $label_tag : 'label';
$label_for             = isset($label_for) ? (string) $label_for : '';
$class                 = isset($class) ? trim((string) $class) : '';
$resolved_show_label   = isset($show_label) ? (bool) $show_label : true;
$resolved_id           = isset($id) ? (string) $id : '';
$resolved_helper_id    = isset($helper_id) ? (string) $helper_id : '';
$resolved_control      = isset($control) && is_array($control) ? $control : [];

$allowed_states = ['default', 'disabled', 'positive', 'negative', 'info'];
$allowed_tags   = ['label', 'p', 'span', 'div'];
$allowed_controls = [
  'forms-stepper',
  'input',
  'input-group',
  'pickdate',
  'pickdate-grid-js',
  'picktime',
  'picktime-grid',
  'rating',
  'select',
  'textarea',
];

if (!in_array($state, $allowed_states, true)) {
  $state = 'default';
}

if (!in_array($label_tag, $allowed_tags, true)) {
  $label_tag = 'label';
}

$control_component = isset($resolved_control['component']) ? (string) $resolved_control['component'] : 'input';
$control_props     = isset($resolved_control['props']) && is_array($resolved_control['props'])
  ? $resolved_control['props']
  : [];

if (!in_array($control_component, $allowed_controls, true)) {
  $control_component = 'input';
}

if ($resolved_id === '') {
  $resolved_id = 'field-' . substr(md5($label . $state . $control_component . uniqid('', true)), 0, 10);
}

if ($resolved_helper_id === '') {
  $resolved_helper_id = $resolved_id . '-helper';
}

if ($label_for === '' && $label_tag === 'label') {
  $label_for = $resolved_id;
}

if (!isset($control_props['id'])) {
  $control_props['id'] = $resolved_id;
}

if ($helper_text !== '' && !isset($control_props['aria-describedby'])) {
  $control_props['aria-describedby'] = $resolved_helper_id;
}

if (!isset($control_props['state']) && in_array($state, ['disabled', 'positive', 'negative'], true)) {
  $control_props['state'] = $state;
}

if ($state === 'disabled' && !isset($control_props['disabled'])) {
  $control_props['disabled'] = true;
}

if ($state === 'negative' && !isset($control_props['aria-invalid'])) {
  $control_props['aria-invalid'] = 'true';
}

$field_class = 'field space-y-2';
if ($state !== 'default') {
  $field_class .= ' field--' . $state;
}

if ($class !== '') {
  $field_class .= ' ' . $class;
}

$label_class = 'field__label block  font-medium text-brand-800';
if ($state === 'disabled') {
  $label_class = 'field__label block  font-medium text-brand-500';
}

$control_component_key = $control_component === 'select'
  ? 'select'
  : ($control_component === 'textarea'
    ? 'textarea'
    : ($control_component === 'input'
      ? 'input'
      : ($control_component === 'input-group'
        ? 'input-group'
        : ($control_component === 'rating'
          ? 'rating'
          : (in_array($control_component, ['pickdate', 'pickdate-grid-js', 'picktime', 'picktime-grid'], true)
            ? $control_component
            : 'form/' . $control_component)))));

$helper_class_map = [
  'default'  => 'field__helper field__helper--default',
  'disabled' => 'field__helper field__helper--disabled',
  'positive' => 'field__helper field__helper--success',
  'negative' => 'field__helper field__helper--error',
  'info'     => 'field__helper field__helper--default',
];
?>
<div class="<?= e($field_class); ?>">
  <?php if ($resolved_show_label): ?>
    <?php if ($label_tag === 'label'): ?>
      <label class="<?= e($label_class); ?>" for="<?= e($label_for); ?>"><?= e($label); ?></label>
    <?php elseif ($label_tag === 'p'): ?>
      <p class="<?= e($label_class); ?>"><?= e($label); ?></p>
    <?php elseif ($label_tag === 'span'): ?>
      <span class="<?= e($label_class); ?>"><?= e($label); ?></span>
    <?php else: ?>
      <div class="<?= e($label_class); ?>"><?= e($label); ?></div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="field__input">
    <?php component($control_component_key, $control_props); ?>
  </div>

  <?php if ($helper_text !== ''): ?>
    <p id="<?= e($resolved_helper_id); ?>" class="<?= e($helper_class_map[$state]); ?>"><?= e($helper_text); ?></p>
  <?php endif; ?>
</div>
