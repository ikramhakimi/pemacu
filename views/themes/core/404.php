<?php

declare(strict_types=1);

$page_title   = 'Page Not Found';
$page_current = '';

layout('layout-start', ['page_title' => $page_title, 'page_current' => $page_current]);
?>
<section class="section">
  <h1 class="section__title">404 — Page not found</h1>
  <p class="section__lead">The page you are looking for does not exist. Return to the homepage to continue browsing booking packages.</p>
  <p><a href="<?= e(path('/')); ?>" class="card-package__button">Go to homepage</a></p>
</section>
<?php layout('layout-end');
