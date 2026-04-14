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

