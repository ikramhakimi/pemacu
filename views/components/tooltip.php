<?php
declare(strict_types=1);

/**
 * Component: tooltip
 * Purpose: Render an API-driven tooltip with accessible trigger semantics and positional variants.
 * Anatomy:
 * - .tooltip
 *   - .tooltip__trigger
 *   - .tooltip__content[role=tooltip]
 *     - .tooltip__arrow (optional)
 * Data Contract:
 * - `id` (string, optional): tooltip id for `aria-describedby`. Auto-generated when omitted.
 * - `trigger_label` (string, optional): trigger text. Default: `Info`.
 * - `content` (string, optional): tooltip text. Default: `Helpful supporting context.`.
 * - `position` (string, optional): `top`, `right`, `bottom`, `left`. Default: `top`.
 * - `tone` (string, optional): `dark`, `light`, `info`. Default: `dark`.
 * - `size` (string, optional): `sm`, `md`. Default: `md`.
 * - `show_arrow` (bool, optional): render directional arrow. Default: true.
 * - `trigger_as` (string, optional): `button` or `span`. Default: `button`.
 * - `class_name` (string, optional): additional wrapper classes.
 * - `trigger_class_name` (string, optional): additional trigger classes.
 * - `content_class_name` (string, optional): additional content classes.
 */

$id = isset($id) ? trim((string) $id) : '';

if ($id === '') {
  $id = 'tooltip-' . substr(md5((string) uniqid('', true)), 0, 10);
}

$trigger_label = isset($trigger_label) ? trim((string) $trigger_label) : 'Info';
$content       = isset($content) ? trim((string) $content) : 'Helpful supporting context.';
$position      = isset($position) ? trim((string) $position) : 'top';
$tone          = isset($tone) ? trim((string) $tone) : 'dark';
$size          = isset($size) ? trim((string) $size) : 'md';
$show_arrow    = !isset($show_arrow) || (bool) $show_arrow;
$trigger_as    = isset($trigger_as) ? trim((string) $trigger_as) : 'button';
$class_name    = isset($class_name) ? trim((string) $class_name) : '';
$trigger_class_name = isset($trigger_class_name) ? trim((string) $trigger_class_name) : '';
$content_class_name = isset($content_class_name) ? trim((string) $content_class_name) : '';

if ($trigger_label === '') {
  $trigger_label = 'Info';
}

if ($content === '') {
  $content = 'Helpful supporting context.';
}

$allowed_positions = ['top', 'right', 'bottom', 'left'];
$allowed_tones     = ['dark', 'light', 'info'];
$allowed_sizes     = ['sm', 'md'];

if (!in_array($position, $allowed_positions, true)) {
  $position = 'top';
}

if (!in_array($tone, $allowed_tones, true)) {
  $tone = 'dark';
}

if (!in_array($size, $allowed_sizes, true)) {
  $size = 'md';
}

if ($trigger_as !== 'span') {
  $trigger_as = 'button';
}

$position_map = [
  'top' => [
    'content' => 'bottom-full left-1/2 mb-2 -translate-x-1/2',
    'arrow'   => 'top-full left-1/2 -translate-x-1/2',
  ],
  'right' => [
    'content' => 'left-full top-1/2 ml-2 -translate-y-1/2',
    'arrow'   => 'right-full top-1/2 -translate-y-1/2',
  ],
  'bottom' => [
    'content' => 'left-1/2 top-full mt-2 -translate-x-1/2',
    'arrow'   => 'bottom-full left-1/2 -translate-x-1/2',
  ],
  'left' => [
    'content' => 'right-full top-1/2 mr-2 -translate-y-1/2',
    'arrow'   => 'left-full top-1/2 -translate-y-1/2',
  ],
];

$tone_map = [
  'dark' => [
    'content' => 'bg-brand-900 text-white shadow-lg',
    'arrow'   => 'bg-brand-900',
  ],
  'light' => [
    'content' => 'bg-white text-brand-900 ring-1 ring-brand-200 shadow-lg',
    'arrow'   => 'bg-white ring-1 ring-brand-200',
  ],
  'info' => [
    'content' => 'bg-primary-600 text-white shadow-lg',
    'arrow'   => 'bg-primary-600',
  ],
];

$size_map = [
  'sm' => 'px-2 py-1 text-xs',
  'md' => 'px-3 py-2 ',
];

$root_classes = trim(implode(' ', array_filter([
  'tooltip relative inline-flex max-w-max group',
  $class_name,
])));

$trigger_classes = trim(implode(' ', array_filter([
  'tooltip__trigger inline-flex items-center rounded-md  font-medium text-brand-700 underline decoration-dotted underline-offset-4 transition hover:text-brand-900 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500',
  $trigger_class_name,
])));

$content_classes = trim(implode(' ', array_filter([
  'tooltip__content pointer-events-none invisible absolute z-20 w-max max-w-[280px] rounded-md font-medium leading-5 opacity-0 transition-all duration-150',
  'group-hover:visible group-hover:opacity-100 group-focus-within:visible group-focus-within:opacity-100',
  $position_map[$position]['content'],
  $size_map[$size],
  $tone_map[$tone]['content'],
  $content_class_name,
])));

$arrow_classes = trim(implode(' ', array_filter([
  'tooltip__arrow absolute h-2 w-2 rotate-45',
  $position_map[$position]['arrow'],
  $tone_map[$tone]['arrow'],
])));
?>
<div class="<?= e($root_classes); ?>">
  <?php if ($trigger_as === 'span'): ?>
    <span
      class="<?= e($trigger_classes); ?>"
      tabindex="0"
      aria-describedby="<?= e($id); ?>"
    >
      <?= e($trigger_label); ?>
    </span>
  <?php else: ?>
    <button
      class="<?= e($trigger_classes); ?>"
      type="button"
      aria-describedby="<?= e($id); ?>"
    >
      <?= e($trigger_label); ?>
    </button>
  <?php endif; ?>

  <span id="<?= e($id); ?>" role="tooltip" class="<?= e($content_classes); ?>">
    <?= e($content); ?>
    <?php if ($show_arrow): ?>
      <span class="<?= e($arrow_classes); ?>" aria-hidden="true"></span>
    <?php endif; ?>
  </span>
</div>
