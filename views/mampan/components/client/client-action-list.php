<?php

declare(strict_types=1);

$section_title       = isset($section_title) ? trim((string) $section_title) : 'My Actions';
$section_description = isset($section_description) ? trim((string) $section_description) : '';
$actions             = isset($actions) && is_array($actions) ? $actions : [];

$priority_tone_map = [
  'High'   => 'negative',
  'Medium' => 'warning',
  'Low'    => 'neutral',
];
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="client-action-list-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="client-action-list-heading" class="text-lg font-semibold text-brand-900"><?= e($section_title); ?></h2>
    <?php if ($section_description !== ''): ?>
      <p class="mt-1 text-sm text-brand-600"><?= e($section_description); ?></p>
    <?php endif; ?>
  </header>

  <div class="mt-4 space-y-3">
    <?php foreach ($actions as $index => $action): ?>
      <?php
      $title        = isset($action['title']) ? trim((string) $action['title']) : '';
      $why          = isset($action['why']) ? trim((string) $action['why']) : '';
      $category     = isset($action['category']) ? trim((string) $action['category']) : 'Action';
      $related_item = isset($action['related_item']) ? trim((string) $action['related_item']) : '';
      $due_date     = isset($action['due_date']) ? trim((string) $action['due_date']) : '-';
      $priority     = isset($action['priority']) ? trim((string) $action['priority']) : 'Low';
      $button_label = isset($action['button_label']) ? trim((string) $action['button_label']) : 'Open';
      $button_href  = isset($action['button_href']) ? trim((string) $action['button_href']) : '#';

      if ($title === '') {
        continue;
      }

      $priority_tone = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';
      ?>
      <article class="rounded-lg border border-brand-200 bg-brand-50 p-4">
        <div class="flex flex-wrap items-start justify-between gap-3">
          <div>
            <div class="flex flex-wrap items-center gap-2">
              <?php component('badge', ['items' => [['label' => $category, 'tone' => 'neutral']]]); ?>
              <?php component('badge', ['items' => [['label' => $priority . ' Priority', 'tone' => $priority_tone]]]); ?>
            </div>
            <h3 class="mt-2 text-base font-semibold text-brand-900"><?= e($title); ?></h3>
            <?php if ($why !== ''): ?>
              <p class="mt-1 text-sm text-brand-600"><?= e($why); ?></p>
            <?php endif; ?>
          </div>
          <div>
            <?php component('button', [
              'label'   => $button_label,
              'href'    => $button_href,
              'size'    => 'sm',
              'variant' => 'primary',
            ]); ?>
          </div>
        </div>

        <dl class="mt-3 grid gap-2 text-sm text-brand-600 sm:grid-cols-2">
          <?php if ($related_item !== ''): ?>
            <div>
              <dt class="font-medium text-brand-700">Related Item</dt>
              <dd><?= e($related_item); ?></dd>
            </div>
          <?php endif; ?>
          <div>
            <dt class="font-medium text-brand-700">Due Date</dt>
            <dd><?= e($due_date); ?></dd>
          </div>
        </dl>
      </article>
    <?php endforeach; ?>

    <?php if ($actions === []): ?>
      <p class="rounded-lg border border-brand-200 bg-brand-50 px-4 py-3 text-sm text-brand-600">No pending actions right now.</p>
    <?php endif; ?>
  </div>
</section>
