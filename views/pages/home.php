<?php

declare(strict_types=1);

layout('layout-start', ['page_title' => 'Home', 'page_current' => 'home']);
?>
<?php section('section-hero'); ?>

<section class="home-title-examples mx-auto max-w-6xl px-4 pb-12">
  <h2 class="title title--2 text-3xl font-bold text-brand-900">Title Primitive</h2>
  <div class="home-title-examples__list">
    <h1 class="title title--1 text-4xl font-bold text-brand-900">Title Level 1</h1>
    <h2 class="title title--2 text-3xl font-bold text-brand-900">Title Level 2</h2>
    <h3 class="title title--3 text-2xl font-semibold text-brand-900">Title Level 3</h3>
    <h4 class="title title--4 text-xl font-semibold text-brand-900">Title Level 4</h4>
    <h5 class="title title--5 text-lg font-semibold text-brand-900">Title Level 5</h5>
    <h6 class="title title--6 text-base font-semibold text-brand-900">Title Level 6</h6>
  </div>
</section>

<section class="home-card-variants mx-auto max-w-6xl px-4 pb-12">
  <h2 class="home-card-variants__title title title--4 text-xl font-semibold text-brand-900">Card Variants</h2>
  <p class="home-card-variants__lead text text--caption text-sm text-brand-600">
    horizontal, compact, and medialess variants from the base card component.
  </p>

  <div class="home-card-variants__list flex flex-col gap-3">
    <article class="card overflow-hidden border border-brand-200 bg-white shadow-sm rounded-2xl">
      <div class="card__content p-5 space-y-4">
        <h3 class="card__title title title--5 text-lg font-semibold text-brand-900">Medialess Card</h3>
        <p class="card__price text text--price text-sm font-medium text-emerald-600">RM 100</p>
        <ul class="card__features list-inside list-disc text-sm">
          <li class="card__feature-item">No media block rendered</li>
          <li class="card__feature-item">Focuses on textual content</li>
        </ul>
        <div class="card__action">
          <a class="btn inline-flex rounded-lg border border-transparent font-medium px-4 py-3 text-sm bg-brand-900 text-white" href="/packages">
            Get started
          </a>
        </div>
      </div>
    </article>
  </div>
</section>

<section class="home-button-variants mx-auto max-w-6xl px-4 pb-12">
  <h2 class="home-button-variants__title title title--4 text-xl font-semibold text-brand-900">Button Variants</h2>
  <p class="home-button-variants__lead text text--caption text-sm text-brand-600">
    Current button styles and sizes (kept as-is): primary, secondary, ghost in sm/md/lg.
  </p>

  <div class="home-button-variants__group flex flex-col gap-2 rounded-xl border border-brand-200 bg-white p-4">
    <h3 class="home-button-variants__group-title title title--6 text-base font-semibold text-brand-900">Primary</h3>
    <div class="home-button-variants__row flex flex-wrap items-center gap-2">
      <button class="btn btn--primary btn--sm inline-flex rounded-lg border border-transparent bg-brand-900 px-3 py-1.5 text-xs font-medium text-white" type="button">SM Button</button>
      <a class="btn btn--primary btn--sm inline-flex rounded-lg border border-transparent bg-brand-900 px-3 py-1.5 text-xs font-medium text-white" href="/book">SM Link</a>
      <button class="btn btn--primary btn--md inline-flex rounded-lg border border-transparent bg-brand-900 px-4 py-3 text-sm font-medium text-white" type="button">MD Button</button>
      <a class="btn btn--primary btn--md inline-flex rounded-lg border border-transparent bg-brand-900 px-4 py-3 text-sm font-medium text-white" href="/book">MD Link</a>
      <button class="btn btn--primary btn--lg inline-flex rounded-lg border border-transparent bg-brand-900 px-5 py-3 text-base font-medium text-white" type="button">LG Button</button>
      <a class="btn btn--primary btn--lg inline-flex rounded-lg border border-transparent bg-brand-900 px-5 py-3 text-base font-medium text-white" href="/book">LG Link</a>
    </div>
  </div>

  <div class="home-button-variants__group flex flex-col gap-2 rounded-xl border border-brand-200 bg-white p-4">
    <h3 class="home-button-variants__group-title title title--6 text-base font-semibold text-brand-900">Secondary</h3>
    <div class="home-button-variants__row flex flex-wrap items-center gap-2">
      <button class="btn btn--secondary btn--sm inline-flex rounded-lg border border-transparent bg-brand-100 px-3 py-1.5 text-xs font-medium text-brand-900" type="button">SM Button</button>
      <a class="btn btn--secondary btn--sm inline-flex rounded-lg border border-transparent bg-brand-100 px-3 py-1.5 text-xs font-medium text-brand-900" href="/book">SM Link</a>
      <button class="btn btn--secondary btn--md inline-flex rounded-lg border border-transparent bg-brand-100 px-4 py-3 text-sm font-medium text-brand-900" type="button">MD Button</button>
      <a class="btn btn--secondary btn--md inline-flex rounded-lg border border-transparent bg-brand-100 px-4 py-3 text-sm font-medium text-brand-900" href="/book">MD Link</a>
      <button class="btn btn--secondary btn--lg inline-flex rounded-lg border border-transparent bg-brand-100 px-5 py-3 text-base font-medium text-brand-900" type="button">LG Button</button>
      <a class="btn btn--secondary btn--lg inline-flex rounded-lg border border-transparent bg-brand-100 px-5 py-3 text-base font-medium text-brand-900" href="/book">LG Link</a>
    </div>
  </div>

  <div class="home-button-variants__group flex flex-col gap-2 rounded-xl border border-brand-200 bg-white p-4">
    <h3 class="home-button-variants__group-title title title--6 text-base font-semibold text-brand-900">Ghost</h3>
    <div class="home-button-variants__row flex flex-wrap items-center gap-2">
      <button class="btn btn--ghost btn--sm inline-flex rounded-lg border border-brand-200 bg-transparent px-3 py-1.5 text-xs font-medium text-brand-900" type="button">SM Button</button>
      <a class="btn btn--ghost btn--sm inline-flex rounded-lg border border-brand-200 bg-transparent px-3 py-1.5 text-xs font-medium text-brand-900" href="/book">SM Link</a>
      <button class="btn btn--ghost btn--md inline-flex rounded-lg border border-brand-200 bg-transparent px-4 py-3 text-sm font-medium text-brand-900" type="button">MD Button</button>
      <a class="btn btn--ghost btn--md inline-flex rounded-lg border border-brand-200 bg-transparent px-4 py-3 text-sm font-medium text-brand-900" href="/book">MD Link</a>
      <button class="btn btn--ghost btn--lg inline-flex rounded-lg border border-brand-200 bg-transparent px-5 py-3 text-base font-medium text-brand-900" type="button">LG Button</button>
      <a class="btn btn--ghost btn--lg inline-flex rounded-lg border border-brand-200 bg-transparent px-5 py-3 text-base font-medium text-brand-900" href="/book">LG Link</a>
    </div>
  </div>
</section>

<section class="home-navbar-examples mx-auto max-w-6xl px-4 pb-12">
  <h2 class="home-navbar-examples__title title title--4 text-xl font-semibold text-brand-900">Navbar Examples</h2>
  <p class="home-navbar-examples__lead text text--caption text-sm text-brand-600">
    Quick preview for logo/menu layout options.
  </p>

  <div class="home-navbar-examples__item border border-brand-200">
    <nav class="nav nav--layout-1 border-b border-brand-200 bg-white border-0" aria-label="Site navigation">
      <div class="nav__inner mx-auto max-w-6xl px-4 py-5">
        <div class="nav__bar grid items-center grid-cols-[auto_1fr]">
          <div class="nav__zone nav__zone--left flex items-center col-start-1 justify-start text-left">
            <a class="nav__logo text-lg font-semibold tracking-tight text-brand-900" href="/">Variant 1</a>
          </div>
          <div class="nav__zone nav__zone--right flex items-center col-start-2 justify-end">
            <ul class="home-navbar-examples__nav-main flex items-center">
              <li class="home-navbar-examples__nav-item"><a class="inline-flex text-sm font-medium text-brand-700 hover:text-brand-900" href="/">Home</a></li>
              <li class="home-navbar-examples__nav-item">
                <details class="home-navbar-examples__dropdown">
                  <summary class="cursor-pointer list-none inline-flex text-sm font-medium text-brand-700 hover:text-brand-900">Dropdown</summary>
                  <ul class="home-navbar-examples__dropdown-list border border-brand-200 bg-white">
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-one">Dropdown one</a></li>
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-two">Dropdown two</a></li>
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-three">Dropdown three</a></li>
                  </ul>
                </details>
              </li>
              <li class="home-navbar-examples__nav-item"><a class="inline-flex text-sm font-medium text-brand-700 hover:text-brand-900" href="/menu">Menu</a></li>
            </ul>
            <div class="home-navbar-examples__nav-extra flex flex-wrap items-center justify-start">
              <a class="btn btn--secondary inline-flex rounded-lg border border-transparent font-medium px-3 py-1.5 text-xs bg-brand-100 text-brand-900" href="/contact">Button</a>
              <a class="btn btn--primary inline-flex rounded-lg border border-transparent font-medium px-3 py-1.5 text-xs bg-brand-900 text-white" href="/book">Button</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div class="home-navbar-examples__item border border-brand-200">
    <nav class="nav nav--layout-2 border-b border-brand-200 bg-white border-0" aria-label="Site navigation">
      <div class="nav__inner mx-auto max-w-6xl px-4 py-5">
        <div class="nav__bar grid items-center grid-cols-[1fr_auto]">
          <div class="nav__zone nav__zone--left flex items-center col-start-1 justify-start text-left">
            <a class="nav__logo text-lg font-semibold tracking-tight text-brand-900" href="/">Variant 2</a>
            <ul class="home-navbar-examples__nav-main flex items-center">
              <li class="home-navbar-examples__nav-item"><a class="inline-flex text-sm font-medium text-brand-700 hover:text-brand-900" href="/">Home</a></li>
              <li class="home-navbar-examples__nav-item">
                <details class="home-navbar-examples__dropdown">
                  <summary class="cursor-pointer list-none inline-flex text-sm font-medium text-brand-700 hover:text-brand-900">Dropdown</summary>
                  <ul class="home-navbar-examples__dropdown-list border border-brand-200 bg-white">
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-one">Dropdown one</a></li>
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-two">Dropdown two</a></li>
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-three">Dropdown three</a></li>
                  </ul>
                </details>
              </li>
              <li class="home-navbar-examples__nav-item"><a class="inline-flex text-sm font-medium text-brand-700 hover:text-brand-900" href="/menu">Menu</a></li>
            </ul>
          </div>
          <div class="nav__zone nav__zone--right flex items-center col-start-2 justify-end">
            <div class="home-navbar-examples__nav-extra flex flex-wrap items-center justify-start">
              <a class="btn btn--secondary inline-flex rounded-lg border border-transparent font-medium px-3 py-1.5 text-xs bg-brand-100 text-brand-900" href="/contact">Button</a>
              <a class="btn btn--primary inline-flex rounded-lg border border-transparent font-medium px-3 py-1.5 text-xs bg-brand-900 text-white" href="/book">Button</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <div class="home-navbar-examples__item border border-brand-200">
    <nav class="nav nav--layout-3 border-b border-brand-200 bg-white border-0" aria-label="Site navigation">
      <div class="nav__inner mx-auto max-w-6xl px-4 py-5">
        <div class="nav__bar grid items-center grid-cols-[1fr_auto_1fr]">
          <div class="nav__zone nav__zone--left flex items-center col-start-1 justify-start">
            <ul class="home-navbar-examples__nav-main flex items-center">
              <li class="home-navbar-examples__nav-item"><a class="inline-flex text-sm font-medium text-brand-700 hover:text-brand-900" href="/">Home</a></li>
              <li class="home-navbar-examples__nav-item">
                <details class="home-navbar-examples__dropdown">
                  <summary class="cursor-pointer list-none inline-flex text-sm font-medium text-brand-700 hover:text-brand-900">Dropdown</summary>
                  <ul class="home-navbar-examples__dropdown-list border border-brand-200 bg-white">
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-one">Dropdown one</a></li>
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-two">Dropdown two</a></li>
                    <li class="home-navbar-examples__dropdown-item"><a class="inline-flex text-sm text-brand-700 hover:text-brand-900" href="/dropdown-three">Dropdown three</a></li>
                  </ul>
                </details>
              </li>
              <li class="home-navbar-examples__nav-item"><a class="inline-flex text-sm font-medium text-brand-700 hover:text-brand-900" href="/menu">Menu</a></li>
            </ul>
          </div>
          <div class="nav__zone nav__zone--center flex items-center col-start-2 justify-center text-center">
            <a class="nav__logo text-lg font-semibold tracking-tight text-brand-900" href="/">Variant 3</a>
          </div>
          <div class="nav__zone nav__zone--right flex items-center col-start-3 justify-end">
            <div class="home-navbar-examples__nav-extra flex flex-wrap items-center justify-start">
              <a class="btn btn--secondary inline-flex rounded-lg border border-transparent font-medium px-3 py-1.5 text-xs bg-brand-100 text-brand-900" href="/contact">Button</a>
              <a class="btn btn--primary inline-flex rounded-lg border border-transparent font-medium px-3 py-1.5 text-xs bg-brand-900 text-white" href="/book">Button</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </div>
</section>

<section class="home-form-primitives mx-auto max-w-6xl px-4 pb-12">
  <h2 class="home-form-primitives__title title title--4 text-xl font-semibold text-brand-900">Form Primitives</h2>
  <form class="home-form-primitives__form space-y-4">
    <div class="field space-y-2">
      <label class="field__label block text-sm font-medium text-brand-900" for="demo-email">
        Email
        <span aria-hidden="true">*</span>
      </label>
      <div class="field__control">
        <input class="input block w-full rounded-lg border border-brand-300 bg-white px-4 py-3 text-sm text-brand-900 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-200" type="email" name="email" id="demo-email" value="" placeholder="you@example.com" autocomplete="email" required>
      </div>
      <p class="field__help text-xs text-brand-600">We will send booking updates here.</p>
    </div>

    <div class="field space-y-2">
      <label class="field__label block text-sm font-medium text-brand-900" for="demo-service">Service</label>
      <div class="field__control">
        <select class="select block w-full rounded-lg border border-brand-300 bg-white px-4 py-3 text-sm text-brand-900 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-200" name="service" id="demo-service">
          <option value="" selected>Choose service</option>
          <option value="event">Event Photography</option>
          <option value="brand">Brand Campaign</option>
          <option value="studio">Studio Session</option>
        </select>
      </div>
    </div>

    <div class="field space-y-2">
      <label class="field__label block text-sm font-medium text-brand-900" for="demo-details">Project details</label>
      <div class="field__control">
        <textarea class="textarea textarea--error block w-full rounded-lg border border-brand-300 border-red-500 bg-white px-4 py-3 text-sm text-brand-900 focus:border-brand-400 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-brand-200 focus:ring-red-100" name="details" id="demo-details" rows="4" placeholder="Share project details" aria-invalid="true"></textarea>
      </div>
      <p class="field__error text-xs text-red-600">Please add at least 20 characters.</p>
    </div>

    <div class="field space-y-2">
      <div class="field__control">
        <fieldset class="choice-group">
          <legend class="choice-group__legend mb-2 text-sm font-medium text-brand-900">Preferred contact method</legend>
          <div class="choice-group__list flex flex-col gap-3">
            <div class="choice-group__item">
              <label class="choice inline-flex items-start gap-2" for="contact-method-1">
                <input class="choice__input mt-0.5 h-4 w-4 border-brand-300 text-brand-900" type="radio" name="contact_method" id="contact-method-1" value="email" checked>
                <span class="choice__content flex flex-col"><span class="choice__label text-sm text-brand-800">Email</span></span>
              </label>
            </div>
            <div class="choice-group__item">
              <label class="choice inline-flex items-start gap-2" for="contact-method-2">
                <input class="choice__input mt-0.5 h-4 w-4 border-brand-300 text-brand-900" type="radio" name="contact_method" id="contact-method-2" value="phone">
                <span class="choice__content flex flex-col"><span class="choice__label text-sm text-brand-800">Phone</span></span>
              </label>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class="field space-y-2">
      <div class="field__control">
        <fieldset class="choice-group">
          <legend class="choice-group__legend mb-2 text-sm font-medium text-brand-900">Add-ons</legend>
          <div class="choice-group__list flex flex-col gap-3">
            <div class="choice-group__item">
              <label class="choice inline-flex items-start gap-2" for="addons-1">
                <input class="choice__input mt-0.5 h-4 w-4 border-brand-300 text-brand-900" type="checkbox" name="addons[]" id="addons-1" value="retouching" checked>
                <span class="choice__content flex flex-col"><span class="choice__label text-sm text-brand-800">Retouching</span></span>
              </label>
            </div>
            <div class="choice-group__item">
              <label class="choice inline-flex items-start gap-2" for="addons-2">
                <input class="choice__input mt-0.5 h-4 w-4 border-brand-300 text-brand-900" type="checkbox" name="addons[]" id="addons-2" value="drone">
                <span class="choice__content flex flex-col"><span class="choice__label text-sm text-brand-800">Drone footage</span></span>
              </label>
            </div>
            <div class="choice-group__item">
              <label class="choice inline-flex items-start gap-2" for="addons-3">
                <input class="choice__input mt-0.5 h-4 w-4 border-brand-300 text-brand-900" type="checkbox" name="addons[]" id="addons-3" value="album">
                <span class="choice__content flex flex-col"><span class="choice__label text-sm text-brand-800">Printed album</span></span>
              </label>
            </div>
          </div>
        </fieldset>
      </div>
    </div>

    <div class="home-form-primitives__actions flex flex-wrap items-center justify-start gap-3">
      <button class="btn btn--primary inline-flex rounded-lg border border-transparent bg-brand-900 px-4 py-3 text-sm font-medium text-white" type="submit">
        Submit Request
      </button>
      <button class="btn btn--secondary inline-flex rounded-lg border border-transparent bg-brand-100 px-4 py-3 text-sm font-medium text-brand-900" type="button">
        Reset
      </button>
    </div>
  </form>
</section>

<?php section('section-packages'); ?>
<?php section('section-testimonials'); ?>
<?php section('section-faq'); ?>
<?php section('section-cta'); ?>
<?php layout('layout-end'); ?>
