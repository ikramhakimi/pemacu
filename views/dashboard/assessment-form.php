<?php

declare(strict_types=1);

$page_title   = 'Assessment Form';
$page_current = 'dashboard';

layout('dashboard/partials/dashboard-start', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'dashboard_no_sidebar' => true,
]);

$assessment_bars = [
  [
    'assessment_bar_code'        => 'EE1',
    'assessment_bar_title'       => 'Minimum EE Performance',
    'assessment_bar_status'      => 'completed',
    'assessment_bar_score'       => '1:1',
    'assessment_bar_files'       => 2,
    'assessment_bar_has_remarks' => true,
  ],
  [
    'assessment_bar_code'        => 'EE2',
    'assessment_bar_title'       => 'Lighting Zoning',
    'assessment_bar_status'      => 'in_progress',
    'assessment_bar_score'       => '',
    'assessment_bar_files'       => 4,
    'assessment_bar_has_remarks' => true,
  ],
  [
    'assessment_bar_code'        => 'EE3',
    'assessment_bar_title'       => 'Electrical sub-metering & Tenant sub-metering',
    'assessment_bar_status'      => 'in_progress',
    'assessment_bar_score'       => '',
    'assessment_bar_files'       => 1,
    'assessment_bar_has_remarks' => false,
  ],
  [
    'assessment_bar_code'        => 'EE4',
    'assessment_bar_title'       => 'Renewable Energy',
    'assessment_bar_status'      => 'missing_evidence',
    'assessment_bar_score'       => '',
    'assessment_bar_files'       => 7,
    'assessment_bar_has_remarks' => true,
  ],
  [
    'assessment_bar_code'        => 'EE5',
    'assessment_bar_title'       => 'Advanced EE Performance',
    'assessment_bar_status'      => 'not_started',
    'assessment_bar_score'       => '',
    'assessment_bar_files'       => 0,
    'assessment_bar_has_remarks' => false,
  ],
];

$assessment_sections = [
  [
    'title' => 'Design',
    'rows'  => $assessment_bars,
  ],
  [
    'title' => 'Commissioning',
    'rows'  => $assessment_bars,
  ],
];
?>
<article class="app-article mx-auto max-w-6xl">
  <header class="border-b border-brand-200 pb-6">
    <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Assessment Workspace</p>
    <h1 class="mt-2 text-3xl font-semibold leading-tight text-brand-900">Credit Assessment</h1>
    <p class="mt-2 max-w-3xl text-sm text-brand-600">
      Review each credit as a focused record card with progress, evidence status, and quick next action.
    </p>
  </header>

  <section class="mt-6" aria-labelledby="assessment-records-heading">
    <div class="flex items-center justify-between gap-3">
      <h2 id="assessment-records-heading" class="text-lg font-semibold text-brand-900">Assessment Records</h2>
      <p class="text-sm text-brand-500">2 of 35 credits shown</p>
    </div>

    <div class="bg-white p-5 flex items-center gap-8 rounded-lg border border-brand-300 mb-20">
      <div class="flex items-center justify-start gap-2">
        <?php component('dashboard/assessment-status', ['assessment_status' => 'not_started']); ?>
        <div>Not Started</div>
      </div>
      <div class="flex items-center justify-start gap-2">
        <?php component('dashboard/assessment-status', ['assessment_status' => 'in_progress']); ?>
        <div>In Progress</div>
      </div>
      <div class="flex items-center justify-start gap-2">
        <?php component('dashboard/assessment-status', ['assessment_status' => 'completed']); ?>
        <div>Completed</div>
      </div>
      <div class="flex items-center justify-start gap-2">
        <?php component('dashboard/assessment-status', ['assessment_status' => 'missing_evidence']); ?>
        <div>Missing Evidence</div>
      </div>
    </div>

    <div class="bg-brand-900 rounded-lg p-1">
      <div class="px-4 py-3">
        <h3 class="text-xl text-white font-medium">Energy Efficiency (EE)</h3>
      </div>

      <div class="space-y-1">
        <?php foreach ($assessment_sections as $assessment_section): ?>
          <?php
          $not_started_count = 0;
          $in_progress_count = 0;
          $completed_count = 0;
          $missing_evidence_count = 0;

          foreach ($assessment_section['rows'] as $assessment_row) {
            $status = isset($assessment_row['assessment_bar_status']) ? (string) $assessment_row['assessment_bar_status'] : 'not_started';

            if ($status === 'not_started') {
              $not_started_count++;
            } elseif ($status === 'in_progress') {
              $in_progress_count++;
            } elseif ($status === 'completed') {
              $completed_count++;
            } elseif ($status === 'missing_evidence') {
              $missing_evidence_count++;
            }
          }
          ?>
          <section class="bg-brand-50 rounded-lg p-4">
            <header class="flex items-center justify-between mb-4">
              <h4 class="font-medium text-base text-brand-900"><?= e((string) $assessment_section['title']); ?></h4>
              <div class="font-mono flex items-center gap-6">
                <div class="flex items-center justify-start gap-2">
                  <?php component('dashboard/assessment-status', ['assessment_status' => 'not_started']); ?>
                  <div><?= e((string) $not_started_count); ?></div>
                </div>
                <div class="flex items-center justify-start gap-2">
                  <?php component('dashboard/assessment-status', ['assessment_status' => 'in_progress']); ?>
                  <div><?= e((string) $in_progress_count); ?></div>
                </div>
                <div class="flex items-center justify-start gap-2">
                  <?php component('dashboard/assessment-status', ['assessment_status' => 'completed']); ?>
                  <div><?= e((string) $completed_count); ?></div>
                </div>
                <div class="flex items-center justify-start gap-2">
                  <?php component('dashboard/assessment-status', ['assessment_status' => 'missing_evidence']); ?>
                  <div><?= e((string) $missing_evidence_count); ?></div>
                </div>
              </div>
            </header>

            <div class="space-y-1">
              <?php foreach ($assessment_section['rows'] as $assessment_row): ?>
                <?php component('dashboard/assessment-bar', $assessment_row); ?>
              <?php endforeach; ?>
            </div>
          </section>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</article>

<?php layout('dashboard/partials/dashboard-end'); ?>
