<?php

declare(strict_types=1);

$page_title = 'Credits Matrix';

require __DIR__ . '/../_data/phase_data.php';
require __DIR__ . '/../../_data/credits.php';

$current_phase = resolve_mampan_current_phase($phase_data_map);
$page_current = 'consultant-projects';
$project_current = 'project-workspace';
$resolved_credits_data = isset($credits_data) && is_array($credits_data) ? $credits_data : ['categories' => [], 'credits' => []];
$source_categories = isset($resolved_credits_data['categories']) && is_array($resolved_credits_data['categories'])
  ? $resolved_credits_data['categories']
  : [];
$source_credits = isset($resolved_credits_data['credits']) && is_array($resolved_credits_data['credits'])
  ? $resolved_credits_data['credits']
  : [];

$total_credits = 0;
$total_earned_points = 0;
$total_max_points = 0;
$total_under_review = 0;

foreach ($source_credits as $source_credit) {
  if (!is_array($source_credit)) {
    continue;
  }

  $total_credits++;
  $credit_status = isset($source_credit['status']) ? trim((string) $source_credit['status']) : '';
  $credit_scoring = isset($source_credit['scoring']) && is_array($source_credit['scoring']) ? $source_credit['scoring'] : [];
  $credit_earned_points = isset($credit_scoring['earned_points']) && is_numeric($credit_scoring['earned_points'])
    ? (int) $credit_scoring['earned_points']
    : 0;
  $credit_max_points = isset($credit_scoring['max_points']) && is_numeric($credit_scoring['max_points'])
    ? (int) $credit_scoring['max_points']
    : 0;

  $total_earned_points += $credit_earned_points;
  $total_max_points += $credit_max_points;

  if ($credit_status === 'in_progress' || $credit_status === 'missing_evidence') {
    $total_under_review++;
  }
}

$credits_matrix_summary = [
  ['label' => 'Target Rating', 'value' => 'GBI Gold', 'helper' => 'Project certification target'],
  ['label' => 'Current Score', 'value' => (string) $total_earned_points . ' / ' . (string) $total_max_points, 'helper' => 'Score based on assessment form data'],
  ['label' => 'Total Credits', 'value' => (string) $total_credits, 'helper' => 'Credits listed in assessment form'],
  ['label' => 'Credits Under Review', 'value' => (string) $total_under_review, 'helper' => 'In progress or pending client items'],
];

$credits_categories = [];

foreach ($source_categories as $source_category) {
  if (!is_array($source_category)) {
    continue;
  }

  $category_key = isset($source_category['category_key']) ? trim((string) $source_category['category_key']) : '';
  $category_code = isset($source_category['category_code']) ? trim((string) $source_category['category_code']) : strtoupper($category_key);
  $category_title = isset($source_category['category_title']) ? trim((string) $source_category['category_title']) : '';
  $category_subtitle = isset($source_category['category_subtitle']) ? trim((string) $source_category['category_subtitle']) : '';
  $category_icon_name = isset($source_category['category_icon']) ? trim((string) $source_category['category_icon']) : '';
  $category_sections = isset($source_category['sections']) && is_array($source_category['sections'])
    ? $source_category['sections']
    : [];

  $category_max_points_total = 0;
  $category_earned_points_total = 0;
  $category_under_review_count = 0;
  $category_credit_rows = [];

  foreach ($category_sections as $category_section) {
    if (!is_array($category_section)) {
      continue;
    }

    $section_credits = isset($category_section['credits']) && is_array($category_section['credits'])
      ? $category_section['credits']
      : [];

    foreach ($section_credits as $section_credit) {
      if (!is_array($section_credit)) {
        continue;
      }

      $credit_status = isset($section_credit['status']) ? trim((string) $section_credit['status']) : 'not_started';
      $credit_scoring = isset($section_credit['scoring']) && is_array($section_credit['scoring']) ? $section_credit['scoring'] : [];
      $credit_earned_points = isset($credit_scoring['earned_points']) && is_numeric($credit_scoring['earned_points'])
        ? (int) $credit_scoring['earned_points']
        : 0;
      $credit_max_points = isset($credit_scoring['max_points']) && is_numeric($credit_scoring['max_points'])
        ? (int) $credit_scoring['max_points']
        : 0;

      $category_earned_points_total += $credit_earned_points;
      $category_max_points_total += $credit_max_points;

      if ($credit_status === 'in_progress' || $credit_status === 'missing_evidence') {
        $category_under_review_count++;
      }

      $category_credit_rows[] = [
        'credit'       => isset($section_credit['code']) ? (string) $section_credit['code'] : '-',
        'title'        => isset($section_credit['title']) ? (string) $section_credit['title'] : '-',
        'status_key'   => $credit_status,
      ];
    }
  }

  $credits_categories[] = [
    'code'        => $category_code,
    'id'          => 'assessment-category-' . $category_key,
    'title'       => $category_title,
    'subtitle'    => $category_subtitle,
    'icon_name'   => $category_icon_name !== '' ? $category_icon_name : 'shapes-line',
    'credits'     => $category_credit_rows,
  ];
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
  <header class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credits-matrix-heading">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Project Credits</p>
        <h1 id="credits-matrix-heading" class="mt-1 text-2xl font-semibold text-brand-900 md:text-3xl">Credits Matrix</h1>
        <p class="mt-1 text-sm text-brand-600">Track category-level progress and quick status across EE, EQ, SM, MR, WE, and IN.</p>
      </div>
      <?php component('button', [
        'label'   => 'Back to Workspace',
        'href'    => path('/mampan/consultant/projects/project-workspace'),
        'variant' => 'default',
      ]); ?>
    </div>
  </header>

  <section class="grid gap-4 md:grid-cols-2 xl:grid-cols-4" aria-label="Credits matrix summary">
    <?php foreach ($credits_matrix_summary as $summary_item): ?>
      <?php
      $summary_label = (string) $summary_item['label'];
      $summary_value = (string) $summary_item['value'];
      $summary_helper = (string) $summary_item['helper'];
      ?>
      <div class="rounded-lg border border-brand-200 bg-white p-4">
        <p class="text-xs font-semibold uppercase tracking-wide text-brand-500"><?= e($summary_label); ?></p>
        <p class="mt-2 text-2xl font-semibold text-brand-900"><?= e($summary_value); ?></p>
        <p class="mt-1 text-sm text-brand-600"><?= e($summary_helper); ?></p>
      </div>
    <?php endforeach; ?>
  </section>

  <section class="mt-2" aria-labelledby="credits-status-legend-heading">
    <h2 id="credits-status-legend-heading" class="sr-only">Credits status legend</h2>
    <div class="bg-white px-5 py-3 flex flex-wrap items-center gap-6 rounded-lg border border-brand-300">
      <div class="flex items-center gap-2">
        <?php component('dashboard/assessment-status', ['assessment_status' => 'completed']); ?>
        <span class="text-sm text-brand-700">Verified</span>
      </div>
      <div class="flex items-center gap-2">
        <?php component('dashboard/assessment-status', ['assessment_status' => 'in_progress']); ?>
        <span class="text-sm text-brand-700">Under Review</span>
      </div>
      <div class="flex items-center gap-2">
        <?php component('dashboard/assessment-status', ['assessment_status' => 'missing_evidence']); ?>
        <span class="text-sm text-brand-700">Pending Client</span>
      </div>
      <div class="flex items-center gap-2">
        <?php component('dashboard/assessment-status', ['assessment_status' => 'not_started']); ?>
        <span class="text-sm text-brand-700">Draft</span>
      </div>
    </div>
  </section>

  <section class="space-y-8" aria-label="Credits matrix categories">
    <?php foreach ($credits_categories as $category): ?>
      <?php
      $category_code = (string) $category['code'];
      $category_id = (string) $category['id'];
      $category_title = (string) $category['title'];
      $category_subtitle = isset($category['subtitle']) ? (string) $category['subtitle'] : '';
      $category_icon_name = isset($category['icon_name']) ? (string) $category['icon_name'] : 'flashlight-line';
      $category_key = str_replace('assessment-category-', '', $category_id);
      $category_url = path('/mampan/consultant/credits/credits?category=' . urlencode($category_key));
      $category_credits = isset($category['credits']) && is_array($category['credits']) ? $category['credits'] : [];
      ?>
      <section id="<?= e($category_id); ?>" class="bg-brand-900 rounded-lg p-1 scroll-mt-24" aria-label="<?= e($category_code . ' credits'); ?>">
        <header class="px-4 pt-3 pb-4 flex items-center justify-between gap-4">
          <div class="flex items-center gap-4">
           
            <div>
              <h2 class="text-xl text-white font-medium"><a href="<?= e($category_url); ?>" class="hover:underline"><?= e($category_title); ?></a></h2>
              
            </div>
          </div>
        </header>

        <article class="bg-white rounded-md overflow-hidden p-2">
          <div class="space-y-2">
            <?php foreach ($category_credits as $credit_row): ?>
              <?php
              $credit_code = isset($credit_row['credit']) ? (string) $credit_row['credit'] : '-';
              $credit_title = isset($credit_row['title']) ? (string) $credit_row['title'] : '-';
              $credit_status_key = isset($credit_row['status_key']) ? (string) $credit_row['status_key'] : 'not_started';
              $credit_url = path('/mampan/consultant/credits/credit?code=' . strtolower($credit_code));
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
    <?php endforeach; ?>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
