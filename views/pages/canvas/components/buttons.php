<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Buttons';
$page_current         = 'canvas-components';
$component_page_links = [
  ['href' => '/canvas/components', 'label' => 'Overview'],
  ['href' => '/canvas/components/buttons', 'label' => 'Buttons'],
  ['href' => '/canvas/components/headers', 'label' => 'Headers'],
];

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/buttons',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Buttons',
    'header_subtitle'        => 'Reference for action priority, intent, and state across product workflows.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-6" data-doc-tabs>
  <div class="inline-flex rounded-md bg-white p-1" role="tablist" aria-label="Buttons documentation sections">
    <button
      class="rounded-md px-4 py-2 text-sm font-medium text-brand-900"
      type="button"
      role="tab"
      aria-selected="true"
      aria-controls="buttons-specifications"
      id="tab-buttons-specifications"
      data-tab-trigger="specifications"
    >
      Specifications
    </button>
    <button
      class="rounded-md px-4 py-2 text-sm font-medium text-brand-600"
      type="button"
      role="tab"
      aria-selected="false"
      aria-controls="buttons-static-reference"
      id="tab-buttons-static-reference"
      data-tab-trigger="static-reference"
    >
      Static Reference
    </button>
  </div>

  <div
    class="space-y-8"
    role="tabpanel"
    id="buttons-specifications"
    aria-labelledby="tab-buttons-specifications"
    data-tab-panel="specifications"
  >
    <section class="space-y-3">
      <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
      <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
        <li>Write labels in sentence case.</li>
        <li>Start labels with clear verbs, such as Save, Continue, or Delete.</li>
        <li>Use one primary action per surface.</li>
        <li>Reserve positive and negative variants for state-specific actions.</li>
      </ul>
    </section>

    <section class="space-y-8">
      <div>
        <h3 class="text-xl font-bold text-brand-900">Default</h3>
        <p class="mt-2 max-w-3xl text-brand-600">Use for low-priority actions inside dense layouts.</p>
        <div class="mt-4 flex items-center gap-4 rounded-md bg-white p-5">
          <?php component('buttons-default'); ?>
        </div>
      </div>

      <div>
        <h3 class="text-xl font-bold text-brand-900">Primary</h3>
        <p class="mt-2 max-w-3xl text-brand-600">Use for the main action on the current screen.</p>
        <div class="mt-4 flex items-center gap-4 rounded-md bg-white p-5">
          <?php component('buttons-primary'); ?>
        </div>
      </div>

      <div>
        <h3 class="text-xl font-bold text-brand-900">Secondary</h3>
        <p class="mt-2 max-w-3xl text-brand-600">Use for supporting actions that sit next to the primary action.</p>
        <div class="mt-4 flex items-center gap-4 rounded-md bg-white p-5">
          <?php component('buttons-secondary'); ?>
        </div>
      </div>

      <div>
        <h3 class="text-xl font-bold text-brand-900">Positive</h3>
        <p class="mt-2 max-w-3xl text-brand-600">Use to confirm successful or safe completion actions.</p>
        <div class="mt-4 flex items-center gap-4 rounded-md bg-white p-5">
          <?php component('buttons-positive'); ?>
        </div>
      </div>

      <div>
        <h3 class="text-xl font-bold text-brand-900">Negative</h3>
        <p class="mt-2 max-w-3xl text-brand-600">Use only for destructive or irreversible actions.</p>
        <div class="mt-4 flex items-center gap-4 rounded-md bg-white p-5">
          <?php component('buttons-negative'); ?>
        </div>
      </div>
    </section>
  </div>

  <div
    class="hidden space-y-6"
    role="tabpanel"
    id="buttons-static-reference"
    aria-labelledby="tab-buttons-static-reference"
    data-tab-panel="static-reference"
  >
    <div class="rounded-md bg-white p-5">
      <h3 class="text-xl font-bold text-brand-900">Default</h3>
      <pre class="mt-4 overflow-x-auto rounded-md bg-brand-100 p-4 text-sm text-brand-800"><code>&lt;button class="btn btn--default btn--md inline-flex items-center justify-center rounded-lg border border-brand-300 bg-white h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-brand-800" type="button"&gt;
  Medium
&lt;/button&gt;</code></pre>
    </div>

    <div class="rounded-md bg-white p-5">
      <h3 class="text-xl font-bold text-brand-900">Primary</h3>
      <pre class="mt-4 overflow-x-auto rounded-md bg-brand-100 p-4 text-sm text-brand-800"><code>&lt;button class="btn btn--primary btn--md inline-flex items-center justify-center rounded-lg border border-transparent bg-primary-700 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-white" type="button"&gt;
  Medium
&lt;/button&gt;</code></pre>
    </div>

    <div class="rounded-md bg-white p-5">
      <h3 class="text-xl font-bold text-brand-900">Secondary</h3>
      <pre class="mt-4 overflow-x-auto rounded-md bg-brand-100 p-4 text-sm text-brand-800"><code>&lt;button class="btn btn--secondary btn--md inline-flex items-center justify-center rounded-lg border border-transparent bg-brand-100 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-brand-900" type="button"&gt;
  Medium
&lt;/button&gt;</code></pre>
    </div>

    <div class="rounded-md bg-white p-5">
      <h3 class="text-xl font-bold text-brand-900">Positive</h3>
      <pre class="mt-4 overflow-x-auto rounded-md bg-brand-100 p-4 text-sm text-brand-800"><code>&lt;button class="btn btn--positive btn--md inline-flex items-center justify-center rounded-lg border border-transparent bg-positive-600 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-white" type="button"&gt;
  Medium
&lt;/button&gt;</code></pre>
    </div>

    <div class="rounded-md bg-white p-5">
      <h3 class="text-xl font-bold text-brand-900">Negative</h3>
      <pre class="mt-4 overflow-x-auto rounded-md bg-brand-100 p-4 text-sm text-brand-800"><code>&lt;button class="btn btn--negative btn--md inline-flex items-center justify-center rounded-lg border border-transparent bg-negative-600 h-[var(--ui-h-md)] px-[var(--ui-px-md)] font-medium text-white" type="button"&gt;
  Medium
&lt;/button&gt;</code></pre>
    </div>
  </div>
</section>
<script>
  (() => {
    const tabs_root = document.querySelector('[data-doc-tabs]');

    if (!(tabs_root instanceof HTMLElement)) {
      return;
    }

    const tab_triggers = Array.from(tabs_root.querySelectorAll('[data-tab-trigger]'));
    const tab_panels   = Array.from(tabs_root.querySelectorAll('[data-tab-panel]'));

    const activate_tab = (target_key) => {
      tab_triggers.forEach((trigger_node) => {
        if (!(trigger_node instanceof HTMLButtonElement)) {
          return;
        }

        const is_active = trigger_node.dataset.tabTrigger === target_key;
        trigger_node.setAttribute('aria-selected', is_active ? 'true' : 'false');
        trigger_node.classList.toggle('text-brand-900', is_active);
        trigger_node.classList.toggle('bg-brand-100', is_active);
        trigger_node.classList.toggle('text-brand-600', !is_active);
      });

      tab_panels.forEach((panel_node) => {
        if (!(panel_node instanceof HTMLElement)) {
          return;
        }

        const is_active = panel_node.dataset.tabPanel === target_key;
        panel_node.classList.toggle('hidden', !is_active);
      });
    };

    tab_triggers.forEach((trigger_node) => {
      if (!(trigger_node instanceof HTMLButtonElement)) {
        return;
      }

      trigger_node.addEventListener('click', () => {
        activate_tab(trigger_node.dataset.tabTrigger || 'specifications');
      });
    });

    activate_tab('specifications');
  })();
</script>
<?php layout('canvas-end'); ?>
