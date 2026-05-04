<?php

declare(strict_types=1);

/**
 * Component: progress-meter
 * Purpose: Render a compact labeled percentage meter for dashboard cards.
 * Anatomy:
 * - .progress-meter
 *   - .progress-meter__meta
 *   - .progress-meter__track
 *     - .progress-meter__fill
 * Data Contract:
 * - `value` (int|float, optional): percentage value. Default: `0`.
 * - `label` (string, optional): visible label. Default: `Progress`.
 * - `tone` (string, optional): `positive`, `warning`, `negative`, `neutral`. Default: `neutral`.
 * - `class_name` (string, optional): extra root classes.
 */

$value      = isset($value) && is_numeric($value) ? (float) $value : 0.0;
$label      = isset($label) ? trim((string) $label) : 'Kemajuan';
$tone       = isset($tone) ? trim((string) $tone) : 'neutral';
$class_name = isset($class_name) ? trim((string) $class_name) : '';

$value = max(0.0, min(100.0, $value));

$tone_map = [
  'positive' => 'bg-positive-600',
  'warning'  => 'bg-attention-600',
  'negative' => 'bg-negative-600',
  'neutral'  => 'bg-brand-700',
];

if (!array_key_exists($tone, $tone_map)) {
  $tone = 'neutral';
}

$display_value = (string) (int) round($value);
$root_classes  = trim(implode(' ', array_filter([
  'progress-meter',
  $class_name,
])));
?>
<div class="<?= e($root_classes); ?>">
  <div class="progress-meter__meta mb-2 flex items-center justify-between gap-3 text-xs font-medium text-brand-600">
    <span><?= e($label); ?></span>
    <span><?= e($display_value); ?>%</span>
  </div>
  <div class="progress-meter__track h-2 overflow-hidden rounded-full bg-brand-200">
    <span
      class="progress-meter__fill block h-full rounded-full <?= e($tone_map[$tone]); ?>"
      style="width: <?= e($display_value); ?>%;"
    ></span>
  </div>
</div>
