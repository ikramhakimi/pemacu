<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Frame';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');
$frame_accordion_items = [
  [
    'title'   => 'What is included in the session package?',
    'content' => 'Each package includes shoot time, edited high-resolution photos, and an online delivery gallery.',
  ],
  [
    'title'   => 'How long is the standard turnaround time?',
    'content' => 'Final edited photos are typically delivered within 7 to 10 working days after the session date.',
  ],
  [
    'title'   => 'Can I reschedule my booked slot?',
    'content' => 'Yes. Rescheduling is allowed with at least 48 hours notice, subject to the next available slot.',
  ],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/frame',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Frame',
    'header_subtitle'        => 'Reference variants for frame container patterns.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
  ?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Base
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('frame', [
            'variant'     => 'base',
            'panel_count' => 1,
            'show_footer' => true,
            'footer_text' => 'Frame Footer',
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Base (Two Panels)
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('frame', [
            'variant'     => 'base',
            'panel_count' => 2,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Stacked
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('frame', [
            'variant'     => 'stacked',
            'panel_count' => 2,
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Dense
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('frame', [
            'variant'     => 'dense',
            'panel_count' => 1,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Dense Stacked
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('frame', [
            'variant'     => 'dense-stacked',
            'panel_count' => 2,
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Ghost
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('frame', [
            'variant'     => 'ghost',
            'panel_count' => 2,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Ghost Dark
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('frame', [
            'variant'     => 'ghost-dark',
            'panel_count' => 2,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Frame with Accordion
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php
          ob_start();
          component('accordion', [
            'items'      => $frame_accordion_items,
            'variant'    => 'cards',
            'class_name' => '!space-y-1',
          ]);
          $frame_accordion_panel_html = (string) ob_get_clean();
          component('frame', [
            'variant'              => 'base',
            'panel_html_items'     => [$frame_accordion_panel_html],
            'render_panel_wrapper' => false,
            'panel_count'          => 1,
            'show_footer'          => false,
          ]);
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Dense Frame with Accordion F
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php
          ob_start();
          ?>
          <div class="bg-white rounded-md ring-1 ring-brand-300">
            <?php component('accordion', [
              'items'              => $frame_accordion_items,
              'chevron_position'   => 'start',
              'summary_class'      => 'flex items-center gap-3 py-4 px-3',
              'summary_text_class' => 'accordion__title flex-1 text-left',
              'panel_class'        => 'pb-5 pl-12',
            ]); ?>
          </div>
          <?php
          $frame_accordion_f_panel_html = (string) ob_get_clean();
          component('frame', [
            'variant'              => 'dense',
            'panel_html_items'     => [$frame_accordion_f_panel_html],
            'render_panel_wrapper' => false,
            'panel_count'          => 1,
            'show_footer'          => false,
          ]);
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
