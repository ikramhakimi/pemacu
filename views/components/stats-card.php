<?php
declare(strict_types=1);

/**
 * Component: stats-card
 * Purpose: Render one API-driven KPI card with label, value, trend badge, and helper meta.
 * Anatomy:
 * - .stats-card
 *   - .stats-card__icon
 *   - .stats-card__label
 *   - .stats-card__value
 *   - .stats-card__meta
 *     - .stats-card__trend
 *     - .stats-card__helper
 * Data Contract:
 * - `label` (string, optional): metric label. Default: `Metric`.
 * - `value` (string, optional): metric value. Default: `0`.
 * - `icon_name` (string, optional): icon name. Default: `bar-chart-box-line`.
 * - `tone` (string, optional): `neutral`, `info`, `positive`, `warning`, `negative`. Default: `neutral`.
 * - `trend_text` (string, optional): trend chip text.
 * - `trend_tone` (string, optional): `neutral`, `info`, `positive`, `warning`, `negative`.
 * - `helper_text` (string, optional): supporting context text.
 * - `class_name` (string, optional): additional root classes.
 */

$label      = isset($label) ? trim((string) $label) : 'Metric';
$value      = isset($value) ? trim((string) $value) : '0';
$icon_name  = isset($icon_name) ? trim((string) $icon_name) : 'bar-chart-box-line';
$tone       = isset($tone) ? trim((string) $tone) : 'neutral';
$trend_text = isset($trend_text) ? trim((string) $trend_text) : '';
$trend_tone = isset($trend_tone) ? trim((string) $trend_tone) : '';
$helper_text = isset($helper_text) ? trim((string) $helper_text) : '';
$class_name  = isset($class_name) ? trim((string) $class_name) : '';

$allowed_tones = ['neutral', 'info', 'positive', 'warning', 'negative'];

if (!in_array($tone, $allowed_tones, true)) {
  $tone = 'neutral';
}

if ($trend_tone === '') {
  $trend_tone = $tone;
}

if (!in_array($trend_tone, $allowed_tones, true)) {
  $trend_tone = 'neutral';
}

$tone_map = [
  'neutral' => [
    'card' => 'bg-brand-50 border-brand-200',
    'icon' => 'bg-brand-100 text-brand-700',
  ],
  'info' => [
    'card' => 'bg-primary-50 border-primary-200',
    'icon' => 'bg-primary-100 text-primary-700',
  ],
  'positive' => [
    'card' => 'bg-positive-50 border-positive-200',
    'icon' => 'bg-positive-100 text-positive-700',
  ],
  'warning' => [
    'card' => 'bg-attention-50 border-attention-200',
    'icon' => 'bg-attention-100 text-attention-700',
  ],
  'negative' => [
    'card' => 'bg-negative-50 border-negative-200',
    'icon' => 'bg-negative-100 text-negative-700',
  ],
];

$trend_badge_tone = [
  'neutral'  => 'neutral',
  'info'     => 'info',
  'positive' => 'positive',
  'warning'  => 'warning',
  'negative' => 'negative',
];

$stats_card_classes = trim(implode(' ', array_filter([
  'stats-card rounded-lg border p-5',
  $tone_map[$tone]['card'],
  $class_name,
])));
?>
<article class="<?= e($stats_card_classes); ?>">
  <div class="flex items-start justify-between gap-4">
    <p class="stats-card__label text-xs font-semibold uppercase tracking-wide text-brand-600">
      <?= e($label); ?>
    </p>
    <span class="stats-card__icon inline-flex h-10 w-10 items-center justify-center rounded-full <?= e($tone_map[$tone]['icon']); ?>">
      <?php component('icon', [
        'icon_name'  => $icon_name,
        'icon_size'  => '20',
        'icon_class' => 'text-current',
      ]); ?>
    </span>
  </div>

  <p class="stats-card__value mt-3 text-3xl font-semibold leading-none text-brand-900">
    <?= e($value); ?>
  </p>

  <?php if ($trend_text !== '' || $helper_text !== ''): ?>
    <div class="stats-card__meta mt-4 flex flex-wrap items-center gap-2">
      <?php if ($trend_text !== ''): ?>
        <?php component('badge', [
          'items' => [[
            'label'      => $trend_text,
            'tone'       => $trend_badge_tone[$trend_tone],
            'class_name' => 'stats-card__trend',
          ]],
        ]); ?>
      <?php endif; ?>
      <?php if ($helper_text !== ''): ?>
        <p class="stats-card__helper  text-brand-600"><?= e($helper_text); ?></p>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</article>
