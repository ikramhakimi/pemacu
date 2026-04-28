<?php

declare(strict_types=1);

$blocking_items = isset($blocking_items) && is_array($blocking_items) ? $blocking_items : [];

$priority_tone_map = [
  'High'   => 'negative',
  'Medium' => 'warning',
  'Low'    => 'neutral',
];

$table_columns = [
  ['label' => 'Item', 'key' => 'item'],
  ['label' => 'Source Module', 'key' => 'source_module'],
  ['label' => 'Linked Item', 'key' => 'linked_item'],
  ['label' => 'Owner', 'key' => 'owner'],
  ['label' => 'Priority', 'key' => 'priority'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Action', 'key' => 'action'],
];

$table_rows = [];

foreach ($blocking_items as $blocking_item) {
  $title       = isset($blocking_item['title']) ? trim((string) $blocking_item['title']) : '-';
  $source      = isset($blocking_item['source_module']) ? trim((string) $blocking_item['source_module']) : '-';
  $linked_item = isset($blocking_item['linked_item']) ? trim((string) $blocking_item['linked_item']) : '-';
  $owner       = isset($blocking_item['owner']) ? trim((string) $blocking_item['owner']) : '-';
  $priority    = isset($blocking_item['priority']) ? trim((string) $blocking_item['priority']) : 'Low';
  $due_date    = isset($blocking_item['due_date']) ? trim((string) $blocking_item['due_date']) : '-';
  $action_label = isset($blocking_item['action_label']) ? trim((string) $blocking_item['action_label']) : 'Open';
  $action_href  = isset($blocking_item['action_href']) ? trim((string) $blocking_item['action_href']) : '#';
  $priority_tone = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';

  ob_start();
  ?>
  <p class="font-medium text-brand-900"><?= e($title); ?></p>
  <?php
  $item_html = (string) ob_get_clean();

  ob_start();
  component('badge', ['items' => [['label' => $priority, 'tone' => $priority_tone]]]);
  $priority_html = (string) ob_get_clean();

  ob_start();
  component('button', ['label' => $action_label, 'href' => $action_href, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']);
  $action_html = (string) ob_get_clean();

  $table_rows[] = [
    'item'          => ['content' => $item_html, 'is_html' => true],
    'source_module' => $source,
    'linked_item'   => $linked_item,
    'owner'         => $owner,
    'priority'      => ['content' => $priority_html, 'is_html' => true],
    'due_date'      => $due_date,
    'action'        => ['content' => $action_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="submission-blocking-items-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="submission-blocking-items-heading" class="text-lg font-semibold text-brand-900">Blocking Items</h2>
    <p class="mt-1 text-sm text-brand-600">Outstanding items that must be closed before final package submission.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Submission blocking items table',
      'class_name'    => 'min-w-[1080px]',
      'empty_title'   => 'No blocking items',
      'empty_message' => 'Package is currently clear for final submission.',
    ]); ?>
  </div>
</section>
