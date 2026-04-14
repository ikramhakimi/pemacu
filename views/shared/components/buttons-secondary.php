<?php
/*
CSS Anatomy: buttons-secondary

.btn.btn--secondary.btn--sm
.btn.btn--secondary.btn--md
.btn.btn--secondary.btn--gradient.btn--md
.btn.btn--secondary.btn--lg
*/
?>
<?php component('button', ['label' => 'Small', 'variant' => 'secondary', 'size' => 'sm']); ?>
<?php component('button', ['label' => 'Medium', 'variant' => 'secondary', 'size' => 'md']); ?>
<?php component('button', ['label' => 'Gradient', 'variant' => 'secondary', 'size' => 'md', 'gradient' => true]); ?>
<?php component('button', ['label' => 'Large', 'variant' => 'secondary', 'size' => 'lg']); ?>
<?php component('button', ['label' => 'Disabled', 'variant' => 'secondary', 'size' => 'md', 'disabled' => true]); ?>
<?php component('button', ['label' => 'Loading', 'variant' => 'secondary', 'size' => 'md', 'icon_name' => 'loader-4-line', 'icon_class' => 'animate-spin']); ?>
