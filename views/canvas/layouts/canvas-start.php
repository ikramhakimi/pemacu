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
$app_css_path          = __DIR__ . '/../../../assets/build/app.css';
$app_css_href          = path('/assets/build/app.css');
$app_css_version       = is_file($app_css_path) ? (string) filemtime($app_css_path) : '';
$app_css_url           = $app_css_version !== '' ? $app_css_href . '?v=' . $app_css_version : $app_css_href;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($resolved_page_title); ?> | Booking Pro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= e($app_css_url); ?>">
</head>
<body class="bg-brand-100 text-[14px] text-brand-700 font-sans leading-relaxed" style="letter-spacing: -1%;">
  <main id="root">
    <div class="grid w-full min-h-screen gap-6 bg-brand-100 lg:grid-cols-[240px_minmax(0,1fr)]">
      <aside class="ui-sidebar lg:self-start p-4" aria-label="Canvas documentation navigation">
        <?php
        $sidebar_path = __DIR__ . '/../partials/sidebar.php';

        if (!is_file($sidebar_path)) {
          throw new RuntimeException('Canvas sidebar partial not found.');
        }

        require $sidebar_path;
        ?>
      </aside>

      <div class="ui-content bg-white pb-96 p-10">
        <div class="w-full <?= e($canvas_content_max); ?> space-y-8">
