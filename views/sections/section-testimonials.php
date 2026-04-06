<?php

declare(strict_types=1);

$section_testimonials_class      = isset($section_class)
  ? (string) $section_class
  : build_component_class('section-testimonials', $states ?? []);
$section_testimonials_class_name = isset($class_name) ? trim((string) $class_name) : '';
$section_testimonials_title      = isset($title) ? (string) $title : 'What clients say';
$section_testimonials_lead       = isset($lead) ? (string) $lead : 'Stories from teams and couples we worked with.';
$section_testimonials_items      = isset($items) && is_array($items) && !empty($items)
  ? array_values($items)
  : [
    [
      'quote' => 'The team captured our event beautifully and delivered edits quickly.',
      'name'  => 'Aina Rahman',
      'role'  => 'Marketing Manager',
    ],
    [
      'quote' => 'Easy planning process and the portraits looked exactly like our brand.',
      'name'  => 'Daniel Lim',
      'role'  => 'Founder',
    ],
    [
      'quote' => 'Professional from start to finish. We loved every image from our day.',
      'name'  => 'Nadia & Farid',
      'role'  => 'Wedding Couple',
    ],
  ];
$section_testimonials_classes    = trim(
  implode(
    ' ',
    array_filter([
      $section_testimonials_class,
      'section-testimonials',
      $section_testimonials_class_name,
    ]),
  ),
);

ob_start();
?>
<h2 class="section-testimonials__title title title--2 text-3xl font-bold text-brand-900">
  <?= e($section_testimonials_title); ?>
</h2>
<p class="section-testimonials__lead text text--caption text-sm text-brand-600">
  <?= e($section_testimonials_lead); ?>
</p>
<div class="section-testimonials__grid grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
  <?php foreach (array_slice($section_testimonials_items, 0, 3) as $item): ?>
    <?php
    $item_quote = isset($item['quote']) ? (string) $item['quote'] : '';
    $item_name  = isset($item['name']) ? (string) $item['name'] : '';
    $item_role  = isset($item['role']) ? (string) $item['role'] : '';
    ?>
    <article class="section-testimonials__item rounded-2xl border border-brand-200 bg-white p-6">
      <div class="section-testimonials__item-stack flex flex-col gap-2">
        <p class="section-testimonials__quote text text--body text-base text-brand-700">
          <?= e($item_quote); ?>
        </p>
        <h3 class="section-testimonials__name title title--6 text-base font-semibold text-brand-900">
          <?= e($item_name); ?>
        </h3>
        <p class="section-testimonials__role text text--caption text-sm text-brand-600">
          <?= e($item_role); ?>
        </p>
      </div>
    </article>
  <?php endforeach; ?>
</div>
<?php
$section_testimonials_content = trim((string) ob_get_clean());
?>
<section class="<?= e($section_testimonials_classes); ?>">
  <div class="container mx-auto max-w-6xl px-4 pb-12">
    <div class="section-testimonials__stack flex flex-col gap-4">
      <?= $section_testimonials_content; ?>
    </div>
  </div>
</section>
