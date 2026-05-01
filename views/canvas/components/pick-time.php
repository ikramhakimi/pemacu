<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Pick Time';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/pick-time',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Pick Time',
    'header_subtitle'        => 'Airbnb-style time selection with AM/PM and 24-hour support.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pick Time 12h
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('fields', [
            'label'       => 'Call time',
            'helper_text' => 'Choose a preferred call slot in AM/PM format.',
            'control'     => [
              'component' => 'picktime',
              'props'     => [
                'name'        => 'call_time',
                'format'      => '12h',
                'value'       => '09:30 AM',
                'minute_step' => 15,
                'placeholder' => 'Pick AM/PM time',
              ],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pick Time 24h
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('fields', [
            'label'       => 'Dispatch time',
            'helper_text' => 'Use 24-hour clock for team scheduling consistency.',
            'control'     => [
              'component' => 'picktime',
              'props'     => [
                'name'        => 'dispatch_time',
                'format'      => '24h',
                'value'       => '18:45',
                'minute_step' => 5,
                'placeholder' => 'Pick 24-hour time',
              ],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pick Time Range
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('fields', [
            'label'       => 'Session window',
            'helper_text' => 'Pick a valid time window. End time cannot be earlier than start time.',
            'control'     => [
              'component' => 'picktime',
              'props'     => [
                'mode'        => 'range',
                'format'      => '12h',
                'name_start'  => 'session_start_time',
                'name_end'    => 'session_end_time',
                'start_value' => '10:00 AM',
                'end_value'   => '11:30 AM',
                'minute_step' => 15,
                'placeholder' => 'Pick start and end time',
              ],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pick Time Grid
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('picktime-grid', [
            'name'         => 'time_slot',
            'value'        => '8:00 PM',
            'start_time'   => '08:00',
            'end_time'     => '23:30',
            'step_minutes' => 30,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
