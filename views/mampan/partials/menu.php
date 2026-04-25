<?php

declare(strict_types=1);

/**
 * Mampan Sidebar Menu Configuration
 *
 * Override default dashboard_links() for mampan project.
 * Structure: label, href, icon_name, children[], active_key
 */

return [
  ['label' => 'Overview', 'href' => '/mampan', 'icon_name' => 'home-6-line'],
  [
    'label'     => 'Projects',
    'href'      => '#',
    'icon_name' => 'folder-3-line',
    'children'  => [
      ['label' => 'All Projects', 'href' => '/mampan/projects'],
      ['label' => 'Create New', 'href' => '/mampan/consultant/projects/create'],
    ],
  ],
  [
    'label'     => 'Reports',
    'href'      => '#',
    'icon_name' => 'file-chart-line',
    'children'  => [
      ['label' => 'Overview', 'href' => '/mampan/reports'],
      ['label' => 'Export', 'href' => '/mampan/consultant/reports/export'],
    ],
  ],
  ['section_label' => 'SETUP'],
  [
    'label'     => 'Settings',
    'href'      => '/mampan/settings',
    'icon_name' => 'settings-3-line',
  ],
  [
    'label'     => 'Team',
    'href'      => '#',
    'icon_name' => 'team-line',
    'children'  => [
      ['label' => 'Members', 'href' => '/mampan/team'],
      ['label' => 'Roles', 'href' => '/mampan/team/roles'],
    ],
  ],
];