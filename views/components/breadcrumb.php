<?php
declare(strict_types=1);

/**
 * Component: breadcrumb
 * Purpose: Demonstrate breadcrumb separator styles and compact sizing for navigation context.
 * Anatomy:
 * - .breadcrumb
 *   - .breadcrumb__list
 *     - .breadcrumb__item
 *       - .breadcrumb__link
 *       - .breadcrumb__separator
 * - .breadcrumb--sm
 * Data Contract:
 * - Static demo component with slash, chevron, icon-assisted, and compact breadcrumb variants.
 * - Current page crumb is rendered as non-link text with `aria-current="page"`.
 */
?>
<div class="space-y-8">
  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Slash Separator</h4>
    <p class="text-sm text-brand-600">
      Use for simple content hierarchies where a lightweight divider keeps the path easy to scan.
    </p>
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
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Chevron Separator (SVG)</h4>
    <p class="text-sm text-brand-600">
      Use when you want stronger directional cues between levels, especially in product and docs flows.
    </p>
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <ol class="breadcrumb__list flex flex-wrap items-center gap-2 text-sm">
        <li class="breadcrumb__item inline-flex items-center gap-2">
          <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="#">Home</a>
          <span class="breadcrumb__separator text-brand-400" aria-hidden="true">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        </li>
        <li class="breadcrumb__item inline-flex items-center gap-2">
          <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="#">Library</a>
          <span class="breadcrumb__separator text-brand-400" aria-hidden="true">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        </li>
        <li class="breadcrumb__item inline-flex items-center gap-2">
          <a class="breadcrumb__link text-brand-600 hover:text-brand-900" href="#">Components</a>
          <span class="breadcrumb__separator text-brand-400" aria-hidden="true">
            <?php icon('arrow-right-s-line', ['icon_size' => '16']); ?>
          </span>
        </li>
        <li class="breadcrumb__item text-brand-900" aria-current="page">Breadcrumb</li>
      </ol>
    </nav>
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">With Icon</h4>
    <p class="text-sm text-brand-600">
      Use to reinforce section meaning with familiar symbols in navigation-heavy experiences.
    </p>
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
  </div>

  <div class="space-y-3">
    <h4 class="text-base font-semibold text-brand-900">Compact (`--sm`)</h4>
    <p class="text-sm text-brand-600">
      Use in tight spaces like toolbars, table headers, and nested utility panels.
    </p>
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
  </div>
</div>
