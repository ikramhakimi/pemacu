<?php

declare(strict_types=1);

$page_title   = 'Dashboard';
$page_current = 'dashboard';

$dashboard_users_grid_rows = [
  ['Aina Zulkifli', 'aina@aurorastudio.my', 'Active', 18, 'RM 12,400'],
  ['Mika Rahman', 'mika@northframe.co', 'Draft', 6, 'RM 4,200'],
  ['Siti Lim', 'siti@everlight.my', 'Active', 10, 'RM 7,500'],
  ['Daniel Chong', 'daniel@northframe.co', 'Pending', 4, 'RM 2,050'],
  ['Farah Nabila', 'farah@aurorastudio.my', 'Active', 13, 'RM 8,900'],
  ['Kevin Tan', 'kevin@everlight.my', 'Paused', 2, 'RM 760'],
];

layout('dashboard/partials/dashboard-start', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
]);
?>
<header class="app-header border-b border-brand-200 py-6 px-4 md:px-6 -mx-4 md:-mx-6">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900">Overview</h1>
    <p class="mt-4 max-w-2xl text-sm text-brand-600">
      Monitor bookings, revenue, and recent updates for your studio in one place.
    </p>
  </div>
</header>
<article class="app-article space-y-4 md:space-y-6 max-w-7xl pt-6 pb-20">
  <section aria-labelledby="dashboard-kpi-heading">
    <h2 id="dashboard-kpi-heading" class="sr-only">Key metrics</h2>
    <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
      <?php component('widget', [
        'widget_icon_name'  => 'calendar-check-line',
        'widget_caption'    => 'Today Bookings',
        'widget_number'     => '12',
        'widget_tone'       => 'positive',
        'widget_badge'      => '+20%',
        'widget_info'       => 'from yesterday',
        'widget_class_name' => 'bg-brand-50 h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'time-line',
        'widget_caption'    => 'Pending Sessions',
        'widget_number'     => '8',
        'widget_tone'       => 'warning',
        'widget_badge'      => 'Pending',
        'widget_info'       => 'Requires confirmation',
        'widget_class_name' => 'h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'money-dollar-circle-line',
        'widget_caption'    => 'Monthly Revenue',
        'widget_number'     => '$14,280',
        'widget_tone'       => 'positive',
        'widget_badge'      => '+9%',
        'widget_info'       => 'from last month',
        'widget_class_name' => 'h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'star-line',
        'widget_caption'    => 'Client Satisfaction',
        'widget_number'     => '4.9/5',
        'widget_tone'       => 'info',
        'widget_badge'      => 'Reviews',
        'widget_info'       => 'Based on 96 reviews',
        'widget_class_name' => 'h-full',
      ]); ?>
    </div>
  </section>

  <section aria-labelledby="dashboard-packages-table-heading">
    <h2 id="dashboard-packages-table-heading" class="text-base font-semibold text-brand-900">
      Recent Packages
    </h2>
    <div class="dashboard-table-wrap mt-3">
      <div id="dashboard-users-grid" class="dashboard-users-grid"></div>
    </div>
  </section>
  <script id="dashboard-users-grid-data" type="application/json"><?= (string) json_encode($dashboard_users_grid_rows, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?></script>

  <form class="space-y-5 max-w-4xl">
    <div class="grid lg:w-3/4">
      <?php component('form/field', [
        'label'           => 'Package Name *',
        'input_component' => 'input',
        'input_props'     => [
          'name'        => 'package_name',
          'placeholder' => 'e.g. Wedding Essential',
          'required'    => true,
        ],
      ]); ?>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
      <?php component('form/field', [
        'label'           => 'Price (RM) *',
        'input_component' => 'input',
        'input_props'     => [
          'type'        => 'number',
          'name'        => 'price_rm',
          'placeholder' => '0.00',
          'required'    => true,
          'attributes'  => [
            'min'  => '0',
            'step' => '0.01',
          ],
        ],
      ]); ?>

      <?php component('form/field', [
        'label'           => 'Deposit (RM) *',
        'input_component' => 'input',
        'input_props'     => [
          'type'        => 'number',
          'name'        => 'deposit_rm',
          'placeholder' => '0.00',
          'required'    => true,
          'attributes'  => [
            'min'  => '0',
            'step' => '0.01',
          ],
        ],
      ]); ?>

      <?php component('form/field', [
        'label'           => 'Pax Max *',
        'input_component' => 'input',
        'input_props'     => [
          'type'        => 'number',
          'name'        => 'pax_max',
          'placeholder' => '0',
          'required'    => true,
          'attributes'  => [
            'min'  => '1',
            'step' => '1',
          ],
        ],
      ]); ?>
    </div>

    <div class="grid lg:w-3/4">
      <?php component('form/field', [
        'label'           => 'Description',
        'helper_text'     => 'Write a short overview for package details page.',
        'input_component' => 'textarea',
        'input_props'     => [
          'name'        => 'description',
          'rows'        => 4,
          'placeholder' => 'Describe what is included in this package.',
        ],
      ]); ?>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
      <?php component('form/field', [
        'label'           => 'Time Slots',
        'input_component' => 'textarea',
        'input_props'     => [
          'name'        => 'time_slots',
          'rows'        => 5,
          'placeholder' => 'Add available time slots.',
        ],
      ]); ?>

      <?php component('form/field', [
        'label'           => 'Date Excludes',
        'input_component' => 'textarea',
        'input_props'     => [
          'name'        => 'date_excludes',
          'rows'        => 5,
          'placeholder' => 'Add excluded dates.',
        ],
      ]); ?>

      <?php component('form/field', [
        'label'           => 'Pax Price Setup',
        'input_component' => 'textarea',
        'input_props'     => [
          'name'        => 'pax_price_setup',
          'rows'        => 5,
          'placeholder' => 'Set up pax-based pricing notes.',
        ],
      ]); ?>
    </div>

    <div class="flex flex-wrap items-center gap-3 pt-2">
      <?php component('button', [
        'label'    => 'Save Package',
        'type'     => 'submit',
        'variant'  => 'default',
        'gradient' => true,
      ]); ?>

      <?php component('button', [
        'label'    => 'Preview Package',
        'type'     => 'button',
        'variant'  => 'secondary',
        'gradient' => true,
      ]); ?>
    </div>
  </form>
</article>
<?php layout('dashboard/partials/dashboard-end'); ?>
