<?php

declare(strict_types=1);

$section_header_id          = 'buttons';
$section_header_eyebrow     = 'Components';
$section_header_title       = 'Buttons';
$section_header_description = 'Primary actions, neutral alternatives, text links, and icon patterns in consistent sizes and states.';
require __DIR__ . '/section-header.php';
?>
<div class="ui-kit-preview mt-4 rounded-2xl border border-brand-200 bg-white p-5 shadow-sm sm:p-6">
  <div class="space-y-6">
    <section class="space-y-3" aria-labelledby="buttons-variants-title">
      <h3 id="buttons-variants-title" class="text-sm font-semibold text-brand-900">Variants & Sizes</h3>
      <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-4">
        <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
          <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Primary</p>
          <button class="btn btn--primary btn--sm inline-flex rounded-lg border border-transparent bg-brand-900 px-3 py-1.5 text-xs font-medium text-white" type="button">Small</button>
          <button class="btn btn--primary btn--md inline-flex rounded-lg border border-transparent bg-brand-900 px-4 py-3 text-sm font-medium text-white" type="button">Medium</button>
          <button class="btn btn--primary btn--lg inline-flex rounded-lg border border-transparent bg-brand-900 px-5 py-3 text-base font-medium text-white" type="button">Large</button>
        </div>
        <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
          <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Secondary</p>
          <button class="btn btn--secondary btn--sm inline-flex rounded-lg border border-transparent bg-brand-100 px-3 py-1.5 text-xs font-medium text-brand-900" type="button">Small</button>
          <button class="btn btn--secondary btn--md inline-flex rounded-lg border border-transparent bg-brand-100 px-4 py-3 text-sm font-medium text-brand-900" type="button">Medium</button>
          <button class="btn btn--secondary btn--lg inline-flex rounded-lg border border-transparent bg-brand-100 px-5 py-3 text-base font-medium text-brand-900" type="button">Large</button>
        </div>
        <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
          <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Ghost</p>
          <button class="btn btn--ghost btn--sm inline-flex rounded-lg border border-brand-200 bg-white px-3 py-1.5 text-xs font-medium text-brand-900" type="button">Small</button>
          <button class="btn btn--ghost btn--md inline-flex rounded-lg border border-brand-200 bg-white px-4 py-3 text-sm font-medium text-brand-900" type="button">Medium</button>
          <button class="btn btn--ghost btn--lg inline-flex rounded-lg border border-brand-200 bg-white px-5 py-3 text-base font-medium text-brand-900" type="button">Large</button>
        </div>
        <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
          <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Link</p>
          <a class="btn btn--link btn--sm inline-flex px-0 py-1.5 text-xs font-medium text-brand-700 hover:text-brand-900" href="#">Small link</a>
          <a class="btn btn--link btn--md inline-flex px-0 py-3 text-sm font-medium text-brand-700 hover:text-brand-900" href="#">Medium link</a>
          <a class="btn btn--link btn--lg inline-flex px-0 py-3 text-base font-medium text-brand-700 hover:text-brand-900" href="#">Large link</a>
        </div>
      </div>
    </section>

    <section class="space-y-3" aria-labelledby="buttons-states-title">
      <h3 id="buttons-states-title" class="text-sm font-semibold text-brand-900">States & Icon Patterns</h3>
      <div class="grid gap-3 md:grid-cols-2 xl:grid-cols-3">
        <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
          <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Default / Disabled / Loading</p>
          <button class="btn btn--primary btn--md inline-flex rounded-lg border border-transparent bg-brand-900 px-4 py-3 text-sm font-medium text-white" type="button">Save changes</button>
          <button class="btn btn--primary btn--md inline-flex rounded-lg border border-transparent bg-brand-900 px-4 py-3 text-sm font-medium text-white opacity-50" type="button" disabled>Disabled</button>
          <button class="btn btn--primary btn--md inline-flex items-center gap-2 rounded-lg border border-transparent bg-brand-900 px-4 py-3 text-sm font-medium text-white" type="button" aria-live="polite">
            <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3" class="opacity-30"></circle>
              <path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
            </svg>
            Loading
          </button>
        </div>

        <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
          <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Leading / Trailing Icon</p>
          <button class="btn btn--secondary btn--md inline-flex items-center gap-2 rounded-lg border border-transparent bg-brand-100 px-4 py-3 text-sm font-medium text-brand-900" type="button">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M4 12h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
              <path d="M10 6l-6 6 6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            Back
          </button>
          <button class="btn btn--secondary btn--md inline-flex items-center gap-2 rounded-lg border border-transparent bg-brand-100 px-4 py-3 text-sm font-medium text-brand-900" type="button">
            Continue
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M4 12h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
              <path d="M14 6l6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </button>
        </div>

        <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
          <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Icon Only</p>
          <div class="flex items-center gap-2">
            <button class="btn btn--ghost btn--sm inline-flex h-8 w-8 items-center justify-center rounded-lg border border-brand-200 bg-white text-brand-700" type="button" aria-label="Edit item">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M4 20h4l10-10-4-4L4 16v4Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"></path>
              </svg>
            </button>
            <button class="btn btn--ghost btn--md inline-flex h-10 w-10 items-center justify-center rounded-lg border border-brand-200 bg-white text-brand-700" type="button" aria-label="Delete item">
              <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M6 7h12" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
                <path d="M9 7V5h6v2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"></path>
                <path d="M8 7l1 12h6l1-12" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
