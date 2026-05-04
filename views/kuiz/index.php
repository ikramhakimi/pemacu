<?php

declare(strict_types=1);

$page_title = 'Kuiz';

$quiz_level_configs = [
  [
    'id'          => 'level-1',
    'label'       => 'Tahap Asas',
    'description' => 'Easy Level 1',
    'file'        => __DIR__ . '/data/sejarah/form-2/bab-1-level-1.json',
  ],
  [
    'id'          => 'level-2',
    'label'       => 'Tahap Pengukuhan',
    'description' => 'Easy Level 2',
    'file'        => __DIR__ . '/data/sejarah/form-2/bab-1-level-2.json',
  ],
  [
    'id'          => 'level-3',
    'label'       => 'Tahap Cabaran',
    'description' => 'Easy Level 3',
    'file'        => __DIR__ . '/data/sejarah/form-2/bab-1-level-3.json',
  ],
];
$quiz_load_error        = '';
$quiz_levels            = [];
$quiz_option_keys       = ['A', 'B', 'C', 'D'];
$quiz_shuffle_questions = true;
$quiz_shuffle_options   = true;
$quiz_question_limit    = 10;
$quiz_time_limit        = 30;
$quiz_subject           = 'Sejarah';
$quiz_chapter           = '1';
$quiz_topic             = 'Kerajaan Alam Melayu';

function normalize_quiz_questions(array $quiz_raw_questions, array $quiz_option_keys): array
{
  $quiz_questions = [];

  foreach ($quiz_raw_questions as $quiz_raw_question) {
    if (!is_array($quiz_raw_question)) {
      continue;
    }

    $question_text          = isset($quiz_raw_question['question'])
      ? trim((string) $quiz_raw_question['question'])
      : '';
    $question_answer        = isset($quiz_raw_question['answer'])
      ? strtoupper(trim((string) $quiz_raw_question['answer']))
      : '';
    $question_options       = isset($quiz_raw_question['options']) && is_array($quiz_raw_question['options'])
      ? $quiz_raw_question['options']
      : [];
    $question_explanation   = isset($quiz_raw_question['explanation'])
      ? trim((string) $quiz_raw_question['explanation'])
      : '';
    $question_difficulty    = isset($quiz_raw_question['difficulty'])
      ? trim((string) $quiz_raw_question['difficulty'])
      : '';
    $question_reference     = '';
    $question_reference_raw = $quiz_raw_question['references'][0] ?? null;
    $question_references    = isset($quiz_raw_question['references']) && is_array($quiz_raw_question['references'])
      ? array_values($quiz_raw_question['references'])
      : [];

    if (is_array($question_reference_raw)) {
      $question_reference_section = isset($question_reference_raw['section'])
        ? trim((string) $question_reference_raw['section'])
        : '';

      if ($question_reference_section !== '') {
        $question_reference = 'Bab ' . $question_reference_section;
      }
    }

    if ($question_text === '' || $question_explanation === '') {
      continue;
    }

    $question_statements = [];

    if (isset($quiz_raw_question['statements']) && is_array($quiz_raw_question['statements'])) {
      foreach ($quiz_raw_question['statements'] as $statement) {
        if (!is_array($statement)) {
          continue;
        }

        $statement_text = isset($statement['text']) ? trim((string) $statement['text']) : '';

        if ($statement_text === '') {
          continue;
        }

        $question_statements[] = [
          'id'         => isset($statement['id']) ? trim((string) $statement['id']) : '',
          'text'       => $statement_text,
          'is_correct' => isset($statement['is_correct']) && $statement['is_correct'] === true,
        ];
      }
    }

    $normalized_options       = [];
    $question_option_keys     = array_keys($question_options);
    $question_options_is_list = $question_option_keys === range(0, count($question_options) - 1);

    if ($question_options_is_list) {
      foreach ($question_options as $option) {
        if (!is_array($option)) {
          continue 2;
        }

        $option_text = isset($option['text']) ? trim((string) $option['text']) : '';

        if ($option_text === '') {
          continue 2;
        }

        $normalized_options[] = [
          'key'        => isset($option['id']) ? trim((string) $option['id']) : '',
          'text'       => $option_text,
          'is_correct' => isset($option['is_correct']) && $option['is_correct'] === true,
        ];
      }
    } else {
      if (!in_array($question_answer, $quiz_option_keys, true)) {
        continue;
      }

      foreach ($quiz_option_keys as $option_key) {
        if (!isset($question_options[$option_key])) {
          continue 2;
        }

        $option_text = trim((string) $question_options[$option_key]);

        if ($option_text === '') {
          continue 2;
        }

        $normalized_options[] = [
          'key'        => $option_key,
          'text'       => $option_text,
          'is_correct' => $option_key === $question_answer,
        ];
      }
    }

    if (count($normalized_options) < 2) {
      continue;
    }

    $quiz_questions[] = [
      'id'          => isset($quiz_raw_question['id'])
        ? (string) $quiz_raw_question['id']
        : (string) (count($quiz_questions) + 1),
      'question'    => $question_text,
      'statements'  => $question_statements,
      'options'     => $normalized_options,
      'explanation' => $question_explanation,
      'difficulty'  => $question_difficulty,
      'tags'        => isset($quiz_raw_question['tags']) && is_array($quiz_raw_question['tags'])
        ? array_values($quiz_raw_question['tags'])
        : [],
      'references'  => $question_references,
      'reference'   => $question_reference,
    ];
  }

  return $quiz_questions;
}

foreach ($quiz_level_configs as $quiz_level_config) {
  $quiz_data = [];
  $quiz_file = (string) $quiz_level_config['file'];

  if (is_file($quiz_file)) {
    $quiz_data_json = file_get_contents($quiz_file);

    if (is_string($quiz_data_json)) {
      try {
        $decoded_quiz_data = json_decode($quiz_data_json, true, 512, JSON_THROW_ON_ERROR);

        if (is_array($decoded_quiz_data)) {
          $quiz_data = $decoded_quiz_data;
        }
      } catch (Throwable $exception) {
        $quiz_load_error = 'Data kuiz tidak dapat dibaca.';
      }
    }
  } else {
    $quiz_load_error = 'Fail data kuiz tidak ditemui.';
  }

  $quiz_meta = isset($quiz_data['meta']) && is_array($quiz_data['meta']) ? $quiz_data['meta'] : [];

  if ($quiz_levels === []) {
    $quiz_subject_raw = isset($quiz_meta['subject']) ? trim((string) $quiz_meta['subject']) : 'Sejarah';
    $quiz_chapter_raw = isset($quiz_meta['chapter']) ? trim((string) $quiz_meta['chapter']) : '1';
    $quiz_subject     = $quiz_subject_raw !== '' ? ucfirst($quiz_subject_raw) : 'Sejarah';
    $quiz_chapter     = preg_match('/^bab-(\d+)$/', $quiz_chapter_raw, $quiz_chapter_match)
      ? $quiz_chapter_match[1]
      : $quiz_chapter_raw;
    $quiz_topic       = isset($quiz_meta['title'])
      ? trim((string) $quiz_meta['title'])
      : 'Kerajaan Alam Melayu';
  }

  $quiz_raw_questions = isset($quiz_data['questions']) && is_array($quiz_data['questions'])
    ? $quiz_data['questions']
    : [];

  $quiz_levels[] = [
    'id'          => $quiz_level_config['id'],
    'label'       => $quiz_level_config['label'],
    'description' => $quiz_level_config['description'],
    'questions'   => normalize_quiz_questions($quiz_raw_questions, $quiz_option_keys),
  ];
}

$quiz_total       = array_reduce($quiz_levels, static function (int $total, array $level): int {
  return $total + count($level['questions']);
}, 0);
$quiz_label       = 'Bab ' . $quiz_chapter . ' : ' . $quiz_topic;
$first_level      = $quiz_levels[0] ?? ['questions' => []];
$first_question   = $first_level['questions'][0] ?? null;
$quiz_payload     = [
  'subject'  => $quiz_subject,
  'chapter'  => $quiz_chapter,
  'topic'    => $quiz_topic,
  'label'    => $quiz_label,
  'levels'   => $quiz_levels,
  'settings' => [
    'shuffle_questions' => $quiz_shuffle_questions,
    'shuffle_options'   => $quiz_shuffle_options,
    'question_limit'    => $quiz_question_limit,
    'time_limit'        => $quiz_time_limit,
  ],
  'questions' => $first_level['questions'],
];
$quiz_payload_json = json_encode(
  $quiz_payload,
  JSON_UNESCAPED_UNICODE
  | JSON_UNESCAPED_SLASHES
  | JSON_HEX_TAG
  | JSON_HEX_AMP
  | JSON_HEX_APOS
  | JSON_HEX_QUOT
);

if (!is_string($quiz_payload_json)) {
  $quiz_payload_json = '{"questions":[]}';
}

ob_start();
?>
<div
  class="quiz__feedback text-sm leading-6 text-brand-700 js-quiz-feedback"
  aria-live="polite"
>
  <div class="quiz__feedback-text js-quiz-feedback-text"></div>
  <div class="quiz__feedback-reference mt-3 text-xs font-medium text-brand-600 js-quiz-feedback-reference" hidden></div>
</div>
<?php
$quiz_feedback_drawer_body = (string) ob_get_clean();

ob_start();
component('button', [
  'label'      => 'Seterusnya',
  'variant'    => 'primary',
  'size'       => 'lg',
  'surface'    => 'gradient',
  'class'      => 'w-full js-quiz-next',
  'attributes' => [
    'data-quiz-next' => true,
  ],
]);
$quiz_feedback_drawer_footer = (string) ob_get_clean();

$quiz_level_button_class = implode(' ', [
  'group',
  'flex',
  'w-full',
  'items-center',
  'justify-between',
  'gap-3',
  'rounded-lg',
  'border',
  'border-brand-300',
  'bg-white',
  'px-4',
  'py-3',
  'text-left',
  'hover:border-brand-400',
  'hover:bg-brand-50',
  'hover:ring-2',
  'hover:ring-brand-300/50',
  'js-quiz-level',
]);
$quiz_level_icon_class = implode(' ', [
  'flex',
  'size-8',
  'shrink-0',
  'items-center',
  'justify-center',
  'rounded-md',
  'bg-brand-100',
  'text-brand-700',
  'group-hover:bg-brand-200',
]);

layout('kuiz/partials/kuiz-start', [
  'page_title' => $page_title,
]);
?>
<article class="app-article pb-20 space-y-5">
  <section aria-labelledby="kuiz-a">
    <h1 id="kuiz-a" class="sr-only"><?= e($quiz_label); ?></h1>

    <?php if ($quiz_total === 0): ?>
      <div class="w-full max-w-[400px] mx-auto">
        <?php component('alert', [
          'title'       => 'Kuiz belum tersedia',
          'description' => $quiz_load_error !== '' ? $quiz_load_error : 'Tiada soalan yang boleh dipaparkan.',
          'tone'        => 'warning',
        ]); ?>
      </div>
    <?php else: ?>
      <div class="quiz w-full max-w-[400px] mx-auto js-quiz">
        <script type="application/json" class="js-quiz-data"><?= $quiz_payload_json; ?></script>

        <div class="<?php card('quiz__intro bg-white px-5 py-5 js-quiz-intro'); ?>">
          <div class="mb-5">
            <p class="mb-2 text-xs font-semibold uppercase tracking-wide text-brand-500">
              <?= e($quiz_subject); ?>
            </p>
            <h1 class="text-xl font-semibold leading-tight text-brand-900">
              Bab <?= e($quiz_chapter); ?>: <?= e($quiz_topic); ?>
            </h1>
            <dl class="mt-4 grid grid-cols-2 gap-3 text-sm">
              <div class="rounded-lg border border-brand-200 bg-brand-50 px-3 py-2">
                <dt class="text-xs text-brand-500">Soalan</dt>
                <dd class="font-semibold text-brand-900"><?= e((string) $quiz_question_limit); ?> rawak</dd>
              </div>
              <div class="rounded-lg border border-brand-200 bg-brand-50 px-3 py-2">
                <dt class="text-xs text-brand-500">Masa</dt>
                <dd class="font-semibold text-brand-900"><?= e((string) $quiz_time_limit); ?>s / soalan</dd>
              </div>
            </dl>
          </div>

          <div class="space-y-2" role="group" aria-label="Pilih tahap kuiz">
            <?php foreach ($quiz_levels as $quiz_level): ?>
              <?php $level_questions_count = count($quiz_level['questions']); ?>
              <button
                type="button"
                class="<?= e($quiz_level_button_class); ?>"
                data-quiz-level="<?= e((string) $quiz_level['id']); ?>"
              >
                <span>
                  <span class="block font-semibold text-brand-900"><?= e((string) $quiz_level['label']); ?></span>
                  <span class="block text-sm text-brand-600">
                    <?= e((string) $quiz_level['description']); ?>
                    ·
                    <?= e((string) $level_questions_count); ?> soalan tersedia
                  </span>
                </span>
                <span class="<?= e($quiz_level_icon_class); ?>">
                  <?php icon('arrow-right-line', ['icon_size' => '18']); ?>
                </span>
              </button>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="quiz__main js-quiz-main" hidden>
          <div class="quiz__content bg-brand-900 text-white mb-4 -mx-4 md:mx-0 md:bg-transparent">
            <div class="quiz__status flex items-center gap-3 text-xs mb-4 hidden">
              <div class="quiz__progress flex-1 js-quiz-progress">
                <?php component('progressbar', [
                  'value'          => 1,
                  'max'            => $quiz_total,
                  'label'          => 'Kemajuan kuiz',
                  'tone'           => 'neutral',
                  'size'           => 'sm',
                  'aria_valuetext' => 'Soalan 1 daripada ' . (string) $quiz_total,
                ]); ?>
              </div>
              <div class="quiz__streak flex items-center gap-1 justify-center">
                <?php icon('fire-fill', ['icon_size' => '20']); ?>
                <div class="quiz__streak__score js-quiz-streak">0</div>
              </div>
            </div>
            <div class="quiz__question relative text-xl font-mediums md:text-brand-800 px-4 py-12 md:border md:border-dashed md:border-brand-300 rounded-lg js-quiz-question">
              <div class="quiz__page absolute left-4 top-4 text-xs leading-none text-brand-500 js-quiz-page">
                1 / <?= e((string) $quiz_total); ?>
              </div>
              <span class="js-quiz-question-text"><?= e((string) $first_question['question']); ?></span>
              <ol
                class="quiz__statements mt-5 list-outside space-y-2 pl-6 text-base leading-6 marker:font-semibold marker:text-brand-300 md:marker:text-brand-700 js-quiz-statements"
                type="I"
                <?= empty($first_question['statements']) ? 'hidden' : ''; ?>
              >
                <?php foreach (($first_question['statements'] ?? []) as $statement): ?>
                  <li class="rounded-lg border border-brand-300 bg-white/10 px-3 py-2 text-left md:bg-brand-50">
                    <?= e((string) $statement['text']); ?>
                  </li>
                <?php endforeach; ?>
              </ol>
              <div
                class="absolute bottom-4 left-4 text-xs leading-none text-brand-500 js-quiz-question-tags"
                aria-live="polite"
              ></div>
              <div
                class="quiz__timer absolute bottom-4 right-4 text-xs text-brand-500 leading-none js-quiz-timer"
                aria-live="polite"
              >
                <span class="js-quiz-time"><?= e((string) $quiz_time_limit); ?>s</span>
              </div>
            </div>
          </div>
          <div class="quiz__options flex flex-col gap-2 js-quiz-options">
            <?php foreach ($first_question['options'] as $option_index => $option): ?>
              <?php $display_key = $quiz_option_keys[$option_index] ?? (string) ($option_index + 1); ?>
              <button
                type="button"
                class="quiz__option group leading-6 flex w-full items-start gap-3 rounded-lg bg-brand-200 px-3 py-3 text-left cursor-pointer hover:ring-1 hover:ring-brand-300/50 hover:bg-brand-50 hover:text-brand-900 js-quiz-option"
                data-quiz-option-index="<?= e((string) $option_index); ?>"
              >
                <span class="option__key size-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-300 bg-white group-hover:ring-brand-400 group-hover:font-semibold">
                  <?= e($display_key); ?>
                </span>
                <span class="option__text"><?= e((string) $option['text']); ?></span>
              </button>
            <?php endforeach; ?>
          </div>

          <div class="quiz__feedback-desktop hidden js-quiz-feedback-desktop" hidden>
            <div
              class="<?php card('quiz__feedback hidden md:block mt-4 px-4 py-3 text-sm leading-6 text-brand-700 js-quiz-feedback'); ?>"
              aria-live="polite"
            >
              <div class="quiz__feedback-title mb-1 font-semibold js-quiz-feedback-title"></div>
              <div class="quiz__feedback-text js-quiz-feedback-text"></div>
              <div class="quiz__feedback-reference mt-3 text-xs font-medium text-brand-600 js-quiz-feedback-reference" hidden></div>
            </div>

            <div class="quiz__actions mt-4 js-quiz-actions">
              <?php component('button', [
                'label'      => 'Seterusnya',
                'variant'    => 'primary',
                'size'       => 'lg',
                'surface'    => 'gradient',
                'class'      => 'w-full js-quiz-next',
                'attributes' => [
                  'data-quiz-next' => true,
                ],
              ]); ?>
            </div>
          </div>

          <button
            type="button"
            class="hidden js-quiz-feedback-drawer-open"
            aria-haspopup="dialog"
            aria-expanded="false"
            data-drawer-open
            data-drawer-target="quiz-feedback-drawer"
          ></button>

        </div>

        <?php component('drawer', [
          'id'          => 'quiz-feedback-drawer',
          'title'       => 'Maklum balas jawapan',
          'position'    => 'bottom',
          'show_trigger' => false,
          'body_html'   => $quiz_feedback_drawer_body,
          'footer_html' => $quiz_feedback_drawer_footer,
          'close_button' => [
            'class' => 'absolute right-4 -top-10 !rounded-full !border-0 !bg-white',
          ],
          'classes'     => [
            'overlay' => 'md:hidden js-quiz-feedback-drawer',
            'panel'   => 'rounded-none',
            'header'  => 'relative border-b-0 js-quiz-feedback-drawer-header',
            'title'   => 'text-base leading-none',
            'footer'  => 'border-t-0 pb-10 pt-0',
          ],
        ]); ?>

        <div
          class="<?php card('quiz__result bg-white px-5 py-6 js-quiz-result'); ?>"
          hidden
        >
          <div class="text-center">
            <div class="quiz__result-icon mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-brand-100 text-brand-800">
              <?php icon('trophy-line', ['icon_size' => '28']); ?>
            </div>
            <div class="quiz__result-kicker mb-2 text-sm text-brand-500"><?= e($quiz_label); ?></div>
            <div class="quiz__result-score mb-1 text-2xl font-semibold text-brand-900 js-quiz-result-score">0 / 0</div>
            <div class="quiz__result-percent mb-3 text-sm text-brand-600 js-quiz-result-percent">0%</div>
            <div class="quiz__result-message mb-5 leading-6 text-brand-700 js-quiz-result-message"></div>
          </div>

          <div class="mb-5 grid grid-cols-2 gap-3 text-sm">
            <div class="rounded-lg border border-brand-200 bg-brand-50 px-3 py-2">
              <div class="text-xs text-brand-500">Betul</div>
              <div class="font-semibold text-brand-900 js-quiz-result-correct">0</div>
            </div>
            <div class="rounded-lg border border-brand-200 bg-brand-50 px-3 py-2">
              <div class="text-xs text-brand-500">Salah</div>
              <div class="font-semibold text-brand-900 js-quiz-result-wrong">0</div>
            </div>
          </div>

          <div class="mb-5 rounded-lg border border-brand-200 px-4 py-3">
            <h2 class="mb-2 text-sm font-semibold text-brand-900">Kekuatan</h2>
            <div class="space-y-2 js-quiz-strong-tags"></div>
          </div>

          <div class="mb-5 rounded-lg border border-brand-200 px-4 py-3">
            <h2 class="mb-2 text-sm font-semibold text-brand-900">Fokus Seterusnya</h2>
            <div class="space-y-2 js-quiz-weak-tags"></div>
          </div>

          <div class="mb-5 rounded-lg border border-brand-200 px-4 py-3">
            <h2 class="mb-2 text-sm font-semibold text-brand-900">Semakan Jawapan Salah</h2>
            <div class="space-y-3 js-quiz-wrong-review"></div>
          </div>

          <div class="space-y-2">
            <?php component('button', [
              'label'      => 'Cuba Lagi',
              'variant'    => 'primary',
              'size'       => 'lg',
              'surface'    => 'gradient',
              'icon'       => [
                'name' => 'refresh-line',
              ],
              'class'      => 'w-full js-quiz-retry',
              'attributes' => [
                'data-quiz-retry' => true,
              ],
            ]); ?>
            <?php component('button', [
              'label'      => 'Ulang Soalan Salah',
              'variant'    => 'secondary',
              'size'       => 'lg',
              'icon'       => [
                'name' => 'restart-line',
              ],
              'class'      => 'w-full js-quiz-retry-wrong',
              'attributes' => [
                'data-quiz-retry-wrong' => true,
              ],
            ]); ?>
            <?php component('button', [
              'label'      => 'Pilih Tahap Lain',
              'variant'    => 'secondary',
              'size'       => 'lg',
              'icon'       => [
                'name' => 'arrow-left-line',
              ],
              'class'      => 'w-full js-quiz-change-level',
              'attributes' => [
                'data-quiz-change-level' => true,
              ],
            ]); ?>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>
</article>
<?php if ($quiz_total > 0): ?>
  <script>
    (() => {
      const quiz = document.querySelector('.js-quiz');

      if (!quiz) {
        return;
      }

      const data_node = quiz.querySelector('.js-quiz-data');
      const quiz_data = JSON.parse(data_node ? data_node.textContent : '{}');
      const option_keys = ['A', 'B', 'C', 'D'];
      const state = {
        active_questions: [],
        selected_level: '',
        current_index: 0,
        score: 0,
        streak: 0,
        answered: false,
        timer_id: null,
        question_started_at: 0,
        time_remaining: 0,
        answers: [],
        wrong_questions: [],
      };

      const elements = {
        intro: quiz.querySelector('.js-quiz-intro'),
        levels: Array.from(quiz.querySelectorAll('.js-quiz-level')),
        main: quiz.querySelector('.js-quiz-main'),
        page: quiz.querySelector('.js-quiz-page'),
        progress: quiz.querySelector('.js-quiz-progress'),
        timer: quiz.querySelector('.js-quiz-timer'),
        time: quiz.querySelector('.js-quiz-time'),
        streak: quiz.querySelector('.js-quiz-streak'),
        subject: quiz.querySelector('.js-quiz-subject'),
        question: quiz.querySelector('.js-quiz-question'),
        question_text: quiz.querySelector('.js-quiz-question-text'),
        statements: quiz.querySelector('.js-quiz-statements'),
        question_tags: quiz.querySelector('.js-quiz-question-tags'),
        options: quiz.querySelector('.js-quiz-options'),
        feedback_desktop: quiz.querySelector('.js-quiz-feedback-desktop'),
        feedback_drawer: quiz.querySelector('.js-quiz-feedback-drawer'),
        feedback_drawer_header: quiz.querySelector('.js-quiz-feedback-drawer-header'),
        feedback_drawer_open: quiz.querySelector('.js-quiz-feedback-drawer-open'),
        feedback_drawer_close: quiz.querySelector('.js-quiz-feedback-drawer [data-drawer-close]'),
        feedback_drawer_title: quiz.querySelector('#quiz-feedback-drawer-title'),
        feedback_nodes: Array.from(quiz.querySelectorAll('.js-quiz-feedback')),
        feedback_title_nodes: Array.from(quiz.querySelectorAll('.js-quiz-feedback-title')),
        feedback_text_nodes: Array.from(quiz.querySelectorAll('.js-quiz-feedback-text')),
        feedback_reference_nodes: Array.from(quiz.querySelectorAll('.js-quiz-feedback-reference')),
        next_nodes: Array.from(quiz.querySelectorAll('.js-quiz-next')),
        result: quiz.querySelector('.js-quiz-result'),
        result_score: quiz.querySelector('.js-quiz-result-score'),
        result_percent: quiz.querySelector('.js-quiz-result-percent'),
        result_correct: quiz.querySelector('.js-quiz-result-correct'),
        result_wrong: quiz.querySelector('.js-quiz-result-wrong'),
        result_message: quiz.querySelector('.js-quiz-result-message'),
        strong_tags: quiz.querySelector('.js-quiz-strong-tags'),
        weak_tags: quiz.querySelector('.js-quiz-weak-tags'),
        wrong_review: quiz.querySelector('.js-quiz-wrong-review'),
        retry: quiz.querySelector('.js-quiz-retry'),
        retry_wrong: quiz.querySelector('.js-quiz-retry-wrong'),
        change_level: quiz.querySelector('.js-quiz-change-level'),
      };
      const time_limit = Number.parseInt(quiz_data.settings && quiz_data.settings.time_limit, 10) || 30;
      const mobile_feedback_media = window.matchMedia('(max-width: 767px)');

      const option_base_class = [
        'quiz__option',
        'group',
        'leading-6',
        'flex',
        'w-full',
        'items-start',
        'gap-3',
        'rounded-lg',
        'border',
        'border-brand-300',
        'bg-white',
        'px-4',
        'py-3',
        'text-left',
        'cursor-pointer',
        'hover:border-brand-400',
        'hover:ring-2',
        'hover:ring-brand-300/50',
        'hover:bg-brand-50',
        'hover:text-brand-900',
        'js-quiz-option',
      ].join(' ');
      const option_key_class = [
        'option__key',
        'size-6',
        'flex',
        'shrink-0',
        'items-start',
        'justify-center',
        'rounded-md',
        'ring-1',
        'ring-brand-300',
        'bg-white',
        'group-hover:ring-brand-400',
        'group-hover:font-semibold',
      ].join(' ');

      const shuffle_array = (items) => {
        const shuffled_items = items.slice();

        for (let index = shuffled_items.length - 1; index > 0; index -= 1) {
          const swap_index = Math.floor(Math.random() * (index + 1));
          const current_item = shuffled_items[index];
          shuffled_items[index] = shuffled_items[swap_index];
          shuffled_items[swap_index] = current_item;
        }

        return shuffled_items;
      };

      const find_level = (level_id) => {
        const levels = Array.isArray(quiz_data.levels) ? quiz_data.levels : [];

        return levels.find((level) => level && level.id === level_id) || null;
      };

      const prepare_questions = (level_id) => {
        const settings = quiz_data.settings || {};
        const selected_level = find_level(level_id);
        const fallback_questions = Array.isArray(quiz_data.questions) ? quiz_data.questions : [];
        const source_questions = selected_level && Array.isArray(selected_level.questions)
          ? selected_level.questions
          : fallback_questions;
        const question_limit = Number.parseInt(settings.question_limit, 10) || source_questions.length;
        const question_order = settings.shuffle_questions ? shuffle_array(source_questions) : source_questions.slice();
        const limited_questions = question_order.slice(0, question_limit);

        return limited_questions.map((question) => {
          const options = Array.isArray(question.options) ? question.options : [];

          return {
            ...question,
            options: settings.shuffle_options ? shuffle_array(options) : options.slice(),
          };
        });
      };

      const clear_timer = () => {
        if (state.timer_id) {
          window.clearInterval(state.timer_id);
          state.timer_id = null;
        }
      };

      const reset_feedback_tone = () => {
        elements.feedback_nodes.forEach((feedback_node) => {
          feedback_node.classList.remove(
            'border-positive-200',
            'border-negative-200',
            'bg-positive-100',
            'bg-negative-100',
            'text-positive-900',
            'text-negative-900'
          );
          feedback_node.classList.add('border-brand-200', 'text-brand-700');
        });

        if (elements.feedback_drawer_title instanceof HTMLElement) {
          elements.feedback_drawer_title.classList.remove('text-positive-900', 'text-negative-900');
          elements.feedback_drawer_title.classList.add('text-brand-900');
        }
        if (elements.feedback_drawer_header instanceof HTMLElement) {
          elements.feedback_drawer_header.classList.remove('bg-positive-100', 'bg-negative-100');
        }
      };

      const close_feedback_drawer = () => {
        if (
          !(elements.feedback_drawer instanceof HTMLElement)
          || elements.feedback_drawer.classList.contains('hidden')
        ) {
          return;
        }

        if (elements.feedback_drawer_close instanceof HTMLElement) {
          elements.feedback_drawer_close.click();
        }
      };

      const open_feedback_drawer = () => {
        if (!(elements.feedback_drawer_open instanceof HTMLElement)) {
          return;
        }

        elements.feedback_drawer_open.click();
      };

      const show_inline_feedback = () => {
        if (!(elements.feedback_desktop instanceof HTMLElement) || !state.answered) {
          return;
        }

        elements.feedback_desktop.hidden = false;
        elements.feedback_desktop.classList.remove('hidden');
      };

      const hide_feedback = () => {
        if (elements.feedback_desktop instanceof HTMLElement) {
          elements.feedback_desktop.hidden = true;
          elements.feedback_desktop.classList.add('hidden');
        }

        close_feedback_drawer();
        if (elements.feedback_drawer_title instanceof HTMLElement) {
          elements.feedback_drawer_title.textContent = 'Maklum balas jawapan';
        }
        elements.feedback_reference_nodes.forEach((feedback_reference_node) => {
          feedback_reference_node.textContent = '';
          feedback_reference_node.hidden = true;
        });
        reset_feedback_tone();
      };

      const update_timer_display = () => {
        elements.time.textContent = `${state.time_remaining}s`;
        elements.timer.classList.remove('text-brand-500', 'text-attention-700', 'text-negative-700');

        if (state.time_remaining <= 5) {
          elements.timer.classList.add('text-negative-700');
          return;
        }

        if (state.time_remaining <= 10) {
          elements.timer.classList.add('text-attention-700');
          return;
        }

        elements.timer.classList.add('text-brand-500');
      };

      const start_timer = () => {
        clear_timer();
        state.time_remaining = time_limit;
        state.question_started_at = Date.now();
        update_timer_display();

        state.timer_id = window.setInterval(() => {
          state.time_remaining -= 1;
          update_timer_display();

          if (state.time_remaining <= 0) {
            clear_timer();
            handle_timeout();
          }
        }, 1000);
      };

      const update_progress = () => {
        const current_question = state.current_index + 1;
        const total_questions = state.active_questions.length;
        const percentage = total_questions > 0 ? (current_question / total_questions) * 100 : 0;
        const progress_track = elements.progress.querySelector('.progressbar__track');
        const progress_fill = elements.progress.querySelector('.progressbar__fill');
        const progress_text = `Soalan ${current_question} daripada ${total_questions}`;

        elements.page.textContent = `${current_question} / ${total_questions}`;
        elements.streak.textContent = String(state.streak);

        if (progress_track) {
          progress_track.setAttribute('aria-valuenow', String(current_question));
          progress_track.setAttribute('aria-valuemax', String(total_questions));
          progress_track.setAttribute('aria-valuetext', progress_text);
        }

        if (progress_fill) {
          progress_fill.style.width = `${percentage}%`;
        }
      };

      const render_options = (question) => {
        elements.options.innerHTML = '';

        question.options.forEach((option, option_index) => {
          const option_button = document.createElement('button');
          const option_key = document.createElement('span');
          const option_text = document.createElement('span');

          option_button.type = 'button';
          option_button.className = option_base_class;
          option_button.dataset.quizOptionIndex = String(option_index);

          option_key.className = option_key_class;
          option_key.textContent = option_keys[option_index] || String(option_index + 1);

          option_text.className = 'option__text';
          option_text.textContent = option.text;

          option_button.append(option_key, option_text);
          elements.options.append(option_button);
        });
      };

      const render_statements = (question) => {
        if (!(elements.statements instanceof HTMLElement)) {
          return;
        }

        const statements = Array.isArray(question.statements)
          ? question.statements.filter((statement) => {
            return statement && typeof statement.text === 'string' && statement.text.trim() !== '';
          })
          : [];

        elements.statements.innerHTML = '';
        elements.statements.hidden = statements.length === 0;

        statements.forEach((statement) => {
          const statement_item = document.createElement('li');

          statement_item.className = 'rounded-lg border border-brand-300 bg-white/10 px-3 py-2 text-left md:bg-brand-50';
          statement_item.textContent = statement.text;

          elements.statements.append(statement_item);
        });
      };

      const format_tag = (tag) => {
        const tag_text = typeof tag === 'string' ? tag.trim() : '';

        if (tag_text === '') {
          return '';
        }

        return tag_text.charAt(0).toUpperCase() + tag_text.slice(1);
      };

      const make_paragraph = (class_name, text) => {
        const node = document.createElement('p');
        node.className = class_name;
        node.textContent = text;

        return node;
      };

      const make_span = (class_name, text) => {
        const node = document.createElement('span');
        node.className = class_name;
        node.textContent = text;

        return node;
      };

      const make_heading = (class_name, text) => {
        const node = document.createElement('h3');
        node.className = class_name;
        node.textContent = text;

        return node;
      };

      const make_statement_list = (statements) => {
        const list = document.createElement('ol');
        const valid_statements = Array.isArray(statements)
          ? statements.filter((statement) => {
            return statement && typeof statement.text === 'string' && statement.text.trim() !== '';
          })
          : [];

        list.className = 'my-2 list-outside space-y-2 pl-6 marker:font-semibold marker:text-brand-700';
        list.type = 'I';

        valid_statements.forEach((statement) => {
          const item = document.createElement('li');

          item.className = 'rounded-lg border border-brand-200 bg-white px-3 py-2';
          item.textContent = statement.text;

          list.append(item);
        });

        return list;
      };

      const render_question = () => {
        const question = state.active_questions[state.current_index];
        const tags = Array.isArray(question.tags)
          ? question.tags.map(format_tag).filter((tag) => tag !== '')
          : [];

        state.answered = false;
        if (elements.intro instanceof HTMLElement) {
          elements.intro.hidden = true;
        }
        elements.main.hidden = false;
        elements.result.hidden = true;
        if (elements.subject) {
          elements.subject.textContent = quiz_data.label || 'Kuiz';
        }
        elements.question_text.textContent = question.question;
        render_statements(question);
        if (elements.question_tags instanceof HTMLElement) {
          elements.question_tags.textContent = tags.join(', ');
          elements.question_tags.hidden = tags.length === 0;
        }
        hide_feedback();

        render_options(question);
        update_progress();
        start_timer();
      };

      const lock_options = (selected_index) => {
        const question = state.active_questions[state.current_index];
        const option_buttons = elements.options.querySelectorAll('.js-quiz-option');

        option_buttons.forEach((option_button, option_index) => {
          const option = question.options[option_index];
          const option_key = option_button.querySelector('.option__key');

          option_button.disabled = true;
          option_button.classList.remove(
            'cursor-pointer',
            'bg-white',
            'hover:border-brand-400',
            'hover:ring-2',
            'hover:ring-brand-300/50',
            'hover:bg-brand-50',
            'hover:text-brand-900'
          );
          option_button.classList.add('cursor-default');
          option_key.classList.remove('bg-white', 'group-hover:ring-brand-400', 'group-hover:font-semibold');

          if (option && option.is_correct === true) {
            option_button.classList.add('border-positive-300', 'bg-positive-100', 'text-positive-900');
            option_key.classList.add('bg-positive-600', 'text-white', 'ring-positive-600');
            return;
          }

          if (selected_index >= 0 && option_index === selected_index) {
            option_button.classList.add('border-negative-300', 'bg-negative-100', 'text-negative-900');
            option_key.classList.add('bg-negative-600', 'text-white', 'ring-negative-600');
            return;
          }

          option_button.classList.add('opacity-60');
        });
      };

      const show_feedback = (is_correct, title, explanation, reference) => {
        const next_label = state.current_index + 1 >= state.active_questions.length ? 'Lihat Keputusan' : 'Seterusnya';
        const reference_text = typeof reference === 'string' ? reference.trim() : '';

        reset_feedback_tone();
        elements.feedback_nodes.forEach((feedback_node) => {
          feedback_node.classList.remove('border-brand-200');
          feedback_node.classList.add(
            is_correct ? 'border-positive-200' : 'border-negative-200'
          );
        });
        elements.feedback_title_nodes.forEach((feedback_title_node) => {
          feedback_title_node.textContent = title;
        });
        if (elements.feedback_drawer_title instanceof HTMLElement) {
          elements.feedback_drawer_title.textContent = title;
          elements.feedback_drawer_title.classList.remove('text-brand-900');
          elements.feedback_drawer_title.classList.add(is_correct ? 'text-positive-900' : 'text-negative-900');
        }
        if (elements.feedback_drawer_header instanceof HTMLElement) {
          elements.feedback_drawer_header.classList.add(is_correct ? 'bg-positive-100' : 'bg-negative-100');
        }
        elements.feedback_text_nodes.forEach((feedback_text_node) => {
          feedback_text_node.textContent = explanation;
        });
        elements.feedback_reference_nodes.forEach((feedback_reference_node) => {
          feedback_reference_node.textContent = reference_text !== '' ? `Rujukan: ${reference_text}` : '';
          feedback_reference_node.hidden = reference_text === '';
        });
        elements.next_nodes.forEach((next_node) => {
          next_node.textContent = next_label;
        });

        if (mobile_feedback_media.matches) {
          show_inline_feedback();
          open_feedback_drawer();
          return;
        }

        close_feedback_drawer();
        show_inline_feedback();
      };

      const answer_text = (option) => {
        return option && typeof option.text === 'string' ? option.text : '';
      };

      const option_id = (option) => {
        return option && typeof option.key === 'string' ? option.key : '';
      };

      const correct_option = (question) => {
        return Array.isArray(question.options)
          ? question.options.find((option) => option && option.is_correct === true) || null
          : null;
      };

      const record_answer = (selected_index, is_correct, status) => {
        const question = state.active_questions[state.current_index];
        const selected_option = selected_index >= 0 ? question.options[selected_index] : null;
        const correct_answer = correct_option(question);
        const duration = state.question_started_at > 0
          ? Math.max(0, Math.round((Date.now() - state.question_started_at) / 1000))
          : 0;

        state.answers.push({
          question_id: question.id,
          selected_option_id: option_id(selected_option),
          selected_answer: answer_text(selected_option),
          correct_option_id: option_id(correct_answer),
          correct_answer: answer_text(correct_answer),
          is_correct: is_correct,
          difficulty: question.difficulty || '',
          tags: Array.isArray(question.tags) ? question.tags.slice() : [],
          question: question.question || '',
          statements: Array.isArray(question.statements) ? question.statements.slice() : [],
          explanation: question.explanation || '',
          references: Array.isArray(question.references) ? question.references.slice() : [],
          reference: question.reference || '',
          status: status,
          duration: duration,
        });
      };

      const handle_timeout = () => {
        if (state.answered) {
          return;
        }

        const question = state.active_questions[state.current_index];

        state.answered = true;
        state.streak = 0;
        elements.streak.textContent = String(state.streak);

        lock_options(-1);
        record_answer(-1, false, 'timeout');
        show_feedback(false, 'Masa tamat', question.explanation, question.reference);
      };

      const mark_answer = (selected_index) => {
        if (state.answered) {
          return;
        }

        const question = state.active_questions[state.current_index];
        const selected_option = question.options[selected_index];

        if (!selected_option) {
          return;
        }

        const is_correct = selected_option.is_correct === true;

        clear_timer();
        state.answered = true;
        lock_options(selected_index);
        record_answer(selected_index, is_correct, 'answered');

        if (is_correct) {
          state.score += 1;
          state.streak += 1;
        } else {
          state.streak = 0;
        }

        elements.streak.textContent = String(state.streak);
        show_feedback(is_correct, is_correct ? 'Betul' : 'Belum tepat', question.explanation, question.reference);
      };

      const result_message = (correct_answers) => {
        if (correct_answers >= 9) {
          return 'Cemerlang';
        }

        if (correct_answers >= 7) {
          return 'Mantap';
        }

        if (correct_answers >= 5) {
          return 'Boleh diperbaiki';
        }

        return 'Ulangkaji semula';
      };

      const build_summary = () => {
        const total_questions = state.answers.length;
        const correct_answers = state.answers.filter((answer) => answer.is_correct).length;
        const wrong_answers = total_questions - correct_answers;
        const accuracy_percentage = total_questions > 0
          ? Math.round((correct_answers / total_questions) * 100)
          : 0;
        const tag_performance = {};

        state.answers.forEach((answer) => {
          const tags = Array.isArray(answer.tags) ? answer.tags : [];

          tags.forEach((tag) => {
            const tag_text = format_tag(tag);

            if (tag_text === '') {
              return;
            }

            if (!tag_performance[tag_text]) {
              tag_performance[tag_text] = {
                tag: tag_text,
                total: 0,
                correct: 0,
                wrong: 0,
                accuracy_percentage: 0,
              };
            }

            tag_performance[tag_text].total += 1;

            if (answer.is_correct) {
              tag_performance[tag_text].correct += 1;
            } else {
              tag_performance[tag_text].wrong += 1;
            }
          });
        });

        const tags = Object.values(tag_performance).map((tag) => ({
          ...tag,
          accuracy_percentage: tag.total > 0 ? Math.round((tag.correct / tag.total) * 100) : 0,
        }));

        return {
          total_questions: total_questions,
          correct_answers: correct_answers,
          wrong_answers: wrong_answers,
          accuracy_percentage: accuracy_percentage,
          tag_performance: tags,
          weak_tags: tags.filter((tag) => tag.total >= 2 && tag.accuracy_percentage < 70),
          strong_tags: tags.filter((tag) => tag.total >= 2 && tag.accuracy_percentage >= 80),
          wrong_answers_review: state.answers.filter((answer) => !answer.is_correct),
        };
      };

      const render_tag_summary = (container, tags, empty_text) => {
        if (!(container instanceof HTMLElement)) {
          return;
        }

        container.innerHTML = '';

        if (tags.length === 0) {
          container.append(make_paragraph('text-sm text-brand-600', empty_text));
          return;
        }

        tags.forEach((tag) => {
          const row = document.createElement('div');
          row.className = 'flex items-center justify-between gap-3 text-sm';
          row.append(
            make_span('font-medium text-brand-800', tag.tag),
            make_span(
              'text-brand-600',
              `${tag.correct}/${tag.total} · ${tag.accuracy_percentage}%`
            )
          );
          container.append(row);
        });
      };

      const render_wrong_review = (wrong_answers) => {
        if (!(elements.wrong_review instanceof HTMLElement)) {
          return;
        }

        elements.wrong_review.innerHTML = '';

        if (wrong_answers.length === 0) {
          elements.wrong_review.append(
            make_paragraph('text-sm text-brand-600', 'Tiada jawapan salah untuk sesi ini.')
          );
          return;
        }

        wrong_answers.forEach((answer, index) => {
          const item = document.createElement('article');
          const reference_text = typeof answer.reference === 'string' ? answer.reference.trim() : '';
          const selected_answer = answer.selected_answer !== '' ? answer.selected_answer : 'Tiada jawapan';
          const statements = Array.isArray(answer.statements) ? answer.statements : [];

          item.className = 'rounded-lg border border-brand-200 bg-brand-50 px-3 py-3 text-sm';
          item.append(make_heading('font-semibold text-brand-900', `${index + 1}. ${answer.question}`));

          if (statements.length > 0) {
            item.append(make_statement_list(statements));
          }

          item.append(
            make_paragraph('mt-2 text-negative-800', `Jawapan anda: ${selected_answer}`),
            make_paragraph('text-positive-800', `Jawapan betul: ${answer.correct_answer}`),
            make_paragraph('mt-2 text-brand-700', answer.explanation)
          );

          if (reference_text !== '') {
            item.append(make_paragraph('mt-2 text-xs font-medium text-brand-600', `Rujukan: ${reference_text}`));
          }

          elements.wrong_review.append(item);
        });
      };

      const show_result = () => {
        const summary = build_summary();

        clear_timer();
        hide_feedback();
        elements.main.hidden = true;
        elements.result.hidden = false;
        state.wrong_questions = state.active_questions.filter((question) => {
          return summary.wrong_answers_review.some((answer) => answer.question_id === question.id);
        });

        elements.result_score.textContent = `${summary.correct_answers} / ${summary.total_questions}`;
        elements.result_percent.textContent = `${summary.accuracy_percentage}% tepat`;
        elements.result_correct.textContent = String(summary.correct_answers);
        elements.result_wrong.textContent = String(summary.wrong_answers);
        elements.result_message.textContent = result_message(summary.correct_answers);
        if (elements.retry_wrong instanceof HTMLButtonElement) {
          elements.retry_wrong.disabled = summary.wrong_answers === 0;
        }

        render_tag_summary(elements.strong_tags, summary.strong_tags, 'Belum ada tag kuat yang cukup jelas.');
        render_tag_summary(elements.weak_tags, summary.weak_tags, 'Tiada tag lemah yang ketara untuk sesi ini.');
        render_wrong_review(summary.wrong_answers_review);
      };

      const go_next = () => {
        if (!state.answered) {
          return;
        }

        state.current_index += 1;

        if (state.current_index >= state.active_questions.length) {
          show_result();
          return;
        }

        render_question();
      };

      const start_quiz = (level_id, custom_questions) => {
        const resolved_level_id = typeof level_id === 'string' && level_id !== ''
          ? level_id
          : state.selected_level;

        clear_timer();
        state.selected_level = resolved_level_id;
        state.active_questions = Array.isArray(custom_questions) && custom_questions.length > 0
          ? custom_questions.map((question) => ({
            ...question,
            options: Array.isArray(question.options) ? shuffle_array(question.options) : [],
          }))
          : prepare_questions(resolved_level_id);
        state.current_index = 0;
        state.score = 0;
        state.streak = 0;
        state.answers = [];

        if (state.active_questions.length === 0) {
          return;
        }

        render_question();
      };

      const show_level_picker = () => {
        clear_timer();
        close_feedback_drawer();
        elements.result.hidden = true;
        elements.main.hidden = true;

        if (elements.intro instanceof HTMLElement) {
          elements.intro.hidden = false;
        }
      };

      elements.options.addEventListener('click', (event) => {
        const option_button = event.target.closest('.js-quiz-option');

        if (!option_button || !elements.options.contains(option_button)) {
          return;
        }

        mark_answer(Number(option_button.dataset.quizOptionIndex));
      });

      elements.next_nodes.forEach((next_node) => {
        next_node.addEventListener('click', go_next);
      });
      elements.levels.forEach((level_node) => {
        level_node.addEventListener('click', () => {
          start_quiz(level_node.dataset.quizLevel || '');
        });
      });
      if (elements.feedback_drawer instanceof HTMLElement) {
        elements.feedback_drawer.addEventListener('click', (event) => {
          const click_target = event.target;

          if (!(click_target instanceof Element)) {
            return;
          }

          if (click_target === elements.feedback_drawer || click_target.closest('[data-drawer-close]')) {
            window.setTimeout(show_inline_feedback, 310);
          }
        });
      }
      if (elements.retry instanceof HTMLElement) {
        elements.retry.addEventListener('click', () => {
          start_quiz(state.selected_level);
        });
      }
      if (elements.retry_wrong instanceof HTMLElement) {
        elements.retry_wrong.addEventListener('click', () => {
          if (state.wrong_questions.length === 0) {
            return;
          }

          start_quiz(state.selected_level, state.wrong_questions);
        });
      }
      if (elements.change_level instanceof HTMLElement) {
        elements.change_level.addEventListener('click', show_level_picker);
      }
    })();
  </script>
<?php endif; ?>
<?php layout('kuiz/partials/kuiz-end'); ?>
