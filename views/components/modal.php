<?php
declare(strict_types=1);

/**
 * Component: modal
 * Purpose: Render one API-driven modal with configurable trigger, header, content, and footer actions.
 * Anatomy:
 * - .modal (root overlay)
 *   - .modal__panel
 *     - .modal__header (optional)
 *     - .modal__body
 *     - .modal__actions (optional)
 * Data Contract:
 * - `id` (string, required): unique DOM id used by opener and modal root.
 * - `title` (string, optional): modal title. Default: `Modal`.
 * - `description` (string, optional): helper text shown below title.
 * - `header_html` (string|callable, optional): trusted HTML rendered at the top of `.modal__header`.
 * - `size` (string, optional): `sm`, `md`, `lg`, `xl`, `2xl`, `full`. Default: `md`.
 * - `show_trigger` (bool, optional): render trigger button. Default: `true`.
 * - `trigger` (array, optional):
 *   - `label` (string, optional): trigger label. Default: `Open Modal`.
 *   - `aria_label` (string, optional): trigger aria-label.
 *   - `variant` (string, optional): trigger button variant. Default: `default`.
 *   - `size` (string, optional): trigger button size. Default: `md`.
 *   - `gradient` (bool, optional): gradient trigger style. Default: false.
 *   - `icon_name` (string, optional): trigger icon.
 *   - `icon_only` (bool, optional): icon-only trigger style. Default: false.
 *   - `icon_position` (string, optional): `left` or `right`. Default: `left`.
 *   - `class` (string, optional): extra trigger classes.
 *   - `attributes` (array, optional): extra trigger attributes.
 * - `body_html` (string|callable, optional): trusted HTML for modal body.
 *   - Accepts `string` or `callable` that echoes trusted HTML.
 * - `footer_html` (string|callable, optional): trusted HTML for modal footer/actions.
 *   - Accepts `string` or `callable` that echoes trusted HTML.
 * - `show_close_button` (bool, optional): render header close button. Default: `true`.
 * - `close_button` (array, optional):
 *   - `aria_label` (string, optional): close button aria-label. Default: `Close modal`.
 *   - `icon_name` (string, optional): close icon name. Default: `close-line`.
 * - `classes` (array, optional): extra class hooks:
 *   - `overlay`, `panel`, `header`, `body`, `footer`, `title`, `description`, `close`.
 * - `attributes` (array, optional): additional attributes for modal root element.
 * - Backward-compatible aliases are supported:
 *   - `modal_id`, `modal_title`, `modal_description`, `modal_header_html`, `modal_size`, `modal_show_trigger`,
 *     `modal_trigger_label`, `modal_trigger_variant`, `modal_trigger_size`, `modal_body_html`,
 *     `modal_footer_html`, `modal_show_close_button`, `modal_overlay_class`, `modal_panel_class`.
 */

$resolved_id = isset($id) && is_string($id) && trim($id) !== ''
  ? trim($id)
  : (isset($modal_id) && is_string($modal_id) ? trim($modal_id) : '');
$resolved_title = isset($title) && is_string($title) && trim($title) !== ''
  ? trim($title)
  : (isset($modal_title) ? trim((string) $modal_title) : 'Modal');
$resolved_description = isset($description) && is_string($description)
  ? trim($description)
  : (isset($modal_description) ? trim((string) $modal_description) : '');
$resolved_header_html = isset($header_html)
  ? $header_html
  : (isset($modal_header_html) ? $modal_header_html : '');
$resolved_size = isset($size) && is_string($size) && trim($size) !== ''
  ? trim($size)
  : (isset($modal_size) ? trim((string) $modal_size) : 'md');

$resolved_show_trigger = isset($show_trigger)
  ? (bool) $show_trigger
  : (isset($modal_show_trigger) ? (bool) $modal_show_trigger : true);
$resolved_show_close_button = isset($show_close_button)
  ? (bool) $show_close_button
  : (isset($modal_show_close_button) ? (bool) $modal_show_close_button : true);

$trigger = isset($trigger) && is_array($trigger) ? $trigger : [];
$close_button = isset($close_button) && is_array($close_button) ? $close_button : [];
$classes = isset($classes) && is_array($classes) ? $classes : [];
$resolved_attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

$resolved_trigger_label = isset($trigger['label']) && is_string($trigger['label']) && trim($trigger['label']) !== ''
  ? trim($trigger['label'])
  : (isset($modal_trigger_label) ? trim((string) $modal_trigger_label) : 'Open Modal');
$resolved_trigger_aria_label = isset($trigger['aria_label']) && is_string($trigger['aria_label']) && trim($trigger['aria_label']) !== ''
  ? trim($trigger['aria_label'])
  : '';
$resolved_trigger_variant = isset($trigger['variant']) && is_string($trigger['variant']) && trim($trigger['variant']) !== ''
  ? trim($trigger['variant'])
  : (isset($modal_trigger_variant) ? trim((string) $modal_trigger_variant) : 'default');
$resolved_trigger_size = isset($trigger['size']) && is_string($trigger['size']) && trim($trigger['size']) !== ''
  ? trim($trigger['size'])
  : (isset($modal_trigger_size) ? trim((string) $modal_trigger_size) : 'md');
$resolved_trigger_gradient = isset($trigger['gradient']) ? (bool) $trigger['gradient'] : false;
$resolved_trigger_icon_name = isset($trigger['icon_name']) && is_string($trigger['icon_name'])
  ? trim($trigger['icon_name'])
  : '';
$resolved_trigger_icon_only = isset($trigger['icon_only']) ? (bool) $trigger['icon_only'] : false;
$resolved_trigger_icon_position = isset($trigger['icon_position']) && is_string($trigger['icon_position']) && trim($trigger['icon_position']) !== ''
  ? trim($trigger['icon_position'])
  : 'left';
$resolved_trigger_class = isset($trigger['class']) && is_string($trigger['class'])
  ? trim($trigger['class'])
  : '';
$resolved_trigger_attributes = isset($trigger['attributes']) && is_array($trigger['attributes'])
  ? $trigger['attributes']
  : [];

$resolved_body_html = isset($body_html)
  ? $body_html
  : (isset($modal_body_html) ? $modal_body_html : '');
$resolved_footer_html = isset($footer_html)
  ? $footer_html
  : (isset($modal_footer_html) ? $modal_footer_html : '');

$resolved_close_aria_label = isset($close_button['aria_label']) && is_string($close_button['aria_label']) && trim($close_button['aria_label']) !== ''
  ? trim($close_button['aria_label'])
  : 'Close modal';
$resolved_close_icon_name = isset($close_button['icon_name']) && is_string($close_button['icon_name']) && trim($close_button['icon_name']) !== ''
  ? trim($close_button['icon_name'])
  : 'close-line';

$resolved_overlay_class = isset($classes['overlay']) && is_string($classes['overlay']) ? trim($classes['overlay']) : '';
$resolved_panel_class = isset($classes['panel']) && is_string($classes['panel']) ? trim($classes['panel']) : '';
$resolved_header_class = isset($classes['header']) && is_string($classes['header']) ? trim($classes['header']) : '';
$resolved_body_class = isset($classes['body']) && is_string($classes['body']) ? trim($classes['body']) : '';
$resolved_footer_class = isset($classes['footer']) && is_string($classes['footer']) ? trim($classes['footer']) : '';
$resolved_title_class = isset($classes['title']) && is_string($classes['title']) ? trim($classes['title']) : '';
$resolved_description_class = isset($classes['description']) && is_string($classes['description'])
  ? trim($classes['description'])
  : '';
$resolved_close_class = isset($classes['close']) && is_string($classes['close']) ? trim($classes['close']) : '';

if ($resolved_overlay_class === '' && isset($modal_overlay_class) && is_string($modal_overlay_class)) {
  $resolved_overlay_class = trim($modal_overlay_class);
}
if ($resolved_panel_class === '' && isset($modal_panel_class) && is_string($modal_panel_class)) {
  $resolved_panel_class = trim($modal_panel_class);
}

if ($resolved_id === '') {
  return;
}

$size_map = [
  'sm'   => 'max-w-sm',
  'md'   => 'max-w-md',
  'lg'   => 'max-w-lg',
  'xl'   => 'max-w-xl',
  '2xl'  => 'max-w-2xl',
  'full' => 'max-w-5xl',
];

if (!isset($size_map[$resolved_size])) {
  $resolved_size = 'md';
}

$resolved_title_id = $resolved_id . '-title';
$resolved_show_header = $resolved_title !== '' || $resolved_description !== '' || $resolved_show_close_button;

$modal_overlay_class = trim(
  'modal fixed inset-0 z-50 hidden flex items-center justify-center bg-brand-900/70 p-4 ' . $resolved_overlay_class,
);
$modal_panel_class = trim(
  'modal__panel w-full rounded-xl bg-white shadow-2xl ' . $size_map[$resolved_size] . ' ' . $resolved_panel_class,
);
$modal_header_class = trim(
  'modal__header relative flex items-start justify-between gap-4 px-5 pt-5 ' . $resolved_header_class,
);
$modal_body_class = trim('modal__body px-5 py-4 text-brand-700 ' . $resolved_body_class);
$modal_footer_class = trim(
  'modal__actions flex items-center justify-end gap-2 px-5 py-4 ' . $resolved_footer_class,
);
$modal_title_class = trim('text-lg font-semibold text-brand-900 ' . $resolved_title_class);
$modal_description_class = trim('mt-1 text-sm text-brand-600 ' . $resolved_description_class);

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

$resolve_content_html = static function ($content): string {
  if (is_callable($content)) {
    ob_start();
    $content();
    return (string) ob_get_clean();
  }

  if ($content === null) {
    return '';
  }

  return (string) $content;
};

$resolved_body_content_html = $resolve_content_html($resolved_body_html);
$resolved_footer_content_html = $resolve_content_html($resolved_footer_html);
$resolved_header_content_html = $resolve_content_html($resolved_header_html);

$trigger_attributes = array_merge([
  'aria-haspopup'      => 'dialog',
  'aria-expanded'      => 'false',
  'data-modal-open'    => true,
  'data-modal-target'  => $resolved_id,
], $resolved_trigger_attributes);

$modal_attributes = array_merge($resolved_attributes, [
  'id'         => $resolved_id,
  'class'      => $modal_overlay_class,
  'role'       => 'dialog',
  'aria-modal' => 'true',
  'aria-hidden' => 'true',
  'data-modal' => true,
]);

if ($resolved_title !== '') {
  $modal_attributes['aria-labelledby'] = $resolved_title_id;
} else {
  $modal_attributes['aria-label'] = 'Modal';
}
?>
<?php if ($resolved_show_trigger): ?>
  <?php component('button', [
    'label'         => $resolved_trigger_label,
    'aria_label'    => $resolved_trigger_aria_label,
    'variant'       => $resolved_trigger_variant,
    'size'          => $resolved_trigger_size,
    'gradient'      => $resolved_trigger_gradient,
    'icon_name'     => $resolved_trigger_icon_name,
    'icon_only'     => $resolved_trigger_icon_only,
    'icon_position' => $resolved_trigger_icon_position,
    'class'         => $resolved_trigger_class,
    'attributes'    => $trigger_attributes,
  ]); ?>
<?php endif; ?>

<div<?= $render_attributes($modal_attributes); ?>>
  <div class="<?= e($modal_panel_class); ?>">
    <?php if ($resolved_show_header): ?>
      <header class="<?= e($modal_header_class); ?>">
        <div class="min-w-0 flex-1">
          <?php if ($resolved_header_content_html !== ''): ?>
            <?= $resolved_header_content_html; ?>
          <?php endif; ?>

          <?php if ($resolved_title !== ''): ?>
            <h5 id="<?= e($resolved_title_id); ?>" class="<?= e($modal_title_class); ?>"><?= e($resolved_title); ?></h5>
          <?php endif; ?>

          <?php if ($resolved_description !== ''): ?>
            <p class="<?= e($modal_description_class); ?>"><?= e($resolved_description); ?></p>
          <?php endif; ?>
        </div>

        <?php if ($resolved_show_close_button): ?>
          <button
            class="modal__close absolute right-3 top-3 m-0 inline-flex h-8 w-8 items-center justify-center rounded-md border border-transparent bg-transparent text-brand-500 transition-colors hover:bg-brand-100 hover:text-brand-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-500 <?= e($resolved_close_class); ?>"
            type="button"
            aria-label="<?= e($resolved_close_aria_label); ?>"
            data-modal-close
          >
            <?php icon($resolved_close_icon_name, ['icon_size' => '20']); ?>
          </button>
        <?php endif; ?>
      </header>
    <?php endif; ?>

    <div class="<?= e($modal_body_class); ?>">
      <?= $resolved_body_content_html; ?>
    </div>

    <?php if ($resolved_footer_content_html !== ''): ?>
      <footer class="<?= e($modal_footer_class); ?>">
        <?= $resolved_footer_content_html; ?>
      </footer>
    <?php endif; ?>
  </div>
</div>
