<?php

declare(strict_types=1);

$section_hero_class      = isset($section_class)
  ? (string) $section_class
  : build_component_class('section-hero', $states ?? []);
$section_hero_class_name = isset($class_name) ? trim((string) $class_name) : '';
$section_hero_title      = isset($title) ? (string) $title : 'Section hero title';
$section_hero_lead       = isset($lead) ? (string) $lead : '';
$section_hero_actions    = isset($actions) && is_array($actions) ? $actions : [];
$section_hero_classes    = trim(
  implode(
    ' ',
    array_filter([
      $section_hero_class,
      'section-hero',
      $section_hero_class_name,
    ]),
  ),
);

ob_start();
?>
<h1 class="section-hero__title title title--1 text-4xl font-bold text-brand-900">
  <?= e($section_hero_title); ?>
</h1>

<?php if ($section_hero_lead !== ''): ?>
  <p class="section-hero__lead text text--lead text-lg text-brand-700">
    <?= e($section_hero_lead); ?>
  </p>
<?php endif; ?>

<?php if (!empty($section_hero_actions)): ?>
  <div class="section-hero__actions flex flex-wrap items-center justify-start gap-3">
  <?php foreach ($section_hero_actions as $action): ?>
    <?php
    $action_type   = isset($action['type']) ? (string) $action['type'] : 'link';
    $action_label  = isset($action['label']) ? (string) $action['label'] : '';
    $action_href   = isset($action['href']) ? (string) $action['href'] : '#';
    $action_states = isset($action['states']) && is_array($action['states']) ? $action['states'] : [];
    $action_size   = isset($action['size']) ? (string) $action['size'] : 'md';
    $action_class  = build_component_class('btn', $action_states);
    $action_variant_class = 'bg-brand-900 text-white';
    $action_size_class    = 'px-4 py-3 text-sm';
    $action_href_resolved = $action_href;

    if (!empty($action_states['secondary'])) {
      $action_variant_class = 'bg-brand-100 text-brand-900';
    } elseif (!empty($action_states['ghost'])) {
      $action_variant_class = 'bg-transparent text-brand-900 border border-brand-200';
    }

    if ($action_size === 'sm') {
      $action_size_class = 'px-3 py-1.5 text-xs';
    } elseif ($action_size === 'lg') {
      $action_size_class = 'px-5 py-3 text-base';
    } else {
      $action_size = 'md';
    }

    if ($action_type === 'link' && preg_match('/^(https?:\/\/|mailto:|tel:|#)/i', $action_href_resolved) !== 1) {
      $action_href_resolved = path($action_href_resolved);
    }

    $action_classes = trim(
      implode(
        ' ',
        array_filter([
          $action_class,
          'btn--' . $action_size,
          'inline-flex rounded-lg border border-transparent font-medium',
          $action_size_class,
          $action_variant_class,
        ]),
      ),
    );
    ?>
    <?php if ($action_label === ''): ?>
      <?php continue; ?>
    <?php endif; ?>
    <?php if ($action_type === 'link'): ?>
      <a class="<?= e($action_classes); ?>" href="<?= e($action_href_resolved); ?>">
        <?= e($action_label); ?>
      </a>
    <?php else: ?>
      <button class="<?= e($action_classes); ?>" type="button">
        <?= e($action_label); ?>
      </button>
    <?php endif; ?>
  <?php endforeach; ?>
  </div>
<?php endif; ?>
<?php
$section_hero_content = trim((string) ob_get_clean());
?>
<section class="<?= e($section_hero_classes); ?>">
  <div class="container mx-auto max-w-6xl px-4 pb-12">
    <div class="section-hero__stack flex flex-col gap-4">
      <?= $section_hero_content; ?>
    </div>
  </div>
</section>
