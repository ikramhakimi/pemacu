<?php

declare(strict_types=1);

$missing_documents  = isset($missing_documents) && is_array($missing_documents) ? $missing_documents : [];
$revision_documents = isset($revision_documents) && is_array($revision_documents) ? $revision_documents : [];

$priority_tone_map = [
  'High'   => 'negative',
  'Medium' => 'warning',
  'Low'    => 'neutral',
];

$missing_columns = [
  ['label' => 'Document', 'key' => 'document_name'],
  ['label' => 'Owner', 'key' => 'owner'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Linked Credit/Stage', 'key' => 'linked_item'],
  ['label' => 'Priority', 'key' => 'priority'],
];

$missing_rows = [];

foreach ($missing_documents as $item) {
  $document_name = isset($item['document_name']) ? trim((string) $item['document_name']) : '-';
  $owner         = isset($item['owner']) ? trim((string) $item['owner']) : '-';
  $due_date      = isset($item['due_date']) ? trim((string) $item['due_date']) : '-';
  $linked_item   = isset($item['linked_item']) ? trim((string) $item['linked_item']) : '-';
  $priority      = isset($item['priority']) ? trim((string) $item['priority']) : 'Low';
  $priority_tone = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';

  ob_start();
  component('badge', [
    'items' => [[
      'label' => $priority,
      'tone'  => $priority_tone,
    ]],
  ]);
  $priority_badge = (string) ob_get_clean();

  $missing_rows[] = [
    'document_name' => $document_name,
    'owner'         => $owner,
    'due_date'      => $due_date,
    'linked_item'   => $linked_item,
    'priority'      => ['content' => $priority_badge, 'is_html' => true],
  ];
}

$revision_columns = [
  ['label' => 'Document', 'key' => 'document_name'],
  ['label' => 'Reason', 'key' => 'reason'],
  ['label' => 'Reviewer', 'key' => 'reviewer'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Linked Credit/Stage', 'key' => 'linked_item'],
];

$revision_rows = [];

foreach ($revision_documents as $item) {
  $document_name = isset($item['document_name']) ? trim((string) $item['document_name']) : '-';
  $reason        = isset($item['reason']) ? trim((string) $item['reason']) : '-';
  $reviewer      = isset($item['reviewer']) ? trim((string) $item['reviewer']) : '-';
  $due_date      = isset($item['due_date']) ? trim((string) $item['due_date']) : '-';
  $linked_item   = isset($item['linked_item']) ? trim((string) $item['linked_item']) : '-';

  $revision_rows[] = [
    'document_name' => $document_name,
    'reason'        => $reason,
    'reviewer'      => $reviewer,
    'due_date'      => $due_date,
    'linked_item'   => $linked_item,
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="document-missing-panel-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="document-missing-panel-heading" class="text-lg font-semibold text-brand-900">Missing & Revision Queue</h2>
    <p class="mt-1 text-sm text-brand-600">Critical uploads and consultant review follow-ups.</p>
  </header>

  <div class="mt-4 space-y-5">
    <article aria-labelledby="missing-documents-heading">
      <h3 id="missing-documents-heading" class="font-semibold text-brand-900">Missing Documents</h3>
      <div class="mt-3 overflow-x-auto">
        <?php component('table', [
          'columns'       => $missing_columns,
          'rows'          => $missing_rows,
          'appearance'    => 'basic',
          'caption'       => 'Missing documents queue',
          'class_name'    => 'min-w-[740px]',
          'empty_title'   => 'No missing documents',
          'empty_message' => 'All required uploads are present for this filter.',
        ]); ?>
      </div>
    </article>

    <article class="border-t border-brand-200 pt-4" aria-labelledby="need-revision-heading">
      <h3 id="need-revision-heading" class="font-semibold text-brand-900">Need Revision</h3>
      <div class="mt-3 overflow-x-auto">
        <?php component('table', [
          'columns'       => $revision_columns,
          'rows'          => $revision_rows,
          'appearance'    => 'basic',
          'caption'       => 'Documents requiring revision',
          'class_name'    => 'min-w-[740px]',
          'empty_title'   => 'No revision requests',
          'empty_message' => 'All submitted documents currently pass consultant review.',
        ]); ?>
      </div>
    </article>
  </div>
</section>
