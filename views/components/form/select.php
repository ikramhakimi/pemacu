<?php
declare(strict_types=1);

/**
 * Component: select
 * Purpose: Render one select control with size/state variants and dropdown icon.
 * Anatomy:
 * - .select.relative
 *   - select.select__input
 *   - .select__icon
 * Data Contract:
 * - id, name, size, state, class, disabled, options, attributes
 */

$id         = isset($id) ? (string) $id : '';
$name       = isset($name) ? (string) $name : '';
$size       = isset($size) ? (string) $size : 'md';
$state      = isset($state) ? (string) $state : 'default';
$class      = isset($class) ? trim((string) $class) : '';
$disabled   = !empty($disabled);
$options    = isset($options) && is_array($options) ? $options : [];
$attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

if ($options === []) {
  $options = [['label' => 'Select option', 'value' => '']];
}

$size_map = [
  'sm' => [
    'height' => 'h-[var(--ui-h-sm)]',
    'text'   => 'text-xs',
    'px'     => 'px-[var(--ui-px-sm)]',
  ],
  'md' => [
    'height' => 'h-[var(--ui-h-md)]',
    'text'   => 'text-sm',
    'px'     => 'px-[var(--ui-px-md)]',
  ],
  'lg' => [
    'height' => 'h-[var(--ui-h-lg)]',
    'text'   => 'text-base',
    'px'     => 'px-[var(--ui-px-lg)]',
  ],
];

if (!isset($size_map[$size])) {
  $size = 'md';
}

if ($disabled) {
  $state = 'disabled';
}

$state_map = [
  'default'  => 'bg-white ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500',
  'positive' => 'bg-white ring-1 ring-positive-400 ring-inset focus:outline-none focus:ring-2 focus:ring-positive-500',
  'negative' => 'bg-white ring-1 ring-negative-400 ring-inset focus:outline-none focus:ring-2 focus:ring-negative-500',
  'disabled' => 'bg-brand-100 text-brand-400 ring-1 ring-brand-200 ring-inset',
];

if (!isset($state_map[$state])) {
  $state = 'default';
}

$select_classes = trim(implode(' ', array_filter([
  'select__input input appearance-none w-full rounded-md pr-10 text-brand-900',
  $size_map[$size]['height'],
  $size_map[$size]['text'],
  $size_map[$size]['px'],
  $state_map[$state],
  $class,
])));

$icon_classes = $state === 'disabled'
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

$select_attributes              = $attributes;
$select_attributes['class']     = $select_classes;

if ($id !== '') {
  $select_attributes['id'] = $id;
}

if ($name !== '') {
  $select_attributes['name'] = $name;
}

if ($disabled) {
  $select_attributes['disabled'] = true;
}
?>
<div class="select select--<?= e($size); ?> relative">
  <select<?= $render_attributes($select_attributes); ?>>
    <?php foreach ($options as $option): ?>
      <?php
      $option_label    = '';
      $option_value    = '';
      $option_selected = false;
      $option_disabled = false;

      if (is_array($option)) {
        $option_label    = isset($option['label']) ? (string) $option['label'] : '';
        $option_value    = isset($option['value']) ? (string) $option['value'] : $option_label;
        $option_selected = !empty($option['selected']);
        $option_disabled = !empty($option['disabled']);
      } else {
        $option_label = (string) $option;
        $option_value = (string) $option;
      }
      ?>
      <option value="<?= e($option_value); ?>"<?= $option_selected ? ' selected' : ''; ?><?= $option_disabled ? ' disabled' : ''; ?>>
        <?= e($option_label); ?>
      </option>
    <?php endforeach; ?>
  </select>
  <span class="<?= e($icon_classes); ?>">
    <?php icon('arrow-down-s-line', ['icon_size' => '16']); ?>
  </span>
</div>
