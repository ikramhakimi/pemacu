<?php
declare(strict_types=1);

/**
 * Component: forms-stepper
 * Purpose: Render numeric steppers with absolute decrease/increase controls.
 * Anatomy:
 * - .stepper
 * - .stepper__decrease
 * - .stepper__number
 * - .stepper__increase
 * Data Contract:
 * - Demo variants for sm/md/lg heights, aligned with input size tokens.
 * - Buttons are absolutely positioned with 4px inset from root.
 * - Interaction is handled by `assets/js/app.js` via `data-stepper-*` hooks.
 */
?>
<div class="stepper stepper--sm relative w-full" data-stepper data-stepper-min="0" data-stepper-max="20" data-stepper-step="1">
  <button class="stepper__decrease btn btn--default absolute left-[4px] top-[4px] inline-flex h-[calc(var(--ui-h-sm)-8px)] w-8 items-center justify-center rounded-md border border-transparent bg-brand-900 text-white" type="button" aria-label="Decrease value" data-stepper-decrease>
    <?php icon('subtract-line', ['icon_size' => '16']); ?>
  </button>
  <input class="stepper__number input input--sm h-[var(--ui-h-sm)] w-full rounded-md bg-white px-11 text-center text-xs text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" value="2" inputmode="numeric" readonly data-stepper-number>
  <button class="stepper__increase btn btn--default absolute right-[4px] top-[4px] inline-flex h-[calc(var(--ui-h-sm)-8px)] w-8 items-center justify-center rounded-md border border-transparent bg-brand-900 text-white" type="button" aria-label="Increase value" data-stepper-increase>
    <?php icon('add-line', ['icon_size' => '16']); ?>
  </button>
</div>

<div class="stepper stepper--md relative w-full" data-stepper data-stepper-min="1" data-stepper-max="30" data-stepper-step="1">
  <button class="stepper__decrease btn btn--default absolute left-[4px] top-[4px] inline-flex h-[calc(var(--ui-h-md)-8px)] w-9 items-center justify-center rounded-md border border-transparent bg-brand-900 text-white" type="button" aria-label="Decrease value" data-stepper-decrease>
    <?php icon('subtract-line', ['icon_size' => '16']); ?>
  </button>
  <input class="stepper__number input input--md h-[var(--ui-h-md)] w-full rounded-md bg-white px-12 text-center text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" value="10" inputmode="numeric" readonly data-stepper-number>
  <button class="stepper__increase btn btn--default absolute right-[4px] top-[4px] inline-flex h-[calc(var(--ui-h-md)-8px)] w-9 items-center justify-center rounded-md border border-transparent bg-brand-900 text-white" type="button" aria-label="Increase value" data-stepper-increase>
    <?php icon('add-line', ['icon_size' => '16']); ?>
  </button>
</div>

<div class="stepper stepper--lg relative w-full md:col-span-2" data-stepper data-stepper-min="0" data-stepper-max="50" data-stepper-step="5">
  <button class="stepper__decrease btn btn--default absolute left-[4px] top-[4px] inline-flex h-[calc(var(--ui-h-lg)-8px)] w-10 items-center justify-center rounded-md border border-transparent bg-brand-900 text-white" type="button" aria-label="Decrease value" data-stepper-decrease>
    <?php icon('subtract-line', ['icon_size' => '16']); ?>
  </button>
  <input class="stepper__number input input--lg h-[var(--ui-h-lg)] w-full rounded-md bg-white px-14 text-center text-base text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" value="25" inputmode="numeric" readonly data-stepper-number>
  <button class="stepper__increase btn btn--default absolute right-[4px] top-[4px] inline-flex h-[calc(var(--ui-h-lg)-8px)] w-10 items-center justify-center rounded-md border border-transparent bg-brand-900 text-white" type="button" aria-label="Increase value" data-stepper-increase>
    <?php icon('add-line', ['icon_size' => '16']); ?>
  </button>
</div>
