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
 * - Static demo component for navigation-style dropdown trigger.
 */
?>
<div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
  <button
    id="dropdown-trigger-navigation"
    class="dropdown__trigger inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700 hover:text-brand-900"
    type="button"
    aria-haspopup="menu"
    aria-expanded="false"
    aria-controls="dropdown-menu-navigation"
    data-dropdown-trigger
  >
    <span>Resources</span>
    <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
  </button>

  <div
    id="dropdown-menu-navigation"
    class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[220px] rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
    role="menu"
    aria-labelledby="dropdown-trigger-navigation"
    data-dropdown-menu
  >
    <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Documentation</a>
    <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Release notes</a>
    <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Status page</a>
  </div>
</div>
