<?php
declare(strict_types=1);

/**
 * Component: buttons-icon-only
 * Purpose: Demonstrate icon-only button variants across button sizes.
 * Anatomy:
 * - .btn.btn--default
 *   - .icon
 * Data Contract:
 * - Static reference component for icon-only buttons.
 */
?>
<?php component('button', ['label' => 'Search small', 'aria_label' => 'Search small', 'variant' => 'default', 'size' => 'sm', 'icon_name' => 'search-line', 'icon_only' => true]); ?>
<?php component('button', ['label' => 'Search medium', 'aria_label' => 'Search medium', 'variant' => 'default', 'size' => 'md', 'icon_name' => 'search-line', 'icon_only' => true]); ?>
<?php component('button', ['label' => 'Search gradient medium', 'aria_label' => 'Search gradient medium', 'variant' => 'default', 'size' => 'md', 'gradient' => true, 'icon_name' => 'search-line', 'icon_only' => true]); ?>
<?php component('button', ['label' => 'Search large', 'aria_label' => 'Search large', 'variant' => 'default', 'size' => 'lg', 'icon_name' => 'search-line', 'icon_only' => true]); ?>
<?php component('button', ['label' => 'Search disabled', 'aria_label' => 'Search disabled', 'variant' => 'default', 'size' => 'md', 'icon_name' => 'search-line', 'icon_only' => true, 'disabled' => true]); ?>
