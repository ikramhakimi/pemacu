(() => {
  const desktop_media_query = window.matchMedia('(min-width: 1280px)');
  const sidebar_panel = document.querySelector('.js-dashboard-sidebar-panel');
  const sidebar_overlay = document.querySelector('.js-dashboard-sidebar-overlay');
  const sidebar_toggles = Array.from(document.querySelectorAll('.js-dashboard-sidebar-toggle'))
    .filter((node) => node instanceof HTMLButtonElement);

  const set_sidebar_expanded = (is_expanded) => {
    sidebar_toggles.forEach((toggle_node) => {
      toggle_node.setAttribute('aria-expanded', is_expanded ? 'true' : 'false');
      toggle_node.setAttribute('aria-label', is_expanded ? 'Close sidebar' : 'Open sidebar');
    });
  };

  const close_mobile_sidebar = () => {
    if (!(sidebar_panel instanceof HTMLElement)) {
      return;
    }

    sidebar_panel.classList.add('-translate-x-full');
    sidebar_panel.setAttribute('aria-hidden', 'true');
    set_sidebar_expanded(false);
    document.body.classList.remove('overflow-hidden');

    if (sidebar_overlay instanceof HTMLElement) {
      sidebar_overlay.hidden = true;
      sidebar_overlay.classList.add('hidden');
    }
  };

  const open_mobile_sidebar = () => {
    if (!(sidebar_panel instanceof HTMLElement)) {
      return;
    }

    sidebar_panel.classList.remove('-translate-x-full');
    sidebar_panel.setAttribute('aria-hidden', 'false');
    set_sidebar_expanded(true);
    document.body.classList.add('overflow-hidden');

    if (sidebar_overlay instanceof HTMLElement) {
      sidebar_overlay.hidden = false;
      sidebar_overlay.classList.remove('hidden');
    }
  };

  const sync_sidebar_for_breakpoint = () => {
    if (!(sidebar_panel instanceof HTMLElement)) {
      return;
    }

    if (desktop_media_query.matches) {
      sidebar_panel.classList.remove('-translate-x-full');
      sidebar_panel.setAttribute('aria-hidden', 'false');
      set_sidebar_expanded(false);
      document.body.classList.remove('overflow-hidden');

      if (sidebar_overlay instanceof HTMLElement) {
        sidebar_overlay.hidden = true;
        sidebar_overlay.classList.add('hidden');
      }
      return;
    }

    close_mobile_sidebar();
  };

  const sidebar_items = Array.from(document.querySelectorAll('.js-dashboard-sidebar-item'))
    .filter((node) => node instanceof HTMLElement);

  if (sidebar_items.length === 0 && !(sidebar_panel instanceof HTMLElement)) {
    return;
  }

  const set_item_expanded = (item_node, is_expanded) => {
    if (!(item_node instanceof HTMLElement)) {
      return;
    }

    const parent_link = item_node.querySelector('.js-dashboard-sidebar-parent-link');
    const submenu_node = item_node.querySelector('.js-dashboard-sidebar-submenu');
    const chevron_node = item_node.querySelector('.js-dashboard-sidebar-chevron');

    if (parent_link instanceof HTMLElement) {
      parent_link.setAttribute('aria-expanded', is_expanded ? 'true' : 'false');
    }

    if (submenu_node instanceof HTMLElement) {
      submenu_node.hidden = !is_expanded;
    }

    if (chevron_node instanceof HTMLElement) {
      chevron_node.classList.toggle('-rotate-90', is_expanded);
      chevron_node.classList.toggle('lg:opacity-100', is_expanded);
    }
  };

  sidebar_items.forEach((item_node) => {
    const parent_link = item_node.querySelector('.js-dashboard-sidebar-parent-link');
    const submenu_node = item_node.querySelector('.js-dashboard-sidebar-submenu');

    if (!(parent_link instanceof HTMLAnchorElement) || !(submenu_node instanceof HTMLElement)) {
      return;
    }

    parent_link.addEventListener('click', (event) => {
      event.preventDefault();
      const is_expanded = parent_link.getAttribute('aria-expanded') === 'true';
      set_item_expanded(item_node, !is_expanded);
    });
  });

  sidebar_toggles.forEach((toggle_node) => {
    toggle_node.addEventListener('click', () => {
      if (!(sidebar_panel instanceof HTMLElement) || desktop_media_query.matches) {
        return;
      }

      const is_expanded = toggle_node.getAttribute('aria-expanded') === 'true';
      if (is_expanded) {
        close_mobile_sidebar();
        return;
      }

      open_mobile_sidebar();
    });
  });

  if (sidebar_overlay instanceof HTMLElement) {
    sidebar_overlay.addEventListener('click', () => {
      close_mobile_sidebar();
    });
  }

  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
      return;
    }

    close_mobile_sidebar();
  });

  if (typeof desktop_media_query.addEventListener === 'function') {
    desktop_media_query.addEventListener('change', sync_sidebar_for_breakpoint);
  } else if (typeof desktop_media_query.addListener === 'function') {
    desktop_media_query.addListener(sync_sidebar_for_breakpoint);
  }

  sync_sidebar_for_breakpoint();
})();
