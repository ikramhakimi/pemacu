<?php

declare(strict_types=1);

$default_response = isset($default_response) ? trim((string) $default_response) : '';
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="clarification-response-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="clarification-response-heading" class="text-lg font-semibold text-zinc-900">Response</h2>
    <p class="mt-1 text-sm text-zinc-600">Submit reply, request revision, or close this clarification.</p>
  </header>

  <form class="mt-4 space-y-4" action="#" method="post">
    <?php component('fields', [
      'label'       => 'Response Message',
      'helper_text' => 'Keep response specific to the requested document, credit, or evidence item.',
      'class'       => 'space-y-2',
      'control'     => [
        'component' => 'textarea',
        'props'     => [
          'name'        => 'clarification_response',
          'rows'        => 5,
          'value'       => $default_response,
          'placeholder' => 'Enter response details for consultant review.',
        ],
      ],
    ]); ?>

    <div>
      <p class="text-xs uppercase tracking-wide text-zinc-500">Attachment Upload</p>
      <div class="mt-2 rounded-md border border-dashed border-zinc-300 bg-zinc-50 p-4">
        <p class="text-sm text-zinc-700">Upload revised document or evidence file (placeholder UI).</p>
      </div>
    </div>

    <div class="flex flex-wrap gap-2">
      <?php component('button', ['label' => 'Submit Response', 'variant' => 'primary']); ?>
      <?php component('button', ['label' => 'Request Revision', 'variant' => 'default']); ?>
      <?php component('button', ['label' => 'Mark as Resolved', 'variant' => 'positive']); ?>
    </div>
  </form>
</section>
