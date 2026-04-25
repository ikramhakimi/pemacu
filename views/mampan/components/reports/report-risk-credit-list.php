<?php

declare(strict_types=1);

$risk_credits = isset($risk_credits) && is_array($risk_credits) ? $risk_credits : [];

$table_columns = [
  ['label' => 'Credit', 'key' => 'credit'],
  ['label' => 'Issue', 'key' => 'issue'],
  ['label' => 'Related Evidence', 'key' => 'related_evidence'],
  ['label' => 'Related Clarification / RFI', 'key' => 'related_rfi'],
  ['label' => 'Owner', 'key' => 'owner'],
  ['label' => 'Due Date', 'key' => 'due_date'],
  ['label' => 'Action', 'key' => 'action'],
];

$table_rows = [];

foreach ($risk_credits as $risk_credit) {
  $credit_code      = isset($risk_credit['credit_code']) ? trim((string) $risk_credit['credit_code']) : '-';
  $credit_title     = isset($risk_credit['credit_title']) ? trim((string) $risk_credit['credit_title']) : '-';
  $criteria_group   = isset($risk_credit['criteria_group']) ? trim((string) $risk_credit['criteria_group']) : '-';
  $points_at_risk   = isset($risk_credit['points_at_risk']) ? trim((string) $risk_credit['points_at_risk']) : '-';
  $issue            = isset($risk_credit['issue']) ? trim((string) $risk_credit['issue']) : '-';
  $related_evidence = isset($risk_credit['related_evidence']) ? trim((string) $risk_credit['related_evidence']) : '-';
  $related_rfi      = isset($risk_credit['related_rfi']) ? trim((string) $risk_credit['related_rfi']) : '-';
  $owner            = isset($risk_credit['owner']) ? trim((string) $risk_credit['owner']) : '-';
  $due_date         = isset($risk_credit['due_date']) ? trim((string) $risk_credit['due_date']) : '-';
  $action_label     = isset($risk_credit['action_label']) ? trim((string) $risk_credit['action_label']) : 'Open';
  $action_url       = isset($risk_credit['action_url']) ? trim((string) $risk_credit['action_url']) : '#';

  ob_start();
  ?>
  <div>
    <p class="font-medium text-zinc-900"><?= e($credit_code . ' - ' . $credit_title); ?></p>
    <p class="mt-1 text-xs text-zinc-600"><?= e($criteria_group); ?> | <?= e($points_at_risk); ?></p>
  </div>
  <?php
  $credit_html = (string) ob_get_clean();

  ob_start();
  component('button', ['label' => $action_label, 'href' => $action_url, 'size' => 'sm', 'variant' => 'default', 'class' => 'shadow-none']);
  $action_html = (string) ob_get_clean();

  $table_rows[] = [
    'credit'           => ['content' => $credit_html, 'is_html' => true],
    'issue'            => $issue,
    'related_evidence' => $related_evidence,
    'related_rfi'      => $related_rfi,
    'owner'            => $owner,
    'due_date'         => $due_date,
    'action'           => ['content' => $action_html, 'is_html' => true],
  ];
}
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="report-risk-credit-list-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="report-risk-credit-list-heading" class="text-lg font-semibold text-zinc-900">Risk Credit List</h2>
    <p class="mt-1 text-sm text-zinc-600">Credits currently at risk of reducing target rating confidence.</p>
  </header>

  <div class="mt-4 overflow-x-auto">
    <?php component('table', [
      'columns'       => $table_columns,
      'rows'          => $table_rows,
      'appearance'    => 'basic',
      'caption'       => 'Credits at risk table',
      'class_name'    => 'min-w-[1280px]',
      'empty_title'   => 'No risk credits',
      'empty_message' => 'Current credits are stable for target rating.',
    ]); ?>
  </div>
</section>
