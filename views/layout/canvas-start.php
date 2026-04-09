<?php

declare(strict_types=1);

$resolved_page_title   = isset($page_title) ? (string) $page_title : 'Canvas';
$resolved_page_current = isset($page_current) ? (string) $page_current : '';
$canvas_primary        = isset($canvas_primary) ? (string) $canvas_primary : 'components';
$canvas_links          = isset($canvas_links) && is_array($canvas_links)
  ? $canvas_links
  : canvas_links($canvas_primary);
$canvas_active_link    = isset($canvas_active_link) ? (string) $canvas_active_link : '';
$canvas_content_max    = isset($canvas_content_max) ? (string) $canvas_content_max : 'max-w-5xl';

layout('layout-start', [
  'page_title'   => $resolved_page_title,
  'page_current' => $resolved_page_current,
  'hide_nav'     => true,
]);
?>
<div class="grid w-full min-h-screen gap-6 bg-brand-100 lg:grid-cols-[240px_minmax(0,1fr)]">
  <aside class="ui-sidebar lg:self-start p-4" aria-label="Canvas documentation navigation">
    <?php
    $sidebar_path = __DIR__ . '/../partials/canvas/sidebar.php';

    if (!is_file($sidebar_path)) {
      throw new RuntimeException('Canvas sidebar partial not found.');
    }

    require $sidebar_path;
    ?>
  </aside>

  <div class="ui-content bg-white pb-96 p-10">
    <div class="w-full <?= e($canvas_content_max); ?> space-y-8">
