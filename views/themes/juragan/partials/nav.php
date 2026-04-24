<?php

declare(strict_types=1);
?>
<nav class="border-b border-brand-200 bg-white" aria-label="Juragan navigation">
  <div class="<?php container('max-w-7xl py-5'); ?>">
    <div class="flex items-center justify-between gap-4">
      <span class="text-xl font-semibold tracking-tight text-brand-900">
        Juragan
      </span>
      <div class="flex items-center gap-5">
        <button class="inline-flex font-medium text-brand-900" type="button">Home</button>
        <?php component('dropdown-navigation', [
          'dropdown_id'    => 'juragan-men',
          'dropdown_label' => 'Men',
          'dropdown_align' => 'left',
          'trigger_class'  => 'dropdown__trigger inline-flex items-center gap-1 font-medium text-brand-700 hover:text-brand-900',
          'dropdown_links' => [
            ['label' => 'Baju Melayu Teluk Belanga', 'href' => '#'],
            ['label' => 'Baju Melayu Slim Fit', 'href' => '#'],
            ['label' => 'Baju Melayu Modern Classic', 'href' => '#'],
            ['label' => 'Kurta Eksklusif', 'href' => '#'],
            ['label' => 'Kurta Laxmana', 'href' => '#'],
            ['label' => 'Kurta Maula', 'href' => '#'],
          ],
        ]); ?>
        <?php component('dropdown-navigation', [
          'dropdown_id'    => 'juragan-kids',
          'dropdown_label' => 'Kids',
          'dropdown_align' => 'left',
          'trigger_class'  => 'dropdown__trigger inline-flex items-center gap-1 font-medium text-brand-700 hover:text-brand-900',
          'dropdown_links' => [
            ['label' => 'Baju Melayu Teluk Belanga for baby (0-3 years)', 'href' => '#'],
            ['label' => 'Baju Melayu Cekak Musang (4-12 years)', 'href' => '#'],
            ['label' => 'Baju Melayu Teluk Belanga (4-12 years)', 'href' => '#'],
            ['label' => 'Kurta Laxmana (4-12 years)', 'href' => '#'],
          ],
        ]); ?>
        <?php component('dropdown-navigation', [
          'dropdown_id'    => 'juragan-accessories',
          'dropdown_label' => 'Accessories',
          'dropdown_align' => 'right',
          'trigger_class'  => 'dropdown__trigger inline-flex items-center gap-1 font-medium text-brand-700 hover:text-brand-900',
          'dropdown_links' => [
            ['label' => 'Capal Klasik', 'href' => '#'],
            ['label' => 'Kain Sampin', 'href' => '#'],
            ['label' => 'Songkok Baldu 9000', 'href' => '#'],
          ],
        ]); ?>
      </div>
    </div>
  </div>
</nav>
