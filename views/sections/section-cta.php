<?php

declare(strict_types=1);

$section_cta_class      = isset($section_class)
  ? (string) $section_class
  : build_component_class('section-cta', $states ?? []);
$section_cta_class_name = isset($class_name) ? trim((string) $class_name) : '';
$section_cta_title      = isset($title) ? (string) $title : 'Ready to plan your next session?';
$section_cta_lead       = isset($lead) ? (string) $lead : 'Tell us your goals and we will prepare a tailored package.';
$section_cta_actions    = isset($actions) && is_array($actions) && !empty($actions)
  ? $actions
  : [
    [
      'type'   => 'link',
      'label'  => 'Browse Package',
      'href'   => '/packages',
      'states' => ['primary' => true],
    ],
    [
      'type'   => 'link',
      'label'  => 'Contact Team',
      'href'   => '/contact',
      'states' => ['secondary' => true],
    ],
  ];
$section_cta_classes    = trim(
  implode(
    ' ',
    array_filter([
      $section_cta_class,
      'section-cta',
      $section_cta_class_name,
    ]),
  ),
);

ob_start();
?>
<h2 class="section-cta__title title title--2 text-3xl font-bold text-brand-900">
  <?= e($section_cta_title); ?>
</h2>
<p class="section-cta__lead text text--lead text-lg text-brand-700">
  <?= e($section_cta_lead); ?>
</p>
<div class="section-cta__actions flex flex-wrap items-center justify-start gap-3">
<?php foreach ($section_cta_actions as $action): ?>
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
<?php
$section_cta_content = trim((string) ob_get_clean());
?>
<section class="<?= e($section_cta_classes); ?>">
  <div class="container mx-auto max-w-6xl px-4 pb-12">
    <div class="section-cta__stack flex flex-col gap-4">
      <?= $section_cta_content; ?>
    </div>
  </div>
</section>
