<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Button';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/button',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Button',
    'header_subtitle'        => 'Reference for SaaS product actions across creation, navigation, confirmation, and destructive flows.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button Base
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-2xl flex-wrap items-center justify-center gap-4">
          <?php component('button', [
            'label'   => 'Default',
            'variant' => 'default',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Primary',
            'variant' => 'primary',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Secondary',
            'variant' => 'secondary',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Positive',
            'variant' => 'positive',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Negative',
            'variant' => 'negative',
            'size'    => 'md',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button A
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-2xl flex-wrap items-center justify-center gap-4">
          <?php component('button', [
            'label'   => 'Small',
            'variant' => 'default',
            'size'    => 'sm',
          ]); ?>

          <?php component('button', [
            'label'   => 'Medium',
            'variant' => 'default',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Large',
            'variant' => 'default',
            'size'    => 'lg',
          ]); ?>

          <?php component('button', [
            'label'   => 'Extra Large',
            'variant' => 'default',
            'size'    => 'xl',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button B
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-2xl flex-wrap items-center justify-center gap-4">
          <?php component('button', [
            'label'   => 'Small',
            'variant' => 'primary',
            'size'    => 'sm',
          ]); ?>

          <?php component('button', [
            'label'   => 'Medium',
            'variant' => 'primary',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Large',
            'variant' => 'primary',
            'size'    => 'lg',
          ]); ?>

          <?php component('button', [
            'label'   => 'Extra Large',
            'variant' => 'primary',
            'size'    => 'xl',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button C
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-2xl flex-wrap items-center justify-center gap-4">
          <?php component('button', [
            'label'   => 'Small',
            'variant' => 'secondary',
            'size'    => 'sm',
          ]); ?>

          <?php component('button', [
            'label'   => 'Medium',
            'variant' => 'secondary',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Large',
            'variant' => 'secondary',
            'size'    => 'lg',
          ]); ?>

          <?php component('button', [
            'label'   => 'Extra Large',
            'variant' => 'secondary',
            'size'    => 'xl',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button D
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-2xl flex-wrap items-center justify-center gap-4">
          <?php component('button', [
            'label'   => 'Small',
            'variant' => 'positive',
            'size'    => 'sm',
          ]); ?>

          <?php component('button', [
            'label'   => 'Medium',
            'variant' => 'positive',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Large',
            'variant' => 'positive',
            'size'    => 'lg',
          ]); ?>

          <?php component('button', [
            'label'   => 'Extra Large',
            'variant' => 'positive',
            'size'    => 'xl',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button E
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-2xl flex-wrap items-center justify-center gap-4">
          <?php component('button', [
            'label'   => 'Small',
            'variant' => 'negative',
            'size'    => 'sm',
          ]); ?>

          <?php component('button', [
            'label'   => 'Medium',
            'variant' => 'negative',
            'size'    => 'md',
          ]); ?>

          <?php component('button', [
            'label'   => 'Large',
            'variant' => 'negative',
            'size'    => 'lg',
          ]); ?>

          <?php component('button', [
            'label'   => 'Extra Large',
            'variant' => 'negative',
            'size'    => 'xl',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button F
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-5xl flex-col gap-5">
          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'sm', 'icon' => ['name' => 'search-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'md', 'icon' => ['name' => 'mail-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'lg', 'icon' => ['name' => 'calendar-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'xl', 'icon' => ['name' => 'download-2-line']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'sm', 'icon' => ['name' => 'user-add-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'md', 'icon' => ['name' => 'global-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'lg', 'icon' => ['name' => 'message-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'xl', 'icon' => ['name' => 'arrow-right-line']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'sm', 'icon' => ['name' => 'settings-3-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'md', 'icon' => ['name' => 'bar-chart-box-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'lg', 'icon' => ['name' => 'phone-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'xl', 'icon' => ['name' => 'arrow-left-line']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'sm', 'icon' => ['name' => 'check-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'md', 'icon' => ['name' => 'checkbox-circle-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'lg', 'icon' => ['name' => 'road-map-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'xl', 'icon' => ['name' => 'time-line']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'sm', 'icon' => ['name' => 'close-circle-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'md', 'icon' => ['name' => 'alert-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'lg', 'icon' => ['name' => 'subtract-line']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'xl', 'icon' => ['name' => 'recycle-line']]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button G
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-5xl flex-col gap-5">
          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'sm', 'icon' => ['name' => 'search-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'md', 'icon' => ['name' => 'mail-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'lg', 'icon' => ['name' => 'calendar-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'xl', 'icon' => ['name' => 'download-2-line', 'position' => 'right']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'sm', 'icon' => ['name' => 'user-add-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'md', 'icon' => ['name' => 'global-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'lg', 'icon' => ['name' => 'message-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'xl', 'icon' => ['name' => 'arrow-right-line', 'position' => 'right']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'sm', 'icon' => ['name' => 'settings-3-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'md', 'icon' => ['name' => 'bar-chart-box-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'lg', 'icon' => ['name' => 'phone-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'xl', 'icon' => ['name' => 'arrow-left-line', 'position' => 'right']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'sm', 'icon' => ['name' => 'check-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'md', 'icon' => ['name' => 'checkbox-circle-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'lg', 'icon' => ['name' => 'road-map-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'xl', 'icon' => ['name' => 'time-line', 'position' => 'right']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'sm', 'icon' => ['name' => 'close-circle-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'md', 'icon' => ['name' => 'alert-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'lg', 'icon' => ['name' => 'subtract-line', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'xl', 'icon' => ['name' => 'recycle-line', 'position' => 'right']]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button I
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-5xl flex-col gap-5">
          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin']]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button J
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-5xl flex-col gap-5">
          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'md', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line', 'class' => 'animate-spin', 'position' => 'right']]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button K
      </div>
      <div class="relative flex min-h-[320px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-5xl flex-col gap-5">
          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'md', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'default', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'md', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'primary', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'md', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'secondary', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'md', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'positive', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
          </div>

          <div class="flex flex-wrap items-center justify-center gap-3">
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'sm', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'md', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'lg', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
            <?php component('button', ['label' => 'Button', 'variant' => 'negative', 'size' => 'xl', 'icon' => ['name' => 'loader-4-line'], 'loading_center' => true]); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Button L (Gradient Alternative)
      </div>
      <div class="relative flex min-h-[200px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <div class="flex w-full max-w-2xl flex-wrap items-center justify-center gap-4">
          <?php component('button', [
            'label'   => 'Default',
            'variant' => 'default',
            'size'    => 'md',
            'surface' => 'gradient',
          ]); ?>

          <?php component('button', [
            'label'   => 'Primary',
            'variant' => 'primary',
            'size'    => 'md',
            'surface' => 'gradient',
          ]); ?>

          <?php component('button', [
            'label'   => 'Secondary',
            'variant' => 'secondary',
            'size'    => 'md',
            'surface' => 'gradient',
          ]); ?>

          <?php component('button', [
            'label'   => 'Positive',
            'variant' => 'positive',
            'size'    => 'md',
            'surface' => 'gradient',
          ]); ?>

          <?php component('button', [
            'label'   => 'Negative',
            'variant' => 'negative',
            'size'    => 'md',
            'surface' => 'gradient',
          ]); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
