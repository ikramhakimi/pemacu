<section class="kit kit--header-hero pt-2">
  <header class="kit__header pt-8 pb-4">
    <p class="kit__topic text-xs uppercase text-brand-500">
      Component
    </p>
    <h1 class="kit__title title title--3 text-2xl font-bold text-brand-900 mt-2">
      Cards
    </h1>
    <p class="kit__subtitle text-brand-700 mt-1 max-w-2xl">
      Cards are versatile UI elements that can be used to display a variety of content, such as images, text, and actions. They are commonly used for showcasing products, services, or any other information in a visually appealing way.
    </p>
  </header>

  <div class="kit__brief text-brand-500 py-4">
    Card Packages - use for listing items with moderate content, such as product or service packages.
  </div>
  <article class="kit__demo kit-section__content bg-white p-8 space-y-8">
    <div class="grid grid--default gap-4 grid-cols-3">
      <div class="grid__item">
        <?php component('card-package'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-package'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-package'); ?>
      </div>
    </div>
  </article>
  <div class="kit__brief text-brand-500 py-4 mt-4">
    Card Features - use for listing items with less content, such as features or benefits.
  </div>
  <article class="kit__demo kit-section__content bg-white p-8 space-y-8">
    <div class="grid grid--default gap-4 grid-cols-3">
      <div class="grid__item">
        <?php component('card-feature'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-feature'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-feature'); ?>
      </div>
    </div>
  </article>
  <div class="kit__brief text-brand-500 py-4 mt-4">
    Card Process - use for listing items with less content, such as steps in a process or workflow.
  </div>
  <article class="kit__demo kit-section__content bg-white p-8 space-y-8">
    <div class="grid grid--default gap-4 grid-cols-3">
      <div class="grid__item">
        <?php component('card-process'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-process'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-process'); ?>
      </div>
    </div>
  </article>
  <div class="kit__brief text-brand-500 py-4 mt-4">
    Card Portfolio - use for listing items with moderate content, such as portfolio items or case studies.
  </div>
  <article class="kit__demo kit-section__content bg-white p-8 space-y-8">
    <div class="grid grid--default gap-4 grid-cols-3">
      <div class="grid__item">
        <?php component('card-portfolio'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-portfolio'); ?> 
      </div>
      <div class="grid__item">
        <?php component('card-portfolio'); ?>
      </div>
    </div>
  </article>
  <div class="kit__brief text-brand-500 py-4 mt-4">
    Card Testimonials - use for listing items with less content, such as testimonials or reviews.
  </div>
  <article class="kit__demo kit-section__content bg-white p-8 space-y-8">
    <div class="grid grid--default gap-4 grid-cols-3">
      <div class="grid__item">
        <?php component('card-testimonial'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-testimonial'); ?>
      </div>
      <div class="grid__item">
        <?php component('card-testimonial'); ?>
      </div>
    </div>
  </article>
</section>
