<?php
declare(strict_types=1);

$resolved_aspect_ratio = isset($aspect_ratio) ? trim((string) $aspect_ratio) : '';
$resolved_background   = isset($background_class) ? trim((string) $background_class) : '';
$resolved_icon_name    = isset($icon_name) ? trim((string) $icon_name) : '';
$resolved_icon_size    = isset($icon_size) ? trim((string) $icon_size) : '';
$resolved_icon_color   = isset($icon_color) ? trim((string) $icon_color) : '';

if ($resolved_aspect_ratio === '' && isset($data['aspect-ratio'])) {
  $resolved_aspect_ratio = trim((string) $data['aspect-ratio']);
}

if ($resolved_background === '' && isset($data['background-class'])) {
  $resolved_background = trim((string) $data['background-class']);
}

if ($resolved_icon_name === '' && isset($data['icon-name'])) {
  $resolved_icon_name = trim((string) $data['icon-name']);
}

if ($resolved_icon_size === '' && isset($data['icon-size'])) {
  $resolved_icon_size = trim((string) $data['icon-size']);
}

if ($resolved_icon_color === '' && isset($data['icon-color'])) {
  $resolved_icon_color = trim((string) $data['icon-color']);
}

if ($resolved_aspect_ratio === '') {
  $resolved_aspect_ratio = 'aspect-[5/4]';
}

if ($resolved_background === '') {
  $resolved_background = 'bg-brand-300';
}

if ($resolved_icon_name === '') {
  $resolved_icon_name = 'image-2-line';
}

if ($resolved_icon_size === '') {
  $resolved_icon_size = '24';
}

if ($resolved_icon_color === '') {
  $resolved_icon_color = 'text-brand-500';
}

$container_classes = trim($resolved_aspect_ratio . ' ' . $resolved_background . ' flex items-center justify-center');
?>
<div class="<?= e($container_classes); ?>">
  <?php icon($resolved_icon_name, ['icon_size' => $resolved_icon_size, 'icon_class' => $resolved_icon_color]); ?>
</div>
