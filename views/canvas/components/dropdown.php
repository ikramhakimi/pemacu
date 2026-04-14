<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Dropdown';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/dropdown',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Dropdown',
    'header_subtitle'        => 'Reference for trigger styles, menu alignment, and contextual action grouping.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Group related, secondary actions that do not need full-time visibility.</li>
      <li>Use clear trigger labels so the menu purpose is obvious before opening.</li>
      <li>Prefer left alignment by default unless the trigger sits near the right edge.</li>
      <li>Keep menu items concise and ordered by priority or frequency.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Default Dropdown</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Button trigger with dividers, labels, disabled and danger actions.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('dropdown-default'); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Trigger Variations</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Neutral style, icon+text trigger, and icon-only trigger.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('dropdown-trigger-variations'); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Button Size Variations</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Dropdown trigger reuses button tokens: sm, default, lg, including icon-only.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('dropdown-button-size-variations'); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Link Trigger Dropdown</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use anchor trigger while keeping JS toggle and outside-click dismiss.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('dropdown-link-trigger'); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Navigation Dropdown</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Simple link-style trigger for navigation groups.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('dropdown-navigation'); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
