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

