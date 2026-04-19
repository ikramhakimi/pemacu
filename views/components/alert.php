<?php
declare(strict_types=1);

/**
 * Component: alert
 * Purpose: Render one API-driven alert message with semantic tone, optional actions, and dismiss support.
 * Anatomy:
 * - .alert
 *   - .alert__icon
 *   - .alert__content
 *     - .alert__title
 *     - .alert__description
 *     - .alert__actions
 *   - .alert__dismiss (optional)
 * Data Contract:
 * - `title` (string, optional): alert headline. Default: `Alert title`.
 * - `description` (string, optional): supportive message body.
 * - `tone` (string, optional): `positive`, `negative`, `neutral`, `warning`, `info`. Default: `neutral`.
 * - `dismissible` (bool, optional): render dismiss button. Default: false.
 * - `actions` (array, optional): list of button configs (`label`, `href`, `type`, `variant`, `gradient`, `attributes`).
 * - `icon_name` (string, optional): custom icon override.
 * - `show_icon` (bool, optional): show leading icon. Default: true.
 * - `class_name` (string, optional): extra root classes.
 * - `attributes` (array, optional): extra root HTML attributes.
 * - Supported tones: `positive`, `negative`, `neutral`, `warning`, `info`.
 */

$title       = isset($title) ? trim((string) $title) : 'Alert title';
$description = isset($description) ? trim((string) $description) : 'Alert description.';
$tone        = isset($tone) ? trim((string) $tone) : 'neutral';
$dismissible = isset($dismissible) ? (bool) $dismissible : false;
$actions     = isset($actions) && is_array($actions) ? array_values($actions) : [];
$icon_name   = isset($icon_name) ? trim((string) $icon_name) : '';
$show_icon   = isset($show_icon) ? (bool) $show_icon : true;
$class_name  = isset($class_name) ? trim((string) $class_name) : '';
$attributes  = isset($attributes) && is_array($attributes) ? $attributes : [];

$tone_map = [
  'positive' => [
    'alert'     => 'border-positive-200 bg-positive-100 text-positive-900',
    'icon'      => 'text-positive-700',
    'title'     => 'text-positive-900',
    'copy'      => 'text-positive-800',
    'icon_name' => 'checkbox-circle-line',
  ],
  'negative' => [
    'alert'     => 'border-negative-200 bg-negative-100 text-negative-900',
    'icon'      => 'text-negative-700',
    'title'     => 'text-negative-900',
    'copy'      => 'text-negative-800',
    'icon_name' => 'close-circle-line',
  ],
  'neutral' => [
    'alert'     => 'border-brand-200 bg-brand-100 text-brand-900',
    'icon'      => 'text-brand-700',
    'title'     => 'text-brand-900',
    'copy'      => 'text-brand-700',
    'icon_name' => 'information-line',
  ],
  'warning' => [
    'alert'     => 'border-attention-200 bg-attention-100 text-attention-900',
    'icon'      => 'text-attention-700',
    'title'     => 'text-attention-900',
    'copy'      => 'text-attention-800',
    'icon_name' => 'alert-line',
  ],
  'info' => [
    'alert'     => 'border-primary-200 bg-primary-100 text-primary-900',
    'icon'      => 'text-primary-700',
    'title'     => 'text-primary-900',
    'copy'      => 'text-primary-800',
    'icon_name' => 'information-line',
  ],
];

$tone_to_button_variant = [
  'positive' => 'positive',
  'negative' => 'negative',
  'neutral'  => 'secondary',
  'warning'  => 'negative',
  'info'     => 'primary',
];

if (!array_key_exists($tone, $tone_map)) {
  $tone = 'neutral';
}

if ($title === '' && $description === '') {
  return;
}

$tone_data = $tone_map[$tone];

if ($icon_name === '') {
  $icon_name = $tone_data['icon_name'];
}

$alert_classes = implode(' ', array_filter([
  'alert inline-flex w-full items-start gap-3 rounded-lg border px-4 py-3',
  $tone_data['alert'],
  $class_name,
]));

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value)) {
      if ($value) {
        $compiled[] = $key;
      }
      continue;
    }

    if ($value === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$root_attributes                 = $attributes;
$root_attributes['class']        = $alert_classes;
$root_attributes['data-alert']   = true;
$root_attributes['data-alert-js'] = true;
?>
<article<?= $render_attributes($root_attributes); ?>>
  <?php if ($show_icon): ?>
    <div class="alert__icon shrink-0 leading-[0] <?= e($tone_data['icon']); ?>">
      <?php icon($icon_name, ['icon_size' => '20']); ?>
    </div>
  <?php endif; ?>

  <div class="alert__content min-w-0 flex-1 space-y-1">
    <?php if ($title !== ''): ?>
      <p class="alert__title text-sm font-semibold <?= e($tone_data['title']); ?>">
        <?= e($title); ?>
      </p>
    <?php endif; ?>

    <?php if ($description !== ''): ?>
      <p class="alert__description text-sm <?= e($tone_data['copy']); ?>">
        <?= e($description); ?>
      </p>
    <?php endif; ?>

    <?php if ($actions !== []): ?>
      <div class="alert__actions mt-2 inline-flex flex-wrap items-center gap-2">
        <?php foreach ($actions as $action): ?>
          <?php
          $action_label = is_array($action) && isset($action['label']) ? trim((string) $action['label']) : '';
          $action_href  = is_array($action) && isset($action['href']) ? trim((string) $action['href']) : '';
          $action_type  = is_array($action) && isset($action['type']) ? trim((string) $action['type']) : 'button';
          $action_gradient = is_array($action) && isset($action['gradient']) ? (bool) $action['gradient'] : false;
          $action_attrs = is_array($action) && isset($action['attributes']) && is_array($action['attributes'])
            ? $action['attributes']
            : [];
          $action_variant = is_array($action) && isset($action['variant']) && trim((string) $action['variant']) !== ''
            ? trim((string) $action['variant'])
            : $tone_to_button_variant[$tone];
          ?>
          <?php if ($action_label === ''): ?>
            <?php continue; ?>
          <?php endif; ?>
          <?php component('button', [
            'label'      => $action_label,
            'href'       => $action_href,
            'type'       => $action_type,
            'variant'    => $action_variant,
            'size'       => 'sm',
            'gradient'   => $action_gradient,
            'attributes' => $action_attrs,
          ]); ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if ($dismissible): ?>
    <button
      class="alert__dismiss inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-md text-current/80 hover:bg-white/50 hover:text-current"
      type="button"
      aria-label="Dismiss alert"
      data-alert-dismiss
    >
      <?php icon('close-line', ['icon_size' => '16']); ?>
    </button>
  <?php endif; ?>
</article>
