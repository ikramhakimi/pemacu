<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Input Group';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/input-group',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Input Group',
    'header_subtitle'        => 'Reference for API-driven inputs with leading or trailing icons across SaaS workflows.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Input Group Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('input-group', [
            'id'          => 'input-group-base',
            'name'        => 'workspace_search',
            'icon_name'   => 'search-line',
            'placeholder' => 'Search workspaces, customers, or invoices...',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Input Group A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('input-group', [
            'id'          => 'input-group-sm-left',
            'name'        => 'team_alias',
            'size'        => 'sm',
            'icon_name'   => 'team-line',
            'placeholder' => 'Small: Team alias',
          ]); ?>
          <?php component('input-group', [
            'id'          => 'input-group-md-left',
            'name'        => 'customer_email',
            'size'        => 'md',
            'type'        => 'email',
            'icon_name'   => 'mail-line',
            'placeholder' => 'Medium: customer@company.com',
          ]); ?>
          <?php component('input-group', [
            'id'          => 'input-group-lg-left',
            'name'        => 'customer_name',
            'size'        => 'lg',
            'icon_name'   => 'user-line',
            'placeholder' => 'Large: Customer success owner',
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
        Input Group B
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('input-group', [
            'id'            => 'input-group-right-default',
            'name'          => 'billing_currency',
            'icon_name'     => 'arrow-down-s-line',
            'icon_position' => 'right',
            'placeholder'   => 'Billing currency',
          ]); ?>
          <?php component('input-group', [
            'id'            => 'input-group-right-positive',
            'name'          => 'verified_contact',
            'icon_name'     => 'check-line',
            'icon_position' => 'right',
            'state'         => 'positive',
            'value'         => 'billing@northlanehealth.com',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Input Group C
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('input-group', [
            'id'          => 'input-group-negative',
            'name'        => 'callback_url',
            'icon_name'   => 'error-warning-line',
            'state'       => 'negative',
            'value'       => 'https://northlanehealth',
            'attributes'  => [
              'aria-invalid' => 'true',
            ],
          ]); ?>
          <?php component('input-group', [
            'id'          => 'input-group-disabled',
            'name'        => 'plan_limit',
            'icon_name'   => 'lock-line',
            'disabled'    => true,
            'value'       => 'Advanced analytics requires Enterprise plan',
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
        Input Group D
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('fields', [
            'label'       => 'Revenue Forecast',
            'helper_text' => 'Estimate monthly recurring revenue in USD.',
            'control'     => [
              'component' => 'input-group',
              'props'     => [
                'id'          => 'input-group-field-forecast',
                'name'        => 'revenue_forecast',
                'icon_name'   => 'money-dollar-circle-line',
                'placeholder' => '25,000',
              ],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Input Group E
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('fields', [
            'label'       => 'Customer Portal URL',
            'helper_text' => 'Provide a valid HTTPS URL for customer redirects.',
            'state'       => 'negative',
            'control'     => [
              'component' => 'input-group',
              'props'     => [
                'id'          => 'input-group-field-portal-url',
                'name'        => 'customer_portal_url',
                'icon_name'   => 'link-m',
                'value'       => 'http://portal.northlanehealth',
                'attributes'  => [
                  'aria-invalid' => 'true',
                ],
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
        Input Group F
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-4">
          <div class="space-y-2">
            <p class="text-sm font-medium text-brand-800">Select + Input</p>
            <div class="flex w-full rounded-md ring-1 ring-brand-300 focus-within:ring-2 focus-within:ring-brand-500">
              <?php component('select', [
                'id'            => 'input-group-f-plan-prefix',
                'name'          => 'plan_prefix',
                'wrapper_class' => 'w-30 shrink-0',
                'class'         => 'rounded-r-none !ring-0 focus:!ring-0',
                'options'       => [
                  ['label' => 'Starter', 'value' => 'starter'],
                  ['label' => 'Growth', 'value' => 'growth'],
                  ['label' => 'Enterprise', 'value' => 'enterprise'],
                ],
                'selected_value' => 'growth',
              ]); ?>
              <?php component('input', [
                'id'          => 'input-group-f-plan-slug',
                'name'        => 'plan_slug',
                'class'       => 'rounded-l-none !ring-0 focus:!ring-0',
                'placeholder' => 'workspace-growth',
              ]); ?>
            </div>
          </div>

          <div class="space-y-2">
            <p class="text-sm font-medium text-brand-800">Input + Select</p>
            <div class="flex w-full rounded-md ring-1 ring-brand-300 focus-within:ring-2 focus-within:ring-brand-500">
              <?php component('input', [
                'id'          => 'input-group-f-billing-threshold',
                'name'        => 'billing_threshold',
                'class'       => 'rounded-r-none !ring-0 focus:!ring-0',
                'placeholder' => '25000',
              ]); ?>
              <?php component('select', [
                'id'            => 'input-group-f-billing-currency',
                'name'          => 'billing_currency',
                'wrapper_class' => 'w-24 shrink-0',
                'class'         => 'rounded-l-none !ring-0 focus:!ring-0',
                'options'       => [
                  ['label' => 'USD', 'value' => 'usd'],
                  ['label' => 'EUR', 'value' => 'eur'],
                  ['label' => 'MYR', 'value' => 'myr'],
                ],
                'selected_value' => 'usd',
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
        Input Group G
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-4">
          <div class="space-y-2">
            <p class="text-sm font-medium text-brand-800">Number Input Stepper</p>
            <div class="flex w-full overflow-hidden rounded-md ring-1 ring-brand-300 focus-within:ring-2 focus-within:ring-brand-500">
              <?php component('button', [
                'type'       => 'button',
                'variant'    => 'secondary',
                'size'       => 'md',
                'icon_only'  => true,
                'icon_name'  => 'subtract-line',
                'aria_label' => 'Decrease value',
                'class'      => 'w-12 shrink-0 rounded-none border-0 border-r border-brand-200 !ring-0 focus:!ring-0',
              ]); ?>

              <?php component('input', [
                'id'         => 'input-group-g-monthly-seats',
                'name'       => 'monthly_seats',
                'type'       => 'number',
                'value'      => '12',
                'class'      => 'rounded-none text-center !ring-0 focus:!ring-0 [appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none',
                'attributes' => [
                  'min'  => '1',
                  'max'  => '500',
                  'step' => '1',
                ],
              ]); ?>

              <?php component('button', [
                'type'       => 'button',
                'variant'    => 'secondary',
                'size'       => 'md',
                'icon_only'  => true,
                'icon_name'  => 'add-line',
                'aria_label' => 'Increase value',
                'class'      => 'w-12 shrink-0 rounded-none border-0 border-l border-brand-200 !ring-0 focus:!ring-0',
              ]); ?>
            </div>
            <p class="text-xs text-brand-600">Example: seats per workspace in a SaaS subscription plan.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
