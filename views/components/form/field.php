<?php
declare(strict_types=1);

/**
 * Component: field
 * Purpose: Render a reusable field wrapper with label, form control, and helper text across states.
 * Anatomy:
 * - .field[.field--disabled|.field--positive|.field--negative|.field--info]
 *   - .field__label
 *   - .field__input
 *     - component('form/{input_component}')
 *   - .field__helper
 * Data Contract:
 * - $label (string): Field label text.
 * - $helper_text (string): Supporting helper or validation message.
 * - $state (string): default|disabled|positive|negative|info.
 * - $label_tag (string): label|p|span|div (default: label).
 * - $hide_label (bool): When true, omit rendering the label element.
 * - $label_for (string): Optional explicit value for label for="" when label_tag is label.
 * - $input_component (string): Form component key under views/components/form (default: input).
 * - $input_props (array): Props passed into the selected form component.
 * - $id (string): Optional control id. Auto-generated when omitted.
 * - $helper_id (string): Optional helper text id. Auto-generated when omitted.
 * - $class (string): Extra wrapper classes appended to the field container.
 */

$label            = isset($label) ? (string) $label : 'Label';
$helper_text      = isset($helper_text) ? (string) $helper_text : '';
$state            = isset($state) ? (string) $state : 'default';
$label_tag        = isset($label_tag) ? (string) $label_tag : 'label';
$hide_label       = !empty($hide_label);
$label_for        = isset($label_for) ? (string) $label_for : '';
$input_component  = isset($input_component) ? (string) $input_component : 'input';
$input_props      = isset($input_props) && is_array($input_props) ? $input_props : [];
$class            = isset($class) ? trim((string) $class) : '';
$allowed_states   = ['default', 'disabled', 'positive', 'negative', 'info'];
$allowed_tags     = ['label', 'p', 'span', 'div'];
$state            = in_array($state, $allowed_states, true) ? $state : 'default';
$label_tag        = in_array($label_tag, $allowed_tags, true) ? $label_tag : 'label';
$id               = isset($id) ? (string) $id : 'field-' . substr(md5($label . $state . $input_component), 0, 8);
$helper_id        = isset($helper_id) ? (string) $helper_id : $id . '-helper';
$field_class      = 'field';
$label_class      = 'field__label block text-sm font-medium text-brand-900';
$helper_class_map = [
  'default'  => 'field__helper field__helper--default',
  'disabled' => 'field__helper field__helper--disabled',
  'positive' => 'field__helper field__helper--success',
  'negative' => 'field__helper field__helper--error',
  'info'     => 'field__helper field__helper--default',
];

if ($state !== 'default') {
  $field_class .= ' field--' . $state;
}

if ($state === 'disabled') {
  $label_class = 'field__label block text-sm font-medium text-brand-500';
}

if ($label_for === '') {
  $label_for = $id;
}

if (!isset($input_props['id'])) {
  $input_props['id'] = $id;
}

if ($helper_text !== '' && !isset($input_props['aria-describedby'])) {
  $input_props['aria-describedby'] = $helper_id;
}

if (!isset($input_props['state']) && in_array($state, ['disabled', 'positive', 'negative'], true)) {
  $input_props['state'] = $state;
}

if ($state === 'disabled' && !isset($input_props['disabled'])) {
  $input_props['disabled'] = true;
}

if ($state === 'negative' && !isset($input_props['aria-invalid'])) {
  $input_props['aria-invalid'] = 'true';
}

if ($class !== '') {
  $field_class .= ' ' . $class;
}
?>
<div class="<?= e($field_class); ?>">
  <?php if (!$hide_label): ?>
    <<?= e($label_tag); ?>
      class="<?= e($label_class); ?>"
      <?php if ($label_tag === 'label' && $label_for !== ''): ?>for="<?= e($label_for); ?>"<?php endif; ?>
    ><?= e($label); ?></<?= e($label_tag); ?>>
  <?php endif; ?>
  <div class="field__input">
    <?php component('form/' . $input_component, $input_props); ?>
  </div>
  <?php if ($helper_text !== ''): ?>
    <p id="<?= e($helper_id); ?>" class="<?= e($helper_class_map[$state]); ?>"><?= e($helper_text); ?></p>
  <?php endif; ?>
</div>
