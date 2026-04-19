<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Switch';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/switch',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Switch',
    'header_subtitle'        => 'Reference for binary switch controls with state, label, and layout variants.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Switch Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('switch', [
            'id'    => 'switch-base',
            'name'  => 'switch_base',
            'label' => 'switch:default',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Switch A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('switch', [
            'id'      => 'switch-checked',
            'name'    => 'switch_checked',
            'label'   => 'switch:checked',
            'checked' => true,
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
        Switch B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('switch', [
            'id'       => 'switch-disabled',
            'name'     => 'switch_disabled',
            'label'    => 'switch:disabled',
            'disabled' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Switch C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('switch', [
            'id'             => 'switch-label-start',
            'name'           => 'switch_label_start',
            'label'          => 'switch:label-start',
            'label_position' => 'start',
            'checked'        => true,
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
        Switch D
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('switch', [
            'id'         => 'switch-iconless',
            'name'       => 'switch_iconless',
            'show_label' => false,
            'checked'    => true,
            'attributes' => [
              'aria-label' => 'Enable notifications',
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Switch E
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-lg">
          <div class="<?php card('divide-y divide-brand-200 bg-white'); ?>">
            <div class="flex items-center justify-between gap-3 p-4">
              <div class="flex items-center gap-3">
                <div>
                  <p class="text-base font-semibold text-brand-900">Manage your preferences</p>
                  <p class="text-sm text-brand-500">Control how your workspace behaves.</p>
                </div>
              </div>
            </div>

            <div class="flex items-center justify-between gap-3 p-4">
              <?php component('switch', [
                'id'         => 'switch-preferences-privacy',
                'name'       => 'switch_preferences_privacy',
                'label'      => 'Privacy Mode',
                'label_position' => 'start',
                'label_icon_name' => 'lock-2-line',
                'label_icon_size' => '20',
                'label_icon_class' => 'text-brand-600',
                'label_text_class' => 'text-sm text-brand-900',
                'class'      => 'w-full cursor-pointer justify-between',
                'checked'    => true,
              ]); ?>
            </div>

            <div class="flex items-center justify-between gap-3 p-4">
              <?php component('switch', [
                'id'         => 'switch-preferences-notifications',
                'name'       => 'switch_preferences_notifications',
                'label'      => 'Notifications',
                'label_position' => 'start',
                'label_icon_name' => 'notification-3-line',
                'label_icon_size' => '20',
                'label_icon_class' => 'text-brand-600',
                'label_text_class' => 'text-sm text-brand-900',
                'class'      => 'w-full cursor-pointer justify-between',
                'checked'    => true,
              ]); ?>
            </div>

            <div class="flex items-center justify-between gap-3 p-4">
              <?php component('switch', [
                'id'         => 'switch-preferences-dark-theme',
                'name'       => 'switch_preferences_dark_theme',
                'label'      => 'Dark Theme',
                'label_position' => 'start',
                'label_icon_name' => 'moon-clear-line',
                'label_icon_size' => '20',
                'label_icon_class' => 'text-brand-600',
                'label_text_class' => 'text-sm text-brand-900',
                'class'      => 'w-full cursor-pointer justify-between',
              ]); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Switch F
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('switch', [
            'id'                  => 'switch-state-icons',
            'name'                => 'switch_state_icons',
            'label'               => 'Enable state icon switch',
            'show_label'          => false,
            'checked'             => true,
            'state_icon_on_name'  => 'close-line',
            'state_icon_off_name' => 'check-line',
            'state_icon_size'     => '16',
            'state_icon_on_class' => 'text-brand-700',
            'state_icon_off_class'=> 'text-white',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
