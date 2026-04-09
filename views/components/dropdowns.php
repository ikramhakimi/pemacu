<?php
declare(strict_types=1);

/**
 * Component: dropdowns
 * Purpose: Demonstrate accessible dropdown trigger variants and left/right menu alignment.
 * Anatomy:
 * - .dropdown
 *   - .dropdown__trigger
 *   - .dropdown__menu
 *     - .dropdown__item
 * Data Contract:
 * - Static reference component for Canvas documentation.
 * - Trigger variants: button, link, navigation.
 * - Alignments: left and right.
 */
?>
<div class="grid gap-6 lg:grid-cols-2">
  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Button Trigger (Left)</h4>
    <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
      <button
        id="dropdown-trigger-button-left"
        class="dropdown__trigger inline-flex h-[var(--ui-h-md)] items-center gap-2 rounded-lg border border-brand-200 bg-white px-[var(--ui-px-md)] font-medium text-brand-900"
        type="button"
        aria-haspopup="menu"
        aria-expanded="false"
        aria-controls="dropdown-menu-button-left"
        data-dropdown-trigger
      >
        <span>Actions</span>
        <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
      </button>
      <div
        id="dropdown-menu-button-left"
        class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[180px] rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
        role="menu"
        aria-labelledby="dropdown-trigger-button-left"
        data-dropdown-menu
      >
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Edit</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Duplicate</a>
        <button class="dropdown__item flex w-full rounded-md px-3 py-2 text-left text-sm text-negative-700 hover:bg-negative-50" type="button" role="menuitem">Delete</button>
      </div>
    </div>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Button Trigger (Right)</h4>
    <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="right">
      <button
        id="dropdown-trigger-button-right"
        class="dropdown__trigger inline-flex h-[var(--ui-h-md)] items-center gap-2 rounded-lg border border-brand-200 bg-white px-[var(--ui-px-md)] font-medium text-brand-900"
        type="button"
        aria-haspopup="menu"
        aria-expanded="false"
        aria-controls="dropdown-menu-button-right"
        data-dropdown-trigger
      >
        <span>Actions</span>
        <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
      </button>
      <div
        id="dropdown-menu-button-right"
        class="dropdown__menu absolute right-0 z-20 mt-2 hidden min-w-[180px] rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
        role="menu"
        aria-labelledby="dropdown-trigger-button-right"
        data-dropdown-menu
      >
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Edit</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Duplicate</a>
        <button class="dropdown__item flex w-full rounded-md px-3 py-2 text-left text-sm text-negative-700 hover:bg-negative-50" type="button" role="menuitem">Delete</button>
      </div>
    </div>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Link Trigger (Left)</h4>
    <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
      <a
        id="dropdown-trigger-link-left"
        class="dropdown__trigger inline-flex h-[var(--ui-h-md)] items-center gap-2 rounded-lg bg-brand-100 px-[var(--ui-px-md)] font-medium text-brand-900"
        href="#"
        aria-haspopup="menu"
        aria-expanded="false"
        aria-controls="dropdown-menu-link-left"
        data-dropdown-trigger
      >
        <span>Manage</span>
        <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
      </a>
      <div
        id="dropdown-menu-link-left"
        class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[180px] rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
        role="menu"
        aria-labelledby="dropdown-trigger-link-left"
        data-dropdown-menu
      >
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Open</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Share</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Archive</a>
      </div>
    </div>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Link Trigger (Right)</h4>
    <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="right">
      <a
        id="dropdown-trigger-link-right"
        class="dropdown__trigger inline-flex h-[var(--ui-h-md)] items-center gap-2 rounded-lg bg-brand-100 px-[var(--ui-px-md)] font-medium text-brand-900"
        href="#"
        aria-haspopup="menu"
        aria-expanded="false"
        aria-controls="dropdown-menu-link-right"
        data-dropdown-trigger
      >
        <span>Manage</span>
        <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
      </a>
      <div
        id="dropdown-menu-link-right"
        class="dropdown__menu absolute right-0 z-20 mt-2 hidden min-w-[180px] rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
        role="menu"
        aria-labelledby="dropdown-trigger-link-right"
        data-dropdown-menu
      >
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Open</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Share</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Archive</a>
      </div>
    </div>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Navigation Trigger (Left)</h4>
    <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="left">
      <button
        id="dropdown-trigger-nav-left"
        class="dropdown__trigger inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700 hover:text-brand-900"
        type="button"
        aria-haspopup="menu"
        aria-expanded="false"
        aria-controls="dropdown-menu-nav-left"
        data-dropdown-trigger
      >
        <span>Resources</span>
        <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
      </button>
      <div
        id="dropdown-menu-nav-left"
        class="dropdown__menu absolute left-0 z-20 mt-2 hidden min-w-[200px] rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
        role="menu"
        aria-labelledby="dropdown-trigger-nav-left"
        data-dropdown-menu
      >
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Documentation</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Release Notes</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Status Page</a>
      </div>
    </div>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Navigation Trigger (Right)</h4>
    <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="right">
      <button
        id="dropdown-trigger-nav-right"
        class="dropdown__trigger inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700 hover:text-brand-900"
        type="button"
        aria-haspopup="menu"
        aria-expanded="false"
        aria-controls="dropdown-menu-nav-right"
        data-dropdown-trigger
      >
        <span>Resources</span>
        <?php icon('arrow-down-s-line', ['icon_size' => '16', 'icon_class' => 'text-brand-500']); ?>
      </button>
      <div
        id="dropdown-menu-nav-right"
        class="dropdown__menu absolute right-0 z-20 mt-2 hidden min-w-[200px] rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
        role="menu"
        aria-labelledby="dropdown-trigger-nav-right"
        data-dropdown-menu
      >
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Documentation</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Release Notes</a>
        <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Status Page</a>
      </div>
    </div>
  </div>
</div>
