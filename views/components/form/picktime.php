<?php
declare(strict_types=1);

/**
 * Component: picktime
 * Purpose: Render an Airbnb-style time picker with single and range selection for 12-hour and 24-hour formats.
 * Anatomy:
 * - .picktime[data-picktime][data-picktime-mode][data-picktime-format]
 *   - button[data-picktime-trigger]
 *   - input[data-picktime-display]
 *   - .picktime__panel[data-picktime-panel]
 *     - single mode: hour/minute/period selectors
 *     - range mode: start/end time selectors
 *     - action controls
 * Data Contract:
 * - id, mode, format, name, value, name_start, name_end, start_value, end_value
 * - placeholder, minute_step, class, disabled, required
 */

$id          = isset($id) ? (string) $id : 'picktime-' . substr(md5((string) mt_rand()), 0, 8);
$mode        = isset($mode) ? (string) $mode : 'single';
$format      = isset($format) ? (string) $format : '12h';
$name        = isset($name) ? (string) $name : '';
$value       = isset($value) ? (string) $value : '';
$name_start  = isset($name_start) ? (string) $name_start : '';
$name_end    = isset($name_end) ? (string) $name_end : '';
$start_value = isset($start_value) ? (string) $start_value : '';
$end_value   = isset($end_value) ? (string) $end_value : '';
$placeholder = isset($placeholder) ? (string) $placeholder : 'Select time';
$minute_step = isset($minute_step) ? (int) $minute_step : 15;
$class       = isset($class) ? trim((string) $class) : '';
$disabled    = !empty($disabled);
$required    = !empty($required);

if ($mode !== 'range') {
  $mode = 'single';
}

if ($format !== '24h') {
  $format = '12h';
}

if (!in_array($minute_step, [1, 5, 10, 15, 30], true)) {
  $minute_step = 15;
}

if ($mode === 'range') {
  if ($name_start === '' && $name !== '') {
    $name_start = $name . '_start';
  }

  if ($name_end === '' && $name !== '') {
    $name_end = $name . '_end';
  }

  if ($placeholder === 'Select time') {
    $placeholder = 'Select start and end time';
  }
}

$trigger_classes = trim(implode(' ', array_filter([
  'picktime__trigger group relative flex h-[var(--ui-h-md)] w-full items-center justify-between rounded-md bg-white px-[var(--ui-px-md)] text-sm text-brand-900 ring-1 ring-brand-300 ring-inset transition focus:outline-none focus:ring-2 focus:ring-brand-500',
  $disabled ? 'cursor-not-allowed bg-brand-100 text-brand-400 ring-brand-200' : 'hover:ring-brand-400',
])));

$display_classes = trim(implode(' ', array_filter([
  'picktime__display pointer-events-none w-full border-0 bg-transparent p-0 text-left text-sm focus:outline-none',
  $disabled ? 'text-brand-400' : 'text-brand-800 placeholder:text-brand-400',
])));

$select_classes = 'h-[var(--ui-h-md)] w-full rounded-md border border-brand-300 bg-white px-[var(--ui-px-sm)] text-sm text-brand-900 focus:outline-none focus:ring-2 focus:ring-brand-500';
$panel_classes  = 'picktime__panel absolute z-30 mt-2 w-full min-w-[18rem] rounded-xl border border-brand-200 bg-white p-4 shadow-xl';
$root_classes   = trim(implode(' ', array_filter(['picktime relative', $class])));
$grid_classes   = $format === '24h'
  ? 'picktime__grid grid gap-3 sm:grid-cols-2'
  : 'picktime__grid grid gap-3 sm:grid-cols-3';

$trigger_id = $id . '-trigger';
$panel_id   = $id . '-panel';
?>
<div
  class="<?= e($root_classes); ?>"
  data-picktime
  data-picktime-mode="<?= e($mode); ?>"
  data-picktime-format="<?= e($format); ?>"
  data-picktime-minute-step="<?= e((string) $minute_step); ?>"
>
  <button
    id="<?= e($trigger_id); ?>"
    type="button"
    class="<?= e($trigger_classes); ?>"
    data-picktime-trigger
    aria-haspopup="dialog"
    aria-expanded="false"
    aria-controls="<?= e($panel_id); ?>"
    <?= $disabled ? 'disabled' : ''; ?>
  >
    <input
      type="text"
      class="<?= e($display_classes); ?>"
      data-picktime-display
      placeholder="<?= e($placeholder); ?>"
      readonly
      tabindex="-1"
      <?= $required ? 'required' : ''; ?>
      <?= $disabled ? 'disabled' : ''; ?>
    >
    <span class="picktime__trigger-icon ml-3 inline-flex items-center text-brand-500">
      <?php icon('time-line', ['icon_size' => '20']); ?>
    </span>
  </button>

  <div
    id="<?= e($panel_id); ?>"
    class="<?= e($panel_classes); ?> hidden"
    data-picktime-panel
    role="dialog"
    aria-modal="false"
    aria-labelledby="<?= e($trigger_id); ?>"
  >
    <div class="picktime__header mb-3">
      <p class="text-sm font-semibold text-brand-900">Choose time</p>
      <p class="mt-1 text-xs text-brand-500" data-picktime-caption></p>
    </div>

    <?php if ($mode === 'range'): ?>
      <div class="picktime__range-grid grid gap-3 sm:grid-cols-2">
        <label class="space-y-1">
          <span class="text-xs font-medium uppercase tracking-[0.08em] text-brand-500">Start</span>
          <select class="<?= e($select_classes); ?>" data-picktime-range-start></select>
        </label>

        <label class="space-y-1">
          <span class="text-xs font-medium uppercase tracking-[0.08em] text-brand-500">End</span>
          <select class="<?= e($select_classes); ?>" data-picktime-range-end></select>
        </label>
      </div>
    <?php else: ?>
      <div class="<?= e($grid_classes); ?>">
        <label class="space-y-1">
          <span class="text-xs font-medium uppercase tracking-[0.08em] text-brand-500">Hour</span>
          <select class="<?= e($select_classes); ?>" data-picktime-hour></select>
        </label>

        <label class="space-y-1">
          <span class="text-xs font-medium uppercase tracking-[0.08em] text-brand-500">Minute</span>
          <select class="<?= e($select_classes); ?>" data-picktime-minute></select>
        </label>

        <?php if ($format === '12h'): ?>
          <label class="space-y-1" data-picktime-period-wrap>
            <span class="text-xs font-medium uppercase tracking-[0.08em] text-brand-500">Period</span>
            <select class="<?= e($select_classes); ?>" data-picktime-period>
              <option value="AM">AM</option>
              <option value="PM">PM</option>
            </select>
          </label>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <div class="picktime__footer mt-4 flex items-center justify-between gap-3 border-t border-brand-200 pt-3">
      <button
        type="button"
        class="inline-flex h-8 items-center rounded-md px-3 text-xs font-medium text-brand-600 transition hover:bg-brand-100 hover:text-brand-900"
        data-picktime-clear
      >
        Clear
      </button>
      <button
        type="button"
        class="inline-flex h-8 items-center rounded-md bg-brand-900 px-3 text-xs font-medium text-white transition hover:bg-brand-800"
        data-picktime-apply
      >
        Apply
      </button>
    </div>
  </div>

  <?php if ($mode === 'range'): ?>
    <input
      type="hidden"
      data-picktime-start-value
      value="<?= e($start_value); ?>"
      <?= $name_start !== '' ? 'name="' . e($name_start) . '"' : ''; ?>
    >
    <input
      type="hidden"
      data-picktime-end-value
      value="<?= e($end_value); ?>"
      <?= $name_end !== '' ? 'name="' . e($name_end) . '"' : ''; ?>
    >
  <?php else: ?>
    <input
      type="hidden"
      data-picktime-value
      value="<?= e($value); ?>"
      <?= $name !== '' ? 'name="' . e($name) . '"' : ''; ?>
    >
  <?php endif; ?>
</div>
