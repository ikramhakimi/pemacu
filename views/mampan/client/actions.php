<?php

declare(strict_types=1);

$page_title   = 'My Actions';
$page_current = 'client-actions';

$actions = [
  [
    'title'        => 'Upload chilled water trend logs',
    'why'          => 'Needed to verify your building energy performance.',
    'category'     => 'Upload',
    'related_item' => 'Energy Monitoring',
    'due_date'     => '2026-04-27',
    'priority'     => 'High',
    'button_label' => 'Upload File',
    'button_href'  => path('/mampan/client/upload-center'),
  ],
  [
    'title'        => 'Reply clarification for EE2',
    'why'          => 'Consultant needs your confirmation to close this request.',
    'category'     => 'Clarification',
    'related_item' => 'EE2 Clarification #004',
    'due_date'     => '2026-04-28',
    'priority'     => 'High',
    'button_label' => 'Reply',
    'button_href'  => path('/mampan/client/clarifications'),
  ],
  [
    'title'        => 'Review Gap Analysis Report',
    'why'          => 'Reviewing now helps avoid rework before final submission.',
    'category'     => 'Review',
    'related_item' => 'Gap Analysis Report',
    'due_date'     => '2026-04-30',
    'priority'     => 'Medium',
    'button_label' => 'View Report',
    'button_href'  => path('/mampan/client/reports'),
  ],
  [
    'title'        => 'Approve final submission',
    'why'          => 'Your approval is required before submission can proceed.',
    'category'     => 'Sign-off',
    'related_item' => 'Final Submission Package',
    'due_date'     => '2026-05-02',
    'priority'     => 'High',
    'button_label' => 'Open Sign-off',
    'button_href'  => path('/mampan/client/signoff'),
  ],
];

layout('dashboard-client', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Your central task list. Complete these items to keep submission on schedule.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <?php component('client/client-action-list', [
    'section_title'       => 'Action List',
    'section_description' => 'Each item includes what to do, why it matters, and when it is due.',
    'actions'             => $actions,
  ]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
