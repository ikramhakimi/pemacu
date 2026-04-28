<?php

declare(strict_types=1);

$page_title   = 'Evidence Detail';

require __DIR__ . '/../_data/phase_data.php';
$current_phase = resolve_mampan_current_phase($phase_data_map);
$current_phase_data = $phase_data_map[$current_phase];
$page_current = 'consultant-evidence';
$project_current = 'project-evidence';
$evidence_phase_data = isset($current_phase_data['evidence']) && is_array($current_phase_data['evidence'])
  ? $current_phase_data['evidence']
  : [];
$evidence_state = isset($evidence_phase_data['state']) ? (string) $evidence_phase_data['state'] : 'not_started';
$evidence_message = isset($evidence_phase_data['message'])
  ? (string) $evidence_phase_data['message']
  : 'Evidence verification starts after requirements are ready.';

$evidence_id        = 'EVC-EECX-002';
$evidence_title     = 'AHU Commissioning Test Results';
$gbi_credit         = 'EE Commissioning / Verification';
$evidence_status_map = [
  'not_started' => 'Submitted',
  'pending'     => 'Under Review',
  'active'      => 'Under Review',
  'verified'    => 'Verified',
];
$score_impact_label_map = [
  'not_started' => '1 point pending',
  'pending'     => 'At Risk 1 point',
  'active'      => 'At Risk 2 points',
  'verified'    => '+1 point verified',
];
$current_status = isset($evidence_status_map[$evidence_state]) ? $evidence_status_map[$evidence_state] : 'Need Revision';
$score_impact_label = isset($score_impact_label_map[$evidence_state]) ? $score_impact_label_map[$evidence_state] : 'At Risk 2 points';

$status_tone_map = [
  'Not Submitted'           => 'neutral',
  'Submitted'               => 'neutral',
  'Under Review'            => 'warning',
  'Need Revision'           => 'warning',
  'Verified'                => 'positive',
  'Rejected'                => 'negative',
  'Waived / Not Applicable' => 'neutral',
];

$score_impact_tone_map = [
  'At Risk 2 points' => 'negative',
  'At Risk 1 point'  => 'negative',
  '+1 point verified' => 'positive',
  '1 point pending'  => 'warning',
];

$detail_panel = [
  'evidence_id'       => $evidence_id,
  'gbi_credit_code'   => 'EE Commissioning',
  'credit_title'      => 'AHU Commissioning Test Results',
  'criteria_group'    => 'Energy Efficiency',
  'required_evidence' => 'Complete AHU functional test, balancing test sheets, controls verification, and signed commissioning closeout.',
  'submitted_summary' => 'AHU Commissioning Report Rev B includes functional test summary, but balancing test results and final sign-off page are missing.',
  'current_status'    => $current_status,
  'reviewer'          => 'Azlan Yusof (Commissioning Reviewer)',
  'client_owner'      => 'Daniel Ong (Mechanical Engineer, Client)',
  'created_date'      => '2026-04-20 09:10',
  'due_date'          => '2026-04-28',
];

$checklist_items = [
  ['label' => 'Evidence file is readable', 'status' => 'Pass', 'note' => 'Rev B PDF is legible and complete for uploaded sections.'],
  ['label' => 'Correct project name is referenced', 'status' => 'Pass', 'note' => 'Project title and code match workspace records.'],
  ['label' => 'Latest revision is used', 'status' => 'Pending', 'note' => 'Need confirmation whether Rev C exists from commissioning team.'],
  ['label' => 'Professional endorsement included if required', 'status' => 'Fail', 'note' => 'Final professional sign-off page is not attached.'],
  ['label' => 'Data period is sufficient', 'status' => 'Pass', 'note' => 'Testing dates are within the required commissioning period.'],
  ['label' => 'Document supports the claimed credit', 'status' => 'Pending', 'note' => 'Balancing result table required to complete verification.'],
  ['label' => 'No conflict with latest drawings', 'status' => 'Pass', 'note' => 'Equipment tags align with latest M&E single-line diagram.'],
  ['label' => 'Ready for final submission package', 'status' => 'Fail', 'note' => 'Missing balancing sheets and final sign-off.'],
];

$linked_documents = [
  [
    'document_name'   => 'AHU_Commissioning_Report_RevB.pdf',
    'version'         => 'Rev B',
    'category'        => 'Commissioning',
    'document_status' => 'Need Revision',
    'uploaded_by'     => 'Daniel Ong',
    'uploaded_date'   => '2026-04-23 16:18',
    'view_url'        => path('/mampan/consultant/documents/document-hub'),
    'download_url'    => path('/mampan/consultant/documents/document-hub'),
  ],
  [
    'document_name'   => 'AHU_Balancing_Test_Template.xlsx',
    'version'         => 'Rev A',
    'category'        => 'Commissioning',
    'document_status' => 'Submitted',
    'uploaded_by'     => 'Commissioning Agent',
    'uploaded_date'   => '2026-04-22 10:02',
    'view_url'        => path('/mampan/consultant/documents/document-hub'),
    'download_url'    => path('/mampan/consultant/documents/document-hub'),
  ],
];

$decision_log = [
  [
    'action'    => 'Submitted',
    'actor'     => 'Daniel Ong (Mechanical Engineer)',
    'timestamp' => '2026-04-20 14:12',
    'note'      => 'Initial AHU commissioning report uploaded for EE commissioning review.',
  ],
  [
    'action'    => 'Under Consultant Review',
    'actor'     => 'Azlan Yusof (Commissioning Reviewer)',
    'timestamp' => '2026-04-21 09:30',
    'note'      => 'Consultant reviewed report structure and noted missing balancing details.',
  ],
  [
    'action'    => 'Revision Requested',
    'actor'     => 'Ir. Aisyah Kamaruddin',
    'timestamp' => '2026-04-22 10:05',
    'note'      => 'Requested complete balancing results and final commissioning sign-off page.',
  ],
  [
    'action'    => 'Revised Document Uploaded',
    'actor'     => 'Daniel Ong (Mechanical Engineer)',
    'timestamp' => '2026-04-23 16:18',
    'note'      => 'Rev B submitted with updated functional test summaries.',
  ],
  [
    'action'    => 'Under Consultant Review',
    'actor'     => 'Azlan Yusof (Commissioning Reviewer)',
    'timestamp' => '2026-04-24 09:40',
    'note'      => 'Final check pending missing balancing sheets and endorsement page.',
  ],
];

$score_impact = [
  'available_points'        => '3 points',
  'targeted_points'         => '2 points',
  'current_verified_points' => '0 points',
  'points_at_risk'          => '2 points',
  'impact_note'             => 'If this evidence remains incomplete, targeted EE commissioning points cannot be claimed in final submission.',
];

$status_tone       = isset($status_tone_map[$current_status]) ? $status_tone_map[$current_status] : 'neutral';
$score_impact_tone = isset($score_impact_tone_map[$score_impact_label]) ? $score_impact_tone_map[$score_impact_label] : 'warning';

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
  <header class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="evidence-detail-heading">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <?php component('button', ['label' => 'Back to Evidence Verification', 'href' => path('/mampan/consultant/evidence/evidence-index'), 'variant' => 'default', 'size' => 'sm']); ?>
      <div class="flex flex-wrap items-center gap-2">
        <?php component('badge', ['items' => [['label' => $current_status, 'tone' => $status_tone]]]); ?>
        <?php component('badge', ['items' => [['label' => $score_impact_label, 'tone' => $score_impact_tone]]]); ?>
      </div>
    </div>

    <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-brand-500"><?= e($evidence_id); ?></p>
    <h1 id="evidence-detail-heading" class="mt-1 text-2xl font-semibold text-brand-900 md:text-3xl"><?= e($evidence_title); ?></h1>
    <p class="mt-1 text-sm text-brand-600">GBI Credit: <?= e($gbi_credit); ?></p>
    <p class="mt-1 text-sm text-brand-500"><?= e($evidence_message); ?></p>
  </header>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Evidence detail layout">
    <div class="space-y-5 xl:col-span-8">
      <?php component('evidence/evidence-detail-panel', $detail_panel); ?>
      <?php component('evidence/evidence-checklist', ['checklist_items' => $checklist_items]); ?>
      <?php component('evidence/evidence-linked-documents', ['document_rows' => $linked_documents]); ?>
      <?php component('evidence/evidence-decision-log', ['log_items' => $decision_log]); ?>
    </div>

    <div class="space-y-5 xl:col-span-4">
      <?php component('evidence/evidence-score-impact', $score_impact); ?>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="related-clarification-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="related-clarification-heading" class="text-lg font-semibold text-brand-900">Related Clarification / RFI</h2>
        </header>
        <div class="mt-4 space-y-3">
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <p class="text-xs uppercase tracking-wide text-brand-500">Linked Item</p>
            <p class="mt-1 font-medium text-brand-900">RFI #008 - AHU Commissioning Report Test Results</p>
            <p class="mt-1 text-sm text-brand-700">Awaiting complete balancing test sheets and final sign-off reference.</p>
          </div>
          <?php component('button', ['label' => 'Open Clarification Detail', 'href' => path('/mampan/consultant/rfi/rfi-detail?rfi=008'), 'variant' => 'default', 'size' => 'sm']); ?>
        </div>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="evidence-people-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="evidence-people-heading" class="text-lg font-semibold text-brand-900">People Involved</h2>
        </header>
        <ul class="mt-4 space-y-2">
          <li class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <p class="font-medium text-brand-900">Ir. Aisyah Kamaruddin</p>
            <p class="text-xs text-brand-600">Lead GBI Consultant</p>
          </li>
          <li class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <p class="font-medium text-brand-900">Azlan Yusof</p>
            <p class="text-xs text-brand-600">Commissioning Reviewer</p>
          </li>
          <li class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <p class="font-medium text-brand-900">Daniel Ong</p>
            <p class="text-xs text-brand-600">Mechanical Engineer (Client)</p>
          </li>
        </ul>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="evidence-sla-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="evidence-sla-heading" class="text-lg font-semibold text-brand-900">Due Date / Review SLA</h2>
        </header>
        <div class="mt-4 rounded-md border border-brand-200 bg-brand-50 p-3">
          <p class="text-xs uppercase tracking-wide text-brand-500">Due Date</p>
          <p class="mt-1 font-medium text-brand-900">2026-04-28</p>
          <p class="mt-2 text-sm text-brand-700">SLA target: consultant review update within 3 working days after revised upload.</p>
        </div>
      </section>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
