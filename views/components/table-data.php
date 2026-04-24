<?php

declare(strict_types=1);

/**
 * Component: table-data
 * Purpose: Render one API-driven GridJS table mount with configurable columns and interaction options.
 * Data Contract:
 * - `api_url` (string): API endpoint returning JSON rows.
 * - `columns` (array): Column schema. Item supports `name` and optional `id`.
 *   - Optional per-column flag: `is_html` (bool) to render trusted HTML cell content.
 * - `rows_key` (string): Response object key containing rows. Default: `data`.
 * - `search` (bool): Enable search. Default: `true`.
 * - `sort` (bool): Enable sorting. Default: `true`.
 * - `pagination` (bool): Enable pagination. Default: `true`.
 * - `pagination_limit` (int): Rows per page. Default: `5`.
 * - `fixed_header` (bool): Enable sticky table header. Default: `false`.
 * - `height` (string): Scroll container height when fixed header is enabled. Default: `360px`.
 * - `loading_message` (string): Loading-state text before rows are ready.
 * - `empty_message` (string): Message shown when fetch fails or returns no rows.
 * - `class_name` (string): Additional wrapper utility classes.
 */

$api_url          = isset($api_url) ? trim((string) $api_url) : '';
$columns          = isset($columns) && is_array($columns) ? array_values($columns) : [];
$rows_key         = isset($rows_key) ? trim((string) $rows_key) : 'data';
$search           = !isset($search) || (bool) $search;
$sort             = !isset($sort) || (bool) $sort;
$pagination       = !isset($pagination) || (bool) $pagination;
$pagination_limit = isset($pagination_limit) ? max(1, (int) $pagination_limit) : 5;
$fixed_header     = isset($fixed_header) ? (bool) $fixed_header : false;
$height           = isset($height) ? trim((string) $height) : '360px';
$loading_message  = isset($loading_message)
  ? trim((string) $loading_message)
  : 'Loading table data...';
$empty_message    = isset($empty_message)
  ? trim((string) $empty_message)
  : 'No table data available.';
$class_name       = isset($class_name) ? trim((string) $class_name) : '';
$instance_id      = isset($instance_id) ? trim((string) $instance_id) : '';

if ($instance_id === '') {
  $instance_id = 'table-data-' . (string) mt_rand(100000, 999999);
}

if ($columns === []) {
  $columns = [
    ['name' => 'Name', 'id' => 'name'],
  ];
}

$normalize_column = static function ($column, int $index): array {
  if (is_string($column)) {
    $label = trim($column) !== '' ? trim($column) : 'Column ' . ($index + 1);
    return [
      'name'    => $label,
      'id'      => 'column_' . ($index + 1),
      'is_html' => false,
    ];
  }

  if (!is_array($column)) {
    return [
      'name'    => 'Column ' . ($index + 1),
      'id'      => 'column_' . ($index + 1),
      'is_html' => false,
    ];
  }

  $name    = isset($column['name']) ? trim((string) $column['name']) : '';
  $id      = isset($column['id']) ? trim((string) $column['id']) : '';
  $is_html = isset($column['is_html']) ? (bool) $column['is_html'] : false;

  if ($name === '') {
    $name = 'Column ' . ($index + 1);
  }

  if ($id === '') {
    $id = 'column_' . ($index + 1);
  }

  return [
    'name'    => $name,
    'id'      => $id,
    'is_html' => $is_html,
  ];
};

$column_config = [];
foreach ($columns as $column_index => $column_item) {
  $column_config[] = $normalize_column($column_item, $column_index);
}

$table_data_config = [
  'api_url'          => $api_url,
  'columns'          => $column_config,
  'rows_key'         => $rows_key,
  'search'           => $search,
  'sort'             => $sort,
  'pagination'       => $pagination,
  'pagination_limit' => $pagination_limit,
  'fixed_header'     => $fixed_header,
  'height'           => $height,
  'loading_message'  => $loading_message,
  'empty_message'    => $empty_message,
];

$config_json = json_encode($table_data_config);
if ($config_json === false) {
  $config_json = '{}';
}
?>
<div class="<?= e(trim('table-data w-full ' . $class_name)); ?>">
  <div
    id="<?= e($instance_id); ?>"
    class="table-data__mount w-full js-component-table-data"
    data-table-data-config="<?= e($config_json); ?>"
  ></div>
</div>
