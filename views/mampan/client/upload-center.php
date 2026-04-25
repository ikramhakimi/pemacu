<?php

declare(strict_types=1);

$page_title   = 'Upload Center';
$page_current = 'client-upload-center';

$uploads = [
  [
    'document_name' => 'Chilled Water System Logs',
    'why'           => 'Needed to verify energy performance for your building.',
    'linked_area'   => 'Energy',
    'due_date'      => '2026-04-27',
    'status'        => 'Required',
    'action_label'  => 'Upload File',
    'action_href'   => '#',
  ],
  [
    'document_name' => 'Low-VOC Paint Declaration Rev B',
    'why'           => 'Needed to confirm indoor air quality material compliance.',
    'linked_area'   => 'Indoor Environment',
    'due_date'      => '2026-04-29',
    'status'        => 'Need Revision',
    'action_label'  => 'Replace File',
    'action_href'   => '#',
  ],
  [
    'document_name' => 'Rainwater Harvesting O&M Manual',
    'why'           => 'Needed to verify your water efficiency operational plan.',
    'linked_area'   => 'Water',
    'due_date'      => '2026-04-30',
    'status'        => 'Submitted',
    'action_label'  => 'Upload New Version',
    'action_href'   => '#',
  ],
];

layout('dashboard-client', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Upload the required files here. Each item explains why it is needed.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <?php component('client/client-upload-list', [
    'section_title'       => 'Required Documents',
    'section_description' => 'Upload or update files to keep your submission complete.',
    'uploads'             => $uploads,
  ]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
