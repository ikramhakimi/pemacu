<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Rating';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/rating',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Rating',
    'header_subtitle'        => 'Reference for API-driven star rating controls across SaaS feedback and onboarding workflows.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Rating Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg justify-center">
          <?php component('form/rating', [
            'id_prefix' => 'rating-base-csm-handoff',
            'name'      => 'rating_base_csm_handoff',
            'value'     => 4,
            'max'       => 5,
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Rating A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-lg gap-4">
          <?php component('form/fields', [
            'label'           => 'Implementation Session',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'How clearly did we explain your workspace setup?',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'rating-a-implementation-session',
              'name'      => 'rating_a_implementation_session',
              'value'     => 0,
              'required'  => true,
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Rating B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-lg gap-4">
          <?php component('form/fields', [
            'label'           => 'CSAT Pulse',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'Latest support interaction score.',
            'state'           => 'positive',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'rating-b-csat-pulse',
              'name'      => 'rating_b_csat_pulse',
              'value'     => 5,
            ],
          ]); ?>

          <?php component('form/fields', [
            'label'           => 'Escalation Health',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'Needs follow-up before renewal call.',
            'state'           => 'negative',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'rating-b-escalation-health',
              'name'      => 'rating_b_escalation_health',
              'value'     => 2,
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Rating C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="grid w-full max-w-lg gap-4">
          <?php component('form/fields', [
            'label'           => 'Survey Locked',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'Locked after invoice reconciliation.',
            'state'           => 'disabled',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'rating-c-survey-locked',
              'name'      => 'rating_c_survey_locked',
              'value'     => 3,
              'disabled'  => true,
            ],
          ]); ?>

          <?php component('form/fields', [
            'label'           => 'Quarterly NPS Snapshot',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'Read-only score from your last survey wave.',
            'state'           => 'info',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'rating-c-quarterly-nps',
              'name'      => 'rating_c_quarterly_nps',
              'value'     => 4,
              'read_only' => true,
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Rating D
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col gap-4">
          <?php component('form/rating', [
            'id_prefix'           => 'rating-d-onboarding-sentiment',
            'name'                => 'rating_d_onboarding_sentiment',
            'selected_value'      => 7,
            'max'                 => 10,
            'active_icon_class'   => 'text-primary-600',
            'inactive_icon_class' => 'text-brand-300',
            'class'               => 'rounded-md border border-brand-200 bg-white p-3',
          ]); ?>

          <?php component('form/rating', [
            'id_prefix'           => 'rating-d-implementation-happiness',
            'name'                => 'rating_d_implementation_happiness',
            'selected_value'      => 8,
            'max'                 => 10,
            'active_icon_class'   => 'text-positive-600',
            'inactive_icon_class' => 'text-brand-300',
            'class'               => 'rounded-md border border-brand-200 bg-white p-3',
            'attributes'          => [
              'aria-label' => 'Implementation happiness score',
            ],
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Rating E
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="w-full max-w-lg">
          <div class="<?php card('divide-y divide-brand-200 bg-white'); ?>">
            <div class="p-4">
              <p class="text-base font-semibold text-brand-900">Client Health Check</p>
              <p class="mt-1 text-sm text-brand-600">Score each touchpoint after the monthly review call.</p>
            </div>

            <div class="flex items-center justify-between gap-3 p-4">
              <p class="text-sm font-medium text-brand-900">Onboarding Clarity</p>
              <?php component('form/rating', [
                'id_prefix'      => 'rating-e-onboarding-clarity',
                'name'           => 'rating_e_onboarding_clarity',
                'value'          => 4,
                'input_attributes' => [
                  'aria-label' => 'Onboarding clarity score',
                ],
              ]); ?>
            </div>

            <div class="flex items-center justify-between gap-3 p-4">
              <p class="text-sm font-medium text-brand-900">Support Responsiveness</p>
              <?php component('form/rating', [
                'id_prefix'      => 'rating-e-support-responsiveness',
                'name'           => 'rating_e_support_responsiveness',
                'value'          => 5,
                'input_attributes' => [
                  'aria-label' => 'Support responsiveness score',
                ],
              ]); ?>
            </div>

            <div class="flex items-center justify-between gap-3 p-4">
              <p class="text-sm font-medium text-brand-900">Feature Discoverability</p>
              <?php component('form/rating', [
                'id_prefix'      => 'rating-e-feature-discoverability',
                'name'           => 'rating_e_feature_discoverability',
                'value'          => 3,
                'input_attributes' => [
                  'aria-label' => 'Feature discoverability score',
                ],
              ]); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
