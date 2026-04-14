<?php
declare(strict_types=1);

/**
 * Component: modal
 * Purpose: Demonstrate modal use cases with accessible dismiss patterns.
 * Anatomy:
 * - .modal
 *   - .modal__panel
 *     - .modal__header
 *     - .modal__body
 *     - .modal__actions
 * Data Contract:
 * - Trigger controls use `[data-modal-open][data-modal-target]`.
 * - Modal roots use `[data-modal]` and an `id`.
 * - Close controls use `[data-modal-close]`.
 */
?>
<div class="space-y-8">
  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Form Modal</h4>
    <div class="flex items-center gap-3">
      <button
        class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg border border-transparent bg-brand-900 px-[var(--ui-px-md)] font-medium text-white"
        type="button"
        aria-haspopup="dialog"
        aria-expanded="false"
        data-modal-open
        data-modal-target="modal-form"
      >
        Open Form Modal
      </button>
    </div>
    <div
      id="modal-form"
      class="modal fixed inset-0 z-50 hidden flex items-center justify-center bg-brand-900/70 p-4"
      role="dialog"
      aria-modal="true"
      aria-hidden="true"
      aria-labelledby="modal-form-title"
      data-modal
    >
      <div class="modal__panel w-full max-w-lg rounded-xl bg-white shadow-2xl">
        <div class="modal__header flex items-center justify-between border-b border-brand-200 px-5 py-4">
          <h5 id="modal-form-title" class="text-lg font-semibold text-brand-900">Create Project</h5>
          <button class="inline-flex h-8 w-8 items-center justify-center rounded-md text-brand-500 hover:bg-brand-100 hover:text-brand-900" type="button" aria-label="Close modal" data-modal-close>
            <?php icon('close-line', ['icon_size' => '20']); ?>
          </button>
        </div>
        <div class="modal__body space-y-4 px-5 py-4">
          <div class="space-y-1.5">
            <label class="text-sm font-medium text-brand-700" for="modal-form-name">Project Name</label>
            <input id="modal-form-name" class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" placeholder="Brand Refresh">
          </div>
          <div class="space-y-1.5">
            <label class="text-sm font-medium text-brand-700" for="modal-form-owner">Owner</label>
            <input id="modal-form-owner" class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500" type="text" placeholder="Alex Tan">
          </div>
        </div>
        <div class="modal__actions flex items-center justify-end gap-2 border-t border-brand-200 px-5 py-4">
          <button class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-brand-100 px-[var(--ui-px-md)] font-medium leading-[var(--ui-h-md)] text-brand-800" type="button" data-modal-close>Cancel</button>
          <button class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-brand-900 px-[var(--ui-px-md)] font-medium leading-[var(--ui-h-md)] text-white" type="button">Save Project</button>
        </div>
      </div>
    </div>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Delete Confirmation</h4>
    <div class="flex items-center gap-3">
      <button
        class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg border border-transparent bg-negative-600 px-[var(--ui-px-md)] font-medium text-white"
        type="button"
        aria-haspopup="dialog"
        aria-expanded="false"
        data-modal-open
        data-modal-target="modal-delete"
      >
        Delete Item
      </button>
    </div>
    <div
      id="modal-delete"
      class="modal fixed inset-0 z-50 hidden flex items-center justify-center bg-brand-900/70 p-4"
      role="dialog"
      aria-modal="true"
      aria-hidden="true"
      aria-labelledby="modal-delete-title"
      data-modal
    >
      <div class="modal__panel w-full max-w-md rounded-xl bg-white shadow-2xl">
        <div class="modal__header flex items-center justify-between border-b border-brand-200 px-5 py-4">
          <h5 id="modal-delete-title" class="text-lg font-semibold text-brand-900">Delete Confirmation</h5>
          <button class="inline-flex h-8 w-8 items-center justify-center rounded-md text-brand-500 hover:bg-brand-100 hover:text-brand-900" type="button" aria-label="Close modal" data-modal-close>
            <?php icon('close-line', ['icon_size' => '20']); ?>
          </button>
        </div>
        <div class="modal__body px-5 py-4">
          <p class="text-sm text-brand-700">This action cannot be undone. Are you sure you want to permanently delete this item?</p>
        </div>
        <div class="modal__actions flex items-center justify-end gap-2 border-t border-brand-200 px-5 py-4">
          <button class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-brand-100 px-[var(--ui-px-md)] font-medium leading-[var(--ui-h-md)] text-brand-800" type="button" data-modal-close>Cancel</button>
          <button class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-negative-600 px-[var(--ui-px-md)] font-medium leading-[var(--ui-h-md)] text-white" type="button">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Read-Only Details</h4>
    <div class="flex items-center gap-3">
      <a
        class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-brand-100 px-[var(--ui-px-md)] font-medium text-brand-900"
        href="#"
        aria-haspopup="dialog"
        aria-expanded="false"
        data-modal-open
        data-modal-target="modal-details"
      >
        View Details
      </a>
    </div>
    <div
      id="modal-details"
      class="modal fixed inset-0 z-50 hidden flex items-center justify-center bg-brand-900/70 p-4"
      role="dialog"
      aria-modal="true"
      aria-hidden="true"
      aria-labelledby="modal-details-title"
      data-modal
    >
      <div class="modal__panel w-full max-w-lg rounded-xl bg-white shadow-2xl">
        <div class="modal__header flex items-center justify-between border-b border-brand-200 px-5 py-4">
          <h5 id="modal-details-title" class="text-lg font-semibold text-brand-900">Order #INV-2049</h5>
          <button class="inline-flex h-8 w-8 items-center justify-center rounded-md text-brand-500 hover:bg-brand-100 hover:text-brand-900" type="button" aria-label="Close modal" data-modal-close>
            <?php icon('close-line', ['icon_size' => '20']); ?>
          </button>
        </div>
        <div class="modal__body space-y-3 px-5 py-4 text-sm text-brand-700">
          <p><span class="font-medium text-brand-900">Customer:</span> Nova Digital Sdn Bhd</p>
          <p><span class="font-medium text-brand-900">Status:</span> Processing</p>
          <p><span class="font-medium text-brand-900">Submitted:</span> 06 Apr 2026</p>
          <p><span class="font-medium text-brand-900">Total:</span> RM 4,800.00</p>
        </div>
        <div class="modal__actions flex items-center justify-end border-t border-brand-200 px-5 py-4">
          <button class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-brand-900 px-[var(--ui-px-md)] font-medium leading-[var(--ui-h-md)] text-white" type="button" data-modal-close>Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Multi-Step (Light)</h4>
    <div class="flex items-center gap-3">
      <button
        class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg border border-brand-200 bg-white px-[var(--ui-px-md)] font-medium text-brand-900"
        type="button"
        aria-haspopup="dialog"
        aria-expanded="false"
        data-modal-open
        data-modal-target="modal-multistep"
      >
        Start Setup
      </button>
    </div>
    <div
      id="modal-multistep"
      class="modal fixed inset-0 z-50 hidden flex items-center justify-center bg-brand-900/70 p-4"
      role="dialog"
      aria-modal="true"
      aria-hidden="true"
      aria-labelledby="modal-multistep-title"
      data-modal
    >
      <div class="modal__panel w-full max-w-2xl rounded-xl bg-white shadow-2xl">
        <div class="modal__header flex items-center justify-between border-b border-brand-200 px-5 py-4">
          <h5 id="modal-multistep-title" class="text-lg font-semibold text-brand-900">Workspace Setup</h5>
          <button class="inline-flex h-8 w-8 items-center justify-center rounded-md text-brand-500 hover:bg-brand-100 hover:text-brand-900" type="button" aria-label="Close modal" data-modal-close>
            <?php icon('close-line', ['icon_size' => '20']); ?>
          </button>
        </div>
        <div class="modal__body space-y-4 px-5 py-4">
          <div class="flex items-center gap-2">
            <span class="inline-flex h-7 min-w-7 items-center justify-center rounded-full bg-brand-900 px-2 text-xs font-semibold text-white">1</span>
            <span class="inline-flex h-7 min-w-7 items-center justify-center rounded-full bg-brand-200 px-2 text-xs font-semibold text-brand-700">2</span>
            <span class="inline-flex h-7 min-w-7 items-center justify-center rounded-full bg-brand-200 px-2 text-xs font-semibold text-brand-700">3</span>
          </div>
          <p class="text-sm text-brand-700">Step 1 of 3: Configure team profile and workspace visibility before inviting members.</p>
        </div>
        <div class="modal__actions flex items-center justify-between border-t border-brand-200 px-5 py-4">
          <button class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-brand-100 px-[var(--ui-px-md)] font-medium leading-[var(--ui-h-md)] text-brand-800" type="button" data-modal-close>Later</button>
          <div class="flex items-center gap-2">
            <button class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-brand-100 px-[var(--ui-px-md)] font-medium leading-[var(--ui-h-md)] text-brand-800" type="button">Back</button>
            <button class="inline-flex h-[var(--ui-h-md)] items-center justify-center rounded-lg bg-brand-900 px-[var(--ui-px-md)] font-medium leading-[var(--ui-h-md)] text-white" type="button">Next</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
