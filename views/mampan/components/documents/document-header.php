<?php

declare(strict_types=1);

$current_phase         = isset($current_phase) ? trim((string) $current_phase) : '-';
$current_stage         = isset($current_stage) ? trim((string) $current_stage) : '-';
$requirement_readiness = isset($requirement_readiness) ? trim((string) $requirement_readiness) : '-';
$last_updated          = isset($last_updated) ? trim((string) $last_updated) : '-';
$action_items          = isset($action_items) && is_array($action_items) ? $action_items : [];
?>
<section aria-labelledby="document-hub-heading" class="rounded-lg border border-brand-200 bg-white p-5 md:p-6">
  <header class="flex flex-col gap-4 border-b border-brand-200 pb-4 md:flex-row md:items-start md:justify-between">
    <div class="space-y-2">
      <h1 id="document-hub-heading" class="text-2xl font-semibold text-brand-900">Document Hub v2</h1>
      <p class="text-sm text-brand-600">Requirement-based document control for GBI NRNC Phase 1 planning.</p>
    </div>
    <div class="flex flex-wrap gap-2">
      <?php foreach ($action_items as $action_item): ?>
        <?php
        $action_label = isset($action_item['label']) ? trim((string) $action_item['label']) : '';
        $action_tone  = isset($action_item['tone']) ? trim((string) $action_item['tone']) : 'secondary';
        $action_href  = isset($action_item['href']) ? trim((string) $action_item['href']) : '#';

        if ($action_label === '') {
          continue;
        }
        ?>
        <?php component('button', [
          'label'   => $action_label,
          'variant' => $action_tone === 'primary' ? 'primary' : 'secondary',
          'href'    => $action_href,
          'size'    => 'sm',
          'class'   => 'shadow-none',
        ]); ?>
      <?php endforeach; ?>
    </div>
  </header>

  <dl class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Current Phase</dt>
      <dd class="mt-1 text-sm font-medium text-brand-900"><?= e($current_phase); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Current Stage</dt>
      <dd class="mt-1 text-sm font-medium text-brand-900"><?= e($current_stage); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Requirement Readiness</dt>
      <dd class="mt-1 text-sm font-medium text-brand-900"><?= e($requirement_readiness); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Last Updated</dt>
      <dd class="mt-1 text-sm font-medium text-brand-900"><?= e($last_updated); ?></dd>
    </div>
  </dl>
</section>
