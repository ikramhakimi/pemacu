<?php
$section_growth_process_classes = trim(
  implode(
    ' ',
    array_filter([
      isset($section_class) ? (string) $section_class : build_component_class('growth-process', $states ?? []),
      'section section--process',
    ]),
  ),
);
?>
<section class="<?= e($section_growth_process_classes); ?>">
  <div class="<?php container('w-full py-16') ?>">
    <?php component('header-section', [
      'header_topic'           => 'Process',
      'header_title'           => 'A seamless process from start to finish.',
      'header_subtitle'        => 'From your first message to final delivery, we guide every step—ensuring clarity, collaboration, and exceptional results.',
      'header_container_class' => 'w-full',
    ]); ?>

    <div class="grid gap-4 md:grid-cols-3">
      <?php component('card', ['card' => [
        'variant'  => 'base',
        'title'    => '01 Reach Out',
        'content'  => 'We start with a friendly chat to understand your vision, needs, and goals. This helps us tailor our services to your unique story.',
        'subtitle' => 'Process step',
        'show_footer' => false,
      ]]); ?>
      <?php component('card', ['card' => [
        'variant'  => 'base',
        'title'    => '02 Plan & Prepare',
        'content'  => 'Once we have a clear understanding, we create a customized plan and prepare everything needed for a successful session.',
        'subtitle' => 'Process step',
        'show_footer' => false,
      ]]); ?>
      <?php component('card', ['card' => [
        'variant'  => 'base',
        'title'    => '03 Capture & Deliver',
        'content'  => 'On the day of your session, we capture your moments and deliver the final results in a timely manner.',
        'subtitle' => 'Process step',
        'show_footer' => false,
      ]]); ?>
    </div>
  </div>
</section>
