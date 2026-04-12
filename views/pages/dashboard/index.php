<?php

declare(strict_types=1);

$page_title   = 'Dashboard';
$page_current = 'dashboard';

layout('dashboard-start', [
  'page_title'   => $page_title,
  'page_current' => $page_current,
]);
?>
<article class="app-article">
    <header class="flex flex-col gap-4 border-b border-brand-200 pb-6 md:flex-row md:items-end md:justify-between">
      <div>
        <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Overview</p>
        <h1 class="mt-2 text-3xl font-semibold leading-tight text-brand-900">Dashboard</h1>
        <p class="mt-2 max-w-2xl text-sm text-brand-600">
          Monitor bookings, revenue, and recent updates for your studio in one place.
        </p>
      </div>
      <div class="flex gap-3">
        <?php component('button', [
          'label'   => 'New Booking',
          'href'    => path('/package-book-call'),
          'variant' => 'primary',
          'size'    => 'md',
        ]); ?>
        <?php component('button', [
          'label'   => 'View Packages',
          'href'    => path('/package'),
          'variant' => 'secondary',
          'size'    => 'md',
        ]); ?>
      </div>
    </header>

    <section class="mt-8" aria-labelledby="dashboard-kpi-heading">
      <h2 id="dashboard-kpi-heading" class="sr-only">Key metrics</h2>
      <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        <article class="rounded-lg border border-brand-200 bg-white p-5">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Today Bookings</p>
          <p class="mt-3 text-2xl font-semibold text-brand-900">12</p>
          <p class="mt-1 text-sm text-positive-700">+20% from yesterday</p>
        </article>
        <article class="rounded-lg border border-brand-200 bg-white p-5">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Pending Sessions</p>
          <p class="mt-3 text-2xl font-semibold text-brand-900">8</p>
          <p class="mt-1 text-sm text-brand-600">Requires confirmation</p>
        </article>
        <article class="rounded-lg border border-brand-200 bg-white p-5">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Monthly Revenue</p>
          <p class="mt-3 text-2xl font-semibold text-brand-900">$14,280</p>
          <p class="mt-1 text-sm text-positive-700">+9% from last month</p>
        </article>
        <article class="rounded-lg border border-brand-200 bg-white p-5">
          <p class="text-xs font-semibold uppercase tracking-wide text-brand-500">Client Satisfaction</p>
          <p class="mt-3 text-2xl font-semibold text-brand-900">4.9/5</p>
          <p class="mt-1 text-sm text-brand-600">Based on 96 reviews</p>
        </article>
      </div>
    </section>

    <section class="mt-8 grid gap-4 lg:grid-cols-3" aria-labelledby="dashboard-details-heading">
      <h2 id="dashboard-details-heading" class="sr-only">Dashboard details</h2>

      <article class="rounded-lg border border-brand-200 bg-white p-6 lg:col-span-2">
        <header class="flex items-center justify-between">
          <h3 class="text-lg font-semibold text-brand-900">Recent Activity</h3>
          <a class="text-sm font-medium text-brand-700 hover:text-brand-900" href="<?= e(path('/portfolio')); ?>">
            View all
          </a>
        </header>
        <ul class="mt-4 space-y-4" aria-label="Recent activity feed">
          <li class="flex items-start justify-between gap-4 border-b border-dashed border-brand-200 pb-4">
            <div>
              <p class="font-medium text-brand-900">Booking confirmed for Sarah & Amir</p>
              <p class="mt-1 text-sm text-brand-600">Engagement session · Apr 15, 2026 at 3:00 PM</p>
            </div>
            <span class="text-xs font-medium text-brand-500">2m ago</span>
          </li>
          <li class="flex items-start justify-between gap-4 border-b border-dashed border-brand-200 pb-4">
            <div>
              <p class="font-medium text-brand-900">Invoice paid: Editorial Portrait Package</p>
              <p class="mt-1 text-sm text-brand-600">Client: Nova Atelier · $1,800</p>
            </div>
            <span class="text-xs font-medium text-brand-500">18m ago</span>
          </li>
          <li class="flex items-start justify-between gap-4">
            <div>
              <p class="font-medium text-brand-900">New inquiry from company website</p>
              <p class="mt-1 text-sm text-brand-600">Brand shoot request for May 2026</p>
            </div>
            <span class="text-xs font-medium text-brand-500">1h ago</span>
          </li>
        </ul>
      </article>

      <article class="rounded-lg border border-brand-200 bg-white p-6">
        <h3 class="text-lg font-semibold text-brand-900">Upcoming Tasks</h3>
        <ul class="mt-4 space-y-3" aria-label="Upcoming tasks list">
          <li class="rounded-md bg-brand-50 p-3">
            <p class="font-medium text-brand-900">Finalize shot list</p>
            <p class="mt-1 text-sm text-brand-600">Wedding session · Apr 16, 2026</p>
          </li>
          <li class="rounded-md bg-brand-50 p-3">
            <p class="font-medium text-brand-900">Send quotation follow-up</p>
            <p class="mt-1 text-sm text-brand-600">Corporate campaign · Due today</p>
          </li>
          <li class="rounded-md bg-brand-50 p-3">
            <p class="font-medium text-brand-900">Review photo edits</p>
            <p class="mt-1 text-sm text-brand-600">Lifestyle portrait batch · 48 photos</p>
          </li>
        </ul>
      </article>
    </section>
</article>
<?php layout('dashboard-end'); ?>
