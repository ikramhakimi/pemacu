<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Badge';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$badge_items = [
  [
    'label' => '+12.4%',
    'tone'  => 'positive',
  ],
  [
    'label' => '-4.1%',
    'tone'  => 'negative',
  ],
  [
    'label' => 'Pending',
    'tone'  => 'neutral',
  ],
  [
    'label' => 'Awaiting Review',
    'tone'  => 'warning',
  ],
  [
    'label' => 'In Progress',
    'tone'  => 'info',
  ],
  [
    'label' => 'Priority',
    'tone'  => 'accent',
  ],
];

$badge_inline_items = [
  [
    'label' => 'Active',
    'tone'  => 'positive',
  ],
];

$badge_icon_items = [
  [
    'label'      => 'Verified',
    'tone'       => 'positive',
    'icon_name'  => 'checkbox-circle-fill',
    'icon_size'  => '16',
    'icon_class' => 'text-current',
  ],
  [
    'label'      => 'Needs Review',
    'tone'       => 'warning',
    'icon_name'  => 'alert-fill',
    'icon_size'  => '16',
    'icon_class' => 'text-current',
  ],
  [
    'label'      => 'Failed',
    'tone'       => 'negative',
    'icon_name'  => 'close-circle-fill',
    'icon_size'  => '16',
    'icon_class' => 'text-current',
  ],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/badge',
]);
?>
<?php
$canvas_header = [
  'header_title'           => 'Badge',
  'header_subtitle'        => 'Reference for semantic tone chips and grouped inline status sets.',
  'header_container_class' => 'w-full',
];
component('canvas/header', ['canvas_header' => $canvas_header]);
?>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Badge Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('badge', ['items' => [$badge_items[2]]]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Badge A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('badge', [
            'items'        => $badge_items,
            'show_wrapper' => true,
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
        Badge B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <div class="flex items-center gap-2">
            <?php component('badge', ['items' => $badge_inline_items]); ?>
            <p class="text-xs text-brand-500">Updated 5 mins ago</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Badge C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('badge', [
            'items'        => [
              ['label' => '+12.4%', 'tone' => 'positive', 'class_name' => 'rounded-full'],
              ['label' => '-4.1%', 'tone' => 'negative', 'class_name' => 'rounded-full'],
              ['label' => 'Pending', 'tone' => 'neutral', 'class_name' => 'rounded-full'],
              ['label' => 'In Progress', 'tone' => 'info', 'class_name' => 'rounded-full'],
            ],
            'show_wrapper' => true,
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
        Badge D
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('badge', [
            'items'        => $badge_icon_items,
            'show_wrapper' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Badge E
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('badge', [
            'items' => [
              [
                'label'       => 'Aina Zulkifli',
                'tone'        => 'neutral',
                'avatar_src'  => path('/assets/images/avatars/avatar-01.jpg'),
                'avatar_alt'  => 'Avatar of Aina',
                'avatar_size' => '24',
              ],
            ],
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
        Badge F
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg items-center justify-center gap-4">
          <div class="relative inline-flex">
            <?php component('button', [
              'label'      => 'Cart items',
              'variant'    => 'secondary',
              'size'       => 'md',
              'gradient'   => true,
              'icon_name'  => 'shopping-cart-2-line',
              'icon_only'  => true,
              'aria_label' => 'Open cart with items',
            ]); ?>
            <?php component('badge', [
              'items' => [[
                'label' => '25',
                'mode'  => 'badge_count',
              ]],
            ]); ?>
          </div>

          <div class="relative inline-flex">
            <?php component('button', [
              'label'      => 'Cart status',
              'variant'    => 'secondary',
              'size'       => 'md',
              'gradient'   => true,
              'icon_name'  => 'shopping-cart-2-line',
              'icon_only'  => true,
              'aria_label' => 'Open cart status',
            ]); ?>
            <?php component('badge', [
              'items' => [[
                'mode' => 'badge_dot',
              ]],
            ]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
