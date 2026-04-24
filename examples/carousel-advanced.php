<?php

declare(strict_types=1);

$carousel_items = [
  '<article class="h-full rounded-xl border border-brand-200 bg-white p-5 shadow-sm"><p class="text-xs font-semibold uppercase tracking-[0.12em] text-brand-500">Campaign</p><h3 class="mt-3 text-lg font-semibold text-brand-900">Spring Launch Collection</h3><p class="mt-2 text-sm text-brand-700">Coordinated visual rollout with art direction and shoot timeline.</p><div class="mt-4 text-xs font-semibold text-brand-600">Window: 6 weeks</div></article>',
  '<article class="h-full rounded-xl border border-brand-200 bg-white p-5 shadow-sm"><p class="text-xs font-semibold uppercase tracking-[0.12em] text-brand-500">Editorial</p><h3 class="mt-3 text-lg font-semibold text-brand-900">Studio Portrait Series</h3><p class="mt-2 text-sm text-brand-700">Lighting setups and talent scheduling aligned in one production board.</p><div class="mt-4 text-xs font-semibold text-brand-600">Window: 3 sessions</div></article>',
  '<article class="h-full rounded-xl border border-brand-200 bg-white p-5 shadow-sm"><p class="text-xs font-semibold uppercase tracking-[0.12em] text-brand-500">Operations</p><h3 class="mt-3 text-lg font-semibold text-brand-900">Delivery Pipeline</h3><p class="mt-2 text-sm text-brand-700">Preview, revisions, and final handoff with SLA tracking.</p><div class="mt-4 text-xs font-semibold text-brand-600">Window: Daily</div></article>',
  '<article class="h-full rounded-xl border border-brand-200 bg-white p-5 shadow-sm"><p class="text-xs font-semibold uppercase tracking-[0.12em] text-brand-500">Brand</p><h3 class="mt-3 text-lg font-semibold text-brand-900">Identity Refresh Sprint</h3><p class="mt-2 text-sm text-brand-700">Asset updates for website, social, and client decks.</p><div class="mt-4 text-xs font-semibold text-brand-600">Window: 4 phases</div></article>',
  '<article class="h-full rounded-xl border border-brand-200 bg-white p-5 shadow-sm"><p class="text-xs font-semibold uppercase tracking-[0.12em] text-brand-500">Partnership</p><h3 class="mt-3 text-lg font-semibold text-brand-900">Agency Co-Production</h3><p class="mt-2 text-sm text-brand-700">Joint sprint planning with deliverables mapped by ownership.</p><div class="mt-4 text-xs font-semibold text-brand-600">Window: 2 teams</div></article>',
  '<article class="h-full rounded-xl border border-brand-200 bg-white p-5 shadow-sm"><p class="text-xs font-semibold uppercase tracking-[0.12em] text-brand-500">Growth</p><h3 class="mt-3 text-lg font-semibold text-brand-900">Retention Visual Pack</h3><p class="mt-2 text-sm text-brand-700">Lifecycle visuals aligned to CRM segments and publishing cadence.</p><div class="mt-4 text-xs font-semibold text-brand-600">Window: Monthly</div></article>',
];
?>
<section class="mx-auto w-full max-w-6xl px-4 py-10">
  <?php component('carousel', [
    'carousel_id'              => 'example-carousel-advanced',
    'carousel_items'           => $carousel_items,
    'carousel_autoplay'        => true,
    'carousel_interval'        => 4500,
    'carousel_infinite'        => true,
    'carousel_snap'            => true,
    'carousel_centered'        => true,
    'carousel_slides_qty'      => [
      'xs' => 1,
      'sm' => 2,
      'lg' => 3,
    ],
    'carousel_show_pagination' => true,
    'carousel_show_arrows'     => true,
    'carousel_show_info'       => true,
    'carousel_class'           => 'opacity-0 transition-opacity duration-300',
    'carousel_body_class'      => 'gap-4',
    'carousel_slide_class'     => '',
  ]); ?>
</section>
