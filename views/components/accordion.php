<?php
declare(strict_types=1);

/**
 * Component: accordion
 * Purpose: Render a details-summary accordion list from passed item data.
 * Anatomy:
 *  - .accordion.w-full
 *    - details.accordion__item.group
 *      - summary.accordion__summary
 *        - .accordion__toggle (chevron icon, start/end via `chevron_position`)
 *        - .accordion__content (optional, when subtitle or icon box is used)
 *          - .accordion__icon-box (optional)
 *          - .accordion__text
 *            - .accordion__title
 *            - .accordion__subtitle (optional)
 *        - .accordion__title (fallback when content block is not used)
 *      - .accordion__panel
 *        - .accordion__panel-text
 *        - .accordion__panel-image (optional)
 * Data Contract:
 * - `items` (array, optional): list of accordion items.
 *   - each item supports `title`/`question` and `content`/`answer`.
 *   - optional `summary_subtitle` (string) for secondary text under summary heading.
 *   - optional `summary_icon_box` (bool) to render a 40x40 leading square in summary.
 *   - optional `summary_icon_name` (string) icon name rendered inside the leading square.
 *   - optional `summary_icon_size` (string|int) icon size rendered inside the leading square.
 *   - optional `summary_icon_box_class` (string) to override leading square classes.
 *   - optional `panel_image_url` (string) to render an image at the bottom of panel content.
 *   - optional `panel_image_alt` (string) alt text for panel image.
 *   - optional `open` (bool) to render an item expanded by default.
 *   - when no item has `open`, the first item is opened by default.
 * - `variant` (string, optional): visual style variant (`line_divided` default, `cards` optional).
 * - `chevron_position` (string, optional): chevron placement (`end` or `start`).
 * - `chevron_icon_name` (string, optional): icon name used for the toggle indicator.
 * - `chevron_open_rotation_class` (string, optional): open-state rotation utility class.
 * - `chevron_background_class` (string, optional): chevron background utility classes.
 * - `chevron_radius_class` (string, optional): chevron border radius utility classes.
 * - `group_name` (string, optional): when set, limits open state to one item per group.
 * - `class_name` (string, optional): additional wrapper classes.
 * - `summary_class` (string, optional): additional classes appended to the `<summary>` element.
 * - `details_class` (string, optional): additional classes appended to the `<details>` element.
 * - `summary_text_class` (string, optional): additional classes appended to the summary text `<span>`.
 * - `panel_class` (string, optional): additional classes appended to the `.accordion__panel` element.
 */

$items = isset($items) && is_array($items)
  ? array_values($items)
  : [];

$class_name               = isset($class_name) ? trim((string) $class_name) : '';
$variant                  = isset($variant) ? trim((string) $variant) : 'line_divided';
$chevron_position         = isset($chevron_position) ? trim((string) $chevron_position) : 'end';
$chevron_icon_name        = isset($chevron_icon_name) ? trim((string) $chevron_icon_name) : 'arrow-down-s-line';
$chevron_open_rotation_class = isset($chevron_open_rotation_class)
  ? trim((string) $chevron_open_rotation_class)
  : 'group-open:-rotate-180';
$chevron_background_class = isset($chevron_background_class) ? trim((string) $chevron_background_class) : '';
$chevron_radius_class     = isset($chevron_radius_class) ? trim((string) $chevron_radius_class) : '';
$group_name               = isset($group_name) ? trim((string) $group_name) : '';
$summary_class            = isset($summary_class) ? trim((string) $summary_class) : '';
$details_class            = isset($details_class) ? trim((string) $details_class) : '';
$summary_text_class       = isset($summary_text_class) ? trim((string) $summary_text_class) : '';
$panel_class              = isset($panel_class) ? trim((string) $panel_class) : '';
$chevron_at_start         = $chevron_position === 'start';
$is_line_divided          = $variant === 'line_divided';
$details_default_class    = $is_line_divided
  ? 'accordion__item group'
  : 'accordion__item group overflow-hidden rounded-lg border border-brand-200 bg-white';
$details_resolved_class   = trim($details_default_class . ' ' . $details_class);
$summary_base_class       = 'accordion__summary cursor-pointer list-none font-medium';
$summary_default_class    = $is_line_divided
  ? 'flex items-center gap-3 py-2'
  : 'flex items-center gap-3 py-3 px-5';
$summary_resolved_class   = $summary_class !== ''
  ? trim($summary_base_class . ' ' . $summary_class)
  : trim($summary_base_class . ' ' . $summary_default_class);
$summary_text_base_class  = $chevron_at_start ? 'accordion__title' : 'accordion__title flex-1';
$summary_text_default_class = '';
$summary_text_resolved_class = $summary_text_class !== ''
  ? trim($summary_text_base_class . ' ' . $summary_text_class)
  : trim($summary_text_base_class . ' ' . $summary_text_default_class);
$panel_default_class = $is_line_divided
  ? 'accordion__panel pb-3'
  : 'accordion__panel px-5 pt-0 pb-4';
$panel_resolved_class = trim($panel_default_class . ' ' . $panel_class);

$default_chevron_background_class = '';
$default_chevron_radius_class     = 'rounded-md';
$resolved_chevron_background_class = $chevron_background_class !== ''
  ? $chevron_background_class
  : $default_chevron_background_class;
$resolved_chevron_radius_class = $chevron_radius_class !== ''
  ? $chevron_radius_class
  : $default_chevron_radius_class;
$chevron_class = trim(
  implode(
    ' ',
    array_filter([
      'accordion__toggle inline-flex h-6 w-6 items-center justify-center transform transition-transform duration-200 shrink-0',
      $chevron_open_rotation_class,
      $resolved_chevron_background_class,
      $resolved_chevron_radius_class,
    ]),
  ),
);

if ($items === []) {
  $items = [
    [
      'title'   => 'What should I prepare before the session?',
      'content' => 'Prepare your preferred outfit, key references, and any mandatory deliverable checklist before arrival.',
    ],
  ];
}

$has_explicit_open = false;

foreach ($items as $item) {
  if (!empty($item['open'])) {
    $has_explicit_open = true;
    break;
  }
}
?>
<div class="accordion w-full <?= e($is_line_divided ? 'divide-y divide-brand-200' : 'space-y-2'); ?> <?= e($class_name); ?>">
  <?php foreach ($items as $item_index => $item): ?>
    <?php
    $summary = isset($item['question']) ? trim((string) $item['question']) : '';
    $content = isset($item['answer']) ? trim((string) $item['answer']) : '';
    $summary_subtitle = isset($item['summary_subtitle']) ? trim((string) $item['summary_subtitle']) : '';
    $summary_icon_box = !empty($item['summary_icon_box']);
    $summary_icon_name = isset($item['summary_icon_name']) ? trim((string) $item['summary_icon_name']) : '';
    $summary_icon_size = isset($item['summary_icon_size']) ? trim((string) $item['summary_icon_size']) : '16';
    $panel_image_url = isset($item['panel_image_url']) ? trim((string) $item['panel_image_url']) : '';
    $panel_image_alt = isset($item['panel_image_alt']) ? trim((string) $item['panel_image_alt']) : '';
    $summary_icon_box_class = isset($item['summary_icon_box_class'])
      ? trim((string) $item['summary_icon_box_class'])
      : 'inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-md border border-brand-300';

    if ($summary === '') {
      $summary = isset($item['title']) ? trim((string) $item['title']) : '';
    }

    if ($content === '') {
      $content = isset($item['content']) ? trim((string) $item['content']) : '';
    }

    $is_open = !empty($item['open']) || (!$has_explicit_open && $item_index === 0);
    ?>
    <?php if ($summary === '' || $content === ''): ?>
      <?php continue; ?>
    <?php endif; ?>
    <details
      class="<?= e($details_resolved_class); ?>"
      <?= $is_open ? 'open' : ''; ?>
      <?= $group_name !== '' ? 'name="' . e($group_name) . '"' : ''; ?>
    >
      <summary class="<?= e($summary_resolved_class); ?>">
        <?php if ($chevron_at_start): ?>
          <span class="<?= e($chevron_class); ?>">
            <?php icon($chevron_icon_name, ['icon_size' => '16']); ?>
          </span>
          <?php if ($summary_subtitle !== '' || $summary_icon_box): ?>
            <span class="accordion__content flex flex-1 items-center gap-3">
              <?php if ($summary_icon_box): ?>
                <span class="<?= e(trim('accordion__icon-box ' . $summary_icon_box_class)); ?>" aria-hidden="true">
                  <?php if ($summary_icon_name !== ''): ?>
                    <?php icon($summary_icon_name, ['icon_size' => $summary_icon_size]); ?>
                  <?php endif; ?>
                </span>
              <?php endif; ?>
              <span class="accordion__text min-w-0">
                <span class="accordion__title block leading-5 text-brand-900"><?= e($summary); ?></span>
                <?php if ($summary_subtitle !== ''): ?>
                  <span class="accordion__subtitle block font-normal leading-5 text-brand-500"><?= e($summary_subtitle); ?></span>
                <?php endif; ?>
              </span>
            </span>
          <?php else: ?>
            <span class="<?= e($summary_text_resolved_class); ?>"><?= e($summary); ?></span>
          <?php endif; ?>
        <?php else: ?>
          <?php if ($summary_subtitle !== '' || $summary_icon_box): ?>
            <span class="accordion__content flex flex-1 items-center gap-3">
              <?php if ($summary_icon_box): ?>
                <span class="<?= e(trim('accordion__icon-box ' . $summary_icon_box_class)); ?>" aria-hidden="true">
                  <?php if ($summary_icon_name !== ''): ?>
                    <?php icon($summary_icon_name, ['icon_size' => $summary_icon_size]); ?>
                  <?php endif; ?>
                </span>
              <?php endif; ?>
              <span class="accordion__text min-w-0">
                <span class="accordion__title block leading-5 text-brand-900"><?= e($summary); ?></span>
                <?php if ($summary_subtitle !== ''): ?>
                  <span class="accordion__subtitle block font-normal leading-5 text-brand-500"><?= e($summary_subtitle); ?></span>
                <?php endif; ?>
              </span>
            </span>
          <?php else: ?>
            <span class="<?= e($summary_text_resolved_class); ?>"><?= e($summary); ?></span>
          <?php endif; ?>
          <span class="<?= e($chevron_class); ?>">
            <?php icon($chevron_icon_name, ['icon_size' => '16']); ?>
          </span>
        <?php endif; ?>
      </summary>
      <div class="<?= e($panel_resolved_class); ?>">
        <span class="accordion__panel-text block"><?= e($content); ?></span>
        <?php if ($panel_image_url !== ''): ?>
          <img
            src="<?= e($panel_image_url); ?>"
            alt="<?= e($panel_image_alt); ?>"
            class="accordion__panel-image mt-4 aspect-[3/1] w-full rounded-md object-cover"
            loading="lazy"
          >
        <?php endif; ?>
      </div>
    </details>
  <?php endforeach; ?>
</div>
