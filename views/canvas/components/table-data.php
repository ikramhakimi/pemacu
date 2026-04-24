<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Table Data';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');
$table_data_api_url   = path('/canvas/components/table-data-api');

$table_data_columns = [
  ['name' => 'Company', 'id' => 'company'],
  ['name' => 'Stage', 'id' => 'stage'],
  ['name' => 'Owner', 'id' => 'owner'],
  ['name' => 'MRR', 'id' => 'mrr'],
];

layout('canvas/layouts/canvas-start', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'canvas_primary'       => 'components',
  'canvas_links'         => $component_page_links,
  'canvas_active_link'   => '/canvas/components/table-data',
  'canvas_include_gridjs' => true,
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Table Data',
    'header_subtitle'        => 'Reference for API-driven table rendering with GridJS and reusable data mapping.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
  ?>
</section>

<section class="canvas-showcase grid grid-cols-1">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Search
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full">
          <?php component('table-data', [
            'api_url'          => $table_data_api_url . '?state=default',
            'columns'          => $table_data_columns,
            'rows_key'         => 'data',
            'search'           => true,
            'sort'             => false,
            'pagination'       => false,
            'loading_message'  => 'Loading searchable records...',
            'empty_message'    => 'No matching records found.',
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Sort
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full">
          <?php component('table-data', [
            'api_url'          => $table_data_api_url . '?state=default',
            'columns'          => $table_data_columns,
            'rows_key'         => 'data',
            'search'           => false,
            'sort'             => true,
            'pagination'       => false,
            'loading_message'  => 'Loading sortable records...',
            'empty_message'    => 'No records to sort.',
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Empty State
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full">
          <?php component('table-data', [
            'api_url'          => $table_data_api_url . '?state=empty',
            'columns'          => $table_data_columns,
            'rows_key'         => 'data',
            'search'           => true,
            'sort'             => true,
            'pagination'       => true,
            'pagination_limit' => 5,
            'loading_message'  => 'Checking for records...',
            'empty_message'    => 'No records available from the API endpoint.',
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Pagination
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full">
          <?php component('table-data', [
            'api_url'          => $table_data_api_url . '?state=pagination',
            'columns'          => $table_data_columns,
            'rows_key'         => 'data',
            'search'           => false,
            'sort'             => false,
            'pagination'       => true,
            'pagination_limit' => 5,
            'loading_message'  => 'Loading paginated records...',
            'empty_message'    => 'No records for pagination.',
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Loading State
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full">
          <?php component('table-data', [
            'api_url'          => $table_data_api_url . '?state=loading',
            'columns'          => $table_data_columns,
            'rows_key'         => 'data',
            'search'           => true,
            'sort'             => true,
            'pagination'       => true,
            'pagination_limit' => 5,
            'loading_message'  => 'Loading records from API...',
            'empty_message'    => 'No records returned.',
          ]); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Fixed Header
      </div>
      <div class="relative flex min-h-[380px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full">
          <?php component('table-data', [
            'api_url'          => $table_data_api_url . '?state=fixed-header',
            'columns'          => $table_data_columns,
            'rows_key'         => 'data',
            'search'           => false,
            'sort'             => true,
            'pagination'       => false,
            'fixed_header'     => true,
            'height'           => '320px',
            'loading_message'  => 'Loading fixed-header table...',
            'empty_message'    => 'No records for fixed header table.',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end', ['canvas_include_gridjs' => true]); ?>
