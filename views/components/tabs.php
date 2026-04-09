<?php
declare(strict_types=1);

/**
 * Component: tabs
 * Purpose: Render data-driven tabs with shared interactive behavior for documentation demos.
 * Anatomy:
 * - .tabs
 *   - .tabs__list[role=tablist]
 *     - .tabs__item.btn[role=tab]
 *   - .tabs__panel[role=tabpanel]
 * Optional:
 * - underline / pills / gradient button visual styles
 * - labels with icons and badges
 * - dark and tinted backgrounds
 * Data Contract:
 * - variant (string, optional): one of the predefined demo variation ids.
 */
$active_variant = isset($variant) ? trim((string) $variant) : '';

$underline_items = [
  ['label' => 'Overview', 'panel' => 'Summary and KPI snapshot for this area.'],
  ['label' => 'Details', 'panel' => 'Expanded information for audits and review.'],
  ['label' => 'Activity', 'panel' => 'Timeline of recent changes and events.'],
];

$pills_items = [
  ['label' => 'All', 'panel' => 'All records in a single unified list.'],
  ['label' => 'Open', 'panel' => 'Only active records that still need attention.'],
  ['label' => 'Closed', 'panel' => 'Completed records for reference and reporting.'],
];

$tabs_variations = [
  'underline' => [
    'aria_label'          => 'Tabs with underline',
    'wrapper_class'       => 'tabs w-full',
    'list_class'          => 'tabs__list inline-flex flex-wrap items-center gap-6 border-b border-brand-200',
    'item_base_class'     => 'tabs__item -mb-[1px] inline-flex items-center px-1 pb-3 text-sm font-medium transition-colors transition-shadow',
    'item_active_class'   => 'text-brand-900 shadow-[inset_0_-2px_0_0_theme(colors.primary.600)]',
    'item_inactive_class' => 'text-brand-600 hover:text-brand-900 hover:shadow-[inset_0_-1px_0_0_theme(colors.brand.600)]',
    'panel_wrap_class'    => 'mt-3 rounded-md border border-brand-200 bg-brand-50 p-3 text-sm text-brand-700',
    'items'               => $underline_items,
  ],
  'underline-full' => [
    'aria_label'          => 'Full width tabs with underline',
    'wrapper_class'       => 'tabs w-full',
    'list_class'          => 'tabs__list grid w-full grid-cols-3 border-b border-brand-200',
    'item_base_class'     => 'tabs__item -mb-[1px] inline-flex items-center justify-center px-3 pb-3 text-sm font-medium transition-colors transition-shadow',
    'item_active_class'   => 'text-brand-900 shadow-[inset_0_-2px_0_0_theme(colors.primary.600)]',
    'item_inactive_class' => 'text-brand-600 hover:text-brand-900 hover:shadow-[inset_0_-1px_0_0_theme(colors.brand.600)]',
    'panel_wrap_class'    => 'mt-3 rounded-md border border-brand-200 bg-brand-50 p-3 text-sm text-brand-700',
    'items'               => [
      ['label' => 'Starter', 'panel' => 'Starter plan essentials and basic onboarding details.'],
      ['label' => 'Growth', 'panel' => 'Growth plan options with collaboration features.'],
      ['label' => 'Scale', 'panel' => 'Scale plan with advanced controls and support.'],
    ],
  ],
  'underline-badges' => [
    'aria_label'             => 'Tabs with underline and badges',
    'wrapper_class'          => 'tabs w-full',
    'list_class'             => 'tabs__list inline-flex flex-wrap items-center gap-6 border-b border-brand-200',
    'item_base_class'        => 'tabs__item -mb-[1px] inline-flex items-center gap-2 px-1 pb-3 text-sm font-medium transition-colors transition-shadow',
    'item_active_class'      => 'text-brand-900 shadow-[inset_0_-2px_0_0_theme(colors.primary.600)]',
    'item_inactive_class'    => 'text-brand-600 hover:text-brand-900 hover:shadow-[inset_0_-1px_0_0_theme(colors.brand.600)]',
    'panel_wrap_class'       => 'mt-3 rounded-md border border-brand-200 bg-brand-50 p-3 text-sm text-brand-700',
    'badge_active_class'     => 'bg-brand-900 text-white',
    'badge_inactive_class'   => 'bg-brand-200 text-brand-700',
    'badge_base_class'       => 'rounded-full px-2 py-0.5 text-xs font-semibold',
    'items'                  => [
      ['label' => 'Inbox', 'badge' => '18', 'panel' => 'Open incoming messages requiring action.'],
      ['label' => 'Pending', 'badge' => '7', 'panel' => 'Pending items waiting for approval.'],
      ['label' => 'Archive', 'badge' => '92', 'panel' => 'Historical records saved for reference.'],
    ],
  ],
  'underline-icons' => [
    'aria_label'          => 'Tabs with underline and icons',
    'wrapper_class'       => 'tabs w-full',
    'list_class'          => 'tabs__list inline-flex flex-wrap items-center gap-6 border-b border-brand-200',
    'item_base_class'     => 'tabs__item -mb-[1px] inline-flex items-center gap-2 px-1 pb-3 text-sm font-medium transition-colors transition-shadow',
    'item_active_class'   => 'text-brand-900 shadow-[inset_0_-2px_0_0_theme(colors.primary.600)]',
    'item_inactive_class' => 'text-brand-600 hover:text-brand-900 hover:shadow-[inset_0_-1px_0_0_theme(colors.brand.600)]',
    'panel_wrap_class'    => 'mt-3 rounded-md border border-brand-200 bg-brand-50 p-3 text-sm text-brand-700',
    'items'               => [
      ['label' => 'Dashboard', 'icon' => 'home-6-line', 'panel' => 'Top level workspace status and quick actions.'],
      ['label' => 'Reports', 'icon' => 'file-list-3-line', 'panel' => 'Performance reports with scheduled exports.'],
      ['label' => 'Settings', 'icon' => 'settings-3-line', 'panel' => 'Workspace configuration and user preferences.'],
    ],
  ],
  'pills' => [
    'aria_label'          => 'Tabs in pills',
    'wrapper_class'       => 'tabs w-full',
    'list_class'          => 'tabs__list inline-flex flex-wrap items-center gap-1 rounded-lg border border-brand-200 bg-white p-1',
    'item_base_class'     => 'tabs__item rounded-md px-4 py-2 text-sm font-medium transition-colors',
    'item_active_class'   => 'bg-brand-900 text-white',
    'item_inactive_class' => 'text-brand-700 hover:bg-brand-100',
    'panel_wrap_class'    => 'mt-3 rounded-md border border-brand-200 bg-brand-50 p-3 text-sm text-brand-700',
    'items'               => $pills_items,
  ],
  'pills-gray' => [
    'aria_label'          => 'Tabs in pills on gray background',
    'wrapper_class'       => 'tabs w-full rounded-lg bg-brand-100 p-2',
    'list_class'          => 'tabs__list inline-flex flex-wrap items-center gap-1',
    'item_base_class'     => 'tabs__item rounded-md px-4 py-2 text-sm font-medium transition-colors',
    'item_active_class'   => 'bg-white text-brand-900 shadow-sm',
    'item_inactive_class' => 'text-brand-700 hover:bg-white/80',
    'panel_wrap_class'    => 'mt-3 rounded-md border border-brand-200 bg-white p-3 text-sm text-brand-700',
    'items'               => $pills_items,
  ],
  'pills-dark' => [
    'aria_label'          => 'Tabs in pills on dark background',
    'wrapper_class'       => 'tabs w-full rounded-lg bg-brand-800 p-2',
    'list_class'          => 'tabs__list inline-flex flex-wrap items-center gap-1',
    'item_base_class'     => 'tabs__item rounded-md px-4 py-2 text-sm font-medium transition-colors',
    'item_active_class'   => 'bg-white text-brand-900',
    'item_inactive_class' => 'text-brand-100 hover:bg-brand-700',
    'panel_wrap_class'    => 'mt-3 rounded-md border border-brand-700 bg-brand-900 p-3 text-sm text-brand-100',
    'items'               => $pills_items,
  ],
  'button-gradient' => [
    'is_gradient' => true,
    'sizes'       => [
      [
        'label' => 'btn--sm',
        'size'  => 'sm',
        'items' => [
          ['label' => 'Day', 'panel' => 'Daily filter with compact button tabs.'],
          ['label' => 'Week', 'panel' => 'Weekly filter for short planning windows.'],
          ['label' => 'Month', 'panel' => 'Monthly filter for trend review.'],
        ],
      ],
      [
        'label' => 'btn--md',
        'size'  => 'md',
        'items' => [
          ['label' => 'Summary', 'panel' => 'Summary mode for high-level reporting.'],
          ['label' => 'Detailed', 'panel' => 'Detailed mode for item-by-item analysis.'],
          ['label' => 'Exports', 'panel' => 'Export mode for distribution workflows.'],
        ],
      ],
    ],
  ],
  'button-gradient-sm' => [
    'is_gradient' => true,
    'sizes'       => [
      [
        'label' => 'btn--sm',
        'size'  => 'sm',
        'items' => [
          ['label' => 'Day', 'panel' => 'Daily filter with compact button tabs.'],
          ['label' => 'Week', 'panel' => 'Weekly filter for short planning windows.'],
          ['label' => 'Month', 'panel' => 'Monthly filter for trend review.'],
        ],
      ],
    ],
  ],
  'button-gradient-md' => [
    'is_gradient' => true,
    'sizes'       => [
      [
        'label' => 'btn--md',
        'size'  => 'md',
        'items' => [
          ['label' => 'Summary', 'panel' => 'Summary mode for high-level reporting.'],
          ['label' => 'Detailed', 'panel' => 'Detailed mode for item-by-item analysis.'],
          ['label' => 'Exports', 'panel' => 'Export mode for distribution workflows.'],
        ],
      ],
    ],
  ],
];

if ($active_variant !== '' && !isset($tabs_variations[$active_variant])) {
  return;
}

$render_variants = $active_variant !== ''
  ? [$active_variant => $tabs_variations[$active_variant]]
  : $tabs_variations;

$tabs_instance_index = isset($GLOBALS['__tabs_component_instance_index'])
  ? (int) $GLOBALS['__tabs_component_instance_index']
  : 0;
?>
<div class="space-y-4">
  <?php foreach ($render_variants as $variant_key => $variant_config): ?>
    <?php if (!empty($variant_config['is_gradient'])): ?>
      <div class="space-y-4">
        <?php foreach ($variant_config['sizes'] as $size_config): ?>
          <?php
          $tabs_instance_index += 1;
          $size_key          = isset($size_config['size']) ? (string) $size_config['size'] : 'md';
          $size_label        = isset($size_config['label']) ? (string) $size_config['label'] : '';
          $size_items        = isset($size_config['items']) && is_array($size_config['items']) ? $size_config['items'] : [];
          $size_base_class   = $size_key === 'sm'
            ? 'tabs__item btn btn--sm -ml-px first:ml-0 inline-flex items-center justify-center rounded-none first:rounded-l-md last:rounded-r-md border h-[var(--ui-h-sm)] leading-[var(--ui-h-sm)] px-[var(--ui-px-sm)] text-sm font-medium transition-colors'
            : 'tabs__item btn btn--md -ml-px first:ml-0 inline-flex items-center justify-center rounded-none first:rounded-l-md last:rounded-r-md border h-[var(--ui-h-md)] leading-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium transition-colors';
          $size_active_class = $size_base_class . ' relative z-10 btn--primary btn--gradient border-primary-700 bg-gradient-to-b from-primary-700 to-primary-500 text-white';
          $size_inactive     = $size_base_class . ' z-0 btn--secondary btn--gradient border-brand-300 bg-gradient-to-b from-white to-brand-100 text-brand-900';
          ?>
          <div class="space-y-2">
            <?php if ($size_label !== ''): ?>
              <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-500"><?= e($size_label); ?></p>
            <?php endif; ?>
            <div
              class="tabs w-full max-w-[420px]"
              data-tabs
              data-tabs-id="<?= e($variant_key . '-' . $size_key . '-' . (string) $tabs_instance_index); ?>"
            >
              <div class="tabs__list grid w-full grid-cols-3" role="tablist" aria-label="Gradient button tabs <?= e($size_label); ?>">
                <?php foreach ($size_items as $tab_index => $tab_item): ?>
                  <?php
                  $tab_label   = isset($tab_item['label']) ? (string) $tab_item['label'] : '';
                  $tab_panel   = isset($tab_item['panel']) ? (string) $tab_item['panel'] : '';
                  $is_selected = $tab_index === 0;
                  $tab_id      = 'tab-' . $tabs_instance_index . '-' . ($tab_index + 1);
                  $panel_id    = 'panel-' . $tabs_instance_index . '-' . ($tab_index + 1);
                  ?>
                  <?php if ($tab_label === ''): ?>
                    <?php continue; ?>
                  <?php endif; ?>
                  <button
                    class="<?= e($is_selected ? $size_active_class : $size_inactive); ?>"
                    type="button"
                    role="tab"
                    id="<?= e($tab_id); ?>"
                    aria-controls="<?= e($panel_id); ?>"
                    aria-selected="<?= $is_selected ? 'true' : 'false'; ?>"
                    tabindex="<?= $is_selected ? '0' : '-1'; ?>"
                    data-active-class="<?= e($size_active_class); ?>"
                    data-inactive-class="<?= e($size_inactive); ?>"
                  >
                    <?= e($tab_label); ?>
                  </button>
                <?php endforeach; ?>
              </div>
              <?php foreach ($size_items as $tab_index => $tab_item): ?>
                <?php
                $tab_panel = isset($tab_item['panel']) ? (string) $tab_item['panel'] : '';
                $tab_id    = 'tab-' . $tabs_instance_index . '-' . ($tab_index + 1);
                $panel_id  = 'panel-' . $tabs_instance_index . '-' . ($tab_index + 1);
                ?>
                <div
                  class="tabs__panel mt-3 rounded-md border border-brand-200 bg-brand-50 p-3 text-sm text-brand-700"
                  role="tabpanel"
                  id="<?= e($panel_id); ?>"
                  aria-labelledby="<?= e($tab_id); ?>"
                  <?= $tab_index === 0 ? '' : 'hidden'; ?>
                >
                  <?= e($tab_panel); ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <?php continue; ?>
    <?php endif; ?>

    <?php
    $tabs_instance_index += 1;
    $wrapper_class       = isset($variant_config['wrapper_class']) ? (string) $variant_config['wrapper_class'] : 'tabs';
    $list_class          = isset($variant_config['list_class']) ? (string) $variant_config['list_class'] : 'tabs__list';
    $item_base_class     = isset($variant_config['item_base_class']) ? (string) $variant_config['item_base_class'] : 'tabs__item';
    $item_active_class   = isset($variant_config['item_active_class']) ? (string) $variant_config['item_active_class'] : '';
    $item_inactive_class = isset($variant_config['item_inactive_class']) ? (string) $variant_config['item_inactive_class'] : '';
    $panel_wrap_class    = isset($variant_config['panel_wrap_class']) ? (string) $variant_config['panel_wrap_class'] : 'tabs__panel mt-3';
    $aria_label          = isset($variant_config['aria_label']) ? (string) $variant_config['aria_label'] : 'Tabs';
    $badge_base_class    = isset($variant_config['badge_base_class']) ? (string) $variant_config['badge_base_class'] : '';
    $badge_active_class  = isset($variant_config['badge_active_class']) ? (string) $variant_config['badge_active_class'] : '';
    $badge_inactive      = isset($variant_config['badge_inactive_class']) ? (string) $variant_config['badge_inactive_class'] : '';
    $variant_items       = isset($variant_config['items']) && is_array($variant_config['items']) ? $variant_config['items'] : [];
    ?>
    <div class="<?= e($wrapper_class); ?>" data-tabs data-tabs-id="<?= e($variant_key . '-' . (string) $tabs_instance_index); ?>">
      <div class="<?= e($list_class); ?>" role="tablist" aria-label="<?= e($aria_label); ?>">
        <?php foreach ($variant_items as $tab_index => $tab_item): ?>
          <?php
          $tab_label   = isset($tab_item['label']) ? (string) $tab_item['label'] : '';
          $tab_icon    = isset($tab_item['icon']) ? (string) $tab_item['icon'] : '';
          $tab_badge   = isset($tab_item['badge']) ? (string) $tab_item['badge'] : '';
          $is_selected = $tab_index === 0;
          $tab_id      = 'tab-' . $tabs_instance_index . '-' . ($tab_index + 1);
          $panel_id    = 'panel-' . $tabs_instance_index . '-' . ($tab_index + 1);
          $item_class  = trim(implode(' ', [
            $item_base_class,
            $is_selected ? $item_active_class : $item_inactive_class,
          ]));
          ?>
          <?php if ($tab_label === ''): ?>
            <?php continue; ?>
          <?php endif; ?>
          <button
            class="<?= e($item_class); ?>"
            type="button"
            role="tab"
            id="<?= e($tab_id); ?>"
            aria-controls="<?= e($panel_id); ?>"
            aria-selected="<?= $is_selected ? 'true' : 'false'; ?>"
            tabindex="<?= $is_selected ? '0' : '-1'; ?>"
            data-active-class="<?= e(trim(implode(' ', [$item_base_class, $item_active_class]))); ?>"
            data-inactive-class="<?= e(trim(implode(' ', [$item_base_class, $item_inactive_class]))); ?>"
          >
            <?php if ($tab_icon !== ''): ?>
              <?php icon($tab_icon, ['icon_size' => '16']); ?>
            <?php endif; ?>
            <span><?= e($tab_label); ?></span>
            <?php if ($tab_badge !== ''): ?>
              <?php
              $badge_class = trim(implode(' ', [
                $badge_base_class,
                $is_selected ? $badge_active_class : $badge_inactive,
              ]));
              ?>
              <span
                class="<?= e($badge_class); ?>"
                data-tab-badge
                data-active-class="<?= e(trim(implode(' ', [$badge_base_class, $badge_active_class]))); ?>"
                data-inactive-class="<?= e(trim(implode(' ', [$badge_base_class, $badge_inactive]))); ?>"
              >
                <?= e($tab_badge); ?>
              </span>
            <?php endif; ?>
          </button>
        <?php endforeach; ?>
      </div>
      <?php foreach ($variant_items as $tab_index => $tab_item): ?>
        <?php
        $tab_panel = isset($tab_item['panel']) ? (string) $tab_item['panel'] : '';
        $tab_id    = 'tab-' . $tabs_instance_index . '-' . ($tab_index + 1);
        $panel_id  = 'panel-' . $tabs_instance_index . '-' . ($tab_index + 1);
        ?>
        <div
          class="tabs__panel <?= e($panel_wrap_class); ?>"
          role="tabpanel"
          id="<?= e($panel_id); ?>"
          aria-labelledby="<?= e($tab_id); ?>"
          <?= $tab_index === 0 ? '' : 'hidden'; ?>
        >
          <?= e($tab_panel); ?>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
<?php $GLOBALS['__tabs_component_instance_index'] = $tabs_instance_index; ?>
<?php if (empty($GLOBALS['__tabs_component_script_rendered'])): ?>
  <?php $GLOBALS['__tabs_component_script_rendered'] = true; ?>
  <script>
    (() => {
      const init_tabs = () => {
        const tabs_roots = document.querySelectorAll('[data-tabs]');

        if (tabs_roots.length === 0) {
          return;
        }

        const split_classes = (class_name) => class_name.trim().split(/\s+/).filter(Boolean);

        const apply_state_class = (node, active_class, inactive_class, is_active) => {
          if (!(node instanceof HTMLElement)) {
            return;
          }

          split_classes(active_class).forEach((token) => node.classList.remove(token));
          split_classes(inactive_class).forEach((token) => node.classList.remove(token));
          split_classes(is_active ? active_class : inactive_class).forEach((token) => node.classList.add(token));
        };

        tabs_roots.forEach((tabs_root) => {
          if (!(tabs_root instanceof HTMLElement) || tabs_root.dataset.tabsInitialized === 'true') {
            return;
          }

          tabs_root.dataset.tabsInitialized = 'true';

          const tab_nodes = tabs_root.querySelectorAll('[role="tab"]');
          const panel_nodes = tabs_root.querySelectorAll('[role="tabpanel"]');

          if (tab_nodes.length === 0 || panel_nodes.length === 0) {
            return;
          }

          const set_active_tab = (active_tab) => {
            tab_nodes.forEach((tab_node) => {
              if (!(tab_node instanceof HTMLElement)) {
                return;
              }

              const is_active = tab_node === active_tab;
              const active_class = tab_node.dataset.activeClass || '';
              const inactive_class = tab_node.dataset.inactiveClass || '';
              const panel_id = tab_node.getAttribute('aria-controls') || '';

              tab_node.setAttribute('aria-selected', is_active ? 'true' : 'false');
              tab_node.setAttribute('tabindex', is_active ? '0' : '-1');
              apply_state_class(tab_node, active_class, inactive_class, is_active);

              const badge_node = tab_node.querySelector('[data-tab-badge]');
              if (badge_node instanceof HTMLElement) {
                const badge_active = badge_node.dataset.activeClass || '';
                const badge_inactive = badge_node.dataset.inactiveClass || '';
                apply_state_class(badge_node, badge_active, badge_inactive, is_active);
              }

              if (panel_id !== '') {
                const panel_node = tabs_root.querySelector('#' + CSS.escape(panel_id));
                if (panel_node instanceof HTMLElement) {
                  panel_node.hidden = !is_active;
                }
              }
            });
          };

          tab_nodes.forEach((tab_node) => {
            if (!(tab_node instanceof HTMLElement)) {
              return;
            }

            tab_node.addEventListener('click', () => set_active_tab(tab_node));

            tab_node.addEventListener('keydown', (event) => {
              if (!(event instanceof KeyboardEvent)) {
                return;
              }

              const current_index = Array.from(tab_nodes).indexOf(tab_node);
              if (current_index < 0) {
                return;
              }

              let next_index = current_index;

              if (event.key === 'ArrowRight') {
                next_index = (current_index + 1) % tab_nodes.length;
              } else if (event.key === 'ArrowLeft') {
                next_index = (current_index - 1 + tab_nodes.length) % tab_nodes.length;
              } else if (event.key === 'Home') {
                next_index = 0;
              } else if (event.key === 'End') {
                next_index = tab_nodes.length - 1;
              } else {
                return;
              }

              event.preventDefault();
              const next_tab = tab_nodes[next_index];
              if (next_tab instanceof HTMLElement) {
                set_active_tab(next_tab);
                next_tab.focus();
              }
            });
          });

          const first_selected = tabs_root.querySelector('[role="tab"][aria-selected="true"]');
          if (first_selected instanceof HTMLElement) {
            set_active_tab(first_selected);
          } else if (tab_nodes[0] instanceof HTMLElement) {
            set_active_tab(tab_nodes[0]);
          }
        });
      };

      if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init_tabs, { once: true });
      } else {
        init_tabs();
      }
    })();
  </script>
<?php endif; ?>
