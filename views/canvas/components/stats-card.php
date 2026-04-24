<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Stats Card';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/stats-card',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Stats Card',
    'header_subtitle'        => 'Reference for API-driven KPI cards with value, trend, tone, and helper meta.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Stats Card Base
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-sm">
          <?php component('stats-card', [
            'label'       => 'Total Sessions',
            'value'       => '48,920',
            'icon_name'   => 'bar-chart-box-line',
            'trend_text'  => '+8.4%',
            'trend_tone'  => 'positive',
            'helper_text' => 'vs previous 30 days',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Stats Card A
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3 sm:grid-cols-2">
          <?php component('stats-card', [
            'label'      => 'Clicks',
            'value'      => '62,480',
            'tone'       => 'info',
            'icon_name'  => 'cursor-line',
            'trend_text' => '+9.2%',
            'trend_tone' => 'positive',
          ]); ?>
          <?php component('stats-card', [
            'label'      => 'Leads',
            'value'      => '1,246',
            'tone'       => 'positive',
            'icon_name'  => 'user-add-line',
            'trend_text' => '+14.2%',
            'trend_tone' => 'positive',
          ]); ?>
          <?php component('stats-card', [
            'label'      => 'Drop-off Rate',
            'value'      => '18.7%',
            'tone'       => 'warning',
            'icon_name'  => 'alert-line',
            'trend_text' => '+1.9%',
            'trend_tone' => 'warning',
          ]); ?>
          <?php component('stats-card', [
            'label'      => 'Failed Payments',
            'value'      => '12',
            'tone'       => 'negative',
            'icon_name'  => 'close-circle-line',
            'trend_text' => '-3',
            'trend_tone' => 'negative',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
