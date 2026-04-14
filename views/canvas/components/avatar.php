<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Avatar';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$avatar_images = [
  'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=200&q=80',
  'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=240&q=80',
  'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=260&q=80',
  'https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?auto=format&fit=crop&w=180&q=80',
  'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?auto=format&fit=crop&w=180&q=80',
];

$size_variations = [
  [
    'image_src' => $avatar_images[0],
    'image_alt' => 'Avatar size 32',
    'size'      => '32',
  ],
  [
    'image_src' => $avatar_images[1],
    'image_alt' => 'Avatar size 40',
    'size'      => '40',
  ],
  [
    'image_src' => $avatar_images[2],
    'image_alt' => 'Avatar size 48',
    'size'      => '48',
  ],
];

$initials_tones = [
  [
    'initials' => 'IH',
    'size'     => '48',
    'tone'     => 'brand',
  ],
  [
    'initials' => 'SH',
    'size'     => '48',
    'tone'     => 'primary',
  ],
  [
    'initials' => 'AC',
    'size'     => '48',
    'tone'     => 'positive',
  ],
  [
    'initials' => 'NT',
    'size'     => '48',
    'tone'     => 'negative',
  ],
  [
    'initials' => 'NV',
    'size'     => '48',
    'tone'     => 'neutral',
  ],
];

$avatar_group_items = [
  [
    'image_src' => $avatar_images[0],
    'image_alt' => 'Team member 1',
    'size'      => '40',
  ],
  [
    'image_src' => $avatar_images[1],
    'image_alt' => 'Team member 2',
    'size'      => '40',
  ],
  [
    'image_src' => $avatar_images[2],
    'image_alt' => 'Team member 3',
    'size'      => '40',
  ],
  [
    'image_src' => $avatar_images[3],
    'image_alt' => 'Team member 4',
    'size'      => '40',
  ],
  [
    'image_src' => $avatar_images[4],
    'image_alt' => 'Team member 5',
    'size'      => '40',
  ],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/avatar',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Avatar',
    'header_subtitle'        => 'Reference for size tokens, initials tones, and overlapping group presentation.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use image avatars when user photos are available; fall back to initials when not available.</li>
      <li>Use size tokens consistently: 32, 40 (44px), and 48.</li>
      <li>Use tone variants to encode lightweight user categories when initials are shown.</li>
      <li>Use avatar groups for team/member lists where overlapping saves horizontal space.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Size Variations</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use `32`, `40`, and `48` size tokens to keep avatar scaling consistent across layouts.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('avatar', ['items' => $size_variations]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Initials Tones</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use full tone set (`brand`, `primary`, `positive`, `negative`, `neutral`) for quick identity placeholders.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('avatar', ['items' => $initials_tones]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Avatar Group</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use overlapping group layout with `-m-2` spacing for compact participant and team lists.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('avatar', [
          'items'    => $avatar_group_items,
          'is_group' => true,
        ]); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
