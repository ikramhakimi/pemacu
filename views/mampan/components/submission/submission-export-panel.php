<?php

declare(strict_types=1);

$package_contents   = isset($package_contents) && is_array($package_contents) ? $package_contents : [];
$export_options     = isset($export_options) && is_array($export_options) ? $export_options : [];
$validation_results = isset($validation_results) && is_array($validation_results) ? $validation_results : [];

$content_status_tone_map = [
  'Included'      => 'positive',
  'Partial'       => 'warning',
  'Missing'       => 'negative',
  'Not Applicable'=> 'neutral',
];

$validation_tone_map = [
  'Passed'  => 'positive',
  'Warning' => 'warning',
  'Error'   => 'negative',
];
?>
<section class="space-y-5" aria-label="Submission export configuration panels">
  <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="submission-export-contents-heading">
    <header class="border-b border-brand-200 pb-4">
      <h2 id="submission-export-contents-heading" class="text-lg font-semibold text-brand-900">Export Package Contents</h2>
      <p class="mt-1 text-sm text-brand-600">Final package sections included for GBI Completion and Verification submission.</p>
    </header>

    <div class="mt-4 overflow-x-auto">
      <?php
      $content_columns = [
        ['label' => 'Section', 'key' => 'section'],
        ['label' => 'Include', 'key' => 'include'],
        ['label' => 'Status', 'key' => 'status'],
        ['label' => 'File Count', 'key' => 'file_count'],
        ['label' => 'Last Updated', 'key' => 'last_updated'],
      ];
      $content_rows = [];

      foreach ($package_contents as $package_content) {
        $label       = isset($package_content['label']) ? trim((string) $package_content['label']) : '-';
        $included    = isset($package_content['included']) ? (bool) $package_content['included'] : false;
        $status      = isset($package_content['status']) ? trim((string) $package_content['status']) : 'Missing';
        $file_count  = isset($package_content['file_count']) ? trim((string) $package_content['file_count']) : '0';
        $last_updated = isset($package_content['last_updated']) ? trim((string) $package_content['last_updated']) : '-';
        $status_tone = isset($content_status_tone_map[$status]) ? $content_status_tone_map[$status] : 'neutral';

        ob_start();
        ?>
        <span class="inline-flex h-5 w-10 items-center rounded-full border border-brand-300 <?= $included ? 'justify-end bg-positive-100' : 'justify-start bg-brand-100'; ?> px-1">
          <span class="h-3.5 w-3.5 rounded-full <?= $included ? 'bg-positive-600' : 'bg-brand-400'; ?>"></span>
        </span>
        <?php
        $toggle_html = (string) ob_get_clean();

        ob_start();
        component('badge', ['items' => [['label' => $status, 'tone' => $status_tone]]]);
        $status_html = (string) ob_get_clean();

        $content_rows[] = [
          'section'      => $label,
          'include'      => ['content' => $toggle_html, 'is_html' => true],
          'status'       => ['content' => $status_html, 'is_html' => true],
          'file_count'   => $file_count,
          'last_updated' => $last_updated,
        ];
      }

      component('table', [
        'columns'       => $content_columns,
        'rows'          => $content_rows,
        'appearance'    => 'basic',
        'caption'       => 'Export package contents table',
        'class_name'    => 'min-w-[980px]',
        'empty_title'   => 'No package sections configured',
        'empty_message' => 'Add package sections to prepare export.',
      ]);
      ?>
    </div>
  </section>

  <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="submission-export-options-heading">
    <header class="border-b border-brand-200 pb-4">
      <h2 id="submission-export-options-heading" class="text-lg font-semibold text-brand-900">Export Options</h2>
    </header>

    <div class="mt-4 grid gap-3 sm:grid-cols-2 xl:grid-cols-3">
      <?php foreach ($export_options as $export_option): ?>
        <?php
        $label       = isset($export_option['label']) ? trim((string) $export_option['label']) : '';
        $description = isset($export_option['description']) ? trim((string) $export_option['description']) : '';
        $href        = isset($export_option['href']) ? trim((string) $export_option['href']) : '#';

        if ($label === '') {
          continue;
        }
        ?>
        <article class="rounded-md border border-brand-200 bg-brand-50 p-3">
          <h3 class="text-sm font-semibold text-brand-900"><?= e($label); ?></h3>
          <?php if ($description !== ''): ?>
            <p class="mt-1 text-xs text-brand-600"><?= e($description); ?></p>
          <?php endif; ?>
          <div class="mt-3">
            <?php component('button', ['label' => 'Prepare Export', 'href' => $href, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']); ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="submission-validation-results-heading">
    <header class="border-b border-brand-200 pb-4">
      <h2 id="submission-validation-results-heading" class="text-lg font-semibold text-brand-900">Package Validation Results</h2>
    </header>

    <div class="mt-4 space-y-3">
      <?php foreach ($validation_results as $validation_result): ?>
        <?php
        $type  = isset($validation_result['type']) ? trim((string) $validation_result['type']) : 'Passed';
        $text  = isset($validation_result['text']) ? trim((string) $validation_result['text']) : '';
        $tone  = isset($validation_tone_map[$type]) ? $validation_tone_map[$type] : 'neutral';

        if ($text === '') {
          continue;
        }
        ?>
        <article class="flex flex-col gap-2 rounded-md border border-brand-200 bg-brand-50 p-3 sm:flex-row sm:items-center sm:justify-between">
          <?php component('badge', ['items' => [['label' => $type, 'tone' => $tone]]]); ?>
          <p class="text-sm text-brand-700 sm:text-right"><?= e($text); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </section>
</section>
