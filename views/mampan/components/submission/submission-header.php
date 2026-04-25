<?php

declare(strict_types=1);

$project_name      = isset($project_name) ? trim((string) $project_name) : 'Project';
$project_code      = isset($project_code) ? trim((string) $project_code) : '-';
$client_company    = isset($client_company) ? trim((string) $client_company) : '-';
$gbi_tool_type     = isset($gbi_tool_type) ? trim((string) $gbi_tool_type) : '-';
$target_rating     = isset($target_rating) ? trim((string) $target_rating) : '-';
$submission_stage  = isset($submission_stage) ? trim((string) $submission_stage) : '-';
$package_version   = isset($package_version) ? trim((string) $package_version) : '-';
$prepared_by       = isset($prepared_by) ? trim((string) $prepared_by) : '-';
$last_updated      = isset($last_updated) ? trim((string) $last_updated) : '-';
$action_items      = isset($action_items) && is_array($action_items) ? $action_items : [];
?>
<header class="rounded-lg border border-zinc-200 bg-white p-5 md:p-6" aria-labelledby="submission-header-title">
  <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">Final Submission Package</p>
      <h1 id="submission-header-title" class="mt-2 text-2xl font-semibold leading-tight text-zinc-900 md:text-3xl">
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
      <dt class="text-xs uppercase tracking-wide text-zinc-500">GBI Tool Type</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($gbi_tool_type); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Target Rating</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($target_rating); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Submission Stage</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($submission_stage); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Package Version</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($package_version); ?></dd>
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
