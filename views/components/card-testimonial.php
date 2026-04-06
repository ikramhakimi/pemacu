<?php
/*
CSS Anatomy: card-testimonial

.card.card--testimonial
|_ .card__content
   |_ .card__ratings.ratings
   |  |_ .rating__star
   |     |_ .icon.icon--star-fill
   |_ .card__description
   |_ .card__media
      |_ .card__avatar
      |_ .card__actor
         |_ .card__name
         |_ .card__role
*/

$rating_label           = 'Rating 5 out of 5';
$testimonial_quote      = "Lumera captured our wedding with such sensitivity and artistry. Every photograph felt like a painting. We've recommended them to four other couples since.";
$testimonial_name       = 'John Doe';
$testimonial_role       = 'Wedding Client';
$card_quote_class       = 'card__description mt-1 text-brand-700';
$card_name_class        = 'card__name text-sm font-semibold text-brand-900';
$card_role_class        = 'card__role text-xs text-brand-500';
?>
<article class="card card--testimonial block bg-white border border-brand-200 rounded-lg overflow-hidden">
  <div class="card__content p-5">
    <div class="card__ratings ratings ratings--stars mb-4 flex items-center gap-1" aria-label="<?= htmlspecialchars($rating_label, ENT_QUOTES, 'UTF-8'); ?>">
      <svg class="sr-only" width="0" height="0" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <linearGradient id="testimonial-rating-star-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
            <stop offset="0%" stop-color="#fcd34d"></stop>
            <stop offset="40%" stop-color="#fbbf24"></stop>
            <stop offset="60%" stop-color="#f59e0b"></stop>
            <stop offset="100%" stop-color="#d97706"></stop>
          </linearGradient>
        </defs>
      </svg>
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#testimonial-rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#testimonial-rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#testimonial-rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#testimonial-rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#testimonial-rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
    </div>

    <p class="<?= $card_quote_class; ?>">
      <?= htmlspecialchars($testimonial_quote, ENT_QUOTES, 'UTF-8'); ?>
    </p>

    <div class="card__media mt-4 flex items-center space-x-2">
      <div class="card__avatar flex h-10 w-10 items-center justify-center rounded-lg bg-brand-300"></div>
      <div class="card__actor">
        <h6 class="<?= $card_name_class; ?>">
          <?= htmlspecialchars($testimonial_name, ENT_QUOTES, 'UTF-8'); ?>
        </h6>
        <p class="<?= $card_role_class; ?>">
          <?= htmlspecialchars($testimonial_role, ENT_QUOTES, 'UTF-8'); ?>
        </p>
      </div>
    </div>
  </div>
</article>
