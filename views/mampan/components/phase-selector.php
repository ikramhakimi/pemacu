<?php

declare(strict_types=1);

/*
Component: Mampan Phase Selector
Purpose: Render the consultant project phase state controller without changing URL or navigation.
Anatomy:
- .phase-selector
- .phase-selector__label
- .phase-selector__form
- .phase-selector__dropdown
- .phase-selector__subtitle
Data Contract:
- $current_phase: currently active phase key (phase-1 .. phase-4)
- $phase_data_map: full phase state map keyed by phase key
- $phase_label_map: optional display labels keyed by phase key
*/

$resolved_phase_data_map = isset($phase_data_map) && is_array($phase_data_map) ? $phase_data_map : [];
$resolved_phase_label_map = isset($phase_label_map) && is_array($phase_label_map) ? $phase_label_map : [];
$resolved_current_phase = isset($current_phase) ? trim((string) $current_phase) : '';

if (!isset($resolved_phase_data_map[$resolved_current_phase])) {
  $resolved_current_phase = array_key_first($resolved_phase_data_map);
  $resolved_current_phase = $resolved_current_phase === null ? 'phase-1' : (string) $resolved_current_phase;
}

$phase_form_action = isset($_SERVER['REQUEST_URI'])
  ? strtok((string) $_SERVER['REQUEST_URI'], '?')
  : '';

if ($phase_form_action === false) {
  $phase_form_action = '';
}

$current_phase_title = 'Phase';
$current_phase_subtitle = 'Setup & Planning';

if (isset($resolved_phase_label_map[$resolved_current_phase]) && is_array($resolved_phase_label_map[$resolved_current_phase])) {
  $phase_label_meta = $resolved_phase_label_map[$resolved_current_phase];
  $current_phase_title = isset($phase_label_meta['title']) ? trim((string) $phase_label_meta['title']) : $current_phase_title;
  $current_phase_subtitle = isset($phase_label_meta['subtitle']) ? trim((string) $phase_label_meta['subtitle']) : $current_phase_subtitle;
}

if ($current_phase_title === '') {
  $current_phase_title = 'Phase';
}

if ($current_phase_subtitle === '') {
  $current_phase_subtitle = 'Setup & Planning';
}
?>
<div class="phase-selector flex flex-wrap items-center gap-2 leading-none">
  <div class="phase-selector__label text-brand-500">Current Phase :</div>

  <form method="post" action="<?= e((string) $phase_form_action); ?>" class="phase-selector__form">
    <label for="project-current-phase" class="sr-only">Current Phase</label>
    <select
      id="project-current-phase"
      name="current_phase"
      class="phase-selector__dropdown border-0 bg-transparent p-0 font-medium text-brand-900 focus:outline-none"
      onchange="this.form.submit()"
      aria-label="Select current project phase"
    >
      <?php foreach ($resolved_phase_data_map as $phase_key => $phase_config): ?>
        <?php
        $phase_key_string = trim((string) $phase_key);

        if ($phase_key_string === '') {
          continue;
        }

        $phase_title = 'Phase';
        $phase_subtitle = ucfirst(str_replace('-', ' ', $phase_key_string));

        if (isset($resolved_phase_label_map[$phase_key_string]) && is_array($resolved_phase_label_map[$phase_key_string])) {
          $phase_meta = $resolved_phase_label_map[$phase_key_string];
          $phase_title = isset($phase_meta['title']) ? trim((string) $phase_meta['title']) : $phase_title;
          $phase_subtitle = isset($phase_meta['subtitle']) ? trim((string) $phase_meta['subtitle']) : $phase_subtitle;
        }

        if ($phase_title === '') {
          $phase_title = 'Phase';
        }

        if ($phase_subtitle === '') {
          $phase_subtitle = ucfirst(str_replace('-', ' ', $phase_key_string));
        }

        $option_label = $phase_title . ' - ' . $phase_subtitle;
        ?>
        <option value="<?= e($phase_key_string); ?>" <?= $phase_key_string === $resolved_current_phase ? 'selected' : ''; ?>>
          <?= e($option_label); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </form>

  <div class="phase-selector__subtitle text-xs text-brand-500"><?= e($current_phase_subtitle); ?></div>
</div>
