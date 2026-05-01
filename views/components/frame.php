<?php

declare(strict_types=1);

/**
 * Component: frame
 * Purpose: Render one frame container with configurable variant and panel layout.
 * Anatomy:
 * - .frame
 *   - .frame__header
 *     - .frame__title
 *     - .frame__subtitle
 *   - .frame__content
 *     - .frame__panel
 *   - .frame__footer (optional)
 * Data Contract:
 * - `variant` (string): `base`, `stacked`, `dense`, `dense-stacked`, `ghost`, `ghost-dark`.
 * - `panel_count` (int): Number of panel items. Supported: `1`, `2`.
 * - `show_footer` (bool): Show footer row.
 * - `title` (string): Header title text.
 * - `subtitle` (string): Header subtitle text.
 * - `panel_text` (string): Repeated panel text.
 * - `panel_html_items` (array): Optional HTML content per panel. When provided,
 *   each item is rendered inside one panel in order.
 * - `render_panel_wrapper` (bool): Render default panel wrapper styles. Defaults to `true`.
 * - `footer_text` (string): Footer text.
 * - `class_name` (string): Additional wrapper classes.
 * - `instance_id` (string): Optional custom id for collapse target.
 */

$variant     = isset($variant) ? trim((string) $variant) : 'base';
$panel_count = isset($panel_count) ? (int) $panel_count : 1;
$show_footer = isset($show_footer) ? (bool) $show_footer : false;
$title       = isset($title) ? trim((string) $title) : 'Frame Title';
$subtitle    = isset($subtitle) ? trim((string) $subtitle) : 'Description for the frame subtitle';
$panel_text  = isset($panel_text) ? trim((string) $panel_text) : 'Frame Content';
$panel_html_items = isset($panel_html_items) && is_array($panel_html_items) ? $panel_html_items : [];
$render_panel_wrapper = isset($render_panel_wrapper) ? (bool) $render_panel_wrapper : true;
$footer_text = isset($footer_text) ? trim((string) $footer_text) : 'Frame Footer';
$class_name  = isset($class_name) ? trim((string) $class_name) : '';
$instance_id = isset($instance_id) ? trim((string) $instance_id) : '';

$allowed_variants = ['base', 'stacked', 'dense', 'dense-stacked', 'ghost', 'ghost-dark'];
if (!in_array($variant, $allowed_variants, true)) {
  $variant = 'base';
}

if ($panel_count < 1) {
  $panel_count = 1;
}

if ($panel_count > 2) {
  $panel_count = 2;
}

if ($panel_html_items !== []) {
  $panel_count = count($panel_html_items);
}

if ($instance_id === '') {
  $instance_id = 'frame-content-' . (string) mt_rand(100000, 999999);
}

$variant_classes = [
  'base'          => 'bg-brand-200 rounded-lg p-1 ring-1 ring-brand-300 space-y-1',
  'stacked'       => 'frame--stacked bg-brand-200 rounded-lg p-1 ring-1 ring-brand-300 space-y-1',
  'dense'         => 'frame--dense bg-brand-200 rounded-lg ring-1 ring-brand-300',
  'dense-stacked' => 'frame--dense-stacked bg-brand-200 rounded-lg ring-1 ring-brand-300',
  'ghost'         => 'frame--ghost bg-brand-200 rounded-lg p-1 space-y-1',
  'ghost-dark'    => 'frame--ghost-dark bg-brand-900 rounded-lg p-1 space-y-1',
];

$header_padding_classes = [
  'base'          => 'p-4',
  'stacked'       => 'p-4',
  'dense'         => 'p-5',
  'dense-stacked' => 'p-5',
  'ghost'         => 'p-4',
  'ghost-dark'    => 'p-4',
];

$content_classes = [
  'base'          => 'space-y-1',
  'stacked'       => '',
  'dense'         => 'space-y-1',
  'dense-stacked' => '',
  'ghost'         => 'space-y-1',
  'ghost-dark'    => 'space-y-1',
];

$panel_classes = [
  'base'          => 'bg-white rounded-lg p-4 ring-1 ring-brand-300',
  'stacked'       => 'bg-white first:rounded-t-lg last:rounded-b-lg p-4 ring-1 ring-brand-300',
  'dense'         => 'bg-white rounded-lg p-5 ring-1 ring-brand-300',
  'dense-stacked' => 'bg-white first:rounded-t-lg last:rounded-b-lg p-5 ring-1 ring-brand-300',
  'ghost'         => 'bg-white rounded-lg p-4 ring-1 ring-brand-300',
  'ghost-dark'    => 'bg-white rounded-lg p-4',
];

$title_class = $variant === 'ghost-dark' ? ' text-white' : '';
$subtitle_class = $variant === 'ghost-dark' ? 'frame__subtitle text-brand-300' : 'frame__subtitle';

$wrapper_class = trim(implode(' ', array_filter([
  'frame',
  $variant_classes[$variant],
  $class_name,
])));

$content_class = trim(implode(' ', array_filter([
  'frame__content',
  $content_classes[$variant],
])));

$toggle_button_class = $variant === 'ghost-dark'
  ? 'frame__toggle inline-flex size-8 items-center justify-center rounded-md text-brand-300 hover:bg-brand-800 hover:text-white'
  : 'frame__toggle inline-flex size-8 items-center justify-center rounded-md text-brand-600 hover:bg-brand-200 hover:text-brand-900';

$toggle_icon_class = $variant === 'ghost-dark'
  ? 'transition-transform duration-200 text-current'
  : 'transition-transform duration-200 text-current';
?>
<div class="<?= e($wrapper_class); ?>">
  <div class="frame__header flex items-center justify-between gap-3 <?= e($header_padding_classes[$variant]); ?>">
    <div class="min-w-0 flex-1">
      <div class="frame__title text-base font-semibold <?= e($title_class); ?>"><?= e($title); ?></div>
      <div class="<?= e($subtitle_class); ?>"><?= e($subtitle); ?></div>
    </div>
    <button
      type="button"
      class="<?= e($toggle_button_class); ?> js-component-frame-toggle"
      aria-expanded="true"
      aria-controls="<?= e($instance_id); ?>"
      aria-label="Toggle frame content"
    >
      <span class="<?= e($toggle_icon_class); ?> size-5 leading-none js-component-frame-chevron">
        <?php component('icon', [
          'icon_name'  => 'arrow-down-s-line',
          'icon_size'  => '20',
          'icon_class' => 'text-current',
        ]); ?>
      </span>
    </button>
  </div>

  <div id="<?= e($instance_id); ?>" class="<?= e($content_class); ?> js-component-frame-content">
    <?php for ($panel_index = 0; $panel_index < $panel_count; $panel_index++): ?>
      <?php
      $panel_has_html = isset($panel_html_items[$panel_index]);
      if (!$render_panel_wrapper && $panel_has_html):
      ?>
        <?= (string) $panel_html_items[$panel_index]; ?>
      <?php else: ?>
        <div class="frame__panel <?= e($panel_classes[$variant]); ?>">
          <?php if ($panel_has_html): ?>
            <?= (string) $panel_html_items[$panel_index]; ?>
          <?php else: ?>
            <?= e($panel_text); ?>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    <?php endfor; ?>
  </div>

  <?php if ($show_footer): ?>
    <div class="frame__footer <?= e($header_padding_classes[$variant]); ?>">
      <?= e($footer_text); ?>
    </div>
  <?php endif; ?>
</div>
