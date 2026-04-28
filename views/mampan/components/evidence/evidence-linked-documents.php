<?php

declare(strict_types=1);

$heading_id      = isset($heading_id) ? trim((string) $heading_id) : 'evidence-linked-documents-heading';
$title           = isset($title) ? trim((string) $title) : 'Linked Documents';
$description     = isset($description) ? trim((string) $description) : 'Document control references tied to this evidence item.';
$document_rows   = isset($document_rows) && is_array($document_rows) ? $document_rows : [];

$status_tone_map = [
  'Submitted'               => 'neutral',
  'Under Review'            => 'warning',
  'Need Revision'           => 'warning',
  'Verified'                => 'positive',
  'Rejected'                => 'negative',
  'Waived / Not Applicable' => 'neutral',
];

$table_columns = [
  ['label' => 'Document Name', 'key' => 'document_name'],
  ['label' => 'Version', 'key' => 'version'],
  ['label' => 'Category', 'key' => 'category'],
  ['label' => 'Document Status', 'key' => 'document_status'],
  ['label' => 'Uploaded By', 'key' => 'uploaded_by'],
  ['label' => 'Uploaded Date', 'key' => 'uploaded_date'],
  ['label' => 'Action', 'key' => 'action'],
];

$table_rows = [];

foreach ($document_rows as $document_row) {
  $document_name   = isset($document_row['document_name']) ? trim((string) $document_row['document_name']) : '-';
  $version         = isset($document_row['version']) ? trim((string) $document_row['version']) : '-';
  $category        = isset($document_row['category']) ? trim((string) $document_row['category']) : '-';
  $document_status = isset($document_row['document_status']) ? trim((string) $document_row['document_status']) : 'Submitted';
  $uploaded_by     = isset($document_row['uploaded_by']) ? trim((string) $document_row['uploaded_by']) : '-';
  $uploaded_date   = isset($document_row['uploaded_date']) ? trim((string) $document_row['uploaded_date']) : '-';
  $view_url        = isset($document_row['view_url']) ? trim((string) $document_row['view_url']) : '#';
  $download_url    = isset($document_row['download_url']) ? trim((string) $document_row['download_url']) : '#';
  $status_tone     = isset($status_tone_map[$document_status]) ? $status_tone_map[$document_status] : 'neutral';

  ob_start();
  component('badge', ['items' => [['label' => $document_status, 'tone' => $status_tone]]]);
  $status_html = (string) ob_get_clean();

  ob_start();
  ?>
  <div class="flex flex-wrap gap-1">
    <?php component('button', ['label' => 'View', 'href' => $view_url, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
    <?php component('button', ['label' => 'Download', 'href' => $download_url, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
  </div>
  <?php
  $action_html = (string) ob_get_clean();

  $table_rows[] = [
    'document_name'   => $document_name,
    'version'         => $version,
    'category'        => $category,
    'document_status' => ['content' => $status_html, 'is_html' => true],
    'uploaded_by'     => $uploaded_by,
    'uploaded_date'   => $uploaded_date,
    'action'          => ['content' => $action_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="<?= e($heading_id); ?>">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="<?= e($heading_id); ?>" class="text-lg font-semibold text-brand-900"><?= e($title); ?></h2>
    <p class="mt-1 text-sm text-brand-600"><?= e($description); ?></p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Linked document table',
      'class_name'    => 'min-w-[1100px]',
      'empty_title'   => 'No linked documents',
      'empty_message' => 'Link related files from Document Hub to begin review.',
    ]); ?>
  </div>
</section>
