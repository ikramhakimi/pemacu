<?php

declare(strict_types=1);

$page_title   = 'Documents Portfolio';
$page_current = 'consultant-documents';

layout('mampan/dashboard-global', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Track document completeness and revision status across all projects.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <section class="grid gap-4 md:grid-cols-3" aria-label="Document portfolio summary">
    <div class="rounded-lg border border-brand-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-brand-500">Total Files</p><p class="mt-2 text-2xl font-semibold text-brand-900">1,284</p></div>
    <div class="rounded-lg border border-brand-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-brand-500">Need Revision</p><p class="mt-2 text-2xl font-semibold text-brand-900">72</p></div>
    <div class="rounded-lg border border-brand-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-brand-500">Missing Required</p><p class="mt-2 text-2xl font-semibold text-brand-900">38</p></div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
