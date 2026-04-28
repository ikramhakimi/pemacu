<?php

declare(strict_types=1);

/**
 * Component: carousel
 * Purpose: Render a configurable, data-driven carousel wrapper for reusable UI use cases.
 * Contract:
 * - Root: [data-carousel]
 * - Viewport: .carousel
 * - Track: .carousel-body
 * - Slides: .carousel-slide
 * - Controls: .carousel-prev / .carousel-next
 * - Pagination: .carousel-pagination
 * - Info: .carousel-info-current / .carousel-info-total
 */

$carousel_id              = isset($carousel_id) ? trim((string) $carousel_id) : '';
$carousel_items           = isset($carousel_items) && is_array($carousel_items) ? $carousel_items : [];
$carousel_autoplay        = isset($carousel_autoplay) ? (bool) $carousel_autoplay : false;
$carousel_interval        = isset($carousel_interval) ? (int) $carousel_interval : 5000;
$carousel_infinite        = isset($carousel_infinite) ? (bool) $carousel_infinite : false;
$carousel_snap            = isset($carousel_snap) ? (bool) $carousel_snap : false;
$carousel_centered        = isset($carousel_centered) ? (bool) $carousel_centered : false;
$carousel_slides_qty      = isset($carousel_slides_qty) && is_array($carousel_slides_qty)
  ? $carousel_slides_qty
  : ['xs' => 1];
$carousel_show_pagination = isset($carousel_show_pagination) ? (bool) $carousel_show_pagination : true;
$carousel_show_arrows     = isset($carousel_show_arrows) ? (bool) $carousel_show_arrows : true;
$carousel_show_info       = isset($carousel_show_info) ? (bool) $carousel_show_info : false;
$carousel_class           = isset($carousel_class) ? trim((string) $carousel_class) : '';
$carousel_body_class      = isset($carousel_body_class) ? trim((string) $carousel_body_class) : '';
$carousel_slide_class     = isset($carousel_slide_class) ? trim((string) $carousel_slide_class) : '';

if ($carousel_interval < 1000) {
  $carousel_interval = 1000;
}

if ($carousel_items === []) {
  return;
}

$root_class = trim('relative w-full ' . $carousel_class);
$body_class = trim('carousel-body flex ' . $carousel_body_class);
$slide_class = trim('carousel-slide w-full ' . $carousel_slide_class);

$carousel_config = [
  'loadingClasses'   => 'opacity-0',
  'dotsItemClasses'  => 'size-3 rounded-full border border-brand-300 cursor-pointer transition carousel-active:border-brand-600 carousel-active:bg-brand-600',
  'isAutoPlay'       => $carousel_autoplay,
  'autoPlayInterval' => $carousel_interval,
  'isInfiniteLoop'   => $carousel_infinite,
  'isSnap'           => $carousel_snap,
  'isCentered'       => $carousel_centered,
  'slidesQty'        => $carousel_slides_qty,
  'speed'            => 500,
  'startIndex'       => 0,
  'pauseOnHover'     => true,
  'keyboard'         => true,
  'drag'             => true,
  'threshold'        => 40,
];

$carousel_config_json = json_encode($carousel_config, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
if ($carousel_config_json === false) {
  $carousel_config_json = '{}';
}
?>
<div
  <?php if ($carousel_id !== ''): ?>id="<?= e($carousel_id); ?>"<?php endif; ?>
  class="<?= e($root_class); ?>"
  data-carousel='<?= e($carousel_config_json); ?>'
>
  <div class="carousel overflow-hidden rounded-xl">
    <div class="<?= e($body_class); ?>">
      <?php foreach ($carousel_items as $item_index => $carousel_item): ?>
        <?php
        $item_class = $slide_class;
        $item_html  = '';

        if (is_array($carousel_item)) {
          $item_class = trim($slide_class . ' ' . (isset($carousel_item['class']) ? (string) $carousel_item['class'] : ''));
          $item_html  = isset($carousel_item['content']) ? (string) $carousel_item['content'] : '';
        } else {
          $item_html = (string) $carousel_item;
        }
        ?>
        <article class="<?= e($item_class); ?>" data-carousel-slide-index="<?= e((string) $item_index); ?>">
          <?= $item_html; ?>
        </article>
      <?php endforeach; ?>
    </div>
  </div>

  <?php if ($carousel_show_arrows): ?>
    <div class="pointer-events-none absolute inset-y-0 left-0 right-0 flex items-center justify-between px-2 sm:px-3">
      <button
        type="button"
        class="carousel-prev pointer-events-auto inline-flex size-10 items-center justify-center rounded-full border border-brand-200 bg-white/90 text-brand-700 shadow-sm transition hover:border-brand-300 hover:text-brand-900 focus:outline-none focus:ring-2 focus:ring-primary-600"
        aria-label="Previous slide group"
      >
        <span aria-hidden="true">&larr;</span>
      </button>
      <button
        type="button"
        class="carousel-next pointer-events-auto inline-flex size-10 items-center justify-center rounded-full border border-brand-200 bg-white/90 text-brand-700 shadow-sm transition hover:border-brand-300 hover:text-brand-900 focus:outline-none focus:ring-2 focus:ring-primary-600"
        aria-label="Next slide group"
      >
        <span aria-hidden="true">&rarr;</span>
      </button>
    </div>
  <?php endif; ?>

  <?php if ($carousel_show_pagination || $carousel_show_info): ?>
    <div class="mt-4 flex items-center justify-between gap-4">
      <?php if ($carousel_show_pagination): ?>
        <div class="carousel-pagination inline-flex items-center gap-2" aria-label="Carousel pagination"></div>
      <?php endif; ?>

      <?php if ($carousel_show_info): ?>
        <div class="inline-flex items-center gap-3">
          <?php if ($carousel_autoplay): ?>
            <div class="carousel-autoplay-timer inline-flex items-center gap-2">
              <span class="relative inline-flex size-9 items-center justify-center rounded-full bg-white">
                <span class="absolute inset-0 rounded-full border border-brand-200"></span>
                <span
                  class="carousel-autoplay-timer-progress absolute inset-0 rounded-full"
                  style="background: conic-gradient(theme(colors.primary.600) 0deg, theme(colors.brand.200) 0deg);"
                  aria-hidden="true"
                ></span>
                <span class="absolute inset-[3px] rounded-full bg-white" aria-hidden="true"></span>
                <span class="carousel-autoplay-timer-text relative text-[11px] font-semibold text-brand-700">0s</span>
              </span>
              <span class="text-xs font-medium uppercase tracking-[0.08em] text-brand-500">Autoplay</span>
            </div>
          <?php endif; ?>

          <p class=" text-brand-700" aria-live="polite" aria-atomic="true">
            <span class="carousel-info-current">1</span>
            <span class="text-brand-400">/</span>
            <span class="carousel-info-total"><?= e((string) max(1, count($carousel_items))); ?></span>
          </p>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>
