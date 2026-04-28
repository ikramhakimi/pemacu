<?php

declare(strict_types=1);

$requirements_grouped = isset($requirements_grouped) && is_array($requirements_grouped) ? $requirements_grouped : [];
$selected_filter      = isset($selected_filter) ? trim((string) $selected_filter) : 'all';
$search_value         = isset($search_value) ? trim((string) $search_value) : '';
$selected_id          = isset($selected_id) ? trim((string) $selected_id) : '';
$hide_empty_groups    = $selected_filter !== 'all' || $search_value !== '';
$document_header_meta = isset($document_header) && is_array($document_header) ? $document_header : [];

$current_phase = isset($current_phase) ? trim((string) $current_phase) : '';
if ($current_phase === '' && isset($document_header_meta['current_phase'])) {
  $current_phase = trim((string) $document_header_meta['current_phase']);
}
if ($current_phase === '') {
  $current_phase = 'Phase 1 - Design / Planning';
}

$current_stage = isset($current_stage) ? trim((string) $current_stage) : '';
if ($current_stage === '' && isset($document_header_meta['current_stage'])) {
  $current_stage = trim((string) $document_header_meta['current_stage']);
}
if ($current_stage === '') {
  $current_stage = 'Initial Document Review';
}

$last_updated = isset($last_updated) ? trim((string) $last_updated) : '';
if ($last_updated === '' && isset($document_header_meta['last_updated'])) {
  $last_updated = trim((string) $document_header_meta['last_updated']);
}
if ($last_updated === '') {
  $last_updated = '-';
}

$requirement_readiness = isset($requirement_readiness) ? trim((string) $requirement_readiness) : '';
if ($requirement_readiness === '' && isset($document_header_meta['requirement_readiness'])) {
  $requirement_readiness = trim((string) $document_header_meta['requirement_readiness']);
}

if ($requirement_readiness === '') {
  $total_requirements      = 0;
  $ready_requirements      = 0;

  foreach ($requirements_grouped as $group_item) {
    $requirement_items = isset($group_item['items']) && is_array($group_item['items']) ? $group_item['items'] : [];

    foreach ($requirement_items as $requirement_item) {
      $total_requirements += 1;
      $readiness_percent = isset($requirement_item['readiness_percent']) ? (int) $requirement_item['readiness_percent'] : 0;

      if ($readiness_percent >= 80) {
        $ready_requirements += 1;
      }
    }
  }

  $readiness_ratio = $total_requirements > 0
    ? (int) round(($ready_requirements / $total_requirements) * 100)
    : 0;

  $requirement_readiness = $ready_requirements . ' / ' . $total_requirements . ' requirements ready (' . $readiness_ratio . '%)';
}

$table_columns = [
  ['label' => 'Requirement', 'key' => 'requirement'],
];

$status_text_class_map = [
  'Satisfied'              => 'text-positive-700',
  'Ready for Gap Analysis' => 'text-positive-700',
  'Submitted'              => 'text-brand-700',
  'Under Review'           => 'text-attention-700',
  'Partial'                => 'text-attention-700',
  'Missing'                => 'text-negative-700',
  'Not Started'            => 'text-brand-700',
];
?>
<div class="document__body space-y-5">
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
      $credit_code_query = strtolower(trim((string) preg_replace('/\s+.+$/', '', $credit)));
      $credit_detail_url = $credit_code_query !== ''
        ? path('/mampan/consultant/credits/credit?code=' . $credit_code_query)
        : '';
      $owner             = isset($requirement_item['owner']) ? trim((string) $requirement_item['owner']) : '-';
      $owner_side        = isset($requirement_item['owner_side']) ? trim((string) $requirement_item['owner_side']) : 'Consultant';
      $status            = isset($requirement_item['status']) ? trim((string) $requirement_item['status']) : 'Not Started';
      $readiness_percent = isset($requirement_item['readiness_percent']) ? (int) $requirement_item['readiness_percent'] : 0;
      $files_count       = isset($requirement_item['supporting_files_count']) ? (int) $requirement_item['supporting_files_count'] : 0;
      $missing_count     = isset($requirement_item['missing_items_count']) ? (int) $requirement_item['missing_items_count'] : 0;
      $detail_drawer_id  = isset($requirement_item['detail_drawer_id']) ? trim((string) $requirement_item['detail_drawer_id']) : '';
      $requirement_rfi_links = isset($requirement_item['rfi_links']) && is_array($requirement_item['rfi_links'])
        ? $requirement_item['rfi_links']
        : [];

      $missing_items_text_class = $missing_count > 0 ? 'text-negative-700' : 'text-brand-600';
      $readiness_class = ($status === 'Satisfied' || $status === 'Ready for Gap Analysis')
        ? 'readiness text-positive-700'
        : 'readiness text-brand-600';
      $status_text_class = isset($status_text_class_map[$status]) ? $status_text_class_map[$status] : 'text-brand-700';

      ob_start();
      ?>
      <div class="py-1">
        <div class="flex flex-wrap items-center gap-2">
          <?php if ($credit_detail_url !== ''): ?>
            <a href="<?= e($credit_detail_url); ?>" class="inline-flex flex-wrap items-center gap-2 group">
              <?php if ($credit !== ''): ?>
                <span class="leading-5 inline-block text-xs text-center rounded-md border border-brand-300 bg-brand-100 text-brand-700 min-w-10">
                  <?= e($credit); ?>
                </span>
              <?php endif; ?>
              <div class="font-medium text-base text-brand-900 group-hover:underline">
                <?= e($requirement_title); ?>
                <span data-requirement-readiness-cell="<?= e((string) $requirement_item['id']); ?>" class="font-normal text-sm pl-2 <?= e($readiness_class); ?>"><?= e($readiness_percent . '%'); ?></span>
              </div>
            </a>
          <?php else: ?>
            <?php if ($credit !== ''): ?>
              <span class="leading-5 inline-block text-xs text-center rounded-md border border-brand-300 bg-brand-100 text-brand-700 min-w-10">
                <?= e($credit); ?>
              </span>
            <?php endif; ?>
            <div class="font-medium text-base text-brand-900">
              <?= e($requirement_title); ?>
              <span data-requirement-readiness-cell="<?= e((string) $requirement_item['id']); ?>" class="font-normal text-sm pl-2 <?= e($readiness_class); ?>"><?= e($readiness_percent . '%'); ?></span>
            </div>
          <?php endif; ?>
        </div>
        <div class="mt-2 flex items-center gap-3 divide-x divide-brand-300 leading-none ml-12">
          <?php if ($missing_count > 0) : ?>
          <div class="missing-items <?= e($missing_items_text_class); ?>">Missing Items : <?= e((string) $missing_count); ?></div>
          <?php endif ?>
          <div class="supporting-files <?php if ($missing_count > 0) { ?>pl-3<?php } ?>">Files : <?= e((string) $files_count); ?></div>
          <div class="owner pl-3">Owner : <?= e($owner_side); ?> &rarr; <?= e($owner); ?></div>
        </div>
        <?php if ($requirement_rfi_links !== []): ?>
          <div class="mt-3 ml-12">
            <?php foreach ($requirement_rfi_links as $rfi_link_item): ?>
              <?php
              $rfi_link_label = isset($rfi_link_item['label']) ? trim((string) $rfi_link_item['label']) : '';
              $rfi_link_href = isset($rfi_link_item['href']) ? trim((string) $rfi_link_item['href']) : '#';

              if ($rfi_link_label === '') {
                continue;
              }
              ?>
              <a href="<?= e($rfi_link_href); ?>" class="rfi-link flex items-center gap-2 text-primary-700 group">
                <span class="text-brand-500">&rarr;</span>
                <span class="group-hover:underline"><?= e($rfi_link_label); ?></span>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="hidden mt-2 pt-2 border-t border-brand-200 text-sm text-brand-500 flex items-center gap-4 leading-5">
          <div class="status">Status : <span data-requirement-status-cell="<?= e((string) $requirement_item['id']); ?>" class="<?= e($status_text_class); ?>"><?= e($status); ?></span></div>
          <div class="status hidden">Confidence : <span class="text-positive-700">High</span></div>
        </div>
        <div class="hidden mt-3 flex flex-wrap items-center gap-2">
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
      $table_rows[] = [
        'cells' => [
          'requirement' => ['content' => $requirement_html, 'is_html' => true],
        ],
      ];
    }
    ?>
    <section class="rounded-lg border border-brand-200 bg-brand-900 p-1" aria-label="<?= e($criteria_code . ' requirement group'); ?>">
      <header class="flex flex-wrap items-center justify-between gap-2  p-4 pt-3">
        <h3 class="font-semibold text-base text-white"><?= e($criteria_code . ' - ' . $criteria_label); ?></h3>
        <?php component('badge', ['items' => [['label' => (string) count($requirement_items) . ' requirement(s)', 'tone' => 'neutral']]]); ?>
      </header>

      <div class="rounded-md overflow-hidden">
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
