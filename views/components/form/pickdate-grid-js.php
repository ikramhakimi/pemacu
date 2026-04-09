<?php
declare(strict_types=1);

/**
 * Component: pickdate-grid-js
 * Purpose: Render a JS-driven card-grid datepicker with async month availability and metadata hints.
 * Anatomy:
 * - .pickdate[data-pickdate-grid-js]
 *   - header controls (prev/month/next)
 *   - status line
 *   - .pickdate__grid[data-pickdate-grid-days]
 *   - input[type=hidden][data-pickdate-grid-value]
 * Data Contract:
 * - id, name, value, month, year, weeks, forward_months, api_endpoint, min_date, max_date, disable_past, unavailable_dates, class
 */

$id                = isset($id) ? (string) $id : 'pickdate-grid-' . substr(md5((string) mt_rand()), 0, 8);
$name              = isset($name) ? (string) $name : 'booking_date';
$value             = isset($value) ? (string) $value : '';
$month             = isset($month) ? (int) $month : (int) date('n');
$year              = isset($year) ? (int) $year : (int) date('Y');
$weeks             = isset($weeks) ? (int) $weeks : 5;
$forward_months    = isset($forward_months) ? (int) $forward_months : 12;
$api_endpoint      = isset($api_endpoint) ? (string) $api_endpoint : path('/api/date-availability.php');
$min_date          = isset($min_date) ? (string) $min_date : '';
$max_date          = isset($max_date) ? (string) $max_date : '';
$disable_past      = array_key_exists('disable_past', get_defined_vars()) ? !empty($disable_past) : true;
$unavailable_dates = isset($unavailable_dates) && is_array($unavailable_dates)
  ? array_values(array_filter(array_map(static function ($item): string {
      return is_string($item) ? trim($item) : '';
    }, $unavailable_dates), static function (string $item): bool {
      return $item !== '';
    }))
  : [];
$class             = isset($class) ? trim((string) $class) : '';

if ($month < 1 || $month > 12) {
  $month = (int) date('n');
}

if ($year < 1970 || $year > 2100) {
  $year = (int) date('Y');
}

if ($weeks < 1 || $weeks > 8) {
  $weeks = 5;
}

if ($forward_months < 1 || $forward_months > 36) {
  $forward_months = 12;
}
?>
<div
  id="<?= e($id); ?>"
  class="pickdate <?= e($class); ?>"
  data-pickdate-grid-js
  data-pickdate-grid-year="<?= e((string) $year); ?>"
  data-pickdate-grid-month="<?= e((string) $month); ?>"
  data-pickdate-grid-weeks="<?= e((string) $weeks); ?>"
  data-pickdate-grid-forward-months="<?= e((string) $forward_months); ?>"
  data-pickdate-grid-min="<?= e($min_date); ?>"
  data-pickdate-grid-max="<?= e($max_date); ?>"
  data-pickdate-grid-disable-past="<?= $disable_past ? 'true' : 'false'; ?>"
  data-pickdate-grid-api="<?= e($api_endpoint); ?>"
  data-pickdate-grid-unavailable="<?= e(implode(',', $unavailable_dates)); ?>"
>
  <div class="mb-3 flex items-center gap-3">
    <label class="sr-only" for="<?= e($id); ?>-month-select">Select month</label>
    <div class="select select--md relative min-w-[11rem]">
      <select
        id="<?= e($id); ?>-month-select"
        class="select__input input h-[var(--ui-h-md)] w-full appearance-none rounded-md bg-white px-[var(--ui-px-md)] pr-10 text-sm font-medium text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500"
        data-pickdate-grid-month-select
      ></select>
      <span class="select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-brand-500">
        <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
      </span>
    </div>
    <div class="ml-auto flex items-center gap-2">
      <?php component('button', [
        'label'      => 'Previous month',
        'variant'    => 'secondary',
        'size'       => 'sm',
        'gradient'   => true,
        'icon_only'  => true,
        'icon_name'  => 'arrow-left-s-line',
        'aria_label' => 'Previous month',
        'attributes' => [
          'data-pickdate-grid-prev' => true,
        ],
      ]); ?>
      <?php component('button', [
        'label'      => 'Next month',
        'variant'    => 'secondary',
        'size'       => 'sm',
        'gradient'   => true,
        'icon_only'  => true,
        'icon_name'  => 'arrow-right-s-line',
        'aria_label' => 'Next month',
        'attributes' => [
          'data-pickdate-grid-next' => true,
        ],
      ]); ?>
    </div>
  </div>

  <p class="mt-2 hidden text-xs text-brand-500" data-pickdate-grid-status>Loading availability...</p>

  <div class="grid grid-cols-7 gap-0 text-center text-[11px] font-medium uppercase tracking-[0.08em] text-brand-500 sm:gap-1" aria-hidden="true">
    <span>Mon</span>
    <span>Tue</span>
    <span>Wed</span>
    <span>Thu</span>
    <span>Fri</span>
    <span>Sat</span>
    <span>Sun</span>
  </div>

  <div
    class="mt-2 grid grid-cols-7 gap-0 sm:gap-1"
    data-pickdate-grid-days
    role="radiogroup"
    aria-label="Booking date options"
  ></div>

  <div class="pickdate__selected-shell mt-4 flex items-center gap-3 rounded-md bg-brand-900 px-4 py-3 text-white">
    <span class="inline-flex h-8 w-8 items-center justify-center rounded-md bg-brand-700 text-brand-300">
      <?php icon('calendar-check-line', ['icon_size' => '16']); ?>
    </span>
    <p class="pickdate__selected-text text-sm font-medium" data-pickdate-grid-selected>
      Selected date: -
    </p>
  </div>

  <div
    class="pickdate__promo-shell mt-2 rounded-md bg-white p-4"
    data-pickdate-grid-promo-panel
    aria-live="polite"
    hidden
  >
    <p class="pickdate__promo-eyebrow text-xs font-semibold uppercase text-brand-700">Promo Available</p>
    <p class="pickdate__promo-title mt-1 text-sm font-semibold capitalize text-positive-600" data-pickdate-grid-promo-title></p>
    <p class="pickdate__promo-copy mt-1 text-sm" data-pickdate-grid-promo-copy>
      Pick this date now to secure the promotion before slots run out.
    </p>
  </div>

  <input
    type="hidden"
    name="<?= e($name); ?>"
    value="<?= e($value); ?>"
    data-pickdate-grid-value
  >
</div>
