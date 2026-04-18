<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Drawer';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$render_button_html = static function (array $button_options): string {
  ob_start();
  component('button', $button_options);
  return (string) ob_get_clean();
};

$drawer_right_close_button = $render_button_html([
  'label'      => 'Close',
  'variant'    => 'secondary',
  'size'       => 'md',
  'attributes' => [
    'data-drawer-close' => true,
  ],
]);
$drawer_right_save_button = $render_button_html([
  'label'   => 'Save',
  'variant' => 'default',
  'size'    => 'md',
]);

$drawer_action_duplicate = $render_button_html([
  'label'   => 'Duplicate Item',
  'variant' => 'secondary',
  'size'    => 'md',
  'class'   => 'w-full',
]);
$drawer_action_export = $render_button_html([
  'label'   => 'Export PDF',
  'variant' => 'secondary',
  'size'    => 'md',
  'class'   => 'w-full',
]);
$drawer_action_delete = $render_button_html([
  'label'   => 'Delete',
  'variant' => 'negative',
  'size'    => 'md',
  'class'   => 'w-full',
]);

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/drawer',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'title'       => 'Drawer',
    'subtitle'    => 'Reference for left, right, and bottom drawer patterns with transition-driven interaction.',
    'inner_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use drawer for contextual tasks that should not navigate away from the current page.</li>
      <li>Use right drawer for detail/edit flow, left drawer for navigation, and bottom drawer for quick actions.</li>
      <li>Keep one focused task per drawer to avoid overloaded content.</li>
      <li>Support close via close button, overlay click, and Escape key.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Right Drawer</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Standard pattern for details and edit workflow.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <?php component('drawer', [
          'drawer_id'            => 'drawer-right-details',
          'drawer_position'      => 'right',
          'drawer_title'         => 'Project Details',
          'drawer_trigger_label' => 'Open Right Drawer',
          'drawer_body_html'     => '<div class="space-y-3">' .
            '<p><span class="font-medium text-brand-900">Project:</span> HQ Retrofit Program</p>' .
            '<p><span class="font-medium text-brand-900">Owner:</span> Faris Engineering</p>' .
            '<p><span class="font-medium text-brand-900">Status:</span> In Progress</p>' .
            '<p><span class="font-medium text-brand-900">Scope:</span> Energy and envelope upgrades across 3 blocks.</p>' .
            '</div>',
          'drawer_footer_html'   => $drawer_right_close_button . $drawer_right_save_button,
        ]); ?>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Position Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use left and bottom positions for quick nav and action sheet style patterns.
      </p>
      <div class="mt-4 grid gap-4 md:grid-cols-2">
        <div class="rounded-md border border-dashed border-brand-300 bg-white p-4 space-y-3">
          <p class="text-sm text-brand-600">Left Drawer</p>
          <?php component('drawer', [
            'drawer_id'             => 'drawer-left-nav',
            'drawer_position'       => 'left',
            'drawer_title'          => 'Quick Navigation',
            'drawer_trigger_label'  => 'Open Left Drawer',
            'drawer_trigger_variant'=> 'secondary',
            'drawer_panel_class'    => 'max-w-sm',
            'drawer_body_html'      => '<nav><ul class="space-y-2 text-sm">' .
              '<li><a class="block rounded-md px-3 py-2 text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#">Overview</a></li>' .
              '<li><a class="block rounded-md px-3 py-2 text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#">Assessments</a></li>' .
              '<li><a class="block rounded-md px-3 py-2 text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#">Documents</a></li>' .
              '<li><a class="block rounded-md px-3 py-2 text-brand-700 hover:bg-brand-100 hover:text-brand-900" href="#">Settings</a></li>' .
              '</ul></nav>',
          ]); ?>
        </div>

        <div class="rounded-md border border-dashed border-brand-300 bg-white p-4 space-y-3">
          <p class="text-sm text-brand-600">Bottom Drawer</p>
          <?php component('drawer', [
            'drawer_id'             => 'drawer-bottom-sheet',
            'drawer_position'       => 'bottom',
            'drawer_title'          => 'Quick Actions',
            'drawer_trigger_label'  => 'Open Bottom Drawer',
            'drawer_trigger_variant'=> 'primary',
            'drawer_body_html'      => '<div class="space-y-2">' .
              $drawer_action_duplicate .
              $drawer_action_export .
              $drawer_action_delete .
              '</div>',
          ]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Left Size Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Use <code>drawer_size</code> to control panel width for left-side utility drawers.
      </p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="flex flex-wrap items-center gap-3">
          <?php component('drawer', [
            'drawer_id'            => 'drawer-left-md',
            'drawer_position'      => 'left',
            'drawer_size'          => 'md',
            'drawer_title'         => 'Drawer Left (MD)',
            'drawer_trigger_label' => 'Open Left MD',
            'drawer_trigger_variant'=> 'secondary',
            'drawer_body_html'     => '<div class="space-y-2 text-sm">' .
              '<p>Default medium panel for standard navigation lists.</p>' .
              '<p class="text-brand-500">Recommended for frequent but lightweight tasks.</p>' .
              '</div>',
          ]); ?>

          <?php component('drawer', [
            'drawer_id'            => 'drawer-left-lg',
            'drawer_position'      => 'left',
            'drawer_size'          => 'lg',
            'drawer_title'         => 'Drawer Left (LG)',
            'drawer_trigger_label' => 'Open Left LG',
            'drawer_trigger_variant'=> 'secondary',
            'drawer_body_html'     => '<div class="space-y-2 text-sm">' .
              '<p>Large panel for richer contextual workflows.</p>' .
              '<p class="text-brand-500">Suitable for forms and dense information blocks.</p>' .
              '</div>',
          ]); ?>

          <?php component('drawer', [
            'drawer_id'            => 'drawer-left-full',
            'drawer_position'      => 'left',
            'drawer_size'          => 'full',
            'drawer_title'         => 'Drawer Left (FULL)',
            'drawer_trigger_label' => 'Open Left FULL',
            'drawer_trigger_variant'=> 'secondary',
            'drawer_body_html'     => '<div class="space-y-2 text-sm">' .
              '<p>Full-width panel for immersive workspace takeover.</p>' .
              '<p class="text-brand-500">Use sparingly for high-focus operations.</p>' .
              '</div>',
          ]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Component API</h3>
      <p class="mt-2 max-w-3xl text-brand-600">
        Core props for using <code>component('drawer', [...])</code>.
      </p>
      <div class="mt-4 overflow-x-auto rounded-md border border-dashed border-brand-300 bg-white">
        <table class="min-w-full text-left text-sm">
          <thead class="bg-brand-100 text-brand-700">
            <tr>
              <th class="px-4 py-3 font-semibold">Prop</th>
              <th class="px-4 py-3 font-semibold">Type</th>
              <th class="px-4 py-3 font-semibold">Default</th>
              <th class="px-4 py-3 font-semibold">Description</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-brand-200 text-brand-700">
            <tr>
              <td class="px-4 py-3"><code>drawer_id</code></td>
              <td class="px-4 py-3">string</td>
              <td class="px-4 py-3">required</td>
              <td class="px-4 py-3">Unique id to bind trigger and drawer target.</td>
            </tr>
            <tr>
              <td class="px-4 py-3"><code>drawer_title</code></td>
              <td class="px-4 py-3">string</td>
              <td class="px-4 py-3"><code>Drawer</code></td>
              <td class="px-4 py-3">Header title displayed in the drawer panel.</td>
            </tr>
            <tr>
              <td class="px-4 py-3"><code>drawer_position</code></td>
              <td class="px-4 py-3">right | left | bottom</td>
              <td class="px-4 py-3"><code>right</code></td>
              <td class="px-4 py-3">Panel entry side and anchor behavior.</td>
            </tr>
            <tr>
              <td class="px-4 py-3"><code>drawer_size</code></td>
              <td class="px-4 py-3">md | lg | full</td>
              <td class="px-4 py-3"><code>md</code></td>
              <td class="px-4 py-3">Panel width/height variant depending on position.</td>
            </tr>
            <tr>
              <td class="px-4 py-3"><code>drawer_trigger_label</code></td>
              <td class="px-4 py-3">string</td>
              <td class="px-4 py-3"><code>Open Drawer</code></td>
              <td class="px-4 py-3">Trigger button label.</td>
            </tr>
            <tr>
              <td class="px-4 py-3"><code>drawer_trigger_variant</code></td>
              <td class="px-4 py-3">button variant</td>
              <td class="px-4 py-3"><code>default</code></td>
              <td class="px-4 py-3">Uses standard button component variant API.</td>
            </tr>
            <tr>
              <td class="px-4 py-3"><code>drawer_trigger_size</code></td>
              <td class="px-4 py-3">sm | md | lg</td>
              <td class="px-4 py-3"><code>md</code></td>
              <td class="px-4 py-3">Uses standard button component size API.</td>
            </tr>
            <tr>
              <td class="px-4 py-3"><code>drawer_body_html</code></td>
              <td class="px-4 py-3">string (HTML)</td>
              <td class="px-4 py-3"><code>''</code></td>
              <td class="px-4 py-3">Main drawer content area.</td>
            </tr>
            <tr>
              <td class="px-4 py-3"><code>drawer_footer_html</code></td>
              <td class="px-4 py-3">string (HTML)</td>
              <td class="px-4 py-3"><code>''</code></td>
              <td class="px-4 py-3">Optional footer action area.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
