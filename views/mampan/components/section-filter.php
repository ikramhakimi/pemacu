<?php

declare(strict_types=1);

/*
Component: Mampan Section Filter
Purpose: Render a reusable filter strip from API payload metadata.
Data Contract:
- $section_filter['items'] (array<array{label:string, href:string, is_active?:bool, count?:int}>)
- $section_filter['action'] (array{label:string, href:string, variant?:string, class?:string}, optional)
- $section_filter['aria_label'] (string, optional)
- $section_filter['class_name'] (string, optional)
*/

$section_filter_data = isset($section_filter) && is_array($section_filter) ? $section_filter : [];

$class_name = isset($section_filter_data['class_name']) ? trim((string) $section_filter_data['class_name']) : '';
$aria_label = isset($section_filter_data['aria_label']) ? trim((string) $section_filter_data['aria_label']) : '';
$items      = isset($section_filter_data['items']) && is_array($section_filter_data['items']) ? $section_filter_data['items'] : [];
$action     = isset($section_filter_data['action']) && is_array($section_filter_data['action']) ? $section_filter_data['action'] : [];

if ($aria_label === '') {
  $aria_label = 'Requirement filter navigation';
}

$container_class = 'section-filter border-t border-brand-200 pt-5 pb-5 lg:flex lg:items-start lg:justify-between lg:gap-4';

if ($class_name !== '') {
  $container_class .= ' ' . $class_name;
}

$action_label = isset($action['label']) ? trim((string) $action['label']) : '';
$action_href = isset($action['href']) ? trim((string) $action['href']) : '';
$action_variant = isset($action['variant']) ? trim((string) $action['variant']) : 'primary';
$action_class = isset($action['class']) ? trim((string) $action['class']) : 'bg-primary-700!important shadow-none';
?>
<div class="<?= e($container_class); ?>">
  <nav class="section-filter__menu lg:flex-1" aria-label="<?= e($aria_label); ?>">
    <div class="flex flex-wrap gap-1">
      <?php foreach ($items as $item): ?>
        <?php
        $label = isset($item['label']) ? trim((string) $item['label']) : '';
        $href  = isset($item['href']) ? trim((string) $item['href']) : '';
        $is_active = isset($item['is_active']) && $item['is_active'] === true;
        $count = isset($item['count']) ? (int) $item['count'] : 0;

        if ($label === '' || $href === '') {
          continue;
        }

        $item_class = 'inline-flex gap-2 items-center rounded-md px-4 py-2 text-sm font-medium transition-colors';
        $item_class .= $is_active
          ? ' bg-brand-900 text-white'
          : ' bg-brand-300 text-brand-700 hover:bg-brand-400';
        $count_class = $is_active
          ? 'bg-white/20 text-white'
          : 'bg-brand-500 text-white';
        ?>
        <a
          href="<?= e($href); ?>"
          class="<?= e($item_class); ?>"
          <?= $is_active ? 'aria-current="page"' : ''; ?>
        >
          <span><?= e($label); ?></span>
          <span class="<?= e($count_class); ?> font-normal text-xs px-2 leading-5 rounded-full -mr-1"><?= e((string) $count); ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </nav>

  <?php if ($action_label !== '' && $action_href !== ''): ?>
    <div class="section-filter__action mt-4 lg:mt-0 lg:shrink-0">
      <?php component('button', [
        'label'   => $action_label,
        'variant' => $action_variant,
        'href'    => $action_href,
        'class'   => $action_class,
      ]); ?>
    </div>
  <?php endif; ?>
</div>
