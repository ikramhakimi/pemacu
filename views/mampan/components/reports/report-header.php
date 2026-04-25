<?php

declare(strict_types=1);

$project_name    = isset($project_name) ? trim((string) $project_name) : 'Project';
$project_code    = isset($project_code) ? trim((string) $project_code) : '-';
$client_company  = isset($client_company) ? trim((string) $client_company) : '-';
$report_type     = isset($report_type) ? trim((string) $report_type) : '-';
$report_version  = isset($report_version) ? trim((string) $report_version) : '-';
$current_stage   = isset($current_stage) ? trim((string) $current_stage) : '-';
$prepared_by     = isset($prepared_by) ? trim((string) $prepared_by) : '-';
$last_updated    = isset($last_updated) ? trim((string) $last_updated) : '-';
$action_items    = isset($action_items) && is_array($action_items) ? $action_items : [];
?>
<header class="rounded-lg border border-zinc-200 bg-white p-5 md:p-6" aria-labelledby="gap-report-heading">
  <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">Gap Analysis Report</p>
      <h1 id="gap-report-heading" class="mt-2 text-2xl font-semibold leading-tight text-zinc-900 md:text-3xl">
        <?= e($project_name); ?>
      </h1>
      <p class="mt-1 text-sm text-zinc-600">Project Code: <?= e($project_code); ?></p>
    </div>

    <div class="flex flex-wrap items-center gap-2">
      <?php foreach ($action_items as $action_item): ?>
        <?php
        $label = isset($action_item['label']) ? trim((string) $action_item['label']) : '';
        $tone  = isset($action_item['tone']) ? trim((string) $action_item['tone']) : 'default';
        $href  = isset($action_item['href']) ? trim((string) $action_item['href']) : '#';

        if ($label === '') {
          continue;
        }
        ?>
        <?php component('button', [
          'label'   => $label,
          'variant' => $tone === 'primary' ? 'primary' : 'default',
          'href'    => $href,
        ]); ?>
      <?php endforeach; ?>
    </div>
  </div>

  <dl class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Client Company</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($client_company); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Report Type</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($report_type); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Report Version</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($report_version); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Current Stage</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($current_stage); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Prepared By</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($prepared_by); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Last Updated</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($last_updated); ?></dd>
    </div>
  </dl>
</header>
