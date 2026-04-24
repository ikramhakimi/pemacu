<?php

declare(strict_types=1);

$resolved_page_title   = isset($page_title) ? (string) $page_title : 'Canvas';
$resolved_page_current = isset($page_current) ? (string) $page_current : '';
$canvas_primary        = isset($canvas_primary) ? (string) $canvas_primary : 'components';
$canvas_links          = isset($canvas_links) && is_array($canvas_links)
  ? $canvas_links
  : canvas_links($canvas_primary);
$canvas_active_link    = isset($canvas_active_link) ? (string) $canvas_active_link : '';
$canvas_include_gridjs = isset($canvas_include_gridjs) ? (bool) $canvas_include_gridjs : false;
$app_css_path          = __DIR__ . '/../../../assets/build/app.css';
$app_css_href          = path('/assets/build/app.css');
$app_css_version       = is_file($app_css_path) ? (string) filemtime($app_css_path) : '';
$app_css_url           = $app_css_version !== '' ? $app_css_href . '?v=' . $app_css_version : $app_css_href;
$resource_page_links   = [
  '/canvas/resources/avatars' => 'Avatars',
  '/canvas/resources/icons'   => 'Icons',
  '/canvas/components/icons'  => 'Icons',
];
$breadcrumb_items      = [
  ['label' => 'Canvas', 'href' => path('/canvas')],
];
$resource_label = $resource_page_links[$canvas_active_link] ?? '';

if ($resource_label !== '') {
  $breadcrumb_items[] = ['label' => 'Resources', 'href' => path('/canvas')];
  $breadcrumb_items[] = ['label' => $resource_label, 'current' => true];
} elseif ($canvas_primary === 'components') {
  $components_href = path('/canvas/components');
  $current_label   = $resolved_page_title;

  foreach ($canvas_links as $link) {
    $link_href  = isset($link['href']) ? (string) $link['href'] : '';
    $link_label = isset($link['label']) ? trim((string) $link['label']) : '';

    if ($link_href === $canvas_active_link && $link_label !== '') {
      $current_label = $link_label;
      break;
    }
  }

  $breadcrumb_items[] = ['label' => 'Components', 'href' => $components_href];

  if ($canvas_active_link !== '' && $canvas_active_link !== '/canvas/components') {
    $breadcrumb_items[] = ['label' => $current_label, 'current' => true];
  } else {
    $breadcrumb_items[1] = ['label' => 'Components', 'current' => true];
  }
} elseif ($canvas_primary === 'patterns') {
  $breadcrumb_items[] = ['label' => 'UI Patterns', 'current' => true];
} else {
  $breadcrumb_items[] = ['label' => $resolved_page_title, 'current' => true];
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($resolved_page_title); ?> | Booking Pro</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  <style>
    .font-mono { font-family: "JetBrains Mono", monospace !important; font-size: 90%; }
  </style>
  <link rel="stylesheet" href="<?= e($app_css_url); ?>">
</head>
<body class="bg-brand-100 text-[14px] text-brand-700 font-sans leading-relaxed" style="letter-spacing: -1%;">
  <main id="root">
    <div class="canvas-side fixed inset-y-0 left-0 z-30 w-[280px] overflow-y-auto border-r border-brand-200 bg-brand-100" aria-label="Canvas navigation">
      <?php component('canvas/sidebar', [
        'canvas_primary'     => $canvas_primary,
        'canvas_active_link' => $canvas_active_link,
      ]); ?>
    </div>

    <div class="canvas-main lg:pl-[280px]">
      <div class="canvas-breadcrumb px-6 py-4 border-b border-brand-200">
        <?php component('breadcrumb', [
          'items' => $breadcrumb_items,
          'separator' => 'chevron',
        ]); ?>
      </div>
      <div class="canvas-container">
