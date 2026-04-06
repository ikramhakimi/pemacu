<?php

declare(strict_types=1);

$section_header_id          = 'navigation';
$section_header_eyebrow     = 'Components';
$section_header_title       = 'Navigation';
$section_header_description = 'Desktop navigation, tabs, and compact dropdown references for content-heavy interfaces.';
require __DIR__ . '/section-header.php';
?>
<div class="ui-kit-preview mt-4 rounded-2xl border border-brand-200 bg-white p-5 shadow-sm sm:p-6">
  <div class="space-y-6">
    <section class="space-y-3" aria-labelledby="navigation-navbar-title">
      <h3 id="navigation-navbar-title" class="text-sm font-semibold text-brand-900">Desktop Navbar</h3>
      <nav class="rounded-xl border border-brand-200 bg-white p-4" aria-label="Example desktop navbar">
        <div class="flex flex-wrap items-center justify-between gap-3">
          <a class="text-sm font-semibold text-brand-900" href="#">Brand Mark</a>
          <ul class="flex items-center gap-4 text-sm text-brand-600">
            <li><a class="hover:text-brand-900" href="#">Overview</a></li>
            <li><a class="hover:text-brand-900" href="#">Components</a></li>
            <li>
              <details class="relative">
                <summary class="cursor-pointer list-none hover:text-brand-900">Resources</summary>
                <div class="absolute left-0 z-10 mt-2 w-44 rounded-lg border border-brand-200 bg-white p-2 shadow">
                  <a class="block rounded-md px-2 py-1 text-sm text-brand-600 hover:bg-brand-50 hover:text-brand-900" href="#">Docs</a>
                  <a class="block rounded-md px-2 py-1 text-sm text-brand-600 hover:bg-brand-50 hover:text-brand-900" href="#">Changelog</a>
                  <a class="block rounded-md px-2 py-1 text-sm text-brand-600 hover:bg-brand-50 hover:text-brand-900" href="#">Support</a>
                </div>
              </details>
            </li>
          </ul>
          <div class="flex items-center gap-2">
            <button class="btn btn--ghost btn--sm inline-flex rounded-lg border border-brand-200 bg-white px-3 py-1.5 text-xs font-medium text-brand-700" type="button">Sign in</button>
            <button class="btn btn--primary btn--sm inline-flex rounded-lg border border-transparent bg-brand-900 px-3 py-1.5 text-xs font-medium text-white" type="button">Get started</button>
          </div>
        </div>
      </nav>
    </section>

    <section class="space-y-3" aria-labelledby="navigation-tabs-title">
      <h3 id="navigation-tabs-title" class="text-sm font-semibold text-brand-900">Tabs</h3>
      <div class="rounded-xl border border-brand-200 bg-white p-4">
        <div role="tablist" aria-label="Sample tabs" class="inline-flex rounded-lg border border-brand-200 bg-brand-50 p-1">
          <button role="tab" aria-selected="true" class="rounded-md bg-white px-3 py-1.5 text-sm font-medium text-brand-900" type="button">Tokens</button>
          <button role="tab" aria-selected="false" class="rounded-md px-3 py-1.5 text-sm text-brand-600" type="button">Components</button>
          <button role="tab" aria-selected="false" class="rounded-md px-3 py-1.5 text-sm text-brand-600" type="button">Patterns</button>
        </div>
      </div>
    </section>

    <section class="space-y-3" aria-labelledby="navigation-compact-title">
      <h3 id="navigation-compact-title" class="text-sm font-semibold text-brand-900">Compact Dropdown Menu</h3>
      <div class="rounded-xl border border-brand-200 bg-white p-4">
        <details class="inline-block">
          <summary class="cursor-pointer list-none rounded-lg border border-brand-200 bg-white px-3 py-1.5 text-sm font-medium text-brand-700">
            Open menu
          </summary>
          <div class="mt-2 w-44 rounded-lg border border-brand-200 bg-white p-2 shadow">
            <a class="block rounded-md px-2 py-1 text-sm text-brand-600 hover:bg-brand-50 hover:text-brand-900" href="#">Account</a>
            <a class="block rounded-md px-2 py-1 text-sm text-brand-600 hover:bg-brand-50 hover:text-brand-900" href="#">Billing</a>
            <a class="block rounded-md px-2 py-1 text-sm text-brand-600 hover:bg-brand-50 hover:text-brand-900" href="#">Sign out</a>
          </div>
        </details>
      </div>
    </section>
  </div>
</div>
