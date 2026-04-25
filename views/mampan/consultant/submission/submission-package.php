<?php

declare(strict_types=1);

$page_title   = 'Final Submission Package';
$page_current = 'consultant-submission';
$project_current = 'project-submission';

$module_nav_links = [
  ['label' => 'Workspace',      'href' => path('/mampan/consultant/projects/project-workspace')],
  ['label' => 'Documents',      'href' => path('/mampan/consultant/documents/document-hub')],
  ['label' => 'Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index')],
  ['label' => 'Evidence',       'href' => path('/mampan/consultant/evidence/evidence-index')],
  ['label' => 'Gap Report',     'href' => path('/mampan/consultant/reports/gap-analysis-report')],
  ['label' => 'Submission',     'href' => path('/mampan/consultant/submission/submission-package'), 'active' => true],
];

$submission_header = [
  'project_name'     => 'Menara Harmoni Office Retrofit',
  'project_code'     => 'GBI-NRNC-2026-014',
  'client_company'   => 'Harmoni Asset Holdings Berhad',
  'gbi_tool_type'    => 'GBI NRNC: Existing Building',
  'target_rating'    => 'GBI Gold',
  'submission_stage' => 'Completion & Verification Assessment',
  'package_version'  => 'Submission Package Rev 2',
  'prepared_by'      => 'Ir. Aisyah Kamaruddin',
  'last_updated'     => '2026-04-24 16:45',
  'action_items'     => [
    ['label' => 'View Checklist',           'tone' => 'default', 'href' => path('/mampan/consultant/submission/submission-checklist')],
    ['label' => 'Export Package',           'tone' => 'default', 'href' => path('/mampan/consultant/submission/submission-export')],
    ['label' => 'Generate Client Sign-off', 'tone' => 'primary', 'href' => path('/mampan/consultant/submission/submission-export') . '#submission-signoff-panel-heading'],
  ],
];

$summary_cards = [
  ['label' => 'Submission Readiness',   'value' => '84%',      'helper' => 'Almost ready for final package export',  'tone' => 'warning',  'icon_name' => 'shield-check-line'],
  ['label' => 'Verified Evidence',      'value' => '42 / 48',  'helper' => '6 items still under review',              'tone' => 'warning',  'icon_name' => 'file-shield-2-line'],
  ['label' => 'Closed Clarifications',  'value' => '19 / 22',  'helper' => '3 clarifications awaiting closure',       'tone' => 'warning',  'icon_name' => 'question-answer-line'],
  ['label' => 'Complete Documents',     'value' => '46 / 50',  'helper' => '4 files need revision or upload',         'tone' => 'warning',  'icon_name' => 'file-list-3-line'],
  ['label' => 'Blocking Items',         'value' => '4',        'helper' => '2 high-priority and 2 client dependencies', 'tone' => 'negative', 'icon_name' => 'alert-line'],
  ['label' => 'Client Sign-off',        'value' => 'Requested','helper' => 'Formal acknowledgement still pending',    'tone' => 'warning',  'icon_name' => 'user-star-line'],
];

$readiness_data = [
  'overall_readiness'     => '84%',
  'readiness_status'      => 'Almost Ready',
  'readiness_explanation' => 'Package quality is stable for GBI Gold target, but submission remains blocked by one evidence verification and unresolved client response.',
  'source_progress'       => [
    ['label' => 'Documents',       'value' => '92%'],
    ['label' => 'Clarifications',  'value' => '86%'],
    ['label' => 'Evidence',        'value' => '88%'],
    ['label' => 'Gap Report',      'value' => '100%'],
    ['label' => 'Client Sign-off', 'value' => '55%'],
  ],
];

$score_summary = [
  'target_rating'                   => 'GBI Gold (66-75 points)',
  'verified_score'                  => '67 / 100',
  'potential_score'                 => '73 / 100',
  'points_at_risk'                  => '4 points (EE2, EQ4, WE3)',
  'rating_buffer'                   => '1 point above Gold threshold (verified)',
  'final_submission_recommendation' => 'Conditional Proceed - Close blockers first',
];

$blocking_items = [
  [
    'title'       => 'EE2 trend data not verified',
    'source_module' => 'Evidence Verification',
    'linked_item' => 'EE2 - Chilled water trend logs',
    'owner'       => 'Mechanical Engineer (Client)',
    'priority'    => 'High',
    'due_date'    => '2026-04-27',
    'action_label' => 'Open Evidence',
    'action_href'  => path('/mampan/consultant/evidence/evidence-index'),
  ],
  [
    'title'       => 'EQ4 certificate still pending revision',
    'source_module' => 'Document Hub',
    'linked_item' => 'Low-VOC paint declaration Rev B',
    'owner'       => 'Procurement Manager',
    'priority'    => 'High',
    'due_date'    => '2026-04-29',
    'action_label' => 'Open Documents',
    'action_href'  => path('/mampan/consultant/documents/document-hub'),
  ],
  [
    'title'       => 'RFI #006 awaiting client response',
    'source_module' => 'Clarifications',
    'linked_item' => 'WE3 rainwater O&M calibration section',
    'owner'       => 'Facility Manager',
    'priority'    => 'Medium',
    'due_date'    => '2026-04-30',
    'action_label' => 'Open Clarifications',
    'action_href'  => path('/mampan/consultant/rfi/rfi-index'),
  ],
  [
    'title'       => 'Final client sign-off not completed',
    'source_module' => 'Submission',
    'linked_item' => 'Client sign-off declaration page',
    'owner'       => 'Client Project Director',
    'priority'    => 'Medium',
    'due_date'    => '2026-05-02',
    'action_label' => 'Open Sign-off',
    'action_href'  => path('/mampan/consultant/submission/submission-export') . '#submission-signoff-panel-heading',
  ],
];

$timeline_items = [
  ['milestone' => 'Package created',                    'status' => 'Completed',      'date' => '2026-04-20', 'note' => 'Submission package baseline Rev 1 created.'],
  ['milestone' => 'Gap report reviewed',                'status' => 'Completed',      'date' => '2026-04-22', 'note' => 'Final gap summary approved internally.'],
  ['milestone' => 'Evidence verification completed',    'status' => 'In Progress',    'date' => '2026-04-27', 'note' => 'Remaining EE2 and EQ4 evidence under review.'],
  ['milestone' => 'Client sign-off requested',          'status' => 'Waiting Client', 'date' => '2026-04-24', 'note' => 'Sign-off pack sent to client project director.'],
  ['milestone' => 'Package exported',                   'status' => 'Not Started',    'date' => '2026-05-01', 'note' => 'Export blocked until all high-priority items close.'],
  ['milestone' => 'Submitted',                          'status' => 'Not Started',    'date' => '2026-05-03', 'note' => 'Submission window aligned to consultant QA sign-off.'],
];

$document_register = [
  'title'           => 'Document Register',
  'total_count'     => '50',
  'completed_count' => '46',
  'pending_count'   => '2',
  'issue_count'     => '2',
  'link_label'      => 'Open Document Hub',
  'link_href'       => path('/mampan/consultant/documents/document-hub'),
];

$evidence_register = [
  'title'           => 'Evidence Register',
  'total_count'     => '48',
  'completed_count' => '42',
  'pending_count'   => '4',
  'issue_count'     => '2',
  'link_label'      => 'Open Evidence Verification',
  'link_href'       => path('/mampan/consultant/evidence/evidence-index'),
];

$clarification_register = [
  'title'           => 'Clarification Register',
  'total_count'     => '22',
  'completed_count' => '19',
  'pending_count'   => '2',
  'issue_count'     => '1',
  'link_label'      => 'Open Clarifications',
  'link_href'       => path('/mampan/consultant/rfi/rfi-index'),
];

$signoff_panel = [
  'consultant_signoff_status' => 'Completed',
  'client_signoff_status'     => 'Waiting Client',
  'final_approval_status'     => 'Pending',
  'action_items'              => [
    ['label' => 'Request Client Sign-off',  'href' => path('/mampan/consultant/submission/submission-export') . '#submission-signoff-panel-heading', 'tone' => 'primary'],
    ['label' => 'View Export Screen',       'href' => path('/mampan/consultant/submission/submission-export'),                                 'tone' => 'default'],
  ],
];

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <?php component('submission/submission-header', $submission_header); ?>

  <section aria-labelledby="submission-summary-cards-heading">
    <h2 id="submission-summary-cards-heading" class="sr-only">Submission summary cards</h2>
    <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
      <?php foreach ($summary_cards as $summary_card): ?>
        <?php component('submission/submission-summary-card', $summary_card); ?>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Submission readiness and score panels">
    <div class="space-y-5 xl:col-span-8">
      <?php component('submission/submission-readiness', $readiness_data); ?>
      <?php component('submission/submission-score-summary', $score_summary); ?>
    </div>

    <div class="space-y-5 xl:col-span-4">
      <?php component('submission/submission-signoff-panel', $signoff_panel); ?>
    </div>
  </section>

  <?php component('submission/submission-blocking-items', ['blocking_items' => $blocking_items]); ?>
  <?php component('submission/submission-package-timeline', ['timeline_items' => $timeline_items]); ?>

  <section class="grid gap-5 md:grid-cols-2 xl:grid-cols-3" aria-label="Submission registers overview">
    <?php component('submission/submission-document-register', $document_register); ?>
    <?php component('submission/submission-evidence-register', $evidence_register); ?>
    <?php component('submission/submission-clarification-register', $clarification_register); ?>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
