(() => {
  /**
   * Nav Mobile Drawer Controller
   * - Scope: every `[data-nav-mobile]` instance on the page.
   * - Responsibility: open/close lifecycle, overlay visibility, and scroll locking.
   * - Contract: markup must provide open control, overlay, and drawer nodes.
   */
  const root_nodes = document.querySelectorAll('[data-nav-mobile]');

  if (root_nodes.length === 0) {
    return;
  }

  root_nodes.forEach((root_node) => {
    /**
     * Cache component nodes once per instance to avoid repeated querying.
     * Optional controls (`close`, `backdrop`) are guarded before binding.
     */
    const open_button   = root_node.querySelector('[data-nav-mobile-open]');
    const close_button  = root_node.querySelector('[data-nav-mobile-close]');
    const backdrop      = root_node.querySelector('[data-nav-mobile-backdrop]');
    const overlay       = root_node.querySelector('[data-nav-mobile-overlay]');
    const drawer        = root_node.querySelector('[data-nav-mobile-drawer]');
    const drawer_links  = root_node.querySelectorAll('[data-nav-mobile-drawer] a');
    const focus_selector = [
      'a[href]',
      'button:not([disabled])',
      'input:not([disabled]):not([type="hidden"])',
      'select:not([disabled])',
      'textarea:not([disabled])',
      '[tabindex]:not([tabindex="-1"])',
    ].join(', ');
    let last_focused_element = null;

    if (!open_button || !overlay || !drawer) {
      return;
    }

    const is_drawer_open = () => !overlay.classList.contains('hidden');

    const get_focusable_nodes = () =>
      Array.from(drawer.querySelectorAll(focus_selector))
        .filter((node) => node instanceof HTMLElement);

    /**
     * Open sequence:
     * 1) reveal overlay container
     * 2) slide drawer in on next frame (ensures transition is applied)
     * 3) sync accessibility state
     * 4) lock body scroll
     * 5) move focus into drawer for keyboard users
     */
    const open_drawer = () => {
      last_focused_element = document.activeElement instanceof HTMLElement
        ? document.activeElement
        : open_button;
      overlay.classList.remove('hidden');
      window.requestAnimationFrame(() => {
        drawer.classList.remove('translate-x-full');
      });
      open_button.setAttribute('aria-expanded', 'true');
      document.body.classList.add('overflow-hidden');

      window.requestAnimationFrame(() => {
        if (close_button instanceof HTMLElement) {
          close_button.focus();
          return;
        }

        const focusable_nodes = get_focusable_nodes();

        if (focusable_nodes.length > 0) {
          focusable_nodes[0].focus();
          return;
        }

        drawer.focus();
      });
    };

    /**
     * Close sequence:
     * 1) slide drawer out
     * 2) sync accessibility state
     * 3) restore body scroll
     * 4) hide overlay after transition end to avoid abrupt disappearance
     * 5) restore focus to original trigger context
     */
    const close_drawer = () => {
      drawer.classList.add('translate-x-full');
      open_button.setAttribute('aria-expanded', 'false');
      document.body.classList.remove('overflow-hidden');

      const hide_overlay = () => {
        overlay.classList.add('hidden');
        drawer.removeEventListener('transitionend', hide_overlay);
      };

      drawer.addEventListener('transitionend', hide_overlay);

      const return_target = last_focused_element instanceof HTMLElement
        ? last_focused_element
        : open_button;

      window.requestAnimationFrame(() => {
        return_target.focus();
      });
    };

    // Primary open interaction (burger trigger).
    open_button.addEventListener('click', open_drawer);

    // Explicit close control in drawer header.
    if (close_button) {
      close_button.addEventListener('click', close_drawer);
    }

    // Dismiss on backdrop click/tap.
    if (backdrop) {
      backdrop.addEventListener('click', close_drawer);
    }

    // Close after navigation selection for predictable mobile UX.
    drawer_links.forEach((link_node) => {
      link_node.addEventListener('click', close_drawer);
    });

    // Keyboard accessibility: Escape dismiss + focus trap while open.
    document.addEventListener('keydown', (event) => {
      if (event.key === 'Escape' && !overlay.classList.contains('hidden')) {
        close_drawer();
        return;
      }

      if (event.key !== 'Tab' || !is_drawer_open()) {
        return;
      }

      const focusable_nodes = get_focusable_nodes();

      if (focusable_nodes.length === 0) {
        event.preventDefault();
        drawer.focus();
        return;
      }

      const first_node  = focusable_nodes[0];
      const last_node   = focusable_nodes[focusable_nodes.length - 1];
      const active_node = document.activeElement;
      const in_drawer   = active_node instanceof Node ? drawer.contains(active_node) : false;

      if (!in_drawer) {
        event.preventDefault();
        first_node.focus();
        return;
      }

      if (event.shiftKey && active_node === first_node) {
        event.preventDefault();
        last_node.focus();
        return;
      }

      if (!event.shiftKey && active_node === last_node) {
        event.preventDefault();
        first_node.focus();
      }
    });
  });
})();

