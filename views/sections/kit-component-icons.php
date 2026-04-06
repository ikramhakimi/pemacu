<section class="kit kit--component-icons pt-2" data-icon-finder-root>
  <?php
  $icon_category_paths = glob(__DIR__ . '/../../node_modules/remixicon/icons/*', GLOB_ONLYDIR);
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
  ?>
  <header class="kit__header pt-8 pb-4">
    <p class="kit__topic text-xs uppercase text-brand-500">
      Component
    </p>
    <h1 class="kit__title title title--3 mt-2 text-2xl font-bold text-brand-900">
      Icons
    </h1>
    <p class="kit__subtitle mt-1 text-brand-700">
      Remixicon SVG icons with size, color, and glyph variations.
    </p>
  </header>

  <div class="kit__brief text-brand-500 py-4">
    Icons - complete Remixicon listing grouped by category for documentation and quick browsing.
  </div>
  <article class="kit__demo bg-white p-8">
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
            <h3 class="text-base font-semibold text-brand-900">
              <?= e($icon_category['name']); ?>
            </h3>
            <p class="text-sm text-brand-500">
              <?= e((string) count($icon_category['icons'])); ?> icons
            </p>
          </header>
          <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <?php foreach ($icon_category['icons'] as $icon_name): ?>
              <div
                class="rounded-lg border border-brand-200 bg-white px-4 py-3"
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
  </article>
</section>
