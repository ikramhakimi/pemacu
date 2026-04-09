<?php
declare(strict_types=1);

/**
 * Component: breadcrumb-compact
 * Purpose: Render compact breadcrumb demo for dense headers and constrained spaces.
 * Anatomy:
 * - .breadcrumb.breadcrumb--sm
 *   - .breadcrumb__list
 *     - .breadcrumb__item
 *       - .breadcrumb__link
 *       - .breadcrumb__separator
 * Data Contract:
 * - Static demo component for small (`--sm`) breadcrumb style.
 */
?>
<nav class="breadcrumb breadcrumb--sm" aria-label="Breadcrumb">
  <ol class="breadcrumb__list flex flex-wrap items-center gap-1.5 text-xs">
    <li class="breadcrumb__item inline-flex items-center gap-1.5">
      <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="#">Home</a>
      <span class="breadcrumb__separator text-brand-400" aria-hidden="true">/</span>
    </li>
    <li class="breadcrumb__item inline-flex items-center gap-1.5">
      <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="#">Dashboards</a>
      <span class="breadcrumb__separator text-brand-400" aria-hidden="true">/</span>
    </li>
    <li class="breadcrumb__item text-brand-900" aria-current="page">Analytics</li>
  </ol>
</nav>
