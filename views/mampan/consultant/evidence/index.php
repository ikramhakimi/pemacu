<?php

declare(strict_types=1);

$page_title   = 'Evidence Portfolio';
$page_current = 'consultant-evidence';

layout('mampan/dashboard-global', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Portfolio queue for evidence verification and score-impact risk tracking.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <section class="rounded-lg border border-zinc-200 bg-white p-5" aria-label="Evidence review queue">
    <h2 class="text-lg font-semibold text-zinc-900">Evidence Review Queue</h2>
    <p class="mt-1 text-sm text-zinc-600">Items pending consultant verification this cycle.</p>
    <ul class="mt-4 space-y-3 text-sm text-zinc-700">
      <li class="rounded-md border border-zinc-200 px-3 py-2">Menara Harmoni Office Retrofit: EE2 trend logs pending review</li>
      <li class="rounded-md border border-zinc-200 px-3 py-2">Putra Tech Campus Annex: EQ4 declaration awaiting evidence link</li>
      <li class="rounded-md border border-zinc-200 px-3 py-2">Seri Angkasa Tower: WE3 O&M manual revision check</li>
    </ul>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
