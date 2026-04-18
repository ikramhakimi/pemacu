<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Table';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$render_component_html = static function (string $component_name, array $props = []): string {
  ob_start();
  component($component_name, $props);
  return (string) ob_get_clean();
};

$render_row_actions = static function (int $row_index): string {
  $trigger_id = 'table-row-actions-trigger-' . $row_index;
  $menu_id    = 'table-row-actions-menu-' . $row_index;

  ob_start();
  ?>
  <div class="flex items-center justify-end gap-2">
    <?php component('button', [
      'label'   => 'View',
      'variant' => 'default',
      'size'    => 'sm',
      'gradient' => true,
    ]); ?>

    <?php component('button', [
      'label'      => 'Edit booking',
      'variant'    => 'secondary',
      'size'       => 'sm',
      'icon_name'  => 'pencil-line',
      'icon_only'  => true,
      'aria_label' => 'Edit booking',
    ]); ?>

    <div class="dropdown relative inline-block" data-dropdown data-dropdown-align="right">
      <?php component('button', [
        'id'            => $trigger_id,
        'label'         => 'More actions',
        'variant'       => 'secondary',
        'size'          => 'sm',
        'icon_name'     => 'more-2-fill',
        'icon_only'     => true,
        'aria_label'    => 'More actions',
        'attributes'    => [
          'aria-haspopup'         => 'menu',
          'aria-expanded'         => 'false',
          'aria-controls'         => $menu_id,
          'data-dropdown-trigger' => true,
        ],
      ]); ?>

      <ul
        id="<?= e($menu_id); ?>"
        class="dropdown__menu absolute right-0 z-20 mt-2 hidden min-w-[180px] list-none rounded-lg border border-brand-200 bg-white p-1 shadow-lg"
        role="menu"
        aria-labelledby="<?= e($trigger_id); ?>"
        data-dropdown-menu
      >
        <li role="none">
          <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Reschedule</a>
        </li>
        <li role="none">
          <a class="dropdown__item flex rounded-md px-3 py-2 text-sm text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#" role="menuitem">Send reminder</a>
        </li>
        <li role="none">
          <button class="dropdown__item flex w-full rounded-md px-3 py-2 text-left text-sm text-negative-700 hover:bg-negative-50" type="button" role="menuitem">
            Cancel booking
          </button>
        </li>
      </ul>
    </div>
  </div>
  <?php

  return (string) ob_get_clean();
};

$default_spacing_rows = [
  [
    'guest' => [
      'content' => $render_component_html('avatar', [
        'items' => [[
          'initials' => 'AZ',
          'size'     => '40',
          'tone'     => 'brand',
        ]],
      ]),
      'is_html' => true,
    ],
    'contact' => '<p class="font-semibold text-brand-900">Aina Zulkifli</p><p class="text-brand-600">aina@aurorastudio.my</p>',
    'status'  => [
      'content' => $render_component_html('badge', [
        'label' => 'Confirmed',
        'tone'  => 'positive',
      ]),
      'is_html' => true,
      'align'   => 'center',
    ],
    'package' => 'Pre-Wedding Session',
    'total'   => 'RM 1,800',
    'actions' => [
      'content'   => $render_row_actions(1),
      'is_html'   => true,
      'class_name' => 'whitespace-nowrap',
    ],
  ],
  [
    'guest' => [
      'content' => $render_component_html('avatar', [
        'items' => [[
          'initials' => 'MR',
          'size'     => '40',
          'tone'     => 'primary',
        ]],
      ]),
      'is_html' => true,
    ],
    'contact' => '<p class="font-semibold text-brand-900">Mika Rahman</p><p class="text-brand-600">mika@northframe.co</p>',
    'status'  => [
      'content' => $render_component_html('badge', [
        'label' => 'Pending',
        'tone'  => 'warning',
      ]),
      'is_html' => true,
      'align'   => 'center',
    ],
    'package' => 'Corporate Portrait',
    'total'   => 'RM 950',
    'actions' => [
      'content'   => $render_row_actions(2),
      'is_html'   => true,
      'class_name' => 'whitespace-nowrap',
    ],
  ],
  [
    'guest' => [
      'content' => $render_component_html('avatar', [
        'items' => [[
          'initials' => 'SL',
          'size'     => '40',
          'tone'     => 'neutral',
        ]],
      ]),
      'is_html' => true,
    ],
    'contact' => '<p class="font-semibold text-brand-900">Siti Lim</p><p class="text-brand-600">siti@everlight.my</p>',
    'status'  => [
      'content' => $render_component_html('badge', [
        'label' => 'Needs Follow-up',
        'tone'  => 'attention',
      ]),
      'is_html' => true,
      'align'   => 'center',
    ],
    'package' => 'Engagement Shoot',
    'total'   => 'RM 1,250',
    'actions' => [
      'content'   => $render_row_actions(3),
      'is_html'   => true,
      'class_name' => 'whitespace-nowrap',
    ],
  ],
];

$alignment_rows = [
  [
    'service' => 'Portrait Session',
    'status'  => ['content' => 'Open', 'align' => 'center'],
    'revenue' => ['content' => 'RM 4,320', 'align' => 'right'],
  ],
  [
    'service' => 'Wedding Coverage',
    'status'  => ['content' => 'Limited', 'align' => 'center'],
    'revenue' => ['content' => 'RM 9,800', 'align' => 'right'],
  ],
  [
    'service' => 'Corporate Event',
    'status'  => ['content' => 'Closed', 'align' => 'center'],
    'revenue' => ['content' => 'RM 0', 'align' => 'right'],
  ],
];

$basic_rows = [
  [
    'name'      => 'Lead Follow-up',
    'owner'     => 'Nadia',
    'priority'  => 'High',
    'due_date'  => 'May 3, 2026',
  ],
  [
    'name'      => 'Portfolio Review',
    'owner'     => 'Farid',
    'priority'  => 'Medium',
    'due_date'  => 'May 5, 2026',
  ],
  [
    'name'      => 'Invoice Reminder',
    'owner'     => 'Aiman',
    'priority'  => 'Low',
    'due_date'  => 'May 7, 2026',
  ],
];

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/table',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'title'       => 'Table',
    'subtitle'    => 'Reference for mixed-content tabular layout, spacing density, alignment, and empty states.',
    'inner_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use semantic table structure for scannable data with fixed column meaning.</li>
      <li>Use <code>appearance="basic"</code> as the foundation, then move to <code>default</code> when container emphasis is needed.</li>
      <li>Use spacing density based on data complexity and reading comfort.</li>
      <li>Keep row actions grouped at the right edge to reduce visual noise.</li>
      <li>Always provide an explicit empty state when no rows are available.</li>
    </ul>
  </section>

  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">API Quick Reference</h2>
    <div class="rounded-md border border-dashed border-brand-300 bg-white p-5 text-sm text-brand-700">
      <p><code>columns</code>, <code>rows</code>, <code>appearance</code> (<code>basic</code> | <code>default</code>), <code>spacing</code> (<code>default</code> | <code>comfortable</code>), <code>caption</code>, <code>empty_title</code>, <code>empty_message</code>.</p>
      <p class="mt-2">Cell options: <code>content</code>, <code>is_html</code>, <code>align</code>, <code>class_name</code>.</p>
    </div>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Foundation: Basic Appearance</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Start from <code>basic</code> for minimal presentation without container background or outer border.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 p-5">
        <?php component('table', [
          'appearance' => 'basic',
          'columns'    => [
            ['label' => 'Task', 'key' => 'name'],
            ['label' => 'Owner', 'key' => 'owner'],
            ['label' => 'Priority', 'key' => 'priority'],
            ['label' => 'Due Date', 'key' => 'due_date', 'align' => 'right'],
          ],
          'rows'       => $basic_rows,
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Spacing + Alignment</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Compare <code>default</code> and <code>comfortable</code> spacing using the same <code>basic</code> table style.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-6 lg:grid-cols-2">
          <div class="space-y-3">
            <h4 class="text-base font-semibold text-brand-900">Basic + Default Spacing</h4>
            <?php component('table', [
              'appearance' => 'basic',
              'spacing'    => 'default',
              'columns'    => [
                ['label' => 'Service', 'key' => 'service', 'align' => 'left'],
                ['label' => 'Status', 'key' => 'status', 'align' => 'center'],
                ['label' => 'Projected Revenue', 'key' => 'revenue', 'align' => 'right'],
              ],
              'rows'       => $alignment_rows,
            ]); ?>
          </div>

          <div class="space-y-3">
            <h4 class="text-base font-semibold text-brand-900">Basic + Comfortable Spacing</h4>
            <?php component('table', [
              'appearance' => 'basic',
              'spacing'    => 'comfortable',
              'columns'    => [
                ['label' => 'Service', 'key' => 'service', 'align' => 'left'],
                ['label' => 'Status', 'key' => 'status', 'align' => 'center'],
                ['label' => 'Projected Revenue', 'key' => 'revenue', 'align' => 'right'],
              ],
              'rows'       => $alignment_rows,
            ]); ?>
          </div>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Empty State</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Empty tables should remain informative with a direct message and next-step cue.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('table', [
          'columns' => [
            ['label' => 'Guest', 'key' => 'guest'],
            ['label' => 'Status', 'key' => 'status', 'align' => 'center'],
            ['label' => 'Total', 'key' => 'total', 'align' => 'right'],
          ],
          'rows'          => [],
          'empty_title'   => 'No bookings yet',
          'empty_message' => 'When a booking is created, it will appear in this table.',
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Composition: Mixed Content</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use <code>default</code> appearance for richer table modules with avatar, badge, actions dropdown, and pagination.
      </p>
      <div class="mt-4 space-y-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('table', [
          'caption' => 'Recent booking activity',
          'columns' => [
            ['label' => 'Guest', 'key' => 'guest'],
            ['label' => 'Contact', 'key' => 'contact'],
            ['label' => 'Status', 'key' => 'status', 'align' => 'center'],
            ['label' => 'Package', 'key' => 'package'],
            ['label' => 'Total', 'key' => 'total', 'align' => 'right'],
            ['label' => 'Actions', 'key' => 'actions', 'align' => 'right'],
          ],
          'rows'    => array_map(static function (array $row): array {
            $row['contact'] = [
              'content' => (string) $row['contact'],
              'is_html' => true,
            ];
            return $row;
          }, $default_spacing_rows),
        ]); ?>

        <?php component('pagination', [
          'current_page' => 1,
          'per_page'     => 3,
          'total_items'  => 12,
          'show_info'    => true,
        ]); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
