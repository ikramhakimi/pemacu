<?php
declare(strict_types=1);

/**
 * Component: picktime-grid
 * Purpose: Render a card-style time slot radio grid with period tabs and disabled slot support.
 * Anatomy:
 * - .picktime[data-picktime-grid]
 *   - .picktime__tabs
 *   - .picktime__panels
 *     - .picktime__panel[data-picktime-grid-panel]
 *       - .picktime__grid.grid
 *         - label
 *           - input.peer[type=radio]
 *           - .picktime__card
 * Data Contract:
 * - name, value, start_time, end_time, min_time, step_minutes, unavailable_slots, class
 */

$name              = isset($name) ? (string) $name : 'time_slot';
$value             = isset($value) ? (string) $value : '';
$start_time        = isset($start_time) ? (string) $start_time : '08:00';
$end_time          = isset($end_time) ? (string) $end_time : '12:30';
$min_time          = isset($min_time) ? (string) $min_time : '';
$step_minutes      = isset($step_minutes) ? (int) $step_minutes : 30;
$unavailable_slots = isset($unavailable_slots) && is_array($unavailable_slots) ? $unavailable_slots : [];
$class             = isset($class) ? trim((string) $class) : '';

$parse_minutes = static function (string $time_value): ?int {
  $time_value = trim($time_value);

  if (preg_match('/^(\d{2}):(\d{2})$/', $time_value, $matches) === 1) {
    $hours   = (int) $matches[1];
    $minutes = (int) $matches[2];

    if ($hours < 0 || $hours > 23 || $minutes < 0 || $minutes > 59) {
      return null;
    }

    return ($hours * 60) + $minutes;
  }

  $parsed = DateTimeImmutable::createFromFormat('g:i A', strtoupper($time_value));

  if (!$parsed instanceof DateTimeImmutable) {
    return null;
  }

  return ((int) $parsed->format('G') * 60) + (int) $parsed->format('i');
};

$format_slot = static function (int $minutes): string {
  $hours = intdiv($minutes, 60);
  $mins  = $minutes % 60;
  $suffix = $hours >= 12 ? 'PM' : 'AM';
  $hours12 = $hours % 12 === 0 ? 12 : $hours % 12;
  return sprintf('%d:%02d %s', $hours12, $mins, $suffix);
};

$start_minutes = $parse_minutes($start_time);
$end_minutes   = $parse_minutes($end_time);
$min_minutes   = $min_time !== '' ? $parse_minutes($min_time) : null;

if (!is_int($start_minutes)) {
  $start_minutes = 8 * 60;
}

if (!is_int($end_minutes) || $end_minutes < $start_minutes) {
  $end_minutes = (12 * 60) + 30;
}

if ($step_minutes < 5 || $step_minutes > 60) {
  $step_minutes = 30;
}

$normalized_unavailable = [];
foreach ($unavailable_slots as $slot_value) {
  if (!is_string($slot_value)) {
    continue;
  }

  $normalized_unavailable[strtoupper(trim($slot_value))] = true;
}

$period_slots = [
  'morning'   => [],
  'afternoon' => [],
  'night'     => [],
];

$selected_period    = 'morning';
$tab_active_class   = 'picktime__tab tabs__item inline-flex w-full items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors bg-brand-900 text-white';
$tab_inactive_class = 'picktime__tab tabs__item inline-flex w-full items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors text-brand-700 hover:bg-brand-100';
?>
<?php for ($slot_minutes = $start_minutes; $slot_minutes <= $end_minutes; $slot_minutes += $step_minutes): ?>
  <?php
  $slot_label   = $format_slot($slot_minutes);
  $slot_key     = strtoupper($slot_label);
  $is_disabled  = (is_int($min_minutes) && $slot_minutes < $min_minutes)
    || isset($normalized_unavailable[$slot_key]);
  $is_checked   = !$is_disabled && strtoupper(trim($value)) === $slot_key;
  $slot_hour    = intdiv($slot_minutes, 60);
  $slot_period  = $slot_hour < 12 ? 'morning' : ($slot_hour < 18 ? 'afternoon' : 'night');

  if ($is_checked) {
    $selected_period = $slot_period;
  }

  $period_slots[$slot_period][] = [
    'label'      => $slot_label,
    'disabled'   => $is_disabled,
    'checked'    => $is_checked,
  ];
  ?>
<?php endfor; ?>
<div
  class="picktime <?= e($class); ?>"
  data-picktime-grid
  data-picktime-grid-active="<?= e($selected_period); ?>"
  data-picktime-grid-tab-active-class="<?= e($tab_active_class); ?>"
  data-picktime-grid-tab-inactive-class="<?= e($tab_inactive_class); ?>"
>
  <div class="picktime__tabs tabs__list mb-4 grid w-full grid-cols-3 gap-1 rounded-lg border border-brand-200 bg-white p-1">
    <?php foreach (['morning' => 'Morning', 'afternoon' => 'Afternoon', 'night' => 'Night'] as $period_key => $period_label): ?>
      <button
        type="button"
        class="<?= e($period_key === $selected_period
          ? $tab_active_class
          : $tab_inactive_class); ?>"
        data-picktime-grid-tab="<?= e($period_key); ?>"
      >
        <?= e($period_label); ?>
      </button>
    <?php endforeach; ?>
  </div>

  <div class="picktime__panels mt-2">
    <?php foreach ($period_slots as $period_key => $slots): ?>
      <div
        class="<?= e($period_key === $selected_period ? 'picktime__panel' : 'picktime__panel hidden'); ?>"
        data-picktime-grid-panel="<?= e($period_key); ?>"
      >
        <div class="picktime__grid grid grid-cols-2 gap-1">
          <?php foreach ($slots as $slot): ?>
            <label class="block">
              <input
                type="radio"
                name="<?= e($name); ?>"
                value="<?= e($slot['label']); ?>"
                class="peer hidden"
                <?= $slot['disabled'] ? 'disabled' : ''; ?>
                <?= $slot['checked'] ? 'checked' : ''; ?>
              >
              <div
                class="picktime__card rounded-md border border-brand-200 bg-white p-3 text-center text-brand-700 transition-all duration-200 hover:cursor-pointer hover:border-brand-900 hover:ring-1 hover:ring-brand-900 hover:text-brand-900 peer-checked:border-brand-900 peer-checked:bg-brand-900 peer-checked:text-white peer-checked:shadow-lg peer-checked:ring-0 peer-disabled:cursor-not-allowed peer-disabled:border-brand-200 peer-disabled:bg-brand-100 peer-disabled:text-brand-400 peer-disabled:shadow-none peer-disabled:ring-0"
              >
                <?= e($slot['label']); ?>
              </div>
            </label>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
