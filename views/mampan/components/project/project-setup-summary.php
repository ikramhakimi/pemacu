<?php

declare(strict_types=1);

$summary = isset($summary) && is_array($summary) ? $summary : [];

$project_info = isset($summary['project_info']) && is_array($summary['project_info']) ? $summary['project_info'] : [];
$gbi_setup = isset($summary['gbi_setup']) && is_array($summary['gbi_setup']) ? $summary['gbi_setup'] : [];
$team_setup = isset($summary['team_setup']) && is_array($summary['team_setup']) ? $summary['team_setup'] : [];
$selected_credits = isset($summary['selected_credits']) && is_array($summary['selected_credits']) ? $summary['selected_credits'] : [];
$required_documents = isset($summary['required_documents']) && is_array($summary['required_documents']) ? $summary['required_documents'] : [];
?>
<section class="<?php card('bg-white p-5 sm:p-6'); ?>" aria-labelledby="project-setup-step-6">
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Step 6</p>
      <h3 id="project-setup-step-6" class="mt-1 text-lg font-semibold text-brand-900">Review &amp; Create</h3>
      <p class="mt-2 text-sm text-brand-600">
        Review the setup package below before creating the new GBI project workspace.
      </p>
    </div>
    <span class="rounded-md border border-brand-200 bg-brand-50 px-3 py-1.5 text-xs font-semibold uppercase tracking-wide text-brand-700">
      Final review
    </span>
  </div>

  <div class="mt-5 grid gap-4 xl:grid-cols-2">
    <article class="rounded-lg border border-brand-200 bg-brand-50 p-4">
      <h4 class="text-sm font-semibold uppercase tracking-wide text-brand-700">Project Info</h4>
      <dl class="mt-3 space-y-2">
        <?php foreach ($project_info as $item_label => $item_value): ?>
          <div class="grid grid-cols-[9rem_1fr] gap-2">
            <dt class="text-sm text-brand-600"><?= e((string) $item_label); ?></dt>
            <dd class="text-sm font-medium text-brand-900"><?= e((string) $item_value); ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
    </article>

    <article class="rounded-lg border border-brand-200 bg-brand-50 p-4">
      <h4 class="text-sm font-semibold uppercase tracking-wide text-brand-700">GBI Setup</h4>
      <dl class="mt-3 space-y-2">
        <?php foreach ($gbi_setup as $item_label => $item_value): ?>
          <div class="grid grid-cols-[9rem_1fr] gap-2">
            <dt class="text-sm text-brand-600"><?= e((string) $item_label); ?></dt>
            <dd class="text-sm font-medium text-brand-900"><?= e((string) $item_value); ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
    </article>

    <article class="rounded-lg border border-brand-200 bg-brand-50 p-4">
      <h4 class="text-sm font-semibold uppercase tracking-wide text-brand-700">Team Setup</h4>
      <dl class="mt-3 space-y-2">
        <?php foreach ($team_setup as $item_label => $item_value): ?>
          <div class="grid grid-cols-[9rem_1fr] gap-2">
            <dt class="text-sm text-brand-600"><?= e((string) $item_label); ?></dt>
            <dd class="text-sm font-medium text-brand-900"><?= e((string) $item_value); ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
    </article>

    <article class="rounded-lg border border-brand-200 bg-brand-50 p-4">
      <h4 class="text-sm font-semibold uppercase tracking-wide text-brand-700">Selected Credits</h4>
      <ul class="mt-3 space-y-2 text-sm text-brand-800">
        <?php foreach ($selected_credits as $credit_name): ?>
          <li class="flex items-center gap-2">
            <?php icon('check-line', ['icon_size' => '16', 'icon_class' => 'text-positive-600']); ?>
            <span><?= e((string) $credit_name); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </article>

    <article class="rounded-lg border border-brand-200 bg-brand-50 p-4">
      <h4 class="text-sm font-semibold uppercase tracking-wide text-brand-700">Required Documents</h4>
      <ul class="mt-3 space-y-2 text-sm text-brand-800">
        <?php foreach ($required_documents as $document_name): ?>
          <li class="flex items-center gap-2">
            <?php icon('file-list-3-line', ['icon_size' => '16', 'icon_class' => 'text-brand-600']); ?>
            <span><?= e((string) $document_name); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
    </article>
  </div>

  <div class="mt-6 flex flex-wrap items-center justify-end gap-3">
    <?php component('button', [
      'label'   => 'Back',
      'type'    => 'button',
      'variant' => 'default',
      'size'    => 'lg',
    ]); ?>
    <?php component('button', [
      'label'   => 'Create Project',
      'type'    => 'button',
      'variant' => 'primary',
      'size'    => 'lg',
    ]); ?>
  </div>
</section>
