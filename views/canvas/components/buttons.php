<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Buttons';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');
$button_variants      = canvas_component_variants('buttons');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/buttons',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Buttons',
    'header_subtitle'        => 'Reference for action priority, intent, and state across product workflows.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Write labels in sentence case.</li>
      <li>Start labels with clear verbs, such as Save, Continue, or Delete.</li>
      <li>Use one primary action per surface.</li>
      <li>Reserve positive and negative variants for state-specific actions.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <?php foreach ($button_variants as $button_variant): ?>
      <?php
      $variant_title       = isset($button_variant['title']) ? (string) $button_variant['title'] : '';
      $variant_description = isset($button_variant['description']) ? (string) $button_variant['description'] : '';
      $variant_component   = isset($button_variant['component']) ? (string) $button_variant['component'] : '';
      $variant_panel_class = isset($button_variant['panel_class']) ? (string) $button_variant['panel_class'] : 'flex items-center gap-4';
      ?>
      <?php if ($variant_title === '' || $variant_component === ''): ?>
        <?php continue; ?>
      <?php endif; ?>
      <div>
        <h3 class="text-xl font-bold text-brand-900"><?= e($variant_title); ?></h3>
        <?php if ($variant_description !== ''): ?>
          <p class="mt-2 max-w-3xl text-brand-600"><?= e($variant_description); ?></p>
        <?php endif; ?>
        <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
          <div class="<?= e($variant_panel_class); ?>">
            <?php component($variant_component); ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
