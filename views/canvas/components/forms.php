<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Forms';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/forms',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Forms',
    'header_subtitle'        => 'Reference for input controls, validation states, and structured data entry patterns.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use labels and helper text to clarify expected input.</li>
      <li>Show validation states close to the related field.</li>
      <li>Group related controls to reduce scanning effort.</li>
      <li>Prefer concise control text and predictable field order.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Stepper Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for quantity controls or bounded incremental values.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-4 md:grid-cols-2">
          <?php component('form/forms-stepper'); ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
