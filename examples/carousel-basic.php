<?php

declare(strict_types=1);

$carousel_items = [
  '<div class="rounded-xl border border-brand-200 bg-white p-6"><h3 class="text-lg font-semibold text-brand-900">Booking Overview</h3><p class="mt-2 text-sm text-brand-700">Track confirmed and pending bookings for this week.</p></div>',
  '<div class="rounded-xl border border-brand-200 bg-white p-6"><h3 class="text-lg font-semibold text-brand-900">Client Notes</h3><p class="mt-2 text-sm text-brand-700">Keep prep details and special requests in one place.</p></div>',
  '<div class="rounded-xl border border-brand-200 bg-white p-6"><h3 class="text-lg font-semibold text-brand-900">Delivery Queue</h3><p class="mt-2 text-sm text-brand-700">Monitor edits and final export handoff status.</p></div>',
];
?>
<section class="mx-auto w-full max-w-5xl px-4 py-10">
  <?php component('carousel', [
    'carousel_id'              => 'example-carousel-basic',
    'carousel_items'           => $carousel_items,
    'carousel_autoplay'        => false,
    'carousel_interval'        => 5000,
    'carousel_infinite'        => false,
    'carousel_snap'            => false,
    'carousel_centered'        => false,
    'carousel_slides_qty'      => [
      'xs' => 1,
    ],
    'carousel_show_pagination' => true,
    'carousel_show_arrows'     => true,
    'carousel_show_info'       => false,
    'carousel_class'           => 'opacity-0 transition-opacity duration-300',
    'carousel_body_class'      => 'gap-4',
    'carousel_slide_class'     => '',
  ]); ?>
</section>
