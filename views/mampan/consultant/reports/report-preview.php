<?php

declare(strict_types=1);

$page_title   = 'Report Preview';
$page_current = 'consultant-reports';
$project_current = 'project-reports';

$module_nav_links = [
  ['label' => 'Workspace',      'href' => path('/mampan/consultant/projects/project-workspace')],
  ['label' => 'Documents',      'href' => path('/mampan/consultant/documents/document-hub')],
  ['label' => 'Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index')],
  ['label' => 'Evidence',       'href' => path('/mampan/consultant/evidence/evidence-index')],
  ['label' => 'Gap Report',     'href' => path('/mampan/consultant/reports/gap-analysis-report')],
];

$criteria_breakdown = [
  ['code' => 'EE', 'label' => 'Energy Efficiency',                      'target_points' => '28', 'verified_points' => '20', 'potential_points' => '24', 'risk_points' => '3', 'status' => 'At Risk',      'progress_width' => '71%'],
  ['code' => 'EQ', 'label' => 'Indoor Environment Quality',             'target_points' => '12', 'verified_points' => '8',  'potential_points' => '10', 'risk_points' => '2', 'status' => 'Under Review', 'progress_width' => '67%'],
  ['code' => 'SM', 'label' => 'Sustainable Site Planning & Management', 'target_points' => '10', 'verified_points' => '8',  'potential_points' => '9',  'risk_points' => '0', 'status' => 'Ready',        'progress_width' => '80%'],
  ['code' => 'MR', 'label' => 'Materials & Resources',                  'target_points' => '9',  'verified_points' => '6',  'potential_points' => '8',  'risk_points' => '2', 'status' => 'At Risk',      'progress_width' => '67%'],
  ['code' => 'WE', 'label' => 'Water Efficiency',                       'target_points' => '8',  'verified_points' => '6',  'potential_points' => '7',  'risk_points' => '1', 'status' => 'Under Review', 'progress_width' => '75%'],
  ['code' => 'IN', 'label' => 'Innovation',                             'target_points' => '3',  'verified_points' => '2',  'potential_points' => '3',  'risk_points' => '0', 'status' => 'In Progress',  'progress_width' => '67%'],
];

$risk_credits = [
  ['credit_code' => 'EE2', 'credit_title' => 'Energy Monitoring Trend Data',      'criteria_group' => 'Energy Efficiency',          'points_at_risk' => '3 points at risk', 'issue' => 'Trend period incomplete.',                'related_evidence' => 'EVC-EE2-001', 'related_rfi' => 'RFI #004', 'owner' => 'Mechanical Engineer', 'due_date' => '2026-04-27', 'action_label' => 'Open Evidence', 'action_url' => path('/mampan/consultant/evidence/evidence-detail?evidence=EE2-001')],
  ['credit_code' => 'EQ4', 'credit_title' => 'Low-VOC Paint Declaration',         'criteria_group' => 'Indoor Environment Quality', 'points_at_risk' => '2 points at risk', 'issue' => 'VOC threshold not fully documented.',   'related_evidence' => 'EVC-EQ4-003', 'related_rfi' => 'RFI #005', 'owner' => 'Procurement Manager', 'due_date' => '2026-04-29', 'action_label' => 'Open RFI',      'action_url' => path('/mampan/consultant/rfi/rfi-detail?rfi=005')],
  ['credit_code' => 'MR2', 'credit_title' => 'Sustainable Material Certificate',  'criteria_group' => 'Materials & Resources',      'points_at_risk' => '2 points at risk', 'issue' => 'Source declaration mismatch with BOQ.', 'related_evidence' => 'EVC-MR2-006', 'related_rfi' => 'RFI #007', 'owner' => 'Procurement Manager', 'due_date' => '2026-04-29', 'action_label' => 'Open Document', 'action_url' => path('/mampan/consultant/documents/document-hub')],
];

$client_actions = [
  ['action_title' => 'Provide complete EE2 trend logs',      'related_module' => 'Evidence',       'assigned_to' => 'Mechanical Engineer', 'priority' => 'High',   'due_date' => '2026-04-27', 'status' => 'In Progress', 'link_label' => 'Open Evidence',  'link_url' => path('/mampan/consultant/evidence/evidence-index')],
  ['action_title' => 'Close open clarification for EQ4',     'related_module' => 'Clarifications', 'assigned_to' => 'Procurement Manager', 'priority' => 'Medium', 'due_date' => '2026-04-29', 'status' => 'Open',        'link_label' => 'Open RFI',       'link_url' => path('/mampan/consultant/rfi/rfi-index')],
  ['action_title' => 'Submit revised WE3 O&M manual',        'related_module' => 'Documents',      'assigned_to' => 'Facility Manager',    'priority' => 'Medium', 'due_date' => '2026-04-30', 'status' => 'Overdue',     'link_label' => 'Open Documents', 'link_url' => path('/mampan/consultant/documents/document-hub')],
];

$recommendations = [
  ['title' => 'Prioritise EE2 trend logs to protect Gold rating buffer.', 'note' => 'Submit validated data before the next consultant review slot.'],
  ['title' => 'Resolve EQ4 and MR2 evidence mismatches before report freeze.', 'note' => 'Avoid carrying unresolved credit risks into final package preparation.'],
  ['title' => 'Complete outstanding clarifications before final export.', 'note' => 'All high-priority clarifications should move to resolved status.'],
];

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <header class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="report-preview-top-heading">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <div class="flex flex-wrap gap-2">
        <?php component('button', ['label' => 'Back to Gap Report', 'href' => path('/mampan/consultant/reports/gap-analysis-report'), 'variant' => 'default', 'size' => 'sm']); ?>
        <?php component('button', ['label' => 'Edit Report',         'href' => path('/mampan/consultant/reports/report-builder'),       'variant' => 'default', 'size' => 'sm']); ?>
      </div>
      <?php component('button', ['label' => 'Export PDF', 'href' => '#', 'variant' => 'primary', 'size' => 'sm']); ?>
    </div>
  </header>

  <section class="rounded-lg border border-zinc-200 bg-white p-6 md:p-8" aria-labelledby="report-preview-top-heading">
    <header class="border-b border-zinc-200 pb-5">
      <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">GBI NRNC Gap Analysis Report Preview</p>
      <h1 id="report-preview-top-heading" class="mt-2 text-2xl font-semibold text-zinc-900 md:text-3xl">Menara Harmoni Office Retrofit</h1>
      <dl class="mt-4 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
        <div><dt class="text-xs uppercase tracking-wide text-zinc-500">Project Code</dt><dd class="mt-1 text-sm font-medium text-zinc-900">GBI-NRNC-2026-014</dd></div>
        <div><dt class="text-xs uppercase tracking-wide text-zinc-500">Client</dt><dd class="mt-1 text-sm font-medium text-zinc-900">Harmoni Asset Holdings Berhad</dd></div>
        <div><dt class="text-xs uppercase tracking-wide text-zinc-500">Report Version</dt><dd class="mt-1 text-sm font-medium text-zinc-900">Rev 3</dd></div>
        <div><dt class="text-xs uppercase tracking-wide text-zinc-500">Prepared By</dt><dd class="mt-1 text-sm font-medium text-zinc-900">Ir. Aisyah Kamaruddin</dd></div>
      </dl>
    </header>

    <section class="mt-6 space-y-6" aria-label="Report preview sections">
      <article>
        <h2 class="text-lg font-semibold text-zinc-900">Executive Summary</h2>
        <p class="mt-2 text-sm text-zinc-700">The project currently tracks within GBI Gold threshold at estimated score level, but verified score remains below confidence target due to unresolved evidence gaps in EE2, EQ4, WE3, and MR2. Closing these items is required before final submission package lock.</p>
      </article>

      <?php component('reports/report-score-summary', [
        'target_rating'        => 'GBI Gold (66-75 points)',
        'current_score'        => '68 / 100',
        'potential_score'      => '74 / 100',
        'verified_score'       => '56 / 100',
        'rating_gap'           => '10 points pending verification',
        'submission_readiness' => '78%',
      ]); ?>

      <article>
        <h2 class="text-lg font-semibold text-zinc-900">Criteria Breakdown</h2>
        <div class="mt-3">
          <?php component('reports/report-criteria-breakdown', ['criteria_rows' => $criteria_breakdown]); ?>
        </div>
      </article>

      <article>
        <h2 class="text-lg font-semibold text-zinc-900">Key Gaps & Risks</h2>
        <div class="mt-3">
          <?php component('reports/report-risk-credit-list', ['risk_credits' => $risk_credits]); ?>
        </div>
      </article>

      <article>
        <h2 class="text-lg font-semibold text-zinc-900">Required Client Actions</h2>
        <div class="mt-3">
          <?php component('reports/report-client-action-list', ['client_actions' => $client_actions]); ?>
        </div>
      </article>

      <article>
        <h2 class="text-lg font-semibold text-zinc-900">Consultant Recommendations</h2>
        <div class="mt-3">
          <?php component('reports/report-recommendation-list', ['recommendations' => $recommendations]); ?>
        </div>
      </article>

      <article class="rounded-md border border-zinc-200 bg-zinc-50 p-4" aria-labelledby="report-next-steps-heading">
        <h2 id="report-next-steps-heading" class="text-lg font-semibold text-zinc-900">Next Steps</h2>
        <ol class="mt-2 space-y-1 text-sm text-zinc-700">
          <li>1. Close all high-priority evidence gaps within this reporting cycle.</li>
          <li>2. Recalculate verified score after EE2 and MR2 closure confirmation.</li>
          <li>3. Finalise submission readiness review with consultant and client leads.</li>
        </ol>
      </article>

      <article class="rounded-md border border-zinc-200 bg-white p-4" aria-labelledby="report-sign-off-heading">
        <h2 id="report-sign-off-heading" class="text-lg font-semibold text-zinc-900">Sign-off</h2>
        <div class="mt-3 grid gap-4 sm:grid-cols-2">
          <div class="rounded-md border border-zinc-200 p-3">
            <p class="text-xs uppercase tracking-wide text-zinc-500">Consultant Lead</p>
            <p class="mt-6 text-sm font-medium text-zinc-900">____________________________</p>
            <p class="mt-1 text-xs text-zinc-600">Ir. Aisyah Kamaruddin</p>
          </div>
          <div class="rounded-md border border-zinc-200 p-3">
            <p class="text-xs uppercase tracking-wide text-zinc-500">Client Representative</p>
            <p class="mt-6 text-sm font-medium text-zinc-900">____________________________</p>
            <p class="mt-1 text-xs text-zinc-600">Faizal Rahman</p>
          </div>
        </div>
      </article>
    </section>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
