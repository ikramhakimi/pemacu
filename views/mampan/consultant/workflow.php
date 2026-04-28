<?php

declare(strict_types=1);

$page_title = 'Project Workflow';

require __DIR__ . '/_data/phase_data.php';
$current_phase = resolve_mampan_current_phase($phase_data_map);
$page_current = 'consultant-projects';
$project_current = 'project-workflow';

layout('mampan/dashboard-project', [
  'page_title'      => $page_title,
  'page_current'    => $page_current,
  'project_current' => $project_current,
  'current_phase'   => $current_phase,
  'phase_data_map'  => $phase_data_map,
  'phase_label_map' => $phase_label_map,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <header class="rounded-lg border border-brand-200 bg-white p-5">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <?php component('button', ['label' => 'Back to Workspace', 'href' => path('/mampan/consultant/projects/project-workspace'), 'variant' => 'default', 'size' => 'sm']); ?>
      <?php component('badge', ['items' => [['label' => 'Live Workflow', 'tone' => 'neutral']]]); ?>
    </div>
    <h1 class="mt-4 text-2xl font-semibold text-brand-900 md:text-3xl">Project Workflow</h1>
    <p class="mt-1 text-sm text-brand-600">
      Monitor stage ownership, timeline, and completion status across the consultant delivery flow.
    </p>
  </header>

  <section class="flex flex-col justify-center items-center text-center">
    <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>">Start Project</div>
    <div class="w-px h-4 bg-brand-300"></div>
    <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>">Client Define Requirements</div>
    <div class="w-px h-4 bg-brand-300"></div>
    <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>"><div>Client Upload Document</div></div>
    <div class="w-px h-4 bg-brand-300"></div>
    <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>">Consultant Review Document</div>
    <div class="w-px h-4 bg-brand-300"></div>
    <div class="flex justify-center items-center">
      <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>">Document Sufficient?</div>
    </div>
    <div class="w-px h-4 bg-brand-300"></div>
    <div class="h-8 w-[500px] border border-b-0 border-brand-300 flex items-center justify-between px-2 text-xs">
      <div>NO</div>
      <div>YES</div>
    </div>
    <div class="flex justify-between w-[750px] items-center">
      <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>">Document Sufficient?</div>
      <section class="flex-col justify-center items-center text-center">
        <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>">Link to Evidence</div>
        <div class="w-px h-4 bg-brand-300 mx-auto"></div>
        <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>">Evidence Verification</div>
        <div class="w-px h-4 bg-brand-300 mx-auto"></div>
        <div class="<?php card('bg-white px-5 py-2 w-[250px]') ?>">Valid for GBI Credits?</div>
        <div class="w-px h-4 bg-brand-300 mx-auto"></div>
      </section>
    </div>
  </section>



</article>
<?php layout('mampan/partials/dashboard-end'); ?>
