<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Pick Date';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/pick-date',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Pick Date',
    'header_subtitle'        => 'Airbnb-style date selection with single-date and range-date support.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pick Date Single
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('fields', [
            'label'       => 'Session date',
            'helper_text' => 'Choose one preferred date for your session.',
            'control'     => [
              'component' => 'pickdate',
              'props'     => [
                'name'        => 'session_date',
                'mode'        => 'single',
                'placeholder' => 'Pick one date',
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
        Pick Date Range
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('fields', [
            'label'       => 'Stay range',
            'helper_text' => 'Pick check-in and check-out dates in one interaction.',
            'control'     => [
              'component' => 'pickdate',
              'props'     => [
                'mode'        => 'range',
                'name'        => 'stay_date',
                'name_start'  => 'check_in',
                'name_end'    => 'check_out',
                'start_value' => '2026-07-12',
                'end_value'   => '2026-07-16',
                'min_date'    => '2026-05-01',
                'max_date'    => '2026-10-31',
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
        Pick Date Boundaries
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('fields', [
            'label'       => 'Available slot',
            'helper_text' => 'Only dates between 2026-06-01 and 2026-07-31 are open.',
            'control'     => [
              'component' => 'pickdate',
              'props'     => [
                'name'        => 'slot_date',
                'mode'        => 'single',
                'min_date'    => '2026-06-01',
                'max_date'    => '2026-07-31',
                'value'       => '2026-06-15',
                'placeholder' => 'Select available date',
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
        Pick Date Grid JS
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-2xl">
          <?php component('pickdate-grid-js', [
            'id'                => 'booking-dynamic-grid',
            'name'              => 'booking_dynamic_date',
            'value'             => '2026-04-10',
            'month'             => 4,
            'year'              => 2026,
            'disable_past'      => true,
            'min_date'          => '2026-04-07',
            'max_date'          => '2026-06-30',
            'api_endpoint'      => path('/api/date-availability.php'),
            'unavailable_dates' => ['2026-04-18'],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
