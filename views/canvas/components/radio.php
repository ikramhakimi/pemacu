<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Radio';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/radio',
]);
?>
  <?php
  $canvas_header = [
    'header_title'           => 'Radio',
    'header_subtitle'        => 'Reference for API-driven single-choice controls across SaaS workflows.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Radio Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg items-center justify-center gap-6">
          <?php component('radio', [
            'id'      => 'radio-base-monthly',
            'name'    => 'billing_cycle_base',
            'value'   => 'monthly',
            'label'   => 'Monthly Plan',
            'checked' => true,
          ]); ?>

          <?php component('radio', [
            'id'    => 'radio-base-annual',
            'name'  => 'billing_cycle_base',
            'value' => 'annual',
            'label' => 'Annual Plan (save 20%)',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Radio A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col gap-4">
          <?php component('radio', [
            'id'      => 'radio-a-monthly',
            'name'    => 'billing_cycle_a',
            'value'   => 'monthly',
            'label'   => 'Monthly plan',
            'checked' => true,
          ]); ?>

          <?php component('radio', [
            'id'    => 'radio-a-annual',
            'name'  => 'billing_cycle_a',
            'value' => 'annual',
            'label' => 'Annual plan (save 20%)',
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
        Radio B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col gap-4">
          <?php component('radio', [
            'id'               => 'radio-b-web-app',
            'name'             => 'deployment_target_b',
            'value'            => 'web-app',
            'label'            => 'Web app deployment',
            'label_icon_name'  => 'global-line',
            'label_icon_size'  => '20',
            'label_icon_class' => 'text-brand-600',
            'checked'          => true,
          ]); ?>

          <?php component('radio', [
            'id'               => 'radio-b-mobile-app',
            'name'             => 'deployment_target_b',
            'value'            => 'mobile-app',
            'label'            => 'Mobile app deployment',
            'label_icon_name'  => 'smartphone-line',
            'label_icon_size'  => '20',
            'label_icon_class' => 'text-brand-600',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Radio C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col gap-4">
          <?php component('radio', [
            'id'             => 'radio-c-team',
            'name'           => 'workspace_scope_c',
            'value'          => 'team',
            'label'          => 'Team workspace',
            'label_position' => 'start',
            'checked'        => true,
          ]); ?>

          <?php component('radio', [
            'id'             => 'radio-c-client',
            'name'           => 'workspace_scope_c',
            'value'          => 'client',
            'label'          => 'Client portal workspace',
            'label_position' => 'start',
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
        Radio D
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col gap-4">
          <?php component('radio', [
            'id'       => 'radio-d-standard',
            'name'     => 'support_tier_d',
            'value'    => 'standard',
            'label'    => 'Standard support',
            'disabled' => true,
          ]); ?>

          <?php component('radio', [
            'id'       => 'radio-d-priority',
            'name'     => 'support_tier_d',
            'value'    => 'priority',
            'label'    => 'Priority support (Current plan)',
            'checked'  => true,
            'disabled' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Radio E
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-wrap items-center justify-center gap-3">
          <?php component('radio', [
            'id'          => 'radio-e-live-chat',
            'name'        => 'contact_channel_e',
            'value'       => 'live-chat',
            'label'       => 'Live chat',
            'checked'     => true,
            'class'       => 'flex h-[var(--ui-h-md)] rounded-md border border-brand-300 bg-white px-3',
          ]); ?>

          <?php component('radio', [
            'id'          => 'radio-e-email',
            'name'        => 'contact_channel_e',
            'value'       => 'email',
            'label'       => 'Email',
            'class'       => 'flex h-[var(--ui-h-md)] rounded-md border border-brand-300 bg-white px-3',
          ]); ?>

          <?php component('radio', [
            'id'          => 'radio-e-phone',
            'name'        => 'contact_channel_e',
            'value'       => 'phone',
            'label'       => 'Phone',
            'class'       => 'flex h-[var(--ui-h-md)] rounded-md border border-brand-300 bg-white px-3',
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
        Radio F
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-lg">
          <div class="<?php card('divide-y divide-brand-200 bg-white'); ?>">
            <div class="flex items-center justify-between gap-3 p-4">
              <p class="text-base font-semibold text-brand-900">Assign onboarding owner</p>
            </div>

            <?php component('radio', [
              'id'               => 'radio-f-customer-success',
              'name'             => 'owner_team_f',
              'value'            => 'customer-success',
              'label'            => 'Customer Success Team',
              'label_position'   => 'start',
              'label_icon_name'  => 'user-heart-line',
              'label_icon_size'  => '20',
              'label_icon_class' => 'text-brand-600',
              'label_text_class' => 'text-brand-900',
              'class'            => 'w-full justify-between p-4',
              'checked'          => true,
            ]); ?>

            <?php component('radio', [
              'id'               => 'radio-f-implementation',
              'name'             => 'owner_team_f',
              'value'            => 'implementation',
              'label'            => 'Implementation Team',
              'label_position'   => 'start',
              'label_icon_name'  => 'settings-3-line',
              'label_icon_size'  => '20',
              'label_icon_class' => 'text-brand-600',
              'label_text_class' => 'text-brand-900',
              'class'            => 'w-full justify-between p-4',
            ]); ?>

            <?php component('radio', [
              'id'               => 'radio-f-sales',
              'name'             => 'owner_team_f',
              'value'            => 'sales',
              'label'            => 'Sales Team',
              'label_position'   => 'start',
              'label_icon_name'  => 'briefcase-4-line',
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
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Radio G
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-xl flex-col gap-3">
          <div class="flex items-start gap-3 rounded-xl border border-brand-200 bg-white has-[input:checked]:border-primary-300 has-[input:checked]:bg-primary-50">
            <?php component('radio', [
              'id'          => 'radio-g-staging',
              'name'        => 'release_target_g',
              'value'       => 'staging',
              'label'       => 'Deploy to staging',
              'description' => 'Run QA checks before production release.',
              'checked'     => true,
              'class'       => 'flex w-full p-4',
              'label_class' => 'cursor-pointer',
            ]); ?>
          </div>

          <div class="flex items-start gap-3 rounded-xl border border-brand-200 bg-white has-[input:checked]:border-primary-300 has-[input:checked]:bg-primary-50">
            <?php component('radio', [
              'id'          => 'radio-g-production',
              'name'        => 'release_target_g',
              'value'       => 'production',
              'label'       => 'Deploy to production',
              'description' => 'Go live for all customer workspaces.',
              'class'       => 'flex w-full p-4',
              'label_class' => 'cursor-pointer',
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
        Demo H
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-xl flex-col gap-3">
          <div class="flex items-start gap-3 rounded-xl border border-brand-200 bg-white has-[input:checked]:border-primary-300 has-[input:checked]:bg-primary-50">
            <?php component('radio', [
              'id'          => 'radio-h-basic',
              'name'        => 'package_plan_h',
              'value'       => 'basic',
              'label'       => 'Basic',
              'label_end'   => '(Free)',
              'description' => 'Get 1 project for 1 team members',
              'checked'     => true,
              'class'       => 'flex w-full p-4',
              'box_class'   => 'hidden',
              'label_class' => 'cursor-pointer',
            ]); ?>
          </div>

          <div class="flex items-start gap-3 rounded-xl border border-brand-200 bg-white has-[input:checked]:border-primary-300 has-[input:checked]:bg-primary-50">
            <?php component('radio', [
              'id'          => 'radio-h-premium',
              'name'        => 'package_plan_h',
              'value'       => 'premium',
              'label'       => 'Premium',
              'label_end'   => '(RM 50.00)',
              'description' => 'Get 5 project for 5 team members',
              'class'       => 'flex w-full p-4',
              'box_class'   => 'hidden',
              'label_class' => 'cursor-pointer',
            ]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Demo I
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl grid-cols-1 gap-3 sm:grid-cols-2">
          <div class="rounded-xl border border-brand-200 bg-white has-[input:checked]:border-primary-300 has-[input:checked]:bg-primary-50">
            <?php component('radio', [
              'id'          => 'radio-i-basic',
              'name'        => 'package_plan_i',
              'value'       => 'basic',
              'label'       => 'Basic',
              'label_end'   => '(Free)',
              'label_icon_name'  => 'leaf-line',
              'label_icon_size'  => '24',
              'label_icon_class' => 'mx-auto text-brand-700',
              'label_end_position' => 'below',
              'description' => 'Get 1 project for 1 team members',
              'checked'     => true,
              'class'       => 'flex h-full min-h-[200px] w-full flex-col-reverse items-center justify-between p-4',
              'label_class' => 'w-full cursor-pointer items-center text-center',
              'description_class' => 'text-center',
            ]); ?>
          </div>

          <div class="rounded-xl border border-brand-200 bg-white has-[input:checked]:border-primary-300 has-[input:checked]:bg-primary-50">
            <?php component('radio', [
              'id'          => 'radio-i-premium',
              'name'        => 'package_plan_i',
              'value'       => 'premium',
              'label'       => 'Premium',
              'label_end'   => '(RM 50.00)',
              'label_icon_name'  => 'award-line',
              'label_icon_size'  => '24',
              'label_icon_class' => 'mx-auto text-brand-700',
              'label_end_position' => 'below',
              'description' => 'Get 5 project for 5 team members',
              'class'       => 'flex h-full min-h-[200px] w-full flex-col-reverse items-center justify-between p-4',
              'label_class' => 'w-full cursor-pointer items-center text-center',
              'description_class' => 'text-center',
            ]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php layout('canvas/layouts/canvas-end'); ?>
