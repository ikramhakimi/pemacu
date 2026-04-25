<?php

declare(strict_types=1);

$page_title   = 'Sign-off';
$page_current = 'client-signoff';

$signoff_panel = [
  'project_name'          => 'Menara Harmoni Office Retrofit',
  'submission_readiness'  => 'Ready with a few pending confirmations',
  'key_notes'             => 'All major documents are submitted. One clarification is still under review and can be closed after your final confirmation.',
  'important_notice'      => 'By approving, you confirm that the submitted information is complete and accurate to the best of your knowledge.',
  'important_risks'       => 'If required documents are missing or inaccurate, submission timing may be affected.',
  'checklist_items'       => [
    'I have reviewed the report.',
    'I understand the submission content.',
    'I approve proceeding with final submission.',
  ],
  'approve_label'         => 'Approve Submission',
  'approve_href'          => '#',
  'request_changes_label' => 'Request Changes',
  'request_changes_href'  => path('/mampan/client/actions'),
];

layout('dashboard-client', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Review the final summary and confirm your decision.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <?php component('client/client-signoff-panel', $signoff_panel); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
