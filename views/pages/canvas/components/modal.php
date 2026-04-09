<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Modal';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/modal',
]);
?>
<section class="p-0">
  <?php component('header-page', [
    'header_topic'           => 'Components',
    'header_title'           => 'Modal',
    'header_subtitle'        => 'Reference for overlay dialogs used in focus tasks, confirmations, and guided flows.',
    'header_container_class' => 'w-full',
  ]); ?>
</section>

<section class="space-y-8">
  <section class="space-y-3">
    <h2 class="text-xl font-bold text-brand-900">Usage Rules</h2>
    <ul class="list-disc space-y-1 pl-5 text-base text-brand-700">
      <li>Use modals for focused tasks that should not navigate away from the current page.</li>
      <li>Always provide a clear dismiss path: close icon, cancel action, and backdrop click.</li>
      <li>Keep modal content concise and task-specific to avoid cognitive overload.</li>
      <li>Use destructive styling only for high-risk actions such as permanent deletion.</li>
    </ul>
  </section>

  <section class="space-y-8">
    <div>
      <h3 class="text-xl font-bold text-brand-900">Use Cases</h3>
      <p class="mt-2 max-w-3xl text-brand-600">Examples include forms, confirmations, read-only details, and lightweight multi-step workflows.</p>
      <div class="mt-4 rounded-md bg-white p-5">
        <?php component('modal'); ?>
      </div>
    </div>
  </section>
</section>
<?php layout('canvas-end'); ?>
