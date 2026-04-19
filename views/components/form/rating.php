<?php
declare(strict_types=1);

/**
 * Component: form/rating
 * Purpose: Render one API-driven star rating control for SaaS feedback workflows.
 * Anatomy:
 * - .rating
 *   - input.sr-only (repeated)
 *   - label.rating__star (repeated)
 * Data Contract:
 * - `id_prefix` (string, optional): base id for each star radio.
 * - `name` (string, optional): radio group name.
 * - `max` (int, optional): total stars, clamped to 1..10. Default: 5.
 * - `value` (int, optional): selected value.
 * - `selected_value` (int, optional): alias of `value`.
 * - `disabled` (bool, optional): disable interaction and submission.
 * - `read_only` (bool, optional): lock interaction while preserving display state.
 * - `required` (bool, optional): require a selection on form submit.
 * - `class` (string, optional): additional classes appended to wrapper.
 * - `attributes` (array, optional): additional wrapper attributes.
 * - `input_attributes` (array, optional): additional attributes merged into each radio input.
 * - `active_icon_class` (string, optional): class for active stars.
 * - `inactive_icon_class` (string, optional): class for inactive stars.
 */

$resolved_id_prefix = isset($id_prefix) ? (string) $id_prefix : 'rating-' . substr(md5(uniqid('', true)), 0, 8);
$resolved_name = isset($name) ? (string) $name : 'rating';
$resolved_max = isset($max) ? (int) $max : 5;
$resolved_class = isset($class) ? trim((string) $class) : '';
$resolved_disabled = !empty($disabled);
$resolved_read_only = !empty($read_only);
$resolved_required = !empty($required);
$resolved_attributes = isset($attributes) && is_array($attributes) ? $attributes : [];
$resolved_input_attributes = isset($input_attributes) && is_array($input_attributes) ? $input_attributes : [];
$resolved_active_icon_class = isset($active_icon_class) ? trim((string) $active_icon_class) : 'text-amber-500';
$resolved_inactive_icon_class = isset($inactive_icon_class) ? trim((string) $inactive_icon_class) : 'text-brand-300';

$has_selected_value = false;
$resolved_value = 0;

if (isset($selected_value)) {
  $has_selected_value = true;
  $resolved_value = (int) $selected_value;
} elseif (isset($value)) {
  $has_selected_value = true;
  $resolved_value = (int) $value;
}

if ($resolved_max < 1) {
  $resolved_max = 1;
}

if ($resolved_max > 10) {
  $resolved_max = 10;
}

if ($resolved_value < 0) {
  $resolved_value = 0;
}

if ($resolved_value > $resolved_max) {
  $resolved_value = $resolved_max;
}

$wrapper_classes = trim(implode(' ', array_filter([
  'rating inline-flex items-center gap-1',
  $resolved_class,
])));

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

$wrapper_attributes = $resolved_attributes;
$wrapper_attributes['class'] = $wrapper_classes;

if ($resolved_disabled) {
  $wrapper_attributes['data-rating-disabled'] = 'true';
}

if ($resolved_read_only) {
  $wrapper_attributes['data-rating-readonly'] = 'true';
}
?>
<div<?= $render_attributes($wrapper_attributes); ?>>
  <?php for ($index = 1; $index <= $resolved_max; $index++): ?>
    <?php
    $star_id        = $resolved_id_prefix . '-' . (string) $index;
    $is_active      = $index <= $resolved_value;
    $is_checked     = $index === $resolved_value;
    $icon_class     = $is_active ? $resolved_active_icon_class : $resolved_inactive_icon_class;
    $label_class    = $resolved_read_only || $resolved_disabled ? 'rating__star cursor-default' : 'rating__star cursor-pointer';
    $radio_attrs    = [
      'id'    => $star_id,
      'type'  => 'radio',
      'name'  => $resolved_name,
      'value' => (string) $index,
      'class' => 'sr-only',
    ];

    if ($is_checked) {
      $radio_attrs['checked'] = true;
    }

    if ($resolved_disabled || $resolved_read_only) {
      $radio_attrs['disabled'] = true;
    }

    if ($resolved_required && $index === 1) {
      $radio_attrs['required'] = true;
    }

    foreach ($resolved_input_attributes as $attr_key => $attr_value) {
      if (is_string($attr_key) && $attr_key !== '' && !array_key_exists($attr_key, $radio_attrs)) {
        $radio_attrs[$attr_key] = $attr_value;
      }
    }
    ?>
    <input<?= $render_attributes($radio_attrs); ?>>
    <label class="<?= e($label_class); ?>" for="<?= e($star_id); ?>">
      <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => $icon_class]); ?>
    </label>
  <?php endfor; ?>
</div>
