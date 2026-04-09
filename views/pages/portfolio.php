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
  <div class="container max-w-6xl mx-auto w-full px-4">
    <div class="grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-3">
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

<?php section('section-testimonials'); ?>
<?php // section('section-process'); ?>
<?php section('section-packages'); ?>
<?php section('section-faq'); ?>
<?php section('section-cta'); ?>
<?php section('section-footer'); ?>

<?php layout('layout-end'); ?>
