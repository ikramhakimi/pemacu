<?php
/*
CSS Anatomy: card-process

.card.card--process
|_ .card__content
   |_ .card__count
   |_ .card__title
   |_ .card__description
*/

$card_count             = '01';
$card_title             = 'Reach Out';
$card_description       = "Share your date, location, and goals. We'll confirm availability and recommend the best-fit package.";
$card_count_class       = 'card__count mb-2 text-5xl font-light text-brand-300';
$card_title_class       = 'card__title title title--5 text-lg font-bold text-brand-900';
$card_description_class = 'card__description mt-1 text-brand-700';
?>
<article class="card card--process block bg-white border border-brand-200 rounded-lg overflow-hidden">
  <div class="card__content p-5">
    <div class="<?= $card_count_class; ?>">
      <?= htmlspecialchars($card_count, ENT_QUOTES, 'UTF-8'); ?>
    </div>
    <h3 class="<?= $card_title_class; ?>">
      <?= htmlspecialchars($card_title, ENT_QUOTES, 'UTF-8'); ?>
    </h3>
    <p class="<?= $card_description_class; ?>">
      <?= htmlspecialchars($card_description, ENT_QUOTES, 'UTF-8'); ?>
    </p>
  </div>
</article>
