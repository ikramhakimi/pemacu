<?php

declare(strict_types=1);

$app_js_path    = __DIR__ . '/../../../assets/js/app.js';
$app_js_href    = path('/assets/js/app.js');
$app_js_version = is_file($app_js_path) ? (string) filemtime($app_js_path) : '';
$app_js_url     = $app_js_version !== '' ? $app_js_href . '?v=' . $app_js_version : $app_js_href;
?>
        </div>
      </div>
    </div>
  <script type="module" src="<?= e($app_js_url); ?>"></script>
</body>
</html>
