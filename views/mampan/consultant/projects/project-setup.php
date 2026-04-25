<?php

declare(strict_types=1);

$page_title   = 'Project Setup Wizard';
$page_current = 'consultant-projects';

$wizard_steps = [
  ['title' => 'Project & GBI Setup', 'description' => 'Register project baseline and assessment configuration'],
  ['title' => 'Team Setup', 'description' => 'Assign key project stakeholders'],
  ['title' => 'Credit Direction', 'description' => 'Set initial targeted credit groups'],
  ['title' => 'Document Checklist (Design)', 'description' => 'Review required submission documents'],
  ['title' => 'Document Checklist (Completion)', 'description' => 'Review as-built and operational evidence'],
  ['title' => 'Review & Create', 'description' => 'Validate setup and create project'],
];

$step_sections = [
  'project' => [
    'project_name'     => 'Menara Harmoni Office Retrofit',
    'project_code'     => 'GBI-NRNC-2026-020',
    'client_company'   => 'Harmoni Asset Holdings Berhad',
    'project_location' => 'Jalan Tun Razak, Kuala Lumpur',
    'building_type'    => 'Office',
  ],
  'gbi' => [
    'tool_type'        => 'GBI NRNC',
    'assessment_stage' => 'Design',
    'target_rating'    => 'Gold',
  ],
  'team' => [
    'consultant_lead' => 'Ir. Aisyah Kamaruddin',
    'client_pic'      => 'Faizal Rahman',
  ],
];

$team_role_groups = [
  [
    'category' => 'Project Governance',
    'roles'    => [
      ['id' => 'project-director', 'label' => 'Project Director'],
      ['id' => 'project-manager', 'label' => 'Project Manager', 'checked' => true],
      ['id' => 'gbi-facilitator', 'label' => 'GBI Facilitator', 'checked' => true],
      ['id' => 'green-building-consultant', 'label' => 'Green Building Consultant'],
    ],
  ],
  [
    'category' => 'Design & Engineering',
    'roles'    => [
      ['id' => 'architect', 'label' => 'Architect', 'checked' => true],
      ['id' => 'civil-structural-engineer', 'label' => 'Civil & Structural Engineer'],
      ['id' => 'mechanical-engineer', 'label' => 'Mechanical Engineer', 'checked' => true],
      ['id' => 'electrical-engineer', 'label' => 'Electrical Engineer', 'checked' => true],
      ['id' => 'plumbing-engineer', 'label' => 'Plumbing Engineer'],
      ['id' => 'interior-designer', 'label' => 'Interior Designer'],
      ['id' => 'landscape-architect', 'label' => 'Landscape Architect'],
    ],
  ],
  [
    'category' => 'Delivery & Technical Support',
    'roles'    => [
      ['id' => 'commissioning-specialist', 'label' => 'Commissioning Specialist', 'checked' => true],
      ['id' => 'energy-modeller', 'label' => 'Energy Modeller', 'checked' => true],
      ['id' => 'bim-coordinator', 'label' => 'BIM Coordinator'],
      ['id' => 'quantity-surveyor', 'label' => 'Quantity Surveyor'],
      ['id' => 'contractor-main', 'label' => 'Main Contractor'],
      ['id' => 'specialist-subcontractor', 'label' => 'Specialist Subcontractor'],
    ],
  ],
  [
    'category' => 'Operations & Client Support',
    'roles'    => [
      ['id' => 'facility-manager', 'label' => 'Facility Manager'],
      ['id' => 'operations-representative', 'label' => 'O&M Representative'],
      ['id' => 'procurement-manager', 'label' => 'Procurement Manager'],
      ['id' => 'client-sustainability-lead', 'label' => 'Client Sustainability Lead'],
    ],
  ],
];

$credit_items = [
  [
    'id'          => 'ee',
    'name'        => 'EE - Energy Efficiency',
    'helper'      => 'Prioritize building envelope performance, system efficiency, and commissioning outcomes.',
    'checked'     => true,
  ],
  [
    'id'          => 'eq',
    'name'        => 'EQ - Indoor Environment Quality',
    'helper'      => 'Address ventilation, thermal comfort, daylight, and low-emission material strategy.',
    'checked'     => true,
  ],
  [
    'id'          => 'sm',
    'name'        => 'SM - Sustainable Site Planning',
    'helper'      => 'Document transport connectivity, site management, and ecological response measures.',
    'checked'     => true,
  ],
  [
    'id'          => 'mr',
    'name'        => 'MR - Materials & Resources',
    'helper'      => 'Track sustainable procurement declarations and construction waste management controls.',
    'checked'     => true,
  ],
  [
    'id'          => 'we',
    'name'        => 'WE - Water Efficiency',
    'helper'      => 'Define water reduction intent through fixtures, metering, and reuse systems where applicable.',
    'checked'     => true,
  ],
  [
    'id'          => 'in',
    'name'        => 'IN - Innovation',
    'helper'      => 'Capture innovative sustainability initiatives with measurable project impact.',
    'checked'     => false,
  ],
];

$document_items = [
  ['name' => 'Architectural drawings', 'category' => 'Design', 'credit' => 'SM, EQ'],
  ['name' => 'M&E drawings', 'category' => 'Design', 'credit' => 'EE, WE'],
  ['name' => 'Energy model report', 'category' => 'Technical Analysis', 'credit' => 'EE'],
  ['name' => 'Commissioning documents', 'category' => 'Commissioning', 'credit' => 'EE, EQ'],
  ['name' => 'Material certificates', 'category' => 'Procurement', 'credit' => 'MR, EQ'],
  ['name' => 'Water system documents', 'category' => 'Utilities', 'credit' => 'WE'],
];

$completion_document_items = [
  ['name' => 'As-built architectural drawings', 'category' => 'As-Built', 'credit' => 'SM, EQ'],
  ['name' => 'As-built M&E drawings', 'category' => 'As-Built', 'credit' => 'EE, WE'],
  ['name' => 'Commissioning & T&C report', 'category' => 'Commissioning', 'credit' => 'EE, EQ'],
  ['name' => 'Operation & maintenance manuals', 'category' => 'Operations', 'credit' => 'EE, WE'],
  ['name' => 'Installed material certificates', 'category' => 'Procurement', 'credit' => 'MR, EQ'],
  ['name' => 'Water meter records', 'category' => 'Performance Data', 'credit' => 'WE'],
];

$selected_credits = [];
foreach ($credit_items as $credit_item) {
  if (!empty($credit_item['checked']) && isset($credit_item['name'])) {
    $selected_credits[] = (string) $credit_item['name'];
  }
}

$selected_team_roles = [];
foreach ($team_role_groups as $role_group) {
  $role_items = isset($role_group['roles']) && is_array($role_group['roles']) ? $role_group['roles'] : [];

  foreach ($role_items as $role_item) {
    if (!empty($role_item['checked']) && isset($role_item['label'])) {
      $selected_team_roles[] = (string) $role_item['label'];
    }
  }
}

$required_documents = array_map(
  static fn(array $document_item): string => isset($document_item['name']) ? (string) $document_item['name'] : '',
  $document_items
);

$review_summary = [
  'project_info' => [
    'Project Name' => $step_sections['project']['project_name'],
    'Project Code' => $step_sections['project']['project_code'],
    'Client'       => $step_sections['project']['client_company'],
    'Location'     => $step_sections['project']['project_location'],
    'Building'     => $step_sections['project']['building_type'],
  ],
  'gbi_setup' => [
    'Tool Type' => $step_sections['gbi']['tool_type'],
    'Stage'     => $step_sections['gbi']['assessment_stage'],
    'Target'    => $step_sections['gbi']['target_rating'],
  ],
  'team_setup' => [
    'Consultant Lead' => $step_sections['team']['consultant_lead'],
    'Client PIC'      => $step_sections['team']['client_pic'],
    'Supporting Roles' => $selected_team_roles === [] ? '-' : implode(', ', $selected_team_roles),
  ],
  'selected_credits'   => $selected_credits,
  'required_documents' => array_filter($required_documents),
];

layout('mampan/dashboard-global', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Create a new GBI project workspace through a guided consultant onboarding flow.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <?php component('project/project-setup-stepper', [
    'steps'        => $wizard_steps,
    'current_step' => 1,
  ]); ?>

  <?php component('project/project-setup-form', [
    'step_sections'          => $step_sections,
    'team_role_groups' => $team_role_groups,
    'credit_items'           => $credit_items,
    'document_items'         => $document_items,
    'completion_document_items' => $completion_document_items,
  ]); ?>

  <?php component('project/project-setup-summary', [
    'summary' => $review_summary,
  ]); ?>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
