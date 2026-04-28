<?php

declare(strict_types=1);

$target_rating         = isset($target_rating) ? trim((string) $target_rating) : '-';
$current_score         = isset($current_score) ? trim((string) $current_score) : '-';
$potential_score       = isset($potential_score) ? trim((string) $potential_score) : '-';
$verified_score        = isset($verified_score) ? trim((string) $verified_score) : '-';
$rating_gap            = isset($rating_gap) ? trim((string) $rating_gap) : '-';
$submission_readiness  = isset($submission_readiness) ? trim((string) $submission_readiness) : '-';
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="report-score-summary-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="report-score-summary-heading" class="text-lg font-semibold text-brand-900">Score Summary</h2>
    <p class="mt-1 text-sm text-brand-600">Current score position against target rating readiness.</p>
  </header>

  <dl class="mt-4 grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Target Rating</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($target_rating); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Current Estimated Score</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($current_score); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Potential Score</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($potential_score); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Verified Score</dt>
      <dd class="mt-1 font-medium text-positive-700"><?= e($verified_score); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Rating Gap</dt>
      <dd class="mt-1 font-medium text-negative-700"><?= e($rating_gap); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Submission Readiness</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($submission_readiness); ?></dd>
    </div>
  </dl>
</section>
