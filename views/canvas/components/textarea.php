<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Textarea';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/textarea',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Textarea',
    'header_subtitle'        => 'Reference for API-driven multiline inputs with size, state, and accessibility variants.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Textarea Base
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('textarea', [
            'id'          => 'textarea-base',
            'name'        => 'customer_impact_summary',
            'rows'        => 5,
            'placeholder' => 'Summarize the customer impact of this release...',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Textarea A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('textarea', [
            'id'          => 'textarea-sm',
            'name'        => 'workspace_note_sm',
            'rows'        => 3,
            'size'        => 'sm',
            'placeholder' => 'Small: Add a short workspace note...',
          ]); ?>
          <?php component('textarea', [
            'id'          => 'textarea-md',
            'name'        => 'workspace_note_md',
            'rows'        => 4,
            'size'        => 'md',
            'placeholder' => 'Medium: Describe the next sprint objective...',
          ]); ?>
          <?php component('textarea', [
            'id'          => 'textarea-lg',
            'name'        => 'workspace_note_lg',
            'rows'        => 5,
            'size'        => 'lg',
            'placeholder' => 'Large: Capture detailed context for sales handoff...',
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
        Textarea B
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('textarea', [
            'id'          => 'textarea-positive',
            'name'        => 'launch_recap_positive',
            'rows'        => 4,
            'state'       => 'positive',
            'value'       => 'Launch recap approved and ready for customer email handoff.',
          ]); ?>
          <?php component('textarea', [
            'id'          => 'textarea-negative',
            'name'        => 'launch_recap_negative',
            'rows'        => 4,
            'state'       => 'negative',
            'value'       => 'Action required: missing ROI metric from performance campaign.',
            'attributes'  => [
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
        Textarea C
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-xl gap-3">
          <?php component('textarea', [
            'id'          => 'textarea-readonly',
            'name'        => 'account_brief_readonly',
            'rows'        => 4,
            'readonly'    => true,
            'value'       => 'Readonly: Renewal call scheduled for Friday at 3:00 PM with finance lead.',
          ]); ?>
          <?php component('textarea', [
            'id'          => 'textarea-disabled',
            'name'        => 'account_brief_disabled',
            'rows'        => 4,
            'disabled'    => true,
            'value'       => 'Disabled: Editing is available for Growth plan and above.',
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
        Textarea D
      </div>
      <div class="relative flex min-h-[250px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('fields', [
            'label'       => 'Customer Success Notes',
            'helper_text' => 'Include blockers, owner, and due date to keep handoff clean.',
            'control'     => [
              'component' => 'textarea',
              'props'     => [
                'id'          => 'textarea-field-default',
                'name'        => 'customer_success_notes',
                'rows'        => 5,
                'placeholder' => 'Document renewal blockers and follow-up actions...',
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
        Textarea E
      </div>
      <div class="relative flex min-h-[250px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-xl">
          <?php component('fields', [
            'label'       => 'Escalation Summary',
            'helper_text' => 'Please provide a clear reason for escalation before submitting.',
            'state'       => 'negative',
            'control'     => [
              'component' => 'textarea',
              'props'     => [
                'id'          => 'textarea-field-negative',
                'name'        => 'escalation_summary',
                'rows'        => 5,
                'placeholder' => 'Explain the risk and customer impact...',
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
