<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Dropdown';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');
$dropdown_base_items = [
  ['type' => 'label', 'label' => 'Quick Actions'],
  ['label' => 'Edit details', 'href' => '#'],
  ['label' => 'Duplicate entry', 'href' => '#'],
  ['type' => 'divider'],
  ['type' => 'label', 'label' => 'Danger Zone'],
  [
    'type'      => 'button',
    'label'     => 'Transfer ownership (disabled)',
    'disabled'  => true,
    'item_class' => 'cursor-not-allowed text-brand-400',
  ],
  [
    'type'      => 'button',
    'label'     => 'Delete workspace',
    'item_class' => 'text-negative-700 hover:bg-negative-50',
  ],
];
$dropdown_navigation_items = [
  ['label' => 'Documentation', 'href' => '#'],
  ['label' => 'Release notes', 'href' => '#'],
  ['label' => 'Status page', 'href' => '#'],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/dropdown',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Dropdown',
    'header_subtitle'        => 'Reference for trigger styles, menu alignment, and contextual action grouping.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Dropdown Base
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-base',
            'items'       => $dropdown_base_items,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Dropdown A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg items-center justify-center gap-4">
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-filter',
            'trigger'     => [
              'label' => 'Filter',
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[180px]',
            ],
            'items'       => [
              ['label' => 'All items', 'href' => '#'],
              ['label' => 'Assigned to me', 'href' => '#'],
            ],
          ]); ?>
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-settings',
            'trigger'     => [
              'label'         => 'Settings',
              'icon_name'     => 'settings-3-line',
              'icon_position' => 'left',
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[180px]',
            ],
            'items'       => [
              ['label' => 'Preferences', 'href' => '#'],
              ['label' => 'Notifications', 'href' => '#'],
            ],
          ]); ?>
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-icon-only',
            'align'       => 'right',
            'trigger'     => [
              'label'      => 'More actions',
              'aria_label' => 'More actions',
              'icon_name'  => 'more-2-fill',
              'icon_only'  => true,
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[180px]',
            ],
            'items'       => [
              ['label' => 'Rename', 'href' => '#'],
              ['label' => 'Archive', 'href' => '#'],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Dropdown B
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg items-center justify-center gap-4">
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-size-sm',
            'trigger'     => [
              'label' => 'Small',
              'size'  => 'sm',
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[160px]',
            ],
            'items'       => [
              ['label' => 'View', 'href' => '#'],
              ['label' => 'Edit', 'href' => '#'],
            ],
          ]); ?>
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-size-md',
            'trigger'     => [
              'label' => 'Default',
              'size'  => 'md',
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[180px]',
            ],
            'items'       => [
              ['label' => 'View', 'href' => '#'],
              ['label' => 'Edit', 'href' => '#'],
            ],
          ]); ?>
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-size-lg',
            'trigger'     => [
              'label' => 'Large',
              'size'  => 'lg',
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[180px]',
            ],
            'items'       => [
              ['label' => 'View', 'href' => '#'],
              ['label' => 'Edit', 'href' => '#'],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Dropdown C
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-link-trigger',
            'trigger'     => [
              'type'      => 'link',
              'label'     => 'Manage links',
              'icon_name' => 'arrow-down-s-line',
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[200px]',
            ],
            'items'       => [
              ['label' => 'Open record', 'href' => '#'],
              ['label' => 'Share access', 'href' => '#'],
              ['label' => 'Archive record', 'href' => '#'],
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Dropdown D
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('dropdown', [
            'dropdown_id' => 'canvas-dropdown-navigation',
            'trigger'     => [
              'type'      => 'link',
              'label'     => 'Resources',
              'icon_name' => 'arrow-down-s-line',
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[240px]',
            ],
            'items'       => $dropdown_navigation_items,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
