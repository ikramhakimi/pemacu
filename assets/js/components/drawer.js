(() => {
  const drawer_nodes = Array.from(document.querySelectorAll('[data-drawer]'))
    .filter((drawer_node) => drawer_node instanceof HTMLElement);
  const opener_nodes = Array.from(document.querySelectorAll('[data-drawer-open]'))
    .filter((opener_node) => opener_node instanceof HTMLElement);

  if (drawer_nodes.length === 0 || opener_nodes.length === 0) {
    return;
  }

  const drawer_map = new Map();
  const last_focus_map = new Map();

  const open_drawer = (drawer_node) => {
    if (!(drawer_node instanceof HTMLElement)) {
      return;
    }

    const panel_node = drawer_node.querySelector('[data-drawer-panel]');
    if (!(panel_node instanceof HTMLElement)) {
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
    const drawer_node = drawer_map.get(drawer_id);
    if (!(drawer_node instanceof HTMLElement)) {
      return;
    }

    const panel_node = drawer_node.querySelector('[data-drawer-panel]');
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

    opener_nodes.forEach((opener_node) => {
      if (opener_node.getAttribute('data-drawer-target') === drawer_id) {
        opener_node.setAttribute('aria-expanded', 'false');
      }
    });

    const return_target = last_focus_map.get(drawer_id);
    if (return_target instanceof HTMLElement) {
      return_target.focus();
    }
  };

  drawer_nodes.forEach((drawer_node) => {
    const drawer_id = drawer_node.id;

    if (drawer_id === '') {
      return;
    }

    drawer_node.classList.add('hidden');
    drawer_node.setAttribute('aria-hidden', 'true');
    drawer_map.set(drawer_id, drawer_node);

    const close_nodes = drawer_node.querySelectorAll('[data-drawer-close]');
    close_nodes.forEach((close_node) => {
      if (!(close_node instanceof HTMLElement)) {
        return;
      }

      close_node.addEventListener('click', () => {
        close_drawer_by_id(drawer_id);
      });
    });

    drawer_node.addEventListener('click', (event) => {
      if (event.target !== drawer_node) {
        return;
      }

      close_drawer_by_id(drawer_id);
    });
  });

  const close_all_drawers = () => {
    drawer_nodes.forEach((drawer_node) => {
      const panel_node = drawer_node.querySelector('[data-drawer-panel]');
      if (panel_node instanceof HTMLElement) {
        const from_class = panel_node.getAttribute('data-drawer-panel-from') || 'translate-x-full';
        const to_class = panel_node.getAttribute('data-drawer-panel-to') || 'translate-x-0';
        panel_node.classList.remove(to_class);
        panel_node.classList.add(from_class);
      }

      drawer_node.classList.add('hidden');
      drawer_node.classList.remove('flex');
      drawer_node.setAttribute('aria-hidden', 'true');
      drawer_node.classList.remove('opacity-100');
      drawer_node.classList.add('opacity-0');
    });

    opener_nodes.forEach((opener_node) => {
      opener_node.setAttribute('aria-expanded', 'false');
    });

    document.body.classList.remove('overflow-hidden');
  };

  opener_nodes.forEach((opener_node) => {
    const target_id = opener_node.getAttribute('data-drawer-target') || '';

    if (!drawer_map.has(target_id)) {
      return;
    }

    opener_node.setAttribute('aria-expanded', 'false');

    opener_node.addEventListener('click', (event) => {
      if (opener_node instanceof HTMLAnchorElement) {
        event.preventDefault();
      }

      close_all_drawers();

      const target_drawer = drawer_map.get(target_id);
      if (!(target_drawer instanceof HTMLElement)) {
        return;
      }

      last_focus_map.set(target_id, opener_node);
      open_drawer(target_drawer);
      opener_node.setAttribute('aria-expanded', 'true');

      const preferred_focus = target_drawer.querySelector('[data-drawer-close]');
      if (preferred_focus instanceof HTMLElement) {
        preferred_focus.focus();
      }
    });
  });

  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
      return;
    }

    const open_drawer = drawer_nodes.find((drawer_node) => !drawer_node.classList.contains('hidden'));
    if (!(open_drawer instanceof HTMLElement)) {
      return;
    }

    close_drawer_by_id(open_drawer.id);
  });
})();
