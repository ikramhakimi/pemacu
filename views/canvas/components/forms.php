<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Forms';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/forms',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Forms',
    'header_subtitle'        => 'Reference for input controls, validation states, and structured data entry patterns.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use labels and helper text to clarify expected input.</li>
      <li>Show validation states close to the related field.</li>
      <li>Group related controls to reduce scanning effort.</li>
      <li>Prefer concise control text and predictable field order.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Input Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for single-line values such as names, email addresses, and short identifiers.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-3 md:grid-cols-2">
          <?php component('form/input', ['size' => 'sm', 'placeholder' => 'input-sm']); ?>
          <?php component('form/input', ['size' => 'md', 'placeholder' => 'input-md']); ?>
          <?php component('form/input', ['size' => 'lg', 'placeholder' => 'input-lg', 'class' => 'md:col-span-2']); ?>
          <?php component('form/input', ['state' => 'positive', 'value' => 'input-positive']); ?>
          <?php component('form/input', ['state' => 'negative', 'value' => 'input-negative']); ?>
          <?php component('form/input', ['state' => 'disabled', 'value' => 'input-disabled', 'class' => 'md:col-span-2', 'disabled' => true]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Input Group</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for contextual inputs where icons communicate intent or expected value type.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-3 md:grid-cols-2">
          <?php component('form/field', [
            'label'           => 'Input Group Small (Icon Left)',
            'helper_text'     => 'Search intent with leading icon.',
            'input_component' => 'input-group',
            'input_props'     => [
              'size'        => 'sm',
              'icon_name'   => 'search-line',
              'placeholder' => 'Search keyword',
            ],
            'class'           => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'           => 'Input Group Small (Icon Right)',
            'helper_text'     => 'Compact input with trailing icon.',
            'input_component' => 'input-group',
            'input_props'     => [
              'size'          => 'sm',
              'icon_name'     => 'search-line',
              'icon_position' => 'right',
              'placeholder'   => 'Search keyword',
            ],
            'class'           => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'           => 'Input Group Medium (Icon Left)',
            'helper_text'     => 'Common pattern for email capture.',
            'input_component' => 'input-group',
            'input_props'     => [
              'type'        => 'email',
              'size'        => 'md',
              'icon_name'   => 'mail-line',
              'placeholder' => 'name@example.com',
            ],
            'class'           => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'           => 'Input Group Medium (Icon Right)',
            'helper_text'     => 'Trailing icon keeps text start aligned.',
            'input_component' => 'input-group',
            'input_props'     => [
              'type'          => 'email',
              'size'          => 'md',
              'icon_name'     => 'mail-line',
              'icon_position' => 'right',
              'placeholder'   => 'name@example.com',
            ],
            'class'           => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'           => 'Input Group Large (Icon Left)',
            'helper_text'     => 'Spacious field for profile details.',
            'input_component' => 'input-group',
            'input_props'     => [
              'size'        => 'lg',
              'icon_name'   => 'user-line',
              'placeholder' => 'Full name',
            ],
            'class'           => 'space-y-2 md:col-span-2',
          ]); ?>
          <?php component('form/field', [
            'label'           => 'Input Group Large (Icon Right)',
            'helper_text'     => 'Use when trailing icon represents a control.',
            'input_component' => 'input-group',
            'input_props'     => [
              'size'          => 'lg',
              'icon_name'     => 'user-line',
              'icon_position' => 'right',
              'placeholder'   => 'Full name',
            ],
            'class'           => 'space-y-2 md:col-span-2',
          ]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Select Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use when users must choose from predefined options.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-3 md:grid-cols-2">
          <?php component('form/select', ['size' => 'sm', 'options' => [['label' => 'select-sm', 'value' => 'sm']]]); ?>
          <?php component('form/select', ['size' => 'md', 'options' => [['label' => 'select-md', 'value' => 'md']]]); ?>
          <?php component('form/select', ['size' => 'lg', 'class' => 'md:col-span-2', 'options' => [['label' => 'select-lg', 'value' => 'lg']]]); ?>
          <?php component('form/select', ['state' => 'positive', 'options' => [['label' => 'select-positive', 'value' => 'positive']]]); ?>
          <?php component('form/select', ['state' => 'negative', 'options' => [['label' => 'select-negative', 'value' => 'negative']]]); ?>
          <?php component('form/select', ['state' => 'disabled', 'disabled' => true, 'class' => 'md:col-span-2', 'options' => [['label' => 'select-disabled', 'value' => 'disabled']]]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Textarea Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for longer entries such as notes, descriptions, and context.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-3 md:grid-cols-2">
          <?php component('form/textarea', ['size' => 'sm', 'placeholder' => 'textarea-sm']); ?>
          <?php component('form/textarea', ['size' => 'md', 'placeholder' => 'textarea-md']); ?>
          <?php component('form/textarea', ['size' => 'lg', 'placeholder' => 'textarea-lg', 'class' => 'md:col-span-2']); ?>
          <?php component('form/textarea', ['state' => 'positive', 'placeholder' => 'textarea-positive']); ?>
          <?php component('form/textarea', ['state' => 'negative', 'placeholder' => 'textarea-negative']); ?>
          <?php component('form/textarea', ['state' => 'disabled', 'placeholder' => 'textarea-disabled', 'class' => 'md:col-span-2', 'disabled' => true]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Checkbox States</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for multi-select decisions and independent toggles.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="flex flex-wrap items-center gap-6">
          <?php component('form/checkbox', ['label' => 'checkbox']); ?>
          <?php component('form/checkbox', ['label' => 'checkbox:checked', 'checked' => true]); ?>
          <?php component('form/checkbox', ['label' => 'checkbox:disabled', 'disabled' => true]); ?>
          <?php component('form/checkbox', ['label' => 'checkbox:checked:disabled', 'checked' => true, 'disabled' => true]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Radio States</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for single-choice options within one decision group.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="flex flex-wrap items-center gap-6">
          <?php component('form/radio', ['name' => 'kit-radio-state', 'label' => 'radio']); ?>
          <?php component('form/radio', ['name' => 'kit-radio-state', 'label' => 'radio:checked', 'checked' => true]); ?>
          <?php component('form/radio', ['name' => 'kit-radio-disabled', 'label' => 'radio:disabled', 'disabled' => true]); ?>
          <?php component('form/radio', ['name' => 'kit-radio-disabled-checked', 'label' => 'radio:checked:disabled', 'checked' => true, 'disabled' => true]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Toggle States</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for immediate on/off settings and binary preferences.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="flex flex-wrap items-center gap-6">
          <?php component('form/forms-toggle'); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Field Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use helper text and state styling to guide validation and recovery.</p>
        <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-4 md:grid-cols-2">
          <?php component('form/field', [
            'label'       => 'Display name',
            'helper_text' => 'Shown on invoices and activity logs.',
            'state'       => 'default',
            'input_props' => [
              'type'        => 'text',
              'placeholder' => 'e.g., Aina Zulkifli',
            ],
            'class'       => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'       => 'Workspace ID',
            'helper_text' => 'Generated by the system. This value cannot be edited.',
            'state'       => 'disabled',
            'input_props' => [
              'type'  => 'text',
              'value' => 'bkp_29f8a2c1',
            ],
            'class'       => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'       => 'Recovery email',
            'helper_text' => 'Verified. We will use this email for account recovery.',
            'state'       => 'positive',
            'input_props' => [
              'type'  => 'email',
              'value' => 'ops@aurorastudio.my',
            ],
            'class'       => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'       => 'Billing email',
            'helper_text' => 'Enter a valid work email, for example finance@aurorastudio.my.',
            'state'       => 'negative',
            'input_props' => [
              'type'  => 'email',
              'value' => 'finance@aurorastudio',
            ],
            'class'       => 'space-y-2',
          ]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Rating Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use when feedback is captured on an ordered scale.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-4 md:grid-cols-2">
          <?php component('form/field', [
            'label'           => 'Session Rating',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'Tap a star to rate this session.',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'kit-rating-session',
              'name'      => 'kit-rating-session',
              'max'       => 5,
              'value'     => 0,
            ],
            'class'           => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'           => 'Disabled',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'Rating input is disabled.',
            'state'           => 'disabled',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'kit-rating-disabled',
              'name'      => 'kit-rating-disabled',
              'max'       => 5,
              'value'     => 3,
              'disabled'  => true,
            ],
            'class'           => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'           => 'Preselected Value',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'Current value: 3 out of 5.',
            'state'           => 'positive',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'kit-rating-preselected',
              'name'      => 'kit-rating-preselected',
              'max'       => 5,
              'value'     => 3,
            ],
            'class'           => 'space-y-2',
          ]); ?>
          <?php component('form/field', [
            'label'           => 'Info / Result',
            'label_tag'       => 'p',
            'label_for'       => '',
            'helper_text'     => 'Read-only rating display for result summaries. Current score: 4.0 / 5.',
            'state'           => 'info',
            'input_component' => 'rating',
            'input_props'     => [
              'id_prefix' => 'kit-rating-readonly',
              'name'      => 'kit-rating-readonly',
              'max'       => 5,
              'value'     => 4,
              'read_only' => true,
            ],
            'class'           => 'space-y-2',
          ]); ?>
        </div>
      </div>
    </div>

    <div>
      <h3 class="text-xl font-bold text-brand-900">Stepper Variants</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Use for quantity controls or bounded incremental values.</p>
      <div class="mt-4 rounded-md border border-dashed border-brand-300 bg-white p-5">
        <div class="grid gap-4 md:grid-cols-2">
          <?php component('form/forms-stepper'); ?>
        </div>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
