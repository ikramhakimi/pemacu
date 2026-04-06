<section class="kit kit--layout-forms pt-2">
  <header class="kit__header pt-8 pb-4">
    <p class="kit__topic text-xs uppercase text-brand-500">
      Component
    </p>
    <h1 class="kit__title title title--3 mt-2 text-2xl font-bold text-brand-900">
      Forms
    </h1>
    <p class="kit__subtitle mt-1 text-brand-700">
      Form controls with size and state variations.
    </p>
  </header>

  <article class="kit__demo kit-section__content space-y-8 bg-white p-8">
    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Input Variants
      </p>
      <div class="kit__example grid gap-3 md:grid-cols-2">
        <?php component('forms-inputs'); ?>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Select Variants
      </p>
      <div class="kit__example grid gap-3 md:grid-cols-2">
        <?php component('forms-selects'); ?>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Textarea Variants
      </p>
      <div class="kit__example grid gap-3 md:grid-cols-2">
        <?php component('forms-textareas'); ?>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Checkbox States
      </p>
      <div class="kit__example flex flex-wrap items-center gap-6">
        <?php component('forms-checkboxes'); ?>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Radio States
      </p>
      <div class="kit__example flex flex-wrap items-center gap-6">
        <?php component('forms-radios'); ?>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Toggle States
      </p>
      <div class="kit__example flex flex-wrap items-center gap-6">
        <?php component('forms-toggle'); ?>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Field Variants
      </p>
      <div class="kit__example grid gap-4 md:grid-cols-2">
        <?php component('forms-fields'); ?>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Rating Variants
      </p>
      <div class="kit__example grid gap-4 md:grid-cols-2">
        <?php component('forms-rating'); ?>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Stepper Variants
      </p>
      <div class="kit__example grid gap-4 md:grid-cols-2">
        <?php component('forms-stepper'); ?>
      </div>
    </div>
  </article>
</section>
