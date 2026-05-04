<?php

declare(strict_types=1);

$resolved_page_title        = isset($page_title) ? (string) $page_title : 'Kuiz';
$dashboard_content_max      = isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl md:px-6';
$app_container_class        = isset($app_container_class) ? trim((string) $app_container_class) : '';
$show_app_nav               = isset($show_app_nav) ? (bool) $show_app_nav : true;
$kuiz_css_path    = __DIR__ . '/../../../assets/build/kuiz.css';
$kuiz_css_href    = path('/assets/build/kuiz.css');
$kuiz_css_version = is_file($kuiz_css_path) ? (string) filemtime($kuiz_css_path) : '';
$kuiz_css_url     = $kuiz_css_version !== '' ? $kuiz_css_href . '?v=' . $kuiz_css_version : $kuiz_css_href;

ob_start();
component('placeholder-image', ['aspect-ratio' => 'h-[40px] w-[120px]']);
$kuiz_nav_brand_logo_html = (string) ob_get_clean();

$kuiz_nav_config = [
  'classes' => [
    'root'  => 'app-nav',
    'inner' => 'max-w-none',
  ],
  'brand' => [
    'label'     => 'Sitespace',
    'href'      => path('/'),
    'logo_html' => $kuiz_nav_brand_logo_html,
  ],
  'menu_items' => [
    ['type' => 'link', 'label' => 'Menu One', 'href' => path('/')],
    ['type' => 'link', 'label' => 'Menu Two', 'href' => path('/about')],
    [
      'type'        => 'dropdown',
      'label'       => 'Dropdown',
      'dropdown_id' => 'kuiz-nav-dropdown',
      'items'       => [
        [
          'label'      => 'Option One',
          'href'       => '#',
          'icon_name'  => 'sparkling-line',
          'icon_size'  => '20',
          'icon_class' => 'text-brand-500',
          'item_class' => 'items-center gap-2',
        ],
        [
          'label'      => 'Option Two',
          'href'       => '#',
          'icon_name'  => 'compass-3-line',
          'icon_size'  => '20',
          'icon_class' => 'text-brand-500',
          'item_class' => 'items-center gap-2',
        ],
        [
          'label'      => 'Option Three',
          'href'       => '#',
          'icon_name'  => 'rocket-2-line',
          'icon_size'  => '20',
          'icon_class' => 'text-brand-500',
          'item_class' => 'items-center gap-2',
        ],
        ['type' => 'divider'],
        ['label' => 'Option Four', 'href' => '#'],
        ['label' => 'Option Five', 'href' => '#'],
      ],
    ],
    ['type' => 'link', 'label' => 'Option', 'href' => path('/contact'), 'class' => 'border-l border-brand-300 pl-4'],
  ],
  'ecommerce_actions' => [
    [
      'href'      => '#',
      'icon_name' => 'notification-3-line',
      'icon_size' => '20',
      'class'     => 'border-brand-300',
      'label'     => 'Notifications',
      'count'     => '2',
    ],
    [
      'href'      => '#',
      'icon_name' => 'bookmark-3-line',
      'icon_size' => '20',
      'class'     => 'border-brand-300',
      'label'     => 'Saved Items',
      'count'     => '5',
    ],
  ],
  'search' => [
    'enabled'     => true,
    'label'       => 'Search records',
    'id'          => 'kuiz-nav-search',
    'name'        => 'search',
    'placeholder' => 'Search records...',
  ],
  'profile' => [
    'name'          => 'Ariq Rahim',
    'dropdown_id'   => 'kuiz-nav-profile',
    'avatar_item'   => [
      'image_src' => path('/assets/images/avatars/avatar-03.jpg'),
      'image_alt' => 'Ariq Rahim',
      'size'      => '32',
      'status'    => 'online',
    ],
    'dropdown_items' => [
      ['label' => 'My Account', 'href' => '#'],
      ['label' => 'Activity', 'href' => '#'],
      ['type' => 'divider'],
      ['label' => 'Sign Out', 'href' => '#'],
    ],
  ],
  'cta_buttons' => [
    ['label' => 'Button', 'variant' => 'primary', 'size' => 'md'],
  ],
  'mobile' => [
    'title'       => 'Workspace',
    'extra_links' => [
      ['label' => 'Notifications', 'href' => '#'],
      ['label' => 'Saved Items', 'href' => '#'],
      ['label' => 'Account', 'href' => '#'],
    ],
  ],
];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($resolved_page_title); ?> | Kuiz</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fragment+Mono:ital@0;1&family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= e($kuiz_css_url); ?>">
  <style>
    .font-core  { font-family: 'Fragment Mono', sans-serif; letter-spacing: -2% !important; word-spacing: -30% !important; }
    .font-alt   { font-family: 'IBM Plex Sans', sans-serif; letter-spacing: -1% !important; word-spacing: 0 !important; }
  </style>
</head>
<body class="dashboard-ui bg-brand-100 text-sm text-brand-700 font-alt leading-5">
  <main id="root">
    <div class="<?= e('w-full min-h-screen'); ?>">
      <?php if ($show_app_nav): ?>
        <?php component('nav', $kuiz_nav_config); ?>
      <?php endif; ?>
      <div class="app-content">
        <?php if ($app_container_class === ''): ?>
          <?php ob_start(); ?>
          <?php container($dashboard_content_max); ?>
          <?php $app_container_class = 'app-container ' . trim((string) ob_get_clean()); ?>
        <?php endif; ?>
        <div class="<?= e($app_container_class); ?>">
