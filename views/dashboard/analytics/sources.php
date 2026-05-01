<?php

declare(strict_types=1);

$page_title   = 'Analytics - Sources';
$page_current = 'dashboard';
$top_sources_columns = [
  ['label' => 'Source', 'key' => 'source'],
  ['label' => 'Sessions', 'key' => 'sessions', 'align' => 'right'],
  ['label' => 'Unique Visitors', 'key' => 'unique_visitors', 'align' => 'right'],
];
$top_sources_rows = [
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">google.com | Organic Search</p><p class="mt-1 text-brand-600">/utm/source/google</p>',
      'is_html' => true,
    ],
    'sessions'        => '12,840',
    'unique_visitors' => '6,120',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">Direct | Typed / Bookmark</p><p class="mt-1 text-brand-600">/utm/source/direct</p>',
      'is_html' => true,
    ],
    'sessions'        => '9,430',
    'unique_visitors' => '4,508',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">instagram.com | Social</p><p class="mt-1 text-brand-600">/utm/source/instagram</p>',
      'is_html' => true,
    ],
    'sessions'        => '7,980',
    'unique_visitors' => '3,642',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">facebook.com | Social</p><p class="mt-1 text-brand-600">/utm/source/facebook</p>',
      'is_html' => true,
    ],
    'sessions'        => '6,540',
    'unique_visitors' => '3,014',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">ads.google.com | Paid Search</p><p class="mt-1 text-brand-600">/utm/source/google-ads</p>',
      'is_html' => true,
    ],
    'sessions'        => '5,904',
    'unique_visitors' => '2,756',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">tiktok.com | Social</p><p class="mt-1 text-brand-600">/utm/source/tiktok</p>',
      'is_html' => true,
    ],
    'sessions'        => '5,188',
    'unique_visitors' => '2,322',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">youtube.com | Video</p><p class="mt-1 text-brand-600">/utm/source/youtube</p>',
      'is_html' => true,
    ],
    'sessions'        => '4,740',
    'unique_visitors' => '2,104',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">wa.me | Referral</p><p class="mt-1 text-brand-600">/utm/source/whatsapp</p>',
      'is_html' => true,
    ],
    'sessions'        => '3,982',
    'unique_visitors' => '1,860',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">mail.google.com | Email</p><p class="mt-1 text-brand-600">/utm/source/newsletter</p>',
      'is_html' => true,
    ],
    'sessions'        => '3,516',
    'unique_visitors' => '1,670',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">bing.com | Organic Search</p><p class="mt-1 text-brand-600">/utm/source/bing</p>',
      'is_html' => true,
    ],
    'sessions'        => '2,984',
    'unique_visitors' => '1,432',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">linkedin.com | Social</p><p class="mt-1 text-brand-600">/utm/source/linkedin</p>',
      'is_html' => true,
    ],
    'sessions'        => '2,746',
    'unique_visitors' => '1,298',
  ],
  [
    'source' => [
      'content' => '<p class="font-medium text-brand-900">partner-blog.my | Referral</p><p class="mt-1 text-brand-600">/utm/source/partner-blog</p>',
      'is_html' => true,
    ],
    'sessions'        => '2,408',
    'unique_visitors' => '1,154',
  ],
];
$daily_sources_columns = [
  ['label' => 'Date', 'key' => 'date'],
  ['label' => 'Sessions', 'key' => 'sessions', 'align' => 'right'],
  ['label' => 'Unique Visitors', 'key' => 'unique_visitors', 'align' => 'right'],
];
$daily_sources_rows = [
  ['date' => 'Mar 25', 'sessions' => '2,340', 'unique_visitors' => '1,012'],
  ['date' => 'Mar 24', 'sessions' => '2,268', 'unique_visitors' => '978'],
  ['date' => 'Mar 23', 'sessions' => '2,194', 'unique_visitors' => '946'],
  ['date' => 'Mar 22', 'sessions' => '2,423', 'unique_visitors' => '1,058'],
  ['date' => 'Mar 21', 'sessions' => '2,511', 'unique_visitors' => '1,094'],
  ['date' => 'Mar 20', 'sessions' => '2,687', 'unique_visitors' => '1,162'],
  ['date' => 'Mar 19', 'sessions' => '2,562', 'unique_visitors' => '1,128'],
  ['date' => 'Mar 18', 'sessions' => '2,455', 'unique_visitors' => '1,094'],
  ['date' => 'Mar 17', 'sessions' => '2,398', 'unique_visitors' => '1,070'],
  ['date' => 'Mar 16', 'sessions' => '2,243', 'unique_visitors' => '1,016'],
  ['date' => 'Mar 15', 'sessions' => '2,182', 'unique_visitors' => '982'],
  ['date' => 'Mar 14', 'sessions' => '2,319', 'unique_visitors' => '1,042'],
  ['date' => 'Mar 13', 'sessions' => '2,476', 'unique_visitors' => '1,108'],
  ['date' => 'Mar 12', 'sessions' => '2,531', 'unique_visitors' => '1,134'],
  ['date' => 'Mar 11', 'sessions' => '2,604', 'unique_visitors' => '1,168'],
  ['date' => 'Mar 10', 'sessions' => '2,490', 'unique_visitors' => '1,126'],
  ['date' => 'Mar 9', 'sessions' => '2,345', 'unique_visitors' => '1,052'],
  ['date' => 'Mar 8', 'sessions' => '2,202', 'unique_visitors' => '1,003'],
  ['date' => 'Mar 7', 'sessions' => '2,134', 'unique_visitors' => '964'],
  ['date' => 'Mar 6', 'sessions' => '2,089', 'unique_visitors' => '938'],
  ['date' => 'Mar 5', 'sessions' => '2,042', 'unique_visitors' => '914'],
  ['date' => 'Mar 4', 'sessions' => '1,996', 'unique_visitors' => '892'],
  ['date' => 'Mar 3', 'sessions' => '1,952', 'unique_visitors' => '870'],
];
$dashboard_breadcrumb_items = [
  ['label' => 'Analytics', 'href' => path('/dashboard/analytics/overview')],
  ['label' => 'Sources', 'current' => true],
];
layout('dashboard/partials/dashboard-start', [
  'page_title'                     => $page_title,
  'page_current'                   => $page_current,
  'dashboard_breadcrumb_items'     => $dashboard_breadcrumb_items,
]);
?>
<header class="app-header border-b border-brand-200 py-6 md:hidden">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900">Sources</h1>
    <p class="mt-4 max-w-2xl text-brand-600">
      Understand where visitors are coming from and which channels drive the most sessions.
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

  <section class="<?= card('bg-brand-800 p-1 border-0'); ?>" aria-label="Sources summary metrics cards">
    <header class="p-4">
      <h2 class="text-xl font-semibold text-white">Sources Summary Metrics</h2>
      <p class="mt-1 text-brand-300">At-a-glance traffic acquisition across total, organic, paid, and referral sessions for the current 30-day period.</p>
    </header>
    <div class="mt-1 grid gap-1 sm:grid-cols-2 md:grid-cols-4">
      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Total Sessions</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">48,920</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+8.4%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Organic Sessions</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">21,430</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+6.2%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Paid Campaign Sessions</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">9,860</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+11.4%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Referral Sessions</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">7,640</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+3.7%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>
    </div>
  </section>

  <section class="<?= card('bg-brand-600 p-1 border-0'); ?>">
    <header class="p-4">
      <h2 class="text-xl font-semibold text-white">Top Sources</h2>
      <p class="mt-1 text-brand-300">Top channels driving traffic in the last 30 days.</p>
    </header>
    <article class="mt-1">
      <?php component('table', [
        'columns'    => $top_sources_columns,
        'rows'       => $top_sources_rows,
        'appearance' => 'default',
        'spacing'    => 'default',
      ]); ?>
    </article>
  </section>
</article>
<?php layout('dashboard/partials/dashboard-end'); ?>
