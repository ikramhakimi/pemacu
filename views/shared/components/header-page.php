<?php
/*
CSS Anatomy: header-page

.header.header--page
|_ .header__topic
|_ .header__title
|_ .header__subtitle
*/

$header_topic          = $header_topic ?? 'SEO Topic';
$header_title          = $header_title ?? 'Header For Page';
$header_subtitle       = $header_subtitle ?? 'A curated record of sessions across weddings, portraits, editorial, and commercial work — shot across Malaysia and Southeast Asia since 2016.';
$header_container_class = $header_container_class ?? 'container max-w-6xl mx-auto w-full px-4';
$header_topic_class    = $header_topic_class ?? 'header__topic text-sm font-semibold uppercase text-brand-500';
$header_title_class    = $header_title_class ?? 'header__title mt-4 max-w-2xl font-bold text-5xl text-brand-900';
$header_subtitle_class = $header_subtitle_class ?? 'header__subtitle mt-4 max-w-3xl text-xl text-brand-600';
?>
<header class="header header--page py-12">
  <div class="<?= $header_container_class; ?>">
    <h1 class="<?= $header_topic_class; ?>">
      <?= htmlspecialchars($header_topic, ENT_QUOTES, 'UTF-8'); ?>
    </h1>
    <p class="<?= $header_title_class; ?>">
      <?= htmlspecialchars($header_title, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <p class="<?= $header_subtitle_class; ?>">
      <?= htmlspecialchars($header_subtitle, ENT_QUOTES, 'UTF-8'); ?>
    </p>
  </div>
</header>
