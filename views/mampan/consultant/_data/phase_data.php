<?php

declare(strict_types=1);

$phase_data_map = [
  'phase-1' => [
    'workspace' => [
      'requirement_readiness' => '18%',
      'documents'             => 2,
      'clarifications'        => 0,
      'evidence_verified'     => 0,
      'submission_status'     => 'Not Ready',
    ],

    'documents' => [
      'state'              => 'initial',
      'requirement_status' => 'mostly_missing',
      'message'            => 'Start by requesting initial project documents.',
    ],

    'clarifications' => [
      'state'   => 'empty',
      'message' => 'No clarifications created yet.',
    ],

    'evidence' => [
      'state'   => 'not_started',
      'message' => 'Evidence verification starts after requirements are ready.',
    ],

    'reports' => [
      'state'   => 'initial',
      'message' => 'Initial gap analysis not yet generated.',
    ],

    'submission' => [
      'state'   => 'not_ready',
      'message' => 'Project setup incomplete.',
    ],
  ],

  'phase-2' => [
    'workspace' => [
      'requirement_readiness' => '48%',
      'documents'             => 27,
      'clarifications'        => 8,
      'evidence_verified'     => 3,
      'submission_status'     => 'Blocked',
    ],

    'documents' => [
      'state'              => 'collection',
      'requirement_status' => 'partial',
      'message'            => 'Documents are being collected and reviewed.',
    ],

    'clarifications' => [
      'state'   => 'active',
      'message' => 'Multiple clarifications are awaiting client response.',
    ],

    'evidence' => [
      'state'   => 'pending',
      'message' => 'Evidence verification has not started yet.',
    ],

    'reports' => [
      'state'   => 'draft',
      'message' => 'Gap analysis is being prepared.',
    ],

    'submission' => [
      'state'   => 'blocked',
      'message' => 'Submission blocked by missing documents and clarifications.',
    ],
  ],

  'phase-3' => [
    'workspace' => [
      'requirement_readiness' => '78%',
      'documents'             => 46,
      'clarifications'        => 3,
      'evidence_verified'     => 28,
      'submission_status'     => 'Almost Ready',
    ],

    'documents' => [
      'state'              => 'review',
      'requirement_status' => 'under_review',
      'message'            => 'Documents are under detailed review.',
    ],

    'clarifications' => [
      'state'   => 'reducing',
      'message' => 'Most clarifications have been resolved.',
    ],

    'evidence' => [
      'state'   => 'active',
      'message' => 'Evidence is being verified.',
    ],

    'reports' => [
      'state'   => 'updated',
      'message' => 'Report reflects verification progress.',
    ],

    'submission' => [
      'state'   => 'almost_ready',
      'message' => 'Final checks ongoing.',
    ],
  ],

  'phase-4' => [
    'workspace' => [
      'requirement_readiness' => '96%',
      'documents'             => 58,
      'clarifications'        => 'Closed',
      'evidence_verified'     => 43,
      'submission_status'     => 'Ready',
    ],

    'documents' => [
      'state'              => 'complete',
      'requirement_status' => 'satisfied',
      'message'            => 'All requirements satisfied.',
    ],

    'clarifications' => [
      'state'   => 'closed',
      'message' => 'All clarifications closed.',
    ],

    'evidence' => [
      'state'   => 'verified',
      'message' => 'All evidence verified.',
    ],

    'reports' => [
      'state'   => 'final',
      'message' => 'Final report ready.',
    ],

    'submission' => [
      'state'   => 'ready',
      'message' => 'Submission package ready.',
    ],
  ],
];

$phase_label_map = [
  'phase-1' => [
    'title'    => 'Phase 1',
    'subtitle' => 'Setup & Planning',
  ],
  'phase-2' => [
    'title'    => 'Phase 2',
    'subtitle' => 'Document Collection',
  ],
  'phase-3' => [
    'title'    => 'Phase 3',
    'subtitle' => 'Evidence & Verification',
  ],
  'phase-4' => [
    'title'    => 'Phase 4',
    'subtitle' => 'Finalisation & Submission',
  ],
];

if (!function_exists('resolve_mampan_current_phase')) {
  function resolve_mampan_current_phase(array $phase_data_map, string $default_phase = 'phase-2'): string
  {
    $phase_from_post = isset($_POST['current_phase']) ? trim((string) $_POST['current_phase']) : '';
    $phase_from_cookie = isset($_COOKIE['mampan_current_phase']) ? trim((string) $_COOKIE['mampan_current_phase']) : '';
    $resolved_phase = $phase_from_post !== ''
      ? $phase_from_post
      : $phase_from_cookie;

    if (!isset($phase_data_map[$resolved_phase])) {
      $resolved_phase = $default_phase;
    }

    if ($phase_from_post !== '' && isset($phase_data_map[$phase_from_post])) {
      setcookie('mampan_current_phase', $phase_from_post, time() + (86400 * 30), '/');
      $_COOKIE['mampan_current_phase'] = $phase_from_post;
    }

    return $resolved_phase;
  }
}
