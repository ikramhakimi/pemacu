<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Field';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/field',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Field',
    'header_subtitle'        => 'Reference for API-driven field wrappers used in SaaS settings, onboarding, and validation flows.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Field Base
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('form/fields', [
            'label'       => 'Workspace Name',
            'helper_text' => 'Used in team invites and project billing records.',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'name'        => 'workspace_name',
                'placeholder' => 'e.g. Northstar Product Team',
              ],
            ],
            'class'       => 'w-full',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Field A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('form/fields', [
            'label'       => 'Plan Tier',
            'helper_text' => 'Changing tier updates seat and automation limits.',
            'control'     => [
              'component' => 'select',
              'props'     => [
                'name'        => 'plan_tier',
                'placeholder' => 'Select plan',
                'options'     => [
                  ['label' => 'Starter', 'value' => 'starter'],
                  ['label' => 'Growth', 'value' => 'growth', 'selected' => true],
                  ['label' => 'Scale', 'value' => 'scale'],
                ],
              ],
            ],
            'class'       => 'w-full',
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
        Field B
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('form/fields', [
            'label'       => 'Support Contact Email',
            'helper_text' => 'Verified email used for SLA and incident notifications.',
            'state'       => 'positive',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'type'  => 'email',
                'name'  => 'support_email',
                'value' => 'ops@acmecloud.io',
              ],
            ],
            'class'       => 'w-full',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Field C
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('form/fields', [
            'label'       => 'Billing Contact Email',
            'helper_text' => 'Enter a valid business email, for example finance@acmecloud.io.',
            'state'       => 'negative',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'type'  => 'email',
                'name'  => 'billing_email',
                'value' => 'finance@acmecloud',
              ],
            ],
            'class'       => 'w-full',
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
        Field D
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('form/fields', [
            'label'       => 'Tenant ID',
            'helper_text' => 'System-generated ID. This value is read-only.',
            'state'       => 'disabled',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'name'  => 'tenant_id',
                'value' => 'tn_7ca19b3f',
              ],
            ],
            'class'       => 'w-full',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Field E
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('form/fields', [
            'label'       => 'Customer Success Handoff Notes',
            'helper_text' => 'Shared with onboarding and support teams during implementation.',
            'control'     => [
              'component' => 'textarea',
              'props'     => [
                'name'        => 'handoff_notes',
                'rows'        => 4,
                'placeholder' => 'Summarize goals, dependencies, and rollout risks.',
              ],
            ],
            'class'       => 'w-full',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
