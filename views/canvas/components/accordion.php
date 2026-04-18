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
$accordion_base_items = [
  [
    'title'   => 'What is included in the session package?',
    'content' => 'Each package includes shoot time, edited high-resolution photos, and an online delivery gallery.',
  ],
  [
    'title'   => 'How long is the standard turnaround time?',
    'content' => 'Final edited photos are typically delivered within 7 to 10 working days after the session date.',
  ],
  [
    'title'   => 'Can I reschedule my booked slot?',
    'content' => 'Yes. Rescheduling is allowed with at least 48 hours notice, subject to the next available slot.',
  ],
];
$accordion_c_items = [
  [
    'question'          => 'Why do students struggle to stay on track?',
    'summary_subtitle'  => 'Learning Journey',
    'summary_icon_box'  => true,
    'summary_icon_name' => 'road-map-line',
    'summary_icon_size' => '20',
    'content'           => 'Students usually lose momentum when lessons, deadlines, and progress signals are scattered across too many places. A stronger learning experience makes the next step visible and keeps milestones easy to review.',
  ],
  [
    'question'          => 'How should course materials be organized?',
    'summary_subtitle'  => 'Curriculum Structure',
    'summary_icon_box'  => true,
    'summary_icon_name' => 'organization-chart',
    'summary_icon_size' => '20',
    'content'           => 'Course content works better when readings, assignments, and supporting resources are grouped by topic instead of being added as a long list. Clear structure helps learners spend more time studying and less time searching.',
  ],
  [
    'question'          => 'What improves collaboration in cohort programs?',
    'summary_subtitle'  => 'Community Experience',
    'summary_icon_box'  => true,
    'summary_icon_name' => 'community-line',
    'summary_icon_size' => '20',
    'content'           => 'Cohort learning becomes stronger when discussion spaces, peer feedback, and live session notes are connected to the same workflow. Students engage more when collaboration feels like part of the course instead of an extra step.',
  ],
];
$accordion_h_items = [
  [
    'question'          => 'Why do students struggle to stay on track?',
    'summary_subtitle'  => 'Learning Journey',
    'summary_icon_box'  => true,
    'summary_icon_name' => 'road-map-line',
    'summary_icon_size' => '20',
    'content'           => 'Students usually lose momentum when lessons, deadlines, and progress signals are scattered across too many places. A stronger learning experience makes the next step visible and keeps milestones easy to review.',
    'panel_image_url'   => 'https://plus.unsplash.com/premium_photo-1683887034552-4635692bb57c?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'panel_image_alt'   => 'Students learning with laptop and notes on a desk',
  ],
  [
    'question'          => 'How should course materials be organized?',
    'summary_subtitle'  => 'Curriculum Structure',
    'summary_icon_box'  => true,
    'summary_icon_name' => 'organization-chart',
    'summary_icon_size' => '20',
    'content'           => 'Course content works better when readings, assignments, and supporting resources are grouped by topic instead of being added as a long list. Clear structure helps learners spend more time studying and less time searching.',
    'panel_image_url'   => 'https://plus.unsplash.com/premium_photo-1664372145541-4556b409492e?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'panel_image_alt'   => 'Books and study materials arranged on a table',
  ],
  [
    'question'          => 'What improves collaboration in cohort programs?',
    'summary_subtitle'  => 'Community Experience',
    'summary_icon_box'  => true,
    'summary_icon_name' => 'community-line',
    'summary_icon_size' => '20',
    'content'           => 'Cohort learning becomes stronger when discussion spaces, peer feedback, and live session notes are connected to the same workflow. Students engage more when collaboration feels like part of the course instead of an extra step.',
    'panel_image_url'   => 'https://plus.unsplash.com/premium_photo-1683887034075-b72e70988274?q=80&w=1169&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'panel_image_alt'   => 'Students collaborating in a classroom discussion',
  ],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/accordion',
]);
?>
  <?php
  $canvas_header = [
    'header_title'           => 'Accordion',
    'header_subtitle'        => 'Reference for data-driven details-summary disclosure patterns.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('accordion', [
            'items' => $accordion_base_items,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('accordion', [
            'items'   => $accordion_base_items,
            'variant' => 'cards',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('accordion', [
            'items'                       => $accordion_base_items,
            'chevron_icon_name'           => 'add-line',
            'chevron_open_rotation_class' => 'group-open:-rotate-45',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('accordion', [
            'items'                       => $accordion_c_items,
            'chevron_icon_name'           => 'add-line',
            'chevron_open_rotation_class' => 'group-open:-rotate-45',
            'summary_class'               => 'flex items-center gap-3 py-3',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion D
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('accordion', [
            'items'   => $accordion_base_items,
            'variant' => 'cards',
            'details_class' => 'open:bg-brand-50',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion E
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('accordion', [
            'items'              => $accordion_base_items,
            'chevron_position'   => 'start',
            'summary_text_class' => 'accordion__title flex-1 text-left',
            'panel_class'        => 'pl-9',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion F
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <div class="<?php card('w-full bg-white'); ?>">
            <?php component('accordion', [
              'items'              => $accordion_base_items,
              'chevron_position'   => 'start',
              'summary_class'      => 'flex items-center gap-3 py-4 px-3',
              'summary_text_class' => 'accordion__title flex-1 text-left',
              'panel_class'        => 'pb-5 pl-12',
            ]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion G
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <div class="<?php card('w-full bg-white'); ?>">
            <div class="accordion w-full divide-y divide-brand-200">
              <details class="accordion__item" open>
                <summary class="accordion__summary flex cursor-pointer list-none items-center gap-3 px-4 py-4 font-medium">
                  <span class="accordion__icon-box inline-flex h-6 w-6 leading-none shrink-0 items-center justify-center" aria-hidden="true">
                    <?php icon('book-open-line', ['icon_size' => '20']); ?>
                  </span>
                  <span class="accordion__title flex-1 text-left text-brand-900 leading-5">Learning Modules</span>
                  <span class="accordion__toggle inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-md transform transition-transform duration-200">
                    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
                  </span>
                </summary>
                <div class="accordion__panel">
                  <?php component('accordion', [
                    'items'              => $accordion_base_items,
                    'chevron_position'   => 'start',
                    'details_class'      => 'open:bg-brand-50',
                    'summary_class'      => 'flex items-center gap-3 p-3 pl-4',
                    'summary_text_class' => 'accordion__title flex-1 text-left',
                    'panel_class'        => 'pb-5 pl-[52px]',
                  ]); ?>
                </div>
              </details>
              <details class="accordion__item">
                <summary class="accordion__summary flex cursor-pointer list-none items-center gap-3 px-4 py-4 font-medium">
                  <span class="accordion__icon-box inline-flex h-6 w-6 leading-none shrink-0 items-center justify-center" aria-hidden="true">
                    <?php icon('community-line', ['icon_size' => '20']); ?>
                  </span>
                  <span class="accordion__title flex-1 text-left text-brand-900 leading-5">Cohort Community</span>
                  <span class="accordion__toggle inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-md transform transition-transform duration-200">
                    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
                  </span>
                </summary>
                <div class="accordion__panel">
                  <?php component('accordion', [
                    'items'              => $accordion_base_items,
                    'chevron_position'   => 'start',
                    'details_class'      => 'open:bg-brand-50',
                    'summary_class'      => 'flex items-center gap-3 p-3 pl-4',
                    'summary_text_class' => 'accordion__title flex-1 text-left',
                    'panel_class'        => 'pb-5 pl-[52px]',
                  ]); ?>
                </div>
              </details>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex flex-col p-6 h-full">
      <div class="font-medium text-brand-900 flex items-center justify-between border-b border-brand-200 pb-4">
        Accordion H
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center bg-background px-6 py-8 overflow-hidden">
        <div class="flex w-full max-w-lg justify-center">
          <div class="<?php card('w-full bg-white'); ?>">
            <?php component('accordion', [
              'items'                       => $accordion_h_items,
              'chevron_icon_name'           => 'add-line',
              'chevron_open_rotation_class' => 'group-open:-rotate-45',
              'summary_class'               => 'flex items-center gap-3 p-5',
              'panel_class'                 => 'px-5 pb-5 pt-0',
            ]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
