<?php

declare(strict_types=1);

$timeline_items = isset($timeline_items) && is_array($timeline_items) ? $timeline_items : [];

$status_tone_map = [
  'Completed'    => 'positive',
  'Current'      => 'warning',
  'Pending'      => 'neutral',
  'Not Started'  => 'neutral',
];
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="clarification-status-timeline-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="clarification-status-timeline-heading" class="text-lg font-semibold text-zinc-900">Status Timeline</h2>
  </header>

  <ol class="mt-4 space-y-3">
    <?php foreach ($timeline_items as $item): ?>
      <?php
      $step_name   = isset($item['step_name']) ? trim((string) $item['step_name']) : '-';
      $status      = isset($item['status']) ? trim((string) $item['status']) : 'Pending';
      $timestamp   = isset($item['timestamp']) ? trim((string) $item['timestamp']) : '-';
      $description = isset($item['description']) ? trim((string) $item['description']) : '';
      $tone        = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
      ?>
      <li class="rounded-md border border-zinc-200 bg-zinc-50 p-3">
        <div class="flex flex-wrap items-center gap-2">
          <p class="font-medium text-zinc-900"><?= e($step_name); ?></p>
          <?php component('badge', ['items' => [['label' => $status, 'tone' => $tone]]]); ?>
          <p class="text-xs text-zinc-500"><?= e($timestamp); ?></p>
        </div>
        <?php if ($description !== ''): ?>
          <p class="mt-2 text-sm text-zinc-700"><?= e($description); ?></p>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
