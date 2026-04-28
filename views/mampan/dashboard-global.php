<?php

declare(strict_types=1);

$resolved_page_title                 = isset($page_title) ? (string) $page_title : 'Consultant Dashboard';
$resolved_page_current               = isset($page_current) ? (string) $page_current : 'consultant-dashboard';
$resolved_global_intro               = isset($global_intro) ? trim((string) $global_intro) : '';
$resolved_dashboard_content_max      = isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl md:px-6';

layout('mampan/partials/dashboard-start', [
  'page_title'            => $resolved_page_title,
  'page_current'          => $resolved_page_current,
  'dashboard_no_sidebar'  => true,
  'dashboard_content_max' => $resolved_dashboard_content_max,
]);
?>
<article class="app-article py-5">
  <header class="rounded-lg border border-brand-200 bg-white p-5">
    <div class="flex flex-wrap items-start justify-between gap-3">
      <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Mampan Consultant App</p>
        <h1 class="mt-2 text-2xl font-semibold text-brand-900 md:text-3xl"><?= e($resolved_page_title); ?></h1>
        <?php if ($resolved_global_intro !== ''): ?>
          <p class="mt-2 text-sm text-brand-600"><?= e($resolved_global_intro); ?></p>
        <?php endif; ?>
      </div>
      <div>
        <?php component('button', [
          'label'   => 'Open Client Portal',
          'href'    => path('/mampan/client/dashboard'),
          'size'    => 'sm',
          'variant' => 'default',
        ]); ?>
      </div>
    </div>
  </header>
</article>
