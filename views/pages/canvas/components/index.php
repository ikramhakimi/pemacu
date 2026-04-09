<?php

declare(strict_types=1);

$page_title            = 'Canvas Components';
$page_current          = 'canvas-components';
$component_page_links  = canvas_links('components');

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
  <div class="space-y-2">
    <h2 class="text-xl font-bold text-brand-900">Layout Grid</h2>
    <p class="max-w-3xl text-brand-600">
      Explore responsive layout references and spacing densities in the dedicated Grids page.
    </p>
    <a
      href="/canvas/components/grids"
      class="inline-flex items-center text-sm font-semibold text-brand-700 hover:text-brand-900"
    >
      Open Grids documentation
    </a>
  </div>
</section>
<?php layout('canvas-end'); ?>
