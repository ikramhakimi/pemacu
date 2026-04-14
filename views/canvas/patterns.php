<?php

declare(strict_types=1);

$page_title            = 'Canvas Patterns';
$page_current          = 'canvas-patterns';
$canvas_pattern_links  = canvas_links('patterns');

layout('canvas/layouts/canvas-start', [
  'page_title'     => $page_title,
  'page_current'   => $page_current,
  'canvas_primary' => 'patterns',
  'canvas_links'   => $canvas_pattern_links,
]);
?>
<section id="overview" class="p-0">
  <header class="space-y-2">
    <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-500">Patterns</p>
    <h1 class="text-3xl font-semibold text-brand-900">Canvas Patterns</h1>
    <p class="max-w-3xl text-sm leading-6 text-brand-600">
      Curated section-level compositions that combine components into complete UI patterns.
    </p>
  </header>
</section>

<div id="hero">
  <?php section('growth-hero'); ?>
</div>

<div id="packages">
  <?php section('growth-packages'); ?>
</div>

<div id="testimonials">
  <?php section('growth-testimonials'); ?>
</div>

<div id="faq">
  <?php section('growth-faq'); ?>
</div>

<div id="cta">
  <?php section('growth-cta'); ?>
</div>
<?php layout('canvas/layouts/canvas-end'); ?>
