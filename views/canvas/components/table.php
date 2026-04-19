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

$render_table_action = static function (string $label): string {
  ob_start();
  ?>
  <div class="flex items-center justify-end gap-2">
    <?php component('button', [
      'label'   => 'View',
      'variant' => 'default',
      'size'    => 'sm',
    ]); ?>
    <?php component('button', [
      'label'     => $label,
      'variant'   => 'secondary',
      'size'      => 'sm',
      'icon_name' => 'pencil-line',
      'icon_only' => true,
    ]); ?>
  </div>
  <?php

  return (string) ob_get_clean();
};

$pipeline_headers = [
  ['label' => 'Company', 'key' => 'company'],
  ['label' => 'Stage', 'key' => 'stage', 'align' => 'center'],
  ['label' => 'MRR', 'key' => 'mrr', 'align' => 'right'],
  ['label' => 'Owner', 'key' => 'owner'],
];

$pipeline_data = [
  [
    'company' => 'Northlane Health',
    'stage'   => 'Discovery',
    'mrr'     => '$2,400',
    'owner'   => 'Nora',
  ],
  [
    'company' => 'Atlas Retail',
    'stage'   => 'Proposal',
    'mrr'     => '$5,900',
    'owner'   => 'Imran',
  ],
  [
    'company' => 'SignalLabs',
    'stage'   => 'Negotiation',
    'mrr'     => '$7,200',
    'owner'   => 'Evelyn',
  ],
];

$customer_health_headers = [
  ['label' => 'Account', 'key' => 'account'],
  ['label' => 'Primary Contact', 'key' => 'contact'],
  ['label' => 'Health', 'key' => 'health', 'align' => 'center'],
  ['label' => 'Plan', 'key' => 'plan'],
  ['label' => 'Actions', 'key' => 'actions', 'align' => 'right'],
];

$customer_health_data = [
  [
    'account' => [
      'content' => $render_component_html('avatar', [
        'items' => [[
          'initials' => 'NH',
          'size'     => '40',
          'tone'     => 'brand',
        ]],
      ]),
      'is_html' => true,
    ],
    'contact' => '<p class="font-semibold text-brand-900">Nadia Hassan</p><p class="text-brand-600">nadia@northlane.io</p>',
    'health' => [
      'content' => $render_component_html('badge', [
        'label' => 'Healthy',
        'tone'  => 'positive',
      ]),
      'is_html' => true,
      'align'   => 'center',
    ],
    'plan' => 'Growth Annual',
    'actions' => [
      'content'   => $render_table_action('Edit account'),
      'is_html'   => true,
      'class_name' => 'whitespace-nowrap',
    ],
  ],
  [
    'account' => [
      'content' => $render_component_html('avatar', [
        'items' => [[
          'initials' => 'AR',
          'size'     => '40',
          'tone'     => 'primary',
        ]],
      ]),
      'is_html' => true,
    ],
    'contact' => '<p class="font-semibold text-brand-900">Ariq Rahim</p><p class="text-brand-600">ariq@atlasretail.com</p>',
    'health' => [
      'content' => $render_component_html('badge', [
        'label' => 'At Risk',
        'tone'  => 'warning',
      ]),
      'is_html' => true,
      'align'   => 'center',
    ],
    'plan' => 'Scale Monthly',
    'actions' => [
      'content'   => $render_table_action('Edit account'),
      'is_html'   => true,
      'class_name' => 'whitespace-nowrap',
    ],
  ],
  [
    'account' => [
      'content' => $render_component_html('avatar', [
        'items' => [[
          'initials' => 'SL',
          'size'     => '40',
          'tone'     => 'neutral',
        ]],
      ]),
      'is_html' => true,
    ],
    'contact' => '<p class="font-semibold text-brand-900">Sophia Lim</p><p class="text-brand-600">sophia@signallabs.ai</p>',
    'health' => [
      'content' => $render_component_html('badge', [
        'label' => 'Needs Review',
        'tone'  => 'attention',
      ]),
      'is_html' => true,
      'align'   => 'center',
    ],
    'plan' => 'Enterprise',
    'actions' => [
      'content'   => $render_table_action('Edit account'),
      'is_html'   => true,
      'class_name' => 'whitespace-nowrap',
    ],
  ],
];

$billing_headers = [
  ['label' => 'Invoice', 'key' => 'invoice'],
  ['label' => 'Status', 'key' => 'status', 'align' => 'center'],
  ['label' => 'Amount', 'key' => 'amount', 'align' => 'right'],
];

$billing_data = [
  [
    'invoice' => 'INV-24081',
    'status'  => [
      'content' => $render_component_html('badge', [
        'label' => 'Paid',
        'tone'  => 'positive',
      ]),
      'is_html' => true,
    ],
    'amount'  => '$1,400',
  ],
  [
    'invoice' => 'INV-24082',
    'status'  => [
      'content' => $render_component_html('badge', [
        'label' => 'Due Soon',
        'tone'  => 'warning',
      ]),
      'is_html' => true,
    ],
    'amount'  => '$980',
  ],
  [
    'invoice' => 'INV-24083',
    'status'  => [
      'content' => $render_component_html('badge', [
        'label' => 'Overdue',
        'tone'  => 'negative',
      ]),
      'is_html' => true,
    ],
    'amount'  => '$620',
  ],
];

$empty_headers = [
  ['label' => 'Workspace', 'key' => 'workspace'],
  ['label' => 'Owner', 'key' => 'owner'],
  ['label' => 'Seats', 'key' => 'seats', 'align' => 'right'],
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
    'header_title'           => 'Table',
    'header_subtitle'        => 'Reference for API-driven SaaS data tables with semantic structure, alignment, and empty states.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Table Base
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('table', [
            'appearance' => 'basic',
            'headers'    => $pipeline_headers,
            'data'       => $pipeline_data,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Table A
      </div>
      <div class="relative flex min-h-[240px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('table', [
            'headers' => $pipeline_headers,
            'data'    => $pipeline_data,
            'caption' => 'Sales pipeline snapshot',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Table B
      </div>
      <div class="relative flex min-h-[280px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('table', [
            'headers' => $billing_headers,
            'data'    => $billing_data,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Table C
      </div>
      <div class="relative flex min-h-[280px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('table', [
            'appearance' => 'basic',
            'spacing'    => 'comfortable',
            'headers'    => $billing_headers,
            'data'       => $billing_data,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Table D
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-4xl">
          <?php component('table', [
            'headers' => $customer_health_headers,
            'data'    => array_map(static function (array $row): array {
              $row['contact'] = [
                'content' => (string) $row['contact'],
                'is_html' => true,
              ];

              return $row;
            }, $customer_health_data),
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Table E
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-3xl">
          <?php component('table', [
            'appearance'    => 'basic',
            'headers'       => $empty_headers,
            'data'          => [],
            'empty_title'   => 'No workspaces found',
            'empty_message' => 'Create your first workspace to start inviting your team.',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
