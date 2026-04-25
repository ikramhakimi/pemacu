<?php

declare(strict_types=1);

$step_sections = isset($step_sections) && is_array($step_sections) ? $step_sections : [];
$team_role_groups = isset($team_role_groups) && is_array($team_role_groups) ? $team_role_groups : [];
$credit_items = isset($credit_items) && is_array($credit_items) ? $credit_items : [];
$document_items = isset($document_items) && is_array($document_items) ? $document_items : [];
$completion_document_items = isset($completion_document_items) && is_array($completion_document_items) ? $completion_document_items : [];
?>
<div class="space-y-5">
  <section class="<?php card('bg-white overflow-hidden'); ?>" aria-labelledby="project-setup-step-1">
    <div class="lg:grid grid-cols-3">
      <div class="bg-brand-50 col-span-1 border-r border-brand-200 hidden md:block"></div>
      <div class="col-span-2">
        <div class="border-b border-brand-100 p-4 sm:p-5">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Step 1</p>
          <h3 id="project-setup-step-1" class="mt-4 text-3xl font-semibold text-brand-900 leading-none">Project Setup</h3>
          <p class="mt-2 text-base text-brand-600">Capture project baseline information and configure the initial GBI assessment parameters.</p>
        </div>

        <div class="grid gap-4 md:grid-cols-2 border-b border-brand-100 p-4 sm:p-5">
          <div class="col-span-2">
            <label class="text-sm font-medium text-brand-700" for="project-name">Project Name</label>
            <div class="mt-2">
              <?php component('input', [
                'id'          => 'project-name',
                'name'        => 'project_name',
                'placeholder' => 'Menara Harmoni Office Retrofit',
                'value'       => isset($step_sections['project']['project_name']) ? (string) $step_sections['project']['project_name'] : '',
              ]); ?>
            </div>
          </div>

          <div>
            <label class="text-sm font-medium text-brand-700" for="client-company">Client Company</label>
            <div class="mt-2">
              <?php component('input', [
                'id'          => 'client-company',
                'name'        => 'client_company',
                'placeholder' => 'Harmoni Asset Holdings Berhad',
                'value'       => isset($step_sections['project']['client_company']) ? (string) $step_sections['project']['client_company'] : '',
              ]); ?>
            </div>
          </div>

          <div>
            <label class="text-sm font-medium text-brand-700" for="project-location">Location</label>
            <div class="mt-2">
              <?php component('input', [
                'id'          => 'project-location',
                'name'        => 'project_location',
                'placeholder' => 'Jalan Tun Razak, Kuala Lumpur',
                'value'       => isset($step_sections['project']['project_location']) ? (string) $step_sections['project']['project_location'] : '',
              ]); ?>
            </div>
          </div>

          <div class="md:col-span-2">
            <label class="text-sm font-medium text-brand-700" for="building-type">Building Type</label>
            <div class="mt-2">
              <?php component('select', [
                'id'             => 'building-type',
                'name'           => 'building_type',
                'selected_value' => isset($step_sections['project']['building_type']) ? (string) $step_sections['project']['building_type'] : '',
                'placeholder'    => 'Select building type',
                'options'        => [
                  ['label' => 'Office', 'value' => 'Office'],
                  ['label' => 'Commercial Complex', 'value' => 'Commercial Complex'],
                  ['label' => 'Healthcare Facility', 'value' => 'Healthcare Facility'],
                  ['label' => 'Educational Campus', 'value' => 'Educational Campus'],
                  ['label' => 'Hospitality', 'value' => 'Hospitality'],
                ],
              ]); ?>
            </div>
          </div>
        </div>

        <div class="border-b border-brand-100 p-4 sm:p-5">
          <p class="text-sm text-brand-600">
            Define assessment stage and target rating for credit planning and submission strategy.
          </p>

          <div class="mt-5 grid gap-4 md:grid-cols-3">
            <div>
              <label class="text-sm font-medium text-brand-700" for="gbi-tool-type">GBI Tool Type</label>
              <div class="mt-2">
                <?php component('select', [
                  'id'             => 'gbi-tool-type',
                  'name'           => 'gbi_tool_type',
                  'selected_value' => isset($step_sections['gbi']['tool_type']) ? (string) $step_sections['gbi']['tool_type'] : '',
                  'options'        => [
                    ['label' => 'GBI NRNC', 'value' => 'GBI NRNC'],
                  ],
                ]); ?>
              </div>
            </div>

            <div>
              <label class="text-sm font-medium text-brand-700" for="assessment-stage">Assessment Stage</label>
              <div class="mt-2">
                <?php component('select', [
                  'id'             => 'assessment-stage',
                  'name'           => 'assessment_stage',
                  'selected_value' => isset($step_sections['gbi']['assessment_stage']) ? (string) $step_sections['gbi']['assessment_stage'] : '',
                  'options'        => [
                    ['label' => 'Design', 'value' => 'Design'],
                    ['label' => 'Completion', 'value' => 'Completion'],
                  ],
                ]); ?>
              </div>
            </div>

            <div>
              <label class="text-sm font-medium text-brand-700" for="target-rating">Target Rating</label>
              <div class="mt-2">
                <?php component('select', [
                  'id'             => 'target-rating',
                  'name'           => 'target_rating',
                  'selected_value' => isset($step_sections['gbi']['target_rating']) ? (string) $step_sections['gbi']['target_rating'] : '',
                  'options'        => [
                    ['label' => 'Certified', 'value' => 'Certified'],
                    ['label' => 'Silver', 'value' => 'Silver'],
                    ['label' => 'Gold', 'value' => 'Gold'],
                    ['label' => 'Platinum', 'value' => 'Platinum'],
                  ],
                ]); ?>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap items-center justify-end gap-3 p-4 sm:p-5">
          <?php component('button', [
            'label'   => 'Next Step',
            'type'    => 'button',
            'variant' => 'primary',
            'size'    => 'lg',
          ]); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="<?php card('bg-white overflow-hidden'); ?>" aria-labelledby="project-setup-step-2">
    <div class="lg:grid grid-cols-3">
      <div class="bg-brand-50 col-span-1 border-r border-brand-200 hidden md:block"></div>
      <div class="col-span-2">
        <div class="border-b border-brand-100 p-4 sm:p-5">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Step 2</p>
          <h3 id="project-setup-step-2" class="mt-4 text-3xl font-semibold text-brand-900 leading-none">Team Setup</h3>
          <p class="mt-2 text-base text-brand-600">Assign accountable stakeholders so each credit and document requirement has a clear owner.</p>
        </div>
        <div class="grid gap-4 md:grid-cols-2 border-b border-brand-100 p-4 sm:p-5">
          <div>
            <label class="text-sm font-medium text-brand-700" for="consultant-lead">Consultant Lead</label>
            <div class="mt-2">
              <?php component('input', [
                'id'    => 'consultant-lead',
                'name'  => 'consultant_lead',
                'size'  => 'lg',
                'value' => isset($step_sections['team']['consultant_lead']) ? (string) $step_sections['team']['consultant_lead'] : '',
              ]); ?>
            </div>
          </div>

          <div>
            <label class="text-sm font-medium text-brand-700" for="client-pic">Client PIC</label>
            <div class="mt-2">
              <?php component('input', [
                'id'    => 'client-pic',
                'name'  => 'client_pic',
                'size'  => 'lg',
                'value' => isset($step_sections['team']['client_pic']) ? (string) $step_sections['team']['client_pic'] : '',
              ]); ?>
            </div>
          </div>

          <div class="md:col-span-2">
            <p class="mt-2 text-sm text-brand-500">
              Select relevant supporting roles for early ownership alignment and checklist planning.
            </p>

        <div class="mt-4 space-y-2">
              <?php foreach ($team_role_groups as $role_group_index => $role_group): ?>
                <?php
                $role_category = isset($role_group['category']) ? trim((string) $role_group['category']) : '';
                $role_items = isset($role_group['roles']) && is_array($role_group['roles']) ? $role_group['roles'] : [];

                if ($role_category === '' || $role_items === []) {
                  continue;
                }
                ?>
                <article class="rounded-md border border-brand-200 bg-white p-4">
                  <h4 class="text-sm text-brand-700"><?= e($role_category); ?></h4>
                  <div class="mt-4 flex flex-wrap gap-2">
                    <?php foreach ($role_items as $role_item): ?>
                      <?php
                      $role_id = isset($role_item['id']) ? trim((string) $role_item['id']) : '';
                      $role_label = isset($role_item['label']) ? trim((string) $role_item['label']) : '';
                      $role_checked = !empty($role_item['checked']);

                      if ($role_id === '' || $role_label === '') {
                        continue;
                      }

                      $checkbox_id = 'team-role-' . $role_group_index . '-' . $role_id;
                      ?>
                  <?php component('checkbox', [
                    'id'          => $checkbox_id,
                    'name'        => 'team_roles[]',
                    'value'       => $role_id,
                    'label'       => $role_label,
                    'checked'     => $role_checked,
                    'class'       => 'h-[var(--ui-h-md)] rounded-md border border-brand-200 bg-white px-3 transition has-[input:checked]:border-brand-400 has-[input:checked]:bg-brand-100',
                    'label_class' => 'text-sm font-medium text-brand-800',
                  ]); ?>
                <?php endforeach; ?>
              </div>
                </article>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap items-center justify-end gap-3 p-4 sm:p-5">
          <?php component('button', [
            'label'   => 'Back',
            'type'    => 'button',
            'variant' => 'secondary',
            'size'    => 'lg',
          ]); ?>
          <?php component('button', [
            'label'   => 'Next Step',
            'type'    => 'button',
            'variant' => 'primary',
            'size'    => 'lg',
          ]); ?>
        </div>
      </div>
    </div>
    
  </section>

  <section class="<?php card('bg-white overflow-hidden'); ?>" aria-labelledby="project-setup-step-3">
    <div class="lg:grid grid-cols-3">
      <div class="bg-brand-50 col-span-1 border-r border-brand-200 hidden md:block"></div>
      <div class="col-span-2">
        <div class="border-b border-brand-100 p-4 sm:p-5">
          <div class="flex flex-wrap items-start justify-between gap-3">
            <div>
              <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Step 3</p>
              <h3 id="project-setup-step-3" class="mt-4 text-3xl font-semibold text-brand-900 leading-none">Credit Direction</h3>
              <p class="mt-2 text-base text-brand-600">
                Confirm initial targeted credits. This selection remains editable as evidence readiness evolves.
              </p>
            </div>
          </div>
        </div>

        <div class="p-4 sm:p-5 border-b border-brand-100">
          <div class="grid gap-3 lg:grid-cols-2">
            <?php foreach ($credit_items as $credit_item): ?>
              <?php
              $credit_id = isset($credit_item['id']) ? trim((string) $credit_item['id']) : '';
              $credit_name = isset($credit_item['name']) ? trim((string) $credit_item['name']) : '';
              $credit_helper = isset($credit_item['helper']) ? trim((string) $credit_item['helper']) : '';
              $credit_checked = !empty($credit_item['checked']);

              if ($credit_id === '' || $credit_name === '') {
                continue;
              }
              ?>
              <article class="rounded-lg border border-brand-200 bg-white p-4 transition has-[input:checked]:border-brand-300 has-[input:checked]:bg-brand-100">
                <div class="flex items-start justify-between gap-3">
                  <?php component('checkbox', [
                    'id'          => 'credit-' . $credit_id,
                    'name'        => 'targeted_credits[]',
                    'value'       => $credit_id,
                    'label'       => $credit_name,
                    'checked'     => $credit_checked,
                    'label_class' => 'text-base font-medium text-brand-900',
                    'class'       => 'items-start',
                  ]); ?>
                </div>
                <?php if ($credit_helper !== ''): ?>
                  <p class="mt-4 text-sm text-brand-600"><?= e($credit_helper); ?></p>
                <?php endif; ?>
              </article>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="flex flex-wrap items-center justify-end gap-3 p-4 sm:p-5">
          <?php component('button', [
            'label'   => 'Back',
            'type'    => 'button',
            'variant' => 'secondary',
            'size'    => 'lg',
          ]); ?>
          <?php component('button', [
            'label'   => 'Next Step',
            'type'    => 'button',
            'variant' => 'primary',
            'size'    => 'lg',
          ]); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="<?php card('bg-white overflow-hidden'); ?>" aria-labelledby="project-setup-step-4">
    <div class="lg:grid grid-cols-3">
      <div class="bg-brand-50 col-span-1 border-r border-brand-200 hidden md:block"></div>
      <div class="col-span-2">
        <div class="border-b border-brand-100 p-4 sm:p-5">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Step 4</p>
          <h3 id="project-setup-step-4" class="mt-4 text-3xl font-semibold text-brand-900 leading-none">Document Checklist (Design)</h3>
          <p class="mt-2 text-base text-brand-600">
            Initial checklist generated from selected credits to support Design-stage submission readiness.
          </p>
        </div>

        <div class="p-4 sm:p-5 border-b border-brand-100">
          <div class="overflow-x-auto rounded-lg border border-brand-200">
            <table class="min-w-full divide-y divide-brand-200 text-sm">
              <thead class="bg-brand-50">
                <tr class="text-left text-xs font-semibold uppercase tracking-wide text-brand-600">
                  <th class="px-4 py-3">Document Item</th>
                  <th class="px-4 py-3">Category</th>
                  <th class="px-4 py-3">Linked Credit</th>
                  <th class="px-4 py-3">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-brand-100 bg-white">
                <?php foreach ($document_items as $document_item): ?>
                  <?php
                  $document_name = isset($document_item['name']) ? trim((string) $document_item['name']) : '';
                  $document_category = isset($document_item['category']) ? trim((string) $document_item['category']) : '-';
                  $document_credit = isset($document_item['credit']) ? trim((string) $document_item['credit']) : '-';

                  if ($document_name === '') {
                    continue;
                  }
                  ?>
                  <tr>
                    <td class="px-4 py-3 font-medium text-brand-900"><?= e($document_name); ?></td>
                    <td class="px-4 py-3 text-brand-700"><?= e($document_category); ?></td>
                    <td class="px-4 py-3 text-brand-700"><?= e($document_credit); ?></td>
                    <td class="px-4 py-3">
                      <span class="inline-flex rounded border border-attention-200 bg-attention-50 px-2 py-1 text-xs font-semibold uppercase tracking-wide text-attention-700">
                        Required
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="flex flex-wrap items-center justify-end gap-3 p-4 sm:p-5">
          <?php component('button', [
            'label'   => 'Back',
            'type'    => 'button',
            'variant' => 'secondary',
            'size'    => 'lg',
          ]); ?>
          <?php component('button', [
            'label'   => 'Next Step',
            'type'    => 'button',
            'variant' => 'primary',
            'size'    => 'lg',
          ]); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="<?php card('bg-white overflow-hidden'); ?>" aria-labelledby="project-setup-step-5">
    <div class="lg:grid grid-cols-3">
      <div class="bg-brand-50 col-span-1 border-r border-brand-200 hidden md:block"></div>
      <div class="col-span-2">
        <div class="border-b border-brand-100 p-4 sm:p-5">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Step 5</p>
          <h3 id="project-setup-step-5" class="mt-4 text-3xl font-semibold text-brand-900 leading-none">Document Checklist (Completion)</h3>
          <p class="mt-2 text-base text-brand-600">
            Completion-stage checklist focusing on as-built, commissioning, and operational evidence.
          </p>
        </div>

        <div class="p-4 sm:p-5 border-b border-brand-100">
          <div class="overflow-x-auto rounded-lg border border-brand-200">
            <table class="min-w-full divide-y divide-brand-200 text-sm">
              <thead class="bg-brand-50">
                <tr class="text-left text-xs font-semibold uppercase tracking-wide text-brand-600">
                  <th class="px-4 py-3">Document Item</th>
                  <th class="px-4 py-3">Category</th>
                  <th class="px-4 py-3">Linked Credit</th>
                  <th class="px-4 py-3">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-brand-100 bg-white">
                <?php foreach ($completion_document_items as $document_item): ?>
                  <?php
                  $document_name = isset($document_item['name']) ? trim((string) $document_item['name']) : '';
                  $document_category = isset($document_item['category']) ? trim((string) $document_item['category']) : '-';
                  $document_credit = isset($document_item['credit']) ? trim((string) $document_item['credit']) : '-';

                  if ($document_name === '') {
                    continue;
                  }
                  ?>
                  <tr>
                    <td class="px-4 py-3 font-medium text-brand-900"><?= e($document_name); ?></td>
                    <td class="px-4 py-3 text-brand-700"><?= e($document_category); ?></td>
                    <td class="px-4 py-3 text-brand-700"><?= e($document_credit); ?></td>
                    <td class="px-4 py-3">
                      <span class="inline-flex rounded border border-attention-200 bg-attention-50 px-2 py-1 text-xs font-semibold uppercase tracking-wide text-attention-700">
                        Required
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="flex flex-wrap items-center justify-end gap-3 p-4 sm:p-5">
          <?php component('button', [
            'label'   => 'Back',
            'type'    => 'button',
            'variant' => 'secondary',
            'size'    => 'lg',
          ]); ?>
          <?php component('button', [
            'label'   => 'Review & Create',
            'type'    => 'button',
            'variant' => 'primary',
            'size'    => 'lg',
          ]); ?>
        </div>
      </div>
    </div>
  </section>
</div>
