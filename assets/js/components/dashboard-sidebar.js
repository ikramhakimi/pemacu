(() => {
  const sidebar_items = Array.from(document.querySelectorAll('.js-dashboard-sidebar-item'))
    .filter((node) => node instanceof HTMLElement);

  if (sidebar_items.length === 0) {
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
})();
