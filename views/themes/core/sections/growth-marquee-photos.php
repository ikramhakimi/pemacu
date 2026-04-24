<?php
$section_growth_marquee_photos_spacing_class = isset($spacing_class) ? trim((string) $spacing_class) : 'my-16';
$section_growth_marquee_photos_class_name    = isset($class_name) ? trim((string) $class_name) : '';
$section_growth_marquee_photos_classes = trim(
  implode(
    ' ',
    array_filter([
      isset($section_class) ? (string) $section_class : build_component_class('growth-marquee-photos', $states ?? []),
      'section section--marquee-photos relative left-1/2 right-1/2 w-screen max-w-none -translate-x-1/2',
      $section_growth_marquee_photos_spacing_class,
      $section_growth_marquee_photos_class_name,
    ]),
  ),
);
?>
<section class="<?= e($section_growth_marquee_photos_classes); ?>">
  <div class="marquee-photos">
    <div class="marquee-photos__track">
      <div class="marquee-photos__group">
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[4/5] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[3/4] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[1/1] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[9/16] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[5/4] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[2/3] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[3/2] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[9/16] h-96 w-auto']); ?>
      </div>

      <div class="marquee-photos__group" aria-hidden="true">
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[4/5] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[3/4] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[1/1] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[9/16] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[5/4] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[2/3] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[3/2] h-96 w-auto']); ?>
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[9/16] h-96 w-auto']); ?>
      </div>
    </div>
  </div>
</section>
