<?php
declare(strict_types=1);

/**
 * Component: widget
 * Purpose: Render a compact dashboard metric card with icon, caption, value, badge, and helper info.
 * Anatomy:
 * - .widget.widget--metric
 *   - .widget__icon
 *   - .widget__caption
 *   - .widget__number
 *   - .widget__badge
 *   - .widget__info
 */

$widget_icon_name  = isset($widget_icon_name) ? trim((string) $widget_icon_name) : 'bar-chart-box-line';
$widget_tone       = isset($widget_tone) ? trim((string) $widget_tone) : 'neutral';
$widget_caption    = isset($widget_caption) ? trim((string) $widget_caption) : 'Total Bookings';
$widget_number     = isset($widget_number) ? trim((string) $widget_number) : '0';
$widget_badge      = isset($widget_badge) ? trim((string) $widget_badge) : '';
$widget_badge_tone = isset($widget_badge_tone) ? trim((string) $widget_badge_tone) : '';
$widget_info       = isset($widget_info) ? trim((string) $widget_info) : '';
$widget_class_name = isset($widget_class_name) ? trim((string) $widget_class_name) : '';

$allowed_widget_tones = ['positive', 'negative', 'neutral', 'warning', 'attention', 'info', 'accent'];
$allowed_badge_tones = ['positive', 'negative', 'neutral', 'warning', 'attention', 'info', 'accent'];

if (!in_array($widget_tone, $allowed_widget_tones, true)) {
  $widget_tone = 'neutral';
}

$badge_tone_map = [
  'positive'  => 'positive',
  'negative'  => 'negative',
  'neutral'   => 'neutral',
  'warning'   => 'warning',
  'attention' => 'attention',
  'info'      => 'info',
  'accent'    => 'accent',
];

if ($widget_badge_tone === '') {
  $widget_badge_tone = $badge_tone_map[$widget_tone];
}

if (!in_array($widget_badge_tone, $allowed_badge_tones, true)) {
  $widget_badge_tone = 'neutral';
}

$widget_classes = trim(implode(' ', array_filter([
  'widget widget--metric bg-brand-800',
  $widget_class_name,
])));
?>
<article class="<?php card($widget_classes); ?> overflow-hidden">
  <span class="widget__icon float-right flex items-center justify-center text-brand-400 -mr-1 
    relative  size-[50px] rounded-full border-2 border-brand-500
    before:absolute before:rounded-full before:border-2 
    after:absolute after:rounded-full after:border-2 
    
    before:size-[70px] after:size-[90px] 
    before:border-brand-600 after:border-brand-700
  ">
    <?php component('icon', [
      'icon_name'  => $widget_icon_name,
      'icon_size'  => '24',
      'icon_class' => 'text-current',
    ]); ?>
  </span>
  <div class="widget__caption text-xs font-medium uppercase text-white p-4">
    <?= e($widget_caption); ?>
  </div>
  <div class="widget__content bg-white m-1 mt-0 p-3 rounded-md relative">
    <div class="widget__number text-2xl font-semibold text-brand-900">
      <?= e($widget_number); ?>
    </div>
    <?php if ($widget_badge !== '' || $widget_info !== ''): ?>
      <div class="mt-4 flex items-center justify-start gap-2">
        <?php if ($widget_badge !== ''): ?>
          <?php component('badge', [
            'items' => [[
              'label'      => $widget_badge,
              'tone'       => $widget_badge_tone,
              'class_name' => 'widget__badge',
            ]],
            'show_wrapper' => false,
          ]); ?>
        <?php endif; ?>

        <?php if ($widget_info !== ''): ?>
          <p class="widget__info text-brand-500">
            <?= e($widget_info); ?>
          </p>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
</article>
