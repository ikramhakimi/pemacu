<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Stepper';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$booking_steps = [
  [
    'title'       => 'Session Details',
    'description' => 'Package, date, and location confirmed.',
    'state'       => 'completed',
  ],
  [
    'title'       => 'Client Information',
    'description' => 'Contact and requirements in progress.',
    'state'       => 'current',
  ],
  [
    'title'       => 'Payment',
    'description' => 'Awaiting invoice settlement.',
    'state'       => 'upcoming',
  ],
  [
    'title'       => 'Confirmation',
    'description' => 'Booking finalization and notification.',
    'state'       => 'upcoming',
  ],
];

$vertical_steps = [
  ['title' => 'Account Setup', 'description' => 'Workspace and team members.', 'state' => 'completed'],
  ['title' => 'Brand Assets', 'description' => 'Logos, fonts, and palette.', 'state' => 'completed'],
  ['title' => 'Domain Connect', 'description' => 'DNS verification required.', 'state' => 'current'],
  ['title' => 'Go Live', 'description' => 'Launch checklist and QA.', 'state' => 'upcoming'],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/stepper',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Stepper',
    'header_subtitle'        => 'Reference for API-driven workflow steppers with horizontal and vertical variants.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Stepper Base
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-4xl">
          <?php component('stepper', [
            'items'        => $booking_steps,
            'orientation'  => 'horizontal',
            'show_numbers' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Stepper A
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-lg">
          <?php component('stepper', [
            'items'       => $vertical_steps,
            'orientation' => 'vertical',
            'size'        => 'sm',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
