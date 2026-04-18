<?php

declare(strict_types=1);

$assessment_bar_code = isset($assessment_bar_code)
  ? trim((string) $assessment_bar_code)
  : 'EE1';
$assessment_bar_item_key = isset($assessment_bar_item_key)
  ? trim((string) $assessment_bar_item_key)
  : '';
$assessment_bar_title = isset($assessment_bar_title)
  ? trim((string) $assessment_bar_title)
  : 'Assessment Item';
$assessment_bar_status = isset($assessment_bar_status)
  ? trim((string) $assessment_bar_status)
  : 'not_started';
$assessment_bar_score = isset($assessment_bar_score)
  ? trim((string) $assessment_bar_score)
  : '';
$assessment_bar_files = isset($assessment_bar_files) && is_numeric($assessment_bar_files)
  ? (int) $assessment_bar_files
  : 0;
$assessment_bar_has_remarks = isset($assessment_bar_has_remarks)
  ? (bool) $assessment_bar_has_remarks
  : false;
$assessment_bar_class = isset($assessment_bar_class)
  ? trim((string) $assessment_bar_class)
  : '';

$assessment_bar_file_label = '';
if ($assessment_bar_files > 0) {
  $assessment_bar_file_label = $assessment_bar_files === 1
    ? '1 file attached'
    : (string) $assessment_bar_files . ' files attached';
}

$assessment_bar_base_class = 'assessment-bar rounded-lg border border-brand-200 bg-white transition hover:border-brand-400 hover:shadow-sm ring-0 ring-transparent hover:ring-2 hover:ring-brand-200';
$assessment_bar_container_class = trim($assessment_bar_base_class . ' ' . $assessment_bar_class);
$assessment_bar_is_interactive = $assessment_bar_item_key !== '';
?>
<article
  class="<?= e($assessment_bar_container_class); ?><?= $assessment_bar_is_interactive ? ' cursor-pointer js-assessment-form-drawer-open' : ''; ?>"
  <?php if ($assessment_bar_is_interactive): ?>
    role="button"
    tabindex="0"
    aria-haspopup="dialog"
    aria-label="View details for <?= e($assessment_bar_code); ?> <?= e($assessment_bar_title); ?>"
    data-drawer-open
    data-drawer-target="assessment-form-item-drawer"
    data-assessment-item-key="<?= e($assessment_bar_item_key); ?>"
  <?php endif; ?>
>
  <div class="flex flex-wrap items-center gap-2 pl-3 py-2 pr-2">
    <?php component('dashboard/assessment-status', [
      'assessment_status' => $assessment_bar_status,
      'assessment_status_class' => 'assessment-bar__status',
    ]); ?>

    <span class="assessment-bar__code font-mono inline-flex items-center rounded-md border border-brand-300 bg-brand-50 px-2 py-1 text-xs font-semibold uppercase tracking-wide text-brand-700">
      <?= e($assessment_bar_code); ?>
    </span>

    <h3 class="assessment-bar__title text-sm text-brand-900">
      <?= e($assessment_bar_title); ?>
      <?php if ($assessment_bar_score !== ''): ?>
        <span class="assessment-bar__score font-mono text-[11px] text-brand-500 ml-2"><?= e($assessment_bar_score); ?></span>
      <?php endif; ?>
    </h3>

    <?php if ($assessment_bar_file_label !== '' || $assessment_bar_has_remarks): ?>
      <div class="assessment-bar__meta ml-auto flex items-center gap-3">
        <div class="assessment-bar__attachments">
          <?php if ($assessment_bar_file_label !== ''): ?>
            <span class="assessment-bar__files"><?= e($assessment_bar_file_label); ?></span>
          <?php endif; ?>

          <?php if ($assessment_bar_file_label !== '' && $assessment_bar_has_remarks): ?>
            <span class="text-brand-400 mx-1 font-medium">&middot;</span>
          <?php endif; ?>

          <?php if ($assessment_bar_has_remarks): ?>
            <span class="assessment-bar__remarks">Remarks</span>
          <?php endif; ?>
        </div>
        <?php component('icon', [
          'icon_name'   => 'arrow-right-s-line',
          'icon_size'   => '24',
          'icon_class'  => 'assessment-bar__chevron text-current opacity-60 inline-block transition-transform duration-200 ml-auto',
          'icon_stroke' => '1',
        ]); ?>
      </div>
    <?php else: ?>
      <?php component('icon', [
        'icon_name'   => 'arrow-right-s-line',
        'icon_size'   => '24',
        'icon_class'  => 'assessment-bar__chevron text-current opacity-60 inline-block transition-transform duration-200 ml-auto',
        'icon_stroke' => '1',
      ]); ?>
    <?php endif; ?>
  </div>
</article>
