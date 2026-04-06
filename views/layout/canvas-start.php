<?php

declare(strict_types=1);

$resolved_page_title   = isset($page_title) ? (string) $page_title : 'Canvas';
$resolved_page_current = isset($page_current) ? (string) $page_current : '';
$canvas_primary        = isset($canvas_primary) ? (string) $canvas_primary : 'components';
$canvas_links          = isset($canvas_links) && is_array($canvas_links) ? $canvas_links : [];
$canvas_active_link    = isset($canvas_active_link) ? (string) $canvas_active_link : '';
$canvas_content_max    = isset($canvas_content_max) ? (string) $canvas_content_max : 'max-w-5xl';

layout('layout-start', [
  'page_title'   => $resolved_page_title,
  'page_current' => $resolved_page_current,
  'hide_nav'     => true,
]);
?>
<div class="grid w-full min-h-screen gap-6 bg-brand-200 px-4 py-6 lg:grid-cols-[240px_minmax(0,1fr)] lg:px-6">
  <aside class="ui-sidebar lg:sticky lg:top-24 lg:self-start" aria-label="Canvas documentation navigation">
    <?php
    $sidebar_path = __DIR__ . '/../partials/canvas/sidebar.php';

    if (!is_file($sidebar_path)) {
      throw new RuntimeException('Canvas sidebar partial not found.');
    }

    require $sidebar_path;
    ?>
  </aside>

  <div class="ui-content">
    <div class="w-full <?= e($canvas_content_max); ?> space-y-8">
