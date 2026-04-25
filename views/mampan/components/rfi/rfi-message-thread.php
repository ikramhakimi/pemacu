<?php

declare(strict_types=1);

$messages = isset($messages) && is_array($messages) ? $messages : [];
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="clarification-thread-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="clarification-thread-heading" class="text-lg font-semibold text-zinc-900">Message Thread</h2>
    <p class="mt-1 text-sm text-zinc-600">Conversation between consultant and client for this clarification.</p>
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
      <li class="rounded-md border border-zinc-200 bg-zinc-50 p-4">
        <div class="flex flex-wrap items-center gap-2">
          <p class="font-medium text-zinc-900"><?= e($author); ?></p>
          <?php component('badge', ['items' => [['label' => $role, 'tone' => $role_tone]]]); ?>
          <p class="text-xs text-zinc-500"><?= e($timestamp); ?></p>
        </div>
        <p class="mt-2 text-sm text-zinc-800"><?= e($body); ?></p>
        <?php if ($attachment !== ''): ?>
          <div class="mt-3 rounded-md border border-zinc-200 bg-white p-3">
            <p class="text-xs uppercase tracking-wide text-zinc-500">Attachment</p>
            <p class="mt-1 text-sm text-zinc-700"><?= e($attachment); ?></p>
          </div>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
