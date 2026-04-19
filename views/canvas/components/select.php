<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Select';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$workspace_plan_options = [
  ['label' => 'Starter Workspace', 'value' => 'starter'],
  ['label' => 'Growth Workspace', 'value' => 'growth'],
  ['label' => 'Scale Workspace', 'value' => 'scale'],
];
$billing_cycle_options = [
  ['label' => 'Monthly Billing', 'value' => 'monthly'],
  ['label' => 'Quarterly Billing', 'value' => 'quarterly'],
  ['label' => 'Annual Billing (Save 20%)', 'value' => 'annual'],
];
$owner_team_options = [
  ['label' => 'Customer Success Team', 'value' => 'customer-success'],
  ['label' => 'Implementation Team', 'value' => 'implementation'],
  ['label' => 'Support Operations Team', 'value' => 'support'],
];
$region_options = [
  ['label' => 'Malaysia (KUL)', 'value' => 'my-kul'],
  ['label' => 'Singapore (SIN)', 'value' => 'sg-sin'],
  ['label' => 'Indonesia (JKT)', 'value' => 'id-jkt', 'disabled' => true],
];
$status_options = [
  ['label' => 'Active', 'value' => 'active'],
  ['label' => 'Paused', 'value' => 'paused'],
  ['label' => 'Churn Risk', 'value' => 'churn-risk'],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/select',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Select',
    'header_subtitle'        => 'Reference for API-driven single-value selection controls in SaaS workflows.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Select Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-lg">
          <?php component('form/select', [
            'id'            => 'select-base-workspace-plan',
            'name'          => 'workspace_plan_base',
            'placeholder'   => 'Choose workspace plan',
            'options'       => $workspace_plan_options,
            'selected_value'=> 'growth',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Select A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-lg gap-3">
          <?php component('form/select', [
            'size'           => 'sm',
            'name'           => 'billing_cycle_sm',
            'placeholder'    => 'Billing cycle (small)',
            'options'        => $billing_cycle_options,
            'selected_value' => 'monthly',
          ]); ?>
          <?php component('form/select', [
            'size'           => 'md',
            'name'           => 'billing_cycle_md',
            'placeholder'    => 'Billing cycle (medium)',
            'options'        => $billing_cycle_options,
            'selected_value' => 'quarterly',
          ]); ?>
          <?php component('form/select', [
            'size'           => 'lg',
            'name'           => 'billing_cycle_lg',
            'placeholder'    => 'Billing cycle (large)',
            'options'        => $billing_cycle_options,
            'selected_value' => 'annual',
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
        Select B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-lg gap-4">
          <?php component('form/fields', [
            'label'           => 'Onboarding Owner',
            'helper_text'     => 'Assign one team as the default onboarding owner.',
            'input_component' => 'select',
            'input_props'     => [
              'name'           => 'onboarding_owner',
              'placeholder'    => 'Select owner team',
              'options'        => $owner_team_options,
              'selected_value' => 'implementation',
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Select C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-lg gap-3">
          <?php component('form/select', [
            'name'           => 'workspace_region_positive',
            'state'          => 'positive',
            'placeholder'    => 'Primary data region',
            'options'        => $region_options,
            'selected_value' => 'my-kul',
          ]); ?>
          <?php component('form/select', [
            'name'           => 'workspace_region_negative',
            'state'          => 'negative',
            'placeholder'    => 'Primary data region',
            'options'        => $region_options,
            'selected_value' => 'id-jkt',
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
        Select D
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-lg">
          <div class="<?php card('divide-y divide-brand-200 bg-white'); ?>">
            <div class="p-4">
              <p class="text-base font-semibold text-brand-900">Workspace Guardrails</p>
              <p class="mt-1 text-sm text-brand-600">Locked because this workspace is controlled by enterprise policy.</p>
            </div>
            <div class="p-4">
              <?php component('form/select', [
                'name'           => 'workspace_status_locked',
                'state'          => 'disabled',
                'disabled'       => true,
                'placeholder'    => 'Workspace status',
                'options'        => $status_options,
                'selected_value' => 'active',
              ]); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Select E
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-lg gap-4">
          <?php component('form/fields', [
            'label'           => 'SLA Priority',
            'helper_text'     => 'Required for ticket routing.',
            'input_component' => 'select',
            'input_props'     => [
              'id'                   => 'select-sla-priority',
              'name'                 => 'sla_priority',
              'required'             => true,
              'placeholder'          => 'Select SLA priority',
              'placeholder_disabled' => false,
              'options'              => [
                ['label' => 'Standard (48h)', 'value' => 'standard'],
                ['label' => 'Priority (24h)', 'value' => 'priority'],
                ['label' => 'Critical (4h)', 'value' => 'critical'],
              ],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php layout('canvas/layouts/canvas-end'); ?>
