<?php
/*
CSS Anatomy: buttons-secondary

.btn.btn--secondary.btn--sm
.btn.btn--secondary.btn--md
.btn.btn--secondary.btn--lg
*/
?>
<button class="btn btn--secondary btn--sm inline-flex items-center justify-center rounded-lg border border-transparent bg-brand-300 h-[var(--ui-h-sm)] px-[var(--ui-px-sm)] font-medium text-brand-900 text-xs" type="button">Small</button>
<button class="btn btn--secondary btn--md inline-flex items-center justify-center rounded-lg border border-transparent bg-brand-300 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-brand-900" type="button">Medium</button>
<button class="btn btn--secondary btn--lg inline-flex items-center justify-center rounded-lg border border-transparent bg-brand-300 h-[var(--ui-h-lg)] px-[var(--ui-px-lg)] font-medium text-brand-900 text-base" type="button">Large</button>
<button class="btn btn--secondary btn--md inline-flex items-center justify-center rounded-lg border border-transparent bg-brand-200 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-brand-400" type="button" disabled>Disabled</button>
<button class="btn btn--secondary btn--md inline-flex items-center justify-center rounded-lg border border-transparent bg-brand-300 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-brand-900 gap-2" type="button">
  <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
    <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="3" class="opacity-30"></circle>
    <path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"></path>
  </svg>
  <span>Loading</span>
</button>
