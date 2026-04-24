<?php

declare(strict_types=1);

$page_title   = 'Assessment Form';
$page_current = 'dashboard';

layout('dashboard/partials/dashboard-start', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'dashboard_no_sidebar' => true,
]);

require_once dirname(__DIR__, 2) . '/include/assessment-form-data.php';

$assessment_source = assessment_form_data();
$status_legend     = assessment_status_legend();
$assessment_items_map = assessment_form_items_map($assessment_source);
$assessment_categories = isset($assessment_source['categories']) && is_array($assessment_source['categories'])
  ? array_values($assessment_source['categories'])
  : [];
$assessment_bottom_nav_items = [];

$render_button_html = static function (array $button_options): string {
  ob_start();
  component('button', $button_options);
  return (string) ob_get_clean();
};

$drawer_cancel_button = $render_button_html([
  'label'      => 'Cancel',
  'variant'    => 'secondary',
  'gradient'   => true,
  'size'       => 'md',
  'attributes' => [
    'data-drawer-close' => true,
  ],
]);

$drawer_save_button = $render_button_html([
  'label'    => 'Save',
  'variant'  => 'primary',
  'gradient' => true,
  'icon_name' => 'check-line',
  'size'     => 'md',
]);

foreach ($assessment_items_map as $item_key => $item_data) {
  if (!is_string($item_key) || !is_array($item_data)) {
    continue;
  }

  $scoring = isset($item_data['scoring']) && is_array($item_data['scoring'])
    ? $item_data['scoring']
    : [];
  $options = isset($scoring['options']) && is_array($scoring['options'])
    ? $scoring['options']
    : [];
  $mode = isset($scoring['mode']) ? (string) $scoring['mode'] : 'sum';

  if ($options === []) {
    continue;
  }

  $options_markup = [];
  foreach ($options as $option_index => $option) {
    if (!is_array($option)) {
      continue;
    }

    $option_points = isset($option['points']) && is_numeric($option['points'])
      ? (int) $option['points']
      : 0;
    $option_label = isset($option['label']) ? (string) $option['label'] : (string) $option_points;
    $option_description = isset($option['description']) ? (string) $option['description'] : '';
    $option_checked = isset($option['selected']) ? (bool) $option['selected'] : false;
    $option_id = 'assessment-option-' . $item_key . '-' . (string) $option_index;
    $option_name = $mode === 'max'
      ? 'assessment_option_' . $item_key
      : 'assessment_option_' . $item_key . '[]';

    ob_start();
    component('checkbox', [
      'id'         => $option_id,
      'name'       => $option_name,
      'value'      => (string) $option_points,
      'label'      => $option_label,
      'checked'    => $option_checked,
      'class'      => 'assessment-drawer-option border border-brand-300 p-2 rounded-md bg-white bg-gradient-to-b from-white to-brand-100 font-mono w-[64px]',
      'attributes' => [
        'data-assessment-option-input' => true,
        'data-assessment-option-mode'  => $mode,
        'data-assessment-item-key'     => $item_key,
      ],
    ]);
    $option_checkbox = (string) ob_get_clean();

    $options_markup[] = '<div class="flex items-start gap-3">' .
      '<div class="shrink-0 self-start">' . $option_checkbox . '</div>' .
      '<div class="self-center text-brand-800">' . e($option_description) . '</div>' .
      '</div>';
  }

  $assessment_items_map[$item_key]['scoring']['options_html'] = implode('', $options_markup);
}

foreach ($assessment_categories as $category_index => $assessment_category) {
  if (!is_array($assessment_category)) {
    continue;
  }

  $category_key_raw = isset($assessment_category['category_key'])
    ? strtolower(trim((string) $assessment_category['category_key']))
    : '';
  $category_key = preg_replace('/[^a-z0-9-]+/', '-', $category_key_raw);
  $category_key = trim((string) $category_key, '-');

  if ($category_key === '') {
    $category_key = 'cat-' . (string) ($category_index + 1);
  }

  $assessment_bottom_nav_items[] = [
    'anchor_id'      => 'assessment-category-' . $category_key,
    'category_code'  => strtoupper($category_key),
    'category_title' => isset($assessment_category['category_title']) ? (string) $assessment_category['category_title'] : 'Assessment Category',
    'category_icon'  => isset($assessment_category['category_icon']) ? (string) $assessment_category['category_icon'] : '',
  ];
}
?>
<article class="app-article mx-auto max-w-6xl pb-28">
  <header class="border-b border-brand-200 pb-6">
    <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Assessment Workspace</p>
    <h1 class="mt-2 text-3xl font-semibold leading-tight text-brand-900">Credit Assessment</h1>
    <p class="mt-2 max-w-3xl text-sm text-brand-600">
      Review each credit as a focused record card with progress, evidence status, and quick next action.
    </p>
  </header>

  <?php
  $assessment_widgets = [
    [
      'widget_state'       => 'positive',
      'widget_icon_name'   => 'flashlight-line',
      'widget_title'       => 'Energy Efficiency',
      'widget_description' => 'Measures energy-saving strategies across systems and operations.',
      'widget_score'       => 26,
      'widget_max'         => 35,
    ],
    [
      'widget_state'       => 'negative',
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

  <div id="assessment-widgets-brand" class="assessment-widget-grid mt-6 grid gap-4 sm:grid-cols-2 xl:grid-cols-2" aria-label="Assessment category widgets">
    <?php foreach ($assessment_widgets as $assessment_widget): ?>
      <?php component('dashboard/widget-assessment', $assessment_widget); ?>
    <?php endforeach; ?>
  </div>
  <div class="mt-4 text-brand-500 px-5 py-2 border border-dashed border-brand-300 rounded-lg">
    Scores are based on documented sustainable practices and verified data inputs across each category.
  </div>

  <section class="mt-10" aria-labelledby="assessment-records-heading">
    <div class="bg-white px-5 py-3 flex items-center gap-8 rounded-lg border border-brand-300 mb-5">
      <?php foreach ($status_legend as $legend): ?>
        <div class="flex items-center justify-start gap-2">
          <?php component('dashboard/assessment-status', ['assessment_status' => $legend['key']]); ?>
          <div><?= e((string) $legend['label']); ?></div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="space-y-8">
      <?php foreach ($assessment_categories as $category_index => $assessment_category): ?>
        <?php $assessment_sections = assessment_sections_view_model($assessment_category); ?>
        <?php
        $category_key = isset($assessment_category['category_key'])
          ? strtolower(trim((string) $assessment_category['category_key']))
          : '';
        $category_slug = preg_replace('/[^a-z0-9-]+/', '-', $category_key);
        $category_slug = trim((string) $category_slug, '-');
        if ($category_slug === '') {
          $category_slug = 'category-' . (string) ($category_index + 1);
        }
        $category_anchor_id = 'assessment-category-' . $category_slug;
        ?>
        <div
          id="<?= e($category_anchor_id); ?>"
          class="bg-brand-900 rounded-lg p-1 scroll-mt-24 js-assessment-form-category-section"
          data-assessment-category-anchor="<?= e($category_anchor_id); ?>"
        >
          <div class="px-4 pt-3 pb-4 flex items-center justify-start gap-4">
            <div class="assessment-icon flex items-center justify-center rounded-md bg-brand-700 text-brand-800 px-5 py-4">
              <?php if (isset($assessment_category['category_icon']) && trim((string) $assessment_category['category_icon']) !== ''): ?>
                <?php icon((string) $assessment_category['category_icon'], ['icon_size' => '20', 'icon_class' => 'text-brand-300']); ?>
              <?php endif; ?>
            </div>
            <div>
              <h3 class="text-xl text-white font-medium"><?= e((string) $assessment_category['category_title']); ?></h3>
              <?php if (isset($assessment_category['category_subtitle']) && trim((string) $assessment_category['category_subtitle']) !== ''): ?>
                <p class="mt-1 text-sm text-brand-300"><?= e((string) $assessment_category['category_subtitle']); ?></p>
              <?php endif; ?>
            </div>
          </div>

          <div class="space-y-1">
            <?php foreach ($assessment_sections as $section): ?>
              <section class="bg-brand-50 rounded-lg p-4">
                <header class="flex items-center justify-between mb-4">
                  <h4 class="assessment-subheading font-medium text-base text-brand-900"><?= e((string) $section['section_title']); ?></h4>
                  <?php
                  $section_visible_legend = array_values(array_filter(
                    $status_legend,
                    static fn (array $legend): bool => (int) ($section['counts'][$legend['key']] ?? 0) > 0,
                  ));
                  ?>
                  <?php if ($section_visible_legend !== []): ?>
                    <div class="assessment-radar font-mono flex items-center gap-6">
                      <?php foreach ($section_visible_legend as $legend): ?>
                        <div class="flex items-center justify-start gap-2">
                          <?php component('dashboard/assessment-status', ['assessment_status' => $legend['key']]); ?>
                          <div><?= e((string) $section['counts'][$legend['key']]); ?></div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </header>

                <div class="space-y-1">
                  <?php foreach ($section['bars'] as $bar): ?>
                    <?php component('dashboard/assessment-bar', $bar); ?>
                  <?php endforeach; ?>
                </div>
              </section>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
</article>

<?php if ($assessment_bottom_nav_items !== []): ?>
  <nav
    aria-label="Assessment categories"
    class="fixed inset-x-0 bottom-2 z-50 flex justify-center px-4 pointer-events-none js-assessment-form-bottom-nav"
    data-assessment-bottom-nav
  >
    <div
      class="pointer-events-auto relative w-full max-w-3xl rounded-lg border border-brand-900 bg-brand-800 backdrop-blur-2xl backdrop-saturate-150 shadow-2xl shadow-brand-900"
      style="-webkit-backdrop-filter: blur(100px) saturate(200%); backdrop-filter: blur(100px) saturate(150%);"
    >
      <div class="pointer-events-none absolute inset-0 rounded-lg bg-gradient-to-b from-brand-700 via-brand-800 to-brand-900 opacity-35"></div>
      <div class="font-mono relative z-10 flex items-center justify-start gap-1 overflow-x-auto px-1 py-2 sm:justify-center">
        <?php foreach ($assessment_bottom_nav_items as $nav_item): ?>
          <a
            href="#<?= e((string) $nav_item['anchor_id']); ?>"
            class="inline-flex min-w-[72px] items-center justify-center gap-2 rounded-md border border-transparent px-3 py-2 text-xs font-semibold tracking-wide text-brand-200 transition-all duration-300 ease-out 
            hover:bg-brand-700 
            hover:text-brand-50 
            focus:outline-none 
            focus-visible:ring-2 
            focus-visible:ring-brand-700 
            focus-visible:ring-offset-2 
            focus-visible:ring-offset-brand-900 
            js-assessment-form-bottom-nav-link"
            data-assessment-nav-link="<?= e((string) $nav_item['anchor_id']); ?>"
            aria-label="<?= e((string) $nav_item['category_title']); ?>"
            title="<?= e((string) $nav_item['category_title']); ?>"
          >
            <?php if (trim((string) $nav_item['category_icon']) !== ''): ?>
              <?php icon((string) $nav_item['category_icon'], ['icon_size' => '16', 'icon_class' => 'text-brand-50']); ?>
            <?php endif; ?>
            <span class="text-brand-50"><?= e((string) $nav_item['category_code']); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </nav>
<?php endif; ?>

<script id="assessment-form-items-data" type="application/json"><?= (string) json_encode($assessment_items_map, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?></script>

<?php component('drawer', [
  'id'          => 'assessment-form-item-drawer',
  'title'       => 'Assessment Details',
  'position'    => 'right',
  'size'        => 'lg',
  'show_trigger'=> false,
  'body_html'   => '<div class="space-y-4 js-assessment-form-drawer-content">' .
    '<p class="text-sm text-brand-500">Select an assessment item to load its form details.</p>' .
    '</div>',
  'footer_html' => $drawer_cancel_button . $drawer_save_button,
]); ?>

<?php layout('dashboard/partials/dashboard-end'); ?>
