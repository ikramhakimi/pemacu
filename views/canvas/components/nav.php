<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Nav';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$nav_brand_logo_html = '';
ob_start();
component('placeholder-image', ['aspect-ratio' => 'h-[40px] w-[120px]']);
$nav_brand_logo_html = (string) ob_get_clean();

$nav_config = [
  'brand' => [
    'label'     => 'Sitespace',
    'href'      => path('/'),
    'logo_html' => $nav_brand_logo_html,
  ],
  'menu_items' => [
    ['type' => 'link', 'label' => 'Menu One', 'href' => path('/')],
    ['type' => 'link', 'label' => 'Menu Two', 'href' => path('/about')],
    [
      'type' => 'dropdown',
      'label' => 'Dropdown',
      'dropdown_id' => 'canvas-nav-dropdown',
      'items' => [
        ['label' => 'Option One', 'href' => '#', 'icon_name' => 'sparkling-line', 'icon_size' => '20', 'icon_class' => 'text-brand-500', 'item_class' => 'items-center gap-2'],
        ['label' => 'Option Two', 'href' => '#', 'icon_name' => 'compass-3-line', 'icon_size' => '20', 'icon_class' => 'text-brand-500', 'item_class' => 'items-center gap-2'],
        ['label' => 'Option Three', 'href' => '#', 'icon_name' => 'rocket-2-line', 'icon_size' => '20', 'icon_class' => 'text-brand-500', 'item_class' => 'items-center gap-2'],
        ['type' => 'divider'],
        ['label' => 'Option Four', 'href' => '#'],
        ['label' => 'Option Five', 'href' => '#'],
      ],
    ],
    ['type' => 'link', 'label' => 'Option', 'href' => path('/contact'), 'class' => 'border-l border-brand-300 pl-4'],
  ],
  'ecommerce_actions' => [
    ['href' => '#', 'icon_name' => 'notification-3-line', 'icon_size' => '20', 'class' => 'border-brand-300', 'label' => 'Notifications', 'count' => '2'],
    ['href' => '#', 'icon_name' => 'bookmark-3-line', 'icon_size' => '20', 'class' => 'border-brand-300', 'label' => 'Saved Items', 'count' => '5'],
  ],
  'search' => [
    'enabled' => true,
    'label' => 'Search records',
    'id' => 'canvas-nav-search',
    'name' => 'search',
    'placeholder' => 'Search records...',
  ],
  'profile' => [
    'name' => 'Ariq Rahim',
    'dropdown_id' => 'canvas-nav-profile',
    'avatar_item' => [
      'image_src' => path('/assets/images/avatars/avatar-03.jpg'),
      'image_alt' => 'Ariq Rahim',
      'size' => '32',
      'status' => 'online',
    ],
    'dropdown_items' => [
      ['label' => 'My Account', 'href' => '#'],
      ['label' => 'Activity', 'href' => '#'],
      ['type' => 'divider'],
      ['label' => 'Sign Out', 'href' => '#'],
    ],
  ],
  'cta_buttons' => [
    ['label' => 'Button', 'variant' => 'primary', 'size' => 'md'],
  ],
  'mobile' => [
    'title' => 'Workspace',
    'extra_links' => [
      ['label' => 'Notifications', 'href' => '#'],
      ['label' => 'Saved Items', 'href' => '#'],
      ['label' => 'Account', 'href' => '#'],
    ],
  ],
];

$nav_config_mega = $nav_config;
$nav_config_mega['ecommerce_actions'] = [
  ['href' => '#', 'icon_name' => 'notification-3-line', 'icon_size' => '20', 'radius_class' => 'rounded-full', 'class' => 'border-brand-300', 'label' => 'Notifications', 'count' => '2'],
  ['href' => '#', 'icon_name' => 'bookmark-3-line', 'icon_size' => '20', 'radius_class' => 'rounded-full', 'class' => 'border-brand-300', 'label' => 'Saved Items', 'count' => '5'],
];
$nav_config_mega['profile']['show_name'] = false;
$nav_config_mega['cta_buttons'] = [];
$nav_config_mega['layout'] = [
  'center_second_row' => true,
];
$nav_config_mega['classes'] = [
  'level_secondary' => 'border-t border-b border-brand-200',
];
$nav_config_mega['menu_items'] = $nav_config['menu_items'];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/nav',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Nav',
    'header_subtitle'        => 'Composable navigation with links, dropdowns, search, profile avatar menu, utility icons, and CTAs.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
  ?>
</section>

<section class="canvas-showcase">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col">
      <div class="flex items-center justify-between border-b border-brand-200 px-6 py-4 font-medium text-brand-900">
        Nav Baseline
      </div>
      <div class="bg-background p-6">
        <div class="mx-auto w-full ring-1 ring-brand-300 shadow-xl h-[300px]">
          <div class="flex items-center justify-between border-b border-brand-200 bg-brand-50 px-4 py-3 overflow-hidden">
            <div class="flex items-center gap-1" aria-hidden="true">
              <span class="h-2.5 w-2.5 rounded-full bg-negative-400"></span>
              <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
              <span class="h-2.5 w-2.5 rounded-full bg-positive-400"></span>
            </div>
            <div class="mx-4 flex-1">
              <div class="truncate rounded-md border border-brand-300 bg-white px-3 py-1.5 text-xs text-brand-600">
                https://demo.site/navigation
              </div>
            </div>
            <div class="w-[54px]" aria-hidden="true"></div>
          </div>
          <?php // Demo-only browser chrome wrapper. Keep nav component implementation independent of this UI. ?>
          <?php component('nav', $nav_config); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase">
  <div class="canvas-demo border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col">
      <div class="flex items-center justify-between border-b border-brand-200 px-6 py-4 font-medium text-brand-900">
        Nav Mega Menu
      </div>
      <div class="bg-background p-6">
        <div class="mx-auto w-full ring-1 ring-brand-300 shadow-xl h-[300px]">
          <div class="flex items-center justify-between border-b border-brand-200 bg-brand-50 px-4 py-3 overflow-hidden">
            <div class="flex items-center gap-1" aria-hidden="true">
              <span class="h-2.5 w-2.5 rounded-full bg-negative-400"></span>
              <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
              <span class="h-2.5 w-2.5 rounded-full bg-positive-400"></span>
            </div>
            <div class="mx-4 flex-1">
              <div class="truncate rounded-md border border-brand-300 bg-white px-3 py-1.5 text-xs text-brand-600">
                https://demo.site/navigation/mega-menu
              </div>
            </div>
            <div class="w-[54px]" aria-hidden="true"></div>
          </div>
          <?php // Demo-only browser chrome wrapper. Keep nav component implementation independent of this UI. ?>
          <?php component('nav', $nav_config_mega); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
