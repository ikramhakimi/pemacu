<?php

declare(strict_types=1);

/**
 * Component: study-activity-heatmap
 * Purpose: Render a read-only daily study activity heatmap for completed quiz attempts.
 * Anatomy:
 * - .card.study-activity-heatmap
 *   - .card__header
 *     - .card__title
 *     - .card__subtitle
 *   - .card__content
 *     - .study-activity-heatmap__meta
 *     - .study-activity-heatmap__grid
 *   - .card__footer
 *     - .study-activity-heatmap__legend
 * Data Contract:
 * - `items` (array, required): ordered day cells with date, label, count, and level.
 * - `weeks` (int, optional): number of week columns. Default: 52.
 * - `title` (string, optional): component heading text.
 * - `subtitle` (string, optional): component supporting text.
 * - `class_name` (string, optional): extra root classes.
 */

$items      = isset($items) && is_array($items) ? array_values($items) : [];
$weeks      = isset($weeks) ? max(1, (int) $weeks) : 52;
$title      = isset($title) ? trim((string) $title) : 'Aktiviti Belajar';
$subtitle   = isset($subtitle)
  ? trim((string) $subtitle)
  : 'Cubaan kuiz selesai sepanjang tahun ini.';
$class_name = isset($class_name) ? trim((string) $class_name) : '';

$level_class_map = [
  0 => 'bg-brand-100 border-brand-200',
  1 => 'bg-positive-100 border-positive-200',
  2 => 'bg-positive-300 border-positive-300',
  3 => 'bg-positive-500 border-positive-500',
];

$week_items     = array_chunk($items, 7);
$total_attempts = array_sum(array_map(
  static fn (array $item): int => isset($item['count']) ? (int) $item['count'] : 0,
  $items
));
$active_days = count(array_filter(
  $items,
  static fn (array $item): bool => isset($item['count']) && (int) $item['count'] > 0
));

$root_extra_class = trim(implode(' ', array_filter([
  'study-activity-heatmap bg-white',
  $class_name,
])));
?>
<article class="<?php card($root_extra_class); ?>">
  <div class="card__header px-4 pt-4">
    <h3 class="card__title text-base font-semibold text-brand-900"><?= e($title); ?></h3>
    <?php if ($subtitle !== ''): ?>
      <p class="card__subtitle mt-1 text-brand-500"><?= e($subtitle); ?></p>
    <?php endif; ?>
  </div>

  <div class="card__content p-4">
    <div class="study-activity-heatmap__meta mb-4 flex gap-3 text-sm text-brand-500">
      <span><?= e((string) $active_days); ?> hari aktif</span>
      <span><?= e((string) $total_attempts); ?> cubaan</span>
    </div>

    <div class="overflow-x-auto">
      <div
        class="study-activity-heatmap__grid flex w-full min-w-max gap-1"
        role="list"
        aria-label="<?= e($title); ?>"
      >
        <?php foreach ($week_items as $week): ?>
          <div class="flex min-w-3 flex-1 flex-col gap-1">
            <?php foreach ($week as $item): ?>
              <?php
              $level      = isset($item['level']) ? (int) $item['level'] : 0;
              $level      = max(0, min(3, $level));
              $label      = isset($item['label']) ? trim((string) $item['label']) : '0 cubaan';
              $date       = isset($item['date']) ? trim((string) $item['date']) : '';
              $cell_class = $level_class_map[$level];
              ?>
              <span
                class="block aspect-square rounded-sm border <?= e($cell_class); ?>"
                role="listitem"
                aria-label="<?= e($label); ?>"
                title="<?= e($label); ?>"
                <?php if ($date !== ''): ?>
                  data-date="<?= e($date); ?>"
                <?php endif; ?>
              ></span>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="card__footer px-4 pb-4">
    <div class="study-activity-heatmap__legend flex items-center justify-center gap-2 text-xs text-brand-500">
      <span>Kurang Aktif</span>
      <?php foreach ($level_class_map as $level_class): ?>
        <span class="block size-3 rounded-sm border <?= e($level_class); ?>"></span>
      <?php endforeach; ?>
      <span>Sangat Aktif</span>
    </div>
  </div>
</article>
