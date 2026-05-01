<?php

declare(strict_types=1);

$section_faq_class          = isset($section_class)
  ? (string) $section_class
  : build_component_class('growth-faq', $states ?? []);
$section_faq_class_name     = isset($class_name) ? trim((string) $class_name) : '';
$section_faq_header_topic   = isset($topic) ? trim((string) $topic) : 'Common Questions';
$section_faq_header_title   = isset($title) ? trim((string) $title) : 'Answers to your most asked questions.';
$section_faq_header_lead    = isset($lead) ? trim((string) $lead) : 'Everything you need to know about our photography services, packages, and policies—clearly explained.';
$section_faq_chevron_background_class = isset($chevron_background_class) ? trim((string) $chevron_background_class) : '';
$section_faq_chevron_radius_class     = isset($chevron_radius_class) ? trim((string) $chevron_radius_class) : '';
$section_faq_default_items  = [
  [
    'question' => 'What’s included in your service?',
    'answer'   => 'We provide a complete end-to-end experience, from initial consultation to final delivery. This includes planning, creative direction, execution, and post-production — ensuring everything is handled seamlessly so you can focus on the outcome, not the process.',
  ],
  [
    'question' => 'How long does the process usually take?',
    'answer'   => 'Timelines vary depending on the scope of the project, but most engagements are completed within 1–3 weeks. We’ll always provide a clear timeline upfront and keep you updated at every stage to avoid delays or surprises.',
  ],
  [
    'question' => 'Can I request revisions after delivery?',
    'answer'   => 'Yes, we include a revision phase to ensure the final result meets your expectations. Minor adjustments are typically covered, while larger changes can be scoped separately if needed.',
  ],
  [
    'question' => 'How do we get started?',
    'answer'   => 'Getting started is simple — share your requirements, timeline, and goals. From there, we’ll guide you through the next steps, including recommendations, scope alignment, and confirmation before we begin.',
  ],
  [
    'question' => 'Do you offer custom solutions or fixed packages?',
    'answer'   => 'We offer both. You can choose from predefined packages for faster turnaround, or opt for a fully custom solution tailored to your specific needs and objectives.',
  ],
  [
    'question' => 'What happens after the project is completed?',
    'answer'   => 'After delivery, we provide all final assets in an organized format. If needed, we can also support ongoing updates, additional requests, or future enhancements as your needs evolve.',
  ],
  [
    'question' => 'What makes your approach different?',
    'answer'   => 'We focus on clarity, quality, and intentional execution. Every step is designed to eliminate guesswork, reduce friction, and deliver results that feel considered — not rushed or templated.',
  ],
];
$section_faq_source_items    = isset($items) && is_array($items) && !empty($items)
  ? array_values($items)
  : $section_faq_default_items;
$section_faq_items           = array_values(array_filter(array_map(
  static function ($item): array {
    $item_question = is_array($item) && isset($item['question']) ? trim((string) $item['question']) : '';
    $item_answer   = is_array($item) && isset($item['answer']) ? trim((string) $item['answer']) : '';
    $item_open     = is_array($item) && isset($item['open']) ? (bool) $item['open'] : false;

    return [
      'question' => $item_question,
      'answer'   => $item_answer,
      'open'     => $item_open,
    ];
  },
  $section_faq_source_items,
), static function (array $item): bool {
  return $item['question'] !== '' && $item['answer'] !== '';
}));

if ($section_faq_items !== []) {
  $section_faq_items[0]['open'] = true;
}
$section_faq_classes    = trim(
  implode(
    ' ',
    array_filter([
      $section_faq_class,
      $section_faq_class_name,
    ]),
  ),
);
?>
<section class="<?= e($section_faq_classes); ?>">
  <div class="<?php container('py-16') ?>">
    <?php component('header-section', [
      'header_topic'           => $section_faq_header_topic,
      'header_title'           => $section_faq_header_title,
      'header_subtitle'        => $section_faq_header_lead,
      'header_container_class' => 'w-full',
    ]); ?>

    <div class="md:grid grid-cols-9 gap-4">
      <div class="col-span-6 lg:pr-10">
    <?php component('accordion', [
      'items'                   => $section_faq_items,
      'variant'                 => 'line_divided',
      'chevron_position'        => 'start',
      'chevron_background_class' => 'bg-brand-200',
      'chevron_radius_class'     => $section_faq_chevron_radius_class,
      'class_name'              => 'section-faq__accordion',
    ]); ?>
      </div>
      <div class="col-span-3 mt-10 md:mt-0">
        <?php component('card', ['card' => ['variant' => 'intro']]); ?>
      </div>
    </div>
    
  </div>
</section>
