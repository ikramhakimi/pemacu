<?php

declare(strict_types=1);

$page_title   = 'Analytics - Campaigns';
$page_current = 'dashboard';
$top_campaigns_columns = [
  ['label' => 'Campaign', 'key' => 'campaign'],
  ['label' => 'Channel', 'key' => 'channel'],
  ['label' => 'Leads', 'key' => 'leads', 'align' => 'right'],
];
$top_campaigns_rows = [
  ['campaign' => 'IG-AD-RAYA26', 'channel' => 'instagram', 'leads' => '118'],
  ['campaign' => 'FB-AD-RAYA26', 'channel' => 'facebook', 'leads' => '71'],
  ['campaign' => 'IG-SOCIAL-RAYA26', 'channel' => 'instagram', 'leads' => '64'],
  ['campaign' => 'WHATSAPP-BROADCAST-MAR', 'channel' => 'whatsapp', 'leads' => '48'],
  ['campaign' => 'PARTNER-CREATOR-BOOST', 'channel' => 'referral', 'leads' => '32'],
  ['campaign' => 'GOOGLE-SEARCH-BRANDED', 'channel' => 'google', 'leads' => '95'],
  ['campaign' => 'GOOGLE-PMAX-STUDIO', 'channel' => 'google', 'leads' => '83'],
  ['campaign' => 'TIKTOK-SPARK-RAYA', 'channel' => 'tiktok', 'leads' => '59'],
  ['campaign' => 'EMAIL-NEWSLETTER-MAR', 'channel' => 'email', 'leads' => '44'],
  ['campaign' => 'WEB-BANNER-HOMEPAGE', 'channel' => 'onsite', 'leads' => '27'],
  ['campaign' => 'INFLUENCER-STORY-CODE', 'channel' => 'instagram', 'leads' => '23'],
  ['campaign' => 'AFFILIATE-PHOTOCLUB', 'channel' => 'referral', 'leads' => '19'],
];
$dashboard_breadcrumb_items = [
  ['label' => 'Analytics', 'href' => path('/dashboard/analytics/overview')],
  ['label' => 'Campaigns', 'current' => true],
];
$dashboard_breadcrumb_description = 'Monitor campaign performance across paid, social, referral, and owned channels.';

layout('dashboard/partials/dashboard-start', [
  'page_title'                     => $page_title,
  'page_current'                   => $page_current,
  'dashboard_breadcrumb_items'     => $dashboard_breadcrumb_items,
  'dashboard_breadcrumb_description' => $dashboard_breadcrumb_description,
]);
?>
<header class="app-header border-b border-brand-200 py-6 md:hidden">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900">Campaigns</h1>
    <p class="mt-4 max-w-2xl text-brand-600">
      Monitor campaign performance across paid, social, referral, and owned channels.
    </p>
  </div>
</header>
<article class="app-article pb-20 pt-8 space-y-4">
  <?php component('dashboard/filter-date', [
    'section_class'     => 'max-w-lg mb-8',
    'aria_label'        => 'Campaign date range filter',
    'disable_past'      => false,
  ]); ?>

  <section class="<?= card('bg-brand-800 p-1 border-0'); ?>" aria-label="Campaign summary metrics cards">
    <header class="p-4">
      <h2 class="text-xl font-semibold text-white">Campaigns Summary Metrics</h2>
      <p class="mt-1 text-brand-300">At-a-glance active campaigns, lead volume, cost efficiency, and conversion for the current 30-day period.</p>
    </header>
    <div class="mt-1 grid gap-1 sm:grid-cols-2 md:grid-cols-4">
      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Active Campaigns</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">18</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-brand-700">+3</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Campaign Leads</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">1,246</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+14.2%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Avg Cost Per Lead</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">RM 18.40</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">-6.1%</p>
          <p class="text-brand-500">improved this month</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Lead Conversion Rate</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">5.3%</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+0.7%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>
    </div>
  </section>

  <section class="<?= card('bg-brand-600 p-1 border-0'); ?>">
    <header class="p-4">
      <h2 class="text-xl font-semibold text-white">Top Campaigns</h2>
      <p class="mt-1 text-brand-300">Highest-performing campaigns by lead volume in the last 30 days.</p>
    </header>
    <article class="mt-1">
      <?php component('table', [
        'columns'    => $top_campaigns_columns,
        'rows'       => $top_campaigns_rows,
        'appearance' => 'default',
        'spacing'    => 'default',
      ]); ?>
    </article>
  </section>
</article>
<?php layout('dashboard/partials/dashboard-end'); ?>
