<?php

declare(strict_types=1);

$section_faq_class          = isset($section_class)
  ? (string) $section_class
  : build_component_class('growth-features-accordion', $states ?? []);
$section_faq_class_name     = isset($class_name) ? trim((string) $class_name) : '';
$section_faq_header_topic   = isset($topic) ? trim((string) $topic) : 'Features Accordion';
$section_faq_header_title   = isset($title) ? trim((string) $title) : 'See your whole business click into place';
$section_faq_header_lead    = isset($lead) ? trim((string) $lead) : 'Everything you need to know about our business services, packages, and policies—clearly explained.';
$section_faq_chevron_background_class = isset($chevron_background_class) ? trim((string) $chevron_background_class) : '';
$section_faq_chevron_radius_class     = isset($chevron_radius_class) ? trim((string) $chevron_radius_class) : '';
$section_faq_default_items  = [
  [
    'question' => 'Take payments',
    'answer'   => 'Sell anything in person and online with a point of sale platform that works for whatever you sell. Link: Learn More',
  ],
  [
    'question' => 'Manage your team',
    'answer'   => 'Run payroll, schedule shifts, and take care of admin — so your team can focus on performing their best. Link: Learn More',
  ],
  [
    'question' => 'Grow your customer base',
    'answer'   => 'Set up the right marketing campaigns and loyalty program to welcome new customers and keep them coming back for more. Link: Learn More',
  ],
  [
    'question' => 'Control your cash flow',
    'answer'   => 'Bring your revenue under one roof. Instantly access your funds, save for future expenses, and get quicker access to loans. Link: Learn More',
  ],
  [
    'question' => 'Connect your favorite apps',
    'answer'   => 'Square partners with hundreds of apps so you can manage your entire business without jumping between. Link: Learn More',
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
$section_faq_container_spacing_class = isset($container_spacing_class)
  ? trim((string) $container_spacing_class)
  : 'py-16';
$section_faq_container_class = isset($container_class) ? trim((string) $container_class) : '';
$section_faq_container_classes = trim(
  implode(
    ' ',
    array_filter([
      $section_faq_container_spacing_class,
      $section_faq_container_class,
    ]),
  ),
);
?>
<section class="<?= e($section_faq_classes); ?>">
  <div class="<?php container($section_faq_container_classes); ?>">
    <?php component('header-section', [
      'header_topic'           => $section_faq_header_topic,
      'header_title'           => $section_faq_header_title,
      'header_subtitle'        => $section_faq_header_lead,
      'header_container_class' => 'w-full',
    ]); ?>

    <div class="md:grid grid-cols-3 gap-4">
      <div class="">
        <?php component('accordion', [
          'items'                   => $section_faq_items,
          'variant'                 => 'line_divided',
          'chevron_position'        => 'start',
          'chevron_background_class' => 'bg-brand-200',
          'chevron_radius_class'     => $section_faq_chevron_radius_class,
          'group_name'              => 'section-features-accordion',
          'class_name'              => 'section-faq__accordion',
        ]); ?>
      </div>
      <div class="col-span-2 md:grid grid-cols-2 gap-4 space-y-4 md:space-y-0 md:mt-0 mt-4">
        <?php component('card', ['card' => ['variant' => 'testimonial']]); ?>
        <?php component('card', ['card' => ['variant' => 'intro']]); ?>
      </div>
    </div>
    
  </div>
</section>
