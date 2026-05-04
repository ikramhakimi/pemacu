<?php

declare(strict_types=1);

$map_file = __DIR__ . '/curriculum-map.php';
$json_files = [
  __DIR__ . '/sejarah/form-2/bab-1-level-1.json',
  __DIR__ . '/sejarah/form-2/bab-1-level-2.json',
  __DIR__ . '/sejarah/form-2/bab-1-level-3.json',
];

$curriculum_map = require $map_file;

if (!is_array($curriculum_map)) {
  fwrite(STDERR, "Validation failed: curriculum map must return an array.\n");
  exit(1);
}

$sections = isset($curriculum_map['sections']) && is_array($curriculum_map['sections'])
  ? $curriculum_map['sections']
  : [];

if ($sections === []) {
  fwrite(STDERR, "Validation failed: curriculum map sections are required.\n");
  exit(1);
}

function normalize_quiz_references(string $json_file, array $curriculum_map, array $sections): array
{
  $json = file_get_contents($json_file);

  if (!is_string($json)) {
    throw new RuntimeException("Validation failed: unable to read {$json_file}.");
  }

  try {
    $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
  } catch (JsonException $exception) {
    throw new RuntimeException("Validation failed: invalid JSON in {$json_file}. " . $exception->getMessage());
  }

  if (!is_array($data)) {
    throw new RuntimeException("Validation failed: decoded JSON must be an object in {$json_file}.");
  }

  $meta = isset($data['meta']) && is_array($data['meta']) ? $data['meta'] : [];

  foreach (['subject', 'level', 'chapter'] as $meta_key) {
    if (!isset($meta[$meta_key]) || trim((string) $meta[$meta_key]) === '') {
      throw new RuntimeException("Validation failed: meta.{$meta_key} is required in {$json_file}.");
    }
  }

  foreach (['subject', 'level', 'chapter'] as $meta_key) {
    $expected_value = isset($curriculum_map[$meta_key]) ? trim((string) $curriculum_map[$meta_key]) : '';
    $actual_value   = trim((string) $meta[$meta_key]);

    if ($expected_value === '' || $actual_value !== $expected_value) {
      throw new RuntimeException("Validation failed: meta.{$meta_key} does not match curriculum map in {$json_file}.");
    }
  }

  $questions = isset($data['questions']) && is_array($data['questions']) ? $data['questions'] : [];

  if ($questions === []) {
    throw new RuntimeException("Validation failed: questions array is required in {$json_file}.");
  }

  $references_added   = 0;
  $references_updated = 0;

  foreach ($questions as $question_index => $question) {
    if (!is_array($question)) {
      throw new RuntimeException('Validation failed: question ' . ($question_index + 1) . " must be an object in {$json_file}.");
    }

    $question_id = isset($question['id']) ? (string) $question['id'] : (string) ($question_index + 1);

    if (!isset($question['subtopic']) || trim((string) $question['subtopic']) === '') {
      throw new RuntimeException("Validation failed: question {$question_id} subtopic is required in {$json_file}.");
    }

    $subtopic = trim((string) $question['subtopic']);

    if (!isset($sections[$subtopic]) || trim((string) $sections[$subtopic]) === '') {
      throw new RuntimeException("Validation failed: question {$question_id} subtopic is not in curriculum map in {$json_file}.");
    }

    $references = isset($question['references']) && is_array($question['references'])
      ? $question['references']
      : [];

    if ($references === []) {
      $references_added++;
    } else {
      $references_updated++;
    }

    $first_reference = isset($references[0]) && is_array($references[0]) ? $references[0] : [];

    $first_reference['type']    = isset($first_reference['type']) && trim((string) $first_reference['type']) !== ''
      ? $first_reference['type']
      : 'textbook';
    $first_reference['source']  = isset($first_reference['source']) && trim((string) $first_reference['source']) !== ''
      ? $first_reference['source']
      : 'Buku Teks Sejarah Tingkatan 2';
    $first_reference['chapter'] = isset($first_reference['chapter']) && trim((string) $first_reference['chapter']) !== ''
      ? $first_reference['chapter']
      : 'Bab 1';
    $first_reference['section'] = $sections[$subtopic];

    $references[0] = $first_reference;
    $data['questions'][$question_index]['references'] = $references;
  }

  $encoded_json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

  if (!is_string($encoded_json)) {
    throw new RuntimeException("Validation failed: unable to encode normalized JSON for {$json_file}.");
  }

  file_put_contents($json_file, $encoded_json . "\n");

  return [
    'file'               => $json_file,
    'questions'          => count($questions),
    'references_added'   => $references_added,
    'references_updated' => $references_updated,
  ];
}

$total_questions = 0;
$total_added     = 0;
$total_updated   = 0;

try {
  foreach ($json_files as $json_file) {
    $summary = normalize_quiz_references($json_file, $curriculum_map, $sections);

    $total_questions += $summary['questions'];
    $total_added += $summary['references_added'];
    $total_updated += $summary['references_updated'];

    echo basename($summary['file']) . "\n";
    echo 'Total questions processed: ' . $summary['questions'] . "\n";
    echo 'Total references added: ' . $summary['references_added'] . "\n";
    echo 'Total references updated: ' . $summary['references_updated'] . "\n\n";
  }
} catch (RuntimeException $exception) {
  fwrite(STDERR, $exception->getMessage() . "\n");
  exit(1);
}

echo 'Total questions processed: ' . $total_questions . "\n";
echo 'Total references added: ' . $total_added . "\n";
echo 'Total references updated: ' . $total_updated . "\n";
echo "Validation success: references normalized.\n";
