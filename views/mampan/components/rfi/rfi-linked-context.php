<?php

declare(strict_types=1);

$project_stage          = isset($project_stage) ? trim((string) $project_stage) : '-';
$linked_document        = isset($linked_document) ? trim((string) $linked_document) : '-';
$linked_gbi_credit      = isset($linked_gbi_credit) ? trim((string) $linked_gbi_credit) : '-';
$related_evidence_item  = isset($related_evidence_item) ? trim((string) $related_evidence_item) : '-';
$document_hub_status    = isset($document_hub_status) ? trim((string) $document_hub_status) : '-';
$people_involved        = isset($people_involved) && is_array($people_involved) ? $people_involved : [];
$due_date               = isset($due_date) ? trim((string) $due_date) : '-';
$sla_note               = isset($sla_note) ? trim((string) $sla_note) : '-';

$status_tone_map = [
  'Need Revision'       => 'warning',
  'Missing'             => 'negative',
  'Submitted'           => 'neutral',
  'Verified'            => 'positive',
  'Under Review'        => 'warning',
  'Awaiting Client'     => 'warning',
  'Awaiting Consultant' => 'neutral',
];

$status_tone = isset($status_tone_map[$document_hub_status]) ? $status_tone_map[$document_hub_status] : 'neutral';
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="clarification-context-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="clarification-context-heading" class="text-lg font-semibold text-brand-900">Linked Context</h2>
  </header>

  <dl class="mt-4 space-y-3">
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Project Stage</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($project_stage); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Linked Document</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($linked_document); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Linked GBI Credit</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($linked_gbi_credit); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Related Evidence Item</dt>
      <dd class="mt-1 text-sm text-brand-800"><?= e($related_evidence_item); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Related Document Hub Status</dt>
      <dd class="mt-1"><?php component('badge', ['items' => [['label' => $document_hub_status, 'tone' => $status_tone]]]); ?></dd>
    </div>
  </dl>

  <article class="mt-5 border-t border-brand-200 pt-4" aria-labelledby="clarification-people-heading">
    <h3 id="clarification-people-heading" class="font-semibold text-brand-900">People Involved</h3>
    <ul class="mt-2 space-y-2">
      <?php foreach ($people_involved as $person): ?>
        <?php
        $name = isset($person['name']) ? trim((string) $person['name']) : '-';
        $role = isset($person['role']) ? trim((string) $person['role']) : '-';
        ?>
        <li class="rounded-md border border-brand-200 bg-brand-50 p-3">
          <p class="font-medium text-brand-900"><?= e($name); ?></p>
          <p class="text-xs text-brand-600"><?= e($role); ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  </article>

  <article class="mt-5 border-t border-brand-200 pt-4" aria-labelledby="clarification-sla-heading">
    <h3 id="clarification-sla-heading" class="font-semibold text-brand-900">Due Date / SLA</h3>
    <div class="mt-2 rounded-md border border-brand-200 bg-brand-50 p-3">
      <p class="text-xs uppercase tracking-wide text-brand-500">Due Date</p>
      <p class="mt-1 font-medium text-brand-900"><?= e($due_date); ?></p>
      <p class="mt-2 text-sm text-brand-700"><?= e($sla_note); ?></p>
    </div>
  </article>
</section>
