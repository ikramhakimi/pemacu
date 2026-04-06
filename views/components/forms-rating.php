<?php
declare(strict_types=1);

/**
 * Component: forms-rating
 * Purpose: Render rating field demos using star icons with interactive and disabled states.
 * Anatomy:
 * - .field
 *   - .field__label
 *   - .field__input
 *     - .rating
 *       - input[type=radio].sr-only
 *       - .rating__star
 *         - svg.icon.icon--star-fill.icon--20
 *   - .field__helper
 * Data Contract:
 * - Static kit demo with three variants: Session Rating, Preselected Value, Disabled.
 * - Active stars use gradient fill and update from checked radio value.
 * - Disabled variant is non-interactive.
 */
?>
<svg class="sr-only" width="0" height="0" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient id="rating-star-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#fcd34d"></stop>
      <stop offset="40%" stop-color="#fbbf24"></stop>
      <stop offset="60%" stop-color="#f59e0b"></stop>
      <stop offset="100%" stop-color="#d97706"></stop>
    </linearGradient>
  </defs>
</svg>

<div class="field space-y-2">
  <label class="field__label block text-sm font-medium text-brand-900" for="kit-rating-session-1">Session Rating</label>
  <div class="field__input">
    <div class="rating flex items-center gap-1" data-rating>
      <input id="kit-rating-session-1" class="sr-only" type="radio" name="kit-rating-session" value="1" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-session-1" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-session-2" class="sr-only" type="radio" name="kit-rating-session" value="2" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-session-2" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-session-3" class="sr-only" type="radio" name="kit-rating-session" value="3" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-session-3" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-session-4" class="sr-only" type="radio" name="kit-rating-session" value="4" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-session-4" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-session-5" class="sr-only" type="radio" name="kit-rating-session" value="5" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-session-5" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>
    </div>
  </div>
  <p class="field__helper field__helper--default">Tap a star to rate this session.</p>
</div>

<div class="field field--disabled space-y-2">
  <label class="field__label block text-sm font-medium text-brand-500" for="kit-rating-disabled-1">Disabled</label>
  <div class="field__input">
    <div class="rating flex items-center gap-1" data-rating data-rating-disabled="true">
      <input id="kit-rating-disabled-1" class="sr-only" type="radio" name="kit-rating-disabled" value="1" disabled data-rating-input>
      <label class="rating__star rating__star--control cursor-not-allowed" for="kit-rating-disabled-1" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-disabled-2" class="sr-only" type="radio" name="kit-rating-disabled" value="2" disabled data-rating-input>
      <label class="rating__star rating__star--control cursor-not-allowed" for="kit-rating-disabled-2" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-disabled-3" class="sr-only" type="radio" name="kit-rating-disabled" value="3" checked disabled data-rating-input>
      <label class="rating__star rating__star--control cursor-not-allowed" for="kit-rating-disabled-3" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-disabled-4" class="sr-only" type="radio" name="kit-rating-disabled" value="4" disabled data-rating-input>
      <label class="rating__star rating__star--control cursor-not-allowed" for="kit-rating-disabled-4" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-disabled-5" class="sr-only" type="radio" name="kit-rating-disabled" value="5" disabled data-rating-input>
      <label class="rating__star rating__star--control cursor-not-allowed" for="kit-rating-disabled-5" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>
    </div>
  </div>
  <p class="field__helper field__helper--disabled">Rating input is disabled.</p>
</div>

<div class="field field--positive space-y-2">
  <label class="field__label block text-sm font-medium text-brand-900" for="kit-rating-preselected-1">Preselected Value</label>
  <div class="field__input">
    <div class="rating flex items-center gap-1" data-rating>
      <input id="kit-rating-preselected-1" class="sr-only" type="radio" name="kit-rating-preselected" value="1" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-preselected-1" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-preselected-2" class="sr-only" type="radio" name="kit-rating-preselected" value="2" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-preselected-2" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-preselected-3" class="sr-only" type="radio" name="kit-rating-preselected" value="3" checked data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-preselected-3" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-preselected-4" class="sr-only" type="radio" name="kit-rating-preselected" value="4" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-preselected-4" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>

      <input id="kit-rating-preselected-5" class="sr-only" type="radio" name="kit-rating-preselected" value="5" data-rating-input>
      <label class="rating__star rating__star--control cursor-pointer" for="kit-rating-preselected-5" data-rating-star>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
      </label>
    </div>
  </div>
  <p class="field__helper field__helper--success">Current value: 3 out of 5.</p>
</div>

<div class="field field--info space-y-2">
  <p class="field__label block text-sm font-medium text-brand-900">Info / Result</p>
  <div class="field__input">
    <div class="rating flex items-center gap-1" aria-label="Rating result: 4 out of 5">
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
      <span class="rating__star rating__star--control" aria-hidden="true">
        <svg class="icon icon--20 icon--star-fill" viewBox="0 0 24 24" fill="url(#rating-star-gradient)" xmlns="http://www.w3.org/2000/svg">
          <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
        </svg>
      </span>
      <span class="rating__star rating__star--control text-brand-300" aria-hidden="true">
        <?php icon('star-fill', ['icon_size' => '20']); ?>
      </span>
      <span class="ml-2 text-sm font-medium text-brand-700">4.0 / 5</span>
    </div>
  </div>
  <p class="field__helper field__helper--default">Read-only rating display for result summaries.</p>
</div>
