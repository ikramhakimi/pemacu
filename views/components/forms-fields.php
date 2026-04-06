<?php
/*
CSS Anatomy: forms-fields

.field
|_ .field__label
|_ .field__input
|  |_ .input.input--md
|_ .field__helper.field__helper--default

.field.field--positive
|_ .field__label
|_ .field__input
|  |_ .input.input--positive
|_ .field__helper.field__helper--success

.field.field--negative
|_ .field__label
|_ .field__input
|  |_ .input.input--negative
|_ .field__helper.field__helper--error

.field.field--disabled
|_ .field__label
|_ .field__input
|  |_ .input.input--disabled
|_ .field__helper.field__helper--disabled
*/
?>
<div class="field space-y-2">
  <label class="field__label block text-sm font-medium text-brand-900" for="kit-field-default">field</label>
  <div class="field__input">
    <input id="kit-field-default" class="input input--md h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" placeholder="field" aria-describedby="kit-field-default-helper">
  </div>
  <p id="kit-field-default-helper" class="field__helper field__helper--default">Helper text for default field.</p>
</div>

<div class="field field--disabled space-y-2">
  <label class="field__label block text-sm font-medium text-brand-500" for="kit-field-disabled">field-disabled</label>
  <div class="field__input">
    <input id="kit-field-disabled" class="input input--disabled h-[var(--ui-h-md)] w-full rounded-lg bg-brand-100 px-[var(--ui-px-md)] text-brand-400 ring-1 ring-brand-200 ring-inset placeholder:text-brand-400" type="text" value="field-disabled" aria-describedby="kit-field-disabled-helper" disabled>
  </div>
  <p id="kit-field-disabled-helper" class="field__helper field__helper--disabled">This field is disabled.</p>
</div>

<div class="field field--positive space-y-2">
  <label class="field__label block text-sm font-medium text-brand-900" for="kit-field-positive">field-positive</label>
  <div class="field__input">
    <input id="kit-field-positive" class="input input--positive h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-positive-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-positive-500" type="text" value="field-positive" aria-describedby="kit-field-positive-helper">
  </div>
  <p id="kit-field-positive-helper" class="field__helper field__helper--success">Looks good. This field is valid.</p>
</div>

<div class="field field--negative space-y-2">
  <label class="field__label block text-sm font-medium text-brand-900" for="kit-field-negative">field-negative</label>
  <div class="field__input">
    <input id="kit-field-negative" class="input input--negative h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-negative-400 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-negative-500" type="text" value="field-negative" aria-describedby="kit-field-negative-helper" aria-invalid="true">
  </div>
  <p id="kit-field-negative-helper" class="field__helper field__helper--error">Please check this field and try again.</p>
</div>
