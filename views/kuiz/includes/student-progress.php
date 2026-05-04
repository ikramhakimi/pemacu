<?php

declare(strict_types=1);

/**
 * Mock student progress data for the read-only dashboard.
 *
 * Replace these arrays with database reads when quiz attempts are persisted.
 * The public functions below are intentionally small so the page can keep the
 * same read-only API later.
 */

function calculate_accuracy(int $correct, int $total): int
{
  if ($total <= 0) {
    return 0;
  }

  return (int) round(($correct / $total) * 100);
}

function get_student_mock_attempts(): array
{
  return [
    [
      'id'              => 1005,
      'student_id'      => 1,
      'subject_id'      => 1,
      'subject_name'    => 'Sejarah',
      'chapter_id'      => 1,
      'chapter_title'   => 'Bab 1',
      'topic_id'        => 101,
      'topic_title'     => 'Kerajaan Alam Melayu',
      'difficulty'      => 'easy',
      'score'           => 8,
      'total_questions' => 10,
      'completed_at'    => '2026-05-01 16:20:00',
    ],
    [
      'id'              => 1004,
      'student_id'      => 1,
      'subject_id'      => 1,
      'subject_name'    => 'Sejarah',
      'chapter_id'      => 2,
      'chapter_title'   => 'Bab 2',
      'topic_id'        => 102,
      'topic_title'     => 'Sistem Pemerintahan',
      'difficulty'      => 'medium',
      'score'           => 4,
      'total_questions' => 8,
      'completed_at'    => '2026-04-30 20:05:00',
    ],
    [
      'id'              => 1003,
      'student_id'      => 1,
      'subject_id'      => 1,
      'subject_name'    => 'Sejarah',
      'chapter_id'      => 3,
      'chapter_title'   => 'Bab 3',
      'topic_id'        => 103,
      'topic_title'     => 'Perdagangan Maritim',
      'difficulty'      => 'hard',
      'score'           => 5,
      'total_questions' => 10,
      'completed_at'    => '2026-04-28 18:40:00',
    ],
    [
      'id'              => 1002,
      'student_id'      => 1,
      'subject_id'      => 1,
      'subject_name'    => 'Sejarah',
      'chapter_id'      => 4,
      'chapter_title'   => 'Bab 4',
      'topic_id'        => 104,
      'topic_title'     => 'Pengaruh Hindu-Buddha',
      'difficulty'      => 'hard',
      'score'           => 3,
      'total_questions' => 6,
      'completed_at'    => '2026-04-26 21:10:00',
    ],
    [
      'id'              => 1001,
      'student_id'      => 1,
      'subject_id'      => 1,
      'subject_name'    => 'Sejarah',
      'chapter_id'      => 1,
      'chapter_title'   => 'Bab 1',
      'topic_id'        => 101,
      'topic_title'     => 'Kerajaan Alam Melayu',
      'difficulty'      => 'easy',
      'score'           => 7,
      'total_questions' => 10,
      'completed_at'    => '2026-04-24 19:15:00',
    ],
    [
      'id'              => 1000,
      'student_id'      => 2,
      'subject_id'      => 1,
      'subject_name'    => 'Sejarah',
      'chapter_id'      => 1,
      'chapter_title'   => 'Bab 1',
      'topic_id'        => 101,
      'topic_title'     => 'Kerajaan Alam Melayu',
      'difficulty'      => 'easy',
      'score'           => 6,
      'total_questions' => 10,
      'completed_at'    => '2026-04-24 18:00:00',
    ],
  ];
}

function get_student_mock_attempt_answers(): array
{
  $answers = [];

  $answer_sets = [
    1005 => [
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', false],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', false],
      [101, 'Kerajaan Alam Melayu', true],
    ],
    1004 => [
      [102, 'Sistem Pemerintahan', false],
      [102, 'Sistem Pemerintahan', true],
      [102, 'Sistem Pemerintahan', false],
      [102, 'Sistem Pemerintahan', true],
      [102, 'Sistem Pemerintahan', false],
      [102, 'Sistem Pemerintahan', true],
      [102, 'Sistem Pemerintahan', false],
      [102, 'Sistem Pemerintahan', true],
    ],
    1003 => [
      [103, 'Perdagangan Maritim', false],
      [103, 'Perdagangan Maritim', false],
      [103, 'Perdagangan Maritim', true],
      [103, 'Perdagangan Maritim', false],
      [103, 'Perdagangan Maritim', true],
      [103, 'Perdagangan Maritim', true],
      [103, 'Perdagangan Maritim', false],
      [103, 'Perdagangan Maritim', true],
      [103, 'Perdagangan Maritim', false],
      [103, 'Perdagangan Maritim', true],
    ],
    1002 => [
      [104, 'Pengaruh Hindu-Buddha', false],
      [104, 'Pengaruh Hindu-Buddha', true],
      [104, 'Pengaruh Hindu-Buddha', false],
      [104, 'Pengaruh Hindu-Buddha', false],
      [104, 'Pengaruh Hindu-Buddha', true],
      [104, 'Pengaruh Hindu-Buddha', true],
    ],
    1001 => [
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', false],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', false],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', true],
      [101, 'Kerajaan Alam Melayu', false],
    ],
  ];

  $answer_id = 1;

  foreach ($answer_sets as $attempt_id => $answer_set) {
    $attempt = get_student_attempt_by_id((int) $attempt_id);

    if ($attempt === []) {
      continue;
    }

    foreach ($answer_set as $index => $answer) {
      $answers[] = [
        'id'            => $answer_id,
        'attempt_id'    => (int) $attempt_id,
        'student_id'    => (int) $attempt['student_id'],
        'question_id'   => ($attempt_id * 100) + $index + 1,
        'topic_id'      => (int) $answer[0],
        'topic_title'   => (string) $answer[1],
        'subject_name'  => (string) $attempt['subject_name'],
        'chapter_title' => (string) $attempt['chapter_title'],
        'is_correct'    => (bool) $answer[2],
      ];
      $answer_id++;
    }
  }

  return $answers;
}

function get_student_attempt_by_id(int $attempt_id): array
{
  foreach (get_student_mock_attempts() as $attempt) {
    if ((int) $attempt['id'] === $attempt_id) {
      return $attempt;
    }
  }

  return [];
}

function get_student_attempts(int $student_id): array
{
  $attempts = array_values(array_filter(
    get_student_mock_attempts(),
    static fn (array $attempt): bool => (int) $attempt['student_id'] === $student_id
  ));

  usort($attempts, static function (array $first_attempt, array $second_attempt): int {
    return strcmp((string) $second_attempt['completed_at'], (string) $first_attempt['completed_at']);
  });

  return $attempts;
}

function get_student_attempt_answers(int $student_id): array
{
  return array_values(array_filter(
    get_student_mock_attempt_answers(),
    static fn (array $answer): bool => (int) $answer['student_id'] === $student_id
  ));
}

function get_student_summary(int $student_id): array
{
  $attempts          = get_student_attempts($student_id);
  $total_questions   = array_sum(array_map(static fn (array $attempt): int => (int) $attempt['total_questions'], $attempts));
  $total_correct     = array_sum(array_map(static fn (array $attempt): int => (int) $attempt['score'], $attempts));
  $completed_attempts = count($attempts);
  $weak_topics       = get_student_weak_topics($student_id);

  return [
    'total_questions_answered' => $total_questions,
    'average_accuracy'         => calculate_accuracy($total_correct, $total_questions),
    'completed_attempts'       => $completed_attempts,
    'weak_topics'              => count($weak_topics),
  ];
}

function get_student_weak_topics(int $student_id, int $limit = 5): array
{
  $answers                       = get_student_attempt_answers($student_id);
  $topics                        = [];
  $attempt_difficulties_by_topic = [];

  foreach (get_student_attempts($student_id) as $attempt) {
    $topic_id   = isset($attempt['topic_id']) ? (int) $attempt['topic_id'] : 0;
    $difficulty = isset($attempt['difficulty']) ? strtolower(trim((string) $attempt['difficulty'])) : '';

    if ($topic_id <= 0 || !in_array($difficulty, ['easy', 'medium', 'hard'], true)) {
      continue;
    }

    if (!isset($attempt_difficulties_by_topic[$topic_id])) {
      $attempt_difficulties_by_topic[$topic_id] = [
        'total_quiz_attempts' => 0,
        'easy_attempts'       => 0,
        'medium_attempts'     => 0,
        'hard_attempts'       => 0,
      ];
    }

    $attempt_difficulties_by_topic[$topic_id]['total_quiz_attempts']++;
    $attempt_difficulties_by_topic[$topic_id][$difficulty . '_attempts']++;
  }

  foreach ($answers as $answer) {
    $topic_id = (int) $answer['topic_id'];

    if (!isset($topics[$topic_id])) {
      $topics[$topic_id] = [
        'topic_id'        => $topic_id,
        'topic_title'     => (string) $answer['topic_title'],
        'subject_name'    => (string) $answer['subject_name'],
        'chapter_title'   => (string) $answer['chapter_title'],
        'correct_answers' => 0,
        'total_answers'   => 0,
        'wrong_answers'   => 0,
      ];
    }

    $topics[$topic_id]['total_answers']++;

    if ((bool) $answer['is_correct']) {
      $topics[$topic_id]['correct_answers']++;
    } else {
      $topics[$topic_id]['wrong_answers']++;
    }
  }

  $weak_topics = array_filter($topics, static function (array $topic): bool {
    $accuracy = calculate_accuracy((int) $topic['correct_answers'], (int) $topic['total_answers']);

    return $accuracy < 70 && (int) $topic['total_answers'] >= 3;
  });

  $weak_topics = array_map(static function (array $topic) use ($attempt_difficulties_by_topic): array {
    $topic_id        = (int) $topic['topic_id'];
    $attempt_summary = $attempt_difficulties_by_topic[$topic_id] ?? [
      'total_quiz_attempts' => 0,
      'easy_attempts'       => 0,
      'medium_attempts'     => 0,
      'hard_attempts'       => 0,
    ];

    $topic['accuracy'] = calculate_accuracy((int) $topic['correct_answers'], (int) $topic['total_answers']);
    $topic             = array_merge($topic, $attempt_summary);

    return $topic;
  }, array_values($weak_topics));

  usort($weak_topics, static function (array $first_topic, array $second_topic): int {
    if ((int) $first_topic['accuracy'] === (int) $second_topic['accuracy']) {
      return (int) $second_topic['wrong_answers'] <=> (int) $first_topic['wrong_answers'];
    }

    return (int) $first_topic['accuracy'] <=> (int) $second_topic['accuracy'];
  });

  return array_slice($weak_topics, 0, max(0, $limit));
}

function get_student_activity_heatmap(int $student_id, int $weeks = 8): array
{
  $weeks           = max(1, $weeks);
  $attempts        = get_student_attempts($student_id);
  $attempts_by_day = [];

  foreach ($attempts as $attempt) {
    $completed_at = isset($attempt['completed_at']) ? trim((string) $attempt['completed_at']) : '';

    if ($completed_at === '') {
      continue;
    }

    $timestamp = strtotime($completed_at);

    if ($timestamp === false) {
      continue;
    }

    $date_key = date('Y-m-d', $timestamp);

    if (!isset($attempts_by_day[$date_key])) {
      $attempts_by_day[$date_key] = 0;
    }

    $attempts_by_day[$date_key]++;
  }

  $today      = new DateTimeImmutable('today');
  $start_date = $today->modify('-' . (string) (($weeks * 7) - 1) . ' days');
  $items      = [];

  for ($day_offset = 0; $day_offset < $weeks * 7; $day_offset++) {
    $date      = $start_date->modify('+' . (string) $day_offset . ' days');
    $date_key  = $date->format('Y-m-d');
    $count     = $attempts_by_day[$date_key] ?? 0;
    $level     = min(3, $count);
    $date_text = $date->format('d M Y');

    $items[] = [
      'date'  => $date_key,
      'label' => $count === 1
        ? '1 cubaan pada ' . $date_text
        : (string) $count . ' cubaan pada ' . $date_text,
      'count' => $count,
      'level' => $level,
    ];
  }

  return $items;
}

function get_student_activity_heatmap_for_year(int $student_id, ?int $year = null): array
{
  $year            = $year ?? (int) date('Y');
  $attempts        = get_student_attempts($student_id);
  $attempts_by_day = [];

  foreach ($attempts as $attempt) {
    $completed_at = isset($attempt['completed_at']) ? trim((string) $attempt['completed_at']) : '';

    if ($completed_at === '') {
      continue;
    }

    $timestamp = strtotime($completed_at);

    if ($timestamp === false || (int) date('Y', $timestamp) !== $year) {
      continue;
    }

    $date_key = date('Y-m-d', $timestamp);

    if (!isset($attempts_by_day[$date_key])) {
      $attempts_by_day[$date_key] = 0;
    }

    $attempts_by_day[$date_key]++;
  }

  $start_date = new DateTimeImmutable((string) $year . '-01-01');
  $end_date   = new DateTimeImmutable((string) $year . '-12-31');
  $items      = [];

  for ($date = $start_date; $date <= $end_date; $date = $date->modify('+1 day')) {
    $date_key  = $date->format('Y-m-d');
    $count     = $attempts_by_day[$date_key] ?? 0;
    $level     = min(3, $count);
    $date_text = $date->format('d M Y');

    $items[] = [
      'date'  => $date_key,
      'label' => $count === 1
        ? '1 cubaan pada ' . $date_text
        : (string) $count . ' cubaan pada ' . $date_text,
      'count' => $count,
      'level' => $level,
    ];
  }

  return $items;
}

function get_student_recent_attempts(int $student_id, int $limit = 5): array
{
  $attempts = array_map(static function (array $attempt): array {
    $attempt['accuracy'] = calculate_accuracy((int) $attempt['score'], (int) $attempt['total_questions']);

    return $attempt;
  }, get_student_attempts($student_id));

  return array_slice($attempts, 0, max(0, $limit));
}

function get_student_continue_practice(int $student_id): array
{
  $recent_attempts = get_student_recent_attempts($student_id, 1);

  return $recent_attempts[0] ?? [];
}
