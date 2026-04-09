<?php
declare(strict_types=1);

header('Content-Type: application/json; charset=UTF-8');

$year  = isset($_GET['year']) ? (int) $_GET['year'] : (int) date('Y');
$month = isset($_GET['month']) ? (int) $_GET['month'] : (int) date('n');

if ($year < 1970 || $year > 2100 || $month < 1 || $month > 12) {
  http_response_code(422);
  echo json_encode([
    'error'   => 'Invalid year/month query.',
    'year'    => $year,
    'month'   => $month,
    'example' => '/api/date-availability.php?year=2026&month=4',
  ]);
  exit;
}

$month_start   = DateTimeImmutable::createFromFormat('Y-n-j', $year . '-' . $month . '-1');
$unavailable   = [];
$metadata      = [];
$promo_texts   = ['10% off', '15% off', 'Bundle deal', 'Early bird'];

if (!$month_start instanceof DateTimeImmutable) {
  http_response_code(500);
  echo json_encode(['error' => 'Failed to build month data.']);
  exit;
}

$days_in_month = (int) $month_start->format('t');

for ($day_index = 1; $day_index <= $days_in_month; $day_index++) {
  $date_obj = DateTimeImmutable::createFromFormat('Y-n-j', $year . '-' . $month . '-' . $day_index);

  if (!$date_obj instanceof DateTimeImmutable) {
    continue;
  }

  $date_key   = $date_obj->format('Y-m-d');
  $day_seed   = (int) abs(crc32($date_key));
  $sold_out   = $day_seed % 11 === 0;
  $is_blocked = $sold_out || $day_seed % 9 === 0;
  $capacity   = $sold_out ? 0 : (($day_seed % 6) + 1);
  $price      = 250 + (($day_seed % 8) * 25);
  $promo      = $day_index % 4 === 0 ? $promo_texts[$day_seed % count($promo_texts)] : '';

  if ($is_blocked) {
    $unavailable[] = $date_key;
  }

  $metadata[$date_key] = [
    'price'    => 'RM ' . (string) $price,
    'capacity' => $sold_out ? 'Sold out' : (string) $capacity . ' slots left',
    'promo'    => $promo,
    'sold_out' => $sold_out,
  ];
}

echo json_encode([
  'year'              => $year,
  'month'             => $month,
  'unavailable_dates' => $unavailable,
  'metadata'          => $metadata,
]);
