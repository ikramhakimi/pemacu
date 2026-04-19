<?php

declare(strict_types=1);

$page_title           = 'Canvas Components - Modal';
$page_current         = 'canvas-components';
$component_page_links = canvas_links('components');

$render_button_html = static function (array $button_options): string {
  ob_start();
  component('button', $button_options);
  return (string) ob_get_clean();
};

$upgrade_cancel_button = $render_button_html([
  'label'      => 'Maybe Later',
  'variant'    => 'secondary',
  'size'       => 'md',
  'gradient'   => true,
  'attributes' => [
    'data-modal-close' => true,
  ],
]);
$upgrade_confirm_button = $render_button_html([
  'label'   => 'Upgrade to Growth',
  'variant' => 'default',
  'size'    => 'md',
  'gradient' => true,
]);

$upgrade_plan_body_html = static function (): void {
  ?>
  <div class="space-y-3">
    <p class="text-sm text-brand-700">Your current Starter plan is reaching its monthly event limit.</p>
    <ul class="list-disc space-y-1 pl-5 text-sm text-brand-700">
      <li>Unlimited workflow automations</li>
      <li>Team role management</li>
      <li>Priority analytics sync</li>
    </ul>
  </div>
  <?php
};

$invite_cancel_button = $render_button_html([
  'label'      => 'Cancel',
  'variant'    => 'secondary',
  'size'       => 'md',
  'gradient'   => true,
  'attributes' => [
    'data-modal-close' => true,
  ],
]);
$invite_send_button = $render_button_html([
  'label'   => 'Send Invite',
  'variant' => 'default',
  'size'    => 'md',
  'gradient' => true,
]);

$invite_member_body_html = static function (): void {
  ?>
  <div class="space-y-4">
    <div class="space-y-1.5">
      <label class="text-sm font-medium text-brand-700" for="modal-invite-email">Work email</label>
      <input
        id="modal-invite-email"
        class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
        type="email"
        placeholder="teammate@northlane.io"
      >
    </div>
    <div class="space-y-1.5">
      <label class="text-sm font-medium text-brand-700" for="modal-invite-role">Role</label>
      <select
        id="modal-invite-role"
        class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500"
      >
        <option>Editor</option>
        <option>Admin</option>
        <option>Viewer</option>
      </select>
    </div>
  </div>
  <?php
};

$invite_member_body_dialog_html = static function (): void {
  ?>
  <div class="space-y-4">
    <div class="space-y-1.5">
      <label class="text-sm font-medium text-brand-700" for="modal-invite-email-dialog">Work email</label>
      <input
        id="modal-invite-email-dialog"
        class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
        type="email"
        placeholder="teammate@northlane.io"
      >
    </div>
    <div class="space-y-1.5">
      <label class="text-sm font-medium text-brand-700" for="modal-invite-role-dialog">Role</label>
      <select
        id="modal-invite-role-dialog"
        class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset focus:outline-none focus:ring-2 focus:ring-brand-500"
      >
        <option>Editor</option>
        <option>Admin</option>
        <option>Viewer</option>
      </select>
    </div>
  </div>
  <?php
};

$release_notes_close_button = $render_button_html([
  'label'      => 'Close',
  'variant'    => 'secondary',
  'size'       => 'md',
  'gradient'   => true,
  'attributes' => [
    'data-modal-close' => true,
  ],
]);
$release_notes_acknowledge_button = $render_button_html([
  'label'   => 'Acknowledge Update',
  'variant' => 'default',
  'size'    => 'md',
  'gradient' => true,
]);

$blog_post_cancel_button = $render_button_html([
  'label'      => 'Cancel',
  'variant'    => 'secondary',
  'size'       => 'md',
  'gradient'   => true,
  'class'      => 'w-full',
  'attributes' => [
    'data-modal-close' => true,
  ],
]);
$blog_post_confirm_button = $render_button_html([
  'label'   => 'Confirm',
  'variant' => 'default',
  'size'    => 'md',
  'gradient' => true,
  'class'   => 'w-full',
]);

$signin_primary_button = $render_button_html([
  'label'   => 'Sign In',
  'variant' => 'default',
  'size'    => 'md',
  'gradient' => true,
  'class'   => 'w-full',
]);
$signin_google_button = $render_button_html([
  'label'   => 'Sign In with Google',
  'variant' => 'secondary',
  'size'    => 'md',
  'gradient' => true,
  'class'   => 'w-full',
]);

$blog_post_header_html = static function (): void {
  ?>
  <div class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-lg border border-brand-300 text-brand-700">
    <?php icon('article-line', ['icon_size' => '24']); ?>
  </div>
  <?php
};

$blog_post_body_html = static function (): void {
  ?>
  <p class="text-sm text-brand-700">
    This blog post has been published. Team members will be able to edit this post and republish changes.
  </p>
  <?php
};

$signin_header_html = static function (): void {
  ?>
  <div class="mb-1 flex flex-col items-center text-center">
    <div class="mb-3 inline-flex h-10 w-10 items-center justify-center rounded-lg border border-brand-300 text-brand-700">
      <?php icon('account-circle-line', ['icon_size' => '24']); ?>
    </div>
  </div>
  <?php
};

$signin_body_html = static function (): void {
  ?>
  <div class="space-y-4">
    <div class="space-y-1.5">
      <label class="text-sm font-medium text-brand-700" for="modal-signin-email">Email</label>
      <input
        id="modal-signin-email"
        class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
        type="email"
        placeholder="Enter your email."
      >
    </div>

    <div class="space-y-1.5">
      <label class="text-sm font-medium text-brand-700" for="modal-signin-password">Password</label>
      <input
        id="modal-signin-password"
        class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
        type="password"
        placeholder=". . . . ."
      >
    </div>

    <div class="flex items-center justify-between gap-3">
      <?php component('checkbox', [
        'id'    => 'modal-signin-remember',
        'name'  => 'modal_signin_remember',
        'label' => 'Remember me',
      ]); ?>
      <a class="text-sm font-medium text-brand-600 hover:text-brand-900" href="#">Forgot Password</a>
    </div>
  </div>
  <?php
};

$signin_body_dialog_html = static function (): void {
  ?>
  <div class="space-y-4">
    <div class="space-y-1.5">
      <label class="text-sm font-medium text-brand-700" for="modal-signin-email-dialog">Email</label>
      <input
        id="modal-signin-email-dialog"
        class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
        type="email"
        placeholder="Enter your email."
      >
    </div>

    <div class="space-y-1.5">
      <label class="text-sm font-medium text-brand-700" for="modal-signin-password-dialog">Password</label>
      <input
        id="modal-signin-password-dialog"
        class="h-[var(--ui-h-md)] w-full rounded-lg bg-white px-[var(--ui-px-md)] text-brand-900 ring-1 ring-brand-300 ring-inset placeholder:text-brand-400 focus:outline-none focus:ring-2 focus:ring-brand-500"
        type="password"
        placeholder=". . . . ."
      >
    </div>

    <div class="flex items-center justify-between gap-3">
      <?php component('checkbox', [
        'id'    => 'modal-signin-remember-dialog',
        'name'  => 'modal_signin_remember_dialog',
        'label' => 'Remember me',
      ]); ?>
      <a class="text-sm font-medium text-brand-600 hover:text-brand-900" href="#">Forgot Password</a>
    </div>
  </div>
  <?php
};

$release_notes_body_html = static function (): void {
  ?>
  <div class="space-y-5 text-sm text-brand-700">
    <section class="space-y-2">
      <h6 class="text-base font-semibold text-brand-900">Overview</h6>
      <p>We are excited to announce the release of Version 2.0! This major update brings significant performance improvements, a redesigned user interface, and highly requested features to streamline your workflow.</p>
    </section>
    <section class="space-y-2">
      <h6 class="text-base font-semibold text-brand-900">New Features</h6>
      <ul class="list-disc space-y-1 pl-5">
        <li>Real-time collaboration with multi-user editing</li>
        <li>Advanced data visualization with interactive charts</li>
        <li>Global search with lightning-fast indexing</li>
        <li>Dark mode support across the entire platform</li>
        <li>Customizable dashboards with drag-and-drop tiles</li>
      </ul>
    </section>
    <section class="space-y-2">
      <h6 class="text-base font-semibold text-brand-900">UI Improvements</h6>
      <ul class="list-disc space-y-1 pl-5">
        <li>Streamlined navigation for faster access to tools</li>
        <li>Enhanced accessibility with full keyboard support</li>
        <li>Modernized component library with Glassmorphism</li>
        <li>Improved mobile responsiveness for all pages</li>
      </ul>
    </section>
    <section class="space-y-2">
      <h6 class="text-base font-semibold text-brand-900">Performance</h6>
      <p>Load times have been reduced by up to 40% thanks to our new caching engine and optimized asset delivery pipeline.</p>
    </section>
    <section class="space-y-2">
      <h6 class="text-base font-semibold text-brand-900">Bug Fixes</h6>
      <ul class="list-disc space-y-1 pl-5">
        <li>Fixed intermittent login failures on slow networks</li>
        <li>Resolved memory leaks in the analytics engine</li>
        <li>Corrected layout issues in the export PDF feature</li>
        <li>Patched security vulnerabilities in API endpoints</li>
      </ul>
    </section>
    <section class="space-y-2">
      <h6 class="text-base font-semibold text-brand-900">Known Issues</h6>
      <p>The legacy export format (CSV) is currently disabled for large datasets while we finish the migration to our new streaming service.</p>
    </section>
    <section class="space-y-2">
      <h6 class="text-base font-semibold text-brand-900">Support</h6>
      <p>If you encounter any issues with this release, please reach out to our 24/7 technical support team or visit the community forums.</p>
    </section>
  </div>
  <?php
};

layout('canvas/layouts/canvas-start', [
  'page_title'         => $page_title,
  'page_current'       => $page_current,
  'canvas_primary'     => 'components',
  'canvas_links'       => $component_page_links,
  'canvas_active_link' => '/canvas/components/modal',
]);
?>
<section class="p-0">
  <?php
  $canvas_header = [
    'header_title'           => 'Modal',
    'header_subtitle'        => 'Reference for focused SaaS workflows such as upgrades, invitations, confirmations, and reporting dialogs.',
    'header_container_class' => 'w-full',
  ];
  component('canvas/header', ['canvas_header' => $canvas_header]);
?>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Modal Base
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col items-center gap-4">
          <?php component('modal', [
            'id'          => 'modal-saas-upgrade-plan',
            'title'       => 'Upgrade your workspace plan',
            'description' => 'Unlock automation rules, custom dashboards, and advanced team permissions.',
            'show_trigger' => false,
            'attributes'   => [
              'aria-hidden' => 'false',
            ],
            'classes'      => [
              'overlay' => '!relative !inset-auto !z-auto !flex !bg-transparent !p-0',
            ],
            'body_html'   => $upgrade_plan_body_html,
            'footer_html' => $upgrade_cancel_button . $upgrade_confirm_button,
          ]); ?>
        </div>
      </div>
      <div class="border-t border-brand-200 pt-4 flex items-center justify-center">
        <?php component('button', [
          'label'   => 'Show Modal',
          'variant' => 'default',
          'size'    => 'md',
          'attributes' => [
            'aria-haspopup'     => 'dialog',
            'aria-expanded'     => 'false',
            'data-modal-open'   => true,
            'data-modal-target' => 'modal-saas-upgrade-plan-dialog',
          ],
        ]); ?>

        <?php component('modal', [
          'id'          => 'modal-saas-upgrade-plan-dialog',
          'show_trigger' => false,
          'title'       => 'Upgrade your workspace plan',
          'description' => 'Unlock automation rules, custom dashboards, and advanced team permissions.',
          'body_html'   => $upgrade_plan_body_html,
          'footer_html' => $upgrade_cancel_button . $upgrade_confirm_button,
        ]); ?>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Modal A
      </div>
      <div class="relative flex min-h-[220px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col items-center gap-4">
          <?php component('modal', [
            'id'          => 'modal-saas-invite-member',
            'title'       => 'Invite teammate',
            'description' => 'Add a new teammate to collaborate on CRM workflows and campaign assets.',
            'show_trigger' => false,
            'attributes'   => [
              'aria-hidden' => 'false',
            ],
            'classes'      => [
              'overlay' => '!relative !inset-auto !z-auto !flex !bg-transparent !p-0',
            ],
            'body_html'   => $invite_member_body_html,
            'footer_html' => $invite_cancel_button . $invite_send_button,
          ]); ?>
        </div>
      </div>
      <div class="border-t border-brand-200 pt-4 flex items-center justify-center">
        <?php component('button', [
          'label'   => 'Show Modal',
          'variant' => 'default',
          'size'    => 'md',
          'attributes' => [
            'aria-haspopup'     => 'dialog',
            'aria-expanded'     => 'false',
            'data-modal-open'   => true,
            'data-modal-target' => 'modal-saas-invite-member-dialog',
          ],
        ]); ?>

        <?php component('modal', [
          'id'          => 'modal-saas-invite-member-dialog',
          'show_trigger' => false,
          'title'       => 'Invite teammate',
          'description' => 'Add a new teammate to collaborate on CRM workflows and campaign assets.',
          'body_html'   => $invite_member_body_dialog_html,
          'footer_html' => $invite_cancel_button . $invite_send_button,
        ]); ?>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Modal B
      </div>
      <div class="relative flex min-h-[280px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col items-center gap-4">
          <?php component('modal', [
            'id'            => 'modal-saas-release-notes',
            'title'         => 'Version 2.0 Release Notes',
            'description'   => 'Product update brief covering new capabilities, UI updates, performance gains, and support details.',
            'show_trigger'  => false,
            'attributes'    => [
              'aria-hidden' => 'false',
            ],
            'classes'       => [
              'overlay' => '!relative !inset-auto !z-auto !flex !bg-transparent !p-0',
              'body'    => 'max-h-[260px] overflow-y-auto',
            ],
            'size'          => '2xl',
            'body_html'     => $release_notes_body_html,
            'footer_html'   => $release_notes_close_button . $release_notes_acknowledge_button,
          ]); ?>
        </div>
      </div>
      <div class="border-t border-brand-200 pt-4 flex items-center justify-center">
        <?php component('button', [
          'label'      => 'Show Modal',
          'variant'    => 'default',
          'size'       => 'md',
          'attributes' => [
            'aria-haspopup'     => 'dialog',
            'aria-expanded'     => 'false',
            'data-modal-open'   => true,
            'data-modal-target' => 'modal-saas-release-notes-dialog',
          ],
        ]); ?>

        <?php component('modal', [
          'id'            => 'modal-saas-release-notes-dialog',
          'show_trigger'  => false,
          'title'         => 'Version 2.0 Release Notes',
          'description'   => 'Product update brief covering new capabilities, UI updates, performance gains, and support details.',
          'classes'       => [
            'body' => 'max-h-[65vh] overflow-y-auto',
          ],
          'size'          => '2xl',
          'body_html'     => $release_notes_body_html,
          'footer_html'   => $release_notes_close_button . $release_notes_acknowledge_button,
        ]); ?>
      </div>
    </div>
  </div>

  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Modal C
      </div>
      <div class="relative flex min-h-[280px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col items-center gap-4">
          <?php component('modal', [
            'id'            => 'modal-saas-blog-post-published',
            'show_trigger'  => false,
            'title'         => 'Blog post published',
            'header_html'   => $blog_post_header_html,
            'attributes'    => [
              'aria-hidden' => 'false',
            ],
            'classes'       => [
              'overlay' => '!relative !inset-auto !z-auto !flex !bg-transparent !p-0',
              'footer'  => 'justify-stretch',
            ],
            'size'          => 'md',
            'body_html'     => $blog_post_body_html,
            'footer_html'   => '<div class="flex w-full items-center gap-2">' . $blog_post_cancel_button . $blog_post_confirm_button . '</div>',
          ]); ?>
        </div>
      </div>
      <div class="border-t border-brand-200 pt-4 flex items-center justify-center">
        <?php component('button', [
          'label'      => 'Show Modal',
          'variant'    => 'default',
          'size'       => 'md',
          'attributes' => [
            'aria-haspopup'     => 'dialog',
            'aria-expanded'     => 'false',
            'data-modal-open'   => true,
            'data-modal-target' => 'modal-saas-blog-post-published-dialog',
          ],
        ]); ?>

        <?php component('modal', [
          'id'            => 'modal-saas-blog-post-published-dialog',
          'show_trigger'  => false,
          'title'         => 'Blog post published',
          'header_html'   => $blog_post_header_html,
          'classes'       => [
            'footer' => 'justify-stretch',
          ],
          'size'          => 'md',
          'body_html'     => $blog_post_body_html,
          'footer_html'   => '<div class="flex w-full items-center gap-2">' . $blog_post_cancel_button . $blog_post_confirm_button . '</div>',
        ]); ?>
      </div>
    </div>
  </div>
</section>

<section class="canvas-showcase grid md:grid-cols-2">
  <div class="canvas-demo first:border-r border-b border-dashed border-brand-300">
    <div class="flex h-full flex-col p-6">
      <div class="flex items-center justify-between border-b border-brand-200 pb-4 font-medium text-brand-900">
        Modal D
      </div>
      <div class="relative flex min-h-[300px] items-center justify-center overflow-visible bg-background px-6 py-8">
        <div class="flex w-full max-w-lg flex-col items-center gap-4">
          <?php component('modal', [
            'id'            => 'modal-saas-signin',
            'show_trigger'  => false,
            'title'         => 'Log in to your account',
            'description'   => 'Welcome back! Please enter your details.',
            'header_html'   => $signin_header_html,
            'attributes'    => [
              'aria-hidden' => 'false',
            ],
            'classes'       => [
              'overlay' => '!relative !inset-auto !z-auto !flex !bg-transparent !p-0',
              'header'  => 'relative justify-center',
              'footer'  => 'justify-stretch',
              'title'   => 'text-center',
              'description' => 'text-center',
              'close'   => 'absolute right-3 top-3 m-0',
            ],
            'size'          => 'md',
            'body_html'     => $signin_body_html,
            'footer_html'   => '<div class="flex w-full flex-col gap-2">' . $signin_primary_button . $signin_google_button . '</div>',
          ]); ?>
        </div>
      </div>
      <div class="border-t border-brand-200 pt-4 flex items-center justify-center">
        <?php component('button', [
          'label'      => 'Show Modal',
          'variant'    => 'default',
          'size'       => 'md',
          'attributes' => [
            'aria-haspopup'     => 'dialog',
            'aria-expanded'     => 'false',
            'data-modal-open'   => true,
            'data-modal-target' => 'modal-saas-signin-dialog',
          ],
        ]); ?>

        <?php component('modal', [
          'id'            => 'modal-saas-signin-dialog',
          'show_trigger'  => false,
          'title'         => 'Log in to your account',
          'description'   => 'Welcome back! Please enter your details.',
          'header_html'   => $signin_header_html,
          'classes'       => [
            'header' => 'relative justify-center',
            'footer' => 'justify-stretch',
            'title'  => 'text-center',
            'description' => 'text-center',
            'close'  => 'absolute right-3 top-3 m-0',
          ],
          'size'          => 'md',
          'body_html'     => $signin_body_dialog_html,
          'footer_html'   => '<div class="flex w-full flex-col gap-2">' . $signin_primary_button . $signin_google_button . '</div>',
        ]); ?>
      </div>
    </div>
  </div>
</section>
<?php layout('canvas/layouts/canvas-end'); ?>
