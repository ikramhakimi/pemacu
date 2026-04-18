const init_dashboard_users_grid = () => {
  const grid_namespace = window.gridjs;
  if (!grid_namespace || typeof grid_namespace.Grid !== 'function') {
    return;
  }

  const grid_mount = document.querySelector('#dashboard-users-grid');
  const grid_data_element = document.querySelector('#dashboard-users-grid-data');

  if (!grid_mount || !grid_data_element || grid_mount.dataset.gridMounted === 'true') {
    return;
  }

  let users_rows = [];
  try {
    users_rows = JSON.parse(grid_data_element.textContent || '[]');
  } catch (error) {
    console.warn('Invalid dashboard users grid data.', error);
    users_rows = [];
  }

  const users_grid = new grid_namespace.Grid({
    columns: [
      { name: 'User' },
      { name: 'Email' },
      { name: 'Status' },
      { name: 'Bookings' },
      { name: 'Revenue' },
    ],
    data: users_rows,
    sort: true,
    search: true,
    pagination: {
      enabled: true,
      limit: 5,
    },
    className: {
      table: 'dashboard-grid-table',
    },
  });

  users_grid.render(grid_mount);
  grid_mount.dataset.gridMounted = 'true';
};

document.addEventListener('DOMContentLoaded', init_dashboard_users_grid);
