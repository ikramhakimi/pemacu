<?php

declare(strict_types=1);

$resolved_page_title                 = isset($page_title) ? (string) $page_title : 'Client Dashboard';
$resolved_page_current               = isset($page_current) ? (string) $page_current : 'client-dashboard';
$resolved_global_intro               = isset($global_intro) ? trim((string) $global_intro) : '';
$resolved_dashboard_content_max      = isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl md:px-6';
$resolved_breadcrumb_description     = isset($dashboard_breadcrumb_description) ? (string) $dashboard_breadcrumb_description : 'Simple client updates and required actions';
$resolved_dashboard_breadcrumb_items = isset($dashboard_breadcrumb_items) && is_array($dashboard_breadcrumb_items)
  ? $dashboard_breadcrumb_items
  : null;

layout('mampan/partials/dashboard-start', [
  'page_title'                       => $resolved_page_title,
  'page_current'                     => $resolved_page_current,
  'dashboard_no_sidebar'             => false,
  'dashboard_sidebar'                => client_global_sidebar_links(),
  'dashboard_content_max'            => $resolved_dashboard_content_max,
  'dashboard_breadcrumb_items'       => $resolved_dashboard_breadcrumb_items,
  'dashboard_breadcrumb_description' => $resolved_breadcrumb_description,
]);
?>
<article class="app-article py-5">
  <header class="rounded-lg border border-zinc-200 bg-white p-5">
    <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">Mampan Client Portal</p>
    <h1 class="mt-2 text-2xl font-semibold text-zinc-900 md:text-3xl"><?= e($resolved_page_title); ?></h1>
    <?php if ($resolved_global_intro !== ''): ?>
      <p class="mt-2 text-sm text-zinc-600"><?= e($resolved_global_intro); ?></p>
    <?php endif; ?>
  </header>
</article>
