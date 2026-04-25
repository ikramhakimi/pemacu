<?php

declare(strict_types=1);

$resolved_page_title                 = isset($page_title) ? (string) $page_title : 'Project Dashboard';
$resolved_page_current               = isset($page_current) ? (string) $page_current : 'consultant-projects';
$resolved_project_current            = isset($project_current) ? (string) $project_current : 'project-workspace';
$resolved_dashboard_content_max      = isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl md:px-6';
$resolved_breadcrumb_description     = isset($dashboard_breadcrumb_description) ? (string) $dashboard_breadcrumb_description : 'Project workspace modules';
$resolved_dashboard_breadcrumb_items = isset($dashboard_breadcrumb_items) && is_array($dashboard_breadcrumb_items)
  ? $dashboard_breadcrumb_items
  : null;
$project_context_defaults            = consultant_project_context_defaults();
$provided_project_context            = isset($project_context) && is_array($project_context) ? $project_context : [];
$resolved_project_context            = array_merge($project_context_defaults, $provided_project_context);
$project_nav_links                   = consultant_project_nav_links($resolved_project_current);
$project_name                        = isset($resolved_project_context['project_name']) ? trim((string) $resolved_project_context['project_name']) : 'Project';
$project_code                        = isset($resolved_project_context['project_code']) ? trim((string) $resolved_project_context['project_code']) : '-';
$client_company                      = isset($resolved_project_context['client_company']) ? trim((string) $resolved_project_context['client_company']) : '-';
$project_location                    = isset($resolved_project_context['project_location']) ? trim((string) $resolved_project_context['project_location']) : '-';
$gbi_tool_type                       = isset($resolved_project_context['gbi_tool_type']) ? trim((string) $resolved_project_context['gbi_tool_type']) : '-';
$target_rating                       = isset($resolved_project_context['target_rating']) ? trim((string) $resolved_project_context['target_rating']) : '-';
$project_status                      = isset($resolved_project_context['project_status']) ? trim((string) $resolved_project_context['project_status']) : '-';
$consultant_lead                     = isset($resolved_project_context['consultant_lead']) ? trim((string) $resolved_project_context['consultant_lead']) : '-';
$client_pic                          = isset($resolved_project_context['client_pic']) ? trim((string) $resolved_project_context['client_pic']) : '-';

layout('mampan/partials/dashboard-start', [
  'page_title'                     => $resolved_page_title,
  'page_current'                   => $resolved_page_current,
  'dashboard_no_sidebar'           => false,
  'dashboard_sidebar'              => consultant_global_sidebar_links(),
  'dashboard_content_max'          => $resolved_dashboard_content_max,
  'dashboard_breadcrumb_items'     => $resolved_dashboard_breadcrumb_items,
  'dashboard_breadcrumb_description' => $resolved_breadcrumb_description,
]);
?>
<header class="app-header <?php card('bg-white') ?> mt-5" aria-label="Project context">
  <div class="p-5 pb-0">
    <div class="sm:flex flex-wrap items-center gap-4">
      <?php component('placeholder-image', ['aspect-ratio' => 'aspect-square rounded-md h-[100px]']); ?>
      <div class="space-y-3">
        <p class="leading-none text-xs font-semibold uppercase tracking-wide text-zinc-500">
          <?= e($gbi_tool_type); ?> 
          <span class="font-light px-1">/</span> 
          <?= e($project_code); ?>
        </p>
        <h1 class="leading-none text-2xl font-semibold text-zinc-900 md:text-3xl"><?= e($project_name); ?></h1>
        <p class="leading-none flex items-center gap-2">
          <?php component('badge', [
            'items' => [
              ['label' => $project_status, 'tone' => 'warning'],
              ['label' => $target_rating, 'tone' => 'neutral'],
            ],
          ]); ?>
        </p>
      </div>
    </div>
    <dl class="hiddens mt-6 -mx-6 grid border-t border-brand-200 sm:grid-cols-2 lg:grid-cols-4 divide-x divide-brand-200">
      <div class="py-4 px-6">
        <dt class="text-xs uppercase tracking-wide text-brand-500">Client Company</dt>
        <dd class="mt-1 font-medium text-brand-900"><?= e($client_company); ?></dd>
      </div>
      <div class="py-4 pl-6">
        <dt class="text-xs uppercase tracking-wide text-brand-500">Project Location</dt>
        <dd class="mt-1 font-medium text-brand-900"><?= e($project_location); ?></dd>
      </div>
    </dl>
  </div>
  <nav class="border-t border-brand-200 px-5 py-4" aria-label="Project navigation">
    <div class="flex flex-wrap gap-2">
      <?php foreach ($project_nav_links as $link_item): ?>
        <?php
        $link_href = isset($link_item['href']) ? trim((string) $link_item['href']) : '#';
        $link_label = isset($link_item['label']) ? trim((string) $link_item['label']) : '';
        $link_active = isset($link_item['active']) && $link_item['active'] === true;
        $link_class = 'inline-flex items-center rounded-md px-4 py-2 text-sm font-medium transition-colors';
        $link_class .= $link_active
          ? ' bg-brand-900 text-white'
          : ' bg-brand-100 text-brand-700 hover:bg-brand-300 ';
        ?>
        <?php if ($link_label !== ''): ?>
          <a
            href="<?= e($link_href); ?>"
            class="<?= e($link_class); ?>"
            <?= $link_active ? 'aria-current="page"' : ''; ?>
          >
            <?= e($link_label); ?>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </nav>
</header>
