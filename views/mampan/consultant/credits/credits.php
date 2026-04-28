<?php

declare(strict_types=1);

$page_title = 'Credit Category';

require __DIR__ . '/../_data/phase_data.php';
require __DIR__ . '/../../_data/credits.php';

$current_phase = resolve_mampan_current_phase($phase_data_map);
$page_current = 'consultant-projects';
$project_current = 'project-workspace';

$requested_category = isset($_GET['category']) ? strtolower(trim((string) $_GET['category'])) : 'ee';
$resolved_credits_data = isset($credits_data) && is_array($credits_data) ? $credits_data : ['categories' => []];
$all_categories = isset($resolved_credits_data['categories']) && is_array($resolved_credits_data['categories'])
  ? $resolved_credits_data['categories']
  : [];
$selected_category = null;

foreach ($all_categories as $category_item) {
  if (!is_array($category_item)) {
    continue;
  }

  $category_key = isset($category_item['category_key']) ? strtolower(trim((string) $category_item['category_key'])) : '';

  if ($category_key === $requested_category) {
    $selected_category = $category_item;
    break;
  }
}

if (!is_array($selected_category) && $all_categories !== []) {
  $first_category = reset($all_categories);
  $selected_category = is_array($first_category) ? $first_category : null;
}

$selected_category_key = is_array($selected_category) && isset($selected_category['category_key'])
  ? strtolower(trim((string) $selected_category['category_key']))
  : 'ee';
$selected_category_code = is_array($selected_category) && isset($selected_category['category_code'])
  ? trim((string) $selected_category['category_code'])
  : strtoupper($selected_category_key);
$selected_category_title = is_array($selected_category) && isset($selected_category['category_title'])
  ? trim((string) $selected_category['category_title'])
  : 'Category';
$selected_category_subtitle = is_array($selected_category) && isset($selected_category['category_subtitle'])
  ? trim((string) $selected_category['category_subtitle'])
  : '';
$selected_category_sections = is_array($selected_category) && isset($selected_category['sections']) && is_array($selected_category['sections'])
  ? $selected_category['sections']
  : [];

$status_label_map = [
  'not_started'      => 'Draft',
  'in_progress'      => 'Under Review',
  'completed'        => 'Verified',
  'missing_evidence' => 'Pending Client',
];

$document_status_map = [
  'not_started'      => 'Not Started',
  'in_progress'      => 'Partial',
  'completed'        => 'Satisfied',
  'missing_evidence' => 'Missing',
];

$clarification_status_map = [
  'not_started'      => 'Open',
  'in_progress'      => 'Under Review',
  'completed'        => 'Resolved',
  'missing_evidence' => 'Awaiting Client',
];

$credit_rows = [];
$document_rows = [];
$clarification_rows = [];
$total_credits = 0;
$total_documents = 0;
$total_clarifications = 0;

foreach ($selected_category_sections as $section_item) {
  if (!is_array($section_item)) {
    continue;
  }

  $section_credits = isset($section_item['credits']) && is_array($section_item['credits'])
    ? $section_item['credits']
    : [];

  foreach ($section_credits as $credit_item) {
    if (!is_array($credit_item)) {
      continue;
    }

    $credit_code = isset($credit_item['code']) ? trim((string) $credit_item['code']) : '';
    $credit_title = isset($credit_item['title']) ? trim((string) $credit_item['title']) : '';

    if ($credit_code === '' || $credit_title === '') {
      continue;
    }

    $credit_status = isset($credit_item['status']) ? trim((string) $credit_item['status']) : 'not_started';
    $credit_scoring = isset($credit_item['scoring']) && is_array($credit_item['scoring']) ? $credit_item['scoring'] : [];
    $earned_points = isset($credit_scoring['earned_points']) && is_numeric($credit_scoring['earned_points'])
      ? (int) $credit_scoring['earned_points']
      : 0;
    $max_points = isset($credit_scoring['max_points']) && is_numeric($credit_scoring['max_points'])
      ? (int) $credit_scoring['max_points']
      : 0;
    $attachments_count = isset($credit_item['attachments_count']) && is_numeric($credit_item['attachments_count'])
      ? (int) $credit_item['attachments_count']
      : 0;

    $credit_rows[] = [
      'code'         => $credit_code,
      'title'        => $credit_title,
      'status_key'   => $credit_status,
      'status_label' => isset($status_label_map[$credit_status]) ? $status_label_map[$credit_status] : 'Draft',
      'score_label'  => (string) $earned_points . '/' . (string) $max_points . ' pts',
      'detail_url'   => path('/mampan/consultant/credits/credit?code=' . strtolower($credit_code)),
    ];

    $total_credits++;

    $document_rows[] = [
      'document_name' => $credit_code . ' Evidence Package',
      'credit_code'   => $credit_code,
      'status'        => isset($document_status_map[$credit_status]) ? $document_status_map[$credit_status] : 'Not Started',
      'file_count'    => $attachments_count,
      'url'           => path('/mampan/consultant/documents/document-hub'),
    ];
    $total_documents++;

    $clarification_rows[] = [
      'rfi_no'       => 'RFI-' . $credit_code,
      'subject'      => $credit_code . ' Clarification Follow-up',
      'credit_code'  => $credit_code,
      'status'       => isset($clarification_status_map[$credit_status]) ? $clarification_status_map[$credit_status] : 'Open',
      'detail_url'   => path('/mampan/consultant/rfi/rfi-index'),
    ];
    $total_clarifications++;
  }
}

layout('mampan/dashboard-project', [
  'page_title'      => $page_title,
  'page_current'    => $page_current,
  'project_current' => $project_current,
  'current_phase'   => $current_phase,
  'phase_data_map'  => $phase_data_map,
  'phase_label_map' => $phase_label_map,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <header class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-category-heading">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <?php component('button', [
        'label'   => 'Back to Credits Matrix',
        'href'    => path('/mampan/consultant/credits/credits-matrix#assessment-category-' . $selected_category_key),
        'variant' => 'default',
        'size'    => 'sm',
      ]); ?>
      <?php component('button', [
        'label'   => 'Open Document Hub',
        'href'    => path('/mampan/consultant/documents/document-hub'),
        'variant' => 'default',
        'size'    => 'sm',
      ]); ?>
    </div>

    <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-brand-500"><?= e($selected_category_code); ?> Matrix</p>
    <h1 id="credit-category-heading" class="mt-1 text-2xl font-semibold text-brand-900 md:text-3xl"><?= e($selected_category_title); ?></h1>
    <?php if ($selected_category_subtitle !== ''): ?>
      <p class="mt-1 text-sm text-brand-600"><?= e($selected_category_subtitle); ?></p>
    <?php endif; ?>
  </header>

  <section class="grid gap-4 md:grid-cols-3" aria-label="Category summary">
    <div class="rounded-lg border border-brand-200 bg-white p-4">
      <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Credits</p>
      <p class="mt-2 text-2xl font-semibold text-brand-900"><?= e((string) $total_credits); ?></p>
    </div>
    <div class="rounded-lg border border-brand-200 bg-white p-4">
      <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Documents</p>
      <p class="mt-2 text-2xl font-semibold text-brand-900"><?= e((string) $total_documents); ?></p>
    </div>
    <div class="rounded-lg border border-brand-200 bg-white p-4">
      <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Clarifications</p>
      <p class="mt-2 text-2xl font-semibold text-brand-900"><?= e((string) $total_clarifications); ?></p>
    </div>
  </section>

  <?php
  $category_id = 'assessment-category-' . $selected_category_key;
  $category_url = path('/mampan/consultant/credits/credits?category=' . urlencode($selected_category_key));
  ?>
  <section id="<?= e($category_id); ?>" class="bg-brand-900 rounded-lg p-1 scroll-mt-24" aria-labelledby="category-credits-heading">
    <header class="px-4 pt-3 pb-4 flex items-center justify-between gap-4">
      <div class="flex items-center gap-4">
        <div>
          <h2 id="category-credits-heading" class="text-xl text-white font-medium">
            <a href="<?= e($category_url); ?>" class="hover:underline"><?= e($selected_category_title); ?></a>
          </h2>
        </div>
      </div>
    </header>

    <article class="bg-white rounded-md overflow-hidden p-2">
      <div class="space-y-2">
        <?php foreach ($credit_rows as $credit_row): ?>
          <?php
          $credit_code = (string) $credit_row['code'];
          $credit_title = (string) $credit_row['title'];
          $credit_status_key = isset($credit_row['status_key']) ? (string) $credit_row['status_key'] : 'not_started';
          $credit_url = (string) $credit_row['detail_url'];
          ?>
          <a href="<?= e($credit_url); ?>" class="assessment-bar block rounded-lg border border-brand-200 bg-white transition hover:border-brand-400 hover:shadow-sm">
            <div class="flex flex-wrap items-center gap-2 pl-3 py-2 pr-3">
              <?php component('dashboard/assessment-status', [
                'assessment_status' => $credit_status_key,
                'assessment_status_class' => 'assessment-bar__status',
              ]); ?>
              <span class="leading-5 inline-flex w-[36px] items-center justify-center text-xs rounded-md ring-1 ring-inset ring-brand-300 bg-brand-100 text-brand-700"><?= e($credit_code); ?></span>
              <h3 class="text-brand-900"><?= e($credit_title); ?></h3>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    </article>
  </section>

  <div class="space-y-1">
    <?php foreach ($credit_rows as $credit_row): ?>
    <?php
    $credit_code = (string) $credit_row['code'];
    $credit_title = (string) $credit_row['title'];
    $credit_status_key = isset($credit_row['status_key']) ? (string) $credit_row['status_key'] : 'not_started';
    $credit_url = (string) $credit_row['detail_url'];
    ?>
    <a href="<?= e($credit_url); ?>" class="assessment-bar block rounded-lg border border-brand-200 bg-white transition hover:border-brand-400 hover:shadow-sm">
      <div class="flex flex-wrap items-start gap-2 pl-3 py-3  pr-3">
        <?php component('dashboard/assessment-status', [
          'assessment_status' => $credit_status_key,
          'assessment_status_class' => 'assessment-bar__status',
        ]); ?>
        <span class="leading-5 inline-flex w-[36px] items-center justify-center text-xs rounded-md ring-1 ring-inset ring-brand-300 bg-brand-100 text-brand-700"><?= e($credit_code); ?></span>
        <div>
          <h3 class="text-brand-900 leading-5 font-medium"><?= e($credit_title); ?></h3>
          <div class="mt-2 flex items-center gap-4 divide-x divide-brand-300 leading-4">
            <div class="missing-items text-brand-600">Missing Items : 0</div>
            <div class="supporting-files pl-4">Files : 8</div>
            <div class="owner pl-4">Owner : Consultant → Energy Modeller</div>
          </div>
        </div>
      </div>
    </a>
    <?php endforeach; ?>
  </div>

  <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="category-documents-heading">
    <header class="border-b border-brand-200 pb-4">
      <h2 id="category-documents-heading" class="text-lg font-semibold text-brand-900">Documents by Credit Code</h2>
    </header>
    <div class="mt-4 space-y-2">
      <?php foreach ($document_rows as $document_row): ?>
        <?php
        $document_name = (string) $document_row['document_name'];
        $credit_code = (string) $document_row['credit_code'];
        $document_status = (string) $document_row['status'];
        $file_count = (int) $document_row['file_count'];
        $document_url = (string) $document_row['url'];
        ?>
        <article class="rounded-md border border-brand-200 p-3">
          <div class="flex flex-wrap items-center gap-2">
            <p class="font-medium text-brand-900"><?= e($document_name); ?></p>
            <p class="text-xs text-brand-500">Credit: <?= e($credit_code); ?></p>
            <p class="ml-auto text-sm text-brand-600">Files: <?= e((string) $file_count); ?></p>
            <p class="text-xs text-brand-500"><?= e($document_status); ?></p>
            <a href="<?= e($document_url); ?>" class="text-sm text-primary-700 hover:underline">Open</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="category-clarifications-heading">
    <header class="border-b border-brand-200 pb-4">
      <h2 id="category-clarifications-heading" class="text-lg font-semibold text-brand-900">Clarifications by Credit Code</h2>
    </header>
    <div class="mt-4 space-y-2">
      <?php foreach ($clarification_rows as $clarification_row): ?>
        <?php
        $rfi_no = (string) $clarification_row['rfi_no'];
        $subject = (string) $clarification_row['subject'];
        $credit_code = (string) $clarification_row['credit_code'];
        $clarification_status = (string) $clarification_row['status'];
        $detail_url = (string) $clarification_row['detail_url'];
        ?>
        <article class="rounded-md border border-brand-200 p-3">
          <div class="flex flex-wrap items-center gap-2">
            <p class="font-medium text-brand-900"><?= e($rfi_no); ?></p>
            <p class="text-brand-700"><?= e($subject); ?></p>
            <p class="text-xs text-brand-500">Credit: <?= e($credit_code); ?></p>
            <p class="ml-auto text-xs text-brand-500"><?= e($clarification_status); ?></p>
            <a href="<?= e($detail_url); ?>" class="text-sm text-primary-700 hover:underline">Open</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
