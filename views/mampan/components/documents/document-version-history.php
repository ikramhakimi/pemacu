<?php

declare(strict_types=1);

$version_history = isset($version_history) && is_array($version_history) ? $version_history : [];

$history_columns = [
  ['label' => 'Document', 'key' => 'document_name'],
  ['label' => 'Version', 'key' => 'version'],
  ['label' => 'Activity', 'key' => 'activity'],
  ['label' => 'Actor', 'key' => 'actor'],
  ['label' => 'Timestamp', 'key' => 'timestamp'],
];

$history_rows = [];

foreach ($version_history as $event) {
  $document_name = isset($event['document_name']) ? trim((string) $event['document_name']) : '-';
  $version       = isset($event['version']) ? trim((string) $event['version']) : '-';
  $activity      = isset($event['activity']) ? trim((string) $event['activity']) : '-';
  $actor         = isset($event['actor']) ? trim((string) $event['actor']) : '-';
  $timestamp     = isset($event['timestamp']) ? trim((string) $event['timestamp']) : '-';

  $history_rows[] = [
    'document_name' => $document_name,
    'version'       => $version,
    'activity'      => $activity,
    'actor'         => $actor,
    'timestamp'     => $timestamp,
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="document-version-history-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="document-version-history-heading" class="text-lg font-semibold text-brand-900">Version History</h2>
    <p class="mt-1 text-sm text-brand-600">Latest document movement and verification activities.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $history_columns,
      'rows'          => $history_rows,
      'appearance'    => 'basic',
      'caption'       => 'Document version activity log',
      'class_name'    => 'min-w-[760px]',
      'empty_title'   => 'No version activity',
      'empty_message' => 'Document version movements will appear here.',
    ]); ?>
  </div>
</section>
