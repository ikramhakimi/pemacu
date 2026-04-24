<?php

declare(strict_types=1);

set_active_theme('juragan');
layout('layout-start', ['page_title' => 'Juragan Home', 'page_current' => 'home-juragan']);
?>
<section class="pt-10">
  <div class="<?=  container('max-w-7xl') ?>">
    <?php component('breadcrumb', [
      'separator' => 'chevron',
      'items'     => [
        ['label' => 'Home'],
        ['label' => 'Men'],
        ['label' => 'Shirt', 'current' => true],
      ],
    ]); ?>

    <section class="mt-8">
      <div class="mb-5 flex items-end justify-between gap-4">
        <h2 class="text-5xl font-semibold text-brand-900">Men Shirts</h2>
      </div>

      <div class="mb-6 flex justify-end">
        <?php component('select', [
          'id'             => 'SortBy',
          'name'           => 'sort_by',
          'selected_value' => 'price-ascending',
          'wrapper_class'  => 'w-full max-w-[280px]',
          'class'          => 'facet-filters__sort select__select caption-large',
          'attributes'     => [
            'aria-describedby' => 'a11y-refresh-page-message',
          ],
          'options'        => [
            ['label' => 'Featured', 'value' => 'manual'],
            ['label' => 'Most relevant', 'value' => 'most-relevant'],
            ['label' => 'Best selling', 'value' => 'best-selling'],
            ['label' => 'Alphabetically, A-Z', 'value' => 'title-ascending'],
            ['label' => 'Alphabetically, Z-A', 'value' => 'title-descending'],
            ['label' => 'Price, low to high', 'value' => 'price-ascending'],
            ['label' => 'Price, high to low', 'value' => 'price-descending'],
            ['label' => 'Date, old to new', 'value' => 'created-ascending'],
            ['label' => 'Date, new to old', 'value' => 'created-descending'],
          ],
        ]); ?>
      </div>

      <div class="grid grid-cols-4 gap-10">
        <div class="col-span-1">
          <div class="filter">
            <h4 class="filter__title font-semibold uppercase text-brand-900">Product Type</h4>
            <ul class="filter__list mt-2 divide-y divide-brand-100 leading-5">
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-all-shirts', 'name' => 'product_type[]', 'value' => 'All Shirts', 'label' => 'All Shirts']); ?><span class="text-brand-400 group-hover:text-brand-500">128</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-polo-shirts', 'name' => 'product_type[]', 'value' => 'Polo Shirts', 'label' => 'Polo Shirts']); ?><span class="text-brand-400 group-hover:text-brand-500">46</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-casual-shirts', 'name' => 'product_type[]', 'value' => 'Casual Shirts', 'label' => 'Casual Shirts']); ?><span class="text-brand-400 group-hover:text-brand-500">72</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-dress-shirts', 'name' => 'product_type[]', 'value' => 'Dress Shirts', 'label' => 'Dress Shirts']); ?><span class="text-brand-400 group-hover:text-brand-500">24</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-parkas-blouson', 'name' => 'product_type[]', 'value' => 'Parkas & Blouson', 'label' => 'Parkas & Blouson']); ?><span class="text-brand-400 group-hover:text-brand-500">18</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-miracle-air', 'name' => 'product_type[]', 'value' => 'Miracle Air', 'label' => 'Miracle Air']); ?><span class="text-brand-400 group-hover:text-brand-500">27</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-jackets-coats', 'name' => 'product_type[]', 'value' => 'Jackets & Coats', 'label' => 'Jackets & Coats']); ?><span class="text-brand-400 group-hover:text-brand-500">35</span></li>
            </ul>
          </div>

          <div class="filter mt-6">
            <h4 class="filter__title font-semibold uppercase text-brand-900">Adult Size</h4>
            <ul class="filter__list mt-2 divide-y divide-brand-100 leading-5">
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-size-xs', 'name' => 'adult_size[]', 'value' => 'XS', 'label' => 'XS - Extra Small']); ?><span class="text-brand-400 group-hover:text-brand-500">48</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-size-s', 'name' => 'adult_size[]', 'value' => 'S', 'label' => 'S - Small']); ?><span class="text-brand-400 group-hover:text-brand-500">62</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-size-m', 'name' => 'adult_size[]', 'value' => 'M', 'label' => 'M - Medium']); ?><span class="text-brand-400 group-hover:text-brand-500">78</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-size-l', 'name' => 'adult_size[]', 'value' => 'L', 'label' => 'L - Large']); ?><span class="text-brand-400 group-hover:text-brand-500">72</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-size-xl', 'name' => 'adult_size[]', 'value' => 'XL', 'label' => 'XL - Extra Large']); ?><span class="text-brand-400 group-hover:text-brand-500">55</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-size-2xl', 'name' => 'adult_size[]', 'value' => '2XL', 'label' => '2XL - Double Extra Large']); ?><span class="text-brand-400 group-hover:text-brand-500">35</span></li>
            </ul>
          </div>

          <div class="filter mt-6">
            <h4 class="filter__title font-semibold uppercase text-brand-900">Range Price</h4>
            <ul class="filter__list mt-2 divide-y divide-brand-100 leading-5">
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-price-under-100', 'name' => 'price[]', 'value' => 'Under RM100', 'label' => 'Under RM100']); ?><span class="text-brand-400 group-hover:text-brand-500">40</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-price-100-200', 'name' => 'price[]', 'value' => 'RM100 to RM200', 'label' => 'RM100 to RM200']); ?><span class="text-brand-400 group-hover:text-brand-500">152</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-price-200-300', 'name' => 'price[]', 'value' => 'RM200 to RM300', 'label' => 'RM200 to RM300']); ?><span class="text-brand-400 group-hover:text-brand-500">128</span></li>
              <li class="group flex items-center justify-between py-2"><?php component('checkbox', ['id' => 'filter-price-over-300', 'name' => 'price[]', 'value' => 'Over RM300', 'label' => 'Over RM300']); ?><span class="text-brand-400 group-hover:text-brand-500">30</span></li>
            </ul>
          </div>
        </div>
        <div class="col-span-3">
          <div class="grid grid-cols-1 gap-1 sm:grid-cols-2 lg:grid-cols-3">
            <?php theme_component('product-card', [
              'product_image'    => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/02/3.BelangaOregano.jpg?fit=600%2C800&ssl=1',
              'product_title'    => 'Oversized Crew Neck T-Shirt',
              'product_alt'      => 'Oversized Crew Neck T-Shirt',
              'product_price'    => 'RM 80',
              'product_category' => 'All Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/02/1.Pistachio.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'DRY-EX Pique Polo Shirt',
              'product_alt'   => 'DRY-EX Pique Polo Shirt',
              'product_price' => 'RM 120',
              'product_category' => 'Polo Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/02/5.Butter.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Premium Linen Blend Casual Shirt',
              'product_alt'   => 'Premium Linen Blend Casual Shirt',
              'product_price' => 'RM 160',
              'product_category' => 'Casual Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/02/2.Flamingo.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Super Non-Iron Slim-Fit Dress Shirt',
              'product_alt'   => 'Super Non-Iron Slim-Fit Dress Shirt',
              'product_price' => 'RM 200',
              'product_category' => 'Dress Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/02/1.Sage_.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Blocktech Utility Parka',
              'product_alt'   => 'Blocktech Utility Parka',
              'product_price' => 'RM 240',
              'product_category' => 'Parkas & Blouson',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/SNP_0373.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Miracle Air Relaxed Open Collar Shirt',
              'product_alt'   => 'Miracle Air Relaxed Open Collar Shirt',
              'product_price' => 'RM 280',
              'product_category' => 'Miracle Air',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/3.Vanilla.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Seamless Down Blouson',
              'product_alt'   => 'Seamless Down Blouson',
              'product_price' => 'RM 320',
              'product_category' => 'Jackets & Coats',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/SNP_1255.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Supima Cotton Broadcloth Shirt',
              'product_alt'   => 'Supima Cotton Broadcloth Shirt',
              'product_price' => 'RM 360',
              'product_category' => 'All Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/SNP_1053.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Dry Pique Striped Polo Shirt',
              'product_alt'   => 'Dry Pique Striped Polo Shirt',
              'product_price' => 'RM 400',
              'product_category' => 'Polo Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/SNP_1386.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Soft Brushed Flannel Casual Shirt',
              'product_alt'   => 'Soft Brushed Flannel Casual Shirt',
              'product_price' => 'RM 80',
              'product_category' => 'Casual Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/4.OliveGreen.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Easy Care Oxford Dress Shirt',
              'product_alt'   => 'Easy Care Oxford Dress Shirt',
              'product_price' => 'RM 120',
              'product_category' => 'Dress Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/2.Nude_.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Windproof Light Parka',
              'product_alt'   => 'Windproof Light Parka',
              'product_price' => 'RM 160',
              'product_category' => 'Parkas & Blouson',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/1.DustypinK.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Miracle Air Tailored Jacket',
              'product_alt'   => 'Miracle Air Tailored Jacket',
              'product_price' => 'RM 200',
              'product_category' => 'Miracle Air',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/4.Maroon.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Hybrid Down Coat',
              'product_alt'   => 'Hybrid Down Coat',
              'product_price' => 'RM 240',
              'product_category' => 'Jackets & Coats',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/4.Darkbrown.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Cotton Twill Work Shirt',
              'product_alt'   => 'Cotton Twill Work Shirt',
              'product_price' => 'RM 280',
              'product_category' => 'All Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/2.Purple.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'UV Cut Performance Polo Shirt',
              'product_alt'   => 'UV Cut Performance Polo Shirt',
              'product_price' => 'RM 320',
              'product_category' => 'Polo Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/4.BabyBlue.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Rayon Comfort Casual Shirt',
              'product_alt'   => 'Rayon Comfort Casual Shirt',
              'product_price' => 'RM 360',
              'product_category' => 'Casual Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/4.Mustardyellow.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Smart Ankle Length Dress Shirt',
              'product_alt'   => 'Smart Ankle Length Dress Shirt',
              'product_price' => 'RM 400',
              'product_category' => 'Dress Shirts',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/4.OffWhite.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Water-Repellent Field Parka',
              'product_alt'   => 'Water-Repellent Field Parka',
              'product_price' => 'RM 80',
              'product_category' => 'Parkas & Blouson',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/4.EmeraldGreeN.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Miracle Air Stretch Overshirt',
              'product_alt'   => 'Miracle Air Stretch Overshirt',
              'product_price' => 'RM 120',
              'product_category' => 'Miracle Air',
            ]); ?>
            <?php theme_component('product-card', [
              'product_image' => 'https://i0.wp.com/juraganmy.com/wp-content/uploads/2024/03/3.PremiumBlack.jpg?fit=600%2C800&ssl=1',
              'product_title' => 'Wool Blend Chester Coat',
              'product_alt'   => 'Wool Blend Chester Coat',
              'product_price' => 'RM 160',
              'product_category' => 'Jackets & Coats',
            ]); ?>
          </div>
        </div>
      </div>

      
    </section>
  </div>
</section>
<?php layout('layout-end'); ?>
