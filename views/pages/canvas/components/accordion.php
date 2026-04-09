<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Accordion';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');
$accordion_items      = [
  [
    'question' => 'What’s included in your service?',
    'answer'   => 'We provide a complete end-to-end experience, from initial consultation to final delivery. This includes planning, creative direction, execution, and post-production — ensuring everything is handled seamlessly so you can focus on the outcome, not the process.',
    'open'     => true,
  ],
  [
    'question' => 'How long does the process usually take?',
    'answer'   => 'Timelines vary depending on the scope of the project, but most engagements are completed within 1–3 weeks. We’ll always provide a clear timeline upfront and keep you updated at every stage to avoid delays or surprises.',
  ],
  [
    'question' => 'Can I request revisions after delivery?',
    'answer'   => 'Yes, we include a revision phase to ensure the final result meets your expectations. Minor adjustments are typically covered, while larger changes can be scoped separately if needed.',
  ],
];

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/accordion',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Accordion',
    'header_subtitle'        => 'Reference for data-driven details-summary disclosure patterns.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use accordion content data (`items`) to populate summaries and panels.</li>
      <li>Use concise summary labels so users can scan sections quickly.</li>
      <li>Use `details` and `summary` for native keyboard and accessibility behavior.</li>
      <li>Use optional `open` on an item when one panel should be expanded by default.</li>
      <li>Use `chevron_background_class` and `chevron_radius_class` to customize the chevron surface.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Cards Layout</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use this card-style arrangement to present grouped details with clear visual separation and easy scanning.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('accordion', ['items' => $accordion_items]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Line Divided</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use when sections should feel lighter, with each row separated by `border-brand-200` divider lines.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('accordion', [
          'items'   => $accordion_items,
          'variant' => 'line_divided',
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Custom Chevron Surface</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use these optional classes to customize chevron background and radius while preserving default behavior elsewhere.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('accordion', [
          'items'                   => $accordion_items,
          'chevron_background_class' => 'bg-brand-200',
          'chevron_radius_class'     => 'rounded-full',
        ]); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas-end'); ?>
