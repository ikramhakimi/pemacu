<?php

declare(strict_types=1);

$label     = isset($label) ? trim((string) $label) : 'Summary';
$value     = isset($value) ? trim((string) $value) : '-';
$helper    = isset($helper) ? trim((string) $helper) : '';
$tone      = isset($tone) ? trim((string) $tone) : 'neutral';
$icon_name = isset($icon_name) ? trim((string) $icon_name) : 'file-list-3-line';

component('card', [
  'card' => [
    'variant'        => 'metric',
    'title'          => $label,
    'subtitle'       => $helper,
    'metric_value'   => $value,
    'metric_compare' => '',
  ],
]);
