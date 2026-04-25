<?php

declare(strict_types=1);

$default_review_notes = isset($default_review_notes) ? trim((string) $default_review_notes) : '';
$default_missing_info = isset($default_missing_info) ? trim((string) $default_missing_info) : '';
?>
<section class="rounded-lg border border-zinc-200 bg-white p-5" aria-labelledby="evidence-review-form-heading">
  <header class="border-b border-zinc-200 pb-4">
    <h2 id="evidence-review-form-heading" class="text-lg font-semibold text-zinc-900">Checklist Review Form</h2>
    <p class="mt-1 text-sm text-zinc-600">Record checklist decisions and submit an evidence verification outcome.</p>
  </header>

  <form class="mt-4 space-y-4" action="#" method="post">
    <div class="grid gap-4 sm:grid-cols-2">
      <?php component('fields', [
        'label'       => 'Evidence Readability',
        'helper_text' => 'Confirm file is complete and readable.',
        'class'       => 'space-y-2',
        'control'     => [
          'component' => 'select',
          'props'     => [
            'name'          => 'evidence_readability',
            'selected_value' => 'pass',
            'options'       => [
              ['label' => 'Pass', 'value' => 'pass'],
              ['label' => 'Fail', 'value' => 'fail'],
              ['label' => 'Pending', 'value' => 'pending'],
              ['label' => 'Not Applicable', 'value' => 'not-applicable'],
            ],
          ],
        ],
      ]); ?>

      <?php component('fields', [
        'label'       => 'Correct Document Version',
        'helper_text' => 'Verify latest approved revision is attached.',
        'class'       => 'space-y-2',
        'control'     => [
          'component' => 'select',
          'props'     => [
            'name'          => 'correct_document_version',
            'selected_value' => 'pass',
            'options'       => [
              ['label' => 'Pass', 'value' => 'pass'],
              ['label' => 'Fail', 'value' => 'fail'],
              ['label' => 'Pending', 'value' => 'pending'],
              ['label' => 'Not Applicable', 'value' => 'not-applicable'],
            ],
          ],
        ],
      ]); ?>

      <?php component('fields', [
        'label'       => 'Supports Credit Requirement',
        'helper_text' => 'Confirm evidence substantiates targeted GBI credit claim.',
        'class'       => 'space-y-2',
        'control'     => [
          'component' => 'select',
          'props'     => [
            'name'          => 'supports_credit_requirement',
            'selected_value' => 'pending',
            'options'       => [
              ['label' => 'Pass', 'value' => 'pass'],
              ['label' => 'Fail', 'value' => 'fail'],
              ['label' => 'Pending', 'value' => 'pending'],
              ['label' => 'Not Applicable', 'value' => 'not-applicable'],
            ],
          ],
        ],
      ]); ?>

      <?php component('fields', [
        'label'       => 'Decision',
        'helper_text' => 'Set final evidence decision for this review cycle.',
        'class'       => 'space-y-2',
        'control'     => [
          'component' => 'select',
          'props'     => [
            'name'           => 'review_decision',
            'selected_value' => 'request-revision',
            'options'        => [
              ['label' => 'Mark as Verified', 'value' => 'mark-verified'],
              ['label' => 'Request Revision', 'value' => 'request-revision'],
              ['label' => 'Reject Evidence', 'value' => 'reject-evidence'],
              ['label' => 'Waive / Not Applicable', 'value' => 'waive-not-applicable'],
              ['label' => 'Link to Clarification', 'value' => 'link-clarification'],
            ],
          ],
        ],
      ]); ?>
    </div>

    <?php component('fields', [
      'label'       => 'Missing Information',
      'helper_text' => 'Clearly state missing data, attachments, or sign-offs required.',
      'class'       => 'space-y-2',
      'control'     => [
        'component' => 'textarea',
        'props'     => [
          'name'  => 'missing_information',
          'rows'  => 4,
          'value' => $default_missing_info,
        ],
      ],
    ]); ?>

    <?php component('fields', [
      'label'       => 'Reviewer Notes',
      'helper_text' => 'Document the rationale for decision and next action required.',
      'class'       => 'space-y-2',
      'control'     => [
        'component' => 'textarea',
        'props'     => [
          'name'  => 'reviewer_notes',
          'rows'  => 5,
          'value' => $default_review_notes,
        ],
      ],
    ]); ?>

    <div class="border-t border-zinc-200 pt-4">
      <p class="text-xs uppercase tracking-wide text-zinc-500">Decision Actions</p>
      <div class="mt-2 flex flex-wrap gap-2">
        <?php component('button', ['label' => 'Mark as Verified', 'variant' => 'positive', 'size' => 'sm']); ?>
        <?php component('button', ['label' => 'Request Revision', 'variant' => 'default', 'size' => 'sm']); ?>
        <?php component('button', ['label' => 'Reject Evidence', 'variant' => 'default', 'size' => 'sm']); ?>
        <?php component('button', ['label' => 'Waive / Not Applicable', 'variant' => 'default', 'size' => 'sm']); ?>
        <?php component('button', ['label' => 'Link to Clarification', 'variant' => 'default', 'size' => 'sm']); ?>
      </div>
    </div>

    <div class="flex flex-wrap gap-2 border-t border-zinc-200 pt-4">
      <?php component('button', ['label' => 'Save Review Draft', 'variant' => 'default']); ?>
      <?php component('button', ['label' => 'Submit Decision', 'variant' => 'primary']); ?>
    </div>
  </form>
</section>
