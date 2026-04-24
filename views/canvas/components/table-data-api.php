<?php

declare(strict_types=1);

http_response_code(200);
header('Content-Type: application/json; charset=utf-8');

$state = isset($_GET['state']) ? trim((string) $_GET['state']) : 'default';

$default_rows = [
  [
    'company' => 'Northlane Health',
    'stage'   => 'Discovery',
    'owner'   => 'Nora',
    'mrr'     => '$2,400',
  ],
  [
    'company' => 'Atlas Retail',
    'stage'   => 'Proposal',
    'owner'   => 'Imran',
    'mrr'     => '$5,900',
  ],
  [
    'company' => 'SignalLabs',
    'stage'   => 'Negotiation',
    'owner'   => 'Evelyn',
    'mrr'     => '$7,200',
  ],
  [
    'company' => 'CoreBridge',
    'stage'   => 'Contract',
    'owner'   => 'Mina',
    'mrr'     => '$3,850',
  ],
  [
    'company' => 'Juniper Cloud',
    'stage'   => 'Onboarding',
    'owner'   => 'Ray',
    'mrr'     => '$1,980',
  ],
  [
    'company' => 'Orbit Works',
    'stage'   => 'Discovery',
    'owner'   => 'Daniel',
    'mrr'     => '$4,600',
  ],
];

$pagination_rows = [
  ['company' => 'Northlane Health', 'stage' => 'Discovery',   'owner' => 'Nora',   'mrr' => '$2,400'],
  ['company' => 'Atlas Retail',     'stage' => 'Proposal',    'owner' => 'Imran',  'mrr' => '$5,900'],
  ['company' => 'SignalLabs',       'stage' => 'Negotiation', 'owner' => 'Evelyn', 'mrr' => '$7,200'],
  ['company' => 'CoreBridge',       'stage' => 'Contract',    'owner' => 'Mina',   'mrr' => '$3,850'],
  ['company' => 'Juniper Cloud',    'stage' => 'Onboarding',  'owner' => 'Ray',    'mrr' => '$1,980'],
  ['company' => 'Orbit Works',      'stage' => 'Discovery',   'owner' => 'Daniel', 'mrr' => '$4,600'],
  ['company' => 'Luna Energy',      'stage' => 'Proposal',    'owner' => 'Alya',   'mrr' => '$3,100'],
  ['company' => 'Everline Foods',   'stage' => 'Discovery',   'owner' => 'Haris',  'mrr' => '$2,760'],
  ['company' => 'NexPort',          'stage' => 'Contract',    'owner' => 'Dina',   'mrr' => '$6,250'],
  ['company' => 'Qraft Metrics',    'stage' => 'Onboarding',  'owner' => 'Rafi',   'mrr' => '$1,440'],
  ['company' => 'Bluebay Labs',     'stage' => 'Negotiation', 'owner' => 'Lara',   'mrr' => '$8,320'],
  ['company' => 'Fieldnorth',       'stage' => 'Proposal',    'owner' => 'Ean',    'mrr' => '$2,990'],
];

$fixed_header_rows = [];
for ($index = 1; $index <= 24; $index++) {
  $fixed_header_rows[] = [
    'company' => 'Account ' . str_pad((string) $index, 2, '0', STR_PAD_LEFT),
    'stage'   => $index % 3 === 0 ? 'Negotiation' : ($index % 2 === 0 ? 'Proposal' : 'Discovery'),
    'owner'   => 'Owner ' . (string) $index,
    'mrr'     => '$' . number_format(1200 + ($index * 180)),
  ];
}

$rows = $default_rows;

if ($state === 'empty') {
  $rows = [];
} elseif ($state === 'pagination') {
  $rows = $pagination_rows;
} elseif ($state === 'loading') {
  usleep(1200000);
  $rows = $default_rows;
} elseif ($state === 'fixed-header') {
  $rows = $fixed_header_rows;
}

$response = [
  'data' => $rows,
];

$json_output = json_encode($response);
if ($json_output === false) {
  $json_output = '{"data":[]}';
}

echo $json_output;
