<?php
/*
CSS Anatomy: forms-radios

.choice.choice--radio
|_ .radio
|_ .radio__box
|  |_ .radio__dot
|_ .choice__label
*/
?>
<label class="choice choice--radio flex items-center gap-2">
  <input class="radio peer sr-only" type="radio" name="kit-radio-state">
  <span class="radio__box inline-flex h-5 w-5 items-center justify-center rounded-full border border-brand-300 bg-white transition-colors peer-checked:border-blue-500 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500">
    <span class="radio__dot h-2.5 w-2.5 rounded-full bg-blue-500 opacity-0 transition-opacity peer-checked:opacity-100"></span>
  </span>
  <span class="choice__label text-sm text-brand-700">radio</span>
</label>

<label class="choice choice--radio flex items-center gap-2">
  <input class="radio peer sr-only" type="radio" name="kit-radio-state" checked>
  <span class="radio__box inline-flex h-5 w-5 items-center justify-center rounded-full border border-blue-500 bg-white transition-colors peer-checked:border-blue-500 peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500">
    <span class="radio__dot h-2.5 w-2.5 rounded-full bg-blue-500 opacity-100 transition-opacity"></span>
  </span>
  <span class="choice__label text-sm text-brand-700">radio:checked</span>
</label>

<label class="choice choice--radio flex items-center gap-2">
  <input class="radio peer sr-only" type="radio" name="kit-radio-disabled" disabled>
  <span class="radio__box inline-flex h-5 w-5 items-center justify-center rounded-full border border-brand-200 bg-brand-100">
    <span class="radio__dot h-2.5 w-2.5 rounded-full bg-brand-300 opacity-0"></span>
  </span>
  <span class="choice__label text-sm text-brand-400">radio:disabled</span>
</label>

<label class="choice choice--radio flex items-center gap-2">
  <input class="radio peer sr-only" type="radio" name="kit-radio-disabled-checked" checked disabled>
  <span class="radio__box inline-flex h-5 w-5 items-center justify-center rounded-full border border-blue-500/60 bg-brand-100">
    <span class="radio__dot h-2.5 w-2.5 rounded-full bg-blue-500/70 opacity-100"></span>
  </span>
  <span class="choice__label text-sm text-brand-400">radio:checked:disabled</span>
</label>
