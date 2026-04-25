<?php

declare(strict_types=1);

$section_title       = isset($section_title) ? trim((string) $section_title) : 'Upload Center';
$section_description = isset($section_description) ? trim((string) $section_description) : '';
$uploads             = isset($uploads) && is_array($uploads) ? $uploads : [];

$status_tone_map = [
  'Required'      => 'warning',
  'Submitted'     => 'positive',
  'Need Revision' => 'negative',
];
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="client-upload-list-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="client-upload-list-heading" class="text-lg font-semibold text-zinc-900"><?= e($section_title); ?></h2>
    <?php if ($section_description !== ''): ?>
      <p class="mt-1 text-sm text-zinc-600"><?= e($section_description); ?></p>
    <?php endif; ?>
  </header>

  <div class="mt-4 space-y-3">
    <?php foreach ($uploads as $upload): ?>
      <?php
      $document_name = isset($upload['document_name']) ? trim((string) $upload['document_name']) : '';
      $why           = isset($upload['why']) ? trim((string) $upload['why']) : '';
      $linked_area   = isset($upload['linked_area']) ? trim((string) $upload['linked_area']) : '-';
      $due_date      = isset($upload['due_date']) ? trim((string) $upload['due_date']) : '-';
      $status        = isset($upload['status']) ? trim((string) $upload['status']) : 'Required';
      $action_label  = isset($upload['action_label']) ? trim((string) $upload['action_label']) : 'Upload File';
      $action_href   = isset($upload['action_href']) ? trim((string) $upload['action_href']) : '#';

      if ($document_name === '') {
        continue;
      }

      $status_tone = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
      ?>
      <article class="rounded-lg border border-zinc-200 p-4">
        <div class="flex flex-wrap items-start justify-between gap-3">
          <div class="max-w-3xl">
            <h3 class="text-base font-semibold text-zinc-900"><?= e($document_name); ?></h3>
            <?php if ($why !== ''): ?>
              <p class="mt-1 text-sm text-zinc-600"><?= e($why); ?></p>
            <?php endif; ?>
            <dl class="mt-3 grid gap-2 text-sm sm:grid-cols-2 lg:grid-cols-3">
              <div>
                <dt class="font-medium text-zinc-700">Linked Area</dt>
                <dd class="text-zinc-600"><?= e($linked_area); ?></dd>
              </div>
              <div>
                <dt class="font-medium text-zinc-700">Due Date</dt>
                <dd class="text-zinc-600"><?= e($due_date); ?></dd>
              </div>
              <div>
                <dt class="font-medium text-zinc-700">Status</dt>
                <dd class="mt-1"><?php component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]); ?></dd>
              </div>
            </dl>
          </div>
          <div>
            <?php component('button', [
              'label'   => $action_label,
              'href'    => $action_href,
              'size'    => 'sm',
              'variant' => 'primary',
            ]); ?>
          </div>
        </div>
      </article>
    <?php endforeach; ?>

    <?php if ($uploads === []): ?>
      <p class="rounded-lg border border-zinc-200 bg-zinc-50 px-4 py-3 text-sm text-zinc-600">No required uploads right now.</p>
    <?php endif; ?>
  </div>
</section>
