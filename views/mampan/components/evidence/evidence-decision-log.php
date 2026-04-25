<?php

declare(strict_types=1);

$log_items = isset($log_items) && is_array($log_items) ? $log_items : [];

$action_tone_map = [
  'Submitted'                 => 'neutral',
  'Under Consultant Review'   => 'warning',
  'Revision Requested'        => 'warning',
  'Revised Document Uploaded' => 'neutral',
  'Verified'                  => 'positive',
  'Rejected'                  => 'negative',
];
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="evidence-decision-log-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="evidence-decision-log-heading" class="text-lg font-semibold text-zinc-900">Decision Log</h2>
    <p class="mt-1 text-sm text-zinc-600">Review actions and evidence decision history.</p>
  </header>

  <ol class="mt-4 space-y-3">
    <?php foreach ($log_items as $log_item): ?>
      <?php
      $action    = isset($log_item['action']) ? trim((string) $log_item['action']) : '-';
      $actor     = isset($log_item['actor']) ? trim((string) $log_item['actor']) : '-';
      $timestamp = isset($log_item['timestamp']) ? trim((string) $log_item['timestamp']) : '-';
      $note      = isset($log_item['note']) ? trim((string) $log_item['note']) : '';
      $tone      = isset($action_tone_map[$action]) ? $action_tone_map[$action] : 'neutral';
      ?>
      <li class="rounded-md border border-zinc-200 bg-zinc-50 p-3">
        <div class="flex flex-wrap items-center gap-2">
          <?php component('badge', ['items' => [['label' => $action, 'tone' => $tone]]]); ?>
          <p class="text-sm font-medium text-zinc-900"><?= e($actor); ?></p>
          <p class="text-xs text-zinc-500"><?= e($timestamp); ?></p>
        </div>
        <?php if ($note !== ''): ?>
          <p class="mt-2 text-sm text-zinc-700"><?= e($note); ?></p>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
