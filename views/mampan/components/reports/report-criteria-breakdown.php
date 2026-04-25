<?php

declare(strict_types=1);

$criteria_rows = isset($criteria_rows) && is_array($criteria_rows) ? $criteria_rows : [];

$status_tone_map = [
  'Ready'        => 'positive',
  'In Progress'  => 'neutral',
  'Under Review' => 'warning',
  'At Risk'      => 'negative',
];
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="report-criteria-breakdown-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="report-criteria-breakdown-heading" class="text-lg font-semibold text-zinc-900">Criteria Breakdown</h2>
    <p class="mt-1 text-sm text-zinc-600">Target, verified, potential, and risk position across GBI NRNC criteria.</p>
  </header>

  <div class="mt-4 space-y-3">
    <?php foreach ($criteria_rows as $criteria_row): ?>
      <?php
      $code            = isset($criteria_row['code']) ? trim((string) $criteria_row['code']) : '-';
      $label           = isset($criteria_row['label']) ? trim((string) $criteria_row['label']) : '-';
      $target_points   = isset($criteria_row['target_points']) ? trim((string) $criteria_row['target_points']) : '0';
      $verified_points = isset($criteria_row['verified_points']) ? trim((string) $criteria_row['verified_points']) : '0';
      $potential_points = isset($criteria_row['potential_points']) ? trim((string) $criteria_row['potential_points']) : '0';
      $risk_points     = isset($criteria_row['risk_points']) ? trim((string) $criteria_row['risk_points']) : '0';
      $status          = isset($criteria_row['status']) ? trim((string) $criteria_row['status']) : 'In Progress';
      $progress_width  = isset($criteria_row['progress_width']) ? trim((string) $criteria_row['progress_width']) : '0%';
      $status_tone     = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
      ?>
      <article class="rounded-md border border-zinc-200 bg-zinc-50 p-4">
        <div class="flex flex-wrap items-center justify-between gap-2">
          <div>
            <p class="font-medium text-zinc-900"><?= e($code . ' - ' . $label); ?></p>
            <p class="mt-1 text-xs text-zinc-600">Target <?= e($target_points); ?> pts | Verified <?= e($verified_points); ?> pts | Potential <?= e($potential_points); ?> pts | At Risk <?= e($risk_points); ?> pts</p>
          </div>
          <?php component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]); ?>
        </div>
        <div class="mt-3 h-2 overflow-hidden rounded-full bg-zinc-200" role="img" aria-label="<?= e($code); ?> progress">
          <div class="h-2 rounded-full bg-brand-700" style="width: <?= e($progress_width); ?>;"></div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>
