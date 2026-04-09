<?php
declare(strict_types=1);

/**
 * Component: accordion
 * Purpose: Render a details-summary accordion list from passed item data.
 * Anatomy:
 *  - .accordion
 *    - details.group
 *      - summary
 *        - .accordion__summary-content
 *        - .accordion__summary-icon
 *      - .accordion__panel
 * Data Contract:
 * - `items` (array, optional): list of accordion items.
 *   - each item supports `title`/`question` and `content`/`answer`.
 *   - optional `open` (bool) to render an item expanded by default.
 * - `variant` (string, optional): visual style variant (`cards` or `line_divided`).
 * - `chevron_position` (string, optional): chevron placement (`end` or `start`).
 * - `chevron_background_class` (string, optional): chevron background utility classes.
 * - `chevron_radius_class` (string, optional): chevron border radius utility classes.
 * - `class_name` (string, optional): additional wrapper classes.
 */

$items = isset($items) && is_array($items)
  ? array_values($items)
  : [];

$class_name               = isset($class_name) ? trim((string) $class_name) : '';
$variant                  = isset($variant) ? trim((string) $variant) : 'cards';
$chevron_position         = isset($chevron_position) ? trim((string) $chevron_position) : 'end';
$chevron_background_class = isset($chevron_background_class) ? trim((string) $chevron_background_class) : '';
$chevron_radius_class     = isset($chevron_radius_class) ? trim((string) $chevron_radius_class) : '';
$chevron_at_start         = $chevron_position === 'start';
$is_line_divided          = $variant === 'line_divided';

$default_chevron_background_class = $is_line_divided ? '' : 'bg-brand-100';
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
      'inline-flex h-6 w-6 items-center justify-center transition-transform duration-200 group-open:rotate-90 shrink-0',
      $is_line_divided ? 'text-brand-500' : 'text-brand-600',
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
?>
<div class="accordion <?= e($is_line_divided ? 'divide-y divide-brand-200' : 'space-y-3'); ?> <?= e($class_name); ?>">
  <?php foreach ($items as $item): ?>
    <?php
    $summary = isset($item['question']) ? trim((string) $item['question']) : '';
    $content = isset($item['answer']) ? trim((string) $item['answer']) : '';

    if ($summary === '') {
      $summary = isset($item['title']) ? trim((string) $item['title']) : '';
    }

    if ($content === '') {
      $content = isset($item['content']) ? trim((string) $item['content']) : '';
    }

    $is_open = !empty($item['open']);
    ?>
    <?php if ($summary === '' || $content === ''): ?>
      <?php continue; ?>
    <?php endif; ?>
    <details class="<?= e($is_line_divided ? 'group' : 'group overflow-hidden rounded-lg border border-brand-200 bg-white'); ?>" <?= $is_open ? 'open' : ''; ?>>
      <summary class="<?= e($is_line_divided ? 'flex cursor-pointer list-none items-center gap-3 py-4' : 'flex cursor-pointer list-none items-center gap-3 px-6 py-5'); ?>">
        <?php if ($chevron_at_start): ?>
          <span class="<?= e($chevron_class); ?>">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
          <span class="font-medium text-lg text-brand-900"><?= e($summary); ?></span>
        <?php else: ?>
          <span class="font-medium text-lg text-brand-900 flex-1"><?= e($summary); ?></span>
          <span class="<?= e($chevron_class); ?>">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        <?php endif; ?>
      </summary>
      <div class="<?= e($is_line_divided ? 'accordion__panel pb-4 text-base text-brand-700' : 'accordion__panel p-5 pt-0 text-base'); ?>">
        <div class="max-w-2xl"><?= e($content); ?></div>
      </div>
    </details>
  <?php endforeach; ?>
</div>
