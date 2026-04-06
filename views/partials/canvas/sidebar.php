<?php

declare(strict_types=1);

$canvas_primary     = isset($canvas_primary) ? (string) $canvas_primary : 'components';
$canvas_links       = isset($canvas_links) && is_array($canvas_links) ? $canvas_links : [];
$canvas_active_link = isset($canvas_active_link) ? (string) $canvas_active_link : '';
?>
<nav class="p-1">
  <p class="mb-3 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Canvas</p>
  <div class="mb-4 flex items-center gap-3 text-xs font-medium">
    <a
      class="<?= e($canvas_primary === 'components' ? 'text-brand-900' : 'text-brand-500 hover:text-brand-900'); ?>"
      href="<?= e(path('/canvas/components')); ?>"
    >
      Components
    </a>
    <a
      class="<?= e($canvas_primary === 'patterns' ? 'text-brand-900' : 'text-brand-500 hover:text-brand-900'); ?>"
      href="<?= e(path('/canvas/patterns')); ?>"
    >
      Patterns
    </a>
  </div>
  <ul class="space-y-1.5">
    <?php foreach ($canvas_links as $link): ?>
      <?php
      $link_href_raw  = isset($link['href']) ? trim((string) $link['href']) : '';
      $link_label     = isset($link['label']) ? trim((string) $link['label']) : '';
      $is_anchor_link = strpos($link_href_raw, '#') === 0;
      $link_href      = $is_anchor_link ? $link_href_raw : path($link_href_raw);
      $is_active      = $canvas_active_link !== '' && $link_href_raw === $canvas_active_link;
      $link_classes   = $is_active
        ? 'inline-flex text-sm font-semibold text-brand-900'
        : 'inline-flex text-sm text-brand-600 transition-colors hover:text-brand-900';
      ?>
      <?php if ($link_href_raw === '' || $link_label === ''): ?>
        <?php continue; ?>
      <?php endif; ?>
      <li>
        <a class="<?= e($link_classes); ?>" href="<?= e($link_href); ?>">
          <?= e($link_label); ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
