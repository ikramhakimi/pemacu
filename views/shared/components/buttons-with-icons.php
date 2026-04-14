<?php
declare(strict_types=1);

/**
 * Component: buttons-with-icons
 * Purpose: Demonstrate text buttons with leading and trailing icon placements.
 * Anatomy:
 * - .btn.btn--default
 *   - .icon
 *   - label text
 * Data Contract:
 * - Static reference component for left/right icon button patterns.
 */
?>
<?php component('button', ['label' => 'Create', 'variant' => 'default', 'size' => 'sm', 'icon_name' => 'add-line']); ?>
<?php component('button', ['label' => 'Create', 'variant' => 'default', 'size' => 'md', 'icon_name' => 'add-line']); ?>
<?php component('button', ['label' => 'Create', 'variant' => 'default', 'size' => 'md', 'gradient' => true, 'icon_name' => 'add-line']); ?>
<?php component('button', ['label' => 'Create', 'variant' => 'default', 'size' => 'lg', 'icon_name' => 'add-line']); ?>

<?php component('button', ['label' => 'Details', 'variant' => 'secondary', 'size' => 'sm', 'icon_name' => 'arrow-right-s-line', 'icon_position' => 'right']); ?>
<?php component('button', ['label' => 'Details', 'variant' => 'secondary', 'size' => 'md', 'icon_name' => 'arrow-right-s-line', 'icon_position' => 'right']); ?>
<?php component('button', ['label' => 'Details', 'variant' => 'secondary', 'size' => 'md', 'gradient' => true, 'icon_name' => 'arrow-right-s-line', 'icon_position' => 'right']); ?>
<?php component('button', ['label' => 'Details', 'variant' => 'secondary', 'size' => 'lg', 'icon_name' => 'arrow-right-s-line', 'icon_position' => 'right']); ?>
