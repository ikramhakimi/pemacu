<?php
declare(strict_types=1);

/**
 * Component: select
 * Purpose: Render one API-driven select control with size/state variants and option data mapping.
 * Anatomy:
 * - .select.relative
 *   - select.select__input
 *   - .select__icon
 * Data Contract:
 * - `id` (string, optional): select id.
 * - `name` (string, optional): select name.
 * - `size` (string, optional): `sm`, `md`, or `lg`. Default: `md`.
 * - `state` (string, optional): `default`, `positive`, `negative`, `disabled`. Default: `default`.
 * - `selected_value` (string|int, optional): value selected from `options`.
 * - `placeholder` (string, optional): placeholder option label.
 * - `placeholder_disabled` (bool, optional): disable placeholder option. Default: true.
 * - `class` (string, optional): additional classes appended to `<select>`.
 * - `wrapper_class` (string, optional): additional classes appended to wrapper element.
 * - `disabled` (bool, optional): disable the control.
 * - `required` (bool, optional): mark control as required.
 * - `options` (array, optional): list of options; each item supports `label`, `value`, `selected`, `disabled`.
 * - `attributes` (array, optional): additional `<select>` attributes.
 */

$resolved_id = isset($id) ? (string) $id : '';
$resolved_name = isset($name) ? (string) $name : '';
$resolved_size = isset($size) ? (string) $size : 'md';
$resolved_state = isset($state) ? (string) $state : 'default';
$resolved_class = isset($class) ? trim((string) $class) : '';
$resolved_wrapper_class = isset($wrapper_class) ? trim((string) $wrapper_class) : '';
$resolved_disabled = !empty($disabled);
$resolved_required = !empty($required);
$resolved_placeholder = isset($placeholder) ? trim((string) $placeholder) : '';
$resolved_placeholder_disabled = !isset($placeholder_disabled) || (bool) $placeholder_disabled;
$resolved_options = isset($options) && is_array($options) ? $options : [];
$resolved_attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

$has_selected_value = false;
$resolved_selected_value = '';

if (isset($selected_value)) {
  $has_selected_value = true;
  $resolved_selected_value = (string) $selected_value;
}

$size_map = [
  'sm' => [
    'height' => 'h-[var(--ui-h-sm)]',
    'text'   => 'text-xs',
    'px'     => 'px-[var(--ui-px-sm)]',
  ],
  'md' => [
    'height' => 'h-[var(--ui-h-md)]',
    'text'   => '',
    'px'     => 'px-[var(--ui-px-md)]',
  ],
  'lg' => [
    'height' => 'h-[var(--ui-h-lg)]',
    'text'   => 'text-base',
    'px'     => 'px-[var(--ui-px-lg)]',
  ],
];

if (!isset($size_map[$resolved_size])) {
  $resolved_size = 'md';
}

if ($resolved_disabled) {
  $resolved_state = 'disabled';
}

$state_map = [
  'default'  => 'bg-white ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500',
  'positive' => 'bg-white ring-1 ring-positive-400 ring-inset focus:outline-none focus:ring-2 focus:ring-positive-500',
  'negative' => 'bg-white ring-1 ring-negative-400 ring-inset focus:outline-none focus:ring-2 focus:ring-negative-500',
  'disabled' => 'bg-brand-100 text-brand-400 ring-1 ring-brand-200 ring-inset',
];

if (!isset($state_map[$resolved_state])) {
  $resolved_state = 'default';
}

$normalized_options = [];
$has_selected_option = false;

foreach ($resolved_options as $option) {
  if (is_array($option)) {
    $option_label = isset($option['label']) ? trim((string) $option['label']) : '';
    $option_value = isset($option['value']) ? (string) $option['value'] : $option_label;
    $option_disabled = !empty($option['disabled']);

    $option_selected = !empty($option['selected']);
    if (!$option_selected && $has_selected_value && $option_value === $resolved_selected_value) {
      $option_selected = true;
    }
  } else {
    $option_label = trim((string) $option);
    $option_value = (string) $option;
    $option_disabled = false;
    $option_selected = $has_selected_value && $option_value === $resolved_selected_value;
  }

  if ($option_label === '') {
    continue;
  }

  if ($option_selected) {
    $has_selected_option = true;
  }

  $normalized_options[] = [
    'label'    => $option_label,
    'value'    => $option_value,
    'selected' => $option_selected,
    'disabled' => $option_disabled,
  ];
}

if ($normalized_options === []) {
  $fallback_placeholder = $resolved_placeholder !== '' ? $resolved_placeholder : 'Select option';
  $normalized_options[] = [
    'label'    => $fallback_placeholder,
    'value'    => '',
    'selected' => true,
    'disabled' => $resolved_placeholder_disabled,
  ];
  $has_selected_option = true;
} elseif ($resolved_placeholder !== '') {
  $placeholder_selected = !$has_selected_option && (!$has_selected_value || $resolved_selected_value === '');
  array_unshift($normalized_options, [
    'label'    => $resolved_placeholder,
    'value'    => '',
    'selected' => $placeholder_selected,
    'disabled' => $resolved_placeholder_disabled,
  ]);
}

$select_classes = trim(implode(' ', array_filter([
  'select__input input appearance-none w-full rounded-md pr-10 text-brand-900',
  $size_map[$resolved_size]['height'],
  $size_map[$resolved_size]['text'],
  $size_map[$resolved_size]['px'],
  $state_map[$resolved_state],
  $resolved_class,
])));

$icon_classes = $resolved_state === 'disabled'
  ? 'select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-brand-400'
  : 'select__icon pointer-events-none absolute inset-y-0 right-3 inline-flex items-center text-brand-500';

$render_attributes = static function (array $attrs): string {
  $compiled = [];

  foreach ($attrs as $key => $value_attr) {
    if (!is_string($key) || $key === '') {
      continue;
    }

    if (is_bool($value_attr)) {
      if ($value_attr) {
        $compiled[] = $key;
      }
      continue;
    }

    if ($value_attr === null) {
      continue;
    }

    $compiled[] = $key . '="' . e((string) $value_attr) . '"';
  }

  return $compiled === [] ? '' : ' ' . implode(' ', $compiled);
};

$select_attributes = $resolved_attributes;
$select_attributes['class'] = $select_classes;

if ($resolved_id !== '') {
  $select_attributes['id'] = $resolved_id;
}

if ($resolved_name !== '') {
  $select_attributes['name'] = $resolved_name;
}

if ($resolved_disabled) {
  $select_attributes['disabled'] = true;
}

if ($resolved_required) {
  $select_attributes['required'] = true;
}
?>
<div class="select select--<?= e($resolved_size); ?> relative <?= e($resolved_wrapper_class); ?>">
  <select<?= $render_attributes($select_attributes); ?>>
    <?php foreach ($normalized_options as $option): ?>
      <option
        value="<?= e($option['value']); ?>"
        <?= $option['selected'] ? ' selected' : ''; ?>
        <?= $option['disabled'] ? ' disabled' : ''; ?>
      >
        <?= e($option['label']); ?>
      </option>
    <?php endforeach; ?>
  </select>
  <span class="<?= e($icon_classes); ?>">
    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
  </span>
</div>
