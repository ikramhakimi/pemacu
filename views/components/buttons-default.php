<?php
/*
CSS Anatomy: buttons-default

.btn.btn--default.btn--sm
.btn.btn--default.btn--md
.btn.btn--default.btn--gradient.btn--md
.btn.btn--default.btn--lg
*/
?>
<?php component('button', ['label' => 'Small', 'variant' => 'default', 'size' => 'sm']); ?>
<?php component('button', ['label' => 'Medium', 'variant' => 'default', 'size' => 'md']); ?>
<?php component('button', ['label' => 'Gradient', 'variant' => 'default', 'size' => 'md', 'gradient' => true]); ?>
<?php component('button', ['label' => 'Large', 'variant' => 'default', 'size' => 'lg']); ?>
<?php component('button', ['label' => 'Disabled', 'variant' => 'default', 'size' => 'md', 'disabled' => true]); ?>
<?php component('button', ['label' => 'Loading', 'variant' => 'default', 'size' => 'md', 'icon_name' => 'loader-4-line', 'icon_class' => 'animate-spin']); ?>
