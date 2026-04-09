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
  <div class="container max-w-6xl mx-auto w-full px-4">
    <section class="pt-5 border-t border-dashed border-brand-200">
      <div class="md:grid grid-cols-4 gap-2">
        <div class="flex mb-4 gap-4 md:mb-0">
          <div class="md:hidden w-12 h-12 shrink-0 bg-brand-200 rounded-lg flex items-center justify-center">
            <?php icon('calendar-2-line', ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
          </div>
          <div>
            <h3 class="text-lg font-semibold text-brand-800">Booking Summary</h3>
            <p>Enter your details for your booking</p>
          </div>
        </div>
        <div class="col-span-3 lg:col-span-2">
          <!-- booking summary -->
          <div class="rounded-md border border-brand-200 bg-white p-6">
            <p class="text-xs font-semibold uppercase text-brand-500">Booking Summary</p>

            <div class="mt-5 space-y-3 text-brand-700">
              <div class="flex items-center justify-between gap-4">
                <span>Package</span>
                <span class="text-brand-900">Service Package</span>
              </div>

              <div class="flex items-center justify-between gap-4">
                <span>Date (Time)</span>
                <span class="text-brand-900">Friday, Apr 24, 2026 (3:15 PM)</span>
              </div>

              <div class="flex items-center justify-between gap-4">
                <span>Participants</span>
                <span class="text-brand-900">3 pax</span>
              </div>
            </div>

            <div class="space-y-3 text-brand-700 border-t border-brand-200 pt-3 mt-3">
              <div class="flex items-center justify-between gap-4">
                <span>Name</span>
                <span class="text-brand-900">Ikram Hakimi</span>
              </div>

              <div class="flex items-center justify-between gap-4">
                <span>Phone</span>
                <span class="text-brand-900">012-3456-789</span>
              </div>

              <div class="flex items-center justify-between gap-4">
                <span>Email</span>
                <span class="text-brand-900">ikram@businessname.co</span>
              </div>
            </div>

            <div class="flex items-center justify-between border-t border-brand-200 pt-5 mt-5">
              <span class="text-sm text-brand-600">Estimated total</span>
              <span class="text-base font-semibold text-positive-600">RM 400</span>
            </div>
          </div>
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
            <h3 class="text-lg font-semibold text-brand-800">Payment Option</h3>
            <p>How do you like to pay?</p>
          </div>
        </div>
        <div class="col-span-3 lg:col-span-2">
          <fieldset>
            <legend class="sr-only">Payment Selection</legend>
            <div class="grid gap-3 md:grid-cols-2">
              <label for="payment-deposit" class="relative block cursor-pointer">
                <input
                  id="payment-deposit"
                  name="payment_option"
                  type="radio"
                  value="deposit"
                  class="peer sr-only"
                  checked
                >
                <span class="pointer-events-none absolute right-4 top-4 z-10 inline-flex h-6 w-6 items-center justify-center rounded-full border border-brand-300 bg-white text-brand-400 opacity-0 transition peer-checked:opacity-100 peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                  <?php icon('checkbox-circle-fill', ['icon_size' => '16']); ?>
                </span>
                <div class="rounded-lg border border-brand-300 bg-white p-6 transition peer-focus-visible:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-positive-500 peer-checked:ring-1 peer-checked:ring-positive-500 peer-checked:border-positive-500 peer-checked:bg-gradient-to-tr peer-checked:from-white peer-checked:via-positive-100 peer-checked:via-70% peer-checked:to-positive-300">
                  <h4 class="text-base font-semibold text-brand-900">Deposit</h4>
                  <div class="text-3xl mt-4 text-positive-700">RM 200</div>
                  <p class="mt-4 text-sm font-medium text-brand-600">50% now · 50% on session day.</p>
                  <p class="mt-2 text-sm text-brand-900 opacity-70">
                    Pay a deposit to reserve your studio slot. The remaining balance is due on session day.
                  </p>
                </div>
              </label>

              <label for="payment-full" class="relative block cursor-pointer">
                <input
                  id="payment-full"
                  name="payment_option"
                  type="radio"
                  value="full_payment"
                  class="peer sr-only"
                >
                <span class="pointer-events-none absolute right-4 top-4 z-10 inline-flex h-6 w-6 items-center justify-center rounded-full border border-brand-300 bg-white text-brand-400 opacity-0 transition peer-checked:opacity-100 peer-checked:border-green-600 peer-checked:bg-green-600 peer-checked:text-white">
                  <?php icon('checkbox-circle-fill', ['icon_size' => '16']); ?>
                </span>
                <div class="rounded-lg border border-brand-300 bg-white p-6 transition peer-focus-visible:outline-none peer-focus-visible:ring-2 peer-focus-visible:ring-positive-500 peer-checked:ring-1 peer-checked:ring-positive-500 peer-checked:border-positive-500 peer-checked:bg-gradient-to-tr peer-checked:from-white peer-checked:via-positive-100 peer-checked:via-70% peer-checked:to-positive-300">
                  <h4 class="text-base font-semibold text-brand-900">Full Payment</h4>
                  <div class="text-3xl mt-4 text-positive-700">RM 400</div>
                  <p class="mt-4 text-sm font-medium text-brand-600">Pay once, worry-free.</p>
                  <p class="mt-2 text-sm text-brand-500">
                    Make full payment today and enjoy priority scheduling plus a complimentary digital frame.
                  </p>
                </div>
              </label>
            </div>
          </fieldset>
        </div>
      </div>
    </section>

    
    
    <section class="pt-5 mt-5 border-t border-brand-200">
      <div class="md:grid grid-cols-4 gap-2">
        <div class="col-span-3 col-start-2 lg:col-span-2 lg:col-start-2">

          <!-- CTA -->
          <button type="button" class="mt-4 w-full btn btn--primary btn--lg inline-flex items-center justify-center gap-2 rounded-md border h-[var(--ui-h-lg)] leading-[var(--ui-h-lg)] font-medium text-white px-[var(--ui-px-lg)] text-lg bg-gradient-to-b from-primary-500 to-primary-600 border-primary-700 bg-primary-600 shadow-lg shadow-brand-400">
            <span class="button__label">Continue Booking</span>
            <?php icon('arrow-right-line', ['icon_size' => '20', 'icon_class' => 'text-white']); ?>
            
          </button>

          <!-- reassurance -->
          <p class="mt-3 text-sm text-brand-500">
            No payment required yet. Enter your details in the next step.
          </p>
        </div>
      </div>
    </section>
    </section>
  
</section>

<?php section('section-faq'); ?>
<?php section('section-testimonials'); ?>
<?php // section('section-packages'); ?>
<?php // section('section-cta'); ?>
<?php section('section-footer'); ?>



<?php layout('layout-end'); ?>
