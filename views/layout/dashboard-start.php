<?php

declare(strict_types=1);

$resolved_page_title   = isset($page_title) ? (string) $page_title : 'Dashboard';
$resolved_page_current = isset($page_current) ? (string) $page_current : 'dashboard';
$dashboard_content_max = isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl';
$dashboard_sidebar     = isset($dashboard_sidebar) && is_array($dashboard_sidebar)
  ? $dashboard_sidebar
  : dashboard_links();

layout('layout-start', [
  'page_title'   => $resolved_page_title,
  'page_current' => $resolved_page_current,
  'hide_nav'     => true,
]);
?>
<div class="grid w-full min-h-screen gap-6 bg-brand-100 lg:grid-cols-[240px_minmax(0,1fr)]">
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

  <div class="app-content p-10 pb-20">
    <div class="<?php container() ?>">
