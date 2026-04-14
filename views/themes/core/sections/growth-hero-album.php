<?php
$section_growth_hero_album_classes = trim(
  implode(
    ' ',
    array_filter([
      isset($section_class) ? (string) $section_class : build_component_class('growth-hero-album', $states ?? []),
      'section section--hero-album',
    ]),
  ),
);
?>
<section class="<?= e($section_growth_hero_album_classes); ?>">
  <div class="<?php container('w-full grid grid-cols-4 gap-2') ?>">
    <?php component('placeholder-image', [
      'aspect-ratio'     => 'col-span-2 rounded-md',
    ]); ?>
    <?php component('placeholder-image', [
      'aspect-ratio'     => 'aspect-square rounded-md col-span-1',
    ]); ?>
    <?php component('placeholder-image', [
      'aspect-ratio'     => 'aspect-square rounded-md col-span-1',
    ]); ?>
  </div>
</section>
