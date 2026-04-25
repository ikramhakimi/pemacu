<?php

declare(strict_types=1);

$timeline_items = isset($timeline_items) && is_array($timeline_items) ? $timeline_items : [];

$status_tone_map = [
  'Completed'      => 'positive',
  'In Progress'    => 'warning',
  'Waiting Client' => 'warning',
  'Not Started'    => 'neutral',
];

$table_columns = [
  ['label' => 'Milestone', 'key' => 'milestone'],
  ['label' => 'Status', 'key' => 'status'],
  ['label' => 'Date', 'key' => 'date'],
  ['label' => 'Note', 'key' => 'note'],
];

$table_rows = [];

foreach ($timeline_items as $timeline_item) {
  $milestone = isset($timeline_item['milestone']) ? trim((string) $timeline_item['milestone']) : '-';
  $status    = isset($timeline_item['status']) ? trim((string) $timeline_item['status']) : 'Not Started';
  $date      = isset($timeline_item['date']) ? trim((string) $timeline_item['date']) : '-';
  $note      = isset($timeline_item['note']) ? trim((string) $timeline_item['note']) : '-';
  $tone      = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';

  ob_start();
  component('badge', ['items' => [['label' => $status, 'tone' => $tone]]]);
  $status_html = (string) ob_get_clean();

  $table_rows[] = [
    'milestone' => $milestone,
    'status'    => ['content' => $status_html, 'is_html' => true],
    'date'      => $date,
    'note'      => $note,
  ];
}
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="submission-package-timeline-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="submission-package-timeline-heading" class="text-lg font-semibold text-zinc-900">Final Package Timeline</h2>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Final package timeline table',
      'class_name'    => 'min-w-[860px]',
      'empty_title'   => 'No timeline milestones',
      'empty_message' => 'Add timeline steps for package preparation.',
    ]); ?>
  </div>
</section>
