<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Tabs';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$tabs_overview_items = [
  [
    'label' => 'Overview',
    'panel' => 'Track MRR, activation, and churn snapshot for this workspace.',
    'key'   => 'overview',
  ],
  [
    'label' => 'Pipeline',
    'panel' => 'Monitor qualified opportunities and weighted forecast movement.',
    'key'   => 'pipeline',
  ],
  [
    'label' => 'Activity',
    'panel' => 'Review recent team actions, handoffs, and escalations.',
    'key'   => 'activity',
  ],
];

$tabs_plan_items = [
  ['label' => 'Starter', 'panel' => 'Core reporting and team seats for early-stage teams.', 'key' => 'starter'],
  ['label' => 'Growth', 'panel' => 'Automation and collaboration for scaling operations.', 'key' => 'growth'],
  ['label' => 'Enterprise', 'panel' => 'Advanced controls, SSO, and priority support.', 'key' => 'enterprise'],
];

$tabs_badge_items = [
  ['label' => 'Inbox', 'badge' => '24', 'panel' => 'Unread leads needing first response.', 'key' => 'inbox'],
  ['label' => 'Pending', 'badge' => '9', 'panel' => 'Deals awaiting legal or procurement review.', 'key' => 'pending'],
  ['label' => 'Won', 'badge' => '18', 'panel' => 'Closed-won deals from the current quarter.', 'key' => 'won'],
];

$tabs_icon_items = [
  ['label' => 'Dashboard', 'icon_name' => 'home-6-line', 'panel' => 'High-level metrics and release status.', 'key' => 'dashboard'],
  ['label' => 'Reports', 'icon_name' => 'file-list-3-line', 'panel' => 'Scheduled exports and audit-ready summaries.', 'key' => 'reports'],
  ['label' => 'Settings', 'icon_name' => 'settings-3-line', 'panel' => 'Workspace defaults, permissions, and billing.', 'key' => 'settings'],
];

$tabs_segment_items = [
  ['label' => 'All Accounts', 'panel' => 'Complete customer list across all lifecycle stages.', 'key' => 'all-accounts'],
  ['label' => 'At Risk', 'panel' => 'Accounts with usage decline or unresolved blockers.', 'key' => 'at-risk'],
  ['label' => 'Expansion', 'panel' => 'Customers with active upsell and cross-sell potential.', 'key' => 'expansion'],
];

$tabs_status_items = [
  ['label' => 'Backlog', 'panel' => 'Prioritized product requests awaiting implementation.', 'key' => 'backlog'],
  ['label' => 'In Progress', 'panel' => 'Current sprint items owned by engineering.', 'key' => 'in-progress'],
  ['label' => 'Released', 'panel' => 'Recently shipped features and customer announcements.', 'key' => 'released'],
];

$tabs_window_items = [
  ['label' => 'Day', 'panel' => 'Daily trend for critical product events.', 'key' => 'day'],
  ['label' => 'Week', 'panel' => 'Weekly movement in activation and retention.', 'key' => 'week'],
  ['label' => 'Month', 'panel' => 'Monthly performance summary for leadership reporting.', 'key' => 'month'],
];

$tabs_mode_items = [
  ['label' => 'Summary', 'panel' => 'Executive-level rollup for stakeholder syncs.', 'key' => 'summary'],
  ['label' => 'Detailed', 'panel' => 'Record-level insights with assignee and SLA context.', 'key' => 'detailed'],
  ['label' => 'Exports', 'panel' => 'CSV and BI exports prepared for ops workflows.', 'key' => 'exports'],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/tabs',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Tabs',
    'header_subtitle'        => 'Reference for API-driven tab navigation with semantic layouts, badges, icons, and gradient controls.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs Base
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'         => 'tabs-base',
            'aria_label' => 'SaaS workspace summary tabs',
            'items'      => $tabs_overview_items,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs A
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'                  => 'tabs-a-full-width',
            'aria_label'          => 'SaaS pricing plan tabs',
            'items'               => $tabs_plan_items,
            'list_class'          => 'tabs__list grid w-full grid-cols-3 border-b border-brand-200',
            'item_base_class'     => 'tabs__item -mb-[1px] inline-flex items-center justify-center px-3 pb-3 text-sm font-medium transition-colors transition-shadow',
            'item_active_class'   => 'text-brand-900 shadow-[inset_0_-2px_0_0_theme(colors.primary.600)]',
            'item_inactive_class' => 'text-brand-600 hover:text-brand-900 hover:shadow-[inset_0_-1px_0_0_theme(colors.brand.600)]',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs B
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'                 => 'tabs-b-badges',
            'aria_label'         => 'SaaS queue tabs with counters',
            'items'              => $tabs_badge_items,
            'badge_base_class'   => 'tabs__badge rounded-full px-2 py-0.5 text-xs font-semibold',
            'badge_active_class' => 'bg-brand-900 text-white',
            'badge_inactive_class' => 'bg-brand-200 text-brand-700',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs C
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'         => 'tabs-c-icons',
            'aria_label' => 'SaaS workspace tabs with icons',
            'items'      => $tabs_icon_items,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs D
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'                  => 'tabs-d-pills',
            'aria_label'          => 'SaaS customer segment tabs',
            'items'               => $tabs_segment_items,
            'list_class'          => 'tabs__list inline-flex flex-wrap items-center gap-1 rounded-lg border border-brand-200 bg-white p-1',
            'item_base_class'     => 'tabs__item rounded-md px-4 py-2 text-sm font-medium transition-colors',
            'item_active_class'   => 'bg-brand-900 text-white',
            'item_inactive_class' => 'text-brand-700 hover:bg-brand-100',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs E
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'                  => 'tabs-e-gray-pills',
            'aria_label'          => 'SaaS workflow tabs on tinted background',
            'items'               => $tabs_status_items,
            'wrapper_class'       => 'tabs w-full rounded-lg bg-brand-100 p-2',
            'list_class'          => 'tabs__list inline-flex flex-wrap items-center gap-1',
            'item_base_class'     => 'tabs__item rounded-md px-4 py-2 text-sm font-medium transition-colors',
            'item_active_class'   => 'bg-white text-brand-900 shadow-sm',
            'item_inactive_class' => 'text-brand-700 hover:bg-white/80',
            'panel_class'         => 'tabs__panel mt-3 rounded-md border border-brand-200 bg-white p-3 text-sm text-brand-700',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs F
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'                  => 'tabs-f-dark-pills',
            'aria_label'          => 'SaaS release tabs on dark surface',
            'items'               => $tabs_status_items,
            'wrapper_class'       => 'tabs w-full rounded-lg bg-brand-800 p-2',
            'list_class'          => 'tabs__list inline-flex flex-wrap items-center gap-1',
            'item_base_class'     => 'tabs__item rounded-md px-4 py-2 text-sm font-medium transition-colors',
            'item_active_class'   => 'bg-white text-brand-900',
            'item_inactive_class' => 'text-brand-100 hover:bg-brand-700',
            'panel_class'         => 'tabs__panel mt-3 rounded-md border border-brand-700 bg-brand-900 p-3 text-sm text-brand-100',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs G
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'                  => 'tabs-g-gradient-sm',
            'aria_label'          => 'SaaS time window tabs in gradient button style',
            'items'               => $tabs_window_items,
            'list_class'          => 'tabs__list grid w-full grid-cols-3',
            'item_base_class'     => 'tabs__item btn btn--sm -ml-px first:ml-0 inline-flex items-center justify-center rounded-none first:rounded-l-md last:rounded-r-md border h-[var(--ui-h-sm)] leading-[var(--ui-h-sm)] px-[var(--ui-px-sm)] text-sm font-medium transition-colors',
            'item_active_class'   => 'relative z-10 btn--primary btn--gradient border-primary-700 bg-gradient-to-b from-primary-700 to-primary-500 text-white',
            'item_inactive_class' => 'z-0 btn--secondary btn--gradient border-brand-300 bg-gradient-to-b from-white to-brand-100 text-brand-900',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tabs H
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('tabs', [
            'id'                  => 'tabs-h-gradient-md',
            'aria_label'          => 'SaaS reporting mode tabs in gradient button style',
            'items'               => $tabs_mode_items,
            'list_class'          => 'tabs__list grid w-full grid-cols-3',
            'item_base_class'     => 'tabs__item btn btn--md -ml-px first:ml-0 inline-flex items-center justify-center rounded-none first:rounded-l-md last:rounded-r-md border h-[var(--ui-h-md)] leading-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium transition-colors',
            'item_active_class'   => 'relative z-10 btn--primary btn--gradient border-primary-700 bg-gradient-to-b from-primary-700 to-primary-500 text-white',
            'item_inactive_class' => 'z-0 btn--secondary btn--gradient border-brand-300 bg-gradient-to-b from-white to-brand-100 text-brand-900',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
