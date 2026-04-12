<section class="section section--process">
  <div class="<?php container('w-full py-12') ?>">
    <?php component('header-section', [
      'header_topic'           => 'Process',
      'header_title'           => 'A seamless process from start to finish.',
      'header_subtitle'        => 'From your first message to final delivery, we guide every step—ensuring clarity, collaboration, and exceptional results.',
      'header_container_class' => 'w-full',
    ]); ?>

    <div class="grid gap-4 md:grid-cols-3">
      <?php component('card-process',[
        'card_count'        => '01',
        'card_title'        => 'Reach Out',
        'card_description'  => 'We start with a friendly chat to understand your vision, needs, and goals. This helps us tailor our services to your unique story.',
      ]); ?>
      <?php component('card-process',[
        'card_count'        => '02',
        'card_title'        => 'Plan & Prepare',
        'card_description'  => 'Once we have a clear understanding, we create a customized plan and prepare everything needed for a successful session.',
      ]); ?>
      <?php component('card-process',[
        'card_count'        => '03',
        'card_title'        => 'Capture & Deliver',
        'card_description'  => 'On the day of your session, we capture your moments and deliver the final results in a timely manner.',
      ]); ?>
    </div>
  </div>
</section>
