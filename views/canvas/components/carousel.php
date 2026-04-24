<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Carousel';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/carousel',
]);

$slides = [
  [
    'title' => 'Studio Session',
    'image' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Camera lens close-up on a studio table',
  ],
  [
    'title' => 'Outdoor Portrait',
    'image' => 'https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Photographer taking portraits outdoors',
  ],
  [
    'title' => 'Post Production',
    'image' => 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Photo editing workspace with monitor and tools',
  ],
];

$carousel_items = [];

foreach ($slides as $slide) {
  $title = (string) $slide['title'];
  $image = (string) $slide['image'];
  $alt   = (string) $slide['alt'];

  ob_start();
  ?>
  <figure class="overflow-hidden rounded-xl border border-brand-200 bg-white">
    <img
      src="<?= e($image); ?>"
      alt="<?= e($alt); ?>"
      class="h-[280px] w-full object-cover"
      loading="lazy"
    >
    <figcaption class="px-4 py-3 text-sm font-medium text-brand-800"><?= e($title); ?></figcaption>
  </figure>
  <?php
  $carousel_items[] = (string) ob_get_clean();
}
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Carousel',
    'header_subtitle'        => 'Reusable carousel with data-driven options, navigation controls, and responsive grouped slides.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
  ?>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Carousel Base
      </div>
      <div class="relative flex min-h-[300px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-5xl">
          <?php component('carousel', [
            'carousel_id'              => 'canvas-carousel-base',
            'carousel_items'           => $carousel_items,
            'carousel_autoplay'        => false,
            'carousel_interval'        => 5000,
            'carousel_infinite'        => false,
            'carousel_snap'            => false,
            'carousel_centered'        => false,
            'carousel_slides_qty'      => [
              'xs' => 1,
              'md' => 1,
            ],
            'carousel_show_pagination' => true,
            'carousel_show_arrows'     => true,
            'carousel_show_info'       => true,
            'carousel_class'           => 'opacity-0 transition-opacity duration-300',
            'carousel_body_class'      => '',
            'carousel_slide_class'     => '',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
