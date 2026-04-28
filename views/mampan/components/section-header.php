<?php

declare(strict_types=1);

/*
Component: Mampan Section Header
Purpose: Render a reusable section header from API payload metadata.
Data Contract:
- $section_header['title'] (string)
- $section_header['description'] (string)
- $section_header['heading_id'] (string, optional)
- $section_header['class_name'] (string, optional)
*/

$section_header_data = isset($section_header) && is_array($section_header) ? $section_header : [];

$title = isset($section_header_data['title']) ? trim((string) $section_header_data['title']) : '';
if ($title === '') {
  $title = 'Section';
}

$description = isset($section_header_data['description']) ? trim((string) $section_header_data['description']) : '';
$heading_id = isset($section_header_data['heading_id']) ? trim((string) $section_header_data['heading_id']) : 'section-heading';
$class_name = isset($section_header_data['class_name']) ? trim((string) $section_header_data['class_name']) : '';

if ($heading_id === '') {
  $heading_id = 'section-heading';
}

$container_class = 'section-header';

if ($class_name !== '') {
  $container_class .= ' ' . $class_name;
}
?>
<div class="<?= e($container_class); ?>">
  <h2 id="<?= e($heading_id); ?>" class="section-header__title text-3xl font-semibold text-brand-900"><?= e($title); ?></h2>
  <?php if ($description !== ''): ?>
    <p class="section-header__brief mt-2 text-base"><?= e($description); ?></p>
  <?php endif; ?>
</div>
