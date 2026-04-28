<?php

declare(strict_types=1);

$page_title   = 'Reports Portfolio';
$page_current = 'consultant-reports';

layout('mampan/dashboard-global', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Central register of gap reports and score previews across all projects.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <section class="rounded-lg border border-brand-200 bg-white p-5" aria-label="Reports register">
    <h2 class="text-lg font-semibold text-brand-900">Reports Register</h2>
    <div class="mt-4 space-y-3 text-sm text-brand-700">
      <div class="rounded-md border border-brand-200 px-3 py-2">Menara Harmoni Office Retrofit: Gap Analysis Report Rev 3 (Published)</div>
      <div class="rounded-md border border-brand-200 px-3 py-2">Putra Tech Campus Annex: Gap Analysis Report Rev 1 (Draft)</div>
      <div class="rounded-md border border-brand-200 px-3 py-2">Seri Angkasa Tower: Executive Score Preview (Under Review)</div>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
