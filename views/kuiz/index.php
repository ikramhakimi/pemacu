<?php

declare(strict_types=1);

$page_title   = 'Kuiz';
$page_current = 'kuiz';

layout('kuiz/partials/kuiz-start', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
]);
?>
<article class="app-article pb-20 pt-5 space-y-5">
  <section aria-labelledby="kuiz-overview-heading">
    <h2 id="kuiz-overview-heading" class="sr-only">Soalan 1 / 20</h2>
    <div class="<?= card('bg-brand-50 p-5'); ?>">
      <p class="font-medium text-brand-900">Kuiz content goes here.</p>
      <p class="mt-2 text-brand-600">
        This page is ready to use the same dashboard shell, spacing, sidebar, and component system.
      </p>
    </div>
  </section>
</article>
<?php layout('kuiz/partials/kuiz-end'); ?>
