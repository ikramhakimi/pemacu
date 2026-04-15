<?php
declare(strict_types=1);

/**
 * Component: dropdown-trigger-variations
 * Purpose: Render dropdown trigger style variations for neutral, icon-text, and icon-only patterns.
 * Anatomy:
 * - .dropdown
 *   - .dropdown__trigger
 *   - .dropdown__menu
 *     - .dropdown__item
 * Data Contract:
 * - Static demo component for trigger style comparison.
 */
?>
<div class="flex flex-wrap items-center gap-4">
  <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
    <?php component('button', [
      'id'            => 'dropdown-trigger-neutral',
      'label'         => 'Filter',
      'variant'       => 'secondary',
      'gradient'      => true,
      'size'          => 'md',
      'icon_name'     => 'arrow-down-s-line',
      'icon_position' => 'right',
      'class'         => 'dropdown__trigger',
      'attributes'    => [
        'aria-haspopup'         => 'menu',
        'aria-expanded'         => 'false',
        'aria-controls'         => 'dropdown-menu-neutral',
        'data-dropdown-trigger' => true,
      ],
    ]); ?>
    <ul
      id="dropdown-menu-neutral"
      class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[180px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
      role="menu"
      aria-labelledby="dropdown-trigger-neutral"
      data-dropdown-menu
    >
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">All items</a>
      </li>
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Assigned to me</a>
      </li>
    </ul>
  </div>

  <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
    <?php component('button', [
      'id'            => 'dropdown-trigger-icon-text',
      'label'         => 'Settings',
      'variant'       => 'secondary',
      'gradient'      => true,
      'size'          => 'md',
      'icon_name'     => 'settings-3-line',
      'icon_position' => 'left',
      'class'         => 'dropdown__trigger',
      'attributes'    => [
        'aria-haspopup'         => 'menu',
        'aria-expanded'         => 'false',
        'aria-controls'         => 'dropdown-menu-icon-text',
        'data-dropdown-trigger' => true,
      ],
    ]); ?>
    <ul
      id="dropdown-menu-icon-text"
      class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[180px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
      role="menu"
      aria-labelledby="dropdown-trigger-icon-text"
      data-dropdown-menu
    >
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Preferences</a>
      </li>
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Notifications</a>
      </li>
    </ul>
  </div>

  <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
    <?php component('button', [
      'id'         => 'dropdown-trigger-icon-only',
      'label'      => 'More actions',
      'aria_label' => 'More actions',
      'variant'    => 'secondary',
      'gradient'   => true,
      'size'       => 'md',
      'icon_name'  => 'more-2-fill',
      'icon_only'  => true,
      'class'      => 'dropdown__trigger',
      'attributes' => [
        'aria-haspopup'         => 'menu',
        'aria-expanded'         => 'false',
        'aria-controls'         => 'dropdown-menu-icon-only',
        'data-dropdown-trigger' => true,
      ],
    ]); ?>
    <ul
      id="dropdown-menu-icon-only"
      class="dropdown__menu absolute right-0 z-20 mt-2 hidden min-w-[180px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
      role="menu"
      aria-labelledby="dropdown-trigger-icon-only"
      data-dropdown-menu
    >
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Rename</a>
      </li>
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Archive</a>
      </li>
    </ul>
  </div>
</div>
