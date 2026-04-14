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


    <section class="assessment-category assessment-category--ee rounded-lg bg-brand-900 overflow-hidden mt-10 pb-1 js-assessment-category" aria-labelledby="assessment-category-heading">
      <header class="assessment-category__header flex items-center p-5 gap-5 text-brand-400">
        <div class="assessment-category__badge flex items-center justify-center rounded-md bg-white text-brand-800">
          <div class="px-4 py-6">
            <?php component('icon', [
              'icon_name'  => 'flashlight-line',
              'icon_size'  => '24',
              'icon_class' => 'text-current',
            ]); ?>
          </div>
          <div class="text-brand-600 pr-3 text-center">
            <div data-assessment-header-score>26</div>
            <div class="mt-1 pt-1 border-t border-brand-400" data-assessment-header-max>35</div>
          </div>
        </div>
        <div>
          <h2 class="assessment-category__title text-2xl text-white">Energy Efficiency (EE)</h2>
          <div class="assessment-category__subtitle mt-1">Design / Commissioning / Verification & Maintenance</div>
        </div>
      </header>

      <article class="assessment-category__content bg-white mx-1 rounded-md overflow-hidden">
        <table class="assessment-category__table assessment-table w-full border-collapse mb-5 border-b js-assessment-table">
          <tbody>
            <tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
              <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
                <div class="flex items-center justify-start gap-3">
                  <?php component('icon', [
                    'icon_name'  => 'arrow-right-s-line',
                    'icon_size'  => '24',
                    'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
                  ]); ?>
                  <div>Design</div>
                </div>
              </td>
            </tr>
            
            <tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE1</div>
              </td>
              <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Minimum EE Performance</div>
                <div>Establish minimum energy efficiency (EE) performance to reduce energy consumption in buildings, thus reducing CO2 emission to the atmosphere. Meet the following minimum EE requirements as stipulated inMS 1525:2007:</div>
              </td>
              <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                <div class="flex items-center justify-end">
                  <?php component('form/checkbox', [
                    'name'       => 'ee1_score',
                    'label'      => '1',
                    'checked'    => false,
                    'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                    'attributes' => [
                      'aria-label' => 'EE1 score',
                    ],
                  ]); ?>
                </div>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <?php component('form/textarea', [
                  'id'          => 'assessment-remark-ee1',
                  'name'        => 'assessment_remark_ee1',
                  'rows'        => 5,
                  'value'       => 'No remarks',
                  'placeholder' => 'Add remarks...',
                  'class'       => 'text-sm font-normal',
                ]); ?>
              </td>
            </tr>

            <tr>
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE2</div>
              </td>
              <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Lighting Zoning</div>
                <div class="pb-3">
                  Provide flexible lighting controls to optimise energy savings:
                </div>

                <table class="assessment-table__nested w-full border-collapse">
                  <tbody>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-2" data-assessment-points="1">
                      <td class="p-3 border border-brand-200">
                        All individual or enclosed spaces to be individually switched; and the size of individually switched lighting zones shall not exceed 100m² for 90% of the NLA; with switching clearly labelled and easily accessible by building occupants.
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee2_1_score',
                            'label'      => '1',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE2 row 1 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-2" data-assessment-points="1">
                      <td class="p-3 border border-brand-200">
                        Provide auto-sensor controlled lighting in conjunction with daylighting strategy for all perimeter zones and daylit areas, if any
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee2_2_score',
                            'label'      => '1',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE2 row 2 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-2" data-assessment-points="1">
                      <td class="p-3 border border-brand-200">
                        Provide motion sensors or equivalent to complement lighting zoning for at least 25% NLA.
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee2_3_score',
                            'label'      => '1',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE2 row 3 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-2">0 <span class="font-normal text-brand-500">/ 3</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top">
                <?php component('form/textarea', [
                  'id'    => 'assessment-remark-ee2',
                  'name'  => 'assessment_remark_ee2',
                  'rows'  => 5,
                  'value' => 'This criterion rewards the implementation of flexible lighting controls that allow occupants to adjust lighting based on their needs and preferences, while also optimising energy savings. By providing individual switching for enclosed spaces and auto-sensor controls for perimeter zones, the building can significantly reduce energy consumption while maintaining occupant comfort.',
                  'class' => 'text-sm',
                ]); ?>
              </td>
            </tr>

            <tr class="assessment-table__item-row" data-assessment-row data-assessment-points="1">
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE3</div>
              </td>
              <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
                  Electrical sub-metering &amp; Tenant sub-metering
                </div>
                <div>
                  Monitor energy consumption of key building services as well as all tenancy areas:
                </div>
                <div>
                  Provide sub-metering for all energy uses of ≥ 100kVA; with separate sub-metering for lighting and separately for power at each floor or tenancy, whichever is smaller.
                </div>
              </td>
              <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                <div class="flex items-center justify-end">
                  <?php component('form/checkbox', [
                    'name'       => 'ee3_score',
                    'label'      => '1',
                    'checked'    => false,
                    'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                    'attributes' => [
                      'aria-label' => 'EE3 score',
                    ],
                  ]); ?>
                </div>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 1</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <?php component('form/textarea', [
                  'id'          => 'assessment-remark-ee3',
                  'name'        => 'assessment_remark_ee3',
                  'rows'        => 5,
                  'value'       => 'No remarks',
                  'placeholder' => 'Add remarks...',
                  'class'       => 'text-sm font-normal',
                ]); ?>
              </td>
            </tr>

            <tr>
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE4</div>
              </td>
              <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Renewable Energy</div>
                <div class="pb-3">
                  Encourage use of renewable energy:
                </div>

                <table class="assessment-table__nested w-full border-collapse">
                  <tbody>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-4" data-assessment-exclusive-group="group-4" data-assessment-points="2">
                      <td class="p-3 border border-brand-200">
                        Where 0.5 % or 5 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee4_1_score',
                            'label'      => '2',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE4 row 1 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-4" data-assessment-exclusive-group="group-4" data-assessment-points="3">
                      <td class="p-3 border border-brand-200">
                        Where 1.0 % or 10 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee4_2_score',
                            'label'      => '3',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE4 row 2 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-4" data-assessment-exclusive-group="group-4" data-assessment-points="4">
                      <td class="p-3 border border-brand-200">
                        Where 1.5 % or 20 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy, OR
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee4_3_score',
                            'label'      => '4',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE4 row 3 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-4" data-assessment-exclusive-group="group-4" data-assessment-points="5">
                      <td class="p-3 border border-brand-200">
                        Where 2.0 % or 40 kWp whichever is the greater, of the total electricity consumption is generated by renewable energy
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee4_4_score',
                            'label'      => '5',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE4 row 4 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-4" data-assessment-group-mode="max" data-assessment-group-max="5">0 <span class="font-normal text-brand-500">/ 5</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <?php component('form/textarea', [
                  'id'          => 'assessment-remark-ee4',
                  'name'        => 'assessment_remark_ee4',
                  'rows'        => 5,
                  'value'       => 'No remarks',
                  'placeholder' => 'Add remarks...',
                  'class'       => 'text-sm font-normal',
                ]); ?>
              </td>
            </tr>

            <tr>
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE5</div>
              </td>
              <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">Advanced EE Performance</div>

                <table class="assessment-table__nested w-full border-collapse mt-3">
                  <tbody>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="2">
                      <td class="p-3 border border-brand-200">
                        Exceed Energy Efficiency (EE) performance better than the baseline minimum to reduce energy consumption in the building. Achieve Building Energy Intensity (BEI) ≤ 150 kWh/m2 yr as defined under GBI reference (using BEIT Software or other GBI approved software(s)), OR
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee5_1_score',
                            'label'      => '2',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE5 row 1 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="3">
                      <td class="p-3 border border-brand-200">BEI ≤ 140, OR</td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee5_2_score',
                            'label'      => '3',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE5 row 2 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="5">
                      <td class="p-3 border border-brand-200">BEI ≤ 130, OR</td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee5_3_score',
                            'label'      => '5',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE5 row 3 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="8">
                      <td class="p-3 border border-brand-200">BEI ≤ 120, OR</td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee5_4_score',
                            'label'      => '8',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE5 row 4 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="10">
                      <td class="p-3 border border-brand-200">BEI ≤ 110, OR</td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee5_5_score',
                            'label'      => '10',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE5 row 5 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="12">
                      <td class="p-3 border border-brand-200">BEI ≤ 100, OR</td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee5_6_score',
                            'label'      => '12',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE5 row 6 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-5" data-assessment-exclusive-group="group-5" data-assessment-points="15">
                      <td class="p-3 border border-brand-200">BEI ≤ 90</td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee5_7_score',
                            'label'      => '15',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE5 row 7 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-5" data-assessment-group-mode="max" data-assessment-group-max="15">0 <span class="font-normal text-brand-500">/ 15</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <?php component('form/textarea', [
                  'id'          => 'assessment-remark-ee5',
                  'name'        => 'assessment_remark_ee5',
                  'rows'        => 5,
                  'value'       => 'No remarks',
                  'placeholder' => 'Add remarks...',
                  'class'       => 'text-sm font-normal',
                ]); ?>
              </td>
            </tr>

            <tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
              <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
                <div class="flex items-center justify-start gap-3">
                  <?php component('icon', [
                    'icon_name'  => 'arrow-right-s-line',
                    'icon_size'  => '24',
                    'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
                  ]); ?>
                  <div>Commissioning</div>
                </div>
              </td>
            </tr>

            <tr class="assessment-table__item-row" data-assessment-row data-assessment-points="3">
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE6</div>
              </td>
              <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
                  Enhanced Commissioning of Building Energy Systems
                </div>
                <div>
                  Ensure building’s energy related systems are designed and installed to achieve proper commissioning
                  so as to realise their full potential and intent. Appoint an independent GBI recognised Commissioning
                  Specialist (CxS) at the onset of the design process to verify that comprehensive pre-commissioning and
                  commissioning is performed for all the building's energy related systems in accordance with ASHRAE
                  Commissioning Guideline or other GBI approved equivalent standard/s by:
                </div>
                <ol type="1" class="list-decimal pl-5 mt-3 space-y-2">
                  <li>Conducting at least one commissioning design review during the detail design stage and back-check the review comments during the tender documentation stage.</li>
                  <li>Developing and incorporating commissioning requirements into the tender documents.</li>
                  <li>Developing and implementing a commissioning plan.</li>
                  <li>Verifying the installation and performance of the systems to be commissioned.</li>
                  <li>Reviewing contractor submittals applicable to systems being commissioned for compliance.</li>
                  <li>Developing a systems manual that provides future operating staff the information needed to understand and optimally operate the commissioned systems.</li>
                  <li>Verifying that the requirements for training operating personnel and building occupants are completed.</li>
                </ol>
              </td>
              <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                <div class="flex items-center justify-end">
                  <?php component('form/checkbox', [
                    'name'       => 'ee6_score',
                    'label'      => '3',
                    'checked'    => false,
                    'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                    'attributes' => [
                      'aria-label' => 'EE6 score',
                    ],
                  ]); ?>
                </div>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 3</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <?php component('form/textarea', [
                  'id'          => 'assessment-remark-ee6',
                  'name'        => 'assessment_remark_ee6',
                  'rows'        => 5,
                  'value'       => 'No remarks',
                  'placeholder' => 'Add remarks...',
                  'class'       => 'text-sm font-normal',
                ]); ?>
              </td>
            </tr>

            <tr>
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE7</div>
              </td>
              <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
                  Post Occupancy Commissioning
                </div>
                <div class="pb-3">
                  Carry out post occupancy commissioning for all tenancy areas after fit-out changes are completed:
                </div>

                <table class="assessment-table__nested w-full border-collapse">
                  <tbody>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-7" data-assessment-points="1">
                      <td class="p-3 border border-brand-200">
                        Design engineer shall review all tenancy fit-out plans to ensure original design intent is not compromised and upon completion of the fit-out works, verify and fine-tune the installations to suit.
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee7_1_score',
                            'label'      => '1',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE7 row 1 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-7" data-assessment-points="1">
                      <td class="p-3 border border-brand-200">
                        Within 12 months of practical completion (or earlier if there is at least 50% occupancy), the CxS shall carry out a full post/re-commissioning of the building's energy related systems to verify that their performance is sustained in conjunction with the completed tenancy fit-outs.
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee7_2_score',
                            'label'      => '1',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE7 row 2 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-7">0 <span class="font-normal text-brand-500">/ 2</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <?php component('form/textarea', [
                  'id'          => 'assessment-remark-ee7',
                  'name'        => 'assessment_remark_ee7',
                  'rows'        => 5,
                  'value'       => 'No remarks',
                  'placeholder' => 'Add remarks...',
                  'class'       => 'text-sm font-normal',
                ]); ?>
              </td>
            </tr>

            <tr class="assessment-table__group-row bg-brand-100 cursor-pointer js-assessment-group-row" tabindex="0" role="button" aria-expanded="true">
              <td colspan="5" class="p-4 border border-b-8 border-brand-300 text-brand-900 align-top font-bold text-base uppercase">
                <div class="flex items-center justify-start gap-3">
                  <?php component('icon', [
                    'icon_name'  => 'arrow-right-s-line',
                    'icon_size'  => '24',
                    'icon_class' => 'text-current opacity-60 inline-block transition-transform duration-200 js-assessment-group-icon',
                  ]); ?>
                  <div>Verification & Maintenance</div>
                </div>
              </td>
            </tr>

            <tr class="assessment-table__item-row" data-assessment-row data-assessment-points="2">
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE8</div>
              </td>
              <td class="assessment-table__item-content p-3 border border-brand-200 align-top">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
                  EE Verification
                </div>
                <div>
                  Verify predicted energy use of key building services:
                </div>
                <ol type="1" class="list-decimal pl-5 mt-3 space-y-2">
                  <li>Use Energy Management System to monitor and analyse energy consumption including reading of submeters, AND</li>
                  <li>Fully commission EMS including Maximum Demand Limiting programme within 12 months of practical completion (or earlier if there is at least 50% occupancy).</li>
                </ol>
              </td>
              <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                <div class="flex items-center justify-end">
                  <?php component('form/checkbox', [
                    'name'       => 'ee8_score',
                    'label'      => '2',
                    'checked'    => false,
                    'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                    'attributes' => [
                      'aria-label' => 'EE8 score',
                    ],
                  ]); ?>
                </div>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-total>0 <span class="font-normal text-brand-500">/ 2</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <?php component('form/textarea', [
                  'id'          => 'assessment-remark-ee8',
                  'name'        => 'assessment_remark_ee8',
                  'rows'        => 5,
                  'value'       => 'No remarks',
                  'placeholder' => 'Add remarks...',
                  'class'       => 'text-sm font-normal',
                ]); ?>
              </td>
            </tr>

            <tr>
              <td class="p-3 border border-brand-200 align-top">
                <div class="assessment-table__item-code h-[var(--ui-h-md)] flex items-center justify-start uppercase font-bold">EE9</div>
              </td>
              <td class="assessment-table__item-content p-0 pt-3 pl-3 border border-brand-200 align-top" colspan="2">
                <div class="uppercase font-bold h-[var(--ui-h-md)] flex items-center justify-start">
                  Sustainable Maintenance
                </div>
                <div class="pb-3">
                  Ensure the building’s energy related systems will continue to perform as intended beyond the 12 months Defects &amp; Liability Period:
                </div>

                <table class="assessment-table__nested w-full border-collapse">
                  <tbody>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-9" data-assessment-points="1">
                      <td class="p-3 border border-brand-200">
                        <ol type="1" start="1" class="list-decimal pl-5">
                          <li>At least 50% of permanent building maintenance team to be on-board one (1) to three (3) months before practical completion and to fully participate (to be specified in contract conditions) in the Testing &amp; Commissioning of all building energy services.</li>
                        </ol>
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee9_1_score',
                            'label'      => '1',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE9 row 1 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                    <tr class="assessment-table__item-row border-t border-brand-200" data-assessment-row data-assessment-group="group-9" data-assessment-points="2">
                      <td class="p-3 border border-brand-200">
                        <ol type="1" start="2" class="list-decimal pl-5 space-y-2">
                          <li>Provide for a designated building maintenance office that is fully equipped with facilities (including tools and instrumentation) and inventory storage.</li>
                          <li>Provide evidence of documented plan for at least 3-year facility maintenance and preventive maintenance budget (inclusive of staffing and outsourced contracts).</li>
                        </ol>
                      </td>
                      <td class="assessment-table__item-action p-3 border border-brand-200 align-top text-right" width="160">
                        <div class="flex items-center justify-end">
                          <?php component('form/checkbox', [
                            'name'       => 'ee9_2_score',
                            'label'      => '2',
                            'checked'    => false,
                            'class'      => 'bg-white justify-center flex-row-reverse h-[var(--ui-h-md)] border border-brand-300 rounded-md gap-4 w-[80px]',
                            'attributes' => [
                              'aria-label' => 'EE9 row 2 score',
                            ],
                          ]); ?>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-group-total="group-9">0 <span class="font-normal text-brand-500">/ 3</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <?php component('form/textarea', [
                  'id'          => 'assessment-remark-ee9',
                  'name'        => 'assessment_remark_ee9',
                  'rows'        => 5,
                  'value'       => 'No remarks',
                  'placeholder' => 'Add remarks...',
                  'class'       => 'text-sm font-normal',
                ]); ?>
              </td>
            </tr>
          </tbody>
          <tfoot>
            <tr class="assessment-table__total-row">
              <td colspan="3" class="p-0 border-0"></td>
              <td class="assessment-table__item-score p-3 border border-brand-200 align-top text-right font-semibold" width="80">
                <div class="h-[var(--ui-h-md)] flex items-center justify-end gap-1" data-assessment-table-total>0 <span class="font-normal text-brand-500">/ 0</span></div>
              </td>
              <td class="assessment-table__item-remarks p-3 border border-brand-200 align-top font-semibold">
                <div class="min-h-[var(--ui-h-md)] flex items-center justify-start">
                  Total EE Score
                </div>
              </td>
            </tr>
          </tfoot>
        </table>
        <div class="assessment-category__meta p-5 text-right">
          Updated by <span class="font-semibold">Ahmad Faris bin Mohd Zaki</span> on <span class="font-semibold">1 Jan 2024, 10:00 AM</span> 
        </div>
      </article>
    </section>




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
