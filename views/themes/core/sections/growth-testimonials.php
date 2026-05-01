<?php
$section_growth_testimonials_classes = trim(
  implode(
    ' ',
    array_filter([
      isset($section_class) ? (string) $section_class : build_component_class('growth-testimonials', $states ?? []),
      'section section--testimonials',
    ]),
  ),
);
?>
<section class="<?= e($section_growth_testimonials_classes); ?>">
  <div class="<?php container('w-full py-16') ?>">
    <?php component('header-section', [
      'header_topic'           => 'Testimonials',
      'header_title'           => 'Trusted by clients, praised for results',
      'header_subtitle'        => 'Every review reflects a real session and a moment we were honored to capture-see what our clients have to say.',
      'header_container_class' => 'w-full',
    ]); ?>

    <div class="grid gap-4 md:grid-cols-3">
      <?php component('card', ['card' => ['variant' => 'testimonial']]); ?>
      <?php component('card', ['card' => ['variant' => 'testimonial']]); ?>
      <?php component('card', ['card' => ['variant' => 'testimonial']]); ?>
    </div>
  </div>
</section>
