<?php

declare(strict_types=1);

$page_title   = 'Portfolio';
$page_current = 'portfolio';

layout('layout-start', ['page_title' => $page_title, 'page_current' => $page_current]);
?>
<?php component('header-package', [
  'header_title'    => 'Service Package',
  'header_subtitle' => 'Capture festive moments with loved ones in a joyful and vibrant setting.',
]); ?>
<section class="section pb-20">
  <div class="<?php container('w-full') ?>">
    <section class="mb-8">
      <div class="grid grid-cols-6 gap-2">
        <div class="bg-brand-300 rounded-md col-span-2"></div>
        <div class="aspect-square bg-brand-300 rounded-md col-span-1"></div>
        <div class="aspect-square bg-brand-300 rounded-md col-span-1"></div>
        <div class="aspect-square bg-brand-300 rounded-md col-span-1"></div>
        <div class="aspect-square bg-brand-300 rounded-md col-span-1"></div>
      </div>
    </section>

    <section>
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
            <?php icon('emotion-happy-line', ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-brand-800">Participants</h3>
            <p>How many people will attend?</p>
          </div>
        </div>
        <div class="col-span-3 lg:col-span-2">
          <div class="flex items-center gap-6 pr-8 hidden">
            <div class="bg-white inline-flex items-center border border-brand-300 rounded-md">
              <button type="button" id="decrease" class="px-4 py-2 rounded-md text-xl bg-brand-100 hover:bg-brand-800 m-1">−</button>
              <div id="paxDisplay" class="w-20 text-center font-semibold text-blue-600">1</div>
              <button type="button" id="increase" class="px-4 py-2 rounded-md text-xl bg-brand-100 hover:bg-brand-800 m-1">+</button>
            </div>
            <div>
              <div class=" hidden">Total Price</div>
              <div id="totalPrice" class="text-2xl font-semibold text-slate-900">RM 150</div>
            </div>
          </div>


          <div class="select select--md relative">
            <select class="select__input input appearance-none w-full rounded-md pr-10 text-brand-900 h-[var(--ui-h-md)] text-sm px-[var(--ui-px-md)] bg-white ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500">
              <option value="md">Select Pack</option>
              <option value="md">1</option>
              <option value="md">2</option>
              <option value="md">3</option>
            </select>
            <span class="select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-brand-500">
              <svg class="icon icon--arrow-down-s-line icon--16" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z"></path></svg>
            </span>
          </div>
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
          
          <!-- compact trust / urgency -->
          <div class="mb-3 inline-flex flex-wrap items-center gap-x-3 gap-y-1 text-xs text-brand-600">
            <span class="inline-flex items-center gap-1">
              <span class="h-2 w-2 rounded-full bg-positive-500"></span>
              Bundle deal applied
            </span>
            <span>1 slot left</span>
          </div>

          <!-- booking summary -->
          <div class="rounded-lg border border-brand-200 bg-brand-50 p-6">
            <p class="text-xs font-semibold uppercase text-brand-500">Booking Summary</p>

            <div class="mt-5 space-y-3 text-brand-700">
              <div class="flex items-center justify-between gap-4">
                <span>Date</span>
                <span class="font-medium text-brand-900">Fri, Apr 24, 2026</span>
              </div>

              <div class="flex items-center justify-between gap-4">
                <span>Time</span>
                <span class="font-medium text-brand-900">3:00 PM</span>
              </div>

              <div class="flex items-center justify-between gap-4">
                <span>Participants</span>
                <span class="font-medium text-brand-900">3 pax</span>
              </div>
            </div>

            <div class="flex items-center justify-between border-t border-brand-200 pt-5 mt-5">
              <span class="text-sm text-brand-600">Estimated total</span>
              <span class="text-base font-semibold text-positive-600">RM 400</span>
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
          <p class="mt-4 text-center text-brand-500">
            No payment required yet. Select payment option in the next step.
          </p>
        </div>
      </div>
    </section>
  </div>
</section>
  

<?php section('growth-features-accordion'); ?>
<?php section('growth-marquee-photos'); ?>



<?php layout('layout-end'); ?>
