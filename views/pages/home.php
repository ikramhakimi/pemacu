<?php

declare(strict_types=1);

layout('layout-start', ['page_title' => 'Home', 'page_current' => 'home']);
?>
<?php section('growth-hero'); ?>
<?php // section('growth-hero-album'); ?>
<section>
  <div class="<?php container('grid grid-cols-3 grid-rows-2 gap-4') ?>">
    <article class="<?php card('bg-brand-50 overflow-hidden row-span-2 row-start-1 rounded-l-2xl') ?> ">
      <div class="p-6">
        <h3 class="card__title text-lg font-semibold text-brand-900">
          Feature Name
        </h3>
        <p class="card__description mt-2 text-sm text-brand-700">
          Highlight the key features and benefits to attract potential customers.
        </p>
      </div>
      <div class="rounded-tr-3xl mr-10 overflow-hidden">
        <?php component('placeholder-image', ['aspect-ratio' => 'w-full h-[596px]']); ?>
      </div>
    </article>
    <article class="<?php card('bg-brand-50 overflow-hidden row-start-1') ?> ">
      <div class="p-6">
        <h3 class="card__title text-lg font-semibold text-brand-900">
          Feature Name
        </h3>
        <p class="card__description mt-2 text-sm text-brand-700">
          Highlight the key features and benefits to attract potential customers.
        </p>
      </div>
      <div class="overflow-hidden mb-6">
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[16/9]']); ?>
      </div>
    </article>
    <article class="<?php card('bg-brand-50 overflow-hidden row-start-2 col-start-2') ?> ">
      <div class="p-6">
        <h3 class="card__title text-lg font-semibold text-brand-900">
          Feature Name
        </h3>
        <p class="card__description mt-2 text-sm text-brand-700">
          Highlight the key features and benefits to attract potential customers.
        </p>
      </div>
      <div class="overflow-hidden mb-6">
        <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[16/9]']); ?>
      </div>
    </article>
    <article class="<?php card('bg-brand-50 overflow-hidden row-span-2 rounded-r-2xl') ?> ">
      <div class="p-6">
        <h3 class="card__title text-lg font-semibold text-brand-900">
          Feature Name
        </h3>
        <p class="card__description mt-2 text-sm text-brand-700">
          Highlight the key features and benefits to attract potential customers.
        </p>
      </div>
      <div class="rounded-tl-3xl ml-10 overflow-hidden">
        <?php component('placeholder-image', ['aspect-ratio' => 'w-full h-[596px]']); ?>
      </div>
    </article>
  </div>
</section>
<?php section('growth-process'); ?>
<?php section('growth-features'); ?>
<?php section('growth-packages'); ?>
<?php section('growth-testimonials'); ?>
<?php section('growth-features-accordion'); ?>
<?php section('growth-marquee-photos'); ?>
<?php section('growth-faq'); ?>
<?php section('growth-cta'); ?>
<?php section('core-footer'); ?>
<?php layout('layout-end'); ?>
