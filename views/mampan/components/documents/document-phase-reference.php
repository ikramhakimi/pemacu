<?php

declare(strict_types=1);

$phase_reference_cards = isset($phase_reference_cards) && is_array($phase_reference_cards) ? $phase_reference_cards : [];

$status_reference_columns = [
  ['label' => 'Status', 'key' => 'status'],
  ['label' => 'What It Means', 'key' => 'meaning'],
];

$status_reference_rows = [
  ['status' => 'Not Started', 'meaning' => 'No usable submission yet.'],
  ['status' => 'Missing', 'meaning' => 'Requirement exists, but key evidence/docs are still missing.'],
  ['status' => 'Partial', 'meaning' => 'Some docs are in, but not enough to move confidently.'],
  ['status' => 'Submitted', 'meaning' => 'Minimum docs are submitted, waiting for review.'],
  ['status' => 'Under Review', 'meaning' => 'Consultant is actively checking and validating.'],
  ['status' => 'Ready for Gap Analysis', 'meaning' => 'Enough material to run Phase 1 gap analysis.'],
  ['status' => 'Satisfied', 'meaning' => 'Requirement is considered adequate for the current phase.'],
];

$readiness_reference_columns = [
  ['label' => 'Gate Check', 'key' => 'gate_check'],
  ['label' => 'Condition', 'key' => 'condition'],
  ['label' => 'What It Checks', 'key' => 'check'],
];

$readiness_reference_rows = [
  ['gate_check' => 'Mandatory documents', 'condition' => 'Complete / Incomplete', 'check' => 'Whether the must-have docs for this requirement are complete.'],
  ['gate_check' => 'Critical blocker', 'condition' => 'Active / None', 'check' => 'Whether a critical blocker is stopping progression.'],
  ['gate_check' => 'Review state', 'condition' => 'Not Started / Submitted / Under Review / Accepted', 'check' => 'Current review stage by consultant/reviewer.'],
  ['gate_check' => 'Blocking items', 'condition' => 'Open / Closed', 'check' => 'Whether open actions are still holding readiness back.'],
];

$readiness_gate_columns = [
  ['label' => 'Gate Rule', 'key' => 'rule'],
  ['label' => 'Cap / Effect', 'key' => 'effect'],
];

$readiness_gate_rows = [
  ['rule' => 'Critical blocker is active', 'effect' => 'Readiness capped at 49%'],
  ['rule' => 'Mandatory docs are incomplete', 'effect' => 'Readiness capped at 59%'],
  ['rule' => 'Still Under Review', 'effect' => 'Readiness capped at 79%'],
  ['rule' => 'Mandatory complete + no critical blocker + review acceptable', 'effect' => 'Can reach 80% and above'],
];

$document_terms_columns = [
  ['label' => 'Term', 'key' => 'term'],
  ['label' => 'What It Means', 'key' => 'meaning'],
  ['label' => 'Quick Example', 'key' => 'example'],
];

$document_terms_rows = [
  [
    'term'    => 'Supporting Files',
    'meaning' => 'Documents already linked to support one requirement. This is your current evidence set.',
    'example' => 'EE2 has metering layout, BMS point schedule, and trend sample.',
  ],
  [
    'term'    => 'Missing Items',
    'meaning' => 'Required evidence still not available or not complete yet. This is the open gap list.',
    'example' => 'EE2 still needs 3-month trend data and meter calibration certificate.',
  ],
];
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="document-phase-reference-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="document-phase-reference-heading" class="text-lg font-semibold text-brand-900">Documentation Guide</h2>
    <p class="mt-1 text-sm text-brand-600">A quick and easy guide to understand requirement flow from Phase 1 to Phase 3.</p>
    <p class="mt-2 text-sm text-brand-600">
      Note: <span class="font-medium text-brand-800">Owner</span> is the accountable PIC for closing a requirement.
      Most of the time this is consultant-side, while client-side parties usually provide requested docs/data.
    </p>
    <p class="mt-2 text-sm text-brand-600">
      Note: <span class="font-medium text-brand-800">Status</span> shows current requirement progress
      (for example: Not Started, Missing, Partial, Submitted, Under Review, Ready for Gap Analysis, Satisfied).
    </p>
  </header>

  <div class="mt-4 grid gap-4 lg:grid-cols-3">
    <?php foreach ($phase_reference_cards as $phase_card): ?>
      <?php
      $phase       = isset($phase_card['phase']) ? trim((string) $phase_card['phase']) : '-';
      $focus       = isset($phase_card['focus']) ? trim((string) $phase_card['focus']) : '-';
      $entry_rule  = isset($phase_card['entry_rule']) ? trim((string) $phase_card['entry_rule']) : '-';
      $exit_rule   = isset($phase_card['exit_rule']) ? trim((string) $phase_card['exit_rule']) : '-';
      $deliverable = isset($phase_card['deliverable']) ? trim((string) $phase_card['deliverable']) : '-';
      ?>
      <article class="rounded-lg border border-brand-200 bg-brand-50 p-4">
        <div class="flex flex-wrap items-center gap-2">
          <?php component('badge', ['items' => [['label' => $phase, 'tone' => 'neutral']]]); ?>
        </div>

        <dl class="mt-3 space-y-3">
          <div>
            <dt class="text-xs font-semibold uppercase tracking-wide text-brand-500">Focus</dt>
            <dd class="mt-1 text-sm text-brand-700"><?= e($focus); ?></dd>
          </div>
          <div>
            <dt class="text-xs font-semibold uppercase tracking-wide text-brand-500">Entry Rule</dt>
            <dd class="mt-1 text-sm text-brand-700"><?= e($entry_rule); ?></dd>
          </div>
          <div>
            <dt class="text-xs font-semibold uppercase tracking-wide text-brand-500">Exit Rule</dt>
            <dd class="mt-1 text-sm text-brand-700"><?= e($exit_rule); ?></dd>
          </div>
          <div>
            <dt class="text-xs font-semibold uppercase tracking-wide text-brand-500">Deliverable</dt>
            <dd class="mt-1 text-sm text-brand-700"><?= e($deliverable); ?></dd>
          </div>
        </dl>
      </article>
    <?php endforeach; ?>
  </div>

  <div class="mt-5 rounded-lg border border-brand-200 bg-white p-4">
    <h3 class="text-sm font-semibold text-brand-900">Status Reference</h3>
    <p class="mt-1 text-sm text-brand-600">Quick meanings for each requirement status in Document Hub.</p>
    <div class="mt-3 overflow-x-auto">
      <?php component('table', [
        'columns'       => $status_reference_columns,
        'rows'          => $status_reference_rows,
        'appearance'    => 'basic',
        'caption'       => 'Status reference table',
        'class_name'    => 'min-w-[720px]',
        'empty_title'   => 'No status reference available',
        'empty_message' => '',
      ]); ?>
    </div>
  </div>

  <div class="mt-5 rounded-lg border border-brand-200 bg-white p-4">
    <h3 class="text-sm font-semibold text-brand-900">Readiness Reference</h3>
    <p class="mt-1 text-sm text-brand-600">Simple mode: readiness is based on gate checks, no weighted calculator needed.</p>
    <div class="mt-3 overflow-x-auto">
      <?php component('table', [
        'columns'       => $readiness_reference_columns,
        'rows'          => $readiness_reference_rows,
        'appearance'    => 'basic',
        'caption'       => 'Readiness scoring reference table',
        'class_name'    => 'min-w-[860px]',
        'empty_title'   => 'No readiness reference available',
        'empty_message' => '',
      ]); ?>
    </div>
    <p class="mt-3 text-sm text-brand-600">If a gate fails, readiness gets capped by the rules below.</p>
    <div class="mt-3 overflow-x-auto">
      <?php component('table', [
        'columns'       => $readiness_gate_columns,
        'rows'          => $readiness_gate_rows,
        'appearance'    => 'basic',
        'caption'       => 'Readiness gate rules table',
        'class_name'    => 'min-w-[760px]',
        'empty_title'   => 'No gate rules available',
        'empty_message' => '',
      ]); ?>
    </div>
  </div>

  <div class="mt-5 rounded-lg border border-brand-200 bg-white p-4">
    <h3 class="text-sm font-semibold text-brand-900">Document Terms</h3>
    <p class="mt-1 text-sm text-brand-600">Quick distinction so teams do not mix up evidence-in-hand vs evidence still needed.</p>
    <div class="mt-3 overflow-x-auto">
      <?php component('table', [
        'columns'       => $document_terms_columns,
        'rows'          => $document_terms_rows,
        'appearance'    => 'basic',
        'caption'       => 'Supporting files and missing items glossary',
        'class_name'    => 'min-w-[860px]',
        'empty_title'   => 'No glossary items available',
        'empty_message' => '',
      ]); ?>
    </div>
  </div>
</section>
