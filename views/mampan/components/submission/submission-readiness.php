<?php

declare(strict_types=1);

$overall_readiness      = isset($overall_readiness) ? trim((string) $overall_readiness) : '0%';
$readiness_status       = isset($readiness_status) ? trim((string) $readiness_status) : 'Not Ready';
$readiness_explanation  = isset($readiness_explanation) ? trim((string) $readiness_explanation) : '';
$source_progress        = isset($source_progress) && is_array($source_progress) ? $source_progress : [];

$status_tone_map = [
  'Ready for Submission' => 'positive',
  'Almost Ready'         => 'warning',
  'Not Ready'            => 'negative',
  'Draft'                => 'neutral',
];

$status_tone = isset($status_tone_map[$readiness_status]) ? $status_tone_map[$readiness_status] : 'neutral';
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="submission-readiness-heading">
  <header class="flex flex-col gap-3 border-b border-brand-200 pb-4 sm:flex-row sm:items-start sm:justify-between">
    <div>
      <h2 id="submission-readiness-heading" class="text-lg font-semibold text-brand-900">Submission Readiness</h2>
      <?php if ($readiness_explanation !== ''): ?>
        <p class="mt-1 text-sm text-brand-600"><?= e($readiness_explanation); ?></p>
      <?php endif; ?>
    </div>
    <div class="flex items-center gap-2">
      <?php component('badge', ['items' => [['label' => $readiness_status, 'tone' => $status_tone]]]); ?>
      <p class="text-lg font-semibold text-brand-900"><?= e($overall_readiness); ?></p>
    </div>
  </header>

  <div class="mt-4 space-y-3">
    <?php foreach ($source_progress as $source_item): ?>
      <?php
      $source_label = isset($source_item['label']) ? trim((string) $source_item['label']) : '';
      $source_value = isset($source_item['value']) ? trim((string) $source_item['value']) : '0%';

      if ($source_label === '') {
        continue;
      }

      $source_width = preg_replace('/[^0-9]/', '', $source_value);

      if ($source_width === '') {
        $source_width = '0';
      }

      $source_width_number = (int) $source_width;

      if ($source_width_number > 100) {
        $source_width_number = 100;
      }
      ?>
      <article>
        <div class="mb-1 flex items-center justify-between gap-3">
          <h3 class="text-sm font-medium text-brand-800"><?= e($source_label); ?></h3>
          <p class="text-sm text-brand-600"><?= e($source_value); ?></p>
        </div>
        <div class="h-2 rounded-full bg-brand-100">
          <div class="h-full rounded-full bg-brand-700" style="width: <?= e((string) $source_width_number); ?>%"></div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
