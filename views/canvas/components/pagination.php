<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Pagination';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/pagination',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Pagination',
    'header_subtitle'        => 'Reference for data-driven page navigation, item range context, and empty state handling.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use `current_page`, `per_page`, and `total_items` to drive pagination state from data.</li>
      <li>Use `show_info` when users need context for current range and total records.</li>
      <li>Keep Prev/Next as primary controls and clamp navigation at first and last page.</li>
      <li>Disable controls when only one page is available to communicate empty or single-page state.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Default (Prev + Next Clamp)</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Connected previous and next controls with compact numbered pages and ellipsis for long ranges.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('pagination', [
          'current_page' => 1,
          'per_page'     => 10,
          'total_items'  => 100,
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Pagination with Info</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Add item range context to help users understand where they are in large datasets.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('pagination', [
          'current_page' => 7,
          'per_page'     => 10,
          'total_items'  => 240,
          'show_info'    => true,
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Single Page / Empty State</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Keep controls disabled when no additional pages are available.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('pagination', [
          'current_page' => 1,
          'per_page'     => 10,
          'total_items'  => 0,
          'show_info'    => true,
        ]); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
