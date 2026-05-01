<?php

declare(strict_types=1);

/**
 * Component: card
 * Purpose: Render one card variant with API-driven content payload.
 * Anatomy:
 * - .card
 *   - .card__header
 *     - .card__title
 *     - .card__subtitle
 *   - .card__media (media variants)
 *   - .card__content
 *   - .card__footer (optional, base/divided)
 * Data Contract:
 * - `card` (array, optional): main payload object.
 * - `variant` (string, optional): `base`, `divided`, `media-photo`, `media-video`, `overlay`, `metric`,
 *   `package`, `testimonial`, `intro`.
 * - `title` (string, optional)
 * - `subtitle` (string, optional)
 * - `show_subtitle` (bool, optional): render subtitle when `true`. Defaults to `true`.
 * - `content` (string, optional)
 * - `footer` (string, optional): base footer text.
 * - `show_footer` (bool, optional): base footer visibility.
 * - `cta_label` (string, optional): button label for CTA variants.
 * - `cta_variant` (string, optional): button gradient token, e.g. `md/default`.
 * - `cta_items` (array, optional): list of button items. Each item supports `label` and `variant`.
 * - `cta_align` (string, optional): `left`, `center`, `right`.
 * - `cta_layout` (string, optional): `stack` or `split`.
 * - `cta_full_width` (bool, optional): full-width button style when `true`.
 * - `media_aspect_ratio` (string, optional): placeholder aspect token.
 * - `metric_value` (string, optional): primary metric value.
 * - `metric_compare` (string, optional): metric comparison text.
 * - `metric_title_class` (string, optional): class override for metric title.
 */

$card = isset($card) && is_array($card) ? $card : [];

$variant = isset($variant) && is_string($variant) && trim($variant) !== ''
  ? trim($variant)
  : (isset($card['variant']) && is_string($card['variant']) && trim($card['variant']) !== ''
    ? trim($card['variant'])
    : 'base');

$title = isset($title) && is_string($title) && trim($title) !== ''
  ? trim($title)
  : (isset($card['title']) && is_string($card['title']) && trim($card['title']) !== ''
    ? trim($card['title'])
    : 'Card Title');

$subtitle = isset($subtitle) && is_string($subtitle) && trim($subtitle) !== ''
  ? trim($subtitle)
  : (isset($card['subtitle']) && is_string($card['subtitle']) && trim($card['subtitle']) !== ''
    ? trim($card['subtitle'])
    : 'Description for card subtitle');
$show_subtitle = isset($show_subtitle)
  ? (bool) $show_subtitle
  : (isset($card['show_subtitle']) ? (bool) $card['show_subtitle'] : true);

$content = isset($content) && is_string($content) && trim($content) !== ''
  ? trim($content)
  : (isset($card['content']) && is_string($card['content']) && trim($card['content']) !== ''
    ? trim($card['content'])
    : 'Card Content');

$footer = isset($footer) && is_string($footer) && trim($footer) !== ''
  ? trim($footer)
  : (isset($card['footer']) && is_string($card['footer']) && trim($card['footer']) !== ''
    ? trim($card['footer'])
    : 'Card Footer');

$cta_label = isset($cta_label) && is_string($cta_label) && trim($cta_label) !== ''
  ? trim($cta_label)
  : (isset($card['cta_label']) && is_string($card['cta_label']) && trim($card['cta_label']) !== ''
    ? trim($card['cta_label'])
    : 'Button');

$cta_variant = isset($cta_variant) && is_string($cta_variant) && trim($cta_variant) !== ''
  ? trim($cta_variant)
  : (isset($card['cta_variant']) && is_string($card['cta_variant']) && trim($card['cta_variant']) !== ''
    ? trim($card['cta_variant'])
    : 'md/default');
$cta_items = isset($card['cta_items']) && is_array($card['cta_items']) ? $card['cta_items'] : [];
$cta_align = isset($cta_align) && is_string($cta_align) && trim($cta_align) !== ''
  ? trim($cta_align)
  : (isset($card['cta_align']) && is_string($card['cta_align']) && trim($card['cta_align']) !== ''
    ? trim($card['cta_align'])
    : 'left');
$cta_layout = isset($cta_layout) && is_string($cta_layout) && trim($cta_layout) !== ''
  ? trim($cta_layout)
  : (isset($card['cta_layout']) && is_string($card['cta_layout']) && trim($card['cta_layout']) !== ''
    ? trim($card['cta_layout'])
    : 'stack');
$cta_full_width = isset($cta_full_width)
  ? (bool) $cta_full_width
  : (isset($card['cta_full_width']) ? (bool) $card['cta_full_width'] : true);

$metric_value = isset($metric_value) && is_string($metric_value) && trim($metric_value) !== ''
  ? trim($metric_value)
  : (isset($card['metric_value']) && is_string($card['metric_value']) && trim($card['metric_value']) !== ''
    ? trim($card['metric_value'])
    : 'RM 12.4k');

$metric_compare = isset($metric_compare) && is_string($metric_compare) && trim($metric_compare) !== ''
  ? trim($metric_compare)
  : (isset($card['metric_compare']) && is_string($card['metric_compare']) && trim($card['metric_compare']) !== ''
    ? trim($card['metric_compare'])
    : 'Compare to last month: RM 11.0k');
$metric_title_class = isset($metric_title_class) && is_string($metric_title_class) && trim($metric_title_class) !== ''
  ? trim($metric_title_class)
  : (isset($card['metric_title_class']) && is_string($card['metric_title_class']) && trim($card['metric_title_class']) !== ''
    ? trim($card['metric_title_class'])
    : 'text-base');
$metric_compare_delta = $metric_compare;
$metric_compare_suffix = '';
$metric_compare_tone_class = 'text-brand-500';
if ($metric_compare !== '') {
  $metric_compare_parts = preg_split('/\s+/', trim($metric_compare), 2);
  $metric_compare_delta = isset($metric_compare_parts[0]) ? $metric_compare_parts[0] : $metric_compare;
  $metric_compare_suffix = isset($metric_compare_parts[1]) ? $metric_compare_parts[1] : '';

  $metric_compare_first_char = substr($metric_compare_delta, 0, 1);
  if ($metric_compare_first_char === '+') {
    $metric_compare_tone_class = 'text-positive-700';
  } elseif ($metric_compare_first_char === '-') {
    $metric_compare_tone_class = 'text-negative-700';
  }
}
$price = isset($price) && is_string($price) && trim($price) !== ''
  ? trim($price)
  : (isset($card['price']) && is_string($card['price']) && trim($card['price']) !== ''
    ? trim($card['price'])
    : 'RM 100');
$features = isset($card['features']) && is_array($card['features']) ? $card['features'] : ['1-2 Solutions', '30 minutes coverage', 'Up to 10 people'];
$quote = isset($quote) && is_string($quote) && trim($quote) !== ''
  ? trim($quote)
  : (isset($card['quote']) && is_string($card['quote']) && trim($card['quote']) !== ''
    ? trim($card['quote'])
    : "Lumera captured our wedding with such sensitivity and artistry. Every photograph felt like a painting.");
$author_name = isset($author_name) && is_string($author_name) && trim($author_name) !== ''
  ? trim($author_name)
  : (isset($card['author_name']) && is_string($card['author_name']) && trim($card['author_name']) !== ''
    ? trim($card['author_name'])
    : 'John Doe');
$author_role = isset($author_role) && is_string($author_role) && trim($author_role) !== ''
  ? trim($author_role)
  : (isset($card['author_role']) && is_string($card['author_role']) && trim($card['author_role']) !== ''
    ? trim($card['author_role'])
    : 'Wedding Client');
$author_avatar_src = isset($card['author_avatar_src']) && is_string($card['author_avatar_src']) && trim($card['author_avatar_src']) !== ''
  ? trim($card['author_avatar_src'])
  : path('/assets/images/avatars/avatar-01.jpg');
$author_avatar_alt = isset($card['author_avatar_alt']) && is_string($card['author_avatar_alt']) && trim($card['author_avatar_alt']) !== ''
  ? trim($card['author_avatar_alt'])
  : 'Avatar of ' . $author_name;
$rating = isset($card['rating']) ? (int) $card['rating'] : 5;
if ($rating < 1) {
  $rating = 1;
}
if ($rating > 5) {
  $rating = 5;
}
$note_text = isset($card['note_text']) && is_string($card['note_text']) && trim($card['note_text']) !== ''
  ? trim($card['note_text'])
  : 'Our team will reach out within 24 hours to schedule your intro call.';
$note_icon_name = isset($card['note_icon_name']) && is_string($card['note_icon_name']) && trim($card['note_icon_name']) !== ''
  ? trim($card['note_icon_name'])
  : 'calendar-line';
$cta_href = isset($card['cta_href']) && is_string($card['cta_href']) && trim($card['cta_href']) !== ''
  ? trim($card['cta_href'])
  : '#';

$media_aspect_ratio = isset($media_aspect_ratio) && is_string($media_aspect_ratio) && trim($media_aspect_ratio) !== ''
  ? trim($media_aspect_ratio)
  : (isset($card['media_aspect_ratio']) && is_string($card['media_aspect_ratio']) && trim($card['media_aspect_ratio']) !== ''
    ? trim($card['media_aspect_ratio'])
    : ($variant === 'media-photo'
      ? 'aspect-[5/4]'
      : ($variant === 'overlay' ? 'aspect-[3/4]' : 'aspect-video')));

$show_footer = isset($show_footer)
  ? (bool) $show_footer
  : (isset($card['show_footer']) ? (bool) $card['show_footer'] : true);

if ($cta_items === []) {
  $cta_items = [[
    'label'   => $cta_label,
    'variant' => $cta_variant,
  ]];
}

$allowed_cta_align = ['left', 'center', 'right'];
if (!in_array($cta_align, $allowed_cta_align, true)) {
  $cta_align = 'left';
}

$allowed_cta_layout = ['stack', 'split'];
if (!in_array($cta_layout, $allowed_cta_layout, true)) {
  $cta_layout = 'stack';
}

$allowed_variants = ['base', 'divided', 'media-photo', 'media-video', 'overlay', 'metric', 'package', 'testimonial', 'intro'];
if (!in_array($variant, $allowed_variants, true)) {
  $variant = 'base';
}

$cta_align_class_map = [
  'left'   => 'justify-start',
  'center' => 'justify-center',
  'right'  => 'justify-end',
];

$cta_container_classes = trim(implode(' ', array_filter([
  'flex gap-2',
  $cta_align_class_map[$cta_align],
  $cta_layout === 'split' ? 'w-full' : '',
])));

$cta_item_class = $cta_layout === 'split' ? 'flex-1' : 'w-auto';
?>
<?php if ($variant === 'base'): ?>
  <div class="card bg-white border border-brand-300 rounded-lg space-y-5">
    <div class="card__header px-4 pt-4">
      <div class="card__title font-semibold text-base"><?= e($title); ?></div>
      <?php if ($show_subtitle): ?>
        <div class="card__subtitle text-brand mt-1"><?= e($subtitle); ?></div>
      <?php endif; ?>
    </div>
    <div class="card__content px-4"><?= e($content); ?></div>
    <?php if ($show_footer): ?>
      <div class="card__footer px-4 pb-5"><?= e($footer); ?></div>
    <?php endif; ?>
  </div>
<?php endif; ?>

<?php if ($variant === 'divided'): ?>
  <div class="card card--divided bg-white border border-brand-300 rounded-lg">
    <div class="card__header p-4 border-b border-brand-200">
      <div class="card__title font-semibold text-base"><?= e($title); ?></div>
      <?php if ($show_subtitle): ?>
        <div class="card__subtitle text-brand-500 mt-1"><?= e($subtitle); ?></div>
      <?php endif; ?>
    </div>
    <div class="card__content p-4"><?= e($content); ?></div>
    <div class="card__footer rounded-b-md bg-brand-50 p-4 border-t border-brand-200">
      <div class="<?= e($cta_container_classes); ?>">
        <?php foreach ($cta_items as $cta_item): ?>
          <?php
          $item_label = isset($cta_item['label']) && is_string($cta_item['label']) && trim($cta_item['label']) !== ''
            ? trim($cta_item['label'])
            : 'Button';
          $item_variant = isset($cta_item['variant']) && is_string($cta_item['variant']) && trim($cta_item['variant']) !== ''
            ? trim($cta_item['variant'])
            : $cta_variant;
          $item_width_class = $cta_layout === 'split' ? 'flex-1' : ($cta_full_width ? 'w-full' : 'w-auto');
          ?>
          <button class="<?php button($item_variant, $item_width_class); ?>">
            <span class="button__label"><?= e($item_label); ?></span>
          </button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($variant === 'media-photo' || $variant === 'media-video'): ?>
  <div class="card card--media bg-white border border-brand-300 rounded-lg">
    <div class="card__media p-1">
      <div class="card__photo rounded-md overflow-hidden">
        <?php component('placeholder-image', [
          'aspect-ratio'     => $media_aspect_ratio,
          'background-class' => 'bg-brand-300',
          'icon-name'        => 'image-2-line',
          'icon-size'        => '24',
          'icon-color'       => 'text-brand-500',
        ]); ?>
      </div>
    </div>
    <div class="card__content p-4 pt-2">
      <div class="card__title font-semibold text-base"><?= e($title); ?></div>
      <?php if ($show_subtitle): ?>
        <div class="card__subtitle text-brand-500 mt-1"><?= e($subtitle); ?></div>
      <?php endif; ?>
      <div class="mt-2"><?= e($content); ?></div>
    </div>
    <div class="card__footer p-4 pt-0">
      <div class="<?= e($cta_container_classes); ?>">
        <?php foreach ($cta_items as $cta_item): ?>
          <?php
          $item_label = isset($cta_item['label']) && is_string($cta_item['label']) && trim($cta_item['label']) !== ''
            ? trim($cta_item['label'])
            : 'Button';
          $item_variant = isset($cta_item['variant']) && is_string($cta_item['variant']) && trim($cta_item['variant']) !== ''
            ? trim($cta_item['variant'])
            : $cta_variant;
          $item_width_class = $cta_layout === 'split' || $cta_full_width ? 'w-full' : 'w-auto';
          ?>
          <div class="<?= e($cta_item_class); ?>">
            <button class="<?php button($item_variant, $item_width_class); ?>">
              <span class="button__label"><?= e($item_label); ?></span>
            </button>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($variant === 'overlay'): ?>
  <div class="card card--overlay rounded-lg relative">
    <div class="card__photo rounded-md overflow-hidden">
      <?php component('placeholder-image', [
        'aspect-ratio'     => $media_aspect_ratio,
        'background-class' => 'bg-brand-300',
        'icon-name'        => 'image-2-line',
        'icon-size'        => '24',
        'icon-color'       => 'text-brand-500',
      ]); ?>
    </div>
    <div class="card__gradient absolute inset-0 bg-gradient-to-b from-transparent to-brand-900"></div>
    <div class="card__content absolute bottom-0 left-0 w-full p-4 text-brand-50">
      <div class="card__title font-semibold text-base text-brand-50"><?= e($title); ?></div>
      <div class="mt-2 text-brand-50"><?= e($content); ?></div>
      <div class="mt-3">
        <button class="<?php button($cta_variant, 'w-full'); ?>">
          <span class="button__label"><?= e($cta_label); ?></span>
        </button>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($variant === 'metric'): ?>
  <div class="card card--metric bg-white border border-brand-300 rounded-lg">
    <div class="card__header p-4 pb-0">
      <div class="card__title font-semibold <?= e($metric_title_class); ?>"><?= e($title); ?></div>
      <?php if ($show_subtitle): ?>
        <div class="card__subtitle text-brand-500 mt-1"><?= e($subtitle); ?></div>
      <?php endif; ?>
    </div>
    <div class="card__content p-4">
      <div class="text-2xl"><?= e($metric_value); ?></div>
      <div class="text-brand-500 border-t border-brand-200 mt-4 pt-3">
        <span class="<?= e($metric_compare_tone_class); ?>"><?= e($metric_compare_delta); ?></span>
        <?php if ($metric_compare_suffix !== ''): ?>
          <span> <?= e($metric_compare_suffix); ?></span>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($variant === 'package'): ?>
  <article class="card card--package bg-white border border-brand-300 rounded-lg overflow-hidden">
    <div class="card__media p-1">
      <div class="card__photo rounded-md overflow-hidden">
        <?php component('placeholder-image', [
          'aspect-ratio'     => 'aspect-[5/4]',
          'background-class' => 'bg-brand-300',
          'icon-name'        => 'image-2-line',
          'icon-size'        => '24',
          'icon-color'       => 'text-brand-500',
        ]); ?>
      </div>
    </div>
    <div class="card__content p-4 pt-2">
      <h3 class="card__title text-base font-semibold text-brand-900"><?= e($title); ?></h3>
      <p class="card__price mt-1 text-base font-medium text-emerald-600"><?= e($price); ?></p>
      <p class="card__description mt-2 text-brand-600"><?= e($content); ?></p>
      <ul class="card__features mt-2 list-inside list-disc text-brand-500">
        <?php foreach ($features as $feature): ?>
          <?php if (!is_string($feature) || trim($feature) === ''): ?>
            <?php continue; ?>
          <?php endif; ?>
          <li class="card__feature-item"><?= e($feature); ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="card__action mt-3">
        <a href="<?= e($cta_href); ?>" class="<?php button($cta_variant, 'w-full'); ?>">
          <span class="button__label"><?= e($cta_label); ?></span>
        </a>
      </div>
    </div>
  </article>
<?php endif; ?>

<?php if ($variant === 'testimonial'): ?>
  <article class="card card--testimonial bg-white border border-brand-300 rounded-lg p-4 flex flex-col justify-between">
    <div class="card__ratings ratings ratings--stars mb-4 flex items-center gap-1" aria-label="Rating <?= e((string) $rating); ?> out of 5">
      <?php for ($star_index = 0; $star_index < $rating; $star_index++): ?>
        <?php icon('star-fill', ['icon_size' => '20', 'icon_class' => 'text-attention-500']); ?>
      <?php endfor; ?>
    </div>
    <p class="card__description mt-1 text-brand-700"><?= e($quote); ?></p>
    <div class="card__media mt-6 flex items-center gap-3">
      <?php component('avatar', [
        'items' => [[
          'image_src'   => $author_avatar_src,
          'image_alt'   => $author_avatar_alt,
          'size'        => '48',
          'class_name'  => 'card__avatar',
        ]],
      ]); ?>
      <div class="card__actor leading-5">
        <h6 class="card__name font-semibold text-brand-900"><?= e($author_name); ?></h6>
        <p class="card__role text-brand-500"><?= e($author_role); ?></p>
      </div>
    </div>
  </article>
<?php endif; ?>

<?php if ($variant === 'intro'): ?>
  <article class="card card--intro-call bg-white border border-brand-300 rounded-lg p-4 flex flex-col justify-between space-y-5">
    <div class="card__media w-[120px] h-[120px] rounded-lg overflow-hidden">
      <?php component('placeholder-image', ['aspect-ratio' => 'aspect-[1/1] w-full']); ?>
    </div>
    <div class="card__content">
      <p class="card__title text-base font-semibold text-brand-900 mb-4"><?= nl2br(e($title), false); ?></p>
      <?php component('button', [
        'label'    => $cta_label,
        'href'     => $cta_href,
        'variant'  => 'default',
        'size'     => 'md',
        'class'    => 'card__action w-full',
      ]); ?>
    </div>
    <div class="card__note flex items-center gap-4">
      <div class="card__note-icon w-12 h-12 shrink-0 bg-brand-200 rounded-lg flex items-center justify-center">
        <?php icon($note_icon_name, ['icon_size' => '24', 'icon_class' => 'text-brand-600']); ?>
      </div>
      <p class="card__note-text text-brand-500"><?= e($note_text); ?></p>
    </div>
  </article>
<?php endif; ?>
