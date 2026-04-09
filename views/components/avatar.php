<?php
declare(strict_types=1);

/**
 * Component: avatar
 * Purpose: Render data-driven avatar lists and overlapping avatar groups with image/initials support.
 * Anatomy:
 * - .avatar-list
 *   - .avatar
 *     - img.avatar__image | span.avatar__initials
 * - .avatar-group
 *   - .avatar-group__item.-m-2
 *     - .avatar
 * Data Contract:
 * - `items` (array, optional): avatar entries.
 *   - each item supports `image_src`, `image_alt`, `initials`, `size`, `tone`, `class_name`.
 * - `is_group` (bool, optional): render overlapping group layout. Default: false.
 * - `class_name` (string, optional): additional classes for wrapper.
 */

$items      = isset($items) && is_array($items) ? array_values($items) : [];
$is_group   = !empty($is_group);
$class_name = isset($class_name) ? trim((string) $class_name) : '';

if ($items === []) {
  $items = [
    [
      'initials' => 'IH',
      'size'     => '48',
      'tone'     => 'brand',
    ],
  ];
}

$size_map = [
  '32' => [
    'box'  => 'h-8 w-8',
    'text' => 'text-xs',
  ],
  '40' => [
    'box'  => 'h-10 w-10',
    'text' => 'text-sm',
  ],
  '48' => [
    'box'  => 'h-12 w-12',
    'text' => 'text-base',
  ],
];

$tone_map = [
  'brand'    => 'bg-brand-100 text-brand-700',
  'primary'  => 'bg-primary-100 text-primary-700',
  'positive' => 'bg-positive-100 text-positive-700',
  'negative' => 'bg-negative-100 text-negative-700',
  'neutral'  => 'bg-brand-200 text-brand-700',
];

$wrapper_classes = $is_group
  ? 'avatar-group inline-flex items-center'
  : 'avatar-list flex flex-wrap items-center gap-3';
?>
<div class="<?= e(trim($wrapper_classes . ' ' . $class_name)); ?>">
  <?php foreach ($items as $item): ?>
    <?php
    $item_size_key = isset($item['size']) ? trim((string) $item['size']) : '48';
    $item_tone_key = isset($item['tone']) ? trim((string) $item['tone']) : 'brand';
    $image_src     = isset($item['image_src']) ? trim((string) $item['image_src']) : '';
    $image_alt     = isset($item['image_alt']) ? trim((string) $item['image_alt']) : 'Avatar';
    $initials      = isset($item['initials']) ? trim((string) $item['initials']) : '';
    $item_class    = isset($item['class_name']) ? trim((string) $item['class_name']) : '';

    if (!array_key_exists($item_size_key, $size_map)) {
      $item_size_key = '48';
    }

    if (!array_key_exists($item_tone_key, $tone_map)) {
      $item_tone_key = 'brand';
    }

    $item_size   = $size_map[$item_size_key];
    $avatar_base = 'avatar inline-flex shrink-0 items-center justify-center overflow-hidden rounded-full ring-2 ring-white';
    $avatar_box  = $avatar_base . ' ' . $item_size['box'] . ' ' . $item_size['text'];
    $group_item  = $is_group ? '-m-2 first:ml-0' : '';
    ?>
    <div class="<?= e(trim('avatar-group__item ' . $group_item . ' ' . $item_class)); ?>">
      <?php if ($image_src !== ''): ?>
        <span class="<?= e($avatar_box); ?>">
          <img
            class="avatar__image h-full w-full object-cover"
            src="<?= e($image_src); ?>"
            alt="<?= e($image_alt); ?>"
            loading="lazy"
          >
        </span>
      <?php else: ?>
        <span class="<?= e(trim($avatar_box . ' ' . $tone_map[$item_tone_key])); ?>">
          <span class="avatar__initials font-semibold uppercase tracking-wide"><?= e($initials !== '' ? $initials : 'NA'); ?></span>
        </span>
      <?php endif; ?>
    </div>
  <?php endforeach; ?>
</div>
