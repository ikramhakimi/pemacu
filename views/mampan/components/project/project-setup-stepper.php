<?php

declare(strict_types=1);

$steps = isset($steps) && is_array($steps) ? array_values($steps) : [];

if ($steps === []) {
  $steps = [
    ['title' => 'Project Information'],
    ['title' => 'GBI Setup'],
    ['title' => 'Team Setup'],
    ['title' => 'Credit Direction'],
    ['title' => 'Document Checklist'],
    ['title' => 'Review & Create'],
  ];
}

$total_steps = count($steps);
$current_step = isset($current_step) ? (int) $current_step : 1;

if ($current_step < 1) {
  $current_step = 1;
}

if ($current_step > $total_steps) {
  $current_step = $total_steps;
}

$progress_ratio = $total_steps > 0 ? $current_step / $total_steps : 0;
$progress_width = (int) round($progress_ratio * 100);
?>
<section class="<?php card('bg-white p-5 sm:p-6'); ?>" aria-labelledby="project-setup-wizard-progress">
  <div class="flex flex-wrap items-center justify-between gap-3">
    <div>
      <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Project Setup Wizard</p>
      <h2 id="project-setup-wizard-progress" class="mt-1 text-xl font-semibold text-brand-900 sm:text-2xl">
        Step <?= e((string) $current_step); ?> of <?= e((string) $total_steps); ?>
      </h2>
      <p class="mt-2 text-sm text-brand-600">
        Structured onboarding to establish a consultant-ready GBI project baseline.
      </p>
    </div>
    <p class="rounded-md border border-brand-200 bg-brand-50 px-3 py-2 text-sm font-medium text-brand-700">
      <?= e((string) $progress_width); ?>% complete
    </p>
  </div>

  <div class="mt-4 h-2 w-full overflow-hidden rounded-full bg-brand-100" role="presentation" aria-hidden="true">
    <div class="h-full rounded-full bg-primary-600" style="width: <?= e((string) $progress_width); ?>%;"></div>
  </div>

  <ol class="mt-6 grid gap-3 sm:grid-cols-2 xl:grid-cols-3" aria-label="Project setup steps">
    <?php foreach ($steps as $step_index => $step): ?>
      <?php
      $step_number = $step_index + 1;
      $step_title = isset($step['title']) ? trim((string) $step['title']) : 'Step ' . $step_number;
      $step_description = isset($step['description']) ? trim((string) $step['description']) : '';

      if ($step_number < $current_step) {
        $step_tone = 'completed';
      } elseif ($step_number === $current_step) {
        $step_tone = 'current';
      } else {
        $step_tone = 'upcoming';
      }

      $tone_map = [
        'completed' => [
          'item'   => 'border-positive-300 bg-positive-50',
          'marker' => 'border-positive-600 bg-positive-600 text-white',
          'title'  => 'text-brand-900',
          'copy'   => 'text-brand-600',
        ],
        'current' => [
          'item'   => 'border-primary-300 bg-primary-50',
          'marker' => 'border-primary-600 bg-primary-600 text-white',
          'title'  => 'text-brand-900',
          'copy'   => 'text-brand-600',
        ],
        'upcoming' => [
          'item'   => 'border-brand-200 bg-white',
          'marker' => 'border-brand-300 bg-white text-brand-600',
          'title'  => 'text-brand-700',
          'copy'   => 'text-brand-500',
        ],
      ];
      ?>
      <li class="rounded-lg border p-3 <?= e($tone_map[$step_tone]['item']); ?>">
        <div class="flex items-start gap-3">
          <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full border text-sm font-semibold <?= e($tone_map[$step_tone]['marker']); ?>">
            <?php if ($step_tone === 'completed'): ?>
              <?php icon('check-line', ['icon_size' => '16']); ?>
            <?php else: ?>
              <?= e((string) $step_number); ?>
            <?php endif; ?>
          </span>
          <div class="min-w-0">
            <p class="text-sm font-semibold <?= e($tone_map[$step_tone]['title']); ?>">
              <?= e($step_title); ?>
            </p>
            <?php if ($step_description !== ''): ?>
              <p class="mt-1 text-xs <?= e($tone_map[$step_tone]['copy']); ?>">
                <?= e($step_description); ?>
              </p>
            <?php endif; ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
