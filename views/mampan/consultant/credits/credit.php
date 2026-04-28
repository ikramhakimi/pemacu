<?php

declare(strict_types=1);

$page_title = 'Credit Detail';

require __DIR__ . '/../_data/phase_data.php';
require __DIR__ . '/../../_data/credits.php';

$current_phase = resolve_mampan_current_phase($phase_data_map);
$page_current = 'consultant-projects';
$project_current = 'project-workspace';

$requested_code = isset($_GET['code']) ? strtolower(trim((string) $_GET['code'])) : 'ee1';
$resolved_credits_data = isset($credits_data) && is_array($credits_data) ? $credits_data : ['credits' => []];
$all_credits = isset($resolved_credits_data['credits']) && is_array($resolved_credits_data['credits'])
  ? $resolved_credits_data['credits']
  : [];
$selected_credit = null;

foreach ($all_credits as $credit_item) {
  if (!is_array($credit_item)) {
    continue;
  }

  $candidate_code = isset($credit_item['code']) ? strtolower(trim((string) $credit_item['code'])) : '';

  if ($candidate_code === $requested_code) {
    $selected_credit = $credit_item;
    break;
  }
}

if (!is_array($selected_credit) && $all_credits !== []) {
  $first_credit = reset($all_credits);
  $selected_credit = is_array($first_credit) ? $first_credit : null;
}

$credit_code = is_array($selected_credit) && isset($selected_credit['code'])
  ? trim((string) $selected_credit['code'])
  : 'EE1';
$credit_title = is_array($selected_credit) && isset($selected_credit['title'])
  ? trim((string) $selected_credit['title'])
  : 'Credit Detail';
$credit_category_code = is_array($selected_credit) && isset($selected_credit['category_code'])
  ? strtolower(trim((string) $selected_credit['category_code']))
  : 'ee';
$credit_category_title = is_array($selected_credit) && isset($selected_credit['category_title'])
  ? trim((string) $selected_credit['category_title'])
  : 'Category';
$credit_section_title = is_array($selected_credit) && isset($selected_credit['section_title'])
  ? trim((string) $selected_credit['section_title'])
  : 'Section';
$credit_criteria = is_array($selected_credit) && isset($selected_credit['criteria'])
  ? trim((string) $selected_credit['criteria'])
  : '';
$credit_criteria_preview = is_array($selected_credit) && isset($selected_credit['criteria_preview'])
  ? trim((string) $selected_credit['criteria_preview'])
  : '';
$credit_attachments_count = is_array($selected_credit) && isset($selected_credit['attachments_count']) && is_numeric($selected_credit['attachments_count'])
  ? (int) $selected_credit['attachments_count']
  : 0;
$credit_remarks_preview = is_array($selected_credit) && isset($selected_credit['remarks_preview'])
  ? trim((string) $selected_credit['remarks_preview'])
  : '';
$credit_status_key = is_array($selected_credit) && isset($selected_credit['status'])
  ? trim((string) $selected_credit['status'])
  : 'not_started';
$credit_scoring = is_array($selected_credit) && isset($selected_credit['scoring']) && is_array($selected_credit['scoring'])
  ? $selected_credit['scoring']
  : [];
$credit_scoring_mode = isset($credit_scoring['mode']) ? trim((string) $credit_scoring['mode']) : 'sum';
$credit_earned_points = isset($credit_scoring['earned_points']) && is_numeric($credit_scoring['earned_points'])
  ? (int) $credit_scoring['earned_points']
  : 0;
$credit_max_points = isset($credit_scoring['max_points']) && is_numeric($credit_scoring['max_points'])
  ? (int) $credit_scoring['max_points']
  : 0;
$credit_options = isset($credit_scoring['options']) && is_array($credit_scoring['options'])
  ? $credit_scoring['options']
  : [];
$credit_status_label_map = [
  'not_started'      => 'Draft',
  'in_progress'      => 'Under Review',
  'completed'        => 'Verified',
  'missing_evidence' => 'Pending Client',
];
$credit_status_tone_map = [
  'not_started'      => 'neutral',
  'in_progress'      => 'warning',
  'completed'        => 'positive',
  'missing_evidence' => 'negative',
];
$credit_status_label = isset($credit_status_label_map[$credit_status_key]) ? $credit_status_label_map[$credit_status_key] : 'Draft';
$credit_status_tone = isset($credit_status_tone_map[$credit_status_key]) ? $credit_status_tone_map[$credit_status_key] : 'neutral';
$criteria_text = $credit_criteria !== '' ? $credit_criteria : $credit_criteria_preview;
$credit_owner_map = [
  'ee' => 'Energy Modeller',
  'eq' => 'Mechanical Engineer',
  'sm' => 'Architect',
  'mr' => 'Procurement Manager',
  'we' => 'Facility Manager',
  'in' => 'Sustainability Consultant',
];
$credit_owner = isset($credit_owner_map[$credit_category_code]) ? $credit_owner_map[$credit_category_code] : 'Project Coordinator';
$review_state_map = [
  'not_started'      => 'Not Started',
  'in_progress'      => 'Under Review',
  'completed'        => 'Accepted',
  'missing_evidence' => 'Submitted',
];
$status_readiness_base_map = [
  'not_started'      => 18,
  'in_progress'      => 68,
  'completed'        => 92,
  'missing_evidence' => 44,
];
$readiness_base = isset($status_readiness_base_map[$credit_status_key]) ? (int) $status_readiness_base_map[$credit_status_key] : 18;
$readiness_percent = min(96, $readiness_base + min(8, $credit_attachments_count * 2));
$review_state = isset($review_state_map[$credit_status_key]) ? $review_state_map[$credit_status_key] : 'Not Started';
$mandatory_docs_complete = $credit_attachments_count > 0 && in_array($credit_status_key, ['in_progress', 'completed'], true);
$has_blocking_item = $credit_attachments_count === 0 || in_array($credit_status_key, ['not_started', 'missing_evidence'], true);
$has_critical_blocker = $credit_status_key === 'missing_evidence' && $credit_attachments_count === 0;
$next_action_map = [
  'not_started'      => 'Assign document owner and upload initial evidence package for this credit.',
  'in_progress'      => 'Close pending review comments and update the latest supporting files.',
  'completed'        => 'Lock final evidence and keep traceability ready for submission export.',
  'missing_evidence' => 'Raise clarification for missing mandatory evidence and follow up with owner.',
];
$consultant_note_map = [
  'not_started'      => 'Credit is tracked but no verifiable document package is linked yet.',
  'in_progress'      => 'Evidence package is in consultant review and requires final closure.',
  'completed'        => 'Current package is sufficient for credit verification and submission readiness.',
  'missing_evidence' => 'Key mandatory evidence is missing; credit cannot be validated at this stage.',
];
$recommended_action_map = [
  'not_started'      => 'Create an initial document checklist and assign due dates per owner.',
  'in_progress'      => 'Prepare final revision request list and close open comments in one cycle.',
  'completed'        => 'Maintain version lock and monitor any late document changes.',
  'missing_evidence' => 'Open clarification immediately and escalate if due date is at risk.',
];
$next_action_text = isset($next_action_map[$credit_status_key]) ? $next_action_map[$credit_status_key] : $next_action_map['not_started'];
$consultant_note_text = isset($consultant_note_map[$credit_status_key]) ? $consultant_note_map[$credit_status_key] : $consultant_note_map['not_started'];
$recommended_action_text = isset($recommended_action_map[$credit_status_key]) ? $recommended_action_map[$credit_status_key] : $recommended_action_map['not_started'];
$document_status_label_map = [
  'not_started'      => 'Not Started',
  'in_progress'      => 'Under Review',
  'completed'        => 'Satisfied',
  'missing_evidence' => 'Missing',
];
$primary_document_status = isset($document_status_label_map[$credit_status_key]) ? $document_status_label_map[$credit_status_key] : 'Not Started';
$support_document_status = $credit_attachments_count >= 2 ? 'Satisfied' : ($credit_attachments_count > 0 ? 'Partial' : 'Missing');
$declaration_status = $credit_status_key === 'completed'
  ? 'Satisfied'
  : ($credit_status_key === 'not_started' ? 'Not Started' : 'Pending Review');
$related_document_rows = [
  [
    'name'   => $credit_code . ' Primary Evidence Pack',
    'status' => $primary_document_status,
    'type'   => 'Core Evidence',
    'url'    => path('/mampan/consultant/documents/document-hub'),
  ],
  [
    'name'   => $credit_code . ' Supporting Calculation Sheet',
    'status' => $support_document_status,
    'type'   => 'Supporting File',
    'url'    => path('/mampan/consultant/documents/document-hub'),
  ],
  [
    'name'   => $credit_code . ' Compliance Declaration',
    'status' => $declaration_status,
    'type'   => 'Declaration',
    'url'    => path('/mampan/consultant/documents/document-hub'),
  ],
];
$rfi_pool_rows = [
  ['credit_code' => 'EE2', 'rfi_no' => 'RFI #004', 'subject' => 'EE2 Energy Monitoring Trend Data', 'status' => 'Awaiting Client', 'due_date' => '2026-04-27', 'url' => path('/mampan/consultant/rfi/rfi-detail?rfi=004')],
  ['credit_code' => 'EE2', 'rfi_no' => 'RFI #009', 'subject' => 'EE2 Meter Calibration Certificate', 'status' => 'Open', 'due_date' => '2026-04-29', 'url' => path('/mampan/consultant/rfi/rfi-detail?rfi=009')],
  ['credit_code' => 'EE2', 'rfi_no' => 'RFI #010', 'subject' => 'EE2 Monitoring Responsibility Matrix', 'status' => 'Under Review', 'due_date' => '2026-04-30', 'url' => path('/mampan/consultant/rfi/rfi-detail?rfi=010')],
  ['credit_code' => 'EQ4', 'rfi_no' => 'RFI #005', 'subject' => 'EQ4 Low-VOC Paint Declaration', 'status' => 'Open', 'due_date' => '2026-04-29', 'url' => path('/mampan/consultant/rfi/rfi-detail?rfi=005')],
  ['credit_code' => 'WE3', 'rfi_no' => 'RFI #006', 'subject' => 'WE3 Rainwater Harvesting O&M Manual', 'status' => 'Awaiting Client', 'due_date' => '2026-04-30', 'url' => path('/mampan/consultant/rfi/rfi-detail?rfi=006')],
  ['credit_code' => 'MR2', 'rfi_no' => 'RFI #007', 'subject' => 'MR2 Sustainable Material Certificate', 'status' => 'Overdue', 'due_date' => '2026-04-24', 'url' => path('/mampan/consultant/rfi/rfi-detail?rfi=007')],
  ['credit_code' => 'EE CX', 'rfi_no' => 'RFI #008', 'subject' => 'AHU Commissioning Report Test Results', 'status' => 'Under Review', 'due_date' => '2026-04-28', 'url' => path('/mampan/consultant/rfi/rfi-detail?rfi=008')],
];
$credit_code_normalized = strtoupper(trim((string) preg_replace('/\s+/', ' ', $credit_code)));
$related_rfi_rows = [];

foreach ($rfi_pool_rows as $rfi_row) {
  if (!is_array($rfi_row)) {
    continue;
  }

  $rfi_credit_code = isset($rfi_row['credit_code']) ? strtoupper(trim((string) preg_replace('/\s+/', ' ', $rfi_row['credit_code']))) : '';

  if ($rfi_credit_code !== $credit_code_normalized) {
    continue;
  }

  $related_rfi_rows[] = $rfi_row;
}

$submitted_items = [];

if ($credit_attachments_count > 0) {
  $submitted_items[] = 'Primary evidence file uploaded';
}

if ($credit_attachments_count > 1) {
  $submitted_items[] = 'Supporting calculations uploaded';
}

if ($credit_status_key === 'completed') {
  $submitted_items[] = 'Final declaration accepted';
}

$missing_items = [];

if ($credit_attachments_count === 0) {
  $missing_items[] = 'Initial evidence package not uploaded';
}

if ($credit_status_key === 'missing_evidence') {
  $missing_items[] = 'Mandatory supporting evidence incomplete';
}

if ($review_state !== 'Accepted') {
  $missing_items[] = 'Consultant review closure pending';
}

$activity_timeline = [
  [
    'title' => 'Credit page opened',
    'time'  => date('Y-m-d H:i'),
    'note'  => 'Reviewing current credit context and evidence readiness.',
  ],
  [
    'title' => 'Latest document status',
    'time'  => '2026-04-24 10:40',
    'note'  => $primary_document_status . ' in Document Hub for ' . $credit_code . '.',
  ],
  [
    'title' => 'Clarification check',
    'time'  => '2026-04-24 11:20',
    'note'  => $related_rfi_rows === []
      ? 'No active clarification linked to this credit.'
      : (string) count($related_rfi_rows) . ' clarification item(s) linked to this credit.',
  ],
];

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
  <header class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-detail-heading">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <?php component('button', [
        'label'   => 'Back to Credits Matrix',
        'href'    => path('/mampan/consultant/credits/credits-matrix#assessment-category-' . $credit_category_code),
        'variant' => 'default',
        'size'    => 'sm',
      ]); ?>
      <div class="flex flex-wrap items-center gap-2">
        <?php component('badge', ['items' => [['label' => $credit_status_label, 'tone' => $credit_status_tone]]]); ?>
        <?php component('badge', ['items' => [['label' => (string) $credit_earned_points . '/' . (string) $credit_max_points . ' pts', 'tone' => 'neutral']]]); ?>
      </div>
    </div>

    <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-brand-500"><?= e($credit_code); ?></p>
    <h1 id="credit-detail-heading" class="mt-1 text-2xl font-semibold text-brand-900 md:text-3xl"><?= e($credit_title); ?></h1>
    <p class="mt-1 text-sm text-brand-600"><?= e($credit_category_title); ?> • <?= e($credit_section_title); ?></p>
  </header>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Credit detail layout">
    <div class="space-y-5 xl:col-span-8">
      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-criteria-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="credit-criteria-heading" class="text-lg font-semibold text-brand-900">Credit Criteria</h2>
        </header>
        <p class="mt-4 text-sm text-brand-700"><?= e($criteria_text !== '' ? $criteria_text : 'No criteria details available.'); ?></p>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-gate-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="credit-gate-heading" class="text-lg font-semibold text-brand-900">Requirement Gate</h2>
        </header>
        <dl class="mt-4 grid gap-3 md:grid-cols-2">
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <dt class="text-xs uppercase tracking-wide text-brand-500">Readiness</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e((string) $readiness_percent); ?>%</dd>
          </div>
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <dt class="text-xs uppercase tracking-wide text-brand-500">Review State</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($review_state); ?></dd>
          </div>
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <dt class="text-xs uppercase tracking-wide text-brand-500">Mandatory Docs</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($mandatory_docs_complete ? 'Complete' : 'Incomplete'); ?></dd>
          </div>
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <dt class="text-xs uppercase tracking-wide text-brand-500">Blocking Item</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($has_blocking_item ? 'Yes' : 'No'); ?></dd>
          </div>
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3 md:col-span-2">
            <dt class="text-xs uppercase tracking-wide text-brand-500">Critical Blocker</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($has_critical_blocker ? 'Yes' : 'No'); ?></dd>
          </div>
        </dl>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-documents-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="credit-documents-heading" class="text-lg font-semibold text-brand-900">Related Documents</h2>
        </header>
        <div class="mt-4 space-y-2">
          <?php foreach ($related_document_rows as $document_row): ?>
            <?php
            $document_name = isset($document_row['name']) ? (string) $document_row['name'] : '-';
            $document_type = isset($document_row['type']) ? (string) $document_row['type'] : '-';
            $document_status = isset($document_row['status']) ? (string) $document_row['status'] : '-';
            $document_url = isset($document_row['url']) ? (string) $document_row['url'] : '#';
            ?>
            <article class="rounded-md border border-brand-200 p-3">
              <div class="flex flex-wrap items-center gap-2">
                <p class="font-medium text-brand-900"><?= e($document_name); ?></p>
                <p class="text-xs text-brand-500"><?= e($document_type); ?></p>
                <p class="ml-auto text-xs text-brand-500"><?= e($document_status); ?></p>
                <a href="<?= e($document_url); ?>" class="text-sm text-primary-700 hover:underline">Open</a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-clarifications-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="credit-clarifications-heading" class="text-lg font-semibold text-brand-900">Related Clarifications</h2>
        </header>
        <div class="mt-4 space-y-2">
          <?php if ($related_rfi_rows === []): ?>
            <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
              <p class="text-sm text-brand-700">No clarification linked to this credit yet.</p>
            </div>
          <?php else: ?>
            <?php foreach ($related_rfi_rows as $rfi_row): ?>
              <?php
              $rfi_no = isset($rfi_row['rfi_no']) ? (string) $rfi_row['rfi_no'] : '-';
              $rfi_subject = isset($rfi_row['subject']) ? (string) $rfi_row['subject'] : '-';
              $rfi_status = isset($rfi_row['status']) ? (string) $rfi_row['status'] : '-';
              $rfi_due_date = isset($rfi_row['due_date']) ? (string) $rfi_row['due_date'] : '-';
              $rfi_url = isset($rfi_row['url']) ? (string) $rfi_row['url'] : '#';
              ?>
              <article class="rounded-md border border-brand-200 p-3">
                <div class="flex flex-wrap items-center gap-2">
                  <p class="font-medium text-brand-900"><?= e($rfi_no); ?></p>
                  <p class="text-brand-700"><?= e($rfi_subject); ?></p>
                  <p class="text-xs text-brand-500">Due: <?= e($rfi_due_date); ?></p>
                  <p class="ml-auto text-xs text-brand-500"><?= e($rfi_status); ?></p>
                  <a href="<?= e($rfi_url); ?>" class="text-sm text-primary-700 hover:underline">Open</a>
                </div>
              </article>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </section>

      <?php if ($credit_options !== []): ?>
        <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-scoring-heading">
          <header class="border-b border-brand-200 pb-4">
            <h2 id="credit-scoring-heading" class="text-lg font-semibold text-brand-900">Scoring Options</h2>
            <p class="mt-1 text-sm text-brand-600">Scoring mode: <?= e(strtoupper($credit_scoring_mode)); ?></p>
          </header>
          <div class="mt-4 space-y-2">
            <?php foreach ($credit_options as $option): ?>
              <?php
              $option_label = isset($option['label']) ? trim((string) $option['label']) : '-';
              $option_points = isset($option['points']) && is_numeric($option['points']) ? (int) $option['points'] : 0;
              $option_selected = isset($option['selected']) && $option['selected'] === true;
              $option_description = isset($option['description']) ? trim((string) $option['description']) : '';
              ?>
              <article class="rounded-md border <?= $option_selected ? 'border-positive-300 bg-positive-50' : 'border-brand-200 bg-white'; ?> p-3">
                <div class="flex flex-wrap items-center justify-between gap-2">
                  <p class="font-medium text-brand-900">Option <?= e($option_label); ?></p>
                  <p class="text-sm text-brand-600"><?= e((string) $option_points); ?> pts</p>
                </div>
                <?php if ($option_description !== ''): ?>
                  <p class="mt-1 text-sm text-brand-700"><?= e($option_description); ?></p>
                <?php endif; ?>
              </article>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endif; ?>
    </div>

    <div class="space-y-5 xl:col-span-4">
      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-actions-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="credit-actions-heading" class="text-lg font-semibold text-brand-900">Action Panel</h2>
        </header>
        <div class="mt-4 space-y-3">
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <p class="text-xs uppercase tracking-wide text-brand-500">Next Action</p>
            <p class="mt-1 text-sm text-brand-800"><?= e($next_action_text); ?></p>
          </div>
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <p class="text-xs uppercase tracking-wide text-brand-500">Consultant Note</p>
            <p class="mt-1 text-sm text-brand-800"><?= e($consultant_note_text); ?></p>
          </div>
          <div class="rounded-md border border-brand-200 bg-brand-50 p-3">
            <p class="text-xs uppercase tracking-wide text-brand-500">Recommended Action</p>
            <p class="mt-1 text-sm text-brand-800"><?= e($recommended_action_text); ?></p>
          </div>
          <div class="flex flex-wrap gap-2">
            <?php component('button', ['label' => 'Open Document Hub', 'href' => path('/mampan/consultant/documents/document-hub'), 'variant' => 'default', 'size' => 'sm']); ?>
            <?php component('button', ['label' => 'Open Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index?filter=linked-credits&search=' . urlencode($credit_code)), 'variant' => 'default', 'size' => 'sm']); ?>
          </div>
        </div>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-overview-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="credit-overview-heading" class="text-lg font-semibold text-brand-900">Credit Overview</h2>
        </header>
        <dl class="mt-4 space-y-3">
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Category</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($credit_category_title); ?></dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Section</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($credit_section_title); ?></dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Owner</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e($credit_owner); ?></dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Attachments</dt>
            <dd class="mt-1 font-medium text-brand-900"><?= e((string) $credit_attachments_count); ?></dd>
          </div>
          <div>
            <dt class="text-xs uppercase tracking-wide text-brand-500">Remarks</dt>
            <dd class="mt-1 text-sm text-brand-700"><?= e($credit_remarks_preview !== '' ? $credit_remarks_preview : 'No remarks yet.'); ?></dd>
          </div>
        </dl>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-submission-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="credit-submission-heading" class="text-lg font-semibold text-brand-900">Submission Checklist</h2>
        </header>
        <div class="mt-4 space-y-3">
          <div>
            <p class="text-xs uppercase tracking-wide text-brand-500">Submitted</p>
            <ul class="mt-2 space-y-1 text-sm text-brand-800">
              <?php if ($submitted_items === []): ?>
                <li>No submitted items yet.</li>
              <?php else: ?>
                <?php foreach ($submitted_items as $submitted_item): ?>
                  <li><?= e((string) $submitted_item); ?></li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
          <div>
            <p class="text-xs uppercase tracking-wide text-brand-500">Missing</p>
            <ul class="mt-2 space-y-1 text-sm text-brand-800">
              <?php if ($missing_items === []): ?>
                <li>No missing items.</li>
              <?php else: ?>
                <?php foreach ($missing_items as $missing_item): ?>
                  <li><?= e((string) $missing_item); ?></li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </section>

      <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="credit-activity-heading">
        <header class="border-b border-brand-200 pb-4">
          <h2 id="credit-activity-heading" class="text-lg font-semibold text-brand-900">Activity Timeline</h2>
        </header>
        <div class="mt-4 space-y-2">
          <?php foreach ($activity_timeline as $activity_item): ?>
            <?php
            $activity_title = isset($activity_item['title']) ? (string) $activity_item['title'] : '-';
            $activity_time = isset($activity_item['time']) ? (string) $activity_item['time'] : '-';
            $activity_note = isset($activity_item['note']) ? (string) $activity_item['note'] : '-';
            ?>
            <article class="rounded-md border border-brand-200 p-3">
              <p class="font-medium text-brand-900"><?= e($activity_title); ?></p>
              <p class="mt-1 text-xs text-brand-500"><?= e($activity_time); ?></p>
              <p class="mt-1 text-sm text-brand-700"><?= e($activity_note); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </section>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
