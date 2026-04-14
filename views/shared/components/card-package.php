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
$card_shell_href        = path('/package');
$card_title_class       = 'card__title text-xl font-medium text-brand-800';
$card_price_class       = 'card__price text text--price text-base font-medium text-emerald-600';
$card_description_class = 'card__description mt-2 text-base text-brand-600';
$card_features_class    = 'card__features mt-2 list-inside list-disc leading-relaxed text-brand-500';
$card_action_class      = 'card__action mt-4 flex gap-1';
?>
<a
  class="<?php card('card--package block bg-brand-50 overflow-hidden hover:border-brand-300 hover:shadow-xl hover:bg-white transition-all duration-300 ease-in-out') ?>"
  href="<?= e($card_shell_href); ?>"
>
  <div class="card__photo rounded-lg overflow-hidden m-2 mb-1">
  <?php component('placeholder-image', [
    'aspect-ratio'     => 'aspect-[5/4]',
    'background-class' => 'bg-brand-300',
    'icon-name'        => 'image-2-line',
    'icon-size'        => '24',
    'icon-color'       => 'text-brand-500',
  ]); ?>
  </div>

  <div class="card__content p-6 pt-3">
    <h3 class="<?= $card_title_class; ?>">
      <?= htmlspecialchars($card_title, ENT_QUOTES, 'UTF-8'); ?>
    </h3>
    <p class="<?= $card_price_class; ?>">
      <?= htmlspecialchars($card_price, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <?php if($card_description) {?>
    <p class="<?= $card_description_class; ?>">
      <?= htmlspecialchars($card_description, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <?php } ?>
    <ul class="<?= $card_features_class; ?>">
      <li class="card__feature-item"><?= htmlspecialchars($card_feature_one, ENT_QUOTES, 'UTF-8'); ?></li>
      <li class="card__feature-item"><?= htmlspecialchars($card_feature_two, ENT_QUOTES, 'UTF-8'); ?></li>
      <li class="card__feature-item"><?= htmlspecialchars($card_feature_three, ENT_QUOTES, 'UTF-8'); ?></li>
    </ul>
    <div class="<?= $card_action_class; ?>">
      <span class="<?php button_gradient('md/default', 'w-full shadow-lg shadow-brand-400'); ?>">
        <span class="button__label"><?= htmlspecialchars($card_action_label, ENT_QUOTES, 'UTF-8'); ?></span>
      </span>
    </div>
  </div>
</a>
