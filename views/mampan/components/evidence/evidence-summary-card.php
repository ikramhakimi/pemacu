<?php

declare(strict_types=1);

$label     = isset($label) ? trim((string) $label) : 'Metric';
$value     = isset($value) ? trim((string) $value) : '-';
$helper    = isset($helper) ? trim((string) $helper) : '';
$tone      = isset($tone) ? trim((string) $tone) : 'neutral';
$icon_name = isset($icon_name) ? trim((string) $icon_name) : 'file-list-3-line';

component('stats-card', [
  'label'       => $label,
  'value'       => $value,
  'helper_text' => $helper,
  'tone'        => $tone,
  'icon_name'   => $icon_name,
  'class_name'  => 'h-full',
]);
