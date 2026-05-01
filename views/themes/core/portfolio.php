<?php

declare(strict_types=1);

$page_title   = 'Portfolio';
$page_current = 'portfolio';

layout('layout-start', ['page_title' => $page_title, 'page_current' => $page_current]);
?>
<?php component('header-page', [
  'header_topic'    => 'Portfolio',
  'header_title'    => 'Service Portfolio',
  'header_subtitle' => 'A curated selection of wedding, portrait, and editorial projects crafted for personal stories and modern brands.',
]); ?>
<section class="section section--portfolio-grid pb-12">
  <div class="<?php container('w-full') ?>">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-3">
      <?php component('card', ['card' => ['variant' => 'overlay']]); ?>
      <?php component('card', ['card' => ['variant' => 'overlay']]); ?>
      <?php component('card', ['card' => ['variant' => 'overlay']]); ?>
      <?php component('card', ['card' => ['variant' => 'overlay']]); ?>
      <?php component('card', ['card' => ['variant' => 'overlay']]); ?>
      <?php component('card', ['card' => ['variant' => 'overlay']]); ?>
      <?php component('card', ['card' => ['variant' => 'overlay']]); ?>
      <?php component('card', ['card' => ['variant' => 'overlay']]); ?>
    </div>
  </div>
</section>

<?php section('growth-testimonials'); ?>
<?php section('growth-packages'); ?>
<?php section('growth-faq'); ?>
<?php section('growth-cta'); ?>
<?php section('growth-marquee-photos'); ?>

<?php layout('layout-end'); ?>
