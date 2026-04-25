<?php

declare(strict_types=1);

$requirements_grouped = isset($requirements_grouped) && is_array($requirements_grouped) ? $requirements_grouped : [];
$selected_filter      = isset($selected_filter) ? trim((string) $selected_filter) : 'all';
$filters              = isset($filters) && is_array($filters) ? $filters : [];
$search_value         = isset($search_value) ? trim((string) $search_value) : '';
$selected_id          = isset($selected_id) ? trim((string) $selected_id) : '';
$hide_empty_groups    = $selected_filter !== 'all';

$status_tone_map = [
  'Satisfied'              => 'positive',
  'Ready for Gap Analysis' => 'positive',
  'Submitted'              => 'neutral',
  'Under Review'           => 'warning',
  'Partial'                => 'warning',
  'Missing'                => 'negative',
  'Not Started'            => 'neutral',
];

$table_columns = [
  ['label' => 'Requirement', 'key' => 'requirement', 'class_name' => 'w-[30%]'],
  ['label' => 'Status', 'key' => 'status'],
  ['label' => 'Readiness', 'key' => 'readiness'],
  ['label' => 'Supporting Files', 'key' => 'supporting_files_count'],
  ['label' => 'Missing Items', 'key' => 'missing_items_count'],
  ['label' => 'Next Action', 'key' => 'next_action', 'class_name' => 'w-[25%]'],
];
?>
<section class="rounded-lg border border-brand-200 bg-brand-50" aria-labelledby="requirement-register-heading">
  <header class="bg-white rounded-t-md border-b border-brand-200 p-5">
    <h2 id="requirement-register-heading" class="text-lg font-semibold text-brand-900">Requirement Register by GBI Criteria</h2>
    <p class="mt-1 text-sm text-brand-600">Requirement-first tracking for Phase 1 design and planning gap analysis readiness.</p>
    <div class="mt-4">
      <?php component('documents/document-requirement-filter', [
        'filters'         => $filters,
        'selected_filter' => $selected_filter,
        'search_value'    => $search_value,
        'selected_id'     => $selected_id,
      ]); ?>
    </div>
  </header>

  <div class="p-2 space-y-3">
    <?php foreach ($requirements_grouped as $group_item): ?>
      <?php
      $criteria_code     = isset($group_item['criteria_code']) ? trim((string) $group_item['criteria_code']) : '';
      $criteria_label    = isset($group_item['criteria_label']) ? trim((string) $group_item['criteria_label']) : '';
      $requirement_items = isset($group_item['items']) && is_array($group_item['items']) ? $group_item['items'] : [];

      if ($criteria_code === '' || $criteria_label === '') {
        continue;
      }

      if ($hide_empty_groups && $requirement_items === []) {
        continue;
      }

      $table_rows = [];

      foreach ($requirement_items as $requirement_item) {
        $requirement_title = isset($requirement_item['title']) ? trim((string) $requirement_item['title']) : '-';
        $credit            = isset($requirement_item['linked_gbi_credit']) ? trim((string) $requirement_item['linked_gbi_credit']) : '';
        $phase             = isset($requirement_item['phase']) ? trim((string) $requirement_item['phase']) : '-';
        $owner             = isset($requirement_item['owner']) ? trim((string) $requirement_item['owner']) : '-';
        $owner_side        = isset($requirement_item['owner_side']) ? trim((string) $requirement_item['owner_side']) : 'Consultant';
        $status            = isset($requirement_item['status']) ? trim((string) $requirement_item['status']) : 'Not Started';
        $readiness_percent = isset($requirement_item['readiness_percent']) ? (int) $requirement_item['readiness_percent'] : 0;
        $files_count       = isset($requirement_item['supporting_files_count']) ? (int) $requirement_item['supporting_files_count'] : 0;
        $missing_count     = isset($requirement_item['missing_items_count']) ? (int) $requirement_item['missing_items_count'] : 0;
        $next_action       = isset($requirement_item['next_action']) ? trim((string) $requirement_item['next_action']) : '-';
        $detail_drawer_id  = isset($requirement_item['detail_drawer_id']) ? trim((string) $requirement_item['detail_drawer_id']) : '';
        $is_selected       = isset($requirement_item['is_selected']) && $requirement_item['is_selected'] === true;
        $status_tone       = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';

        ob_start();
        ?>
        <div>
          <div class="flex flex-wrap items-center gap-2">
            <?php if ($credit !== ''): ?>
              <?php component('badge', ['items' => [['label' => $credit, 'tone' => 'neutral']]]); ?>
            <?php endif; ?>
            <p class="font-medium text-brand-900"><?= e($requirement_title); ?></p>
          </div>
          <p class="mt-3 text-sm text-brand-600"><?= e($phase); ?></p>
          <p class="mt-1 pt-1 border-t border-brand-200 text-sm text-brand-600"><?= e($owner_side); ?> &rarr; <?= e($owner); ?></p>
          <div class="mt-2 flex flex-wrap items-center gap-2">
            <?php if ($is_selected): ?>
              <?php component('badge', ['items' => [['label' => 'Selected', 'tone' => 'info']]]); ?>
            <?php endif; ?>
            <?php component('button', [
              'label'   => 'Open Detail',
              'size'    => 'sm',
              'variant' => 'default',
              'class'   => 'shadow-none',
              'attributes' => [
                'data-drawer-open'   => true,
                'data-drawer-target' => $detail_drawer_id,
                'data-requirement-id' => $requirement_item['id'],
                'aria-haspopup'      => 'dialog',
                'aria-expanded'      => 'false',
              ],
            ]); ?>
          </div>
        </div>
        <?php
        $requirement_html = (string) ob_get_clean();

        ob_start();
        component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]);
        $status_html = (string) ob_get_clean();

        $status_cell_html = '<span data-requirement-status-cell="' . e((string) $requirement_item['id']) . '">' . $status_html . '</span>';
        $readiness_cell_html = '<span data-requirement-readiness-cell="' . e((string) $requirement_item['id']) . '">' . e($readiness_percent . '%') . '</span>';

        $table_rows[] = [
          'cells' => [
            'requirement'            => ['content' => $requirement_html, 'is_html' => true],
            'status'                 => ['content' => $status_cell_html, 'is_html' => true],
            'readiness'              => ['content' => $readiness_cell_html, 'is_html' => true],
            'supporting_files_count' => (string) $files_count,
            'missing_items_count'    => (string) $missing_count,
            'next_action'            => $next_action,
          ],
          'row_class' => $is_selected ? 'bg-brand-50' : '',
        ];
      }
      ?>
      <section class="rounded-lg border border-brand-200 bg-brand-900 p-1" aria-label="<?= e($criteria_code . ' requirement group'); ?>">
        <header class="flex flex-wrap items-center justify-between gap-2  p-4 pt-3">
          <h3 class="font-semibold text-base text-white"><?= e($criteria_code . ' - ' . $criteria_label); ?></h3>
          <?php component('badge', ['items' => [['label' => (string) count($requirement_items) . ' requirement(s)', 'tone' => 'neutral']]]); ?>
        </header>

        <div class="bg-white rounded-md p-1">
          <?php component('table', [
            'columns'       => $table_columns,
            'rows'          => $table_rows,
            'appearance'    => 'comfortable',
            'empty_title'   => 'No requirements in this view',
            'empty_message' => 'Adjust filters or search to see requirement records.',
          ]); ?>
        </div>
      </section>
    <?php endforeach; ?>
  </div>
</section>
