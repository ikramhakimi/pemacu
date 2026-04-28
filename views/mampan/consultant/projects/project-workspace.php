<?php

declare(strict_types=1);

$page_title   = 'Project Workspace';

require __DIR__ . '/../_data/phase_data.php';
$current_phase = resolve_mampan_current_phase($phase_data_map);
$current_phase_data = $phase_data_map[$current_phase];
$page_current = 'consultant-projects';
$project_current = 'project-workspace';
$workspace_phase_data = isset($current_phase_data['workspace']) && is_array($current_phase_data['workspace'])
  ? $current_phase_data['workspace']
  : [];
$phase_meta = isset($phase_label_map[$current_phase]) && is_array($phase_label_map[$current_phase])
  ? $phase_label_map[$current_phase]
  : [];
$phase_title = isset($phase_meta['title']) ? trim((string) $phase_meta['title']) : 'Phase';
$phase_subtitle = isset($phase_meta['subtitle']) ? trim((string) $phase_meta['subtitle']) : 'Setup & Planning';
$workspace_documents = isset($workspace_phase_data['documents']) ? (string) $workspace_phase_data['documents'] : '0';
$workspace_clarifications = isset($workspace_phase_data['clarifications']) ? (string) $workspace_phase_data['clarifications'] : '0';
$workspace_evidence_verified = isset($workspace_phase_data['evidence_verified']) ? (string) $workspace_phase_data['evidence_verified'] : '0';
$workspace_submission_status = isset($workspace_phase_data['submission_status']) ? (string) $workspace_phase_data['submission_status'] : 'Not Ready';
$workspace_requirement_readiness = isset($workspace_phase_data['requirement_readiness'])
  ? (string) $workspace_phase_data['requirement_readiness']
  : '0%';

$project_header = [
  'project_name'     => 'Menara Harmoni Office Retrofit',
  'project_code'     => 'GBI-NRNC-2026-014',
  'client_company'   => 'Harmoni Asset Holdings Berhad',
  'project_location' => 'Jalan Tun Razak, Kuala Lumpur',
  'gbi_tool_type'    => 'GBI NRNC: Existing Building',
  'target_rating'    => 'GBI Gold',
  'project_status'   => $workspace_submission_status,
  'consultant_lead'  => 'Ir. Aisyah Kamaruddin',
  'client_pic'       => 'Faizal Rahman (Head of Projects)',
  'action_items'     => [
    ['label' => 'Upload Document', 'tone' => 'neutral', 'href' => path('/mampan/consultant/documents/document-hub')],
    ['label' => 'Add RFI', 'tone' => 'neutral', 'href' => path('/mampan/consultant/rfi/rfi-index')],
    ['label' => 'Generate Report', 'tone' => 'primary', 'href' => path('/mampan/consultant/reports/gap-analysis-report')],
    ['label' => 'Final Submission', 'tone' => 'neutral', 'href' => path('/mampan/consultant/submission/submission-package')],
  ],
];

$summary_cards = [
  ['label' => 'Current Stage', 'value' => $phase_title . ' - ' . $phase_subtitle, 'helper' => 'Active project phase', 'tone' => 'neutral'],
  ['label' => 'Requirement Readiness', 'value' => $workspace_requirement_readiness, 'helper' => 'Readiness in current phase', 'tone' => 'warning'],
  ['label' => 'Open RFIs', 'value' => $workspace_clarifications, 'helper' => 'Clarification count in current phase', 'tone' => 'warning'],
  ['label' => 'Documents Submitted', 'value' => $workspace_documents, 'helper' => 'Documents tracked in current phase', 'tone' => 'positive'],
  ['label' => 'Evidence Verified', 'value' => $workspace_evidence_verified, 'helper' => 'Verified evidence count', 'tone' => 'positive'],
  ['label' => 'Submission Status', 'value' => $workspace_submission_status, 'helper' => 'Overall package readiness state', 'tone' => 'neutral'],
];

$stage_timeline = [
  [
    'name'        => 'Project Award',
    'owner'       => 'Client Procurement Team',
    'status'      => 'Completed',
    'due_date'    => '2026-01-15',
    'description' => 'Appointment letter and sustainability scope confirmed.',
  ],
  [
    'name'        => 'Client Provide Drawings',
    'owner'       => 'Client Design Coordinator',
    'status'      => 'Completed',
    'due_date'    => '2026-01-29',
    'description' => 'Architectural, M&E, and as-built drawings were submitted.',
  ],
  [
    'name'        => 'Gap Analysis Review',
    'owner'       => 'GBI Consultant Team',
    'status'      => 'Completed',
    'due_date'    => '2026-02-10',
    'description' => 'Baseline score and shortfall items reviewed with project stakeholders.',
  ],
  [
    'name'        => 'Workshop',
    'owner'       => 'GBI Consultant + Client Team',
    'status'      => 'Completed',
    'due_date'    => '2026-02-18',
    'description' => 'Credit ownership and evidence strategy aligned across teams.',
  ],
  [
    'name'        => 'Final Gap Analysis Report',
    'owner'       => 'GBI Consultant Team',
    'status'      => 'Under Review',
    'due_date'    => '2026-03-01',
    'description' => 'Final report issued for management sign-off and budget alignment.',
  ],
  [
    'name'        => 'Evidence Collection',
    'owner'       => 'Client Facility + M&E Team',
    'status'      => 'In Progress',
    'due_date'    => '2026-04-30',
    'description' => 'Operation logs, commissioning reports, and procurement records in progress.',
  ],
  [
    'name'        => 'Verification Review',
    'owner'       => 'GBI Consultant Team',
    'status'      => 'Waiting Client',
    'due_date'    => '2026-05-12',
    'description' => 'Pending full AHU commissioning and water meter calibration records.',
  ],
  [
    'name'        => 'Final Submission Package',
    'owner'       => 'GBI Consultant Team',
    'status'      => 'Not Started',
    'due_date'    => '2026-05-26',
    'description' => 'Compilation of verified credits and final submission forms.',
  ],
];

$score_snapshot = [
  'target_rating'           => 'GBI Gold (66-75)',
  'current_estimated_score' => '68 / 100',
  'potential_score'         => '74 / 100',
  'verified_score'          => '56 / 100',
  'credits_at_risk'         => '6 points (EE2, WE3, MR2)',
  'criteria_rows'           => [
    ['code' => 'EE', 'label' => 'Energy Efficiency', 'score' => 24, 'max_score' => 35],
    ['code' => 'EQ', 'label' => 'Indoor Environment Quality', 'score' => 9, 'max_score' => 21],
    ['code' => 'SM', 'label' => 'Sustainable Site Planning', 'score' => 10, 'max_score' => 16],
    ['code' => 'MR', 'label' => 'Materials & Resources', 'score' => 7, 'max_score' => 11],
    ['code' => 'WE', 'label' => 'Water Efficiency', 'score' => 8, 'max_score' => 10],
    ['code' => 'IN', 'label' => 'Innovation', 'score' => 2, 'max_score' => 7],
  ],
];

$pending_actions = [
  'client_actions' => [
    [
      'title'        => 'Submit chilled water system trend logs (3 months)',
      'related_item' => 'EE2 - Energy Monitoring',
      'priority'     => 'High',
      'due_date'     => '2026-04-27',
      'owner'        => 'Mechanical Engineer (Client)',
    ],
    [
      'title'        => 'Upload certified low-VOC paint declarations',
      'related_item' => 'EQ4 - Low Emitting Materials',
      'priority'     => 'Medium',
      'due_date'     => '2026-04-29',
      'owner'        => 'Procurement Manager',
    ],
    [
      'title'        => 'Provide rainwater harvesting O&M manual',
      'related_item' => 'WE3 - Water Reuse',
      'priority'     => 'Medium',
      'due_date'     => '2026-04-30',
      'owner'        => 'Facility Manager',
    ],
  ],
  'consultant_actions' => [
    [
      'title'        => 'Review draft commissioning report and mark evidence gaps',
      'related_item' => 'EE Commissioning Credits',
      'priority'     => 'High',
      'due_date'     => '2026-04-28',
      'owner'        => 'Ir. Aisyah Kamaruddin',
    ],
    [
      'title'        => 'Prepare RFI package for missing procurement certificates',
      'related_item' => 'MR2 - Sustainable Materials',
      'priority'     => 'Medium',
      'due_date'     => '2026-04-29',
      'owner'        => 'Technical Coordinator',
    ],
    [
      'title'        => 'Update score projection for steering committee deck',
      'related_item' => 'Monthly Progress Report',
      'priority'     => 'Low',
      'due_date'     => '2026-05-02',
      'owner'        => 'Project Analyst',
    ],
  ],
];

$activity_timeline = [
  [
    'text'           => 'Client uploaded Drawing A101 v2 and reflected facade shading revision.',
    'actor'          => 'Muhammad Aiman',
    'actor_role'     => 'Client Project Director',
    'avatar_src'     => path('/assets/images/avatars/avatar-01.jpg'),
    'avatar_alt'     => 'Avatar of Muhammad Aiman',
    'timestamp'      => '2026-04-24 09:18',
    'related_module' => 'Document Control',
  ],
  [
    'text'           => 'Consultant requested info for EE2 energy monitoring trend data.',
    'actor'          => 'Nur Aisyah',
    'actor_role'     => 'Lead GBI Consultant',
    'avatar_src'     => path('/assets/images/avatars/avatar-04.jpg'),
    'avatar_alt'     => 'Avatar of Nur Aisyah',
    'timestamp'      => '2026-04-24 08:35',
    'related_module' => 'RFI',
  ],
  [
    'text'           => 'RFI #003 closed after submission of lighting power density schedule.',
    'actor'          => 'Ahmad Firdaus',
    'actor_role'     => 'Technical Coordinator',
    'avatar_src'     => path('/assets/images/avatars/avatar-02.jpg'),
    'avatar_alt'     => 'Avatar of Ahmad Firdaus',
    'timestamp'      => '2026-04-23 16:02',
    'related_module' => 'RFI',
  ],
  [
    'text'           => 'Water meter calibration certificate uploaded and tagged to WE1.',
    'actor'          => 'Danish Harith',
    'actor_role'     => 'Facility Manager',
    'avatar_src'     => path('/assets/images/avatars/avatar-08.jpg'),
    'avatar_alt'     => 'Avatar of Danish Harith',
    'timestamp'      => '2026-04-23 11:47',
    'related_module' => 'Evidence',
  ],
];

layout('mampan/dashboard-project', [
  'page_title'      => $page_title,
  'page_current'    => $page_current,
  'project_current'      => $project_current,
  'current_phase'       => $current_phase,
  'phase_data_map'      => $phase_data_map,
  'phase_label_map'     => $phase_label_map,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-3 xl:space-y-5 py-5">
  <?php component('project/project-header', $project_header); ?>

  

  <section class="grid gap-3 xl:gap-5 lg:grid-cols-12" aria-label="Project workspace panels">
    <div class="space-y-3 xl:space-y-5 lg:col-span-7">
      <?php component('project/project-pending-actions', $pending_actions); ?>
      <?php component('project/project-stage-timeline', ['stages' => $stage_timeline]); ?>

      <section aria-labelledby="project-summary-heading" class="hidden <?php card('bg-white overflow-hidden') ?>">
        <h2 id="project-summary-heading" class="sr-only">Project summary</h2>
        <div class="grid md:grid-cols-2">
          <?php foreach ($summary_cards as $summary_card): ?>
            <?php component('project/project-summary-card', $summary_card); ?>
          <?php endforeach; ?>
        </div>
      </section>
    </div>

    <div class="space-y-3 xl:space-y-5 lg:col-span-5">
      <?php component('project/project-score-snapshot', $score_snapshot); ?>
      <?php component('project/project-activity-timeline', ['activities' => $activity_timeline]); ?>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
