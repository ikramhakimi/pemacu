<?php
declare(strict_types=1);

/**
 * Component: dropdown-default
 * Purpose: Render a default dropdown with grouped menu actions, separators, and action states.
 * Anatomy:
 * - .dropdown
 *   - .dropdown__trigger
 *   - .dropdown__menu
 *     - .dropdown__label
 *     - .dropdown__item
 * Data Contract:
 * - Static demo component for documentation pages.
 * - Includes labels, divider groups, disabled action, and danger action.
 */
?>
<div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
  <?php component('button', [
    'id'            => 'dropdown-trigger-default',
    'label'         => 'Options',
    'variant'       => 'secondary',
    'gradient'      => true,
    'size'          => 'md',
    'icon_name'     => 'arrow-down-s-line',
    'icon_position' => 'right',
    'class'         => 'dropdown__trigger',
    'attributes'    => [
      'aria-haspopup'         => 'menu',
      'aria-expanded'         => 'false',
      'aria-controls'         => 'dropdown-menu-default',
      'data-dropdown-trigger' => true,
    ],
  ]); ?>

  <ul
    id="dropdown-menu-default"
    class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[220px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
    role="menu"
    aria-labelledby="dropdown-trigger-default"
    data-dropdown-menu
  >
    <li role="none">
      <p class="dropdown__label px-3 py-2 text-xs font-semibold uppercase tracking-wide text-brand-500">Quick Actions</p>
    </li>
    <li role="none">
      <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Edit details</a>
    </li>
    <li role="none">
      <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Duplicate entry</a>
    </li>

    <li role="none">
      <div class="my-1 border-t border-brand-100"></div>
    </li>
    <li role="none">
      <p class="dropdown__label px-3 py-2 text-xs font-semibold uppercase tracking-wide text-brand-500">Danger Zone</p>
    </li>
    <li role="none">
      <button class="dropdown__item flex w-full cursor-not-allowed rounded-md px-3 py-2 text-left text-sm text-brand-400" type="button" role="menuitem" disabled>Transfer ownership (disabled)</button>
    </li>
    <li role="none">
      <button class="dropdown__item flex w-full rounded-md px-3 py-2 text-left text-sm text-negative-700 hover:bg-negative-50" type="button" role="menuitem">Delete workspace</button>
    </li>
  </ul>
</div>
