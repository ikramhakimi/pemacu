<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Toast';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/toast',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Toast',
    'header_subtitle'        => 'Reference for API-driven inline toast notifications with actions and dismiss affordances.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Toast Base
      </div>
      <div class="relative flex min-h-[260px] items-center justify-center overflow-hidden bg-background px-6 py-8">
        <?php component('toast', [
          'title'   => 'Saved successfully',
          'message' => 'Package pricing details were updated.',
          'tone'    => 'positive',
        ]); ?>
      </div>
    </div>
  </div>
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Toast Directions
      </div>
      <div class="relative min-h-[260px] overflow-hidden bg-background px-6 py-8">
        <div class="mx-auto w-full max-w-xl space-y-4" data-toast-demo>
          <div class="flex flex-wrap items-center gap-2">
            <?php component('button', [
              'label'      => 'Top',
              'variant'    => 'secondary',
              'size'       => 'md',
              'attributes' => [
                'data-toast-demo-trigger' => true,
                'data-direction'          => 'top',
              ],
            ]); ?>
            <?php component('button', [
              'label'      => 'Right',
              'variant'    => 'secondary',
              'size'       => 'md',
              'attributes' => [
                'data-toast-demo-trigger' => true,
                'data-direction'          => 'right',
              ],
            ]); ?>
            <?php component('button', [
              'label'      => 'Bottom',
              'variant'    => 'secondary',
              'size'       => 'md',
              'attributes' => [
                'data-toast-demo-trigger' => true,
                'data-direction'          => 'bottom',
              ],
            ]); ?>
            <?php component('button', [
              'label'      => 'Left',
              'variant'    => 'secondary',
              'size'       => 'md',
              'attributes' => [
                'data-toast-demo-trigger' => true,
                'data-direction'          => 'left',
              ],
            ]); ?>
          </div>

          <div class="relative h-[240px] overflow-hidden rounded-lg border border-dashed border-brand-300 bg-brand-50 p-4">
            <div class="absolute left-1/2 top-3 -translate-x-1/2" data-toast-demo-toast="top">
              <div data-toast-demo-panel class="pointer-events-none -translate-y-4 opacity-0 transition-all duration-300 ease-out">
                <?php component('toast', [
                  'title'   => 'Top toast',
                  'message' => 'This appears from the top direction.',
                  'tone'    => 'info',
                ]); ?>
              </div>
            </div>

            <div class="absolute right-3 top-1/2 -translate-y-1/2" data-toast-demo-toast="right">
              <div data-toast-demo-panel class="pointer-events-none translate-x-4 opacity-0 transition-all duration-300 ease-out">
                <?php component('toast', [
                  'title'   => 'Right toast',
                  'message' => 'This appears from the right direction.',
                  'tone'    => 'positive',
                ]); ?>
              </div>
            </div>

            <div class="absolute bottom-3 left-1/2 -translate-x-1/2" data-toast-demo-toast="bottom">
              <div data-toast-demo-panel class="pointer-events-none translate-y-4 opacity-0 transition-all duration-300 ease-out">
                <?php component('toast', [
                  'title'   => 'Bottom toast',
                  'message' => 'This appears from the bottom direction.',
                  'tone'    => 'warning',
                ]); ?>
              </div>
            </div>

            <div class="absolute left-3 top-1/2 -translate-y-1/2" data-toast-demo-toast="left">
              <div data-toast-demo-panel class="pointer-events-none -translate-x-4 opacity-0 transition-all duration-300 ease-out">
                <?php component('toast', [
                  'title'   => 'Left toast',
                  'message' => 'This appears from the left direction.',
                  'tone'    => 'negative',
                ]); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  (() => {
    const demos = Array.from(document.querySelectorAll('[data-toast-demo]'));

    demos.forEach((demoNode) => {
      const triggerNodes = Array.from(demoNode.querySelectorAll('[data-toast-demo-trigger]'));
      const toastNodes = Array.from(demoNode.querySelectorAll('[data-toast-demo-toast]'));
      let activeTimeoutId = null;

      const hideAll = () => {
        toastNodes.forEach((toastNode) => {
          const panelNode = toastNode.querySelector('[data-toast-demo-panel]');
          const direction = toastNode.getAttribute('data-toast-demo-toast');

          if (!(panelNode instanceof HTMLElement)) {
            return;
          }

          panelNode.classList.add('opacity-0', 'pointer-events-none');
          panelNode.classList.remove('opacity-100', 'translate-x-0', 'translate-y-0');

          if (direction === 'top') {
            panelNode.classList.add('-translate-y-4');
          } else if (direction === 'right') {
            panelNode.classList.add('translate-x-4');
          } else if (direction === 'bottom') {
            panelNode.classList.add('translate-y-4');
          } else if (direction === 'left') {
            panelNode.classList.add('-translate-x-4');
          }
        });
      };

      const showToast = (direction) => {
        hideAll();

        const targetToastNode = demoNode.querySelector('[data-toast-demo-toast="' + direction + '"]');
        if (!(targetToastNode instanceof HTMLElement)) {
          return;
        }

        const panelNode = targetToastNode.querySelector('[data-toast-demo-panel]');
        if (!(panelNode instanceof HTMLElement)) {
          return;
        }

        panelNode.classList.remove('opacity-0', 'pointer-events-none', '-translate-y-4', 'translate-x-4', 'translate-y-4', '-translate-x-4');
        panelNode.classList.add('opacity-100', 'translate-x-0', 'translate-y-0');

        if (activeTimeoutId !== null) {
          window.clearTimeout(activeTimeoutId);
        }

        activeTimeoutId = window.setTimeout(() => {
          hideAll();
          activeTimeoutId = null;
        }, 2800);
      };

      triggerNodes.forEach((triggerNode) => {
        triggerNode.addEventListener('click', () => {
          const direction = triggerNode.getAttribute('data-direction');
          if (!direction) {
            return;
          }

          showToast(direction);
        });
      });

      demoNode.addEventListener('click', (event) => {
        const target = event.target;
        if (!(target instanceof Element)) {
          return;
        }

        const dismissNode = target.closest('[data-toast-dismiss]');
        if (!(dismissNode instanceof HTMLElement)) {
          return;
        }

        hideAll();
      });
    });
  })();
</script>
<?php layout('canvas/layouts/canvas-end'); ?>
