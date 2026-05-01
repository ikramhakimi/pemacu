<?php

declare(strict_types=1);

$page_title   = 'Sales - Overview';
$page_current = 'dashboard';

$today                   = new DateTimeImmutable('now');
$total_days_in_month     = (int) $today->format('t');

$actual_sales          = 68400.00;
$target_sales          = 120000.00;
$sales_day             = 5900.00;
$sales_year            = 418600.00;
$target_year           = 1440000.00;

$daily_sales_target      = $total_days_in_month > 0 ? $target_sales / $total_days_in_month : 0.00;
$sales_day_percent       = $daily_sales_target > 0 ? ($sales_day / $daily_sales_target) * 100 : 0.00;
$sales_month_percent     = $target_sales > 0 ? ($actual_sales / $target_sales) * 100 : 0.00;
$sales_year_percent      = $target_year > 0 ? ($sales_year / $target_year) * 100 : 0.00;

$product_sales_rows = [
  ['name' => 'Wedding Essential',     'amount' => 24500.00],
  ['name' => 'Corporate Lite',        'amount' => 17800.00],
  ['name' => 'Bridal Signature',      'amount' => 14200.00],
  ['name' => 'Family Portrait Plus',  'amount' => 7900.00],
  ['name' => 'Studio Headshot',       'amount' => 4000.00],
];

$format_currency = static function (float $amount): string {
  return 'RM ' . number_format($amount, 0);
};

$format_percent = static function (float $amount): string {
  return number_format($amount, 1) . '%';
};

$dashboard_breadcrumb_items = [
  ['label' => 'Sales', 'href' => path('/dashboard/sales/overview')],
  ['label' => 'Overview', 'current' => true],
];

layout('dashboard/partials/dashboard-start', [
  'page_title'                 => $page_title,
  'page_current'               => $page_current,
  'dashboard_breadcrumb_items' => $dashboard_breadcrumb_items,
]);
?>
<header class="border-b border-brand-200 py-5">
  <div>
    <h1 class="text-3xl font-bold text-brand-900">Sales Overview</h1>
    <p class="mt-1 max-w-2xl text-base text-brand-500">
      Track current month sales performance, target progress, and daily pace.
    </p>
  </div>
</header>

<article class="app-article space-y-5 pb-20 pt-5" aria-label="Simplified Version">
  <?php ob_start(); ?>
  <div class="grid gap-1 sm:grid-cols-2 lg:grid-cols-3">
    <?php component('card', ['card' => [
      'variant'            => 'metric',
      'title'              => 'Sales Day',
      'show_subtitle'      => false,
      'metric_title_class' => 'text-sm',
      'metric_value'       => $format_currency($sales_day),
      'metric_compare'     => $format_percent($sales_day_percent) . ' of ' . $format_currency($daily_sales_target) . ' KPI',
    ]]); ?>
    <?php component('card', ['card' => [
      'variant'            => 'metric',
      'title'              => 'Sales Month',
      'show_subtitle'      => false,
      'metric_title_class' => 'text-sm',
      'metric_value'       => $format_currency($actual_sales),
      'metric_compare'     => $format_percent($sales_month_percent) . ' of ' . $format_currency($target_sales) . ' KPI',
    ]]); ?>
    <?php component('card', ['card' => [
      'variant'            => 'metric',
      'title'              => 'Sales Year',
      'show_subtitle'      => false,
      'metric_title_class' => 'text-sm',
      'metric_value'       => $format_currency($sales_year),
      'metric_compare'     => $format_percent($sales_year_percent) . ' of ' . $format_currency($target_year) . ' KPI',
    ]]); ?>
  </div>
  <?php
  $sales_summary_panel_html = (string) ob_get_clean();
  component('frame', [
    'variant'              => 'base',
    'title'                => 'Sales Summary',
    'subtitle'             => 'Quick sales snapshot for day, month, and year.',
    'panel_html_items'     => [$sales_summary_panel_html],
    'render_panel_wrapper' => false,
    'class_name'           => '!ring-0',
  ]);
  ?>

  <section aria-label="Sales by product breakdown">
    <?php
    $sales_by_product_panel_html_items = [];
    foreach ($product_sales_rows as $product_sales_row) {
      $product_amount  = (float) $product_sales_row['amount'];
      $product_percent = $actual_sales > 0 ? ($product_amount / $actual_sales) * 100 : 0.00;

      ob_start();
      ?>
      <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h3 class="font-semibold text-brand-900"><?= e((string) $product_sales_row['name']); ?></h3>
          <p class="text-sm text-brand-500"><?= e($format_currency($product_amount)); ?></p>
        </div>
        <p class="text-sm font-medium text-brand-700"><?= e($format_percent($product_percent)); ?></p>
      </div>
      <div class="mt-3">
        <?php component('progressbar', [
          'label' => (string) $product_sales_row['name'] . ' sales share',
          'tone'  => 'info',
          'size'  => 'sm',
          'value' => $product_percent,
          'min'   => 0,
          'max'   => 100,
        ]); ?>
      </div>
      <?php
      $sales_by_product_panel_html_items[] = (string) ob_get_clean();
    }

    component('frame', [
      'variant'              => 'base',
      'title'                => 'Sales by Product',
      'subtitle'             => 'Static demo breakdown of current month package sales contribution.',
      'panel_html_items'     => $sales_by_product_panel_html_items,
      'class_name'           => '!ring-0',
    ]);
    ?>
  </section>
</article>
<?php layout('dashboard/partials/dashboard-end'); ?>
