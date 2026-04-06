<?php

declare(strict_types=1);

$section_header_id          = isset($section_header_id) ? trim((string) $section_header_id) : '';
$section_header_eyebrow     = isset($section_header_eyebrow) ? trim((string) $section_header_eyebrow) : '';
$section_header_title       = isset($section_header_title) ? trim((string) $section_header_title) : '';
$section_header_description = isset($section_header_description) ? trim((string) $section_header_description) : '';
?>
<header class="ui-kit-section-header space-y-2">
  <?php if ($section_header_eyebrow !== ''): ?>
    <p class="ui-kit-section-header__eyebrow text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">
      <?= e($section_header_eyebrow); ?>
    </p>
  <?php endif; ?>

  <?php if ($section_header_title !== ''): ?>
    <h2
      <?php if ($section_header_id !== ''): ?>id="<?= e($section_header_id); ?>"<?php endif; ?>
      class="ui-kit-section-header__title text-2xl font-semibold text-brand-900"
    >
      <?= e($section_header_title); ?>
    </h2>
  <?php endif; ?>

  <?php if ($section_header_description !== ''): ?>
    <p class="ui-kit-section-header__description max-w-3xl text-sm leading-6 text-brand-600">
      <?= e($section_header_description); ?>
    </p>
  <?php endif; ?>
</header>
