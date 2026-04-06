<?php
/*
CSS Anatomy: forms-checkboxes

.choice.choice--checkbox
|_ .checkbox
|_ .checkbox__box
|  |_ .checkbox__icon
|_ .choice__label
*/
?>
<label class="choice choice--checkbox flex items-center gap-2">
  <input class="checkbox peer sr-only" type="checkbox">
  <span class="checkbox__box inline-flex h-5 w-5 items-center justify-center rounded-sm border border-brand-300 bg-white text-transparent transition-colors peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500">
    <?php icon('check-fill', ['icon_size' => '16', 'icon_class' => 'checkbox__icon']); ?>
  </span>
  <span class="choice__label text-sm text-brand-700">checkbox</span>
</label>

<label class="choice choice--checkbox flex items-center gap-2">
  <input class="checkbox peer sr-only" type="checkbox" checked>
  <span class="checkbox__box inline-flex h-5 w-5 items-center justify-center rounded-sm border border-blue-500 bg-blue-500 text-white transition-colors peer-checked:border-blue-500 peer-checked:bg-blue-500 peer-checked:text-white peer-focus-visible:outline peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-brand-500">
    <?php icon('check-fill', ['icon_size' => '16', 'icon_class' => 'checkbox__icon']); ?>
  </span>
  <span class="choice__label text-sm text-brand-700">checkbox:checked</span>
</label>

<label class="choice choice--checkbox flex items-center gap-2">
  <input class="checkbox peer sr-only" type="checkbox" disabled>
  <span class="checkbox__box inline-flex h-5 w-5 items-center justify-center rounded-sm border border-brand-200 bg-brand-100 text-brand-300">
    <?php icon('check-fill', ['icon_size' => '16', 'icon_class' => 'checkbox__icon']); ?>
  </span>
  <span class="choice__label text-sm text-brand-400">checkbox:disabled</span>
</label>

<label class="choice choice--checkbox flex items-center gap-2">
  <input class="checkbox peer sr-only" type="checkbox" checked disabled>
  <span class="checkbox__box inline-flex h-5 w-5 items-center justify-center rounded-sm border border-blue-500/60 bg-blue-500/60 text-white/80">
    <?php icon('check-fill', ['icon_size' => '16', 'icon_class' => 'checkbox__icon']); ?>
  </span>
  <span class="choice__label text-sm text-brand-400">checkbox:checked:disabled</span>
</label>
