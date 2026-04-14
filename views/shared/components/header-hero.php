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
$header_title_class           = 'header__title mt-6 max-w-xl font-bold text-6xl text-brand-900';
$header_subtitle_class        = 'header__subtitle mt-6 max-w-2xl text-xl text-brand-600';
$header_actions_class         = 'header__actions mt-6 flex items-center gap-2';
?>
<header class="header header--hero">
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
      <?php component('button', [
        'label'    => $primary_label,
        'href'     => $primary_href,
        'variant'  => 'default',
        'size'     => 'lg',
        'gradient' => true,
      ]); ?>
      <?php component('button', [
        'label'    => $secondary_label,
        'href'     => $secondary_href,
        'variant'  => 'secondary',
        'size'     => 'lg',
        'gradient' => true,
      ]); ?>
    </div>
  </div>
</header>
