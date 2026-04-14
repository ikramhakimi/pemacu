<?php

declare(strict_types=1);

$resolved_page_title   = isset($page_title) ? (string) $page_title : 'Dashboard';
$resolved_page_current = isset($page_current) ? (string) $page_current : 'dashboard';
$dashboard_content_max = isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl';
$dashboard_no_sidebar  = isset($dashboard_no_sidebar) ? (bool) $dashboard_no_sidebar : false;
$dashboard_sidebar     = isset($dashboard_sidebar) && is_array($dashboard_sidebar)
  ? $dashboard_sidebar
  : dashboard_links();
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
    <div class="<?= e($dashboard_no_sidebar ? 'w-full min-h-screen bg-brand-100' : 'grid w-full min-h-screen gap-6 bg-brand-100 lg:grid-cols-[240px_minmax(0,1fr)]'); ?>">
      <?php if (!$dashboard_no_sidebar): ?>
        <aside class="app-sidebar bg-brand-900 py-4 px-2 min-h-screen relative overflow-y-auto lg:self-start" aria-label="Dashboard navigation">
          <div class="">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-brand-500">Dashboard</h2>
            <ul class="font-medium mt-3">
              <?php foreach ($dashboard_sidebar as $item): ?>
                <?php
                $item_label = isset($item['label']) ? (string) $item['label'] : '';
                $item_href  = isset($item['href']) ? (string) $item['href'] : '#';
                $item_icon  = isset($item['icon_name']) ? (string) $item['icon_name'] : 'arrow-right-s-line';

                if ($item_label === '') {
                  continue;
                }
                ?>
                <li>
                  <a
                    class="flex items-center gap-2 rounded-md px-3 py-2 text-brand-200 hover:bg-brand-800 hover:text-white"
                    href="<?= e($item_href); ?>"
                  >
                    <?php icon($item_icon, ['icon_size' => '20', 'icon_class' => 'text-brand-400']); ?>
                    <span><?= e($item_label); ?></span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </aside>
      <?php endif; ?>

      <div class="app-content pt-10 pb-20">
        <?php if ($dashboard_no_sidebar): ?>
          <div class="px-4">
        <?php else: ?>
          <div class="<?php container($dashboard_content_max); ?>">
        <?php endif; ?>
