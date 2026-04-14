<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Breadcrumb';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/breadcrumb',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Breadcrumb',
    'header_subtitle'        => 'Reference for path hierarchy, separator styles, and compact breadcrumb usage.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use breadcrumbs to show current location in a multi-level hierarchy.</li>
      <li>Keep each crumb label short and descriptive.</li>
      <li>Keep parent levels as links and render the current page as plain text.</li>
      <li>Use compact size only in dense layouts such as utilities and sub-headers.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Slash Separator</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for simple content hierarchies where a lightweight divider keeps the path easy to scan.
      </p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <?php component('breadcrumb-slash'); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Chevron Separator (SVG)</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use when you want stronger directional cues between levels, especially in product and docs flows.
      </p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <?php component('breadcrumb-chevron'); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">With Icon</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use to reinforce section meaning with familiar symbols in navigation-heavy experiences.
      </p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <?php component('breadcrumb-icon'); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Compact</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use in tight spaces like toolbars, table headers, and nested utility panels.
      </p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <?php component('breadcrumb-compact'); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
