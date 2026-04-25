<?php

declare(strict_types=1);

$recommendations = isset($recommendations) && is_array($recommendations) ? $recommendations : [];
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="report-recommendation-list-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="report-recommendation-list-heading" class="text-lg font-semibold text-zinc-900">Consultant Recommendations</h2>
  </header>

  <ol class="mt-4 space-y-3">
    <?php foreach ($recommendations as $recommendation): ?>
      <?php
      $title = isset($recommendation['title']) ? trim((string) $recommendation['title']) : '-';
      $note  = isset($recommendation['note']) ? trim((string) $recommendation['note']) : '';
      ?>
      <li class="rounded-md border border-zinc-200 bg-zinc-50 p-3">
        <p class="font-medium text-zinc-900"><?= e($title); ?></p>
        <?php if ($note !== ''): ?>
          <p class="mt-1 text-sm text-zinc-700"><?= e($note); ?></p>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
