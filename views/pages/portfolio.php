<?php

declare(strict_types=1);

$page_title   = 'Portfolio';
$page_current = 'portfolio';

layout('layout-start', ['page_title' => $page_title, 'page_current' => $page_current]);
?>
<section class="border-b border-brand-200 bg-white py-12">
  <?php component('header-page', [
    'header_topic'    => 'Portfolio',
    'header_title'    => 'Photography Portfolio',
    'header_subtitle' => 'A curated selection of wedding, portrait, and editorial projects crafted for personal stories and modern brands.',
  ]); ?>
  
  <div class="container max-w-6xl mx-auto w-full px-4 mt-10">
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
      <?php component('card-portfolio'); ?>
      <?php component('card-portfolio'); ?>
      <?php component('card-portfolio'); ?>
      <?php component('card-portfolio'); ?>
      <?php component('card-portfolio'); ?>
      <?php component('card-portfolio'); ?>
      <?php component('card-portfolio'); ?>
      <?php component('card-portfolio'); ?>
    </div>
  </div>
</section>

<section class="py-12">
  <div class="container max-w-6xl mx-auto w-full px-4">
    <?php component('header-section', [
      'header_class'           => 'header header--section mb-6',
      'header_topic'           => 'Process',
      'header_title'           => 'A seamless process from start to finish.',
      'header_subtitle'        => 'From your first message to final delivery, we guide every step—ensuring clarity, collaboration, and exceptional results.',
      'header_container_class' => 'w-full',
    ]); ?>

    <div class="grid gap-4 md:grid-cols-3">
      <?php component('card-process'); ?>
      <?php component('card-process'); ?>
      <?php component('card-process'); ?>
    </div>
  </div>
</section>

<section class="py-12">
  <div class="container max-w-6xl mx-auto w-full px-4">
    <?php component('header-section', [
      'header_class'           => 'header header--section mb-6',
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

    <div class="mt-8 flex flex-wrap items-center gap-2">
      <a class="btn btn--primary btn--md inline-flex items-center justify-center rounded-md border border-transparent bg-brand-900 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-white" href="/contact">
        Start Your Project
      </a>
      <a class="btn btn--secondary btn--md inline-flex items-center justify-center rounded-md border border-transparent bg-brand-100 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-brand-900" href="/canvas/components">
        Browse Canvas
      </a>
    </div>
  </div>
</section>
<?php layout('layout-end'); ?>
