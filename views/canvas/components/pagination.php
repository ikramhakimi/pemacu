<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Pagination';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/pagination',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Pagination',
    'header_subtitle'        => 'Reference for API-driven SaaS pagination flows with server links, page windows, and range context.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pagination Base
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-6xl">
          <?php component('pagination', [
            'pagination' => [
              'current_page' => 2,
              'per_page'     => 1,
              'total_items'  => 3,
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pagination A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('pagination', [
            'pagination' => [
              'current_page' => 5,
              'per_page'     => 25,
              'total_items'  => 1460,
              'show_info'    => true,
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pagination B
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('pagination', [
            'pagination' => [
              'current_page' => 9,
              'per_page'     => 10,
              'total_items'  => 520,
              'page_window'  => 2,
              'show_info'    => true,
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pagination C
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('pagination', [
            'pagination' => [
              'current_page' => 1,
              'per_page'     => 50,
              'total_items'  => 36,
              'show_info'    => true,
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pagination D
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('pagination', [
            'pagination' => [
              'current_page' => 4,
              'per_page'     => 15,
              'total_pages'  => 8,
              'total_items'  => 120,
              'show_info'    => true,
              'links'        => [
                'prev'  => [
                  'label' => 'Previous Batch',
                ],
                'next'  => [
                  'label' => 'Next Batch',
                ],
                'pages' => [
                  ['page' => 1],
                  ['type' => 'ellipsis'],
                  ['page' => 3],
                  ['page' => 4, 'is_current' => true],
                  ['page' => 5],
                  ['type' => 'ellipsis'],
                  ['page' => 8],
                ],
              ],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
