<?php

declare(strict_types=1);

$required_documents = isset($required_documents) && is_array($required_documents) ? $required_documents : [];

$status_tone_map = [
  'Verified'      => 'positive',
  'Submitted'     => 'neutral',
  'Required'      => 'neutral',
  'Missing'       => 'negative',
  'Need Revision' => 'warning',
  'Under Review'  => 'warning',
];

$table_columns = [
  ['label' => 'Document', 'key' => 'document_name'],
  ['label' => 'Category', 'key' => 'category'],
  ['label' => 'Linked Stage', 'key' => 'linked_stage'],
  ['label' => 'GBI Credit', 'key' => 'linked_gbi_credit'],
  ['label' => 'Owner', 'key' => 'owner'],
  ['label' => 'Status', 'key' => 'status'],
  ['label' => 'Due Date', 'key' => 'due_date'],
];

$table_rows = [];

foreach ($required_documents as $item) {
  $document_name     = isset($item['document_name']) ? trim((string) $item['document_name']) : '-';
  $category          = isset($item['category']) ? trim((string) $item['category']) : '-';
  $linked_stage      = isset($item['linked_stage']) ? trim((string) $item['linked_stage']) : '-';
  $linked_gbi_credit = isset($item['linked_gbi_credit']) ? trim((string) $item['linked_gbi_credit']) : '-';
  $owner             = isset($item['owner']) ? trim((string) $item['owner']) : '-';
  $status            = isset($item['status']) ? trim((string) $item['status']) : 'Required';
  $due_date          = isset($item['due_date']) ? trim((string) $item['due_date']) : '-';
  $badge_tone        = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';

  ob_start();
  component('badge', [
    'items' => [[
      'label' => $status,
      'tone'  => $badge_tone,
    ]],
  ]);
  $status_html = (string) ob_get_clean();

  $table_rows[] = [
    'document_name'     => $document_name,
    'category'          => $category,
    'linked_stage'      => $linked_stage,
    'linked_gbi_credit' => $linked_gbi_credit,
    'owner'             => $owner,
    'status'            => ['content' => $status_html, 'is_html' => true],
    'due_date'          => $due_date,
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="required-document-list-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="required-document-list-heading" class="text-lg font-semibold text-brand-900">Required Document List</h2>
    <p class="mt-1 text-sm text-brand-600">Required evidence by category, stage, and GBI credit mapping.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Required document list',
      'class_name'    => 'min-w-[1000px]',
      'empty_title'   => 'No required documents listed',
      'empty_message' => 'Add required items to begin tracking.',
    ]); ?>
  </div>
</section>
