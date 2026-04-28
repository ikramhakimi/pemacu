<?php

declare(strict_types=1);

$page_title   = 'Consultant Portfolio Dashboard';
$page_current = 'consultant-dashboard';

layout('mampan/dashboard-global', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Track portfolio health, risk, and delivery status across all active consultant projects.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4" aria-label="Portfolio summary">
    <div class="rounded-lg border border-brand-200 bg-white p-4">
      <p class="text-xs uppercase tracking-wide text-brand-500">Active Projects</p>
      <p class="mt-2 text-2xl font-semibold text-brand-900">12</p>
    </div>
    <div class="rounded-lg border border-brand-200 bg-white p-4">
      <p class="text-xs uppercase tracking-wide text-brand-500">Open Clarifications</p>
      <p class="mt-2 text-2xl font-semibold text-brand-900">37</p>
    </div>
    <div class="rounded-lg border border-brand-200 bg-white p-4">
      <p class="text-xs uppercase tracking-wide text-brand-500">Evidence Pending Review</p>
      <p class="mt-2 text-2xl font-semibold text-brand-900">54</p>
    </div>
    <div class="rounded-lg border border-brand-200 bg-white p-4">
      <p class="text-xs uppercase tracking-wide text-brand-500">Submission Ready</p>
      <p class="mt-2 text-2xl font-semibold text-brand-900">4</p>
    </div>
  </section>

  <section class="rounded-lg border border-brand-200 bg-white p-5" aria-label="Priority projects">
    <h2 class="text-lg font-semibold text-brand-900">Priority Project Watchlist</h2>
    <p class="mt-1 text-sm text-brand-600">Projects with immediate action needed this week.</p>
    <div class="mt-4 overflow-x-auto">
      <table class="min-w-full divide-y divide-brand-200 text-sm">
        <thead>
          <tr class="text-left text-xs uppercase tracking-wide text-brand-500">
            <th class="px-3 py-2">Project</th>
            <th class="px-3 py-2">Open RFI</th>
            <th class="px-3 py-2">Evidence Risk</th>
            <th class="px-3 py-2">Submission Status</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-brand-100">
          <tr>
            <td class="px-3 py-2 font-medium text-brand-900">Menara Harmoni Office Retrofit</td>
            <td class="px-3 py-2">8</td>
            <td class="px-3 py-2">High</td>
            <td class="px-3 py-2">Almost Ready</td>
          </tr>
          <tr>
            <td class="px-3 py-2 font-medium text-brand-900">Putra Tech Campus Annex</td>
            <td class="px-3 py-2">5</td>
            <td class="px-3 py-2">Medium</td>
            <td class="px-3 py-2">In Progress</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
