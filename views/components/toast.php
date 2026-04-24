<?php
declare(strict_types=1);

/**
 * Component: toast
 * Purpose: Render one API-driven toast notification with semantic tone, optional action, and dismiss affordance.
 * Anatomy:
 * - .toast
 *   - .toast__icon
 *   - .toast__content
 *     - .toast__title
 *     - .toast__message
 *   - .toast__action (optional)
 *   - .toast__dismiss (optional)
 * Data Contract:
 * - `title` (string, optional): toast heading. Default: `Saved`.
 * - `message` (string, optional): supporting text.
 * - `tone` (string, optional): `neutral`, `info`, `positive`, `warning`, `negative`. Default: `neutral`.
 * - `icon_name` (string, optional): custom icon override.
 * - `action` (array, optional): action config (`label`, `href`, `type`, `variant`, `size`, `attributes`).
 * - `dismissible` (bool, optional): show dismiss button. Default: true.
 * - `class_name` (string, optional): additional root classes.
 */

$title       = isset($title) ? trim((string) $title) : 'Saved';
$message     = isset($message) ? trim((string) $message) : 'Your changes have been updated.';
$tone        = isset($tone) ? trim((string) $tone) : 'neutral';
$icon_name   = isset($icon_name) ? trim((string) $icon_name) : '';
$action      = isset($action) && is_array($action) ? $action : [];
$dismissible = !isset($dismissible) || (bool) $dismissible;
$class_name  = isset($class_name) ? trim((string) $class_name) : '';

$tone_map = [
  'neutral' => [
    'shell'     => 'border-brand-200 bg-white text-brand-900',
    'icon'      => 'text-brand-700',
    'icon_name' => 'information-line',
    'button'    => 'secondary',
    'role'      => 'status',
  ],
  'info' => [
    'shell'     => 'border-primary-200 bg-primary-50 text-primary-900',
    'icon'      => 'text-primary-700',
    'icon_name' => 'information-line',
    'button'    => 'primary',
    'role'      => 'status',
  ],
  'positive' => [
    'shell'     => 'border-positive-200 bg-positive-50 text-positive-900',
    'icon'      => 'text-positive-700',
    'icon_name' => 'checkbox-circle-line',
    'button'    => 'positive',
    'role'      => 'status',
  ],
  'warning' => [
    'shell'     => 'border-attention-200 bg-attention-50 text-attention-900',
    'icon'      => 'text-attention-700',
    'icon_name' => 'alert-line',
    'button'    => 'negative',
    'role'      => 'alert',
  ],
  'negative' => [
    'shell'     => 'border-negative-200 bg-negative-50 text-negative-900',
    'icon'      => 'text-negative-700',
    'icon_name' => 'close-circle-line',
    'button'    => 'negative',
    'role'      => 'alert',
  ],
];

if (!isset($tone_map[$tone])) {
  $tone = 'neutral';
}

if ($icon_name === '') {
  $icon_name = $tone_map[$tone]['icon_name'];
}

$action_config = [
  'label'      => isset($action['label']) ? trim((string) $action['label']) : '',
  'href'       => isset($action['href']) ? trim((string) $action['href']) : '',
  'type'       => isset($action['type']) ? trim((string) $action['type']) : 'button',
  'variant'    => isset($action['variant']) && trim((string) $action['variant']) !== ''
    ? trim((string) $action['variant'])
    : $tone_map[$tone]['button'],
  'size'       => isset($action['size']) && trim((string) $action['size']) !== ''
    ? trim((string) $action['size'])
    : 'sm',
  'attributes' => isset($action['attributes']) && is_array($action['attributes']) ? $action['attributes'] : [],
];

$toast_classes = trim(implode(' ', array_filter([
  'toast inline-flex w-full max-w-md items-start gap-3 rounded-lg border px-4 py-3 shadow-sm',
  $tone_map[$tone]['shell'],
  $class_name,
])));
?>
<aside class="<?= e($toast_classes); ?>" role="<?= e($tone_map[$tone]['role']); ?>" aria-live="polite" data-toast>
  <span class="toast__icon mt-0.5 inline-flex shrink-0 <?= e($tone_map[$tone]['icon']); ?>">
    <?php component('icon', [
      'icon_name'  => $icon_name,
      'icon_size'  => '18',
      'icon_class' => 'text-current',
    ]); ?>
  </span>

  <div class="toast__content min-w-0 flex-1">
    <p class="toast__title  font-semibold"><?= e($title); ?></p>
    <?php if ($message !== ''): ?>
      <p class="toast__message mt-1  opacity-90"><?= e($message); ?></p>
    <?php endif; ?>
  </div>

  <?php if ($action_config['label'] !== ''): ?>
    <div class="toast__action shrink-0">
      <?php component('button', [
        'label'      => $action_config['label'],
        'href'       => $action_config['href'],
        'type'       => $action_config['type'],
        'variant'    => $action_config['variant'],
        'size'       => $action_config['size'],
        'attributes' => $action_config['attributes'],
      ]); ?>
    </div>
  <?php endif; ?>

  <?php if ($dismissible): ?>
    <button
      class="toast__dismiss inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-md text-current/70 transition hover:bg-white/50 hover:text-current focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-500"
      type="button"
      aria-label="Dismiss notification"
      data-toast-dismiss
    >
      <?php component('icon', [
        'icon_name'  => 'close-line',
        'icon_size'  => '16',
        'icon_class' => 'text-current',
      ]); ?>
    </button>
  <?php endif; ?>
</aside>
