<?php

declare(strict_types=1);

$activities = isset($activities) && is_array($activities) ? $activities : [];
?>
<section class="<?php card('bg-white overflow-hidden') ?>" aria-labelledby="project-activity-timeline-heading">
  <header class="p-5 border-b border-brand-200">
    <h2 id="project-activity-timeline-heading" class="text-lg font-semibold text-brand-900 leading-none">Activity Timeline</h2>
    <p class="mt-2 text-brand-600 leading-none">What happened recently across documents, RFIs, and scoring.</p>
  </header>

  <ol class="divide-y divide-brand-200 bg-brand-50">
    <?php foreach ($activities as $activity): ?>
      <?php
      $text           = isset($activity['text']) ? trim((string) $activity['text']) : '-';
      $actor          = isset($activity['actor']) ? trim((string) $activity['actor']) : '-';
      $actor_role     = isset($activity['actor_role']) ? trim((string) $activity['actor_role']) : '';
      $timestamp      = isset($activity['timestamp']) ? trim((string) $activity['timestamp']) : '-';
      $related_module = isset($activity['related_module']) ? trim((string) $activity['related_module']) : '-';
      $avatar_src     = isset($activity['avatar_src']) ? trim((string) $activity['avatar_src']) : '';
      $avatar_alt     = isset($activity['avatar_alt']) ? trim((string) $activity['avatar_alt']) : '';
      $actor_name_for_initials = preg_replace('/\s*\(.+\)\s*$/', '', $actor);
      $actor_name_for_initials = is_string($actor_name_for_initials) ? trim($actor_name_for_initials) : $actor;
      $actor_words = preg_split('/\s+/', $actor_name_for_initials);
      $actor_words = is_array($actor_words) ? array_values(array_filter($actor_words, static function ($word): bool {
        return is_string($word) && trim($word) !== '';
      })) : [];
      $initials = '';

      if ($actor_words !== []) {
        $first_initial = strtoupper(substr((string) $actor_words[0], 0, 1));
        $last_word     = $actor_words[count($actor_words) - 1];
        $last_initial  = strtoupper(substr((string) $last_word, 0, 1));
        $initials      = $first_initial . $last_initial;
      }

      if ($initials === '' && $actor !== '-') {
        $initials = strtoupper(substr($actor, 0, 2));
      }

      $display_timestamp = $timestamp;
      $parsed_timestamp  = DateTimeImmutable::createFromFormat('Y-m-d H:i', $timestamp);

      if ($parsed_timestamp instanceof DateTimeImmutable) {
        $display_timestamp = $parsed_timestamp->format('F j, g:i a');
      }
      ?>
      <li class="px-5 py-4">
        <div class="flex items-start gap-4">
          <div class="shrink-0">
            <?php component('avatar', [
              'items' => [[
                'image_src'  => $avatar_src,
                'image_alt'  => $avatar_alt !== '' ? $avatar_alt : $actor,
                'initials'   => $initials !== '' ? $initials : 'NA',
                'size'       => '40',
                'class_name' => 'rounded-md ring-1 ring-brand-200',
              ]],
            ]); ?>
          </div>
          <div class="min-w-0 space-y-3">
            <div class="leading-none">
              <?= e($actor); ?>
              <?php if ($actor_role !== ''): ?>
                <span class="text-brand-500"><?= e($actor_role); ?></span>
              <?php endif; ?>
            </div>
            <p class="text-brand-900 leading-relaxed px-3 border-l-2 border-brand-200"><?= e($text); ?></p>
            
            <p class="text-brand-500 leading-none flex items-center justify-start gap-1">
              <span><?= e($related_module); ?></span>
              <span>&middot;</span>
              <span><?= e($display_timestamp); ?></span>
            </p>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
