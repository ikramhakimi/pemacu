<?php
declare(strict_types=1);

/**
 * Component: drawer
 * Purpose: Render one API-driven drawer with configurable trigger, panel, and optional footer actions.
 * Anatomy:
 * - .drawer (root overlay)
 *   - .drawer__panel
 *     - .drawer__header
 *     - .drawer__body
 *     - .drawer__footer (optional)
 * Data Contract:
 * - `id` (string, required): unique DOM id for target binding.
 * - `title` (string, optional): header title. Default: `Drawer`.
 * - `position` (string, optional): `right`, `left`, `bottom`, `top`. Default: `right`.
 * - `size` (string, optional): `md`, `lg`, `full`. Default: `md`.
 * - `show_trigger` (bool, optional): render trigger control. Default: `true`.
 * - `trigger` (array, optional):
 *   - `label` (string, optional): trigger button label. Default: `Open Drawer`.
 *   - `aria_label` (string, optional): trigger aria-label.
 *   - `variant` (string, optional): standard button variant. Default: `default`.
 *   - `size` (string, optional): standard button size. Default: `md`.
 *   - `gradient` (bool, optional): trigger gradient style. Default: false.
 *   - `icon_name` (string, optional): trigger icon.
 *   - `icon_only` (bool, optional): icon-only trigger style.
 *   - `icon_position` (string, optional): `left` or `right`. Default: `left`.
 *   - `class` (string, optional): extra class for trigger button.
 *   - `attributes` (array, optional): additional trigger attributes.
 * - `body_html` (string, optional): trusted HTML content.
 * - `footer_html` (string, optional): trusted HTML footer content.
 * - `close_button` (array, optional):
 *   - `aria_label` (string, optional): close button aria-label. Default: `Close drawer`.
 *   - `variant` (string, optional): button variant. Default: `secondary`.
 *   - `size` (string, optional): button size. Default: `sm`.
 *   - `icon_name` (string, optional): close icon. Default: `close-line`.
 * - `classes` (array, optional):
 *   - `overlay`, `panel`, `header`, `body`, `footer` (string, optional): extra class hooks.
 * - Backward-compatible aliases are supported:
 *   - `drawer_id`, `drawer_title`, `drawer_position`, `drawer_size`, `drawer_show_trigger`,
 *     `drawer_trigger_label`, `drawer_trigger_variant`, `drawer_trigger_size`,
 *     `drawer_body_html`, `drawer_footer_html`, `drawer_panel_class`, `drawer_overlay_class`.
 */

$resolved_id = isset($id) && is_string($id) && trim($id) !== ''
  ? trim($id)
  : (isset($drawer_id) ? trim((string) $drawer_id) : '');
$resolved_title = isset($title) && is_string($title) && trim($title) !== ''
  ? trim($title)
  : (isset($drawer_title) ? trim((string) $drawer_title) : 'Drawer');
$resolved_position = isset($position) && is_string($position) ? trim($position) : '';
$resolved_position = $resolved_position !== ''
  ? $resolved_position
  : (isset($drawer_position) ? trim((string) $drawer_position) : 'right');
$resolved_size = isset($size) && is_string($size) ? trim($size) : '';
$resolved_size = $resolved_size !== ''
  ? $resolved_size
  : (isset($drawer_size) ? trim((string) $drawer_size) : 'md');

$resolved_show_trigger = isset($show_trigger)
  ? (bool) $show_trigger
  : (isset($drawer_show_trigger) ? (bool) $drawer_show_trigger : true);

$trigger = isset($trigger) && is_array($trigger) ? $trigger : [];
$close_button = isset($close_button) && is_array($close_button) ? $close_button : [];
$classes = isset($classes) && is_array($classes) ? $classes : [];

$resolved_trigger_label = isset($trigger['label']) && is_string($trigger['label']) && trim($trigger['label']) !== ''
  ? trim($trigger['label'])
  : (isset($drawer_trigger_label) ? trim((string) $drawer_trigger_label) : 'Open Drawer');
$resolved_trigger_aria_label = isset($trigger['aria_label']) && is_string($trigger['aria_label']) && trim($trigger['aria_label']) !== ''
  ? trim($trigger['aria_label'])
  : '';
$resolved_trigger_variant = isset($trigger['variant']) && is_string($trigger['variant']) && trim($trigger['variant']) !== ''
  ? trim($trigger['variant'])
  : (isset($drawer_trigger_variant) ? trim((string) $drawer_trigger_variant) : 'default');
$resolved_trigger_size = isset($trigger['size']) && is_string($trigger['size']) && trim($trigger['size']) !== ''
  ? trim($trigger['size'])
  : (isset($drawer_trigger_size) ? trim((string) $drawer_trigger_size) : 'md');
$resolved_trigger_gradient = isset($trigger['gradient']) ? (bool) $trigger['gradient'] : false;
$resolved_trigger_icon_name = isset($trigger['icon_name']) && is_string($trigger['icon_name']) ? trim($trigger['icon_name']) : '';
$resolved_trigger_icon_only = isset($trigger['icon_only']) ? (bool) $trigger['icon_only'] : false;
$resolved_trigger_icon_position = isset($trigger['icon_position']) && is_string($trigger['icon_position']) && trim($trigger['icon_position']) !== ''
  ? trim($trigger['icon_position'])
  : 'left';
$resolved_trigger_class = isset($trigger['class']) && is_string($trigger['class']) ? trim($trigger['class']) : '';
$resolved_trigger_attributes = isset($trigger['attributes']) && is_array($trigger['attributes']) ? $trigger['attributes'] : [];

$resolved_body_html = isset($body_html)
  ? (string) $body_html
  : (isset($drawer_body_html) ? (string) $drawer_body_html : '');
$resolved_footer_html = isset($footer_html)
  ? (string) $footer_html
  : (isset($drawer_footer_html) ? (string) $drawer_footer_html : '');

$resolved_close_aria_label = isset($close_button['aria_label']) && is_string($close_button['aria_label']) && trim($close_button['aria_label']) !== ''
  ? trim($close_button['aria_label'])
  : 'Close drawer';
$resolved_close_variant = isset($close_button['variant']) && is_string($close_button['variant']) && trim($close_button['variant']) !== ''
  ? trim($close_button['variant'])
  : 'secondary';
$resolved_close_size = isset($close_button['size']) && is_string($close_button['size']) && trim($close_button['size']) !== ''
  ? trim($close_button['size'])
  : 'sm';
$resolved_close_icon_name = isset($close_button['icon_name']) && is_string($close_button['icon_name']) && trim($close_button['icon_name']) !== ''
  ? trim($close_button['icon_name'])
  : 'close-line';

$resolved_overlay_class = isset($classes['overlay']) && is_string($classes['overlay']) ? trim($classes['overlay']) : '';
$resolved_panel_class = isset($classes['panel']) && is_string($classes['panel']) ? trim($classes['panel']) : '';
$resolved_header_class = isset($classes['header']) && is_string($classes['header']) ? trim($classes['header']) : '';
$resolved_body_class = isset($classes['body']) && is_string($classes['body']) ? trim($classes['body']) : '';
$resolved_footer_class = isset($classes['footer']) && is_string($classes['footer']) ? trim($classes['footer']) : '';

if ($resolved_overlay_class === '' && isset($drawer_overlay_class) && is_string($drawer_overlay_class)) {
  $resolved_overlay_class = trim($drawer_overlay_class);
}
if ($resolved_panel_class === '' && isset($drawer_panel_class) && is_string($drawer_panel_class)) {
  $resolved_panel_class = trim($drawer_panel_class);
}

if ($resolved_id === '') {
  return;
}

$allowed_positions = ['right', 'left', 'bottom', 'top'];
if (!in_array($resolved_position, $allowed_positions, true)) {
  $resolved_position = 'right';
}
$allowed_sizes = ['md', 'lg', 'full'];
if (!in_array($resolved_size, $allowed_sizes, true)) {
  $resolved_size = 'md';
}

$panel_from_class = 'translate-x-full';
$panel_to_class = 'translate-x-0';
$overlay_layout_class = 'justify-end';
$panel_layout_class = 'ml-auto h-full w-full max-w-md';

if ($resolved_position === 'left') {
  $panel_from_class = '-translate-x-full';
  $panel_to_class = 'translate-x-0';
  $overlay_layout_class = 'justify-start';
  $panel_layout_class = 'h-full w-full max-w-md';
}

if ($resolved_position === 'bottom') {
  $panel_from_class = 'translate-y-full';
  $panel_to_class = 'translate-y-0';
  $overlay_layout_class = 'items-end justify-center';
  $panel_layout_class = 'mt-auto w-full rounded-t-2xl max-h-[70vh]';
}

if ($resolved_position === 'top') {
  $panel_from_class = '-translate-y-full';
  $panel_to_class = 'translate-y-0';
  $overlay_layout_class = 'items-start justify-center';
  $panel_layout_class = 'mb-auto w-full rounded-b-2xl max-h-[70vh]';
}

if ($resolved_size === 'lg') {
  if ($resolved_position === 'bottom') {
    $panel_layout_class = 'mt-auto w-full rounded-t-2xl max-h-[85vh]';
  } elseif ($resolved_position === 'top') {
    $panel_layout_class = 'mb-auto w-full rounded-b-2xl max-h-[85vh]';
  } else {
    $panel_layout_class = str_replace('max-w-md', 'max-w-2xl', $panel_layout_class);
  }
}

if ($resolved_size === 'full') {
  if ($resolved_position === 'bottom' || $resolved_position === 'top') {
    $panel_layout_class = 'h-full w-full rounded-none';
  } else {
    $panel_layout_class = str_replace('max-w-md', 'max-w-full', $panel_layout_class);
  }
}

$drawer_resolved_class = trim(
  'drawer fixed inset-0 z-50 hidden bg-brand-900/60 opacity-0 transition-opacity duration-300 ease-out ' .
  $overlay_layout_class . ' ' . $resolved_overlay_class,
);

$drawer_panel_resolved_class = trim(
  'drawer__panel flex flex-col transform bg-white shadow-2xl transition-transform duration-300 ease-out ' .
  $panel_layout_class . ' ' . $panel_from_class . ' ' . $resolved_panel_class,
);
$drawer_header_class = trim('drawer__header flex items-center justify-between border-b border-brand-200 px-5 py-4 ' . $resolved_header_class);
$drawer_body_class = trim('drawer__body min-h-0 flex-1 overflow-y-auto p-5 text-brand-700 ' . $resolved_body_class);
$drawer_footer_class = trim('drawer__footer flex items-center justify-end gap-2 border-t border-brand-200 px-5 py-4 ' . $resolved_footer_class);

$trigger_attributes = array_merge([
  'aria-haspopup'      => 'dialog',
  'aria-expanded'      => 'false',
  'data-drawer-open'   => true,
  'data-drawer-target' => $resolved_id,
], $resolved_trigger_attributes);
?>
<?php if ($resolved_show_trigger): ?>
  <?php component('button', [
    'label'      => $resolved_trigger_label,
    'aria_label' => $resolved_trigger_aria_label,
    'variant'    => $resolved_trigger_variant,
    'size'       => $resolved_trigger_size,
    'gradient'   => $resolved_trigger_gradient,
    'icon_name'  => $resolved_trigger_icon_name,
    'icon_only'  => $resolved_trigger_icon_only,
    'icon_position' => $resolved_trigger_icon_position,
    'class'      => $resolved_trigger_class,
    'attributes' => $trigger_attributes,
  ]); ?>
<?php endif; ?>

<div
  id="<?= e($resolved_id); ?>"
  class="<?= e($drawer_resolved_class); ?>"
  role="dialog"
  aria-modal="true"
  aria-hidden="true"
  aria-labelledby="<?= e($resolved_id); ?>-title"
  data-drawer
>
  <aside
    class="<?= e($drawer_panel_resolved_class); ?>"
    data-drawer-panel
    data-drawer-panel-from="<?= e($panel_from_class); ?>"
    data-drawer-panel-to="<?= e($panel_to_class); ?>"
  >
    <header class="<?= e($drawer_header_class); ?>">
      <h5 id="<?= e($resolved_id); ?>-title" class="text-lg font-semibold text-brand-900"><?= e($resolved_title); ?></h5>
      <?php component('button', [
        'label'      => $resolved_close_aria_label,
        'variant'    => $resolved_close_variant,
        'size'       => $resolved_close_size,
        'icon_only'  => true,
        'icon_name'  => $resolved_close_icon_name,
        'aria_label' => $resolved_close_aria_label,
        'attributes' => [
          'data-drawer-close' => true,
        ],
      ]); ?>
    </header>

    <div class="<?= e($drawer_body_class); ?>">
      <?= $resolved_body_html; ?>
    </div>

    <?php if ($resolved_footer_html !== ''): ?>
      <footer class="<?= e($drawer_footer_class); ?>">
        <?= $resolved_footer_html; ?>
      </footer>
    <?php endif; ?>
  </aside>
</div>
