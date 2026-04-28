<?php

declare(strict_types=1);

$page_title       = 'Clarifications';

require __DIR__ . '/../_data/phase_data.php';
$current_phase = resolve_mampan_current_phase($phase_data_map);
$current_phase_data = $phase_data_map[$current_phase];
$page_current     = 'consultant-rfi';
$project_current  = 'project-rfi';

$rfi_header = [
  'project_name'           => 'Menara Harmoni Office Retrofit',
  'project_code'           => 'GBI-NRNC-2026-014',
  'client_company'         => 'Harmoni Asset Holdings Berhad',
  'current_stage'          => 'Evidence Collection',
  'open_clarifications'    => '8',
  'overdue_clarifications' => '2',
  'last_updated'           => 'April 24, 2026 - 2:05 PM',
];

$filter_items = [
  ['label' => 'All', 'key' => 'all'],
  ['label' => 'Open', 'key' => 'open'],
  ['label' => 'Awaiting Client', 'key' => 'awaiting-client'],
  ['label' => 'Awaiting Consultant', 'key' => 'awaiting-consultant'],
  ['label' => 'Overdue', 'key' => 'overdue'],
  ['label' => 'Resolved', 'key' => 'resolved'],
  ['label' => 'Linked to Documents', 'key' => 'linked-documents'],
  ['label' => 'Linked to GBI Credits', 'key' => 'linked-credits'],
];

$rfi_rows = [
  [
    'rfi_no'        => 'RFI #004',
    'subject'       => 'EE2 Energy Monitoring Trend Data',
    'description'   => 'Need 3 months chilled water trend logs for monitoring compliance review.',
    'linked_item'   => 'GBI Credit: EE2 | Chilled Water System Schematic Rev B',
    'requester'     => 'Ir. Aisyah Kamaruddin',
    'assignee'      => 'Mechanical Engineer (Client)',
    'priority'      => 'High',
    'due_date'      => '2026-04-27',
    'status'        => 'Awaiting Client',
    'last_activity' => 'Client acknowledged request, upload pending',
    'detail_url'    => path('/mampan/consultant/rfi/rfi-detail?rfi=004'),
    'reply_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=004#clarification-response-heading'),
    'close_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=004#clarification-detail-heading'),
  ],
  [
    'rfi_no'        => 'RFI #005',
    'subject'       => 'EQ4 Low-VOC Paint Declaration',
    'description'   => 'Submitted certificate does not state product VOC limit threshold.',
    'linked_item'   => 'GBI Credit: EQ4 | Low-VOC Paint Declaration',
    'requester'     => 'Technical Coordinator',
    'assignee'      => 'Procurement Manager',
    'priority'      => 'Medium',
    'due_date'      => '2026-04-29',
    'status'        => 'Open',
    'last_activity' => 'Revision note issued by consultant reviewer',
    'detail_url'    => path('/mampan/consultant/rfi/rfi-detail?rfi=005'),
    'reply_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=005#clarification-response-heading'),
    'close_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=005#clarification-detail-heading'),
  ],
  [
    'rfi_no'        => 'RFI #006',
    'subject'       => 'WE3 Rainwater Harvesting O&M Manual',
    'description'   => 'Operation and maintenance manual missing calibration section.',
    'linked_item'   => 'GBI Credit: WE3 | O&M Manual',
    'requester'     => 'Ir. Aisyah Kamaruddin',
    'assignee'      => 'Facility Manager',
    'priority'      => 'Medium',
    'due_date'      => '2026-04-30',
    'status'        => 'Awaiting Client',
    'last_activity' => 'Client requested extension by 2 days',
    'detail_url'    => path('/mampan/consultant/rfi/rfi-detail?rfi=006'),
    'reply_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=006#clarification-response-heading'),
    'close_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=006#clarification-detail-heading'),
  ],
  [
    'rfi_no'        => 'RFI #007',
    'subject'       => 'MR2 Sustainable Material Certificate',
    'description'   => 'Need manufacturer source certificate for recycled content claim.',
    'linked_item'   => 'GBI Credit: MR2 | Material Certificate',
    'requester'     => 'Project Analyst',
    'assignee'      => 'Procurement Manager',
    'priority'      => 'High',
    'due_date'      => '2026-04-24',
    'status'        => 'Overdue',
    'last_activity' => 'No response received after reminder',
    'detail_url'    => path('/mampan/consultant/rfi/rfi-detail?rfi=007'),
    'reply_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=007#clarification-response-heading'),
    'close_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=007#clarification-detail-heading'),
  ],
  [
    'rfi_no'        => 'RFI #008',
    'subject'       => 'AHU Commissioning Report Test Results',
    'description'   => 'Need full test sheets for airflow, static pressure, and control sequence.',
    'linked_item'   => 'Stage: Verification Review | AHU Commissioning Report Rev B',
    'requester'     => 'Commissioning Lead',
    'assignee'      => 'Commissioning Agent',
    'priority'      => 'High',
    'due_date'      => '2026-04-28',
    'status'        => 'Under Review',
    'last_activity' => 'Revised attachment submitted by client team',
    'detail_url'    => path('/mampan/consultant/rfi/rfi-detail?rfi=008'),
    'reply_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=008#clarification-response-heading'),
    'close_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=008#clarification-detail-heading'),
  ],
];

$selected_phase_key = $current_phase;
$phase_label_meta = isset($phase_label_map[$selected_phase_key]) && is_array($phase_label_map[$selected_phase_key])
  ? $phase_label_map[$selected_phase_key]
  : [];
$selected_phase_title = isset($phase_label_meta['title']) ? trim((string) $phase_label_meta['title']) : 'Phase';
$selected_phase_subtitle = isset($phase_label_meta['subtitle']) ? trim((string) $phase_label_meta['subtitle']) : 'Setup & Planning';
$selected_phase_label = $selected_phase_title . ' - ' . $selected_phase_subtitle;
$clarifications_state = isset($current_phase_data['clarifications']['state'])
  ? trim((string) $current_phase_data['clarifications']['state'])
  : 'active';
$clarification_stage_map = [
  'empty'    => 'Clarification Setup',
  'active'   => 'Clarification Follow-up',
  'reducing' => 'Resolution Tracking',
  'closed'   => 'Clarification Closure',
];
$phase_rfi_rows = $rfi_rows;

if ($clarifications_state === 'empty') {
  $phase_rfi_rows = [];
}

if ($clarifications_state === 'reducing') {
  foreach ($phase_rfi_rows as $index => $row_item) {
    if ($index >= 3) {
      $phase_rfi_rows[$index]['status'] = 'Resolved';
      $phase_rfi_rows[$index]['last_activity'] = 'Marked resolved and archived in current phase.';
    }
  }
}

if ($clarifications_state === 'closed') {
  foreach ($phase_rfi_rows as $index => $row_item) {
    $phase_rfi_rows[$index]['status'] = 'Closed';
    $phase_rfi_rows[$index]['last_activity'] = 'Closed in final clarification sweep.';
  }
}

$rfi_header['current_stage'] = isset($clarification_stage_map[$clarifications_state])
  ? $clarification_stage_map[$clarifications_state]
  : $clarification_stage_map['active'];
$rfi_header['last_updated']  = date('F j, Y - g:i A');

$open_clarification_count    = 0;
$overdue_clarification_count = 0;

foreach ($phase_rfi_rows as $row) {
  $status_value = strtolower(trim((string) ($row['status'] ?? '')));

  if (in_array($status_value, ['open', 'under review'], true)) {
    $open_clarification_count += 1;
  }

  if ($status_value === 'overdue') {
    $overdue_clarification_count += 1;
  }
}

$rfi_header['open_clarifications']    = (string) $open_clarification_count;
$rfi_header['overdue_clarifications'] = (string) $overdue_clarification_count;

$allowed_filter_keys = array_column($filter_items, 'key');
$selected_filter     = isset($_GET['filter']) ? trim((string) $_GET['filter']) : 'all';
$search_value        = isset($_GET['search']) ? trim((string) $_GET['search']) : '';

if (!in_array($selected_filter, $allowed_filter_keys, true)) {
  $selected_filter = 'all';
}

$filter_counts = [
  'all'                 => count($phase_rfi_rows),
  'open'                => 0,
  'awaiting-client'     => 0,
  'awaiting-consultant' => 0,
  'overdue'             => 0,
  'resolved'            => 0,
  'linked-documents'    => 0,
  'linked-credits'      => 0,
];

foreach ($phase_rfi_rows as $row) {
  $status_value = strtolower(trim((string) ($row['status'] ?? '')));
  $linked_value = strtolower(trim((string) ($row['linked_item'] ?? '')));

  if (in_array($status_value, ['open', 'under review'], true)) {
    $filter_counts['open'] += 1;
  }

  if ($status_value === 'awaiting client') {
    $filter_counts['awaiting-client'] += 1;
  }

  if ($status_value === 'awaiting consultant') {
    $filter_counts['awaiting-consultant'] += 1;
  }

  if ($status_value === 'overdue') {
    $filter_counts['overdue'] += 1;
  }

  if (in_array($status_value, ['resolved', 'closed'], true)) {
    $filter_counts['resolved'] += 1;
  }

  if (strpos($linked_value, 'document') !== false || strpos($linked_value, 'manual') !== false) {
    $filter_counts['linked-documents'] += 1;
  }

  if (strpos($linked_value, 'gbi credit') !== false) {
    $filter_counts['linked-credits'] += 1;
  }
}

$rfi_section_filter_items = [];

foreach ($filter_items as $filter_item) {
  $label = isset($filter_item['label']) ? trim((string) $filter_item['label']) : '';
  $key   = isset($filter_item['key']) ? trim((string) $filter_item['key']) : '';
  $count = isset($filter_counts[$key]) ? (int) $filter_counts[$key] : 0;

  if ($label === '' || $key === '' || $count === 0) {
    continue;
  }

  $rfi_section_filter_items[] = [
    'label'     => $label,
    'count'     => $count,
    'is_active' => $selected_filter === $key,
    'href'      => path('/mampan/consultant/rfi/rfi-index')
      . '?filter=' . urlencode($key)
      . '&search=' . urlencode($search_value),
  ];
}

$rfi_section_filter = [
  'class_name' => 'mt-5 border-t border-brand-200 pt-4 lg:flex lg:items-start lg:justify-between lg:gap-4',
  'aria_label' => 'Clarification filter navigation',
  'items'      => $rfi_section_filter_items,
  'action'     => [
    'label'   => 'New Clarification',
    'variant' => 'primary',
    'href'    => path('/mampan/consultant/rfi/rfi-create'),
  ],
];

$high_priority_count = 0;

foreach ($phase_rfi_rows as $row) {
  $priority_value = strtolower(trim((string) ($row['priority'] ?? '')));

  if ($priority_value === 'high') {
    $high_priority_count += 1;
  }
}

$clarification_message = isset($current_phase_data['clarifications']['message'])
  ? (string) $current_phase_data['clarifications']['message']
  : 'Track and close document and credit clarifications for current review stage.';
$summary_cards = [
  ['label' => 'Open', 'value' => (string) $filter_counts['open'], 'helper' => 'Active clarification items', 'tone' => 'neutral', 'icon_name' => 'question-answer-line'],
  ['label' => 'Awaiting Client', 'value' => (string) $filter_counts['awaiting-client'], 'helper' => $clarification_message, 'tone' => 'warning', 'icon_name' => 'user-received-2-line'],
  ['label' => 'Awaiting Consultant', 'value' => (string) $filter_counts['awaiting-consultant'], 'helper' => 'Consultant review pending', 'tone' => 'neutral', 'icon_name' => 'user-follow-line'],
  ['label' => 'Overdue', 'value' => (string) $filter_counts['overdue'], 'helper' => 'Past due date SLA', 'tone' => 'negative', 'icon_name' => 'alarm-warning-line'],
  ['label' => 'Resolved', 'value' => (string) $filter_counts['resolved'], 'helper' => 'Closed in current phase', 'tone' => 'positive', 'icon_name' => 'checkbox-circle-line'],
  ['label' => 'High Priority', 'value' => (string) $high_priority_count, 'helper' => 'May block submission package', 'tone' => $high_priority_count > 0 ? 'negative' : 'positive', 'icon_name' => 'alert-line'],
];

$filtered_rfi_rows = [];

foreach ($phase_rfi_rows as $row) {
  $status      = strtolower(trim((string) ($row['status'] ?? '')));
  $linked_item = strtolower(trim((string) ($row['linked_item'] ?? '')));

  $matches_filter = true;

  if ($selected_filter === 'open') {
    $matches_filter = in_array($status, ['open', 'under review'], true);
  } elseif ($selected_filter === 'awaiting-client') {
    $matches_filter = $status === 'awaiting client';
  } elseif ($selected_filter === 'awaiting-consultant') {
    $matches_filter = $status === 'awaiting consultant';
  } elseif ($selected_filter === 'overdue') {
    $matches_filter = $status === 'overdue';
  } elseif ($selected_filter === 'resolved') {
    $matches_filter = in_array($status, ['resolved', 'closed'], true);
  } elseif ($selected_filter === 'linked-documents') {
    $matches_filter = strpos($linked_item, 'document') !== false || strpos($linked_item, 'manual') !== false;
  } elseif ($selected_filter === 'linked-credits') {
    $matches_filter = strpos($linked_item, 'gbi credit') !== false;
  }

  $search_haystack = strtolower(implode(' ', [
    (string) ($row['rfi_no'] ?? ''),
    (string) ($row['subject'] ?? ''),
    (string) ($row['description'] ?? ''),
    (string) ($row['linked_item'] ?? ''),
    (string) ($row['assignee'] ?? ''),
    (string) ($row['requester'] ?? ''),
  ]));

  $matches_search = $search_value === '' || strpos($search_haystack, strtolower($search_value)) !== false;

  if ($matches_filter && $matches_search) {
    $filtered_rfi_rows[] = $row;
  }
}

$watchlist_columns = [
  ['label' => 'RFI', 'key' => 'rfi'],
  ['label' => 'Blocker', 'key' => 'blocker'],
  ['label' => 'Owner', 'key' => 'owner'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Status', 'key' => 'status'],
  ['label' => 'Action', 'key' => 'action'],
];

$watchlist_rows = [];

foreach ($phase_rfi_rows as $row) {
  $priority = trim((string) ($row['priority'] ?? ''));
  $status   = trim((string) ($row['status'] ?? ''));

  if ($priority !== 'High' && $status !== 'Overdue') {
    continue;
  }

  ob_start();
  component('button', [
    'label'   => 'Open Detail',
    'href'    => (string) ($row['detail_url'] ?? '#'),
    'size'    => 'sm',
    'variant' => 'default',
    'class'   => 'shadow-none',
  ]);
  $action_html = (string) ob_get_clean();

  $watchlist_rows[] = [
    'rfi'      => (string) ($row['rfi_no'] ?? '-'),
    'blocker'  => (string) ($row['subject'] ?? '-'),
    'owner'    => (string) ($row['assignee'] ?? '-'),
    'due_date' => (string) ($row['due_date'] ?? '-'),
    'status'   => (string) ($row['status'] ?? '-'),
    'action'   => ['content' => $action_html, 'is_html' => true],
  ];
}

$activity_columns = [
  ['label' => 'RFI', 'key' => 'rfi'],
  ['label' => 'Latest Activity', 'key' => 'activity'],
  ['label' => 'Updated By', 'key' => 'owner'],
  ['label' => 'Next Step', 'key' => 'next_step'],
];

$activity_rows = [];

foreach (array_slice($phase_rfi_rows, 0, 5) as $row) {
  $activity_rows[] = [
    'rfi'       => (string) ($row['rfi_no'] ?? '-'),
    'activity'  => (string) ($row['last_activity'] ?? '-'),
    'owner'     => (string) ($row['requester'] ?? '-'),
    'next_step' => 'Review and close from clarification detail panel.',
  ];
}

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
  'current_phase'        => $current_phase,
  'phase_data_map'       => $phase_data_map,
  'phase_label_map'      => $phase_label_map,
  'project_nav_search'   => [
    'enabled'       => true,
    'action'        => path('/mampan/consultant/rfi/rfi-index'),
    'name'          => 'search',
    'value'         => $search_value,
    'placeholder'   => 'Search RFI no, subject, credit, or owner.',
    'label'         => 'Search RFI no, subject, credit, or owner.',
    'hidden_inputs' => [
      'filter' => $selected_filter,
    ],
  ],
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <?php component('mampan/section-header', [
      'section_header' => [
        'title'       => 'Clarification Hub',
        'description' => $clarification_message,
        'heading_id'  => 'clarification-register-heading',
      ],
    ]); ?>
  <?php if ($phase_rfi_rows === []): ?>
    <section class="py-20 px-5 text-center rounded-lg border border-dashed border-brand-300" aria-label="No clarifications state">
      <h3 class="text-2xl font-semibold text-brand-900">No clarifications for this phase</h3>
      <p class="mt-2 text-sm text-brand-600">Start by creating the first clarification if any document or credit item needs follow-up.</p>
      <div class="mt-4">
        <?php component('button', [
          'label'   => 'Create Clarification',
          'variant' => 'primary',
          'href'    => path('/mampan/consultant/rfi/rfi-create'),
        ]); ?>
      </div>
    </section>
  <?php endif; ?>
  
  <section class="document" aria-labelledby="clarification-register-heading">
    <?php if ($selected_phase_key !== 'phase-1'): ?>
      <header class="document__head">
        

        <?php component('mampan/section-filter', ['section_filter' => $rfi_section_filter]); ?>
      </header>
    <?php endif; ?>

    <div class="document__body space-y-5">
      <?php if ($selected_phase_key !== 'phase-1'): ?>
        <?php component('rfi/rfi-table', ['rfi_rows' => $filtered_rfi_rows]); ?>
      <?php endif; ?>
    </div>
  </section>

  <?php if ($selected_phase_key !== 'phase-1'): ?>
    <section class="space-y-5" aria-label="Additional clarification tracking panels">
      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="clarification-watchlist-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="clarification-watchlist-heading" class="text-lg font-semibold text-brand-900">Clarification Watchlist</h2>
          <p class="mt-1 text-sm text-brand-600">High-priority and overdue items requiring immediate follow-up.</p>
        </header>

        <div class="mt-4 overflow-x-auto">
          <?php component('table', [
            'columns'       => $watchlist_columns,
            'rows'          => $watchlist_rows,
            'appearance'    => 'basic',
            'caption'       => 'Clarification watchlist table',
            'class_name'    => 'min-w-[920px]',
            'empty_title'   => 'No watchlist items',
            'empty_message' => 'No high-priority or overdue items at the moment.',
          ]); ?>
        </div>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="clarification-activity-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="clarification-activity-heading" class="text-lg font-semibold text-brand-900">Recent Clarification Activity</h2>
          <p class="mt-1 text-sm text-brand-600">Latest updates to keep consultant and client teams aligned.</p>
        </header>

        <div class="mt-4 overflow-x-auto">
          <?php component('table', [
            'columns'       => $activity_columns,
            'rows'          => $activity_rows,
            'appearance'    => 'basic',
            'caption'       => 'Clarification activity table',
            'class_name'    => 'min-w-[920px]',
            'empty_title'   => 'No recent activity',
            'empty_message' => 'Recent updates will appear as clarification actions are logged.',
          ]); ?>
        </div>
      </section>
    </section>
  <?php endif; ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
