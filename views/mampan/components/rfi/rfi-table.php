<?php

declare(strict_types=1);

$rfi_rows = isset($rfi_rows) && is_array($rfi_rows) ? $rfi_rows : [];

$status_tone_map = [
  'Open'                => 'neutral',
  'Awaiting Client'     => 'warning',
  'Awaiting Consultant' => 'neutral',
  'Under Review'        => 'warning',
  'Resolved'            => 'positive',
  'Closed'              => 'positive',
  'Overdue'             => 'negative',
];

$priority_tone_map = [
  'High'   => 'negative',
  'Medium' => 'warning',
  'Low'    => 'neutral',
];

$table_columns = [
  ['label' => 'Subject', 'key' => 'subject'],
  ['label' => 'Assigned To', 'key' => 'assigned_to'],
  ['label' => 'Priority', 'key' => 'priority'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Status', 'key' => 'status'],
];

$table_rows = [];

foreach ($rfi_rows as $row) {
  $rfi_no             = isset($row['rfi_no']) ? trim((string) $row['rfi_no']) : '-';
  $subject            = isset($row['subject']) ? trim((string) $row['subject']) : '-';
  $description        = isset($row['description']) ? trim((string) $row['description']) : '';
  $linked_item        = isset($row['linked_item']) ? trim((string) $row['linked_item']) : '-';
  $requester          = isset($row['requester']) ? trim((string) $row['requester']) : '-';
  $assignee           = isset($row['assignee']) ? trim((string) $row['assignee']) : '-';
  $priority           = isset($row['priority']) ? trim((string) $row['priority']) : 'Low';
  $due_date           = isset($row['due_date']) ? trim((string) $row['due_date']) : '-';
  $status             = isset($row['status']) ? trim((string) $row['status']) : 'Open';
  $detail_url         = isset($row['detail_url']) ? trim((string) $row['detail_url']) : '';
  $reply_url          = isset($row['reply_url']) ? trim((string) $row['reply_url']) : '';
  $close_url          = isset($row['close_url']) ? trim((string) $row['close_url']) : '';
  $status_tone        = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
  $priority_tone      = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';

  ob_start();
  ?>
  <div>
    <p class="text-xs font-medium uppercase tracking-wide text-brand-500"><?= e($rfi_no); ?></p>
    <?php if ($detail_url !== ''): ?>
      <a class="mt-1 inline-block font-medium text-brand-900 hover:underline" href="<?= e($detail_url); ?>"><?= e($subject); ?></a>
    <?php else: ?>
      <p class="mt-1 font-medium text-brand-900"><?= e($subject); ?></p>
    <?php endif; ?>
    <?php if ($description !== ''): ?>
      <p class="mt-1 text-xs text-brand-600"><?= e($description); ?></p>
    <?php endif; ?>
    <p class="mt-2 text-xs text-brand-600">Linked Item: <?= e($linked_item); ?></p>
    <div class="mt-3 flex flex-wrap gap-1">
      <?php component('button', ['label' => 'View', 'href' => $detail_url !== '' ? $detail_url : '#', 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
      <?php component('button', ['label' => 'Reply', 'href' => $reply_url !== '' ? $reply_url : '#', 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
      <?php component('button', ['label' => 'Close', 'href' => $close_url !== '' ? $close_url : '#', 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
    </div>
  </div>
  <?php
  $subject_html = (string) ob_get_clean();

  ob_start();
  ?>
  <div>
    <p class="font-medium text-brand-900"><?= e($assignee); ?></p>
    <p class="mt-1 text-xs text-brand-600">Requested by <?= e($requester); ?></p>
  </div>
  <?php
  $assignee_html = (string) ob_get_clean();

  ob_start();
  component('badge', [
    'items' => [[
      'label' => $priority,
      'tone'  => $priority_tone,
    ]],
  ]);
  $priority_html = (string) ob_get_clean();

  ob_start();
  component('badge', [
    'items' => [[
      'label' => $status,
      'tone'  => $status_tone,
    ]],
  ]);
  $status_html = (string) ob_get_clean();

  $table_rows[] = [
    'subject'        => ['content' => $subject_html, 'is_html' => true],
    'assigned_to'    => ['content' => $assignee_html, 'is_html' => true],
    'priority'       => ['content' => $priority_html, 'is_html' => true],
    'due_date'       => $due_date,
    'status'         => ['content' => $status_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="clarification-table-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="clarification-table-heading" class="text-lg font-semibold text-brand-900">Clarification Log</h2>
    <p class="mt-1 text-sm text-brand-600">Track document and credit-related clarification requests across the project.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'comfortable',
      'empty_title'   => 'No clarification records',
      'empty_message' => 'Create a new clarification to begin tracking.',
    ]); ?>
  </div>
</section>
