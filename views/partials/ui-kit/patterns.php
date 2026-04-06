<?php

declare(strict_types=1);

$section_header_id          = 'patterns';
$section_header_eyebrow     = 'Pattern Preview';
$section_header_title       = 'Assembled Sections';
$section_header_description = 'Mini previews showing how primitives combine into real page modules.';
require __DIR__ . '/section-header.php';
?>
<div class="ui-kit-preview mt-4 rounded-2xl border border-brand-200 bg-white p-5 shadow-sm sm:p-6">
  <div class="grid gap-4 lg:grid-cols-3">
    <article class="rounded-xl border border-brand-200 bg-brand-50 p-4">
      <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Hero preview</p>
      <h3 class="mt-2 text-lg font-semibold text-brand-900">Capture Moments Beautifully</h3>
      <p class="mt-2 text-sm text-brand-600">A compact hero block with one headline, one support line, and two clear actions.</p>
      <div class="mt-3 flex items-center gap-2">
        <button class="btn btn--primary btn--sm inline-flex rounded-lg border border-transparent bg-brand-900 px-3 py-1.5 text-xs font-medium text-white" type="button">Browse packages</button>
        <button class="btn btn--ghost btn--sm inline-flex rounded-lg border border-brand-200 bg-white px-3 py-1.5 text-xs font-medium text-brand-900" type="button">View portfolio</button>
      </div>
    </article>

    <article class="rounded-xl border border-brand-200 bg-brand-50 p-4">
      <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Feature grid preview</p>
      <div class="mt-2 grid gap-2 sm:grid-cols-2">
        <div class="rounded-lg border border-brand-200 bg-white p-3 text-sm text-brand-700">Flexible packages</div>
        <div class="rounded-lg border border-brand-200 bg-white p-3 text-sm text-brand-700">Fast delivery</div>
        <div class="rounded-lg border border-brand-200 bg-white p-3 text-sm text-brand-700">Edited results</div>
        <div class="rounded-lg border border-brand-200 bg-white p-3 text-sm text-brand-700">Reliable workflow</div>
      </div>
    </article>

    <article class="rounded-xl border border-brand-200 bg-brand-50 p-4">
      <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Contact / CTA preview</p>
      <h3 class="mt-2 text-lg font-semibold text-brand-900">Ready to start your project?</h3>
      <p class="mt-2 text-sm text-brand-600">Tell us your goals and timeline. We will propose a tailored setup.</p>
      <div class="mt-3">
        <a class="btn btn--primary btn--md inline-flex rounded-lg border border-transparent bg-brand-900 px-4 py-3 text-sm font-medium text-white" href="#">Contact team</a>
      </div>
    </article>
  </div>
</div>
