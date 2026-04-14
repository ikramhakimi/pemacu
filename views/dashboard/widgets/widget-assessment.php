<?php

declare(strict_types=1);

$widget_state          = isset($widget_state) ? trim((string) $widget_state) : 'neutral';
$widget_title          = isset($widget_title) ? trim((string) $widget_title) : 'Assessment Category';
$widget_description    = isset($widget_description) ? trim((string) $widget_description) : '';
$widget_icon_name      = isset($widget_icon_name) ? trim((string) $widget_icon_name) : 'flashlight-line';
$widget_progress_class = isset($widget_progress_class) ? trim((string) $widget_progress_class) : '';
$widget_score          = isset($widget_score) && is_numeric($widget_score) ? (float) $widget_score : 0.0;
$widget_max            = isset($widget_max) && is_numeric($widget_max) ? (float) $widget_max : 0.0;

$allowed_widget_states = ['positive', 'neutral', 'negative'];

if (!in_array($widget_state, $allowed_widget_states, true)) {
  $widget_state = 'neutral';
}

$state_tokens = [
  'positive' => [
    'icon_bg' => 'bg-lime-300',
    'icon_fg' => 'text-lime-900',
    'bar'     => 'bg-lime-400',
  ],
  'neutral' => [
    'icon_bg' => 'bg-indigo-200',
    'icon_fg' => 'text-indigo-900',
    'bar'     => 'bg-indigo-400',
  ],
  'negative' => [
    'icon_bg' => 'bg-red-300',
    'icon_fg' => 'text-red-900',
    'bar'     => 'bg-red-400',
  ],
];

$widget_percentage = $widget_max > 0 ? ($widget_score / $widget_max) * 100 : 0;
$widget_percentage = max(0, min(100, $widget_percentage));

$widget_score_display = fmod($widget_score, 1.0) === 0.0 ? (string) (int) $widget_score : (string) $widget_score;
$widget_max_display = fmod($widget_max, 1.0) === 0.0 ? (string) (int) $widget_max : (string) $widget_max;
?>
<article class="widget widget--assessment state--<?= e($widget_state); ?> overflow-hidden rounded-lg bg-brand-600 ring-1 ring-brand-600">
  <div class="widget__head flex items-stretch gap-4 p-5 bg-white rounded-lg ring-1 ring-brand-600">
    <div class="widget__icon flex items-center justify-center rounded-lg <?= e($state_tokens[$widget_state]['icon_bg']); ?> <?= e($state_tokens[$widget_state]['icon_fg']); ?> px-5 py-2">
      <?php component('icon', [
        'icon_name'  => $widget_icon_name,
        'icon_size'  => '24',
        'icon_class' => 'text-current',
      ]); ?>
    </div>
    <div class="widget__content">
      <h3 class="widget__title text-base font-semibold text-brand-900"><?= e($widget_title); ?></h3>
      <?php if ($widget_description !== ''): ?>
        <p class="widget__description mt-1 text-brand-500"><?= e($widget_description); ?></p>
      <?php endif; ?>
    </div>
  </div>
  <div class="widget__foot flex items-center gap-4 px-5 py-3">
    <div class="widget__score w-16 shrink-0 text-center text-brand-200"><?= e($widget_score_display); ?> / <?= e($widget_max_display); ?></div>
    <div class="widget__progress h-3 w-full rounded-sm bg-brand-900" role="progressbar" aria-label="<?= e($widget_title); ?> score" aria-valuemin="0" aria-valuemax="<?= e($widget_max_display); ?>" aria-valuenow="<?= e($widget_score_display); ?>">
      <span class="widget__progress-bar block h-full rounded-sm <?= e($state_tokens[$widget_state]['bar']); ?> <?= e($widget_progress_class); ?>" style="width: <?= e(number_format($widget_percentage, 2, '.', '')); ?>%;"></span>
    </div>
  </div>
</article>
