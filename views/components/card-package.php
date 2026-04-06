<?php
/*
CSS Anatomy: card-package

.card.card--package
|_ .card__photo
|_ .card__content
   |_ .card__title
   |_ .card__price
   |_ .card__description
   |_ .card__features
   |  |_ .card__feature-item
   |_ .card__action
      |_ .btn
*/

$card_title             = 'Package Name';
$card_price             = 'RM 100';
$card_description       = 'Highlight the key features and benefits to attract potential customers.';
$card_feature_one       = '1-2 Solutions';
$card_feature_two       = '30 minutes coverage';
$card_feature_three     = 'Up to 10 people';
$card_action_label      = 'Book Package';
$card_action_href       = '/bookingpro-themes/services/wedding-storytelling';
$card_photo_placeholder = 'No photo';
$card_title_class       = 'card__title title title--5 text-lg font-bold text-brand-900';
$card_price_class       = 'card__price text text--price text-base font-semibold text-emerald-600';
$card_description_class = 'card__description mt-1 text-brand-700';
$card_features_class    = 'card__features mt-2 list-inside list-disc leading-relaxed text-brand-500';
$card_action_class      = 'card__action mt-4 flex gap-1';
$card_button_class      = 'btn btn--default btn--md inline-flex items-center justify-center rounded-lg border border-transparent bg-brand-900 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-white w-full';
?>
<article class="card card--package block bg-white border border-brand-200 rounded-lg overflow-hidden">
  <div class="card__photo aspect-square overflow-hidden bg-brand-200">
    <div class="flex h-full items-center justify-center text-sm text-brand-500">
      <?= htmlspecialchars($card_photo_placeholder, ENT_QUOTES, 'UTF-8'); ?>
    </div>
  </div>

  <div class="card__content p-5 pt-3">
    <h3 class="<?= $card_title_class; ?>">
      <?= htmlspecialchars($card_title, ENT_QUOTES, 'UTF-8'); ?>
    </h3>
    <p class="<?= $card_price_class; ?>">
      <?= htmlspecialchars($card_price, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <p class="<?= $card_description_class; ?>">
      <?= htmlspecialchars($card_description, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <ul class="<?= $card_features_class; ?>">
      <li class="card__feature-item"><?= htmlspecialchars($card_feature_one, ENT_QUOTES, 'UTF-8'); ?></li>
      <li class="card__feature-item"><?= htmlspecialchars($card_feature_two, ENT_QUOTES, 'UTF-8'); ?></li>
      <li class="card__feature-item"><?= htmlspecialchars($card_feature_three, ENT_QUOTES, 'UTF-8'); ?></li>
    </ul>
    <div class="<?= $card_action_class; ?>">
      <a class="<?= $card_button_class; ?>" href="<?= htmlspecialchars($card_action_href, ENT_QUOTES, 'UTF-8'); ?>">
        <?= htmlspecialchars($card_action_label, ENT_QUOTES, 'UTF-8'); ?>
      </a>
    </div>
  </div>
</article>
