<?php

declare(strict_types=1);

$assessment_status = isset($assessment_status)
  ? trim((string) $assessment_status)
  : 'not_started';
$assessment_status_class = isset($assessment_status_class)
  ? trim((string) $assessment_status_class)
  : '';

$status_tokens = [
  'not_started' => [
    'label' => 'Not Started',
    'class' => 'bg-brand-500 border border-brand-600 ring-2 ring-brand-300',
  ],
  'in_progress' => [
    'label' => 'In Progress',
    'class' => 'bg-primary-500 border border-primary-600 ring-2 ring-primary-200',
  ],
  'completed' => [
    'label' => 'Completed',
    'class' => 'bg-positive-500 border border-positive-600 ring-2 ring-positive-200',
  ],
  'missing_evidence' => [
    'label' => 'Missing Evidence',
    'class' => 'bg-amber-500 border border-amber-600 ring-2 ring-amber-200',
  ],
];

if (!isset($status_tokens[$assessment_status])) {
  $assessment_status = 'not_started';
}

$assessment_status_label = $status_tokens[$assessment_status]['label'];
$assessment_status_dot_class = trim(implode(' ', array_filter([
  'w-3 h-3 rounded-full mr-1',
  $status_tokens[$assessment_status]['class'],
  $assessment_status_class,
])));
?>
<div class="<?= e($assessment_status_dot_class); ?>" aria-details="<?= e($assessment_status_label); ?>"></div>
