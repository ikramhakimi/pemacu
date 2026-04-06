<?php

declare(strict_types=1);

$section_packages_class      = isset($section_class)
  ? (string) $section_class
  : build_component_class('section-packages', $states ?? []);
$section_packages_class_name = isset($class_name) ? trim((string) $class_name) : '';
$section_packages_list       = isset($packages) && is_array($packages) && !empty($packages)
  ? array_values($packages)
  : [
    [
      'package_title'         => 'Wedding Storytelling',
      'package_price'         => 'RM 100',
      'package_photo_alt'     => 'Wedding storytelling service preview',
      'package_list_features' => [
        'Half-day or full-day coverage',
        'Edited gallery with cinematic tones',
      ],
      'package_action'        => 'View details',
      'package_action_url'    => '/services/wedding-storytelling',
    ],
    [
      'package_title'         => 'Brand Portrait Session',
      'package_price'         => 'RM 100',
      'package_photo_alt'     => 'Brand portrait session preview',
      'package_list_features' => [
        'Personal brand and team portraits',
        'Studio or on-location setup',
      ],
      'package_action'        => 'Book session',
      'package_action_url'    => '/services/brand-portrait-session',
    ],
    [
      'package_title'         => 'Event Coverage',
      'package_price'         => 'RM 100',
      'package_photo_alt'     => 'Event coverage service preview',
      'package_list_features' => [
        'Corporate and private events',
        'Fast turnaround highlight delivery',
      ],
      'package_action'        => 'Check slots',
      'package_action_url'    => '/services/event-coverage',
    ],
    [
      'package_title'         => 'Product Photography',
      'package_price'         => 'RM 100',
      'package_photo_alt'     => 'Product photography service preview',
      'package_list_features' => [
        'Clean e-commerce product shots',
        'Styled lifestyle product visuals',
      ],
      'package_action'        => 'Get quote',
      'package_action_url'    => '/services/product-photography',
    ],
  ];
$section_packages_classes    = trim(
  implode(
    ' ',
    array_filter([
      $section_packages_class,
      'section-packages',
      $section_packages_class_name,
    ]),
  ),
);
$resolve_package_href        = static function (string $href): string {
  if (preg_match('/^(https?:\/\/|mailto:|tel:|#)/i', $href) === 1) {
    return $href;
  }

  return path($href);
};

ob_start();
?>
<div class="intro max-w-4xl">
  <h2 class="intro__topic text text--overline text-xs font-semibold uppercase tracking-[0.14em] text-brand-600">
    Our Services
  </h2>
  <p class="intro__headline title title--2 text-3xl font-bold text-brand-900">
    Flexible photography for every need.
  </p>
  <p class="intro__subheadline max-w-2xl text text--body text-base text-brand-700">
    A complete range of photography services—designed to work individually or together, tailored to your story and goals.
  </p>
</div>

<div class="section-packages__grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4">
  <?php foreach (array_slice($section_packages_list, 0, 4) as $package): ?>
    <?php
    $package_photo         = isset($package['package_photo']) ? (string) $package['package_photo'] : '';
    $package_photo_alt     = isset($package['package_photo_alt']) ? (string) $package['package_photo_alt'] : '';
    $package_title         = isset($package['package_title']) ? (string) $package['package_title'] : 'Package';
    $package_price         = isset($package['package_price']) ? (string) $package['package_price'] : '';
    $package_action        = isset($package['package_action']) ? (string) $package['package_action'] : 'Book now';
    $package_action_url    = isset($package['package_action_url']) ? (string) $package['package_action_url'] : '#';
    $package_list_features = isset($package['package_list_features']) && is_array($package['package_list_features'])
      ? $package['package_list_features']
      : [];
    $package_resolved_href = $resolve_package_href($package_action_url);
    $package_resolved_alt  = $package_photo_alt !== '' ? $package_photo_alt : $package_title;
    ?>
    <article class="card card--package overflow-hidden border border-brand-200 bg-white shadow-sm rounded-2xl">
      <div class="card__photo aspect-[3/2] w-full bg-brand-100">
        <?php if ($package_photo !== ''): ?>
          <img
            class="h-full w-full object-cover"
            src="<?= e($package_photo); ?>"
            alt="<?= e($package_resolved_alt); ?>"
            loading="lazy"
          >
        <?php else: ?>
          <div class="flex h-full items-center justify-center text-sm text-brand-500">
            No photo
          </div>
        <?php endif; ?>
      </div>

      <div class="card__content p-5 space-y-4">
        <h3 class="card__title title title--5 text-lg font-semibold text-brand-900">
          <?= e($package_title); ?>
        </h3>
        <?php if ($package_price !== ''): ?>
          <p class="card__price text text--price text-sm font-medium text-emerald-600">
            <?= e($package_price); ?>
          </p>
        <?php endif; ?>
        <?php if (!empty($package_list_features)): ?>
          <ul class="card__features list-inside list-disc text-sm">
            <?php foreach ($package_list_features as $feature): ?>
              <li class="card__feature-item"><?= e((string) $feature); ?></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        <div class="card__action">
          <a
            class="btn inline-flex rounded-lg border border-transparent font-medium px-4 py-3 text-sm bg-brand-900 text-white"
            href="<?= e($package_resolved_href); ?>"
          >
            <?= e($package_action); ?>
          </a>
        </div>
      </div>
    </article>
  <?php endforeach; ?>
</div>
<?php
$section_packages_content = trim((string) ob_get_clean());
?>
<section class="<?= e($section_packages_classes); ?>">
  <div class="container mx-auto max-w-6xl px-4 pb-12">
    <div class="section-packages__stack flex flex-col">
      <?= $section_packages_content; ?>
    </div>
  </div>
</section>
