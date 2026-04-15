<?php
declare(strict_types=1);

/**
 * Component: breadcrumb-slash
 * Purpose: Render breadcrumb demo with slash separators for standard hierarchy paths.
 * Anatomy:
 * - .breadcrumb
 *   - .breadcrumb__list
 *     - .breadcrumb__item
 *       - .breadcrumb__link
 *       - .breadcrumb__separator
 * Data Contract:
 * - Static demo component for slash separator breadcrumb style.
 */
?>
<nav class="breadcrumb" aria-label="Breadcrumb">
  <ol class="breadcrumb__list flex flex-wrap items-center gap-2 text-sm">
    <li class="breadcrumb__item inline-flex items-center gap-2">
      <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="#">Home</a>
      <span class="breadcrumb__separator text-brand-400" aria-hidden="true">/</span>
    </li>
    <li class="breadcrumb__item inline-flex items-center gap-2">
      <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="#">Library</a>
      <span class="breadcrumb__separator text-brand-400" aria-hidden="true">/</span>
    </li>
    <li class="breadcrumb__item inline-flex items-center gap-2">
      <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="#">Components</a>
      <span class="breadcrumb__separator text-brand-400" aria-hidden="true">/</span>
    </li>
    <li class="breadcrumb__item text-brand-900" aria-current="page">Breadcrumb</li>
  </ol>
</nav>
