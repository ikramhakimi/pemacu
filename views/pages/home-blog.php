<?php

declare(strict_types=1);

layout('layout-start', ['page_title' => 'Home Blog', 'page_current' => 'home-blog']);
?>
<section class="blog blog--featured py-12">
  <div class="<?php container() ?>">
    <article class="grid grid-cols-3 grid-rows-2 gap-5">
      <div class="relative row-span-2 row-start-1">
        <?php component('placeholder-image', ['aspect-ratio' => 'absolute inset-0 rounded-md',]); ?>
        <div class="absolute bottom-0 left-0 right-0 p-5">
          <div class="text-sm text-gray-500 mb-2">Tech News</div>
          <h2 class="text-3xl font-semibold">France to ditch Windows for Linux to reduce reliance on US tech</h2>
          <div class="mt-2">32 minutes ago</div>
        </div>
      </div>
      <div class="relative row-span-1 col-start-2">
        <?php component('placeholder-image', ['aspect-ratio' => 'absolute inset-0 rounded-md',]); ?>
        <div class="absolute bottom-0 left-0 right-0 p-5">
          <div class="text-sm text-gray-500 mb-2">Tech News</div>
          <h2 class="text-xl font-semibold">France to ditch Windows for Linux to reduce reliance on US tech</h2>
          <div class="mt-2">32 minutes ago</div>
        </div>
      </div>
      <div class="relative row-span-1 col-start-2">
        <?php component('placeholder-image', ['aspect-ratio' => 'absolute inset-0 rounded-md',]); ?>
        <div class="absolute bottom-0 left-0 right-0 p-5">
          <div class="text-sm text-gray-500 mb-2">Tech News</div>
          <h2 class="text-xl font-semibold">France to ditch Windows for Linux to reduce reliance on US tech</h2>
          <div class="mt-2">32 minutes ago</div>
        </div>
      </div>
      <div class="relative row-span-2 row-start-1 col-start-3">
        <div class="uppercase text-xs text-brand-500">Top Headlines</div>
        <div class="divide-y divide-y-1 divide-brand-300 divide-dashed space-y-5">
          <?php for($count=0; $count<5; $count++) { ?>
            <a href="#" class="flex items-start gap-1 pt-5">
              <div>
                <h2 class="text-base font-semibold">France to ditch Windows for Linux to reduce reliance on US tech</h2>
                <div class="flex items-center gap-2 mt-2">
                  <div class="text-gray-500">Tech News</div>
                  <div>32 minutes ago</div>
                </div>
              </div>
              <?php component('placeholder-image', ['aspect-ratio' => 'aspect-square w-20 rounded-md',]); ?>
            </a>
          <?php } ?>
        </div>
      </div>
    </article>
  </div>
</section>
<section class="blog blog--featured pb-12">
  <div class="<?php container() ?>">
    <article class="grid grid-cols-5 gap-4">
      <?php for($count=0; $count<5; $count++) { ?>
      <a href="#" class="block relative aspect-square rounded-lg overflow-hidden">
        <?php component('placeholder-image', ['aspect-ratio' => 'absolute inset-0',]); ?>
        <div class="absolute bottom-0 left-0 right-0 p-4 pb-3">
          <h2 class="text-lg font-semibold">Category Name</h2>
        </div>
      </a>
      <?php } ?>
    </article>
  </div>
</section>
<section class="blog blog--featured pb-12">
  <div class="<?php container() ?>">
    <article class="grid grid-cols-3 gap-5">
      <div class="col-span-2 divide-y divide-y-1 divide-brand-300 divide-dashed space-y-4">
        <?php for($count=0; $count<5; $count++) { ?>
          <a href="#" class="flex items-start gap-4 pt-4">
            <?php component('placeholder-image', ['aspect-ratio' => 'aspect-video w-[200px] rounded-md',]); ?>
            <div>
              <div class="text-gray-500 mb-2">Tech News</div>
              <h2 class="text-xl font-semibold">
                Every fusion startup that has raised over $100M
                Every fusion startup that has raised over $100M
              </h2>
              <div class="flex items-center gap-2 mt-2">
                <div>Ikram Hakimi</div>
                <div>32 minutes ago</div>
              </div>
            </div>
            
          </a>
        <?php } ?>
      </div>

      <div>
        <div class="<?php card('bg-brand-50') ?>">
          <div class="uppercase text-xs text-brand-500 p-4 pb-0">Top Headlines</div>
          <div class="divide-y divide-y-1 divide-brand-200">
            <?php for($count=0; $count<5; $count++) { ?>
              <a href="#" class="flex items-start gap-1 p-5">
                <div>
                  <h2 class="text-base font-semibold">France to ditch Windows for Linux to reduce reliance on US tech</h2>
                  <div class="flex items-center gap-2 mt-2">
                    <div class="text-gray-500">Tech News</div>
                    <div>32 minutes ago</div>
                  </div>
                </div>
                <?php component('placeholder-image', ['aspect-ratio' => 'aspect-square w-20 rounded-md',]); ?>
              </a>
            <?php } ?>
          </div>
        </div>
      </div>
    </article>
  </div>
</section>
<?php section('core-footer'); ?>
<?php layout('layout-end'); ?>
