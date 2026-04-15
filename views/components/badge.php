<?php
declare(strict_types=1);

/**
 * Component: badge
 * Purpose: Render inline-flex badges from data with semantic tone variations.
 * Anatomy:
 * - .badge-list
 *   - .badge
 * Data Contract:
 * - `items` (array, optional): list of badges.
 *   - each item supports `label`, `tone`, `class_name`.
 * - Single badge fallback via `label`, `tone`, `class_name`.
 * - `show_wrapper` (bool, optional): render `.badge-list` wrapper. Default: false.
 * - Supported tones: `positive`, `negative`, `neutral`, `warning`, `info`, `accent`.
 */

$items = isset($items) && is_array($items)
  ? array_values($items)
  : [];

$label      = isset($label) ? trim((string) $label) : '';
$tone       = isset($tone) ? trim((string) $tone) : 'neutral';
$class_name = isset($class_name) ? trim((string) $class_name) : '';
$show_wrapper = isset($show_wrapper) && $show_wrapper === true;

if ($items === []) {
  $items = [
    [
      'label'      => $label !== '' ? $label : 'Badge',
      'tone'       => $tone,
      'class_name' => $class_name,
    ],
  ];
}

$tone_map = [
  'positive' => 'border-positive-200 bg-positive-100 text-positive-700',
  'negative' => 'border-negative-200 bg-negative-100 text-negative-700',
  'neutral'  => 'border-brand-200 bg-brand-100 text-brand-700',
  'warning'  => 'border-attention-200 bg-attention-100 text-attention-700',
  'attention'=> 'border-attention-200 bg-attention-100 text-attention-700',
  'info'     => 'border-primary-200 bg-primary-100 text-primary-700',
  'accent'   => 'border-indigo-200 bg-indigo-100 text-indigo-700',
];
?>
<?php if ($show_wrapper): ?>
  <div class="badge-list flex flex-wrap items-center gap-2">
<?php endif; ?>
<?php foreach ($items as $item): ?>
  <?php
  $item_label = isset($item['label']) ? trim((string) $item['label']) : '';
  $item_tone  = isset($item['tone']) ? trim((string) $item['tone']) : 'neutral';
  $item_class = isset($item['class_name']) ? trim((string) $item['class_name']) : '';

  if ($item_label === '') {
    continue;
  }

  if (!array_key_exists($item_tone, $tone_map)) {
    $item_tone = 'neutral';
  }

  $item_tone_modifier = preg_replace('/[^a-z0-9-]+/', '-', $item_tone);
  $item_tone_modifier = trim((string) $item_tone_modifier, '-');

  $badge_classes = implode(' ', array_filter([
    'badge inline-flex items-center rounded-md border px-2 py-1 text-xs',
    $item_tone_modifier !== '' ? 'badge--' . $item_tone_modifier : '',
    $tone_map[$item_tone],
    $item_class,
  ]));
  ?>
  <span class="<?= e($badge_classes); ?>">
    <?= e($item_label); ?>
  </span>
<?php endforeach; ?>
<?php if ($show_wrapper): ?>
  </div>
<?php endif; ?>
