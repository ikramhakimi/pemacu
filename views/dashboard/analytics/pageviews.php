<?php

declare(strict_types=1);

$page_title   = 'Analytics - Pageviews';
$page_current = 'dashboard';
$top_pages_columns = [
  ['label' => 'Page', 'key' => 'page'],
  ['label' => 'Page Views', 'key' => 'page_views', 'align' => 'right'],
  ['label' => 'Unique Visitors', 'key' => 'unique_visitors', 'align' => 'right'],
];
$top_pages_rows = [
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Wedding Essential | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/SE26</p>',
      'is_html' => true,
    ],
    'page_views'      => '8,420',
    'unique_visitors' => '3,180',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Corporate Lite | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/CL14</p>',
      'is_html' => true,
    ],
    'page_views'      => '7,965',
    'unique_visitors' => '2,990',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Bridal Signature | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/BS31</p>',
      'is_html' => true,
    ],
    'page_views'      => '7,110',
    'unique_visitors' => '2,754',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Family Portrait Plus | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/FP20</p>',
      'is_html' => true,
    ],
    'page_views'      => '6,788',
    'unique_visitors' => '2,608',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Maternity Glow | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/MG12</p>',
      'is_html' => true,
    ],
    'page_views'      => '6,204',
    'unique_visitors' => '2,402',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Graduation Studio | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/GS18</p>',
      'is_html' => true,
    ],
    'page_views'      => '5,972',
    'unique_visitors' => '2,310',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Newborn Keepsake | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/NK09</p>',
      'is_html' => true,
    ],
    'page_views'      => '5,604',
    'unique_visitors' => '2,118',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Engagement Story | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/ES24</p>',
      'is_html' => true,
    ],
    'page_views'      => '5,290',
    'unique_visitors' => '2,036',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Product Launch | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/PL11</p>',
      'is_html' => true,
    ],
    'page_views'      => '4,988',
    'unique_visitors' => '1,944',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Studio Headshot Pro | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/HP17</p>',
      'is_html' => true,
    ],
    'page_views'      => '4,756',
    'unique_visitors' => '1,865',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Team Branding | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/TB22</p>',
      'is_html' => true,
    ],
    'page_views'      => '4,431',
    'unique_visitors' => '1,732',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Event Coverage Daypass | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/ED19</p>',
      'is_html' => true,
    ],
    'page_views'      => '4,116',
    'unique_visitors' => '1,640',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Pet Portrait Session | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/PP08</p>',
      'is_html' => true,
    ],
    'page_views'      => '3,884',
    'unique_visitors' => '1,512',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Personal Branding | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/PB16</p>',
      'is_html' => true,
    ],
    'page_views'      => '3,552',
    'unique_visitors' => '1,406',
  ],
  [
    'page' => [
      'content' => '<p class="font-medium text-brand-900">Holiday Mini Set | Booking Package</p><p class="mt-1 text-brand-600">/store/booking/form/HM07</p>',
      'is_html' => true,
    ],
    'page_views'      => '3,241',
    'unique_visitors' => '1,298',
  ],
];
$daily_pageviews_columns = [
  ['label' => 'Date', 'key' => 'date'],
  ['label' => 'Page Views', 'key' => 'page_views', 'align' => 'right'],
  ['label' => 'Unique Visitors', 'key' => 'unique_visitors', 'align' => 'right'],
];
$daily_pageviews_rows = [
  ['date' => 'Mar 25', 'page_views' => '2,140', 'unique_visitors' => '842'],
  ['date' => 'Mar 24', 'page_views' => '2,068', 'unique_visitors' => '811'],
  ['date' => 'Mar 23', 'page_views' => '1,994', 'unique_visitors' => '785'],
  ['date' => 'Mar 22', 'page_views' => '2,223', 'unique_visitors' => '879'],
  ['date' => 'Mar 21', 'page_views' => '2,311', 'unique_visitors' => '914'],
  ['date' => 'Mar 20', 'page_views' => '2,487', 'unique_visitors' => '966'],
  ['date' => 'Mar 19', 'page_views' => '2,362', 'unique_visitors' => '928'],
  ['date' => 'Mar 18', 'page_views' => '2,255', 'unique_visitors' => '903'],
  ['date' => 'Mar 17', 'page_views' => '2,198', 'unique_visitors' => '870'],
  ['date' => 'Mar 16', 'page_views' => '2,043', 'unique_visitors' => '824'],
  ['date' => 'Mar 15', 'page_views' => '1,982', 'unique_visitors' => '792'],
  ['date' => 'Mar 14', 'page_views' => '2,119', 'unique_visitors' => '846'],
  ['date' => 'Mar 13', 'page_views' => '2,276', 'unique_visitors' => '901'],
  ['date' => 'Mar 12', 'page_views' => '2,331', 'unique_visitors' => '933'],
  ['date' => 'Mar 11', 'page_views' => '2,404', 'unique_visitors' => '954'],
  ['date' => 'Mar 10', 'page_views' => '2,290', 'unique_visitors' => '915'],
  ['date' => 'Mar 9', 'page_views' => '2,145', 'unique_visitors' => '861'],
  ['date' => 'Mar 8', 'page_views' => '2,002', 'unique_visitors' => '806'],
  ['date' => 'Mar 7', 'page_views' => '1,934', 'unique_visitors' => '774'],
  ['date' => 'Mar 6', 'page_views' => '1,889', 'unique_visitors' => '748'],
  ['date' => 'Mar 5', 'page_views' => '1,842', 'unique_visitors' => '731'],
  ['date' => 'Mar 4', 'page_views' => '1,796', 'unique_visitors' => '714'],
  ['date' => 'Mar 3', 'page_views' => '1,752', 'unique_visitors' => '699'],
];
$dashboard_breadcrumb_items = [
  ['label' => 'Analytics', 'href' => path('/dashboard/analytics/overview')],
  ['label' => 'Pageviews', 'current' => true],
];
layout('dashboard/partials/dashboard-start', [
  'page_title'                       => $page_title,
  'page_current'                     => $page_current,
  'dashboard_breadcrumb_items'       => $dashboard_breadcrumb_items,
]);
?>
<header class="app-header border-b border-brand-200 py-6 md:hidden">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900">Pageviews</h1>
    <p class="mt-4 max-w-2xl text-brand-600">
      Monitor page traffic trends and top-performing content.
    </p>
  </div>
</header>
<article class="app-article pb-20 pt-8 space-y-4">
  <?php component('dashboard/filter-date', [
    'section_class'     => 'max-w-lg mb-8',
    'aria_label'        => 'Date range filter',
    'button_variant'    => 'primary',
    'disable_past'      => false,
  ]); ?>

  <section class="<?= card('bg-brand-800 p-1 border-0'); ?>" aria-label="Pageviews summary metrics cards">
    <header class="p-4">
      <h2 class="text-xl font-semibold text-white">Pageviews Summary Metrics</h2>
      <p class="mt-1 text-brand-300">At-a-glance page traffic, visitor reach, engagement time, and bounce trend for the current 30-day period.</p>
    </header>
    <div class="mt-1 grid gap-1 sm:grid-cols-2 md:grid-cols-4">
      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Total Pageviews</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">48,920</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+8.4%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Unique Visitors</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">12,670</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+5.1%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Avg. Time on Page</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">02:46</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+0:14</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Bounce Rate</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">31.2%</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">-2.0%</p>
          <p class="text-brand-500">improved this month</p>
        </div>
      </article>
    </div>
  </section>

  <section class="grid gap-4 md:grid-cols-2 md:items-start" aria-label="Pageviews trend and top pages summary">
    <section class="<?= card('bg-brand-600 p-1 border-0'); ?>">
      <header class="p-4">
        <h2 class="text-xl font-semibold text-white">Daily Pageviews</h2>
        <p class="mt-1 text-brand-300">A daily breakdown of page traffic and unique visitors for the past 23 days.</p>
      </header>
      <article class="mt-1">
        <?php component('table', [
          'columns'    => $daily_pageviews_columns,
          'rows'       => $daily_pageviews_rows,
          'appearance' => 'default',
          'spacing'    => 'default',
        ]); ?>
      </article>
    </section>
    <section class="<?= card('bg-brand-600 p-1 border-0'); ?>">
      <header class="p-4">
        <h2 class="text-xl font-semibold text-white">Top Pages</h2>
        <p class="mt-1 text-brand-300">A quick snapshot of the most visited pages in the last 30 days.</p>
      </header>
      <article class="mt-1">
        <?php component('table', [
          'columns'    => $top_pages_columns,
          'rows'       => $top_pages_rows,
          'appearance' => 'default',
          'spacing'    => 'default',
        ]); ?>
      </article>
    </section>
  </section>
  
</article>
<?php layout('dashboard/partials/dashboard-end'); ?>
