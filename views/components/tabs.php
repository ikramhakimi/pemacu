<?php
declare(strict_types=1);

/**
 * Component: tabs
 * Purpose: Render one API-driven tab navigation block with accessible keyboard interaction.
 * Anatomy:
 * - .tabs[data-tabs]
 *   - .tabs__list[role=tablist]
 *     - .tabs__item[role=tab]
 *       - icon (optional)
 *       - label
 *       - .tabs__badge (optional)
 *   - .tabs__panel[role=tabpanel]
 * Data Contract:
 * - `items` (array, optional): list of tabs with `label`, `panel`, `icon_name`, `badge`, `key`.
 * - `active_index` (int, optional): selected tab index. Default: `0`.
 * - `aria_label` (string, optional): tablist label. Default: `Tabs`.
 * - `wrapper_class` (string, optional): root class override.
 * - `list_class` (string, optional): tab list class override.
 * - `item_base_class` (string, optional): base class for each tab trigger.
 * - `item_active_class` (string, optional): active tab class.
 * - `item_inactive_class` (string, optional): inactive tab class.
 * - `panel_class` (string, optional): tab panel class.
 * - `badge_base_class` (string, optional): badge base class.
 * - `badge_active_class` (string, optional): active badge class.
 * - `badge_inactive_class` (string, optional): inactive badge class.
 * - `icon_size` (string|int, optional): icon size for all tabs. Default: `16`.
 * - `class_name` (string, optional): appended root class.
 * - `id` (string, optional): custom instance id suffix.
 * - `attributes` (array, optional): additional root HTML attributes.
 */

$items                = isset($items) && is_array($items) ? array_values($items) : [];
$active_index         = isset($active_index) ? (int) $active_index : 0;
$aria_label           = isset($aria_label) ? trim((string) $aria_label) : 'Tabs';
$wrapper_class        = isset($wrapper_class) ? trim((string) $wrapper_class) : 'tabs w-full';
$list_class           = isset($list_class) ? trim((string) $list_class) : 'tabs__list flex flex-wrap items-center gap-6 border-b border-brand-200';
$item_base_class      = isset($item_base_class) ? trim((string) $item_base_class) : 'tabs__item -mb-[1px] inline-flex items-center gap-2 px-1 pb-3 font-medium transition-colors transition-shadow';
$item_active_class    = isset($item_active_class) ? trim((string) $item_active_class) : 'text-brand-900 shadow-[inset_0_-2px_0_0_theme(colors.primary.600)]';
$item_inactive_class  = isset($item_inactive_class) ? trim((string) $item_inactive_class) : 'text-brand-700 hover:text-brand-900 hover:shadow-[inset_0_-1px_0_0_theme(colors.brand.600)]';
$panel_class          = isset($panel_class) ? trim((string) $panel_class) : 'tabs__panel mt-4 text-brand-700';
$badge_base_class     = isset($badge_base_class) ? trim((string) $badge_base_class) : 'tabs__badge rounded-full px-2 py-0.5 text-xs font-semibold';
$badge_active_class   = isset($badge_active_class) ? trim((string) $badge_active_class) : 'bg-brand-900 text-white';
$badge_inactive_class = isset($badge_inactive_class) ? trim((string) $badge_inactive_class) : 'bg-brand-200 text-brand-700';
$icon_size            = isset($icon_size) ? trim((string) $icon_size) : '16';
$class_name           = isset($class_name) ? trim((string) $class_name) : '';
$custom_id            = isset($id) ? trim((string) $id) : '';
$attributes           = isset($attributes) && is_array($attributes) ? $attributes : [];

if ($items === []) {
  $items = [
    ['label' => 'Overview', 'panel' => 'Summary and KPI snapshot for this area.'],
    ['label' => 'Performance', 'panel' => 'Key growth and retention details for this period.'],
    ['label' => 'Activity', 'panel' => 'Recent timeline events and operational notes.'],
  ];
}

$normalized_items = [];

foreach ($items as $item_index => $item) {
  $item_label = is_array($item) && isset($item['label']) ? trim((string) $item['label']) : '';
  if ($item_label === '') {
    continue;
  }

  $item_panel = is_array($item) && isset($item['panel']) ? trim((string) $item['panel']) : '';
  $item_icon  = is_array($item) && isset($item['icon_name']) ? trim((string) $item['icon_name']) : '';
  $item_badge = is_array($item) && isset($item['badge']) ? trim((string) $item['badge']) : '';
  $item_key   = is_array($item) && isset($item['key']) ? trim((string) $item['key']) : (string) ($item_index + 1);

  if ($item_key === '') {
    $item_key = (string) ($item_index + 1);
  }

  $item_key = preg_replace('/[^a-z0-9_-]+/i', '-', $item_key);
  $item_key = trim((string) $item_key, '-');

  if ($item_key === '') {
    $item_key = (string) ($item_index + 1);
  }

  $normalized_items[] = [
    'label'     => $item_label,
    'panel'     => $item_panel,
    'icon_name' => $item_icon,
    'badge'     => $item_badge,
    'key'       => $item_key,
  ];
}

if ($normalized_items === []) {
  return;
}

$item_count = count($normalized_items);

if ($active_index < 0 || $active_index >= $item_count) {
  $active_index = 0;
}

$tabs_instance_index = isset($GLOBALS['__tabs_component_instance_index'])
  ? (int) $GLOBALS['__tabs_component_instance_index']
  : 0;
$tabs_instance_index += 1;

$instance_suffix = $custom_id !== ''
  ? $custom_id
  : (string) $tabs_instance_index;

$root_class = trim(implode(' ', array_filter([$wrapper_class, $class_name])));

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value)) {
      if ($value) {
        $compiled[] = $key;
      }
      continue;
    }

    if ($value === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$root_attributes                   = $attributes;
$root_attributes['class']          = $root_class;
$root_attributes['data-tabs']      = true;
$root_attributes['data-tabs-id']   = 'tabs-' . $instance_suffix;

$active_tab_class   = trim(implode(' ', [$item_base_class, $item_active_class]));
$inactive_tab_class = trim(implode(' ', [$item_base_class, $item_inactive_class]));
$active_badge_class = trim(implode(' ', [$badge_base_class, $badge_active_class]));
$inactive_badge_class = trim(implode(' ', [$badge_base_class, $badge_inactive_class]));
?>
<div<?= $render_attributes($root_attributes); ?>>
  <div class="<?= e($list_class); ?>" role="tablist" aria-label="<?= e($aria_label); ?>">
    <?php foreach ($normalized_items as $item_index => $item): ?>
      <?php
      $is_selected = $item_index === $active_index;
      $tab_id      = 'tab-' . $instance_suffix . '-' . $item['key'];
      $panel_id    = 'panel-' . $instance_suffix . '-' . $item['key'];
      ?>
      <button
        class="<?= e($is_selected ? $active_tab_class : $inactive_tab_class); ?>"
        type="button"
        role="tab"
        id="<?= e($tab_id); ?>"
        aria-controls="<?= e($panel_id); ?>"
        aria-selected="<?= $is_selected ? 'true' : 'false'; ?>"
        tabindex="<?= $is_selected ? '0' : '-1'; ?>"
        data-active-class="<?= e($active_tab_class); ?>"
        data-inactive-class="<?= e($inactive_tab_class); ?>"
      >
        <?php if ($item['icon_name'] !== ''): ?>
          <?php icon($item['icon_name'], ['icon_size' => $icon_size]); ?>
        <?php endif; ?>
        <span><?= e($item['label']); ?></span>
        <?php if ($item['badge'] !== ''): ?>
          <span
            class="<?= e($is_selected ? $active_badge_class : $inactive_badge_class); ?>"
            data-tab-badge
            data-active-class="<?= e($active_badge_class); ?>"
            data-inactive-class="<?= e($inactive_badge_class); ?>"
          >
            <?= e($item['badge']); ?>
          </span>
        <?php endif; ?>
      </button>
    <?php endforeach; ?>
  </div>

  <?php foreach ($normalized_items as $item_index => $item): ?>
    <?php
    $tab_id   = 'tab-' . $instance_suffix . '-' . $item['key'];
    $panel_id = 'panel-' . $instance_suffix . '-' . $item['key'];
    ?>
    <div
      class="<?= e($panel_class); ?>"
      role="tabpanel"
      id="<?= e($panel_id); ?>"
      aria-labelledby="<?= e($tab_id); ?>"
      <?= $item_index === $active_index ? '' : 'hidden'; ?>
    >
      <?= e($item['panel']); ?>
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
