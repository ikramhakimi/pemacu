<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Empty State';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/empty-state',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Empty State',
    'header_subtitle'        => 'Reference for API-driven empty-state blocks with optional actions and semantic tones.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Empty State Base
      </div>
      <div class="relative flex min-h-[280px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('empty-state', [
            'title'       => 'No orders yet',
            'description' => 'Orders will appear here after checkout is completed.',
            'primary_action' => [
              'label'   => 'Create Order',
              'variant' => 'primary',
              'size'    => 'md',
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Empty State A
      </div>
      <div class="relative flex min-h-[280px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-4">
          <?php component('empty-state', [
            'title'       => 'No filtered results',
            'description' => 'Try widening date range or remove one filter.',
            'tone'        => 'info',
            'icon_name'   => 'filter-3-line',
            'primary_action' => [
              'label' => 'Reset Filters',
              'size'  => 'md',
            ],
            'secondary_action' => [
              'label'   => 'Learn More',
              'variant' => 'secondary',
              'size'    => 'md',
            ],
          ]); ?>
          <?php component('empty-state', [
            'title'       => 'Action required',
            'description' => 'Connect payment gateway to start receiving online bookings.',
            'tone'        => 'warning',
            'icon_name'   => 'alarm-warning-line',
            'primary_action' => [
              'label'   => 'Connect Gateway',
              'variant' => 'negative',
              'size'    => 'md',
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
