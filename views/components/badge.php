<?php
declare(strict_types=1);

/**
 * Component: badge
 * Purpose: Render semantic badges from single or list data with optional grouped wrapper layout.
 * Anatomy:
 * - .badge-list (optional)
 *   - .badge
 *     - .badge__avatar (optional)
 *     - .badge__icon (optional)
 * Data Contract:
 * - `items` (array, optional): list of badges.
 *   - each item supports `label`, `tone`, `class_name`, `icon_name`, `icon_size`, `icon_class`,
 *     `avatar_src`, `avatar_alt`, `avatar_size`, `avatar_class`, `mode`, `position_class`.
 * - Single badge fallback via `label`, `tone`, `class_name`, `icon_name`, `icon_size`, `icon_class`,
 *   `avatar_src`, `avatar_alt`, `avatar_size`, `avatar_class`, `mode`, `position_class`.
 * - `show_wrapper` (bool, optional): render `.badge-list` wrapper. Default: false.
 * - Supported tones: `positive`, `negative`, `neutral`, `warning`, `info`, `accent`.
 * - Tone alias: `attention` resolves to `warning`.
 * - Supported modes: `inline` (default), `badge_count`, `badge_dot`.
 */

$items = isset($items) && is_array($items)
  ? array_values($items)
  : [];

$label        = isset($label) ? trim((string) $label) : '';
$tone         = isset($tone) ? trim((string) $tone) : 'neutral';
$class_name   = isset($class_name) ? trim((string) $class_name) : '';
$icon_name    = isset($icon_name) ? trim((string) $icon_name) : '';
$icon_size    = isset($icon_size) ? trim((string) $icon_size) : '16';
$icon_class   = isset($icon_class) ? trim((string) $icon_class) : '';
$avatar_src   = isset($avatar_src) ? trim((string) $avatar_src) : '';
$avatar_alt   = isset($avatar_alt) ? trim((string) $avatar_alt) : 'Avatar';
$avatar_size  = isset($avatar_size) ? trim((string) $avatar_size) : '24';
$avatar_class = isset($avatar_class) ? trim((string) $avatar_class) : '';
$mode         = isset($mode) ? trim((string) $mode) : 'inline';
$position_class = isset($position_class) ? trim((string) $position_class) : '';
$show_wrapper = isset($show_wrapper) && $show_wrapper === true;

if ($items === []) {
  $items = [
    [
      'label'      => $label !== '' ? $label : 'Badge',
      'tone'       => $tone,
      'class_name' => $class_name,
      'icon_name'  => $icon_name,
      'icon_size'  => $icon_size,
      'icon_class' => $icon_class,
      'avatar_src' => $avatar_src,
      'avatar_alt' => $avatar_alt,
      'avatar_size' => $avatar_size,
      'avatar_class' => $avatar_class,
      'mode'       => $mode,
      'position_class' => $position_class,
    ],
  ];
}

$tone_class_map = [
  'positive' => 'border-positive-300 bg-positive-100 text-positive-700',
  'negative' => 'border-negative-300 bg-negative-100 text-negative-700',
  'neutral'  => 'border-brand-300 bg-brand-100 text-brand-700',
  'warning'  => 'border-attention-300 bg-attention-100 text-attention-700',
  'info'     => 'border-primary-300 bg-primary-100 text-primary-700',
  'accent'   => 'border-indigo-300 bg-indigo-100 text-indigo-700',
];

$tone_alias_map = [
  'attention' => 'warning',
];

$avatar_size_class_map = [
  '16' => 'h-4 w-4',
  '20' => 'h-5 w-5',
  '24' => 'h-6 w-6',
  '32' => 'h-8 w-8',
];

$badge_base_class = 'badge inline-flex items-center border text-xs';
$badge_list_class = 'badge-list flex flex-wrap items-center gap-2';
?>
<?php if ($show_wrapper): ?>
  <div class="<?= e($badge_list_class); ?>">
<?php endif; ?>
<?php foreach ($items as $item): ?>
  <?php
  $item_label = isset($item['label']) ? trim((string) $item['label']) : '';
  $item_tone  = isset($item['tone']) ? trim((string) $item['tone']) : 'neutral';
  $item_class = isset($item['class_name']) ? trim((string) $item['class_name']) : '';
  $item_icon_name = isset($item['icon_name']) ? trim((string) $item['icon_name']) : '';
  $item_icon_size = isset($item['icon_size']) ? trim((string) $item['icon_size']) : '16';
  $item_icon_class = isset($item['icon_class']) ? trim((string) $item['icon_class']) : '';
  $item_avatar_src = isset($item['avatar_src']) ? trim((string) $item['avatar_src']) : '';
  $item_avatar_alt = isset($item['avatar_alt']) ? trim((string) $item['avatar_alt']) : 'Avatar';
  $item_avatar_size = isset($item['avatar_size']) ? trim((string) $item['avatar_size']) : '24';
  $item_avatar_class = isset($item['avatar_class']) ? trim((string) $item['avatar_class']) : '';
  $item_mode = isset($item['mode']) ? trim((string) $item['mode']) : 'inline';
  $item_position_class = isset($item['position_class']) ? trim((string) $item['position_class']) : '';

  if (array_key_exists($item_tone, $tone_alias_map)) {
    $item_tone = $tone_alias_map[$item_tone];
  }

  if (!array_key_exists($item_tone, $tone_class_map)) {
    $item_tone = 'neutral';
  }

  if ($item_mode !== 'inline' && $item_mode !== 'badge_count' && $item_mode !== 'badge_dot') {
    $item_mode = 'inline';
  }

  if ($item_label === '' && $item_mode !== 'badge_dot') {
    continue;
  }

  $item_tone_modifier = preg_replace('/[^a-z0-9-]+/', '-', $item_tone);
  $item_tone_modifier = trim((string) $item_tone_modifier, '-');
  $has_leading_media = $item_avatar_src !== '' || $item_icon_name !== '';
  $is_avatar_badge = $item_avatar_src !== '';
  $has_custom_radius = preg_match('/(^|\\s)!?rounded(?:-[^\\s]+)?(?=\\s|$)/', $item_class) === 1;
  $radius_class = $has_custom_radius ? '' : ($is_avatar_badge ? 'rounded-full' : 'rounded-md');
  $has_custom_padding = preg_match('/(^|\\s)!?p(?:x|y|t|r|b|l)?-[^\\s]+(?=\\s|$)/', $item_class) === 1;
  $padding_class = $has_custom_padding ? '' : ($is_avatar_badge ? 'p-1 pr-3' : 'px-2 py-1');
  $has_custom_gap = preg_match('/(^|\\s)!?gap(?:-[xy])?-[^\\s]+(?=\\s|$)/', $item_class) === 1;
  $gap_class = ($has_leading_media && !$has_custom_gap) ? ($is_avatar_badge ? 'gap-2' : 'gap-1.5') : '';
  $avatar_size_class = isset($avatar_size_class_map[$item_avatar_size])
    ? $avatar_size_class_map[$item_avatar_size]
    : $avatar_size_class_map['24'];
  $avatar_resolved_class = $item_avatar_class !== ''
    ? $item_avatar_class
    : trim('badge__avatar rounded-full object-cover ' . $avatar_size_class);

  $badge_classes = implode(' ', array_filter([
    $badge_base_class,
    $radius_class,
    $padding_class,
    $item_tone_modifier !== '' ? 'badge--' . $item_tone_modifier : '',
    $tone_class_map[$item_tone],
    $gap_class,
    $item_class,
  ]));

  if ($item_mode === 'badge_count') {
    $count_badge_classes = implode(' ', array_filter([
      'badge badge--badge-count inline-flex w-5 h-5 leading-5 text-center text-[10px] items-center justify-center rounded-full',
      'bg-negative-500 text-white',
      'absolute -top-2 -right-2',
      $item_position_class,
      $item_class,
    ]));
    ?>
    <span class="<?= e($count_badge_classes); ?>">
      <?= e($item_label !== '' ? $item_label : '0'); ?>
    </span>
    <?php
    continue;
  }

  if ($item_mode === 'badge_dot') {
    $dot_badge_classes = implode(' ', array_filter([
      'badge badge--badge-dot inline-flex h-2.5 w-2.5 rounded-full',
      'bg-negative-500',
      'absolute top-1 right-1',
      $item_position_class,
      $item_class,
    ]));
    ?>
    <span class="<?= e($dot_badge_classes); ?>" aria-hidden="true"></span>
    <?php
    continue;
  }
  ?>
  <span class="<?= e($badge_classes); ?>">
    <?php if ($item_avatar_src !== ''): ?>
      <img
        class="<?= e($avatar_resolved_class); ?>"
        src="<?= e($item_avatar_src); ?>"
        alt="<?= e($item_avatar_alt); ?>"
        loading="lazy"
      >
    <?php endif; ?>
    <?php if ($item_icon_name !== ''): ?>
      <span class="badge__icon inline-flex items-center justify-center" aria-hidden="true">
        <?php icon($item_icon_name, [
          'icon_size'  => $item_icon_size,
          'icon_class' => $item_icon_class,
        ]); ?>
      </span>
    <?php endif; ?>
    <?= e($item_label); ?>
  </span>
<?php endforeach; ?>
<?php if ($show_wrapper): ?>
  </div>
<?php endif; ?>
