<?php

declare(strict_types=1);

$page_title   = 'Packages - Create Package';
$page_current = 'dashboard';

$dashboard_breadcrumb_items = [
  ['label' => 'Packages', 'href' => path('/dashboard/packages/create-package')],
  ['label' => 'Create Package', 'current' => true],
];
$dashboard_breadcrumb_description = 'Create a package with pricing, session limits, and booking details.';

layout('dashboard/partials/dashboard-start', [
  'page_title'                       => $page_title,
  'page_current'                     => $page_current,
  'dashboard_breadcrumb_items'       => $dashboard_breadcrumb_items,
  'dashboard_breadcrumb_description' => $dashboard_breadcrumb_description,
]);
?>
<header class="app-header py-6 px-4 -mx-4 md:hidden">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900">Create Package</h1>
    <p class="mt-4 max-w-2xl text-brand-600">
      Create a package with pricing, session limits, and booking details.
    </p>
  </div>
</header>

<article class="app-article pb-20 space-y-6 pt-6">
  <section class="" aria-label="Create package form">
    <div class="">
      <form class="divide divide-y divide-dasheds divide-brand-200" action="#" method="post">
        <section class="py-5 space-y-5">
          <div class="max-w-4xl grid lg:w-2/4">
            <?php component('fields', [
              'label'   => 'Package Name *',
              'control' => [
                'component' => 'input',
                'props'     => [
                  'name'        => 'package_name',
                  'placeholder' => 'e.g. Wedding Essential',
                  'required'    => true,
                ],
              ],
            ]); ?>
          </div>

          <div class="max-w-4xl grid gap-3 md:grid-cols-3">
            <?php component('fields', [
              'label'   => 'Price (RM) *',
              'control' => [
                'component' => 'input',
                'props'     => [
                  'type'        => 'number',
                  'name'        => 'price_rm',
                  'placeholder' => '0.00',
                  'required'    => true,
                  'attributes'  => [
                    'min'  => '0',
                    'step' => '0.01',
                  ],
                ],
              ],
            ]); ?>

            <?php component('fields', [
              'label'   => 'Deposit (RM) *',
              'control' => [
                'component' => 'input',
                'props'     => [
                  'type'        => 'number',
                  'name'        => 'deposit_rm',
                  'placeholder' => '0.00',
                  'required'    => true,
                  'attributes'  => [
                    'min'  => '0',
                    'step' => '0.01',
                  ],
                ],
              ],
            ]); ?>

            <?php component('fields', [
              'label'   => 'Pax Max *',
              'control' => [
                'component' => 'input',
                'props'     => [
                  'type'        => 'number',
                  'name'        => 'pax_max',
                  'placeholder' => '0',
                  'required'    => true,
                  'attributes'  => [
                    'min'  => '1',
                    'step' => '1',
                  ],
                ],
              ],
            ]); ?>
          </div>
        </section>
        <section class="py-5">
          <div class="max-w-4xl grid lg:w-3/4">
            <?php component('fields', [
              'label'       => 'Description',
              'helper_text' => 'Write a short overview for package details page.',
              'control'     => [
                'component' => 'textarea',
                'props'     => [
                  'name'        => 'description',
                  'rows'        => 4,
                  'placeholder' => 'Describe what is included in this package.',
                ],
              ],
            ]); ?>
          </div>
        </section>
        <section class="py-5">
          <div class="max-w-4xl grid gap-4 md:grid-cols-3">
            <?php component('fields', [
              'label'   => 'Time Slots',
              'control' => [
                'component' => 'textarea',
                'props'     => [
                  'name'        => 'time_slots',
                  'rows'        => 5,
                  'placeholder' => 'Add available time slots.',
                ],
              ],
            ]); ?>

            <?php component('fields', [
              'label'   => 'Date Excludes',
              'control' => [
                'component' => 'textarea',
                'props'     => [
                  'name'        => 'date_excludes',
                  'rows'        => 5,
                  'placeholder' => 'Add excluded dates.',
                ],
              ],
            ]); ?>

            <?php component('fields', [
              'label'   => 'Pax Price Setup',
              'control' => [
                'component' => 'textarea',
                'props'     => [
                  'name'        => 'pax_price_setup',
                  'rows'        => 5,
                  'placeholder' => 'Set up pax-based pricing notes.',
                ],
              ],
            ]); ?>
          </div>
        </section>
        <section class="flex flex-wrap items-center gap-3 py-5">
          <?php component('button', [
            'label'    => 'Save Package',
            'type'     => 'submit',
            'variant'  => 'primary',
            'gradient' => true,
          ]); ?>

          <?php component('button', [
            'label'    => 'Preview Package',
            'type'     => 'button',
            'variant'  => 'secondary',
            'gradient' => true,
          ]); ?>
        </section>
      </form>
    </div>
  </section>
</article>

<?php layout('dashboard/partials/dashboard-end'); ?>
