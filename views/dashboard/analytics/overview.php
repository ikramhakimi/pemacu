<?php

declare(strict_types=1);

$page_title   = 'Analytics - Overview';
$page_current = 'dashboard';
$trend_comparison_columns = [
  ['label' => 'Metric', 'key' => 'metric', 'class_name' => 'w-[20%]'],
  ['label' => 'Current 30D', 'key' => 'current', 'align' => 'right', 'class_name' => 'w-[30%]'],
  ['label' => 'Previous 30D', 'key' => 'previous', 'align' => 'left', 'class_name' => 'w-[30%]'],
  ['label' => 'Delta', 'key' => 'delta', 'align' => 'right', 'class_name' => 'w-[20%]'],
];
$trend_comparison_rows = [
  ['metric' => 'Sessions', 'current' => '48,920', 'previous' => '45,121', 'delta' => '+8.4%'],
  ['metric' => 'Clicks', 'current' => '62,480', 'previous' => '57,201', 'delta' => '+9.2%'],
  ['metric' => 'Leads', 'current' => '1,246', 'previous' => '1,091', 'delta' => '+14.2%'],
  ['metric' => 'Bookings', 'current' => '318', 'previous' => '294', 'delta' => '+8.2%'],
];
$funnel_summary_columns = [
  ['label' => 'Stage', 'key' => 'stage'],
  ['label' => 'Volume', 'key' => 'volume', 'align' => 'right', 'class_name' => 'w-[150px]'],
  ['label' => 'Conv. Rate', 'key' => 'conversion_rate', 'align' => 'right', 'class_name' => 'w-[150px]'],
];
$funnel_summary_rows = [
  ['stage' => 'Sessions', 'volume' => '48,920', 'conversion_rate' => '100.0%'],
  ['stage' => 'Clicks', 'volume' => '62,480', 'conversion_rate' => '127.7%'],
  ['stage' => 'Leads', 'volume' => '1,246', 'conversion_rate' => '2.5%'],
  ['stage' => 'Bookings', 'volume' => '318', 'conversion_rate' => '25.5% of leads'],
];
$top_channels_columns = [
  ['label' => 'Channel', 'key' => 'channel'],
  ['label' => 'Sessions', 'key' => 'sessions', 'align' => 'right', 'class_name' => 'w-[150px]'],
  ['label' => 'Leads', 'key' => 'leads', 'align' => 'right', 'class_name' => 'w-[150px]'],
];
$top_channels_rows = [
  ['channel' => 'instagram', 'sessions' => '12,980', 'leads' => '302'],
  ['channel' => 'google', 'sessions' => '11,420', 'leads' => '278'],
  ['channel' => 'facebook', 'sessions' => '8,760', 'leads' => '191'],
  ['channel' => 'whatsapp', 'sessions' => '5,340', 'leads' => '106'],
  ['channel' => 'referral', 'sessions' => '4,280', 'leads' => '78'],
  ['channel' => 'email', 'sessions' => '3,560', 'leads' => '64'],
];
$campaign_highlights_columns = [
  ['label' => 'Campaign', 'key' => 'campaign'],
  ['label' => 'Channel', 'key' => 'channel', 'class_name' => 'w-[150px]'],
  ['label' => 'Leads', 'key' => 'leads', 'align' => 'right', 'class_name' => 'w-[150px]'],
];
$campaign_highlights_rows = [
  ['campaign' => 'IG-AD-RAYA26', 'channel' => 'instagram', 'leads' => '118'],
  ['campaign' => 'GOOGLE-SEARCH-BRANDED', 'channel' => 'google', 'leads' => '95'],
  ['campaign' => 'GOOGLE-PMAX-STUDIO', 'channel' => 'google', 'leads' => '83'],
  ['campaign' => 'FB-AD-RAYA26', 'channel' => 'facebook', 'leads' => '71'],
  ['campaign' => 'IG-SOCIAL-RAYA26', 'channel' => 'instagram', 'leads' => '64'],
  ['campaign' => 'WHATSAPP-BROADCAST-MAR', 'channel' => 'whatsapp', 'leads' => '48'],
];
$top_pages_columns = [
  ['label' => 'Page', 'key' => 'page'],
  ['label' => 'Pageviews', 'key' => 'pageviews', 'align' => 'right', 'class_name' => 'w-[150px]'],
  ['label' => 'Unique Visitors', 'key' => 'unique_visitors', 'align' => 'right', 'class_name' => 'w-[150px]'],
];
$top_pages_rows = [
  ['page' => 'Wedding Essential', 'pageviews' => '8,420', 'unique_visitors' => '3,180'],
  ['page' => 'Corporate Lite', 'pageviews' => '7,965', 'unique_visitors' => '2,990'],
  ['page' => 'Bridal Signature', 'pageviews' => '7,110', 'unique_visitors' => '2,754'],
  ['page' => 'Family Portrait Plus', 'pageviews' => '6,788', 'unique_visitors' => '2,608'],
  ['page' => 'Maternity Glow', 'pageviews' => '6,204', 'unique_visitors' => '2,402'],
];
$top_click_targets_columns = [
  ['label' => 'Click Target', 'key' => 'target'],
  ['label' => 'Clicks', 'key' => 'clicks', 'align' => 'right', 'class_name' => 'w-[150px]'],
  ['label' => 'Unique Clickers', 'key' => 'unique_clickers', 'align' => 'right', 'class_name' => 'w-[150px]'],
];
$top_click_targets_rows = [
  ['target' => 'Book Now Button | Hero CTA', 'clicks' => '8,420', 'unique_clickers' => '4,116'],
  ['target' => 'WhatsApp Link | Contact Bar', 'clicks' => '7,365', 'unique_clickers' => '3,790'],
  ['target' => 'View Packages | Header Nav', 'clicks' => '6,904', 'unique_clickers' => '3,332'],
  ['target' => 'Book Consultation | Sticky CTA', 'clicks' => '5,988', 'unique_clickers' => '3,028'],
  ['target' => 'Portfolio Grid Item | Gallery', 'clicks' => '5,410', 'unique_clickers' => '2,780'],
];
$channel_mix_rows = [
  ['channel' => 'instagram', 'share' => '28%', 'leads' => '302', 'width_class' => 'w-[28%]'],
  ['channel' => 'google', 'share' => '24%', 'leads' => '278', 'width_class' => 'w-[24%]'],
  ['channel' => 'facebook', 'share' => '18%', 'leads' => '191', 'width_class' => 'w-[18%]'],
  ['channel' => 'whatsapp', 'share' => '11%', 'leads' => '106', 'width_class' => 'w-[11%]'],
  ['channel' => 'referral', 'share' => '9%', 'leads' => '78', 'width_class' => 'w-[9%]'],
  ['channel' => 'email', 'share' => '10%', 'leads' => '64', 'width_class' => 'w-[10%]'],
];
$campaign_health_rows = [
  ['campaign' => 'IG-AD-RAYA26', 'status' => 'Scaling', 'status_class' => 'text-positive-700'],
  ['campaign' => 'GOOGLE-PMAX-STUDIO', 'status' => 'Stable', 'status_class' => 'text-brand-700'],
  ['campaign' => 'WHATSAPP-BROADCAST-MAR', 'status' => 'Needs Attention', 'status_class' => 'text-amber-700'],
  ['campaign' => 'PARTNER-CREATOR-BOOST', 'status' => 'Testing', 'status_class' => 'text-brand-700'],
];
$goal_tracking_rows = [
  ['label' => 'Leads Target', 'current' => 1246, 'target' => 1500, 'progress' => 83],
  ['label' => 'Bookings Target', 'current' => 318, 'target' => 400, 'progress' => 80],
  ['label' => 'Revenue Target (RM)', 'current' => 142800, 'target' => 180000, 'progress' => 79],
];
$dashboard_breadcrumb_items = [
  ['label' => 'Analytics', 'href' => path('/dashboard/analytics/overview')],
  ['label' => 'Overview', 'current' => true],
];
layout('dashboard/partials/dashboard-start', [
  'page_title'                     => $page_title,
  'page_current'                   => $page_current,
  'dashboard_breadcrumb_items'     => $dashboard_breadcrumb_items,
]);
?>
<header class="app-header border-b border-brand-200 py-6 md:hidden">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900"></h1>
    <p class="mt-4 max-w-2xl text-brand-600">
      
    </p>
  </div>
</header>
<header class="md:flexs items-center gap-3 border-b border-brand-200 py-5">
    <div>
      <h1 class="text-3xl font-bold text-brand-900">Analytics Overview</h1>
      <p class="text-base text-brand-500 mt-1">A unified snapshot of traffic, engagement, clicks, and campaign outcomes for the last 30 days.</p>
    </div>
  </header>
<article class="app-article pb-20 space-y-5 pt-5">
  <?php component('dashboard/filter-date', [
    'section_class'  => 'max-w-lg',
    'aria_label'     => 'Date range filter',
    'button_variant' => 'primary',
    'disable_past'   => false,
  ]); ?>

  <section aria-label="Analytics overview summary metrics cards">
    <?php ob_start(); ?>
    <div class="grid gap-1 sm:grid-cols-2 md:grid-cols-4">
      <?php component('card', ['card' => [
        'variant'        => 'metric',
        'title'          => 'Total Sessions',
        'show_subtitle'  => false,
        'metric_title_class' => 'text-sm',
        'metric_value'   => '48,920',
        'metric_compare' => '+8.4% vs previous 30 days',
      ]]); ?>
      <?php component('card', ['card' => [
        'variant'        => 'metric',
        'title'          => 'Total Clicks',
        'show_subtitle'  => false,
        'metric_title_class' => 'text-sm',
        'metric_value'   => '62,480',
        'metric_compare' => '+9.2% vs previous 30 days',
      ]]); ?>
      <?php component('card', ['card' => [
        'variant'        => 'metric',
        'title'          => 'Campaign Leads',
        'show_subtitle'  => false,
        'metric_title_class' => 'text-sm',
        'metric_value'   => '1,246',
        'metric_compare' => '+14.2% vs previous 30 days',
      ]]); ?>
      <?php component('card', ['card' => [
        'variant'        => 'metric',
        'title'          => 'Lead Conversion Rate',
        'show_subtitle'  => false,
        'metric_title_class' => 'text-sm',
        'metric_value'   => '5.3%',
        'metric_compare' => '+0.7% vs previous 30 days',
      ]]); ?>
    </div>
    <?php
    $analytics_summary_panel_html = (string) ob_get_clean();
    component('frame', [
      'variant'          => 'base',
      'title'            => 'Analytics Summary Metrics',
      'subtitle'         => 'At-a-glance sessions, clicks, leads, and conversion rate for the current 30-day period.',
      'panel_html_items' => [$analytics_summary_panel_html],
      'render_panel_wrapper' => false,
      'class_name'       => '!ring-0',
    ]);
    ?>
  </section>

  <section class="grid gap-4 md:grid-cols-2 md:items-start" aria-label="Trend and funnel summary">
    <?php ob_start(); ?>
    <?php component('table', [
      'columns'    => $trend_comparison_columns,
      'rows'       => $trend_comparison_rows,
      'appearance' => 'default',
      'spacing'    => 'default',
    ]); ?>
    <?php
    $trend_comparison_panel_html = (string) ob_get_clean();
    component('frame', [
      'variant'          => 'base',
      'title'            => 'Trend Comparison',
      'subtitle'         => 'Current 30 days versus previous 30 days across core metrics.',
      'panel_html_items' => [$trend_comparison_panel_html],
      'render_panel_wrapper' => false,
      'class_name'       => '!ring-0',
    ]);
    ?>
    <?php ob_start(); ?>
    <?php component('table', [
      'columns'    => $funnel_summary_columns,
      'rows'       => $funnel_summary_rows,
      'appearance' => 'default',
      'spacing'    => 'default',
    ]); ?>
    <?php
    $funnel_summary_panel_html = (string) ob_get_clean();
    component('frame', [
      'variant'          => 'base',
      'title'            => 'Funnel Summary',
      'subtitle'         => 'Sessions to bookings conversion for this period.',
      'panel_html_items' => [$funnel_summary_panel_html],
      'render_panel_wrapper' => false,
      'class_name'       => '!ring-0',
    ]);
    ?>
    <?php ob_start(); ?>
    <?php component('table', [
      'columns'    => $top_pages_columns,
      'rows'       => $top_pages_rows,
      'appearance' => 'default',
      'spacing'    => 'default',
    ]); ?>
    <?php
    $top_pages_panel_html = (string) ob_get_clean();
    component('frame', [
      'variant'          => 'base',
      'title'            => 'Top 5 Pages',
      'subtitle'         => 'Most viewed pages and visitors in the last 30 days.',
      'panel_html_items' => [$top_pages_panel_html],
      'render_panel_wrapper' => false,
      'class_name'       => '!ring-0',
    ]);
    ?>
    <?php ob_start(); ?>
    <?php component('table', [
      'columns'    => $top_click_targets_columns,
      'rows'       => $top_click_targets_rows,
      'appearance' => 'default',
      'spacing'    => 'default',
    ]); ?>
    <?php
    $top_click_targets_panel_html = (string) ob_get_clean();
    component('frame', [
      'variant'          => 'base',
      'title'            => 'Top Click Targets',
      'subtitle'         => 'Most clicked UI targets and actions in the last 30 days.',
      'panel_html_items' => [$top_click_targets_panel_html],
      'render_panel_wrapper' => false,
      'class_name'       => '!ring-0',
    ]);
    ?>
  </section>

  <div class="mt-4 border-t border-dashed border-brand-300"></div>

  <section aria-label="Goal tracking">
    <?php ob_start(); ?>
    <div class="grid gap-1 md:grid-cols-3">
      <?php foreach ($goal_tracking_rows as $goal_row): ?>
        <?php
        $goal_current_display = is_numeric($goal_row['current']) ? number_format((float) $goal_row['current']) : (string) $goal_row['current'];
        $goal_target_display  = is_numeric($goal_row['target']) ? number_format((float) $goal_row['target']) : (string) $goal_row['target'];
        ?>
        <article class="<?= card('p-4 bg-white border-0 rounded-md'); ?>">
          <header class="pb-4">
            <h3 class="text-xs font-medium uppercase text-brand-500 mb-4"><?= e($goal_row['label']); ?></h3>
            <p class="text-3xl font-semibold leading-none text-brand-900">
              <?= e($goal_current_display); ?>
              <span class="text-base font-normal text-brand-600">/ <?= e($goal_target_display); ?></span>
            </p>
          </header>
          <div class="space-y-3">
            <?php component('progressbar', [
              'label' => (string) $goal_row['label'],
              'tone'  => 'primary',
              'value' => (float) $goal_row['progress'],
              'min'   => 0,
              'max'   => 100,
            ]); ?>
            <p class="text-brand-500"><?= e((string) $goal_row['progress']); ?>% achieved</p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
    <?php
    $goal_tracking_panel_html = (string) ob_get_clean();
    component('frame', [
      'variant'          => 'ghost-dark',
      'title'            => 'Goal Tracking',
      'subtitle'         => 'Progress against monthly business targets.',
      'panel_html_items' => [$goal_tracking_panel_html],
      'render_panel_wrapper' => false,
      'class_name'       => 'bg-brand-800',
    ]);
    ?>
  </section>

  

  <section class="grid gap-4 md:grid-cols-6 md:items-start" aria-label="Channel mix, campaign health, and insight">
    <div class="<?= card('bg-brand-800 p-1 md:col-span-3'); ?>">
      <header class="p-4">
        <h2 class="text-xl font-semibold text-white">Channel Mix</h2>
        <p class="mt-1 text-brand-300">Traffic share and lead contribution by source channel.</p>
      </header>
      <div class="mt-1 grid gap-1 grid-cols-2 md:grid-cols-3" aria-label="Channel mix cards">
        <?php foreach ($channel_mix_rows as $mix_row): ?>
          <article class="bg-white border-0 rounded-md p-4">
            <header class="pb-4">
              <h3 class="text-xs font-medium uppercase text-brand-500 mb-4"><?= e($mix_row['channel']); ?></h3>
              <p class="mt-3 text-3xl font-semibold  leading-none text-brand-900"><?= e($mix_row['share']); ?></p>
            </header>
            <div class="space-y-4">
              <?php component('progressbar', [
                'label' => (string) $mix_row['channel'] . ' channel share',
                'tone'  => 'info',
                'size'  => 'md',
                'value' => (float) rtrim((string) $mix_row['share'], '%'),
                'min'   => 0,
                'max'   => 100,
              ]); ?>
              <p class="text-xs text-brand-600"><?= e($mix_row['leads']); ?> leads</p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="grid gap-4 md:col-span-3">
      <div class="<?= card('bg-brand-700 overflow-hidden'); ?>">
        <div class="bg-brand-800 rounded-lg pb-1">
          <header class="p-5">
            <h2 class="text-xl text-white font-semibold">Campaign Health</h2>
            <p class="mt-1 text-brand-300">Operational status for active campaigns this week.</p>
          </header>
          <ul class="<?= card('bg-white mx-1 divide-y divide-brand-200'); ?>" aria-label="Campaign health status list">
            <?php foreach ($campaign_health_rows as $health_row): ?>
              <li class="flex items-center justify-between py-3 px-4">
                <span class="font-medium text-brand-900"><?= e($health_row['campaign']); ?></span>
                <span class="text-sm font-medium <?= e($health_row['status_class']); ?>"><?= e($health_row['status']); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <p class="text-lg text-brand-300 p-4">
          Instagram campaigns generated <span class="text-white">42%</span> of total leads this period and remain the highest-performing channel for bookings.
        </p>
      </div>
    </div>
  </section>

  <div class="grid gap-4 md:grid-cols-2 md:items-start">
    <?php ob_start(); ?>
    <?php component('table', [
      'columns'    => $top_channels_columns,
      'rows'       => $top_channels_rows,
      'appearance' => 'default',
      'spacing'    => 'default',
    ]); ?>
    <?php
    $top_channels_panel_html = (string) ob_get_clean();
    component('frame', [
      'variant'              => 'base',
      'title'                => 'Top Channels',
      'subtitle'             => 'Traffic and lead contribution by channel for the last 30 days.',
      'panel_html_items'     => [$top_channels_panel_html],
      'render_panel_wrapper' => false,
      'class_name'           => '!ring-0',
    ]);
    ?>

    <?php ob_start(); ?>
    <?php component('table', [
      'columns'    => $campaign_highlights_columns,
      'rows'       => $campaign_highlights_rows,
      'appearance' => 'default',
      'spacing'    => 'default',
    ]); ?>
    <?php
    $campaign_highlights_panel_html = (string) ob_get_clean();
    component('frame', [
      'variant'              => 'base',
      'title'                => 'Campaign Highlights',
      'subtitle'             => 'Best-performing campaigns by leads generated in the last 30 days.',
      'panel_html_items'     => [$campaign_highlights_panel_html],
      'render_panel_wrapper' => false,
      'class_name'           => '!ring-0',
    ]);
    ?>
  </div>
</article>
<?php layout('dashboard/partials/dashboard-end'); ?>
