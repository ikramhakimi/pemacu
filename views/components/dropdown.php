<?php
declare(strict_types=1);

/**
 * Component: dropdown
 * Purpose: Render an API-driven dropdown with configurable trigger, alignment, and menu items.
 * Anatomy:
 * - .dropdown
 *   - .dropdown__trigger
 *   - .dropdown__menu
 *     - .dropdown__label
 *     - .dropdown__item
 * Data Contract:
 * - `dropdown_id` (string, optional): ID suffix used by trigger/menu pairing.
 * - `align` (string, optional): `left` or `right`. Default: `left`.
 * - `trigger` (array, optional):
 *   - `type` (string): `button` or `link`. Default: `button`.
 *   - `label` (string): Trigger label text. Default: `Options`.
 *   - `aria_label` (string, optional): ARIA label override.
 *   - `class` (string, optional): Extra class for trigger element.
 *   - `icon_name` (string, optional): Trigger icon name.
 *   - `icon_position` (string, optional): `left` or `right`. Default: `right`.
 *   - `icon_only` (bool, optional): Use icon-only trigger.
 *   - `variant` (string, optional): Button variant. Default: `secondary`.
 *   - `size` (string, optional): Button size. Default: `md`.
 *   - `gradient` (bool, optional): Button gradient. Default: true.
 * - `menu` (array, optional):
 *   - `class` (string, optional): Extra classes for menu node.
 *   - `min_width_class` (string, optional): Width class. Default: `min-w-[220px]`.
 * - `items` (array, optional): Menu rows.
 *   - Label row: `['type' => 'label', 'label' => 'Quick Actions']`
 *   - Divider row: `['type' => 'divider']`
 *   - Link row: `['label' => 'Edit', 'href' => '#', 'item_class' => '...']`
 *   - Button row: `['type' => 'button', 'label' => 'Delete', 'item_class' => '...', 'disabled' => true]`
 */

$resolved_dropdown_id = isset($dropdown_id) && is_string($dropdown_id) && trim($dropdown_id) !== ''
  ? trim($dropdown_id)
  : uniqid('dropdown-', false);
$resolved_dropdown_id = preg_replace('/[^a-z0-9_-]/i', '-', $resolved_dropdown_id);
$resolved_dropdown_id = is_string($resolved_dropdown_id) && $resolved_dropdown_id !== ''
  ? $resolved_dropdown_id
  : 'dropdown';

$resolved_align = isset($align) && is_string($align) && in_array(trim($align), ['left', 'right'], true)
  ? trim($align)
  : 'left';

$trigger = isset($trigger) && is_array($trigger) ? $trigger : [];
$menu    = isset($menu) && is_array($menu) ? $menu : [];

$resolved_trigger_type = isset($trigger['type']) && is_string($trigger['type']) && in_array(trim($trigger['type']), ['button', 'link'], true)
  ? trim($trigger['type'])
  : 'button';
$resolved_trigger_label = isset($trigger['label']) && is_string($trigger['label']) && trim($trigger['label']) !== ''
  ? trim($trigger['label'])
  : 'Options';
$resolved_trigger_aria_label = isset($trigger['aria_label']) && is_string($trigger['aria_label']) && trim($trigger['aria_label']) !== ''
  ? trim($trigger['aria_label'])
  : $resolved_trigger_label;
$resolved_trigger_class = isset($trigger['class']) && is_string($trigger['class']) ? trim($trigger['class']) : '';
$resolved_trigger_icon_name = isset($trigger['icon_name']) && is_string($trigger['icon_name']) ? trim($trigger['icon_name']) : 'arrow-down-s-line';
$resolved_trigger_icon_position = isset($trigger['icon_position']) && is_string($trigger['icon_position']) && in_array(trim($trigger['icon_position']), ['left', 'right'], true)
  ? trim($trigger['icon_position'])
  : 'right';
$resolved_trigger_icon_only = isset($trigger['icon_only']) ? (bool) $trigger['icon_only'] : false;
$resolved_trigger_variant = isset($trigger['variant']) && is_string($trigger['variant']) && trim($trigger['variant']) !== ''
  ? trim($trigger['variant'])
  : 'secondary';
$resolved_trigger_size = isset($trigger['size']) && is_string($trigger['size']) && trim($trigger['size']) !== ''
  ? trim($trigger['size'])
  : 'md';
$resolved_trigger_gradient = isset($trigger['gradient']) ? (bool) $trigger['gradient'] : true;

$resolved_menu_class = isset($menu['class']) && is_string($menu['class']) ? trim($menu['class']) : '';
$resolved_menu_min_width_class = isset($menu['min_width_class']) && is_string($menu['min_width_class']) && trim($menu['min_width_class']) !== ''
  ? trim($menu['min_width_class'])
  : 'min-w-[220px]';

$resolved_items = isset($items) && is_array($items) && $items !== []
  ? $items
  : [
      ['type' => 'label', 'label' => 'Quick Actions'],
      ['label' => 'Edit details', 'href' => '#'],
      ['label' => 'Duplicate entry', 'href' => '#'],
      ['type' => 'divider'],
      ['type' => 'label', 'label' => 'Danger Zone'],
      [
        'type'     => 'button',
        'label'    => 'Transfer ownership (disabled)',
        'disabled' => true,
        'item_class' => 'cursor-not-allowed text-brand-400',
      ],
      [
        'type'      => 'button',
        'label'     => 'Delete workspace',
        'item_class' => 'text-negative-700 hover:bg-negative-50',
      ],
    ];

$resolved_menu_position_class = $resolved_align === 'right' ? 'right-0' : 'left-0';
$resolved_menu_classes = trim(implode(' ', array_filter([
  'dropdown__menu absolute ' . $resolved_menu_position_class . ' z-20 mt-2 hidden list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg',
  $resolved_menu_min_width_class,
  $resolved_menu_class,
])));
?>
<div class="dropdown relative inline-block" data-dropdown data-dropdown-align="<?= e($resolved_align); ?>">
  <?php if ($resolved_trigger_type === 'link'): ?>
    <a
      id="dropdown-trigger-<?= e($resolved_dropdown_id); ?>"
      class="<?= e(trim('dropdown__trigger inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700 hover:text-brand-900 hover:underline ' . $resolved_trigger_class)); ?>"
      href="#"
      aria-label="<?= e($resolved_trigger_aria_label); ?>"
      aria-haspopup="menu"
      aria-expanded="false"
      aria-controls="dropdown-menu-<?= e($resolved_dropdown_id); ?>"
      data-dropdown-trigger
    >
      <span><?= e($resolved_trigger_label); ?></span>
      <?php if ($resolved_trigger_icon_name !== ''): ?>
        <?php icon($resolved_trigger_icon_name, ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
      <?php endif; ?>
    </a>
  <?php else: ?>
    <?php component('button', [
      'id'            => 'dropdown-trigger-' . $resolved_dropdown_id,
      'label'         => $resolved_trigger_label,
      'aria_label'    => $resolved_trigger_aria_label,
      'variant'       => $resolved_trigger_variant,
      'gradient'      => $resolved_trigger_gradient,
      'size'          => $resolved_trigger_size,
      'icon_name'     => $resolved_trigger_icon_name,
      'icon_position' => $resolved_trigger_icon_position,
      'icon_only'     => $resolved_trigger_icon_only,
      'class'         => trim('dropdown__trigger ' . $resolved_trigger_class),
      'attributes'    => [
        'aria-haspopup'         => 'menu',
        'aria-expanded'         => 'false',
        'aria-controls'         => 'dropdown-menu-' . $resolved_dropdown_id,
        'data-dropdown-trigger' => true,
      ],
    ]); ?>
  <?php endif; ?>

  <ul
    id="dropdown-menu-<?= e($resolved_dropdown_id); ?>"
    class="<?= e($resolved_menu_classes); ?>"
    role="menu"
    aria-labelledby="dropdown-trigger-<?= e($resolved_dropdown_id); ?>"
    data-dropdown-menu
  >
    <?php foreach ($resolved_items as $item): ?>
      <?php
      $item_type = isset($item['type']) && is_string($item['type']) ? trim($item['type']) : 'link';
      $item_label = isset($item['label']) ? trim((string) $item['label']) : '';
      $item_href = isset($item['href']) && is_string($item['href']) && trim($item['href']) !== '' ? trim($item['href']) : '#';
      $item_class = isset($item['item_class']) && is_string($item['item_class']) ? trim($item['item_class']) : '';
      $item_disabled = isset($item['disabled']) ? (bool) $item['disabled'] : false;
      $item_li_class = isset($item['li_class']) && is_string($item['li_class']) ? trim($item['li_class']) : '';
      ?>
      <?php if ($item_type === 'divider'): ?>
        <li role="none">
          <div class="my-1 border-t border-brand-100"></div>
        </li>
        <?php continue; ?>
      <?php endif; ?>

      <?php if ($item_type === 'label'): ?>
        <li role="none">
          <p class="<?= e(trim('dropdown__label px-3 py-2 text-xs font-semibold uppercase tracking-wide text-brand-500 ' . $item_class)); ?>">
            <?= e($item_label); ?>
          </p>
        </li>
        <?php continue; ?>
      <?php endif; ?>

      <li role="none"<?= $item_li_class !== '' ? ' class="' . e($item_li_class) . '"' : ''; ?>>
        <?php if ($item_type === 'button'): ?>
          <button
            class="<?= e(trim('dropdown__item flex w-full rounded-md px-3 py-2 text-left text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900 ' . $item_class)); ?>"
            type="button"
            role="menuitem"
            <?= $item_disabled ? 'disabled' : ''; ?>
          >
            <?= e($item_label); ?>
          </button>
        <?php else: ?>
          <?php if ($item_disabled): ?>
            <span
              class="<?= e(trim('dropdown__item flex w-full cursor-not-allowed rounded-md px-3 py-2 text-left text-sm text-brand-400 ' . $item_class)); ?>"
              role="menuitem"
              aria-disabled="true"
            >
              <?= e($item_label); ?>
            </span>
          <?php else: ?>
            <a
              class="<?= e(trim('dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900 ' . $item_class)); ?>"
              href="<?= e($item_href); ?>"
              role="menuitem"
            >
              <?= e($item_label); ?>
            </a>
          <?php endif; ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
