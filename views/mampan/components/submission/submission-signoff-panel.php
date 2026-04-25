<?php

declare(strict_types=1);

$consultant_signoff_status = isset($consultant_signoff_status) ? trim((string) $consultant_signoff_status) : 'Not Started';
$client_signoff_status     = isset($client_signoff_status) ? trim((string) $client_signoff_status) : 'Waiting Client';
$final_approval_status     = isset($final_approval_status) ? trim((string) $final_approval_status) : 'Not Started';
$action_items              = isset($action_items) && is_array($action_items) ? $action_items : [];

$status_tone_map = [
  'Approved'       => 'positive',
  'Completed'      => 'positive',
  'Requested'      => 'warning',
  'Waiting Client' => 'warning',
  'Pending'        => 'warning',
  'Not Started'    => 'neutral',
  'Blocked'        => 'negative',
];

$consultant_tone = isset($status_tone_map[$consultant_signoff_status]) ? $status_tone_map[$consultant_signoff_status] : 'neutral';
$client_tone     = isset($status_tone_map[$client_signoff_status]) ? $status_tone_map[$client_signoff_status] : 'neutral';
$approval_tone   = isset($status_tone_map[$final_approval_status]) ? $status_tone_map[$final_approval_status] : 'neutral';
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="submission-signoff-panel-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="submission-signoff-panel-heading" class="text-lg font-semibold text-zinc-900">Sign-off Panel</h2>
  </header>

  <dl class="mt-4 space-y-3">
    <div class="flex items-center justify-between gap-3">
      <dt class="text-sm text-zinc-600">Consultant Sign-off</dt>
      <dd><?php component('badge', ['items' => [['label' => $consultant_signoff_status, 'tone' => $consultant_tone]]]); ?></dd>
    </div>
    <div class="flex items-center justify-between gap-3">
      <dt class="text-sm text-zinc-600">Client Sign-off</dt>
      <dd><?php component('badge', ['items' => [['label' => $client_signoff_status, 'tone' => $client_tone]]]); ?></dd>
    </div>
    <div class="flex items-center justify-between gap-3">
      <dt class="text-sm text-zinc-600">Final Approval</dt>
      <dd><?php component('badge', ['items' => [['label' => $final_approval_status, 'tone' => $approval_tone]]]); ?></dd>
    </div>
  </dl>

  <div class="mt-4 border-t border-zinc-200 pt-4">
    <p class="text-xs uppercase tracking-wide text-zinc-500">Actions</p>
    <div class="mt-2 grid gap-2">
      <?php foreach ($action_items as $action_item): ?>
        <?php
        $label = isset($action_item['label']) ? trim((string) $action_item['label']) : '';
        $href  = isset($action_item['href']) ? trim((string) $action_item['href']) : '#';
        $tone  = isset($action_item['tone']) ? trim((string) $action_item['tone']) : 'default';

        if ($label === '') {
          continue;
        }
        ?>
        <?php component('button', ['label' => $label, 'href' => $href, 'size' => 'sm', 'variant' => $tone === 'primary' ? 'primary' : 'default']); ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>
