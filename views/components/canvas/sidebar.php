<?php

declare(strict_types=1);

$canvas_primary     = isset($canvas_primary) ? (string) $canvas_primary : 'components';
$canvas_active_link = isset($canvas_active_link) ? (string) $canvas_active_link : '';

$component_links      = canvas_links('components');
$component_overview   = $component_links[0] ?? null;
$component_sub_links  = array_slice($component_links, 1);
$pattern_overview_raw = '/canvas/patterns#overview';
$icons_href_raw       = '/canvas/resources/icons';
$avatars_href_raw     = '/canvas/resources/avatars';
$logos_href_raw       = '';

usort($component_sub_links, static function (array $first_link, array $second_link): int {
  $first_label  = isset($first_link['label']) ? trim((string) $first_link['label']) : '';
  $second_label = isset($second_link['label']) ? trim((string) $second_link['label']) : '';

  return strcasecmp($first_label, $second_label);
});

$is_icons_active    = $canvas_active_link === $icons_href_raw;
$is_avatars_active  = $canvas_active_link === $avatars_href_raw;
$is_logos_active    = $logos_href_raw !== '' && $canvas_active_link === $logos_href_raw;
$is_resources_open  = $is_icons_active || $is_avatars_active || $is_logos_active;
$is_components_open = $canvas_primary === 'components' && !$is_resources_open;
$is_patterns_open   = $canvas_primary === 'patterns' || $is_resources_open;
?>
<nav>
  <h2 class="font-semibold uppercase tracking-wide text-brand-500">Canvas</h2>
  
  <ul class="mt-3 divide-y divide-brand-200">
    <li class="group/sidebar-item px-2">
      <details class="group" <?= $is_patterns_open ? 'open' : ''; ?>>
        <summary class="font-medium flex cursor-pointer list-none items-center gap-3 rounded-md px-3 py-1 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900">
          <?php icon('function-line', ['icon_size' => '20', 'icon_class' => 'text-brand-400']); ?>
          <span class="flex-1 text-base">Resources</span>
          <span class="text-brand-400 transition-all duration-200 lg:opacity-0 lg:group-hover/sidebar-item:opacity-100 group-open:-rotate-90">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        </summary>
        <ul class="ml-8">
          <li>
            <a
              class="<?= e($is_icons_active
                ? 'block rounded-md px-3 py-0.5 leading-5 text-brand-900 bg-brand-200 font-semibold'
                : 'block rounded-md px-3 py-0.5 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900'); ?>"
              href="<?= e(path($icons_href_raw)); ?>"
            >
              Icons
            </a>
          </li>
          <li>
            <a
              class="<?= e($is_avatars_active
                ? 'block rounded-md px-3 py-0.5 leading-5 text-brand-900 bg-brand-200 font-semibold'
                : 'block rounded-md px-3 py-0.5 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900'); ?>"
              href="<?= e(path($avatars_href_raw)); ?>"
            >
              Avatars
            </a>
          </li>
          <li>
            <a
              class="<?= e($is_logos_active
                ? 'block rounded-md px-3 py-0.5 leading-5 text-brand-900 bg-brand-200 font-semibold'
                : 'block rounded-md px-3 py-0.5 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900'); ?>"
              href="<?= e($logos_href_raw); ?>"
            >
              Logos
            </a>
          </li>
        </ul>
      </details>
    </li>
    <li class="group/sidebar-item px-2 pt-2 mt-2">
      <details class="group" <?= $is_components_open ? 'open' : ''; ?>>
        <summary class="font-medium flex cursor-pointer list-none items-center gap-3 rounded-md px-3 py-1 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900">
          <?php icon('box-1-line', ['icon_size' => '20', 'icon_class' => 'text-brand-400']); ?>
          <span class="flex-1 text-base">Components</span>
          <span class="text-brand-400 transition-all duration-200 lg:opacity-0 lg:group-hover/sidebar-item:opacity-100 group-open:-rotate-90">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        </summary>
        <ul class="ml-8">
          <?php if (is_array($component_overview)): ?>
            <?php
            $overview_href_raw = isset($component_overview['href']) ? (string) $component_overview['href'] : '';
            $overview_label    = isset($component_overview['label']) ? (string) $component_overview['label'] : 'Overview';
            $overview_active   = $canvas_active_link === $overview_href_raw;
            ?>
            <li>
              <a
                class="<?= e($overview_active
                  ? 'block rounded-md px-3 py-0.5 leading-5 text-brand-900 font-semibold'
                  : 'block rounded-md px-3 py-0.5 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900'); ?>"
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
            <?php if ($link_href_raw === $icons_href_raw): ?>
              <?php continue; ?>
            <?php endif; ?>
            <?php if ($link_href_raw === '' || $link_label === ''): ?>
              <?php continue; ?>
            <?php endif; ?>
            <li>
              <a
                class="<?= e($is_active
                  ? 'block rounded-md px-3 py-0.5 leading-5 text-brand-900 bg-brand-200 font-semibold'
                  : 'block rounded-md px-3 py-0.5 leading-5 text-brand-700 hover:bg-brand-200 hover:text-brand-900'); ?>"
                href="<?= e(path($link_href_raw)); ?>"
              >
                <?= e($link_label); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </details>
    </li>
  </ul>
</nav>
