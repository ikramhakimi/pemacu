<?php
/*
CSS Anatomy: forms-selects

.select
|_ .select__input.input.input--(sm/md/lg)
|_ .select__icon
*/
?>
<div class="select select--sm relative">
  <select class="select__input input input--sm h-[var(--ui-h-sm)] w-full appearance-none rounded-lg bg-white px-[var(--ui-px-sm)] pr-10 text-xs text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500">
    <option>select-sm</option>
  </select>
  <span class="select__icon pointer-events-none absolute right-3 inline-flex h-[var(--ui-h-sm)] items-center text-brand-500">
    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
  </span>
</div>

<div class="select select--md relative">
  <select class="select__input input input--md h-[var(--ui-h-md)] w-full appearance-none rounded-lg bg-white px-[var(--ui-px-md)] pr-10 text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500">
    <option>select-md</option>
  </select>
  <span class="select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-brand-500">
    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
  </span>
</div>

<div class="select select--lg relative md:col-span-2">
  <select class="select__input input input--lg h-[var(--ui-h-lg)] w-full appearance-none rounded-lg bg-white px-[var(--ui-px-lg)] pr-10 text-base text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500">
    <option>select-lg</option>
  </select>
  <span class="select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-brand-500">
    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
  </span>
</div>

<div class="select select--positive relative">
  <select class="select__input input input--positive h-[var(--ui-h-md)] w-full appearance-none rounded-lg bg-white px-[var(--ui-px-md)] pr-10 text-brand-900 ring-1 ring-positive-400 ring-inset focus:outline-none focus:ring-2 focus:ring-positive-500">
    <option>select-positive</option>
  </select>
  <span class="select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-positive-600">
    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
  </span>
</div>

<div class="select select--negative relative">
  <select class="select__input input input--negative h-[var(--ui-h-md)] w-full appearance-none rounded-lg bg-white px-[var(--ui-px-md)] pr-10 text-brand-900 ring-1 ring-negative-400 ring-inset focus:outline-none focus:ring-2 focus:ring-negative-500">
    <option>select-negative</option>
  </select>
  <span class="select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-negative-600">
    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
  </span>
</div>

<div class="select select--disabled relative md:col-span-2">
  <select class="select__input input input--disabled h-[var(--ui-h-md)] w-full appearance-none rounded-lg bg-brand-100 px-[var(--ui-px-md)] pr-10 text-brand-400 ring-1 ring-brand-200 ring-inset" disabled>
    <option>select-disabled</option>
  </select>
  <span class="select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-brand-400">
    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
  </span>
</div>
