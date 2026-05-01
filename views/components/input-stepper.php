<?php
declare(strict_types=1);

/**
 * Component: input-stepper
 * Purpose: Render numeric steppers with inline decrease/increase controls.
 * Anatomy:
 * - .input-stepper
 * - .input-stepper__decrease
 * - .input-stepper__number
 * - .input-stepper__increase
 * Data Contract:
 * - Demo variants for sm/md/lg heights, aligned with input size tokens.
 * - Layout uses inline-flex with compact gaps.
 * - Interaction is handled by `assets/js/app.js` via `data-stepper-*` hooks.
 */
?>
<div class="input-stepper input-stepper--sm inline-flex w-fit items-center gap-1" data-stepper data-stepper-min="0" data-stepper-max="20" data-stepper-step="1">
  <?php component('button', [
    'label'      => 'Decrease value',
    'type'       => 'button',
    'variant'    => 'default',
    'size'       => 'sm',
    'gradient'   => true,
    'icon_name'  => 'subtract-line',
    'icon_only'  => true,
    'aria_label' => 'Decrease value',
    'class'      => 'input-stepper__decrease shrink-0',
    'attributes' => [
      'data-stepper-decrease' => true,
    ],
  ]); ?>
  <input class="input-stepper__number input input--sm h-[var(--ui-h-sm)] w-20 rounded-md bg-white px-3 text-center text-xs text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" value="2" inputmode="numeric" readonly data-stepper-number>
  <?php component('button', [
    'label'      => 'Increase value',
    'type'       => 'button',
    'variant'    => 'default',
    'size'       => 'sm',
    'gradient'   => true,
    'icon_name'  => 'add-line',
    'icon_only'  => true,
    'aria_label' => 'Increase value',
    'class'      => 'input-stepper__increase shrink-0',
    'attributes' => [
      'data-stepper-increase' => true,
    ],
  ]); ?>
</div>

<div class="input-stepper input-stepper--md inline-flex w-fit items-center gap-1" data-stepper data-stepper-min="1" data-stepper-max="30" data-stepper-step="1">
  <?php component('button', [
    'label'      => 'Decrease value',
    'type'       => 'button',
    'variant'    => 'default',
    'size'       => 'md',
    'gradient'   => true,
    'icon_name'  => 'subtract-line',
    'icon_only'  => true,
    'aria_label' => 'Decrease value',
    'class'      => 'input-stepper__decrease shrink-0',
    'attributes' => [
      'data-stepper-decrease' => true,
    ],
  ]); ?>
  <input class="input-stepper__number input input--md h-[var(--ui-h-md)] w-20 rounded-md bg-white px-3 text-center text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" value="10" inputmode="numeric" readonly data-stepper-number>
  <?php component('button', [
    'label'      => 'Increase value',
    'type'       => 'button',
    'variant'    => 'default',
    'size'       => 'md',
    'gradient'   => true,
    'icon_name'  => 'add-line',
    'icon_only'  => true,
    'aria_label' => 'Increase value',
    'class'      => 'input-stepper__increase shrink-0',
    'attributes' => [
      'data-stepper-increase' => true,
    ],
  ]); ?>
</div>

<div class="input-stepper input-stepper--lg inline-flex w-fit items-center gap-1 md:col-span-2" data-stepper data-stepper-min="0" data-stepper-max="50" data-stepper-step="5">
  <?php component('button', [
    'label'      => 'Decrease value',
    'type'       => 'button',
    'variant'    => 'default',
    'size'       => 'lg',
    'gradient'   => true,
    'icon_name'  => 'subtract-line',
    'icon_only'  => true,
    'aria_label' => 'Decrease value',
    'class'      => 'input-stepper__decrease shrink-0',
    'attributes' => [
      'data-stepper-decrease' => true,
    ],
  ]); ?>
  <input class="input-stepper__number input input--lg h-[var(--ui-h-lg)] w-20 rounded-md bg-white px-3 text-center text-base text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" value="25" inputmode="numeric" readonly data-stepper-number>
  <?php component('button', [
    'label'      => 'Increase value',
    'type'       => 'button',
    'variant'    => 'default',
    'size'       => 'lg',
    'gradient'   => true,
    'icon_name'  => 'add-line',
    'icon_only'  => true,
    'aria_label' => 'Increase value',
    'class'      => 'input-stepper__increase shrink-0',
    'attributes' => [
      'data-stepper-increase' => true,
    ],
  ]); ?>
</div>
