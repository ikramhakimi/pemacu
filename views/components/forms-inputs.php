<?php
/*
CSS Anatomy: forms-inputs

.input.input--sm
.input.input--md
.input.input--lg
.input.input--positive
.input.input--negative
.input.input--disabled
*/
?>
<input class="input input--sm h-[var(--ui-h-sm)] w-full rounded-lg bg-white px-[var(--ui-px-sm)] text-xs text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" placeholder="input-sm">
<input class="input input--md h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" placeholder="input-md">
<input class="input input--lg h-[var(--ui-h-lg)] w-full rounded-lg bg-white px-[var(--ui-px-lg)] text-base text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500 md:col-span-2" type="text" placeholder="input-lg">
<input class="input input--positive h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-positive-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-positive-500" type="text" value="input-positive">
<input class="input input--negative h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-negative-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-negative-500" type="text" value="input-negative">
<input class="input input--disabled h-[var(--ui-h-md)] w-full rounded-lg bg-brand-100 px-[var(--ui-px-md)] text-brand-400 ring-1 ring-brand-200 ring-inset placeholder:text-brand-400 md:col-span-2" type="text" value="input-disabled" disabled>
