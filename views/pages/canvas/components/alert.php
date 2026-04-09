<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Alert';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$alert_items = [
  [
    'title'       => 'Payment received',
    'description' => 'Your booking payment has been confirmed successfully.',
    'tone'        => 'positive',
    'dismissible' => true,
    'actions'     => [
      ['label' => 'View receipt', 'href' => '#'],
    ],
  ],
  [
    'title'       => 'Payment failed',
    'description' => 'We could not process your transaction. Please try again.',
    'tone'        => 'negative',
    'dismissible' => true,
    'actions'     => [
      ['label' => 'Retry'],
    ],
  ],
  [
    'title'       => 'Pending confirmation',
    'description' => 'Your request is in queue and awaiting manual review.',
    'tone'        => 'neutral',
    'dismissible' => true,
  ],
  [
    'title'       => 'Limited slots left',
    'description' => 'Only a few time slots remain for this weekend.',
    'tone'        => 'warning',
    'dismissible' => true,
  ],
  [
    'title'       => 'Heads up',
    'description' => 'Session reminders are sent 24 hours before appointment time.',
    'tone'        => 'info',
    'dismissible' => true,
  ],
];

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/alert',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Alert',
    'header_subtitle'        => 'Reference for semantic alert tones, dismissible behavior, and action affordances.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use alerts to communicate status and contextual feedback near related actions.</li>
      <li>Use semantic tones consistently: positive, negative, neutral, warning, and info.</li>
      <li>Keep title concise and description action-oriented for faster comprehension.</li>
      <li>Use dismissible alerts only when the message is non-blocking.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Positive</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for successful outcomes and confirmations.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('alert', ['items' => [$alert_items[0]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Negative</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for failures, blocking issues, or critical errors.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('alert', ['items' => [$alert_items[1]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Neutral</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for informative updates without urgency.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('alert', ['items' => [$alert_items[2]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Warning</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for caution and attention-needed status.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('alert', ['items' => [$alert_items[3]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Info</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for contextual notes and operational guidance.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('alert', ['items' => [$alert_items[4]]]); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas-end'); ?>
