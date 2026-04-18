<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Avatar';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$avatar_images = [
  path('/assets/images/avatars/avatar-01.jpg'),
  path('/assets/images/avatars/avatar-02.jpg'),
  path('/assets/images/avatars/avatar-03.jpg'),
  path('/assets/images/avatars/avatar-04.jpg'),
  path('/assets/images/avatars/avatar-05.jpg'),
  path('/assets/images/avatars/avatar-06.jpg'),
];

$avatar_base_items = [
  [
    'image_src' => $avatar_images[0],
    'image_alt' => 'Profile photo of Aina',
    'size'      => '48',
  ],
  [
    'initials' => 'MR',
    'size'     => '48',
  ],
  [
    'icon_name' => 'user-3-line',
    'icon_size' => '20',
    'size'      => '48',
    'bg_class'     => 'bg-amber-100',
    'text_class'   => 'text-amber-700',
    'border_class' => 'ring-amber-700/20',
    'icon_class'   => 'text-current',
  ],
  [
    'icon_name'    => 'building-4-line',
    'icon_size'    => '20',
    'size'         => '48',
    'bg_class'     => 'bg-primary-100',
    'text_class'   => 'text-primary-700',
    'border_class' => 'ring-primary-700/20',
    'icon_class'   => 'text-current',
  ],
];

$size_variations = [
  [
    'image_src' => $avatar_images[0],
    'image_alt' => 'Avatar size 24',
    'size'      => '24',
  ],
  [
    'image_src' => $avatar_images[1],
    'image_alt' => 'Avatar size 32',
    'size'      => '32',
  ],
  [
    'image_src' => $avatar_images[2],
    'image_alt' => 'Avatar size 40',
    'size'      => '40',
  ],
  [
    'image_src' => $avatar_images[3],
    'image_alt' => 'Avatar size 48',
    'size'      => '48',
  ],
  [
    'image_src' => $avatar_images[4],
    'image_alt' => 'Avatar size 56',
    'size'      => '56',
  ],
  [
    'image_src' => $avatar_images[5],
    'image_alt' => 'Avatar size 64',
    'size'      => '64',
  ],
];

$initials_size_items = [
  [
    'initials' => 'IH',
    'size'     => '24',
  ],
  [
    'initials' => 'SH',
    'size'     => '32',
  ],
  [
    'initials' => 'AC',
    'size'     => '40',
  ],
  [
    'initials' => 'NT',
    'size'     => '48',
  ],
  [
    'initials' => 'NV',
    'size'     => '56',
  ],
  [
    'initials' => 'ZA',
    'size'     => '64',
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

$avatar_online_status_items = [
  [
    'image_src' => $avatar_images[3],
    'image_alt' => 'Online avatar size 48',
    'size'      => '48',
    'status'    => 'online',
  ],
];

$avatar_offline_status_items = [
  [
    'image_src' => $avatar_images[3],
    'image_alt' => 'Offline avatar size 48',
    'size'      => '48',
    'status'    => 'offline',
  ],
];

$avatar_story_items = [
  [
    'image_src'  => $avatar_images[4],
    'image_alt'  => 'Story avatar 3 size 48',
    'size'       => '48',
    'status'    => 'online',
    'status_ring_class'=> 'ring-2 ring-brand-100',
    'class_name' => 'ring-2 ring-positive-500 ring-offset-2 ring-offset-white',
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
  <?php
  $canvas_header = [
    'header_title'           => 'Avatar',
    'header_subtitle'        => 'Reference for size tokens, initials, icons, and overlapping group presentation.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>
<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Avatar Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('avatar', ['items' => $avatar_base_items]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Avatar A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('avatar', ['items' => $size_variations]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Avatar B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('avatar', ['items' => $initials_size_items]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Avatar C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('avatar', [
            'items'    => $avatar_group_items,
            'is_group' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Avatar D
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('avatar', ['items' => $avatar_online_status_items]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Avatar E
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('avatar', ['items' => $avatar_offline_status_items]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Avatar F
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('avatar', ['items' => $avatar_story_items]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
