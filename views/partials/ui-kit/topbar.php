<?php

declare(strict_types=1);

$ui_kit_links = isset($ui_kit_links) && is_array($ui_kit_links) ? $ui_kit_links : [];
?>
<header class="ui-kit-topbar sticky top-0 z-30 border-b border-brand-200 bg-white/95 backdrop-blur">
  <div class="mx-auto flex w-full max-w-[1400px] flex-col px-4 lg:px-6">
    <div class="flex items-center justify-between gap-4 py-3">
      <div class="min-w-0">
        <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Theme Starter</p>
        <h1 class="truncate text-base font-semibold text-brand-900">UI Kit Documentation</h1>
      </div>

      <div class="hidden items-center gap-2 sm:flex">
        <a
          class="btn btn--ghost btn--sm inline-flex rounded-lg border border-brand-200 bg-white px-3 py-1.5 text-xs font-medium text-brand-700"
          href="#patterns"
        >
          Pattern Preview
        </a>
        <a
          class="btn btn--primary btn--sm inline-flex rounded-lg border border-transparent bg-brand-900 px-3 py-1.5 text-xs font-medium text-white"
          href="<?= e(path('/')); ?>"
        >
          Back To Home
        </a>
      </div>
    </div>

    <details class="ui-kit-topbar__mobile-nav border-t border-brand-200 py-2 sm:hidden">
      <summary class="cursor-pointer list-none text-sm font-medium text-brand-700">
        Browse sections
      </summary>
      <nav aria-label="UI Kit section links" class="pt-2">
        <ul class="space-y-1">
          <?php foreach ($ui_kit_links as $link): ?>
            <?php
            $link_id    = isset($link['id']) ? trim((string) $link['id']) : '';
            $link_label = isset($link['label']) ? trim((string) $link['label']) : '';
            ?>
            <?php if ($link_id === '' || $link_label === ''): ?>
              <?php continue; ?>
            <?php endif; ?>
            <li>
              <a class="inline-flex text-sm text-brand-600 hover:text-brand-900" href="#<?= e($link_id); ?>">
                <?= e($link_label); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </details>
  </div>
</header>
