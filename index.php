<?php

if (!defined('BASE_PATH')) {
  $script_name = $_SERVER['SCRIPT_NAME'] ?? '/';
  $script_dir  = dirname($script_name);
  $resolved_base_path = $script_dir === '/' || $script_dir === '.' ? '' : rtrim($script_dir, '/');

  if ($resolved_base_path === '') {
    $request_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $request_path = is_string($request_path) ? $request_path : '/';
    $project_slug = basename(__DIR__);

    if ($project_slug !== '' && $project_slug !== '.' && $project_slug !== DIRECTORY_SEPARATOR) {
      $project_prefix = '/' . trim($project_slug, '/');
      if ($request_path === $project_prefix || strpos($request_path, $project_prefix . '/') === 0) {
        $resolved_base_path = $project_prefix;
      }
    }
  }

  define('BASE_PATH', $resolved_base_path);
}

error_reporting(E_ALL);
$debug_mode = getenv('APP_DEBUG') === '1';
ini_set('display_errors', $debug_mode ? '1' : '0');
ini_set('log_errors', '1');

require_once __DIR__ . '/include/functions.php';

$request_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$request_path = is_string($request_path) ? $request_path : '/';

$base_path = defined('BASE_PATH') ? rtrim(BASE_PATH, '/') : '';
if ($base_path !== '' && $base_path !== '/' && strpos($request_path, $base_path . '/') === 0) {
  $request_path = substr($request_path, strlen($base_path));
} elseif ($base_path !== '' && $request_path === $base_path) {
  $request_path = '/';
}

$uri        = trim($request_path, '/');
$query_page = isset($_GET['page']) ? trim((string) $_GET['page']) : '';

if ($query_page !== '') {
  $uri = trim($query_page, '/');
}

if ($uri === '' || strtolower($uri) === 'index.php') {
  $uri = 'home';
}

$page           = '';
$themes_root    = realpath(__DIR__ . '/views/themes');
$pages_root     = realpath(__DIR__ . '/views/themes/core');
$canvas_root    = realpath(__DIR__ . '/views/canvas');
$dashboard_root = realpath(__DIR__ . '/views/dashboard');
$kuiz_root      = realpath(__DIR__ . '/views/kuiz');
$mampan_root    = realpath(__DIR__ . '/views/mampan');
$is_valid_route = preg_match('/^[a-z0-9\/-]+$/i', $uri) === 1 && strpos($uri, '..') === false;

$active_theme = 'core';
$theme_uri    = $uri;

if ($is_valid_route && $themes_root !== false) {
  $uri_segments = $uri === '' ? [] : explode('/', $uri);
  $theme_slug   = $uri_segments[0] ?? '';

  if ($theme_slug !== '' && $theme_slug !== 'canvas' && $theme_slug !== 'dashboard' && $theme_slug !== 'kuiz') {
    $theme_root_candidate = realpath($themes_root . '/' . $theme_slug);
    $is_in_themes_root    = is_string($theme_root_candidate)
      && strpos($theme_root_candidate, $themes_root . DIRECTORY_SEPARATOR) === 0;

    if ($is_in_themes_root && is_dir($theme_root_candidate)) {
      $active_theme = $theme_slug;
      array_shift($uri_segments);
      $theme_uri = trim(implode('/', $uri_segments), '/');

      if ($theme_uri === '' || strtolower($theme_uri) === 'index.php') {
        $theme_uri = 'home';
      }
    }
  }
}

$resolved_theme_root = $themes_root !== false
  ? realpath($themes_root . '/' . $active_theme)
  : false;

if ($resolved_theme_root !== false) {
  $pages_root = $resolved_theme_root;
}

if ($is_valid_route && $pages_root !== false) {
  $page_candidates = [
    realpath($pages_root . '/' . $theme_uri . '.php'),
    realpath($pages_root . '/' . $theme_uri . '/index.php'),
  ];

  foreach ($page_candidates as $candidate) {
    $is_in_pages_directory = is_string($candidate) && strpos($candidate, $pages_root . DIRECTORY_SEPARATOR) === 0;
    if ($is_in_pages_directory && is_file($candidate)) {
      $page = $candidate;
      break;
    }
  }
}

if (
  $page === '' &&
  $is_valid_route &&
  $canvas_root !== false &&
  ($uri === 'canvas' || strpos($uri, 'canvas/') === 0)
) {
  $canvas_uri = substr($uri, strlen('canvas'));
  $canvas_uri = trim($canvas_uri, '/');

  $canvas_candidates = [];

  if ($canvas_uri === '') {
    $canvas_candidates[] = realpath($canvas_root . '/index.php');
  } else {
    $canvas_candidates[] = realpath($canvas_root . '/' . $canvas_uri . '.php');
    $canvas_candidates[] = realpath($canvas_root . '/' . $canvas_uri . '/index.php');
  }

  foreach ($canvas_candidates as $candidate) {
    $is_in_canvas_directory = is_string($candidate) && strpos($candidate, $canvas_root . DIRECTORY_SEPARATOR) === 0;
    if ($is_in_canvas_directory && is_file($candidate)) {
      $page = $candidate;
      break;
    }
  }
}

if (
  $page === '' &&
  $is_valid_route &&
  $dashboard_root !== false &&
  ($uri === 'dashboard' || strpos($uri, 'dashboard/') === 0)
) {
  $dashboard_uri = substr($uri, strlen('dashboard'));
  $dashboard_uri = trim($dashboard_uri, '/');

  $dashboard_candidates = [];

  if ($dashboard_uri === '') {
    $dashboard_candidates[] = realpath($dashboard_root . '/index.php');
  } else {
    $dashboard_candidates[] = realpath($dashboard_root . '/' . $dashboard_uri . '.php');
    $dashboard_candidates[] = realpath($dashboard_root . '/' . $dashboard_uri . '/index.php');
  }

  foreach ($dashboard_candidates as $candidate) {
    $is_in_dashboard_directory = is_string($candidate) && strpos($candidate, $dashboard_root . DIRECTORY_SEPARATOR) === 0;
    if ($is_in_dashboard_directory && is_file($candidate)) {
      $page = $candidate;
      break;
    }
  }
}

if (
  $page === '' &&
  $is_valid_route &&
  $kuiz_root !== false &&
  ($uri === 'kuiz' || strpos($uri, 'kuiz/') === 0)
) {
  $kuiz_uri = substr($uri, strlen('kuiz'));
  $kuiz_uri = trim($kuiz_uri, '/');

  $kuiz_candidates = [];

  if ($kuiz_uri === '') {
    $kuiz_candidates[] = realpath($kuiz_root . '/index.php');
  } else {
    $kuiz_candidates[] = realpath($kuiz_root . '/' . $kuiz_uri . '.php');
    $kuiz_candidates[] = realpath($kuiz_root . '/' . $kuiz_uri . '/index.php');
  }

  foreach ($kuiz_candidates as $candidate) {
    $is_in_kuiz_directory = is_string($candidate) && strpos($candidate, $kuiz_root . DIRECTORY_SEPARATOR) === 0;
    if ($is_in_kuiz_directory && is_file($candidate)) {
      $page = $candidate;
      break;
    }
  }
}

if (
  $page === '' &&
  $is_valid_route &&
  $mampan_root !== false &&
  ($uri === 'mampan' || strpos($uri, 'mampan/') === 0)
) {
  $mampan_uri = substr($uri, strlen('mampan'));
  $mampan_uri = trim($mampan_uri, '/');

  $mampan_candidates = [];

  if ($mampan_uri === '') {
    $mampan_candidates[] = realpath($mampan_root . '/index.php');
  } else {
    $mampan_candidates[] = realpath($mampan_root . '/' . $mampan_uri . '.php');
    $mampan_candidates[] = realpath($mampan_root . '/' . $mampan_uri . '/index.php');
  }

  foreach ($mampan_candidates as $candidate) {
    $is_in_mampan_directory = is_string($candidate) && strpos($candidate, $mampan_root . DIRECTORY_SEPARATOR) === 0;
    if ($is_in_mampan_directory && is_file($candidate)) {
      $page = $candidate;
      break;
    }
  }
}

if ($page === '') {
  http_response_code(404);
  $page = __DIR__ . '/views/themes/core/404.php';
}

ob_start();

try {
  set_active_theme($active_theme);
  require $page;
  $content = (string) ob_get_clean();
} catch (Throwable $exception) {
  if (ob_get_level() > 0) {
    ob_end_clean();
  }

  http_response_code(500);

  error_log(sprintf(
    'Render error for route "%s": %s in %s:%d',
    $uri,
    $exception->getMessage(),
    $exception->getFile(),
    $exception->getLine(),
  ));

  $error_message = htmlspecialchars($exception->getMessage(), ENT_QUOTES, 'UTF-8');
  $error_origin  = htmlspecialchars(
    basename($exception->getFile()) . ':' . (string) $exception->getLine(),
    ENT_QUOTES,
    'UTF-8'
  );

  $content = sprintf(
    '<section class="mx-auto max-w-3xl rounded-lg border border-negative-300 bg-white p-6 text-negative-800">' .
    '<h1 class="text-xl font-semibold text-negative-900">Something went wrong while loading this page.</h1>' .
    '<p class="mt-2 text-sm">%s</p>' .
    '<p class="mt-1 text-xs text-negative-700">%s</p>' .
    '</section>',
    $error_message,
    $error_origin,
  );
}

require __DIR__ . '/layout.php';
