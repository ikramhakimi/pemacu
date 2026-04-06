<section class="kit kit--header-hero pt-2">
  <header class="kit__header pt-8 pb-4">
    <p class="kit__topic text-xs uppercase text-brand-500">
      Layout
    </p>
    <h1 class="kit__title title title--3 text-2xl font-bold text-brand-900 mt-2">
      Grids
    </h1>
    <p class="kit__subtitle text-brand-700 mt-1">
      Section description in here. Provide more context about the content of this section.
    </p>
  </header>
  <article class="kit__demo kit-section__content bg-white p-8 space-y-8">
    <!-- BEM Anatomy: .grid -->
    <!-- .grid -->
    <!-- |_ .grid__item -->
    <!-- Variants -->
    <!-- .grid.grid--default -->
    <!-- .grid.grid--sm -->

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Default Grid (gap-4) - use for general purposes, such as listing items with moderate content.
      </p>

      <div class="grid grid--default gap-4 grid-cols-3">
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
      </div>

      <div class="grid grid--default gap-4 grid-cols-4">
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
        <div class="grid__item h-16 rounded-md bg-brand-100"></div>
      </div>
    </div>

    <div class="space-y-4">
      <p class="kit__brief text-xs uppercase text-brand-500">
        Small Grid (gap-1) - use for a lot of items with small content, such as thumbnails.
      </p>

      <div class="grid grid--sm gap-1 grid-cols-5">
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
      </div>

      <div class="grid grid--sm gap-1 grid-cols-6">
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
        <div class="grid__item h-16 bg-brand-100"></div>
      </div>
    </div>
  </article>
</section>
