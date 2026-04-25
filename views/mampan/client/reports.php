<?php

declare(strict_types=1);

$page_title   = 'Reports';
$page_current = 'client-reports';

$reports = [
  [
    'title'          => 'Gap Analysis Report',
    'status'         => 'Ready',
    'last_updated'   => '2026-04-24 16:45',
    'description'    => 'Shows completed items, remaining gaps, and recommended next actions.',
    'view_label'     => 'View',
    'view_href'      => path('/mampan/consultant/reports/gap-analysis-report'),
    'download_label' => 'Download',
    'download_href'  => '#',
  ],
  [
    'title'          => 'Submission Summary',
    'status'         => 'Ready',
    'last_updated'   => '2026-04-24 17:10',
    'description'    => 'Simple summary of readiness, key risks, and sign-off status.',
    'view_label'     => 'View',
    'view_href'      => path('/mampan/consultant/submission/submission-package'),
    'download_label' => 'Download',
    'download_href'  => '#',
  ],
];

layout('dashboard-client', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Review project reports and download copies for your records.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <?php component('client/client-report-list', [
    'section_title'       => 'Available Reports',
    'section_description' => 'Use these reports to review progress and prepare for final approval.',
    'reports'             => $reports,
  ]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
