<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Badge';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$badge_items = [
  [
    'label' => '+12.4%',
    'tone'  => 'positive',
  ],
  [
    'label' => '-4.1%',
    'tone'  => 'negative',
  ],
  [
    'label' => 'Pending',
    'tone'  => 'neutral',
  ],
  [
    'label' => 'Awaiting Review',
    'tone'  => 'warning',
  ],
  [
    'label' => 'In Progress',
    'tone'  => 'info',
  ],
  [
    'label' => 'Priority',
    'tone'  => 'accent',
  ],
];

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/badge',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Badge',
    'header_subtitle'        => 'Reference for inline-flex badge tone variants with light background and border treatment.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use badges for compact status, trend, and category labels.</li>
      <li>Use semantic tones to convey status intent consistently.</li>
      <li>Keep badge copy short for fast scanning in dense layouts.</li>
      <li>Use inline-flex pill styling to align badges neatly with text and UI controls.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Positive</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for successful outcomes, upward trends, and completion states.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('badge', ['items' => [$badge_items[0]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Negative</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for declines, errors, and risky or blocked states.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('badge', ['items' => [$badge_items[1]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Neutral</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for informational states that are not urgent or directional.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('badge', ['items' => [$badge_items[2]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Warning</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for pending review, caution, and attention-needed states.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('badge', ['items' => [$badge_items[3]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Info</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for active processing and contextual operational status.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('badge', ['items' => [$badge_items[4]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Accent</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use for emphasis tags such as priority markers and highlighted labels.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('badge', ['items' => [$badge_items[5]]]); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas-end'); ?>
