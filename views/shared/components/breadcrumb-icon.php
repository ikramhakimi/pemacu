<?php
declare(strict_types=1);

/**
 * Component: breadcrumb-icon
 * Purpose: Render breadcrumb demo with label icons for richer navigation context.
 * Anatomy:
 * - .breadcrumb
 *   - .breadcrumb__list
 *     - .breadcrumb__item
 *       - .breadcrumb__link
 *       - .breadcrumb__separator
 * Data Contract:
 * - Static demo component for icon-assisted breadcrumb style.
 */
?>
<nav class="breadcrumb" aria-label="Breadcrumb">
  <ol class="breadcrumb__list flex flex-wrap items-center gap-2 text-sm">
    <li class="breadcrumb__item inline-flex items-center gap-2">
      <a class="breadcrumb__link inline-flex items-center gap-1.5 text-brand-600 hover:text-brand-900" href="#">
        <?php icon('home-6-line', ['icon_size' => '16']); ?>
        <span>Home</span>
      </a>
      <span class="breadcrumb__separator text-brand-400" aria-hidden="true">
        <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
      </span>
    </li>
    <li class="breadcrumb__item inline-flex items-center gap-2">
      <a class="breadcrumb__link inline-flex items-center gap-1.5 text-brand-600 hover:text-brand-900" href="#">
        <?php icon('box-1-line', ['icon_size' => '16']); ?>
        <span>Components</span>
      </a>
      <span class="breadcrumb__separator text-brand-400" aria-hidden="true">
        <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
      </span>
    </li>
    <li class="breadcrumb__item inline-flex items-center gap-2">
      <a class="breadcrumb__link inline-flex items-center gap-1.5 text-brand-600 hover:text-brand-900" href="#">
        <?php icon('function-line', ['icon_size' => '16']); ?>
        <span>Navigation</span>
      </a>
      <span class="breadcrumb__separator text-brand-400" aria-hidden="true">
        <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
      </span>
    </li>
    <li class="breadcrumb__item inline-flex items-center gap-1.5 text-brand-900" aria-current="page">
      <?php icon('map-pin-line', ['icon_size' => '16']); ?>
      <span>Breadcrumb</span>
    </li>
  </ol>
</nav>
