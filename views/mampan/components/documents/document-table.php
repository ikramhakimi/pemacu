<?php

declare(strict_types=1);

$document_rows = isset($document_rows) && is_array($document_rows) ? $document_rows : [];

$status_tone_map = [
  'Verified'      => 'positive',
  'Submitted'     => 'neutral',
  'Required'      => 'neutral',
  'Missing'       => 'negative',
  'Need Revision' => 'warning',
  'Under Review'  => 'warning',
];

$table_columns = [
  ['label' => 'Document', 'key' => 'document'],
  ['label' => 'Category', 'key' => 'category'],
  ['label' => 'Linked Item', 'key' => 'linked_item'],
  ['label' => 'Version', 'key' => 'version'],
  ['label' => 'Submitted By', 'key' => 'submitted_by'],
  ['label' => 'Submitted Date', 'key' => 'submitted_date'],
  ['label' => 'Status', 'key' => 'status'],
  ['label' => 'Action', 'key' => 'action'],
];

$table_rows = [];

foreach ($document_rows as $row) {
  $title          = isset($row['title']) ? trim((string) $row['title']) : '-';
  $description    = isset($row['description']) ? trim((string) $row['description']) : '';
  $category       = isset($row['category']) ? trim((string) $row['category']) : '-';
  $linked_item    = isset($row['linked_item']) ? trim((string) $row['linked_item']) : '-';
  $version        = isset($row['version']) ? trim((string) $row['version']) : '-';
  $submitted_by   = isset($row['submitted_by']) ? trim((string) $row['submitted_by']) : '-';
  $submitted_date = isset($row['submitted_date']) ? trim((string) $row['submitted_date']) : '-';
  $status         = isset($row['status']) ? trim((string) $row['status']) : 'Required';
  $actions        = isset($row['actions']) && is_array($row['actions']) ? $row['actions'] : [];
  $badge_tone     = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';

  ob_start();
  ?>
  <div>
    <p class="font-medium text-brand-900"><?= e($title); ?></p>
    <?php if ($description !== ''): ?>
      <p class="mt-1 text-sm text-brand-600"><?= e($description); ?></p>
    <?php endif; ?>
  </div>
  <?php
  $document_html = (string) ob_get_clean();

  ob_start();
  component('badge', [
    'items' => [[
      'label' => $status,
      'tone'  => $badge_tone,
    ]],
  ]);
  $status_html = (string) ob_get_clean();

  ob_start();
  ?>
  <div class="flex flex-wrap gap-1">
    <?php foreach ($actions as $action_label): ?>
      <?php component('button', [
        'label'   => (string) $action_label,
        'size'    => 'sm',
        'variant' => 'neutral',
        'class'   => 'shadow-none',
      ]); ?>
    <?php endforeach; ?>
  </div>
  <?php
  $action_html = (string) ob_get_clean();

  $table_rows[] = [
    'document'       => ['content' => $document_html, 'is_html' => true],
    'category'       => $category,
    'linked_item'    => $linked_item,
    'version'        => $version,
    'submitted_by'   => $submitted_by,
    'submitted_date' => $submitted_date,
    'status'         => ['content' => $status_html, 'is_html' => true],
    'action'         => ['content' => $action_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="document-register-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="document-register-heading" class="text-lg font-semibold text-brand-900">Document Register</h2>
    <p class="mt-1 text-sm text-brand-600">Latest submissions with version control and review actions.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Document register table',
      'class_name'    => 'min-w-[1100px]',
      'empty_title'   => 'No documents submitted yet',
      'empty_message' => 'Once uploads are made, they will appear here.',
    ]); ?>
  </div>
</section>
