<?php

declare(strict_types=1);

$page_title   = 'Clarifications Portfolio';
$page_current = 'consultant-rfi';

layout('mampan/dashboard-global', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Monitor open clarifications and response SLAs across all projects.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <section class="grid gap-4 md:grid-cols-3" aria-label="Clarification metrics">
    <div class="rounded-lg border border-zinc-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-zinc-500">Open</p><p class="mt-2 text-2xl font-semibold text-zinc-900">37</p></div>
    <div class="rounded-lg border border-zinc-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-zinc-500">Overdue</p><p class="mt-2 text-2xl font-semibold text-zinc-900">9</p></div>
    <div class="rounded-lg border border-zinc-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-zinc-500">Resolved This Week</p><p class="mt-2 text-2xl font-semibold text-zinc-900">21</p></div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
