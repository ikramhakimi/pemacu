<?php
$section_growth_hero_center_classes = trim(
  implode(
    ' ',
    array_filter([
      isset($section_class) ? (string) $section_class : build_component_class('growth-hero-center', $states ?? []),
      'section section--hero min-h-[calc(100dvh-72px)---] pt-24 pb-12 flex items-center justify-start',
    ]),
  ),
);
?>
<section class="<?= e($section_growth_hero_center_classes); ?>">
  <div class="<?php container('w-full') ?>">
    <?php component('header-hero-center'); ?>
  </div>
</section>
