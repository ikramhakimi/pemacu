<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Input';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/input',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Input',
    'header_subtitle'        => 'Reference for API-driven single-line inputs with size, state, and accessibility variants.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Input Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('input', [
            'id'          => 'input-base',
            'name'        => 'workspace_name',
            'placeholder' => 'Enter workspace name',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Input A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('input', [
            'id'          => 'input-sm',
            'name'        => 'input_sm',
            'size'        => 'sm',
            'placeholder' => 'Small: Team alias',
          ]); ?>
          <?php component('input', [
            'id'          => 'input-md',
            'name'        => 'input_md',
            'size'        => 'md',
            'placeholder' => 'Medium: Account owner email',
          ]); ?>
          <?php component('input', [
            'id'          => 'input-lg',
            'name'        => 'input_lg',
            'size'        => 'lg',
            'placeholder' => 'Large: Customer success manager',
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
        Input B
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('input', [
            'id'          => 'input-positive',
            'name'        => 'input_positive',
            'state'       => 'positive',
            'value'       => 'billing@northlanehealth.com',
          ]); ?>
          <?php component('input', [
            'id'         => 'input-negative',
            'name'       => 'input_negative',
            'state'      => 'negative',
            'value'      => 'billing@northlanehealth',
            'attributes' => [
              'aria-invalid' => 'true',
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Input C
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('input', [
            'id'       => 'input-readonly',
            'name'     => 'input_readonly',
            'readonly' => true,
            'value'    => 'enterprise-plan',
          ]); ?>
          <?php component('input', [
            'id'       => 'input-disabled',
            'name'     => 'input_disabled',
            'disabled' => true,
            'value'    => 'Only billing admins can edit this value',
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
        Input D
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('fields', [
            'label'       => 'Workspace Slug',
            'helper_text' => 'Used in your public URL and API callback endpoints.',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'id'          => 'input-field-default',
                'name'        => 'workspace_slug',
                'placeholder' => 'northlane-health',
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
        Input E
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('fields', [
            'label'       => 'Finance Contact Email',
            'helper_text' => 'Please enter a valid company email address.',
            'state'       => 'negative',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'id'          => 'input-field-negative',
                'name'        => 'finance_contact_email',
                'type'        => 'email',
                'placeholder' => 'finance@company.com',
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
<?php layout('canvas/layouts/canvas-end'); ?>
