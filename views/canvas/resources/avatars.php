<?php

declare(strict_types=1);

$page_title           = 'Canvas Resources - Avatars';
$page_current         = 'canvas-resources';
$component_page_links = canvas_links('components');
$avatars_directory    = __DIR__ . '/../../../assets/images/avatars';
$allowed_extensions   = ['jpg', 'jpeg', 'png', 'webp', 'avif', 'svg'];
$avatar_items         = [];
$avatar_profiles      = [
  'avatar-01' => ['name' => 'Muhammad Aiman', 'gender' => 'male'],
  'avatar-02' => ['name' => 'Ahmad Firdaus', 'gender' => 'male'],
  'avatar-03' => ['name' => 'Syafiq Hakim', 'gender' => 'male'],
  'avatar-04' => ['name' => 'Nur Aisyah', 'gender' => 'female'],
  'avatar-05' => ['name' => 'Siti Hajar', 'gender' => 'female'],
  'avatar-06' => ['name' => 'Nurul Iman', 'gender' => 'female'],
  'avatar-07' => ['name' => 'Puteri Balqis', 'gender' => 'female'],
  'avatar-08' => ['name' => 'Danish Harith', 'gender' => 'male'],
  'avatar-09' => ['name' => 'Hannah Sofea', 'gender' => 'female'],
  'avatar-10' => ['name' => 'Irfan Zikri', 'gender' => 'male'],
  'avatar-11' => ['name' => 'Ainul Mardhiah', 'gender' => 'female'],
  'avatar-12' => ['name' => 'Nabilah Humaira', 'gender' => 'female'],
  'avatar-13' => ['name' => 'Faris Iskandar', 'gender' => 'male'],
];

if (is_dir($avatars_directory)) {
  $avatar_entries = scandir($avatars_directory);

  if (is_array($avatar_entries)) {
    foreach ($avatar_entries as $avatar_entry) {
      if ($avatar_entry === '.' || $avatar_entry === '..') {
        continue;
      }

      $avatar_path = $avatars_directory . '/' . $avatar_entry;

      if (!is_file($avatar_path)) {
        continue;
      }

      $avatar_extension = strtolower(pathinfo($avatar_entry, PATHINFO_EXTENSION));

      if (!in_array($avatar_extension, $allowed_extensions, true)) {
        continue;
      }

      $avatar_id   = (string) pathinfo($avatar_entry, PATHINFO_FILENAME);
      $profile     = $avatar_profiles[$avatar_id] ?? null;
      $avatar_name = is_array($profile) && isset($profile['name'])
        ? (string) $profile['name']
        : ucwords(str_replace('-', ' ', $avatar_id));
      $avatar_gender = is_array($profile) && isset($profile['gender'])
        ? (string) $profile['gender']
        : 'unspecified';

      $avatar_items[] = [
        'id'        => $avatar_id,
        'file_name' => $avatar_entry,
        'name'      => $avatar_name,
        'gender'    => $avatar_gender,
        'src'       => path('/assets/images/avatars/' . $avatar_entry),
      ];
    }
  }
}

usort($avatar_items, static function (array $first_item, array $second_item): int {
  $first_name  = isset($first_item['name']) ? (string) $first_item['name'] : '';
  $second_name = isset($second_item['name']) ? (string) $second_item['name'] : '';

  return strnatcasecmp($first_name, $second_name);
});

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'resources',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/resources/avatars',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Avatars',
    'header_subtitle'        => 'Browse all avatar assets available in this codebase.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section>
  <div class="p-6 border-b border-brand-200">
    <h2 class="text-xl font-bold text-brand-900">Avatar Library</h2>
    <p class="mt-2 max-w-3xl text-brand-600">All files from : assets/images/avatars.</p>
  </div>

  <div class="p-6">
    <?php if ($avatar_items === []): ?>
      <p class="text-sm text-brand-500">No avatars found in : assets/images/avatars.</p>
    <?php else: ?>
      <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <?php foreach ($avatar_items as $avatar_item): ?>
          <?php
          $avatar_file_name = isset($avatar_item['file_name']) ? (string) $avatar_item['file_name'] : '';
          $avatar_id        = isset($avatar_item['id']) ? (string) $avatar_item['id'] : '';
          $avatar_name      = isset($avatar_item['name']) ? (string) $avatar_item['name'] : '';
          $avatar_gender    = isset($avatar_item['gender']) ? (string) $avatar_item['gender'] : '';
          $avatar_src       = isset($avatar_item['src']) ? (string) $avatar_item['src'] : '';
          ?>
          <?php if ($avatar_file_name === '' || $avatar_name === '' || $avatar_src === ''): ?>
            <?php continue; ?>
          <?php endif; ?>
          <article
            class="rounded-lg border border-brand-200 bg-white overflow-hidden"
            data-avatar-id="<?= e($avatar_id); ?>"
            data-avatar-name="<?= e($avatar_name); ?>"
            data-avatar-gender="<?= e($avatar_gender); ?>"
            data-avatar-src="<?= e($avatar_src); ?>"
          >
            <div class="aspect-square">
              <img
                class="h-full w-full rounded-md object-cover bg-brand-100"
                src="<?= e($avatar_src); ?>"
                alt="<?= e($avatar_name); ?>"
                loading="lazy"
              >
            </div>
            <p class="text-brand-900 p-4"><?= e($avatar_name); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
