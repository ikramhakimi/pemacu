<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Drawer';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$render_button_html = static function (array $button_options): string {
  ob_start();
  component('button', $button_options);
  return (string) ob_get_clean();
};

$drawer_right_close_button = $render_button_html([
  'label'      => 'Close',
  'variant'    => 'secondary',
  'size'       => 'md',
  'attributes' => [
    'data-drawer-close' => true,
  ],
]);
$drawer_right_save_button = $render_button_html([
  'label'   => 'Save',
  'variant' => 'default',
  'size'    => 'md',
]);

$drawer_action_duplicate = $render_button_html([
  'label'   => 'Duplicate Item',
  'variant' => 'secondary',
  'size'    => 'md',
  'class'   => 'w-full',
]);
$drawer_action_export = $render_button_html([
  'label'   => 'Export PDF',
  'variant' => 'secondary',
  'size'    => 'md',
  'class'   => 'w-full',
]);
$drawer_action_delete = $render_button_html([
  'label'   => 'Delete',
  'variant' => 'negative',
  'size'    => 'md',
  'class'   => 'w-full',
]);

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/drawer',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Drawer',
    'header_subtitle'        => 'Reference for left, right, and bottom drawer patterns with transition-driven interaction.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Drawer Base
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('drawer', [
            'id'       => 'drawer-right-details',
            'position' => 'right',
            'title'    => 'Project Details',
            'trigger'  => [
              'label' => 'Open Right Drawer',
            ],
            'body_html'   => '<div class="space-y-3">' .
              '<p><span class="font-medium text-brand-900">Project:</span> HQ Retrofit Program</p>' .
              '<p><span class="font-medium text-brand-900">Owner:</span> Faris Engineering</p>' .
              '<p><span class="font-medium text-brand-900">Status:</span> In Progress</p>' .
              '<p><span class="font-medium text-brand-900">Scope:</span> Energy and envelope upgrades across 3 blocks.</p>' .
              '</div>',
            'footer_html' => $drawer_right_close_button . $drawer_right_save_button,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Drawer A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg items-center justify-center gap-3">
          <?php component('drawer', [
            'id'       => 'drawer-bottom-direction',
            'position' => 'bottom',
            'title'    => 'Bottom Drawer',
            'trigger'  => [
              'label'      => 'Open bottom drawer',
              'aria_label' => 'Open bottom drawer',
              'icon_only'  => true,
              'icon_name'  => 'arrow-down-line',
              'variant'    => 'secondary',
              'gradient'   => true,
            ],
            'body_html' => '<p class="text-sm">Bottom-direction drawer entering from the page bottom edge.</p>',
          ]); ?>

          <?php component('drawer', [
            'id'       => 'drawer-top-direction',
            'position' => 'top',
            'title'    => 'Top Drawer',
            'trigger'  => [
              'label'      => 'Open top drawer',
              'aria_label' => 'Open top drawer',
              'icon_only'  => true,
              'icon_name'  => 'arrow-up-line',
              'variant'    => 'secondary',
              'gradient'   => true,
            ],
            'body_html' => '<p class="text-sm">Top-direction drawer entering from the page top edge.</p>',
          ]); ?>

          <?php component('drawer', [
            'id'       => 'drawer-right-direction',
            'position' => 'right',
            'title'    => 'Right Drawer',
            'trigger'  => [
              'label'      => 'Open right drawer',
              'aria_label' => 'Open right drawer',
              'icon_only'  => true,
              'icon_name'  => 'arrow-right-line',
              'variant'    => 'secondary',
              'gradient'   => true,
            ],
            'body_html' => '<p class="text-sm">Right-direction drawer entering from the page right edge.</p>',
          ]); ?>

          <?php component('drawer', [
            'id'       => 'drawer-left-direction',
            'position' => 'left',
            'title'    => 'Left Drawer',
            'trigger'  => [
              'label'      => 'Open left drawer',
              'aria_label' => 'Open left drawer',
              'icon_only'  => true,
              'icon_name'  => 'arrow-left-line',
              'variant'    => 'secondary',
              'gradient'   => true,
            ],
            'body_html' => '<p class="text-sm">Left-direction drawer entering from the page left edge.</p>',
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
        Drawer B
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-wrap items-center justify-center gap-3">
          <?php component('drawer', [
            'id'       => 'drawer-size-medium',
            'position' => 'right',
            'size'     => 'md',
            'title'    => 'Drawer Medium',
            'trigger'  => [
              'label'    => 'Medium',
              'variant'  => 'default',
              'gradient' => true,
            ],
            'body_html' => '<p class="text-sm">Medium drawer size for standard side-panel workflows.</p>',
          ]); ?>

          <?php component('drawer', [
            'id'       => 'drawer-size-large',
            'position' => 'right',
            'size'     => 'lg',
            'title'    => 'Drawer Large',
            'trigger'  => [
              'label'    => 'Large',
              'variant'  => 'default',
              'gradient' => true,
            ],
            'body_html' => '<p class="text-sm">Large drawer size for denser content and multi-step flows.</p>',
          ]); ?>

          <?php component('drawer', [
            'id'       => 'drawer-size-full-screen',
            'position' => 'right',
            'size'     => 'full',
            'title'    => 'Drawer Full Screen',
            'trigger'  => [
              'label'    => 'Full Screen',
              'variant'  => 'default',
              'gradient' => true,
            ],
            'body_html' => '<p class="text-sm">Full-screen drawer size for immersive, high-focus tasks.</p>',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
