<?php

declare(strict_types=1);

$project_name     = isset($project_name) ? trim((string) $project_name) : 'Project';
$client_company   = isset($client_company) ? trim((string) $client_company) : '-';
$current_stage    = isset($current_stage) ? trim((string) $current_stage) : 'In Progress';
$progress_percent = isset($progress_percent) ? (int) $progress_percent : 0;
$progress_label   = isset($progress_label) ? trim((string) $progress_label) : 'Progress';
$stage_note       = isset($stage_note) ? trim((string) $stage_note) : '';

$progress_percent = max(0, min(100, $progress_percent));
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="client-project-header-heading">
  <div class="flex flex-wrap items-start justify-between gap-3">
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">Project Overview</p>
      <h2 id="client-project-header-heading" class="mt-2 text-xl font-semibold text-zinc-900 md:text-2xl"><?= e($project_name); ?></h2>
      <p class="mt-1 text-sm text-zinc-600"><?= e($client_company); ?></p>
    </div>
    <div>
      <?php component('badge', [
        'items' => [
          ['label' => $current_stage, 'tone' => 'info'],
        ],
      ]); ?>
    </div>
  </div>

  <div class="mt-4">
    <div class="flex items-center justify-between gap-3 text-sm">
      <p class="font-medium text-zinc-700"><?= e($progress_label); ?></p>
      <p class="font-semibold text-zinc-900"><?= e((string) $progress_percent); ?>%</p>
    </div>
    <div class="mt-2 h-2.5 rounded-full bg-zinc-100" role="img" aria-label="Project progress <?= e((string) $progress_percent); ?> percent">
      <div class="h-full rounded-full bg-blue-600" style="width: <?= e((string) $progress_percent); ?>%;"></div>
    </div>
    <?php if ($stage_note !== ''): ?>
      <p class="mt-2 text-sm text-zinc-600"><?= e($stage_note); ?></p>
    <?php endif; ?>
  </div>
</section>
