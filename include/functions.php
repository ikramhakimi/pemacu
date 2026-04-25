<?php

declare(strict_types=1);

if (!function_exists('str_contains')) {
  function str_contains(string $haystack, string $needle): bool
  {
    if ($needle === '') {
      return true;
    }

    return strpos($haystack, $needle) !== false;
  }
}

function e($value): string
{
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function base_path(): string
{
  if (defined('BASE_PATH')) {
    return BASE_PATH === '/' ? '' : rtrim(BASE_PATH, '/');
  }

  $script_name = $_SERVER['SCRIPT_NAME'] ?? '/';
  $script_dir  = dirname($script_name);

  if ($script_dir === '/' || $script_dir === '.') {
    return '';
  }

  return rtrim($script_dir, '/');
}

function path(string $uri): string
{
  $base = base_path();
  $uri  = '/' . ltrim($uri, '/');

  if ($uri === '/') {
    return $base === '' ? '/' : $base . '/';
  }

  return $base === '' ? $uri : $base . $uri;
}

function container(string $extra_class = ''): void
{
  $base_class  = 'container mx-auto max-w-6xl px-4';
  $extra_class = trim($extra_class);
  $class_name  = $extra_class === '' ? $base_class : $base_class . ' ' . $extra_class;

  echo e($class_name);
}

function card(string $extra_class = ''): void
{
  $base_class  = 'card rounded-lg border border-brand-200';
  $extra_class = trim($extra_class);
  $class_name  = $extra_class === '' ? $base_class : $base_class . ' ' . $extra_class;

  echo e($class_name);
}

function canvas_links(string $canvas_primary): array
{
  if ($canvas_primary === 'patterns') {
    return [
      ['href' => '#overview', 'label' => 'Overview'],
      ['href' => '#hero', 'label' => 'Hero'],
      ['href' => '#packages', 'label' => 'Packages'],
      ['href' => '#testimonials', 'label' => 'Testimonials'],
      ['href' => '#faq', 'label' => 'FAQ'],
      ['href' => '#cta', 'label' => 'CTA'],
    ];
  }

  return [
    ['href' => '/canvas/components', 'label' => 'Overview'],
    ['href' => '/canvas/components/accordion', 'label' => 'Accordion'],
    ['href' => '/canvas/components/alert', 'label' => 'Alert'],
    ['href' => '/canvas/components/avatar', 'label' => 'Avatar'],
    ['href' => '/canvas/components/badge', 'label' => 'Badge'],
    ['href' => '/canvas/components/button', 'label' => 'Button'],
    ['href' => '/canvas/components/carousel', 'label' => 'Carousel'],
    ['href' => '/canvas/components/carousel-advanced', 'label' => 'Carousel Advanced'],
    ['href' => '/canvas/components/checkbox', 'label' => 'Checkbox'],
    ['href' => '/canvas/components/input', 'label' => 'Input'],
    ['href' => '/canvas/components/input-group', 'label' => 'Input Group'],
    ['href' => '/canvas/components/textarea', 'label' => 'Textarea'],
    ['href' => '/canvas/components/radio', 'label' => 'Radio'],
    ['href' => '/canvas/components/rating', 'label' => 'Rating'],
    ['href' => '/canvas/components/select', 'label' => 'Select'],
    ['href' => '/canvas/components/breadcrumb', 'label' => 'Breadcrumb'],
    ['href' => '/canvas/components/cards', 'label' => 'Cards'],
    ['href' => '/canvas/components/dropdown', 'label' => 'Dropdown'],
    ['href' => '/canvas/components/drawer', 'label' => 'Drawer'],
    ['href' => '/canvas/components/empty-state', 'label' => 'Empty State'],
    ['href' => '/canvas/components/field', 'label' => 'Field'],
    ['href' => '/canvas/components/forms', 'label' => 'Forms'],
    ['href' => '/canvas/components/switch', 'label' => 'Switch'],
    ['href' => '/canvas/components/pick-date', 'label' => 'Pick Date'],
    ['href' => '/canvas/components/pick-time', 'label' => 'Pick Time'],
    ['href' => '/canvas/components/progressbar', 'label' => 'Progressbar'],
    ['href' => '/canvas/components/pagination', 'label' => 'Pagination'],
    ['href' => '/canvas/components/stats-card', 'label' => 'Stats Card'],
    ['href' => '/canvas/components/stepper', 'label' => 'Stepper'],
    ['href' => '/canvas/components/table', 'label' => 'Table'],
    ['href' => '/canvas/components/table-data', 'label' => 'Table Data'],
    ['href' => '/canvas/components/tabs', 'label' => 'Tabs'],
    ['href' => '/canvas/components/toast', 'label' => 'Toast'],
    ['href' => '/canvas/components/tooltip', 'label' => 'Tooltip'],
    ['href' => '/canvas/components/grids', 'label' => 'Grids'],
    ['href' => '/canvas/components/headers', 'label' => 'Headers'],
    ['href' => '/canvas/components/modal', 'label' => 'Modal'],
  ];
}

function dashboard_links(): array
{
  return [
    ['label' => 'Overview', 'href' => '#', 'icon_name' => 'home-6-line'],
    [
      'label'     => 'Sales',
      'href'      => '#',
      'icon_name' => 'money-dollar-circle-line',
      'children'  => [
        ['label' => 'Overview', 'href' => '#'],
        ['label' => 'Calendar', 'href' => '#'],
      ],
    ],
    [
      'label'     => 'Analytics',
      'href'      => '#',
      'icon_name' => 'bar-chart-box-line',
      'children'  => [
        ['label' => 'Overview', 'href' => path('/dashboard/analytics/overview')],
        ['label' => 'Pageviews', 'href' => path('/dashboard/analytics/pageviews')],
        ['label' => 'Sources', 'href' => path('/dashboard/analytics/sources')],
        ['label' => 'Campaigns', 'href' => path('/dashboard/analytics/campaigns')],
        ['label' => 'Clicks', 'href' => path('/dashboard/analytics/clicks')],
      ],
    ],
    [
      'label'     => 'Orders',
      'href'      => '#',
      'icon_name' => 'shopping-bag-3-line',
      'children'  => [
        ['label' => 'All Orders', 'href' => path('/dashboard/orders/all-orders')],
        ['label' => 'Unpaid Orders', 'href' => path('/dashboard/orders/unpaid-orders')],
        ['label' => 'Session Today', 'href' => path('/dashboard/orders/session-today')],
      ],
    ],
    [
      'label'     => 'Customers',
      'href'      => '#',
      'icon_name' => 'group-line',
      'children'  => [
        ['label' => 'All Customers', 'href' => '#'],
        ['label' => 'Segments', 'href' => '#'],
        ['label' => 'Customer Profile Form', 'href' => '#'],
      ],
    ],
    ['label' => 'Feedback', 'href' => '#', 'icon_name' => 'chat-smile-3-line'],
    ['section_label' => 'SETUP'],
    [
      'label'     => 'Website',
      'href'      => '#',
      'icon_name' => 'global-line',
      'children'  => [
        ['label' => 'Settings', 'href' => '#'],
        ['label' => 'Content', 'href' => '#'],
      ],
    ],
    [
      'label'     => 'Packages',
      'href'      => '#',
      'icon_name' => 'price-tag-3-line',
      'children'  => [
        ['label' => 'All Packages', 'href' => '#'],
        ['label' => 'Create Package', 'href' => path('/dashboard/packages/create-package')],
      ],
    ],
    [
      'label'     => 'Portfolio',
      'href'      => '#',
      'icon_name' => 'image-line',
      'children'  => [
        ['label' => 'All Portfolio', 'href' => '#'],
        ['label' => 'Create Portfolio', 'href' => '#'],
        ['label' => 'Trashed', 'href' => '#'],
      ],
    ],
    ['label' => 'Payment Gateway', 'href' => '#', 'icon_name' => 'secure-payment-line'],
    [
      'label'     => 'Users',
      'href'      => '#',
      'icon_name' => 'account-circle-line',
      'children'  => [
        ['label' => 'All Users', 'href' => '#'],
        ['label' => 'Create User', 'href' => '#'],
      ],
    ],
  ];
}

function consultant_global_sidebar_links(): array
{
  $views_root = __DIR__ . '/../views/mampan/consultant';
  $routes     = [
    'consultant-dashboard'  => ['label' => 'Dashboard',      'icon_name' => 'home-6-line',            'route' => '/mampan/consultant/dashboard',  'file' => '/dashboard.php'],
    'consultant-projects'   => ['label' => 'Projects',       'icon_name' => 'folder-3-line',          'route' => '/mampan/consultant/projects',   'file' => '/projects/index.php'],
    'consultant-documents'  => ['label' => 'Documents',      'icon_name' => 'file-list-3-line',       'route' => '/mampan/consultant/documents',  'file' => '/documents/index.php'],
    'consultant-rfi'        => ['label' => 'Clarifications', 'icon_name' => 'question-answer-line',   'route' => '/mampan/consultant/rfi',        'file' => '/rfi/index.php'],
    'consultant-evidence'   => ['label' => 'Evidence',       'icon_name' => 'file-shield-2-line',     'route' => '/mampan/consultant/evidence',   'file' => '/evidence/index.php'],
    'consultant-reports'    => ['label' => 'Reports',        'icon_name' => 'file-chart-line',        'route' => '/mampan/consultant/reports',    'file' => '/reports/index.php'],
    'consultant-submission' => ['label' => 'Submission',     'icon_name' => 'send-plane-2-line',      'route' => '/mampan/consultant/submission', 'file' => '/submission/index.php'],
    'client-dashboard'      => ['label' => 'Client Portal',  'icon_name' => 'user-star-line',         'route' => '/mampan/client/dashboard',      'file' => '/../client/dashboard.php'],
  ];
  $links      = [];

  foreach ($routes as $active_key => $route_item) {
    $file_path = $views_root . $route_item['file'];

    $links[] = [
      'label'      => $route_item['label'],
      'href'       => is_file($file_path) ? path($route_item['route']) : '#',
      'icon_name'  => $route_item['icon_name'],
      'active_key' => $active_key,
    ];
  }

  return $links;
}

function client_global_sidebar_links(): array
{
  $views_root = __DIR__ . '/../views/mampan/client';
  $routes     = [
    'client-dashboard'     => ['label' => 'Dashboard',     'icon_name' => 'home-6-line',          'route' => '/mampan/client/dashboard',     'file' => '/dashboard.php'],
    'client-actions'       => ['label' => 'My Actions',    'icon_name' => 'task-line',            'route' => '/mampan/client/actions',       'file' => '/actions.php'],
    'client-upload-center' => ['label' => 'Upload Center', 'icon_name' => 'upload-cloud-2-line',  'route' => '/mampan/client/upload-center', 'file' => '/upload-center.php'],
    'client-clarifications' => ['label' => 'Clarifications', 'icon_name' => 'question-answer-line', 'route' => '/mampan/client/clarifications', 'file' => '/clarifications.php'],
    'client-reports'       => ['label' => 'Reports',       'icon_name' => 'file-chart-line',      'route' => '/mampan/client/reports',       'file' => '/reports.php'],
    'client-signoff'       => ['label' => 'Sign-off',      'icon_name' => 'checkbox-circle-line', 'route' => '/mampan/client/signoff',       'file' => '/signoff.php'],
  ];
  $links      = [];

  foreach ($routes as $active_key => $route_item) {
    $file_path = $views_root . $route_item['file'];

    $links[] = [
      'label'      => $route_item['label'],
      'href'       => is_file($file_path) ? path($route_item['route']) : '#',
      'icon_name'  => $route_item['icon_name'],
      'active_key' => $active_key,
    ];
  }

  return $links;
}

function consultant_project_context_defaults(): array
{
  return [
    'project_name'     => 'Menara Harmoni Office Retrofit',
    'project_code'     => 'GBI-NRNC-2026-014',
    'client_company'   => 'Harmoni Asset Holdings Berhad',
    'project_location' => 'Jalan Tun Razak, Kuala Lumpur',
    'gbi_tool_type'    => 'GBI NRNC: Existing Building',
    'target_rating'    => 'GBI Gold',
    'project_status'   => 'Evidence Collection',
    'consultant_lead'  => 'Ir. Aisyah Kamaruddin',
    'client_pic'       => 'Faizal Rahman (Head of Projects)',
  ];
}

function consultant_project_nav_links(string $project_current = ''): array
{
  $nav_items = [
    'project-workspace'  => ['label' => 'Workspace',      'href' => path('/mampan/consultant/projects/project-workspace')],
    'project-documents'  => ['label' => 'Documents',      'href' => path('/mampan/consultant/documents/document-hub')],
    'project-rfi'        => ['label' => 'Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index')],
    'project-evidence'   => ['label' => 'Evidence',       'href' => path('/mampan/consultant/evidence/evidence-index')],
    'project-reports'    => ['label' => 'Reports',        'href' => path('/mampan/consultant/reports/gap-analysis-report')],
    'project-submission' => ['label' => 'Submission',     'href' => path('/mampan/consultant/submission/submission-package')],
  ];
  $links     = [];

  foreach ($nav_items as $active_key => $nav_item) {
    $links[] = [
      'label'  => $nav_item['label'],
      'href'   => $nav_item['href'],
      'active' => $project_current !== '' && $project_current === $active_key,
    ];
  }

  return $links;
}

function dashboard_breadcrumb_items(array $dashboard_sidebar, string $request_uri_path): array
{
  $normalize_path = static function (string $path): string {
    $path = trim($path);

    if ($path === '') {
      return '/';
    }

    $path = '/' . ltrim($path, '/');
    $path = rtrim($path, '/');

    return $path === '' ? '/' : $path;
  };

  $home_href = path('/dashboard');
  $home_item = ['label' => 'Home', 'href' => $home_href];
  $target_path = $normalize_path($request_uri_path);

  foreach ($dashboard_sidebar as $item) {
    if (!is_array($item)) {
      continue;
    }

    $item_label = isset($item['label']) ? trim((string) $item['label']) : '';
    $item_href  = isset($item['href']) ? trim((string) $item['href']) : '';
    $children   = isset($item['children']) && is_array($item['children']) ? $item['children'] : [];

    if ($item_label === '') {
      continue;
    }

    foreach ($children as $child_item) {
      if (!is_array($child_item)) {
        continue;
      }

      $child_label = isset($child_item['label']) ? trim((string) $child_item['label']) : '';
      $child_href  = isset($child_item['href']) ? trim((string) $child_item['href']) : '';

      if ($child_label === '' || $child_href === '' || $child_href === '#') {
        continue;
      }

      if ($normalize_path($child_href) !== $target_path) {
        continue;
      }

      $items = [$home_item];

      if ($item_href !== '' && $item_href !== '#') {
        $items[] = ['label' => $item_label, 'href' => $item_href];
      } else {
        $items[] = ['label' => $item_label];
      }

      $items[] = ['label' => $child_label, 'current' => true];

      return $items;
    }

    if ($item_href === '' || $item_href === '#') {
      continue;
    }

    if ($normalize_path($item_href) !== $target_path) {
      continue;
    }

    return [
      $home_item,
      ['label' => $item_label, 'current' => true],
    ];
  }

  return [
    $home_item,
    ['label' => 'Overview', 'current' => true],
  ];
}

function button_class(array $options = []): string
{
  $tone      = isset($options['tone']) ? (string) $options['tone'] : 'default';
  $size      = isset($options['size']) ? (string) $options['size'] : 'md';
  $disabled  = isset($options['disabled']) ? (bool) $options['disabled'] : false;
  $icon_only = isset($options['icon_only']) ? (bool) $options['icon_only'] : false;
  $extra     = isset($options['extra']) ? trim((string) $options['extra']) : '';

  $allowed_tones = ['default', 'primary', 'secondary', 'positive', 'negative'];
  $allowed_sizes = ['sm', 'md', 'lg', 'xl'];

  if (!in_array($tone, $allowed_tones, true)) {
    $tone = 'default';
  }

  if (!in_array($size, $allowed_sizes, true)) {
    $size = 'md';
  }

  $size_tokens = [
    'sm' => [
      'height'  => 'h-[var(--ui-h-sm)]',
      'leading' => 'leading-[var(--ui-h-sm)]',
      'padding' => 'px-[var(--ui-px-sm)]',
      'text'    => 'text-sm',
      'width'   => 'w-[var(--ui-h-sm)]',
    ],
    'md' => [
      'height'  => 'h-[var(--ui-h-md)]',
      'leading' => 'leading-[var(--ui-h-md)]',
      'padding' => 'px-[var(--ui-px-md)]',
      'text'    => '',
      'width'   => 'w-[var(--ui-h-md)]',
    ],
    'lg' => [
      'height'  => 'h-[var(--ui-h-lg)]',
      'leading' => 'leading-[var(--ui-h-lg)]',
      'padding' => 'px-[var(--ui-px-lg)]',
      'text'    => 'text-base',
      'width'   => 'w-[var(--ui-h-lg)]',
    ],
    'xl' => [
      'height'  => 'h-[var(--ui-h-xl)]',
      'leading' => 'leading-[var(--ui-h-xl)]',
      'padding' => 'px-[var(--ui-px-xl)]',
      'text'    => 'text-lg',
      'width'   => 'w-[var(--ui-h-xl)]',
    ],
  ];

  $tone_tokens = [
    'default' => [
      'disabled' => 'border-transparent bg-brand-400 text-white',
      'gradient' => 'border-brand-900 bg-gradient-to-b from-brand-600 to-brand-800 text-white',
    ],
    'primary' => [
      'disabled' => 'border-transparent bg-primary-400 text-white',
      'gradient' => 'border-primary-700 bg-gradient-to-b from-primary-500 to-primary-700 text-white',
    ],
    'secondary' => [
      'disabled' => 'border-transparent bg-brand-200 text-brand-400',
      'gradient' => 'border-brand-300 bg-gradient-to-b from-white to-brand-100 text-brand-900',
    ],
    'positive' => [
      'disabled' => 'border-transparent bg-positive-300 text-white',
      'gradient' => 'border-positive-600 bg-gradient-to-b from-positive-500 to-positive-600 text-white',
    ],
    'negative' => [
      'disabled' => 'border-transparent bg-negative-300 text-white',
      'gradient' => 'border-negative-600 bg-gradient-to-b from-negative-500 to-negative-600 text-white',
    ],
  ];

  $tone_state = $disabled
    ? $tone_tokens[$tone]['disabled']
    : $tone_tokens[$tone]['gradient'];

  $classes = [
    'inline-flex',
    'items-center',
    'justify-center',
    'rounded-md',
    'border',
    $size_tokens[$size]['height'],
    $size_tokens[$size]['leading'],
    'font-medium',
    $tone_state,
  ];

  if ($icon_only) {
    $classes[] = $size_tokens[$size]['width'];
  } else {
    $classes[] = $size_tokens[$size]['padding'];

    if ($size_tokens[$size]['text'] !== '') {
      $classes[] = $size_tokens[$size]['text'];
    }
  }

  if ($extra !== '') {
    $classes[] = $extra;
  }

  return implode(' ', array_filter($classes));
}

function button_options_from_variant_size(string $variant_size = 'md/default'): array
{
  $resolved_size = 'md';
  $resolved_tone = 'default';
  $resolved_pair = trim($variant_size);

  if ($resolved_pair !== '') {
    if (str_contains($resolved_pair, '/')) {
      [$raw_size, $raw_tone] = explode('/', $resolved_pair, 2);
      $resolved_size = trim($raw_size) !== '' ? trim($raw_size) : 'md';
      $resolved_tone = trim($raw_tone) !== '' ? trim($raw_tone) : 'default';
    } else {
      $resolved_size = $resolved_pair;
    }
  }

  return [
    'size' => $resolved_size,
    'tone' => $resolved_tone,
  ];
}

function button(string $variant_size = 'md/default', string $extra_class = ''): void
{
  $resolved_options = button_options_from_variant_size($variant_size);

  echo e(button_class([
    'size'  => $resolved_options['size'],
    'tone'  => $resolved_options['tone'],
    'extra' => $extra_class,
  ]));
}

function button_gradient(string $variant_size = 'md/default', string $extra_class = ''): void
{
  $resolved_options = button_options_from_variant_size($variant_size);

  echo e(button_class([
    'size'  => $resolved_options['size'],
    'tone'  => $resolved_options['tone'],
    'extra' => $extra_class,
  ]));
}

function capture_button(array $options = []): string
{
  ob_start();
  component('button', $options);
  return (string) ob_get_clean();
}

function button_capture(): callable
{
  return static function (array $options = []): string {
    return capture_button($options);
  };
}

function capture_checkbox(array $options = []): string
{
  ob_start();
  component('checkbox', $options);
  return (string) ob_get_clean();
}

function checkbox_capture(): callable
{
  return static function (array $options = []): string {
    return capture_checkbox($options);
  };
}

function capture_input(array $options = []): string
{
  ob_start();
  component('input', $options);
  return (string) ob_get_clean();
}

function input_capture(): callable
{
  return static function (array $options = []): string {
    return capture_input($options);
  };
}

function capture_input_group(array $options = []): string
{
  ob_start();
  component('input-group', $options);
  return (string) ob_get_clean();
}

function input_group_capture(): callable
{
  return static function (array $options = []): string {
    return capture_input_group($options);
  };
}

function capture_radio(array $options = []): string
{
  ob_start();
  component('radio', $options);
  return (string) ob_get_clean();
}

function radio_capture(): callable
{
  return 'capture_radio';
}

function capture_rating(array $options = []): string
{
  ob_start();
  component('rating', $options);
  return (string) ob_get_clean();
}

function rating_capture(): callable
{
  return static function (array $options = []): string {
    return capture_rating($options);
  };
}

function capture_select(array $options = []): string
{
  ob_start();
  component('select', $options);
  return (string) ob_get_clean();
}

function select_capture(): callable
{
  return static function (array $options = []): string {
    return capture_select($options);
  };
}

function capture_textarea(array $options = []): string
{
  ob_start();
  component('textarea', $options);
  return (string) ob_get_clean();
}

function textarea_capture(): callable
{
  return static function (array $options = []): string {
    return capture_textarea($options);
  };
}

function build_component_class(string $component_name, array $states = []): string
{
  $component_key = $component_name;

  if (str_contains($component_key, '/')) {
    $component_key = basename($component_key);
  }

  $segments = explode('-', $component_key, 2);
  $block    = $segments[0] ?: 'component';
  $modifier = $segments[1] ?? null;

  $classes = [$block];

  if ($modifier !== null && $modifier !== '') {
    $classes[] = $block . '--' . $modifier;
  }

  foreach ($states as $state => $enabled) {
    if ($enabled) {
      $classes[] = $block . '--' . $state;
    }
  }

  return implode(' ', array_unique($classes));
}

function component(string $component_name, array $data = []): void
{
  $components_root = __DIR__ . '/../views/components';
  $mampan_components_root = __DIR__ . '/../views/mampan/components';
  $component_key   = trim(str_replace('\\', '/', $component_name), '/');

  if ($component_key === '' || str_contains($component_key, '..')) {
    throw new RuntimeException('Component not found: ' . $component_name);
  }

  $component_candidates = [];

  if (
    strpos($component_key, 'project/') === 0
    || strpos($component_key, 'documents/') === 0
    || strpos($component_key, 'rfi/') === 0
    || strpos($component_key, 'evidence/') === 0
    || strpos($component_key, 'reports/') === 0
    || strpos($component_key, 'submission/') === 0
    || strpos($component_key, 'client/') === 0
  ) {
    $component_candidates[] = $mampan_components_root . '/' . $component_key . '.php';
  }

  $component_candidates[] = $components_root . '/' . $component_key . '.php';

  $component_path = '';

  foreach ($component_candidates as $component_candidate) {
    if (is_file($component_candidate)) {
      $component_path = $component_candidate;
      break;
    }
  }

  if ($component_path === '') {
    throw new RuntimeException('Component not found: ' . $component_name);
  }

  $states          = isset($data['states']) && is_array($data['states']) ? $data['states'] : [];
  $component_class = build_component_class($component_key, $states);
  $component_props = $data;

  extract($data, EXTR_SKIP);
  require $component_path;
}

function theme_component(string $component_name, array $data = []): void
{
  $theme_key     = active_theme();
  $components_root = __DIR__ . '/../views/themes/' . $theme_key . '/components';
  $component_key = trim(str_replace('\\', '/', $component_name), '/');

  if ($component_key === '' || str_contains($component_key, '..')) {
    throw new RuntimeException('Theme component not found: ' . $component_name);
  }

  $component_candidates = [
    $components_root . '/' . $component_key . '.php',
  ];
  $component_path = '';

  foreach ($component_candidates as $component_candidate) {
    if (is_file($component_candidate)) {
      $component_path = $component_candidate;
      break;
    }
  }

  if ($component_path === '') {
    throw new RuntimeException('Theme component not found: ' . $component_name);
  }

  extract($data, EXTR_SKIP);
  require $component_path;
}

function set_active_theme(string $theme_name): void
{
  $resolved_theme_name = trim($theme_name);

  if ($resolved_theme_name === '' || preg_match('/^[a-z0-9_-]+$/i', $resolved_theme_name) !== 1) {
    $resolved_theme_name = 'core';
  }

  $GLOBALS['active_theme'] = strtolower($resolved_theme_name);
}

function active_theme(): string
{
  $active_theme = isset($GLOBALS['active_theme']) ? (string) $GLOBALS['active_theme'] : 'core';

  if ($active_theme === '' || preg_match('/^[a-z0-9_-]+$/i', $active_theme) !== 1) {
    return 'core';
  }

  return strtolower($active_theme);
}

function layout(string $layout_name, array $data = []): void
{
  $layout_key = trim(str_replace('\\', '/', $layout_name), '/');
  $theme_key  = active_theme();

  if ($layout_key === '' || str_contains($layout_key, '..')) {
    throw new RuntimeException('Layout not found: ' . $layout_name);
  }

  $layout_candidates = [
    __DIR__ . '/../views/themes/' . $theme_key . '/layouts/' . $layout_key . '.php',
    __DIR__ . '/../views/' . $layout_key . '.php',
    __DIR__ . '/../views/themes/core/layouts/' . $layout_key . '.php',
    __DIR__ . '/../views/layout/' . $layout_key . '.php',
  ];
  $layout_path = '';

  foreach ($layout_candidates as $layout_candidate) {
    if (is_file($layout_candidate)) {
      $layout_path = $layout_candidate;
      break;
    }
  }

  if ($layout_path === '') {
    throw new RuntimeException('Layout not found: ' . $layout_name);
  }

  extract($data, EXTR_SKIP);
  require $layout_path;
}

function section(string $section_name, array $data = []): void
{
  $section_key = trim(str_replace('\\', '/', $section_name), '/');
  $theme_key   = active_theme();

  if ($section_key === '' || str_contains($section_key, '..')) {
    throw new RuntimeException('Section not found: ' . $section_name);
  }

  $section_candidates = [
    __DIR__ . '/../views/themes/' . $theme_key . '/sections/' . $section_key . '.php',
    __DIR__ . '/../views/sections/' . $section_key . '.php',
    __DIR__ . '/../views/themes/core/sections/' . $section_key . '.php',
  ];
  $section_path = '';

  foreach ($section_candidates as $section_candidate) {
    if (is_file($section_candidate)) {
      $section_path = $section_candidate;
      break;
    }
  }

  if ($section_path === '') {
    throw new RuntimeException('Section not found: ' . $section_name);
  }

  $states        = isset($data['states']) && is_array($data['states']) ? $data['states'] : [];
  $section_class = build_component_class($section_key, $states);

  extract($data, EXTR_SKIP);
  require $section_path;
}

function partial(string $partial_name, array $data = []): void
{
  $partial_key = trim(str_replace('\\', '/', $partial_name), '/');
  $theme_key   = active_theme();

  if ($partial_key === '' || str_contains($partial_key, '..')) {
    throw new RuntimeException('Partial not found: ' . $partial_name);
  }

  $partial_candidates = [
    __DIR__ . '/../views/themes/' . $theme_key . '/partials/' . $partial_key . '.php',
    __DIR__ . '/../views/themes/core/partials/' . $partial_key . '.php',
    __DIR__ . '/../views/partials/' . $partial_key . '.php',
  ];
  $partial_path = '';

  foreach ($partial_candidates as $partial_candidate) {
    if (is_file($partial_candidate)) {
      $partial_path = $partial_candidate;
      break;
    }
  }

  if ($partial_path === '') {
    throw new RuntimeException('Partial not found: ' . $partial_name);
  }

  extract($data, EXTR_SKIP);
  require $partial_path;
}

function icon(string $icon_name, array $data = []): void
{
  $resolved_icon_name = trim($icon_name);

  if ($resolved_icon_name === '') {
    throw new InvalidArgumentException('Icon name cannot be empty.');
  }

  $data['icon_name'] = $resolved_icon_name;
  component('icon', $data);
}
