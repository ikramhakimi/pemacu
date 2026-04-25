<?php

declare(strict_types=1);

$client_actions     = isset($client_actions) && is_array($client_actions) ? $client_actions : [];
$consultant_actions = isset($consultant_actions) && is_array($consultant_actions) ? $consultant_actions : [];

$priority_tone_map = [
  'High'   => 'negative',
  'Medium' => 'warning',
  'Low'    => 'neutral',
];
?>
<section class="<?php card('bg-white overflow-hidden') ?>" aria-labelledby="project-pending-actions-heading">
  <header class="p-4 md:p-5">
    <h2 id="project-pending-actions-heading" class="text-lg font-semibold text-brand-900 leading-none">Consultant Pending Actions</h2>
    <p class="mt-2 text-sm text-brand-500 leading-none">Who needs to act next and by when.</p>
  </header>

  <article class="ring-1 ring-brand-200" aria-labelledby="consultant-pending-actions-heading">
    <ul class="bg-brand-50 divide-y divide-brand-200">
      <?php foreach ($consultant_actions as $action): ?>
        <?php
        $title        = isset($action['title']) ? trim((string) $action['title']) : '-';
        $related_item = isset($action['related_item']) ? trim((string) $action['related_item']) : '-';
        $priority     = isset($action['priority']) ? trim((string) $action['priority']) : 'Low';
        $due_date     = isset($action['due_date']) ? trim((string) $action['due_date']) : '-';
        $owner        = isset($action['owner']) ? trim((string) $action['owner']) : '-';
        $tone         = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';
        $display_due_date = $due_date;
        $parsed_due_date  = DateTimeImmutable::createFromFormat('Y-m-d', $due_date);

        if ($parsed_due_date instanceof DateTimeImmutable) {
          $display_due_date = $parsed_due_date->format('F j');
        }
        ?>
        <li class="p-4 md:p-5 hover:bg-white">
          <div>
            <div class="flex items-center justify-start gap-2">
              <?php component('badge', ['items' => [['label' => $priority, 'tone' => $tone]]]); ?>
              <div class="font-medium text-base text-brand-900"><?= e($title); ?></div>
            </div>
            <p class="mt-4 text-brand-600 leading-none">Related : <?= e($related_item); ?></p>
          </div>
          <div class="pt-2 mt-2 leading-none border-t border-brand-200 flex items-center gap-1">
            <span>Due : <?= e($display_due_date); ?></span>
            <span class="text-brand-400 font-light">&#8594;</span>
            <span><?= e($owner); ?></span>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </article>
</section>

<section class="<?php card('bg-white overflow-hidden') ?>" aria-labelledby="project-pending-actions-heading">
  <header class="p-4 md:p-5">
    <h2 id="project-pending-actions-heading" class="text-lg font-semibold text-brand-900 leading-none">Client Pending Actions</h2>
    <p class="mt-2 text-sm text-brand-500 leading-none">Who needs to act next and by when.</p>
  </header>

  <article class="ring-1 ring-brand-200" aria-labelledby="client-pending-actions-heading">
    <ul class="bg-brand-50 divide-y divide-brand-200">
      <?php foreach ($client_actions as $action): ?>
        <?php
        $title        = isset($action['title']) ? trim((string) $action['title']) : '-';
        $related_item = isset($action['related_item']) ? trim((string) $action['related_item']) : '-';
        $priority     = isset($action['priority']) ? trim((string) $action['priority']) : 'Low';
        $due_date     = isset($action['due_date']) ? trim((string) $action['due_date']) : '-';
        $owner        = isset($action['owner']) ? trim((string) $action['owner']) : '-';
        $tone         = isset($priority_tone_map[$priority]) ? $priority_tone_map[$priority] : 'neutral';
        $display_due_date = $due_date;
        $parsed_due_date  = DateTimeImmutable::createFromFormat('Y-m-d', $due_date);

        if ($parsed_due_date instanceof DateTimeImmutable) {
          $display_due_date = $parsed_due_date->format('F j');
        }
        ?>
        <li class="p-4 md:p-5 hover:bg-white">
          <div>
            <div class="flex items-center justify-start gap-2">
              <?php component('badge', ['items' => [['label' => $priority, 'tone' => $tone]]]); ?>
              <div class="font-medium text-base text-brand-900"><?= e($title); ?></div>
            </div>
            <p class="mt-4 text-brand-600 leading-none">Related : <?= e($related_item); ?></p>
          </div>
          <div class="pt-2 mt-2 leading-none border-t border-brand-200 flex items-center gap-1">
            <span>Due : <?= e($display_due_date); ?></span>
            <span class="text-brand-400 font-light">&#8594;</span>
            <span><?= e($owner); ?></span>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </article>
</section>

