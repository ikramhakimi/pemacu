<?php

declare(strict_types=1);

$page_title   = 'Orders - All Orders';
$page_current = 'dashboard';

$payment_states = ['Paid Full', 'Deposit', 'Unpaid'];
$order_states   = ['Confirmed', 'Pending', 'Completed'];
$product_names  = [
  'Wedding Essential',
  'Corporate Lite',
  'Bridal Signature',
  'Family Portrait Plus',
  'Maternity Glow',
  'Graduation Session',
  'Engagement Outdoor',
  'Studio Headshot',
];
$product_images = [
  path('/assets/images/avatars/avatar-01.jpg'),
  path('/assets/images/avatars/avatar-02.jpg'),
  path('/assets/images/avatars/avatar-03.jpg'),
  path('/assets/images/avatars/avatar-04.jpg'),
  path('/assets/images/avatars/avatar-05.jpg'),
  path('/assets/images/avatars/avatar-06.jpg'),
  path('/assets/images/avatars/avatar-07.jpg'),
  path('/assets/images/avatars/avatar-08.jpg'),
  path('/assets/images/avatars/avatar-09.jpg'),
  path('/assets/images/avatars/avatar-10.jpg'),
  path('/assets/images/avatars/avatar-11.jpg'),
  path('/assets/images/avatars/avatar-12.jpg'),
  path('/assets/images/avatars/avatar-13.jpg'),
];
$payment_tones  = [
  'Paid Full' => 'positive',
  'Deposit'   => 'warning',
  'Unpaid'    => 'negative',
];
$status_tones = [
  'Confirmed' => 'info',
  'Pending'   => 'warning',
  'Completed' => 'positive',
];

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

$orders = [];
for ($index = 0; $index < 35; $index++) {
  $customer_name  = $customer_names[$index];
  $phone_number   = $phone_numbers[$index];
  $product_name   = $product_names[$index % count($product_names)];
  $product_image  = $product_images[$index % count($product_images)];
  $payment_status = $payment_states[$index % count($payment_states)];
  $order_status   = $order_states[($index + 1) % count($order_states)];
  $timestamp      = strtotime('2026-04-01 09:00:00 +' . (string) ($index * 7) . ' hours');
  $order_datetime = $timestamp !== false ? date('j M Y, g:i A', $timestamp) : '1 Apr 2026, 9:00 AM';
  $session_date   = $timestamp !== false ? date('j M Y', $timestamp) : '1 Apr 2026';
  $session_time   = $timestamp !== false ? date('g:i A', $timestamp) : '9:00 AM';
  $order_date_code = $timestamp !== false ? date('ymd', $timestamp) : '260401';
  $order_sequence = str_pad((string) ($index + 1), 4, '0', STR_PAD_LEFT);
  $order_id = 'ORD-' . $order_date_code . '-' . $order_sequence;

  $orders[] = [
    'order_id'       => $order_id,
    'product_name'   => $product_name,
    'product_image'  => $product_image,
    'order_datetime' => $order_datetime,
    'session_date'   => $session_date,
    'session_time'   => $session_time,
    'customer_name'  => $customer_name,
    'phone_number'   => $phone_number,
    'payment_status' => $payment_status,
    'order_status'   => $order_status,
  ];
}

$current_page = isset($_GET['page']) ? max(1, (int) $_GET['page']) : 1;
$per_page     = 10;
$total_items  = count($orders);
$total_pages  = max(1, (int) ceil($total_items / $per_page));
$current_page = min($current_page, $total_pages);
$offset       = ($current_page - 1) * $per_page;
$page_orders  = array_slice($orders, $offset, $per_page);
$paid_orders_count = 0;
$pending_payment_count = 0;

foreach ($orders as $order_item) {
  if ($order_item['payment_status'] === 'Paid Full') {
    $paid_orders_count++;
  }

  if ($order_item['payment_status'] === 'Unpaid') {
    $pending_payment_count++;
  }
}

$payment_completion_rate = $total_items > 0
  ? (int) round(($paid_orders_count / $total_items) * 100)
  : 0;

$orders_columns = [
  ['label' => 'Order', 'key' => 'order', 'class_name' => 'w-[30%]'],
  ['label' => 'Customer', 'key' => 'customer', 'class_name' => 'w-[35%]'],
  ['label' => 'Payment', 'key' => 'payment', 'align' => 'rights', 'class_name' => 'w-[15%]'],
  ['label' => 'Status', 'key' => 'status', 'align' => 'rights', 'class_name' => 'w-[15%]'],
  ['label' => 'Actions', 'key' => 'actions', 'align' => 'right', 'class_name' => 'w-[64px] text-transparent text-[0]'],
];

$orders_rows = [];
foreach ($page_orders as $order_item) {
  ob_start();
  component('checkbox', [
    'id'         => 'order-row-select-' . strtolower($order_item['order_id']),
    'name'       => 'order_row_select[]',
    'value'      => $order_item['order_id'],
    'label'      => 'Select order ' . $order_item['order_id'],
    'show_label' => false,
    'input_class' => 'js-orders-row-checkbox',
  ]);
  $row_checkbox = (string) ob_get_clean();

  ob_start();
  component('badge', [
    'items' => [[
      'label' => $order_item['payment_status'],
      'tone'  => $payment_tones[$order_item['payment_status']] ?? 'neutral',
    ]],
    'show_wrapper' => false,
  ]);
  $payment_badge = (string) ob_get_clean();

  ob_start();
  component('badge', [
    'items' => [[
      'label' => $order_item['order_status'],
      'tone'  => $status_tones[$order_item['order_status']] ?? 'neutral',
    ]],
    'show_wrapper' => false,
  ]);
  $status_badge = (string) ob_get_clean();

  $preview_button = capture_button([
    'label'      => 'Preview order ' . $order_item['order_id'],
    'aria_label' => 'Preview order ' . $order_item['order_id'],
    'variant'    => 'secondary',
    'size'       => 'md',
    'icon_only'  => true,
    'icon_name'  => 'eye-line',
    'attributes' => [
      'data-drawer-open'         => true,
      'data-drawer-target'       => 'order-preview-drawer',
      'data-order-preview-open'  => true,
      'data-order-id'            => $order_item['order_id'],
      'data-order-datetime'      => $order_item['order_datetime'],
      'data-customer-name'       => $order_item['customer_name'],
      'data-customer-phone'      => $order_item['phone_number'],
      'data-payment-status'      => $order_item['payment_status'],
      'data-order-status'        => $order_item['order_status'],
    ],
  ]);
  $customer_phone_digits = preg_replace('/\D+/', '', $order_item['phone_number']);
  $customer_phone_digits = is_string($customer_phone_digits) ? $customer_phone_digits : '';

  if (substr($customer_phone_digits, 0, 2) === '60') {
    $customer_phone_digits = '0' . substr($customer_phone_digits, 2);
  }

  if (strlen($customer_phone_digits) < 4) {
    $customer_phone_display = $customer_phone_digits;
  } else {
    $customer_phone_display = substr($customer_phone_digits, 0, 3) . '-' . substr($customer_phone_digits, 3);
  }
  $session_date_parts  = explode(' ', $order_item['session_date']);
  $session_day_label   = isset($session_date_parts[0]) ? trim((string) $session_date_parts[0]) : '';
  $session_month_label = isset($session_date_parts[1]) ? strtoupper(trim((string) $session_date_parts[1])) : '';

  $orders_rows[] = [
    'order' => [
      'content' => '<div class="flex items-center gap-3">'
        . '<div class="flex items-center self-center shrink-0">'
        . $row_checkbox
        . '</div>'
        . '<img src="' . e((string) $order_item['product_image']) . '" alt="' . e($order_item['product_name']) . '" class="size-12 rounded-md aspect-square object-cover shrink-0" loading="lazy">'
        . '<div>'
        . '<p class="font-medium text-brand-900 leading-5">' . e($order_item['product_name']) . '</p>'
        . '<p class="text-xs leading-5 text-brand-600">' . e($order_item['order_id']) . '</p>'
        . '</div>'
        . '</div>',
      'is_html' => true,
    ],
    'customer' => [
      'content' => '<div class="flex items-center gap-3">'
        . '<div class="w-11 pt-1 flex items-center justify-center text-center rounded-md border border-brand-300 bg-brand-50 overflow-hidden shrink-0">'
        . '<div>'
        . '<p class="text-[10px] font-semibold text-brand-700">' . e($session_month_label) . '</p>'
        . '<p class="pb-1 font-semibold leading-5 text-brand-900">' . e($session_day_label) . '</p>'
        . '</div>'
        . '</div>'
        . '<div>'
        . '<p class="font-medium text-brand-900 leading-5">' . e($order_item['customer_name']) . '</p>'
        . '<p class="text-xs leading-5 text-brand-500">' . e($order_item['session_time']) . ' - '
        . e($customer_phone_display)
        . '</p>'
        . '</div>'
        . '</div>',
      'is_html' => true,
    ],
    'payment' => [
      'content' => $payment_badge,
      'is_html' => true,
    ],
    'status' => [
      'content' => $status_badge,
      'is_html' => true,
    ],
    'actions' => [
      'content' => '<div class="flex items-center justify-end gap-2">' . $preview_button . '</div>',
      'is_html' => true,
      'class_name' => 'overflow-visible',
    ],
    'row_class' => 'js-orders-selection-row',
  ];
}
$dashboard_breadcrumb_items = [
  ['label' => 'Orders', 'href' => path('/dashboard/orders/all-orders')],
  ['label' => 'All Orders', 'current' => true],
];
layout('dashboard/partials/dashboard-start', [
  'page_title'                     => $page_title,
  'page_current'                   => $page_current,
  'dashboard_breadcrumb_items'     => $dashboard_breadcrumb_items,
]);
?>
<header class="app-header py-6 px-4 -mx-4 md:hidden">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900">All Orders</h1>
    <p class="mt-4 max-w-2xl text-brand-600">
      Review and manage every order from one view, including payment progress and order status.
    </p>
  </div>
</header>

<style>
  .js-orders-selection-table th:first-child,
  .js-orders-selection-table td:first-child {
    padding-left: 12px;
  }

  .js-orders-selection-table th:last-child,
  .js-orders-selection-table td:last-child {
    padding-right: 12px;
  }

  .js-orders-frame .frame__header {
    display: none;
  }
</style>
<header class="md:flexs items-center gap-3 border-b border-brand-200 py-5">
  <div>
    <h1 class="text-3xl font-bold text-brand-900">All Orders</h1>
    <p class="text-base text-brand-500 mt-1">Review and manage every order from one view, including payment progress and order status.</p>
  </div>
</header>
<article class="app-article pb-20 space-y-5 pt-5">
  
  <section aria-label="All orders metrics">
    <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-4">
      <?php component('card', ['card' => [
        'variant'            => 'metric',
        'title'              => 'Total Orders',
        'show_subtitle'      => false,
        'metric_title_class' => 'text-sm',
        'metric_value'       => (string) number_format($total_items),
        'metric_compare'     => 'All tracked orders',
      ]]); ?>
      <?php component('card', ['card' => [
        'variant'            => 'metric',
        'title'              => 'Pending Payment',
        'show_subtitle'      => false,
        'metric_title_class' => 'text-sm',
        'metric_value'       => (string) number_format($pending_payment_count),
        'metric_compare'     => 'Status: Unpaid',
      ]]); ?>
      <?php component('card', ['card' => [
        'variant'            => 'metric',
        'title'              => 'Paid Orders',
        'show_subtitle'      => false,
        'metric_title_class' => 'text-sm',
        'metric_value'       => (string) number_format($paid_orders_count),
        'metric_compare'     => 'Status: Paid Full',
      ]]); ?>
      <?php component('card', ['card' => [
        'variant'            => 'metric',
        'title'              => 'Payment Completion Rate',
        'show_subtitle'      => false,
        'metric_title_class' => 'text-sm',
        'metric_value'       => (string) $payment_completion_rate . '%',
        'metric_compare'     => (string) $paid_orders_count . ' of ' . (string) $total_items . ' paid full',
      ]]); ?>
    </div>
  </section>

  <?php ob_start(); ?>
  <section aria-label="Orders table">
    <header class="flex items-center justify-start">
      <div class="w-[350px] min-w-[350px] p-3">
        <?php component('input-group', [
          'type'        => 'search',
          'name'        => 'orders_search',
          'placeholder' => 'Search orders...',
          'icon_name'   => 'search-line',
          'size'        => 'md',
        ]); ?>
      </div>
    </header>
    <?php component('table', [
      'columns'    => $orders_columns,
      'rows'       => $orders_rows,
      'attributes' => [
        'class' => 'rounded-md js-orders-selection-table',
      ],
    ]); ?>
  </section>
  <?php
  $orders_table_panel_html = (string) ob_get_clean();
  component('frame', [
    'variant'             => 'dense',
    'title'               => 'All Orders',
    'subtitle'            => 'Review and manage every order from one view, including payment progress and order status.',
    'panel_html_items'    => [$orders_table_panel_html],
    'render_panel_wrapper' => false,
    'class_name'          => 'js-orders-frame',
  ]);
  ?>
  <?php component('pagination', [
    'pagination' => [
      'current_page' => $current_page,
      'per_page'     => $per_page,
      'total_items'  => $total_items,
      'total_pages'  => $total_pages,
      'show_info'    => true,
      'base_url'     => path('/dashboard/orders/all-orders'),
      'page_param'   => 'page',
      'query'        => [],
    ],
  ]); ?>
</article>

<?php component('drawer', [
  'id'           => 'order-preview-drawer',
  'title'        => 'Order Preview',
  'show_trigger' => false,
  'position'     => 'right',
  'size'         => 'md',
  'body_html'    => '
    <div class="space-y-4">
      <div class="rounded-md border border-brand-200 bg-brand-50 p-4">
        <p class="text-xs uppercase text-brand-500">Order ID</p>
        <p class="mt-1 text-base font-semibold text-brand-900" data-order-preview-value="order_id">-</p>
      </div>
      <dl class="space-y-3">
        <div>
          <dt class="text-xs uppercase text-brand-500">Date & Time</dt>
          <dd class="mt-1 font-medium text-brand-900" data-order-preview-value="order_datetime">-</dd>
        </div>
        <div>
          <dt class="text-xs uppercase text-brand-500">Customer</dt>
          <dd class="mt-1 font-medium text-brand-900" data-order-preview-value="customer_name">-</dd>
        </div>
        <div>
          <dt class="text-xs uppercase text-brand-500">Phone Number</dt>
          <dd class="mt-1 font-medium text-brand-900" data-order-preview-value="customer_phone">-</dd>
        </div>
        <div>
          <dt class="text-xs uppercase text-brand-500">Payment</dt>
          <dd class="mt-1 font-medium text-brand-900" data-order-preview-value="payment_status">-</dd>
        </div>
        <div>
          <dt class="text-xs uppercase text-brand-500">Status</dt>
          <dd class="mt-1 font-medium text-brand-900" data-order-preview-value="order_status">-</dd>
        </div>
      </dl>
    </div>',
]); ?>

<script>
  document.addEventListener('click', (event) => {
    const trigger = event.target instanceof Element
      ? event.target.closest('[data-order-preview-open]')
      : null;

    if (!(trigger instanceof HTMLElement)) {
      return;
    }

    const previews = {
      order_id: trigger.getAttribute('data-order-id') || '-',
      order_datetime: trigger.getAttribute('data-order-datetime') || '-',
      customer_name: trigger.getAttribute('data-customer-name') || '-',
      customer_phone: trigger.getAttribute('data-customer-phone') || '-',
      payment_status: trigger.getAttribute('data-payment-status') || '-',
      order_status: trigger.getAttribute('data-order-status') || '-',
    };

    Object.keys(previews).forEach((key) => {
      const target = document.querySelector('[data-order-preview-value="' + key + '"]');
      if (!(target instanceof HTMLElement)) {
        return;
      }

      target.textContent = previews[key];
    });
  });

  document.addEventListener('change', (event) => {
    const target = event.target;

    if (!(target instanceof HTMLInputElement) || !target.classList.contains('js-orders-row-checkbox')) {
      return;
    }

    const table = target.closest('table.js-orders-selection-table');
    const row = target.closest('tr.js-orders-selection-row');

    if (!(table instanceof HTMLTableElement) || !(row instanceof HTMLTableRowElement)) {
      return;
    }

    row.classList.toggle('bg-primary-50', target.checked);
    row.classList.toggle('hover:bg-primary-100', target.checked);
  });
</script>

<?php layout('dashboard/partials/dashboard-end'); ?>
