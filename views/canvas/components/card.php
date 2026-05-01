<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Card';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');
$card_base_data = [
  'variant'    => 'base',
  'title'      => 'Customer Profile',
  'subtitle'   => 'Overview of current account context',
  'content'    => 'Status: Active and in good standing.',
  'footer'     => 'Last updated 2 hours ago',
  'show_footer'=> true,
];

$card_divided_data = [
  'variant'    => 'divided',
  'title'      => 'Header with Border',
  'subtitle'   => 'Clear section separation for contextual details.',
  'content'    => 'Use this pattern when you need a focused CTA below explanatory copy.',
  'cta_layout' => 'split',
  'cta_items'  => [
    [
      'label'   => 'Cancel',
      'variant' => 'md/secondary',
    ],
    [
      'label'   => 'Continue',
      'variant' => 'md/default',
    ],
  ],
];

$card_media_photo_left_data = [
  'variant'            => 'media-photo',
  'title'              => 'Card with Photo (Left)',
  'subtitle'           => 'Two left-aligned buttons with auto width.',
  'content'            => 'Simplifying your workflow from day one. Manage your tasks, projects, and team in one place.',
  'cta_align'          => 'left',
  'cta_full_width'     => false,
  'cta_items'          => [
    [
      'label'   => 'Secondary',
      'variant' => 'md/secondary',
    ],
    [
      'label'   => 'Primary',
      'variant' => 'md/default',
    ],
  ],
  'media_aspect_ratio' => 'aspect-[5/4]',
];

$card_media_video_data = [
  'variant'            => 'media-video',
  'title'              => 'Card with Video (Right)',
  'subtitle'           => 'Two right-aligned buttons with auto width.',
  'content'            => 'Use this layout to present announcements, demos, or campaign highlights.',
  'cta_align'          => 'right',
  'cta_full_width'     => false,
  'cta_items'          => [
    [
      'label'   => 'Secondary',
      'variant' => 'md/secondary',
    ],
    [
      'label'   => 'Primary',
      'variant' => 'md/default',
    ],
  ],
  'media_aspect_ratio' => 'aspect-video',
];

$card_overlay_data = [
  'variant'            => 'overlay',
  'title'              => 'Image Overlay with Text',
  'subtitle'           => 'Layered emphasis for visual storytelling.',
  'content'            => 'Keep the copy short to maintain contrast and readability over media.',
  'cta_label'          => 'Explore',
  'cta_variant'        => 'md/secondary',
];

$card_metric_data = [
  'variant'        => 'metric',
  'title'          => 'Revenue',
  'subtitle'       => 'Monthly performance snapshot',
  'metric_value'   => 'RM 12.4k',
  'metric_compare' => 'Compare to last month: RM 11.0k',
];

$card_metric_progress_data = [
  'title'        => 'Leads Target',
  'value'        => 1246,
  'max'          => 1500,
  'achievement'  => '83% achieved',
  'aria_value'   => '83% achieved (1,246 of 1,500)',
];

$card_intro_demo_data = [
  'variant'        => 'intro',
  'title'          => "Book a 15-min\nintro call",
  'cta_label'      => 'Book a Call',
  'cta_href'       => '#',
  'note_icon_name' => 'calendar-line',
  'note_text'      => 'Our team will reach out within 24 hours to schedule your intro call.',
];

$card_package_data = [
  'variant'    => 'package',
  'title'      => 'Package Name',
  'price'      => 'RM 100',
  'content'    => 'Highlight the key features and benefits to attract potential customers.',
  'features'   => ['1-2 Solutions', '30 minutes coverage', 'Up to 10 people'],
  'cta_label'  => 'Book Package',
  'cta_variant'=> 'md/default',
  'cta_href'   => '#',
];

$card_testimonial_data = [
  'variant'           => 'testimonial',
  'quote'             => "Lumera captured our wedding with such sensitivity and artistry. Every photograph felt like a painting. We've recommended them to four other couples since.",
  'author_name'       => 'Muhammad Aiman',
  'author_role'       => 'Wedding Client',
  'author_avatar_src' => path('/assets/images/avatars/avatar-01.jpg'),
  'author_avatar_alt' => 'Avatar of Muhammad Aiman',
  'rating'            => 5,
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/card',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Card',
    'header_subtitle'        => 'Reference variants for card content patterns and hierarchy.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
  ?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Base
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md">
          <?php component('card', ['card' => $card_base_data]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Divided
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md">
          <?php component('card', ['card' => $card_divided_data]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Media Photo
      </div>
      <div class="relative flex min-h-[620px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md">
          <?php component('card', ['card' => $card_media_photo_left_data]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Media Video
      </div>
      <div class="relative flex min-h-[420px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md">
          <?php component('card', ['card' => $card_media_video_data]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Overlay
      </div>
      <div class="relative flex min-h-[420px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md">
          <?php component('card', ['card' => $card_overlay_data]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Metric
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md space-y-4">
          <?php component('card', ['card' => $card_metric_data]); ?>

          <div class="card card--metric bg-white border border-brand-300 rounded-lg">
            <div class="card__header p-4 pb-0">
              <div class="card__title font-semibold text-base"><?= e($card_metric_progress_data['title']); ?></div>
            </div>
            <div class="card__content p-4">
              <div class="mt-1 text-2xl">
                <?= e(number_format((int) $card_metric_progress_data['value'])); ?> 
                <span class="text-base font-normal text-brand-600">/ <?= e(number_format((int) $card_metric_progress_data['max'])); ?></span>
              </div>
              <?php component('progressbar', [
                'value'          => $card_metric_progress_data['value'],
                'min'            => 0,
                'max'            => $card_metric_progress_data['max'],
                'label'          => $card_metric_progress_data['title'],
                'tone'           => 'info',
                'size'           => 'md',
                'class_name'     => 'mt-4',
                'aria_valuetext' => $card_metric_progress_data['aria_value'],
              ]); ?>
              <div class="text-brand-500 mt-3"><?= e($card_metric_progress_data['achievement']); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Package
      </div>
      <div class="relative flex min-h-[420px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md">
          <?php component('card', ['card' => $card_package_data]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Testimonial
      </div>
      <div class="relative flex min-h-[420px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md">
          <?php component('card', ['card' => $card_testimonial_data]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Intro
      </div>
      <div class="relative flex min-h-[420px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-md">
          <?php component('card', ['card' => $card_intro_demo_data]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
