<?php

declare(strict_types=1);

$product_image    = isset($product_image) ? trim((string) $product_image) : '';
$product_title    = isset($product_title) ? trim((string) $product_title) : 'Product';
$product_price    = isset($product_price) ? trim((string) $product_price) : 'RM 199';
$product_category = isset($product_category) ? trim((string) $product_category) : 'Baju Melayu';
$product_alt      = isset($product_alt) ? trim((string) $product_alt) : $product_title;
?>
<article class="product-card hover:bg-brand-100 pb-6 h-full">
  <img class="hidden aspect-[3/4] w-full object-cover" src="<?= e($product_image); ?>" alt="<?= e($product_alt); ?>">
  <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[3/4]']); ?>
  <div class="mt-3 text-center">
    <div class="product-card__sizes flex items-center justify-center gap-1 mb-3" role="list">
      <a class="product-card__size ring-1 ring-inset ring-brand-300 rounded-sm bg-brand-200 text-xs size-8 flex items-center justify-center" href="#" data-size="XS" aria-label="View size XS">XS</a>
      <a class="product-card__size ring-1 ring-inset ring-brand-300  rounded-sm bg-brand-200 text-xs size-8 flex items-center justify-center" href="#" data-size="S" aria-label="View size S">S</a>
      <a class="product-card__size ring-1 ring-inset ring-brand-300  rounded-sm bg-brand-200 text-xs size-8 flex items-center justify-center" href="#" data-size="M" aria-label="View size M">M</a>
      <a class="product-card__size ring-1 ring-inset ring-brand-300  rounded-sm bg-brand-200 text-xs size-8 flex items-center justify-center" href="#" data-size="L" aria-label="View size L">L</a>
      <span class="product-card__size rounded-sm is-soldout bg-brand-100 text-brand-400 text-xs size-8 flex items-center justify-center" aria-disabled="true">XL</span>
    </div>
    <div class="text-brand-500 leading-tight"><?= e($product_category); ?></div>
    <h3 class="uppercase font-bold text-brand-900 leading-6"><?= e($product_title); ?></h3>
    <p class="text-brand-700 leading-tight"><?= e($product_price); ?></p>
  </div>
</article>
