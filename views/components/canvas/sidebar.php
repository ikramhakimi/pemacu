<?php

declare(strict_types=1);

$canvas_active_link = isset($canvas_active_link) ? (string) $canvas_active_link : '';

$component_links      = canvas_links('components');
$component_overview   = $component_links[0] ?? null;
$component_sub_links  = array_slice($component_links, 1);
$layout_component_labels   = ['Accordion', 'Breadcrumb', 'Card', 'Frame', 'Tabs'];
$display_component_labels  = ['Avatar', 'Badge', 'Empty State', 'Progressbar', 'Rating', 'Table', 'Table Data'];
$overlay_component_labels  = ['Drawer', 'Modal', 'Dropdown'];
$feedback_component_labels = ['Alert', 'Toast', 'Tooltip'];
$form_component_labels     = ['Checkbox', 'Field', 'Input', 'Input Group', 'Input Stepper', 'Pick Date', 'Pick Time', 'Radio', 'Select', 'Switch', 'Textarea'];
$layout_component_links    = [];
$display_component_links   = [];
$overlay_component_links   = [];
$feedback_component_links  = [];
$form_component_links      = [];
$default_component_links   = [];
$icons_href_raw       = '/canvas/resources/icons';
$avatars_href_raw     = '/canvas/resources/avatars';
$logos_href_raw       = '';

usort($component_sub_links, static function (array $first_link, array $second_link): int {
  $first_label  = isset($first_link['label']) ? trim((string) $first_link['label']) : '';
  $second_label = isset($second_link['label']) ? trim((string) $second_link['label']) : '';

  return strcasecmp($first_label, $second_label);
});

foreach ($component_sub_links as $link) {
  $link_label = isset($link['label']) ? trim((string) $link['label']) : '';

  if (in_array($link_label, $layout_component_labels, true)) {
    $layout_component_links[] = $link;
    continue;
  }

  if (in_array($link_label, $display_component_labels, true)) {
    $display_component_links[] = $link;
    continue;
  }

  if (in_array($link_label, $overlay_component_labels, true)) {
    $overlay_component_links[] = $link;
    continue;
  }

  if (in_array($link_label, $feedback_component_labels, true)) {
    $feedback_component_links[] = $link;
    continue;
  }

  if (in_array($link_label, $form_component_labels, true)) {
    $form_component_links[] = $link;
    continue;
  }

  $default_component_links[] = $link;
}

$is_icons_active    = $canvas_active_link === $icons_href_raw;
$is_avatars_active  = $canvas_active_link === $avatars_href_raw;
$is_logos_active    = $logos_href_raw !== '' && $canvas_active_link === $logos_href_raw;
?>
<nav>
  <h2 class="font-semibold uppercase tracking-wide text-brand-500">Canvas</h2>
  
  <ul class="mt-3 divide-y divide-brand-200">
    <li class="group/sidebar-item px-2">
        <div class="leading-5 text-brand-500 text-xs uppercase font-semibold flex list-none items-center gap-3 rounded-md px-3 py-1 ">
          Resources
        </div>
        <ul>
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
    </li>
    <?php if (!empty($layout_component_links)): ?>
      <li class="group/sidebar-item px-2 pt-2 mt-2">
          <div class="leading-5 text-brand-500 text-xs uppercase font-semibold flex list-none items-center gap-3 rounded-md px-3 py-1">
            Layout
          </div>
          <ul>
            <?php foreach ($layout_component_links as $link): ?>
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
      </li>
    <?php endif; ?>
    <?php if (!empty($display_component_links)): ?>
      <li class="group/sidebar-item px-2 pt-2 mt-2">
          <div class="leading-5 text-brand-500 text-xs uppercase font-semibold flex list-none items-center gap-3 rounded-md px-3 py-1">
            Displays
          </div>
          <ul>
            <?php foreach ($display_component_links as $link): ?>
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
      </li>
    <?php endif; ?>
    <li class="group/sidebar-item px-2 pt-2 mt-2">
        <div class="leading-5 text-brand-500 text-xs uppercase font-semibold flex list-none items-center gap-3 rounded-md px-3 py-1">
          Components
        </div>
        <ul>
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

          <?php foreach ($default_component_links as $link): ?>
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
    </li>
    <?php if (!empty($overlay_component_links)): ?>
      <li class="group/sidebar-item px-2 pt-2 mt-2">
          <div class="leading-5 text-brand-500 text-xs uppercase font-semibold flex list-none items-center gap-3 rounded-md px-3 py-1">
            Overlays
          </div>
          <ul>
            <?php foreach ($overlay_component_links as $link): ?>
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
      </li>
    <?php endif; ?>
    <?php if (!empty($feedback_component_links)): ?>
      <li class="group/sidebar-item px-2 pt-2 mt-2">
          <div class="leading-5 text-brand-500 text-xs uppercase font-semibold flex list-none items-center gap-3 rounded-md px-3 py-1">
            Feedback
          </div>
          <ul>
            <?php foreach ($feedback_component_links as $link): ?>
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
      </li>
    <?php endif; ?>
    <?php if (!empty($form_component_links)): ?>
      <li class="group/sidebar-item px-2 pt-2 mt-2">
          <div class="leading-5 text-brand-500 text-xs uppercase font-semibold flex list-none items-center gap-3 rounded-md px-3 py-1">
            Form
          </div>
          <ul>
            <?php foreach ($form_component_links as $link): ?>
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
      </li>
    <?php endif; ?>
  </ul>
</nav>
