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

    const tab_active_class = grid_node.getAttribute('data-picktime-grid-tab-active-class')
      || 'picktime__tab tabs__item inline-flex w-full items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors bg-brand-900 text-white';
    const tab_inactive_class = grid_node.getAttribute('data-picktime-grid-tab-inactive-class')
      || 'picktime__tab tabs__item inline-flex w-full items-center justify-center rounded-md px-4 py-2 text-sm font-medium transition-colors text-brand-700 hover:bg-brand-100';

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

