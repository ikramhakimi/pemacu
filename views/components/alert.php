<?php
declare(strict_types=1);

/**
 * Component: alert
 * Purpose: Render data-driven alert messages with semantic tones and optional dismiss action.
 * Anatomy:
 * - .alert
 *   - .alert__icon (SVG wrapper, line-height: 0)
 *   - .alert__content
 *     - .alert__title
 *     - .alert__description
 *     - .alert__actions
 *   - .alert__dismiss
 * Data Contract:
 * - `items` (array, optional): list of alerts.
 *   - each item supports `title`, `description`, `tone`, `dismissible`, `actions`, `icon_name`, `class_name`.
 * - Single alert fallback via `title`, `description`, `tone`, `dismissible`, `actions`, `icon_name`, `class_name`.
 * - Supported tones: `positive`, `negative`, `neutral`, `warning`, `info`.
 */

$items = isset($items) && is_array($items)
  ? array_values($items)
  : [];

$title       = isset($title) ? trim((string) $title) : 'Alert title';
$description = isset($description) ? trim((string) $description) : 'Alert description.';
$tone        = isset($tone) ? trim((string) $tone) : 'neutral';
$dismissible = isset($dismissible) ? (bool) $dismissible : false;
$actions     = isset($actions) && is_array($actions) ? array_values($actions) : [];
$icon_name   = isset($icon_name) ? trim((string) $icon_name) : '';
$class_name  = isset($class_name) ? trim((string) $class_name) : '';

if ($items === []) {
  $items = [
    [
      'title'       => $title,
      'description' => $description,
      'tone'        => $tone,
      'dismissible' => $dismissible,
      'actions'     => $actions,
      'icon_name'   => $icon_name,
      'class_name'  => $class_name,
    ],
  ];
}

$tone_map = [
  'positive' => [
    'alert' => 'border-positive-200 bg-positive-100 text-positive-900',
    'icon'  => 'text-positive-700',
    'title' => 'text-positive-900',
    'copy'  => 'text-positive-800',
    'icon_name' => 'checkbox-circle-line',
  ],
  'negative' => [
    'alert' => 'border-negative-200 bg-negative-100 text-negative-900',
    'icon'  => 'text-negative-700',
    'title' => 'text-negative-900',
    'copy'  => 'text-negative-800',
    'icon_name' => 'close-circle-line',
  ],
  'neutral' => [
    'alert' => 'border-brand-200 bg-brand-100 text-brand-900',
    'icon'  => 'text-brand-700',
    'title' => 'text-brand-900',
    'copy'  => 'text-brand-700',
    'icon_name' => 'information-line',
  ],
  'warning' => [
    'alert' => 'border-attention-200 bg-attention-100 text-attention-900',
    'icon'  => 'text-attention-700',
    'title' => 'text-attention-900',
    'copy'  => 'text-attention-800',
    'icon_name' => 'alert-line',
  ],
  'info' => [
    'alert' => 'border-primary-200 bg-primary-100 text-primary-900',
    'icon'  => 'text-primary-700',
    'title' => 'text-primary-900',
    'copy'  => 'text-primary-800',
    'icon_name' => 'information-line',
  ],
];
?>
<div class="space-y-3">
  <?php foreach ($items as $item): ?>
    <?php
    $item_title       = isset($item['title']) ? trim((string) $item['title']) : '';
    $item_description = isset($item['description']) ? trim((string) $item['description']) : '';
    $item_tone        = isset($item['tone']) ? trim((string) $item['tone']) : 'neutral';
    $item_dismissible = !empty($item['dismissible']);
    $item_actions     = isset($item['actions']) && is_array($item['actions']) ? array_values($item['actions']) : [];
    $item_icon_name   = isset($item['icon_name']) ? trim((string) $item['icon_name']) : '';
    $item_class_name  = isset($item['class_name']) ? trim((string) $item['class_name']) : '';

    if ($item_title === '' && $item_description === '') {
      continue;
    }

    if (!array_key_exists($item_tone, $tone_map)) {
      $item_tone = 'neutral';
    }

    $tone_data = $tone_map[$item_tone];

    if ($item_icon_name === '') {
      $item_icon_name = $tone_data['icon_name'];
    }

    $alert_classes = implode(' ', array_filter([
      'alert inline-flex w-full items-start gap-3 rounded-lg border px-4 py-3',
      $tone_data['alert'],
      $item_class_name,
    ]));
    ?>
    <article class="<?= e($alert_classes); ?>" data-alert data-alert-js>
      <div class="alert__icon shrink-0 leading-[0] <?= e($tone_data['icon']); ?>">
        <?php icon($item_icon_name, ['icon_size' => '20']); ?>
      </div>
      <div class="alert__content min-w-0 flex-1 space-y-1">
        <?php if ($item_title !== ''): ?>
          <p class="alert__title text-sm font-semibold <?= e($tone_data['title']); ?>">
            <?= e($item_title); ?>
          </p>
        <?php endif; ?>
        <?php if ($item_description !== ''): ?>
          <p class="alert__description text-sm <?= e($tone_data['copy']); ?>">
            <?= e($item_description); ?>
          </p>
        <?php endif; ?>
        <?php if ($item_actions !== []): ?>
          <div class="alert__actions mt-2 inline-flex flex-wrap items-center gap-2">
            <?php foreach ($item_actions as $action): ?>
              <?php
              $action_label = is_array($action) && isset($action['label']) ? trim((string) $action['label']) : '';
              $action_href  = is_array($action) && isset($action['href']) ? trim((string) $action['href']) : '';
              $action_type    = is_array($action) && isset($action['type']) ? trim((string) $action['type']) : 'button';
              $action_attrs   = is_array($action) && isset($action['attributes']) && is_array($action['attributes'])
                ? $action['attributes']
                : [];
              $tone_to_button_variant = [
                'positive' => 'positive',
                'negative' => 'negative',
                'neutral'  => 'secondary',
                'warning'  => 'negative',
                'info'     => 'primary',
              ];
              $action_variant = is_array($action) && isset($action['variant']) && trim((string) $action['variant']) !== ''
                ? trim((string) $action['variant'])
                : $tone_to_button_variant[$item_tone];
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
                'attributes' => $action_attrs,
              ]); ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
      <?php if ($item_dismissible): ?>
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
  <?php endforeach; ?>
</div>
