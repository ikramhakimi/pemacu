<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Checkbox';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/checkbox',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Checkbox',
    'header_subtitle'        => 'Reference for selectable binary controls with checked, disabled, and layout variants.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Checkbox Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('checkbox', [
            'id'    => 'checkbox-base',
            'name'  => 'checkbox_base',
            'label' => 'Include this account in weekly KPI reports',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Checkbox A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col gap-4">
          <?php component('checkbox', [
            'id'      => 'checkbox-checked',
            'name'    => 'checkbox_checked',
            'label'   => 'Auto-renew annual growth plan',
            'checked' => true,
          ]); ?>

          <?php component('checkbox', [
            'id'               => 'checkbox-checked-icon-label',
            'name'             => 'checkbox_checked_icon_label',
            'label'            => 'Product analytics summary',
            'label_icon_name'  => 'bar-chart-box-line',
            'label_icon_size'  => '20',
            'label_icon_class' => 'text-brand-600',
            'label_text_class' => 'text-brand-900',
            'checked'          => true,
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
        Checkbox B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('checkbox', [
            'id'       => 'checkbox-disabled',
            'name'     => 'checkbox_disabled',
            'label'    => 'Enable SSO (Enterprise plan required)',
            'disabled' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Checkbox C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('checkbox', [
            'id'             => 'checkbox-checked-disabled',
            'name'           => 'checkbox_checked_disabled',
            'label'          => 'Billing owner verified',
            'checked'        => true,
            'disabled'       => true,
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
        Checkbox D
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col gap-4">
          <?php component('checkbox', [
            'id'             => 'checkbox-label-start',
            'name'           => 'checkbox_label_start',
            'label'          => 'Notify team on deal stage changes',
            'label_position' => 'start',
            'checked'        => true,
          ]); ?>

          <?php component('checkbox', [
            'id'               => 'checkbox-d-icon-label',
            'name'             => 'checkbox_d_icon_label',
            'label'            => 'Client onboarding updates',
            'label_position'   => 'start',
            'label_icon_name'  => 'briefcase-4-line',
            'label_icon_size'  => '20',
            'label_icon_class' => 'text-brand-600',
            'label_text_class' => 'text-brand-900',
            'checked'          => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Checkbox E
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('checkbox', [
            'id'         => 'checkbox-iconless',
            'name'       => 'checkbox_iconless',
            'show_label' => false,
            'attributes' => [
              'aria-label' => 'Enable release notes email updates',
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
        Checkbox F
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-wrap items-center justify-center gap-3">
          <?php component('checkbox', [
            'id'          => 'checkbox-f-email-summary',
            'name'        => 'checkbox_f_email_summary',
            'label'       => '5 points',
            'checked'     => true,
            'class'       => 'h-[var(--ui-h-md)] rounded-md border border-brand-300 bg-white px-3',
          ]); ?>

          <?php component('checkbox', [
            'id'          => 'checkbox-f-slack-alerts',
            'name'        => 'checkbox_f_slack_alerts',
            'label'       => '10 points',
            'class'       => 'h-[var(--ui-h-md)] rounded-md border border-brand-300 bg-white px-3',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Checkbox G
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-lg">
          <div class="<?php card('divide-y divide-brand-200 bg-white'); ?>">
            <div class="flex items-center justify-between gap-3 p-4">
              <p class="text-base font-semibold text-brand-900">Manage your preferences</p>
            </div>

            <?php component('checkbox', [
              'id'               => 'checkbox-g-front-end',
              'name'             => 'checkbox_g_front_end',
              'label'            => 'Front End Engineering',
              'label_position'   => 'start',
              'label_icon_name'  => 'code-s-slash-line',
              'label_icon_size'  => '20',
              'label_icon_class' => 'text-brand-600',
              'label_text_class' => 'text-brand-900',
              'class'            => 'w-full justify-between p-4',
              'checked'          => true,
            ]); ?>

            <?php component('checkbox', [
              'id'               => 'checkbox-g-business-insight',
              'name'             => 'checkbox_g_business_insight',
              'label'            => 'Business Insight',
              'label_position'   => 'start',
              'label_icon_name'  => 'line-chart-line',
              'label_icon_size'  => '20',
              'label_icon_class' => 'text-brand-600',
              'label_text_class' => 'text-brand-900',
              'class'            => 'w-full justify-between p-4',
            ]); ?>

            <?php component('checkbox', [
              'id'               => 'checkbox-g-ui-ux-design',
              'name'             => 'checkbox_g_ui_ux_design',
              'label'            => 'UI/UX Design',
              'label_position'   => 'start',
              'label_icon_name'  => 'layout-masonry-line',
              'label_icon_size'  => '20',
              'label_icon_class' => 'text-brand-600',
              'label_text_class' => 'text-brand-900',
              'class'            => 'w-full justify-between p-4',
            ]); ?>
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
        Checkbox H
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-xl flex-col gap-3">
          <div class="flex items-start gap-3 rounded-xl border border-brand-200 bg-white p-4 has-[input:checked]:border-primary-300 has-[input:checked]:bg-primary-50">
            <?php component('checkbox', [
              'id'         => 'checkbox-h-launch-at-startup',
              'name'       => 'checkbox_h_launch_at_startup',
              'show_label' => false,
              'checked'    => true,
              'attributes' => [
                'aria-label' => 'Launch at startup',
              ],
            ]); ?>
            <label for="checkbox-h-launch-at-startup" class="flex cursor-pointer flex-col gap-1">
              <span class="font-medium text-brand-900">Launch at startup</span>
              <span class="text-brand-600">Starting with your Operating System</span>
            </label>
          </div>

          <div class="flex items-start gap-3 rounded-xl border border-brand-200 bg-white p-4 has-[input:checked]:border-primary-300 has-[input:checked]:bg-primary-50">
            <?php component('checkbox', [
              'id'         => 'checkbox-h-install-update-automatically',
              'name'       => 'checkbox_h_install_update_automatically',
              'show_label' => false,
              'attributes' => [
                'aria-label' => 'Install update automatically',
              ],
            ]); ?>
            <label for="checkbox-h-install-update-automatically" class="flex cursor-pointer flex-col gap-1">
              <span class="font-medium text-brand-900">Install update automatically</span>
              <span class="text-brand-600">Download and install new version</span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
