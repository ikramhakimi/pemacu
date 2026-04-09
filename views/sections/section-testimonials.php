<section class="section section--testimonials">
  <div class="container max-w-6xl mx-auto w-full px-4 py-12">
    <?php component('header-section', [
      'header_topic'           => 'Testimonials',
      'header_title'           => 'Trusted by clients, praised for results',
      'header_subtitle'        => 'Every review reflects a real session and a moment we were honored to capture-see what our clients have to say.',
      'header_container_class' => 'w-full',
    ]); ?>

    <div class="grid gap-4 md:grid-cols-3">
      <?php component('card-testimonial'); ?>
      <?php component('card-testimonial'); ?>
      <?php component('card-testimonial'); ?>
    </div>
  </div>
</section>