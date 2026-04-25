<?php

declare(strict_types=1);

$project_name          = isset($project_name) ? trim((string) $project_name) : 'Project';
$submission_readiness  = isset($submission_readiness) ? trim((string) $submission_readiness) : 'In Progress';
$key_notes             = isset($key_notes) ? trim((string) $key_notes) : '';
$important_notice      = isset($important_notice) ? trim((string) $important_notice) : '';
$important_risks       = isset($important_risks) ? trim((string) $important_risks) : '';
$checklist_items       = isset($checklist_items) && is_array($checklist_items) ? $checklist_items : [];
$approve_label         = isset($approve_label) ? trim((string) $approve_label) : 'Approve Submission';
$approve_href          = isset($approve_href) ? trim((string) $approve_href) : '#';
$request_changes_label = isset($request_changes_label) ? trim((string) $request_changes_label) : 'Request Changes';
$request_changes_href  = isset($request_changes_href) ? trim((string) $request_changes_href) : '#';
?>
<section class="space-y-5" aria-labelledby="client-signoff-panel-heading">
  <article class="rounded-lg border border-zinc-200 bg-white p-5">
    <h2 id="client-signoff-panel-heading" class="text-lg font-semibold text-zinc-900">Submission Summary</h2>
    <dl class="mt-4 grid gap-3 text-sm sm:grid-cols-2">
      <div>
        <dt class="text-zinc-500">Project</dt>
        <dd class="mt-1 font-medium text-zinc-900"><?= e($project_name); ?></dd>
      </div>
      <div>
        <dt class="text-zinc-500">Submission Readiness</dt>
        <dd class="mt-1 font-medium text-zinc-900"><?= e($submission_readiness); ?></dd>
      </div>
    </dl>
    <?php if ($key_notes !== ''): ?>
      <p class="mt-3 text-sm text-zinc-600"><?= e($key_notes); ?></p>
    <?php endif; ?>
  </article>

  <article class="rounded-lg border border-amber-200 bg-amber-50 p-5" aria-labelledby="client-signoff-notice-heading">
    <h3 id="client-signoff-notice-heading" class="text-base font-semibold text-amber-900">Important Notice</h3>
    <?php if ($important_notice !== ''): ?>
      <p class="mt-2 text-sm text-amber-800"><?= e($important_notice); ?></p>
    <?php endif; ?>
    <?php if ($important_risks !== ''): ?>
      <p class="mt-2 text-sm text-amber-800"><?= e($important_risks); ?></p>
    <?php endif; ?>
  </article>

  <article class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="client-signoff-checklist-heading">
    <h3 id="client-signoff-checklist-heading" class="text-base font-semibold text-zinc-900">Checklist</h3>
    <div class="mt-3 space-y-2">
      <?php foreach ($checklist_items as $index => $checklist_item): ?>
        <?php
        $checkbox_label = trim((string) $checklist_item);

        if ($checkbox_label === '') {
          continue;
        }
        ?>
        <?php component('checkbox', [
          'id'    => 'client-signoff-checklist-' . (string) $index,
          'name'  => 'client_signoff_checklist[]',
          'value' => (string) $index,
          'label' => $checkbox_label,
          'class' => 'w-full',
        ]); ?>
      <?php endforeach; ?>
    </div>
  </article>

  <article class="rounded-lg border border-zinc-200 bg-white p-5">
    <div class="flex flex-wrap items-center gap-2">
      <?php component('button', ['label' => $approve_label, 'href' => $approve_href, 'variant' => 'primary']); ?>
      <?php component('button', ['label' => $request_changes_label, 'href' => $request_changes_href, 'variant' => 'default']); ?>
    </div>
  </article>
</section>
