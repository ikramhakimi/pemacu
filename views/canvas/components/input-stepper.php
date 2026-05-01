<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Input Stepper';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/input-stepper',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Input Stepper',
    'header_subtitle'        => 'Reference variants for numeric stepper input patterns.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
  ?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Input Stepper
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-3xl gap-4 md:grid-cols-2">
          <?php component('input-stepper'); ?>
        </div>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-brand-200">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Usage Notes
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl rounded-md border border-brand-200 bg-white p-5">
          <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
            <li>Use for bounded numeric values like quantity, sessions, or seats.</li>
            <li>Set min, max, and step values through data attributes.</li>
            <li>Keep readonly input state so value changes happen through controls.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
