<?php
/*
CSS Anatomy: header-hero

.header.header--hero
|_ .header__topic
|_ .header__title
|_ .header__subtitle
|_ .header__actions
   |_ .btn.btn--primary
   |_ .btn.btn--secondary
*/

$header_topic                 = 'SEO Topic';
$header_title                 = 'Header For <br/> Hero Solution';
$header_subtitle              = 'From quiet in-between glances to once-in-a-lifetime milestones — we manage solutions that hold emotion long after the moment.';
$primary_label                = 'Primary Action';
$primary_href                 = '#';
$secondary_label              = 'Secondary Action';
$secondary_href               = '#';
$header_container_class       = $header_container_class ?? 'container max-w-6xl mx-auto w-full px-4';
$header_topic_class           = 'header__topic text-sm font-semibold uppercase text-brand-500';
$header_title_class           = 'header__title mt-5 max-w-xl font-bold text-6xl text-brand-900';
$header_subtitle_class        = 'header__subtitle mt-5 max-w-2xl text-xl text-brand-600';
$header_actions_class         = 'header__actions mt-5 flex items-center gap-2';
$header_primary_button_class  = 'btn btn--primary btn--lg inline-flex rounded-lg border border-transparent bg-brand-900 px-5 py-3 text-base font-medium text-white';
$header_secondary_button_class = 'btn btn--secondary btn--lg inline-flex rounded-lg border border-transparent bg-brand-100 px-5 py-3 text-base font-medium text-brand-900';
?>
<section class="header header--hero">
  <div class="<?= $header_container_class; ?>">
    <h2 class="<?= $header_topic_class; ?>">
      <?= htmlspecialchars($header_topic, ENT_QUOTES, 'UTF-8'); ?>
    </h2>
    <p class="<?= $header_title_class; ?>">
      <?= strip_tags($header_title, '<br><br/>'); ?>
    </p>
    <p class="<?= $header_subtitle_class; ?>">
      <?= htmlspecialchars($header_subtitle, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <div class="<?= $header_actions_class; ?>">
      <a class="<?= $header_primary_button_class; ?>" href="<?= htmlspecialchars($primary_href, ENT_QUOTES, 'UTF-8'); ?>">
        <?= htmlspecialchars($primary_label, ENT_QUOTES, 'UTF-8'); ?>
      </a>
      <a class="<?= $header_secondary_button_class; ?>" href="<?= htmlspecialchars($secondary_href, ENT_QUOTES, 'UTF-8'); ?>">
        <?= htmlspecialchars($secondary_label, ENT_QUOTES, 'UTF-8'); ?>
      </a>
    </div>
  </div>
</section>
