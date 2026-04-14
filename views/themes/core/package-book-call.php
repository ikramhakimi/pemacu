<?php

declare(strict_types=1);

$page_title   = 'Package Book Call';
$page_current = 'package-book-call';

layout('layout-start', ['page_title' => $page_title, 'page_current' => $page_current]);
?>
<?php component('header-package', [
  'header_title'    => 'Book Intro Call',
  'header_subtitle' => 'Let us understand your needs and recommend the best package for your session.',
]); ?>
<section class="section pb-20">
  <div class="<?php container('w-full') ?>">
    <section class="pt-5 mt-5 border-t border-dashed border-brand-200">
      <div class="md:grid grid-cols-4 gap-2">
        <div class="flex mb-4 gap-4 md:mb-0">
          <div class="md:hidden w-12 h-12 shrink-0 bg-brand-200 rounded-lg flex items-center justify-center">
            <?php icon('calendar-2-line', ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-brand-800">Select Date</h3>
            <p>Choose your preferred date.</p>
          </div>
        </div>
        <div class="col-span-3 lg:col-span-2">
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
    </section>

    <section class="pt-5 mt-5 border-t border-dashed border-brand-200">
      <div class="md:grid grid-cols-4 gap-2">
        <div class="flex mb-4 gap-4 md:mb-0">
          <div class="md:hidden w-12 h-12 shrink-0 bg-brand-200 rounded-lg flex items-center justify-center">
            <?php icon('time-line', ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-brand-800">Select Time</h3>
            <p>Select an available time slot.</p>
          </div>
        </div>
        
        <div class="col-span-3 lg:col-span-2">
          <?php component('form/picktime-grid', [
            'name'         => 'time_slot',
            'value'        => '03:00 PM',
            'start_time'   => '08:00',
            'end_time'     => '23:45',
            'min_time'     => '14:45',
            'step_minutes' => 30,
          ]); ?>
        </div>
      </div>
    </section>

    <section class="pt-5 mt-5 border-t border-dashed border-brand-200">
      <div class="md:grid grid-cols-4 gap-2">
        <div class="flex mb-4 gap-4 md:mb-0">
          <div class="md:hidden w-12 h-12 shrink-0 bg-brand-200 rounded-lg flex items-center justify-center">
            <?php icon('calendar-2-line', ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-brand-800">Contact Details</h3>
            <p>Enter your details for your booking</p>
          </div>
        </div>
        <div class="col-span-3 lg:col-span-2">
          <form class="space-y-3" action="#" method="post">
            <?php component('form/field', [
              'label'           => 'Name',
              'hide_label'      => true,
              'input_component' => 'input-group',
              'input_props'     => [
                'id'          => 'booking-contact-name',
                'name'        => 'name',
                'type'        => 'text',
                'size'        => 'md',
                'icon_name'   => 'user-line',
                'icon_size'   => '20',
                'placeholder' => 'Enter your name',
                'attributes'  => [
                  'autocomplete' => 'name',
                ],
              ],
            ]); ?>
            <div class="grid gap-3 md:grid-cols-2">
              <?php component('form/field', [
                'label'           => 'Phone',
                'hide_label'      => true,
                'input_component' => 'input-group',
                'input_props'     => [
                  'id'          => 'booking-contact-phone',
                  'name'        => 'phone',
                  'type'        => 'tel',
                  'size'        => 'md',
                  'icon_name'   => 'phone-line',
                  'icon_size'   => '20',
                  'placeholder' => 'Enter your phone number',
                  'attributes'  => [
                    'autocomplete' => 'tel',
                  ],
                ],
              ]); ?>
              <?php component('form/field', [
                'label'           => 'Email',
                'hide_label'      => true,
                'input_component' => 'input-group',
                'input_props'     => [
                  'id'          => 'booking-contact-email',
                  'name'        => 'email',
                  'type'        => 'email',
                  'size'        => 'md',
                  'icon_name'   => 'mail-line',
                  'icon_size'   => '20',
                  'placeholder' => 'Enter your email',
                  'attributes'  => [
                    'autocomplete' => 'email',
                  ],
                ],
              ]); ?>
            </div>
          </form>
        </div>
      </div>
    </section>
    
    <section class="pt-5 mt-5 border-t border-brand-200">
      <div class="md:grid grid-cols-4 gap-2">
        <div class="col-span-3 col-start-2 lg:col-span-2 lg:col-start-2">
          <!-- booking summary -->
          <div class="rounded-lg border border-brand-200 bg-brand-50 p-6">
            <p class="text-xs font-semibold uppercase text-brand-500">Booking Summary</p>

            <div class="mt-5 space-y-3 text-brand-700">
              <div class="flex items-center justify-between gap-4">
                <span>Date / Time</span>
                <div class="flex items-center gap-2">
                  <span class="font-medium text-brand-900">Fri, Apr 24, 2026</span>
                  <span class="text-brand-500">at</span>
                  <span class="font-medium text-brand-900">3:00 PM</span>
                </div>
              </div>
            </div>
          </div>

          <!-- CTA -->
          <?php component('button', [
            'label'         => 'Continue Booking',
            'href'          => 'package-confirm',
            'variant'       => 'primary',
            'size'          => 'lg',
            'gradient'      => true,
            'icon_name'     => 'arrow-right-line',
            'icon_position' => 'right',
            'icon_class'    => 'text-white',
            'class'         => 'mt-4 w-full shadow-lg shadow-brand-400',
          ]); ?>

          <!-- reassurance -->
          <p class="mt-3 text-sm text-brand-500">
            No payment required yet. Enter your details in the next step.
          </p>
        </div>
      </div>
    </section>
  </div>
</section>

<?php section('growth-features-accordion'); ?>
<?php section('growth-marquee-photos'); ?>

<?php layout('layout-end'); ?>
