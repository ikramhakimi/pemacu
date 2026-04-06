<?php

declare(strict_types=1);

$section_faq_class      = isset($section_class)
  ? (string) $section_class
  : build_component_class('section-faq', $states ?? []);
$section_faq_class_name = isset($class_name) ? trim((string) $class_name) : '';
$section_faq_title      = isset($title) ? (string) $title : 'Frequently asked questions';
$section_faq_lead       = isset($lead) ? (string) $lead : 'Everything you need before booking.';
$section_faq_items      = isset($items) && is_array($items) && !empty($items)
  ? array_values($items)
  : [
    [
      'question' => 'How far in advance should I book?',
      'answer'   => 'Most clients book two to four weeks earlier to secure preferred dates.',
    ],
    [
      'question' => 'Do you provide edited photos?',
      'answer'   => 'Yes. Every package includes edited high-resolution files with online delivery.',
    ],
    [
      'question' => 'Can I customize a package?',
      'answer'   => 'Absolutely. We can combine services based on your goals, location, and timeline.',
    ],
  ];
$section_faq_classes    = trim(
  implode(
    ' ',
    array_filter([
      $section_faq_class,
      'section-faq',
      $section_faq_class_name,
    ]),
  ),
);

ob_start();
?>
<h2 class="section-faq__title title title--2 text-3xl font-bold text-brand-900">
  <?= e($section_faq_title); ?>
</h2>
<p class="section-faq__lead text text--caption text-sm text-brand-600">
  <?= e($section_faq_lead); ?>
</p>
<div class="section-faq__list flex flex-col gap-3">
  <?php foreach ($section_faq_items as $item): ?>
    <?php
    $item_question = isset($item['question']) ? (string) $item['question'] : '';
    $item_answer   = isset($item['answer']) ? (string) $item['answer'] : '';
    ?>
    <?php if ($item_question === '' || $item_answer === ''): ?>
      <?php continue; ?>
    <?php endif; ?>
    <details class="section-faq__item rounded-xl border border-brand-200 bg-white p-4">
      <summary class="section-faq__question cursor-pointer list-none text-base font-semibold text-brand-900">
        <?= e($item_question); ?>
      </summary>
      <p class="section-faq__answer text text--body text-base text-brand-700">
        <?= e($item_answer); ?>
      </p>
    </details>
  <?php endforeach; ?>
</div>
<?php
$section_faq_content = trim((string) ob_get_clean());
?>
<section class="<?= e($section_faq_classes); ?>">
  <div class="container mx-auto max-w-6xl px-4 pb-12">
    <div class="section-faq__stack flex flex-col gap-4">
      <?= $section_faq_content; ?>
    </div>
  </div>
</section>
