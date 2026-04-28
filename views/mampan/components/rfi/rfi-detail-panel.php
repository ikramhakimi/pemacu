<?php

declare(strict_types=1);

$rfi_no            = isset($rfi_no) ? trim((string) $rfi_no) : '-';
$subject           = isset($subject) ? trim((string) $subject) : '-';
$question_request  = isset($question_request) ? trim((string) $question_request) : '-';
$reason_request    = isset($reason_request) ? trim((string) $reason_request) : '-';
$requested_by      = isset($requested_by) ? trim((string) $requested_by) : '-';
$assigned_to       = isset($assigned_to) ? trim((string) $assigned_to) : '-';
$created_date      = isset($created_date) ? trim((string) $created_date) : '-';
$due_date          = isset($due_date) ? trim((string) $due_date) : '-';
$priority          = isset($priority) ? trim((string) $priority) : 'Low';
$status            = isset($status) ? trim((string) $status) : 'Open';

$priority_tone_map = ['High' => 'negative', 'Medium' => 'warning', 'Low' => 'neutral'];
$status_tone_map   = [
  'Open'                => 'neutral',
  'Awaiting Client'     => 'warning',
  'Awaiting Consultant' => 'neutral',
  'Under Review'        => 'warning',
  'Resolved'            => 'positive',
  'Closed'              => 'positive',
  'Overdue'             => 'negative',
];

$priority_tone = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';
$status_tone   = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="clarification-detail-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="clarification-detail-heading" class="text-lg font-semibold text-brand-900">Clarification Detail</h2>
  </header>

  <dl class="mt-4 grid gap-4 sm:grid-cols-2">
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">RFI No</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($rfi_no); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Subject</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($subject); ?></dd>
    </div>
    <div class="sm:col-span-2">
      <dt class="text-xs uppercase tracking-wide text-brand-500">Question / Request</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($question_request); ?></dd>
    </div>
    <div class="sm:col-span-2">
      <dt class="text-xs uppercase tracking-wide text-brand-500">Reason for Request</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($reason_request); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Requested By</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($requested_by); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Assigned To</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($assigned_to); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Created Date</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($created_date); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Due Date</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($due_date); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Priority</dt>
      <dd class="mt-1"><?php component('badge', ['items' => [['label' => $priority, 'tone' => $priority_tone]]]); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Status</dt>
      <dd class="mt-1"><?php component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]); ?></dd>
    </div>
  </dl>
</section>
