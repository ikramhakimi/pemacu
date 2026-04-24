<?php
declare(strict_types=1);

/**
 * Component: empty-state
 * Purpose: Render one API-driven empty-state block with icon, message, and optional actions.
 * Anatomy:
 * - .empty-state
 *   - .empty-state__icon
 *   - .empty-state__title
 *   - .empty-state__description
 *   - .empty-state__actions
 * Data Contract:
 * - `title` (string, optional): headline text. Default: `No data found`.
 * - `description` (string, optional): support copy.
 * - `icon_name` (string, optional): icon name. Default: `inbox-line`.
 * - `tone` (string, optional): `neutral`, `info`, `positive`, `warning`, `negative`. Default: `neutral`.
 * - `primary_action` (array, optional): button/link action (`label`, `href`, `type`, `variant`, `size`, `attributes`).
 * - `secondary_action` (array, optional): secondary action with same shape as primary.
 * - `class_name` (string, optional): additional root classes.
 */

$title       = isset($title) ? trim((string) $title) : 'No data found';
$description = isset($description) ? trim((string) $description) : 'Try changing filters or create a new record.';
$icon_name   = isset($icon_name) ? trim((string) $icon_name) : 'inbox-line';
$tone        = isset($tone) ? trim((string) $tone) : 'neutral';
$primary_action   = isset($primary_action) && is_array($primary_action) ? $primary_action : [];
$secondary_action = isset($secondary_action) && is_array($secondary_action) ? $secondary_action : [];
$class_name       = isset($class_name) ? trim((string) $class_name) : '';

$allowed_tones = ['neutral', 'info', 'positive', 'warning', 'negative'];

if (!in_array($tone, $allowed_tones, true)) {
  $tone = 'neutral';
}

$tone_map = [
  'neutral' => ['shell' => 'border-brand-200 bg-white', 'icon' => 'bg-brand-100 text-brand-700'],
  'info' => ['shell' => 'border-primary-200 bg-primary-50', 'icon' => 'bg-primary-100 text-primary-700'],
  'positive' => ['shell' => 'border-positive-200 bg-positive-50', 'icon' => 'bg-positive-100 text-positive-700'],
  'warning' => ['shell' => 'border-attention-200 bg-attention-50', 'icon' => 'bg-attention-100 text-attention-700'],
  'negative' => ['shell' => 'border-negative-200 bg-negative-50', 'icon' => 'bg-negative-100 text-negative-700'],
];

$action_defaults = static function (array $action, string $fallback_variant): array {
  return [
    'label'      => isset($action['label']) ? trim((string) $action['label']) : '',
    'href'       => isset($action['href']) ? trim((string) $action['href']) : '',
    'type'       => isset($action['type']) ? trim((string) $action['type']) : 'button',
    'variant'    => isset($action['variant']) && trim((string) $action['variant']) !== ''
      ? trim((string) $action['variant'])
      : $fallback_variant,
    'size'       => isset($action['size']) && trim((string) $action['size']) !== ''
      ? trim((string) $action['size'])
      : 'sm',
    'attributes' => isset($action['attributes']) && is_array($action['attributes']) ? $action['attributes'] : [],
  ];
};

$primary_config = $action_defaults($primary_action, 'primary');
$secondary_config = $action_defaults($secondary_action, 'secondary');

$empty_state_classes = trim(implode(' ', array_filter([
  'empty-state rounded-lg border p-6 text-center',
  $tone_map[$tone]['shell'],
  $class_name,
])));
?>
<section class="<?= e($empty_state_classes); ?>">
  <span class="empty-state__icon mx-auto inline-flex h-12 w-12 items-center justify-center rounded-full <?= e($tone_map[$tone]['icon']); ?>">
    <?php component('icon', [
      'icon_name'  => $icon_name,
      'icon_size'  => '24',
      'icon_class' => 'text-current',
    ]); ?>
  </span>

  <h3 class="empty-state__title mt-4 text-lg font-semibold text-brand-900"><?= e($title); ?></h3>
  <?php if ($description !== ''): ?>
    <p class="empty-state__description mt-2  text-brand-600"><?= e($description); ?></p>
  <?php endif; ?>

  <?php if ($primary_config['label'] !== '' || $secondary_config['label'] !== ''): ?>
    <div class="empty-state__actions mt-5 inline-flex flex-wrap items-center justify-center gap-2">
      <?php if ($primary_config['label'] !== ''): ?>
        <?php component('button', [
          'label'      => $primary_config['label'],
          'href'       => $primary_config['href'],
          'type'       => $primary_config['type'],
          'variant'    => $primary_config['variant'],
          'size'       => $primary_config['size'],
          'attributes' => $primary_config['attributes'],
        ]); ?>
      <?php endif; ?>
      <?php if ($secondary_config['label'] !== ''): ?>
        <?php component('button', [
          'label'      => $secondary_config['label'],
          'href'       => $secondary_config['href'],
          'type'       => $secondary_config['type'],
          'variant'    => $secondary_config['variant'],
          'size'       => $secondary_config['size'],
          'attributes' => $secondary_config['attributes'],
        ]); ?>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>
