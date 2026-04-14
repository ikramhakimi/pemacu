<?php

declare(strict_types=1);

$page_title   = 'Assessment';
$page_current = 'dashboard';

layout('dashboard/partials/dashboard-start', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'dashboard_no_sidebar' => true,
]);
?>
<style>
  .assessment-table th:first-child,
  .assessment-table td:first-child {
    border-left: 0;
  }

  .assessment-table th:last-child,
  .assessment-table td:last-child {
    border-right: 0;
  }
  .assessment-table > thead > tr > th {
    text-transform: uppercase;
    font-size: 12px;
  }
  .assessment-table > thead > tr > th:first-child,
  .assessment-table > tbody > tr > td:first-child {
    border-left: 0;
    padding-left: 16px;
  }

  .assessment-table > thead > tr > th:last-child,
  .assessment-table > tbody > tr > td:last-child,
  .assessment-table > tfoot > tr > td:last-child {
    border-right: 0;
    padding-right: 16px;
    width: 40%;
  }

  .assessment-table > tbody tbody td {
    border-bottom: 0;
  }

  .assessment-table > tbody > tr:hover {
    background-color: oklch(98.5% 0.002 247.839);
  }

  .assessment-table > thead > tr > th:nth-child(2),
  .assessment-table > tbody > tr > td:nth-child(2),
  .assessment-table > tfoot > tr > td:nth-child(2) {
    border-right: 0;
  }

  .assessment-table > thead > tr > th:nth-child(3),
  .assessment-table > tbody > tr > td:nth-child(3):not(.font-semibold) {
    border-left: 0;
  }

  .assessment-table > tbody > tr > td[colspan="2"] table > tbody > tr > td:first-child {
    border-right: 0;
  }

  .assessment-table > tbody > tr > td[colspan="2"] table > tbody > tr > td:nth-child(2) {
    border-left: 0;
  }

</style>
<article class="app-article max-w-7xl mx-auto">
  <header class="border-b border-brand-200 pb-6">
    <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Sustainability</p>
    <h1 class="mt-2 text-3xl font-semibold leading-tight text-brand-900">Assessment Scorecard</h1>
    <p class="mt-2 max-w-3xl text-sm text-brand-600">
      Track progress across 6 sustainability categories with a combined score of 100 points.
    </p>
  </header>

  <section class="mt-8" aria-labelledby="assessment-summary-heading">
    <h2 id="assessment-summary-heading" class="sr-only">Assessment summary</h2>

    <article class="assessment-project-info rounded-lg border border-brand-200 bg-white" aria-labelledby="assessment-project-info-heading">
      <header class="mb-5">
        <h2 id="assessment-project-info-heading" class="text-2xl font-semibold text-brand-900">Project Information</h2>
        <p class="mt-1 text-sm text-brand-600">Fill in project and consultant details before proceeding with scoring.</p>
      </header>

      <form class="divide-y divide-brand-200" action="#" method="post">
        <section class="grid grid-cols-6 p-6 gap-10 space-y-2">
          <div class="col-span-2">
            <p class="text-xl font-semibold text-brand-900">Project Overview</p>
            <p class="mt-1 text-sm text-brand-500">Provide basic project information for record-keeping and reporting purposes.</p> 
          </div>
          <div class="col-span-4 grid grid-cols-1 gap-4 md:grid-cols-2">
            <?php component('form/field', [
              'label'       => 'Project Name',
              'helper_text' => 'Use the official project title shown in submission documents.',
              'class'           => 'md:col-span-2 space-y-2',
              'input_props' => [
                'name'        => 'project_name',
                'placeholder' => 'Enter project name',
                'required'    => true,
              ],
            ]); ?>

            <?php component('form/field', [
              'label'       => 'Project Address',
              'helper_text' => 'Include lot, street, and city for site verification.',
              'class'           => 'md:col-span-2 space-y-2',
              'input_props' => [
                'name'        => 'project_address',
                'placeholder' => 'Enter project address',
              ],
            ]); ?>

            <?php component('form/field', [
              'label'       => 'Postcode',
              'class'       => 'space-y-2',
              'input_props' => [
                'name'        => 'postcode',
                'placeholder' => 'e.g. 50450',
              ],
            ]); ?>

            <?php component('form/field', [
              'label'           => 'State',
              'input_component' => 'select',
              'class'           => 'space-y-2',
              'input_props'     => [
                'name'    => 'state',
                'options' => [
                  ['label' => 'Select state', 'value' => '', 'selected' => true],
                  ['label' => 'Johor', 'value' => 'johor'],
                  ['label' => 'Kedah', 'value' => 'kedah'],
                  ['label' => 'Kelantan', 'value' => 'kelantan'],
                  ['label' => 'Kuala Lumpur', 'value' => 'kuala_lumpur'],
                  ['label' => 'Labuan', 'value' => 'labuan'],
                  ['label' => 'Melaka', 'value' => 'melaka'],
                  ['label' => 'Negeri Sembilan', 'value' => 'negeri_sembilan'],
                  ['label' => 'Pahang', 'value' => 'pahang'],
                  ['label' => 'Penang', 'value' => 'penang'],
                  ['label' => 'Perak', 'value' => 'perak'],
                  ['label' => 'Perlis', 'value' => 'perlis'],
                  ['label' => 'Putrajaya', 'value' => 'putrajaya'],
                  ['label' => 'Sabah', 'value' => 'sabah'],
                  ['label' => 'Sarawak', 'value' => 'sarawak'],
                  ['label' => 'Selangor', 'value' => 'selangor'],
                  ['label' => 'Terengganu', 'value' => 'terengganu'],
                ],
              ],
            ]); ?>

            <?php component('form/field', [
              'label'           => 'Building Description',
              'helper_text'     => 'Describe building type, use, and scope details.',
              'input_component' => 'textarea',
              'class'           => 'md:col-span-2 space-y-2',
              'input_props'     => [
                'name'        => 'building_description',
                'rows'        => 5,
                'placeholder' => 'Describe building type, use, and key details',
              ],
            ]); ?>
          </div>
        </section>

        <section class="grid grid-cols-6 p-6 gap-10 space-y-2">
          <div class="col-span-2">
            <p class="text-xl font-semibold text-brand-900">Project Overview</p>
            <p class="mt-1 text-sm text-brand-500">Provide basic project information for record-keeping and reporting purposes.</p> 
          </div>
          <div class="col-span-4 grid grid-cols-1 gap-4 md:grid-cols-2">
          </div>
        </section>







        <section class="space-y-4">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-brand-500"></h3>
          <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <?php component('form/field', [
              'label'       => 'Applicant',
              'class'       => 'space-y-2',
              'input_props' => [
                'name'        => 'applicant',
                'placeholder' => 'Enter applicant name',
              ],
            ]); ?>

            <?php component('form/field', [
              'label'       => 'Contact Person',
              'class'       => 'space-y-2',
              'input_props' => [
                'name'        => 'contact_person',
                'placeholder' => 'Enter contact person name',
              ],
            ]); ?>
          </div>
        </section>

        <section class="space-y-4">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-brand-500">Project Team</h3>
          <div class="space-y-4">
            <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Core Consultant</p>
            <div class="grid grid-cols-1 gap-4">
              <?php component('form/field', [
                'label'       => 'Architect',
                'class'       => 'space-y-2 md:max-w-[75%]',
                'input_props' => [
                  'name'        => 'architect',
                  'placeholder' => 'Enter architect',
                ],
              ]); ?>
            </div>

            <div class="border-t border-dashed border-brand-300"></div>

            <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Engineers</p>
            <div class="grid grid-cols-1 gap-4">
              <?php component('form/field', [
                'label'       => 'Civil Engineer',
                'class'       => 'space-y-2 md:max-w-[75%]',
                'input_props' => [
                  'name'        => 'civil_engineer',
                  'placeholder' => 'Enter civil engineer',
                ],
              ]); ?>

              <?php component('form/field', [
                'label'       => 'Structural Engineer',
                'class'       => 'space-y-2 md:max-w-[75%]',
                'input_props' => [
                  'name'        => 'structural_engineer',
                  'placeholder' => 'Enter structural engineer',
                ],
              ]); ?>

              <?php component('form/field', [
                'label'       => 'Mechanical Engineer',
                'class'       => 'space-y-2 md:max-w-[75%]',
                'input_props' => [
                  'name'        => 'mechanical_engineer',
                  'placeholder' => 'Enter mechanical engineer',
                ],
              ]); ?>

              <?php component('form/field', [
                'label'       => 'Electrical Engineer',
                'class'       => 'space-y-2 md:max-w-[75%]',
                'input_props' => [
                  'name'        => 'electrical_engineer',
                  'placeholder' => 'Enter electrical engineer',
                ],
              ]); ?>
            </div>

            <div class="border-t border-dashed border-brand-300"></div>

            <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Surveyors & Specialists</p>
            <div class="grid grid-cols-1 gap-4">
              <?php component('form/field', [
                'label'       => 'Quantity Surveyor',
                'class'       => 'space-y-2 md:max-w-[75%]',
                'input_props' => [
                  'name'        => 'quantity_surveyor',
                  'placeholder' => 'Enter quantity surveyor',
                ],
              ]); ?>

              <?php component('form/field', [
                'label'       => 'Land Surveyor',
                'class'       => 'space-y-2 md:max-w-[75%]',
                'input_props' => [
                  'name'        => 'land_surveyor',
                  'placeholder' => 'Enter land surveyor',
                ],
              ]); ?>

              <?php component('form/field', [
                'label'       => 'Landscape Consultant',
                'class'       => 'space-y-2 md:max-w-[75%]',
                'input_props' => [
                  'name'        => 'landscape_consultant',
                  'placeholder' => 'Enter landscape consultant',
                ],
              ]); ?>

              <?php component('form/field', [
                'label'           => 'Other Specialist Consultant(s)',
                'input_component' => 'textarea',
                'class'           => 'space-y-2 md:max-w-[75%]',
                'input_props'     => [
                  'name'        => 'other_specialist_consultants',
                  'rows'        => 4,
                  'placeholder' => 'List other specialist consultants',
                ],
              ]); ?>
            </div>
          </div>
        </section>

        <section class="space-y-4">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-brand-500">Authority & Contractor</h3>
          <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <?php component('form/field', [
              'label'       => 'Local Authority',
              'class'       => 'space-y-2',
              'input_props' => [
                'name'        => 'local_authority',
                'placeholder' => 'Enter local authority',
              ],
            ]); ?>

            <?php component('form/field', [
              'label'       => 'Main Contractor',
              'class'       => 'space-y-2',
              'input_props' => [
                'name'        => 'main_contractor',
                'placeholder' => 'Enter main contractor',
              ],
            ]); ?>
          </div>
        </section>

        <section class="space-y-4">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-brand-500">Project Specifications</h3>
          <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <?php component('form/field', [
              'label'       => 'Total Gross Floor Area',
              'helper_text' => 'Use the latest approved GFA value for this submission.',
              'class'       => 'space-y-2',
              'input_props' => [
                'name'        => 'total_gross_floor_area',
                'placeholder' => 'e.g. 12500 m²',
              ],
            ]); ?>

            <?php component('form/field', [
              'label'       => 'Land Area (for landed property)',
              'class'       => 'space-y-2',
              'input_props' => [
                'name'        => 'land_area_landed_property',
                'placeholder' => 'e.g. 18000 m²',
              ],
            ]); ?>
          </div>
        </section>
      </form>
    </article>

    <article class="rounded-lg border border-brand-200 bg-white p-6">
      <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Total Score</p>
      <p class="mt-2 text-3xl font-semibold text-brand-900">67 / 100</p>
      <p class="mt-1 text-sm text-brand-600">Current achieved points across all categories.</p>
    </article>

    <div class="mt-6 flex flex-wrap items-center justify-end gap-6">
      <?php component('form/checkbox', [
        'id'      => 'assessment-theme-toggle',
        'name'    => 'assessment-theme-toggle',
        'label'   => 'Color Mode',
        'checked' => false,
      ]); ?>
      <?php component('form/checkbox', [
        'id'      => 'assessment-description-toggle',
        'name'    => 'assessment-description-toggle',
        'label'   => 'Hide Details',
        'checked' => false,
      ]); ?>
      <?php component('form/checkbox', [
        'id'      => 'assessment-full-width-toggle',
        'name'    => 'assessment-full-width-toggle',
        'label'   => 'Full Width',
        'checked' => false,
      ]); ?>
      <?php component('form/checkbox', [
        'id'      => 'assessment-compact-toggle',
        'name'    => 'assessment-compact-toggle',
        'label'   => 'Compact',
        'checked' => false,
      ]); ?>
    </div>

    <?php
    $assessment_widgets = [
      [
        'widget_state'          => 'positive',
        'widget_icon_name'      => 'flashlight-line',
        'widget_progress_class' => 'assessment-progress-striped',
        'widget_title'          => 'Energy Efficiency',
        'widget_description'    => 'Measures energy-saving strategies across systems and operations.',
        'widget_score'          => 27,
        'widget_max'            => 35,
      ],
      [
        'widget_state'       => 'neutral',
        'widget_icon_name'   => 'windy-line',
        'widget_title'       => 'Indoor Environmental Quality',
        'widget_description' => 'Focuses on air quality, thermal comfort, and occupant wellbeing.',
        'widget_score'       => 14,
        'widget_max'         => 21,
      ],
      [
        'widget_state'       => 'neutral',
        'widget_icon_name'   => 'road-map-line',
        'widget_title'       => 'Sustainable Site Planning & Management',
        'widget_description' => 'Assesses responsible site use, transport, and ecological impact.',
        'widget_score'       => 8,
        'widget_max'         => 16,
      ],
      [
        'widget_state'       => 'positive',
        'widget_icon_name'   => 'recycle-line',
        'widget_title'       => 'Material & Resources',
        'widget_description' => 'Tracks low-impact materials, reuse practices, and waste reduction.',
        'widget_score'       => 8,
        'widget_max'         => 11,
      ],
      [
        'widget_state'       => 'positive',
        'widget_icon_name'   => 'water-flash-line',
        'widget_title'       => 'Water Efficiency',
        'widget_description' => 'Evaluates water-saving fixtures, reuse, and monitoring performance.',
        'widget_score'       => 8,
        'widget_max'         => 10,
      ],
      [
        'widget_state'       => 'negative',
        'widget_icon_name'   => 'lightbulb-flash-line',
        'widget_title'       => 'Innovation',
        'widget_description' => 'Rewards new ideas and exemplary sustainable solutions.',
        'widget_score'       => 2,
        'widget_max'         => 7,
      ],
    ];
    ?>
    <div id="assessment-widgets-brand" class="assessment-widget-grid mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-3" aria-label="Assessment category widgets">
      <?php foreach ($assessment_widgets as $assessment_widget): ?>
        <?php component('dashboard/widgets/widget-assessment', $assessment_widget); ?>
      <?php endforeach; ?>
    </div>

    <div class="mt-4 text-brand-500 px-5 py-2 border border-dashed border-brand-300 rounded-lg">
      Scores are based on documented sustainable practices and verified data inputs across each category.
    </div>

    <?php component('dashboard/assessment-category', [
      'assessment_category_modifier'         => 'assessment-category--ee',
      'assessment_category_id'               => 'assessment-category-heading',
      'assessment_category_title'            => 'Energy Efficiency (EE)',
      'assessment_category_subtitle'         => 'Design / Commissioning / Verification & Maintenance',
      'assessment_category_header_icon_name' => 'flashlight-line',
      'assessment_category_header_score'     => '26',
      'assessment_category_header_max'       => '35',
      'assessment_category_rows_partial'     => __DIR__ . '/partials/assessment-category-ee-rows.php',
      'assessment_category_total_label'      => 'Total EE Score',
      'assessment_category_meta_html'        => 'Updated by <span class="font-semibold">Ahmad Faris bin Mohd Zaki</span> on <span class="font-semibold">1 Jan 2024, 10:00 AM</span>',
    ]); ?>

    <?php component('dashboard/assessment-category', [
      'assessment_category_modifier'         => 'assessment-category--eq',
      'assessment_category_id'               => 'assessment-category-eq-heading',
      'assessment_category_title'            => 'Indoor Environmental QualitY (EQ)',
      'assessment_category_subtitle'         => 'Air Quality | Thermal Comfort | Lighting, Visual & Acoustic Comfort | Verification',
      'assessment_category_header_icon_name' => 'windy-line',
      'assessment_category_header_score'     => '0',
      'assessment_category_header_max'       => '0',
      'assessment_category_rows_partial'     => __DIR__ . '/partials/assessment-category-eq-rows.php',
      'assessment_category_total_label'      => 'Total EQ Score',
      'assessment_category_meta_html'        => '',
    ]); ?>

    <?php component('dashboard/assessment-category', [
      'assessment_category_modifier'         => 'assessment-category--sm',
      'assessment_category_id'               => 'assessment-category-sm-heading',
      'assessment_category_title'            => 'Sustainable Site PLANNING & Management (SM)',
      'assessment_category_subtitle'         => 'Site Planning / Construction Management / Transportation / Design',
      'assessment_category_header_icon_name' => 'road-map-line',
      'assessment_category_header_score'     => '0',
      'assessment_category_header_max'       => '0',
      'assessment_category_rows_partial'     => __DIR__ . '/partials/assessment-category-sm-rows.php',
      'assessment_category_total_label'      => 'Total SM Score',
      'assessment_category_meta_html'        => '',
    ]); ?>




    <script>
      (function () {
        var category_nodes = document.querySelectorAll('.js-assessment-category');

        if (category_nodes.length === 0) {
          return;
        }

        category_nodes.forEach(function (category_node) {
          var assessment_table = category_node.querySelector('.js-assessment-table');

          if (!assessment_table) {
            return;
          }

          var assessment_rows = assessment_table.querySelectorAll('[data-assessment-row]');
          var group_rows = assessment_table.querySelectorAll('tbody > tr.js-assessment-group-row');

          var setup_section_toggles = function () {
            group_rows.forEach(function (group_row) {
              var controlled_rows = [];
              var next_row = group_row.nextElementSibling;

              while (next_row && !next_row.classList.contains('js-assessment-group-row')) {
                controlled_rows.push(next_row);
                next_row = next_row.nextElementSibling;
              }

              if (controlled_rows.length === 0) {
                return;
              }
              var group_icon = group_row.querySelector('.js-assessment-group-icon');

              var toggle_group_rows = function () {
                var should_hide = controlled_rows.some(function (row) {
                  return !row.classList.contains('hidden');
                });

                controlled_rows.forEach(function (row) {
                  row.classList.toggle('hidden', should_hide);
                });

                group_row.setAttribute('aria-expanded', should_hide ? 'false' : 'true');

                if (group_icon) {
                  group_icon.classList.toggle('-rotate-90', should_hide);
                }
              };

              group_row.addEventListener('click', function () {
                toggle_group_rows();
              });

              group_row.addEventListener('keydown', function (event) {
                if (event.key !== 'Enter' && event.key !== ' ') {
                  return;
                }

                event.preventDefault();
                toggle_group_rows();
              });
            });
          };

          var read_points = function (row) {
            var value = Number(row.getAttribute('data-assessment-points') || 0);
            return Number.isFinite(value) ? value : 0;
          };

          var render_score_markup = function (score, max) {
            return String(score) + ' <span class="font-normal text-brand-500">/ ' + String(max) + '</span>';
          };

          var update_row_total = function (row) {
            var checkbox = row.querySelector('input[type="checkbox"]');
            var total_node = row.querySelector('[data-assessment-total]');

            if (!checkbox || !total_node) {
              return;
            }

            var points = read_points(row);
            var score = checkbox.checked ? points : 0;
            total_node.innerHTML = render_score_markup(score, points);
            total_node.classList.toggle('text-primary-600', score > 0);
          };

          var update_group_totals = function () {
            var group_total_nodes = assessment_table.querySelectorAll('[data-assessment-group-total]');

            group_total_nodes.forEach(function (group_total_node) {
              var group_name = group_total_node.getAttribute('data-assessment-group-total');
              var group_mode = group_total_node.getAttribute('data-assessment-group-mode');
              var group_max = Number(group_total_node.getAttribute('data-assessment-group-max'));

              if (!group_name) {
                return;
              }

              var grouped_rows = assessment_table.querySelectorAll('[data-assessment-row][data-assessment-group="' + group_name + '"]');
              var group_points = 0;
              var group_score = 0;

              grouped_rows.forEach(function (row) {
                var points = read_points(row);
                var checkbox = row.querySelector('input[type="checkbox"]');

                group_points += points;

                if (group_mode === 'max') {
                  if (checkbox && checkbox.checked) {
                    group_score = Math.max(group_score, points);
                  }
                  return;
                }

                group_score += checkbox && checkbox.checked ? points : 0;
              });

              if (Number.isFinite(group_max) && group_max > 0) {
                group_points = group_max;
              }

              group_total_node.innerHTML = render_score_markup(group_score, group_points);
              group_total_node.classList.toggle('text-primary-600', group_score > 0);
            });
          };

          var update_table_total = function () {
            var total_node = assessment_table.querySelector('[data-assessment-table-total]');
            var header_score_node = category_node.querySelector('[data-assessment-header-score]');
            var header_max_node = category_node.querySelector('[data-assessment-header-max]');

            if (!total_node) {
              return;
            }

            var all_rows = assessment_table.querySelectorAll('[data-assessment-row]');
            var group_map = {};
            var total_max = 0;
            var total_score = 0;

            all_rows.forEach(function (row) {
              var group_name = row.getAttribute('data-assessment-group');
              var points = read_points(row);
              var checkbox = row.querySelector('input[type="checkbox"]');

              if (group_name) {
                if (!group_map[group_name]) {
                  group_map[group_name] = {
                    mode: 'sum',
                    max_override: 0,
                    points_sum: 0,
                    score_sum: 0,
                    score_max: 0,
                  };
                }

                var group_mode = row.getAttribute('data-assessment-group-mode');
                if (!group_mode) {
                  var group_total_node = assessment_table.querySelector('[data-assessment-group-total="' + group_name + '"]');
                  group_mode = group_total_node ? group_total_node.getAttribute('data-assessment-group-mode') : '';
                }

                if (group_mode === 'max') {
                  group_map[group_name].mode = 'max';
                }

                var group_max_attr = row.getAttribute('data-assessment-group-max');
                if (!group_max_attr) {
                  var group_total = assessment_table.querySelector('[data-assessment-group-total="' + group_name + '"]');
                  group_max_attr = group_total ? group_total.getAttribute('data-assessment-group-max') : '';
                }

                var group_max_value = Number(group_max_attr || 0);
                if (Number.isFinite(group_max_value) && group_max_value > 0) {
                  group_map[group_name].max_override = group_max_value;
                }

                group_map[group_name].points_sum += points;

                if (group_map[group_name].mode === 'max') {
                  if (checkbox && checkbox.checked) {
                    group_map[group_name].score_max = Math.max(group_map[group_name].score_max, points);
                  }
                } else {
                  group_map[group_name].score_sum += checkbox && checkbox.checked ? points : 0;
                }

                return;
              }

              total_max += points;
              total_score += checkbox && checkbox.checked ? points : 0;
            });

            Object.keys(group_map).forEach(function (group_name) {
              var group = group_map[group_name];
              var group_max = group.max_override > 0 ? group.max_override : group.points_sum;
              var group_score = group.mode === 'max' ? group.score_max : group.score_sum;

              total_max += group_max;
              total_score += group_score;
            });

            total_node.innerHTML = render_score_markup(total_score, total_max);
            total_node.classList.toggle('text-primary-600', total_score > 0);

            if (header_score_node) {
              header_score_node.textContent = String(total_score);
            }

            if (header_max_node) {
              header_max_node.textContent = String(total_max);
            }
          };

          assessment_rows.forEach(function (row) {
            var checkbox = row.querySelector('input[type="checkbox"]');

            if (!checkbox) {
              return;
            }

            update_row_total(row);
            checkbox.addEventListener('change', function () {
              var exclusive_group = row.getAttribute('data-assessment-exclusive-group');

              if (exclusive_group && checkbox.checked) {
                var exclusive_rows = assessment_table.querySelectorAll('[data-assessment-row][data-assessment-exclusive-group="' + exclusive_group + '"]');

                exclusive_rows.forEach(function (exclusive_row) {
                  if (exclusive_row === row) {
                    return;
                  }

                  var exclusive_checkbox = exclusive_row.querySelector('input[type="checkbox"]');

                  if (!exclusive_checkbox) {
                    return;
                  }

                  exclusive_checkbox.checked = false;
                  update_row_total(exclusive_row);
                });
              }

              update_row_total(row);
              update_group_totals();
              update_table_total();
            });
          });

          update_group_totals();
          update_table_total();
          setup_section_toggles();
        });
      })();
    </script>
  </section>
</article>
<?php layout('dashboard/partials/dashboard-end'); ?>
