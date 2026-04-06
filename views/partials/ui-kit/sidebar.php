<?php

declare(strict_types=1);

$ui_kit_links = isset($ui_kit_links) && is_array($ui_kit_links) ? $ui_kit_links : [];
?>
<aside class="ui-kit-sidebar hidden lg:block">
  <nav
    aria-label="UI Kit navigation"
    class="sticky top-24 rounded-xl border border-brand-200 bg-white p-4 shadow-sm"
  >
    <p class="mb-3 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Contents</p>
    <ul class="space-y-1.5">
      <?php foreach ($ui_kit_links as $link): ?>
        <?php
        $link_id    = isset($link['id']) ? trim((string) $link['id']) : '';
        $link_label = isset($link['label']) ? trim((string) $link['label']) : '';
        ?>
        <?php if ($link_id === '' || $link_label === ''): ?>
          <?php continue; ?>
        <?php endif; ?>
        <li>
          <a
            class="inline-flex text-sm text-brand-600 transition-colors hover:text-brand-900"
            href="#<?= e($link_id); ?>"
          >
            <?= e($link_label); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
</aside>
