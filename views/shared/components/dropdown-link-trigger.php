<?php
declare(strict_types=1);

/**
 * Component: dropdown-link-trigger
 * Purpose: Render a dropdown that uses an anchor element as the menu trigger.
 * Anatomy:
 * - .dropdown
 *   - a.dropdown__trigger
 *   - .dropdown__menu
 *     - .dropdown__item
 * Data Contract:
 * - Static demo component for link-trigger dropdown behavior.
 * - JS toggle and outside-click dismiss use standard data attributes.
 */
?>
<div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
  <a
    id="dropdown-trigger-link"
    class="dropdown__trigger inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700 hover:text-brand-900 hover:underline"
    href="#"
    aria-haspopup="menu"
    aria-expanded="false"
    aria-controls="dropdown-menu-link"
    data-dropdown-trigger
  >
    <span>Manage links</span>
    <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
  </a>

  <ul
    id="dropdown-menu-link"
    class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[200px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
    role="menu"
    aria-labelledby="dropdown-trigger-link"
    data-dropdown-menu
  >
    <li role="none">
      <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Open record</a>
    </li>
    <li role="none">
      <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Share access</a>
    </li>
    <li role="none">
      <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Archive record</a>
    </li>
  </ul>
</div>
