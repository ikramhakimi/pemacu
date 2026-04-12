<nav class="nav nav--layout-1 border-b border-brand-200 hidden md:block" aria-label="Site navigation">
  <div class="nav__inner mx-auto max-w-7xl px-4 py-5">
    <div class="nav__bar grid items-center grid-cols-[1fr_auto_1fr] gap-4">
      <div class="nav__zone nav__zone--left flex items-center col-start-1 justify-start text-left">
        <a class="nav__logo text-xl font-semibold tracking-tight text-brand-900" href="<?= e(path('/')); ?>">
          Business Name
        </a>
      </div>
      <div class="nav__zone nav__zone--center flex items-center col-start-2 justify-center text-base">
        <ul class="nav__list flex items-center space-x-4">
          <li class="nav__item">
            <?php component('dropdown-navigation', [
              'dropdown_id'     => 'nav-home',
              'dropdown_label'  => 'Home',
              'dropdown_align'  => 'left',
              'trigger_class'   => 'dropdown__trigger inline-flex items-center gap-1 font-medium text-brand-700 hover:text-brand-900',
              'dropdown_links'  => [
                ['label' => 'Home', 'href' => path('/')],
                ['label' => 'Home Basic', 'href' => path('/home-basic')],
                ['label' => 'Home Blog', 'href' => path('/home-blog')],
              ],
            ]); ?>
          </li>
          <li class="nav__item">
            <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/canvas/components')); ?>">Canvas</a>
          </li>
          <li class="nav__item">
            <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/dashboard')); ?>">Dashboard</a>
          </li>
          <li class="nav__item">
            <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/portfolio')); ?>">Portfolio</a>
          </li>
          <li class="nav__item">
            <?php component('dropdown-navigation', [
              'dropdown_id'     => 'nav-package',
              'dropdown_label'  => 'Package',
              'dropdown_align'  => 'left',
              'trigger_class'   => 'dropdown__trigger inline-flex items-center gap-1 font-medium text-brand-700 hover:text-brand-900',
              'dropdown_links'  => [
                ['label' => 'Package', 'href' => path('/package')],
                ['label' => 'Book a Call', 'href' => path('/package-book-call')],
              ],
            ]); ?>
          </li>
        </ul>
      </div>
      <div class="nav__zone nav__zone--right flex items-center col-start-3 justify-end text-base">
        <ul class="nav__list flex items-center">
          <li class="nav__item">
            <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/contact')); ?>">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="nav nav--mobile border-b border-brand-200 bg-white md:hidden" data-nav-mobile>
  <div class="nav-mobile__bar flex items-center justify-between px-4 py-4">
    <a class="nav-mobile__logo inline-flex text-base font-semibold text-brand-900" href="<?= e(path('/')); ?>">
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
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/')); ?>">Home</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/home-basic')); ?>">Home Basic</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/home-blog')); ?>">Home Blog</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/canvas/components')); ?>">Canvas</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/dashboard')); ?>">Dashboard</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/portfolio')); ?>">Portfolio</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/package')); ?>">Packages</a>
            </li>
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/package-book-call')); ?>">Book a Call</a>
            </li>
          </ul>
        </div>
        <div class="nav-mobile__extra">
          <ul class="nav-mobile__list">
            <li class="nav-mobile__item">
              <a class="inline-flex font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/contact')); ?>">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </aside>
  </div>
</div>
