<?php
declare(strict_types=1);

/**
 * Component: progressbar
 * Purpose: Render an API-driven linear progress indicator with accessible semantics and tone/size variants.
 * Anatomy:
 * - .progressbar
 *   - .progressbar__meta (optional)
 *     - .progressbar__label
 *     - .progressbar__value
 *   - .progressbar__track[role=progressbar]
 *     - .progressbar__fill
 * Data Contract:
 * - `value` (int|float, optional): current progress value. Default: `0`.
 * - `min` (int|float, optional): minimum range value. Default: `0`.
 * - `max` (int|float, optional): maximum range value. Default: `100`.
 * - `label` (string, optional): accessible label and optional visible label. Default: `Progress`.
 * - `tone` (string, optional): `neutral`, `info`, `positive`, `warning`, `negative`. Default: `info`.
 * - `size` (string, optional): `sm`, `md`, `lg`. Default: `md`.
 * - `show_meta` (bool, optional): render label/value row above the track. Default: `false`.
 * - `value_mode` (string, optional): `percent` or `value` display mode for meta row. Default: `percent`.
 * - `decimals` (int, optional): decimal precision for displayed values. Default: `0`.
 * - `class_name` (string, optional): additional classes for root wrapper.
 * - `track_class_name` (string, optional): additional classes for progress track.
 * - `fill_class_name` (string, optional): additional classes for progress fill.
 * - `aria_valuetext` (string, optional): custom `aria-valuetext`.
 */

$value = isset($value) && is_numeric($value) ? (float) $value : 0.0;
$min   = isset($min) && is_numeric($min) ? (float) $min : 0.0;
$max   = isset($max) && is_numeric($max) ? (float) $max : 100.0;

$label            = isset($label) ? trim((string) $label) : 'Progress';
$tone             = isset($tone) ? trim((string) $tone) : 'info';
$size             = isset($size) ? trim((string) $size) : 'md';
$show_meta        = !empty($show_meta);
$value_mode       = isset($value_mode) ? trim((string) $value_mode) : 'percent';
$decimals         = isset($decimals) && is_numeric($decimals) ? (int) $decimals : 0;
$class_name       = isset($class_name) ? trim((string) $class_name) : '';
$track_class_name = isset($track_class_name) ? trim((string) $track_class_name) : '';
$fill_class_name  = isset($fill_class_name) ? trim((string) $fill_class_name) : '';
$aria_valuetext   = isset($aria_valuetext) ? trim((string) $aria_valuetext) : '';

if ($label === '') {
  $label = 'Progress';
}

if ($max <= $min) {
  $max = $min + 100.0;
}

if ($decimals < 0) {
  $decimals = 0;
}

if ($decimals > 4) {
  $decimals = 4;
}

$allowed_tones = ['neutral', 'info', 'positive', 'warning', 'negative'];
$allowed_sizes = ['sm', 'md', 'lg'];

if (!in_array($tone, $allowed_tones, true)) {
  $tone = 'info';
}

if (!in_array($size, $allowed_sizes, true)) {
  $size = 'md';
}

if ($value_mode !== 'percent' && $value_mode !== 'value') {
  $value_mode = 'percent';
}

$size_map = [
  'sm' => 'h-1.5',
  'md' => 'h-2.5',
  'lg' => 'h-3.5',
];

$tone_map = [
  'neutral'  => ['track' => 'bg-brand-200', 'fill' => 'bg-brand-600'],
  'info'     => ['track' => 'bg-primary-200', 'fill' => 'bg-primary-600'],
  'positive' => ['track' => 'bg-positive-200', 'fill' => 'bg-positive-600'],
  'warning'  => ['track' => 'bg-attention-200', 'fill' => 'bg-attention-600'],
  'negative' => ['track' => 'bg-negative-200', 'fill' => 'bg-negative-600'],
];

$clamped_value = max($min, min($value, $max));
$range         = $max - $min;
$percentage    = $range > 0 ? (($clamped_value - $min) / $range) * 100 : 0.0;

$format_number = static function (float $number, int $precision): string {
  $formatted = number_format($number, $precision, '.', '');

  if ($precision === 0) {
    return $formatted;
  }

  $formatted = rtrim($formatted, '0');
  $formatted = rtrim($formatted, '.');

  return $formatted === '' ? '0' : $formatted;
};

$percentage_display = $format_number($percentage, 2);
$min_display        = $format_number($min, $decimals);
$max_display        = $format_number($max, $decimals);
$value_display      = $format_number($clamped_value, $decimals);

$meta_value = $value_mode === 'value'
  ? $value_display . ' / ' . $max_display
  : $format_number($percentage, $decimals) . '%';

$root_classes = trim(implode(' ', array_filter([
  'progressbar w-full space-y-2',
  $class_name,
])));

$track_classes = trim(implode(' ', array_filter([
  'progressbar__track overflow-hidden rounded-full',
  $size_map[$size],
  $tone_map[$tone]['track'],
  $track_class_name,
])));

$fill_classes = trim(implode(' ', array_filter([
  'progressbar__fill block h-full rounded-full transition-[width] duration-300 ease-out',
  $tone_map[$tone]['fill'],
  $fill_class_name,
])));
?>
<div class="<?= e($root_classes); ?>">
  <?php if ($show_meta): ?>
    <div class="progressbar__meta flex items-center justify-between gap-3 text-xs font-medium text-brand-700">
      <span class="progressbar__label"><?= e($label); ?></span>
      <span class="progressbar__value"><?= e($meta_value); ?></span>
    </div>
  <?php endif; ?>

  <div
    class="<?= e($track_classes); ?>"
    role="progressbar"
    aria-label="<?= e($label); ?>"
    aria-valuemin="<?= e($min_display); ?>"
    aria-valuemax="<?= e($max_display); ?>"
    aria-valuenow="<?= e($value_display); ?>"
    <?php if ($aria_valuetext !== ''): ?>
      aria-valuetext="<?= e($aria_valuetext); ?>"
    <?php endif; ?>
  >
    <span class="<?= e($fill_classes); ?>" style="width: <?= e($percentage_display); ?>%;"></span>
  </div>
</div>
