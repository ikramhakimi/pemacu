<?php

declare(strict_types=1);

/**
 * Component: card-weak-topic
 * Purpose: Render one weak topic insight with accuracy and practice action.
 * Anatomy:
 * - .card.card-weak-topic
 *   - .card__header
 *     - .card__title
 *     - .card__subtitle
 *   - .card__content
 *     - .card-weak-topic__stats
 *     - .card-weak-topic__attempts
 *   - .card__footer
 *     - .card-weak-topic__action
 * Data Contract:
 * - `topic` (array, required): topic_title, subject_name, chapter_title, accuracy, total_answers, wrong_answers.
 * - `topic` also supports: total_quiz_attempts, easy_attempts, medium_attempts, hard_attempts.
 * - `href` (string, optional): practice link. Default: `#`.
 * - `class_name` (string, optional): extra root classes.
 */

$topic      = isset($topic) && is_array($topic) ? $topic : [];
$href       = isset($href) ? trim((string) $href) : '#';
$class_name = isset($class_name) ? trim((string) $class_name) : '';

$topic_title    = isset($topic['topic_title']) ? trim((string) $topic['topic_title']) : 'Topik';
$subject_name   = isset($topic['subject_name']) ? trim((string) $topic['subject_name']) : 'Subjek';
$chapter_title  = isset($topic['chapter_title']) ? trim((string) $topic['chapter_title']) : 'Bab';
$accuracy       = isset($topic['accuracy']) && is_numeric($topic['accuracy']) ? (int) $topic['accuracy'] : 0;
$total_answers  = isset($topic['total_answers']) && is_numeric($topic['total_answers']) ? (int) $topic['total_answers'] : 0;
$wrong_answers  = isset($topic['wrong_answers']) && is_numeric($topic['wrong_answers']) ? (int) $topic['wrong_answers'] : 0;
$total_attempts = isset($topic['total_quiz_attempts']) && is_numeric($topic['total_quiz_attempts'])
  ? (int) $topic['total_quiz_attempts']
  : 0;
$easy_attempts  = isset($topic['easy_attempts']) && is_numeric($topic['easy_attempts'])
  ? (int) $topic['easy_attempts']
  : 0;
$medium_attempts  = isset($topic['medium_attempts']) && is_numeric($topic['medium_attempts'])
  ? (int) $topic['medium_attempts']
  : 0;
$hard_attempts    = isset($topic['hard_attempts']) && is_numeric($topic['hard_attempts'])
  ? (int) $topic['hard_attempts']
  : 0;
$meter_tone       = $accuracy < 50 ? 'negative' : 'warning';
$easy_progress    = $total_attempts > 0 ? (int) round(($easy_attempts / $total_attempts) * 100) : 0;
$medium_progress = $total_attempts > 0 ? (int) round(($medium_attempts / $total_attempts) * 100) : 0;
$hard_progress    = $total_attempts > 0 ? (int) round(($hard_attempts / $total_attempts) * 100) : 0;

$root_extra_class = trim(implode(' ', array_filter([
  'card-weak-topic bg-white',
  $class_name,
])));
?>
<article class="<?php card($root_extra_class); ?>">
  <div class="card__header flex items-start justify-between gap-4 px-4 pt-4">
    <div class="min-w-0">
      <h3 class="card__title text-base font-semibold leading-5 text-brand-900"><?= e($topic_title); ?></h3>
      <p class="card__subtitle mt-1 text-sm text-brand-500"><?= e($subject_name); ?> · <?= e($chapter_title); ?></p>
    </div>
    <?php component('badge', [
      'label' => (string) $accuracy . '%',
      'tone'  => $accuracy < 50 ? 'negative' : 'warning',
    ]); ?>
  </div>

  <div class="card__content p-4">
    <?php kuiz_component('progress-meter', [
      'value'      => $accuracy,
      'label'      => 'Ketepatan',
      'tone'       => $meter_tone,
    ]); ?>

    <dl class="card-weak-topic__stats mt-4 grid grid-cols-2 gap-3 border-y border-brand-200 py-3 text-sm">
      <div>
        <dt class="text-brand-500">Dijawab</dt>
        <dd class="mt-1 font-semibold text-brand-900"><?= e((string) $total_answers); ?></dd>
      </div>
      <div>
        <dt class="text-brand-500">Salah</dt>
        <dd class="mt-1 font-semibold text-brand-900"><?= e((string) $wrong_answers); ?></dd>
      </div>
    </dl>

    <div class="card-weak-topic__attempts mt-4">
      <div class="mb-3 flex items-center justify-between gap-3">
        <p class="text-sm text-brand-500">Jumlah Cubaan Kuiz</p>
        <p class="font-semibold text-brand-900"><?= e((string) $total_attempts); ?></p>
      </div>
      <div class="space-y-3">
        <?php kuiz_component('progress-meter', [
          'value'      => $easy_progress,
          'label'      => 'Tahap Asas · ' . (string) $easy_attempts,
          'tone'       => 'positive',
        ]); ?>
        <?php kuiz_component('progress-meter', [
          'value'      => $medium_progress,
          'label'      => 'Tahap Pengukuhan · ' . (string) $medium_attempts,
          'tone'       => 'warning',
        ]); ?>
        <?php kuiz_component('progress-meter', [
          'value'      => $hard_progress,
          'label'      => 'Tahap Cabaran · ' . (string) $hard_attempts,
          'tone'       => 'negative',
        ]); ?>
      </div>
    </div>
  </div>

  <div class="card__footer px-4 pb-4">
    <?php component('button', [
      'label'   => 'Latih Topik Ini',
      'href'    => $href,
      'variant' => 'secondary',
      'class'   => 'card-weak-topic__action w-full',
    ]); ?>
  </div>
</article>
