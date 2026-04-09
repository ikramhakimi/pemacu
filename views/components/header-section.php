<?php
/*
CSS Anatomy: header-section

.header.header--section
|_ .header__topic
|_ .header__title
|_ .header__subtitle
*/

$header_class          = $header_class ?? 'header header--section mb-10';
$header_topic          = $header_topic ?? 'SEO Topic';
$header_title          = $header_title ?? 'Header For Section';
$header_subtitle       = $header_subtitle ?? 'A complete range of solutions services—designed to work individually or together, tailored to your story and goals.';
$header_container_class = $header_container_class ?? 'container max-w-6xl mx-auto w-full px-4';
$header_topic_class    = $header_topic_class ?? 'header__topic text-xs uppercase text-brand-500 flex items-center justify-start gap-4';
$header_title_class    = $header_title_class ?? 'header__title mt-4 max-w-2xl font-semibold text-3xl text-brand-900';
$header_subtitle_class = $header_subtitle_class ?? 'header__subtitle mt-4 max-w-3xl text-xl text-brand-500';
?>
<header class="<?= $header_class; ?>">
  <div class="<?= $header_container_class; ?>">
    <h2 class="<?= $header_topic_class; ?>">
      <span class="bg-brand-300" style="height:1px; width: 40px; margin-left: -16px"></span>
      <span><?= $header_topic; ?></span>
    </h2>
    <p class="<?= $header_title_class; ?>">
      <?= $header_title; ?>
    </p>
    <p class="<?= $header_subtitle_class; ?>">
      <?= $header_subtitle; ?>
    </p>
  </div>
</header>
