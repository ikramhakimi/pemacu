<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Icons';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$icon_category_paths = glob(__DIR__ . '/../../../node_modules/remixicon/icons/*', GLOB_ONLYDIR);
$icon_categories     = [];

if (is_array($icon_category_paths)) {
  sort($icon_category_paths);

  foreach ($icon_category_paths as $icon_category_path) {
    $icon_category_name = basename($icon_category_path);
    $icon_paths         = glob($icon_category_path . '/*.svg');

    if (!is_array($icon_paths) || $icon_paths === []) {
      continue;
    }

    sort($icon_paths);
    $category_icons = [];

    foreach ($icon_paths as $icon_path) {
      $icon_name = pathinfo($icon_path, PATHINFO_FILENAME);

      if (is_string($icon_name) && $icon_name !== '') {
        $category_icons[] = $icon_name;
      }
    }

    if ($category_icons !== []) {
      $icon_categories[] = [
        'name'  => $icon_category_name,
        'icons' => $category_icons,
      ];
    }
  }
}

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/icons',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Icons',
    'header_subtitle'        => 'Reference for icon naming, category grouping, and reusable glyph usage across interfaces.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8" data-icon-finder-root>
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use icons to support text labels, not replace critical labels.</li>
      <li>Prefer consistent icon size per surface or component family.</li>
      <li>Use recognizable glyphs for common actions and states.</li>
      <li>Keep icon style and stroke weight consistent within one context.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Icon Sizes</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use consistent sizing per surface: 16 for dense rows, 20 for controls, 24 for standard UI, and 32 for emphasis.
      </p>
      <div class="mt-4 rounded-md">
        <div class="grid gap-4 lg:grid-cols-4">
          <div class="rounded-md border border-brand-200 bg-white p-4">
            <p class="text-sm font-semibold text-brand-800">16px</p>
            <div class="h-16 flex items-center">
              <?php icon('ghost-3-line', ['icon_size' => '16', 'icon_class' => 'text-brand-700']); ?>
            </div>
            <p class=" text-brand-500">Dense tables and compact metadata.</p>
          </div>

          <div class="rounded-md border border-brand-200 bg-white p-4">
            <p class="text-sm font-semibold text-brand-800">20px</p>
            <div class="h-16 flex items-center">
              <?php icon('ghost-3-line', ['icon_size' => '20', 'icon_class' => 'text-brand-700']); ?>
            </div>
            <p class=" text-brand-500">Use for form controls and inline actions.</p>
          </div>

          <div class="rounded-md border border-brand-200 bg-white p-4">
            <p class="text-sm font-semibold text-brand-800">24px</p>
            <div class="h-16 flex items-center">
              <?php icon('ghost-3-line', ['icon_size' => '24', 'icon_class' => 'text-brand-700']); ?>
            </div>
            <p class=" text-brand-500">Default size for navigation and cards.</p>
          </div>

          <div class="rounded-md border border-brand-200 bg-white p-4">
            <p class="text-sm font-semibold text-brand-800">32px</p>
            <div class="h-16 flex items-center">
              <?php icon('ghost-3-line', ['icon_size' => '32', 'icon_class' => 'text-brand-700']); ?>
            </div>
            <p class="text-brand-500">Hero highlights and feature emphasis.</p>
          </div>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Icon Library</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Search and browse Remixicon glyphs by name or category.</p>
      <div class="mt-4">
        <div class="space-y-4" data-icon-finder>
          <input
            class="input input--md h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
            type="search"
            placeholder="Find icon by name or category"
            data-icon-finder-input
          >
          <p class="hidden text-sm text-brand-500" data-icon-finder-empty>
            No icons found. Try another keyword.
          </p>
        </div>

        <div class="mt-4 space-y-6" data-icon-finder-grid>
          <?php foreach ($icon_categories as $icon_category): ?>
            <section class="mb-8 last:mb-0" data-icon-finder-group>
              <header class="mb-3 flex items-center justify-between gap-3">
                <h4 class="text-base font-semibold text-brand-900">
                  <?= e($icon_category['name']); ?>
                </h4>
                <p class="text-sm text-brand-500">
                  <?= e((string) count($icon_category['icons'])); ?> icons
                </p>
              </header>
              <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php foreach ($icon_category['icons'] as $icon_name): ?>
                  <div
                    class="rounded-lg border border-brand-200 bg-white px-4 py-2"
                    data-icon-finder-item
                    data-icon-name="<?= e(strtolower($icon_name)); ?>"
                    data-icon-category="<?= e(strtolower($icon_category['name'])); ?>"
                  >
                    <div class="flex items-center gap-3">
                      <?php icon($icon_name, ['icon_size' => '24', 'icon_class' => 'text-brand-700']); ?>
                      <span class="text-sm text-brand-800"><?= e($icon_name); ?></span>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </section>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</section>
<script>
  (() => {
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
  })();
</script>
<?php layout('canvas/layouts/canvas-end'); ?>
