<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Alert';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/alert',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Alert',
    'header_subtitle'        => 'Reference for API-driven system alerts with semantic tone, actions, and dismiss behavior.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Alert Base
      </div>
      <div class="relative flex min-h-[210px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('alert', [
            'title'       => 'Billing profile updated',
            'description' => 'Your workspace billing details were saved and are now active for future invoices.',
            'tone'        => 'neutral',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Alert A
      </div>
      <div class="relative flex min-h-[210px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('alert', [
            'title'       => 'Q2 revenue sync complete',
            'description' => 'All Stripe and CRM transactions have been reconciled with your analytics dashboard.',
            'tone'        => 'positive',
            'dismissible' => true,
            'actions'     => [
              ['label' => 'Open dashboard', 'href' => '#', 'gradient' => true],
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
        Alert B
      </div>
      <div class="relative flex min-h-[210px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('alert', [
            'title'       => 'Card charge failed',
            'description' => 'We could not process your Pro plan renewal. Update payment details to avoid service interruption.',
            'tone'        => 'negative',
            'dismissible' => true,
            'actions'     => [
              ['label' => 'Retry charge', 'gradient' => true],
              ['label' => 'Update card', 'href' => '#', 'variant' => 'secondary', 'gradient' => true],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Alert C
      </div>
      <div class="relative flex min-h-[210px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('alert', [
            'title'       => 'Usage approaching limit',
            'description' => 'Your API requests are at 85% of this month\'s quota. Consider enabling auto-scale.',
            'tone'        => 'warning',
            'dismissible' => true,
            'actions'     => [
              ['label' => 'View usage', 'href' => '#', 'gradient' => true],
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
        Alert D
      </div>
      <div class="relative flex min-h-[210px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('alert', [
            'title'       => 'Maintenance window scheduled',
            'description' => 'Core infrastructure updates are planned on Saturday, 11:00 PM to 11:30 PM UTC.',
            'tone'        => 'info',
            'actions'     => [
              ['label' => 'See timeline', 'href' => '#', 'gradient' => true],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Alert E
      </div>
      <div class="relative flex min-h-[210px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('alert', [
            'title'       => 'Slack integration connected',
            'description' => 'Pipeline alerts will now post to #sales-ops in real time.',
            'tone'        => 'positive',
            'icon_name'   => 'slack-line',
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
        Alert F
      </div>
      <div class="relative flex min-h-[210px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('alert', [
            'title'       => 'SAML is now required',
            'description' => 'Single Sign-On enforcement has been enabled for all members in this workspace.',
            'tone'        => 'neutral',
            'show_icon'   => false,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Alert G
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-2xl flex-col gap-3">
          <?php component('alert', [
            'title'       => 'Export queued',
            'description' => 'Your board export is being generated. We will notify you once it is ready.',
            'tone'        => 'info',
            'dismissible' => true,
          ]); ?>

          <?php component('alert', [
            'title'       => 'Export ready',
            'description' => 'The CSV for "Enterprise pipeline" has finished processing.',
            'tone'        => 'positive',
            'actions'     => [
              ['label' => 'Download file', 'href' => '#', 'gradient' => true],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
