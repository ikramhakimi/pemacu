<?php

declare(strict_types=1);

$blocking_items = isset($blocking_items) && is_array($blocking_items) ? $blocking_items : [];

$priority_tone_map = [
  'High'   => 'negative',
  'Medium' => 'warning',
  'Low'    => 'neutral',
];

$table_columns = [
  ['label' => 'Blocker', 'key' => 'title'],
  ['label' => 'Linked Requirement', 'key' => 'linked_requirement'],
  ['label' => 'Owner', 'key' => 'owner'],
  ['label' => 'Priority', 'key' => 'priority'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Recommended Action', 'key' => 'action'],
];

$table_rows = [];

foreach ($blocking_items as $blocking_item) {
  $title              = isset($blocking_item['title']) ? trim((string) $blocking_item['title']) : '-';
  $linked_requirement = isset($blocking_item['linked_requirement']) ? trim((string) $blocking_item['linked_requirement']) : '-';
  $owner              = isset($blocking_item['owner']) ? trim((string) $blocking_item['owner']) : '-';
  $priority           = isset($blocking_item['priority']) ? trim((string) $blocking_item['priority']) : 'Low';
  $due_date           = isset($blocking_item['due_date']) ? trim((string) $blocking_item['due_date']) : '-';
  $action_label       = isset($blocking_item['action_label']) ? trim((string) $blocking_item['action_label']) : 'Open';
  $action_href        = isset($blocking_item['action_href']) ? trim((string) $blocking_item['action_href']) : '#';
  $priority_tone      = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';

  ob_start();
  component('badge', ['items' => [['label' => $priority, 'tone' => $priority_tone]]]);
  $priority_html = (string) ob_get_clean();

  ob_start();
  component('button', [
    'label'   => $action_label,
    'href'    => $action_href,
    'size'    => 'sm',
    'variant' => 'default',
    'class'   => 'shadow-none',
  ]);
  $action_html = (string) ob_get_clean();

  $table_rows[] = [
    'title'              => $title,
    'linked_requirement' => $linked_requirement,
    'owner'              => $owner,
    'priority'           => ['content' => $priority_html, 'is_html' => true],
    'due_date'           => $due_date,
    'action'             => ['content' => $action_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="document-blocking-items-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="document-blocking-items-heading" class="text-lg font-semibold text-brand-900">Phase 1 Blocking Items</h2>
    <p class="mt-1 text-sm text-brand-600">Top blockers that prevent completion of initial document review and gap analysis preparation.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Phase 1 blocking items table',
      'class_name'    => 'min-w-[920px]',
      'empty_title'   => 'No blockers found',
      'empty_message' => 'Current Phase 1 requirement review has no active blockers.',
    ]); ?>
  </div>
</section>
