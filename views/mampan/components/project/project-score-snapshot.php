<?php

declare(strict_types=1);

$target_rating           = isset($target_rating) ? trim((string) $target_rating) : '-';
$current_estimated_score = isset($current_estimated_score) ? trim((string) $current_estimated_score) : '-';
$potential_score         = isset($potential_score) ? trim((string) $potential_score) : '-';
$verified_score          = isset($verified_score) ? trim((string) $verified_score) : '-';
$credits_at_risk         = isset($credits_at_risk) ? trim((string) $credits_at_risk) : '-';
$criteria_rows           = isset($criteria_rows) && is_array($criteria_rows) ? $criteria_rows : [];
?>
<section class="<?php card('bg-white') ?>" aria-labelledby="project-score-snapshot-heading">
  <header class="p-5">
    <h2 id="project-score-snapshot-heading" class="text-lg font-semibold text-brand-900 leading-none">GBI Score Snapshot</h2>
    <p class="mt-2 text-brand-600 leading-none">Score position and category-level progress for this submission cycle.</p>
  </header>

  <dl class="grid grid-cols-2 leading-none">
    <div class="ring-1 ring-brand-200 bg-brand-50 p-5">
      <dt class="text-brand-500">Target Rating</dt>
      <dd class="mt-2 font-semibold text-brand-900"><?= e($target_rating); ?></dd>
    </div>
    <div class="ring-1 ring-brand-200 bg-brand-50 p-5">
      <dt class="text-brand-500">Current Estimated Score</dt>
      <dd class="mt-2 font-semibold text-brand-900"><?= e($current_estimated_score); ?></dd>
    </div>
    <div class="ring-1 ring-brand-200 bg-brand-50 p-5">
      <dt class="text-brand-500">Potential Score</dt>
      <dd class="mt-2 font-semibold text-brand-900"><?= e($potential_score); ?></dd>
    </div>
    <div class="ring-1 ring-brand-200 bg-brand-50 p-5">
      <dt class="text-brand-500">Verified Score</dt>
      <dd class="mt-2 font-semibold text-brand-900"><?= e($verified_score); ?></dd>
    </div>
    <div class="ring-1 ring-brand-200 bg-brand-50 p-5 col-span-2">
      <dt class="text-negative-700">Credits At Risk</dt>
      <dd class="mt-2 font-semibold text-negative-800"><?= e($credits_at_risk); ?></dd>
    </div>
  </dl>

  <div class="mt-2 mb-2s overflow-x-auto">
    <table class="min-w-full text-sm" aria-label="GBI criteria score breakdown">
      <thead class="hidden">
        <tr class="border-b border-brand-200 text-left text-xs uppercase tracking-wide text-brand-500">
          <th scope="col" class="py-3 pl-5">Category</th>
          <th scope="col" class="py-3 pr-4"></th>
          <th scope="col" class="py-3 pr-5 text-right">Progress</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($criteria_rows as $row): ?>
          <?php
          $code      = isset($row['code']) ? trim((string) $row['code']) : '-';
          $label     = isset($row['label']) ? trim((string) $row['label']) : '-';
          $score     = isset($row['score']) ? (float) $row['score'] : 0.0;
          $max_score = isset($row['max_score']) ? (float) $row['max_score'] : 0.0;
          $progress  = $max_score > 0 ? (int) round(($score / $max_score) * 100) : 0;

          if ($progress < 0) {
            $progress = 0;
          }

          if ($progress > 100) {
            $progress = 100;
          }
          ?>
          <tr class="border-b border-brand-100 last:border-b-0">
            <td class="py-3 px-4 text-brand-700">
              <div class="flex items-center justify-start gap-2">
                <span class="inline-flex w-10 justify-center font-medium text-brand-600 bg-brand-100 border border-brand-300 rounded-md leading-6 text-xs">
                  <?= e($code); ?>
                </span>
                <span class="leading-none"><?= e($label); ?></span>
              </div>
            </td>
            <td class="py-3 pr-4 text-brand-700 text-right"><?= e((string) $score); ?> / <?= e((string) $max_score); ?></td>
            <td class="py-3 pr-4 w-[100px]">
              <div class="h-2 w-full rounded bg-brand-200" role="presentation">
                <div class="h-full rounded bg-primary-600" style="width: <?= e((string) $progress); ?>%;"></div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</section>
