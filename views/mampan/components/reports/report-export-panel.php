<?php

declare(strict_types=1);

$report_readiness  = isset($report_readiness) ? trim((string) $report_readiness) : '-';
$included_sections = isset($included_sections) && is_array($included_sections) ? $included_sections : [];
$missing_sections  = isset($missing_sections) && is_array($missing_sections) ? $missing_sections : [];
$export_actions    = isset($export_actions) && is_array($export_actions) ? $export_actions : [];
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="report-export-panel-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="report-export-panel-heading" class="text-lg font-semibold text-brand-900">Export Panel</h2>
  </header>

  <div class="mt-4 rounded-md border border-brand-200 bg-brand-50 p-3">
    <p class="text-xs uppercase tracking-wide text-brand-500">Report Readiness</p>
    <p class="mt-1 font-medium text-brand-900"><?= e($report_readiness); ?></p>
  </div>

  <div class="mt-4 grid gap-4 sm:grid-cols-2">
    <article>
      <h3 class="text-sm font-semibold text-brand-900">Included Sections</h3>
      <ul class="mt-2 space-y-1 text-sm text-brand-700">
        <?php foreach ($included_sections as $included_section): ?>
          <li><?= e('• ' . (string) $included_section); ?></li>
        <?php endforeach; ?>
      </ul>
    </article>
    <article>
      <h3 class="text-sm font-semibold text-brand-900">Missing Sections</h3>
      <ul class="mt-2 space-y-1 text-sm text-brand-700">
        <?php if ($missing_sections === []): ?>
          <li>• None</li>
        <?php else: ?>
          <?php foreach ($missing_sections as $missing_section): ?>
            <li><?= e('• ' . (string) $missing_section); ?></li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </article>
  </div>

  <div class="mt-4 border-t border-brand-200 pt-4">
    <p class="text-xs uppercase tracking-wide text-brand-500">Export Options</p>
    <div class="mt-2 flex flex-wrap gap-2">
      <?php foreach ($export_actions as $export_action): ?>
        <?php
        $label = isset($export_action['label']) ? trim((string) $export_action['label']) : '';
        $href  = isset($export_action['href']) ? trim((string) $export_action['href']) : '#';

        if ($label === '') {
          continue;
        }
        ?>
        <?php component('button', ['label' => $label, 'href' => $href, 'size' => 'sm', 'variant' => 'default']); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
