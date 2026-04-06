<?php
declare(strict_types=1);

/**
 * Component: forms-toggle
 * Purpose: Render toggle controls with default, checked, and disabled states.
 * Anatomy:
 * - .toggle
 *   - .toggle__input
 *   - .toggle__track
 *     - .toggle__thumb
 *   - .toggle__label
 * Data Contract:
 * - Static demo component for toggle states.
 * - Root class is `.toggle` on each control wrapper.
 */
?>
<label class="toggle inline-flex items-center gap-3">
  <span class="toggle__control relative inline-block h-6 w-11">
    <input class="toggle__input peer sr-only" type="checkbox">
    <span class="toggle__track absolute inset-0 rounded-full bg-brand-200 transition-colors peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500 peer-checked:bg-blue-500"></span>
    <span class="toggle__thumb absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow-sm transition-transform peer-checked:translate-x-5"></span>
  </span>
  <span class="toggle__label text-sm text-brand-700">toggle:default</span>
</label>

<label class="toggle inline-flex items-center gap-3">
  <span class="toggle__control relative inline-block h-6 w-11">
    <input class="toggle__input peer sr-only" type="checkbox" checked>
    <span class="toggle__track absolute inset-0 rounded-full bg-brand-200 transition-colors peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500 peer-checked:bg-blue-500"></span>
    <span class="toggle__thumb absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white shadow-sm transition-transform peer-checked:translate-x-5"></span>
  </span>
  <span class="toggle__label text-sm text-brand-700">toggle:active</span>
</label>

<label class="toggle inline-flex items-center gap-3">
  <span class="toggle__control relative inline-block h-6 w-11">
    <input class="toggle__input peer sr-only" type="checkbox" disabled>
    <span class="toggle__track absolute inset-0 rounded-full bg-brand-200/60"></span>
    <span class="toggle__thumb absolute left-0.5 top-0.5 h-5 w-5 rounded-full bg-white/80 shadow-sm"></span>
  </span>
  <span class="toggle__label text-sm text-brand-400">toggle:disabled</span>
</label>

<label class="toggle inline-flex items-center gap-3">
  <span class="toggle__control relative inline-block h-6 w-11">
    <input class="toggle__input peer sr-only" type="checkbox" checked disabled>
    <span class="toggle__track absolute inset-0 rounded-full bg-blue-500/60"></span>
    <span class="toggle__thumb absolute left-0.5 top-0.5 h-5 w-5 translate-x-5 rounded-full bg-white/90 shadow-sm"></span>
  </span>
  <span class="toggle__label text-sm text-brand-400">toggle:checked:disabled</span>
</label>
