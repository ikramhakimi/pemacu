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

layout('canvas/layouts/canvas-start', [
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
      <li>Use standalone badge by default; use <code>badge-list</code> only for grouped badge sets.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Standalone Badge</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Default badge usage for a single status, trend, or category label.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('badge', ['items' => [$badge_items[0]]]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Tone Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use these semantic tones to communicate intent consistently.
      </p>
      <div class="mt-4 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        <div class="rounded-md border border-dashed border-brand-300 bg-white p-4 space-y-2">
          <p class="text-sm text-brand-600">Positive</p>
          <?php component('badge', ['items' => [$badge_items[0]]]); ?>
        </div>
        <div class="rounded-md border border-dashed border-brand-300 bg-white p-4 space-y-2">
          <p class="text-sm text-brand-600">Negative</p>
          <?php component('badge', ['items' => [$badge_items[1]]]); ?>
        </div>
        <div class="rounded-md border border-dashed border-brand-300 bg-white p-4 space-y-2">
          <p class="text-sm text-brand-600">Neutral</p>
          <?php component('badge', ['items' => [$badge_items[2]]]); ?>
        </div>
        <div class="rounded-md border border-dashed border-brand-300 bg-white p-4 space-y-2">
          <p class="text-sm text-brand-600">Warning</p>
          <?php component('badge', ['items' => [$badge_items[3]]]); ?>
        </div>
        <div class="rounded-md border border-dashed border-brand-300 bg-white p-4 space-y-2">
          <p class="text-sm text-brand-600">Info</p>
          <?php component('badge', ['items' => [$badge_items[4]]]); ?>
        </div>
        <div class="rounded-md border border-dashed border-brand-300 bg-white p-4 space-y-2">
          <p class="text-sm text-brand-600">Accent</p>
          <?php component('badge', ['items' => [$badge_items[5]]]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Clamp With Short Info</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Pair one standalone badge with short helper info in one clamp row.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="flex items-center justify-start gap-2">
          <?php component('badge', ['items' => [$badge_items[2]]]); ?>
          <p class="text-xs text-brand-500">Updated 5 mins ago</p>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Badge List</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use <code>show_wrapper => true</code> only for grouped sets, with left or right alignment as needed.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5 space-y-4">
        <p class="text-sm text-brand-600">Left Alignment</p>
        <div class="flex justify-start">
          <?php component('badge', [
            'items' => $badge_items,
            'show_wrapper' => true,
          ]); ?>
        </div>
      </div>

      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5 space-y-4">
        <p class="text-sm text-brand-600">Right Alignment</p>
        <div class="flex justify-end">
          <?php component('badge', [
            'items' => $badge_items,
            'show_wrapper' => true,
          ]); ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
