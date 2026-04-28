<?php

declare(strict_types=1);

$missing_evidence_rows = isset($missing_evidence_rows) && is_array($missing_evidence_rows) ? $missing_evidence_rows : [];

$status_tone_map = [
  'Missing'      => 'negative',
  'Under Review' => 'warning',
  'Submitted'    => 'neutral',
  'Verified'     => 'positive',
  'Overdue'      => 'negative',
];

$table_columns = [
  ['label' => 'Evidence Item', 'key' => 'evidence_item'],
  ['label' => 'Linked Document', 'key' => 'linked_document'],
  ['label' => 'Linked GBI Credit', 'key' => 'linked_credit'],
  ['label' => 'Owner', 'key' => 'owner'],
  ['label' => 'Status', 'key' => 'status'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Recommended Action', 'key' => 'recommended_action'],
];

$table_rows = [];

foreach ($missing_evidence_rows as $missing_evidence_row) {
  $evidence_item       = isset($missing_evidence_row['evidence_item']) ? trim((string) $missing_evidence_row['evidence_item']) : '-';
  $linked_document     = isset($missing_evidence_row['linked_document']) ? trim((string) $missing_evidence_row['linked_document']) : '-';
  $linked_credit       = isset($missing_evidence_row['linked_credit']) ? trim((string) $missing_evidence_row['linked_credit']) : '-';
  $owner               = isset($missing_evidence_row['owner']) ? trim((string) $missing_evidence_row['owner']) : '-';
  $status              = isset($missing_evidence_row['status']) ? trim((string) $missing_evidence_row['status']) : 'Missing';
  $due_date            = isset($missing_evidence_row['due_date']) ? trim((string) $missing_evidence_row['due_date']) : '-';
  $recommended_action  = isset($missing_evidence_row['recommended_action']) ? trim((string) $missing_evidence_row['recommended_action']) : '-';
  $status_tone         = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';

  ob_start();
  component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]);
  $status_html = (string) ob_get_clean();

  $table_rows[] = [
    'evidence_item'      => $evidence_item,
    'linked_document'    => $linked_document,
    'linked_credit'      => $linked_credit,
    'owner'              => $owner,
    'status'             => ['content' => $status_html, 'is_html' => true],
    'due_date'           => $due_date,
    'recommended_action' => $recommended_action,
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="report-missing-evidence-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="report-missing-evidence-heading" class="text-lg font-semibold text-brand-900">Missing Evidence</h2>
    <p class="mt-1 text-sm text-brand-600">Evidence gaps that must be closed before final submission package.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Missing evidence table',
      'class_name'    => 'min-w-[1140px]',
      'empty_title'   => 'No missing evidence',
      'empty_message' => 'All planned evidence items are available.',
    ]); ?>
  </div>
</section>
