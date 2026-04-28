<?php

declare(strict_types=1);

$page_title   = 'Evidence Verification';

require __DIR__ . '/../_data/phase_data.php';
$current_phase = resolve_mampan_current_phase($phase_data_map);
$current_phase_data = $phase_data_map[$current_phase];
$page_current = 'consultant-evidence';
$project_current = 'project-evidence';
$evidence_phase_data = isset($current_phase_data['evidence']) && is_array($current_phase_data['evidence'])
  ? $current_phase_data['evidence']
  : [];
$evidence_state = isset($evidence_phase_data['state']) ? (string) $evidence_phase_data['state'] : 'not_started';
$evidence_stage_map = [
  'not_started' => 'Verification Setup',
  'pending'     => 'Pending Verification',
  'active'      => 'Verification Review',
  'verified'    => 'Verified for Submission',
];
$current_evidence_stage = isset($evidence_stage_map[$evidence_state])
  ? $evidence_stage_map[$evidence_state]
  : $evidence_stage_map['not_started'];

$project_name = 'Menara Harmoni Office Retrofit';
$project_code = 'GBI-NRNC-2026-014';

$filter_items = [
  ['label' => 'All', 'key' => 'all'],
  ['label' => 'Not Submitted', 'key' => 'not-submitted'],
  ['label' => 'Submitted', 'key' => 'submitted'],
  ['label' => 'Under Review', 'key' => 'under-review'],
  ['label' => 'Verified', 'key' => 'verified'],
  ['label' => 'Need Revision', 'key' => 'need-revision'],
  ['label' => 'Rejected', 'key' => 'rejected'],
  ['label' => 'At Risk', 'key' => 'at-risk'],
  ['label' => 'Linked to Clarifications', 'key' => 'linked-clarifications'],
];

$selected_filter_key = isset($_GET['filter']) ? trim((string) $_GET['filter']) : 'all';
$filter_keys         = array_column($filter_items, 'key');

if (!in_array($selected_filter_key, $filter_keys, true)) {
  $selected_filter_key = 'all';
}

$section_filter_items = [];

$evidence_rows = [
  [
    'credit_code'      => 'EE2',
    'credit_title'     => 'Energy Monitoring Trend Data',
    'criteria_group'   => 'Energy Efficiency',
    'evidence_summary' => 'Submit 3-month monitored trend logs with meter mapping and peak load profile.',
    'linked_count'     => '3',
    'main_document'    => 'Chilled_Water_Trend_Log_2026_Q1.xlsx',
    'submitted_by'     => 'Daniel Ong (Mechanical Engineer)',
    'reviewer'         => 'Ir. Aisyah Kamaruddin',
    'status'           => 'Under Review',
    'score_impact'     => '1 point pending',
    'impact_tone'      => 'Pending',
    'view_url'         => path('/mampan/consultant/evidence/evidence-detail?evidence=EE2-001'),
    'review_url'       => path('/mampan/consultant/evidence/evidence-review?evidence=EE2-001'),
    'revision_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=004#clarification-response-heading'),
  ],
  [
    'credit_code'      => 'EE Commissioning',
    'credit_title'     => 'AHU Commissioning Test Results',
    'criteria_group'   => 'Energy Efficiency',
    'evidence_summary' => 'Provide complete AHU functional and balancing test documentation with final sign-off.',
    'linked_count'     => '2',
    'main_document'    => 'AHU_Commissioning_Report_RevB.pdf',
    'submitted_by'     => 'Azlan Yusof (Commissioning Lead)',
    'reviewer'         => 'Commissioning Reviewer',
    'status'           => 'Need Revision',
    'score_impact'     => 'At Risk 2 points',
    'impact_tone'      => 'At Risk',
    'view_url'         => path('/mampan/consultant/evidence/evidence-detail?evidence=EECX-002'),
    'review_url'       => path('/mampan/consultant/evidence/evidence-review?evidence=EECX-002'),
    'revision_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=008#clarification-response-heading'),
  ],
  [
    'credit_code'      => 'EQ4',
    'credit_title'     => 'Low-VOC Paint Declaration',
    'criteria_group'   => 'Indoor Environment Quality',
    'evidence_summary' => 'Manufacturer declaration with VOC limits, product code, and endorsed signatory.',
    'linked_count'     => '1',
    'main_document'    => 'Low_VOC_Paint_Declaration_RevA.pdf',
    'submitted_by'     => 'Nur Izzati (Procurement Manager)',
    'reviewer'         => 'GBI Reviewer (EQ)',
    'status'           => 'Submitted',
    'score_impact'     => '1 point pending',
    'impact_tone'      => 'Pending',
    'view_url'         => path('/mampan/consultant/evidence/evidence-detail?evidence=EQ4-003'),
    'review_url'       => path('/mampan/consultant/evidence/evidence-review?evidence=EQ4-003'),
    'revision_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=005#clarification-response-heading'),
  ],
  [
    'credit_code'      => 'WE1',
    'credit_title'     => 'Water Meter Calibration Certificate',
    'criteria_group'   => 'Water Efficiency',
    'evidence_summary' => 'Third-party calibration certificate for domestic and process water meters.',
    'linked_count'     => '2',
    'main_document'    => 'Water_Meter_Calibration_WE1_v1.pdf',
    'submitted_by'     => 'Farid Hakim (Facility Manager)',
    'reviewer'         => 'GBI Reviewer (WE)',
    'status'           => 'Verified',
    'score_impact'     => '+1 point verified',
    'impact_tone'      => 'Verified',
    'view_url'         => path('/mampan/consultant/evidence/evidence-detail?evidence=WE1-004'),
    'review_url'       => path('/mampan/consultant/evidence/evidence-review?evidence=WE1-004'),
    'revision_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=006#clarification-response-heading'),
  ],
  [
    'credit_code'      => 'WE3',
    'credit_title'     => 'Rainwater Harvesting O&M Manual',
    'criteria_group'   => 'Water Efficiency',
    'evidence_summary' => 'O&M procedure, maintenance schedule, and calibration references for rainwater system.',
    'linked_count'     => '1',
    'main_document'    => 'Rainwater_OM_Manual_Draft_v1.pdf',
    'submitted_by'     => 'Farid Hakim (Facility Manager)',
    'reviewer'         => 'GBI Reviewer (WE)',
    'status'           => 'Not Submitted',
    'score_impact'     => 'At Risk 1 point',
    'impact_tone'      => 'At Risk',
    'view_url'         => path('/mampan/consultant/evidence/evidence-detail?evidence=WE3-005'),
    'review_url'       => path('/mampan/consultant/evidence/evidence-review?evidence=WE3-005'),
    'revision_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=006#clarification-detail-heading'),
  ],
  [
    'credit_code'      => 'MR2',
    'credit_title'     => 'Sustainable Material Certificate',
    'criteria_group'   => 'Materials & Resources',
    'evidence_summary' => 'Certificate proving recycled or responsibly sourced materials for selected packages.',
    'linked_count'     => '2',
    'main_document'    => 'MR2_Material_Source_Certificate_Set.pdf',
    'submitted_by'     => 'Nur Izzati (Procurement Manager)',
    'reviewer'         => 'GBI Reviewer (MR)',
    'status'           => 'Rejected',
    'score_impact'     => '0 point (resubmit needed)',
    'impact_tone'      => 'At Risk',
    'view_url'         => path('/mampan/consultant/evidence/evidence-detail?evidence=MR2-006'),
    'review_url'       => path('/mampan/consultant/evidence/evidence-review?evidence=MR2-006'),
    'revision_url'     => path('/mampan/consultant/rfi/rfi-detail?rfi=007#clarification-response-heading'),
  ],
  [
    'credit_code'      => 'SM Site Management',
    'credit_title'     => 'Construction Waste Tracking',
    'criteria_group'   => 'Sustainable Site Planning & Management',
    'evidence_summary' => 'Monthly disposal records and diversion rate summary with contractor endorsement.',
    'linked_count'     => '2',
    'main_document'    => 'Site_Waste_Tracking_Log_March2026.xlsx',
    'submitted_by'     => 'Main Contractor Site Team',
    'reviewer'         => 'GBI Reviewer (SM)',
    'status'           => 'Waived / Not Applicable',
    'score_impact'     => 'No score change',
    'impact_tone'      => 'Neutral',
    'view_url'         => path('/mampan/consultant/evidence/evidence-detail?evidence=SM-007'),
    'review_url'       => path('/mampan/consultant/evidence/evidence-review?evidence=SM-007'),
    'revision_url'     => path('/mampan/consultant/rfi/rfi-index'),
  ],
  [
    'credit_code'      => 'IN1',
    'credit_title'     => 'Innovation Strategy Narrative',
    'criteria_group'   => 'Innovation',
    'evidence_summary' => 'Narrative describing innovation approach, measurable outcomes, and implementation proof.',
    'linked_count'     => '1',
    'main_document'    => 'IN1_Innovation_Strategy_Narrative_v2.pdf',
    'submitted_by'     => 'Project Analyst',
    'reviewer'         => 'Lead Consultant',
    'status'           => 'Submitted',
    'score_impact'     => '1 point pending',
    'impact_tone'      => 'Pending',
    'view_url'         => path('/mampan/consultant/evidence/evidence-detail?evidence=IN1-008'),
    'review_url'       => path('/mampan/consultant/evidence/evidence-review?evidence=IN1-008'),
    'revision_url'     => path('/mampan/consultant/rfi/rfi-index'),
  ],
];

$filter_counts = [
  'all'                   => count($evidence_rows),
  'not-submitted'         => 0,
  'submitted'             => 0,
  'under-review'          => 0,
  'verified'              => 0,
  'need-revision'         => 0,
  'rejected'              => 0,
  'at-risk'               => 0,
  'linked-clarifications' => 0,
];

foreach ($evidence_rows as $evidence_row) {
  $status = isset($evidence_row['status']) ? strtolower(trim((string) $evidence_row['status'])) : '';

  if ($status === 'not submitted') {
    $filter_counts['not-submitted']++;
  }

  if ($status === 'submitted') {
    $filter_counts['submitted']++;
  }

  if ($status === 'under review') {
    $filter_counts['under-review']++;
  }

  if ($status === 'verified') {
    $filter_counts['verified']++;
  }

  if ($status === 'need revision') {
    $filter_counts['need-revision']++;
  }

  if ($status === 'rejected') {
    $filter_counts['rejected']++;
  }

  $is_at_risk_status = $status === 'not submitted'
    || $status === 'need revision'
    || $status === 'rejected';
  $impact_tone       = isset($evidence_row['impact_tone']) ? strtolower(trim((string) $evidence_row['impact_tone'])) : '';
  $score_impact      = isset($evidence_row['score_impact']) ? strtolower(trim((string) $evidence_row['score_impact'])) : '';

  if ($is_at_risk_status || $impact_tone === 'at risk' || strpos($score_impact, 'at risk') !== false) {
    $filter_counts['at-risk']++;
  }

  $linked_count = isset($evidence_row['linked_count']) ? (int) $evidence_row['linked_count'] : 0;

  if ($linked_count > 0) {
    $filter_counts['linked-clarifications']++;
  }
}

foreach ($filter_items as $filter_item) {
  $filter_label = isset($filter_item['label']) ? (string) $filter_item['label'] : '';
  $filter_key   = isset($filter_item['key']) ? (string) $filter_item['key'] : '';

  if ($filter_label === '' || $filter_key === '') {
    continue;
  }

  $section_filter_items[] = [
    'label'     => $filter_label,
    'href'      => path('/mampan/consultant/evidence/evidence-index') . '?filter=' . rawurlencode($filter_key),
    'is_active' => $selected_filter_key === $filter_key,
    'count'     => isset($filter_counts[$filter_key]) ? $filter_counts[$filter_key] : 0,
  ];
}

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
  'current_phase'       => $current_phase,
  'phase_data_map'      => $phase_data_map,
  'phase_label_map'     => $phase_label_map,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <?php component('mampan/section-header', [
    'section_header' => [
      'title'       => $project_name,
      'description' => 'Evidence verification register for ' . $project_code . ' (' . $current_evidence_stage . ').',
      'heading_id'  => 'evidence-index-heading',
    ],
  ]); ?>

  <?php component('mampan/section-filter', [
    'section_filter' => [
      'aria_label' => 'Evidence filter navigation',
      'items'      => $section_filter_items,
      'action'     => [
        'label'   => 'Add Evidence Item',
        'href'    => path('/mampan/consultant/evidence/evidence-detail'),
        'variant' => 'primary',
        'class'   => 'bg-primary-700!important shadow-none',
      ],
    ],
  ]); ?>

  <?php component('evidence/evidence-credit-table', ['evidence_rows' => $evidence_rows]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
