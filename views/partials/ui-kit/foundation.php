<?php

declare(strict_types=1);

$section_header_id          = 'foundation';
$section_header_eyebrow     = 'Foundation';
$section_header_title       = 'Core Visual Tokens';
$section_header_description = 'A compact reference for the baseline design language used across this starter theme.';
require __DIR__ . '/section-header.php';
?>
<div class="ui-kit-preview mt-4 rounded-2xl border border-brand-200 bg-white p-5 shadow-sm sm:p-6">
  <div class="grid gap-6 xl:grid-cols-2">
    <section aria-labelledby="foundation-colors-title" class="space-y-3">
      <h3 id="foundation-colors-title" class="text-sm font-semibold text-brand-900">Colors</h3>
      <div class="grid grid-cols-2 gap-2 sm:grid-cols-4">
        <div class="rounded-lg border border-brand-200 p-2">
          <div class="h-12 rounded-md border border-brand-200 bg-white"></div>
          <p class="mt-2 text-xs text-brand-600">Surface / White</p>
        </div>
        <div class="rounded-lg border border-brand-200 p-2">
          <div class="h-12 rounded-md bg-brand-50"></div>
          <p class="mt-2 text-xs text-brand-600">Canvas / Zinc 50</p>
        </div>
        <div class="rounded-lg border border-brand-200 p-2">
          <div class="h-12 rounded-md bg-brand-900"></div>
          <p class="mt-2 text-xs text-brand-600">Primary / Zinc 900</p>
        </div>
        <div class="rounded-lg border border-brand-200 p-2">
          <div class="h-12 rounded-md bg-brand-600"></div>
          <p class="mt-2 text-xs text-brand-600">Muted / Zinc 600</p>
        </div>
      </div>
    </section>

    <section aria-labelledby="foundation-type-title" class="space-y-3">
      <h3 id="foundation-type-title" class="text-sm font-semibold text-brand-900">Typography</h3>
      <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
        <p class="text-3xl font-semibold text-brand-900">Display Title</p>
        <p class="text-xl font-semibold text-brand-900">Section Heading</p>
        <p class="text-base leading-6 text-brand-700">
          Body copy is neutral, readable, and calm for long-form docs usage.
        </p>
        <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Overline label</p>
      </div>
    </section>

    <section aria-labelledby="foundation-spacing-title" class="space-y-3">
      <h3 id="foundation-spacing-title" class="text-sm font-semibold text-brand-900">Spacing</h3>
      <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4">
        <div class="flex items-center gap-3">
          <span class="inline-flex w-10 text-xs text-brand-500">2</span>
          <div class="h-3 w-2 rounded-sm bg-brand-300"></div>
        </div>
        <div class="flex items-center gap-3">
          <span class="inline-flex w-10 text-xs text-brand-500">4</span>
          <div class="h-3 w-4 rounded-sm bg-brand-400"></div>
        </div>
        <div class="flex items-center gap-3">
          <span class="inline-flex w-10 text-xs text-brand-500">6</span>
          <div class="h-3 w-6 rounded-sm bg-brand-500"></div>
        </div>
        <div class="flex items-center gap-3">
          <span class="inline-flex w-10 text-xs text-brand-500">8</span>
          <div class="h-3 w-8 rounded-sm bg-brand-700"></div>
        </div>
      </div>
    </section>

    <section aria-labelledby="foundation-radius-shadow-title" class="space-y-3">
      <h3 id="foundation-radius-shadow-title" class="text-sm font-semibold text-brand-900">Radius & Shadows</h3>
      <div class="grid grid-cols-2 gap-3 rounded-xl border border-brand-200 bg-brand-50 p-4">
        <div class="rounded-md border border-brand-200 bg-white p-3 text-xs text-brand-600">rounded-md</div>
        <div class="rounded-xl border border-brand-200 bg-white p-3 text-xs text-brand-600">rounded-xl</div>
        <div class="rounded-xl border border-brand-200 bg-white p-3 text-xs text-brand-600 shadow-sm">shadow-sm</div>
        <div class="rounded-xl border border-brand-200 bg-white p-3 text-xs text-brand-600 shadow">shadow</div>
      </div>
    </section>
  </div>
</div>
