<?php

declare(strict_types=1);

require_once __DIR__ . '/../includes/student-progress.php';
require_once __DIR__ . '/../includes/components.php';

$page_title = 'Dashboard Sejarah';

$student_id        = 1;
$summary           = get_student_summary($student_id);
$weak_topics       = get_student_weak_topics($student_id, 5);
$recent_attempts   = get_student_recent_attempts($student_id, 5);
$continue_practice = get_student_continue_practice($student_id);
$activity_heatmap  = get_student_activity_heatmap_for_year($student_id);

layout('kuiz/partials/kuiz-start', [
  'page_title'            => $page_title,
  'dashboard_content_max' => 'max-w-6xl md:px-6',
]);
?>
<header class="app-header py-5">
  <div class="">
    <div>
      <p class="text-sm font-medium text-brand-500">Dashboard Sejarah</p>
      <h1 class="mt-2 text-3xl font-semibold leading-none text-brand-900">Selamat kembali, Aqil</h1>
      <p class="mt-4 text-brand-600 text-base">
        Pantau penguasaan Sejarah anda, ulang kaji topik lemah, dan teruskan latihan bab demi bab.
      </p>
    </div>
  </div>
</header>

<article class="app-article pb-20 pt-5 space-y-6">
  <section aria-labelledby="student-summary-heading">
    <h2 id="student-summary-heading" class="sr-only">Ringkasan kemajuan kuiz</h2>
    <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
      <?php kuiz_component('card-stat', [
        'label'     => 'Jumlah Soalan Dijawab',
        'value'     => number_format((int) $summary['total_questions_answered']),
        'meta'      => 'Merentas semua cubaan kuiz Sejarah yang selesai',
        'icon_name' => 'question-answer-line',
        'tone'      => 'info',
      ]); ?>
      <?php kuiz_component('card-stat', [
        'label'     => 'Purata Ketepatan',
        'value'     => (string) $summary['average_accuracy'] . '%',
        'meta'      => 'Jawapan betul untuk latihan Sejarah',
        'icon_name' => 'target-line',
        'tone'      => (int) $summary['average_accuracy'] >= 70 ? 'positive' : 'warning',
      ]); ?>
      <?php kuiz_component('card-stat', [
        'label'     => 'Cubaan Selesai',
        'value'     => number_format((int) $summary['completed_attempts']),
        'meta'      => 'Sesi latihan Sejarah yang telah disiapkan',
        'icon_name' => 'checkbox-circle-line',
        'tone'      => 'positive',
      ]); ?>
      <?php kuiz_component('card-stat', [
        'label'     => 'Topik Lemah Sejarah',
        'value'     => number_format((int) $summary['weak_topics']),
        'meta'      => 'Topik Sejarah yang perlu latihan berfokus',
        'icon_name' => 'lightbulb-flash-line',
        'tone'      => (int) $summary['weak_topics'] > 0 ? 'warning' : 'positive',
      ]); ?>
    </div>
  </section>

  <section class="<?php card('bg-white'); ?>" aria-labelledby="continue-practice-heading">
    <div class="card__content flex flex-col gap-5 p-5 md:flex-row md:items-center md:justify-between">
      <div>
        <p class="text-sm font-medium text-brand-500">Teruskan Latihan Sejarah</p>
        <h2 id="continue-practice-heading" class="mt-2 text-xl font-semibold text-brand-900">
          <?php if ($continue_practice !== []): ?>
            <?= e((string) $continue_practice['subject_name']); ?> · <?= e((string) $continue_practice['chapter_title']); ?>
          <?php else: ?>
            Mulakan kuiz Sejarah pertama anda
          <?php endif; ?>
        </h2>
        <p class="mt-2 text-brand-600">
          <?php if ($continue_practice !== []): ?>
            Topik terkini: <?= e((string) $continue_practice['topic_title']); ?>
          <?php else: ?>
            Pilih topik Sejarah dan mulakan sesi latihan ringkas.
          <?php endif; ?>
        </p>
      </div>
      <div class="shrink-0">
        <?php component('button', [
          'label'   => 'Teruskan Latihan Sejarah',
          'href'    => '#',
          'variant' => 'primary',
          'surface' => 'gradient',
          'size'    => 'md',
          'class'   => 'w-full md:w-auto',
        ]); ?>
      </div>
    </div>
  </section>

  <section aria-labelledby="study-activity-heatmap">
    <h2 id="study-activity-heatmap" class="sr-only">Aktiviti Belajar</h2>
    <?php kuiz_component('study-activity-heatmap', [
      'items'    => $activity_heatmap,
      'weeks'    => 52,
      'title'    => 'Aktiviti Belajar',
      'subtitle' => 'Cubaan kuiz Sejarah selesai sepanjang tahun ini.',
    ]); ?>
  </section>

  <section aria-labelledby="weak-topics-heading">
    <h2 id="weak-topics-heading" class="sr-only">Topik Lemah</h2>
    <?php
    ob_start();
    ?>
    <?php if ($weak_topics === []): ?>
      <?php component('empty-state', [
        'title'       => 'Belum ada topik lemah',
        'description' => 'Selesaikan lebih banyak kuiz Sejarah untuk melihat cadangan latihan berfokus.',
        'icon_name'   => 'sparkling-line',
        'tone'        => 'positive',
      ]); ?>
    <?php else: ?>
      <div class="grid gap-1 sm:grid-cols-2 lg:grid-cols-3">
        <?php foreach ($weak_topics as $weak_topic): ?>
          <?php kuiz_component('card-weak-topic', [
            'topic' => $weak_topic,
            'href'  => '#',
          ]); ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php
    $weak_topics_panel_html = (string) ob_get_clean();

    component('frame', [
      'variant'              => 'ghost-dark',
      'title'                => 'Topik Lemah Sejarah',
      'subtitle'             => 'Topik Sejarah di bawah 70% ketepatan dengan sekurang-kurangnya 3 soalan dijawab.',
      'panel_html_items'     => [$weak_topics_panel_html],
      'panel_count'          => 1,
      'render_panel_wrapper' => false,
      'class_name'           => '!ring-0',
    ]);
    ?>
  </section>

  <section aria-labelledby="recent-attempts-heading">
    <div class="mb-4">
      <h2 id="recent-attempts-heading" class="text-xl font-semibold text-brand-900">Cubaan Sejarah Terkini</h2>
      <p class="mt-1 text-brand-600">Sesi kuiz Sejarah terkini yang telah disiapkan.</p>
    </div>

    <?php if ($recent_attempts === []): ?>
      <?php component('empty-state', [
        'title'       => 'Belum ada cubaan',
        'description' => 'Kuiz Sejarah yang telah disiapkan akan dipaparkan di sini.',
        'icon_name'   => 'file-list-3-line',
        'tone'        => 'neutral',
      ]); ?>
    <?php else: ?>
      <div class="space-y-3">
        <?php foreach ($recent_attempts as $attempt): ?>
          <?php kuiz_component('card-attempt', [
            'attempt' => $attempt,
            'href'    => '#',
          ]); ?>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>
</article>
<?php layout('kuiz/partials/kuiz-end'); ?>
