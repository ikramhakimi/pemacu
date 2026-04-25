<?php

declare(strict_types=1);

$page_title   = 'Gap Analysis Report';
$page_current = 'consultant-reports';
$project_current = 'project-reports';

$module_nav_links = [
  ['label' => 'Workspace',      'href' => path('/mampan/consultant/projects/project-workspace')],
  ['label' => 'Documents',      'href' => path('/mampan/consultant/documents/document-hub')],
  ['label' => 'Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index')],
  ['label' => 'Evidence',       'href' => path('/mampan/consultant/evidence/evidence-index')],
  ['label' => 'Gap Report',     'href' => path('/mampan/consultant/reports/gap-analysis-report')],
  ['label' => 'Submission',     'href' => path('/mampan/consultant/submission/submission-package')],
];

$report_header = [
  'project_name'   => 'Menara Harmoni Office Retrofit',
  'project_code'   => 'GBI-NRNC-2026-014',
  'client_company' => 'Harmoni Asset Holdings Berhad',
  'report_type'    => 'GBI NRNC Gap Analysis',
  'report_version' => 'Rev 3',
  'current_stage'  => 'Verification Review',
  'prepared_by'    => 'Ir. Aisyah Kamaruddin',
  'last_updated'   => '2026-04-24 14:15',
  'action_items'   => [
    ['label' => 'Preview Report', 'tone' => 'default', 'href' => path('/mampan/consultant/reports/report-preview')],
    ['label' => 'Edit Report',    'tone' => 'primary', 'href' => path('/mampan/consultant/reports/report-builder')],
    ['label' => 'Export PDF',     'tone' => 'default', 'href' => '#'],
  ],
];

$summary_cards = [
  ['label' => 'Current Estimated Score', 'value' => '68 / 100', 'helper' => 'Based on active evidence + open risks', 'tone' => 'neutral',  'icon_name' => 'bar-chart-box-line'],
  ['label' => 'Potential Score',         'value' => '74 / 100', 'helper' => 'If pending gaps are closed',            'tone' => 'neutral',  'icon_name' => 'line-chart-line'],
  ['label' => 'Verified Score',          'value' => '56 / 100', 'helper' => 'Evidence accepted for scoring',          'tone' => 'positive', 'icon_name' => 'checkbox-circle-line'],
  ['label' => 'Credits At Risk',         'value' => '4',        'helper' => 'EE2, EQ4, WE3, MR2',                    'tone' => 'negative', 'icon_name' => 'alarm-warning-line'],
  ['label' => 'Missing Evidence',        'value' => '5',        'helper' => 'Document and sign-off gaps remain',      'tone' => 'negative', 'icon_name' => 'file-warning-line'],
  ['label' => 'Client Actions',          'value' => '6',        'helper' => '3 high priority before report freeze',   'tone' => 'warning',  'icon_name' => 'task-line'],
];

$score_summary = [
  'target_rating'        => 'GBI Gold (66-75 points)',
  'current_score'        => '68 / 100',
  'potential_score'      => '74 / 100',
  'verified_score'       => '56 / 100',
  'rating_gap'           => '10 points still pending verification',
  'submission_readiness' => '78%',
];

$criteria_breakdown = [
  ['code' => 'EE', 'label' => 'Energy Efficiency',                         'target_points' => '28', 'verified_points' => '20', 'potential_points' => '24', 'risk_points' => '3', 'status' => 'At Risk',      'progress_width' => '71%'],
  ['code' => 'EQ', 'label' => 'Indoor Environment Quality',                'target_points' => '12', 'verified_points' => '8',  'potential_points' => '10', 'risk_points' => '2', 'status' => 'Under Review', 'progress_width' => '67%'],
  ['code' => 'SM', 'label' => 'Sustainable Site Planning & Management',    'target_points' => '10', 'verified_points' => '8',  'potential_points' => '9',  'risk_points' => '0', 'status' => 'Ready',        'progress_width' => '80%'],
  ['code' => 'MR', 'label' => 'Materials & Resources',                     'target_points' => '9',  'verified_points' => '6',  'potential_points' => '8',  'risk_points' => '2', 'status' => 'At Risk',      'progress_width' => '67%'],
  ['code' => 'WE', 'label' => 'Water Efficiency',                          'target_points' => '8',  'verified_points' => '6',  'potential_points' => '7',  'risk_points' => '1', 'status' => 'Under Review', 'progress_width' => '75%'],
  ['code' => 'IN', 'label' => 'Innovation',                                'target_points' => '3',  'verified_points' => '2',  'potential_points' => '3',  'risk_points' => '0', 'status' => 'In Progress',  'progress_width' => '67%'],
];

$risk_credits = [
  [
    'credit_code'       => 'EE2',
    'credit_title'      => 'Energy Monitoring Trend Data',
    'criteria_group'    => 'Energy Efficiency',
    'points_at_risk'    => '3 points at risk',
    'issue'             => 'Trend logs incomplete for required period and meter mapping not finalised.',
    'related_evidence'  => 'EVC-EE2-001',
    'related_rfi'       => 'RFI #004',
    'owner'             => 'Mechanical Engineer (Client)',
    'due_date'          => '2026-04-27',
    'action_label'      => 'Review Evidence',
    'action_url'        => path('/mampan/consultant/evidence/evidence-review?evidence=EE2-001'),
  ],
  [
    'credit_code'       => 'EQ4',
    'credit_title'      => 'Low-VOC Paint Declaration',
    'criteria_group'    => 'Indoor Environment Quality',
    'points_at_risk'    => '2 points at risk',
    'issue'             => 'Product certificate does not state VOC threshold clearly for submitted batch.',
    'related_evidence'  => 'EVC-EQ4-003',
    'related_rfi'       => 'RFI #005',
    'owner'             => 'Procurement Manager',
    'due_date'          => '2026-04-29',
    'action_label'      => 'Open Clarification',
    'action_url'        => path('/mampan/consultant/rfi/rfi-detail?rfi=005'),
  ],
  [
    'credit_code'       => 'WE3',
    'credit_title'      => 'Rainwater Harvesting O&M Manual',
    'criteria_group'    => 'Water Efficiency',
    'points_at_risk'    => '1 point at risk',
    'issue'             => 'O&M manual missing calibration reference and emergency maintenance sequence.',
    'related_evidence'  => 'EVC-WE3-005',
    'related_rfi'       => 'RFI #006',
    'owner'             => 'Facility Manager',
    'due_date'          => '2026-04-30',
    'action_label'      => 'Open Document Hub',
    'action_url'        => path('/mampan/consultant/documents/document-hub'),
  ],
  [
    'credit_code'       => 'MR2',
    'credit_title'      => 'Sustainable Material Certificate',
    'criteria_group'    => 'Materials & Resources',
    'points_at_risk'    => '2 points at risk',
    'issue'             => 'Source certificate and recycled content declaration not aligned with latest procurement pack.',
    'related_evidence'  => 'EVC-MR2-006',
    'related_rfi'       => 'RFI #007',
    'owner'             => 'Procurement Manager',
    'due_date'          => '2026-04-29',
    'action_label'      => 'Review Evidence',
    'action_url'        => path('/mampan/consultant/evidence/evidence-detail?evidence=MR2-006'),
  ],
];

$missing_evidence = [
  ['evidence_item' => 'EE2 monthly trend logs',               'linked_document' => 'Chilled water trend workbook',       'linked_credit' => 'EE2',              'owner' => 'Mechanical Engineer', 'status' => 'Missing',      'due_date' => '2026-04-27', 'recommended_action' => 'Upload full 3-month trend dataset with meter IDs.'],
  ['evidence_item' => 'AHU balancing test sheets',            'linked_document' => 'AHU commissioning report',            'linked_credit' => 'EE Commissioning', 'owner' => 'Commissioning Agent', 'status' => 'Under Review', 'due_date' => '2026-04-28', 'recommended_action' => 'Attach balancing results and sign-off page.'],
  ['evidence_item' => 'Low-VOC declaration by product batch', 'linked_document' => 'Low-VOC material certificate',        'linked_credit' => 'EQ4',              'owner' => 'Procurement Manager', 'status' => 'Missing',      'due_date' => '2026-04-29', 'recommended_action' => 'Submit revised certificate with VOC limits stated.'],
  ['evidence_item' => 'Rainwater calibration reference',      'linked_document' => 'Rainwater harvesting O&M manual',     'linked_credit' => 'WE3',              'owner' => 'Facility Manager',    'status' => 'Overdue',      'due_date' => '2026-04-30', 'recommended_action' => 'Update O&M section with calibration procedure.'],
  ['evidence_item' => 'Material source declaration summary',  'linked_document' => 'MR2 sustainable material certificates', 'linked_credit' => 'MR2',            'owner' => 'Procurement Manager', 'status' => 'Missing',      'due_date' => '2026-04-29', 'recommended_action' => 'Provide manufacturer source and recycled-content evidence.'],
];

$recommendations = [
  ['title' => 'Prioritise EE2 trend data because it affects Gold rating buffer.', 'note' => 'Close trend-log completeness and meter mapping before weekly steering review.'],
  ['title' => 'Resolve EQ4 certificates before final report freeze.',              'note' => 'Procurement to issue revised declarations with compliant VOC limits per product batch.'],
  ['title' => 'Close all open clarifications before submission package.',          'note' => 'All RFIs linked to at-risk credits should move to resolved status.'],
  ['title' => 'Verify latest drawings before final evidence lock.',                'note' => 'Prevent mismatch between evidence references and latest as-built set.'],
  ['title' => 'Prepare final submission package only after verified score reaches target threshold.', 'note' => 'Maintain minimum verified confidence above Gold threshold before final export.'],
];

$client_actions = [
  ['action_title' => 'Submit EE2 trend logs with complete period coverage',       'related_module' => 'Evidence Verification', 'assigned_to' => 'Mechanical Engineer', 'priority' => 'High',   'due_date' => '2026-04-27', 'status' => 'In Progress', 'link_label' => 'Open Evidence',     'link_url' => path('/mampan/consultant/evidence/evidence-index')],
  ['action_title' => 'Upload AHU balancing sheets and sign-off page',             'related_module' => 'Documents',             'assigned_to' => 'Commissioning Agent', 'priority' => 'High',   'due_date' => '2026-04-28', 'status' => 'Open',        'link_label' => 'Open Documents',    'link_url' => path('/mampan/consultant/documents/document-hub')],
  ['action_title' => 'Close RFI #005 for EQ4 low-VOC declaration',                'related_module' => 'Clarifications',        'assigned_to' => 'Procurement Manager', 'priority' => 'Medium', 'due_date' => '2026-04-29', 'status' => 'Open',        'link_label' => 'Open RFI',          'link_url' => path('/mampan/consultant/rfi/rfi-detail?rfi=005')],
  ['action_title' => 'Revise WE3 O&M manual calibration section',                 'related_module' => 'Evidence Verification', 'assigned_to' => 'Facility Manager',    'priority' => 'Medium', 'due_date' => '2026-04-30', 'status' => 'Overdue',     'link_label' => 'Review Evidence',   'link_url' => path('/mampan/consultant/evidence/evidence-detail?evidence=WE3-005')],
  ['action_title' => 'Validate MR2 source certificates against latest BOQ',       'related_module' => 'Documents',             'assigned_to' => 'Procurement Manager', 'priority' => 'High',   'due_date' => '2026-04-29', 'status' => 'In Progress', 'link_label' => 'Open Documents',    'link_url' => path('/mampan/consultant/documents/document-hub')],
  ['action_title' => 'Update steering committee on revised score projection',     'related_module' => 'Project Workspace',     'assigned_to' => 'Project Analyst',     'priority' => 'Low',    'due_date' => '2026-05-02', 'status' => 'Open',        'link_label' => 'Open Workspace',    'link_url' => path('/mampan/consultant/projects/project-workspace')],
];

$export_panel = [
  'report_readiness'  => 'Ready with conditions (78%)',
  'included_sections' => [
    'Executive Summary',
    'Score Summary',
    'Criteria Breakdown',
    'Risk Credit List',
    'Missing Evidence',
    'Client Action List',
  ],
  'missing_sections'  => [
    'Final management sign-off note',
    'Updated evidence closure confirmation for EE2 and MR2',
  ],
  'export_actions'    => [
    ['label' => 'PDF',                  'href' => '#'],
    ['label' => 'Client Summary',       'href' => '#'],
    ['label' => 'Internal Review Copy', 'href' => '#'],
    ['label' => 'Evidence Gap Register','href' => '#'],
  ],
];

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <?php component('reports/report-header', $report_header); ?>

  <section aria-labelledby="gap-report-summary-cards-heading">
    <h2 id="gap-report-summary-cards-heading" class="sr-only">Gap report summary cards</h2>
    <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
      <?php foreach ($summary_cards as $summary_card): ?>
        <?php component('reports/report-summary-card', $summary_card); ?>
      <?php endforeach; ?>
    </div>
  </section>

  <?php component('reports/report-score-summary', $score_summary); ?>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Gap analysis content panels">
    <div class="space-y-5 xl:col-span-8">
      <?php component('reports/report-criteria-breakdown', ['criteria_rows' => $criteria_breakdown]); ?>
      <?php component('reports/report-risk-credit-list', ['risk_credits' => $risk_credits]); ?>
      <?php component('reports/report-missing-evidence', ['missing_evidence_rows' => $missing_evidence]); ?>
      <?php component('reports/report-recommendation-list', ['recommendations' => $recommendations]); ?>
      <?php component('reports/report-client-action-list', ['client_actions' => $client_actions]); ?>
    </div>

    <div class="space-y-5 xl:col-span-4">
      <?php component('reports/report-export-panel', $export_panel); ?>

    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
