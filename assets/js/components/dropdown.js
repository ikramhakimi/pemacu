(() => {
  /**
   * Dropdown Controller
   * - Scope: every `[data-dropdown]` instance.
   * - Responsibility: accessible toggle flow, outside click dismissal, and Escape close.
   * - Contract: each instance provides `[data-dropdown-trigger]` and `[data-dropdown-menu]`.
   */
  const dropdown_nodes = document.querySelectorAll('[data-dropdown]');

  if (dropdown_nodes.length === 0) {
    return;
  }

  const dropdown_instances = Array.from(dropdown_nodes)
    .map((dropdown_node) => {
      if (!(dropdown_node instanceof HTMLElement)) {
        return null;
      }

      const trigger_node = dropdown_node.querySelector('[data-dropdown-trigger]');
      const menu_node    = dropdown_node.querySelector('[data-dropdown-menu]');

      if (!(trigger_node instanceof HTMLElement) || !(menu_node instanceof HTMLElement)) {
        return null;
      }

      trigger_node.setAttribute('aria-expanded', 'false');
      menu_node.classList.add('hidden');

      return {
        dropdown_node,
        trigger_node,
        menu_node,
      };
    })
    .filter((instance) => instance !== null);

  if (dropdown_instances.length === 0) {
    return;
  }

  const close_dropdown = (instance, should_focus_trigger = false) => {
    instance.menu_node.classList.add('hidden');
    instance.trigger_node.setAttribute('aria-expanded', 'false');

    if (should_focus_trigger) {
      instance.trigger_node.focus();
    }
  };

  const open_dropdown = (instance) => {
    instance.menu_node.classList.remove('hidden');
    instance.trigger_node.setAttribute('aria-expanded', 'true');
  };

  const close_all_dropdowns = (excluded_instance = null) => {
    dropdown_instances.forEach((instance) => {
      if (instance === excluded_instance) {
        return;
      }

      close_dropdown(instance);
    });
  };

  dropdown_instances.forEach((instance) => {
    instance.trigger_node.addEventListener('click', (event) => {
      if (instance.trigger_node instanceof HTMLAnchorElement) {
        event.preventDefault();
      }

      const is_open = !instance.menu_node.classList.contains('hidden');
      close_all_dropdowns(instance);

      if (is_open) {
        close_dropdown(instance);
        return;
      }

      open_dropdown(instance);
    });
  });

  document.addEventListener('click', (event) => {
    if (!(event.target instanceof Node)) {
      return;
    }

    dropdown_instances.forEach((instance) => {
      if (instance.dropdown_node.contains(event.target)) {
        return;
      }

      close_dropdown(instance);
    });
  });

  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
      return;
    }

    const open_instance = dropdown_instances.find((instance) => {
      return !instance.menu_node.classList.contains('hidden');
    });

    if (!open_instance) {
      return;
    }

    close_dropdown(open_instance, true);
  });
})();

