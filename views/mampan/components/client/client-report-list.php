<?php

declare(strict_types=1);

$section_title       = isset($section_title) ? trim((string) $section_title) : 'Reports';
$section_description = isset($section_description) ? trim((string) $section_description) : '';
$reports             = isset($reports) && is_array($reports) ? $reports : [];

$status_tone_map = [
  'Ready'       => 'positive',
  'In Progress' => 'warning',
  'Draft'       => 'neutral',
];
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="client-report-list-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="client-report-list-heading" class="text-lg font-semibold text-brand-900"><?= e($section_title); ?></h2>
    <?php if ($section_description !== ''): ?>
      <p class="mt-1 text-sm text-brand-600"><?= e($section_description); ?></p>
    <?php endif; ?>
  </header>

  <div class="mt-4 space-y-3">
    <?php foreach ($reports as $report): ?>
      <?php
      $title          = isset($report['title']) ? trim((string) $report['title']) : '';
      $status         = isset($report['status']) ? trim((string) $report['status']) : 'Draft';
      $last_updated   = isset($report['last_updated']) ? trim((string) $report['last_updated']) : '-';
      $description    = isset($report['description']) ? trim((string) $report['description']) : '';
      $view_label     = isset($report['view_label']) ? trim((string) $report['view_label']) : 'View';
      $view_href      = isset($report['view_href']) ? trim((string) $report['view_href']) : '#';
      $download_label = isset($report['download_label']) ? trim((string) $report['download_label']) : 'Download';
      $download_href  = isset($report['download_href']) ? trim((string) $report['download_href']) : '#';

      if ($title === '') {
        continue;
      }

      $status_tone = isset($status_tone_map[$status]) ? $status_tone_map[$status] : 'neutral';
      ?>
      <article class="rounded-lg border border-brand-200 p-4">
        <div class="flex flex-wrap items-start justify-between gap-3">
          <div>
            <h3 class="text-base font-semibold text-brand-900"><?= e($title); ?></h3>
            <?php if ($description !== ''): ?>
              <p class="mt-1 text-sm text-brand-600"><?= e($description); ?></p>
            <?php endif; ?>
            <p class="mt-2 text-sm text-brand-600">Last updated: <?= e($last_updated); ?></p>
          </div>
          <div><?php component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]); ?></div>
        </div>

        <div class="mt-3 flex flex-wrap items-center gap-2">
          <?php component('button', ['label' => $view_label, 'href' => $view_href, 'size' => 'sm', 'variant' => 'primary']); ?>
          <?php component('button', ['label' => $download_label, 'href' => $download_href, 'size' => 'sm', 'variant' => 'default']); ?>
        </div>
      </article>
    <?php endforeach; ?>

    <?php if ($reports === []): ?>
      <p class="rounded-lg border border-brand-200 bg-brand-50 px-4 py-3 text-sm text-brand-600">No reports available yet.</p>
    <?php endif; ?>
  </div>
</section>
