const SEARCH_ICON_MARKUP = `
  <svg
    xmlns="http://www.w3.org/2000/svg"
    width="20"
    height="20"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round"
    aria-hidden="true"
    focusable="false"
  >
    <circle cx="11" cy="11" r="8"></circle>
    <path d="m21 21-4.3-4.3"></path>
  </svg>
`;

const set_loading_state = (mount_node, loading_message) => {
  mount_node.innerHTML = `
    <div class="table-data__loading rounded-md border border-brand-200 bg-white p-6 text-sm text-brand-700">
      <div class="animate-pulse">${loading_message}</div>
    </div>
  `;
};

const apply_table_data_theme = (mount_node) => {
  if (!(mount_node instanceof HTMLElement)) {
    return;
  }

  const is_fixed_header_enabled = mount_node.dataset.tableFixedHeader === 'true';
  const table_height = typeof mount_node.dataset.tableHeight === 'string' && mount_node.dataset.tableHeight.trim() !== ''
    ? mount_node.dataset.tableHeight.trim()
    : '360px';

  const container_node = mount_node.querySelector('.gridjs-container');
  const wrapper_node = mount_node.querySelector('.gridjs-wrapper');
  const head_node = mount_node.querySelector('.gridjs-head');
  const search_node = mount_node.querySelector('.gridjs-search');
  const search_input_node = mount_node.querySelector('.gridjs-search-input');
  const table_node = mount_node.querySelector('.gridjs-table');
  const footer_node = mount_node.querySelector('.gridjs-footer');
  const summary_node = mount_node.querySelector('.gridjs-summary');
  const pages_node = mount_node.querySelector('.gridjs-pages');
  const pagination_node = mount_node.querySelector('.gridjs-pagination');
  const tr_nodes = Array.from(mount_node.querySelectorAll('tr.gridjs-tr'));
  const th_nodes = Array.from(mount_node.querySelectorAll('th.gridjs-th'));
  const td_nodes = Array.from(mount_node.querySelectorAll('td.gridjs-td'));
  const pagination_buttons = Array.from(mount_node.querySelectorAll('.gridjs-pages button'));
  const sort_buttons = Array.from(mount_node.querySelectorAll('button.gridjs-sort'));
  const th_content_nodes = Array.from(mount_node.querySelectorAll('.gridjs-th .gridjs-th-content'));

  if (container_node instanceof HTMLElement) {
    container_node.classList.add('w-full', 'overflow-visible');
  }

  if (wrapper_node instanceof HTMLElement) {
    wrapper_node.className = is_fixed_header_enabled
      ? 'gridjs-wrapper w-full overflow-auto rounded-md border border-brand-200 bg-white'
      : 'gridjs-wrapper w-full overflow-x-auto overflow-y-visible rounded-md border border-brand-200 bg-white';

    if (is_fixed_header_enabled) {
      wrapper_node.style.maxHeight = table_height;
      wrapper_node.style.overflowY = 'auto';
      wrapper_node.style.overflowX = 'auto';
    } else {
      wrapper_node.style.maxHeight = '';
      wrapper_node.style.overflowY = 'visible';
      wrapper_node.style.overflowX = 'auto';
    }
  }

  if (head_node instanceof HTMLElement) {
    head_node.className = 'gridjs-head mb-4 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between';
  }

  if (search_node instanceof HTMLElement) {
    if (!(search_node.querySelector('.input-group__icon') instanceof HTMLElement)) {
      const icon_node = document.createElement('span');
      icon_node.className = 'input-group__icon pointer-events-none absolute inset-y-0 left-3 inline-flex items-center text-brand-500';
      icon_node.innerHTML = SEARCH_ICON_MARKUP;
      search_node.prepend(icon_node);
    }

    search_node.className = 'gridjs-search input-group relative w-full sm:w-[320px]';
  }

  if (search_input_node instanceof HTMLInputElement) {
    search_input_node.className = [
      'gridjs-search-input',
      'input-group__input',
      'w-full',
      'rounded-md',
      'text-brand-900',
      'h-[var(--ui-h-md)]',
      'text-sm',
      'pl-11',
      'px-[var(--ui-px-md)]',
      'bg-white',
      'ring-1',
      'ring-brand-300',
      'ring-inset',
      'placeholder:text-brand-400',
      'focus:outline-none',
      'focus:ring-2',
      'focus:ring-brand-500',
    ].join(' ');

    if (search_input_node.placeholder.trim() === '') {
      search_input_node.placeholder = 'Search records';
    }
  }

  if (table_node instanceof HTMLTableElement) {
    table_node.className = 'gridjs-table w-full border-collapse text-left text-sm text-brand-700';
  }

  th_nodes.forEach((th_node) => {
    const is_fixed_header_cell = is_fixed_header_enabled || th_node.classList.contains('gridjs-th-fixed');

    th_node.className = [
      'gridjs-th',
      'border-b-4',
      'border-brand-200',
      'bg-brand-100',
      'px-4',
      'py-3',
      'text-xs',
      'font-medium',
      'uppercase',
      'text-brand-700',
      'align-middle',
      'whitespace-nowrap',
      is_fixed_header_cell ? 'sticky top-0 left-0 right-0 z-20' : '',
    ].join(' ');
  });

  td_nodes.forEach((td_node) => {
    td_node.className = [
      'gridjs-td',
      'border-b',
      'border-brand-200',
      'px-4',
      'py-3',
      'align-middle',
      'text-brand-700',
    ].join(' ');
  });

  th_content_nodes.forEach((content_node) => {
    if (!(content_node instanceof HTMLElement)) {
      return;
    }

    content_node.style.float = 'left';
    content_node.style.width = 'calc(100% - 28px)';
    content_node.style.overflow = 'hidden';
    content_node.style.textOverflow = 'ellipsis';
    content_node.style.whiteSpace = 'nowrap';
  });

  tr_nodes.forEach((tr_node) => {
    tr_node.classList.add('transition-colors', 'hover:bg-brand-50');
  });

  if (footer_node instanceof HTMLElement) {
    footer_node.className = 'gridjs-footer mt-4 border-0 bg-transparent p-0';
  }

  if (summary_node instanceof HTMLElement) {
    summary_node.className = 'gridjs-summary text-sm text-brand-700';
  }

  if (pagination_node instanceof HTMLElement) {
    pagination_node.className = 'gridjs-pagination flex flex-wrap items-center justify-between gap-2';
  }

  if (pages_node instanceof HTMLElement) {
    pages_node.className = 'gridjs-pages inline-flex items-center gap-2';
  }

  pagination_buttons.forEach((button_node) => {
    if (!(button_node instanceof HTMLButtonElement)) {
      return;
    }

    button_node.className = [
      'btn',
      'btn--secondary',
      'btn--md',
      'inline-flex',
      'h-[var(--ui-h-md)]',
      'items-center',
      'justify-center',
      'rounded-md',
      'border',
      'leading-[var(--ui-h-md)]',
      'font-medium',
      'border-brand-300',
      'bg-white',
      'text-brand-900',
      'hover:bg-brand-50',
      'px-[var(--ui-px-md)]',
    ].join(' ');
  });

  const current_button = mount_node.querySelector('.gridjs-pages button.gridjs-currentPage');
  if (current_button instanceof HTMLButtonElement) {
    current_button.classList.remove(
      'btn--secondary',
      'border-brand-300',
      'bg-white',
      'text-brand-900',
      'hover:bg-brand-50',
    );
    current_button.classList.add(
      'btn--default',
      'border-brand-700',
      'bg-brand-700',
      'text-white',
      'hover:bg-brand-800',
    );
  }

  sort_buttons.forEach((sort_button) => {
    if (!(sort_button instanceof HTMLButtonElement)) {
      return;
    }

    const is_sort_asc = sort_button.classList.contains('gridjs-sort-asc');
    const is_sort_desc = sort_button.classList.contains('gridjs-sort-desc');

    sort_button.style.backgroundImage = 'none';
    sort_button.style.width = '20px';
    sort_button.style.height = '20px';
    sort_button.style.marginLeft = '8px';
    sort_button.style.opacity = '1';
    sort_button.style.float = 'right';
    sort_button.className = [
      'gridjs-sort',
      'inline-flex',
      'items-center',
      'justify-center',
      'text-brand-500',
      'hover:text-brand-700',
      'focus-visible:outline-none',
      'focus-visible:ring-2',
      'focus-visible:ring-brand-500',
      'focus-visible:ring-offset-1',
      'rounded',
    ].join(' ');

    if (is_sort_asc) {
      sort_button.textContent = '↑';
      return;
    }

    if (is_sort_desc) {
      sort_button.textContent = '↓';
      return;
    }

    sort_button.textContent = '↕';
  });
};

const watch_table_data_theme = (mount_node) => {
  if (!(mount_node instanceof HTMLElement)) {
    return;
  }

  let frame_id = 0;

  const observer = new MutationObserver(() => {
    if (frame_id !== 0) {
      return;
    }

    frame_id = window.requestAnimationFrame(() => {
      frame_id = 0;
      apply_table_data_theme(mount_node);
    });
  });

  observer.observe(mount_node, {
    childList: true,
    subtree: true,
    attributes: true,
    attributeFilter: ['class'],
  });
};

const build_rows = (rows, columns) => {
  return rows.map((row) => columns.map((column) => {
    if (!row || typeof row !== 'object') {
      return '';
    }

    const value = row[column.id];

    if (value && typeof value === 'object' && 'content' in value) {
      return String(value.content);
    }

    return value === null || typeof value === 'undefined' ? '' : String(value);
  }));
};

const resolve_columns = (columns) => {
  return columns.map((column, column_index) => {
    const column_name = typeof column.name === 'string' && column.name.trim() !== ''
      ? column.name.trim()
      : `Column ${column_index + 1}`;

    const column_id = typeof column.id === 'string' && column.id.trim() !== ''
      ? column.id.trim()
      : `column_${column_index + 1}`;
    const column_is_html = column && typeof column === 'object' && column.is_html === true;

    return {
      name: column_name,
      id: column_id,
      is_html: column_is_html,
    };
  });
};

const render_table_data = async (mount_node, grid_namespace) => {
  let component_config = {};
  try {
    component_config = JSON.parse(mount_node.dataset.tableDataConfig || '{}');
  } catch (error) {
    console.warn('Invalid table-data configuration.', error);
    component_config = {};
  }

  const api_url = typeof component_config.api_url === 'string'
    ? component_config.api_url.trim()
    : '';
  const columns = Array.isArray(component_config.columns)
    ? component_config.columns
    : [];
  const rows_key = typeof component_config.rows_key === 'string' && component_config.rows_key.trim() !== ''
    ? component_config.rows_key.trim()
    : 'data';
  const empty_message = typeof component_config.empty_message === 'string' && component_config.empty_message.trim() !== ''
    ? component_config.empty_message.trim()
    : 'No table data available.';
  const loading_message = typeof component_config.loading_message === 'string' && component_config.loading_message.trim() !== ''
    ? component_config.loading_message.trim()
    : 'Loading table data...';
  const table_height = typeof component_config.height === 'string' && component_config.height.trim() !== ''
    ? component_config.height.trim()
    : '360px';

  const search = component_config.search !== false;
  const sort = component_config.sort !== false;
  const fixed_header = component_config.fixed_header === true;
  const pagination_enabled = component_config.pagination !== false;
  const pagination_limit = Number.isInteger(component_config.pagination_limit) && component_config.pagination_limit > 0
    ? component_config.pagination_limit
    : 5;

  if (api_url === '' || columns.length === 0) {
    mount_node.textContent = empty_message;
    mount_node.dataset.gridMounted = 'true';
    return;
  }

  set_loading_state(mount_node, loading_message);
  mount_node.dataset.tableFixedHeader = fixed_header ? 'true' : 'false';
  mount_node.dataset.tableHeight = table_height;

  let response_rows = [];
  try {
    const response = await fetch(api_url, {
      headers: {
        Accept: 'application/json',
      },
    });

    if (!response.ok) {
      throw new Error(`Failed request: ${response.status}`);
    }

    const payload = await response.json();
    if (Array.isArray(payload)) {
      response_rows = payload;
    } else if (payload && typeof payload === 'object' && Array.isArray(payload[rows_key])) {
      response_rows = payload[rows_key];
    }
  } catch (error) {
    console.warn('Table data request failed.', error);
    response_rows = [];
  }

  const resolved_columns = resolve_columns(columns);
  const rows = build_rows(response_rows, resolved_columns);
  const column_definitions = resolved_columns.map((column, column_index) => {
    if (!column.is_html || typeof grid_namespace.html !== 'function') {
      return column.name;
    }

    return {
      name: column.name,
      formatter: (cell_value) => {
        const resolved_cell_value = cell_value === null || typeof cell_value === 'undefined'
          ? ''
          : String(cell_value);

        return grid_namespace.html(resolved_cell_value);
      },
      sort: {
        compare: (first_row, second_row) => {
          const first_value = first_row && Array.isArray(first_row.cells)
            ? String(first_row.cells[column_index]?.data ?? '')
            : '';
          const second_value = second_row && Array.isArray(second_row.cells)
            ? String(second_row.cells[column_index]?.data ?? '')
            : '';

          return first_value.localeCompare(second_value);
        },
      },
    };
  });

  mount_node.innerHTML = '';

  const table_grid = new grid_namespace.Grid({
    columns: column_definitions,
    data: rows,
    search,
    sort,
    fixedHeader: false,
    height: fixed_header ? table_height : undefined,
    pagination: pagination_enabled
      ? {
          enabled: true,
          limit: pagination_limit,
        }
      : false,
    language: {
      noRecordsFound: empty_message,
    },
  });

  table_grid.render(mount_node);
  apply_table_data_theme(mount_node);
  watch_table_data_theme(mount_node);
  mount_node.dataset.gridMounted = 'true';
};

const init_table_data = async () => {
  const grid_namespace = window.gridjs;
  if (!grid_namespace || typeof grid_namespace.Grid !== 'function') {
    return;
  }

  const mount_nodes = Array.from(document.querySelectorAll('.js-component-table-data'));
  if (mount_nodes.length === 0) {
    return;
  }

  await Promise.all(mount_nodes.map(async (mount_node) => {
    if (!(mount_node instanceof HTMLElement) || mount_node.dataset.gridMounted === 'true') {
      return;
    }

    await render_table_data(mount_node, grid_namespace);
  }));
};

document.addEventListener('DOMContentLoaded', () => {
  void init_table_data();
});
