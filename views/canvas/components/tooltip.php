<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Tooltip';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/tooltip',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Tooltip',
    'header_subtitle'        => 'Reference for API-driven tooltips with position, tone, and trigger variants.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tooltip Base
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <?php component('tooltip', [
          'trigger_label' => 'Hover for details',
          'content'       => 'Sessions are counted when users load any tracked page.',
        ]); ?>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tooltip A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid gap-8">
          <?php component('tooltip', [
            'trigger_label' => 'Top (default)',
            'content'       => 'Revenue is aggregated from paid orders only.',
            'position'      => 'top',
          ]); ?>
          <?php component('tooltip', [
            'trigger_label' => 'Bottom',
            'content'       => 'Conversion rate = bookings divided by leads.',
            'position'      => 'bottom',
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
        Tooltip B
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex items-center gap-10">
          <?php component('tooltip', [
            'trigger_label' => 'Left',
            'content'       => 'Visible on hover and keyboard focus.',
            'position'      => 'left',
          ]); ?>
          <?php component('tooltip', [
            'trigger_label' => 'Right',
            'content'       => 'ARIA attributes are included for assistive tech.',
            'position'      => 'right',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Tooltip C
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid gap-8">
          <?php component('tooltip', [
            'trigger_label' => 'Dark tone',
            'content'       => 'Default tooltip visual style.',
            'tone'          => 'dark',
            'size'          => 'md',
          ]); ?>
          <?php component('tooltip', [
            'trigger_label' => 'Light tone, no arrow',
            'content'       => 'Good for dense UI where softer contrast is preferred.',
            'tone'          => 'light',
            'show_arrow'    => false,
            'size'          => 'sm',
          ]); ?>
          <?php component('tooltip', [
            'trigger_label' => 'Info tone',
            'content'       => 'Can be used for contextual helper messaging.',
            'tone'          => 'info',
            'trigger_as'    => 'span',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
