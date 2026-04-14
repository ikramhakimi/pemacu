<?php
/*
CSS Anatomy: buttons-negative

.btn.btn--negative.btn--sm
.btn.btn--negative.btn--md
.btn.btn--negative.btn--gradient.btn--md
.btn.btn--negative.btn--lg
*/
?>
<?php component('button', ['label' => 'Small', 'variant' => 'negative', 'size' => 'sm']); ?>
<?php component('button', ['label' => 'Medium', 'variant' => 'negative', 'size' => 'md']); ?>
<?php component('button', ['label' => 'Gradient', 'variant' => 'negative', 'size' => 'md', 'gradient' => true]); ?>
<?php component('button', ['label' => 'Large', 'variant' => 'negative', 'size' => 'lg']); ?>
<?php component('button', ['label' => 'Disabled', 'variant' => 'negative', 'size' => 'md', 'disabled' => true]); ?>
<?php component('button', ['label' => 'Loading', 'variant' => 'negative', 'size' => 'md', 'icon_name' => 'loader-4-line', 'icon_class' => 'animate-spin']); ?>
