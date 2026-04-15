<?php
declare(strict_types=1);

/**
 * Component: toggle
 * Purpose: Render a single toggle control for binary on/off states.
 */

$toggle_id        = isset($id) ? trim((string) $id) : 'toggle-' . uniqid();
$toggle_name      = isset($name) ? trim((string) $name) : $toggle_id;
$toggle_label     = isset($label) ? trim((string) $label) : 'Toggle';
$toggle_checked   = isset($checked) && $checked === true;
$toggle_disabled  = isset($disabled) && $disabled === true;
$toggle_class     = isset($class) ? trim((string) $class) : '';
$toggle_input_cls = isset($input_class) ? trim((string) $input_class) : '';

$toggle_wrapper_classes = trim(implode(' ', array_filter([
  'toggle inline-flex items-center gap-3',
  $toggle_class,
])));

$toggle_input_classes = trim(implode(' ', array_filter([
  'toggle__input peer sr-only',
  $toggle_input_cls,
])));
?>
<label class="<?= e($toggle_wrapper_classes); ?>" for="<?= e($toggle_id); ?>">
  <span class="toggle__control relative inline-block h-6 w-11">
    <input
      id="<?= e($toggle_id); ?>"
      class="<?= e($toggle_input_classes); ?>"
      type="checkbox"
      name="<?= e($toggle_name); ?>"
      <?= $toggle_checked ? 'checked' : ''; ?>
      <?= $toggle_disabled ? 'disabled' : ''; ?>
    >
    <?php if ($toggle_disabled): ?>
      <span class="toggle__track absolute inset-0 rounded-full <?= e($toggle_checked ? 'bg-blue-500/60' : 'bg-brand-200/60'); ?>"></span>
      <span class="toggle__thumb absolute left-0.5 top-0.5 h-5 w-5 rounded-full <?= e($toggle_checked ? 'translate-x-5 bg-white/90' : 'bg-white/80'); ?> shadow-sm"></span>
    <?php else: ?>
      <span class="toggle__track absolute inset-0 rounded-full bg-brand-200 transition-colors peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500 peer-checked:bg-blue-500"></span>
      <span class="toggle__thumb absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow-sm transition-transform peer-checked:translate-x-5"></span>
    <?php endif; ?>
  </span>
  <span class="toggle__label text-sm <?= e($toggle_disabled ? 'text-brand-400' : 'text-brand-700'); ?>">
    <?= e($toggle_label); ?>
  </span>
</label>
