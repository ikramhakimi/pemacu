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

(() => {
  /**
   * Alert Dismiss Controller
   * - Scope: every `[data-alert-js]` instance.
   * - Responsibility: dismiss one alert instance when its dismiss button is activated.
   * - Contract: dismiss control uses `[data-alert-dismiss]`, alert root uses `[data-alert]`.
   */
  const alert_nodes = Array.from(document.querySelectorAll('[data-alert-js]'))
    .filter((alert_node) => alert_node instanceof HTMLElement);

  if (alert_nodes.length === 0) {
    return;
  }

  alert_nodes.forEach((alert_node) => {
    const dismiss_node = alert_node.querySelector('[data-alert-dismiss]');

    if (!(dismiss_node instanceof HTMLButtonElement)) {
      return;
    }

    dismiss_node.addEventListener('click', () => {
      const root_node = dismiss_node.closest('[data-alert]');

      if (!(root_node instanceof HTMLElement)) {
        return;
      }

      root_node.remove();
    });
  });
})();

(() => {
  /**
   * Picktime Grid Tabs Controller
   * - Scope: every `[data-picktime-grid]` instance.
   * - Responsibility: show one period panel at a time (morning/afternoon/night).
   * - Contract: tabs use `[data-picktime-grid-tab]`; panels use `[data-picktime-grid-panel]`.
   */
  const picktime_grid_nodes = Array.from(document.querySelectorAll('[data-picktime-grid]'))
    .filter((grid_node) => grid_node instanceof HTMLElement);

  if (picktime_grid_nodes.length === 0) {
    return;
  }

  picktime_grid_nodes.forEach((grid_node) => {
    const tab_nodes = Array.from(grid_node.querySelectorAll('[data-picktime-grid-tab]'))
      .filter((tab_node) => tab_node instanceof HTMLButtonElement);
    const panel_nodes = Array.from(grid_node.querySelectorAll('[data-picktime-grid-panel]'))
      .filter((panel_node) => panel_node instanceof HTMLElement);

    if (tab_nodes.length === 0 || panel_nodes.length === 0) {
      return;
    }

    let active_period = grid_node.getAttribute('data-picktime-grid-active') || 'morning';

    const tab_active_class = 'picktime__tab btn btn--md -ml-px first:ml-0 rounded-none first:rounded-l-md last:rounded-r-md border h-[var(--ui-h-md)] leading-[var(--ui-h-md)] px-[var(--ui-px-md)] text-xs font-semibold uppercase tracking-[0.06em] relative z-10 btn--primary btn--gradient border-primary-700 bg-gradient-to-b from-primary-700 to-primary-500 text-white';
    const tab_inactive_class = 'picktime__tab btn btn--md -ml-px first:ml-0 rounded-none first:rounded-l-md last:rounded-r-md border h-[var(--ui-h-md)] leading-[var(--ui-h-md)] px-[var(--ui-px-md)] text-xs font-semibold uppercase tracking-[0.06em] z-0 btn--secondary btn--gradient border-brand-300 bg-gradient-to-b from-white to-brand-100 text-brand-900';

    const switch_period = (period_key) => {
      active_period = period_key;

      panel_nodes.forEach((panel_node) => {
        const panel_period = panel_node.getAttribute('data-picktime-grid-panel') || '';
        panel_node.classList.toggle('hidden', panel_period !== active_period);
      });

      tab_nodes.forEach((tab_node) => {
        const tab_period = tab_node.getAttribute('data-picktime-grid-tab') || '';
        const is_active = tab_period === active_period;

        tab_node.className = is_active
          ? tab_active_class
          : tab_inactive_class;
      });
    };

    tab_nodes.forEach((tab_node) => {
      tab_node.addEventListener('click', () => {
        const tab_period = tab_node.getAttribute('data-picktime-grid-tab') || '';
        if (tab_period === '') {
          return;
        }

        switch_period(tab_period);
      });
    });

    switch_period(active_period);
  });
})();

(() => {
  /**
   * Pickdate Grid JS Controller
   * - Scope: every `[data-pickdate-grid-js]` instance.
   * - Responsibility: dynamic month navigation, date card generation, async availability sync, keyboard selection, and metadata hints.
   * - Contract: instance provides prev/next controls, days grid container, status node, and one hidden value input.
   */
  const grid_nodes = Array.from(document.querySelectorAll('[data-pickdate-grid-js]'))
    .filter((grid_node) => grid_node instanceof HTMLElement);

  if (grid_nodes.length === 0) {
    return;
  }

  const month_formatter = new Intl.DateTimeFormat('en-US', {
    month: 'long',
    year: 'numeric',
  });
  const selected_date_formatter = new Intl.DateTimeFormat('en-US', {
    weekday: 'short',
    day: 'numeric',
    month: 'short',
    year: 'numeric',
  });

  const to_iso = (date) => {
    const year  = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day   = String(date.getDate()).padStart(2, '0');
    return `${year}-${month}-${day}`;
  };

  const parse_iso = (raw_value) => {
    if (!raw_value || !/^\d{4}-\d{2}-\d{2}$/.test(raw_value)) {
      return null;
    }

    const [year, month, day] = raw_value.split('-').map((part) => Number(part));
    const parsed = new Date(year, month - 1, day);

    if (
      parsed.getFullYear() !== year
      || parsed.getMonth() !== month - 1
      || parsed.getDate() !== day
    ) {
      return null;
    }

    return parsed;
  };

  const to_bool = (raw_value, fallback = false) => {
    if (raw_value === 'true') {
      return true;
    }
    if (raw_value === 'false') {
      return false;
    }
    return fallback;
  };

  const move_focus_by = (root_node, from_iso, delta_days) => {
    const day_nodes = Array.from(root_node.querySelectorAll('[data-pickdate-grid-day]'))
      .filter((day_node) => day_node instanceof HTMLButtonElement);
    const current_index = day_nodes.findIndex((day_node) => day_node.getAttribute('data-date') === from_iso);
    if (current_index === -1) {
      return;
    }

    const next_index = current_index + delta_days;
    if (next_index < 0 || next_index >= day_nodes.length) {
      return;
    }

    day_nodes[next_index].focus();
  };

  grid_nodes.forEach((grid_node) => {
    const prev_node       = grid_node.querySelector('[data-pickdate-grid-prev]');
    const next_node       = grid_node.querySelector('[data-pickdate-grid-next]');
    const month_select    = grid_node.querySelector('[data-pickdate-grid-month-select]');
    const status_node     = grid_node.querySelector('[data-pickdate-grid-status]');
    const days_node       = grid_node.querySelector('[data-pickdate-grid-days]');
    const selected_node   = grid_node.querySelector('[data-pickdate-grid-selected]');
    const promo_panel     = grid_node.querySelector('[data-pickdate-grid-promo-panel]');
    const promo_title     = grid_node.querySelector('[data-pickdate-grid-promo-title]');
    const promo_copy      = grid_node.querySelector('[data-pickdate-grid-promo-copy]');
    const value_node      = grid_node.querySelector('[data-pickdate-grid-value]');
    const initial_year    = Number(grid_node.getAttribute('data-pickdate-grid-year'));
    const initial_month   = Number(grid_node.getAttribute('data-pickdate-grid-month'));
    const initial_weeks   = Number(grid_node.getAttribute('data-pickdate-grid-weeks')) || 5;
    const forward_months  = Number(grid_node.getAttribute('data-pickdate-grid-forward-months')) || 12;
    const disable_past    = to_bool(grid_node.getAttribute('data-pickdate-grid-disable-past'), true);
    const min_date_raw    = grid_node.getAttribute('data-pickdate-grid-min') || '';
    const max_date_raw    = grid_node.getAttribute('data-pickdate-grid-max') || '';
    const api_endpoint    = grid_node.getAttribute('data-pickdate-grid-api') || '';
    const unavailable_raw = (grid_node.getAttribute('data-pickdate-grid-unavailable') || '').trim();

    if (
      !(prev_node instanceof HTMLButtonElement)
      || !(next_node instanceof HTMLButtonElement)
      || !(month_select instanceof HTMLSelectElement)
      || !(status_node instanceof HTMLElement)
      || !(days_node instanceof HTMLElement)
      || !(selected_node instanceof HTMLElement)
      || !(promo_panel instanceof HTMLElement)
      || !(promo_title instanceof HTMLElement)
      || !(promo_copy instanceof HTMLElement)
      || !(value_node instanceof HTMLInputElement)
      || !Number.isInteger(initial_year)
      || !Number.isInteger(initial_month)
    ) {
      return;
    }

    let view_date = new Date(initial_year, initial_month - 1, 1);
    let visible_weeks = Number.isInteger(initial_weeks) && initial_weeks > 0 ? initial_weeks : 5;
    let visible_forward_months = Number.isInteger(forward_months) && forward_months > 0 ? forward_months : 12;
    if (visible_weeks > 8) {
      visible_weeks = 8;
    }
    if (visible_forward_months > 36) {
      visible_forward_months = 36;
    }
    const availability_cache = new Map();
    let current_fetch_controller = null;
    const start_month = new Date(initial_year, initial_month - 1, 1);
    const end_month   = new Date(initial_year, initial_month - 1 + visible_forward_months, 1);
    let selected_date = value_node.value;
    let unavailable_set = new Set(
      unavailable_raw === ''
        ? []
        : unavailable_raw
          .split(',')
          .map((item) => item.trim())
          .filter((item) => /^\d{4}-\d{2}-\d{2}$/.test(item)),
    );
    let metadata_map = {};
    const today_iso = to_iso(new Date());
    const min_iso = parse_iso(min_date_raw) ? min_date_raw : '';
    const max_iso = parse_iso(max_date_raw) ? max_date_raw : '';

    const is_disabled = (date_iso, metadata) => {
      if (disable_past && date_iso < today_iso) {
        return true;
      }

      if (min_iso !== '' && date_iso < min_iso) {
        return true;
      }

      if (max_iso !== '' && date_iso > max_iso) {
        return true;
      }

      if (unavailable_set.has(date_iso)) {
        return true;
      }

      if (metadata && metadata.sold_out === true) {
        return true;
      }

      return false;
    };

    const build_tooltip = (date_iso, metadata) => {
      const parts = [date_iso];

      if (metadata && typeof metadata === 'object') {
        if (typeof metadata.price === 'string' && metadata.price !== '') {
          parts.push(`Price: ${metadata.price}`);
        }
        if (typeof metadata.promo === 'string' && metadata.promo !== '') {
          parts.push(`Promo: ${metadata.promo}`);
        }
        if (metadata.sold_out === true) {
          parts.push('Sold out');
        }
      }

      return parts.join(' | ');
    };

    const month_key = (date) => `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;

    const clamp_view_date = () => {
      if (view_date.getTime() < start_month.getTime()) {
        view_date = new Date(start_month);
      }

      if (view_date.getTime() > end_month.getTime()) {
        view_date = new Date(end_month);
      }
    };

    const sync_month_controls = () => {
      month_select.value = month_key(view_date);
      prev_node.disabled = view_date.getTime() <= start_month.getTime();
      next_node.disabled = view_date.getTime() >= end_month.getTime();

      const disabled_class = 'opacity-50 cursor-not-allowed';
      prev_node.classList.toggle('opacity-50', prev_node.disabled);
      prev_node.classList.toggle('cursor-not-allowed', prev_node.disabled);
      next_node.classList.toggle('opacity-50', next_node.disabled);
      next_node.classList.toggle('cursor-not-allowed', next_node.disabled);

      if (!prev_node.disabled) {
        prev_node.classList.remove(...disabled_class.split(' '));
      }

      if (!next_node.disabled) {
        next_node.classList.remove(...disabled_class.split(' '));
      }
    };

    const build_month_options = () => {
      month_select.innerHTML = '';

      for (let step = 0; step <= visible_forward_months; step += 1) {
        const option_date = new Date(start_month.getFullYear(), start_month.getMonth() + step, 1);
        const option = document.createElement('option');
        option.value = month_key(option_date);
        option.textContent = month_formatter.format(option_date);
        month_select.appendChild(option);
      }
    };

    const sync_selected_label = () => {
      const parsed_date = parse_iso(selected_date);

      if (!(parsed_date instanceof Date)) {
        selected_node.textContent = 'Selected date: -';
        promo_panel.hidden = true;
        promo_title.textContent = '';
        promo_copy.textContent = 'Pick this date now to secure the promotion before slots run out.';
        return;
      }

      selected_node.textContent = `Selected date: ${selected_date_formatter.format(parsed_date)}`;

      const selected_metadata = metadata_map[selected_date];
      const selected_promo = selected_metadata && typeof selected_metadata.promo === 'string'
        ? selected_metadata.promo.trim()
        : '';

      if (selected_promo === '') {
        promo_panel.hidden = true;
        promo_title.textContent = '';
        promo_copy.textContent = 'Pick this date now to secure the promotion before slots run out.';
        return;
      }

      promo_panel.hidden = false;
      promo_title.textContent = selected_promo;

      const price_text = selected_metadata && typeof selected_metadata.price === 'string'
        ? selected_metadata.price
        : '';
      const capacity_text = selected_metadata && typeof selected_metadata.capacity === 'string'
        ? selected_metadata.capacity
        : '';

      if (price_text !== '' && capacity_text !== '') {
        promo_copy.textContent = `Great pick. ${price_text} with ${capacity_text}. Lock this promo date now.`;
        return;
      }

      promo_copy.textContent = 'Great pick. Lock this promo date now before the offer ends.';
    };

    const render = () => {
      sync_month_controls();
      days_node.innerHTML = '';

      const year = view_date.getFullYear();
      const month = view_date.getMonth();
      const first_of_month = new Date(year, month, 1);
      const weekday_index = first_of_month.getDay();
      const monday_offset = weekday_index === 0 ? -6 : 1 - weekday_index;
      const start_date = new Date(
        first_of_month.getFullYear(),
        first_of_month.getMonth(),
        first_of_month.getDate() + monday_offset,
      );
      const total_days = visible_weeks * 7;

      for (let day_offset = 0; day_offset < total_days; day_offset += 1) {
        const day_date = new Date(start_date.getFullYear(), start_date.getMonth(), start_date.getDate() + day_offset);
        const date_iso = to_iso(day_date);
        const metadata = metadata_map[date_iso] || null;
        const promo_text = metadata && typeof metadata.promo === 'string' ? metadata.promo : '';
        const disabled = is_disabled(date_iso, metadata);
        const checked = !disabled && selected_date === date_iso;
        const is_current_month = day_date.getMonth() === month;

        const day_button = document.createElement('button');
        day_button.type = 'button';
        day_button.className = [
          'pickdate__card',
          'relative',
          'sm:rounded-md',
          'border',
          '-m-[1px]',
          'sm:m-0',
          'sm:focus:ring-2',
          'py-4',
          'uppercase',
          'transition-all',
          'duration-200',
          'flex',
          'flex-col',
          'items-center',
          'justify-center',
          'focus:outline-none',
          'focus:ring-2',
          'focus:ring-brand-900',
        ].join(' ');
        day_button.setAttribute('role', 'radio');
        day_button.setAttribute('aria-checked', checked ? 'true' : 'false');
        day_button.setAttribute('data-pickdate-grid-day', 'true');
        day_button.setAttribute('data-date', date_iso);
        day_button.title = build_tooltip(date_iso, metadata);

        if (checked) {
          day_button.classList.add('bg-brand-900', 'text-white', 'border-brand-900', 'shadow-xl', 'ring-2', 'sm:ring-1', 'ring-brand-900', 'z-10');
        } else if (disabled) {
          day_button.classList.add('bg-brand-100', 'text-brand-400', 'border-brand-200', 'ring-brand-200', 'shadow-none', 'pointer-events-none');
          day_button.setAttribute('aria-disabled', 'true');
          day_button.disabled = true;
        } else {
          day_button.classList.add('bg-white', 'text-brand-700', 'border-brand-200', 'ring-brand-200', 'hover:border-brand-900', 'hover:ring-brand-900', 'hover:cursor-pointer', 'sm:hover:ring-1');
        }
        if (!is_current_month) {
          day_button.classList.add('opacity-0');
        }

        const day_span = document.createElement('span');
        day_span.className = 'text-xl font-semibold tracking-wider leading-8 md:text-2xl';
        day_span.textContent = String(day_date.getDate());

        if (promo_text !== '') {
          const promo_wrap = document.createElement('span');
          promo_wrap.className = 'pointer-events-none absolute right-[5px] top-[5px] z-10 block h-[10px] w-[10px]';
          promo_wrap.setAttribute('aria-label', `Promo: ${promo_text}`);
          promo_wrap.title = promo_text;

          const promo_ping = document.createElement('span');
          promo_ping.className = checked
            ? 'absolute inset-0 rounded-full bg-white/70 opacity-0 animate-ping'
            : (disabled
              ? 'absolute inset-0 rounded-full bg-brand-400/70 opacity-0 animate-ping'
              : 'absolute inset-0 rounded-full bg-primary-500/70 opacity-0 animate-ping');

          const promo_core = document.createElement('span');
          promo_core.className = checked
            ? 'absolute inset-0 rounded-full bg-white ring-1 ring-brand-900 shadow-sm'
            : (disabled
              ? 'absolute inset-0 rounded-full bg-brand-400 ring-1 ring-white shadow-sm'
              : 'absolute inset-0 rounded-full bg-primary-600 ring-1 ring-white shadow-sm');

          promo_wrap.appendChild(promo_ping);
          promo_wrap.appendChild(promo_core);
          day_button.appendChild(promo_wrap);
        }

        day_button.appendChild(day_span);

        day_button.addEventListener('click', () => {
          if (disabled) {
            return;
          }

          selected_date = date_iso;
          value_node.value = date_iso;
          render();
        });

        day_button.addEventListener('keydown', (event) => {
          if (event.key === 'ArrowRight') {
            event.preventDefault();
            move_focus_by(days_node, date_iso, 1);
            return;
          }
          if (event.key === 'ArrowLeft') {
            event.preventDefault();
            move_focus_by(days_node, date_iso, -1);
            return;
          }
          if (event.key === 'ArrowDown') {
            event.preventDefault();
            move_focus_by(days_node, date_iso, 7);
            return;
          }
          if (event.key === 'ArrowUp') {
            event.preventDefault();
            move_focus_by(days_node, date_iso, -7);
            return;
          }
          if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            day_button.click();
          }
        });

        days_node.appendChild(day_button);
      }

      const checked_node = days_node.querySelector('[aria-checked="true"]');
      if (!(checked_node instanceof HTMLElement)) {
        sync_selected_label();
        return;
      }

      checked_node.setAttribute('tabindex', '0');
      sync_selected_label();
    };

    const load_availability = async () => {
      clamp_view_date();
      const year = view_date.getFullYear();
      const month = view_date.getMonth() + 1;
      const cache_key = `${year}-${String(month).padStart(2, '0')}`;
      status_node.textContent = 'Loading availability...';

      if (api_endpoint === '') {
        status_node.textContent = 'Availability loaded.';
        render();
        return;
      }

      const cached_payload = availability_cache.get(cache_key);
      if (cached_payload) {
        unavailable_set = new Set(cached_payload.unavailable_dates);
        metadata_map = cached_payload.metadata;
        status_node.textContent = 'Availability loaded from cache.';
        render();
        return;
      }

      try {
        if (current_fetch_controller instanceof AbortController) {
          current_fetch_controller.abort();
        }

        current_fetch_controller = new AbortController();
        const query = `${api_endpoint}?year=${year}&month=${month}`;
        const response = await fetch(query, {
          headers: { Accept: 'application/json' },
          signal: current_fetch_controller.signal,
        });

        if (!response.ok) {
          throw new Error(`Request failed (${response.status})`);
        }

        const payload = await response.json();
        const unavailable_dates = Array.isArray(payload.unavailable_dates)
          ? payload.unavailable_dates.filter((item) => typeof item === 'string')
          : [];
        const metadata = payload.metadata && typeof payload.metadata === 'object'
          ? payload.metadata
          : {};

        availability_cache.set(cache_key, {
          unavailable_dates,
          metadata,
        });
        unavailable_set = new Set(unavailable_dates);
        metadata_map = metadata;
        status_node.textContent = 'Availability synced.';
      } catch (error) {
        if (error instanceof DOMException && error.name === 'AbortError') {
          return;
        }

        status_node.textContent = 'Using fallback availability.';
      } finally {
        current_fetch_controller = null;
      }

      render();
    };

    prev_node.addEventListener('click', () => {
      if (prev_node.disabled) {
        return;
      }

      view_date = new Date(view_date.getFullYear(), view_date.getMonth() - 1, 1);
      load_availability();
    });

    next_node.addEventListener('click', () => {
      if (next_node.disabled) {
        return;
      }

      view_date = new Date(view_date.getFullYear(), view_date.getMonth() + 1, 1);
      load_availability();
    });

    month_select.addEventListener('change', () => {
      const [year_part, month_part] = month_select.value.split('-').map((item) => Number(item));
      if (!Number.isInteger(year_part) || !Number.isInteger(month_part)) {
        return;
      }

      view_date = new Date(year_part, month_part - 1, 1);
      load_availability();
    });

    build_month_options();
    sync_month_controls();
    load_availability();
  });
})();

(() => {
  /**
   * Pickdate Controller
   * - Scope: every `[data-pickdate]` instance.
   * - Responsibility: popover lifecycle, month navigation, single/range date selection, and hidden input sync.
   * - Contract: each instance exposes trigger/panel/day-grid nodes and hidden value inputs by mode.
   */
  const pickdate_nodes = Array.from(document.querySelectorAll('[data-pickdate]'))
    .filter((pickdate_node) => pickdate_node instanceof HTMLElement);

  if (pickdate_nodes.length === 0) {
    return;
  }

  const month_formatter = new Intl.DateTimeFormat('en-US', {
    month: 'long',
    year: 'numeric',
  });
  const date_formatter = new Intl.DateTimeFormat('en-US', {
    day: 'numeric',
    month: 'short',
    year: 'numeric',
  });

  const to_iso = (date) => {
    const year  = date.getFullYear();
    const month = String(date.getMonth() + 1).padStart(2, '0');
    const day   = String(date.getDate()).padStart(2, '0');

    return `${year}-${month}-${day}`;
  };

  const to_start_of_day = (date) => new Date(date.getFullYear(), date.getMonth(), date.getDate());

  const parse_iso = (raw_value) => {
    if (!raw_value || !/^\d{4}-\d{2}-\d{2}$/.test(raw_value)) {
      return null;
    }

    const [year, month, day] = raw_value.split('-').map((part) => Number(part));

    if (!Number.isInteger(year) || !Number.isInteger(month) || !Number.isInteger(day)) {
      return null;
    }

    const parsed_date = new Date(year, month - 1, day);

    if (
      parsed_date.getFullYear() !== year
      || parsed_date.getMonth() !== month - 1
      || parsed_date.getDate() !== day
    ) {
      return null;
    }

    return parsed_date;
  };

  const is_same_day = (a, b) => {
    if (!(a instanceof Date) || !(b instanceof Date)) {
      return false;
    }

    return (
      a.getFullYear() === b.getFullYear()
      && a.getMonth() === b.getMonth()
      && a.getDate() === b.getDate()
    );
  };

  const is_between = (target, start, end) => {
    if (!(target instanceof Date) || !(start instanceof Date) || !(end instanceof Date)) {
      return false;
    }

    const target_time = target.getTime();
    return target_time > start.getTime() && target_time < end.getTime();
  };

  const clamp_by_limits = (date, min_date, max_date) => {
    let next_date = date;

    if (min_date instanceof Date && next_date.getTime() < min_date.getTime()) {
      next_date = new Date(min_date);
    }

    if (max_date instanceof Date && next_date.getTime() > max_date.getTime()) {
      next_date = new Date(max_date);
    }

    return next_date;
  };

  pickdate_nodes.forEach((pickdate_node) => {
    const trigger_node     = pickdate_node.querySelector('[data-pickdate-trigger]');
    const display_node     = pickdate_node.querySelector('[data-pickdate-display]');
    const panel_node       = pickdate_node.querySelector('[data-pickdate-panel]');
    const month_label_node = pickdate_node.querySelector('[data-pickdate-month-label]');
    const days_node        = pickdate_node.querySelector('[data-pickdate-days]');
    const prev_node        = pickdate_node.querySelector('[data-pickdate-prev]');
    const next_node        = pickdate_node.querySelector('[data-pickdate-next]');
    const clear_node       = pickdate_node.querySelector('[data-pickdate-clear]');
    const apply_node       = pickdate_node.querySelector('[data-pickdate-apply]');
    const range_status_node = pickdate_node.querySelector('[data-pickdate-range-status]');
    const value_node       = pickdate_node.querySelector('[data-pickdate-value]');
    const start_node       = pickdate_node.querySelector('[data-pickdate-start]');
    const end_node         = pickdate_node.querySelector('[data-pickdate-end]');
    const mode             = pickdate_node.getAttribute('data-pickdate-mode') === 'range' ? 'range' : 'single';
    const min_date         = parse_iso(pickdate_node.getAttribute('data-pickdate-min') || '');
    const max_date         = parse_iso(pickdate_node.getAttribute('data-pickdate-max') || '');
    const disable_past     = pickdate_node.getAttribute('data-pickdate-disable-past') !== 'false';
    const unavailable_raw  = (pickdate_node.getAttribute('data-pickdate-unavailable') || '').trim();
    const unavailable_set  = new Set(
      unavailable_raw === ''
        ? []
        : unavailable_raw
          .split(',')
          .map((value) => value.trim())
          .filter((value) => /^\d{4}-\d{2}-\d{2}$/.test(value)),
    );

    if (
      !(trigger_node instanceof HTMLButtonElement)
      || !(display_node instanceof HTMLInputElement)
      || !(panel_node instanceof HTMLElement)
      || !(month_label_node instanceof HTMLElement)
      || !(days_node instanceof HTMLElement)
      || !(prev_node instanceof HTMLButtonElement)
      || !(next_node instanceof HTMLButtonElement)
      || !(clear_node instanceof HTMLButtonElement)
      || !(apply_node instanceof HTMLButtonElement)
    ) {
      return;
    }

    let single_date = value_node instanceof HTMLInputElement ? parse_iso(value_node.value) : null;
    let start_date  = start_node instanceof HTMLInputElement ? parse_iso(start_node.value) : null;
    let end_date    = end_node instanceof HTMLInputElement ? parse_iso(end_node.value) : null;
    let view_date   = to_start_of_day(new Date());
    const today_date = to_start_of_day(new Date());
    let range_phase = 'start';

    if (mode === 'single' && single_date instanceof Date) {
      view_date = new Date(single_date);
    }

    if (mode === 'range' && start_date instanceof Date) {
      view_date = new Date(start_date);
    }

    if (min_date instanceof Date) {
      view_date = clamp_by_limits(view_date, min_date, max_date);
    }

    const is_open = () => !panel_node.classList.contains('hidden');

    const close_panel = () => {
      panel_node.classList.add('hidden');
      trigger_node.setAttribute('aria-expanded', 'false');
    };

    const open_panel = () => {
      panel_node.classList.remove('hidden');
      trigger_node.setAttribute('aria-expanded', 'true');

      if (mode !== 'range') {
        return;
      }

      if (start_date instanceof Date && !(end_date instanceof Date)) {
        range_phase = 'end';
        return;
      }

      range_phase = 'start';
    };

    const is_out_of_range = (date) => {
      const date_start = to_start_of_day(date);

      if (disable_past && date_start.getTime() < today_date.getTime()) {
        return true;
      }

      if (min_date instanceof Date && date.getTime() < min_date.getTime()) {
        return true;
      }

      if (max_date instanceof Date && date.getTime() > max_date.getTime()) {
        return true;
      }

      if (unavailable_set.has(to_iso(date_start))) {
        return true;
      }

      return false;
    };

    if (mode === 'single' && single_date instanceof Date && is_out_of_range(single_date)) {
      single_date = null;
    }

    if (mode === 'range') {
      if (start_date instanceof Date && is_out_of_range(start_date)) {
        start_date = null;
      }

      if (end_date instanceof Date && is_out_of_range(end_date)) {
        end_date = null;
      }

      if (start_date instanceof Date && end_date instanceof Date && end_date.getTime() < start_date.getTime()) {
        const swap_date = start_date;
        start_date = end_date;
        end_date = swap_date;
      }
    }

    const sync_outputs = () => {
      if (mode === 'single') {
        if (value_node instanceof HTMLInputElement) {
          value_node.value = single_date instanceof Date ? to_iso(single_date) : '';
        }

        display_node.value = single_date instanceof Date ? date_formatter.format(single_date) : '';
        return;
      }

      if (start_node instanceof HTMLInputElement) {
        start_node.value = start_date instanceof Date ? to_iso(start_date) : '';
      }

      if (end_node instanceof HTMLInputElement) {
        end_node.value = end_date instanceof Date ? to_iso(end_date) : '';
      }

      if (start_date instanceof Date && end_date instanceof Date) {
        display_node.value = `${date_formatter.format(start_date)} - ${date_formatter.format(end_date)}`;
        return;
      }

      if (start_date instanceof Date) {
        display_node.value = `${date_formatter.format(start_date)} - ...`;
        return;
      }

      display_node.value = '';
    };

    const sync_range_status = () => {
      if (mode !== 'range' || !(range_status_node instanceof HTMLElement)) {
        return;
      }

      if (!(start_date instanceof Date)) {
        range_status_node.textContent = 'Select check-in date';
        return;
      }

      if (!(end_date instanceof Date) || range_phase === 'end') {
        range_status_node.textContent = 'Select check-out date';
        return;
      }

      range_status_node.textContent = 'Range selected';
    };

    const render_days = () => {
      month_label_node.textContent = month_formatter.format(view_date);
      days_node.innerHTML = '';

      const first_of_month = new Date(view_date.getFullYear(), view_date.getMonth(), 1);
      const start_weekday  = first_of_month.getDay();
      const total_days     = new Date(view_date.getFullYear(), view_date.getMonth() + 1, 0).getDate();

      for (let index = 0; index < start_weekday; index += 1) {
        const spacer_node = document.createElement('span');
        spacer_node.className = 'h-9';
        days_node.appendChild(spacer_node);
      }

      for (let day_number = 1; day_number <= total_days; day_number += 1) {
        const day_date   = new Date(view_date.getFullYear(), view_date.getMonth(), day_number);
        const day_button = document.createElement('button');
        const disabled   = is_out_of_range(day_date);
        const is_today   = is_same_day(day_date, new Date());
        const day_label  = String(day_number);

        day_button.type = 'button';
        day_button.textContent = day_label;
        day_button.setAttribute('data-pickdate-day', to_iso(day_date));
        day_button.className = [
          'pickdate__day',
          'inline-flex',
          'h-9',
          'items-center',
          'justify-center',
          'rounded-lg',
          'text-sm',
          'font-medium',
          'transition',
          'focus:outline-none',
          'focus:ring-2',
          'focus:ring-brand-500',
        ].join(' ');

        if (disabled) {
          day_button.disabled = true;
          day_button.classList.add('cursor-not-allowed', 'text-brand-300');
        } else {
          day_button.classList.add('text-brand-700', 'hover:bg-brand-100');
        }

        if (is_today && !disabled) {
          day_button.classList.add('ring-1', 'ring-brand-300', 'ring-inset');
        }

        if (mode === 'single') {
          if (single_date instanceof Date && is_same_day(day_date, single_date)) {
            day_button.classList.add('bg-brand-900', 'text-white', 'hover:bg-brand-900');
          }
        } else {
          if (start_date instanceof Date && is_same_day(day_date, start_date)) {
            day_button.classList.add('bg-brand-900', 'text-white', 'hover:bg-brand-900');
          }

          if (end_date instanceof Date && is_same_day(day_date, end_date)) {
            day_button.classList.add('bg-brand-900', 'text-white', 'hover:bg-brand-900');
          }

          if (
            start_date instanceof Date
            && end_date instanceof Date
            && is_between(day_date, start_date, end_date)
          ) {
            day_button.classList.add('bg-brand-100', 'text-brand-800');
          }
        }

        if (
          mode === 'range'
          && start_date instanceof Date
          && end_date === null
          && is_same_day(day_date, start_date)
        ) {
          day_button.classList.add('bg-brand-900', 'text-white', 'hover:bg-brand-900');
        }

        day_button.addEventListener('click', () => {
          if (disabled) {
            return;
          }

          if (mode === 'single') {
            single_date = day_date;
            sync_outputs();
            render_days();
            close_panel();
            return;
          }

          if (!(start_date instanceof Date) || end_date instanceof Date) {
            range_phase = 'end';
            start_date = day_date;
            end_date = null;
            sync_outputs();
            sync_range_status();
            render_days();
            return;
          }

          if (day_date.getTime() === start_date.getTime()) {
            end_date = new Date(day_date);
          } else if (day_date.getTime() < start_date.getTime()) {
            end_date   = start_date;
            start_date = day_date;
          } else {
            end_date = day_date;
          }

          sync_outputs();
          range_phase = 'start';
          sync_range_status();
          render_days();
        });

        days_node.appendChild(day_button);
      }
    };

    trigger_node.addEventListener('click', () => {
      if (is_open()) {
        close_panel();
        return;
      }

      open_panel();
      render_days();
    });

    pickdate_node.addEventListener('click', (event) => {
      event.stopPropagation();
    });

    prev_node.addEventListener('click', () => {
      view_date = new Date(view_date.getFullYear(), view_date.getMonth() - 1, 1);
      render_days();
    });

    next_node.addEventListener('click', () => {
      view_date = new Date(view_date.getFullYear(), view_date.getMonth() + 1, 1);
      render_days();
    });

    clear_node.addEventListener('click', () => {
      single_date = null;
      start_date  = null;
      end_date    = null;
      range_phase = 'start';
      sync_outputs();
      sync_range_status();
      render_days();
    });

    apply_node.addEventListener('click', () => {
      sync_outputs();
      close_panel();
    });

    document.addEventListener('click', (event) => {
      if (!is_open() || !(event.target instanceof Node)) {
        return;
      }

      if (pickdate_node.contains(event.target)) {
        return;
      }

      close_panel();
    });

    document.addEventListener('keydown', (event) => {
      if (event.key !== 'Escape' || !is_open()) {
        return;
      }

      close_panel();
      trigger_node.focus();
    });

    sync_outputs();
    sync_range_status();
    render_days();
  });
})();

(() => {
  /**
   * Picktime Controller
   * - Scope: every `[data-picktime]` instance.
   * - Responsibility: popover lifecycle, single/range hydration, 12h/24h formatting, and hidden input sync.
   * - Contract: each instance provides trigger/panel nodes and either single selectors or range selectors.
   */
  const picktime_nodes = Array.from(document.querySelectorAll('[data-picktime]'))
    .filter((picktime_node) => picktime_node instanceof HTMLElement);

  if (picktime_nodes.length === 0) {
    return;
  }

  const pad_value = (value) => String(value).padStart(2, '0');

  const parse_24h = (raw_value) => {
    const match = /^(\d{1,2}):(\d{2})$/.exec(raw_value.trim());

    if (!match) {
      return null;
    }

    const hours   = Number(match[1]);
    const minutes = Number(match[2]);

    if (
      !Number.isInteger(hours)
      || !Number.isInteger(minutes)
      || hours < 0
      || hours > 23
      || minutes < 0
      || minutes > 59
    ) {
      return null;
    }

    return {
      hours,
      minutes,
    };
  };

  const parse_12h = (raw_value) => {
    const match = /^(\d{1,2}):(\d{2})\s*(AM|PM)$/i.exec(raw_value.trim());

    if (!match) {
      return null;
    }

    const hours12 = Number(match[1]);
    const minutes = Number(match[2]);
    const period  = match[3].toUpperCase();

    if (
      !Number.isInteger(hours12)
      || !Number.isInteger(minutes)
      || hours12 < 1
      || hours12 > 12
      || minutes < 0
      || minutes > 59
    ) {
      return null;
    }

    let hours24 = hours12 % 12;
    if (period === 'PM') {
      hours24 += 12;
    }

    return {
      hours: hours24,
      minutes,
      period,
    };
  };

  const to_total_minutes = (hours, minutes) => (hours * 60) + minutes;

  const parse_time_value = (raw_value) => {
    const parsed_12h = parse_12h(raw_value);
    if (parsed_12h) {
      return to_total_minutes(parsed_12h.hours, parsed_12h.minutes);
    }

    const parsed_24h = parse_24h(raw_value);
    if (parsed_24h) {
      return to_total_minutes(parsed_24h.hours, parsed_24h.minutes);
    }

    return null;
  };

  const format_minutes = (total_minutes, format) => {
    const hours24 = Math.floor(total_minutes / 60);
    const minutes = total_minutes % 60;

    if (format === '24h') {
      return `${pad_value(hours24)}:${pad_value(minutes)}`;
    }

    const hours12 = hours24 % 12 === 0 ? 12 : hours24 % 12;
    const period  = hours24 >= 12 ? 'PM' : 'AM';
    return `${pad_value(hours12)}:${pad_value(minutes)} ${period}`;
  };

  picktime_nodes.forEach((picktime_node) => {
    const trigger_node       = picktime_node.querySelector('[data-picktime-trigger]');
    const display_node       = picktime_node.querySelector('[data-picktime-display]');
    const panel_node         = picktime_node.querySelector('[data-picktime-panel]');
    const caption_node       = picktime_node.querySelector('[data-picktime-caption]');
    const clear_node         = picktime_node.querySelector('[data-picktime-clear]');
    const apply_node         = picktime_node.querySelector('[data-picktime-apply]');
    const hour_node          = picktime_node.querySelector('[data-picktime-hour]');
    const minute_node        = picktime_node.querySelector('[data-picktime-minute]');
    const period_node        = picktime_node.querySelector('[data-picktime-period]');
    const value_node         = picktime_node.querySelector('[data-picktime-value]');
    const range_start_node   = picktime_node.querySelector('[data-picktime-range-start]');
    const range_end_node     = picktime_node.querySelector('[data-picktime-range-end]');
    const start_value_node   = picktime_node.querySelector('[data-picktime-start-value]');
    const end_value_node     = picktime_node.querySelector('[data-picktime-end-value]');
    const mode               = picktime_node.getAttribute('data-picktime-mode') === 'range' ? 'range' : 'single';
    const format             = picktime_node.getAttribute('data-picktime-format') === '24h' ? '24h' : '12h';
    const minute_step_value  = Number(picktime_node.getAttribute('data-picktime-minute-step')) || 15;
    const minute_step        = [1, 5, 10, 15, 30].includes(minute_step_value) ? minute_step_value : 15;
    const slot_values        = [];

    if (
      !(trigger_node instanceof HTMLButtonElement)
      || !(display_node instanceof HTMLInputElement)
      || !(panel_node instanceof HTMLElement)
      || !(caption_node instanceof HTMLElement)
      || !(clear_node instanceof HTMLButtonElement)
      || !(apply_node instanceof HTMLButtonElement)
    ) {
      return;
    }

    const close_panel = () => {
      panel_node.classList.add('hidden');
      trigger_node.setAttribute('aria-expanded', 'false');
    };

    const open_panel = () => {
      panel_node.classList.remove('hidden');
      trigger_node.setAttribute('aria-expanded', 'true');
    };

    for (let minute_value = 0; minute_value < 1440; minute_value += minute_step) {
      slot_values.push(minute_value);
    }

    if (mode === 'range') {
      if (
        !(range_start_node instanceof HTMLSelectElement)
        || !(range_end_node instanceof HTMLSelectElement)
        || !(start_value_node instanceof HTMLInputElement)
        || !(end_value_node instanceof HTMLInputElement)
      ) {
        return;
      }

      let start_total = parse_time_value((start_value_node.value || '').trim());
      let end_total   = parse_time_value((end_value_node.value || '').trim());

      if (!Number.isInteger(start_total)) {
        start_total = to_total_minutes(9, 0);
      }

      if (!Number.isInteger(end_total) || end_total < start_total) {
        end_total = start_total;
      }

      const build_range_options = () => {
        range_start_node.innerHTML = '';
        range_end_node.innerHTML = '';

        slot_values.forEach((slot_value) => {
          const start_option = document.createElement('option');
          start_option.value = String(slot_value);
          start_option.textContent = format_minutes(slot_value, format);
          range_start_node.appendChild(start_option);

          const end_option = document.createElement('option');
          end_option.value = String(slot_value);
          end_option.textContent = format_minutes(slot_value, format);
          range_end_node.appendChild(end_option);
        });
      };

      const apply_end_constraints = () => {
        const end_options = Array.from(range_end_node.options);

        end_options.forEach((option_node) => {
          const option_value = Number(option_node.value);
          option_node.disabled = option_value < start_total;
        });

        if (end_total < start_total) {
          end_total = start_total;
        }
      };

      const sync_range_selects = () => {
        range_start_node.value = String(start_total);
        range_end_node.value = String(end_total);
      };

      const sync_range_outputs = () => {
        start_value_node.value = format_minutes(start_total, format);
        end_value_node.value = format_minutes(end_total, format);
        display_node.value = `${format_minutes(start_total, format)} - ${format_minutes(end_total, format)}`;
        caption_node.textContent = format === '24h'
          ? 'Range format (24-hour)'
          : 'Range format (12-hour)';
      };

      build_range_options();
      apply_end_constraints();
      sync_range_selects();
      sync_range_outputs();

      range_start_node.addEventListener('change', () => {
        start_total = Number(range_start_node.value);

        if (!Number.isInteger(start_total)) {
          start_total = to_total_minutes(9, 0);
        }

        apply_end_constraints();
        sync_range_selects();
        sync_range_outputs();
      });

      range_end_node.addEventListener('change', () => {
        const next_end = Number(range_end_node.value);

        if (!Number.isInteger(next_end) || next_end < start_total) {
          end_total = start_total;
        } else {
          end_total = next_end;
        }

        apply_end_constraints();
        sync_range_selects();
        sync_range_outputs();
      });

      clear_node.addEventListener('click', () => {
        start_value_node.value = '';
        end_value_node.value = '';
        display_node.value = '';
        start_total = to_total_minutes(9, 0);
        end_total = start_total;
        apply_end_constraints();
        sync_range_selects();
      });

      apply_node.addEventListener('click', () => {
        start_total = Number(range_start_node.value);
        end_total = Number(range_end_node.value);

        if (!Number.isInteger(start_total)) {
          start_total = to_total_minutes(9, 0);
        }

        if (!Number.isInteger(end_total) || end_total < start_total) {
          end_total = start_total;
        }

        apply_end_constraints();
        sync_range_selects();
        sync_range_outputs();
        close_panel();
      });
    } else {
      if (
        !(hour_node instanceof HTMLSelectElement)
        || !(minute_node instanceof HTMLSelectElement)
        || !(value_node instanceof HTMLInputElement)
      ) {
        return;
      }

      let current_hours   = 9;
      let current_minutes = 0;

      const hydrate_options = () => {
        hour_node.innerHTML = '';
        minute_node.innerHTML = '';

        if (format === '24h') {
          for (let hour = 0; hour <= 23; hour += 1) {
            const option = document.createElement('option');
            option.value = String(hour);
            option.textContent = pad_value(hour);
            hour_node.appendChild(option);
          }
        } else {
          for (let hour = 1; hour <= 12; hour += 1) {
            const option = document.createElement('option');
            option.value = String(hour);
            option.textContent = pad_value(hour);
            hour_node.appendChild(option);
          }
        }

        for (let minute = 0; minute <= 59; minute += minute_step) {
          const option = document.createElement('option');
          option.value = String(minute);
          option.textContent = pad_value(minute);
          minute_node.appendChild(option);
        }
      };

      const sync_selects_from_state = () => {
        if (format === '24h') {
          hour_node.value = String(current_hours);
        } else {
          const hours12 = current_hours % 12 === 0 ? 12 : current_hours % 12;
          hour_node.value = String(hours12);

          if (period_node instanceof HTMLSelectElement) {
            period_node.value = current_hours >= 12 ? 'PM' : 'AM';
          }
        }

        const rounded_minutes = Math.round(current_minutes / minute_step) * minute_step;
        const safe_minutes    = rounded_minutes >= 60 ? 0 : rounded_minutes;
        minute_node.value = String(safe_minutes);
      };

      const get_state_from_selects = () => {
        const selected_hour   = Number(hour_node.value);
        const selected_minute = Number(minute_node.value);

        if (format === '24h') {
          current_hours = Number.isInteger(selected_hour) ? selected_hour : 0;
        } else {
          const selected_period = period_node instanceof HTMLSelectElement ? period_node.value : 'AM';
          const base_hour       = Number.isInteger(selected_hour) ? selected_hour : 12;
          const normalized_hour = base_hour % 12;

          current_hours = selected_period === 'PM' ? normalized_hour + 12 : normalized_hour;
        }

        current_minutes = Number.isInteger(selected_minute) ? selected_minute : 0;
      };

      const sync_outputs = () => {
        const formatted_value = format === '24h'
          ? `${pad_value(current_hours)}:${pad_value(current_minutes)}`
          : `${pad_value(current_hours % 12 === 0 ? 12 : current_hours % 12)}:${pad_value(current_minutes)} ${current_hours >= 12 ? 'PM' : 'AM'}`;

        value_node.value = formatted_value;
        display_node.value = formatted_value;
        caption_node.textContent = format === '24h' ? '24-hour format' : '12-hour format (AM/PM)';
      };

      const hydrate_from_initial_value = () => {
        const raw_value = (value_node.value || '').trim();
        const parsed_total = raw_value === '' ? null : parse_time_value(raw_value);

        if (Number.isInteger(parsed_total)) {
          current_hours = Math.floor(parsed_total / 60);
          current_minutes = parsed_total % 60;
        }

        sync_selects_from_state();
        sync_outputs();
      };

      hydrate_options();
      hydrate_from_initial_value();

      hour_node.addEventListener('change', () => {
        get_state_from_selects();
        sync_outputs();
      });

      minute_node.addEventListener('change', () => {
        get_state_from_selects();
        sync_outputs();
      });

      if (period_node instanceof HTMLSelectElement) {
        period_node.addEventListener('change', () => {
          get_state_from_selects();
          sync_outputs();
        });
      }

      clear_node.addEventListener('click', () => {
        value_node.value = '';
        display_node.value = '';
        current_hours = 9;
        current_minutes = 0;
        sync_selects_from_state();
      });

      apply_node.addEventListener('click', () => {
        get_state_from_selects();
        sync_outputs();
        close_panel();
      });
    }

    trigger_node.addEventListener('click', () => {
      if (panel_node.classList.contains('hidden')) {
        open_panel();
        return;
      }

      close_panel();
    });

    document.addEventListener('click', (event) => {
      if (panel_node.classList.contains('hidden') || !(event.target instanceof Node)) {
        return;
      }

      if (picktime_node.contains(event.target)) {
        return;
      }

      close_panel();
    });

    document.addEventListener('keydown', (event) => {
      if (event.key !== 'Escape' || panel_node.classList.contains('hidden')) {
        return;
      }

      close_panel();
      trigger_node.focus();
    });
  });
})();

(() => {
  /**
   * Stepper Controller
   * - Scope: every `[data-stepper]` instance.
   * - Responsibility: apply min/max/step guarded decrement and increment interactions.
   * - Contract: instance must include decrease/increase controls and a number field.
   */
  const stepper_nodes = document.querySelectorAll('[data-stepper]');

  if (stepper_nodes.length === 0) {
    return;
  }

  stepper_nodes.forEach((stepper_node) => {
    const decrease_button = stepper_node.querySelector('[data-stepper-decrease]');
    const increase_button = stepper_node.querySelector('[data-stepper-increase]');
    const number_input    = stepper_node.querySelector('[data-stepper-number]');

    if (
      !(decrease_button instanceof HTMLButtonElement)
      || !(increase_button instanceof HTMLButtonElement)
      || !(number_input instanceof HTMLInputElement)
    ) {
      return;
    }

    const step_value = Number(stepper_node.getAttribute('data-stepper-step')) || 1;
    const min_value  = Number(stepper_node.getAttribute('data-stepper-min'));
    const max_value  = Number(stepper_node.getAttribute('data-stepper-max'));

    const clamp_value = (value) => {
      let next_value = value;

      if (Number.isFinite(min_value)) {
        next_value = Math.max(next_value, min_value);
      }

      if (Number.isFinite(max_value)) {
        next_value = Math.min(next_value, max_value);
      }

      return next_value;
    };

    const parse_current_value = () => {
      const current_value = Number(number_input.value);
      return Number.isFinite(current_value) ? current_value : 0;
    };

    const set_value = (value) => {
      number_input.value = String(clamp_value(value));
    };

    decrease_button.addEventListener('click', () => {
      set_value(parse_current_value() - step_value);
    });

    increase_button.addEventListener('click', () => {
      set_value(parse_current_value() + step_value);
    });
  });
})();

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

(() => {
  /**
   * Pagination Controller
   * - Scope: every `[data-pagination]` instance.
   * - Responsibility: clamp page changes, rebuild visible page window, and sync range info.
   * - Contract: instance provides prev/next controls and a `[data-pagination-pages]` container.
   */
  const pagination_nodes = Array.from(document.querySelectorAll('[data-pagination]'))
    .filter((pagination_node) => pagination_node instanceof HTMLElement);

  if (pagination_nodes.length === 0) {
    return;
  }

  const to_number = (value, fallback = 0) => {
    const parsed_value = Number(value);
    return Number.isFinite(parsed_value) ? parsed_value : fallback;
  };

  const clamp = (value, minimum, maximum) => Math.min(Math.max(value, minimum), maximum);

  const build_page_tokens = (current_page, total_pages) => {
    if (total_pages <= 7) {
      return Array.from({ length: total_pages }, (_, index) => index + 1);
    }

    const window_start = Math.max(2, current_page - 1);
    const window_end   = Math.min(total_pages - 1, current_page + 1);
    const tokens       = [1];

    if (window_start > 2) {
      tokens.push('...');
    }

    for (let page_number = window_start; page_number <= window_end; page_number += 1) {
      tokens.push(page_number);
    }

    if (window_end < total_pages - 1) {
      tokens.push('...');
    }

    tokens.push(total_pages);

    return tokens;
  };

  pagination_nodes.forEach((pagination_node) => {
    const prev_button = pagination_node.querySelector('[data-pagination-prev]');
    const next_button = pagination_node.querySelector('[data-pagination-next]');
    const pages_node  = pagination_node.querySelector('[data-pagination-pages]');
    const range_node  = pagination_node.querySelector('[data-pagination-range]');
    const total_node  = pagination_node.querySelector('[data-pagination-total]');
    const live_node   = pagination_node.querySelector('[data-pagination-live]');

    if (
      !(prev_button instanceof HTMLButtonElement)
      || !(next_button instanceof HTMLButtonElement)
      || !(pages_node instanceof HTMLElement)
    ) {
      return;
    }

    const total_pages = Math.max(1, to_number(pagination_node.dataset.paginationTotalPages, 1));
    const total_items = Math.max(0, to_number(pagination_node.dataset.paginationTotalItems, 0));
    const per_page    = Math.max(1, to_number(pagination_node.dataset.paginationPerPage, 10));
    let current_page  = clamp(to_number(pagination_node.dataset.paginationCurrentPage, 1), 1, total_pages);

    const set_button_state = (button_node, is_disabled) => {
      button_node.disabled = is_disabled;
      button_node.classList.toggle('opacity-60', is_disabled);
      button_node.classList.toggle('pointer-events-none', is_disabled);
    };

    const update_range = () => {
      if (!(range_node instanceof HTMLElement)) {
        return;
      }

      const range_start = total_items > 0 ? ((current_page - 1) * per_page) + 1 : 0;
      const range_end   = total_items > 0 ? Math.min(current_page * per_page, total_items) : 0;

      range_node.textContent = `${range_start}-${range_end}`;

      if (total_node instanceof HTMLElement) {
        total_node.textContent = String(total_items);
      }
    };

    const create_page_button = (page_number) => {
      const is_current_page = page_number === current_page;
      const button_node     = document.createElement('button');
      const base_classes    = 'inline-flex h-[var(--ui-h-md)] min-w-10 items-center justify-center rounded-lg border px-3 text-sm font-semibold transition';
      const tone_classes    = is_current_page
        ? 'border-brand-900 bg-brand-900 text-white'
        : 'border-brand-200 bg-white text-brand-700 hover:border-brand-300 hover:text-brand-900';

      button_node.type = 'button';
      button_node.className = `${base_classes} ${tone_classes}`;
      button_node.dataset.paginationPage = String(page_number);
      button_node.setAttribute('aria-label', `Go to page ${page_number}`);
      button_node.textContent = String(page_number);

      if (is_current_page) {
        button_node.setAttribute('aria-current', 'page');
      }

      button_node.addEventListener('click', () => {
        set_page(page_number);
      });

      return button_node;
    };

    const create_ellipsis = () => {
      const ellipsis_node = document.createElement('span');
      ellipsis_node.className = 'inline-flex h-[var(--ui-h-md)] min-w-7 items-center justify-center px-1 text-sm text-brand-500';
      ellipsis_node.setAttribute('aria-hidden', 'true');
      ellipsis_node.textContent = '...';
      return ellipsis_node;
    };

    const render_pages = () => {
      const tokens = build_page_tokens(current_page, total_pages);
      const nodes  = tokens.map((token) => {
        return token === '...' ? create_ellipsis() : create_page_button(token);
      });

      pages_node.replaceChildren(...nodes);
    };

    const update_controls = () => {
      set_button_state(prev_button, current_page <= 1);
      set_button_state(next_button, current_page >= total_pages);
    };

    const announce_page = () => {
      if (!(live_node instanceof HTMLElement)) {
        return;
      }

      live_node.textContent = `Page ${current_page} of ${total_pages}`;
    };

    const set_page = (next_page) => {
      current_page = clamp(next_page, 1, total_pages);
      pagination_node.dataset.paginationCurrentPage = String(current_page);

      render_pages();
      update_controls();
      update_range();
      announce_page();
    };

    prev_button.addEventListener('click', () => {
      set_page(current_page - 1);
    });

    next_button.addEventListener('click', () => {
      set_page(current_page + 1);
    });

    set_page(current_page);
  });
})();

(() => {
  /**
   * Modal Controller
   * - Scope: every `[data-modal]` instance plus openers using `[data-modal-open]`.
   * - Responsibility: open/close lifecycle, backdrop dismissal, Escape close, and focus return.
   * - Contract: modal root has `id` and `[data-modal]`; close controls use `[data-modal-close]`.
   */
  const modal_nodes = Array.from(document.querySelectorAll('[data-modal]'))
    .filter((modal_node) => modal_node instanceof HTMLElement);
  const opener_nodes = Array.from(document.querySelectorAll('[data-modal-open]'))
    .filter((opener_node) => opener_node instanceof HTMLElement);

  if (modal_nodes.length === 0 || opener_nodes.length === 0) {
    return;
  }

  const modal_map = new Map();
  const last_focus_map = new Map();

  modal_nodes.forEach((modal_node) => {
    const modal_id = modal_node.id;

    if (modal_id === '') {
      return;
    }

    modal_node.classList.add('hidden');
    modal_node.setAttribute('aria-hidden', 'true');
    modal_map.set(modal_id, modal_node);

    const close_nodes = modal_node.querySelectorAll('[data-modal-close]');
    close_nodes.forEach((close_node) => {
      if (!(close_node instanceof HTMLElement)) {
        return;
      }

      close_node.addEventListener('click', () => {
        modal_node.classList.add('hidden');
        modal_node.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');

        const return_target = last_focus_map.get(modal_id);
        if (return_target instanceof HTMLElement) {
          return_target.focus();
        }

        opener_nodes.forEach((opener_node) => {
          if (opener_node.getAttribute('data-modal-target') === modal_id) {
            opener_node.setAttribute('aria-expanded', 'false');
          }
        });
      });
    });

    modal_node.addEventListener('click', (event) => {
      if (event.target !== modal_node) {
        return;
      }

      modal_node.classList.add('hidden');
      modal_node.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('overflow-hidden');

      const return_target = last_focus_map.get(modal_id);
      if (return_target instanceof HTMLElement) {
        return_target.focus();
      }

      opener_nodes.forEach((opener_node) => {
        if (opener_node.getAttribute('data-modal-target') === modal_id) {
          opener_node.setAttribute('aria-expanded', 'false');
        }
      });
    });
  });

  const close_all_modals = () => {
    modal_nodes.forEach((modal_node) => {
      if (modal_node.id === '') {
        return;
      }

      modal_node.classList.add('hidden');
      modal_node.setAttribute('aria-hidden', 'true');
    });

    opener_nodes.forEach((opener_node) => {
      opener_node.setAttribute('aria-expanded', 'false');
    });

    document.body.classList.remove('overflow-hidden');
  };

  opener_nodes.forEach((opener_node) => {
    const target_id = opener_node.getAttribute('data-modal-target') || '';

    if (!modal_map.has(target_id)) {
      return;
    }

    opener_node.setAttribute('aria-expanded', 'false');

    opener_node.addEventListener('click', (event) => {
      if (opener_node instanceof HTMLAnchorElement) {
        event.preventDefault();
      }

      close_all_modals();

      const target_modal = modal_map.get(target_id);
      if (!(target_modal instanceof HTMLElement)) {
        return;
      }

      last_focus_map.set(target_id, opener_node);
      target_modal.classList.remove('hidden');
      target_modal.setAttribute('aria-hidden', 'false');
      opener_node.setAttribute('aria-expanded', 'true');
      document.body.classList.add('overflow-hidden');

      const preferred_focus = target_modal.querySelector('[data-modal-close]');
      if (preferred_focus instanceof HTMLElement) {
        preferred_focus.focus();
      }
    });
  });

  document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') {
      return;
    }

    const open_modal = modal_nodes.find((modal_node) => {
      return !modal_node.classList.contains('hidden');
    });

    if (!(open_modal instanceof HTMLElement)) {
      return;
    }

    const open_modal_id = open_modal.id;
    open_modal.classList.add('hidden');
    open_modal.setAttribute('aria-hidden', 'true');
    document.body.classList.remove('overflow-hidden');

    opener_nodes.forEach((opener_node) => {
      if (opener_node.getAttribute('data-modal-target') === open_modal_id) {
        opener_node.setAttribute('aria-expanded', 'false');
      }
    });

    const return_target = last_focus_map.get(open_modal_id);
    if (return_target instanceof HTMLElement) {
      return_target.focus();
    }
  });
})();
