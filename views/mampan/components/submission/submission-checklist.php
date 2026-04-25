<?php

declare(strict_types=1);

$groups = isset($groups) && is_array($groups) ? $groups : [];

$status_tone_map = [
  'Complete'       => 'positive',
  'Pending'        => 'warning',
  'At Risk'        => 'negative',
  'Not Applicable' => 'neutral',
];

foreach ($groups as $group_index => $group) {
  $group_title = isset($group['title']) ? trim((string) $group['title']) : 'Checklist Group';
  $group_items = isset($group['items']) && is_array($group['items']) ? $group['items'] : [];

  $table_columns = [
    ['label' => 'Checklist Item', 'key' => 'item'],
    ['label' => 'Status', 'key' => 'status'],
    ['label' => 'Owner', 'key' => 'owner'],
    ['label' => 'Note', 'key' => 'note'],
    ['label' => 'Action', 'key' => 'action'],
  ];

  $table_rows = [];

  foreach ($group_items as $group_item) {
    $label       = isset($group_item['label']) ? trim((string) $group_item['label']) : '-';
    $status      = isset($group_item['status']) ? trim((string) $group_item['status']) : 'Pending';
    $owner       = isset($group_item['owner']) ? trim((string) $group_item['owner']) : '-';
    $note        = isset($group_item['note']) ? trim((string) $group_item['note']) : '-';
    $action_label = isset($group_item['action_label']) ? trim((string) $group_item['action_label']) : 'Open';
    $action_href  = isset($group_item['action_href']) ? trim((string) $group_item['action_href']) : '#';
    $status_tone  = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';

    ob_start();
    component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]);
    $status_html = (string) ob_get_clean();

    ob_start();
    component('button', ['label' => $action_label, 'href' => $action_href, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']);
    $action_html = (string) ob_get_clean();

    $table_rows[] = [
      'item'   => $label,
      'status' => ['content' => $status_html, 'is_html' => true],
      'owner'  => $owner,
      'note'   => $note,
      'action' => ['content' => $action_html, 'is_html' => true],
    ];
  }
  ?>
  <section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="submission-checklist-group-<?= e((string) $group_index); ?>">
    <header class="border-b border-zinc-200 pb-4">
      <h2 id="submission-checklist-group-<?= e((string) $group_index); ?>" class="text-lg font-semibold text-zinc-900">
        <?= e($group_title); ?>
      </h2>
    </header>

    <div class="mt-4 overflow-x-auto">
      <?php component('table', [
        'columns'       => $table_columns,
        'rows'          => $table_rows,
        'appearance'    => 'basic',
        'caption'       => $group_title . ' checklist table',
        'class_name'    => 'min-w-[960px]',
        'empty_title'   => 'No checklist items',
        'empty_message' => 'Add checklist items for this category.',
      ]); ?>
    </div>
  </section>
<?php
}
