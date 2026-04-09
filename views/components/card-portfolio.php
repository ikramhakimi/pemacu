<?php
/*
CSS Anatomy: card-portfolio

.card.card--portfolio
|_ .card__content
   |_ .card__category
   |_ .card__title
*/

$card_href           = '#';
$card_category       = 'Wedding Photography';
$card_title          = 'Puteri Alia Maisara & Ikhwan Khairuddin';
$card_category_class = 'card__category text-white/80';
$card_title_class    = 'card__title mt-2 text-xl font-bold text-white';
?>
<a class="card card--portfolio relative block aspect-[3/4] bg-brand-500 rounded-lg overflow-hidden" href="<?= htmlspecialchars($card_href, ENT_QUOTES, 'UTF-8'); ?>">
  <div class="card__content absolute bottom-0 left-0 w-full p-6">
    <p class="<?= $card_category_class; ?>">
      <?= htmlspecialchars($card_category, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <h3 class="<?= $card_title_class; ?>">
      <?= htmlspecialchars($card_title, ENT_QUOTES, 'UTF-8'); ?>
    </h3>
  </div>
</a>
