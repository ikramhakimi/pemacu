<?php

declare(strict_types=1);

$page_title   = 'Upload Center';
$page_current = 'client-upload-center';

$phase_presets = [
  'phase-1' => [
    'label'       => 'Phase 1 - Design / Planning',
    'stage'       => 'Initial Upload Collection',
    'description' => 'Upload initial design and technical documents required after project setup.',
    'updated_at'  => 'April 26, 2026 - 9:00 AM',
  ],
  'phase-2' => [
    'label'       => 'Phase 2 - Implementation / Construction',
    'stage'       => 'Implementation Evidence Upload',
    'description' => 'Upload implementation and construction evidence files.',
    'updated_at'  => 'May 12, 2026 - 10:30 AM',
  ],
  'phase-3' => [
    'label'       => 'Phase 3 - Evidence Verification / Submission',
    'stage'       => 'Final Submission Upload',
    'description' => 'Upload final evidence and supporting records for submission.',
    'updated_at'  => 'June 03, 2026 - 11:15 AM',
  ],
];

$selected_phase_key = isset($_GET['phase']) ? trim((string) $_GET['phase']) : 'phase-1';

if (!isset($phase_presets[$selected_phase_key])) {
  $selected_phase_key = 'phase-1';
}

$selected_phase = $phase_presets[$selected_phase_key];

$uploads_by_phase = [
  'phase-1' => [
    [
      'document_name' => 'Architectural drawings',
      'why'           => 'Required for design review and baseline site/space strategy checks.',
      'linked_area'   => 'SM, EQ',
      'due_date'      => '2026-04-27',
      'status'        => 'Required',
      'action_label'  => 'Upload File',
      'action_href'   => '#',
    ],
    [
      'document_name' => 'M&E drawings',
      'why'           => 'Required to evaluate energy and water systems design intent.',
      'linked_area'   => 'EE, WE',
      'due_date'      => '2026-04-27',
      'status'        => 'Required',
      'action_label'  => 'Upload File',
      'action_href'   => '#',
    ],
    [
      'document_name' => 'Energy model report',
      'why'           => 'Required for preliminary energy performance assessment.',
      'linked_area'   => 'EE',
      'due_date'      => '2026-04-28',
      'status'        => 'Required',
      'action_label'  => 'Upload File',
      'action_href'   => '#',
    ],
    [
      'document_name' => 'Commissioning documents',
      'why'           => 'Required to confirm commissioning scope and verification path.',
      'linked_area'   => 'EE, EQ',
      'due_date'      => '2026-04-29',
      'status'        => 'Required',
      'action_label'  => 'Upload File',
      'action_href'   => '#',
    ],
    [
      'document_name' => 'Material certificates',
      'why'           => 'Required for material compliance and specification checks.',
      'linked_area'   => 'MR, EQ',
      'due_date'      => '2026-04-29',
      'status'        => 'Required',
      'action_label'  => 'Upload File',
      'action_href'   => '#',
    ],
    [
      'document_name' => 'Water system documents',
      'why'           => 'Required for water baseline and system compliance review.',
      'linked_area'   => 'WE',
      'due_date'      => '2026-04-30',
      'status'        => 'Required',
      'action_label'  => 'Upload File',
      'action_href'   => '#',
    ],
  ],
  'phase-2' => [
    [
      'document_name' => 'As-built M&E drawings',
      'why'           => 'Required to verify implementation against approved intent.',
      'linked_area'   => 'EE, WE',
      'due_date'      => '2026-05-18',
      'status'        => 'Required',
      'action_label'  => 'Upload File',
      'action_href'   => '#',
    ],
  ],
  'phase-3' => [
    [
      'document_name' => 'Final verification pack',
      'why'           => 'Required for submission finalization and verifier checks.',
      'linked_area'   => 'All Credits',
      'due_date'      => '2026-06-10',
      'status'        => 'Required',
      'action_label'  => 'Upload File',
      'action_href'   => '#',
    ],
  ],
];

$uploads = isset($uploads_by_phase[$selected_phase_key]) ? $uploads_by_phase[$selected_phase_key] : [];

$phase_dropdown_items = [];

foreach ($phase_presets as $phase_key => $phase_preset) {
  $phase_dropdown_items[] = [
    'label'      => (string) $phase_preset['label'],
    'href'       => path('/mampan/client/upload-center') . '?phase=' . urlencode($phase_key),
    'item_class' => $phase_key === $selected_phase_key ? 'bg-brand-100 text-brand-900' : '',
  ];
}

layout('mampan/dashboard-client', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Upload the required files here. Each item explains why it is needed.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <section class="rounded-lg border border-brand-200 bg-white p-5" aria-labelledby="upload-phase-heading">
    <h2 id="upload-phase-heading" class="text-lg font-semibold text-brand-900">Upload Phase</h2>
    <p class="mt-1 text-sm text-brand-600"><?= e((string) $selected_phase['description']); ?></p>

    <dl class="mt-4 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
      <div>
        <dt class="text-xs uppercase tracking-wide text-brand-500">Current Phase</dt>
        <dd class="mt-1 text-sm font-medium text-brand-900">
          <?php component('dropdown', [
            'dropdown_id' => 'client-upload-phase-switcher',
            'trigger'     => [
              'type'      => 'link',
              'label'     => (string) $selected_phase['label'],
              'icon_name' => 'arrow-down-s-line',
              'class'     => 'text-sm font-medium no-underline hover:no-underline',
            ],
            'menu'        => [
              'min_width_class' => 'min-w-[320px]',
            ],
            'items'       => $phase_dropdown_items,
          ]); ?>
        </dd>
      </div>
      <div>
        <dt class="text-xs uppercase tracking-wide text-brand-500">Current Stage</dt>
        <dd class="mt-1 text-sm font-medium text-brand-900"><?= e((string) $selected_phase['stage']); ?></dd>
      </div>
      <div>
        <dt class="text-xs uppercase tracking-wide text-brand-500">Last Updated</dt>
        <dd class="mt-1 text-sm font-medium text-brand-900"><?= e((string) $selected_phase['updated_at']); ?></dd>
      </div>
    </dl>
  </section>

  <?php component('client/client-upload-list', [
    'section_title'       => 'Required Documents',
    'section_description' => 'Upload or update files to keep your submission complete.',
    'uploads'             => $uploads,
  ]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
