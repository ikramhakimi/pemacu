<?php
declare(strict_types=1);

/**
 * Component: nav
 * Purpose: Render a composable site navigation that groups links, dropdowns, utility actions, search, profile, and CTA buttons.
 * Anatomy:
 * - nav.nav[data-nav]
 *   - .nav__desktop
 *     - .nav__level.nav__level--primary
 *       - .nav__inner.nav__inner--primary
 *       - .nav__zone--left (brand)
 *       - .nav__zone--center (menu)
 *       - .nav__zone--right (search/actions/profile/cta)
 *     - .nav__level.nav__level--secondary (optional)
 *       - .nav__inner.nav__inner--secondary
 *         - .nav__zone--center (menu)
 *   - .nav__mobile[data-nav-mobile]
 *     - .nav-mobile__bar
 *     - .nav-mobile__overlay
 *       - .nav-mobile__backdrop
 *       - .nav-mobile__drawer[data-nav-mobile-drawer]
 * Data Contract:
 * - `brand` (array): [`label`, `href`, `class`, `logo_html`].
 * - `menu_items` (array): menu rows.
 *   - link row: [`type` => `link`, `label`, `href`, `class`]
 *   - dropdown row: [`type` => `dropdown`, `label`, `dropdown_id`, `align`, `links`, `trigger_class`, `menu_class`, `item_class`]
 * - `ecommerce_actions` (array): utility action rows [`href`, `icon_name`, `label`, `count`, `class`].
 * - `search` (array): [`enabled`, `label`, `id`, `name`, `placeholder`, `class`].
 * - `profile` (array): [`name`, `show_name`, `dropdown_id`, `avatar_item`, `dropdown_items`, `trigger_class`, `menu_class`].
 * - `cta_buttons` (array): button configs forwarded to `component('button', ...)`.
 * - `mobile` (array): [`label`, `title`, `main_links`, `extra_links`].
 * - `classes` (array): optional class overrides for `root`, `desktop`, `inner`, `left`, `center`, `right`, `menu_list`, `actions_list`, `level_secondary`, `center_row_inner`.
 * - `layout` (array): optional layout toggles [`center_second_row` => bool].
 */

$brand = isset($brand) && is_array($brand)
  ? $brand
  : [];
$menu_items = isset($menu_items) && is_array($menu_items)
  ? array_values($menu_items)
  : [];
$ecommerce_actions = isset($ecommerce_actions) && is_array($ecommerce_actions)
  ? array_values($ecommerce_actions)
  : [];
$search = isset($search) && is_array($search)
  ? $search
  : [];
$profile = isset($profile) && is_array($profile)
  ? $profile
  : [];
$cta_buttons = isset($cta_buttons) && is_array($cta_buttons)
  ? array_values($cta_buttons)
  : [];
$mobile = isset($mobile) && is_array($mobile)
  ? $mobile
  : [];
$classes = isset($classes) && is_array($classes)
  ? $classes
  : [];

$brand_label = isset($brand['label']) && is_string($brand['label']) && trim($brand['label']) !== ''
  ? trim($brand['label'])
  : 'Business Name';
$brand_href = isset($brand['href']) && is_string($brand['href']) && trim($brand['href']) !== ''
  ? trim($brand['href'])
  : path('/');
$brand_class = isset($brand['class']) && is_string($brand['class']) ? trim($brand['class']) : '';
$brand_logo_html = isset($brand['logo_html']) && is_string($brand['logo_html']) && trim($brand['logo_html']) !== ''
  ? trim($brand['logo_html'])
  : '';

$search_enabled = isset($search['enabled']) ? (bool) $search['enabled'] : true;
$search_id = isset($search['id']) && is_string($search['id']) && trim($search['id']) !== ''
  ? trim($search['id'])
  : 'nav-search';
$search_name = isset($search['name']) && is_string($search['name']) && trim($search['name']) !== ''
  ? trim($search['name'])
  : 'nav_search';
$search_label = isset($search['label']) && is_string($search['label']) && trim($search['label']) !== ''
  ? trim($search['label'])
  : 'Search';
$search_placeholder = isset($search['placeholder']) && is_string($search['placeholder']) && trim($search['placeholder']) !== ''
  ? trim($search['placeholder'])
  : 'Search products...';
$search_class = isset($search['class']) && is_string($search['class']) ? trim($search['class']) : '';

$profile_name = isset($profile['name']) && is_string($profile['name']) && trim($profile['name']) !== ''
  ? trim($profile['name'])
  : 'Account';
$profile_show_name = isset($profile['show_name']) ? (bool) $profile['show_name'] : true;
$profile_dropdown_id = isset($profile['dropdown_id']) && is_string($profile['dropdown_id']) && trim($profile['dropdown_id']) !== ''
  ? trim($profile['dropdown_id'])
  : 'nav-profile';
$profile_avatar_item = isset($profile['avatar_item']) && is_array($profile['avatar_item'])
  ? $profile['avatar_item']
  : ['image_src' => path('/assets/images/avatars/avatar-01.jpg'), 'image_alt' => 'Profile avatar', 'size' => '32'];
$profile_dropdown_items = isset($profile['dropdown_items']) && is_array($profile['dropdown_items']) && $profile['dropdown_items'] !== []
  ? $profile['dropdown_items']
  : [
      ['label' => 'My Account', 'href' => '#'],
      ['label' => 'Orders', 'href' => '#'],
      ['type' => 'divider'],
      ['label' => 'Sign out', 'href' => '#'],
    ];
$profile_trigger_class = isset($profile['trigger_class']) && is_string($profile['trigger_class']) ? trim($profile['trigger_class']) : '';
$profile_menu_class = isset($profile['menu_class']) && is_string($profile['menu_class']) ? trim($profile['menu_class']) : '';

$mobile_label = isset($mobile['label']) && is_string($mobile['label']) && trim($mobile['label']) !== ''
  ? trim($mobile['label'])
  : 'Menu';
$mobile_title = isset($mobile['title']) && is_string($mobile['title']) && trim($mobile['title']) !== ''
  ? trim($mobile['title'])
  : $brand_label;
$mobile_main_links = isset($mobile['main_links']) && is_array($mobile['main_links']) && $mobile['main_links'] !== []
  ? array_values($mobile['main_links'])
  : [];
$mobile_extra_links = isset($mobile['extra_links']) && is_array($mobile['extra_links'])
  ? array_values($mobile['extra_links'])
  : [];

if ($menu_items === []) {
  $menu_items = [
    ['type' => 'link', 'label' => 'Home', 'href' => path('/')],
    ['type' => 'dropdown', 'label' => 'Shop', 'dropdown_id' => 'nav-shop', 'links' => [['label' => 'All Products', 'href' => '#'], ['label' => 'New Arrivals', 'href' => '#']]],
    ['type' => 'link', 'label' => 'Contact', 'href' => path('/contact')],
  ];
}

if ($mobile_main_links === []) {
  foreach ($menu_items as $menu_item) {
    $menu_type = isset($menu_item['type']) ? trim((string) $menu_item['type']) : 'link';
    if ($menu_type === 'dropdown') {
      $dropdown_links = isset($menu_item['links']) && is_array($menu_item['links']) ? $menu_item['links'] : [];
      foreach ($dropdown_links as $dropdown_link) {
        $mobile_main_links[] = [
          'label' => isset($dropdown_link['label']) ? (string) $dropdown_link['label'] : '',
          'href'  => isset($dropdown_link['href']) ? (string) $dropdown_link['href'] : '#',
        ];
      }
      continue;
    }

    $mobile_main_links[] = [
      'label' => isset($menu_item['label']) ? (string) $menu_item['label'] : '',
      'href'  => isset($menu_item['href']) ? (string) $menu_item['href'] : '#',
    ];
  }
}

$root_class = isset($classes['root']) && is_string($classes['root']) ? trim($classes['root']) : '';
$desktop_class = isset($classes['desktop']) && is_string($classes['desktop']) ? trim($classes['desktop']) : '';
$inner_class = isset($classes['inner']) && is_string($classes['inner']) ? trim($classes['inner']) : '';
$left_class = isset($classes['left']) && is_string($classes['left']) ? trim($classes['left']) : '';
$center_class = isset($classes['center']) && is_string($classes['center']) ? trim($classes['center']) : '';
$right_class = isset($classes['right']) && is_string($classes['right']) ? trim($classes['right']) : '';
$menu_list_class = isset($classes['menu_list']) && is_string($classes['menu_list']) ? trim($classes['menu_list']) : '';
$actions_list_class = isset($classes['actions_list']) && is_string($classes['actions_list']) ? trim($classes['actions_list']) : '';
$level_secondary_class = isset($classes['level_secondary']) && is_string($classes['level_secondary']) ? trim($classes['level_secondary']) : '';
$center_row_inner_class = isset($classes['center_row_inner']) && is_string($classes['center_row_inner']) ? trim($classes['center_row_inner']) : '';
$layout = isset($layout) && is_array($layout)
  ? $layout
  : [];
$center_second_row = isset($layout['center_second_row']) ? (bool) $layout['center_second_row'] : false;

$resolved_root_class = trim(implode(' ', array_filter([
  'nav nav--component',
  $root_class,
])));
$resolved_desktop_class = trim(implode(' ', array_filter([
  'nav__desktop hidden md:block',
  $desktop_class,
])));
$resolved_inner_class = trim(implode(' ', array_filter([
  'nav__inner nav__inner--primary mx-auto max-w-7xl px-4 py-3',
  $inner_class,
])));
$resolved_left_class = trim(implode(' ', array_filter([
  'nav__zone nav__zone--left flex items-center col-start-1 justify-start text-left',
  $left_class,
])));
$resolved_center_class = trim(implode(' ', array_filter([
  'nav__zone nav__zone--center flex items-center col-start-2 justify-center',
  $center_class,
])));
$resolved_right_class = trim(implode(' ', array_filter([
  'nav__zone nav__zone--right flex items-center col-start-3 justify-end',
  $right_class,
])));
$resolved_menu_list_class = trim(implode(' ', array_filter([
  'nav__list flex items-center space-x-4 leading-5',
  $menu_list_class,
])));
$resolved_actions_list_class = trim(implode(' ', array_filter([
  'nav__actions flex items-center gap-2',
  $actions_list_class,
])));
$resolved_center_row_inner_class = trim(implode(' ', array_filter([
  'nav__inner nav__inner--secondary mx-auto max-w-7xl px-4 py-3',
  $center_row_inner_class,
])));

ob_start();
component('avatar', ['items' => [$profile_avatar_item]]);
$profile_avatar_markup = trim((string) ob_get_clean());
$profile_trigger_markup = $profile_show_name
  ? $profile_avatar_markup . '<span class="hidden lg:inline">' . e($profile_name) . '</span>'
  : $profile_avatar_markup;
?>
<div class="<?= e($resolved_root_class); ?>" data-nav>
  <nav class="<?= e($resolved_desktop_class); ?>" aria-label="Site navigation">
    <div class="nav__level nav__level--primary">
      <div class="<?= e($resolved_inner_class); ?>">
        <div class="<?= e($center_second_row ? 'nav__bar flex items-center justify-between gap-4' : 'nav__bar grid items-center grid-cols-[1fr_auto_1fr] gap-4'); ?>">
          <div class="<?= e($resolved_left_class); ?>">
            <a class="<?= e(trim('nav__logo text-xl font-semibold tracking-tight text-brand-900 ' . $brand_class)); ?>" href="<?= e($brand_href); ?>">
              <?php if ($brand_logo_html !== ''): ?>
                <?= $brand_logo_html; ?>
                <span class="sr-only"><?= e($brand_label); ?></span>
              <?php else: ?>
                <?= e($brand_label); ?>
              <?php endif; ?>
            </a>
          </div>

          <?php if (!$center_second_row): ?>
            <div class="<?= e($resolved_center_class); ?>">
              <ul class="<?= e($resolved_menu_list_class); ?>">
                <?php foreach ($menu_items as $menu_item): ?>
                  <?php
                  $menu_type = isset($menu_item['type']) ? trim((string) $menu_item['type']) : 'link';
                  $item_label = isset($menu_item['label']) ? (string) $menu_item['label'] : '';
                  $item_class = isset($menu_item['class']) ? trim((string) $menu_item['class']) : '';
                  ?>
                  <li class="<?= e(trim('nav__item ' . $item_class)); ?>">
                    <?php if ($menu_type === 'dropdown'): ?>
                      <?php if (isset($menu_item['items']) && is_array($menu_item['items']) && $menu_item['items'] !== []): ?>
                        <?php component('dropdown', [
                          'dropdown_id' => isset($menu_item['dropdown_id']) ? (string) $menu_item['dropdown_id'] : strtolower(preg_replace('/[^a-z0-9]+/i', '-', $item_label)),
                          'align' => isset($menu_item['align']) ? (string) $menu_item['align'] : 'left',
                          'trigger' => [
                            'type' => 'link',
                            'label' => $item_label,
                            'class' => isset($menu_item['trigger_class']) ? (string) $menu_item['trigger_class'] : 'font-medium text-brand-700 hover:text-brand-900',
                          ],
                          'menu' => [
                            'class' => isset($menu_item['menu_class']) ? (string) $menu_item['menu_class'] : '',
                            'min_width_class' => isset($menu_item['min_width_class']) ? (string) $menu_item['min_width_class'] : 'min-w-[240px]',
                          ],
                          'items' => $menu_item['items'],
                        ]); ?>
                      <?php else: ?>
                        <?php component('dropdown-navigation', [
                          'dropdown_id' => isset($menu_item['dropdown_id']) ? (string) $menu_item['dropdown_id'] : strtolower(preg_replace('/[^a-z0-9]+/i', '-', $item_label)),
                          'dropdown_label' => $item_label,
                          'dropdown_align' => isset($menu_item['align']) ? (string) $menu_item['align'] : 'left',
                          'trigger_class' => isset($menu_item['trigger_class']) ? (string) $menu_item['trigger_class'] : 'dropdown__trigger inline-flex items-center gap-1 font-medium text-brand-700 hover:text-brand-900',
                          'dropdown_menu_class' => isset($menu_item['menu_class']) ? (string) $menu_item['menu_class'] : '',
                          'dropdown_links' => isset($menu_item['links']) && is_array($menu_item['links']) ? $menu_item['links'] : [],
                        ]); ?>
                      <?php endif; ?>
                    <?php else: ?>
                      <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(isset($menu_item['href']) ? (string) $menu_item['href'] : '#'); ?>">
                        <?= e($item_label); ?>
                      </a>
                    <?php endif; ?>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <div class="<?= e($resolved_right_class); ?>">
            <div class="flex items-center gap-3">
            <?php if ($search_enabled): ?>
              <div class="<?= e(trim('w-[240px] ' . $search_class)); ?>">
                <label class="sr-only" for="<?= e($search_id); ?>"><?= e($search_label); ?></label>
                <?php component('input-group', [
                  'type' => 'search',
                  'id' => $search_id,
                  'name' => $search_name,
                  'placeholder' => $search_placeholder,
                  'icon_name' => 'search-line',
                  'size' => 'md',
                ]); ?>
              </div>
            <?php endif; ?>

            <ul class="<?= e($resolved_actions_list_class); ?>">
              <?php foreach ($ecommerce_actions as $action): ?>
                <?php
                $action_label = isset($action['label']) ? (string) $action['label'] : 'Action';
                $action_count = isset($action['count']) ? (string) $action['count'] : '';
                $action_class = isset($action['class']) ? trim((string) $action['class']) : '';
                $action_icon_size = isset($action['icon_size']) && is_string($action['icon_size']) && trim($action['icon_size']) !== ''
                  ? trim($action['icon_size'])
                  : '18';
                $action_radius_class = isset($action['radius_class']) && is_string($action['radius_class']) && trim($action['radius_class']) !== ''
                  ? trim($action['radius_class'])
                  : 'rounded-md';
                ?>
                <li class="nav__action-item">
                  <a
                    class="<?= e(trim('relative inline-flex h-9 w-9 items-center justify-center border border-brand-200 text-brand-700 hover:bg-brand-100 hover:text-brand-900 ' . $action_radius_class . ' ' . $action_class)); ?>"
                    href="<?= e(isset($action['href']) ? (string) $action['href'] : '#'); ?>"
                    aria-label="<?= e($action_label); ?>"
                  >
                    <?php icon(isset($action['icon_name']) ? (string) $action['icon_name'] : 'shopping-bag-3-line', ['icon_size' => $action_icon_size]); ?>
                    <?php if ($action_count !== ''): ?>
                      <span class="absolute -right-1 -top-1 inline-flex min-w-4 items-center justify-center rounded-full bg-primary-600 px-1.5 text-[10px] font-semibold leading-4 text-white">
                        <?= e($action_count); ?>
                      </span>
                    <?php endif; ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>

            <?php if ($profile !== []): ?>
              <?php component('dropdown', [
                'dropdown_id' => $profile_dropdown_id,
                'align' => 'right',
                'trigger' => [
                  'type' => 'button',
                  'aria_label' => 'Open profile menu',
                  'content' => $profile_trigger_markup,
                  'is_html' => true,
                  'class' => trim('p-0 whitespace-nowrap align-middle hover:bg-transparent ' . $profile_trigger_class),
                ],
                'menu' => [
                  'class' => $profile_menu_class,
                  'min_width_class' => 'min-w-[220px]',
                ],
                'items' => $profile_dropdown_items,
              ]); ?>
            <?php endif; ?>

            <?php foreach ($cta_buttons as $cta_button): ?>
              <?php if (is_array($cta_button)): ?>
                <?php component('button', $cta_button); ?>
              <?php endif; ?>
            <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if ($center_second_row): ?>
      <div class="<?= e(trim('nav__level nav__level--secondary ' . $level_secondary_class)); ?>">
        <div class="<?= e($resolved_center_row_inner_class); ?>">
          <div class="<?= e($resolved_center_class); ?>">
            <ul class="<?= e($resolved_menu_list_class); ?>">
              <?php foreach ($menu_items as $menu_item): ?>
                <?php
                $menu_type = isset($menu_item['type']) ? trim((string) $menu_item['type']) : 'link';
                $item_label = isset($menu_item['label']) ? (string) $menu_item['label'] : '';
                $item_class = isset($menu_item['class']) ? trim((string) $menu_item['class']) : '';
                ?>
                <li class="<?= e(trim('nav__item ' . $item_class)); ?>">
                  <?php if ($menu_type === 'dropdown'): ?>
                    <?php if (isset($menu_item['items']) && is_array($menu_item['items']) && $menu_item['items'] !== []): ?>
                      <?php component('dropdown', [
                        'dropdown_id' => isset($menu_item['dropdown_id']) ? (string) $menu_item['dropdown_id'] : strtolower(preg_replace('/[^a-z0-9]+/i', '-', $item_label)),
                        'align' => isset($menu_item['align']) ? (string) $menu_item['align'] : 'left',
                        'trigger' => [
                          'type' => 'link',
                          'label' => $item_label,
                          'class' => isset($menu_item['trigger_class']) ? (string) $menu_item['trigger_class'] : 'font-medium text-brand-700 hover:text-brand-900',
                        ],
                        'menu' => [
                          'class' => isset($menu_item['menu_class']) ? (string) $menu_item['menu_class'] : '',
                          'min_width_class' => isset($menu_item['min_width_class']) ? (string) $menu_item['min_width_class'] : 'min-w-[240px]',
                        ],
                        'items' => $menu_item['items'],
                      ]); ?>
                    <?php else: ?>
                      <?php component('dropdown-navigation', [
                        'dropdown_id' => isset($menu_item['dropdown_id']) ? (string) $menu_item['dropdown_id'] : strtolower(preg_replace('/[^a-z0-9]+/i', '-', $item_label)),
                        'dropdown_label' => $item_label,
                        'dropdown_align' => isset($menu_item['align']) ? (string) $menu_item['align'] : 'left',
                        'trigger_class' => isset($menu_item['trigger_class']) ? (string) $menu_item['trigger_class'] : 'dropdown__trigger inline-flex items-center gap-1 font-medium text-brand-700 hover:text-brand-900',
                        'dropdown_menu_class' => isset($menu_item['menu_class']) ? (string) $menu_item['menu_class'] : '',
                        'dropdown_links' => isset($menu_item['links']) && is_array($menu_item['links']) ? $menu_item['links'] : [],
                      ]); ?>
                    <?php endif; ?>
                  <?php else: ?>
                    <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(isset($menu_item['href']) ? (string) $menu_item['href'] : '#'); ?>">
                      <?= e($item_label); ?>
                    </a>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </nav>

  <div class="nav nav--mobile border-b border-brand-200 bg-white md:hidden" data-nav-mobile>
    <div class="nav-mobile__bar flex items-center justify-between px-4 py-4">
      <a class="nav-mobile__logo inline-flex font-semibold text-brand-900" href="<?= e($brand_href); ?>">
        <?= e($brand_label); ?>
      </a>
      <button
        class="nav-mobile__toggle inline-flex items-center rounded-md border border-brand-200 px-3 py-2 font-medium text-brand-900"
        type="button"
        data-nav-mobile-open
        aria-expanded="false"
        aria-controls="nav-mobile-drawer-<?= e($profile_dropdown_id); ?>"
      >
        <?= e($mobile_label); ?>
      </button>
    </div>

    <div class="nav-mobile__overlay fixed inset-0 z-50 hidden" data-nav-mobile-overlay>
      <button
        class="nav-mobile__backdrop absolute inset-0 bg-brand-900/40"
        type="button"
        data-nav-mobile-backdrop
        aria-label="Dismiss menu"
      ></button>

      <aside
        id="nav-mobile-drawer-<?= e($profile_dropdown_id); ?>"
        class="nav-mobile__drawer absolute right-0 top-0 h-full w-80 max-w-[85vw] translate-x-full border-l border-brand-200 bg-white transition-transform duration-200 ease-out"
        data-nav-mobile-drawer
        role="dialog"
        aria-modal="true"
        aria-label="Mobile navigation"
        tabindex="-1"
      >
        <div class="nav-mobile__drawer-head flex items-center justify-between border-b border-brand-200 px-4 py-4">
          <span class="nav-mobile__drawer-title font-semibold text-brand-900"><?= e($mobile_title); ?></span>
          <button
            class="nav-mobile__close inline-flex items-center rounded-md border border-brand-200 px-3 py-2 font-medium text-brand-900"
            type="button"
            data-nav-mobile-close
            aria-label="Close menu"
          >
            X
          </button>
        </div>

        <div class="nav-mobile__drawer-body px-4 py-4">
          <div class="nav-mobile__main">
            <ul class="nav-mobile__list space-y-2">
              <?php foreach ($mobile_main_links as $mobile_link): ?>
                <li class="nav-mobile__item">
                  <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(isset($mobile_link['href']) ? (string) $mobile_link['href'] : '#'); ?>">
                    <?= e(isset($mobile_link['label']) ? (string) $mobile_link['label'] : 'Link'); ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

          <?php if ($mobile_extra_links !== []): ?>
            <div class="nav-mobile__extra mt-4 border-t border-brand-200 pt-4">
              <ul class="nav-mobile__list space-y-2">
                <?php foreach ($mobile_extra_links as $mobile_link): ?>
                  <li class="nav-mobile__item">
                    <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(isset($mobile_link['href']) ? (string) $mobile_link['href'] : '#'); ?>">
                      <?= e(isset($mobile_link['label']) ? (string) $mobile_link['label'] : 'Link'); ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>
      </aside>
    </div>
  </div>
</div>
