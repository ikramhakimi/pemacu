<?php

declare(strict_types=1);

layout('mampan/partials/dashboard-start', [
  'page_title'            => isset($page_title) ? (string) $page_title : 'Dashboard',
  'page_current'          => isset($page_current) ? (string) $page_current : 'dashboard',
  'dashboard_no_sidebar'  => isset($dashboard_no_sidebar) ? (bool) $dashboard_no_sidebar : false,
  'dashboard_sidebar'     => isset($dashboard_sidebar) && is_array($dashboard_sidebar) ? $dashboard_sidebar : dashboard_links(),
  'dashboard_content_max' => isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl md:px-6',
]);
