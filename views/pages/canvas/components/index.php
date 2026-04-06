<?php

declare(strict_types=1);

$page_title            = 'Canvas Components';
$page_current          = 'canvas-components';
$component_page_links  = [
  ['href' => '/canvas/components', 'label' => 'Overview'],
  ['href' => '/canvas/components/buttons', 'label' => 'Buttons'],
  ['href' => '/canvas/components/headers', 'label' => 'Headers'],
];

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components',
]);
?>
<section id="overview" class="p-0">
  <header class="space-y-2">
    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Documentation</p>
    <h1 class="text-3xl font-semibold text-brand-900">Canvas Components</h1>
    <p class="max-w-3xl text-sm leading-6 text-brand-600">
      A practical component reference page built from the existing Kit sections, organized as a
      dashboard-style documentation workspace.
    </p>
  </header>
</section>

<section id="headers">
  <?php section('kit-headers'); ?>
</section>

<section id="layout-grid">
  <?php section('kit-layout-grid'); ?>
</section>

<section id="cards">
  <?php section('kit-component-cards'); ?>
</section>

<section id="forms">
  <?php section('kit-component-forms'); ?>
</section>

<section id="icons">
  <?php section('kit-component-icons'); ?>
</section>
<script>
  (() => {
    /**
     * Kit Icon Finder Controller
     * - Scope: icon finder nodes on UI documentation page.
     * - Responsibility: live-filter icon cards by icon name and category metadata.
     * - Contract: icon section provides finder input, item nodes, group wrappers, and empty state node.
     */
    const init_icon_finder = () => {
      const finder_roots = document.querySelectorAll('[data-icon-finder]');

      if (finder_roots.length === 0) {
        return;
      }

      finder_roots.forEach((finder_root) => {
        const input_node   = finder_root.querySelector('[data-icon-finder-input]');
        const empty_node   = finder_root.querySelector('[data-icon-finder-empty]');
        const section_root = finder_root.closest('[data-icon-finder-root]');

        if (!(input_node instanceof HTMLInputElement) || !(section_root instanceof HTMLElement)) {
          return;
        }

        const item_nodes  = section_root.querySelectorAll('[data-icon-finder-item]');
        const group_nodes = section_root.querySelectorAll('[data-icon-finder-group]');

        if (item_nodes.length === 0) {
          return;
        }

        const sync_filter = () => {
          const query = input_node.value.trim().toLowerCase();
          let visible_count = 0;

          item_nodes.forEach((item_node) => {
            if (!(item_node instanceof HTMLElement)) {
              return;
            }

            const icon_name     = (item_node.dataset.iconName || '').toLowerCase();
            const icon_category = (item_node.dataset.iconCategory || '').toLowerCase();
            const is_match      = query === '' || icon_name.includes(query) || icon_category.includes(query);

            item_node.classList.toggle('hidden', !is_match);

            if (is_match) {
              visible_count += 1;
            }
          });

          group_nodes.forEach((group_node) => {
            if (!(group_node instanceof HTMLElement)) {
              return;
            }

            const visible_in_group = group_node.querySelectorAll('[data-icon-finder-item]:not(.hidden)').length > 0;
            group_node.classList.toggle('hidden', !visible_in_group);
          });

          if (empty_node instanceof HTMLElement) {
            empty_node.classList.toggle('hidden', visible_count > 0);
          }
        };

        input_node.addEventListener('input', sync_filter);
        sync_filter();
      });
    };

    /**
     * Kit Rating Controller
     * - Scope: rating demos on UI documentation page.
     * - Responsibility: sync star visuals from selected radio value.
     * - Contract: rating group provides `data-rating`, `data-rating-input`, and `data-rating-star`.
     */
    const init_ratings = () => {
      const rating_groups = document.querySelectorAll('[data-rating]');

      if (rating_groups.length === 0) {
        return;
      }

      rating_groups.forEach((rating_group) => {
        if (!(rating_group instanceof HTMLElement)) {
          return;
        }

        const input_nodes = Array.from(rating_group.querySelectorAll('[data-rating-input]'));
        const star_nodes  = Array.from(rating_group.querySelectorAll('[data-rating-star]'));
        const is_disabled = rating_group.dataset.ratingDisabled === 'true';

        if (input_nodes.length === 0 || star_nodes.length === 0) {
          return;
        }

        const get_checked_value = () => {
          const checked_input = input_nodes.find((input_node) => {
            return input_node instanceof HTMLInputElement && input_node.checked;
          });

          return checked_input instanceof HTMLInputElement
            ? Number(checked_input.value) || 0
            : 0;
        };

        const apply_rating_visual = (active_value) => {
          const safe_value = Number(active_value) || 0;

          star_nodes.forEach((star_node, index) => {
            if (!(star_node instanceof HTMLElement)) {
              return;
            }

            const svg_node = star_node.querySelector('svg');

            if (!(svg_node instanceof SVGElement)) {
              return;
            }

            const is_active = index + 1 <= safe_value;
            svg_node.setAttribute('fill', is_active ? 'url(#rating-star-gradient)' : 'currentColor');
            svg_node.classList.toggle('text-brand-300', !is_active);

            if (is_disabled && is_active) {
              svg_node.setAttribute('opacity', '0.7');
            } else {
              svg_node.removeAttribute('opacity');
            }
          });
        };

        const sync_rating = () => {
          apply_rating_visual(get_checked_value());
        };

        if (!is_disabled) {
          input_nodes.forEach((input_node) => {
            if (input_node instanceof HTMLInputElement) {
              input_node.addEventListener('change', sync_rating);
            }
          });

          star_nodes.forEach((star_node, index) => {
            if (!(star_node instanceof HTMLElement)) {
              return;
            }

            star_node.addEventListener('mouseenter', () => {
              apply_rating_visual(index + 1);
            });

            star_node.addEventListener('focus', () => {
              apply_rating_visual(index + 1);
            });
          });

          rating_group.addEventListener('mouseleave', sync_rating);
        }

        sync_rating();
      });
    };

    const init_ui_doc_page = () => {
      init_icon_finder();
      init_ratings();
    };

    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', init_ui_doc_page, { once: true });
      return;
    }

    init_ui_doc_page();
  })();
</script>
<?php layout('canvas-end'); ?>
