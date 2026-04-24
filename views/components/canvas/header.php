<?php

declare(strict_types=1);

/*
Component: Canvas Header
Purpose: Renders a reusable, API-driven page header for Canvas documentation pages.
Anatomy:
- .canvas-header
  - .canvas-header__inner
    - .canvas-header__title
    - .canvas-header__subtitle (optional)
Data Contract:
- $canvas_header['title']            : string
- $canvas_header['subtitle']         : string (optional)
- $canvas_header['wrapper_class']    : string (optional)
- $canvas_header['inner_class']      : string (optional)
- $canvas_header['title_class']      : string (optional)
- $canvas_header['subtitle_class']   : string (optional)
- $canvas_header['subtitle_max_w']   : string (optional)
*/

$canvas_header = isset($canvas_header) && is_array($canvas_header) ? $canvas_header : [];

$canvas_title            = isset($canvas_header['title'])
  ? trim((string) $canvas_header['title'])
  : (isset($canvas_header['header_title']) ? trim((string) $canvas_header['header_title']) : '');
$canvas_subtitle         = isset($canvas_header['subtitle'])
  ? trim((string) $canvas_header['subtitle'])
  : (isset($canvas_header['header_subtitle']) ? trim((string) $canvas_header['header_subtitle']) : '');
$canvas_wrapper_class    = isset($canvas_header['wrapper_class'])
  ? trim((string) $canvas_header['wrapper_class'])
  : (isset($canvas_header['header_wrapper_class']) ? trim((string) $canvas_header['header_wrapper_class']) : 'canvas-header border-b border-brand-200 p-6');
$canvas_inner_class      = isset($canvas_header['inner_class'])
  ? trim((string) $canvas_header['inner_class'])
  : (isset($canvas_header['header_container_class']) ? trim((string) $canvas_header['header_container_class']) : 'canvas-header__inner');
$canvas_title_class      = isset($canvas_header['title_class'])
  ? trim((string) $canvas_header['title_class'])
  : (isset($canvas_header['header_title_class']) ? trim((string) $canvas_header['header_title_class']) : 'canvas-header__title text-3xl font-semibold leading-none text-brand-900');
$canvas_subtitle_class   = isset($canvas_header['subtitle_class'])
  ? trim((string) $canvas_header['subtitle_class'])
  : (isset($canvas_header['header_subtitle_class']) ? trim((string) $canvas_header['header_subtitle_class']) : 'canvas-header__subtitle mt-4  text-brand-600');
$canvas_subtitle_max_w   = isset($canvas_header['subtitle_max_w'])
  ? trim((string) $canvas_header['subtitle_max_w'])
  : (isset($canvas_header['header_subtitle_max_w']) ? trim((string) $canvas_header['header_subtitle_max_w']) : 'max-w-2xl');

if ($canvas_wrapper_class === '') {
  $canvas_wrapper_class = 'canvas-header border-b border-brand-200 p-6';
}

if ($canvas_inner_class === '') {
  $canvas_inner_class = 'canvas-header__inner';
}

if ($canvas_title_class === '') {
  $canvas_title_class = 'canvas-header__title text-3xl font-semibold leading-none text-brand-900';
}

if ($canvas_subtitle_class === '') {
  $canvas_subtitle_class = 'canvas-header__subtitle mt-4  text-brand-600';
}

if ($canvas_subtitle_max_w === '') {
  $canvas_subtitle_max_w = 'max-w-2xl';
}
$canvas_subtitle_classes = trim($canvas_subtitle_class . ' ' . $canvas_subtitle_max_w);

if ($canvas_title === '') {
  return;
}
?>
<header class="<?= e($canvas_wrapper_class); ?>">
  <div class="<?= e($canvas_inner_class); ?>">
    <h1 class="<?= e($canvas_title_class); ?>"><?= e($canvas_title); ?></h1>
    <?php if ($canvas_subtitle !== ''): ?>
      <p class="<?= e($canvas_subtitle_classes); ?>"><?= e($canvas_subtitle); ?></p>
    <?php endif; ?>
  </div>
</header>
