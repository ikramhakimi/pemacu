<?php
declare(strict_types=1);

/**
 * Component: rating
 * Purpose: Render a star rating group with optional disabled/read-only modes.
 * Anatomy:
 * - .rating
 *   - input.sr-only (repeated)
 *   - label.rating__star (repeated)
 * Data Contract:
 * - id_prefix, name, max, value, disabled, read_only, class, attributes
 */

$id_prefix  = isset($id_prefix) ? (string) $id_prefix : 'rating-' . substr(md5(uniqid('', true)), 0, 8);
$name       = isset($name) ? (string) $name : 'rating';
$max        = isset($max) ? (int) $max : 5;
$value      = isset($value) ? (int) $value : 0;
$class      = isset($class) ? trim((string) $class) : '';
$disabled   = !empty($disabled);
$read_only  = !empty($read_only);
$attributes = isset($attributes) && is_array($attributes) ? $attributes : [];

if ($max < 1) {
  $max = 1;
}

if ($max > 10) {
  $max = 10;
}

if ($value < 0) {
  $value = 0;
}

if ($value > $max) {
  $value = $max;
}

$group_classes = trim(implode(' ', array_filter([
  'rating inline-flex items-center gap-1',
  $class,
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
?>
<div class="<?= e($group_classes); ?>"<?= $render_attributes($attributes); ?>>
  <?php for ($index = 1; $index <= $max; $index++): ?>
    <?php
    $star_id        = $id_prefix . '-' . (string) $index;
    $is_active      = $index <= $value;
    $is_checked     = $index === $value;
    $icon_class     = $is_active ? 'text-amber-500' : 'text-brand-300';
    $label_class    = $read_only || $disabled ? 'rating__star cursor-default' : 'rating__star cursor-pointer';
    $radio_attrs    = [
      'id'    => $star_id,
      'type'  => 'radio',
      'name'  => $name,
      'value' => (string) $index,
      'class' => 'sr-only',
    ];

    if ($is_checked) {
      $radio_attrs['checked'] = true;
    }

    if ($disabled || $read_only) {
      $radio_attrs['disabled'] = true;
    }
    ?>
    <input<?= $render_attributes($radio_attrs); ?>>
    <label class="<?= e($label_class); ?>" for="<?= e($star_id); ?>">
      <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => $icon_class]); ?>
    </label>
  <?php endfor; ?>
</div>
