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

