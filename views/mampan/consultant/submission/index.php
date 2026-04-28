<?php

declare(strict_types=1);

$page_title   = 'Submission Portfolio';
$page_current = 'consultant-submission';

layout('mampan/dashboard-global', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Portfolio readiness view for all submission packages and sign-off dependencies.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <section class="grid gap-4 md:grid-cols-3" aria-label="Submission readiness metrics">
    <div class="rounded-lg border border-brand-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-brand-500">Ready to Submit</p><p class="mt-2 text-2xl font-semibold text-brand-900">4</p></div>
    <div class="rounded-lg border border-brand-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-brand-500">Awaiting Client Sign-Off</p><p class="mt-2 text-2xl font-semibold text-brand-900">3</p></div>
    <div class="rounded-lg border border-brand-200 bg-white p-4"><p class="text-xs uppercase tracking-wide text-brand-500">Blocked</p><p class="mt-2 text-2xl font-semibold text-brand-900">2</p></div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
