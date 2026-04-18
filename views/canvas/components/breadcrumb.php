<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Breadcrumb';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');
$breadcrumb_base_items = [
  ['label' => 'Home', 'href' => '#'],
  ['label' => 'Library', 'href' => '#'],
  ['label' => 'Components', 'href' => '#'],
  ['label' => 'Breadcrumb', 'current' => true],
];
$breadcrumb_icon_items = [
  [
    'label'     => 'Home',
    'href'      => '#',
    'icon_name' => 'home-6-line',
  ],
  [
    'label'     => 'Components',
    'href'      => '#',
    'icon_name' => 'box-1-line',
  ],
  [
    'label'     => 'Navigation',
    'href'      => '#',
    'icon_name' => 'function-line',
  ],
  [
    'label'     => 'Breadcrumb',
    'current'   => true,
    'icon_name' => 'map-pin-line',
  ],
];
$breadcrumb_compact_items = [
  ['label' => 'Home', 'href' => '#'],
  ['label' => 'Dashboards', 'href' => '#'],
  ['label' => 'Analytics', 'current' => true],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/breadcrumb',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Breadcrumb',
    'header_subtitle'        => 'Reference for path hierarchy, separator styles, and compact breadcrumb usage.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Breadcrumb Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('breadcrumb', [
            'items' => $breadcrumb_base_items,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Breadcrumb A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('breadcrumb', [
            'items'     => $breadcrumb_base_items,
            'separator' => 'chevron',
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
        Breadcrumb B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('breadcrumb', [
            'items'           => $breadcrumb_icon_items,
            'separator'       => 'chevron',
            'show_item_icons' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Breadcrumb C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('breadcrumb', [
            'items' => $breadcrumb_compact_items,
            'size'  => 'sm',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
