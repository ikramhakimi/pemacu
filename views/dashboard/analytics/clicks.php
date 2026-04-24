<?php

declare(strict_types=1);

$page_title   = 'Analytics - Clicks';
$page_current = 'dashboard';
$top_click_targets_columns = [
  ['label' => 'Click Target', 'key' => 'target'],
  ['label' => 'Clicks', 'key' => 'clicks', 'align' => 'right'],
  ['label' => 'Unique Clickers', 'key' => 'unique_clickers', 'align' => 'right'],
];
$top_click_targets_rows = [
  ['target' => ['content' => '<p class="font-medium text-brand-900">Book Now Button | Hero CTA</p><p class="mt-1 text-brand-600">/landing/wedding-2026</p>', 'is_html' => true], 'clicks' => '8,420', 'unique_clickers' => '4,116'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">WhatsApp Link | Contact Bar</p><p class="mt-1 text-brand-600">/contact</p>', 'is_html' => true], 'clicks' => '7,365', 'unique_clickers' => '3,790'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">View Packages | Header Nav</p><p class="mt-1 text-brand-600">/packages</p>', 'is_html' => true], 'clicks' => '6,904', 'unique_clickers' => '3,332'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Book Consultation | Sticky CTA</p><p class="mt-1 text-brand-600">/services/consultation</p>', 'is_html' => true], 'clicks' => '5,988', 'unique_clickers' => '3,028'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Portfolio Grid Item | Gallery</p><p class="mt-1 text-brand-600">/portfolio</p>', 'is_html' => true], 'clicks' => '5,410', 'unique_clickers' => '2,780'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Pricing Tab Toggle | Package Card</p><p class="mt-1 text-brand-600">/pricing</p>', 'is_html' => true], 'clicks' => '4,936', 'unique_clickers' => '2,460'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Email Signup Button | Footer CTA</p><p class="mt-1 text-brand-600">/blog</p>', 'is_html' => true], 'clicks' => '4,308', 'unique_clickers' => '2,112'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Call Now Link | Mobile Header</p><p class="mt-1 text-brand-600">/</p>', 'is_html' => true], 'clicks' => '3,844', 'unique_clickers' => '1,962'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">FAQ Expand Link | FAQ Section</p><p class="mt-1 text-brand-600">/faq</p>', 'is_html' => true], 'clicks' => '3,226', 'unique_clickers' => '1,640'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Promotion Banner CTA | Seasonal Promo</p><p class="mt-1 text-brand-600">/promo/raya</p>', 'is_html' => true], 'clicks' => '2,992', 'unique_clickers' => '1,488'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Testimonial Slider CTA | Social Proof</p><p class="mt-1 text-brand-600">/testimonials</p>', 'is_html' => true], 'clicks' => '2,744', 'unique_clickers' => '1,364'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Download Price List | Lead Magnet</p><p class="mt-1 text-brand-600">/resources/pricelist.pdf</p>', 'is_html' => true], 'clicks' => '2,518', 'unique_clickers' => '1,232'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Map Directions Link | Contact Section</p><p class="mt-1 text-brand-600">/contact#map</p>', 'is_html' => true], 'clicks' => '2,306', 'unique_clickers' => '1,128'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">Chat Support Bubble | Floating Widget</p><p class="mt-1 text-brand-600">/support/live-chat</p>', 'is_html' => true], 'clicks' => '2,184', 'unique_clickers' => '1,074'],
  ['target' => ['content' => '<p class="font-medium text-brand-900">View Photographer Profile | Team Section</p><p class="mt-1 text-brand-600">/about/team</p>', 'is_html' => true], 'clicks' => '2,028', 'unique_clickers' => '996'],
];
$daily_click_volume_columns = [
  ['label' => 'Date', 'key' => 'date'],
  ['label' => 'Clicks', 'key' => 'clicks', 'align' => 'right'],
  ['label' => 'Unique Clickers', 'key' => 'unique_clickers', 'align' => 'right'],
];
$daily_click_volume_rows = [
  ['date' => 'Mar 30', 'clicks' => '1,982', 'unique_clickers' => '1,024'],
  ['date' => 'Mar 29', 'clicks' => '1,944', 'unique_clickers' => '1,008'],
  ['date' => 'Mar 28', 'clicks' => '1,908', 'unique_clickers' => '994'],
  ['date' => 'Mar 27', 'clicks' => '1,886', 'unique_clickers' => '980'],
  ['date' => 'Mar 26', 'clicks' => '1,925', 'unique_clickers' => '997'],
  ['date' => 'Mar 25', 'clicks' => '2,036', 'unique_clickers' => '1,046'],
  ['date' => 'Mar 24', 'clicks' => '2,012', 'unique_clickers' => '1,031'],
  ['date' => 'Mar 23', 'clicks' => '1,978', 'unique_clickers' => '1,012'],
  ['date' => 'Mar 22', 'clicks' => '2,064', 'unique_clickers' => '1,068'],
  ['date' => 'Mar 21', 'clicks' => '2,110', 'unique_clickers' => '1,088'],
  ['date' => 'Mar 20', 'clicks' => '2,184', 'unique_clickers' => '1,126'],
  ['date' => 'Mar 19', 'clicks' => '2,141', 'unique_clickers' => '1,104'],
  ['date' => 'Mar 18', 'clicks' => '2,088', 'unique_clickers' => '1,072'],
  ['date' => 'Mar 17', 'clicks' => '2,022', 'unique_clickers' => '1,044'],
  ['date' => 'Mar 16', 'clicks' => '1,971', 'unique_clickers' => '1,018'],
  ['date' => 'Mar 15', 'clicks' => '1,938', 'unique_clickers' => '1,001'],
  ['date' => 'Mar 14', 'clicks' => '1,992', 'unique_clickers' => '1,030'],
  ['date' => 'Mar 13', 'clicks' => '2,046', 'unique_clickers' => '1,058'],
  ['date' => 'Mar 12', 'clicks' => '2,095', 'unique_clickers' => '1,084'],
  ['date' => 'Mar 11', 'clicks' => '2,120', 'unique_clickers' => '1,099'],
  ['date' => 'Mar 10', 'clicks' => '2,082', 'unique_clickers' => '1,076'],
  ['date' => 'Mar 9', 'clicks' => '2,011', 'unique_clickers' => '1,038'],
  ['date' => 'Mar 8', 'clicks' => '1,968', 'unique_clickers' => '1,016'],
  ['date' => 'Mar 7', 'clicks' => '1,926', 'unique_clickers' => '998'],
  ['date' => 'Mar 6', 'clicks' => '1,893', 'unique_clickers' => '981'],
  ['date' => 'Mar 5', 'clicks' => '1,864', 'unique_clickers' => '966'],
  ['date' => 'Mar 4', 'clicks' => '1,832', 'unique_clickers' => '948'],
  ['date' => 'Mar 3', 'clicks' => '1,801', 'unique_clickers' => '932'],
  ['date' => 'Mar 2', 'clicks' => '1,779', 'unique_clickers' => '921'],
  ['date' => 'Mar 1', 'clicks' => '1,744', 'unique_clickers' => '906'],
];
$dashboard_breadcrumb_items = [
  ['label' => 'Analytics', 'href' => path('/dashboard/analytics/overview')],
  ['label' => 'Clicks', 'current' => true],
];
$dashboard_breadcrumb_description = 'Track click behavior across key actions and identify the highest-performing targets.';

layout('dashboard/partials/dashboard-start', [
  'page_title'                     => $page_title,
  'page_current'                   => $page_current,
  'dashboard_breadcrumb_items'     => $dashboard_breadcrumb_items,
  'dashboard_breadcrumb_description' => $dashboard_breadcrumb_description,
]);
?>
<header class="app-header border-b border-brand-200 py-6 md:hidden">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900">Clicks</h1>
    <p class="mt-4 max-w-2xl text-brand-600">
      Track click behavior across key actions and identify the highest-performing targets.
    </p>
  </div>
</header>
<article class="app-article pb-20 pt-8 space-y-4">
  <?php component('dashboard/filter-date', [
    'section_class'     => 'max-w-lg mb-8',
    'aria_label'        => 'Click analytics date range filter',
    'disable_past'      => false,
  ]); ?>

  <section class="<?= card('bg-brand-800 p-1 border-0'); ?>" aria-label="Click summary metrics cards">
    <header class="p-4">
      <h2 class="text-xl font-semibold text-white">Clicks Summary Metrics</h2>
      <p class="mt-1 text-brand-300">At-a-glance click activity, unique clickers, click-through rate, and click depth for the current 30-day period.</p>
    </header>
    <div class="mt-1 grid gap-1 sm:grid-cols-2 md:grid-cols-4">
      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Total Clicks</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">62,480</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+9.2%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Unique Clickers</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">31,920</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+6.8%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Click-Through Rate</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">4.7%</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+0.6%</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>

      <article class="<?= card('group p-4 bg-white border-0 rounded-md'); ?>">
        <header class="pb-4">
          <h3 class="text-xs font-medium uppercase text-brand-500 mb-4">Avg Clicks Per Session</h3>
          <p class="text-3xl font-semibold leading-none text-brand-900">1.34</p>
        </header>
        <div class="space-y-1">
          <p class="text-sm font-semibold text-positive-700">+0.08</p>
          <p class="text-brand-500">vs previous 30 days</p>
        </div>
      </article>
    </div>
  </section>

  <section class="grid gap-4 md:grid-cols-2 md:items-start" aria-label="Clicks trend and target summary">
    <section class="<?= card('bg-brand-600 p-1 border-0'); ?>">
      <header class="p-4">
        <h2 class="text-xl font-semibold text-white">Daily Click Volume</h2>
        <p class="mt-1 text-brand-300">Daily clicks and unique clickers over the last 30 days.</p>
      </header>
      <article class="mt-1">
        <?php component('table', [
          'columns'    => $daily_click_volume_columns,
          'rows'       => $daily_click_volume_rows,
          'appearance' => 'default',
          'spacing'    => 'default',
        ]); ?>
      </article>
    </section>

    <section class="<?= card('bg-brand-600 p-1 border-0'); ?>">
      <header class="p-4">
        <h2 class="text-xl font-semibold text-white">Top Click Targets</h2>
        <p class="mt-1 text-brand-300">Most-clicked destinations and actions in the last 30 days.</p>
      </header>
      <article class="mt-1">
        <?php component('table', [
          'columns'    => $top_click_targets_columns,
          'rows'       => $top_click_targets_rows,
          'appearance' => 'default',
          'spacing'    => 'default',
        ]); ?>
      </article>
    </section>
  </section>
</article>
<?php layout('dashboard/partials/dashboard-end'); ?>
