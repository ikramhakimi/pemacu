<?php

declare(strict_types=1);

$canvas_primary     = isset($canvas_primary) ? (string) $canvas_primary : 'components';
$canvas_active_link = isset($canvas_active_link) ? (string) $canvas_active_link : '';

$overview_link        = '/canvas/components';
$component_links      = canvas_links('components');
$component_overview   = $component_links[0] ?? null;
$component_sub_links  = array_slice($component_links, 1);
$pattern_overview_raw = '/canvas/patterns#overview';

$is_overview_active = $canvas_active_link === $overview_link || $canvas_active_link === '/canvas/components';
$is_components_open = $canvas_primary === 'components';
$is_patterns_open   = $canvas_primary === 'patterns';
?>
<nav class="p-1">
  <p class="mb-3 text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Canvas</p>
  <ul class="space-y-2">
    <li>
      <a
        class="<?= e($is_overview_active ? 'inline-flex items-center gap-2 text-sm font-semibold text-brand-900' : 'inline-flex items-center gap-2 text-sm text-brand-700 hover:text-brand-900'); ?>"
        href="<?= e(path($overview_link)); ?>"
      >
        <?php icon('home-6-line', ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
        <span>Overview</span>
      </a>
    </li>

    <li>
      <details class="group" <?= $is_components_open ? 'open' : ''; ?>>
        <summary class="flex cursor-pointer list-none items-center justify-between rounded-md py-1 text-sm font-semibold text-brand-900">
          <span class="inline-flex items-center gap-2">
            <?php icon('box-1-line', ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
            <span>UI Components</span>
          </span>
          <span class="text-brand-500 opacity-0 transition-all duration-150 group-hover:opacity-100 group-open:-rotate-90">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        </summary>
        <ul class="mt-1 space-y-1 pl-8">
          <?php if (is_array($component_overview)): ?>
            <?php
            $overview_href_raw = isset($component_overview['href']) ? (string) $component_overview['href'] : '';
            $overview_label    = isset($component_overview['label']) ? (string) $component_overview['label'] : 'Overview';
            $overview_active   = $canvas_active_link === $overview_href_raw;
            ?>
            <li>
              <a
                class="<?= e($overview_active ? 'inline-flex text-sm font-semibold text-brand-900' : 'inline-flex text-sm text-brand-600 hover:text-brand-900'); ?>"
                href="<?= e(path($overview_href_raw)); ?>"
              >
                <?= e($overview_label); ?>
              </a>
            </li>
          <?php endif; ?>

          <?php foreach ($component_sub_links as $link): ?>
            <?php
            $link_href_raw = isset($link['href']) ? trim((string) $link['href']) : '';
            $link_label    = isset($link['label']) ? trim((string) $link['label']) : '';
            $is_active     = $canvas_active_link !== '' && $link_href_raw === $canvas_active_link;
            ?>
            <?php if ($link_href_raw === '' || $link_label === ''): ?>
              <?php continue; ?>
            <?php endif; ?>
            <li>
              <a
                class="<?= e($is_active ? 'inline-flex text-sm font-semibold text-brand-900' : 'inline-flex text-sm text-brand-600 hover:text-brand-900'); ?>"
                href="<?= e(path($link_href_raw)); ?>"
              >
                <?= e($link_label); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </details>
    </li>

    <li>
      <details class="group" <?= $is_patterns_open ? 'open' : ''; ?>>
        <summary class="flex cursor-pointer list-none items-center justify-between rounded-md py-1 text-sm font-semibold text-brand-900">
          <span class="inline-flex items-center gap-2">
            <?php icon('function-line', ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
            <span>UI Patterns</span>
          </span>
          <span class="text-brand-500 opacity-0 transition-all duration-150 group-hover:opacity-100 group-open:-rotate-90">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        </summary>
        <ul class="mt-1 space-y-1 pl-8">
          <li>
            <a
              class="<?= e($canvas_primary === 'patterns' ? 'inline-flex text-sm font-semibold text-brand-900' : 'inline-flex text-sm text-brand-600 hover:text-brand-900'); ?>"
              href="<?= e(path($pattern_overview_raw)); ?>"
            >
              Overview
            </a>
          </li>
        </ul>
      </details>
    </li>
  </ul>
</nav>
