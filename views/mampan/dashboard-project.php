<?php

declare(strict_types=1);

$resolved_page_title                 = isset($page_title) ? (string) $page_title : 'Project Dashboard';
$resolved_page_current               = isset($page_current) ? (string) $page_current : 'consultant-projects';
$resolved_project_current            = isset($project_current) ? (string) $project_current : 'project-workspace';
$resolved_dashboard_content_max      = isset($dashboard_content_max) ? (string) $dashboard_content_max : 'max-w-7xl md:px-6';
$project_context_defaults            = consultant_project_context_defaults();
$provided_project_context            = isset($project_context) && is_array($project_context) ? $project_context : [];
$resolved_project_context            = array_merge($project_context_defaults, $provided_project_context);
$project_nav_links                   = consultant_project_nav_links($resolved_project_current);
$project_nav_primary_links           = [];
$project_nav_workflow_link           = null;
$project_nav_search                  = isset($project_nav_search) && is_array($project_nav_search) ? $project_nav_search : [];
$resolved_phase_data_map             = isset($phase_data_map) && is_array($phase_data_map) ? $phase_data_map : [];
$resolved_phase_label_map            = isset($phase_label_map) && is_array($phase_label_map) ? $phase_label_map : [];
$project_nav_search_enabled          = true;
$project_nav_search_action           = isset($project_nav_search['action']) ? trim((string) $project_nav_search['action']) : path('/mampan/consultant/documents/document-hub');
$project_nav_search_name             = isset($project_nav_search['name']) ? trim((string) $project_nav_search['name']) : 'requirement_search';
$project_nav_search_value            = isset($project_nav_search['value']) ? trim((string) $project_nav_search['value']) : '';
$project_nav_search_placeholder      = isset($project_nav_search['placeholder']) ? trim((string) $project_nav_search['placeholder']) : 'Search requirement, document, credit, or owner.';
$project_nav_search_label            = isset($project_nav_search['label']) ? trim((string) $project_nav_search['label']) : 'Search requirement, document, credit, or owner.';
$project_nav_search_hidden_inputs    = isset($project_nav_search['hidden_inputs']) && is_array($project_nav_search['hidden_inputs'])
  ? $project_nav_search['hidden_inputs']
  : [];
$project_nav_credit_matrix_links     = [
  ['code' => 'EE', 'label' => 'Energy Efficiency',                           'href' => path('/mampan/consultant/credits/credits-matrix#assessment-category-ee')],
  ['code' => 'EQ', 'label' => 'Indoor Environmental Quality',                'href' => path('/mampan/consultant/credits/credits-matrix#assessment-category-eq')],
  ['code' => 'SM', 'label' => 'Sustainable Site Planning & Management',      'href' => path('/mampan/consultant/credits/credits-matrix#assessment-category-sm')],
  ['code' => 'MR', 'label' => 'Material & Resources',                        'href' => path('/mampan/consultant/credits/credits-matrix#assessment-category-mr')],
  ['code' => 'WE', 'label' => 'Water Efficiency',                            'href' => path('/mampan/consultant/credits/credits-matrix#assessment-category-we')],
  ['code' => 'IN', 'label' => 'Innovation',                                  'href' => path('/mampan/consultant/credits/credits-matrix#assessment-category-in')],
];

foreach ($project_nav_links as $project_nav_link) {
  $project_nav_label = isset($project_nav_link['label']) ? trim((string) $project_nav_link['label']) : '';

  if (strcasecmp($project_nav_label, 'Workflow') === 0) {
    $project_nav_workflow_link = $project_nav_link;
    continue;
  }

  $project_nav_primary_links[] = $project_nav_link;
}

if ($project_nav_search_action === '') {
  $project_nav_search_action = path('/mampan/consultant/documents/document-hub');
}

if ($project_nav_search_name === '') {
  $project_nav_search_name = 'requirement_search';
}

if ($project_nav_search_value === '' && isset($_GET[$project_nav_search_name])) {
  $project_nav_search_value = trim((string) $_GET[$project_nav_search_name]);
}
$project_name                        = isset($resolved_project_context['project_name']) ? trim((string) $resolved_project_context['project_name']) : 'Project';
$project_code                        = isset($resolved_project_context['project_code']) ? trim((string) $resolved_project_context['project_code']) : '-';
$client_company                      = isset($resolved_project_context['client_company']) ? trim((string) $resolved_project_context['client_company']) : '-';
$project_location                    = isset($resolved_project_context['project_location']) ? trim((string) $resolved_project_context['project_location']) : '-';
$gbi_tool_type                       = isset($resolved_project_context['gbi_tool_type']) ? trim((string) $resolved_project_context['gbi_tool_type']) : '-';
$target_rating                       = isset($resolved_project_context['target_rating']) ? trim((string) $resolved_project_context['target_rating']) : '-';
$project_status                      = isset($resolved_project_context['project_status']) ? trim((string) $resolved_project_context['project_status']) : '-';
$consultant_lead                     = isset($resolved_project_context['consultant_lead']) ? trim((string) $resolved_project_context['consultant_lead']) : '-';
$client_pic                          = isset($resolved_project_context['client_pic']) ? trim((string) $resolved_project_context['client_pic']) : '-';

if ($resolved_phase_data_map === []) {
  $phase_data_path = __DIR__ . '/consultant/_data/phase_data.php';

  if (is_file($phase_data_path)) {
    require $phase_data_path;
    $resolved_phase_data_map = isset($phase_data_map) && is_array($phase_data_map) ? $phase_data_map : [];
    $resolved_phase_label_map = isset($phase_label_map) && is_array($phase_label_map) ? $phase_label_map : [];
  }
}

$resolved_current_phase = isset($current_phase) ? trim((string) $current_phase) : '';

if ($resolved_current_phase === '' && function_exists('resolve_mampan_current_phase')) {
  $resolved_current_phase = resolve_mampan_current_phase($resolved_phase_data_map);
}

if (!isset($resolved_phase_data_map[$resolved_current_phase])) {
  $resolved_current_phase = array_key_first($resolved_phase_data_map);
  $resolved_current_phase = $resolved_current_phase === null ? 'phase-1' : (string) $resolved_current_phase;
}

layout('mampan/partials/dashboard-start', [
  'page_title'            => $resolved_page_title,
  'page_current'          => $resolved_page_current,
  'dashboard_no_sidebar'  => true,
  'dashboard_content_max' => $resolved_dashboard_content_max,
]);
?>
<header class="project-header bg-white border-b border-brand-300" aria-label="Project Header">
  <div class="project-header__bio py-5 max-w-7xl mx-auto" aria-label="Project Bio">
    <div class="sm:flex flex-wrap items-center gap-4">
      <?php component('placeholder-image', ['aspect-ratio' => 'aspect-square rounded-md h-[50px] hiddens']); ?>
      <div class="space-y-2">
        <p class="leading-none text-xs font-semibold uppercase tracking-wide text-brand-500">
          <?= e($gbi_tool_type); ?> 
          <span class="font-light px-1">/</span> 
          <?= e($project_code); ?>
        </p>
        <h1 class="leading-none text-xl font-semibold text-brand-900 md:text-2xl"><?= e($project_name); ?></h1>
        <?php
        $current_phase = $resolved_current_phase;
        $phase_data_map = $resolved_phase_data_map;
        $phase_label_map = $resolved_phase_label_map;
        require __DIR__ . '/components/phase-selector.php';
        ?>
        <p class="leading-none flex items-center gap-2 hidden">
          <?php component('badge', [
            'items' => [
              ['label' => $project_status, 'tone' => 'warning'],
              ['label' => $target_rating, 'tone' => 'neutral'],
            ],
          ]); ?>
        </p>
      </div>
    </div>
  </div>
  <nav class="project-header__nav border-t border-brand-100" aria-label="Project Navigation">
    <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between py-4 max-w-7xl mx-auto relative">
      <div class="flex flex-wrap gap-4 divide-x divide-brand-300 -ml-4">
        <button
          type="button"
          class="inline-flex items-center font-semibold transition-colors pl-4 leading-4 text-brand-700 hover:text-primary-700 -my-1 js-project-header-search-toggle"
          aria-label="Toggle search"
          aria-controls="project-nav-search-panel"
          aria-expanded="false"
        >
          <?php icon('search-line', ['icon_size' => '20']); ?>
        </button>

        <?php foreach ($project_nav_primary_links as $link_item): ?>
          <?php
          $link_href = isset($link_item['href']) ? trim((string) $link_item['href']) : '#';
          $link_label = isset($link_item['label']) ? trim((string) $link_item['label']) : '';
          $link_active = isset($link_item['active']) && $link_item['active'] === true;
          $link_class = 'inline-flex items-center font-semibold transition-colors pl-4 leading-4';
          $link_class .= $link_active
            ? ' text-primary-700'
            : ' text-brand-700';
          ?>
          <?php if ($link_label !== ''): ?>
            <a
              href="<?= e($link_href); ?>"
              class="<?= e($link_class); ?>"
              <?= $link_active ? 'aria-current="page"' : ''; ?>
            >
              <?= e($link_label); ?>
            </a>

            <?php if (strcasecmp($link_label, 'Workspace') === 0): ?>
              <?php component('dropdown-navigation', [
                'dropdown_id'    => 'project-credit-matrix',
                'dropdown_label' => 'Credits Matrix',
                'dropdown_menu_class' => 'w-[360px] min-w-[360px]',
                'dropdown_links' => $project_nav_credit_matrix_links,
                'trigger_class'  => 'dropdown__trigger inline-flex items-center gap-1.5 font-semibold transition-colors pl-4 leading-4 text-brand-700 hover:text-primary-700',
              ]); ?>
            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <?php if (is_array($project_nav_workflow_link)): ?>
        <?php
        $workflow_href = isset($project_nav_workflow_link['href']) ? trim((string) $project_nav_workflow_link['href']) : '#';
        $workflow_label = isset($project_nav_workflow_link['label']) ? trim((string) $project_nav_workflow_link['label']) : '';
        $workflow_active = isset($project_nav_workflow_link['active']) && $project_nav_workflow_link['active'] === true;
        $workflow_class = 'inline-flex items-center border-l border-brand-300 pl-4 font-semibold transition-colors leading-4';
        $workflow_class .= $workflow_active
          ? ' text-primary-700'
          : ' text-brand-700';
        ?>
        <?php if ($workflow_label !== ''): ?>
          <a
            href="<?= e($workflow_href); ?>"
            class="<?= e($workflow_class); ?>"
            <?= $workflow_active ? 'aria-current="page"' : ''; ?>
          >
            <?= e($workflow_label); ?>
          </a>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($project_nav_search_enabled && $project_nav_search_action !== '' && $project_nav_search_name !== ''): ?>
        <form
          id="project-nav-search-panel"
          method="get"
          action="<?= e($project_nav_search_action); ?>"
          class="project-header__search absolute left-5 top-0 z-20 hidden mt-[10px] w-[calc(100%-2.5rem)] lg:w-[26rem] js-project-header-search-panel"
          aria-hidden="true"
        >
          <?php foreach ($project_nav_search_hidden_inputs as $hidden_name => $hidden_value): ?>
            <?php
            $hidden_name_resolved = trim((string) $hidden_name);

            if ($hidden_name_resolved === '') {
              continue;
            }
            ?>
            <input type="hidden" name="<?= e($hidden_name_resolved); ?>" value="<?= e((string) $hidden_value); ?>">
          <?php endforeach; ?>

          <label for="project-nav-search" class="sr-only"><?= e($project_nav_search_label); ?></label>
          <?php component('input', [
            'id'          => 'project-nav-search',
            'name'        => $project_nav_search_name,
            'placeholder' => $project_nav_search_placeholder,
            'value'       => $project_nav_search_value,
            'attributes'  => [
              'aria-label' => $project_nav_search_label,
            ],
          ]); ?>
        </form>
      <?php endif; ?>
    </div>
  </nav>
</header>
<script>
  (function () {
    var toggle_button = document.querySelector('.js-project-header-search-toggle');
    var search_panel = document.querySelector('.js-project-header-search-panel');

    if (!toggle_button || !search_panel) {
      return;
    }

    toggle_button.addEventListener('click', function () {
      var is_hidden = search_panel.classList.contains('hidden');
      search_panel.classList.toggle('hidden');
      toggle_button.setAttribute('aria-expanded', is_hidden ? 'true' : 'false');
      search_panel.setAttribute('aria-hidden', is_hidden ? 'false' : 'true');

      if (is_hidden) {
        var search_input = search_panel.querySelector('input');

        if (search_input) {
          search_input.focus();
        }
      }
    });
  })();
</script>
