<?php

declare(strict_types=1);

$section_header_id          = 'feedback';
$section_header_eyebrow     = 'Components';
$section_header_title       = 'Feedback';
$section_header_description = 'Status UI elements for confidence, errors, empty states, and loading placeholders.';
require __DIR__ . '/section-header.php';
?>
<div class="ui-kit-preview mt-4 rounded-2xl border border-brand-200 bg-white p-5 shadow-sm sm:p-6">
  <div class="grid gap-4 lg:grid-cols-2">
    <section class="space-y-3" aria-labelledby="feedback-badges-title">
      <h3 id="feedback-badges-title" class="text-sm font-semibold text-brand-900">Badges</h3>
      <div class="flex flex-wrap items-center gap-2">
        <span class="rounded-full border border-brand-200 bg-brand-50 px-2.5 py-1 text-xs font-medium text-brand-700">Draft</span>
        <span class="rounded-full border border-brand-200 bg-brand-900 px-2.5 py-1 text-xs font-medium text-white">Published</span>
        <span class="rounded-full border border-brand-200 bg-white px-2.5 py-1 text-xs font-medium text-brand-600">Archived</span>
      </div>
    </section>

    <section class="space-y-3" aria-labelledby="feedback-alerts-title">
      <h3 id="feedback-alerts-title" class="text-sm font-semibold text-brand-900">Alerts</h3>
      <div class="space-y-2">
        <div class="rounded-lg border border-brand-200 bg-brand-50 p-3 text-sm text-brand-700">
          <strong class="font-semibold text-brand-900">Info:</strong>
          Styles were updated in the latest release.
        </div>
        <div class="rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700">
          <strong class="font-semibold">Error:</strong>
          Please resolve validation issues before publishing.
        </div>
      </div>
    </section>

    <section class="space-y-3" aria-labelledby="feedback-empty-title">
      <h3 id="feedback-empty-title" class="text-sm font-semibold text-brand-900">Empty State</h3>
      <div class="rounded-xl border border-dashed border-brand-300 bg-brand-50 p-6 text-center">
        <p class="text-sm font-medium text-brand-900">No components found</p>
        <p class="mt-1 text-sm text-brand-600">Start by adding a new block to your section template.</p>
      </div>
    </section>

    <section class="space-y-3" aria-labelledby="feedback-loading-title">
      <h3 id="feedback-loading-title" class="text-sm font-semibold text-brand-900">Loading Skeleton</h3>
      <div class="space-y-2 rounded-xl border border-brand-200 bg-brand-50 p-4" aria-busy="true" aria-live="polite">
        <div class="h-4 w-2/3 animate-pulse rounded bg-brand-200"></div>
        <div class="h-4 w-full animate-pulse rounded bg-brand-200"></div>
        <div class="h-4 w-5/6 animate-pulse rounded bg-brand-200"></div>
      </div>
    </section>
  </div>
</div>
