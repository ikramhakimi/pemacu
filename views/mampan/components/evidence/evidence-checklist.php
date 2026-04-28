<?php

declare(strict_types=1);

$heading_id      = isset($heading_id) ? trim((string) $heading_id) : 'evidence-checklist-heading';
$title           = isset($title) ? trim((string) $title) : 'Verification Checklist';
$description     = isset($description) ? trim((string) $description) : 'Checklist status recorded during consultant review.';
$checklist_items = isset($checklist_items) && is_array($checklist_items) ? $checklist_items : [];

$status_tone_map = [
  'Pass'           => 'positive',
  'Fail'           => 'negative',
  'Pending'        => 'warning',
  'Not Applicable' => 'neutral',
];

$table_columns = [
  ['label' => 'Checklist Item', 'key' => 'item_label'],
  ['label' => 'Status', 'key' => 'item_status'],
  ['label' => 'Reviewer Note', 'key' => 'reviewer_note'],
];

$table_rows = [];

foreach ($checklist_items as $checklist_item) {
  $item_label   = isset($checklist_item['label']) ? trim((string) $checklist_item['label']) : '-';
  $item_status  = isset($checklist_item['status']) ? trim((string) $checklist_item['status']) : 'Pending';
  $reviewer_note = isset($checklist_item['note']) ? trim((string) $checklist_item['note']) : '-';
  $status_tone  = isset($status_tone_map[$item_status]) ? $status_tone_map[$item_status] : 'neutral';

  ob_start();
  component('badge', ['items' => [['label' => $item_status, 'tone' => $status_tone]]]);
  $status_html = (string) ob_get_clean();

  $table_rows[] = [
    'item_label'    => $item_label,
    'item_status'   => ['content' => $status_html, 'is_html' => true],
    'reviewer_note' => $reviewer_note,
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
      'caption'       => 'Evidence checklist status table',
      'class_name'    => 'min-w-[860px]',
      'empty_title'   => 'No checklist items',
      'empty_message' => 'Checklist items will appear once evidence is reviewed.',
    ]); ?>
  </div>
</section>
