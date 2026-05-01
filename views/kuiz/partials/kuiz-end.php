<?php

declare(strict_types=1);

$app_js_path    = __DIR__ . '/../../../assets/js/app.js';
$app_js_href    = path('/assets/js/app.js');
$app_js_version = is_file($app_js_path) ? (string) filemtime($app_js_path) : '';
$app_js_url     = $app_js_version !== '' ? $app_js_href . '?v=' . $app_js_version : $app_js_href;
$dashboard_js_path    = __DIR__ . '/../../../assets/js/dashboard.js';
$dashboard_js_href    = path('/assets/js/dashboard.js');
$dashboard_js_version = is_file($dashboard_js_path) ? (string) filemtime($dashboard_js_path) : '';
$dashboard_js_url     = $dashboard_js_version !== '' ? $dashboard_js_href . '?v=' . $dashboard_js_version : $dashboard_js_href;
$gridjs_js_path       = __DIR__ . '/../../../assets/vendor/gridjs/gridjs.umd.js';
$gridjs_js_href       = path('/assets/vendor/gridjs/gridjs.umd.js');
$gridjs_js_version    = is_file($gridjs_js_path) ? (string) filemtime($gridjs_js_path) : '';
$gridjs_js_url        = $gridjs_js_version !== '' ? $gridjs_js_href . '?v=' . $gridjs_js_version : $gridjs_js_href;
?>
        </div>
      </div>
    </div>
  <script src="<?= e($gridjs_js_url); ?>"></script>
  <script type="module" src="<?= e($dashboard_js_url); ?>"></script>
  <script type="module" src="<?= e($app_js_url); ?>"></script>
</body>
</html>
