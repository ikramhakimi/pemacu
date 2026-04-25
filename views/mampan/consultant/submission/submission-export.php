<?php

declare(strict_types=1);

$page_title   = 'Submission Export';
$page_current = 'consultant-submission';
$project_current = 'project-submission';

$module_nav_links = [
  ['label' => 'Workspace',      'href' => path('/mampan/consultant/projects/project-workspace')],
  ['label' => 'Documents',      'href' => path('/mampan/consultant/documents/document-hub')],
  ['label' => 'Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index')],
  ['label' => 'Evidence',       'href' => path('/mampan/consultant/evidence/evidence-index')],
  ['label' => 'Gap Report',     'href' => path('/mampan/consultant/reports/gap-analysis-report')],
  ['label' => 'Submission',     'href' => path('/mampan/consultant/submission/submission-export'), 'active' => true],
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
  'last_updated'     => '2026-04-24 17:25',
  'action_items'     => [
    ['label' => 'Back to Submission', 'tone' => 'default', 'href' => path('/mampan/consultant/submission/submission-package')],
    ['label' => 'View Checklist',     'tone' => 'default', 'href' => path('/mampan/consultant/submission/submission-checklist')],
    ['label' => 'Generate Export',    'tone' => 'primary', 'href' => '#'],
  ],
];

$summary_cards = [
  ['label' => 'Export Readiness',     'value' => '82%',             'helper' => '1 blocking error remains',                     'tone' => 'warning',  'icon_name' => 'send-plane-2-line'],
  ['label' => 'Package Version',      'value' => 'Rev 2 (Draft)',   'helper' => 'Lock required before final submission',       'tone' => 'neutral',  'icon_name' => 'archive-stack-line'],
  ['label' => 'Validation Status',    'value' => '42 Passed / 1 Error', 'helper' => '2 warnings still open',                    'tone' => 'warning',  'icon_name' => 'shield-star-line'],
];

$export_panel = [
  'package_contents' => [
    ['label' => 'Project information summary',   'included' => true,  'status' => 'Included', 'file_count' => '3',  'last_updated' => '2026-04-24 12:30'],
    ['label' => 'Gap analysis report',           'included' => true,  'status' => 'Included', 'file_count' => '1',  'last_updated' => '2026-04-24 14:15'],
    ['label' => 'Final score summary',           'included' => true,  'status' => 'Included', 'file_count' => '1',  'last_updated' => '2026-04-24 14:20'],
    ['label' => 'Document register',             'included' => true,  'status' => 'Included', 'file_count' => '50', 'last_updated' => '2026-04-24 15:02'],
    ['label' => 'Evidence register',             'included' => true,  'status' => 'Included', 'file_count' => '48', 'last_updated' => '2026-04-24 15:30'],
    ['label' => 'Clarification/RFI log',         'included' => true,  'status' => 'Included', 'file_count' => '22', 'last_updated' => '2026-04-24 15:45'],
    ['label' => 'Verified evidence files',       'included' => true,  'status' => 'Partial',  'file_count' => '42', 'last_updated' => '2026-04-24 16:05'],
    ['label' => 'Client sign-off page',          'included' => true,  'status' => 'Missing',  'file_count' => '0',  'last_updated' => '2026-04-24 10:15'],
  ],
  'export_options' => [
    ['label' => 'Full Submission Package',          'description' => 'Complete pack for GBI submission.',                     'href' => '#'],
    ['label' => 'Client Review Copy',               'description' => 'Client-facing package with risk notes.',               'href' => '#'],
    ['label' => 'Internal Consultant Copy',         'description' => 'Includes internal checklist and QA notes.',            'href' => '#'],
    ['label' => 'Evidence Register Only',           'description' => 'Verification evidence tracker export only.',           'href' => '#'],
    ['label' => 'Document Register Only',           'description' => 'Document control register export only.',               'href' => '#'],
    ['label' => 'RFI / Clarification Log Only',     'description' => 'Clarification history and closure status export.',     'href' => '#'],
  ],
  'validation_results' => [
    ['type' => 'Passed',  'text' => '42 verified evidence files included and linked to GBI credits.'],
    ['type' => 'Passed',  'text' => 'Final score summary matches latest approved gap report revision.'],
    ['type' => 'Warning', 'text' => '2 credits still marked at risk (EE2 and EQ4).'],
    ['type' => 'Warning', 'text' => '1 clarification remains awaiting client attachment update.'],
    ['type' => 'Error',   'text' => 'Client sign-off missing for final package declaration page.'],
  ],
];

$export_readiness = [
  'overall_readiness'     => '82%',
  'readiness_status'      => 'Almost Ready',
  'readiness_explanation' => 'Export can proceed for internal review copy, but final submission export should wait until client sign-off is completed.',
  'source_progress'       => [
    ['label' => 'Package Contents',   'value' => '88%'],
    ['label' => 'Validation Checks',  'value' => '90%'],
    ['label' => 'Consultant Sign-off','value' => '100%'],
    ['label' => 'Client Sign-off',    'value' => '40%'],
  ],
];

$signoff_panel = [
  'consultant_signoff_status' => 'Completed',
  'client_signoff_status'     => 'Requested',
  'final_approval_status'     => 'Blocked',
  'action_items'              => [
    ['label' => 'Request Client Sign-off',   'href' => '#', 'tone' => 'primary'],
    ['label' => 'Mark Consultant Approved',  'href' => '#', 'tone' => 'default'],
    ['label' => 'Lock Package Version',      'href' => '#', 'tone' => 'default'],
  ],
];

$history_columns = [
  ['label' => 'Package Version', 'key' => 'package_version'],
  ['label' => 'Exported By', 'key' => 'exported_by'],
  ['label' => 'Timestamp', 'key' => 'timestamp'],
  ['label' => 'Export Type', 'key' => 'export_type'],
  ['label' => 'Status', 'key' => 'status'],
];

$history_rows = [];

$history_records = [
  ['package_version' => 'Rev 2 Draft', 'exported_by' => 'Project Analyst',       'timestamp' => '2026-04-24 16:40', 'export_type' => 'Client Review Copy',       'status' => 'Completed'],
  ['package_version' => 'Rev 2 Draft', 'exported_by' => 'Technical Coordinator', 'timestamp' => '2026-04-24 15:58', 'export_type' => 'Internal Consultant Copy', 'status' => 'Completed'],
  ['package_version' => 'Rev 1',       'exported_by' => 'Project Analyst',       'timestamp' => '2026-04-22 18:12', 'export_type' => 'Full Submission Package',  'status' => 'Archived'],
];

$status_tone_map = [
  'Completed' => 'positive',
  'Archived'  => 'neutral',
  'Failed'    => 'negative',
];

foreach ($history_records as $history_record) {
  $status = isset($history_record['status']) ? trim((string) $history_record['status']) : 'Archived';
  $tone   = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';

  ob_start();
  component('badge', ['items' => [['label' => $status, 'tone' => $tone]]]);
  $status_html = (string) ob_get_clean();

  $history_rows[] = [
    'package_version' => isset($history_record['package_version']) ? (string) $history_record['package_version'] : '-',
    'exported_by'     => isset($history_record['exported_by']) ? (string) $history_record['exported_by'] : '-',
    'timestamp'       => isset($history_record['timestamp']) ? (string) $history_record['timestamp'] : '-',
    'export_type'     => isset($history_record['export_type']) ? (string) $history_record['export_type'] : '-',
    'status'          => ['content' => $status_html, 'is_html' => true],
  ];
}

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <?php component('submission/submission-header', $submission_header); ?>

  <section aria-labelledby="submission-export-summary-heading">
    <h2 id="submission-export-summary-heading" class="sr-only">Submission export summary cards</h2>
    <div class="grid gap-3 md:grid-cols-3">
      <?php foreach ($summary_cards as $summary_card): ?>
        <?php component('submission/submission-summary-card', $summary_card); ?>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Submission export content and side panels">
    <div class="space-y-5 xl:col-span-8">
      <?php component('submission/submission-export-panel', $export_panel); ?>
    </div>

    <aside class="space-y-5 xl:col-span-4" aria-label="Submission export sidebar">
      <?php component('submission/submission-readiness', $export_readiness); ?>
      <?php component('submission/submission-signoff-panel', $signoff_panel); ?>

      <section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="submission-export-history-heading">
        <header class="border-b border-zinc-200 pb-4">
          <h2 id="submission-export-history-heading" class="text-lg font-semibold text-zinc-900">Recent Export History</h2>
        </header>

        <div class="mt-4 overflow-x-auto">
          <?php component('table', [
            'columns'       => $history_columns,
            'rows'          => $history_rows,
            'appearance'    => 'basic',
            'caption'       => 'Recent submission export history table',
            'class_name'    => 'min-w-[760px]',
            'empty_title'   => 'No export history yet',
            'empty_message' => 'Generate your first package export.',
          ]); ?>
        </div>
      </section>
    </aside>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
