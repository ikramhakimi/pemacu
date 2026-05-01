<?php
declare(strict_types=1);

/**
 * Component: pagination
 * Purpose: Render one API-driven pagination control with optional item range context.
 * Anatomy:
 * - nav.pagination[data-pagination]
 *   - p.pagination__info (optional)
 *   - .pagination__controls
 *     - button.btn|a.btn (Prev)
 *     - .pagination__pages[data-pagination-pages]
 *       - button[data-pagination-page]|a[data-pagination-page]
 *       - span (ellipsis)
 *     - button.btn|a.btn (Next)
 * Data Contract:
 * - `pagination` (array, optional): primary API payload for component state.
 * - `pagination.current_page` (int): current page number. Default: 1.
 * - `pagination.per_page` (int): items per page. Default: 10.
 * - `pagination.total_items` (int): total dataset size. Default: 100.
 * - `pagination.total_pages` (int, optional): explicit total pages. Computed when omitted.
 * - `pagination.page_window` (int, optional): neighbor page window around current page. Default: 1.
 * - `pagination.base_url` (string, optional): base url used to generate page links.
 * - `pagination.page_param` (string, optional): query parameter for page. Default: `page`.
 * - `pagination.query` (array, optional): extra query parameters for generated links.
 * - `pagination.links` (array, optional): explicit `prev`, `next`, and `pages` link objects.
 * - `pagination.show_info` (bool, optional): show "Showing X-Y of Z". Default: false.
 * - `pagination.aria_label` (string, optional): navigation label. Default: "Pagination".
 * - `pagination.class_name` (string, optional): extra classes for wrapper node.
 * - `pagination.attributes` (array, optional): extra attributes for `<nav>`.
 * - Legacy top-level props (`current_page`, `per_page`, `total_items`, etc.) remain supported.
 */

$pagination_payload = isset($pagination) && is_array($pagination) ? $pagination : [];

$current_page = array_key_exists('current_page', $pagination_payload)
  ? (int) $pagination_payload['current_page']
  : (isset($current_page) ? (int) $current_page : 1);
$per_page = array_key_exists('per_page', $pagination_payload)
  ? (int) $pagination_payload['per_page']
  : (isset($per_page) ? (int) $per_page : 10);
$total_items = array_key_exists('total_items', $pagination_payload)
  ? (int) $pagination_payload['total_items']
  : (isset($total_items) ? (int) $total_items : 100);
$total_pages = array_key_exists('total_pages', $pagination_payload)
  ? (int) $pagination_payload['total_pages']
  : (isset($total_pages) ? (int) $total_pages : 0);
$page_window = array_key_exists('page_window', $pagination_payload)
  ? (int) $pagination_payload['page_window']
  : 1;
$base_url = array_key_exists('base_url', $pagination_payload)
  ? trim((string) $pagination_payload['base_url'])
  : '';
$page_param = array_key_exists('page_param', $pagination_payload)
  ? trim((string) $pagination_payload['page_param'])
  : 'page';
$query = array_key_exists('query', $pagination_payload) && is_array($pagination_payload['query'])
  ? $pagination_payload['query']
  : [];
$links = array_key_exists('links', $pagination_payload) && is_array($pagination_payload['links'])
  ? $pagination_payload['links']
  : [];
$show_info = array_key_exists('show_info', $pagination_payload)
  ? (bool) $pagination_payload['show_info']
  : !empty($show_info);
$aria_label = array_key_exists('aria_label', $pagination_payload)
  ? trim((string) $pagination_payload['aria_label'])
  : (isset($aria_label) ? trim((string) $aria_label) : 'Pagination');
$class_name = array_key_exists('class_name', $pagination_payload)
  ? trim((string) $pagination_payload['class_name'])
  : (isset($class_name) ? trim((string) $class_name) : '');
$attributes = array_key_exists('attributes', $pagination_payload) && is_array($pagination_payload['attributes'])
  ? $pagination_payload['attributes']
  : (isset($attributes) && is_array($attributes) ? $attributes : []);

if ($per_page < 1) {
  $per_page = 10;
}

if ($total_items < 0) {
  $total_items = 0;
}

$computed_total_pages = max(1, (int) ceil($total_items / $per_page));
$total_pages          = $total_pages > 0 ? $total_pages : $computed_total_pages;
$total_pages          = max(1, $total_pages);
$current_page = max(1, min($current_page, $total_pages));
$page_window  = max(1, $page_window);
$page_param   = $page_param !== '' ? $page_param : 'page';

$range_start = $total_items > 0 ? (($current_page - 1) * $per_page) + 1 : 0;
$range_end   = $total_items > 0 ? min($current_page * $per_page, $total_items) : 0;

$build_page_url = static function (int $page_number) use ($base_url, $query, $page_param): string {
  if ($base_url === '') {
    return '';
  }

  $resolved_query               = $query;
  $resolved_query[$page_param]  = $page_number;
  $query_string                 = http_build_query($resolved_query);

  if ($query_string === '') {
    return $base_url;
  }

  $separator = str_contains($base_url, '?') ? '&' : '?';
  return $base_url . $separator . $query_string;
};

$build_page_tokens = static function (int $current, int $total, int $window): array {
  $max_visible_without_ellipsis = ($window * 2) + 5;

  if ($total <= $max_visible_without_ellipsis) {
    return range(1, $total);
  }

  $window_start = max(2, $current - $window);
  $window_end   = min($total - 1, $current + $window);
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

$resolved_pages = [];

if (isset($links['pages']) && is_array($links['pages'])) {
  foreach ($links['pages'] as $page_item) {
    if (is_array($page_item) && isset($page_item['type']) && (string) $page_item['type'] === 'ellipsis') {
      $resolved_pages[] = [
        'type'  => 'ellipsis',
        'label' => '...',
      ];
      continue;
    }

    $page_number = is_array($page_item)
      ? (isset($page_item['page']) ? (int) $page_item['page'] : 0)
      : (int) $page_item;

    if ($page_number < 1) {
      continue;
    }

    $resolved_pages[] = [
      'type'       => 'page',
      'page'       => $page_number,
      'label'      => is_array($page_item) && isset($page_item['label']) ? (string) $page_item['label'] : (string) $page_number,
      'url'        => is_array($page_item) && isset($page_item['url']) ? trim((string) $page_item['url']) : $build_page_url($page_number),
      'is_current' => is_array($page_item) && array_key_exists('is_current', $page_item)
        ? (bool) $page_item['is_current']
        : $page_number === $current_page,
    ];
  }
} else {
  $tokens = $build_page_tokens($current_page, $total_pages, $page_window);

  foreach ($tokens as $token) {
    if ($token === '...') {
      $resolved_pages[] = [
        'type'  => 'ellipsis',
        'label' => '...',
      ];
      continue;
    }

    $page_number = (int) $token;

    $resolved_pages[] = [
      'type'       => 'page',
      'page'       => $page_number,
      'label'      => (string) $page_number,
      'url'        => $build_page_url($page_number),
      'is_current' => $page_number === $current_page,
    ];
  }
}

$prev_link          = isset($links['prev']) && is_array($links['prev']) ? $links['prev'] : [];
$next_link          = isset($links['next']) && is_array($links['next']) ? $links['next'] : [];
$prev_page          = max(1, $current_page - 1);
$next_page          = min($total_pages, $current_page + 1);
$prev_label         = isset($prev_link['label']) ? (string) $prev_link['label'] : 'Prev';
$next_label         = isset($next_link['label']) ? (string) $next_link['label'] : 'Next';
$prev_href          = isset($prev_link['url']) ? trim((string) $prev_link['url']) : $build_page_url($prev_page);
$next_href          = isset($next_link['url']) ? trim((string) $next_link['url']) : $build_page_url($next_page);
$is_prev_disabled   = $current_page <= 1 || (!empty($prev_link['disabled']));
$is_next_disabled   = $current_page >= $total_pages || (!empty($next_link['disabled']));

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value_attr) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value_attr)) {
      if ($value_attr) {
        $compiled[] = $key;
      }
      continue;
    }

    if ($value_attr === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value_attr) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$nav_attributes                              = $attributes;
$nav_attributes['class']                     = trim(implode(' ', array_filter([
  'pagination',
  $class_name,
  isset($nav_attributes['class']) ? trim((string) $nav_attributes['class']) : '',
])));
$nav_attributes['aria-label']                = $aria_label;
$nav_attributes['data-pagination']           = true;
$nav_attributes['data-pagination-current-page'] = (string) $current_page;
$nav_attributes['data-pagination-total-pages']  = (string) $total_pages;
$nav_attributes['data-pagination-total-items']  = (string) $total_items;
$nav_attributes['data-pagination-per-page']     = (string) $per_page;
?>
<nav<?= $render_attributes($nav_attributes); ?>>
  <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
    <?php if ($show_info): ?>
      <p class="pagination__info  text-brand-700">
        Showing <span data-pagination-range><?= e((string) $range_start); ?>-<?= e((string) $range_end); ?></span> of
        <span data-pagination-total><?= e((string) $total_items); ?></span>
      </p>
    <?php endif; ?>

    <div class="pagination__controls inline-flex items-center gap-2">
      <?php component('button', [
        'label'      => $prev_label,
        'href'       => $prev_href,
        'variant'    => 'secondary',
        'size'       => 'md',
        'gradient'   => true,
        'icon_name'  => 'arrow-left-line',
        'disabled'   => $is_prev_disabled,
        'attributes' => [
          'data-pagination-prev' => true,
          'aria-label'           => 'Go to previous page',
        ],
      ]); ?>

      <div
        class="pagination__pages inline-flex items-center gap-2
          [&>[data-pagination-page]]:inline-flex
          [&>[data-pagination-page]]:h-[var(--ui-h-md)]
          [&>[data-pagination-page]]:min-w-10
          [&>[data-pagination-page]]:items-center
          [&>[data-pagination-page]]:justify-center
          [&>[data-pagination-page]]:rounded-lg
          [&>[data-pagination-page]]:border
          [&>[data-pagination-page]]:border-brand-200
          [&>[data-pagination-page]]:bg-white
          [&>[data-pagination-page]]:px-3
          [&>[data-pagination-page]]:text-sm
          [&>[data-pagination-page]]:font-semibold
          [&>[data-pagination-page]]:text-brand-700
          [&>[data-pagination-page]]:transition
          [&>[data-pagination-page]:not([aria-current=page])]:hover:border-brand-300
          [&>[data-pagination-page]:not([aria-current=page])]:hover:text-brand-900
          [&>[data-pagination-page][aria-current=page]]:border-brand-900
          [&>[data-pagination-page][aria-current=page]]:bg-brand-900
          [&>[data-pagination-page][aria-current=page]]:text-white
          [&>span[aria-hidden=true]]:inline-flex
          [&>span[aria-hidden=true]]:h-[var(--ui-h-md)]
          [&>span[aria-hidden=true]]:min-w-7
          [&>span[aria-hidden=true]]:items-center
          [&>span[aria-hidden=true]]:justify-center
          [&>span[aria-hidden=true]]:px-1
          [&>span[aria-hidden=true]]:text-sm
          [&>span[aria-hidden=true]]:text-brand-500"
        data-pagination-pages
      >
        <?php foreach ($resolved_pages as $page_item): ?>
          <?php if ($page_item['type'] === 'ellipsis'): ?>
            <span aria-hidden="true">...</span>
            <?php continue; ?>
          <?php endif; ?>
          <?php
          $page_number      = (int) $page_item['page'];
          $page_label       = (string) $page_item['label'];
          $page_url         = (string) $page_item['url'];
          $is_current_page  = !empty($page_item['is_current']);
          ?>
          <?php if ($page_url !== ''): ?>
            <a
              href="<?= e($page_url); ?>"
              data-pagination-page="<?= e((string) $page_number); ?>"
              <?= $is_current_page ? 'aria-current="page"' : ''; ?>
              aria-label="Go to page <?= e((string) $page_number); ?>"
            >
              <?= e($page_label); ?>
            </a>
          <?php else: ?>
            <button
              type="button"
              data-pagination-page="<?= e((string) $page_number); ?>"
              <?= $is_current_page ? 'aria-current="page"' : ''; ?>
              aria-label="Go to page <?= e((string) $page_number); ?>"
            >
              <?= e($page_label); ?>
            </button>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <?php component('button', [
        'label'         => $next_label,
        'href'          => $next_href,
        'variant'       => 'secondary',
        'size'          => 'md',
        'gradient'      => true,
        'icon_name'     => 'arrow-right-line',
        'icon_position' => 'right',
        'disabled'      => $is_next_disabled,
        'attributes'    => [
          'data-pagination-next' => true,
          'aria-label'           => 'Go to next page',
        ],
      ]); ?>
    </div>
  </div>
  <p class="sr-only" aria-live="polite" data-pagination-live></p>
</nav>
