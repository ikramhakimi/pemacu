<?php

declare(strict_types=1);

$section_title       = isset($section_title) ? trim((string) $section_title) : 'Clarifications';
$section_description = isset($section_description) ? trim((string) $section_description) : '';
$clarifications      = isset($clarifications) && is_array($clarifications) ? $clarifications : [];

$status_tone_map = [
  'Awaiting Reply' => 'warning',
  'Replied'        => 'positive',
  'Need Revision'  => 'negative',
  'Under Review'   => 'info',
];
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="client-clarification-list-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="client-clarification-list-heading" class="text-lg font-semibold text-zinc-900"><?= e($section_title); ?></h2>
    <?php if ($section_description !== ''): ?>
      <p class="mt-1 text-sm text-zinc-600"><?= e($section_description); ?></p>
    <?php endif; ?>
  </header>

  <div class="mt-4 space-y-3">
    <?php foreach ($clarifications as $clarification): ?>
      <?php
      $title               = isset($clarification['title']) ? trim((string) $clarification['title']) : '';
      $question            = isset($clarification['question']) ? trim((string) $clarification['question']) : '';
      $due_date            = isset($clarification['due_date']) ? trim((string) $clarification['due_date']) : '-';
      $status              = isset($clarification['status']) ? trim((string) $clarification['status']) : 'Awaiting Reply';
      $consultant_question = isset($clarification['consultant_question']) ? trim((string) $clarification['consultant_question']) : '';
      $client_reply        = isset($clarification['client_reply']) ? trim((string) $clarification['client_reply']) : 'No reply yet.';
      $reply_label         = isset($clarification['reply_label']) ? trim((string) $clarification['reply_label']) : 'Reply';
      $reply_href          = isset($clarification['reply_href']) ? trim((string) $clarification['reply_href']) : '#';
      $upload_label        = isset($clarification['upload_label']) ? trim((string) $clarification['upload_label']) : 'Upload File';
      $upload_href         = isset($clarification['upload_href']) ? trim((string) $clarification['upload_href']) : '#';

      if ($title === '') {
        continue;
      }

      $status_tone = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
      ?>
      <article class="rounded-lg border border-zinc-200 p-4">
        <div class="flex flex-wrap items-start justify-between gap-3">
          <div class="max-w-4xl">
            <h3 class="text-base font-semibold text-zinc-900"><?= e($title); ?></h3>
            <?php if ($question !== ''): ?>
              <p class="mt-1 text-sm text-zinc-700"><?= e($question); ?></p>
            <?php endif; ?>
          </div>
          <div><?php component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]); ?></div>
        </div>

        <dl class="mt-3 grid gap-2 text-sm sm:grid-cols-2">
          <div>
            <dt class="font-medium text-zinc-700">Due Date</dt>
            <dd class="text-zinc-600"><?= e($due_date); ?></dd>
          </div>
          <div>
            <dt class="font-medium text-zinc-700">Attachment</dt>
            <dd class="text-zinc-600">Attachment can be uploaded with your reply.</dd>
          </div>
        </dl>

        <div class="mt-3 space-y-2 rounded-md border border-zinc-200 bg-zinc-50 p-3">
          <?php if ($consultant_question !== ''): ?>
            <div>
              <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">Consultant Question</p>
              <p class="mt-1 text-sm text-zinc-700"><?= e($consultant_question); ?></p>
            </div>
          <?php endif; ?>
          <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-zinc-500">Your Reply</p>
            <p class="mt-1 text-sm text-zinc-700"><?= e($client_reply); ?></p>
          </div>
        </div>

        <div class="mt-3 flex flex-wrap items-center gap-2">
          <?php component('button', ['label' => $reply_label, 'href' => $reply_href, 'size' => 'sm', 'variant' => 'primary']); ?>
          <?php component('button', ['label' => $upload_label, 'href' => $upload_href, 'size' => 'sm', 'variant' => 'default']); ?>
        </div>
      </article>
    <?php endforeach; ?>

    <?php if ($clarifications === []): ?>
      <p class="rounded-lg border border-zinc-200 bg-zinc-50 px-4 py-3 text-sm text-zinc-600">No clarifications at the moment.</p>
    <?php endif; ?>
  </div>
</section>
