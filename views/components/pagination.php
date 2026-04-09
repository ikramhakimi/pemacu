<?php
declare(strict_types=1);

/**
 * Component: pagination
 * Purpose: Render a data-driven pagination control with optional item range info.
 * Anatomy:
 * - nav.pagination[data-pagination]
 *   - p.pagination__info (optional)
 *   - .pagination__controls
 *     - button.btn (Prev)
 *     - .pagination__pages[data-pagination-pages]
 *       - button[data-pagination-page]
 *       - span (ellipsis)
 *     - button.btn (Next)
 * Data Contract:
 * - `current_page` (int, optional): current page number. Default: 1.
 * - `per_page` (int, optional): items per page. Default: 10.
 * - `total_items` (int, optional): total dataset size. Default: 100.
 * - `show_info` (bool, optional): show "Showing X-Y of Z". Default: false.
 * - `aria_label` (string, optional): navigation label. Default: "Pagination".
 * - `class_name` (string, optional): extra classes for wrapper node.
 */

$current_page = isset($current_page) ? (int) $current_page : 1;
$per_page     = isset($per_page) ? (int) $per_page : 10;
$total_items  = isset($total_items) ? (int) $total_items : 100;
$show_info    = !empty($show_info);
$aria_label   = isset($aria_label) ? trim((string) $aria_label) : 'Pagination';
$class_name   = isset($class_name) ? trim((string) $class_name) : '';

if ($per_page < 1) {
  $per_page = 10;
}

if ($total_items < 0) {
  $total_items = 0;
}

$total_pages = max(1, (int) ceil($total_items / $per_page));
$current_page = max(1, min($current_page, $total_pages));

$range_start = $total_items > 0 ? (($current_page - 1) * $per_page) + 1 : 0;
$range_end   = $total_items > 0 ? min($current_page * $per_page, $total_items) : 0;

$page_tokens = static function (int $current, int $total): array {
  if ($total <= 7) {
    return range(1, $total);
  }

  $window_start = max(2, $current - 1);
  $window_end   = min($total - 1, $current + 1);
  $tokens       = [1];

  if ($window_start > 2) {
    $tokens[] = '...';
  }

  for ($page_number = $window_start; $page_number <= $window_end; $page_number++) {
    $tokens[] = $page_number;
  }

  if ($window_end < $total - 1) {
    $tokens[] = '...';
  }

  $tokens[] = $total;

  return $tokens;
};

$tokens = $page_tokens($current_page, $total_pages);
?>
<nav
  class="pagination w-full <?= e($class_name); ?>"
  aria-label="<?= e($aria_label); ?>"
  data-pagination
  data-pagination-current-page="<?= e((string) $current_page); ?>"
  data-pagination-total-pages="<?= e((string) $total_pages); ?>"
  data-pagination-total-items="<?= e((string) $total_items); ?>"
  data-pagination-per-page="<?= e((string) $per_page); ?>"
>
  <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <?php if ($show_info): ?>
      <p class="pagination__info text-sm text-brand-700">
        Showing <span data-pagination-range><?= e((string) $range_start); ?>-<?= e((string) $range_end); ?></span> of
        <span data-pagination-total><?= e((string) $total_items); ?></span>
      </p>
    <?php endif; ?>

    <div class="pagination__controls inline-flex items-center gap-2">
      <?php component('button', [
        'label'      => 'Prev',
        'variant'    => 'default',
        'size'       => 'md',
        'gradient'   => true,
        'icon_name'  => 'arrow-left-s-line',
        'disabled'   => $current_page <= 1,
        'attributes' => [
          'data-pagination-prev' => true,
          'aria-label'           => 'Go to previous page',
        ],
      ]); ?>

      <div class="pagination__pages inline-flex items-center gap-2" data-pagination-pages>
        <?php foreach ($tokens as $token): ?>
          <?php if ($token === '...'): ?>
            <span class="inline-flex h-[var(--ui-h-md)] min-w-7 items-center justify-center px-1 text-sm text-brand-500" aria-hidden="true">...</span>
            <?php continue; ?>
          <?php endif; ?>
          <?php
          $page_number      = (int) $token;
          $is_current_page  = $page_number === $current_page;
          $page_button_base = 'inline-flex h-[var(--ui-h-md)] min-w-10 items-center justify-center rounded-lg border px-3 text-sm font-semibold transition';
          $page_button_tone = $is_current_page
            ? 'border-brand-900 bg-brand-900 text-white'
            : 'border-brand-200 bg-white text-brand-700 hover:border-brand-300 hover:text-brand-900';
          ?>
          <button
            type="button"
            class="<?= e($page_button_base . ' ' . $page_button_tone); ?>"
            data-pagination-page="<?= e((string) $page_number); ?>"
            <?= $is_current_page ? 'aria-current="page"' : ''; ?>
            aria-label="Go to page <?= e((string) $page_number); ?>"
          >
            <?= e((string) $page_number); ?>
          </button>
        <?php endforeach; ?>
      </div>

      <?php component('button', [
        'label'         => 'Next',
        'variant'       => 'default',
        'size'          => 'md',
        'gradient'      => true,
        'icon_name'     => 'arrow-right-s-line',
        'icon_position' => 'right',
        'disabled'      => $current_page >= $total_pages,
        'attributes'    => [
          'data-pagination-next' => true,
          'aria-label'           => 'Go to next page',
        ],
      ]); ?>
    </div>
  </div>
  <p class="sr-only" aria-live="polite" data-pagination-live></p>
</nav>
