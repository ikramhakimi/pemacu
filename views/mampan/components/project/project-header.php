<?php

declare(strict_types=1);

$project_name      = isset($project_name) ? trim((string) $project_name) : 'Project';
$project_code      = isset($project_code) ? trim((string) $project_code) : '-';
$client_company    = isset($client_company) ? trim((string) $client_company) : '-';
$project_location  = isset($project_location) ? trim((string) $project_location) : '-';
$gbi_tool_type     = isset($gbi_tool_type) ? trim((string) $gbi_tool_type) : '-';
$target_rating     = isset($target_rating) ? trim((string) $target_rating) : '-';
$project_status    = isset($project_status) ? trim((string) $project_status) : '-';
$consultant_lead   = isset($consultant_lead) ? trim((string) $consultant_lead) : '-';
$client_pic        = isset($client_pic) ? trim((string) $client_pic) : '-';
$action_items      = isset($action_items) && is_array($action_items) ? $action_items : [];
?>
<header class="<?php card('bg-white p-5') ?>" aria-labelledby="project-workspace-heading">
  <div class="flex flex-col gap-4 lg:flex-row lg:items-start lg:justify-between">
    <div class="flex flex-wrap items-center gap-2">
      <?php foreach ($action_items as $action_item): ?>
        <?php
        $action_label = isset($action_item['label']) ? trim((string) $action_item['label']) : '';
        $action_tone  = isset($action_item['tone']) ? trim((string) $action_item['tone']) : 'neutral';
        $action_href  = isset($action_item['href']) ? trim((string) $action_item['href']) : '';

        if ($action_label === '') {
          continue;
        }

        $action_button_class = 'inline-flex items-center rounded-md border px-3 py-2 text-sm font-medium transition';

        if ($action_tone === 'primary') {
          $action_button_class .= ' border-transparent bg-primary-600 text-white hover:bg-primary-700';
        } elseif ($action_tone === 'positive') {
          $action_button_class .= ' border-positive-300 bg-positive-50 text-positive-700 hover:bg-positive-100';
        } else {
          $action_button_class .= ' border-primary-100 bg-primary-100  text-primary-700 hover:bg-brand-100';
        }
        ?>
        <?php if ($action_href !== ''): ?>
          <a class="<?= e($action_button_class); ?>" href="<?= e($action_href); ?>">
            <?= e($action_label); ?>
          </a>
        <?php else: ?>
          <button type="button" class="<?= e($action_button_class); ?>">
            <?= e($action_label); ?>
          </button>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>

  <dl class="mt-6 grid gap-4 md:grid-cols-4">
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Project Status</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($project_status); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Consultant Lead</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($consultant_lead); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Client PIC</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($client_pic); ?></dd>
    </div>
  </dl>
</header>
