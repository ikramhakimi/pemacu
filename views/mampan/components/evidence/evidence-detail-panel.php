<?php

declare(strict_types=1);

$evidence_id         = isset($evidence_id) ? trim((string) $evidence_id) : '-';
$gbi_credit_code     = isset($gbi_credit_code) ? trim((string) $gbi_credit_code) : '-';
$credit_title        = isset($credit_title) ? trim((string) $credit_title) : '-';
$criteria_group      = isset($criteria_group) ? trim((string) $criteria_group) : '-';
$required_evidence   = isset($required_evidence) ? trim((string) $required_evidence) : '-';
$submitted_summary   = isset($submitted_summary) ? trim((string) $submitted_summary) : '-';
$current_status      = isset($current_status) ? trim((string) $current_status) : 'Submitted';
$reviewer            = isset($reviewer) ? trim((string) $reviewer) : '-';
$client_owner        = isset($client_owner) ? trim((string) $client_owner) : '-';
$created_date        = isset($created_date) ? trim((string) $created_date) : '-';
$due_date            = isset($due_date) ? trim((string) $due_date) : '-';

$status_tone_map = [
  'Not Submitted'           => 'neutral',
  'Submitted'               => 'neutral',
  'Under Review'            => 'warning',
  'Need Revision'           => 'warning',
  'Verified'                => 'positive',
  'Rejected'                => 'negative',
  'Waived / Not Applicable' => 'neutral',
];

$status_tone = isset($status_tone_map[$current_status]) ? $status_tone_map[$current_status] : 'neutral';
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="evidence-detail-panel-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="evidence-detail-panel-heading" class="text-lg font-semibold text-brand-900">Evidence Detail</h2>
  </header>

  <dl class="mt-4 grid gap-4 sm:grid-cols-2">
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Evidence ID</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($evidence_id); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">GBI Credit Code</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($gbi_credit_code); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Credit Title</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($credit_title); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Criteria Group</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($criteria_group); ?></dd>
    </div>
    <div class="sm:col-span-2">
      <dt class="text-xs uppercase tracking-wide text-brand-500">Required Evidence</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($required_evidence); ?></dd>
    </div>
    <div class="sm:col-span-2">
      <dt class="text-xs uppercase tracking-wide text-brand-500">Submitted Evidence Summary</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($submitted_summary); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Current Status</dt>
      <dd class="mt-1"><?php component('badge', ['items' => [['label' => $current_status, 'tone' => $status_tone]]]); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Reviewer</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($reviewer); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Client Owner</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($client_owner); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Created Date</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($created_date); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Due Date</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($due_date); ?></dd>
    </div>
  </dl>
</section>
