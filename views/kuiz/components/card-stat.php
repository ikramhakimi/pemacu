<?php

declare(strict_types=1);

/**
 * Component: card-stat
 * Purpose: Render one read-only student dashboard summary metric.
 * Anatomy:
 * - .card.card-stat
 *   - .card__content
 *     - .card-stat__icon
 *     - .card-stat__label
 *     - .card-stat__value
 *     - .card-stat__meta
 * Data Contract:
 * - `label` (string, required): metric label.
 * - `value` (string|int|float, required): main metric value.
 * - `meta` (string, optional): supportive text.
 * - `icon_name` (string, optional): Remix icon name.
 * - `tone` (string, optional): `neutral`, `positive`, `warning`, `negative`, `info`.
 * - `class_name` (string, optional): extra root classes.
 */

$label      = isset($label) ? trim((string) $label) : 'Metrik';
$value      = isset($value) ? trim((string) $value) : '0';
$meta       = isset($meta) ? trim((string) $meta) : '';
$icon_name  = isset($icon_name) ? trim((string) $icon_name) : 'bar-chart-box-line';
$tone       = isset($tone) ? trim((string) $tone) : 'neutral';
$class_name = isset($class_name) ? trim((string) $class_name) : '';

$tone_map = [
  'neutral'  => 'bg-brand-100 text-brand-700',
  'positive' => 'bg-positive-100 text-positive-700',
  'warning'  => 'bg-attention-100 text-attention-700',
  'negative' => 'bg-negative-100 text-negative-700',
  'info'     => 'bg-primary-100 text-primary-700',
];

if (!array_key_exists($tone, $tone_map)) {
  $tone = 'neutral';
}

$root_extra_class = trim(implode(' ', array_filter([
  'card-stat bg-white',
  $class_name,
])));
?>
<article class="<?php card($root_extra_class); ?>">
  <div class="card__content p-4">
    <div class="flex items-start justify-between gap-4">
      <div>
        <p class="card-stat__label text-sm font-medium text-brand-600"><?= e($label); ?></p>
        <p class="card-stat__value mt-2 text-2xl font-semibold leading-none text-brand-900"><?= e($value); ?></p>
      </div>
      <span class="card-stat__icon inline-flex size-10 shrink-0 items-center justify-center rounded-lg <?= e($tone_map[$tone]); ?>">
        <?php icon($icon_name, ['icon_size' => '20']); ?>
      </span>
    </div>
    <?php if ($meta !== ''): ?>
      <p class="card-stat__meta mt-4 text-sm text-brand-500"><?= e($meta); ?></p>
    <?php endif; ?>
  </div>
</article>
