<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Cards';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/cards',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Cards',
    'header_subtitle'        => 'Reference for content grouping, hierarchy, and reusable card patterns across product surfaces.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use cards to group related content and actions.</li>
      <li>Keep one primary purpose per card type.</li>
      <li>Keep title and supporting content concise.</li>
      <li>Use consistent spacing and action placement across variants.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Package Card</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for service or product packages with medium content and a clear action.</p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <div class="grid gap-4 md:grid-cols-3">
          <?php component('card-package'); ?>
          <?php component('card-package'); ?>
          <?php component('card-package'); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Feature Card</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for short highlights such as benefits, capabilities, or key points.</p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <div class="grid gap-4 md:grid-cols-3">
          <?php component('card-feature'); ?>
          <?php component('card-feature'); ?>
          <?php component('card-feature'); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Process Card</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for linear steps and workflow explanations.</p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <div class="grid gap-4 md:grid-cols-3">
          <?php component('card-process'); ?>
          <?php component('card-process'); ?>
          <?php component('card-process'); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Portfolio Card</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for visual case studies and portfolio previews.</p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <div class="grid gap-4 md:grid-cols-3">
          <?php component('card-portfolio'); ?>
          <?php component('card-portfolio'); ?>
          <?php component('card-portfolio'); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Testimonial Card</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for customer quotes and proof points.</p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <div class="grid gap-4 md:grid-cols-3">
          <?php component('card-testimonial'); ?>
          <?php component('card-testimonial'); ?>
          <?php component('card-testimonial'); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Intro Call Card (API-driven)</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for short booking prompts where content comes from API payloads.</p>
      <div class="mt-4 rounded-md bg-white p-5 border border-dashed border-brand-300">
        <div class="grid gap-4 md:grid-cols-3">
          <?php component('card-intro-call', [
            'card_intro_call' => [
              'icon_name'      => 'calendar-line',
              'title'          => "Book a 15-min\nintro call",
              'action_label'   => 'Book a Call',
              'action_href'    => '#',
              'note_icon_name' => 'calendar-line',
              'note_text'      => 'Our team will reach out within 24 hours to schedule your intro call.',
            ],
          ]); ?>
          <?php component('card-intro-call', [
            'card_intro_call' => [
              'icon_name'      => 'message-line',
              'title'          => "Request a\nproject consult",
              'action_label'   => 'Request Consult',
              'action_href'    => '#',
              'note_icon_name' => 'message-line',
              'note_text'      => 'Share your goals and we will send a recommended plan by the next business day.',
            ],
          ]); ?>
          <?php component('card-intro-call', [
            'card_intro_call' => [
              'icon_name'      => 'phone-line',
              'title'          => "Need a quick\npricing call?",
              'action_label'   => 'Talk to Sales',
              'action_href'    => '#',
              'note_icon_name' => 'phone-line',
              'note_text'      => 'A specialist will confirm scope and pricing options in under 24 hours.',
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
