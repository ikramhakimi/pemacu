<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Headers';
$page_current         = 'canvas-components';
$component_page_links = [
  ['href' => '/canvas/components', 'label' => 'Overview'],
  ['href' => '/canvas/components/buttons', 'label' => 'Buttons'],
  ['href' => '/canvas/components/headers', 'label' => 'Headers'],
];

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/headers',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Headers',
    'header_subtitle'        => 'Reference for section-level and page-level header patterns across product surfaces.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-3">
  <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
  <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
    <li>Use one clear heading level per page section.</li>
    <li>Keep the topic label short and descriptive.</li>
    <li>Write subtitles as concise context, not marketing copy.</li>
    <li>Match header variant to content scope: hero, page, package, or section.</li>
  </ul>
</section>

<section class="space-y-8">
  <div>
    <h3 class="text-xl font-bold text-brand-900">Header Hero</h3>
    <p class="mt-2 max-w-3xl text-brand-600">Use for top-level landing areas with primary actions.</p>
    <div class="mt-4 rounded-md bg-white p-5">
      <?php component('header-hero'); ?>
    </div>
  </div>

  <div>
    <h3 class="text-xl font-bold text-brand-900">Header Page</h3>
    <p class="mt-2 max-w-3xl text-brand-600">Use for page introductions and main content context.</p>
    <div class="mt-4 rounded-md bg-white p-5">
      <?php component('header-page', [
        'header_topic'           => 'Components',
        'header_title'           => 'Page Header',
        'header_subtitle'        => 'Use this variant to introduce page scope, intent, and expected actions.',
        'header_container_class' => 'w-full',
      ]); ?>
    </div>
  </div>

  <div>
    <h3 class="text-xl font-bold text-brand-900">Header Package</h3>
    <p class="mt-2 max-w-3xl text-brand-600">Use for package summaries that combine title, pricing, and key specs.</p>
    <div class="mt-4 rounded-md bg-white p-5">
      <?php component('header-package', [
        'header_container_class' => 'w-full',
      ]); ?>
    </div>
  </div>

  <div>
    <h3 class="text-xl font-bold text-brand-900">Header Section</h3>
    <p class="mt-2 max-w-3xl text-brand-600">Use inside pages to separate related content blocks.</p>
    <div class="mt-4 rounded-md bg-white p-5">
      <?php component('header-section', [
        'header_topic'           => 'Section',
        'header_title'           => 'Content Group Header',
        'header_subtitle'        => 'Use this variant to frame grouped content and define the section purpose.',
        'header_container_class' => 'w-full',
      ]); ?>
    </div>
  </div>
</section>
<?php layout('canvas-end'); ?>
