<?php
declare(strict_types=1);

/**
 * Component: pickdate
 * Purpose: Render an Airbnb-style date picker with single and range selection modes.
 * Anatomy:
 * - .pickdate[data-pickdate][data-pickdate-mode]
 *   - button[data-pickdate-trigger]
 *   - input[data-pickdate-display]
 *   - .pickdate__panel[data-pickdate-panel]
 *     - navigation controls
 *     - day grid
 *     - action controls
 * Data Contract:
 * - id, mode, name, name_start, name_end, value, start_value, end_value, placeholder, class
 * - disabled, required, min_date, max_date, disable_past, unavailable_dates
 */

$id           = isset($id) ? (string) $id : 'pickdate-' . substr(md5((string) mt_rand()), 0, 8);
$mode         = isset($mode) ? (string) $mode : 'single';
$name         = isset($name) ? (string) $name : '';
$name_start   = isset($name_start) ? (string) $name_start : '';
$name_end     = isset($name_end) ? (string) $name_end : '';
$value        = isset($value) ? (string) $value : '';
$start_value  = isset($start_value) ? (string) $start_value : '';
$end_value    = isset($end_value) ? (string) $end_value : '';
$placeholder  = isset($placeholder) ? (string) $placeholder : 'Select date';
$class        = isset($class) ? trim((string) $class) : '';
$disabled     = !empty($disabled);
$required     = !empty($required);
$min_date     = isset($min_date) ? (string) $min_date : '';
$max_date     = isset($max_date) ? (string) $max_date : '';
$disable_past = array_key_exists('disable_past', get_defined_vars()) ? !empty($disable_past) : true;
$unavailable_dates = isset($unavailable_dates) && is_array($unavailable_dates)
  ? array_values(array_filter(array_map(static function ($value): string {
      return is_string($value) ? trim($value) : '';
    }, $unavailable_dates), static function (string $value): bool {
      return $value !== '';
    }))
  : [];

if ($mode !== 'range') {
  $mode = 'single';
}

if ($mode === 'range') {
  if ($name_start === '' && $name !== '') {
    $name_start = $name . '_start';
  }

  if ($name_end === '' && $name !== '') {
    $name_end = $name . '_end';
  }

  if ($placeholder === 'Select date') {
    $placeholder = 'Select check-in and check-out';
  }
}

$trigger_classes = trim(implode(' ', array_filter([
  'pickdate__trigger group relative flex h-[var(--ui-h-md)] w-full items-center justify-between rounded-md bg-white px-[var(--ui-px-md)] text-sm text-brand-900 ring-1 ring-brand-300 ring-inset transition focus:outline-none focus:ring-2 focus:ring-brand-500',
  $disabled ? 'cursor-not-allowed bg-brand-100 text-brand-400 ring-brand-200' : 'hover:ring-brand-400',
])));

$display_classes = trim(implode(' ', array_filter([
  'pickdate__display pointer-events-none w-full border-0 bg-transparent p-0 text-left text-sm focus:outline-none',
  $disabled ? 'text-brand-400' : 'text-brand-800 placeholder:text-brand-400',
])));

$panel_classes = 'pickdate__panel absolute z-30 mt-2 w-full min-w-[18rem] rounded-xl border border-brand-200 bg-white p-4 shadow-xl';

$root_classes = trim(implode(' ', array_filter([
  'pickdate relative',
  $class,
])));

$trigger_id = $id . '-trigger';
$panel_id   = $id . '-panel';
?>
<div
  class="<?= e($root_classes); ?>"
  data-pickdate
  data-pickdate-mode="<?= e($mode); ?>"
  data-pickdate-min="<?= e($min_date); ?>"
  data-pickdate-max="<?= e($max_date); ?>"
  data-pickdate-disable-past="<?= $disable_past ? 'true' : 'false'; ?>"
  data-pickdate-unavailable="<?= e(implode(',', $unavailable_dates)); ?>"
>
  <button
    id="<?= e($trigger_id); ?>"
    type="button"
    class="<?= e($trigger_classes); ?>"
    data-pickdate-trigger
    aria-haspopup="dialog"
    aria-expanded="false"
    aria-controls="<?= e($panel_id); ?>"
    <?= $disabled ? 'disabled' : ''; ?>
  >
    <input
      type="text"
      class="<?= e($display_classes); ?>"
      data-pickdate-display
      placeholder="<?= e($placeholder); ?>"
      readonly
      tabindex="-1"
      <?= $required ? 'required' : ''; ?>
      <?= $disabled ? 'disabled' : ''; ?>
    >
    <span class="pickdate__trigger-icon ml-3 inline-flex items-center text-brand-500">
      <?php icon('calendar-line', ['icon_size' => '20']); ?>
    </span>
  </button>

  <div
    id="<?= e($panel_id); ?>"
    class="<?= e($panel_classes); ?> hidden"
    data-pickdate-panel
    role="dialog"
    aria-modal="false"
    aria-labelledby="<?= e($trigger_id); ?>"
  >
    <div class="pickdate__header mb-3 flex items-center justify-between gap-2">
      <button
        type="button"
        class="inline-flex h-8 w-8 items-center justify-center rounded-full text-brand-700 transition hover:bg-brand-100 focus:outline-none focus:ring-2 focus:ring-brand-500"
        data-pickdate-prev
        aria-label="Previous month"
      >
        <?php icon('arrow-left-s-line', ['icon_size' => '16']); ?>
      </button>

      <p class="text-sm font-semibold text-brand-900" data-pickdate-month-label></p>

      <button
        type="button"
        class="inline-flex h-8 w-8 items-center justify-center rounded-full text-brand-700 transition hover:bg-brand-100 focus:outline-none focus:ring-2 focus:ring-brand-500"
        data-pickdate-next
        aria-label="Next month"
      >
        <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
      </button>
    </div>

    <div class="pickdate__weekdays mb-2 grid grid-cols-7 gap-1 text-center text-[11px] font-medium uppercase tracking-[0.08em] text-brand-500">
      <span>Su</span>
      <span>Mo</span>
      <span>Tu</span>
      <span>We</span>
      <span>Th</span>
      <span>Fr</span>
      <span>Sa</span>
    </div>

    <?php if ($mode === 'range'): ?>
      <p class="mb-2 text-xs font-medium text-brand-600" data-pickdate-range-status>
        Select check-in date
      </p>
    <?php endif; ?>

    <div class="pickdate__days grid grid-cols-7 gap-1" data-pickdate-days></div>

    <div class="pickdate__footer mt-4 flex items-center justify-between gap-3 border-t border-brand-200 pt-3">
      <button
        type="button"
        class="inline-flex h-8 items-center rounded-md px-3 text-xs font-medium text-brand-600 transition hover:bg-brand-100 hover:text-brand-900"
        data-pickdate-clear
      >
        Clear
      </button>
      <button
        type="button"
        class="inline-flex h-8 items-center rounded-md bg-brand-900 px-3 text-xs font-medium text-white transition hover:bg-brand-800"
        data-pickdate-apply
      >
        Apply
      </button>
    </div>
  </div>

  <?php if ($mode === 'range'): ?>
    <input
      type="hidden"
      data-pickdate-start
      value="<?= e($start_value); ?>"
      <?= $name_start !== '' ? 'name="' . e($name_start) . '"' : ''; ?>
    >
    <input
      type="hidden"
      data-pickdate-end
      value="<?= e($end_value); ?>"
      <?= $name_end !== '' ? 'name="' . e($name_end) . '"' : ''; ?>
    >
  <?php else: ?>
    <input
      type="hidden"
      data-pickdate-value
      value="<?= e($value); ?>"
      <?= $name !== '' ? 'name="' . e($name) . '"' : ''; ?>
    >
  <?php endif; ?>
</div>
