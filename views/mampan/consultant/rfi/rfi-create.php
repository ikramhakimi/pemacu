<?php

declare(strict_types=1);

$page_title   = 'New Clarification';

require __DIR__ . '/../_data/phase_data.php';
$current_phase = resolve_mampan_current_phase($phase_data_map);
$current_phase_data = $phase_data_map[$current_phase];
$page_current = 'consultant-rfi';
$project_current = 'project-rfi';
$clarifications_phase_data = isset($current_phase_data['clarifications']) && is_array($current_phase_data['clarifications'])
  ? $current_phase_data['clarifications']
  : [];
$documents_phase_data = isset($current_phase_data['documents']) && is_array($current_phase_data['documents'])
  ? $current_phase_data['documents']
  : [];
$clarifications_message = isset($clarifications_phase_data['message'])
  ? (string) $clarifications_phase_data['message']
  : 'Multiple clarifications are awaiting client response.';
$clarifications_state = isset($clarifications_phase_data['state']) ? (string) $clarifications_phase_data['state'] : 'active';
$documents_state = isset($documents_phase_data['state']) ? (string) $documents_phase_data['state'] : 'initial';
$clarification_stage_map = [
  'empty'    => 'Project Kickoff',
  'active'   => 'Evidence Collection',
  'reducing' => 'Resolution Tracking',
  'closed'   => 'Finalisation',
];
$document_status_map = [
  'initial'    => 'Missing',
  'collection' => 'Partial',
  'review'     => 'Under Review',
  'complete'   => 'Satisfied',
];

$create_preview = [
  'project_stage'         => isset($clarification_stage_map[$clarifications_state]) ? $clarification_stage_map[$clarifications_state] : 'Evidence Collection',
  'linked_document'       => 'Chilled Water System Schematic Rev B',
  'linked_gbi_credit'     => 'EE2 - Energy Monitoring',
  'related_evidence_item' => '3 months chilled water trend logs',
  'document_hub_status'   => isset($document_status_map[$documents_state]) ? $document_status_map[$documents_state] : 'Missing',
  'people_involved'       => [
    ['name' => 'Ir. Aisyah Kamaruddin', 'role' => 'Lead Consultant'],
    ['name' => 'Mechanical Engineer (Client)', 'role' => 'Assigned Respondent'],
  ],
  'due_date'              => '2026-04-27',
  'sla_note'              => 'Clarification should be linked to document, credit, evidence, or project stage before submission.',
];

layout('mampan/dashboard-project', [
  'page_title'           => $page_title,
  'page_current'         => $page_current,
  'project_current'      => $project_current,
  'current_phase'       => $current_phase,
  'phase_data_map'      => $phase_data_map,
  'phase_label_map'     => $phase_label_map,
]);
?>
<article class="app-article mx-auto max-w-7xl space-y-5 py-5">
  <header class="rounded-lg border border-brand-200 bg-white p-5">
    <div class="flex flex-wrap items-center justify-between gap-3">
      <?php component('button', ['label' => 'Back to Clarifications', 'href' => path('/mampan/consultant/rfi/rfi-index'), 'variant' => 'default', 'size' => 'sm']); ?>
      <?php component('badge', ['items' => [['label' => 'Draft', 'tone' => 'neutral']]]); ?>
    </div>
    <h1 class="mt-4 text-2xl font-semibold text-brand-900 md:text-3xl">Create Clarification</h1>
    <p class="mt-1 text-sm text-brand-600">
      Link every clarification to a project stage, document, GBI credit, or evidence item to keep review traceable.
    </p>
    <p class="mt-1 text-sm text-brand-500"><?= e($clarifications_message); ?></p>
  </header>

  <section class="grid gap-5 xl:grid-cols-12" aria-label="Create clarification form">
    <div class="xl:col-span-8">
      <form class="rounded-lg border border-brand-200 bg-white p-5 space-y-5" action="#" method="post">
        <div class="grid gap-4 md:grid-cols-2">
          <?php component('fields', [
            'label'       => 'Subject',
            'helper_text' => 'Use concise title describing the clarification request.',
            'class'       => 'md:col-span-2 space-y-2',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'name'        => 'subject',
                'value'       => 'EE2 Energy Monitoring Trend Data',
                'placeholder' => 'Enter clarification subject',
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'   => 'Project Stage',
            'class'   => 'space-y-2',
            'control' => [
              'component' => 'select',
              'props'     => [
                'name'          => 'project_stage',
                'selected_value'=> 'evidence_collection',
                'options'       => [
                  ['label' => 'Project Award', 'value' => 'project_award'],
                  ['label' => 'Gap Analysis Review', 'value' => 'gap_analysis'],
                  ['label' => 'Evidence Collection', 'value' => 'evidence_collection'],
                  ['label' => 'Verification Review', 'value' => 'verification_review'],
                ],
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'   => 'Link Type',
            'class'   => 'space-y-2',
            'control' => [
              'component' => 'select',
              'props'     => [
                'name'          => 'link_type',
                'selected_value'=> 'gbi_credit',
                'options'       => [
                  ['label' => 'Document', 'value' => 'document'],
                  ['label' => 'GBI Credit', 'value' => 'gbi_credit'],
                  ['label' => 'Evidence Item', 'value' => 'evidence_item'],
                  ['label' => 'General Project', 'value' => 'general_project'],
                ],
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'       => 'Linked Document',
            'helper_text' => 'Select the source document needing clarification.',
            'class'       => 'space-y-2',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'name'        => 'linked_document',
                'value'       => 'Chilled Water System Schematic Rev B',
                'placeholder' => 'Enter linked document',
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'       => 'Linked GBI Credit',
            'helper_text' => 'Use official credit code and label.',
            'class'       => 'space-y-2',
            'control'     => [
              'component' => 'input',
              'props'     => [
                'name'        => 'linked_gbi_credit',
                'value'       => 'EE2 - Energy Monitoring',
                'placeholder' => 'e.g. EE2 - Energy Monitoring',
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'       => 'Question / Request',
            'helper_text' => 'State exactly what the client must provide.',
            'class'       => 'md:col-span-2 space-y-2',
            'control'     => [
              'component' => 'textarea',
              'props'     => [
                'name'  => 'question_request',
                'rows'  => 4,
                'value' => 'Please provide 3 months chilled water system trend logs to support energy monitoring compliance review.',
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'       => 'Reason / Context',
            'helper_text' => 'Explain why this clarification is required for verification.',
            'class'       => 'md:col-span-2 space-y-2',
            'control'     => [
              'component' => 'textarea',
              'props'     => [
                'name'  => 'reason_context',
                'rows'  => 4,
                'value' => 'Current submission includes equipment schedule only. Trend logs are required to verify operational monitoring evidence.',
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'   => 'Assigned To',
            'class'   => 'space-y-2',
            'control' => [
              'component' => 'input',
              'props'     => [
                'name'  => 'assigned_to',
                'value' => 'Mechanical Engineer (Client)',
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'   => 'Priority',
            'class'   => 'space-y-2',
            'control' => [
              'component' => 'select',
              'props'     => [
                'name'           => 'priority',
                'selected_value' => 'high',
                'options'        => [
                  ['label' => 'High', 'value' => 'high'],
                  ['label' => 'Medium', 'value' => 'medium'],
                  ['label' => 'Low', 'value' => 'low'],
                ],
              ],
            ],
          ]); ?>

          <?php component('fields', [
            'label'   => 'Due Date',
            'class'   => 'space-y-2',
            'control' => [
              'component' => 'input',
              'props'     => [
                'type'  => 'date',
                'name'  => 'due_date',
                'value' => '2026-04-27',
              ],
            ],
          ]); ?>
        </div>

        <div>
          <p class="text-xs uppercase tracking-wide text-brand-500">Attach Reference File</p>
          <div class="mt-2 rounded-md border border-dashed border-brand-300 bg-brand-50 p-4">
            <p class="text-sm text-brand-700">Reference upload placeholder: drawings, screenshots, or previous review notes.</p>
          </div>
        </div>

        <div class="flex flex-wrap gap-2 pt-2">
          <?php component('button', ['label' => 'Save Draft', 'href' => path('/mampan/consultant/rfi/rfi-index'), 'variant' => 'default']); ?>
          <?php component('button', ['label' => 'Create Clarification', 'href' => path('/mampan/consultant/rfi/rfi-detail?rfi=009'), 'variant' => 'primary']); ?>
        </div>
      </form>
    </div>

    <div class="xl:col-span-4">
      <?php component('rfi/rfi-linked-context', $create_preview); ?>
    </div>
  </section>
</article>
<?php layout('mampan/partials/dashboard-end'); ?>
