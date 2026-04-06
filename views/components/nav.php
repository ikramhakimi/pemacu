<nav class="nav nav--layout-1 border-b border-brand-200 bg-white hidden md:block" aria-label="Site navigation">
  <div class="nav__inner mx-auto max-w-6xl px-4 py-5">
    <div class="nav__bar grid items-center grid-cols-[auto_1fr]">
      <div class="nav__zone nav__zone--left flex items-center col-start-1 justify-start text-left">
        <a class="nav__logo text-lg font-semibold tracking-tight text-brand-900" href="/">
          Booking Pro
        </a>
      </div>
      <div class="nav__zone nav__zone--right flex items-center col-start-2 justify-end">
        <ul class="nav__list flex items-center">
          <li class="nav__item">
            <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="/">Home</a>
          </li>
          <li class="nav__item">
            <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="/canvas/components">Canvas</a>
          </li>
          <li class="nav__item">
            <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="/packages">Packages</a>
          </li>
        </ul>
        <ul class="nav__list flex items-center">
          <li class="nav__item">
            <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="/contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="nav nav--mobile border-b border-brand-200 bg-white md:hidden" data-nav-mobile>
  <div class="nav-mobile__bar flex items-center justify-between px-4 py-4">
    <a class="nav-mobile__logo inline-flex text-base font-semibold text-brand-900" href="/">
      Booking Pro
    </a>
    <button
      class="nav-mobile__toggle inline-flex items-center rounded-md border border-brand-200 px-3 py-2 font-medium text-brand-900"
      type="button"
      data-nav-mobile-open
      aria-expanded="false"
      aria-controls="nav-mobile-drawer"
    >
      Menu
    </button>
  </div>

  <div class="nav-mobile__overlay fixed inset-0 z-50 hidden" data-nav-mobile-overlay>
    <button
      class="nav-mobile__backdrop absolute inset-0 bg-brand-900/40"
      type="button"
      data-nav-mobile-backdrop
      aria-label="Dismiss menu"
    ></button>

    <aside
      id="nav-mobile-drawer"
      class="nav-mobile__drawer absolute right-0 top-0 h-full w-80 max-w-[85vw] translate-x-full border-l border-brand-200 bg-white transition-transform duration-200 ease-out"
      data-nav-mobile-drawer
      role="dialog"
      aria-modal="true"
      aria-label="Mobile navigation"
      tabindex="-1"
    >
      <div class="nav-mobile__drawer-head flex items-center justify-between border-b border-brand-200 px-4 py-4">
        <span class="nav-mobile__drawer-title text-base font-semibold text-brand-900">Booking Pro</span>
        <button
          class="nav-mobile__close inline-flex items-center rounded-md border border-brand-200 px-3 py-2 font-medium text-brand-900"
          type="button"
          data-nav-mobile-close
          aria-label="Close menu"
        >
          X
        </button>
      </div>

      <div class="nav-mobile__drawer-body px-4 py-4">
        <div class="nav-mobile__main">
          <ul class="nav-mobile__list">
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="/">Home</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="/canvas/components">Canvas</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="/packages">Packages</a>
            </li>
          </ul>
        </div>
        <div class="nav-mobile__extra">
          <ul class="nav-mobile__list">
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="/contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
  </div>
</div>
