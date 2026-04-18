<?php
declare(strict_types=1);

/**
 * Component: breadcrumb-chevron
 * Purpose: Render a breadcrumb with chevron icon separators for directional hierarchy cues.
 * Anatomy:
 * - .breadcrumb
 *   - .breadcrumb__list
 *     - .breadcrumb__item
 *       - .breadcrumb__link
 *       - .breadcrumb__separator
 * Data Contract:
 * - `items` (array, optional): Breadcrumb nodes ordered from parent to current.
 *   - `label` (string, required)
 *   - `href` (string, optional): If missing, item is rendered as text.
 *   - `current` (bool, optional): Marks current item with `aria-current="page"`.
 * - `aria_label` (string, optional): Navigation label. Default: "Breadcrumb".
 * - `class` (string, optional): Extra class on `<nav>`.
 */

$resolved_items = isset($items) && is_array($items) ? $items : [
  ['label' => 'Home', 'href' => '#'],
  ['label' => 'Library', 'href' => '#'],
  ['label' => 'Components', 'href' => '#'],
  ['label' => 'Breadcrumb', 'current' => true],
];
$resolved_aria_label = isset($aria_label) && is_string($aria_label) && trim($aria_label) !== ''
  ? trim($aria_label)
  : 'Breadcrumb';
$resolved_class = isset($class) && is_string($class) ? trim($class) : '';
$resolved_nav_class = $resolved_class !== '' ? 'breadcrumb ' . $resolved_class : 'breadcrumb';

if ($resolved_items === []) {
  return;
}
?>
<nav class="<?= e($resolved_nav_class); ?>" aria-label="<?= e($resolved_aria_label); ?>">
  <ol class="breadcrumb__list flex flex-wrap items-center gap-2 text-sm">
    <?php foreach ($resolved_items as $index => $item): ?>
      <?php
      $item_label = isset($item['label']) ? trim((string) $item['label']) : '';
      $item_href  = isset($item['href']) ? trim((string) $item['href']) : '';
      $item_is_current = isset($item['current']) ? (bool) $item['current'] : false;
      $is_last_item = $index === array_key_last($resolved_items);

      if ($item_label === '') {
        continue;
      }
      ?>
      <li class="breadcrumb__item inline-flex items-center gap-2">
        <?php if ($item_is_current || $is_last_item || $item_href === ''): ?>
          <span class="text-brand-900" <?= $item_is_current || $is_last_item ? 'aria-current="page"' : ''; ?>>
            <?= e($item_label); ?>
          </span>
        <?php else: ?>
          <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="<?= e($item_href); ?>">
            <?= e($item_label); ?>
          </a>
        <?php endif; ?>

        <?php if (!$is_last_item): ?>
          <span class="breadcrumb__separator text-brand-400" aria-hidden="true">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>
