(() => {
  const last_focus_map = new Map();

  const get_drawer_node = (drawer_id) => {
    if (typeof drawer_id !== 'string' || drawer_id.trim() === '') {
      return null;
    }

    const drawer_node = document.getElementById(drawer_id.trim());
    if (!(drawer_node instanceof HTMLElement) || !drawer_node.hasAttribute('data-drawer')) {
      return null;
    }

    return drawer_node;
  };

  const get_drawer_panel = (drawer_node) => {
    if (!(drawer_node instanceof HTMLElement)) {
      return null;
    }

    const panel_node = drawer_node.querySelector('[data-drawer-panel]');
    if (!(panel_node instanceof HTMLElement)) {
      return null;
    }

    return panel_node;
  };

  const sync_opener_expanded_state = (drawer_id, is_expanded) => {
    const opener_nodes = Array.from(document.querySelectorAll('[data-drawer-open]'));

    opener_nodes.forEach((opener_node) => {
      if (!(opener_node instanceof HTMLElement)) {
        return;
      }

      if (opener_node.getAttribute('data-drawer-target') !== drawer_id) {
        return;
      }

      opener_node.setAttribute('aria-expanded', is_expanded ? 'true' : 'false');
    });
  };

  const open_drawer = (drawer_node) => {
    const panel_node = get_drawer_panel(drawer_node);
    if (!(panel_node instanceof HTMLElement) || !(drawer_node instanceof HTMLElement)) {
      return;
    }

    const from_class = panel_node.getAttribute('data-drawer-panel-from') || 'translate-x-full';
    const to_class = panel_node.getAttribute('data-drawer-panel-to') || 'translate-x-0';

    drawer_node.classList.add('flex');
    drawer_node.classList.remove('hidden');
    drawer_node.setAttribute('aria-hidden', 'false');
    document.body.classList.add('overflow-hidden');

    panel_node.classList.remove(to_class);
    panel_node.classList.add(from_class);

    requestAnimationFrame(() => {
      drawer_node.classList.remove('opacity-0');
      drawer_node.classList.add('opacity-100');
      panel_node.classList.remove(from_class);
      panel_node.classList.add(to_class);
    });
  };

  const close_drawer_by_id = (drawer_id) => {
    const drawer_node = get_drawer_node(drawer_id);
    if (!(drawer_node instanceof HTMLElement)) {
      return;
    }

    const panel_node = get_drawer_panel(drawer_node);
    if (!(panel_node instanceof HTMLElement)) {
      return;
    }

    const from_class = panel_node.getAttribute('data-drawer-panel-from') || 'translate-x-full';
    const to_class = panel_node.getAttribute('data-drawer-panel-to') || 'translate-x-0';

    drawer_node.classList.remove('opacity-100');
    drawer_node.classList.add('opacity-0');
    panel_node.classList.remove(to_class);
    panel_node.classList.add(from_class);

    window.setTimeout(() => {
      drawer_node.classList.add('hidden');
      drawer_node.classList.remove('flex');
      drawer_node.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('overflow-hidden');
    }, 300);

    sync_opener_expanded_state(drawer_id, false);

    const return_target = last_focus_map.get(drawer_id);
    if (return_target instanceof HTMLElement) {
      return_target.focus();
    }
  };

  const close_all_drawers = () => {
    const drawer_nodes = Array.from(document.querySelectorAll('[data-drawer]'))
      .filter((drawer_node) => drawer_node instanceof HTMLElement);

    drawer_nodes.forEach((drawer_node) => {
      const panel_node = get_drawer_panel(drawer_node);
      if (!(panel_node instanceof HTMLElement) || !(drawer_node instanceof HTMLElement)) {
        return;
      }

      const from_class = panel_node.getAttribute('data-drawer-panel-from') || 'translate-x-full';
      const to_class = panel_node.getAttribute('data-drawer-panel-to') || 'translate-x-0';
      panel_node.classList.remove(to_class);
      panel_node.classList.add(from_class);

      drawer_node.classList.add('hidden');
      drawer_node.classList.remove('flex');
      drawer_node.setAttribute('aria-hidden', 'true');
      drawer_node.classList.remove('opacity-100');
      drawer_node.classList.add('opacity-0');
    });

    const opener_nodes = Array.from(document.querySelectorAll('[data-drawer-open]'));
    opener_nodes.forEach((opener_node) => {
      if (!(opener_node instanceof HTMLElement)) {
        return;
      }

      opener_node.setAttribute('aria-expanded', 'false');
    });

    document.body.classList.remove('overflow-hidden');
  };

  close_all_drawers();

  document.addEventListener('click', (event) => {
    const click_target = event.target;
    if (!(click_target instanceof Element)) {
      return;
    }

    const close_button = click_target.closest('[data-drawer-close]');
    if (close_button instanceof HTMLElement) {
      const drawer_node = close_button.closest('[data-drawer]');
      if (drawer_node instanceof HTMLElement && drawer_node.id !== '') {
        close_drawer_by_id(drawer_node.id);
      }
      return;
    }

    const opener_node = click_target.closest('[data-drawer-open]');
    if (opener_node instanceof HTMLElement) {
      const target_id = opener_node.getAttribute('data-drawer-target') || '';
      const target_drawer = get_drawer_node(target_id);

      if (!(target_drawer instanceof HTMLElement)) {
        return;
      }

      if (opener_node instanceof HTMLAnchorElement) {
        event.preventDefault();
      }

      close_all_drawers();
      last_focus_map.set(target_id, opener_node);
      open_drawer(target_drawer);
      sync_opener_expanded_state(target_id, true);

      const preferred_focus = target_drawer.querySelector('[data-drawer-close]');
      if (preferred_focus instanceof HTMLElement) {
        preferred_focus.focus();
      }
      return;
    }

    const overlay_node = click_target.closest('[data-drawer]');
    if (overlay_node instanceof HTMLElement && event.target === overlay_node && overlay_node.id !== '') {
      close_drawer_by_id(overlay_node.id);
    }
  });

  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
      return;
    }

    const open_drawer_node = Array.from(document.querySelectorAll('[data-drawer]')).find((drawer_node) => {
      return drawer_node instanceof HTMLElement && !drawer_node.classList.contains('hidden');
    });

    if (!(open_drawer_node instanceof HTMLElement) || open_drawer_node.id === '') {
      return;
    }

    close_drawer_by_id(open_drawer_node.id);
  });
})();
