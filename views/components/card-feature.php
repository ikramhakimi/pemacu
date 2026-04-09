<?php
/*
CSS Anatomy: card-feature

.card.card--feature
|_ .card__media
|  |_ .card__icon
|_ .card__content
   |_ .card__title
   |_ .card__description
   |_ .card__features
   |  |_ .card__feature-item
   |_ .card__action
*/

$card_title             = 'Feature Name';
$card_description       = 'Highlight the key features and benefits to attract potential customers.';
$card_feature_one       = '1-2 Solutions';
$card_feature_two       = '30 minutes coverage';
$card_action_label      = 'Learn More';
$card_action_href       = '#';
$card_title_class       = 'card__title text-lg font-semibold text-brand-900';
$card_description_class = 'card__description mt-1 text-base text-brand-700';
$card_features_class    = 'card__features mt-2 list-inside list-disc leading-relaxed text-brand-500';
$card_action_class      = 'card__action mt-4 border-t border-brand-200 pt-5';
$card_link_class        = 'text-brand-700 hover:underline';
?>
<article class="card card--feature overflow-hidden rounded-lg border border-brand-200 bg-white">
  <div class="card__media m-5 mb-0 flex items-center justify-between">
    <div class="card__icon flex h-16 w-16 items-center justify-center rounded-lg bg-brand-300"></div>
  </div>
  <div class="card__content p-5">
    <h3 class="<?= $card_title_class; ?>">
      <?= htmlspecialchars($card_title, ENT_QUOTES, 'UTF-8'); ?>
    </h3>
    <p class="<?= $card_description_class; ?>">
      <?= htmlspecialchars($card_description, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <ul class="<?= $card_features_class; ?>">
      <li class="card__feature-item"><?= htmlspecialchars($card_feature_one, ENT_QUOTES, 'UTF-8'); ?></li>
      <li class="card__feature-item"><?= htmlspecialchars($card_feature_two, ENT_QUOTES, 'UTF-8'); ?></li>
    </ul>
    <div class="<?= $card_action_class; ?>">
      <a class="<?= $card_link_class; ?>" href="<?= htmlspecialchars($card_action_href, ENT_QUOTES, 'UTF-8'); ?>">
        <?= htmlspecialchars($card_action_label, ENT_QUOTES, 'UTF-8'); ?>
      </a>
    </div>
  </div>
</article>
