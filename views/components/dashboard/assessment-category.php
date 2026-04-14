<?php

declare(strict_types=1);

$assessment_category_modifier = isset($assessment_category_modifier)
  ? trim((string) $assessment_category_modifier)
  : 'assessment-category--default';
$assessment_category_id = isset($assessment_category_id)
  ? trim((string) $assessment_category_id)
  : 'assessment-category-heading';
$assessment_category_title = isset($assessment_category_title)
  ? trim((string) $assessment_category_title)
  : 'Assessment Category';
$assessment_category_subtitle = isset($assessment_category_subtitle)
  ? trim((string) $assessment_category_subtitle)
  : '';
$assessment_category_header_icon_name = isset($assessment_category_header_icon_name)
  ? trim((string) $assessment_category_header_icon_name)
  : 'flashlight-line';
$assessment_category_header_score = isset($assessment_category_header_score)
  ? (string) $assessment_category_header_score
  : '0';
$assessment_category_header_max = isset($assessment_category_header_max)
  ? (string) $assessment_category_header_max
  : '0';
$assessment_category_rows_partial = isset($assessment_category_rows_partial)
  ? (string) $assessment_category_rows_partial
  : '';
$assessment_category_total_label = isset($assessment_category_total_label)
  ? trim((string) $assessment_category_total_label)
  : 'Total score';
$assessment_category_meta_html = isset($assessment_category_meta_html)
  ? (string) $assessment_category_meta_html
  : '';

if ($assessment_category_rows_partial === '' || !is_file($assessment_category_rows_partial)) {
  throw new RuntimeException('Assessment category rows partial not found.');
}

$assessment_category_section_class = trim(
  'assessment-category ' .
  $assessment_category_modifier .
  ' bg-brand-900 overflow-hidden mt-10 pb-1 js-assessment-category'
);
?>
<section class="<?php card($assessment_category_section_class); ?>" aria-labelledby="<?= e($assessment_category_id); ?>">
  <header class="assessment-category__header flex items-center p-5 gap-5 text-brand-400">
    <div class="assessment-category__badge flex items-center justify-center rounded-md bg-white text-brand-800">
      <div class="px-4 py-6">
        <?php component('icon', [
          'icon_name'  => $assessment_category_header_icon_name,
          'icon_size'  => '24',
          'icon_class' => 'text-current',
        ]); ?>
      </div>
      <div class="text-brand-600 pr-3 text-center">
        <div data-assessment-header-score><?= e($assessment_category_header_score); ?></div>
        <div class="mt-1 pt-1 border-t border-brand-400" data-assessment-header-max><?= e($assessment_category_header_max); ?></div>
      </div>
    </div>
    <div>
      <h2 id="<?= e($assessment_category_id); ?>" class="assessment-category__title text-2xl text-white"><?= e($assessment_category_title); ?></h2>
      <?php if ($assessment_category_subtitle !== ''): ?>
        <div class="assessment-category__subtitle mt-1"><?= e($assessment_category_subtitle); ?></div>
      <?php endif; ?>
    </div>
  </header>

  <article class="assessment-category__content bg-white mx-1 rounded-md overflow-hidden">
    <table class="assessment-category__table assessment-table w-full border-collapse mb-5 border-b js-assessment-table">
      <tbody>
        <?php require $assessment_category_rows_partial; ?>
      </tbody>
      <tfoot>
        <tr class="assessment-table__total-row">
          <td colspan="3" class="p-0 border-0"></td>
          <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
            <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-table-total>0 <span class="font-normal text-brand-500">/ 0</span></div>
          </td>
          <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
            <div class="min-h-[var(--ui-h-md)] flex items-center justify-start"><?= e($assessment_category_total_label); ?></div>
          </td>
        </tr>
      </tfoot>
    </table>

    <?php if ($assessment_category_meta_html !== ''): ?>
      <div class="assessment-category__meta p-5 text-right"><?= $assessment_category_meta_html; ?></div>
    <?php endif; ?>
  </article>
</section>
