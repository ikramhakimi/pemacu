<?php
declare(strict_types=1);

/**
 * Component: dashboard/filter-date
 * Purpose: Render an analytics date-range filter form with two date pickers and a submit button.
 * Data Contract:
 * - section_class (string, optional): wrapper section classes. Default: `max-w-lg`.
 * - aria_label (string, optional): section aria-label. Default: `Date range filter`.
 * - form_action (string, optional): form action. Default: `#`.
 * - form_method (string, optional): form method. Default: `get`.
 * - form_class (string, optional): form layout classes.
 * - date_from_name (string, optional): name for from-date field. Default: `date_from`.
 * - date_from_placeholder (string, optional): from-date placeholder. Default: `Date From`.
 * - date_to_name (string, optional): name for to-date field. Default: `date_to`.
 * - date_to_placeholder (string, optional): to-date placeholder. Default: `Date To`.
 * - disable_past (bool, optional): picker disable_past flag. Default: false.
 * - button_label (string, optional): submit button label. Default: `Filter`.
 * - button_variant (string, optional): button variant. Default: `primary`.
 * - button_wrap_class (string, optional): optional wrapper classes around button.
 */

$props = isset($component_props) && is_array($component_props) ? $component_props : [];

$section_class = isset($props['section_class']) ? trim((string) $props['section_class']) : 'max-w-lg';
$aria_label = isset($props['aria_label']) ? trim((string) $props['aria_label']) : 'Date range filter';
$form_action = isset($props['form_action']) ? (string) $props['form_action'] : '#';
$form_method = isset($props['form_method']) ? (string) $props['form_method'] : 'get';
$form_class = isset($props['form_class'])
  ? trim((string) $props['form_class'])
  : 'grid gap-2 md:grid-cols-[minmax(0,1fr)_minmax(0,1fr)_auto] md:items-end';

$date_from_name = isset($props['date_from_name']) ? trim((string) $props['date_from_name']) : 'date_from';
$date_from_placeholder = isset($props['date_from_placeholder']) ? trim((string) $props['date_from_placeholder']) : 'Date From';
$date_to_name = isset($props['date_to_name']) ? trim((string) $props['date_to_name']) : 'date_to';
$date_to_placeholder = isset($props['date_to_placeholder']) ? trim((string) $props['date_to_placeholder']) : 'Date To';
$disable_past = array_key_exists('disable_past', $props) ? !empty($props['disable_past']) : false;

$button_label = isset($props['button_label']) ? trim((string) $props['button_label']) : 'Filter';
$button_variant = isset($props['button_variant']) ? trim((string) $props['button_variant']) : 'primary';
$button_wrap_class = isset($props['button_wrap_class']) ? trim((string) $props['button_wrap_class']) : '';
?>
<section class="<?= e($section_class); ?>" aria-label="<?= e($aria_label); ?>">
  <form class="<?= e($form_class); ?>" action="<?= e($form_action); ?>" method="<?= e($form_method); ?>">
    <?php component('pickdate', [
      'mode'         => 'single',
      'name'         => $date_from_name,
      'placeholder'  => $date_from_placeholder,
      'disable_past' => $disable_past,
    ]); ?>
    <?php component('pickdate', [
      'mode'         => 'single',
      'name'         => $date_to_name,
      'placeholder'  => $date_to_placeholder,
      'disable_past' => $disable_past,
    ]); ?>
    <?php if ($button_wrap_class !== ''): ?>
      <div class="<?= e($button_wrap_class); ?>">
        <?php component('button', [
          'label'   => $button_label,
          'type'    => 'submit',
          'variant' => $button_variant,
        ]); ?>
      </div>
    <?php else: ?>
      <?php component('button', [
        'label'   => $button_label,
        'type'    => 'submit',
        'variant' => $button_variant,
      ]); ?>
    <?php endif; ?>
  </form>
</section>
