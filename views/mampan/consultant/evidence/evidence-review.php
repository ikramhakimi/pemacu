<?php

declare(strict_types=1);

$page_title   = 'Review Evidence';
$page_current = 'consultant-evidence';
$project_current = 'project-evidence';

$evidence_title  = 'AHU Commissioning Report Rev B';
$linked_credit   = 'EE Commissioning / Verification';
$current_status  = 'Under Review';
$evidence_id     = 'EVC-EECX-002';

$status_tone_map = [
  'Not Submitted'           => 'neutral',
  'Submitted'               => 'neutral',
  'Under Review'            => 'warning',
  'Need Revision'           => 'warning',
  'Verified'                => 'positive',
  'Rejected'                => 'negative',
  'Waived / Not Applicable' => 'neutral',
];

$submitted_evidence_panel = [
  'evidence_id'       => $evidence_id,
  'gbi_credit_code'   => 'EE Commissioning',
  'credit_title'      => 'AHU Commissioning Test Results',
  'criteria_group'    => 'Energy Efficiency',
  'required_evidence' => 'Complete AHU commissioning package, including balancing results and final professional sign-off.',
  'submitted_summary' => 'Report includes functional test summary but missing balancing test results and final commissioning sign-off.',
  'current_status'    => $current_status,
  'reviewer'          => 'Azlan Yusof (Commissioning Reviewer)',
  'client_owner'      => 'Daniel Ong (Mechanical Engineer, Client)',
  'created_date'      => '2026-04-20 09:10',
  'due_date'          => '2026-04-28',
];

$review_checklist = [
  ['label' => 'Evidence file is readable', 'status' => 'Pass', 'note' => 'Readable PDF and attachment quality acceptable.'],
  ['label' => 'Correct project name is referenced', 'status' => 'Pass', 'note' => 'Project name and code match project workspace records.'],
  ['label' => 'Latest revision is used', 'status' => 'Pending', 'note' => 'Confirm if Rev C supersedes submitted Rev B.'],
  ['label' => 'Professional endorsement included if required', 'status' => 'Fail', 'note' => 'Final sign-off page missing.'],
  ['label' => 'Data period is sufficient', 'status' => 'Pass', 'note' => 'Testing dates align with current verification cycle.'],
  ['label' => 'Document supports the claimed credit', 'status' => 'Pending', 'note' => 'Balancing records still required.'],
  ['label' => 'No conflict with latest drawings', 'status' => 'Pass', 'note' => 'AHU tags align with current as-built drawing set.'],
  ['label' => 'Ready for final submission package', 'status' => 'Fail', 'note' => 'Not ready until missing sections are uploaded.'],
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
    'document_name'   => 'AHU_Functional_Test_Summary.pdf',
    'version'         => 'Rev A',
    'category'        => 'Commissioning',
    'document_status' => 'Submitted',
    'uploaded_by'     => 'Commissioning Agent',
    'uploaded_date'   => '2026-04-21 14:35',
    'view_url'        => path('/mampan/consultant/documents/document-hub'),
    'download_url'    => path('/mampan/consultant/documents/document-hub'),
  ],
];

$score_impact_preview = [
  'available_points'        => '3 points',
  'targeted_points'         => '2 points',
  'current_verified_points' => '0 points',
  'points_at_risk'          => '2 points',
  'impact_note'             => 'Current gaps may prevent EE commissioning points from being included in the final scoring package.',
];

$status_tone = isset($status_tone_map[$current_status]) ? $status_tone_map[$current_status] : 'neutral';

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <header class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="evidence-review-heading">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <?php component('button', ['label' => 'Back to Evidence Detail', 'href' => path('/mampan/consultant/evidence/evidence-detail?evidence=EECX-002'), 'variant' => 'default', 'size' => 'sm']); ?>
      <?php component('badge', ['items' => [['label' => $current_status, 'tone' => $status_tone]]]); ?>
    </div>

    <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-zinc-500">Review Evidence</p>
    <h1 id="evidence-review-heading" class="mt-1 text-2xl font-semibold text-zinc-900 md:text-3xl"><?= e($evidence_title); ?></h1>
    <p class="mt-1 text-sm text-zinc-600">Linked GBI Credit: <?= e($linked_credit); ?></p>
  </header>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Evidence review layout">
    <div class="space-y-5 xl:col-span-8">
      <?php component('evidence/evidence-detail-panel', $submitted_evidence_panel); ?>

      <?php component('evidence/evidence-checklist', [
        'heading_id'      => 'submitted-checklist-heading',
        'title'           => 'Submitted Evidence Checklist',
        'description'     => 'Checklist status snapshot before final review decision.',
        'checklist_items' => $review_checklist,
      ]); ?>

      <?php component('evidence/evidence-review-form', [
        'default_missing_info' => 'Balancing test results for AHU-01 to AHU-04 and final commissioning sign-off page are missing.',
        'default_review_notes' => 'Please upload the complete commissioning report including AHU balancing test results, final sign-off page, and testing date references.',
      ]); ?>
    </div>

    <div class="space-y-5 xl:col-span-4">
      <?php component('evidence/evidence-linked-documents', [
        'heading_id'    => 'review-linked-documents-heading',
        'title'         => 'Linked Documents',
        'description'   => 'Referenced files from Document Hub for reviewer validation.',
        'document_rows' => $linked_documents,
      ]); ?>

      <section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="review-related-clarification-heading">
        <header class="border-b border-zinc-200 pb-4">
          <h2 id="review-related-clarification-heading" class="text-lg font-semibold text-zinc-900">Related Clarification</h2>
        </header>
        <div class="mt-4 space-y-3">
          <div class="rounded-md border border-zinc-200 bg-zinc-50 p-3">
            <p class="text-xs uppercase tracking-wide text-zinc-500">Linked RFI</p>
            <p class="mt-1 font-medium text-zinc-900">RFI #008 - AHU Commissioning Report Test Results</p>
            <p class="mt-1 text-sm text-zinc-700">Issue: missing balancing test results and final sign-off references.</p>
          </div>
          <?php component('button', ['label' => 'Open Clarification', 'href' => path('/mampan/consultant/rfi/rfi-detail?rfi=008'), 'variant' => 'default', 'size' => 'sm']); ?>
        </div>
      </section>

      <?php component('evidence/evidence-score-impact', $score_impact_preview); ?>

      <section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="review-guidance-heading">
        <header class="border-b border-zinc-200 pb-4">
          <h2 id="review-guidance-heading" class="text-lg font-semibold text-zinc-900">Review Guidance</h2>
        </header>
        <ul class="mt-4 space-y-2 text-sm text-zinc-700">
          <li>1. Confirm the exact GBI credit requirement being verified.</li>
          <li>2. Check whether submitted evidence fully supports the credit claim.</li>
          <li>3. Verify all mandatory checklist items are resolved before acceptance.</li>
          <li>4. Validate points impact before submitting the decision.</li>
          <li>5. If incomplete, request revision with clear document-control instructions.</li>
        </ul>
      </section>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
