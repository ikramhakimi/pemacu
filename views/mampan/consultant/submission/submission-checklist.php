<?php

declare(strict_types=1);

$page_title   = 'Submission Checklist';
$page_current = 'consultant-submission';
$project_current = 'project-submission';

$module_nav_links = [
  ['label' => 'Workspace',      'href' => path('/mampan/consultant/projects/project-workspace')],
  ['label' => 'Documents',      'href' => path('/mampan/consultant/documents/document-hub')],
  ['label' => 'Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index')],
  ['label' => 'Evidence',       'href' => path('/mampan/consultant/evidence/evidence-index')],
  ['label' => 'Gap Report',     'href' => path('/mampan/consultant/reports/gap-analysis-report')],
  ['label' => 'Submission',     'href' => path('/mampan/consultant/submission/submission-checklist'), 'active' => true],
];

$submission_header = [
  'project_name'     => 'Menara Harmoni Office Retrofit',
  'project_code'     => 'GBI-NRNC-2026-014',
  'client_company'   => 'Harmoni Asset Holdings Berhad',
  'gbi_tool_type'    => 'GBI NRNC: Existing Building',
  'target_rating'    => 'GBI Gold',
  'submission_stage' => 'Completion & Verification Assessment',
  'package_version'  => 'Submission Checklist Rev 2',
  'prepared_by'      => 'Ir. Aisyah Kamaruddin',
  'last_updated'     => '2026-04-24 17:05',
  'action_items'     => [
    ['label' => 'Back to Submission', 'tone' => 'default', 'href' => path('/mampan/consultant/submission/submission-package')],
    ['label' => 'Export Package',     'tone' => 'primary', 'href' => path('/mampan/consultant/submission/submission-export')],
  ],
];

$summary_cards = [
  ['label' => 'Checklist Completion', 'value' => '41 / 49', 'helper' => 'Complete items across 6 categories', 'tone' => 'warning', 'icon_name' => 'task-line'],
  ['label' => 'Pending Items',        'value' => '6',       'helper' => 'Requires closure before export',     'tone' => 'warning', 'icon_name' => 'time-line'],
  ['label' => 'At Risk Items',        'value' => '2',       'helper' => 'Score impact possible if unresolved', 'tone' => 'negative', 'icon_name' => 'alarm-warning-line'],
];

$checklist_groups = [
  [
    'title' => 'A. Project Information',
    'items' => [
      ['label' => 'Project name confirmed',         'status' => 'Complete', 'owner' => 'Project Analyst',         'note' => 'Matches latest appointment letter.',                    'action_label' => 'Open Workspace',    'action_href' => path('/mampan/consultant/projects/project-workspace')],
      ['label' => 'GBI tool type confirmed',        'status' => 'Complete', 'owner' => 'Lead Consultant',         'note' => 'NRNC Existing Building selected.',                      'action_label' => 'Open Workspace',    'action_href' => path('/mampan/consultant/projects/project-workspace')],
      ['label' => 'Client details confirmed',       'status' => 'Complete', 'owner' => 'Project Coordinator',     'note' => 'Client PIC and signatory details updated.',             'action_label' => 'Open Workspace',    'action_href' => path('/mampan/consultant/projects/project-workspace')],
      ['label' => 'Consultant lead confirmed',      'status' => 'Complete', 'owner' => 'Admin Support',           'note' => 'Lead consultant assignment is current.',                'action_label' => 'Open Workspace',    'action_href' => path('/mampan/consultant/projects/project-workspace')],
      ['label' => 'Target rating confirmed',        'status' => 'Complete', 'owner' => 'Lead Consultant',         'note' => 'Gold threshold retained after latest score review.',    'action_label' => 'Open Gap Report',   'action_href' => path('/mampan/consultant/reports/gap-analysis-report')],
    ],
  ],
  [
    'title' => 'B. Document Register',
    'items' => [
      ['label' => 'Required drawings submitted',             'status' => 'Pending',  'owner' => 'Client Design Coordinator', 'note' => 'MEP schematic upload pending final layer check.',   'action_label' => 'Open Documents',    'action_href' => path('/mampan/consultant/documents/document-hub')],
      ['label' => 'Latest revisions used',                   'status' => 'Complete', 'owner' => 'Technical Coordinator',      'note' => 'Register references latest Rev C set.',             'action_label' => 'Open Documents',    'action_href' => path('/mampan/consultant/documents/document-hub')],
      ['label' => 'Missing documents resolved',              'status' => 'Pending',  'owner' => 'Mechanical Engineer',        'note' => 'EE2 trend workbook still incomplete.',              'action_label' => 'Open Documents',    'action_href' => path('/mampan/consultant/documents/document-hub')],
      ['label' => 'Documents needing revision cleared',      'status' => 'At Risk',  'owner' => 'Procurement Manager',        'note' => 'EQ4 VOC certificate needs final issuer signature.', 'action_label' => 'Open Clarifications','action_href' => path('/mampan/consultant/rfi/rfi-index')],
      ['label' => 'Document register exported',              'status' => 'Complete', 'owner' => 'Project Analyst',             'note' => 'Latest document register attached to package Rev 2.','action_label' => 'Open Gap Report',   'action_href' => path('/mampan/consultant/reports/gap-analysis-report')],
    ],
  ],
  [
    'title' => 'C. Clarifications',
    'items' => [
      ['label' => 'All high-priority clarifications closed', 'status' => 'Pending',  'owner' => 'Lead Consultant',        'note' => 'RFI #006 and #007 remain open.',                          'action_label' => 'Open Clarifications', 'action_href' => path('/mampan/consultant/rfi/rfi-index')],
      ['label' => 'No overdue client responses',             'status' => 'At Risk',  'owner' => 'Client PIC',             'note' => 'One item exceeded agreed response SLA.',                 'action_label' => 'Open Clarifications', 'action_href' => path('/mampan/consultant/rfi/rfi-index')],
      ['label' => 'Clarification decisions documented',      'status' => 'Complete', 'owner' => 'Technical Coordinator',   'note' => 'Decision log linked to affected credits.',               'action_label' => 'Open Clarifications', 'action_href' => path('/mampan/consultant/rfi/rfi-index')],
      ['label' => 'RFI log exported',                        'status' => 'Complete', 'owner' => 'Project Analyst',         'note' => 'RFI export included in submission appendix.',            'action_label' => 'Open Submission',     'action_href' => path('/mampan/consultant/submission/submission-export')],
    ],
  ],
  [
    'title' => 'D. Evidence Verification',
    'items' => [
      ['label' => 'All targeted credits reviewed',           'status' => 'Pending',  'owner' => 'GBI Review Team',        'note' => 'WE3 and EQ4 still under final review.',                     'action_label' => 'Open Evidence', 'action_href' => path('/mampan/consultant/evidence/evidence-index')],
      ['label' => 'Verified evidence linked to credits',     'status' => 'Complete', 'owner' => 'Project Analyst',        'note' => 'Link map includes all verified files and versions.',        'action_label' => 'Open Evidence', 'action_href' => path('/mampan/consultant/evidence/evidence-index')],
      ['label' => 'Rejected evidence excluded',              'status' => 'Complete', 'owner' => 'Technical Coordinator',  'note' => 'Rejected MR2 draft removed from package selection.',        'action_label' => 'Open Evidence', 'action_href' => path('/mampan/consultant/evidence/evidence-index')],
      ['label' => 'Points at risk reviewed',                 'status' => 'Complete', 'owner' => 'Lead Consultant',        'note' => 'Risk points acknowledged in latest score summary.',         'action_label' => 'Open Gap Report','action_href' => path('/mampan/consultant/reports/gap-analysis-report')],
      ['label' => 'Evidence decision log completed',         'status' => 'Pending',  'owner' => 'GBI Review Team',        'note' => 'Final sign-off note pending for EE2 evidence entry.',       'action_label' => 'Open Evidence', 'action_href' => path('/mampan/consultant/evidence/evidence-index')],
    ],
  ],
  [
    'title' => 'E. Gap Analysis Report',
    'items' => [
      ['label' => 'Executive summary completed',             'status' => 'Complete',       'owner' => 'Lead Consultant',     'note' => 'Executive summary aligned with steering committee.',  'action_label' => 'Open Gap Report', 'action_href' => path('/mampan/consultant/reports/gap-analysis-report')],
      ['label' => 'Score summary reviewed',                  'status' => 'Complete',       'owner' => 'Project Analyst',     'note' => 'Verified and potential scores validated.',            'action_label' => 'Open Gap Report', 'action_href' => path('/mampan/consultant/reports/gap-analysis-report')],
      ['label' => 'Risk credits documented',                 'status' => 'Complete',       'owner' => 'Technical Coordinator','note' => 'EE2, EQ4, and WE3 risk narratives completed.',         'action_label' => 'Open Gap Report', 'action_href' => path('/mampan/consultant/reports/gap-analysis-report')],
      ['label' => 'Client action list closed or acknowledged','status' => 'Pending',       'owner' => 'Client Project Director','note' => 'Two actions acknowledged, one still pending closure.', 'action_label' => 'Open Gap Report', 'action_href' => path('/mampan/consultant/reports/gap-analysis-report')],
      ['label' => 'Report version approved',                 'status' => 'Complete',       'owner' => 'Lead Consultant',     'note' => 'Rev 3 approved for submission package reference.',    'action_label' => 'Open Gap Report', 'action_href' => path('/mampan/consultant/reports/gap-analysis-report')],
    ],
  ],
  [
    'title' => 'F. Client Sign-off',
    'items' => [
      ['label' => 'Client reviewed final package',           'status' => 'Pending',       'owner' => 'Client Project Director', 'note' => 'Client review window open until 2026-05-02.',              'action_label' => 'Open Export', 'action_href' => path('/mampan/consultant/submission/submission-export')],
      ['label' => 'Client acknowledged remaining risks',     'status' => 'Pending',       'owner' => 'Client Project Director', 'note' => 'Risk acknowledgement form not yet signed.',                 'action_label' => 'Open Export', 'action_href' => path('/mampan/consultant/submission/submission-export')],
      ['label' => 'Consultant sign-off completed',           'status' => 'Complete',      'owner' => 'Ir. Aisyah Kamaruddin',  'note' => 'Consultant declaration signed and attached.',               'action_label' => 'Open Export', 'action_href' => path('/mampan/consultant/submission/submission-export')],
      ['label' => 'Submission approval recorded',            'status' => 'Not Applicable','owner' => 'QA Administrator',        'note' => 'Will be recorded after client sign-off completion.',        'action_label' => 'Open Submission', 'action_href' => path('/mampan/consultant/submission/submission-package')],
    ],
  ],
];

$readiness_data = [
  'overall_readiness'     => '84%',
  'readiness_status'      => 'Almost Ready',
  'readiness_explanation' => 'Checklist is largely complete. Close client sign-off tasks and two evidence-related gaps before export lock.',
  'source_progress'       => [
    ['label' => 'Project Information', 'value' => '100%'],
    ['label' => 'Documents',           'value' => '80%'],
    ['label' => 'Clarifications',      'value' => '75%'],
    ['label' => 'Evidence',            'value' => '80%'],
    ['label' => 'Gap Report',          'value' => '90%'],
    ['label' => 'Client Sign-off',     'value' => '50%'],
  ],
];

$blocking_items = [
  [
    'title'         => 'EE2 trend logs need full 3-month sequence',
    'source_module' => 'Evidence Verification',
    'linked_item'   => 'EE2 monitoring evidence package',
    'owner'         => 'Mechanical Engineer (Client)',
    'priority'      => 'High',
    'due_date'      => '2026-04-27',
    'action_label'  => 'Open Evidence',
    'action_href'   => path('/mampan/consultant/evidence/evidence-index'),
  ],
  [
    'title'         => 'Client risk acknowledgement page unsigned',
    'source_module' => 'Submission',
    'linked_item'   => 'Client sign-off declaration',
    'owner'         => 'Client Project Director',
    'priority'      => 'High',
    'due_date'      => '2026-05-02',
    'action_label'  => 'Open Export',
    'action_href'   => path('/mampan/consultant/submission/submission-export'),
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

  <section aria-labelledby="submission-checklist-summary-heading">
    <h2 id="submission-checklist-summary-heading" class="sr-only">Submission checklist summary cards</h2>
    <div class="grid gap-3 md:grid-cols-3">
      <?php foreach ($summary_cards as $summary_card): ?>
        <?php component('submission/submission-summary-card', $summary_card); ?>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Submission checklist and sidebar">
    <div class="space-y-5 xl:col-span-8">
      <?php component('submission/submission-checklist', ['groups' => $checklist_groups]); ?>
    </div>

    <aside class="space-y-5 xl:col-span-4" aria-label="Checklist readiness sidebar">
      <?php component('submission/submission-readiness', $readiness_data); ?>
      <?php component('submission/submission-blocking-items', ['blocking_items' => $blocking_items]); ?>
    </aside>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
