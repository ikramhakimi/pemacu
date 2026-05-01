<?php
declare(strict_types=1);

/**
 * Component: avatar
 * Purpose: Render avatar lists and overlapping avatar groups from data, with image and initials fallback support.
 * Anatomy:
 * - .avatar
 *   - img.avatar__image | div.avatar__initials
 *   - div.avatar__inset-border
 * Data Contract:
 * - `items` (array, optional): avatar entries.
 *   - each item supports `image_src`, `image_alt`, `icon_name`, `icon_size`, `initials`, `size`, `status`, `class_name`.
 *   - optional item-level color hooks: `bg_class`, `text_class`, `border_class`, `icon_class`, `status_class`.
 * - `is_group` (bool, optional): render overlapping group layout. Default: false.
 * - Component-level color hooks (optional): `bg_class`, `text_class`, `border_class`, `icon_class`.
 * - Component-level status hooks (optional): `status_online_class`, `status_offline_class`, `status_ring_class`.
 * - Supported sizes: `24`, `32`, `40`, `48`, `56`, `64`.
 */

$items        = isset($items) && is_array($items)
  ? array_values($items)
  : [];
$is_group     = isset($is_group) && $is_group === true;
$bg_class     = isset($bg_class) ? trim((string) $bg_class) : 'bg-brand-50';
$text_class   = isset($text_class) ? trim((string) $text_class) : 'text-brand-700';
$border_class = isset($border_class) ? trim((string) $border_class) : 'ring-brand-900/10';
$icon_class   = isset($icon_class) ? trim((string) $icon_class) : 'text-current';
$status_online_class = isset($status_online_class) ? trim((string) $status_online_class) : 'bg-positive-500';
$status_offline_class = isset($status_offline_class) ? trim((string) $status_offline_class) : 'bg-brand-400';
$status_ring_class = isset($status_ring_class) ? trim((string) $status_ring_class) : 'ring-2 ring-white';

if ($items === []) {
  $items = [
    [
      'initials' => 'IH',
      'size'     => '48',
    ],
  ];
}

$size_map = [
  '24' => [
    'box'  => 'h-6 w-6',
    'text' => 'text-[10px]',
  ],
  '32' => [
    'box'  => 'h-8 w-8',
    'text' => 'text-xs',
  ],
  '40' => [
    'box'  => 'h-10 w-10',
    'text' => '',
  ],
  '48' => [
    'box'  => 'h-12 w-12',
    'text' => 'text-base',
  ],
  '56' => [
    'box'  => 'h-14 w-14',
    'text' => 'text-lg',
  ],
  '64' => [
    'box'  => 'h-16 w-16',
    'text' => 'text-xl',
  ],
];

$status_size_map = [
  '24' => 'h-1.5 w-1.5',
  '32' => 'h-2 w-2',
  '40' => 'h-2.5 w-2.5',
  '48' => 'h-3 w-3',
  '56' => 'h-3.5 w-3.5',
  '64' => 'h-4 w-4',
];

?>
<?php foreach ($items as $item): ?>
  <?php
    $item_size_key   = isset($item['size']) ? trim((string) $item['size']) : '48';
    $image_src       = isset($item['image_src']) ? trim((string) $item['image_src']) : '';
    $image_alt       = isset($item['image_alt']) ? trim((string) $item['image_alt']) : 'Avatar';
    $icon_name       = isset($item['icon_name']) ? trim((string) $item['icon_name']) : '';
    $icon_size       = isset($item['icon_size']) ? trim((string) $item['icon_size']) : '20';
    $initials        = isset($item['initials']) ? trim((string) $item['initials']) : '';
    $status          = isset($item['status']) ? trim((string) $item['status']) : '';
    $item_class      = isset($item['class_name']) ? trim((string) $item['class_name']) : '';
    $item_bg_class   = isset($item['bg_class']) ? trim((string) $item['bg_class']) : $bg_class;
    $item_text_class = isset($item['text_class']) ? trim((string) $item['text_class']) : $text_class;
    $item_border_class = isset($item['border_class']) ? trim((string) $item['border_class']) : $border_class;
    $item_icon_class = isset($item['icon_class']) ? trim((string) $item['icon_class']) : $icon_class;
    $item_status_ring_class = isset($item['status_ring_class']) ? trim((string) $item['status_ring_class']) : $status_ring_class;
    $item_status_class = isset($item['status_class']) ? trim((string) $item['status_class']) : '';

    if (!array_key_exists($item_size_key, $size_map)) {
      $item_size_key = '48';
    }

    $item_size = $size_map[$item_size_key];
    $avatar_box = trim(implode(' ', [
      'avatar relative inline-flex shrink-0 items-center justify-center rounded-full',
      'font-mono text-xs',
      $item_size['box'],
      $item_size['text'],
    ]));
    $avatar_inset_border_class = trim(implode(' ', [
      'avatar__inset-border pointer-events-none absolute inset-0 rounded-[inherit] ring-1 ring-inset',
      $item_border_class,
    ]));
    $avatar_color_class = trim($item_bg_class . ' ' . $item_text_class);
    $status_size_class = isset($status_size_map[$item_size_key]) ? $status_size_map[$item_size_key] : 'h-3 w-3';
    $status_tone_class = $status === 'online'
      ? $status_online_class
      : $status_offline_class;
    $should_render_status = $status === 'online' || $status === 'offline';
    $avatar_status_class = trim(implode(' ', [
      'avatar__status pointer-events-none absolute bottom-0 right-0 rounded-full',
      $status_size_class,
      $item_status_ring_class,
      $status_tone_class,
      $item_status_class,
    ]));
    $group_item = $is_group ? '-m-2 first:ml-0' : '';
    $avatar_item_class = trim(implode(' ', array_filter([
      $avatar_box,
      $group_item,
      $item_class,
    ])));
  ?>
  <?php if ($image_src !== ''): ?>
    <div class="<?= e($avatar_item_class); ?>">
      <img
        class="avatar__image h-full w-full rounded-[inherit] object-cover"
        src="<?= e($image_src); ?>"
        alt="<?= e($image_alt); ?>"
        loading="lazy"
      >
      <div class="<?= e($avatar_inset_border_class); ?>" aria-hidden="true"></div>
      <?php if ($should_render_status): ?>
        <div class="<?= e($avatar_status_class); ?>" aria-hidden="true"></div>
      <?php endif; ?>
    </div>
  <?php elseif ($icon_name !== ''): ?>
    <div class="<?= e(trim($avatar_item_class . ' ' . $avatar_color_class)); ?>">
      <?php icon($icon_name, [
        'icon_size'  => $icon_size,
        'icon_class' => $item_icon_class,
      ]); ?>
      <div class="<?= e($avatar_inset_border_class); ?>" aria-hidden="true"></div>
      <?php if ($should_render_status): ?>
        <div class="<?= e($avatar_status_class); ?>" aria-hidden="true"></div>
      <?php endif; ?>
    </div>
  <?php else: ?>
    <div class="<?= e(trim($avatar_item_class . ' ' . $avatar_color_class)); ?>">
      <div class="avatar__initials font-semibold uppercase tracking-wide"><?= e($initials !== '' ? $initials : 'NA'); ?></div>
      <div class="<?= e($avatar_inset_border_class); ?>" aria-hidden="true"></div>
      <?php if ($should_render_status): ?>
        <div class="<?= e($avatar_status_class); ?>" aria-hidden="true"></div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
<?php endforeach; ?>
