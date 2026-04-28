<?php

declare(strict_types=1);

$messages = isset($messages) && is_array($messages) ? $messages : [];
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="clarification-thread-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="clarification-thread-heading" class="text-lg font-semibold text-brand-900">Message Thread</h2>
    <p class="mt-1 text-sm text-brand-600">Conversation between consultant and client for this clarification.</p>
  </header>

  <ol class="mt-4 space-y-3">
    <?php foreach ($messages as $message): ?>
      <?php
      $author      = isset($message['author']) ? trim((string) $message['author']) : '-';
      $role        = isset($message['role']) ? trim((string) $message['role']) : '-';
      $timestamp   = isset($message['timestamp']) ? trim((string) $message['timestamp']) : '-';
      $body        = isset($message['body']) ? trim((string) $message['body']) : '-';
      $attachment  = isset($message['attachment']) ? trim((string) $message['attachment']) : '';
      $role_tone   = strtolower($role) === 'consultant' ? 'info' : 'neutral';
      ?>
      <li class="rounded-md border border-brand-200 bg-brand-50 p-4">
        <div class="flex flex-wrap items-center gap-2">
          <p class="font-medium text-brand-900"><?= e($author); ?></p>
          <?php component('badge', ['items' => [['label' => $role, 'tone' => $role_tone]]]); ?>
          <p class="text-xs text-brand-500"><?= e($timestamp); ?></p>
        </div>
        <p class="mt-2 text-sm text-brand-800"><?= e($body); ?></p>
        <?php if ($attachment !== ''): ?>
          <div class="mt-3 rounded-md border border-brand-200 bg-white p-3">
            <p class="text-xs uppercase tracking-wide text-brand-500">Attachment</p>
            <p class="mt-1 text-sm text-brand-700"><?= e($attachment); ?></p>
          </div>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
