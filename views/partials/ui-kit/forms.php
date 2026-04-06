<?php

declare(strict_types=1);

$section_header_id          = 'forms';
$section_header_eyebrow     = 'Components';
$section_header_title       = 'Forms';
$section_header_description = 'Field controls with realistic labels, helper messaging, validation, and option inputs.';
require __DIR__ . '/section-header.php';
?>
<div class="ui-kit-preview mt-4 rounded-2xl border border-brand-200 bg-white p-5 shadow-sm sm:p-6">
  <form class="grid gap-4 md:grid-cols-2" action="#" method="post">
    <div class="space-y-2">
      <label class="text-sm font-medium text-brand-900" for="ui-form-name">Name</label>
      <input
        id="ui-form-name"
        class="block w-full rounded-lg border border-brand-300 bg-white px-4 py-3 text-sm text-brand-900 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-200"
        type="text"
        name="name"
        placeholder="Aina Rahman"
      >
      <p class="text-xs text-brand-500">Used in project proposals and invoices.</p>
    </div>

    <div class="space-y-2">
      <label class="text-sm font-medium text-brand-900" for="ui-form-email">Email</label>
      <input
        id="ui-form-email"
        class="block w-full rounded-lg border border-brand-300 bg-white px-4 py-3 text-sm text-brand-900 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-200"
        type="email"
        name="email"
        placeholder="you@company.com"
      >
      <p class="text-xs text-brand-500">Primary contact for updates and delivery links.</p>
    </div>

    <div class="space-y-2">
      <label class="text-sm font-medium text-brand-900" for="ui-form-service">Service</label>
      <select
        id="ui-form-service"
        class="block w-full rounded-lg border border-brand-300 bg-white px-4 py-3 text-sm text-brand-900 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-200"
        name="service"
      >
        <option value="">Select one</option>
        <option value="event">Event Coverage</option>
        <option value="brand">Brand Portraits</option>
        <option value="product">Product Photography</option>
      </select>
    </div>

    <div class="space-y-2">
      <label class="text-sm font-medium text-brand-900" for="ui-form-budget">Estimated budget</label>
      <input
        id="ui-form-budget"
        class="block w-full rounded-lg border border-red-500 bg-white px-4 py-3 text-sm text-brand-900 focus:border-red-500 focus:outline-none focus:ring-2 focus:ring-red-100"
        type="text"
        name="budget"
        placeholder="RM 1,500"
        aria-invalid="true"
        aria-describedby="ui-form-budget-error"
      >
      <p id="ui-form-budget-error" class="text-xs text-red-600">Budget range is required for accurate quotes.</p>
    </div>

    <div class="space-y-2 md:col-span-2">
      <label class="text-sm font-medium text-brand-900" for="ui-form-notes">Project details</label>
      <textarea
        id="ui-form-notes"
        class="block w-full rounded-lg border border-brand-300 bg-white px-4 py-3 text-sm text-brand-900 focus:border-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-200"
        name="notes"
        rows="4"
        placeholder="Share goals, timeline, and expected deliverables"
      ></textarea>
    </div>

    <fieldset class="space-y-2">
      <legend class="text-sm font-medium text-brand-900">Add-ons</legend>
      <label class="inline-flex items-center gap-2 text-sm text-brand-700">
        <input class="h-4 w-4 rounded border-brand-300 text-brand-900" type="checkbox" name="addons[]" value="retouching" checked>
        Advanced retouching
      </label>
      <label class="inline-flex items-center gap-2 text-sm text-brand-700">
        <input class="h-4 w-4 rounded border-brand-300 text-brand-900" type="checkbox" name="addons[]" value="rush">
        Rush delivery
      </label>
    </fieldset>

    <fieldset class="space-y-2">
      <legend class="text-sm font-medium text-brand-900">Preferred contact</legend>
      <label class="inline-flex items-center gap-2 text-sm text-brand-700">
        <input class="h-4 w-4 border-brand-300 text-brand-900" type="radio" name="contact" value="email" checked>
        Email
      </label>
      <label class="inline-flex items-center gap-2 text-sm text-brand-700">
        <input class="h-4 w-4 border-brand-300 text-brand-900" type="radio" name="contact" value="phone">
        Phone
      </label>
    </fieldset>

    <div class="md:col-span-2">
      <label class="inline-flex items-center gap-3 text-sm text-brand-700">
        <span class="relative inline-flex h-6 w-11 items-center">
          <input type="checkbox" class="peer sr-only" checked>
          <span class="absolute inset-0 rounded-full bg-brand-300 transition peer-checked:bg-brand-900"></span>
          <span class="absolute left-0.5 h-5 w-5 rounded-full bg-white transition peer-checked:translate-x-5"></span>
        </span>
        Enable update notifications
      </label>
    </div>
  </form>
</div>
