<?php
declare(strict_types=1);

/**
 * Component: confetti
 * Purpose: Render one reusable confetti trigger powered by canvas-confetti.
 * Anatomy:
 * - .confetti.js-component-confetti
 *   - button[data-confetti-trigger]
 * Data Contract:
 * - `label` (string, optional): trigger button label. Default: `Confetti`.
 * - `mode` (string, optional): `basic`, `random`, `fireworks`, `side-cannons`, `stars`. Default: `basic`.
 * - `options` (array, optional): canvas-confetti option overrides.
 * - `button` (array, optional): button component props.
 * - `auto_fire` (bool, optional): fire once when initialized. Default: false.
 * - `class_name` (string, optional): additional root classes.
 * - `attributes` (array, optional): additional root HTML attributes.
 */

$label      = isset($label) ? trim((string) $label) : 'Confetti';
$mode       = isset($mode) ? trim((string) $mode) : 'basic';
$options    = isset($options) && is_array($options) ? $options : [];
$button     = isset($button) && is_array($button) ? $button : [];
$auto_fire  = isset($auto_fire) ? (bool) $auto_fire : false;
$class_name = isset($class_name) ? trim((string) $class_name) : '';
$attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

$mode_map = [
  'basic'        => true,
  'random'       => true,
  'fireworks'    => true,
  'side-cannons' => true,
  'stars'        => true,
];

if (!isset($mode_map[$mode])) {
  $mode = 'basic';
}

if ($label === '') {
  $label = 'Confetti';
}

$json_options = json_encode($options, JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_HEX_TAG);

if (!is_string($json_options)) {
  $json_options = '{}';
}

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value)) {
      if ($value) {
        $compiled[] = $key;
      }

      continue;
    }

    if ($value === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$root_classes = trim(implode(' ', array_filter([
  'confetti relative inline-flex',
  $class_name,
  'js-component-confetti',
])));

$root_attributes                    = $attributes;
$root_attributes['class']           = $root_classes;
$root_attributes['data-confetti']   = true;
$root_attributes['data-mode']       = $mode;
$root_attributes['data-options']    = $json_options;
$root_attributes['data-auto-fire']  = $auto_fire ? 'true' : 'false';
$root_attributes['aria-live']       = 'polite';

$button_attributes = isset($button['attributes']) && is_array($button['attributes'])
  ? $button['attributes']
  : [];
$button_attributes['data-confetti-trigger'] = true;

$button_props = array_replace([
  'label'      => $label,
  'type'       => 'button',
  'variant'    => 'primary',
  'size'       => 'md',
  'attributes' => $button_attributes,
], $button);

$button_props['attributes'] = $button_attributes;
?>
<div<?= $render_attributes($root_attributes); ?>>
  <?php component('button', $button_props); ?>
</div>
