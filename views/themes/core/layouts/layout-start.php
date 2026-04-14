<?php

declare(strict_types=1);

$resolved_page_title   = isset($page_title) ? (string) $page_title : 'Booking Pro';
$resolved_page_current = isset($page_current) ? (string) $page_current : '';
$hide_nav              = isset($hide_nav) ? (bool) $hide_nav : false;
$app_css_path          = dirname(__DIR__, 4) . '/assets/build/app.css';
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
  <?php if (!$hide_nav): ?>
    <?php partial('nav'); ?>
  <?php endif; ?>
  
