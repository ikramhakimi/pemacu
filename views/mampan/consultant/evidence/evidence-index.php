<?php

declare(strict_types=1);

$page_title   = 'Evidence Verification';
$page_current = 'consultant-evidence';
$project_current = 'project-evidence';

$evidence_header = [
  'project_name'    => 'Menara Harmoni Office Retrofit',
  'project_code'    => 'GBI-NRNC-2026-014',
  'client_company'  => 'Harmoni Asset Holdings Berhad',
  'current_stage'   => 'Verification Review',
  'target_rating'   => 'GBI Gold',
  'verified_score'  => '56 / 100',
  'potential_score' => '74 / 100',
  'last_updated'    => '2026-04-24 12:40',
  'action_items'    => [
    ['label' => 'Add Evidence Item', 'tone' => 'primary', 'href' => path('/mampan/consultant/evidence/evidence-detail')],
    ['label' => 'Export Evidence Register', 'tone' => 'default', 'href' => '#'],
    ['label' => 'Generate Verification Summary', 'tone' => 'default', 'href' => '#'],
  ],
  'related_links'   => [
    ['label' => 'Project Workspace', 'href' => path('/mampan/consultant/projects/project-workspace')],
    ['label' => 'Document Hub', 'href' => path('/mampan/consultant/documents/document-hub')],
    ['label' => 'Clarifications / RFI', 'href' => path('/mampan/consultant/rfi/rfi-index')],
    ['label' => 'Gap Analysis Report', 'href' => path('/mampan/consultant/reports/gap-analysis-report')],
    ['label' => 'Final Submission', 'href' => path('/mampan/consultant/submission/submission-package')],
  ],
];

$summary_cards = [
  ['label' => 'Total Evidence Items', 'value' => '28', 'helper' => 'Across all six GBI criteria groups', 'tone' => 'neutral', 'icon_name' => 'file-list-3-line'],
  ['label' => 'Submitted', 'value' => '6', 'helper' => 'Ready for consultant screening', 'tone' => 'neutral', 'icon_name' => 'upload-cloud-2-line'],
  ['label' => 'Under Review', 'value' => '7', 'helper' => 'Consultant review in progress', 'tone' => 'warning', 'icon_name' => 'search-eye-line'],
  ['label' => 'Verified', 'value' => '10', 'helper' => 'Accepted for score claim', 'tone' => 'positive', 'icon_name' => 'checkbox-circle-line'],
  ['label' => 'Need Revision', 'value' => '3', 'helper' => 'Client action required', 'tone' => 'warning', 'icon_name' => 'error-warning-line'],
  ['label' => 'At Risk Credits', 'value' => '2', 'helper' => 'May reduce targeted rating outcome', 'tone' => 'negative', 'icon_name' => 'alarm-warning-line'],
];

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

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <?php component('evidence/evidence-header', $evidence_header); ?>

  <section aria-labelledby="evidence-summary-heading">
    <h2 id="evidence-summary-heading" class="sr-only">Evidence summary cards</h2>
    <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
      <?php foreach ($summary_cards as $summary_card): ?>
        <?php component('evidence/evidence-summary-card', $summary_card); ?>
      <?php endforeach; ?>
    </div>
  </section>

  <?php component('evidence/evidence-filter-bar', [
    'filters'         => $filter_items,
    'selected_filter' => 'all',
    'search_value'    => '',
  ]); ?>

  <?php component('evidence/evidence-credit-table', ['evidence_rows' => $evidence_rows]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
