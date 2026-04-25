<?php

declare(strict_types=1);

$next_actions = isset($next_actions) && is_array($next_actions) ? $next_actions : [];

$priority_tone_map = [
  'High'   => 'negative',
  'Medium' => 'warning',
  'Low'    => 'neutral',
];
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="document-next-actions-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="document-next-actions-heading" class="text-lg font-semibold text-brand-900">Consultant Next Actions</h2>
    <p class="mt-1 text-sm text-brand-600">Immediate actions to move Phase 1 requirements toward gap analysis readiness.</p>
  </header>

  <div class="mt-4 space-y-3">
    <?php if ($next_actions === []): ?>
      <p class="text-sm text-brand-600">No pending actions at the moment.</p>
    <?php endif; ?>

    <?php foreach ($next_actions as $action_item): ?>
      <?php
      $title               = isset($action_item['title']) ? trim((string) $action_item['title']) : '-';
      $related_requirement = isset($action_item['related_requirement']) ? trim((string) $action_item['related_requirement']) : '-';
      $owner               = isset($action_item['owner']) ? trim((string) $action_item['owner']) : '-';
      $priority            = isset($action_item['priority']) ? trim((string) $action_item['priority']) : 'Low';
      $action_label        = isset($action_item['action_label']) ? trim((string) $action_item['action_label']) : 'Open';
      $action_href         = isset($action_item['action_href']) ? trim((string) $action_item['action_href']) : '#';
      $priority_tone       = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';
      ?>
      <article class="rounded-lg border border-brand-200 bg-brand-50 p-3">
        <div class="flex flex-wrap items-start justify-between gap-2">
          <div class="space-y-1">
            <p class="text-sm font-medium text-brand-900"><?= e($title); ?></p>
            <p class="text-sm text-brand-600">Related requirement: <?= e($related_requirement); ?></p>
            <p class="text-sm text-brand-600">Owner: <?= e($owner); ?></p>
          </div>
          <div class="flex items-center gap-2">
            <?php component('badge', ['items' => [['label' => $priority, 'tone' => $priority_tone]]]); ?>
            <?php component('button', [
              'label'   => $action_label,
              'href'    => $action_href,
              'size'    => 'sm',
              'variant' => 'default',
              'class'   => 'shadow-none',
            ]); ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
