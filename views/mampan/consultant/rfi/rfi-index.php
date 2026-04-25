<?php

declare(strict_types=1);

$page_title   = 'Clarifications';
$page_current = 'consultant-rfi';
$project_current = 'project-rfi';

$rfi_header = [
  'project_name'           => 'Menara Harmoni Office Retrofit',
  'project_code'           => 'GBI-NRNC-2026-014',
  'client_company'         => 'Harmoni Asset Holdings Berhad',
  'current_stage'          => 'Evidence Collection',
  'open_clarifications'    => '8',
  'overdue_clarifications' => '2',
  'last_updated'           => '2026-04-24 11:05',
  'action_items'           => [
    ['label' => 'New Clarification', 'tone' => 'primary', 'href' => path('/mampan/consultant/rfi/rfi-create')],
    ['label' => 'Export RFI Log', 'tone' => 'default', 'href' => '#'],
    ['label' => 'Open Submission', 'tone' => 'default', 'href' => path('/mampan/consultant/submission/submission-package')],
  ],
];

$summary_cards = [
  ['label' => 'Open', 'value' => '8', 'helper' => 'Active clarification items', 'tone' => 'neutral', 'icon_name' => 'question-answer-line'],
  ['label' => 'Awaiting Client', 'value' => '3', 'helper' => 'Client response required', 'tone' => 'warning', 'icon_name' => 'user-received-2-line'],
  ['label' => 'Awaiting Consultant', 'value' => '2', 'helper' => 'Consultant review pending', 'tone' => 'neutral', 'icon_name' => 'user-follow-line'],
  ['label' => 'Overdue', 'value' => '2', 'helper' => 'Past due date SLA', 'tone' => 'negative', 'icon_name' => 'alarm-warning-line'],
  ['label' => 'Resolved', 'value' => '17', 'helper' => 'Closed this phase', 'tone' => 'positive', 'icon_name' => 'checkbox-circle-line'],
  ['label' => 'High Priority', 'value' => '4', 'helper' => 'May block submission package', 'tone' => 'negative', 'icon_name' => 'alert-line'],
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

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <?php component('rfi/rfi-header', $rfi_header); ?>

  <section aria-labelledby="clarification-summary-heading">
    <h2 id="clarification-summary-heading" class="sr-only">Clarification summary cards</h2>
    <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
      <?php foreach ($summary_cards as $summary_card): ?>
        <?php component('rfi/rfi-summary-card', $summary_card); ?>
      <?php endforeach; ?>
    </div>
  </section>

  <?php component('rfi/rfi-filter-bar', [
    'filters'         => $filter_items,
    'selected_filter' => 'all',
    'search_value'    => '',
  ]); ?>

  <?php component('rfi/rfi-table', ['rfi_rows' => $rfi_rows]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
