<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Carousel Advanced';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/carousel-advanced',
]);

$slides = [
  [
    'title' => 'Northlane Health Rebrand',
    'image' => 'https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Camera lens close-up on a studio table',
  ],
  [
    'title' => 'Riverfold Product Launch',
    'image' => 'https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Photographer taking portraits outdoors',
  ],
  [
    'title' => 'Ariq Editorial Collection',
    'image' => 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Photo editing workspace with monitor and tools',
  ],
  [
    'title' => 'Solis Agency Collaboration',
    'image' => 'https://images.unsplash.com/photo-1516724562728-afc824a36e84?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Team discussing creative direction in a studio',
  ],
  [
    'title' => 'Atlas Workspace Refresh',
    'image' => 'https://images.unsplash.com/photo-1452587925148-ce544e77e70d?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Work desk with camera gear and notebook',
  ],
  [
    'title' => 'Crestline Seasonal Push',
    'image' => 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?auto=format&fit=crop&w=1400&q=80',
    'alt'   => 'Production team reviewing campaign photos together',
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
    'header_title'           => 'Carousel Advanced',
    'header_subtitle'        => 'Autoplay, infinite loop, centered grouping, and responsive multi-slide configuration in one setup.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
  ?>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Carousel Advanced Setup
      </div>
      <div class="relative flex min-h-[340px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-6xl">
          <?php component('carousel', [
            'carousel_id'              => 'canvas-carousel-advanced',
            'carousel_items'           => $carousel_items,
            'carousel_autoplay'        => true,
            'carousel_interval'        => 4500,
            'carousel_infinite'        => true,
            'carousel_snap'            => true,
            'carousel_centered'        => true,
            'carousel_slides_qty'      => [
              'xs' => 1,
              'sm' => 1,
              'lg' => 1,
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
