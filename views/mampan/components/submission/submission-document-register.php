<?php

declare(strict_types=1);

$title            = isset($title) ? trim((string) $title) : 'Document Register';
$total_count      = isset($total_count) ? trim((string) $total_count) : '0';
$completed_count  = isset($completed_count) ? trim((string) $completed_count) : '0';
$pending_count    = isset($pending_count) ? trim((string) $pending_count) : '0';
$issue_count      = isset($issue_count) ? trim((string) $issue_count) : '0';
$link_label       = isset($link_label) ? trim((string) $link_label) : 'Open Module';
$link_href        = isset($link_href) ? trim((string) $link_href) : '#';
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="submission-document-register-heading">
  <header class="flex items-start justify-between gap-3 border-b border-zinc-200 pb-4">
    <h2 id="submission-document-register-heading" class="text-base font-semibold text-zinc-900"><?= e($title); ?></h2>
    <?php component('badge', ['items' => [['label' => $total_count . ' total', 'tone' => 'neutral']]]); ?>
  </header>

  <dl class="mt-4 grid grid-cols-2 gap-3 text-sm">
    <div class="rounded-md border border-zinc-200 bg-zinc-50 p-3">
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Completed</dt>
      <dd class="mt-1 font-semibold text-positive-700"><?= e($completed_count); ?></dd>
    </div>
    <div class="rounded-md border border-zinc-200 bg-zinc-50 p-3">
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Pending</dt>
      <dd class="mt-1 font-semibold text-attention-700"><?= e($pending_count); ?></dd>
    </div>
    <div class="rounded-md border border-zinc-200 bg-zinc-50 p-3 col-span-2">
      <dt class="text-xs uppercase tracking-wide text-zinc-500">Issue Count</dt>
      <dd class="mt-1 font-semibold text-negative-700"><?= e($issue_count); ?></dd>
    </div>
  </dl>

  <div class="mt-4 border-t border-zinc-200 pt-4">
    <?php component('button', ['label' => $link_label, 'href' => $link_href, 'size' => 'sm', 'variant' => 'default']); ?>
  </div>
</section>
