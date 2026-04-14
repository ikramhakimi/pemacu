<?php
/*
CSS Anatomy: buttons-primary

.btn.btn--primary.btn--sm
.btn.btn--primary.btn--md
.btn.btn--primary.btn--gradient.btn--md
.btn.btn--primary.btn--lg
*/
?>
<?php component('button', ['label' => 'Small', 'variant' => 'primary', 'size' => 'sm']); ?>
<?php component('button', ['label' => 'Medium', 'variant' => 'primary', 'size' => 'md']); ?>
<?php component('button', ['label' => 'Gradient', 'variant' => 'primary', 'size' => 'md', 'gradient' => true]); ?>
<?php component('button', ['label' => 'Large', 'variant' => 'primary', 'size' => 'lg']); ?>
<?php component('button', ['label' => 'Disabled', 'variant' => 'primary', 'size' => 'md', 'disabled' => true]); ?>
<?php component('button', ['label' => 'Loading', 'variant' => 'primary', 'size' => 'md', 'icon_name' => 'loader-4-line', 'icon_class' => 'animate-spin']); ?>
