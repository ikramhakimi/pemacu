<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Pick Time';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/pick-time',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Pick Time',
    'header_subtitle'        => 'Airbnb-style time selection with AM/PM and 24-hour support.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use 12-hour mode for consumer-facing appointment booking.</li>
      <li>Use 24-hour mode for operational and logistics schedules.</li>
      <li>Set minute step based on service slot precision.</li>
      <li>Keep helper text explicit about timezone and slot policy.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">12-Hour (AM/PM)</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Best for booking journeys where users expect AM/PM labels.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('form/field', [
          'label'           => 'Call time',
          'helper_text'     => 'Choose a preferred call slot in AM/PM format.',
          'input_component' => 'picktime',
          'input_props'     => [
            'name'        => 'call_time',
            'format'      => '12h',
            'value'       => '09:30 AM',
            'minute_step' => 15,
            'placeholder' => 'Pick AM/PM time',
          ],
          'class'           => 'space-y-2',
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">24-Hour</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Recommended for operations and technical workflows.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('form/field', [
          'label'           => 'Dispatch time',
          'helper_text'     => 'Use 24-hour clock for team scheduling consistency.',
          'input_component' => 'picktime',
          'input_props'     => [
            'name'        => 'dispatch_time',
            'format'      => '24h',
            'value'       => '18:45',
            'minute_step' => 5,
            'placeholder' => 'Pick 24-hour time',
          ],
          'class'           => 'space-y-2',
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Compact 30-Minute Step</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use larger steps for simplified slot selection in high-volume flows.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('form/field', [
          'label'           => 'Consultation slot',
          'helper_text'     => 'Only half-hour slots are available for this service.',
          'input_component' => 'picktime',
          'input_props'     => [
            'name'        => 'consult_slot',
            'format'      => '12h',
            'minute_step' => 30,
            'placeholder' => 'Pick 30-minute slot',
          ],
          'class'           => 'space-y-2',
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Time Range</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Select start and end time in one control. End time options before start are muted automatically.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('form/field', [
          'label'           => 'Session window',
          'helper_text'     => 'Pick a valid time window. End time cannot be earlier than start time.',
          'input_component' => 'picktime',
          'input_props'     => [
            'mode'        => 'range',
            'format'      => '12h',
            'name_start'  => 'session_start_time',
            'name_end'    => 'session_end_time',
            'start_value' => '10:00 AM',
            'end_value'   => '11:30 AM',
            'minute_step' => 15,
            'placeholder' => 'Pick start and end time',
          ],
          'class'           => 'space-y-2',
        ]); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas-end'); ?>
