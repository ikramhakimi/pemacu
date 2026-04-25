<?php

declare(strict_types=1);

$stages = isset($stages) && is_array($stages) ? $stages : [];

$status_tone_map = [
  'Completed'      => 'positive',
  'In Progress'    => 'info',
  'Waiting Client' => 'warning',
  'Under Review'   => 'neutral',
  'Not Started'    => 'neutral',
];

$status_icon_map = [
  'Completed'      => 'checkbox-circle-fill',
  'Under Review'   => 'search-eye-line',
  'In Progress'    => 'settings-4-line',
  'Waiting Client' => 'psychotherapy-line',
  'Not Started'    => 'timer-line',
];
?>
<section class="<?php card('bg-white overflow-hidden') ?>" aria-labelledby="project-stage-timeline-heading">
  <header class="p-5 border-b border-brand-200">
    <h2 id="project-stage-timeline-heading" class="text-lg font-semibold text-brand-900 leading-none">Stage Timeline</h2>
    <p class="mt-2 text-sm text-brand-600">Where the project is now and what is blocking progress.</p>
  </header>

  <ol class="divide-y divide-brand-200 bg-brand-50">
    <?php foreach ($stages as $stage): ?>
      <?php
      $name        = isset($stage['name']) ? trim((string) $stage['name']) : '-';
      $owner       = isset($stage['owner']) ? trim((string) $stage['owner']) : '-';
      $status      = isset($stage['status']) ? trim((string) $stage['status']) : 'Not Started';
      $due_date    = isset($stage['due_date']) ? trim((string) $stage['due_date']) : '-';
      $description = isset($stage['description']) ? trim((string) $stage['description']) : '';
      $display_due_date = $due_date;
      $parsed_due_date  = DateTimeImmutable::createFromFormat('Y-m-d', $due_date);

      if ($parsed_due_date instanceof DateTimeImmutable) {
        $display_due_date = $parsed_due_date->format('F j');
      }

      $status_tone = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
      $status_color_map = [
        'positive' => 'text-positive-700',
        'info'     => 'text-primary-700',
        'warning'  => 'text-attention-700',
        'neutral'  => 'text-brand-600',
      ];
      $status_color_class = isset($status_color_map[$status_tone]) ? $status_color_map[$status_tone] : $status_color_map['neutral'];
      $status_icon_name   = isset($status_icon_map[$status]) ? $status_icon_map[$status] : 'checkbox-blank-circle-fill';
      $status_bg_class    = in_array($status, ['Under Review', 'In Progress', 'Waiting Client'], true) ? 'bg-white ring-1 ring-brand-200' : '';
      // $status_bg_class    = in_array($status, ['In Progress',], true) ? 'bg-white relative ring-inset ring-2 ring-positive-500' : '';
      ?>
      <li class="p-2">
        <div class="rounded-md px-3 py-3 flex items-start gap-3 <?= e($status_bg_class); ?>">
          <div class="relative bg-brand-100 size-8 flex items-center justify-center border border-brand-200 rounded-md">
            <?php if ($status === 'In Progress'): ?>
              <span class="relative block h-4 w-4">
                <span class="absolute inset-0 block animate-ping rounded-full bg-positive-500 opacity-100"></span>
                <span class="absolute inset-0 m-auto block h-2 w-2 rounded-full bg-positive-600"></span>
              </span>
            <?php else: ?>
              <?php icon($status_icon_name, [
                'icon_size'  => '20',
                'icon_class' => $status_color_class,
              ]); ?>
            <?php endif; ?>
            <span class="hidden text-xs font-semibold uppercase tracking-wide <?= e($status_color_class); ?>">
              <?= e($status); ?>
            </span>
          </div>
          <div class="leading-none">
            <h3 class="font-medium text-base text-brand-900"><?= e($name); ?></h3>
            <p class="mt-1 text-sm text-brand-500">
              Owner: <?= e($owner); ?> 
              <span class="text-brand-300 font-light">&mdash;</span>
              Due: <?= e($display_due_date); ?>
            </p>
            <?php if ($description !== ''): ?>
              <p class="mt-2 text-sm text-brand-700"><?= e($description); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
