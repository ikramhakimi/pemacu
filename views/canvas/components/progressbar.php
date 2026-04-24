<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Progressbar';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$tone_examples = [
  ['label' => 'Neutral Progress', 'tone' => 'neutral', 'value' => 24],
  ['label' => 'Info Progress', 'tone' => 'info', 'value' => 46],
  ['label' => 'Positive Progress', 'tone' => 'positive', 'value' => 78],
  ['label' => 'Warning Progress', 'tone' => 'warning', 'value' => 61],
  ['label' => 'Negative Progress', 'tone' => 'negative', 'value' => 32],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/progressbar',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Progressbar',
    'header_subtitle'        => 'Reference for API-driven linear progress indicators with tone, size, and value display options.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Progressbar Base
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('progressbar', [
            'label'     => 'Session Completion',
            'value'     => 68,
            'show_meta' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Progressbar A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-5">
          <?php component('progressbar', [
            'label'     => 'Small Progress',
            'size'      => 'sm',
            'value'     => 35,
            'show_meta' => true,
          ]); ?>
          <?php component('progressbar', [
            'label'     => 'Medium Progress',
            'size'      => 'md',
            'value'     => 52,
            'show_meta' => true,
          ]); ?>
          <?php component('progressbar', [
            'label'     => 'Large Progress',
            'size'      => 'lg',
            'value'     => 79,
            'show_meta' => true,
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
        Progressbar B
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-5">
          <?php foreach ($tone_examples as $example): ?>
            <?php component('progressbar', [
              'label'     => $example['label'],
              'tone'      => $example['tone'],
              'value'     => $example['value'],
              'show_meta' => true,
            ]); ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Progressbar C
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-5">
          <?php component('progressbar', [
            'label'      => 'Leads Processed',
            'min'        => 0,
            'max'        => 240,
            'value'      => 186,
            'tone'       => 'positive',
            'show_meta'  => true,
            'value_mode' => 'value',
          ]); ?>
          <?php component('progressbar', [
            'label'      => 'Quarter Revenue Target',
            'min'        => 0,
            'max'        => 180000,
            'value'      => 142800,
            'tone'       => 'info',
            'show_meta'  => true,
            'value_mode' => 'value',
          ]); ?>
          <?php component('progressbar', [
            'label'         => 'Quality Gate',
            'value'         => 91.5,
            'show_meta'     => true,
            'decimals'      => 1,
            'value_mode'    => 'percent',
            'aria_valuetext' => '91.5 percent complete',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
