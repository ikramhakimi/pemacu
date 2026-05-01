(() => {
  const can_use_hover_interaction = () =>
    window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  const is_nav_dropdown = (dropdown_node) =>
    dropdown_node instanceof HTMLElement && dropdown_node.closest('[data-nav]') instanceof HTMLElement;

  const set_menu_placement = (dropdown_node) => {
    if (!(dropdown_node instanceof HTMLElement)) {
      return;
    }

    const menu_node = dropdown_node.querySelector('[data-dropdown-menu]');
    const trigger_node = dropdown_node.querySelector('[data-dropdown-trigger]');

    if (!(menu_node instanceof HTMLElement) || !(trigger_node instanceof HTMLElement)) {
      return;
    }

    const was_hidden = menu_node.classList.contains('hidden');
    if (was_hidden) {
      menu_node.classList.remove('hidden');
      menu_node.style.visibility = 'hidden';
      menu_node.style.pointerEvents = 'none';
    }

    menu_node.classList.remove('bottom-full', 'mb-2');
    menu_node.classList.add('mt-2');

    const trigger_rect = trigger_node.getBoundingClientRect();
    const menu_rect = menu_node.getBoundingClientRect();
    const viewport_height = window.innerHeight || document.documentElement.clientHeight;
    const space_below = viewport_height - trigger_rect.bottom;
    const space_above = trigger_rect.top;
    const menu_height = menu_rect.height;

    if (space_below < menu_height && space_above > space_below) {
      menu_node.classList.remove('mt-2');
      menu_node.classList.add('bottom-full', 'mb-2');
    }

    if (was_hidden) {
      menu_node.classList.add('hidden');
      menu_node.style.visibility = '';
      menu_node.style.pointerEvents = '';
    }
  };

  const close_dropdown = (dropdown_node, should_focus_trigger = false) => {
    if (!(dropdown_node instanceof HTMLElement)) {
      return;
    }

    const trigger_node = dropdown_node.querySelector('[data-dropdown-trigger]');
    const menu_node = dropdown_node.querySelector('[data-dropdown-menu]');

    if (!(trigger_node instanceof HTMLElement) || !(menu_node instanceof HTMLElement)) {
      return;
    }

    menu_node.classList.add('hidden');
    trigger_node.setAttribute('aria-expanded', 'false');

    if (should_focus_trigger) {
      trigger_node.focus();
    }
  };

  const open_dropdown = (dropdown_node) => {
    if (!(dropdown_node instanceof HTMLElement)) {
      return;
    }

    const trigger_node = dropdown_node.querySelector('[data-dropdown-trigger]');
    const menu_node = dropdown_node.querySelector('[data-dropdown-menu]');

    if (!(trigger_node instanceof HTMLElement) || !(menu_node instanceof HTMLElement)) {
      return;
    }

    set_menu_placement(dropdown_node);
    menu_node.classList.remove('hidden');
    trigger_node.setAttribute('aria-expanded', 'true');
  };

  const close_all_dropdowns = (excluded_dropdown = null) => {
    const dropdown_nodes = Array.from(document.querySelectorAll('[data-dropdown]'));

    dropdown_nodes.forEach((dropdown_node) => {
      if (!(dropdown_node instanceof HTMLElement) || dropdown_node === excluded_dropdown) {
        return;
      }

      close_dropdown(dropdown_node);
    });
  };

  const initialize_dropdowns = () => {
    const dropdown_nodes = Array.from(document.querySelectorAll('[data-dropdown]'));

    dropdown_nodes.forEach((dropdown_node) => {
      if (!(dropdown_node instanceof HTMLElement)) {
        return;
      }

      const trigger_node = dropdown_node.querySelector('[data-dropdown-trigger]');
      const menu_node = dropdown_node.querySelector('[data-dropdown-menu]');

      if (!(trigger_node instanceof HTMLElement) || !(menu_node instanceof HTMLElement)) {
        return;
      }

      trigger_node.setAttribute('aria-expanded', 'false');
      menu_node.classList.add('hidden');
    });
  };

  initialize_dropdowns();

  const hover_timers = new WeakMap();
  const bind_hover_dropdowns = () => {
    const dropdown_nodes = Array.from(document.querySelectorAll('[data-dropdown]'));

    dropdown_nodes.forEach((dropdown_node) => {
      if (!(dropdown_node instanceof HTMLElement)) {
        return;
      }

      if (!is_nav_dropdown(dropdown_node)) {
        return;
      }

      if (dropdown_node.dataset.dropdownHoverBound === 'true') {
        return;
      }

      dropdown_node.dataset.dropdownHoverBound = 'true';

      dropdown_node.addEventListener('mouseenter', () => {
        if (!can_use_hover_interaction()) {
          return;
        }

        const existing_timer = hover_timers.get(dropdown_node);
        if (existing_timer) {
          window.clearTimeout(existing_timer);
        }

        close_all_dropdowns(dropdown_node);
        open_dropdown(dropdown_node);
      });

      dropdown_node.addEventListener('mouseleave', () => {
        if (!can_use_hover_interaction()) {
          return;
        }

        const leave_timer = window.setTimeout(() => {
          close_dropdown(dropdown_node);
          hover_timers.delete(dropdown_node);
        }, 120);

        hover_timers.set(dropdown_node, leave_timer);
      });
    });
  };

  bind_hover_dropdowns();

  document.addEventListener('click', (event) => {
    const click_target = event.target;
    if (!(click_target instanceof Element)) {
      return;
    }

    const trigger_node = click_target.closest('[data-dropdown-trigger]');
    if (trigger_node instanceof HTMLElement) {
      const dropdown_node = trigger_node.closest('[data-dropdown]');
      if (!(dropdown_node instanceof HTMLElement)) {
        return;
      }

      if (trigger_node instanceof HTMLAnchorElement) {
        event.preventDefault();
      }

      const menu_node = dropdown_node.querySelector('[data-dropdown-menu]');
      if (!(menu_node instanceof HTMLElement)) {
        return;
      }

      const is_open = !menu_node.classList.contains('hidden');
      close_all_dropdowns(dropdown_node);

      if (is_open) {
        close_dropdown(dropdown_node);
      } else {
        open_dropdown(dropdown_node);
      }

      return;
    }

    const within_dropdown = click_target.closest('[data-dropdown]');
    if (!(within_dropdown instanceof HTMLElement)) {
      close_all_dropdowns();
    }
  });

  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
      return;
    }

    const open_dropdown_node = Array.from(document.querySelectorAll('[data-dropdown]')).find((dropdown_node) => {
      if (!(dropdown_node instanceof HTMLElement)) {
        return false;
      }

      const menu_node = dropdown_node.querySelector('[data-dropdown-menu]');
      return menu_node instanceof HTMLElement && !menu_node.classList.contains('hidden');
    });

    if (!(open_dropdown_node instanceof HTMLElement)) {
      return;
    }

    close_dropdown(open_dropdown_node, true);
  });
})();
