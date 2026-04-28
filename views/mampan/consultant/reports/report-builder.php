<?php

declare(strict_types=1);

$page_title   = 'Report Builder';

require __DIR__ . '/../_data/phase_data.php';
$current_phase = resolve_mampan_current_phase($phase_data_map);
$current_phase_data = $phase_data_map[$current_phase];
$page_current = 'consultant-reports';
$project_current = 'project-reports';
$workspace_phase_data = isset($current_phase_data['workspace']) && is_array($current_phase_data['workspace'])
  ? $current_phase_data['workspace']
  : [];
$reports_phase_data = isset($current_phase_data['reports']) && is_array($current_phase_data['reports'])
  ? $current_phase_data['reports']
  : [];
$reports_state = isset($reports_phase_data['state']) ? (string) $reports_phase_data['state'] : 'initial';
$reports_message = isset($reports_phase_data['message'])
  ? (string) $reports_phase_data['message']
  : 'Initial gap analysis not yet generated.';
$workspace_readiness = isset($workspace_phase_data['requirement_readiness'])
  ? (string) $workspace_phase_data['requirement_readiness']
  : '0%';
$workspace_documents = isset($workspace_phase_data['documents']) ? (string) $workspace_phase_data['documents'] : '0';
$workspace_clarifications = isset($workspace_phase_data['clarifications']) ? (string) $workspace_phase_data['clarifications'] : '0';
$workspace_evidence_verified = isset($workspace_phase_data['evidence_verified']) ? (string) $workspace_phase_data['evidence_verified'] : '0';
$report_builder_status_label_map = [
  'initial' => 'Needs Update',
  'draft'   => 'In Progress',
  'updated' => 'Updated',
  'final'   => 'Ready',
];
$report_builder_status_label = isset($report_builder_status_label_map[$reports_state])
  ? $report_builder_status_label_map[$reports_state]
  : 'Needs Update';
$report_builder_status_tone = $reports_state === 'final'
  ? 'positive'
  : ($reports_state === 'updated' ? 'neutral' : 'warning');

$module_nav_links = [
  ['label' => 'Workspace',      'href' => path('/mampan/consultant/projects/project-workspace')],
  ['label' => 'Documents',      'href' => path('/mampan/consultant/documents/document-hub')],
  ['label' => 'Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index')],
  ['label' => 'Evidence',       'href' => path('/mampan/consultant/evidence/evidence-index')],
  ['label' => 'Gap Report',     'href' => path('/mampan/consultant/reports/gap-analysis-report')],
];

$builder_sections = [
  [
    'title'        => 'Executive Summary',
    'helper_text'  => 'Summarise current score position, confidence level, and main blockers.',
    'status'       => 'Complete',
    'status_tone'  => 'positive',
    'source_label' => 'Workspace',
    'source_url'   => path('/mampan/consultant/projects/project-workspace'),
    'content'      => 'Current estimated score remains within Gold threshold, but verified score is still behind due to unresolved EE2, EQ4, WE3, and MR2 evidence items.',
  ],
  [
    'title'        => 'Score Commentary',
    'helper_text'  => 'Explain changes between current, potential, and verified score values.',
    'status'       => 'Needs Update',
    'status_tone'  => 'warning',
    'source_label' => 'Evidence',
    'source_url'   => path('/mampan/consultant/evidence/evidence-index'),
    'content'      => 'Verified score improved after WE1 confirmation, but MR2 and EE2 still carry risk impact to final confidence range.',
  ],
  [
    'title'        => 'Criteria Notes',
    'helper_text'  => 'Capture criteria-specific remarks (EE, EQ, SM, MR, WE, IN).',
    'status'       => 'Draft',
    'status_tone'  => 'neutral',
    'source_label' => 'Gap Report',
    'source_url'   => path('/mampan/consultant/reports/gap-analysis-report'),
    'content'      => 'EE remains the most sensitive criteria; WE and SM are stable with minor evidence closure actions.',
  ],
  [
    'title'        => 'Risk Credit Notes',
    'helper_text'  => 'Document reasons each at-risk credit may reduce rating confidence.',
    'status'       => 'Complete',
    'status_tone'  => 'positive',
    'source_label' => 'Clarifications',
    'source_url'   => path('/mampan/consultant/rfi/rfi-index'),
    'content'      => 'EE2 and MR2 require immediate closure. EQ4 remains dependent on corrected certificate wording.',
  ],
  [
    'title'        => 'Missing Evidence Notes',
    'helper_text'  => 'List evidence gaps and expected closure owner/timeline.',
    'status'       => 'Needs Update',
    'status_tone'  => 'warning',
    'source_label' => 'Documents',
    'source_url'   => path('/mampan/consultant/documents/document-hub'),
    'content'      => 'Awaiting revised AHU balancing attachment and WE3 O&M calibration note before package lock.',
  ],
  [
    'title'        => 'Recommendations',
    'helper_text'  => 'Set practical consultant recommendations tied to score impact.',
    'status'       => 'Complete',
    'status_tone'  => 'positive',
    'source_label' => 'Evidence',
    'source_url'   => path('/mampan/consultant/evidence/evidence-index'),
    'content'      => 'Prioritise EE2 closure, then finalise EQ4 and MR2 documents before steering committee sign-off.',
  ],
  [
    'title'        => 'Client Actions',
    'helper_text'  => 'Confirm assigned owners, deadlines, and status for all required client actions.',
    'status'       => 'In Progress',
    'status_tone'  => 'neutral',
    'source_label' => 'Project Workspace',
    'source_url'   => path('/mampan/consultant/projects/project-workspace'),
    'content'      => 'Client team acknowledged EE2 and WE3 actions; procurement responses for EQ4 and MR2 still pending.',
  ],
  [
    'title'        => 'Next Steps',
    'helper_text'  => 'Define immediate next milestone toward final submission package.',
    'status'       => 'Draft',
    'status_tone'  => 'neutral',
    'source_label' => 'Gap Report',
    'source_url'   => path('/mampan/consultant/reports/gap-analysis-report'),
    'content'      => 'Run final score confidence check after closure of high-priority credits, then prepare final submission packet.',
  ],
];

$export_panel = [
  'report_readiness'  => 'Builder status: ' . $workspace_readiness,
  'included_sections' => [
    'Executive Summary',
    'Risk Credit Notes',
    'Recommendations',
    'Client Action List',
  ],
  'missing_sections'  => [
    'Updated score commentary',
    'Final missing evidence notes',
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
  'current_phase'       => $current_phase,
  'phase_data_map'      => $phase_data_map,
  'phase_label_map'     => $phase_label_map,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <header class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="report-builder-heading">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Gap Analysis Report Builder</p>
        <h1 id="report-builder-heading" class="mt-1 text-2xl font-semibold text-brand-900 md:text-3xl">Build Report Narrative</h1>
        <p class="mt-1 text-sm text-brand-600">Project: Menara Harmoni Office Retrofit | Version: Rev 3 Draft</p>
        <p class="mt-1 text-sm text-brand-500"><?= e($reports_message); ?></p>
      </div>
      <div class="flex flex-wrap gap-2">
        <?php component('button', ['label' => 'Save Draft',    'href' => '#',                                   'variant' => 'default']); ?>
        <?php component('button', ['label' => 'Preview Report','href' => path('/mampan/consultant/reports/report-preview'), 'variant' => 'default']); ?>
        <?php component('button', ['label' => 'Export PDF',    'href' => '#',                                   'variant' => 'primary']); ?>
      </div>
    </div>
  </header>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Report builder layout">
    <div class="space-y-5 xl:col-span-8">
      <?php foreach ($builder_sections as $builder_section): ?>
        <?php
        $section_title       = (string) $builder_section['title'];
        $section_helper_text = (string) $builder_section['helper_text'];
        $section_status      = (string) $builder_section['status'];
        $section_status_tone = (string) $builder_section['status_tone'];
        $section_source_label = (string) $builder_section['source_label'];
        $section_source_url  = (string) $builder_section['source_url'];
        $section_content     = (string) $builder_section['content'];
        $field_name          = 'builder_' . strtolower((string) preg_replace('/[^a-z0-9]+/i', '_', $section_title));
        ?>
        <section class="rounded-lg border border-brand-200 bg-white p-5" aria-label="<?= e($section_title); ?> editor">
          <header class="border-b border-brand-200 pb-4">
            <div class="flex flex-wrap items-center justify-between gap-2">
              <h2 class="text-lg font-semibold text-brand-900"><?= e($section_title); ?></h2>
              <?php component('badge', ['items' => [['label' => $section_status, 'tone' => $section_status_tone]]]); ?>
            </div>
            <p class="mt-1 text-sm text-brand-600"><?= e($section_helper_text); ?></p>
          </header>

          <div class="mt-4 space-y-3">
            <?php component('fields', [
              'label'       => 'Section Notes',
              'helper_text' => 'Draft narrative aligned with current source data.',
              'class'       => 'space-y-2',
              'control'     => [
                'component' => 'textarea',
                'props'     => [
                  'name'  => $field_name,
                  'rows'  => 4,
                  'value' => $section_content,
                ],
              ],
            ]); ?>

            <div class="flex flex-wrap items-center gap-2">
              <p class="text-xs uppercase tracking-wide text-brand-500">Source Module</p>
              <?php component('button', ['label' => $section_source_label, 'href' => $section_source_url, 'size' => 'sm', 'variant' => 'default']); ?>
            </div>
          </div>
        </section>
      <?php endforeach; ?>
    </div>

    <div class="space-y-5 xl:col-span-4">
      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="builder-overview-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="builder-overview-heading" class="text-lg font-semibold text-brand-900">Report Completeness</h2>
        </header>

        <dl class="mt-4 space-y-3">
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Report Completeness</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($workspace_readiness); ?></dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Data Source Freshness</dt>
            <dd class="mt-1 font-medium text-brand-900">Updated 2 hours ago</dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Open Clarifications Count</dt>
            <dd class="mt-1 font-medium text-negative-700"><?= e($workspace_clarifications); ?></dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Evidence Under Review Count</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($workspace_evidence_verified); ?></dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Missing Documents Count</dt>
            <dd class="mt-1 font-medium text-negative-700"><?= e($workspace_documents); ?></dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Export Readiness Status</dt>
            <dd class="mt-1">
              <?php component('badge', ['items' => [['label' => $report_builder_status_label, 'tone' => $report_builder_status_tone]]]); ?>
            </dd>
          </div>
        </dl>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="builder-source-links-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="builder-source-links-heading" class="text-lg font-semibold text-brand-900">Source Data Links</h2>
        </header>
        <div class="mt-4 grid gap-2">
          <?php component('button', ['label' => 'Documents',      'href' => path('/mampan/consultant/documents/document-hub'),      'size' => 'sm', 'variant' => 'default']); ?>
          <?php component('button', ['label' => 'Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index'),               'size' => 'sm', 'variant' => 'default']); ?>
          <?php component('button', ['label' => 'Evidence',       'href' => path('/mampan/consultant/evidence/evidence-index'),     'size' => 'sm', 'variant' => 'default']); ?>
          <?php component('button', ['label' => 'Workspace',      'href' => path('/mampan/consultant/projects/project-workspace'),  'size' => 'sm', 'variant' => 'default']); ?>
        </div>
      </section>

      <?php component('reports/report-export-panel', $export_panel); ?>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
