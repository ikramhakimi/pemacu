<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Tabs';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/tabs',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Tabs',
    'header_subtitle'        => 'Reference for tab navigation styles, states, and sizing across documentation patterns.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use tabs for same-level content sections, not for sequential steps.</li>
      <li>Keep tab labels short so all options remain scannable in one row.</li>
      <li>Use underline styles for content switching and pills for segmented control patterns.</li>
      <li>Support keyboard navigation (arrow keys, Home, End) for accessibility.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Tabs with Underline</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Baseline underline tabs for clean section switching in content-heavy layouts.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'underline']); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Full-Width Tabs with Underline</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Equal-width underline tabs when each option should carry identical visual weight.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'underline-full']); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Tabs with Underline and Badges</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Underline tabs with lightweight count badges for workload and queue summaries.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'underline-badges']); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Tabs with Underline and Icons</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Icon-assisted tabs for quick visual recognition of sections.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'underline-icons']); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Tabs in Pills</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Segmented, rounded tabs for compact control blocks.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'pills']); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Tabs in Pills on Gray Background</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use `bg-brand-100` wrapping when tabs need stronger separation from white surfaces.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'pills-gray']); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Tabs in Pills on Dark Background</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Dark-surface adaptation for dashboard headers and contrast-heavy contexts.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'pills-dark']); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Tabs in Button Gradient (`btn--sm` and `btn--md`)</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Gradient button tabs with secondary idle state and primary active state, clamped to three actions per container.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'button-gradient-sm']); ?>
      </div>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('tabs', ['variant' => 'button-gradient-md']); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas-end'); ?>
