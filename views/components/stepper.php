<?php
declare(strict_types=1);

/**
 * Component: stepper
 * Purpose: Render one API-driven workflow stepper with semantic state, labels, and optional descriptions.
 * Anatomy:
 * - .stepper
 *   - ol.stepper__list
 *     - li.stepper__item
 *       - .stepper__marker
 *       - .stepper__body
 *         - .stepper__title
 *         - .stepper__description (optional)
 * Data Contract:
 * - `items` (array, optional): list of steps.
 *   - each item supports `title`, `description`, `state` (`completed`, `current`, `upcoming`), `href`.
 * - `orientation` (string, optional): `horizontal` or `vertical`. Default: `horizontal`.
 * - `size` (string, optional): `sm`, `md`. Default: `md`.
 * - `show_numbers` (bool, optional): render numeric index for pending/current states. Default: true.
 * - `class_name` (string, optional): additional root classes.
 */

$items         = isset($items) && is_array($items) ? array_values($items) : [];
$orientation   = isset($orientation) ? trim((string) $orientation) : 'horizontal';
$size          = isset($size) ? trim((string) $size) : 'md';
$show_numbers  = !isset($show_numbers) || (bool) $show_numbers;
$class_name    = isset($class_name) ? trim((string) $class_name) : '';

if ($items === []) {
  $items = [
    ['title' => 'Details', 'state' => 'completed'],
    ['title' => 'Schedule', 'state' => 'current'],
    ['title' => 'Confirm', 'state' => 'upcoming'],
  ];
}

if ($orientation !== 'vertical') {
  $orientation = 'horizontal';
}

if ($size !== 'sm') {
  $size = 'md';
}

$size_map = [
  'sm' => ['marker' => 'h-6 w-6 text-xs', 'title' => 'text-xs', 'copy' => 'text-xs'],
  'md' => ['marker' => 'h-7 w-7 ', 'title' => '', 'copy' => ''],
];

$horizontal_grid_cols_map = [
  1 => 'lg:grid-cols-1',
  2 => 'lg:grid-cols-2',
  3 => 'lg:grid-cols-3',
  4 => 'lg:grid-cols-4',
  5 => 'lg:grid-cols-5',
  6 => 'lg:grid-cols-6',
];

$state_map = [
  'completed' => [
    'marker' => 'bg-positive-600 text-white ring-positive-600',
    'title'  => 'text-brand-900',
    'copy'   => 'text-brand-600',
  ],
  'current' => [
    'marker' => 'bg-primary-600 text-white ring-primary-600',
    'title'  => 'text-brand-900',
    'copy'   => 'text-brand-600',
  ],
  'upcoming' => [
    'marker' => 'bg-white text-brand-600 ring-brand-300',
    'title'  => 'text-brand-600',
    'copy'   => 'text-brand-500',
  ],
];

$root_classes = trim(implode(' ', array_filter([
  'stepper w-full',
  $class_name,
])));

$horizontal_grid_cols = $horizontal_grid_cols_map[min(count($items), 6)];
$list_classes = $orientation === 'vertical'
  ? 'stepper__list space-y-4'
  : 'stepper__list grid gap-4 sm:grid-cols-2 ' . $horizontal_grid_cols;
?>
<nav class="<?= e($root_classes); ?>" aria-label="Progress">
  <ol class="<?= e($list_classes); ?>">
    <?php foreach ($items as $index => $item): ?>
      <?php
      $step_title = isset($item['title']) ? trim((string) $item['title']) : 'Step ' . ($index + 1);
      $step_description = isset($item['description']) ? trim((string) $item['description']) : '';
      $step_state = isset($item['state']) ? trim((string) $item['state']) : 'upcoming';
      $step_href  = isset($item['href']) ? trim((string) $item['href']) : '';

      if (!isset($state_map[$step_state])) {
        $step_state = 'upcoming';
      }

      $is_current = $step_state === 'current';
      $step_item_classes = $orientation === 'vertical'
        ? 'stepper__item relative flex items-start gap-3'
        : 'stepper__item relative flex items-start gap-3 rounded-lg border border-brand-200 bg-white p-3';
      ?>
      <li class="<?= e($step_item_classes); ?>">
        <span class="stepper__marker inline-flex shrink-0 items-center justify-center rounded-full ring-1 <?= e($size_map[$size]['marker']); ?> <?= e($state_map[$step_state]['marker']); ?>">
          <?php if ($step_state === 'completed'): ?>
            <?php component('icon', [
              'icon_name'  => 'check-line',
              'icon_size'  => $size === 'sm' ? '14' : '16',
              'icon_class' => 'text-current',
            ]); ?>
          <?php elseif ($show_numbers): ?>
            <?= e((string) ($index + 1)); ?>
          <?php endif; ?>
        </span>

        <div class="stepper__body min-w-0">
          <?php if ($step_href !== ''): ?>
            <a
              class="stepper__title block font-semibold hover:underline <?= e($size_map[$size]['title']); ?> <?= e($state_map[$step_state]['title']); ?>"
              href="<?= e($step_href); ?>"
              <?= $is_current ? 'aria-current="step"' : ''; ?>
            >
              <?= e($step_title); ?>
            </a>
          <?php else: ?>
            <p
              class="stepper__title font-semibold <?= e($size_map[$size]['title']); ?> <?= e($state_map[$step_state]['title']); ?>"
              <?= $is_current ? 'aria-current="step"' : ''; ?>
            >
              <?= e($step_title); ?>
            </p>
          <?php endif; ?>

          <?php if ($step_description !== ''): ?>
            <p class="stepper__description mt-1 <?= e($size_map[$size]['copy']); ?> <?= e($state_map[$step_state]['copy']); ?>">
              <?= e($step_description); ?>
            </p>
          <?php endif; ?>
        </div>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>
