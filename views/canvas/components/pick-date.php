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

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use single mode for one fixed appointment date.</li>
      <li>Use range mode for check-in and check-out workflows.</li>
      <li>Set min and max boundaries to prevent invalid selection.</li>
      <li>Always pair date pickers with clear helper text.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Single Date</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Baseline date picker for one target day.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('fields', [
          'label'           => 'Session date',
          'helper_text'     => 'Choose one preferred date for your session.',
          'control' => [
            'component' => 'pickdate',
            'props' => [
            'name'        => 'session_date',
            'mode'        => 'single',
            'placeholder' => 'Pick one date',
            ],
          ],
          'class'           => 'space-y-2',
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Single Date With Boundaries</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Restrict date window to the current booking period.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('fields', [
          'label'           => 'Available slot',
          'helper_text'     => 'Only dates between 2026-06-01 and 2026-07-31 are open.',
          'control' => [
            'component' => 'pickdate',
            'props' => [
            'name'        => 'slot_date',
            'mode'        => 'single',
            'min_date'    => '2026-06-01',
            'max_date'    => '2026-07-31',
            'value'       => '2026-06-15',
            'placeholder' => 'Select available date',
            ],
          ],
          'class'           => 'space-y-2',
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Date Range</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use range mode for stay duration and schedule windows.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('fields', [
          'label'           => 'Stay range',
          'helper_text'     => 'Pick check-in and check-out dates in one interaction.',
          'control' => [
            'component' => 'pickdate',
            'props' => [
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
          'class'           => 'space-y-2',
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Card Grid Datepicker (JS Dynamic)</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Dynamic month navigation, async availability from API, keyboard navigation, and metadata hints.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('form/pickdate-grid-js', [
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

    <div>
      <h3 class="text-xl font-bold text-brand-900">Card Grid Timepicker</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Time slot cards that follow the same visual language as the dynamic date grid.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('form/picktime-grid', [
          'name'         => 'time_slot',
          'value'        => '8:00 PM',
          'start_time'   => '08:00',
          'end_time'     => '23:30',
          'step_minutes' => 30,
        ]); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
