<?php

declare(strict_types=1);

$label  = isset($label) ? trim((string) $label) : 'Metric';
$value  = isset($value) ? trim((string) $value) : '-';
$helper = isset($helper) ? trim((string) $helper) : '';
$tone   = isset($tone) ? trim((string) $tone) : 'neutral';

$tone_classes = [
  'neutral'  => 'border-brand-200-bg-white',
  'positive' => 'border-positive-200-bg-positive-50',
  'warning'  => 'border-attention-200-bg-attention-50',
  'negative' => 'border-negative-200-bg-negative-50',
];

if (!isset($tone_classes[$tone])) {
  $tone = 'neutral';
}
?>
<article class="bg-white ring-1 ring-brand-200 p-4 md:p-5 <?= e($tone_classes[$tone]); ?>">
  <p class="text-xs font-semibold uppercase tracking-wide text-brand-500"><?= e($label); ?></p>
  <p class="mt-3 text-2xl font-semibold leading-none text-brand-900"><?= e($value); ?></p>
  <?php if ($helper !== ''): ?>
    <p class="mt-2 text-sm text-brand-600"><?= e($helper); ?></p>
  <?php endif; ?>
</article>
