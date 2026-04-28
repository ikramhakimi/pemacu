<?php

declare(strict_types=1);

$links = isset($links) && is_array($links) ? $links : [];
?>
<nav class="rounded-lg border border-brand-200 bg-white p-4" aria-label="Mampan module navigation">
  <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Mampan Modules</p>
  <div class="mt-2 flex flex-wrap gap-2">
    <?php foreach ($links as $link_item): ?>
      <?php
      $label = isset($link_item['label']) ? trim((string) $link_item['label']) : '';
      $href  = isset($link_item['href']) ? trim((string) $link_item['href']) : '#';

      if ($label === '') {
        continue;
      }
      ?>
      <?php component('button', [
        'label'   => $label,
        'href'    => $href,
        'size'    => 'sm',
        'variant' => 'default',
        'class'   => 'rounded-full shadow-none',
      ]); ?>
    <?php endforeach; ?>
  </div>
</nav>
