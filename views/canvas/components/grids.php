<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Grids';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/grids',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Layout',
    'header_title'           => 'Grids',
    'header_subtitle'        => 'Reference for responsive grid patterns and spacing density across content layouts.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Choose column count based on content density and reading clarity.</li>
      <li>Use larger gaps for card-heavy layouts and smaller gaps for dense item grids.</li>
      <li>Keep responsive breakpoints predictable across pages.</li>
      <li>Avoid mixing multiple unrelated grid densities in one section.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Default Grid (gap-4)</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for general layouts with moderate content per item.</p>
      <div class="mt-4 rounded-md bg-white p-5">
        <div class="space-y-4">
          <div class="grid grid-cols-3 gap-4">
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
          </div>

          <div class="grid grid-cols-4 gap-4">
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
            <div class="h-16 rounded-md bg-brand-100"></div>
          </div>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Compact Grid (gap-1)</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for dense item collections such as thumbnail sets.</p>
      <div class="mt-4 rounded-md bg-white p-5">
        <div class="space-y-4">
          <div class="grid grid-cols-5 gap-1">
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
          </div>

          <div class="grid grid-cols-6 gap-1">
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
            <div class="h-16 bg-brand-100"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
