<?php
/*
CSS Anatomy: buttons-positive

.btn.btn--positive.btn--sm
.btn.btn--positive.btn--md
.btn.btn--positive.btn--gradient.btn--md
.btn.btn--positive.btn--lg
*/
?>
<?php component('button', ['label' => 'Small', 'variant' => 'positive', 'size' => 'sm']); ?>
<?php component('button', ['label' => 'Medium', 'variant' => 'positive', 'size' => 'md']); ?>
<?php component('button', ['label' => 'Gradient', 'variant' => 'positive', 'size' => 'md', 'gradient' => true]); ?>
<?php component('button', ['label' => 'Large', 'variant' => 'positive', 'size' => 'lg']); ?>
<?php component('button', ['label' => 'Disabled', 'variant' => 'positive', 'size' => 'md', 'disabled' => true]); ?>
<?php component('button', ['label' => 'Loading', 'variant' => 'positive', 'size' => 'md', 'icon_name' => 'loader-4-line', 'icon_class' => 'animate-spin']); ?>
