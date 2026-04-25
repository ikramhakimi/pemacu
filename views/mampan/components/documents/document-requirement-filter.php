<?php

declare(strict_types=1);

$filters         = isset($filters) && is_array($filters) ? $filters : [];
$selected_filter = isset($selected_filter) ? trim((string) $selected_filter) : 'all';
$search_value    = isset($search_value) ? trim((string) $search_value) : '';
$selected_id     = isset($selected_id) ? trim((string) $selected_id) : '';
?>
<nav class="border-t border-brand-200 pt-4" aria-label="Requirement filter navigation">
  <div class="flex flex-wrap gap-2">
    <?php foreach ($filters as $filter_item): ?>
      <?php
      $label = isset($filter_item['label']) ? trim((string) $filter_item['label']) : '';
      $key   = isset($filter_item['key']) ? trim((string) $filter_item['key']) : '';
      $count = isset($filter_item['count']) ? (int) $filter_item['count'] : 0;

      if ($label === '' || $key === '') {
        continue;
      }

      $is_active = $selected_filter === $key;
      $filter_href = path('/mampan/consultant/documents/document-hub')
        . '?requirement_filter=' . urlencode($key)
        . '&requirement_search=' . urlencode($search_value)
        . '&requirement_id=' . urlencode($selected_id);
      $filter_class = 'inline-flex gap-2 items-center rounded-md px-4 py-2 text-sm font-medium transition-colors';
      $filter_class .= $is_active
        ? ' bg-brand-900 text-white'
        : ' bg-brand-100 text-brand-700 hover:bg-brand-300';
      $count_class = $is_active
        ? 'bg-white/20 text-white'
        : 'bg-brand-500 text-white';
      ?>
      <a
        href="<?= e($filter_href); ?>"
        class="<?= e($filter_class); ?>"
        <?= $is_active ? 'aria-current="page"' : ''; ?>
      >
        <span><?= e($label); ?></span>
        <span class="<?= e($count_class); ?> font-normal text-xs px-2 leading-5 rounded-full -mr-1"><?= e((string) $count); ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</nav>

<form method="get" action="<?= e(path('/mampan/consultant/documents/document-hub')); ?>" class="mt-4 max-w-lg">
  <input type="hidden" name="requirement_filter" value="<?= e($selected_filter); ?>">
  <?php if ($selected_id !== ''): ?>
    <input type="hidden" name="requirement_id" value="<?= e($selected_id); ?>">
  <?php endif; ?>

  <?php component('fields', [
    'label'       => 'Search Requirement Register',
    'helper_text' => 'Search requirement, document, credit, or owner.',
    'class'       => 'space-y-2',
    'control'     => [
      'component' => 'input',
      'props'     => [
        'name'        => 'requirement_search',
        'placeholder' => 'e.g. EE2, metering layout, EQ4 VOC, Procurement Manager',
        'value'       => $search_value,
      ],
    ],
  ]); ?>
</form>
