<?php
declare(strict_types=1);

/**
 * Component: dropdown-button-size-variations
 * Purpose: Demonstrate dropdown triggers with button size tokens and icon-only controls.
 * Anatomy:
 * - .dropdown
 *   - .dropdown__trigger
 *   - .dropdown__menu
 *     - .dropdown__item
 * Data Contract:
 * - Static demo component for size variations: sm, md, lg, and icon-only.
 */
?>
<div class="flex flex-wrap items-center gap-4">
  <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
    <?php component('button', [
      'id'            => 'dropdown-trigger-size-sm',
      'label'         => 'Small',
      'variant'       => 'secondary',
      'gradient'      => true,
      'size'          => 'sm',
      'icon_name'     => 'arrow-down-s-line',
      'icon_position' => 'right',
      'class'         => 'dropdown__trigger',
      'attributes'    => [
        'aria-haspopup'       => 'menu',
        'aria-expanded'       => 'false',
        'aria-controls'       => 'dropdown-menu-size-sm',
        'data-dropdown-trigger' => true,
      ],
    ]); ?>
    <ul
      id="dropdown-menu-size-sm"
      class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[160px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
      role="menu"
      aria-labelledby="dropdown-trigger-size-sm"
      data-dropdown-menu
    >
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">View</a>
      </li>
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Edit</a>
      </li>
    </ul>
  </div>

  <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
    <?php component('button', [
      'id'            => 'dropdown-trigger-size-md',
      'label'         => 'Default',
      'variant'       => 'secondary',
      'gradient'      => true,
      'size'          => 'md',
      'icon_name'     => 'arrow-down-s-line',
      'icon_position' => 'right',
      'class'         => 'dropdown__trigger',
      'attributes'    => [
        'aria-haspopup'       => 'menu',
        'aria-expanded'       => 'false',
        'aria-controls'       => 'dropdown-menu-size-md',
        'data-dropdown-trigger' => true,
      ],
    ]); ?>
    <ul
      id="dropdown-menu-size-md"
      class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[180px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
      role="menu"
      aria-labelledby="dropdown-trigger-size-md"
      data-dropdown-menu
    >
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">View</a>
      </li>
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Edit</a>
      </li>
    </ul>
  </div>

  <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
    <?php component('button', [
      'id'            => 'dropdown-trigger-size-lg',
      'label'         => 'Large',
      'variant'       => 'secondary',
      'gradient'      => true,
      'size'          => 'lg',
      'icon_name'     => 'arrow-down-s-line',
      'icon_position' => 'right',
      'class'         => 'dropdown__trigger',
      'attributes'    => [
        'aria-haspopup'       => 'menu',
        'aria-expanded'       => 'false',
        'aria-controls'       => 'dropdown-menu-size-lg',
        'data-dropdown-trigger' => true,
      ],
    ]); ?>
    <ul
      id="dropdown-menu-size-lg"
      class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[180px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
      role="menu"
      aria-labelledby="dropdown-trigger-size-lg"
      data-dropdown-menu
    >
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">View</a>
      </li>
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Edit</a>
      </li>
    </ul>
  </div>

  <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
    <?php component('button', [
      'id'            => 'dropdown-trigger-size-icon',
      'label'         => 'More actions',
      'variant'       => 'secondary',
      'gradient'      => true,
      'size'          => 'md',
      'icon_name'     => 'more-2-fill',
      'icon_only'     => true,
      'class'         => 'dropdown__trigger',
      'aria_label'    => 'More actions',
      'attributes'    => [
        'aria-haspopup'       => 'menu',
        'aria-expanded'       => 'false',
        'aria-controls'       => 'dropdown-menu-size-icon',
        'data-dropdown-trigger' => true,
      ],
    ]); ?>
    <ul
      id="dropdown-menu-size-icon"
      class="dropdown__menu absolute right-0 z-20 mt-2 hidden min-w-[180px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
      role="menu"
      aria-labelledby="dropdown-trigger-size-icon"
      data-dropdown-menu
    >
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">View</a>
      </li>
      <li role="none">
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Edit</a>
      </li>
    </ul>
  </div>
</div>
