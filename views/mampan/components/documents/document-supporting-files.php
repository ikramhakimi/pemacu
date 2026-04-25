<?php

declare(strict_types=1);

$requirement_title = isset($requirement_title) ? trim((string) $requirement_title) : 'Selected Requirement';
$supporting_files  = isset($supporting_files) && is_array($supporting_files) ? $supporting_files : [];

$file_status_tone_map = [
  'Accepted'       => 'positive',
  'Needs Revision' => 'warning',
  'Replaced'       => 'neutral',
  'Pending Review' => 'warning',
];

$table_columns = [
  ['label' => 'File Name', 'key' => 'file_name'],
  ['label' => 'Version', 'key' => 'version'],
  ['label' => 'Category', 'key' => 'category'],
  ['label' => 'Uploaded By', 'key' => 'uploaded_by'],
  ['label' => 'Uploaded Date', 'key' => 'uploaded_date'],
  ['label' => 'File Status', 'key' => 'file_status'],
  ['label' => 'Action', 'key' => 'action'],
];

$table_rows = [];

foreach ($supporting_files as $file_item) {
  $file_name     = isset($file_item['file_name']) ? trim((string) $file_item['file_name']) : '-';
  $version       = isset($file_item['version']) ? trim((string) $file_item['version']) : '-';
  $category      = isset($file_item['category']) ? trim((string) $file_item['category']) : '-';
  $uploaded_by   = isset($file_item['uploaded_by']) ? trim((string) $file_item['uploaded_by']) : '-';
  $uploaded_date = isset($file_item['uploaded_date']) ? trim((string) $file_item['uploaded_date']) : '-';
  $file_status   = isset($file_item['file_status']) ? trim((string) $file_item['file_status']) : 'Pending Review';
  $action_label  = isset($file_item['action_label']) ? trim((string) $file_item['action_label']) : 'View';
  $status_tone   = isset($file_status_tone_map[$file_status]) ? $file_status_tone_map[$file_status] : 'neutral';

  ob_start();
  component('badge', ['items' => [['label' => $file_status, 'tone' => $status_tone]]]);
  $status_html = (string) ob_get_clean();

  ob_start();
  component('button', [
    'label'   => $action_label,
    'size'    => 'sm',
    'variant' => 'default',
    'class'   => 'shadow-none',
  ]);
  $action_html = (string) ob_get_clean();

  $table_rows[] = [
    'file_name'     => $file_name,
    'version'       => $version,
    'category'      => $category,
    'uploaded_by'   => $uploaded_by,
    'uploaded_date' => $uploaded_date,
    'file_status'   => ['content' => $status_html, 'is_html' => true],
    'action'        => ['content' => $action_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="supporting-files-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="supporting-files-heading" class="text-lg font-semibold text-brand-900">Supporting Files</h2>
    <p class="mt-1 text-sm text-brand-600">Linked files under requirement: <?= e($requirement_title); ?></p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Supporting files for selected requirement',
      'class_name'    => 'min-w-[1040px]',
      'empty_title'   => 'No supporting files linked',
      'empty_message' => 'Link files to this requirement to continue review planning.',
    ]); ?>
  </div>
</section>
