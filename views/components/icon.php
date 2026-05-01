<?php
declare(strict_types=1);

/**
 * Component: icon
 * Purpose: Render one Remixicon SVG by name with size and Tailwind color support.
 * Anatomy:
 * - svg.icon.icon--{icon_name}.size-*
 * Data Contract:
 * - `icon_name` (string, required): Remixicon file name without `.svg` (e.g. `search-line`).
 * - `icon_size` (string, optional): one of 12, 16, 20, 24, 32, 40. Default: 24.
 * - `icon_class` (string, optional): additional classes (e.g. Tailwind `text-*`).
 * - SVG source is auto-loaded from `node_modules/remixicon/icons` (demo mode).
 */

$resolved_icon_name  = isset($icon_name) ? strtolower(trim((string) $icon_name)) : '';
$resolved_icon_size  = isset($icon_size) ? (string) $icon_size : '24';
$resolved_icon_class = isset($icon_class) ? trim((string) $icon_class) : '';

if ($resolved_icon_name === '') {
  return;
}

$allowed_sizes = ['12', '16', '20', '24', '32', '40'];
$size_class_map = [
  '12' => 'size-3',
  '16' => 'size-4',
  '20' => 'size-5',
  '24' => 'size-6',
  '32' => 'size-8',
  '40' => 'size-10',
];

if (!in_array($resolved_icon_size, $allowed_sizes, true)) {
  $resolved_icon_size = '24';
}

$icon_name_class = preg_replace('/[^a-z0-9-]+/', '-', $resolved_icon_name);
$icon_name_class = trim((string) $icon_name_class, '-');

if ($icon_name_class === '') {
  return;
}

$icons_root = dirname(__DIR__, 2) . '/node_modules/remixicon/icons';

if (!is_dir($icons_root)) {
  return;
}

$icon_candidates = glob($icons_root . '/*/' . $resolved_icon_name . '.svg');

if (!is_array($icon_candidates) || $icon_candidates === []) {
  return;
}

$svg_path = $icon_candidates[0];
$svg_raw  = is_file($svg_path) ? file_get_contents($svg_path) : false;

if ($svg_raw === false) {
  return;
}

$svg_view_box = '0 0 24 24';

if (preg_match('/viewBox="([^"]+)"/i', $svg_raw, $view_box_matches) === 1) {
  $svg_view_box = trim($view_box_matches[1]);
}

$svg_content = '';

if (preg_match('/<svg\b[^>]*>(.*)<\/svg>/is', $svg_raw, $content_matches) === 1) {
  $svg_content = trim($content_matches[1]);
}

if ($svg_content === '') {
  return;
}

$classes = [
  'icon',
  'icon--' . $icon_name_class,
  $size_class_map[$resolved_icon_size],
];

if ($resolved_icon_class !== '') {
  $classes[] = $resolved_icon_class;
}

$icon_class_attribute = implode(' ', array_filter($classes));
?>
<svg class="<?= e($icon_class_attribute); ?>" viewBox="<?= e($svg_view_box); ?>" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
  <?= $svg_content; ?>
</svg>
