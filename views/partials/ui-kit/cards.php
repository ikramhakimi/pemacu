<?php

declare(strict_types=1);

$section_header_id          = 'cards';
$section_header_eyebrow     = 'Components';
$section_header_title       = 'Cards';
$section_header_description = 'Core card styles for information, features, media, and action-oriented content blocks.';
require __DIR__ . '/section-header.php';
?>
<div class="ui-kit-preview mt-4 rounded-2xl border border-brand-200 bg-white p-5 shadow-sm sm:p-6">
  <div class="grid gap-4 md:grid-cols-2">
    <article class="rounded-2xl border border-brand-200 bg-white p-5 shadow-sm">
      <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Basic card</p>
      <h3 class="mt-2 text-lg font-semibold text-brand-900">Booking Summary</h3>
      <p class="mt-2 text-sm leading-6 text-brand-600">
        Keep concise status details in a neutral container with clear information hierarchy.
      </p>
    </article>

    <article class="rounded-2xl border border-brand-200 bg-white p-5 shadow-sm">
      <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Feature card</p>
      <h3 class="mt-2 text-lg font-semibold text-brand-900">Workflow-ready blocks</h3>
      <p class="mt-2 text-sm leading-6 text-brand-600">
        Designed for internal docs and starter templates where consistency matters more than novelty.
      </p>
    </article>

    <article class="overflow-hidden rounded-2xl border border-brand-200 bg-white shadow-sm">
      <div class="aspect-[3/2] bg-brand-100"></div>
      <div class="p-5">
        <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Media card</p>
        <h3 class="mt-2 text-lg font-semibold text-brand-900">Campaign hero visual</h3>
        <p class="mt-2 text-sm leading-6 text-brand-600">Media-first card for previews and module references.</p>
      </div>
    </article>

    <article class="rounded-2xl border border-brand-200 bg-white p-5 shadow-sm">
      <p class="text-xs font-medium uppercase tracking-[0.14em] text-brand-500">Card with actions</p>
      <h3 class="mt-2 text-lg font-semibold text-brand-900">Need approval before launch?</h3>
      <p class="mt-2 text-sm leading-6 text-brand-600">Action slots can include primary and secondary controls.</p>
      <div class="mt-4 flex flex-wrap items-center gap-2">
        <button class="btn btn--primary btn--sm inline-flex rounded-lg border border-transparent bg-brand-900 px-3 py-1.5 text-xs font-medium text-white" type="button">Approve</button>
        <button class="btn btn--ghost btn--sm inline-flex rounded-lg border border-brand-200 bg-white px-3 py-1.5 text-xs font-medium text-brand-900" type="button">Request edits</button>
      </div>
    </article>
  </div>
</div>
