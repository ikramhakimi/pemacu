<?php

declare(strict_types=1);

/**
 * Component: card-attempt
 * Purpose: Render one recent student quiz attempt summary.
 * Anatomy:
 * - .card.card-attempt
 *   - .card__content
 *     - .card-attempt__content
 *     - .card-attempt__score
 *     - .card-attempt__action
 * Data Contract:
 * - `attempt` (array, required): subject_name, chapter_title, topic_title, score, total_questions, accuracy, completed_at.
 * - `href` (string, optional): review link. Default: `#`.
 * - `class_name` (string, optional): extra root classes.
 */

$attempt    = isset($attempt) && is_array($attempt) ? $attempt : [];
$href       = isset($href) ? trim((string) $href) : '#';
$class_name = isset($class_name) ? trim((string) $class_name) : '';

$subject_name    = isset($attempt['subject_name']) ? trim((string) $attempt['subject_name']) : 'Subjek';
$chapter_title   = isset($attempt['chapter_title']) ? trim((string) $attempt['chapter_title']) : 'Bab';
$topic_title     = isset($attempt['topic_title']) ? trim((string) $attempt['topic_title']) : 'Topik';
$score           = isset($attempt['score']) && is_numeric($attempt['score']) ? (int) $attempt['score'] : 0;
$total_questions = isset($attempt['total_questions']) && is_numeric($attempt['total_questions']) ? (int) $attempt['total_questions'] : 0;
$accuracy        = isset($attempt['accuracy']) && is_numeric($attempt['accuracy']) ? (int) $attempt['accuracy'] : 0;
$completed_at    = isset($attempt['completed_at']) ? trim((string) $attempt['completed_at']) : '';
$completed_label = $completed_at !== '' ? date('d M Y, g:i A', strtotime($completed_at)) : 'Belum selesai';
$badge_tone      = $accuracy >= 70 ? 'positive' : 'warning';

$root_extra_class = trim(implode(' ', array_filter([
  'card-attempt bg-white',
  $class_name,
])));
?>
<article class="<?php card($root_extra_class); ?>">
  <div class="card__content flex flex-col gap-4 p-4 sm:flex-row sm:items-center sm:justify-between">
    <div class="card-attempt__content min-w-0">
      <p class="text-sm font-medium text-brand-500"><?= e($subject_name); ?> · <?= e($chapter_title); ?></p>
      <h3 class="mt-1 font-semibold text-brand-900"><?= e($topic_title); ?></h3>
      <p class="mt-2 text-sm text-brand-500"><?= e($completed_label); ?></p>
    </div>
    <div class="card-attempt__score flex shrink-0 items-center justify-between gap-3 sm:justify-end">
      <div class="text-left sm:text-right">
        <p class="font-semibold text-brand-900"><?= e((string) $score); ?> / <?= e((string) $total_questions); ?></p>
        <?php component('badge', [
          'label'      => (string) $accuracy . '%',
          'tone'       => $badge_tone,
          'class_name' => 'mt-1',
        ]); ?>
      </div>
      <div class="card-attempt__action">
        <?php component('button', [
          'label'   => 'Semak',
          'href'    => $href,
          'variant' => 'secondary',
          'size'    => 'sm',
        ]); ?>
      </div>
    </div>
  </div>
</article>
