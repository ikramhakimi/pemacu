<?php

declare(strict_types=1);

$page_title   = 'Clarification Detail';
$page_current = 'consultant-rfi';
$project_current = 'project-rfi';

$rfi_number = 'RFI #008';
$subject    = 'AHU Commissioning Report Test Results';
$status     = 'Under Review';
$priority   = 'High';

$status_tone_map = [
  'Open'                => 'neutral',
  'Awaiting Client'     => 'warning',
  'Awaiting Consultant' => 'neutral',
  'Under Review'        => 'warning',
  'Resolved'            => 'positive',
  'Closed'              => 'positive',
  'Overdue'             => 'negative',
];

$priority_tone_map = ['High' => 'negative', 'Medium' => 'warning', 'Low' => 'neutral'];

$detail_panel = [
  'rfi_no'           => $rfi_number,
  'subject'          => $subject,
  'question_request' => 'Please provide complete AHU commissioning test results, including airflow balance sheet, static pressure readings, and control sequence verification.',
  'reason_request'   => 'Current report contains summary statement only. Detailed test data is required for commissioning verification evidence under EE commissioning credits.',
  'requested_by'     => 'Ir. Aisyah Kamaruddin (Lead Consultant)',
  'assigned_to'      => 'Commissioning Agent (Client)',
  'created_date'     => '2026-04-20 09:10',
  'due_date'         => '2026-04-28',
  'priority'         => $priority,
  'status'           => $status,
];

$thread_messages = [
  [
    'author'     => 'Ir. Aisyah Kamaruddin',
    'role'       => 'Consultant',
    'timestamp'  => '2026-04-20 09:10',
    'body'       => 'Test result sheets are not attached. Please submit full commissioning records for AHU-01 to AHU-04.',
    'attachment' => '',
  ],
  [
    'author'     => 'Daniel Ong',
    'role'       => 'Client',
    'timestamp'  => '2026-04-21 14:35',
    'body'       => 'We have attached latest commissioning summary and raw data extract from the Cx team.',
    'attachment' => 'AHU_Commissioning_Data_Extract_v1.xlsx',
  ],
  [
    'author'     => 'Commissioning Lead',
    'role'       => 'Consultant',
    'timestamp'  => '2026-04-22 10:02',
    'body'       => 'Sequence-of-operation test results for AHU-03 are still missing. Please correct and re-upload.',
    'attachment' => '',
  ],
  [
    'author'     => 'Daniel Ong',
    'role'       => 'Client',
    'timestamp'  => '2026-04-23 16:18',
    'body'       => 'Uploaded revised report Rev B with missing sequence test sheets included.',
    'attachment' => 'AHU_Commissioning_Report_RevB.pdf',
  ],
  [
    'author'     => 'Ir. Aisyah Kamaruddin',
    'role'       => 'Consultant',
    'timestamp'  => '2026-04-24 09:40',
    'body'       => 'Received. Reviewing revised test results before marking this clarification resolved.',
    'attachment' => '',
  ],
];

$linked_context = [
  'project_stage'         => 'Evidence Collection',
  'linked_document'       => 'AHU Commissioning Report Rev B',
  'linked_gbi_credit'     => 'EE Commissioning / Verification',
  'related_evidence_item' => 'Commissioning test results',
  'document_hub_status'   => 'Need Revision',
  'people_involved'       => [
    ['name' => 'Ir. Aisyah Kamaruddin', 'role' => 'Lead Consultant'],
    ['name' => 'Daniel Ong', 'role' => 'Mechanical Engineer (Client)'],
    ['name' => 'Azlan Yusof', 'role' => 'Commissioning Lead'],
  ],
  'due_date'              => '2026-04-28',
  'sla_note'              => 'SLA target: response within 3 working days from assignment.',
];

$status_timeline = [
  ['step_name' => 'Created', 'status' => 'Completed', 'timestamp' => '2026-04-20 09:10', 'description' => 'Clarification created by lead consultant.'],
  ['step_name' => 'Assigned to Client', 'status' => 'Completed', 'timestamp' => '2026-04-20 09:15', 'description' => 'Assigned to commissioning agent and client M&E lead.'],
  ['step_name' => 'Client Responded', 'status' => 'Completed', 'timestamp' => '2026-04-21 14:35', 'description' => 'Initial response submitted with data extract.'],
  ['step_name' => 'Under Consultant Review', 'status' => 'Current', 'timestamp' => '2026-04-24 09:40', 'description' => 'Consultant checking revised Rev B attachment.'],
  ['step_name' => 'Resolved', 'status' => 'Pending', 'timestamp' => '-', 'description' => 'Will be marked resolved after validation completion.'],
];

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <header class="rounded-lg border border-zinc-200 bg-white p-5">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <?php component('button', ['label' => 'Back to Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index'), 'variant' => 'default', 'size' => 'sm']); ?>
      <div class="flex flex-wrap items-center gap-2">
        <?php component('badge', ['items' => [['label' => $status, 'tone' => $status_tone_map[$status]]]]); ?>
        <?php component('badge', ['items' => [['label' => $priority . ' Priority', 'tone' => $priority_tone_map[$priority]]]]); ?>
      </div>
    </div>
    <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-zinc-500"><?= e($rfi_number); ?></p>
    <h1 class="mt-1 text-2xl font-semibold text-zinc-900 md:text-3xl"><?= e($subject); ?></h1>
  </header>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Clarification detail layout">
    <div class="space-y-5 xl:col-span-8">
      <?php component('rfi/rfi-detail-panel', $detail_panel); ?>
      <?php component('rfi/rfi-message-thread', ['messages' => $thread_messages]); ?>
      <?php component('rfi/rfi-response-form', [
        'default_response' => 'Please include AHU-03 sequence test sheets and confirm measured airflow against design values.',
      ]); ?>
    </div>

    <div class="space-y-5 xl:col-span-4">
      <?php component('rfi/rfi-linked-context', $linked_context); ?>
      <?php component('rfi/rfi-status-timeline', ['timeline_items' => $status_timeline]); ?>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
