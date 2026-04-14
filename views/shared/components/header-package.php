<?php
/*
CSS Anatomy: header-package

.header.header--package
|_ .header__title
|_ .header__topic
|  |_ .header__price
|  |_ .header__feature
|_ .header__subtitle
*/

$header_title          = $header_title ?? 'Header For Package';
$header_price          = $header_price ?? 'RM 100';
$header_feature_one    = $header_feature_one ?? '2 Photographers';
$header_feature_two    = $header_feature_two ?? 'Up to 10 people';
$header_feature_three  = $header_feature_three ?? '30 minutes';
$header_subtitle       = $header_subtitle ?? 'Ideal package solution for all ranges of issues during the festive season.';
$header_container_class = 'container max-w-6xl mx-auto w-full px-4';
$header_title_class    = 'header__title tracking-tight max-w-2xl font-bold text-3xl md:text-4xl text-brand-900';
$header_topic_class    = 'header__topic mt-2 md:inline-flex items-center md:space-x-3 divide-x divide-brand-300 text-sm md:leading-none text-brand-500';
$header_price_class    = 'header__price text-lg font-semibold text-positive-600';
$header_feature_class  = 'header__feature pl-3 mt-1 md:mt-0 text-brand-500';
$header_subtitle_class = 'header__subtitle mt-3 max-w-3xl text-base text-brand-700';
?>
<header class="header header--package py-8">
  <div class="<?= $header_container_class; ?>">
    <h1 class="<?= $header_title_class; ?>">
      <?= htmlspecialchars($header_title, ENT_QUOTES, 'UTF-8'); ?>
    </h1>
    <div class="<?= $header_topic_class; ?>">
      <div class="<?= $header_price_class; ?>">
        <?= htmlspecialchars($header_price, ENT_QUOTES, 'UTF-8'); ?>
      </div>
      <div>
        <span class="<?= $header_feature_class; ?>">
          <?= htmlspecialchars($header_feature_one, ENT_QUOTES, 'UTF-8'); ?>
        </span>
        <span class="<?= $header_feature_class; ?>">
          <?= htmlspecialchars($header_feature_two, ENT_QUOTES, 'UTF-8'); ?>
        </span>
        <span class="<?= $header_feature_class; ?>">
          <?= htmlspecialchars($header_feature_three, ENT_QUOTES, 'UTF-8'); ?>
        </span>
      </div>
    </div>
    <p class="<?= $header_subtitle_class; ?>">
      <?= htmlspecialchars($header_subtitle, ENT_QUOTES, 'UTF-8'); ?>
    </p>
  </div>
</header>
