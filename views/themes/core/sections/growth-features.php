<?php
$section_growth_features_classes = trim(
  implode(
    ' ',
    array_filter([
      isset($section_class) ? (string) $section_class : build_component_class('growth-features', $states ?? []),
      'section section--cta',
    ]),
  ),
);
?>
<section class="<?= e($section_growth_features_classes); ?>">
  <div class="<?php container('w-full py-16 grid grid-cols-3 gap-4') ?>">
    <?php component('card', ['card' => ['variant' => 'package']]); ?>
    <?php component('card', ['card' => ['variant' => 'package']]); ?>
    <?php component('card', ['card' => ['variant' => 'package']]); ?>
  </div>
</section>
