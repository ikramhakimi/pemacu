<?php

declare(strict_types=1);

$evidence_rows = isset($evidence_rows) && is_array($evidence_rows) ? $evidence_rows : [];

$status_tone_map = [
  'Not Submitted'          => 'neutral',
  'Submitted'              => 'neutral',
  'Under Review'           => 'warning',
  'Need Revision'          => 'warning',
  'Verified'               => 'positive',
  'Rejected'               => 'negative',
  'Waived / Not Applicable' => 'neutral',
];

$impact_tone_map = [
  'Verified' => 'positive',
  'At Risk'  => 'negative',
  'Pending'  => 'warning',
  'Neutral'  => 'neutral',
];

$table_columns = [
  ['label' => 'GBI Credit', 'key' => 'gbi_credit'],
  ['label' => 'Evidence Required', 'key' => 'evidence_required'],
  ['label' => 'Linked Documents', 'key' => 'linked_documents'],
  ['label' => 'Submitted By', 'key' => 'submitted_by'],
  ['label' => 'Review Status', 'key' => 'review_status'],
  ['label' => 'Score Impact', 'key' => 'score_impact'],
  ['label' => 'Action', 'key' => 'action'],
];

$table_rows = [];

foreach ($evidence_rows as $row) {
  $credit_code         = isset($row['credit_code']) ? trim((string) $row['credit_code']) : '-';
  $credit_title        = isset($row['credit_title']) ? trim((string) $row['credit_title']) : '-';
  $criteria_group      = isset($row['criteria_group']) ? trim((string) $row['criteria_group']) : '-';
  $evidence_summary    = isset($row['evidence_summary']) ? trim((string) $row['evidence_summary']) : '-';
  $linked_count        = isset($row['linked_count']) ? trim((string) $row['linked_count']) : '0';
  $main_document       = isset($row['main_document']) ? trim((string) $row['main_document']) : '-';
  $submitted_by        = isset($row['submitted_by']) ? trim((string) $row['submitted_by']) : '-';
  $reviewer            = isset($row['reviewer']) ? trim((string) $row['reviewer']) : '-';
  $status              = isset($row['status']) ? trim((string) $row['status']) : 'Not Submitted';
  $score_impact        = isset($row['score_impact']) ? trim((string) $row['score_impact']) : '-';
  $impact_tone         = isset($row['impact_tone']) ? trim((string) $row['impact_tone']) : 'Neutral';
  $view_url            = isset($row['view_url']) ? trim((string) $row['view_url']) : '#';
  $review_url          = isset($row['review_url']) ? trim((string) $row['review_url']) : '#';
  $revision_url        = isset($row['revision_url']) ? trim((string) $row['revision_url']) : '#';
  $status_tone         = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
  $score_impact_tone   = isset($impact_tone_map[$impact_tone]) ? $impact_tone_map[$impact_tone] : 'neutral';

  ob_start();
  ?>
  <div>
    <p class="font-medium text-brand-900"><?= e($credit_code); ?></p>
    <p class="mt-1 text-xs text-brand-600"><?= e($credit_title); ?></p>
    <p class="mt-1 text-xs text-brand-500">Criteria: <?= e($criteria_group); ?></p>
  </div>
  <?php
  $gbi_credit_html = (string) ob_get_clean();

  ob_start();
  ?>
  <p class="text-sm text-brand-800"><?= e($evidence_summary); ?></p>
  <?php
  $evidence_required_html = (string) ob_get_clean();

  ob_start();
  ?>
  <div>
    <p class="font-medium text-brand-900"><?= e($linked_count); ?> linked document(s)</p>
    <p class="mt-1 text-xs text-brand-600"><?= e($main_document); ?></p>
  </div>
  <?php
  $linked_documents_html = (string) ob_get_clean();

  ob_start();
  ?>
  <div>
    <p class="font-medium text-brand-900"><?= e($submitted_by); ?></p>
    <p class="mt-1 text-xs text-brand-600">Reviewer: <?= e($reviewer); ?></p>
  </div>
  <?php
  $submitted_by_html = (string) ob_get_clean();

  ob_start();
  component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]);
  $review_status_html = (string) ob_get_clean();

  ob_start();
  ?>
  <div>
    <?php component('badge', ['items' => [['label' => $score_impact, 'tone' => $score_impact_tone]]]); ?>
  </div>
  <?php
  $score_impact_html = (string) ob_get_clean();

  ob_start();
  ?>
  <div class="flex flex-wrap gap-1">
    <?php component('button', ['label' => 'View', 'href' => $view_url, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
    <?php component('button', ['label' => 'Review Evidence', 'href' => $review_url, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
    <?php component('button', ['label' => 'Request Revision', 'href' => $revision_url, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
  </div>
  <?php
  $action_html = (string) ob_get_clean();

  $table_rows[] = [
    'gbi_credit'         => ['content' => $gbi_credit_html, 'is_html' => true],
    'evidence_required'  => ['content' => $evidence_required_html, 'is_html' => true],
    'linked_documents'   => ['content' => $linked_documents_html, 'is_html' => true],
    'submitted_by'       => ['content' => $submitted_by_html, 'is_html' => true],
    'review_status'      => ['content' => $review_status_html, 'is_html' => true],
    'score_impact'       => ['content' => $score_impact_html, 'is_html' => true],
    'action'             => ['content' => $action_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="evidence-register-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="evidence-register-heading" class="text-lg font-semibold text-brand-900">Evidence Register by GBI Credit</h2>
    <p class="mt-1 text-sm text-brand-600">Verification readiness across EE, EQ, SM, MR, WE, and IN criteria.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Evidence verification register table',
      'class_name'    => 'min-w-[1320px]',
      'empty_title'   => 'No evidence items available',
      'empty_message' => 'Add evidence items to begin verification tracking.',
    ]); ?>
  </div>
</section>
