<?php
declare(strict_types=1);

/**
 * Component: dropdown-navigation
 * Purpose: Render a lightweight navigation dropdown for grouped link destinations.
 * Anatomy:
 * - .dropdown
 *   - .dropdown__trigger
 *   - .dropdown__menu
 *     - .dropdown__item
 * Data Contract:
 * - $dropdown_id: optional unique id suffix for trigger/menu pairing.
 * - $dropdown_label: optional trigger label text.
 * - $dropdown_align: optional menu alignment ('left' or 'right').
 * - $dropdown_links: optional list of
 *   ['label' => string, 'href' => string, 'item_class' => string, 'li_class' => string] links.
 * - $trigger_class: optional trigger class override.
 */

$resolved_dropdown_id = isset($dropdown_id) && is_string($dropdown_id) && trim($dropdown_id) !== ''
  ? preg_replace('/[^a-z0-9_-]/i', '-', trim($dropdown_id))
  : 'navigation';
$resolved_dropdown_id = is_string($resolved_dropdown_id) && $resolved_dropdown_id !== '' ? $resolved_dropdown_id : 'navigation';

$resolved_dropdown_label = isset($dropdown_label) && is_string($dropdown_label) && trim($dropdown_label) !== ''
  ? trim($dropdown_label)
  : 'Resources';

$resolved_dropdown_align = isset($dropdown_align) && in_array($dropdown_align, ['left', 'right'], true)
  ? $dropdown_align
  : 'left';

$resolved_trigger_class = isset($trigger_class) && is_string($trigger_class) && trim($trigger_class) !== ''
  ? trim($trigger_class)
  : 'dropdown__trigger inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700 hover:text-brand-900';

$resolved_dropdown_links = isset($dropdown_links) && is_array($dropdown_links) && $dropdown_links !== []
  ? $dropdown_links
  : [
      ['label' => 'Documentation', 'href' => '#'],
      ['label' => 'Release notes', 'href' => '#'],
      ['label' => 'Status page', 'href' => '#'],
    ];

$menu_position_class = $resolved_dropdown_align === 'right' ? 'right-0' : 'left-0';
?>
<div class="dropdown relative inline-block" data-dropdown data-dropdown-align="<?= e($resolved_dropdown_align); ?>">
  <button
    id="dropdown-trigger-<?= e($resolved_dropdown_id); ?>"
    class="<?= e($resolved_trigger_class); ?>"
    type="button"
    aria-haspopup="menu"
    aria-expanded="false"
    aria-controls="dropdown-menu-<?= e($resolved_dropdown_id); ?>"
    data-dropdown-trigger
  >
    <span><?= e($resolved_dropdown_label); ?></span>
    <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
  </button>

  <ul
    id="dropdown-menu-<?= e($resolved_dropdown_id); ?>"
    class="dropdown__menu absolute <?= e($menu_position_class); ?> z-20 mt-2 hidden min-w-[240px] list-none rounded-lg border border-brand-300 bg-white p-1 shadow-lg"
    role="menu"
    aria-labelledby="dropdown-trigger-<?= e($resolved_dropdown_id); ?>"
    data-dropdown-menu
  >
    <?php foreach ($resolved_dropdown_links as $dropdown_link): ?>
      <?php
      $link_label = isset($dropdown_link['label']) ? (string) $dropdown_link['label'] : '';
      $link_href  = isset($dropdown_link['href']) ? (string) $dropdown_link['href'] : '#';
      $link_item_class = isset($dropdown_link['item_class']) && is_string($dropdown_link['item_class'])
        ? trim($dropdown_link['item_class'])
        : '';
      $link_li_class = isset($dropdown_link['li_class']) && is_string($dropdown_link['li_class'])
        ? trim($dropdown_link['li_class'])
        : '';
      $link_li_class_attribute = $link_li_class !== '' ? ' class="' . e($link_li_class) . '"' : '';
      $link_class = 'dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900';
      if ($link_item_class !== '') {
        $link_class .= ' ' . $link_item_class;
      }
      ?>
      <li<?= $link_li_class_attribute; ?> role="none">
        <a class="<?= e($link_class); ?>" href="<?= e($link_href); ?>" role="menuitem"><?= e($link_label); ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
