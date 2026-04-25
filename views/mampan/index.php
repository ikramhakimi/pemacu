<?php

declare(strict_types=1);

$page_title   = 'Mampan';
$page_current = 'mampan';

$dashboard_users_grid_rows = [
  ['Aina Zulkifli', 'aina@aurorastudio.my', 'Active', 18, 'RM 12,400'],
  ['Mika Rahman', 'mika@northframe.co', 'Draft', 6, 'RM 4,200'],
  ['Siti Lim', 'siti@everlight.my', 'Active', 10, 'RM 7,500'],
  ['Daniel Chong', 'daniel@northframe.co', 'Pending', 4, 'RM 2,050'],
  ['Farah Nabila', 'farah@aurorastudio.my', 'Active', 13, 'RM 8,900'],
  ['Kevin Tan', 'kevin@everlight.my', 'Paused', 2, 'RM 760'],
];

layout('mampan/partials/dashboard-start', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
]);
?>
<header class="app-header border-b border-brand-200 py-6 px-4 md:px-6 -mx-4 md:-mx-6">
  <div>
    <h1 class="text-3xl font-semibold leading-none text-brand-900">Overview</h1>
    <p class="mt-4 max-w-2xl text-brand-600">
      Monitor bookings, revenue, and recent updates for your studio in one place.
    </p>
  </div>
</header>
<article class="app-article pb-20 pt-1 space-y-1 -mx-5">
  <section aria-labelledby="dashboard-kpi-heading">
    <h2 id="dashboard-kpi-heading" class="sr-only">Key metrics</h2>
    <div class="grid gap-1 sm:grid-cols-2 lg:grid-cols-4">
      <?php component('widget', [
        'widget_icon_name'  => 'calendar-check-line',
        'widget_caption'    => 'Today Bookings',
        'widget_number'     => '12',
        'widget_tone'       => 'positive',
        'widget_badge'      => '+20%',
        'widget_info'       => 'from yesterday',
        'widget_class_name' => 'bg-brand-50 hover:bg-white transition ease-in-out p-5 h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'time-line',
        'widget_caption'    => 'Pending Sessions',
        'widget_number'     => '8',
        'widget_tone'       => 'warning',
        'widget_badge'      => 'Pending',
        'widget_info'       => 'Requires confirmation',
        'widget_class_name' => 'bg-brand-50 hover:bg-white transition ease-in-out p-5 h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'money-dollar-circle-line',
        'widget_caption'    => 'Monthly Revenue',
        'widget_number'     => 'RM 14,280',
        'widget_tone'       => 'positive',
        'widget_badge'      => '+9%',
        'widget_info'       => 'from last month',
        'widget_class_name' => 'bg-brand-50 hover:bg-white transition ease-in-out p-5 h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'star-line',
        'widget_caption'    => 'Client Satisfaction',
        'widget_number'     => '4.9/5',
        'widget_tone'       => 'info',
        'widget_badge'      => 'Reviews',
        'widget_info'       => 'Based on 96 reviews',
        'widget_class_name' => 'bg-brand-50 hover:bg-white transition ease-in-out p-5 h-full',
      ]); ?>
    </div>
  </section>

  <section class="grid gap-1 grid-cols-2">
    <div class="grid gap-1 sm:grid-cols-2 lg:grid-cols-2">
      <?php component('widget', [
        'widget_icon_name'  => 'calendar-check-line',
        'widget_caption'    => 'Today Bookings',
        'widget_number'     => '12',
        'widget_tone'       => 'positive',
        'widget_badge'      => '+20%',
        'widget_info'       => 'from yesterday',
        'widget_class_name' => 'bg-brand-50 hover:bg-white transition ease-in-out p-5 h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'time-line',
        'widget_caption'    => 'Pending Sessions',
        'widget_number'     => '8',
        'widget_tone'       => 'warning',
        'widget_badge'      => 'Pending',
        'widget_info'       => 'Requires confirmation',
        'widget_class_name' => 'bg-brand-50 hover:bg-white transition ease-in-out p-5 h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'money-dollar-circle-line',
        'widget_caption'    => 'Monthly Revenue',
        'widget_number'     => 'RM 14,280',
        'widget_tone'       => 'positive',
        'widget_badge'      => '+9%',
        'widget_info'       => 'from last month',
        'widget_class_name' => 'bg-brand-50 hover:bg-white transition ease-in-out p-5 h-full',
      ]); ?>
      <?php component('widget', [
        'widget_icon_name'  => 'star-line',
        'widget_caption'    => 'Client Satisfaction',
        'widget_number'     => '4.9/5',
        'widget_tone'       => 'info',
        'widget_badge'      => 'Reviews',
        'widget_info'       => 'Based on 96 reviews',
        'widget_class_name' => 'bg-brand-50 hover:bg-white transition ease-in-out p-5 h-full',
      ]); ?>
    </div>
    <div class="<?= card('p-5 bg-brand-50 h-full hover:bg-white transition ease-in-out'); ?>">
      Column A
    </div>
  </section>

  <section class="grid gap-1 grid-cols-2">
    <div class="<?= card('p-5 bg-brand-50 hover:bg-white transition ease-in-out h-full'); ?>">
      <header class="pb-5 mb-2 border-b border-color-200">
        <div>
          <h2 class="text-xs font-medium text-brand-500 uppercase mb-2">Upcoming Sessions</h2>
          <p class="mt-1 text-base text-brand-900">Next confirmed appointments for today and tomorrow.</p>
        </div>
      </header>
      <article class="divide-y divide-brand-200">
        <div class="grid grid-cols-5 py-3">
          <div class="col-span-1">Today</div>
          <ul class="col-span-4 divide-y divide-dashed divide-brand-200" aria-label="Upcoming sessions list">
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-semibold text-brand-900">Nur Aisyah - Bridal Shoot</p>
                  <p class="text-brand-600">Studio A</p>
                </div>
                <p class="font-medium text-brand-700">10:00 AM</p>
              </div>
            </li>
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-semibold text-brand-900">Daniel Lee - Product Session</p>
                  <p class="text-brand-600">Studio C</p>
                </div>
                <p class="font-medium text-brand-700">12:30 PM</p>
              </div>
            </li>
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-semibold text-brand-900">Ariana Tan - Family Portrait</p>
                  <p class="text-brand-600">Outdoor Team</p>
                </div>
                <p class="font-medium text-brand-700">3:00 PM</p>
              </div>
            </li>
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-semibold text-brand-900">Khairul &amp; Maya - Engagement</p>
                  <p class="text-brand-600">Studio B</p>
                </div>
                <p class="font-medium text-brand-700">5:30 PM</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="grid grid-cols-5 py-3">
          <div class="col-span-1">Apr 20</div>
          <ul class="col-span-4 divide-y divide-dashed divide-brand-200" aria-label="Upcoming sessions list">
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-semibold text-brand-900">Nur Aisyah - Bridal Shoot</p>
                  <p class="text-brand-600">Studio A</p>
                </div>
                <p class="font-medium text-brand-700">10:00 AM</p>
              </div>
            </li>
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-semibold text-brand-900">Daniel Lee - Product Session</p>
                  <p class="text-brand-600">Studio C</p>
                </div>
                <p class="font-medium text-brand-700">12:30 PM</p>
              </div>
            </li>
          </ul>
        </div>
      </article>
    </div>
    <div class="<?= card('p-5 bg-brand-50 hover:bg-white transition ease-in-out h-full'); ?>">
      <header class="pb-5 mb-2 border-b border-color-200">
        <div>
          <h2 class="text-xs font-medium   text-brand-500 uppercase mb-2">Recent Orders</h2>
          <p class="mt-1 text-base text-brand-900">Latest package orders and payment status.</p>
        </div>
      </header>
      <article class="divide-y divide-brand-200">
        <div class="grid grid-cols-5 py-3">
          <div class="col-span-1">Today</div>
          <ul class="col-span-4 divide-y divide-dashed divide-brand-200" aria-label="Recent orders list">
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-medium text-brand-900">ORD-4821 - Wedding Essential</p>
                  <p class="text-brand-500">Client: Farah Nabila</p>
                </div>
                <div class="text-right">
                  <p class="font-medium text-brand-900">RM 1,280</p>
                  <p class="text-xs text-positive-700">Paid</p>
                </div>
              </div>
            </li>
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-medium text-brand-900">ORD-4818 - Corporate Profile</p>
                  <p class="text-brand-600">Client: Northframe Co</p>
                </div>
                <div class="text-right">
                  <p class="font-medium text-brand-900">RM 890</p>
                  <p class="text-xs text-amber-700">Pending</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="grid grid-cols-5 py-3">
          <div class="col-span-1">Apr 20</div>
          <ul class="col-span-4 divide-y divide-dashed divide-brand-200" aria-label="Recent orders list">
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-medium text-brand-900">ORD-4815 - Newborn Session</p>
                  <p class="text-brand-600">Client: Amelia Wong</p>
                </div>
                <div class="text-right">
                  <p class="font-medium text-brand-900">RM 650</p>
                  <p class="text-xs text-positive-700">Paid</p>
                </div>
              </div>
            </li>
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-medium text-brand-900">ORD-4809 - Graduation Studio</p>
                  <p class="text-brand-600">Client: Mika Rahman</p>
                </div>
                <div class="text-right">
                  <p class="font-medium text-brand-900">RM 420</p>
                  <p class="text-xs text-brand-700">Deposit</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="grid grid-cols-5 py-3">
          <div class="col-span-1">Apr 19</div>
          <ul class="col-span-4 divide-y divide-dashed divide-brand-200" aria-label="Recent orders list">
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-medium text-brand-900">ORD-4815 - Newborn Session</p>
                  <p class="text-brand-600">Client: Amelia Wong</p>
                </div>
                <div class="text-right">
                  <p class="font-medium text-brand-900">RM 650</p>
                  <p class="text-xs text-positive-700">Paid</p>
                </div>
              </div>
            </li>
            <li class="py-3 first:pt-0 last:pb-0">
              <div class="flex items-start justify-between gap-3">
                <div>
                  <p class="font-medium text-brand-900">ORD-4809 - Graduation Studio</p>
                  <p class="text-brand-600">Client: Mika Rahman</p>
                </div>
                <div class="text-right">
                  <p class="font-medium text-brand-900">RM 420</p>
                  <p class="text-xs text-brand-700 leading-5">Deposit</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </article>
    </div>
  </section>

  <section class="border-t border-brand-200 -mx-4 md:-mx-6 grid grid-cols-4 divide-x divide-brand-200">
    <div class="p-6">Column A</div>
    <div class="p-6">Column B</div>
    <div class="p-6">Column C</div>
    <div class="p-6">Column D</div>
  </section>

  <section class="hidden" aria-labelledby="dashboard-packages-table-heading">
    <h2 id="dashboard-packages-table-heading" class="text-base font-semibold text-brand-900">
      Recent Packages
    </h2>
    <div class="dashboard-table-wrap mt-3">
      <div id="dashboard-users-grid" class="dashboard-users-grid"></div>
    </div>
  </section>
  <script id="dashboard-users-grid-data" type="application/json"><?= (string) json_encode($dashboard_users_grid_rows, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?></script>

  <form class="space-y-5 max-w-4xl hidden">
    <div class="grid lg:w-3/4">
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

    <div class="grid gap-4 md:grid-cols-3">
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

    <div class="grid lg:w-3/4">
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

    <div class="grid gap-4 md:grid-cols-3">
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
<?php layout('mampan/partials/dashboard-end'); ?>
