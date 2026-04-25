<?php

declare(strict_types=1);

$page_title   = 'Projects Portfolio';
$page_current = 'consultant-projects';

layout('mampan/dashboard-global', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
  'global_intro' => 'Browse and manage all consultant projects from one view.',
]);
?>
<article class="app-article space-y-5 pb-5">
  <section class="rounded-lg border border-zinc-200 bg-white p-5" aria-label="All projects">
    <div class="flex flex-wrap items-start justify-between gap-3">
      <div>
        <h2 class="text-lg font-semibold text-zinc-900">All Projects</h2>
        <p class="mt-1 text-sm text-zinc-600">Portfolio-level list grouped by delivery status.</p>
      </div>
      <?php component('button', [
        'label'   => 'New GBI Project',
        'href'    => path('/mampan/consultant/projects/project-setup'),
        'variant' => 'primary',
        'size'    => 'md',
      ]); ?>
    </div>
    <div class="mt-4 overflow-x-auto">
      <table class="min-w-full divide-y divide-zinc-200 text-sm">
        <thead>
          <tr class="text-left text-xs uppercase tracking-wide text-zinc-500">
            <th class="px-3 py-2">Project</th>
            <th class="px-3 py-2">Code</th>
            <th class="px-3 py-2">Client</th>
            <th class="px-3 py-2">Status</th>
            <th class="px-3 py-2">Target Rating</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-zinc-100">
          <tr>
            <td class="px-3 py-2 font-medium text-zinc-900"><a class="hover:underline" href="<?= e(path('/mampan/consultant/projects/project-workspace')); ?>">Menara Harmoni Office Retrofit</a></td>
            <td class="px-3 py-2">GBI-NRNC-2026-014</td>
            <td class="px-3 py-2">Harmoni Asset Holdings Berhad</td>
            <td class="px-3 py-2">Evidence Collection</td>
            <td class="px-3 py-2">GBI Gold</td>
          </tr>
          <tr>
            <td class="px-3 py-2 font-medium text-zinc-900">Putra Tech Campus Annex</td>
            <td class="px-3 py-2">GBI-NRNC-2026-018</td>
            <td class="px-3 py-2">Putra Tech Properties</td>
            <td class="px-3 py-2">Gap Analysis</td>
            <td class="px-3 py-2">GBI Silver</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
