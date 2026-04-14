<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Widget';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/widget',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Widget',
    'header_subtitle'        => 'Reference for dashboard metric widgets built on card layout with BEM extension classes.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use one core KPI per widget for quick scan in dashboard grids.</li>
      <li>Keep captions short and action-neutral.</li>
      <li>Use badge for compact trend or state labels.</li>
      <li>Use helper info to add context such as comparison period.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Standard KPI</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for high-level counts such as bookings, leads, and completed actions.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-4 md:grid-cols-3">
          <?php component('widget', [
            'widget_icon_name' => 'calendar-check-line',
            'widget_tone'      => 'positive',
            'widget_caption'   => 'Total Bookings',
            'widget_number'    => '1,284',
            'widget_badge'     => '+12.4%',
            'widget_info'      => 'Compared with last 30 days',
          ]); ?>
          <?php component('widget', [
            'widget_icon_name' => 'user-follow-line',
            'widget_tone'      => 'negative',
            'widget_caption'   => 'New Leads',
            'widget_number'    => '386',
            'widget_badge'     => '-6.2%',
            'widget_info'      => 'Compared with last 30 days',
          ]); ?>
          <?php component('widget', [
            'widget_icon_name' => 'money-dollar-circle-line',
            'widget_tone'      => 'accent',
            'widget_caption'   => 'Revenue',
            'widget_number'    => '$24,320',
            'widget_badge'     => 'Top Tier',
            'widget_info'      => 'Compared with last 30 days',
          ]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">No Badge</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use when trend context is not available and only current value should be shown.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="max-w-sm">
          <?php component('widget', [
            'widget_icon_name' => 'time-line',
            'widget_caption'   => 'Pending Approvals',
            'widget_number'    => '18',
            'widget_info'      => 'Updated 5 minutes ago',
          ]); ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
