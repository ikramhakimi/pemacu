<?php

declare(strict_types=1);

$client_actions = isset($client_actions) && is_array($client_actions) ? $client_actions : [];

$priority_tone_map = [
  'High'   => 'negative',
  'Medium' => 'warning',
  'Low'    => 'neutral',
];

$status_tone_map = [
  'Open'        => 'neutral',
  'In Progress' => 'warning',
  'Complete'    => 'positive',
  'Overdue'     => 'negative',
];

$table_columns = [
  ['label' => 'Action Title', 'key' => 'action_title'],
  ['label' => 'Related Module', 'key' => 'related_module'],
  ['label' => 'Assigned To', 'key' => 'assigned_to'],
  ['label' => 'Priority', 'key' => 'priority'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Status', 'key' => 'status'],
  ['label' => 'Link', 'key' => 'link'],
];

$table_rows = [];

foreach ($client_actions as $client_action) {
  $action_title    = isset($client_action['action_title']) ? trim((string) $client_action['action_title']) : '-';
  $related_module  = isset($client_action['related_module']) ? trim((string) $client_action['related_module']) : '-';
  $assigned_to     = isset($client_action['assigned_to']) ? trim((string) $client_action['assigned_to']) : '-';
  $priority        = isset($client_action['priority']) ? trim((string) $client_action['priority']) : 'Low';
  $due_date        = isset($client_action['due_date']) ? trim((string) $client_action['due_date']) : '-';
  $status          = isset($client_action['status']) ? trim((string) $client_action['status']) : 'Open';
  $link_label      = isset($client_action['link_label']) ? trim((string) $client_action['link_label']) : 'Open';
  $link_url        = isset($client_action['link_url']) ? trim((string) $client_action['link_url']) : '#';
  $priority_tone   = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';
  $status_tone     = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';

  ob_start();
  component('badge', ['items' => [['label' => $priority, 'tone' => $priority_tone]]]);
  $priority_html = (string) ob_get_clean();

  ob_start();
  component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]);
  $status_html = (string) ob_get_clean();

  ob_start();
  component('button', ['label' => $link_label, 'href' => $link_url, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']);
  $link_html = (string) ob_get_clean();

  $table_rows[] = [
    'action_title'    => $action_title,
    'related_module'  => $related_module,
    'assigned_to'     => $assigned_to,
    'priority'        => ['content' => $priority_html, 'is_html' => true],
    'due_date'        => $due_date,
    'status'          => ['content' => $status_html, 'is_html' => true],
    'link'            => ['content' => $link_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="report-client-action-list-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="report-client-action-list-heading" class="text-lg font-semibold text-zinc-900">Client Action List</h2>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Client action list table',
      'class_name'    => 'min-w-[1120px]',
      'empty_title'   => 'No client actions',
      'empty_message' => 'All current actions are complete.',
    ]); ?>
  </div>
</section>
