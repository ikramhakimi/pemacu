<?php

declare(strict_types=1);

$recommendations = isset($recommendations) && is_array($recommendations) ? $recommendations : [];
?>
<section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="report-recommendation-list-heading">
  <header class="border-b border-brand-200 pb-4">
    <h2 id="report-recommendation-list-heading" class="text-lg font-semibold text-brand-900">Consultant Recommendations</h2>
  </header>

  <ol class="mt-4 space-y-3">
    <?php foreach ($recommendations as $recommendation): ?>
      <?php
      $title = isset($recommendation['title']) ? trim((string) $recommendation['title']) : '-';
      $note  = isset($recommendation['note']) ? trim((string) $recommendation['note']) : '';
      ?>
      <li class="rounded-md border border-brand-200 bg-brand-50 p-3">
        <p class="font-medium text-brand-900"><?= e($title); ?></p>
        <?php if ($note !== ''): ?>
          <p class="mt-1 text-sm text-brand-700"><?= e($note); ?></p>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</section>
