<?php

if (!defined('BASE_PATH')) {
  $script_name = $_SERVER['SCRIPT_NAME'] ?? '/';
  $script_dir  = dirname($script_name);
  define('BASE_PATH', $script_dir === '/' || $script_dir === '.' ? '' : rtrim($script_dir, '/'));
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

$page = '';
$pages_root = realpath(__DIR__ . '/views/pages');
$is_valid_route = preg_match('/^[a-z0-9\/-]+$/i', $uri) === 1 && strpos($uri, '..') === false;

if ($is_valid_route && $pages_root !== false) {
  $page_candidates = [
    realpath($pages_root . '/' . $uri . '.php'),
    realpath($pages_root . '/' . $uri . '/index.php'),
  ];

  foreach ($page_candidates as $candidate) {
    $is_in_pages_directory = is_string($candidate) && strpos($candidate, $pages_root . DIRECTORY_SEPARATOR) === 0;
    if ($is_in_pages_directory && is_file($candidate)) {
      $page = $candidate;
      break;
    }
  }
}

if ($page === '') {
  http_response_code(404);
  $page = __DIR__ . '/views/pages/404.php';
}

ob_start();
require $page;
$content = ob_get_clean();

require __DIR__ . '/layout.php';
