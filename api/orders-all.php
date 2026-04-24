<?php

declare(strict_types=1);

require_once __DIR__ . '/../include/functions.php';

http_response_code(200);
header('Content-Type: application/json; charset=utf-8');

$escape = static function (string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};

$format_order_cell = static function (string $order_id, string $order_datetime) use ($escape): string {
  return '<div>'
    . '<p class="font-semibold text-brand-900">' . $escape($order_id) . '</p>'
    . '<p class="mt-1 text-xs text-brand-600">' . $escape($order_datetime) . '</p>'
    . '</div>';
};

$format_customer_cell = static function (string $customer_name, string $phone_number) use ($escape): string {
  return '<div>'
    . '<p class="font-semibold text-brand-900">' . $escape($customer_name) . '</p>'
    . '<p class="mt-1 text-xs text-brand-600">' . $escape($phone_number) . '</p>'
    . '</div>';
};

$format_badge_cell = static function (string $label, string $tone): string {
  ob_start();
  component('badge', [
    'items' => [[
      'label' => $label,
      'tone'  => $tone,
    ]],
    'show_wrapper' => false,
  ]);
  return (string) ob_get_clean();
};

$format_action_cell = static function (
  string $order_id,
  string $order_datetime,
  string $customer_name,
  string $phone_number,
  string $payment_status,
  string $order_status
) use ($escape): string {
  $order_id_attr       = $escape($order_id);
  $datetime_attr       = $escape($order_datetime);
  $customer_attr       = $escape($customer_name);
  $phone_attr          = $escape($phone_number);
  $payment_status_attr = $escape($payment_status);
  $order_status_attr   = $escape($order_status);

  $preview_button = capture_button([
    'label'      => 'Preview order ' . $order_id,
    'aria_label' => 'Preview order ' . $order_id,
    'variant'    => 'secondary',
    'size'       => 'md',
    'icon_only'  => true,
    'icon_name'  => 'eye-line',
    'attributes' => [
      'data-drawer-open'         => true,
      'data-drawer-target'       => 'order-preview-drawer',
      'data-order-preview-open'  => true,
      'data-order-id'            => $order_id_attr,
      'data-order-datetime'      => $datetime_attr,
      'data-customer-name'       => $customer_attr,
      'data-customer-phone'      => $phone_attr,
      'data-payment-status'      => $payment_status_attr,
      'data-order-status'        => $order_status_attr,
    ],
  ]);

  ob_start();
  component('dropdown', [
    'dropdown_id' => 'order-actions-' . strtolower($order_id),
    'align'       => 'right',
    'trigger'     => [
      'type'          => 'button',
      'label'         => 'More',
      'aria_label'    => 'Open actions for ' . $order_id,
      'variant'       => 'secondary',
      'size'          => 'md',
      'icon_name'     => 'arrow-down-s-line',
      'icon_position' => 'right',
    ],
    'menu'        => [
      'min_width_class' => 'min-w-[220px]',
    ],
    'items'       => [
      ['label' => 'Open Order', 'href' => '#'],
      ['type' => 'button', 'label' => 'Mark As Paid'],
      [
        'type'      => 'button',
        'label'     => 'Cancel Order',
        'item_class' => 'text-negative-700 hover:bg-negative-100 hover:text-negative-900',
        'li_class'   => 'border-t border-brand-200 pt-1 mt-1',
      ],
    ],
  ]);
  $actions_dropdown = (string) ob_get_clean();

  return '<div class="flex items-center justify-end gap-2">' . $preview_button . $actions_dropdown . '</div>';
};

$customer_names = [
  'Aisyah Rahman',
  'Daniel Lee',
  'Sofia Tan',
  'Hafiz Karim',
  'Nadia Omar',
  'Izzat Hakim',
  'Amanda Chua',
  'Khalid Yusuf',
  'Farah Nabila',
  'Syazwan Ismail',
  'Rina Goh',
  'Mika Rahman',
  'Ariana Lim',
  'Khairul Azam',
  'Nora Idris',
  'Evelyn Chong',
  'Imran Hakim',
  'Mina Zulkifli',
  'Raymond Teo',
  'Lara Fong',
  'Dina Yusuf',
  'Rafi Ahmad',
  'Alya Harun',
  'Ean Teh',
  'Nora Hamzah',
  'Arif Sulaiman',
  'Suraya Mohd',
  'Jia Wen',
  'Kamarul Hadi',
  'Putri Hana',
  'Aqil Firdaus',
  'Nurin Shah',
  'Hakim Zaini',
  'Melissa Tan',
  'Johan Rosli',
];

$phone_numbers = [
  '+60 11-2345 1001',
  '+60 11-2345 1002',
  '+60 11-2345 1003',
  '+60 11-2345 1004',
  '+60 11-2345 1005',
  '+60 11-2345 1006',
  '+60 11-2345 1007',
  '+60 11-2345 1008',
  '+60 11-2345 1009',
  '+60 11-2345 1010',
  '+60 11-2345 1011',
  '+60 11-2345 1012',
  '+60 11-2345 1013',
  '+60 11-2345 1014',
  '+60 11-2345 1015',
  '+60 11-2345 1016',
  '+60 11-2345 1017',
  '+60 11-2345 1018',
  '+60 11-2345 1019',
  '+60 11-2345 1020',
  '+60 11-2345 1021',
  '+60 11-2345 1022',
  '+60 11-2345 1023',
  '+60 11-2345 1024',
  '+60 11-2345 1025',
  '+60 11-2345 1026',
  '+60 11-2345 1027',
  '+60 11-2345 1028',
  '+60 11-2345 1029',
  '+60 11-2345 1030',
  '+60 11-2345 1031',
  '+60 11-2345 1032',
  '+60 11-2345 1033',
  '+60 11-2345 1034',
  '+60 11-2345 1035',
];

$payment_states = ['Paid Full', 'Deposit', 'Unpaid'];
$order_states = ['Confirmed', 'Pending', 'Completed'];
$payment_tone_map = [
  'Paid Full' => 'positive',
  'Deposit'   => 'warning',
  'Unpaid'    => 'negative',
];
$status_tone_map = [
  'Confirmed' => 'info',
  'Pending'   => 'warning',
  'Completed' => 'positive',
];

$rows = [];

for ($index = 0; $index < 35; $index++) {
  $order_number   = 6201 + $index;
  $order_id       = 'ORD-' . (string) $order_number;
  $customer_name  = $customer_names[$index];
  $phone_number   = $phone_numbers[$index];
  $payment_status = $payment_states[$index % count($payment_states)];
  $order_status   = $order_states[($index + 1) % count($order_states)];

  $timestamp      = strtotime('2026-04-01 09:00:00 +' . (string) ($index * 7) . ' hours');
  $order_datetime = $timestamp !== false
    ? date('d M Y, h:i A', $timestamp)
    : '01 Apr 2026, 09:00 AM';

  $rows[] = [
    'order'    => $format_order_cell($order_id, $order_datetime),
    'customer' => $format_customer_cell($customer_name, $phone_number),
    'payment'  => $format_badge_cell($payment_status, $payment_tone_map[$payment_status] ?? 'neutral'),
    'status'   => $format_badge_cell($order_status, $status_tone_map[$order_status] ?? 'neutral'),
    'actions'  => $format_action_cell(
      $order_id,
      $order_datetime,
      $customer_name,
      $phone_number,
      $payment_status,
      $order_status
    ),
  ];
}

$response = [
  'data' => $rows,
];

$json_output = json_encode($response);
if ($json_output === false) {
  $json_output = '{"data":[]}';
}

echo $json_output;
