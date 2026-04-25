<?php

declare(strict_types=1);

$available_points         = isset($available_points) ? trim((string) $available_points) : '-';
$targeted_points          = isset($targeted_points) ? trim((string) $targeted_points) : '-';
$current_verified_points  = isset($current_verified_points) ? trim((string) $current_verified_points) : '-';
$points_at_risk           = isset($points_at_risk) ? trim((string) $points_at_risk) : '-';
$impact_note              = isset($impact_note) ? trim((string) $impact_note) : '-';
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="evidence-score-impact-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="evidence-score-impact-heading" class="text-lg font-semibold text-zinc-900">Score Impact</h2>
  </header>

  <dl class="mt-4 space-y-3">
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Available Points</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($available_points); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Targeted Points</dt>
      <dd class="mt-1 font-medium text-zinc-900"><?= e($targeted_points); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Currently Verified Points</dt>
      <dd class="mt-1 font-medium text-positive-700"><?= e($current_verified_points); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Points at Risk</dt>
      <dd class="mt-1 font-medium text-negative-700"><?= e($points_at_risk); ?></dd>
    </div>
  </dl>

  <div class="mt-4 rounded-md border border-zinc-200 bg-zinc-50 p-3">
    <p class="text-xs uppercase tracking-wide text-zinc-500">Impact Note</p>
    <p class="mt-1 text-sm text-zinc-700"><?= e($impact_note); ?></p>
  </div>
</section>
