<?php

declare(strict_types=1);

$project_name           = isset($project_name) ? trim((string) $project_name) : 'Project';
$project_code           = isset($project_code) ? trim((string) $project_code) : '-';
$client_company         = isset($client_company) ? trim((string) $client_company) : '-';
$current_stage          = isset($current_stage) ? trim((string) $current_stage) : '-';
$open_clarifications    = isset($open_clarifications) ? trim((string) $open_clarifications) : '0';
$overdue_clarifications = isset($overdue_clarifications) ? trim((string) $overdue_clarifications) : '0';
$last_updated           = isset($last_updated) ? trim((string) $last_updated) : '-';
$action_items           = isset($action_items) && is_array($action_items) ? $action_items : [];
?>
<header class="rounded-lg border border-zinc-200 bg-white p-5 md:p-6" aria-labelledby="clarification-header-title">
  <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">Clarifications</p>
      <h1 id="clarification-header-title" class="mt-2 text-2xl font-semibold leading-tight text-zinc-900 md:text-3xl">
        <?= e($project_name); ?>
      </h1>
      <p class="mt-1 text-sm text-zinc-600">Project Code: <?= e($project_code); ?></p>
    </div>

    <div class="flex flex-wrap items-center gap-2">
      <?php foreach ($action_items as $action_item): ?>
        <?php
        $label = isset($action_item['label']) ? trim((string) $action_item['label']) : '';
        $tone  = isset($action_item['tone']) ? trim((string) $action_item['tone']) : 'default';
        $href  = isset($action_item['href']) ? trim((string) $action_item['href']) : '';

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

  <dl class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Client Company</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($client_company); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Current Stage</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($current_stage); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Open Clarifications</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($open_clarifications); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Overdue</dt>
      <dd class="mt-1 font-medium text-rose-700"><?= e($overdue_clarifications); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Last Updated</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($last_updated); ?></dd>
    </div>
  </dl>
</header>
