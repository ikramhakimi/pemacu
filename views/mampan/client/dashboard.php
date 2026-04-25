<?php

declare(strict_types=1);

$page_title   = 'Dashboard';
$page_current = 'client-dashboard';

$header_data = [
  'project_name'     => 'Menara Harmoni Office Retrofit',
  'client_company'   => 'Harmoni Asset Holdings Berhad',
  'current_stage'    => 'Evidence Collection',
  'progress_percent' => 68,
  'progress_label'   => 'Submission progress',
  'stage_note'       => 'Most core documents are in. A few final items are needed to move to final review.',
];

$summary_cards = [
  ['label' => 'Pending Actions', 'value' => '5', 'helper' => 'Tasks waiting for your team', 'tone' => 'warning', 'icon_name' => 'task-line'],
  ['label' => 'Missing Documents', 'value' => '3', 'helper' => 'Files still required', 'tone' => 'negative', 'icon_name' => 'file-list-3-line'],
  ['label' => 'Clarifications Awaiting Reply', 'value' => '2', 'helper' => 'Questions from consultant', 'tone' => 'warning', 'icon_name' => 'question-answer-line'],
  ['label' => 'Reports Ready', 'value' => '2', 'helper' => 'Available for review', 'tone' => 'positive', 'icon_name' => 'file-chart-line'],
  ['label' => 'Sign-off Status', 'value' => 'Waiting Your Approval', 'helper' => 'Final step before submission', 'tone' => 'info', 'icon_name' => 'checkbox-circle-line'],
];

$next_actions = [
  [
    'title'        => 'Upload chilled water system logs',
    'why'          => 'This helps confirm your building energy performance before final review.',
    'category'     => 'Upload',
    'related_item' => 'Energy',
    'due_date'     => '2026-04-27',
    'priority'     => 'High',
    'button_label' => 'Upload File',
    'button_href'  => path('/mampan/client/upload-center'),
  ],
  [
    'title'        => 'Reply to clarification for energy monitoring',
    'why'          => 'Your reply is needed so the consultant can close this item and avoid delay.',
    'category'     => 'Clarification',
    'related_item' => 'EE2 Energy Monitoring',
    'due_date'     => '2026-04-28',
    'priority'     => 'High',
    'button_label' => 'Reply Now',
    'button_href'  => path('/mampan/client/clarifications'),
  ],
  [
    'title'        => 'Revise low-VOC certificate submission',
    'why'          => 'A revised file is required to verify your material compliance claim.',
    'category'     => 'Upload',
    'related_item' => 'Materials',
    'due_date'     => '2026-04-29',
    'priority'     => 'Medium',
    'button_label' => 'Replace File',
    'button_href'  => path('/mampan/client/upload-center'),
  ],
  [
    'title'        => 'Review the latest Gap Analysis Report',
    'why'          => 'This report highlights what is complete and what still needs attention.',
    'category'     => 'Review',
    'related_item' => 'Gap Analysis Report',
    'due_date'     => '2026-04-30',
    'priority'     => 'Medium',
    'button_label' => 'View Report',
    'button_href'  => path('/mampan/client/reports'),
  ],
  [
    'title'        => 'Approve final sign-off',
    'why'          => 'Approval is required before the consultant can proceed with final submission.',
    'category'     => 'Sign-off',
    'related_item' => 'Final Submission',
    'due_date'     => '2026-05-02',
    'priority'     => 'High',
    'button_label' => 'Open Sign-off',
    'button_href'  => path('/mampan/client/signoff'),
  ],
];

layout('dashboard-client', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'See what needs your attention and complete the next steps quickly.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <?php component('client/client-header', $header_data); ?>

  <section aria-labelledby="client-dashboard-summary-heading">
    <h2 id="client-dashboard-summary-heading" class="sr-only">Client summary cards</h2>
    <div class="grid gap-3 sm:grid-cols-2 xl:grid-cols-5">
      <?php foreach ($summary_cards as $summary_card): ?>
        <?php component('client/client-summary-card', $summary_card); ?>
      <?php endforeach; ?>
    </div>
  </section>

  <?php component('client/client-action-list', [
    'section_title'       => 'What You Need To Do Next',
    'section_description' => 'Complete these tasks in order to keep your project on track.',
    'actions'             => $next_actions,
  ]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
