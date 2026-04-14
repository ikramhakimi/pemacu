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

