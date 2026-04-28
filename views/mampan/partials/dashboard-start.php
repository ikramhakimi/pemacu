<?php

declare(strict_types=1);

$resolved_page_title   = isset($page_title) ? (string) $page_title : 'Mampan';
$resolved_page_current = isset($page_current) ? (string) $page_current : 'mampan';
$dashboard_content_max = isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl md:px-6';
$dashboard_no_sidebar  = isset($dashboard_no_sidebar) ? (bool) $dashboard_no_sidebar : false;
$dashboard_sidebar     = isset($dashboard_sidebar) && is_array($dashboard_sidebar)
  ? $dashboard_sidebar
  : (
    is_file(__DIR__ . '/menu.php')
      ? require __DIR__ . '/menu.php'
      : dashboard_links()
  );
$request_uri_path      = parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH);
$request_uri_path      = is_string($request_uri_path) && $request_uri_path !== '' ? $request_uri_path : '/';
$app_css_path          = __DIR__ . '/../../../assets/build/app.css';
$app_css_href          = path('/assets/build/app.css');
$app_css_version       = is_file($app_css_path) ? (string) filemtime($app_css_path) : '';
$app_css_url           = $app_css_version !== '' ? $app_css_href . '?v=' . $app_css_version : $app_css_href;
$dashboard_css_path    = __DIR__ . '/../../../assets/build/dashboard.css';
$dashboard_css_href    = path('/assets/build/dashboard.css');
$dashboard_css_version = is_file($dashboard_css_path) ? (string) filemtime($dashboard_css_path) : '';
$dashboard_css_url     = $dashboard_css_version !== '' ? $dashboard_css_href . '?v=' . $dashboard_css_version : $dashboard_css_href;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($resolved_page_title); ?> | Mampan</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= e($app_css_url); ?>">
</head>
<body class="dashboard-ui bg-brand-100 text-[14px] text-brand-700 font-sans leading-relaxed" style="letter-spacing: -1%;">
  <main id="root">
    <div class="<?= e('w-full min-h-screen'); ?>">
      <?php if (!$dashboard_no_sidebar): ?>
        <div
          id="dashboard-sidebar-panel"
          class="app-sidebar fixed inset-y-0 left-0 z-30 w-[240px] -translate-x-full overflow-y-auto border-r border-brand-200 bg-brand-100 px-2 py-5 transition-transform duration-200 ease-out xl:translate-x-0 js-dashboard-sidebar-panel"
          aria-label="Dashboard navigation"
          aria-hidden="true"
        >
          <div class="">
            <h2 class="font-semibold uppercase tracking-wide text-brand-500">Dashboard</h2>
            <ul class="mt-3">
              <?php foreach ($dashboard_sidebar as $item_index => $item): ?>
                <?php
                $section_label = isset($item['section_label']) ? trim((string) $item['section_label']) : '';

                if ($section_label !== ''):
                ?>
                  <li class="pt-4 mt-4 mx-2 pb-2 px-1 text-xs font-medium uppercase tracking-wide text-brand-500 border-t border-brand-200">
                    <?= e($section_label); ?>
                  </li>
                  <?php
                  continue;
                endif;

                $item_label = isset($item['label']) ? (string) $item['label'] : '';
                $item_href  = isset($item['href']) ? (string) $item['href'] : '#';
                $item_icon  = isset($item['icon_name']) ? (string) $item['icon_name'] : 'arrow-right-s-line';
                $item_children = isset($item['children']) && is_array($item['children']) ? $item['children'] : [];
                $item_active_key = isset($item['active_key']) ? trim((string) $item['active_key']) : '';
                $item_is_active = $item_active_key !== '' && $item_active_key === $resolved_page_current;
                $item_has_children = $item_children !== [];
                $item_id_slug = trim((string) preg_replace('/[^a-z0-9]+/i', '-', strtolower($item_label)), '-');
                $item_id_slug = $item_id_slug !== '' ? $item_id_slug : 'menu-' . (string) $item_index;
                $item_submenu_id = 'dashboard-sidebar-submenu-' . $item_id_slug . '-' . (string) $item_index;

                if ($item_label === '') {
                  continue;
                }

                if (!$item_is_active && $item_href !== '#') {
                  $item_is_active = rtrim($item_href, '/') === rtrim($request_uri_path, '/');
                }

                foreach ($item_children as $child_item) {
                  $child_href = isset($child_item['href']) ? (string) $child_item['href'] : '#';
                  if ($child_href === '#') {
                    continue;
                  }

                  if (rtrim($child_href, '/') === rtrim($request_uri_path, '/')) {
                    $item_is_active = true;
                    break;
                  }
                }
                ?>
                <li class="group/sidebar-item js-dashboard-sidebar-item" data-dashboard-sidebar-item="<?= e($item_id_slug); ?>">
                  <a
                    class="font-medium flex items-center gap-3 rounded-md px-3 py-2 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900 js-dashboard-sidebar-parent-link"
                    href="<?= e($item_href); ?>"
                    <?php if ($item_has_children): ?>
                      aria-expanded="<?= e($item_is_active ? 'true' : 'false'); ?>"
                      aria-controls="<?= e($item_submenu_id); ?>"
                      data-dashboard-sidebar-toggle="<?= e($item_submenu_id); ?>"
                    <?php endif; ?>
                  >
                    <?php icon($item_icon, ['icon_size' => '20', 'icon_class' => 'text-brand-400']); ?>
                    <span class="flex-1"><?= e($item_label); ?></span>
                    <?php if ($item_has_children): ?>
                      <?php
                      $chevron_class = 'text-brand-400 transition-all duration-200 lg:opacity-0 lg:group-hover/sidebar-item:opacity-100';
                      if ($item_is_active) {
                        $chevron_class .= ' -rotate-90 lg:opacity-100';
                      }
                      ?>
                      <?php icon('arrow-right-s-line', [
                        'icon_size'  => '20',
                        'icon_class' => trim($chevron_class) . ' js-dashboard-sidebar-chevron',
                      ]); ?>
                    <?php endif; ?>
                  </a>
                  <?php if ($item_has_children): ?>
                    <ul
                      id="<?= e($item_submenu_id); ?>"
                      class="my-1 ml-8 js-dashboard-sidebar-submenu"
                      <?php if (!$item_is_active): ?>hidden<?php endif; ?>
                    >
                      <?php foreach ($item_children as $child_item): ?>
                        <?php
                        $child_label = isset($child_item['label']) ? trim((string) $child_item['label']) : '';
                        $child_href  = isset($child_item['href']) ? (string) $child_item['href'] : '#';

                        if ($child_label === '') {
                          continue;
                        }
                        ?>
                        <li>
                          <a
                            class="block rounded-md px-3 py-1.5 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900 js-dashboard-sidebar-child-link"
                            href="<?= e($child_href); ?>"
                          >
                            <?= e($child_label); ?>
                          </a>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div
          class="fixed inset-0 z-20 hidden bg-brand-900/40 xl:hidden js-dashboard-sidebar-overlay"
          hidden
          aria-hidden="true"
        ></div>
      <?php endif; ?>

      <div class="<?= e($dashboard_no_sidebar ? 'app-content' : 'app-content xl:pl-[240px]'); ?>">
        <?php if (!$dashboard_no_sidebar): ?>
          <div class="px-4 py-3 md:px-6 md:py-4 border-b border-brand-200">
            <button
              type="button"
              class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-md border border-brand-200 bg-white text-brand-700 transition hover:bg-brand-100 hover:text-brand-900 xl:hidden js-dashboard-sidebar-toggle"
              aria-label="Open sidebar"
              aria-controls="dashboard-sidebar-panel"
              aria-expanded="false"
            >
              <?php icon('menu-line', ['icon_size' => '20']); ?>
            </button>
          </div>
        <?php endif; ?>
        <?php if ($dashboard_no_sidebar): ?>
        <div class="app-container">
        <?php else: ?>
        <div class="app-container <?php container($dashboard_content_max); ?>">
        <?php endif; ?>
