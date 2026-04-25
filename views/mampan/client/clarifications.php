<?php

declare(strict_types=1);

$page_title   = 'Clarifications';
$page_current = 'client-clarifications';

$clarifications = [
  [
    'title'               => 'Clarification #004 - Energy Monitoring Logs',
    'question'            => 'Please share the latest 3 months of chilled water trend logs.',
    'due_date'            => '2026-04-28',
    'status'              => 'Awaiting Reply',
    'consultant_question' => 'The current file only includes one month. Could you upload all three months so we can complete this review?',
    'client_reply'        => 'Draft saved. We are collecting the remaining logs from the FM team.',
    'reply_label'         => 'Reply',
    'reply_href'          => '#',
    'upload_label'        => 'Upload File',
    'upload_href'         => '#',
  ],
  [
    'title'               => 'Clarification #006 - Rainwater O&M Manual',
    'question'            => 'Please include the calibration section in the O&M manual.',
    'due_date'            => '2026-04-30',
    'status'              => 'Under Review',
    'consultant_question' => 'Thank you for your upload. We are reviewing the new section and will update you shortly.',
    'client_reply'        => 'Updated manual uploaded on 2026-04-24.',
    'reply_label'         => 'Add Reply',
    'reply_href'          => '#',
    'upload_label'        => 'Upload File',
    'upload_href'         => '#',
  ],
];

layout('dashboard-client', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Reply to consultant questions here. Clear replies help move your submission forward faster.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <?php component('client/client-clarification-list', [
    'section_title'       => 'Questions Needing Your Reply',
    'section_description' => 'Each clarification includes the question, due date, and your latest response.',
    'clarifications'      => $clarifications,
  ]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
