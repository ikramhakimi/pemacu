<?php
$section_growth_cta_classes = trim(
  implode(
    ' ',
    array_filter([
      isset($section_class) ? (string) $section_class : build_component_class('growth-cta', $states ?? []),
      'section section--cta',
    ]),
  ),
);
?>
<section class="<?= e($section_growth_cta_classes); ?>">
  <div class="<?php container('py-16') ?>">
    <?php component('header-hero'); ?>
  </div>
</section>
