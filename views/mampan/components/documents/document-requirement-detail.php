<?php

declare(strict_types=1);

$requirement_detail = isset($requirement_detail) && is_array($requirement_detail) ? $requirement_detail : [];

$title                   = isset($requirement_detail['title']) ? trim((string) $requirement_detail['title']) : '-';
$linked_gbi_credit       = isset($requirement_detail['linked_gbi_credit']) ? trim((string) $requirement_detail['linked_gbi_credit']) : '-';
$criteria_group          = isset($requirement_detail['criteria_group']) ? trim((string) $requirement_detail['criteria_group']) : '-';
$status                  = isset($requirement_detail['status']) ? trim((string) $requirement_detail['status']) : 'Not Started';
$readiness_percent       = isset($requirement_detail['readiness_percent']) ? (int) $requirement_detail['readiness_percent'] : 0;
$why_needed              = isset($requirement_detail['why_needed']) ? trim((string) $requirement_detail['why_needed']) : '-';
$submitted_items         = isset($requirement_detail['submitted_items']) && is_array($requirement_detail['submitted_items'])
  ? $requirement_detail['submitted_items']
  : [];
$missing_items           = isset($requirement_detail['missing_items']) && is_array($requirement_detail['missing_items'])
  ? $requirement_detail['missing_items']
  : [];
$consultant_note         = isset($requirement_detail['consultant_note']) ? trim((string) $requirement_detail['consultant_note']) : '-';
$next_recommended_action = isset($requirement_detail['next_recommended_action']) ? trim((string) $requirement_detail['next_recommended_action']) : '-';
$close_href              = isset($requirement_detail['close_href']) ? trim((string) $requirement_detail['close_href']) : '';
$readiness_rubric        = isset($requirement_detail['readiness_rubric']) && is_array($requirement_detail['readiness_rubric'])
  ? $requirement_detail['readiness_rubric']
  : [];
$manage_form             = isset($requirement_detail['manage_form']) && is_array($requirement_detail['manage_form'])
  ? $requirement_detail['manage_form']
  : [];
$action_items            = isset($requirement_detail['action_items']) && is_array($requirement_detail['action_items'])
  ? $requirement_detail['action_items']
  : [];

$status_tone_map = [
  'Satisfied'              => 'positive',
  'Ready for Gap Analysis' => 'positive',
  'Submitted'              => 'neutral',
  'Under Review'           => 'warning',
  'Partial'                => 'warning',
  'Missing'                => 'negative',
  'Not Started'            => 'neutral',
];

$status_tone = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
$rubric_mode      = isset($readiness_rubric['mode']) ? trim((string) $readiness_rubric['mode']) : 'simple';
$rubric_base_score = isset($readiness_rubric['base_score']) ? (int) $readiness_rubric['base_score'] : $readiness_percent;
$rubric_cap_score = isset($readiness_rubric['cap_score']) ? (int) $readiness_rubric['cap_score'] : 100;
$applied_caps     = isset($readiness_rubric['applied_caps']) && is_array($readiness_rubric['applied_caps']) ? $readiness_rubric['applied_caps'] : [];
$mandatory_docs_complete = isset($readiness_rubric['mandatory_docs_complete']) ? $readiness_rubric['mandatory_docs_complete'] === true : false;
$has_critical_blocker    = isset($readiness_rubric['has_critical_blocker']) ? $readiness_rubric['has_critical_blocker'] === true : false;
$has_blocking_item       = isset($readiness_rubric['has_blocking_item']) ? $readiness_rubric['has_blocking_item'] === true : false;
$review_state            = isset($readiness_rubric['review_state']) ? trim((string) $readiness_rubric['review_state']) : '-';
$manage_form_action      = isset($manage_form['action']) ? trim((string) $manage_form['action']) : '';
$manage_requirement_id   = isset($manage_form['requirement_id']) ? trim((string) $manage_form['requirement_id']) : '';
$manage_filter           = isset($manage_form['requirement_filter']) ? trim((string) $manage_form['requirement_filter']) : 'all';
$manage_search           = isset($manage_form['requirement_search']) ? trim((string) $manage_form['requirement_search']) : '';
$manage_open_drawer_id   = isset($manage_form['open_drawer_id']) ? trim((string) $manage_form['open_drawer_id']) : '';
$manage_phase            = isset($manage_form['phase']) ? trim((string) $manage_form['phase']) : '';
$phase_label             = isset($requirement_detail['phase_label']) ? trim((string) $requirement_detail['phase_label']) : '';
$gate_check_columns = [
  ['label' => 'Gate Check', 'key' => 'gate_check'],
  ['label' => 'State', 'key' => 'state'],
  ['label' => 'Impact', 'key' => 'impact'],
];
$gate_check_rows = [
  [
    'gate_check' => 'Mandatory documents complete',
    'state'      => $mandatory_docs_complete ? 'Yes' : 'No',
    'impact'     => $mandatory_docs_complete ? 'No cap from mandatory-doc gate' : 'Readiness capped at 59%',
  ],
  [
    'gate_check' => 'Critical blocker active',
    'state'      => $has_critical_blocker ? 'Yes' : 'No',
    'impact'     => $has_critical_blocker ? 'Readiness capped at 49%' : 'No cap from blocker gate',
  ],
  [
    'gate_check' => 'Review state',
    'state'      => $review_state,
    'impact'     => $review_state === 'under_review' ? 'Readiness capped at 79%' : 'No review-state cap',
  ],
  [
    'gate_check' => 'Blocking item open',
    'state'      => $has_blocking_item ? 'Yes' : 'No',
    'impact'     => $has_blocking_item ? 'Reduce readiness momentum until closeout' : 'No blocking-item penalty',
  ],
];
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="requirement-detail-heading">
  <header class="border-b border-brand-200 pb-4">
    <div class="flex flex-wrap items-start justify-between gap-2">
      <div>
        <h2 id="requirement-detail-heading" class="text-lg font-semibold text-brand-900">Requirement Detail</h2>
        <p class="mt-1 text-sm text-brand-600">Selected requirement context for consultant decision-making in <?= e($phase_label !== '' ? $phase_label : 'current phase'); ?>.</p>
      </div>
      <?php if ($close_href !== ''): ?>
        <?php component('button', [
          'label'   => 'Close',
          'href'    => $close_href,
          'size'    => 'sm',
          'variant' => 'default',
          'class'   => 'shadow-none',
        ]); ?>
      <?php endif; ?>
    </div>
  </header>

  <div class="mt-4 space-y-4">
    <div>
      <p class="text-sm font-semibold text-brand-900"><?= e($title); ?></p>
      <div class="mt-2 flex flex-wrap gap-2">
        <?php component('badge', ['items' => [['label' => $linked_gbi_credit, 'tone' => 'neutral']]]); ?>
        <?php component('badge', ['items' => [['label' => $criteria_group, 'tone' => 'neutral']]]); ?>
        <?php component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]); ?>
        <?php component('badge', ['items' => [['label' => $readiness_percent . '% readiness', 'tone' => 'info']]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Why This Is Needed</h3>
      <p class="mt-1 text-sm text-brand-700"><?= e($why_needed); ?></p>
    </div>

    <div>
      <h3 class="text-xs font-semibold uppercase tracking-wide text-brand-500">What Is Already Submitted</h3>
      <?php if ($submitted_items === []): ?>
        <p class="mt-1 text-sm text-brand-700">No supporting submission linked yet.</p>
      <?php else: ?>
        <ul class="mt-1 space-y-1 text-sm text-brand-700">
          <?php foreach ($submitted_items as $submitted_item): ?>
            <li class="flex items-start gap-2">
              <span class="mt-[6px] inline-block h-1.5 w-1.5 rounded-full bg-brand-400"></span>
              <span><?= e((string) $submitted_item); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div>
      <h3 class="text-xs font-semibold uppercase tracking-wide text-brand-500">What Is Missing</h3>
      <?php if ($missing_items === []): ?>
        <p class="mt-1 text-sm text-brand-700">No open missing items for this requirement.</p>
      <?php else: ?>
        <ul class="mt-1 space-y-1 text-sm text-brand-700">
          <?php foreach ($missing_items as $missing_item): ?>
            <li class="flex items-start gap-2">
              <span class="mt-[6px] inline-block h-1.5 w-1.5 rounded-full bg-negative-500"></span>
              <span><?= e((string) $missing_item); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div>
      <h3 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Consultant Note</h3>
      <p class="mt-1 text-sm text-brand-700"><?= e($consultant_note); ?></p>
    </div>

    <div>
      <h3 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Next Recommended Action</h3>
      <p class="mt-1 text-sm text-brand-700"><?= e($next_recommended_action); ?></p>
    </div>

    <div class="rounded-lg border border-brand-200 bg-brand-50 p-3">
      <h3 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Readiness Logic (Simple Mode)</h3>
      <p class="mt-1 text-sm text-brand-600">Readiness ditentukan oleh checklist gate, bukan weighted calculator.</p>
      <div class="mt-2 overflow-x-auto">
        <?php component('table', [
          'columns'       => $gate_check_columns,
          'rows'          => $gate_check_rows,
          'appearance'    => 'basic',
          'caption'       => 'Readiness gate checks table',
          'class_name'    => 'min-w-[520px]',
          'empty_title'   => 'No readiness data',
          'empty_message' => '',
        ]); ?>
      </div>
      <div class="mt-3 grid gap-2 sm:grid-cols-2">
        <p class="text-sm text-brand-600">Mode: <span class="font-medium text-brand-900"><?= e($rubric_mode); ?></span></p>
        <p class="text-sm text-brand-600">Base score: <span class="font-medium text-brand-900"><?= e((string) $rubric_base_score); ?>%</span></p>
        <p class="text-sm text-brand-600">Applied cap: <span class="font-medium text-brand-900"><?= e((string) $rubric_cap_score); ?>%</span></p>
        <p class="text-sm text-brand-600">Final readiness: <span class="font-medium text-brand-900"><?= e((string) $readiness_percent); ?>%</span></p>
      </div>
      <div class="mt-3 flex flex-wrap gap-2">
        <?php component('badge', ['items' => [['label' => $mandatory_docs_complete ? 'Mandatory Docs Complete' : 'Mandatory Docs Incomplete', 'tone' => $mandatory_docs_complete ? 'positive' : 'warning']]]); ?>
        <?php component('badge', ['items' => [['label' => $has_critical_blocker ? 'Critical Blocker Active' : 'No Critical Blocker', 'tone' => $has_critical_blocker ? 'negative' : 'positive']]]); ?>
        <?php component('badge', ['items' => [['label' => $has_blocking_item ? 'Blocking Item Open' : 'No Blocking Item', 'tone' => $has_blocking_item ? 'warning' : 'positive']]]); ?>
      </div>
      <?php if ($applied_caps !== []): ?>
        <ul class="mt-3 space-y-1 text-sm text-brand-600">
          <?php foreach ($applied_caps as $cap_item): ?>
            <?php
            $cap_rule = isset($cap_item['rule']) ? trim((string) $cap_item['rule']) : '-';
            $cap_effect = isset($cap_item['effect']) ? trim((string) $cap_item['effect']) : '-';
            ?>
            <li><?= e($cap_rule . ': ' . $cap_effect); ?></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div class="rounded-lg border border-brand-200 bg-white p-3">
      <h3 class="text-xs font-semibold uppercase tracking-wide text-brand-500">Manage Status (Simple)</h3>
      <p class="mt-1 text-sm text-brand-600">Ubah gate fields di bawah, kemudian klik save untuk recompute readiness dan status.</p>
      <?php if ($manage_form_action !== '' && $manage_requirement_id !== ''): ?>
        <form
          method="get"
          action="<?= e($manage_form_action); ?>"
          class="mt-3 space-y-3"
          data-manage-status-form
          data-requirement-id="<?= e($manage_requirement_id); ?>"
        >
          <input type="hidden" name="gate_requirement_id" value="<?= e($manage_requirement_id); ?>">
          <input type="hidden" name="requirement_id" value="<?= e($manage_requirement_id); ?>">
          <input type="hidden" name="requirement_filter" value="<?= e($manage_filter); ?>">
          <input type="hidden" name="requirement_search" value="<?= e($manage_search); ?>">
          <input type="hidden" name="open_drawer_id" value="<?= e($manage_open_drawer_id); ?>">
          <?php if ($manage_phase !== ''): ?>
            <input type="hidden" name="phase" value="<?= e($manage_phase); ?>">
          <?php endif; ?>

          <label class="flex items-center gap-2 text-sm text-brand-700">
            <input type="checkbox" name="gate_mandatory_docs" value="1" <?= $mandatory_docs_complete ? 'checked' : ''; ?>>
            <span>Mandatory docs complete</span>
          </label>

          <label class="flex items-center gap-2 text-sm text-brand-700">
            <input type="checkbox" name="gate_critical_blocker" value="1" <?= $has_critical_blocker ? 'checked' : ''; ?>>
            <span>Critical blocker active</span>
          </label>

          <label class="flex items-center gap-2 text-sm text-brand-700">
            <input type="checkbox" name="gate_blocking_item" value="1" <?= $has_blocking_item ? 'checked' : ''; ?>>
            <span>Blocking item open</span>
          </label>

          <div>
            <?php component('fields', [
              'label'   => 'Review State',
              'control' => [
                'component' => 'select',
                'props'     => [
                  'name'           => 'gate_review_state',
                  'selected_value' => $review_state,
                  'options'        => [
                    ['label' => 'Not Started', 'value' => 'not_started'],
                    ['label' => 'Submitted', 'value' => 'submitted'],
                    ['label' => 'Under Review', 'value' => 'under_review'],
                    ['label' => 'Accepted', 'value' => 'accepted'],
                  ],
                ],
              ],
            ]); ?>
          </div>

          <?php component('button', [
            'label'   => 'Save Gate State',
            'type'    => 'submit',
            'variant' => 'primary',
            'size'    => 'sm',
            'class'   => 'shadow-none',
          ]); ?>
        </form>
      <?php endif; ?>

      <ul class="mt-3 space-y-1 text-sm text-brand-600">
        <li>1. Lengkapkan dokumen wajib requirement.</li>
        <li>2. Tutup critical blocker jika ada.</li>
        <li>3. Gerakkan review state dari submitted ke accepted.</li>
        <li>4. Tutup blocking item terbuka.</li>
      </ul>
    </div>

    <div class="flex flex-wrap gap-2 pt-1">
      <?php foreach ($action_items as $action_item): ?>
        <?php
        $action_label = isset($action_item['label']) ? trim((string) $action_item['label']) : '';
        $action_href  = isset($action_item['href']) ? trim((string) $action_item['href']) : '#';
        $action_tone  = isset($action_item['tone']) ? trim((string) $action_item['tone']) : 'secondary';

        if ($action_label === '') {
          continue;
        }
        ?>
        <?php component('button', [
          'label'   => $action_label,
          'href'    => $action_href,
          'size'    => 'sm',
          'variant' => $action_tone,
          'class'   => 'shadow-none',
        ]); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
