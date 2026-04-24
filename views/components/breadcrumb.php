<?php
declare(strict_types=1);

/**
 * Component: breadcrumb
 * Purpose: Render an API-driven breadcrumb with configurable items, separators, and compact sizing.
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
 *   - `icon_name` (string, optional): Leading icon for each item when enabled.
 *   - `icon_size` (string|int, optional): Icon size. Default: `16`.
 *   - `icon_class` (string, optional): Additional icon class.
 * - `separator` (string, optional): `slash` or `chevron`. Default: `slash`.
 * - `separator_icon_name` (string, optional): Icon name for `chevron` separator. Default: `arrow-right-s-line`.
 * - `size` (string, optional): `md` or `sm`. Default: `md`.
 * - `show_item_icons` (bool, optional): Render leading item icons. Default: false.
 * - `aria_label` (string, optional): Navigation label. Default: `Breadcrumb`.
 * - `class` (string, optional): Extra class on `<nav>`.
 * - `list_class` (string, optional): Extra class on `.breadcrumb__list`.
 * - `item_class` (string, optional): Extra class on `.breadcrumb__item`.
 * - `link_class` (string, optional): Extra class on `.breadcrumb__link`.
 * - `current_class` (string, optional): Extra class on current item text.
 * - `separator_class` (string, optional): Extra class on `.breadcrumb__separator`.
 */
$resolved_items = isset($items) && is_array($items) ? $items : [
  ['label' => 'Home', 'href' => '#'],
  ['label' => 'Library', 'href' => '#'],
  ['label' => 'Components', 'href' => '#'],
  ['label' => 'Breadcrumb', 'current' => true],
];

$resolved_separator = isset($separator) && is_string($separator) ? trim($separator) : 'slash';
if ($resolved_separator !== 'slash' && $resolved_separator !== 'chevron') {
  $resolved_separator = 'slash';
}

$resolved_size = isset($size) && is_string($size) ? trim($size) : 'md';
if ($resolved_size !== 'md' && $resolved_size !== 'sm') {
  $resolved_size = 'md';
}

$resolved_show_item_icons = isset($show_item_icons) ? (bool) $show_item_icons : false;
$resolved_aria_label = isset($aria_label) && is_string($aria_label) && trim($aria_label) !== ''
  ? trim($aria_label)
  : 'Breadcrumb';
$resolved_separator_icon_name = isset($separator_icon_name) && is_string($separator_icon_name) && trim($separator_icon_name) !== ''
  ? trim($separator_icon_name)
  : 'arrow-right-s-line';

$resolved_class = isset($class) && is_string($class) ? trim($class) : '';
$resolved_list_class = isset($list_class) && is_string($list_class) ? trim($list_class) : '';
$resolved_item_class = isset($item_class) && is_string($item_class) ? trim($item_class) : '';
$resolved_link_class = isset($link_class) && is_string($link_class) ? trim($link_class) : '';
$resolved_current_class = isset($current_class) && is_string($current_class) ? trim($current_class) : '';
$resolved_separator_class = isset($separator_class) && is_string($separator_class) ? trim($separator_class) : '';

$size_list_class = $resolved_size === 'sm' ? 'gap-1.5 text-xs' : 'gap-2 ';
$size_item_class = $resolved_size === 'sm' ? 'gap-1.5' : 'gap-2';
$size_icon_gap_class = $resolved_size === 'sm' ? 'gap-1' : 'gap-1.5';

$nav_classes = trim(implode(' ', array_filter([
  'breadcrumb',
  $resolved_size === 'sm' ? 'breadcrumb--sm' : '',
  $resolved_class,
])));

$list_classes = trim(implode(' ', array_filter([
  'breadcrumb__list flex flex-wrap items-center',
  $size_list_class,
  $resolved_list_class,
])));

if ($resolved_items === []) {
  return;
}
?>
<nav class="<?= e($nav_classes); ?>" aria-label="<?= e($resolved_aria_label); ?>">
  <ol class="<?= e($list_classes); ?>">
    <?php foreach ($resolved_items as $index => $item): ?>
      <?php
      $item_label = isset($item['label']) ? trim((string) $item['label']) : '';
      $item_href = isset($item['href']) ? trim((string) $item['href']) : '';
      $item_is_current = isset($item['current']) ? (bool) $item['current'] : false;
      $item_icon_name = isset($item['icon_name']) ? trim((string) $item['icon_name']) : '';
      $item_icon_size = isset($item['icon_size']) ? trim((string) $item['icon_size']) : '16';
      $item_icon_class = isset($item['icon_class']) ? trim((string) $item['icon_class']) : '';

      $is_last_item = $index === array_key_last($resolved_items);
      $render_as_current = $item_is_current || $is_last_item || $item_href === '';
      $show_item_icon = $resolved_show_item_icons && $item_icon_name !== '';
      $item_icon_props = [
        'icon_size'  => $item_icon_size,
        'icon_class' => $item_icon_class,
      ];

      if ($item_label === '') {
        continue;
      }

      $item_classes = trim(implode(' ', array_filter([
        'breadcrumb__item inline-flex items-center',
        $size_item_class,
        $resolved_item_class,
      ])));

      $link_classes = trim(implode(' ', array_filter([
        'breadcrumb__link text-inherit',
        $show_item_icon ? 'inline-flex items-center ' . $size_icon_gap_class : '',
        $resolved_link_class,
      ])));

      $current_classes = trim(implode(' ', array_filter([
        $show_item_icon ? 'inline-flex items-center ' . $size_icon_gap_class : '',
        'text-inherit',
        $resolved_current_class,
      ])));

      $separator_classes = trim(implode(' ', array_filter([
        'breadcrumb__separator text-inherit opacity-60',
        $resolved_separator_class,
      ])));
      ?>
      <li class="<?= e($item_classes); ?>">
        <?php if ($render_as_current): ?>
          <span class="<?= e($current_classes); ?>" <?= $item_is_current || $is_last_item ? 'aria-current="page"' : ''; ?>>
            <?php if ($show_item_icon): ?>
              <?php icon($item_icon_name, $item_icon_props); ?>
            <?php endif; ?>
            <span><?= e($item_label); ?></span>
          </span>
        <?php else: ?>
          <a class="<?= e($link_classes); ?>" href="<?= e($item_href); ?>">
            <?php if ($show_item_icon): ?>
              <?php icon($item_icon_name, $item_icon_props); ?>
            <?php endif; ?>
            <span><?= e($item_label); ?></span>
          </a>
        <?php endif; ?>

        <?php if (!$is_last_item): ?>
          <?php if ($resolved_separator === 'chevron'): ?>
            <?php icon($resolved_separator_icon_name, [
              'icon_size'  => '16',
              'icon_class' => $separator_classes,
            ]); ?>
          <?php else: ?>
            <span class="<?= e($separator_classes); ?>" aria-hidden="true">/</span>
          <?php endif; ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>
