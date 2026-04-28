<?php

declare(strict_types=1);

$target_rating                    = isset($target_rating) ? trim((string) $target_rating) : '-';
$verified_score                   = isset($verified_score) ? trim((string) $verified_score) : '-';
$potential_score                  = isset($potential_score) ? trim((string) $potential_score) : '-';
$points_at_risk                   = isset($points_at_risk) ? trim((string) $points_at_risk) : '-';
$rating_buffer                    = isset($rating_buffer) ? trim((string) $rating_buffer) : '-';
$final_submission_recommendation  = isset($final_submission_recommendation) ? trim((string) $final_submission_recommendation) : '-';
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="submission-score-summary-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="submission-score-summary-heading" class="text-lg font-semibold text-brand-900">Score Summary</h2>
    <p class="mt-1 text-sm text-brand-600">Final score confidence before package export and client sign-off.</p>
  </header>

  <dl class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Target Rating</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($target_rating); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Verified Score</dt>
      <dd class="mt-1 font-medium text-positive-700"><?= e($verified_score); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Potential Score</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($potential_score); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Points At Risk</dt>
      <dd class="mt-1 font-medium text-negative-700"><?= e($points_at_risk); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Rating Buffer</dt>
      <dd class="mt-1 font-medium text-brand-900"><?= e($rating_buffer); ?></dd>
    </div>
    <div>
      <dt class="text-xs uppercase tracking-wide text-brand-500">Final Recommendation</dt>
      <dd class="mt-1">
        <?php
        $recommendation_tone = 'neutral';

        if (stripos($final_submission_recommendation, 'ready') !== false || stripos($final_submission_recommendation, 'proceed') !== false) {
          $recommendation_tone = 'positive';
        } elseif (stripos($final_submission_recommendation, 'block') !== false || stripos($final_submission_recommendation, 'hold') !== false) {
          $recommendation_tone = 'negative';
        } elseif (stripos($final_submission_recommendation, 'conditional') !== false) {
          $recommendation_tone = 'warning';
        }
        ?>
        <?php component('badge', ['items' => [['label' => $final_submission_recommendation, 'tone' => $recommendation_tone]]]); ?>
      </dd>
    </div>
  </dl>
</section>
