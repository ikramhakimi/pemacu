<?php
declare(strict_types=1);

/**
 * Component: drawer
 * Purpose: Render one data-driven drawer with trigger, panel, and optional footer actions.
 * Anatomy:
 * - .drawer (root overlay)
 *   - .drawer__panel
 *     - .drawer__header
 *     - .drawer__body
 *     - .drawer__footer (optional)
 * Data Contract:
 * - `drawer_id` (string, required): unique DOM id for target binding.
 * - `drawer_title` (string, optional): header title.
 * - `drawer_position` (string, optional): `right`, `left`, `bottom`. Default `right`.
 * - `drawer_size` (string, optional): `md`, `lg`, `full`. Default `md`.
 * - `drawer_trigger_label` (string, optional): label for trigger button.
 * - `drawer_trigger_variant` (string, optional): standard button variant. Default `default`.
 * - `drawer_trigger_size` (string, optional): standard button size. Default `md`.
 * - `drawer_show_trigger` (bool, optional): render trigger control. Default true.
 * - `drawer_body_html` (string, optional): trusted HTML content.
 * - `drawer_footer_html` (string, optional): trusted HTML footer content.
 * - `drawer_panel_class` (string, optional): extra panel classes.
 * - `drawer_overlay_class` (string, optional): extra overlay classes.
 */

$drawer_id = isset($drawer_id)
  ? trim((string) $drawer_id)
  : '';
$drawer_title = isset($drawer_title)
  ? trim((string) $drawer_title)
  : 'Drawer';
$drawer_position = isset($drawer_position)
  ? trim((string) $drawer_position)
  : 'right';
$drawer_size = isset($drawer_size)
  ? trim((string) $drawer_size)
  : 'md';
$drawer_trigger_label = isset($drawer_trigger_label)
  ? trim((string) $drawer_trigger_label)
  : 'Open Drawer';
$drawer_trigger_variant = isset($drawer_trigger_variant)
  ? trim((string) $drawer_trigger_variant)
  : 'default';
$drawer_trigger_size = isset($drawer_trigger_size)
  ? trim((string) $drawer_trigger_size)
  : 'md';
$drawer_show_trigger = isset($drawer_show_trigger)
  ? (bool) $drawer_show_trigger
  : true;
$drawer_body_html = isset($drawer_body_html)
  ? (string) $drawer_body_html
  : '';
$drawer_footer_html = isset($drawer_footer_html)
  ? (string) $drawer_footer_html
  : '';
$drawer_panel_class = isset($drawer_panel_class)
  ? trim((string) $drawer_panel_class)
  : '';
$drawer_overlay_class = isset($drawer_overlay_class)
  ? trim((string) $drawer_overlay_class)
  : '';

if ($drawer_id === '') {
  return;
}

$allowed_positions = ['right', 'left', 'bottom'];
if (!in_array($drawer_position, $allowed_positions, true)) {
  $drawer_position = 'right';
}
$allowed_sizes = ['md', 'lg', 'full'];
if (!in_array($drawer_size, $allowed_sizes, true)) {
  $drawer_size = 'md';
}

$panel_from_class = 'translate-x-full';
$panel_to_class = 'translate-x-0';
$overlay_layout_class = 'justify-end';
$panel_layout_class = 'ml-auto h-full w-full max-w-md';

if ($drawer_position === 'left') {
  $panel_from_class = '-translate-x-full';
  $panel_to_class = 'translate-x-0';
  $overlay_layout_class = 'justify-start';
  $panel_layout_class = 'h-full w-full max-w-md';
}

if ($drawer_position === 'bottom') {
  $panel_from_class = 'translate-y-full';
  $panel_to_class = 'translate-y-0';
  $overlay_layout_class = 'items-end justify-center';
  $panel_layout_class = 'mt-auto w-full rounded-t-2xl max-h-[70vh]';
}

if ($drawer_size === 'lg') {
  if ($drawer_position === 'bottom') {
    $panel_layout_class = 'mt-auto w-full rounded-t-2xl max-h-[85vh]';
  } else {
    $panel_layout_class = str_replace('max-w-md', 'max-w-2xl', $panel_layout_class);
  }
}

if ($drawer_size === 'full') {
  if ($drawer_position === 'bottom') {
    $panel_layout_class = 'h-full w-full rounded-none';
  } else {
    $panel_layout_class = str_replace('max-w-md', 'max-w-full', $panel_layout_class);
  }
}

$drawer_resolved_class = trim(
  'drawer fixed inset-0 z-50 hidden bg-brand-900/60 opacity-0 transition-opacity duration-300 ease-out ' .
  $overlay_layout_class . ' ' . $drawer_overlay_class,
);

$drawer_panel_resolved_class = trim(
  'drawer__panel flex flex-col transform bg-white shadow-2xl transition-transform duration-300 ease-out ' .
  $panel_layout_class . ' ' . $panel_from_class . ' ' . $drawer_panel_class,
);
?>
<?php if ($drawer_show_trigger): ?>
  <?php component('button', [
    'label'      => $drawer_trigger_label,
    'variant'    => $drawer_trigger_variant,
    'size'       => $drawer_trigger_size,
    'attributes' => [
      'aria-haspopup'      => 'dialog',
      'aria-expanded'      => 'false',
      'data-drawer-open'   => true,
      'data-drawer-target' => $drawer_id,
    ],
  ]); ?>
<?php endif; ?>

<div
  id="<?= e($drawer_id); ?>"
  class="<?= e($drawer_resolved_class); ?>"
  role="dialog"
  aria-modal="true"
  aria-hidden="true"
  aria-labelledby="<?= e($drawer_id); ?>-title"
  data-drawer
>
  <aside
    class="<?= e($drawer_panel_resolved_class); ?>"
    data-drawer-panel
    data-drawer-panel-from="<?= e($panel_from_class); ?>"
    data-drawer-panel-to="<?= e($panel_to_class); ?>"
  >
    <header class="drawer__header flex items-center justify-between border-b border-brand-200 px-5 py-4">
      <h5 id="<?= e($drawer_id); ?>-title" class="text-lg font-semibold text-brand-900"><?= e($drawer_title); ?></h5>
      <?php component('button', [
        'label'      => 'Close drawer',
        'variant'    => 'secondary',
        'size'       => 'sm',
        'icon_only'  => true,
        'icon_name'  => 'close-line',
        'aria_label' => 'Close drawer',
        'attributes' => [
          'data-drawer-close' => true,
        ],
      ]); ?>
    </header>

    <div class="drawer__body min-h-0 flex-1 overflow-y-auto p-5 text-brand-700">
      <?= $drawer_body_html; ?>
    </div>

    <?php if ($drawer_footer_html !== ''): ?>
      <footer class="drawer__footer flex items-center justify-end gap-2 border-t border-brand-200 px-5 py-4">
        <?= $drawer_footer_html; ?>
      </footer>
    <?php endif; ?>
  </aside>
</div>
