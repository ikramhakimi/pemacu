<?php

declare(strict_types=1);

$filters         = isset($filters) && is_array($filters) ? $filters : [];
$selected_filter = isset($selected_filter) ? trim((string) $selected_filter) : 'all';
$search_value    = isset($search_value) ? trim((string) $search_value) : '';
?>
<section class="rounded-lg border border-brand-200 bg-white p-4" aria-labelledby="clarification-filter-heading">
  <h2 id="clarification-filter-heading" class="text-sm font-semibold text-brand-900">Filter Clarifications</h2>

  <div class="mt-3 flex flex-wrap gap-2">
    <?php foreach ($filters as $filter_item): ?>
      <?php
      $label = isset($filter_item['label']) ? trim((string) $filter_item['label']) : '';
      $key   = isset($filter_item['key']) ? trim((string) $filter_item['key']) : '';

      if ($label === '' || $key === '') {
        continue;
      }

      $is_active = $selected_filter === $key;
      ?>
      <?php component('button', [
        'label'   => $label,
        'variant' => $is_active ? 'primary' : 'default',
        'size'    => 'sm',
        'class'   => 'rounded-full shadow-none',
      ]); ?>
    <?php endforeach; ?>
  </div>

  <div class="mt-4 max-w-xl">
    <?php component('fields', [
      'label'       => 'Search Clarification',
      'helper_text' => 'Search by RFI no, credit, document, or keyword.',
      'class'       => 'space-y-2',
      'control'     => [
        'component' => 'input',
        'props'     => [
          'name'        => 'clarification_search',
          'placeholder' => 'e.g. RFI #004, EE2, AHU commissioning, rainwater O&M',
          'value'       => $search_value,
        ],
      ],
    ]); ?>
  </div>
</section>
