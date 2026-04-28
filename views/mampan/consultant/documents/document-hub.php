<?php

declare(strict_types=1);

$page_title      = 'Document Hub';

require __DIR__ . '/../_data/phase_data.php';
require __DIR__ . '/../../_data/credits.php';
$current_phase = resolve_mampan_current_phase($phase_data_map);
$current_phase_data = $phase_data_map[$current_phase];
$page_current    = 'consultant-documents';
$project_current = 'project-documents';

$document_header = [
  'title'                 => 'Document Hub',
  'current_phase'         => 'Phase 1 - Setup & Planning',
  'current_stage'         => 'Initial Document Review',
  'requirement_readiness' => '18%',
  'last_updated'          => '2026-04-25 09:30',
  'action_items'          => [
    ['label' => 'Request Missing Info', 'tone' => 'primary', 'href' => path('/mampan/consultant/rfi/rfi-create')],
    ['label' => 'Add Requirement', 'tone' => 'secondary', 'href' => path('/mampan/consultant/documents/document-hub')],
    ['label' => 'Export Requirement Register', 'tone' => 'secondary', 'href' => path('/mampan/consultant/reports/gap-analysis-report')],
  ],
];

$document_stage_map = [
  'initial'    => 'Initial Document Review',
  'collection' => 'Document Collection',
  'review'     => 'Detailed Requirement Review',
  'complete'   => 'Requirement Closure',
];

$selected_phase_key = $current_phase;

if (!isset($phase_data_map[$selected_phase_key])) {
  $selected_phase_key = 'phase-2';
}

$documents_phase_state = isset($current_phase_data['documents']['state'])
  ? trim((string) $current_phase_data['documents']['state'])
  : 'initial';
$workspace_phase_state = isset($current_phase_data['workspace']) && is_array($current_phase_data['workspace'])
  ? $current_phase_data['workspace']
  : [];
$phase_label_meta = isset($phase_label_map[$selected_phase_key]) && is_array($phase_label_map[$selected_phase_key])
  ? $phase_label_map[$selected_phase_key]
  : [];
$selected_phase_title = isset($phase_label_meta['title']) ? trim((string) $phase_label_meta['title']) : 'Phase';
$selected_phase_subtitle = isset($phase_label_meta['subtitle']) ? trim((string) $phase_label_meta['subtitle']) : 'Setup & Planning';
$selected_phase_label = $selected_phase_title . ' - ' . $selected_phase_subtitle;
$selected_phase_preset = [
  'label' => $selected_phase_label,
];

$document_header['current_phase'] = $selected_phase_label;
$document_header['phase_key'] = $selected_phase_key;
$document_header['current_stage'] = isset($document_stage_map[$documents_phase_state])
  ? $document_stage_map[$documents_phase_state]
  : $document_stage_map['initial'];
$document_header['description'] = isset($current_phase_data['documents']['message'])
  ? (string) $current_phase_data['documents']['message']
  : 'Start by requesting initial project documents.';
$document_header['requirement_readiness'] = isset($workspace_phase_state['requirement_readiness'])
  ? (string) $workspace_phase_state['requirement_readiness']
  : $document_header['requirement_readiness'];

$summary_cards = [
  ['label' => 'Total Requirements', 'value' => '18', 'helper' => 'Across EE, EQ, SM, MR, WE, and IN', 'tone' => 'neutral', 'icon_name' => 'list-check-3'],
  ['label' => 'Satisfied', 'value' => '7', 'helper' => 'Sufficient for Phase 1 review', 'tone' => 'positive', 'icon_name' => 'checkbox-circle-line'],
  ['label' => 'Partial', 'value' => '6', 'helper' => 'More inputs needed before gap analysis', 'tone' => 'warning', 'icon_name' => 'error-warning-line'],
  ['label' => 'Missing', 'value' => '5', 'helper' => 'No usable submission yet', 'tone' => 'negative', 'icon_name' => 'close-circle-line'],
  ['label' => 'Ready for Gap Analysis', 'value' => '9', 'helper' => 'Can proceed to initial scoring review', 'tone' => 'positive', 'icon_name' => 'bar-chart-grouped-line'],
  ['label' => 'Blocking Items', 'value' => '4', 'helper' => 'Critical blockers for Phase 1 completion', 'tone' => 'warning', 'icon_name' => 'alert-line'],
];

$phase_reference_cards = [
  [
    'phase'       => 'Phase 1 - Setup & Planning',
    'focus'       => 'Collect initial design documents and map requirement readiness.',
    'entry_rule'  => 'Default starting phase for all requirements.',
    'exit_rule'   => 'Requirement can move when planning documents are sufficient for initial gap analysis.',
    'deliverable' => 'Requirement readiness baseline and clarification list.',
  ],
  [
    'phase'       => 'Phase 2 - Document Collection',
    'focus'       => 'Collect requirement evidence and supporting project documents.',
    'entry_rule'  => 'Requirement has passed planning completeness and owner alignment.',
    'exit_rule'   => 'Requirement can move when implementation evidence is complete for verification prep.',
    'deliverable' => 'Implementation-ready evidence package per requirement.',
  ],
  [
    'phase'       => 'Phase 3 - Evidence & Verification',
    'focus'       => 'Final review, verification, and submission readiness by requirement.',
    'entry_rule'  => 'Requirement has complete implementation evidence and review trail.',
    'exit_rule'   => 'Requirement reaches verified/satisfied submission state.',
    'deliverable' => 'Submission-ready verified requirement record.',
  ],
  [
    'phase'       => 'Phase 4 - Finalisation & Submission',
    'focus'       => 'Lock verified records and prepare final submission package.',
    'entry_rule'  => 'Requirement is verified and pending package finalisation.',
    'exit_rule'   => 'Requirement is included in submission-ready package.',
    'deliverable' => 'Final submission package evidence bundle.',
  ],
];

$requirement_filters = [
  ['label' => 'All', 'key' => 'all'],
  ['label' => 'Missing', 'key' => 'missing'],
  ['label' => 'Partial', 'key' => 'partial'],
  ['label' => 'Satisfied', 'key' => 'satisfied'],
  ['label' => 'Ready for Gap Analysis', 'key' => 'ready'],
  ['label' => 'Blocking', 'key' => 'blocking'],
];

$all_requirements = [
  [
    'id'                    => 'ee1-minimum-energy-performance',
    'criteria_code'         => 'EE',
    'criteria_label'        => 'Energy Efficiency',
    'title'                 => 'EE1 Minimum Energy Performance',
    'linked_gbi_credit'     => 'EE1',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Energy Modeller',
    'status'                => 'Submitted',
    'readiness_percent'     => 78,
    'supporting_files_count' => 4,
    'missing_items_count'   => 1,
    'next_action'           => 'Review simulation assumptions and zoning baseline',
    'why_needed'            => 'Establishes baseline and proposed energy intensity needed for preliminary credit viability.',
    'submitted_items'       => [
      'Concept energy model report v1.2',
      'Zoning assumptions matrix',
      'Envelope U-value schedule',
      'Lighting power density summary',
    ],
    'missing_items'         => [
      'Final occupancy schedule confirmation',
    ],
    'consultant_note'       => 'Model framework is acceptable for initial gap analysis once occupancy schedule is confirmed.',
    'next_recommended_action' => 'Coordinate with architect and client FM team to confirm occupancy profile used in model.',
    'search_tokens'         => 'ee1 minimum energy performance model zoning baseline',
  ],
  [
    'id'                    => 'ee2-energy-monitoring-readiness',
    'criteria_code'         => 'EE',
    'criteria_label'        => 'Energy Efficiency',
    'title'                 => 'EE2 Energy Monitoring Readiness',
    'linked_gbi_credit'     => 'EE2',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'M&E Engineer',
    'status'                => 'Partial',
    'readiness_percent'     => 62,
    'supporting_files_count' => 4,
    'missing_items_count'   => 3,
    'next_action'           => 'Request client clarification on trend data and calibration records',
    'why_needed'            => 'Early metering and monitoring definition is needed to test whether operational performance can be demonstrated later.',
    'submitted_items'       => [
      'Chilled water schematic Rev B',
      'Metering layout Rev A',
      'BMS point schedule',
      'Energy trend log sample',
    ],
    'missing_items'         => [
      '3-month trend data',
      'Meter calibration certificate',
      'Final metering responsibility matrix',
    ],
    'consultant_note'       => 'Instrumentation intent is clear, but documentation is not sufficient to validate monitoring readiness for Phase 1.',
    'next_recommended_action' => 'Create clarification request for missing monitoring data and matrix ownership confirmation.',
    'search_tokens'         => 'ee2 energy monitoring chilled water metering bms trend calibration',
  ],
  [
    'id'                    => 'ee-commissioning-strategy',
    'criteria_code'         => 'EE',
    'criteria_label'        => 'Energy Efficiency',
    'title'                 => 'EE Commissioning Strategy',
    'linked_gbi_credit'     => 'EE Cx',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Commissioning Agent',
    'status'                => 'Missing',
    'readiness_percent'     => 30,
    'supporting_files_count' => 1,
    'missing_items_count'   => 2,
    'next_action'           => 'Request preliminary Cx plan and test scope',
    'why_needed'            => 'Commissioning scope alignment must be defined early to avoid missing verifiable test evidence later.',
    'submitted_items'       => [
      'Draft Cx responsibility outline',
    ],
    'missing_items'         => [
      'Preliminary commissioning plan',
      'Functional performance test matrix',
    ],
    'consultant_note'       => 'Current note is too high-level and not enough for requirement mapping.',
    'next_recommended_action' => 'Issue clarification to commissioning lead for plan and test matrix submission.',
    'search_tokens'         => 'commissioning strategy plan test matrix ee cx',
  ],
  [
    'id'                    => 'eq4-low-voc-material-documentation',
    'criteria_code'         => 'EQ',
    'criteria_label'        => 'Indoor Environment Quality',
    'title'                 => 'EQ4 Low-VOC Material Documentation',
    'linked_gbi_credit'     => 'EQ4',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Procurement Manager',
    'status'                => 'Missing',
    'readiness_percent'     => 25,
    'supporting_files_count' => 2,
    'missing_items_count'   => 2,
    'next_action'           => 'Ask procurement team for compliant manufacturer certificates',
    'why_needed'            => 'Low-VOC declarations are required to confirm indoor environmental compliance direction before procurement lock-in.',
    'submitted_items'       => [
      'Product datasheet (paint)',
      'Supplier declaration draft',
    ],
    'missing_items'         => [
      'VOC limit stated in certificate',
      'Independent test report reference',
    ],
    'consultant_note'       => 'Current submissions do not state VOC thresholds explicitly.',
    'next_recommended_action' => 'Request revised certificate package with VOC limit statement and report references.',
    'search_tokens'         => 'eq4 low voc certificate paint procurement indoor quality',
  ],
  [
    'id'                    => 'eq-iaq-design-basis',
    'criteria_code'         => 'EQ',
    'criteria_label'        => 'Indoor Environment Quality',
    'title'                 => 'Indoor Air Quality Design Basis',
    'linked_gbi_credit'     => 'EQ2',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Mechanical Engineer',
    'status'                => 'Ready for Gap Analysis',
    'readiness_percent'     => 86,
    'supporting_files_count' => 5,
    'missing_items_count'   => 1,
    'next_action'           => 'Proceed with initial EQ gap analysis checks',
    'why_needed'            => 'Ventilation basis and pollutant control assumptions support early assessment of achievable EQ points.',
    'submitted_items'       => [
      'Ventilation design narrative',
      'Outdoor air rate schedule',
      'Filtration strategy brief',
      'Occupancy density assumptions',
      'Mechanical zoning drawings',
    ],
    'missing_items'         => [
      'Final air distribution balancing basis',
    ],
    'consultant_note'       => 'Sufficient for early gap analysis with one minor follow-up.',
    'next_recommended_action' => 'Flag one pending balancing basis item and continue EQ review.',
    'search_tokens'         => 'indoor air quality eq2 ventilation filtration design basis',
  ],
  [
    'id'                    => 'sm-sustainable-site-planning-drawings',
    'criteria_code'         => 'SM',
    'criteria_label'        => 'Sustainable Site Planning & Management',
    'title'                 => 'Sustainable Site Planning Drawings',
    'linked_gbi_credit'     => 'SM1',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Architect',
    'status'                => 'Submitted',
    'readiness_percent'     => 74,
    'supporting_files_count' => 3,
    'missing_items_count'   => 1,
    'next_action'           => 'Confirm transport and access annotations',
    'why_needed'            => 'Site planning drawings support feasibility of sustainable mobility and site management measures.',
    'submitted_items'       => [
      'Site layout drawing Rev C',
      'Pedestrian access routing',
      'Parking and drop-off plan',
    ],
    'missing_items'         => [
      'Final public transport distance annotation',
    ],
    'consultant_note'       => 'Base documentation is usable for Phase 1 screening.',
    'next_recommended_action' => 'Capture final annotation in next drawing issue.',
    'search_tokens'         => 'sm1 site planning drawing access transport',
  ],
  [
    'id'                    => 'sm-stormwater-management-strategy',
    'criteria_code'         => 'SM',
    'criteria_label'        => 'Sustainable Site Planning & Management',
    'title'                 => 'Stormwater Management Strategy',
    'linked_gbi_credit'     => 'SM3',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Civil Engineer',
    'status'                => 'Partial',
    'readiness_percent'     => 58,
    'supporting_files_count' => 3,
    'missing_items_count'   => 2,
    'next_action'           => 'Request landscape area and runoff calculations',
    'why_needed'            => 'Stormwater strategy inputs are needed to estimate mitigation viability and identify design gaps early.',
    'submitted_items'       => [
      'Drainage concept drawing',
      'Preliminary detention sizing note',
      'Site contour plan',
    ],
    'missing_items'         => [
      'Landscape area calculation',
      'Runoff coefficient assumptions sheet',
    ],
    'consultant_note'       => 'Concept is present but technical calculations are incomplete for robust review.',
    'next_recommended_action' => 'Create clarification request to civil team for detailed calculations.',
    'search_tokens'         => 'stormwater management sm3 drainage landscape runoff',
  ],
  [
    'id'                    => 'mr-sustainable-material-procurement-plan',
    'criteria_code'         => 'MR',
    'criteria_label'        => 'Materials & Resources',
    'title'                 => 'Sustainable Material Procurement Plan',
    'linked_gbi_credit'     => 'MR1',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Procurement Manager',
    'status'                => 'Ready for Gap Analysis',
    'readiness_percent'     => 82,
    'supporting_files_count' => 4,
    'missing_items_count'   => 1,
    'next_action'           => 'Review supplier traceability structure',
    'why_needed'            => 'Procurement strategy defines whether sustainable sourcing evidence can be collected reliably later.',
    'submitted_items'       => [
      'Procurement workflow matrix',
      'Approved material source list',
      'Supplier declaration template',
      'Regional sourcing policy note',
    ],
    'missing_items'         => [
      'Final supplier traceability checklist',
    ],
    'consultant_note'       => 'Documentation quality is suitable for initial feasibility discussion.',
    'next_recommended_action' => 'Proceed with MR gap analysis while awaiting final checklist issue.',
    'search_tokens'         => 'mr1 procurement sustainable material source traceability',
  ],
  [
    'id'                    => 'mr-construction-waste-management-plan',
    'criteria_code'         => 'MR',
    'criteria_label'        => 'Materials & Resources',
    'title'                 => 'Construction Waste Management Plan',
    'linked_gbi_credit'     => 'MR2',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Main Contractor',
    'status'                => 'Not Started',
    'readiness_percent'     => 18,
    'supporting_files_count' => 0,
    'missing_items_count'   => 3,
    'next_action'           => 'Request baseline diversion target and tracking format',
    'why_needed'            => 'Waste diversion framework is needed in planning stage to align contractor implementation responsibilities.',
    'submitted_items'       => [],
    'missing_items'         => [
      'Waste segregation strategy',
      'Diversion target statement',
      'Waste tracking template',
    ],
    'consultant_note'       => 'No actionable submission received yet.',
    'next_recommended_action' => 'Escalate initial request to contractor project manager.',
    'search_tokens'         => 'mr2 waste management diversion contractor tracking',
  ],
  [
    'id'                    => 'we-water-efficient-fittings-schedule',
    'criteria_code'         => 'WE',
    'criteria_label'        => 'Water Efficiency',
    'title'                 => 'Water Efficient Fittings Schedule',
    'linked_gbi_credit'     => 'WE1',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Plumbing Engineer',
    'status'                => 'Ready for Gap Analysis',
    'readiness_percent'     => 88,
    'supporting_files_count' => 4,
    'missing_items_count'   => 0,
    'next_action'           => 'Review final flow rate assumptions against schedules',
    'why_needed'            => 'Fixtures schedule is a key baseline for early water use performance feasibility.',
    'submitted_items'       => [
      'Sanitary fittings schedule Rev D',
      'Flow rate compliance matrix',
      'Fixture cut sheets',
      'Water demand summary',
    ],
    'missing_items'         => [],
    'consultant_note'       => 'Sufficient to proceed with WE gap analysis.',
    'next_recommended_action' => 'Move to WE scoring simulation during initial review.',
    'search_tokens'         => 'we1 water efficient fittings schedule flow rate plumbing',
  ],
  [
    'id'                    => 'we-rainwater-harvesting-design-package',
    'criteria_code'         => 'WE',
    'criteria_label'        => 'Water Efficiency',
    'title'                 => 'Rainwater Harvesting Design Package',
    'linked_gbi_credit'     => 'WE3',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Mechanical Engineer',
    'status'                => 'Partial',
    'readiness_percent'     => 66,
    'supporting_files_count' => 4,
    'missing_items_count'   => 1,
    'next_action'           => 'Obtain O&M concept note for system operation',
    'why_needed'            => 'Collection and reuse strategy must be clear to test practical water saving viability in planning stage.',
    'submitted_items'       => [
      'Rainwater collection schematic',
      'Storage tank sizing sheet',
      'Reuse piping concept drawing',
      'Water balance worksheet',
    ],
    'missing_items'         => [
      'O&M manual concept draft',
    ],
    'consultant_note'       => 'Design package is close to acceptable for gap analysis.',
    'next_recommended_action' => 'Ask FM team for operating concept assumptions.',
    'search_tokens'         => 'we3 rainwater harvesting reuse storage tank operation',
  ],
  [
    'id'                    => 'in-innovation-strategy-narrative',
    'criteria_code'         => 'IN',
    'criteria_label'        => 'Innovation',
    'title'                 => 'Innovation Strategy Narrative',
    'linked_gbi_credit'     => 'IN1',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Sustainability Consultant',
    'status'                => 'Satisfied',
    'readiness_percent'     => 92,
    'supporting_files_count' => 3,
    'missing_items_count'   => 0,
    'next_action'           => 'Tag feasible innovation path for phase transition',
    'why_needed'            => 'Early innovation narrative helps decide realistic innovation credits for development in later phases.',
    'submitted_items'       => [
      'Innovation opportunities memo',
      'Benchmark references summary',
      'Concept feasibility matrix',
    ],
    'missing_items'         => [],
    'consultant_note'       => 'Narrative is strong and aligned to project constraints.',
    'next_recommended_action' => 'Prepare shortlisted innovation credit strategy.',
    'search_tokens'         => 'innovation strategy narrative feasibility benchmark in1',
  ],
  [
    'id'                    => 'in-green-education-user-guide-concept',
    'criteria_code'         => 'IN',
    'criteria_label'        => 'Innovation',
    'title'                 => 'Green Education / User Guide Concept',
    'linked_gbi_credit'     => 'IN2',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Facility Manager',
    'status'                => 'Under Review',
    'readiness_percent'     => 72,
    'supporting_files_count' => 2,
    'missing_items_count'   => 1,
    'next_action'           => 'Refine user engagement scope and delivery method',
    'why_needed'            => 'Occupant guidance concept needs early planning so education evidence can be structured progressively.',
    'submitted_items'       => [
      'User guide framework draft',
      'Occupant communication channel proposal',
    ],
    'missing_items'         => [
      'Training delivery schedule concept',
    ],
    'consultant_note'       => 'Promising direction, pending review on practicality and ownership.',
    'next_recommended_action' => 'Hold alignment meeting with FM and HR representatives.',
    'search_tokens'         => 'green education user guide occupant training innovation',
  ],
  [
    'id'                    => 'eq-daylight-design-approach',
    'criteria_code'         => 'EQ',
    'criteria_label'        => 'Indoor Environment Quality',
    'title'                 => 'Daylight Design Approach',
    'linked_gbi_credit'     => 'EQ5',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Architect',
    'status'                => 'Satisfied',
    'readiness_percent'     => 90,
    'supporting_files_count' => 3,
    'missing_items_count'   => 0,
    'next_action'           => 'Carry daylight assumptions into initial gap scoring',
    'why_needed'            => 'Daylight strategy informs likely achievement boundaries and coordination risks early.',
    'submitted_items'       => [
      'Facade shading intent drawing',
      'Glazing ratio matrix',
      'Daylight concept narrative',
    ],
    'missing_items'         => [],
    'consultant_note'       => 'Strong submission and internally coherent.',
    'next_recommended_action' => 'Flag as candidate for early positive scoring assumptions.',
    'search_tokens'         => 'eq5 daylight facade glazing shading',
  ],
  [
    'id'                    => 'sm-construction-activity-management',
    'criteria_code'         => 'SM',
    'criteria_label'        => 'Sustainable Site Planning & Management',
    'title'                 => 'Construction Activity Management',
    'linked_gbi_credit'     => 'SM5',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Main Contractor',
    'status'                => 'Partial',
    'readiness_percent'     => 55,
    'supporting_files_count' => 2,
    'missing_items_count'   => 2,
    'next_action'           => 'Request site mitigation sequencing plan',
    'why_needed'            => 'Construction controls affect feasibility of site management related requirements.',
    'submitted_items'       => [
      'Site management policy summary',
      'Temporary works boundary sketch',
    ],
    'missing_items'         => [
      'Mitigation sequencing plan',
      'Contractor monitoring checklist',
    ],
    'consultant_note'       => 'Needs stronger implementation detail to be assessed reliably.',
    'next_recommended_action' => 'Issue structured request with required templates.',
    'search_tokens'         => 'sm5 construction activity management mitigation site',
  ],
  [
    'id'                    => 'mr-recycled-content-strategy',
    'criteria_code'         => 'MR',
    'criteria_label'        => 'Materials & Resources',
    'title'                 => 'Recycled Content Strategy',
    'linked_gbi_credit'     => 'MR3',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Quantity Surveyor',
    'status'                => 'Satisfied',
    'readiness_percent'     => 89,
    'supporting_files_count' => 3,
    'missing_items_count'   => 0,
    'next_action'           => 'Include in MR scoring pre-assessment',
    'why_needed'            => 'Material strategy influences targeted MR credits and supplier engagement.',
    'submitted_items'       => [
      'Recycled content target matrix',
      'Specification clause draft',
      'Vendor shortlist evidence',
    ],
    'missing_items'         => [],
    'consultant_note'       => 'Meets planning-stage requirement for direction setting.',
    'next_recommended_action' => 'Track supplier confirmations in next review cycle.',
    'search_tokens'         => 'mr3 recycled content strategy qs specification',
  ],
  [
    'id'                    => 'we-water-submetering-approach',
    'criteria_code'         => 'WE',
    'criteria_label'        => 'Water Efficiency',
    'title'                 => 'Water Submetering Approach',
    'linked_gbi_credit'     => 'WE2',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Plumbing Engineer',
    'status'                => 'Satisfied',
    'readiness_percent'     => 91,
    'supporting_files_count' => 3,
    'missing_items_count'   => 0,
    'next_action'           => 'Cross-check meter locations during coordination',
    'why_needed'            => 'Submetering strategy supports future performance tracking and requirement verification.',
    'submitted_items'       => [
      'Submetering schematic Rev B',
      'Meter location schedule',
      'Monitoring intent statement',
    ],
    'missing_items'         => [],
    'consultant_note'       => 'Adequate for Phase 1 target-setting.',
    'next_recommended_action' => 'Keep under design coordination watch list.',
    'search_tokens'         => 'we2 submetering plumbing monitoring schedule',
  ],
  [
    'id'                    => 'in-digital-occupant-feedback-concept',
    'criteria_code'         => 'IN',
    'criteria_label'        => 'Innovation',
    'title'                 => 'Digital Occupant Feedback Concept',
    'linked_gbi_credit'     => 'IN3',
    'phase'                 => 'Phase 1 - Design / Planning',
    'owner'                 => 'Sustainability Consultant',
    'status'                => 'Ready for Gap Analysis',
    'readiness_percent'     => 84,
    'supporting_files_count' => 2,
    'missing_items_count'   => 1,
    'next_action'           => 'Confirm data stewardship owner before phase close',
    'why_needed'            => 'Defines feasibility of innovation path tied to operational feedback mechanisms.',
    'submitted_items'       => [
      'Feedback loop concept note',
      'User journey draft',
    ],
    'missing_items'         => [
      'Data stewardship ownership memo',
    ],
    'consultant_note'       => 'Strong concept with one governance dependency.',
    'next_recommended_action' => 'Assign data owner in consultant-client alignment call.',
    'search_tokens'         => 'innovation digital occupant feedback data stewardship',
  ],
];

$master_credits_data = isset($credits_data) && is_array($credits_data) ? $credits_data : ['credits' => []];
$master_credits_list = isset($master_credits_data['credits']) && is_array($master_credits_data['credits'])
  ? $master_credits_data['credits']
  : [];
$existing_requirement_credit_codes = [];

foreach ($all_requirements as $requirement_item) {
  if (!is_array($requirement_item)) {
    continue;
  }

  $existing_credit_code = isset($requirement_item['linked_gbi_credit']) ? strtoupper(trim((string) $requirement_item['linked_gbi_credit'])) : '';

  if ($existing_credit_code === '') {
    continue;
  }

  $existing_requirement_credit_codes[$existing_credit_code] = true;
}

foreach ($master_credits_list as $master_credit_item) {
  if (!is_array($master_credit_item)) {
    continue;
  }

  $master_credit_code = isset($master_credit_item['code']) ? strtoupper(trim((string) $master_credit_item['code'])) : '';
  $master_credit_title = isset($master_credit_item['title']) ? trim((string) $master_credit_item['title']) : '';

  if ($master_credit_code === '' || $master_credit_title === '') {
    continue;
  }

  if (isset($existing_requirement_credit_codes[$master_credit_code])) {
    continue;
  }

  $master_category_code = isset($master_credit_item['category_code']) ? strtoupper(trim((string) $master_credit_item['category_code'])) : '';
  $master_category_title = isset($master_credit_item['category_title']) ? trim((string) $master_credit_item['category_title']) : 'Category';
  $master_criteria_label = preg_replace('/\s*\([^)]+\)\s*/', '', $master_category_title);
  $master_criteria_label = is_string($master_criteria_label) && trim($master_criteria_label) !== ''
    ? trim($master_criteria_label)
    : $master_category_title;
  $master_credit_slug = strtolower((string) preg_replace('/[^a-z0-9]+/', '-', $master_credit_code . '-' . $master_credit_title));
  $master_credit_slug = trim($master_credit_slug, '-');
  $master_credit_id = $master_credit_slug !== '' ? $master_credit_slug : strtolower($master_credit_code);

  $all_requirements[] = [
    'id'                     => $master_credit_id,
    'criteria_code'          => $master_category_code !== '' ? $master_category_code : 'EE',
    'criteria_label'         => $master_criteria_label,
    'title'                  => $master_credit_code . ' ' . $master_credit_title,
    'linked_gbi_credit'      => $master_credit_code,
    'phase'                  => 'Phase 1 - Design / Planning',
    'owner'                  => 'Project Coordinator',
    'status'                 => 'Not Started',
    'readiness_percent'      => 0,
    'supporting_files_count' => 0,
    'missing_items_count'    => 1,
    'next_action'            => 'Create requirement baseline and request initial supporting documents',
    'why_needed'             => isset($master_credit_item['criteria_preview']) ? (string) $master_credit_item['criteria_preview'] : 'Required for credit verification and submission readiness.',
    'submitted_items'        => [],
    'missing_items'          => ['Initial evidence package not uploaded'],
    'consultant_note'        => 'Auto-generated from master credit list. No document package has been linked yet.',
    'next_recommended_action' => 'Assign owner and start document collection for this credit.',
    'search_tokens'          => strtolower($master_credit_code . ' ' . $master_credit_title . ' ' . $master_criteria_label),
    'is_generated'           => true,
  ];

  $existing_requirement_credit_codes[$master_credit_code] = true;
}

$requirement_rubric_inputs = [
  'ee1-minimum-energy-performance' => [
    'scores' => ['completeness' => 80, 'quality' => 76, 'traceability' => 78, 'review_progress' => 75, 'action_closure' => 80],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'submitted',
  ],
  'ee2-energy-monitoring-readiness' => [
    'scores' => ['completeness' => 68, 'quality' => 60, 'traceability' => 58, 'review_progress' => 62, 'action_closure' => 60],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => true, 'review_state' => 'accepted',
  ],
  'ee-commissioning-strategy' => [
    'scores' => ['completeness' => 42, 'quality' => 35, 'traceability' => 30, 'review_progress' => 20, 'action_closure' => 25],
    'mandatory_docs_complete' => false, 'has_critical_blocker' => true, 'has_blocking_item' => false, 'review_state' => 'not_started',
  ],
  'eq4-low-voc-material-documentation' => [
    'scores' => ['completeness' => 35, 'quality' => 28, 'traceability' => 25, 'review_progress' => 20, 'action_closure' => 30],
    'mandatory_docs_complete' => false, 'has_critical_blocker' => true, 'has_blocking_item' => true, 'review_state' => 'not_started',
  ],
  'eq-iaq-design-basis' => [
    'scores' => ['completeness' => 88, 'quality' => 84, 'traceability' => 85, 'review_progress' => 82, 'action_closure' => 86],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
  'sm-sustainable-site-planning-drawings' => [
    'scores' => ['completeness' => 76, 'quality' => 72, 'traceability' => 74, 'review_progress' => 70, 'action_closure' => 73],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'submitted',
  ],
  'sm-stormwater-management-strategy' => [
    'scores' => ['completeness' => 66, 'quality' => 58, 'traceability' => 55, 'review_progress' => 54, 'action_closure' => 56],
    'mandatory_docs_complete' => false, 'has_critical_blocker' => false, 'has_blocking_item' => true, 'review_state' => 'accepted',
  ],
  'mr-sustainable-material-procurement-plan' => [
    'scores' => ['completeness' => 85, 'quality' => 82, 'traceability' => 80, 'review_progress' => 78, 'action_closure' => 82],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
  'mr-construction-waste-management-plan' => [
    'scores' => ['completeness' => 20, 'quality' => 15, 'traceability' => 10, 'review_progress' => 5, 'action_closure' => 10],
    'mandatory_docs_complete' => false, 'has_critical_blocker' => true, 'has_blocking_item' => false, 'review_state' => 'not_started',
  ],
  'we-water-efficient-fittings-schedule' => [
    'scores' => ['completeness' => 90, 'quality' => 88, 'traceability' => 90, 'review_progress' => 86, 'action_closure' => 88],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
  'we-rainwater-harvesting-design-package' => [
    'scores' => ['completeness' => 70, 'quality' => 66, 'traceability' => 64, 'review_progress' => 60, 'action_closure' => 62],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => true, 'review_state' => 'accepted',
  ],
  'in-innovation-strategy-narrative' => [
    'scores' => ['completeness' => 93, 'quality' => 90, 'traceability' => 92, 'review_progress' => 90, 'action_closure' => 92],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
  'in-green-education-user-guide-concept' => [
    'scores' => ['completeness' => 78, 'quality' => 72, 'traceability' => 70, 'review_progress' => 68, 'action_closure' => 72],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'under_review',
  ],
  'eq-daylight-design-approach' => [
    'scores' => ['completeness' => 92, 'quality' => 90, 'traceability' => 91, 'review_progress' => 88, 'action_closure' => 90],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
  'sm-construction-activity-management' => [
    'scores' => ['completeness' => 60, 'quality' => 54, 'traceability' => 52, 'review_progress' => 50, 'action_closure' => 52],
    'mandatory_docs_complete' => false, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
  'mr-recycled-content-strategy' => [
    'scores' => ['completeness' => 92, 'quality' => 88, 'traceability' => 90, 'review_progress' => 86, 'action_closure' => 88],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
  'we-water-submetering-approach' => [
    'scores' => ['completeness' => 93, 'quality' => 90, 'traceability' => 90, 'review_progress' => 88, 'action_closure' => 90],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
  'in-digital-occupant-feedback-concept' => [
    'scores' => ['completeness' => 86, 'quality' => 82, 'traceability' => 80, 'review_progress' => 78, 'action_closure' => 80],
    'mandatory_docs_complete' => true, 'has_critical_blocker' => false, 'has_blocking_item' => false, 'review_state' => 'accepted',
  ],
];

foreach ($all_requirements as $requirement_item) {
  if (!is_array($requirement_item)) {
    continue;
  }

  $requirement_id = isset($requirement_item['id']) ? trim((string) $requirement_item['id']) : '';
  $is_generated_requirement = isset($requirement_item['is_generated']) && $requirement_item['is_generated'] === true;

  if ($requirement_id === '' || !$is_generated_requirement) {
    continue;
  }

  if (isset($requirement_rubric_inputs[$requirement_id])) {
    continue;
  }

  $requirement_rubric_inputs[$requirement_id] = [
    'scores' => ['completeness' => 20, 'quality' => 20, 'traceability' => 20, 'review_progress' => 10, 'action_closure' => 10],
    'mandatory_docs_complete' => false,
    'has_critical_blocker' => false,
    'has_blocking_item' => true,
    'review_state' => 'not_started',
  ];
}

$derive_status = static function (int $readiness_percent, string $review_state): string {
  if ($readiness_percent < 20) {
    return 'Not Started';
  }

  if ($readiness_percent < 50) {
    return 'Missing';
  }

  if ($readiness_percent < 70) {
    return 'Partial';
  }

  if ($readiness_percent < 80) {
    return $review_state === 'submitted' ? 'Submitted' : 'Under Review';
  }

  if ($readiness_percent < 90) {
    return 'Ready for Gap Analysis';
  }

  return 'Satisfied';
};

$phase_label = (string) $selected_phase_preset['label'];

foreach ($all_requirements as $index => $requirement_item) {
  $all_requirements[$index]['phase'] = $phase_label;
}

$document_state_adjustments = [
  'collection' => [
    'supporting_files_increment' => 2,
    'clear_missing_items'        => false,
    'submitted_item_label'       => 'As-built evidence register (latest)',
    'next_action'                => 'Validate implementation evidence and as-built alignment before verification handoff',
    'consultant_note'            => 'Implementation-stage evidence is in progress and should be checked against approved design intent.',
    'next_recommended_action'    => 'Collect site implementation proof and update traceability mapping for this requirement.',
  ],
  'review' => [
    'supporting_files_increment' => 3,
    'clear_missing_items'        => true,
    'submitted_item_label'       => 'Final verification and signoff package',
    'next_action'                => 'Close verifier comments and finalize submission package.',
    'consultant_note'            => 'Requirement evidence package is in final verification and submission consolidation.',
    'next_recommended_action'    => 'Complete final verifier signoff and lock supporting evidence references.',
  ],
  'complete' => [
    'supporting_files_increment' => 4,
    'clear_missing_items'        => true,
    'submitted_item_label'       => 'Submission-ready evidence package',
    'next_action'                => 'Maintain traceability and lock approved submission references.',
    'consultant_note'            => 'Requirement has met completion gate and is ready for final register export.',
    'next_recommended_action'    => 'Confirm all linked files remain in the locked submission package.',
  ],
];

if (isset($document_state_adjustments[$documents_phase_state])) {
  $documents_adjustment = $document_state_adjustments[$documents_phase_state];

  foreach ($all_requirements as $index => $requirement_item) {
    $existing_submitted_items = isset($requirement_item['submitted_items']) && is_array($requirement_item['submitted_items'])
      ? $requirement_item['submitted_items']
      : [];
    $existing_missing_items = isset($requirement_item['missing_items']) && is_array($requirement_item['missing_items'])
      ? $requirement_item['missing_items']
      : [];
    $existing_missing_count = count($existing_missing_items);

    $all_requirements[$index]['supporting_files_count'] = (int) ($requirement_item['supporting_files_count'] ?? 0) + (int) $documents_adjustment['supporting_files_increment'];
    $all_requirements[$index]['next_action'] = (string) $documents_adjustment['next_action'];
    $all_requirements[$index]['consultant_note'] = (string) $documents_adjustment['consultant_note'];
    $all_requirements[$index]['next_recommended_action'] = (string) $documents_adjustment['next_recommended_action'];
    $all_requirements[$index]['submitted_items'] = array_values(array_unique(array_merge($existing_submitted_items, [
      (string) $documents_adjustment['submitted_item_label'],
    ])));

    if ($documents_adjustment['clear_missing_items'] === true) {
      $all_requirements[$index]['missing_items_count'] = 0;
      $all_requirements[$index]['missing_items'] = [];
      continue;
    }

    $all_requirements[$index]['missing_items_count'] = max(0, (int) ($requirement_item['missing_items_count'] ?? 0) - 1);

    if ($existing_missing_count > 0) {
      $all_requirements[$index]['missing_items'] = array_slice($existing_missing_items, 0, $existing_missing_count - 1);
    } else {
      $all_requirements[$index]['missing_items'] = [];
    }
  }
}

if ($documents_phase_state === 'collection') {
  $documents_collection_blocked_ids = [
    'eq4-low-voc-material-documentation',
    'mr-construction-waste-management-plan',
    'we-rainwater-harvesting-design-package',
  ];
  $documents_collection_under_review_ids = [
    'ee2-energy-monitoring-readiness',
    'sm-stormwater-management-strategy',
    'in-green-education-user-guide-concept',
  ];

  foreach ($requirement_rubric_inputs as $requirement_id => $rubric_input) {
    $is_documents_collection_blocked = in_array($requirement_id, $documents_collection_blocked_ids, true);
    $is_documents_collection_review = in_array($requirement_id, $documents_collection_under_review_ids, true);

    $requirement_rubric_inputs[$requirement_id]['mandatory_docs_complete'] = !$is_documents_collection_blocked;
    $requirement_rubric_inputs[$requirement_id]['has_critical_blocker'] = false;
    $requirement_rubric_inputs[$requirement_id]['has_blocking_item'] = $is_documents_collection_blocked || $is_documents_collection_review;
    $requirement_rubric_inputs[$requirement_id]['review_state'] = $is_documents_collection_blocked
      ? 'submitted'
      : ($is_documents_collection_review ? 'under_review' : 'accepted');
  }
}

if (in_array($documents_phase_state, ['review', 'complete'], true)) {
  foreach ($requirement_rubric_inputs as $requirement_id => $rubric_input) {
    $requirement_rubric_inputs[$requirement_id]['mandatory_docs_complete'] = true;
    $requirement_rubric_inputs[$requirement_id]['has_critical_blocker'] = false;
    $requirement_rubric_inputs[$requirement_id]['has_blocking_item'] = false;
    $requirement_rubric_inputs[$requirement_id]['review_state'] = 'accepted';
  }
}

$status_counter = [
  'Satisfied'              => 0,
  'Partial'                => 0,
  'Missing'                => 0,
  'Ready for Gap Analysis' => 0,
];
$blocking_item_count = 0;
$ready_for_mapping_count = 0;

foreach ($all_requirements as $index => $requirement_item) {
  $requirement_id = isset($requirement_item['id']) ? trim((string) $requirement_item['id']) : '';
  $rubric_input   = isset($requirement_rubric_inputs[$requirement_id]) && is_array($requirement_rubric_inputs[$requirement_id])
    ? $requirement_rubric_inputs[$requirement_id]
    : [];

  $review_state = isset($rubric_input['review_state']) ? trim((string) $rubric_input['review_state']) : 'accepted';
  if ($review_state === '') {
    $review_state = 'accepted';
  }

  $mandatory_docs_complete = isset($rubric_input['mandatory_docs_complete']) ? $rubric_input['mandatory_docs_complete'] === true : true;
  $has_critical_blocker    = isset($rubric_input['has_critical_blocker']) ? $rubric_input['has_critical_blocker'] === true : false;
  $has_blocking_item       = isset($rubric_input['has_blocking_item']) ? $rubric_input['has_blocking_item'] === true : false;

  $base_readiness = 0;
  $base_readiness += $mandatory_docs_complete ? 45 : 15;

  if ($review_state === 'accepted') {
    $base_readiness += 40;
  } elseif ($review_state === 'under_review') {
    $base_readiness += 30;
  } elseif ($review_state === 'submitted') {
    $base_readiness += 20;
  }

  $base_readiness += $has_blocking_item ? 15 : 20;

  $readiness_cap = 100;
  $applied_caps  = [];

  if ($has_critical_blocker) {
    $readiness_cap = min($readiness_cap, 49);
    $applied_caps[] = [
      'rule'   => 'Critical blocker active',
      'effect' => 'Cap at 49%',
    ];
  }

  if (!$mandatory_docs_complete) {
    $readiness_cap = min($readiness_cap, 59);
    $applied_caps[] = [
      'rule'   => 'Mandatory documents incomplete',
      'effect' => 'Cap at 59%',
    ];
  }

  if ($review_state === 'under_review') {
    $readiness_cap = min($readiness_cap, 79);
    $applied_caps[] = [
      'rule'   => 'Review state under review',
      'effect' => 'Cap at 79%',
    ];
  }

  $computed_readiness = (int) min($base_readiness, $readiness_cap);
  $computed_status    = $derive_status($computed_readiness, $review_state);

  $all_requirements[$index]['readiness_percent'] = $computed_readiness;
  $all_requirements[$index]['status']            = $computed_status;
  $all_requirements[$index]['readiness_rubric']  = [
    'mode'                     => 'simple',
    'base_score'               => $base_readiness,
    'cap_score'                => $readiness_cap,
    'applied_caps'             => $applied_caps,
    'mandatory_docs_complete'  => $mandatory_docs_complete,
    'has_critical_blocker'     => $has_critical_blocker,
    'has_blocking_item'        => $has_blocking_item,
    'review_state'             => $review_state,
  ];

  if ($has_blocking_item) {
    $blocking_item_count += 1;
  }

  if ($computed_readiness >= 80) {
    $ready_for_mapping_count += 1;
  }

  if (isset($status_counter[$computed_status])) {
    $status_counter[$computed_status] += 1;
  }
}

$total_requirements = count($all_requirements);
$readiness_ratio = $total_requirements > 0
  ? (int) round(($ready_for_mapping_count / $total_requirements) * 100)
  : 0;

$document_header['requirement_readiness'] = $ready_for_mapping_count . ' / ' . $total_requirements . ' requirements ready (' . $readiness_ratio . '%)';

$summary_cards = [
  ['label' => 'Total Requirements', 'value' => (string) $total_requirements, 'helper' => 'Across EE, EQ, SM, MR, WE, and IN', 'tone' => 'neutral', 'icon_name' => 'list-check-3'],
  ['label' => 'Satisfied', 'value' => (string) $status_counter['Satisfied'], 'helper' => 'Sufficient for current phase closure', 'tone' => 'positive', 'icon_name' => 'checkbox-circle-line'],
  ['label' => 'Partial', 'value' => (string) $status_counter['Partial'], 'helper' => 'More inputs needed before next gate', 'tone' => 'warning', 'icon_name' => 'error-warning-line'],
  ['label' => 'Missing', 'value' => (string) $status_counter['Missing'], 'helper' => 'Mandatory content still incomplete', 'tone' => 'negative', 'icon_name' => 'close-circle-line'],
  ['label' => 'Ready for Gap Analysis', 'value' => (string) $status_counter['Ready for Gap Analysis'], 'helper' => 'Requirements at 80%-89% readiness', 'tone' => 'positive', 'icon_name' => 'bar-chart-grouped-line'],
  ['label' => 'Blocking Items', 'value' => (string) $blocking_item_count, 'helper' => 'Flagged blockers requiring follow-up', 'tone' => $blocking_item_count > 0 ? 'warning' : 'positive', 'icon_name' => 'alert-line'],
];

$criteria_order = [
  'EE' => 'Energy Efficiency',
  'EQ' => 'Indoor Environment Quality',
  'SM' => 'Sustainable Site Planning & Management',
  'MR' => 'Materials & Resources',
  'WE' => 'Water Efficiency',
  'IN' => 'Innovation',
];

$requirement_owner_side_map = [
  'eq4-low-voc-material-documentation'   => 'Client',
  'mr-construction-waste-management-plan' => 'Client',
  'we-rainwater-harvesting-design-package' => 'Client',
];

$selected_filter = isset($_GET['requirement_filter']) ? trim((string) $_GET['requirement_filter']) : 'all';
$search_value    = isset($_GET['requirement_search']) ? trim((string) $_GET['requirement_search']) : '';
$selected_id     = isset($_GET['requirement_id']) ? trim((string) $_GET['requirement_id']) : 'ee2-energy-monitoring-readiness';
$open_drawer_id  = isset($_GET['open_drawer_id']) ? trim((string) $_GET['open_drawer_id']) : '';
$project_nav_search_hidden_inputs = [
  'requirement_filter' => $selected_filter,
];

if ($selected_id !== '') {
  $project_nav_search_hidden_inputs['requirement_id'] = $selected_id;
}

$submitted_gate_requirement_id = isset($_GET['gate_requirement_id']) ? trim((string) $_GET['gate_requirement_id']) : '';
$allowed_review_states = ['not_started', 'submitted', 'under_review', 'accepted'];

if (
  $submitted_gate_requirement_id !== ''
  && isset($requirement_rubric_inputs[$submitted_gate_requirement_id])
  && is_array($requirement_rubric_inputs[$submitted_gate_requirement_id])
) {
  $submitted_review_state = isset($_GET['gate_review_state']) ? trim((string) $_GET['gate_review_state']) : 'accepted';

  if (!in_array($submitted_review_state, $allowed_review_states, true)) {
    $submitted_review_state = 'accepted';
  }

  $requirement_rubric_inputs[$submitted_gate_requirement_id]['mandatory_docs_complete'] = isset($_GET['gate_mandatory_docs']) && trim((string) $_GET['gate_mandatory_docs']) === '1';
  $requirement_rubric_inputs[$submitted_gate_requirement_id]['has_critical_blocker'] = isset($_GET['gate_critical_blocker']) && trim((string) $_GET['gate_critical_blocker']) === '1';
  $requirement_rubric_inputs[$submitted_gate_requirement_id]['has_blocking_item'] = isset($_GET['gate_blocking_item']) && trim((string) $_GET['gate_blocking_item']) === '1';
  $requirement_rubric_inputs[$submitted_gate_requirement_id]['review_state'] = $submitted_review_state;
}

$valid_filter_keys = [];

foreach ($requirement_filters as $filter_item) {
  $filter_key = isset($filter_item['key']) ? trim((string) $filter_item['key']) : '';

  if ($filter_key === '') {
    continue;
  }

  $valid_filter_keys[] = $filter_key;
}

if (!in_array($selected_filter, $valid_filter_keys, true)) {
  $selected_filter = 'all';
}

$document_header['phase_dropdown'] = [];

$filter_count_base_requirements = [];

foreach ($all_requirements as $requirement_item) {
  $title  = isset($requirement_item['title']) ? trim((string) $requirement_item['title']) : '';
  $owner  = isset($requirement_item['owner']) ? trim((string) $requirement_item['owner']) : '';
  $credit = isset($requirement_item['linked_gbi_credit']) ? trim((string) $requirement_item['linked_gbi_credit']) : '';
  $tokens = isset($requirement_item['search_tokens']) ? trim((string) $requirement_item['search_tokens']) : '';

  if ($search_value !== '') {
    $search_haystack = strtolower(trim(implode(' ', [$title, $owner, $credit, $tokens])));

    if (!str_contains($search_haystack, strtolower($search_value))) {
      continue;
    }
  }

  $filter_count_base_requirements[] = $requirement_item;
}

$requirement_filter_counts = [
  'all'       => count($filter_count_base_requirements),
  'missing'   => 0,
  'partial'   => 0,
  'satisfied' => 0,
  'ready'     => 0,
  'blocking'  => 0,
  'ee'        => 0,
  'eq'        => 0,
  'sm'        => 0,
  'mr'        => 0,
  'we'        => 0,
  'in'        => 0,
];

foreach ($filter_count_base_requirements as $requirement_item) {
  $criteria_code = strtolower(trim((string) ($requirement_item['criteria_code'] ?? '')));
  $status        = trim((string) ($requirement_item['status'] ?? ''));
  $missing_count = (int) ($requirement_item['missing_items_count'] ?? 0);

  if (isset($requirement_filter_counts[$criteria_code])) {
    $requirement_filter_counts[$criteria_code] += 1;
  }

  if ($status === 'Missing') {
    $requirement_filter_counts['missing'] += 1;
  }

  if ($status === 'Partial') {
    $requirement_filter_counts['partial'] += 1;
  }

  if ($status === 'Satisfied') {
    $requirement_filter_counts['satisfied'] += 1;
  }

  if ($status === 'Ready for Gap Analysis') {
    $requirement_filter_counts['ready'] += 1;
  }

  if ($missing_count > 0 && ($status === 'Missing' || $status === 'Partial' || $status === 'Not Started')) {
    $requirement_filter_counts['blocking'] += 1;
  }
}

foreach ($requirement_filters as $index => $filter_item) {
  $filter_key = strtolower(trim((string) ($filter_item['key'] ?? '')));
  $requirement_filters[$index]['count'] = isset($requirement_filter_counts[$filter_key])
    ? (int) $requirement_filter_counts[$filter_key]
    : 0;
}

$requirement_section_filter_items = [];

foreach ($requirement_filters as $filter_item) {
  $filter_label = isset($filter_item['label']) ? trim((string) $filter_item['label']) : '';
  $filter_key   = isset($filter_item['key']) ? trim((string) $filter_item['key']) : '';
  $filter_count = isset($filter_item['count']) ? (int) $filter_item['count'] : 0;

  if ($filter_label === '' || $filter_key === '') {
    continue;
  }

  $requirement_section_filter_items[] = [
    'label'     => $filter_label,
    'count'     => $filter_count,
    'is_active' => $selected_filter === $filter_key,
    'href'      => path('/mampan/consultant/documents/document-hub')
      . '?phase=' . urlencode($selected_phase_key)
      . '&requirement_filter=' . urlencode($filter_key)
      . '&requirement_search=' . urlencode($search_value)
      . '&requirement_id=' . urlencode($selected_id),
  ];
}

$requirement_section_filter = [
  'aria_label' => 'Requirement filter navigation',
  'items'      => $requirement_section_filter_items,
  'action'     => [
    'label'   => 'Request Missing Info',
    'variant' => 'primary',
    'href'    => path('/mampan/consultant/rfi/rfi-create'),
    'class'   => 'bg-primary-700!important shadow-none',
  ],
];

$status_filter_map = [
  'missing'   => ['Missing'],
  'partial'   => ['Partial'],
  'satisfied' => ['Satisfied'],
  'ready'     => ['Ready for Gap Analysis'],
];

$requirements_filtered = [];

foreach ($all_requirements as $requirement_item) {
  $criteria_code = isset($requirement_item['criteria_code']) ? trim((string) $requirement_item['criteria_code']) : '';
  $status        = isset($requirement_item['status']) ? trim((string) $requirement_item['status']) : '';
  $title         = isset($requirement_item['title']) ? trim((string) $requirement_item['title']) : '';
  $owner         = isset($requirement_item['owner']) ? trim((string) $requirement_item['owner']) : '';
  $credit        = isset($requirement_item['linked_gbi_credit']) ? trim((string) $requirement_item['linked_gbi_credit']) : '';
  $tokens        = isset($requirement_item['search_tokens']) ? trim((string) $requirement_item['search_tokens']) : '';
  $missing_count = isset($requirement_item['missing_items_count']) ? (int) $requirement_item['missing_items_count'] : 0;

  $passes_filter = true;

  if (isset($status_filter_map[$selected_filter])) {
    $passes_filter = in_array($status, $status_filter_map[$selected_filter], true);
  }

  if ($selected_filter === 'blocking') {
    $passes_filter = $missing_count > 0 && ($status === 'Missing' || $status === 'Partial' || $status === 'Not Started');
  }

  if (isset($criteria_order[strtoupper($selected_filter)])) {
    $passes_filter = $criteria_code === strtoupper($selected_filter);
  }

  if (!$passes_filter) {
    continue;
  }

  if ($search_value !== '') {
    $search_haystack = strtolower(trim(implode(' ', [$title, $owner, $credit, $tokens])));

    if (!str_contains($search_haystack, strtolower($search_value))) {
      continue;
    }
  }

  $requirements_filtered[] = $requirement_item;
}

$selected_requirement = null;

foreach ($all_requirements as $requirement_item) {
  $requirement_id = isset($requirement_item['id']) ? trim((string) $requirement_item['id']) : '';

  if ($requirement_id === $selected_id) {
    $selected_requirement = $requirement_item;
    break;
  }
}

if ($selected_requirement === null && $all_requirements !== []) {
  $selected_requirement = $all_requirements[0];
}

if ($selected_requirement !== null) {
  $selected_id = isset($selected_requirement['id']) ? trim((string) $selected_requirement['id']) : '';
}

$requirements_grouped = [];
$related_rfi_rows = [
  [
    'rfi_no'      => 'RFI #004',
    'subject'     => 'EE2 Energy Monitoring Trend Data',
    'linked_item' => 'GBI Credit: EE2 | Chilled Water System Schematic Rev B',
    'detail_url'  => path('/mampan/consultant/rfi/rfi-detail?rfi=004'),
  ],
  [
    'rfi_no'      => 'RFI #009',
    'subject'     => 'EE2 Meter Calibration Certificate',
    'linked_item' => 'GBI Credit: EE2 | Metering Layout Rev A',
    'detail_url'  => path('/mampan/consultant/rfi/rfi-detail?rfi=009'),
  ],
  [
    'rfi_no'      => 'RFI #010',
    'subject'     => 'EE2 Monitoring Responsibility Matrix',
    'linked_item' => 'GBI Credit: EE2 | BMS Point Schedule',
    'detail_url'  => path('/mampan/consultant/rfi/rfi-detail?rfi=010'),
  ],
  [
    'rfi_no'      => 'RFI #005',
    'subject'     => 'EQ4 Low-VOC Paint Declaration',
    'linked_item' => 'GBI Credit: EQ4 | Low-VOC Paint Declaration',
    'detail_url'  => path('/mampan/consultant/rfi/rfi-detail?rfi=005'),
  ],
  [
    'rfi_no'      => 'RFI #006',
    'subject'     => 'WE3 Rainwater Harvesting O&M Manual',
    'linked_item' => 'GBI Credit: WE3 | O&M Manual',
    'detail_url'  => path('/mampan/consultant/rfi/rfi-detail?rfi=006'),
  ],
  [
    'rfi_no'      => 'RFI #007',
    'subject'     => 'MR2 Sustainable Material Certificate',
    'linked_item' => 'GBI Credit: MR2 | Material Certificate',
    'detail_url'  => path('/mampan/consultant/rfi/rfi-detail?rfi=007'),
  ],
  [
    'rfi_no'      => 'RFI #008',
    'subject'     => 'AHU Commissioning Report Test Results',
    'linked_item' => 'GBI Credit: EE Cx | AHU Commissioning Report Rev B',
    'detail_url'  => path('/mampan/consultant/rfi/rfi-detail?rfi=008'),
  ],
];
$rfi_links_by_credit = [];

foreach ($related_rfi_rows as $rfi_row) {
  if (!is_array($rfi_row)) {
    continue;
  }

  $rfi_no = isset($rfi_row['rfi_no']) ? trim((string) $rfi_row['rfi_no']) : '';
  $rfi_subject = isset($rfi_row['subject']) ? trim((string) $rfi_row['subject']) : '';
  $rfi_linked_item = isset($rfi_row['linked_item']) ? trim((string) $rfi_row['linked_item']) : '';
  $rfi_detail_url = isset($rfi_row['detail_url']) ? trim((string) $rfi_row['detail_url']) : '';

  if ($rfi_no === '' || $rfi_subject === '' || $rfi_linked_item === '' || $rfi_detail_url === '') {
    continue;
  }

  if (!preg_match('/GBI Credit:\s*([^|]+)/i', $rfi_linked_item, $credit_match)) {
    continue;
  }

  $rfi_credit_code = trim((string) $credit_match[1]);

  if ($rfi_credit_code === '') {
    continue;
  }

  if (!isset($rfi_links_by_credit[$rfi_credit_code]) || !is_array($rfi_links_by_credit[$rfi_credit_code])) {
    $rfi_links_by_credit[$rfi_credit_code] = [];
  }

  $rfi_links_by_credit[$rfi_credit_code][] = [
    'label' => $rfi_no . ': ' . $rfi_subject,
    'href'  => $rfi_detail_url,
  ];
}

foreach ($criteria_order as $criteria_code => $criteria_label) {
  $requirements_grouped[$criteria_code] = [
    'criteria_code'  => $criteria_code,
    'criteria_label' => $criteria_label,
    'items'          => [],
  ];
}

foreach ($requirements_filtered as $requirement_item) {
  $criteria_code = isset($requirement_item['criteria_code']) ? trim((string) $requirement_item['criteria_code']) : '';

  if (!isset($requirements_grouped[$criteria_code])) {
    continue;
  }

  $requirement_id = isset($requirement_item['id']) ? trim((string) $requirement_item['id']) : '';
  $requirement_credit = isset($requirement_item['linked_gbi_credit']) ? trim((string) $requirement_item['linked_gbi_credit']) : '';
  $requirement_rfi_links = isset($rfi_links_by_credit[$requirement_credit]) && is_array($rfi_links_by_credit[$requirement_credit])
    ? $rfi_links_by_credit[$requirement_credit]
    : [];

  $requirements_grouped[$criteria_code]['items'][] = [
    'id'                     => $requirement_id,
    'detail_drawer_id'       => 'document-requirement-drawer-' . $requirement_id,
    'title'                  => isset($requirement_item['title']) ? (string) $requirement_item['title'] : '-',
    'linked_gbi_credit'      => isset($requirement_item['linked_gbi_credit']) ? (string) $requirement_item['linked_gbi_credit'] : '-',
    'phase'                  => isset($requirement_item['phase']) ? (string) $requirement_item['phase'] : '-',
    'owner'                  => isset($requirement_item['owner']) ? (string) $requirement_item['owner'] : '-',
    'owner_side'             => isset($requirement_owner_side_map[$requirement_id]) ? (string) $requirement_owner_side_map[$requirement_id] : 'Consultant',
    'status'                 => isset($requirement_item['status']) ? (string) $requirement_item['status'] : 'Not Started',
    'readiness_percent'      => isset($requirement_item['readiness_percent']) ? (int) $requirement_item['readiness_percent'] : 0,
    'supporting_files_count' => isset($requirement_item['supporting_files_count']) ? (int) $requirement_item['supporting_files_count'] : 0,
    'missing_items_count'    => isset($requirement_item['missing_items_count']) ? (int) $requirement_item['missing_items_count'] : 0,
    'next_action'            => isset($requirement_item['next_action']) ? (string) $requirement_item['next_action'] : '-',
    'rfi_links'              => $requirement_rfi_links,
    'is_selected'            => $requirement_id !== '' && $requirement_id === $selected_id,
  ];
}

$supporting_files_by_requirement = [
  'ee2-energy-monitoring-readiness' => [
    ['file_name' => 'Chilled water schematic Rev B', 'version' => 'Rev B', 'category' => 'M&E Schematic', 'uploaded_by' => 'Mechanical Engineer', 'uploaded_date' => '2026-04-18', 'file_status' => 'Accepted', 'action_label' => 'View'],
    ['file_name' => 'Metering layout Rev A', 'version' => 'Rev A', 'category' => 'Metering Layout', 'uploaded_by' => 'M&E Engineer', 'uploaded_date' => '2026-04-19', 'file_status' => 'Accepted', 'action_label' => 'View'],
    ['file_name' => 'BMS point schedule', 'version' => 'v1', 'category' => 'Controls', 'uploaded_by' => 'Controls Specialist', 'uploaded_date' => '2026-04-21', 'file_status' => 'Pending Review', 'action_label' => 'Review'],
    ['file_name' => 'Energy trend log sample', 'version' => 'v1', 'category' => 'Monitoring Data', 'uploaded_by' => 'Facility Manager', 'uploaded_date' => '2026-04-22', 'file_status' => 'Needs Revision', 'action_label' => 'Request Revision'],
  ],
  'default' => [
    ['file_name' => 'Requirement support file package', 'version' => 'v1', 'category' => 'General', 'uploaded_by' => 'Project Coordinator', 'uploaded_date' => '2026-04-20', 'file_status' => 'Pending Review', 'action_label' => 'Review'],
  ],
];

$requirement_drawers = [];

foreach ($requirements_filtered as $requirement_item) {
  $requirement_id = isset($requirement_item['id']) ? trim((string) $requirement_item['id']) : '';

  if ($requirement_id === '') {
    continue;
  }

  $requirement_detail_data = [
    'title'                   => isset($requirement_item['title']) ? (string) $requirement_item['title'] : '-',
    'phase_label'             => (string) $selected_phase_preset['label'],
    'linked_gbi_credit'       => isset($requirement_item['linked_gbi_credit']) ? (string) $requirement_item['linked_gbi_credit'] : '-',
    'criteria_group'          => isset($requirement_item['criteria_label']) ? (string) $requirement_item['criteria_label'] : '-',
    'status'                  => isset($requirement_item['status']) ? (string) $requirement_item['status'] : 'Not Started',
    'readiness_percent'       => isset($requirement_item['readiness_percent']) ? (int) $requirement_item['readiness_percent'] : 0,
    'why_needed'              => isset($requirement_item['why_needed']) ? (string) $requirement_item['why_needed'] : '-',
    'submitted_items'         => isset($requirement_item['submitted_items']) && is_array($requirement_item['submitted_items'])
      ? $requirement_item['submitted_items']
      : [],
    'missing_items'           => isset($requirement_item['missing_items']) && is_array($requirement_item['missing_items'])
      ? $requirement_item['missing_items']
      : [],
    'consultant_note'         => isset($requirement_item['consultant_note']) ? (string) $requirement_item['consultant_note'] : '-',
    'next_recommended_action' => isset($requirement_item['next_recommended_action']) ? (string) $requirement_item['next_recommended_action'] : '-',
    'readiness_rubric'        => isset($requirement_item['readiness_rubric']) && is_array($requirement_item['readiness_rubric'])
      ? $requirement_item['readiness_rubric']
      : [],
    'manage_form'             => [
      'action'             => path('/mampan/consultant/documents/document-hub'),
      'requirement_id'     => $requirement_id,
      'requirement_filter' => $selected_filter,
      'requirement_search' => $search_value,
      'open_drawer_id'     => $requirement_id,
    ],
    'action_items'            => [
      ['label' => 'Create Clarification', 'href' => path('/mampan/consultant/rfi/rfi-create'), 'tone' => 'primary'],
      ['label' => 'Link Supporting File', 'href' => path('/mampan/consultant/documents/document-hub'), 'tone' => 'secondary'],
      ['label' => 'Mark Ready for Gap Analysis', 'href' => path('/mampan/consultant/reports/gap-analysis-report'), 'tone' => 'secondary'],
    ],
  ];

  $requirement_supporting_files = isset($supporting_files_by_requirement[$requirement_id])
    ? $supporting_files_by_requirement[$requirement_id]
    : $supporting_files_by_requirement['default'];

  ob_start();
  component('documents/document-requirement-detail', [
    'requirement_detail' => $requirement_detail_data,
  ]);
  component('documents/document-supporting-files', [
    'requirement_title' => $requirement_detail_data['title'],
    'supporting_files'  => $requirement_supporting_files,
  ]);
  $drawer_body_html = (string) ob_get_clean();

  $requirement_drawers[] = [
    'id'        => 'document-requirement-drawer-' . $requirement_id,
    'title'     => 'Requirement Detail',
    'body_html' => $drawer_body_html,
  ];
}

$blocking_items = [
  [
    'title'              => 'EE2 missing trend data sample',
    'linked_requirement' => 'EE2 Energy Monitoring Readiness',
    'owner'              => 'Facility Manager',
    'priority'           => 'High',
    'due_date'           => '2026-04-29',
    'action_label'       => 'Create Clarification',
    'action_href'        => path('/mampan/consultant/rfi/rfi-create'),
  ],
  [
    'title'              => 'EQ4 certificates do not mention VOC limit',
    'linked_requirement' => 'EQ4 Low-VOC Material Documentation',
    'owner'              => 'Procurement Manager',
    'priority'           => 'High',
    'due_date'           => '2026-04-30',
    'action_label'       => 'Request Revision',
    'action_href'        => path('/mampan/consultant/rfi/rfi-create'),
  ],
  [
    'title'              => 'WE3 O&M manual not provided',
    'linked_requirement' => 'Rainwater Harvesting Design Package',
    'owner'              => 'Facility Manager',
    'priority'           => 'Medium',
    'due_date'           => '2026-05-02',
    'action_label'       => 'Request Missing Info',
    'action_href'        => path('/mampan/consultant/rfi/rfi-create'),
  ],
  [
    'title'              => 'SM drawings missing landscape area calculation',
    'linked_requirement' => 'Stormwater Management Strategy',
    'owner'              => 'Civil Engineer',
    'priority'           => 'Medium',
    'due_date'           => '2026-05-01',
    'action_label'       => 'Follow Up',
    'action_href'        => path('/mampan/consultant/rfi/rfi-index'),
  ],
];

$next_actions = [
  [
    'title'               => 'Request missing EE2 monitoring data from client',
    'related_requirement' => 'EE2 Energy Monitoring Readiness',
    'owner'               => 'Consultant Technical Lead',
    'priority'            => 'High',
    'action_label'        => 'Create Clarification',
    'action_href'         => path('/mampan/consultant/rfi/rfi-create'),
  ],
  [
    'title'               => 'Ask procurement team for EQ4 certificate revision',
    'related_requirement' => 'EQ4 Low-VOC Material Documentation',
    'owner'               => 'Procurement Coordinator',
    'priority'            => 'High',
    'action_label'        => 'Send Request',
    'action_href'         => path('/mampan/consultant/rfi/rfi-create'),
  ],
  [
    'title'               => 'Review WE1 water fittings schedule',
    'related_requirement' => 'Water Efficient Fittings Schedule',
    'owner'               => 'Water Specialist',
    'priority'            => 'Medium',
    'action_label'        => 'Open Requirement',
    'action_href'         => path('/mampan/consultant/documents/document-hub') . '?requirement_id=we-water-efficient-fittings-schedule',
  ],
  [
    'title'               => 'Prepare initial gap analysis after 9 requirements are ready',
    'related_requirement' => 'Cross-criteria readiness',
    'owner'               => 'GBI Assessor',
    'priority'            => 'Medium',
    'action_label'        => 'Open Gap Report',
    'action_href'         => path('/mampan/consultant/reports/gap-analysis-report'),
  ],
  [
    'title'               => 'Move satisfied requirements to Evidence setup later',
    'related_requirement' => 'Phase transition planning',
    'owner'               => 'Consultant PM',
    'priority'            => 'Low',
    'action_label'        => 'Open Evidence Module',
    'action_href'         => path('/mampan/consultant/evidence/evidence-index'),
  ],
];

if ($documents_phase_state === 'collection') {
  $blocking_items = [
    [
      'title'              => 'EE2 as-built meter tagging photos incomplete',
      'linked_requirement' => 'EE2 Energy Monitoring Readiness',
      'owner'              => 'M&E Engineer',
      'priority'           => 'High',
      'due_date'           => '2026-05-24',
      'action_label'       => 'Request Site Proof',
      'action_href'        => path('/mampan/consultant/rfi/rfi-create'),
    ],
    [
      'title'              => 'EQ4 material submittals missing final supplier declaration',
      'linked_requirement' => 'EQ4 Low-VOC Material Documentation',
      'owner'              => 'Procurement Manager',
      'priority'           => 'High',
      'due_date'           => '2026-05-25',
      'action_label'       => 'Follow Up',
      'action_href'        => path('/mampan/consultant/rfi/rfi-index'),
    ],
    [
      'title'              => 'WE3 tank installation method statement pending',
      'linked_requirement' => 'Rainwater Harvesting Design Package',
      'owner'              => 'Site Supervisor',
      'priority'           => 'Medium',
      'due_date'           => '2026-05-27',
      'action_label'       => 'Request Method Statement',
      'action_href'        => path('/mampan/consultant/rfi/rfi-create'),
    ],
  ];

  $next_actions = [
    [
      'title'               => 'Validate as-built implementation against approved design intent',
      'related_requirement' => 'Cross-criteria implementation checks',
      'owner'               => 'Consultant Technical Lead',
      'priority'            => 'High',
      'action_label'        => 'Open Requirement',
      'action_href'         => path('/mampan/consultant/documents/document-hub'),
    ],
    [
      'title'               => 'Close open site-level blockers before verification gate',
      'related_requirement' => 'Phase 2 gate closure',
      'owner'               => 'Consultant PM',
      'priority'            => 'High',
      'action_label'        => 'Open RFI Index',
      'action_href'         => path('/mampan/consultant/rfi/rfi-index'),
    ],
    [
      'title'               => 'Bundle implementation evidence per requirement for verifier handoff',
      'related_requirement' => 'Evidence package readiness',
      'owner'               => 'Document Controller',
      'priority'            => 'Medium',
      'action_label'        => 'Open Evidence Module',
      'action_href'         => path('/mampan/consultant/evidence/evidence-index'),
    ],
  ];
}

$map_document_status = static function (string $status_label): string {
  $normalized_status = trim($status_label);

  if ($normalized_status === 'Satisfied' || $normalized_status === 'Ready for Gap Analysis') {
    return 'Verified';
  }

  if ($normalized_status === 'Partial') {
    return 'Need Revision';
  }

  if ($normalized_status === 'Not Started') {
    return 'Required';
  }

  if ($normalized_status === 'Accepted') {
    return 'Verified';
  }

  if ($normalized_status === 'Pending Review') {
    return 'Under Review';
  }

  if ($normalized_status === 'Needs Revision') {
    return 'Need Revision';
  }

  if ($normalized_status === '') {
    return 'Required';
  }

  return $normalized_status;
};

$blocking_due_date_map = [];
$blocking_priority_map = [];

foreach ($blocking_items as $blocking_item) {
  $linked_requirement = isset($blocking_item['linked_requirement']) ? trim((string) $blocking_item['linked_requirement']) : '';

  if ($linked_requirement === '') {
    continue;
  }

  $blocking_due_date_map[$linked_requirement] = isset($blocking_item['due_date'])
    ? trim((string) $blocking_item['due_date'])
    : '-';
  $blocking_priority_map[$linked_requirement] = isset($blocking_item['priority'])
    ? trim((string) $blocking_item['priority'])
    : 'Medium';
}

$required_documents = [];

foreach ($requirements_filtered as $requirement_item) {
  $requirement_title = isset($requirement_item['title']) ? trim((string) $requirement_item['title']) : '-';
  $criteria_label    = isset($requirement_item['criteria_label']) ? trim((string) $requirement_item['criteria_label']) : '-';
  $phase_label       = isset($requirement_item['phase']) ? trim((string) $requirement_item['phase']) : '-';
  $credit_label      = isset($requirement_item['linked_gbi_credit']) ? trim((string) $requirement_item['linked_gbi_credit']) : '-';
  $owner_label       = isset($requirement_item['owner']) ? trim((string) $requirement_item['owner']) : '-';
  $status_label      = isset($requirement_item['status']) ? (string) $requirement_item['status'] : 'Required';

  $required_documents[] = [
    'document_name'     => $requirement_title,
    'category'          => $criteria_label,
    'linked_stage'      => $phase_label,
    'linked_gbi_credit' => $credit_label,
    'owner'             => $owner_label,
    'status'            => $map_document_status($status_label),
    'due_date'          => isset($blocking_due_date_map[$requirement_title]) ? $blocking_due_date_map[$requirement_title] : '-',
  ];
}

$document_rows = [];

foreach ($requirements_filtered as $requirement_item) {
  $requirement_id    = isset($requirement_item['id']) ? trim((string) $requirement_item['id']) : '';
  $requirement_title = isset($requirement_item['title']) ? trim((string) $requirement_item['title']) : 'Requirement Support File';
  $linked_credit     = isset($requirement_item['linked_gbi_credit']) ? trim((string) $requirement_item['linked_gbi_credit']) : '-';
  $supporting_files  = isset($supporting_files_by_requirement[$requirement_id])
    ? $supporting_files_by_requirement[$requirement_id]
    : $supporting_files_by_requirement['default'];

  foreach ($supporting_files as $supporting_file) {
    $file_name      = isset($supporting_file['file_name']) ? trim((string) $supporting_file['file_name']) : '-';
    $file_version   = isset($supporting_file['version']) ? trim((string) $supporting_file['version']) : '-';
    $file_category  = isset($supporting_file['category']) ? trim((string) $supporting_file['category']) : '-';
    $uploaded_by    = isset($supporting_file['uploaded_by']) ? trim((string) $supporting_file['uploaded_by']) : '-';
    $uploaded_date  = isset($supporting_file['uploaded_date']) ? trim((string) $supporting_file['uploaded_date']) : '-';
    $file_status    = isset($supporting_file['file_status']) ? (string) $supporting_file['file_status'] : 'Submitted';
    $file_action    = isset($supporting_file['action_label']) ? trim((string) $supporting_file['action_label']) : 'View';
    $mapped_status  = $map_document_status($file_status);

    $document_rows[] = [
      'title'          => $file_name,
      'description'    => 'Requirement: ' . $requirement_title,
      'category'       => $file_category,
      'linked_item'    => $linked_credit . ' | ' . $requirement_title,
      'version'        => $file_version,
      'submitted_by'   => $uploaded_by,
      'submitted_date' => $uploaded_date,
      'status'         => $mapped_status,
      'actions'        => [$file_action],
    ];
  }
}

$missing_documents = [];
$revision_documents = [];

foreach ($requirements_filtered as $requirement_item) {
  $requirement_title = isset($requirement_item['title']) ? trim((string) $requirement_item['title']) : '-';
  $linked_credit     = isset($requirement_item['linked_gbi_credit']) ? trim((string) $requirement_item['linked_gbi_credit']) : '-';
  $owner_label       = isset($requirement_item['owner']) ? trim((string) $requirement_item['owner']) : '-';
  $missing_items     = isset($requirement_item['missing_items']) && is_array($requirement_item['missing_items'])
    ? $requirement_item['missing_items']
    : [];
  $submitted_items   = isset($requirement_item['submitted_items']) && is_array($requirement_item['submitted_items'])
    ? $requirement_item['submitted_items']
    : [];
  $due_date_label    = isset($blocking_due_date_map[$requirement_title]) ? $blocking_due_date_map[$requirement_title] : '-';
  $priority_label    = isset($blocking_priority_map[$requirement_title]) ? $blocking_priority_map[$requirement_title] : 'Medium';

  foreach ($missing_items as $missing_item) {
    $missing_documents[] = [
      'document_name' => trim((string) $missing_item),
      'owner'         => $owner_label,
      'due_date'      => $due_date_label,
      'linked_item'   => $linked_credit . ' | ' . $requirement_title,
      'priority'      => $priority_label,
    ];
  }

  foreach ($submitted_items as $submitted_item) {
    $submitted_label = trim((string) $submitted_item);

    if ($submitted_label === '') {
      continue;
    }

    $revision_documents[] = [
      'document_name' => $submitted_label,
      'reason'        => 'Review against latest requirement checklist and missing-item closure.',
      'reviewer'      => 'Consultant Reviewer',
      'due_date'      => $due_date_label,
      'linked_item'   => $linked_credit . ' | ' . $requirement_title,
    ];
  }
}

$version_history = [];

foreach ($document_rows as $document_row) {
  $document_name = isset($document_row['title']) ? trim((string) $document_row['title']) : '-';
  $version_label = isset($document_row['version']) ? trim((string) $document_row['version']) : '-';
  $status_label  = isset($document_row['status']) ? trim((string) $document_row['status']) : 'Submitted';
  $actor_label   = isset($document_row['submitted_by']) ? trim((string) $document_row['submitted_by']) : '-';
  $time_label    = isset($document_row['submitted_date']) ? trim((string) $document_row['submitted_date']) : '-';

  $version_history[] = [
    'document_name' => $document_name,
    'version'       => $version_label,
    'activity'      => $status_label . ' update recorded',
    'actor'         => $actor_label,
    'timestamp'     => $time_label,
  ];
}

$required_documents = array_slice($required_documents, 0, 18);
$document_rows = array_slice($document_rows, 0, 24);
$missing_documents = array_slice($missing_documents, 0, 18);
$revision_documents = array_slice($revision_documents, 0, 18);
$version_history = array_slice($version_history, 0, 24);

layout('mampan/dashboard-project', [
  'page_title'       => $page_title,
  'page_current'     => $page_current,
  'project_current'      => $project_current,
  'current_phase'       => $current_phase,
  'phase_data_map'      => $phase_data_map,
  'phase_label_map'     => $phase_label_map,
  'project_nav_search' => [
    'enabled'       => true,
    'action'        => path('/mampan/consultant/documents/document-hub'),
    'name'          => 'requirement_search',
    'value'         => $search_value,
    'placeholder'   => 'Search requirement, document, credit, or owner.',
    'label'         => 'Search requirement, document, credit, or owner.',
    'hidden_inputs' => $project_nav_search_hidden_inputs,
  ],
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <?php component('mampan/section-header', [
    'section_header' => [
      'title'       => isset($document_header['title']) ? (string) $document_header['title'] : '',
      'description' => isset($document_header['description']) ? (string) $document_header['description'] : '',
      'heading_id'  => 'requirement-register-heading',
      'class_name'  => '',
    ],
  ]); ?>

  <?php component('mampan/section-filter', ['section_filter' => $requirement_section_filter]); ?>

  <?php component('documents/document-requirement-list', [
    'requirements_grouped' => $requirements_grouped,
    'selected_filter'      => $selected_filter,
    'search_value'         => $search_value,
    'selected_id'          => $selected_id,
    'document_header'      => $document_header,
  ]); ?>

  <section class="grid gap-5 xl:grid-cols-2" aria-label="Phase planning panels">
    <?php component('documents/document-blocking-items', ['blocking_items' => $blocking_items]); ?>
    <?php component('documents/document-next-actions', ['next_actions' => $next_actions]); ?>
  </section>

  <section aria-label="Documentation guide section">
    <?php component('documents/document-phase-reference', [
      'phase_reference_cards' => $phase_reference_cards,
    ]); ?>
  </section>

  <section class="space-y-5" aria-label="Additional document tracking panels">
    <?php component('documents/document-required-list', ['required_documents' => $required_documents]); ?>
    <?php component('documents/document-table', ['document_rows' => $document_rows]); ?>
    <?php component('documents/document-missing-panel', [
      'missing_documents'  => $missing_documents,
      'revision_documents' => $revision_documents,
    ]); ?>
    <?php component('documents/document-version-history', ['version_history' => $version_history]); ?>
  </section>
</article>
<?php foreach ($requirement_drawers as $drawer_item): ?>
  <?php component('drawer', [
    'id'           => (string) $drawer_item['id'],
    'title'        => (string) $drawer_item['title'],
    'position'     => 'right',
    'size'         => 'lg',
    'show_trigger' => false,
    'body_html'    => (string) $drawer_item['body_html'],
    'classes'      => [
      'body' => 'space-y-5 bg-brand-100',
    ],
  ]); ?>
<?php endforeach; ?>
<script>
  (() => {
    const derive_status = (readiness_percent, review_state) => {
      if (readiness_percent < 20) {
        return 'Not Started';
      }

      if (readiness_percent < 50) {
        return 'Missing';
      }

      if (readiness_percent < 70) {
        return 'Partial';
      }

      if (readiness_percent < 80) {
        return review_state === 'submitted' ? 'Submitted' : 'Under Review';
      }

      if (readiness_percent < 90) {
        return 'Ready for Gap Analysis';
      }

      return 'Satisfied';
    };

    const get_status_tone = (status_label) => {
      const tone_map = {
        'Satisfied': 'positive',
        'Ready for Gap Analysis': 'positive',
        'Submitted': 'neutral',
        'Under Review': 'warning',
        'Partial': 'warning',
        'Missing': 'negative',
        'Not Started': 'neutral',
      };

      return tone_map[status_label] || 'neutral';
    };

    const get_tone_class = (tone_key) => {
      const class_map = {
        'positive': 'border-positive-300 bg-positive-100 text-positive-700',
        'negative': 'border-negative-300 bg-negative-100 text-negative-700',
        'warning': 'border-attention-300 bg-attention-100 text-attention-700',
        'neutral': 'border-brand-300 bg-brand-100 text-brand-700',
      };

      return class_map[tone_key] || class_map.neutral;
    };

    const escape_html = (raw_value) => {
      const html_map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
      return String(raw_value).replace(/[&<>\"']/g, (token) => html_map[token] || token);
    };

    const render_status_badge_html = (status_label) => {
      const tone_key = get_status_tone(status_label);
      const tone_class = get_tone_class(tone_key);

      return `<span class="badge inline-flex items-center border text-xs rounded-md px-2 py-1 badge--${escape_html(tone_key)} ${tone_class}">${escape_html(status_label)}</span>`;
    };

    const get_status_text_class = (status_label) => {
      const tone_key = get_status_tone(status_label);
      const text_class_map = {
        'positive': 'text-positive-700',
        'negative': 'text-negative-700',
        'warning': 'text-attention-700',
        'neutral': 'text-brand-700',
      };

      return text_class_map[tone_key] || text_class_map.neutral;
    };

    const compute_readiness = ({ mandatory_docs_complete, has_critical_blocker, has_blocking_item, review_state }) => {
      let base_score = 0;
      base_score += mandatory_docs_complete ? 45 : 15;

      if (review_state === 'accepted') {
        base_score += 40;
      } else if (review_state === 'under_review') {
        base_score += 30;
      } else if (review_state === 'submitted') {
        base_score += 20;
      }

      base_score += has_blocking_item ? 15 : 20;

      let readiness_cap = 100;

      if (has_critical_blocker) {
        readiness_cap = Math.min(readiness_cap, 49);
      }

      if (!mandatory_docs_complete) {
        readiness_cap = Math.min(readiness_cap, 59);
      }

      if (review_state === 'under_review') {
        readiness_cap = Math.min(readiness_cap, 79);
      }

      const final_readiness = Math.min(base_score, readiness_cap);
      const derived_status = derive_status(final_readiness, review_state);

      return {
        final_readiness,
        derived_status,
      };
    };

    const sync_table_row = (requirement_id, readiness_value, status_label) => {
      const status_nodes = document.querySelectorAll(`[data-requirement-status-cell="${requirement_id}"]`);
      const readiness_nodes = document.querySelectorAll(`[data-requirement-readiness-cell="${requirement_id}"]`);
      const is_readiness_positive = status_label === 'Satisfied' || status_label === 'Ready for Gap Analysis';

      status_nodes.forEach((status_node) => {
        if (!(status_node instanceof HTMLElement)) {
          return;
        }

        status_node.textContent = status_label;
        status_node.classList.remove('text-positive-700', 'text-negative-700', 'text-attention-700', 'text-brand-700');
        status_node.classList.add(get_status_text_class(status_label));
      });

      readiness_nodes.forEach((readiness_node) => {
        if (!(readiness_node instanceof HTMLElement)) {
          return;
        }

        readiness_node.textContent = `${readiness_value}%`;

        const readiness_wrapper = readiness_node.closest('.readiness');

        if (!(readiness_wrapper instanceof HTMLElement)) {
          return;
        }

        readiness_wrapper.classList.remove('text-positive-700', 'text-brand-600');
        readiness_wrapper.classList.add(is_readiness_positive ? 'text-positive-700' : 'text-brand-600');
      });
    };

    const bind_manage_forms = () => {
      const manage_forms = Array.from(document.querySelectorAll('[data-manage-status-form]'))
        .filter((form_node) => form_node instanceof HTMLFormElement);

      manage_forms.forEach((form_node) => {
        form_node.addEventListener('submit', (event) => {
          event.preventDefault();

          const requirement_id = form_node.getAttribute('data-requirement-id') || '';

          if (requirement_id.trim() === '') {
            form_node.submit();
            return;
          }

          const form_data = new FormData(form_node);
          const mandatory_docs_complete = form_data.get('gate_mandatory_docs') === '1';
          const has_critical_blocker = form_data.get('gate_critical_blocker') === '1';
          const has_blocking_item = form_data.get('gate_blocking_item') === '1';
          const review_state_raw = String(form_data.get('gate_review_state') || 'accepted').trim();
          const review_state = ['not_started', 'submitted', 'under_review', 'accepted'].includes(review_state_raw)
            ? review_state_raw
            : 'accepted';

          const result = compute_readiness({
            mandatory_docs_complete,
            has_critical_blocker,
            has_blocking_item,
            review_state,
          });

          sync_table_row(requirement_id, result.final_readiness, result.derived_status);
        });
      });
    };

    bind_manage_forms();
  })();
</script>
<?php if ($open_drawer_id !== ''): ?>
  <script>
    (() => {
      const target_id = <?= json_encode('document-requirement-drawer-' . $open_drawer_id, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP); ?>;
      const trigger_node = document.querySelector(`[data-drawer-open][data-drawer-target="${target_id}"]`);

      if (!(trigger_node instanceof HTMLElement)) {
        return;
      }

      window.requestAnimationFrame(() => {
        trigger_node.click();
      });
    })();
  </script>
<?php endif; ?>
<?php layout('mampan/partials/dashboard-end'); ?>
