<?php

declare(strict_types=1);

$page_title = 'Kuiz Design';

layout('kuiz/partials/kuiz-start', [
  'page_title'           => $page_title,
  'app_container_class'  => 'app-container',
  'show_app_nav'         => false,
]);
?>
<article class="app-paint overflow-x-auto overscroll-x-contain m-4 border-4 border-brand-400 rounded-xl p-10 space-y-5">
  <section class="min-w-max" aria-labelledby="kuiz-design-heading">
    <h1 id="kuiz-design-heading" class="sr-only">Kuiz design test</h1>

    <div class="flex w-max items-start gap-5 pb-4">
      <section class="column-1 w-full max-w-[400px] space-y-6">
        <article class="mobile-frame border border-dashed border-brand-300 rounded-lg py-5" aria-label="dont-include-this-mobile-frame-in-design">
          <h2 class="mb-5 text-[10px] text-brand-400 uppercase leading-none ml-2 -mt-2">Quiz Result</h2>
          <div class="quiz">
            <div class="quiz__result">
              <div class="quiz__result-icon mx-auto mb-4 flex size-14 items-center justify-center rounded-full bg-brand-100 text-brand-800">
                <?php icon('trophy-line', ['icon_size' => '28']); ?>
              </div>
              <div class="quiz__result-kicker mb-2 text-sm text-brand-500">Bab 1 : Kerajaan Alam Melayu</div>
              <div class="quiz__result-score mb-1 text-2xl font-semibold text-brand-900">7 / 10</div>
              <div class="quiz__result-percent mb-3 text-sm text-brand-600">70% tepat</div>
              <div class="quiz__result-message mb-5 leading-6 text-brand-700">Mantap</div>

              <section class="p-5">
                
                <div class="progressbar w-full space-y-4">
                  <span class="inline-flex items-center gap-1 capitalize bg-primary-200 font-semibold text-primary-700 rounded-sm py-1 pr-2.5 pl-1.5">
                    <?php icon('add-line', ['icon_size' => '16']); ?>
                    <span>20xp</span>
                  </span>
                  <div class="progressbar__track rounded-sm h-4 bg-brand-300 inset-shadow-sm shadow-brand-700" role="progressbar" aria-label="Session Completion" aria-valuemin="0" aria-valuemax="100" aria-valuenow="68">
                    <span class="progressbar__fill block h-full rounded-sm transition-[width] duration-300 ease-out bg-primary-500 ring-1 ring-inset ring-primary-700 shadow-md shadow-primary-600/50" style="width: 68%;"></span>
                  </div>
                  <div class="progressbar__meta flex items-center justify-between gap-3 text-brand-700 leading-none">
                    <span class="progressbar__correct text-primary-700 font-medium">
                      Betul 7 
                      <span class="text-brand-500 font-normal">&times;</span>
                      20px
                    </span>
                    <span class="progressbar__wrong text-brand-500">3 Salah</span>
                  </div>
                </div>
              </section>

              <section class="respond space-y-5 p-5 mb-10 border-t border-brand-200">
                <a href="#" class="respond__action flex w-full items-center justify-between rounded-lg bg-brand-900 py-3 pl-5 pr-4 text-base leading-5 text-center font-medium text-white hover:bg-brand-800 shadow-lg shadow-brand-900/30">
                  <span>Jom Cuba Lagi</span>
                  <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                    <?php icon('arrow-right-up-line', ['icon_size' => '16']); ?>
                  </span>
                </a>

                <div class="respond__alt font-medium  flex items-center justify-start mt-8 divide-x divide-brand-300 space-x-3">
                  <div><a href="#" class="underline underline-offset-4 decoration-brand-300">Ulang Soalan Salah</a></div>
                  <div class="pl-3"><a href="#" class="underline underline-offset-4 decoration-brand-300">Pilih Tahap Lain</a></div>
                </div>
              </section>

              <div class="mb-5">
                <h2 class="mb-2 text-sm font-semibold text-brand-900 uppercase">Kekuatan</h2>
                <div class="divide-y divide-dashed divide-brand-300">
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Kerajaan</span>
                    <span class="text-brand-600">4/5 · 80%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Perdagangan</span>
                    <span class="text-brand-600">4/4 · 100%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Maritim</span>
                    <span class="text-brand-600">3/3 · 100%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Analisis</span>
                    <span class="text-brand-600">3/4 · 75%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Kedudukan Strategik</span>
                    <span class="text-brand-600">2/2 · 100%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Pentadbiran</span>
                    <span class="text-brand-600">2/2 · 100%</span>
                  </div>
                </div>
              </div>

              <div class="mb-5 pt-5 border-t border-brand-300">
                <h2 class="mb-2 text-sm font-semibold text-brand-900">Fokus Seterusnya</h2>
                <div class="divide-y divide-dashed divide-brand-300">
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Hubungan</span>
                    <span class="text-brand-600">1/3 · 33%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Pengaruh</span>
                    <span class="text-brand-600">1/4 · 25%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Bukti Sejarah</span>
                    <span class="text-brand-600">2/5 · 40%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Perbandingan</span>
                    <span class="text-brand-600">1/3 · 33%</span>
                  </div>
                  <div class="flex items-center justify-between gap-3 text-sm py-1">
                    <span class="font-medium text-brand-800">Kronologi</span>
                    <span class="text-brand-600">2/4 · 50%</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </article>
      </section>      

      <section class="column-1 w-full max-w-[400px] space-y-6">
        <article class="mobile-frame border border-dashed border-brand-300 rounded-lg py-5" aria-label="dont-include-this-mobile-frame-in-design">
          <h2 class="mb-5 text-[10px] text-brand-400 uppercase leading-none ml-2 -mt-2">Welcome Screen</h2>
          <div class="welcome">
            <header class="profile flex flex-reverse items-start px-5 py-6 justify-between">
              <div class="profile__bio">
                <div class="profile__greet leading-none">Hai! Selamat Malam</div>
                <div class="profile__name text-lg font-bold leading-5 text-brand-900 mt-2">Muhammad Aqil Darwisy</div>
                <div class="profile__stats leading-none text-brand-500 mt-2 flex items-center justify-start divide-x divide-brand-300 space-x-2">
                  <span class="profile__stats__points font-semibold text-primary-700">8,250xp</span>
                  <span class="profile__stats__quests pl-2"><span class="font-semibold text-brand-700">150</span> Soalan</span>
                  <span class="profile__stats__accuracy pl-2"><span class="font-semibold text-brand-700">65%</span> Tepat</span>
                </div>
              </div>
              <div class="profile__avatar size-16">
                <?php component('avatar', [
                  'items' => [
                    [
                      'image_src' => path('/assets/images/avatars/avatar-03.jpg'),
                      'image_alt' => 'Avatar pelajar',
                      'size'      => '64',
                      'class_name' => 'shadow-lg shadow-brand-700/70',
                    ],
                  ],
                ]); ?>
              </div>
            </header>
            
            <section class="px-5 py-6 border-t border-brand-200">
              <div class="mb-4">
                <h3 class="font-alt text-xs uppercase font-semibold text-brand-900 mb-2 leading-none">Rentetan Harian</h3>
                <p class="text-brand-600">Mantap, awak dah 4 hari berturut-turut buat latihan Sejarah minggu ini. Tahniah!</p>
              </div>
              <div class="flex items-center justify-between" aria-label="Rentetan harian minggu ini">
                <span class="flex flex-col w-10 h-[68px] items-center justify-between rounded-full bg-positive-400 ring-1 ring-positive-500 text-xs font-semibold text-white relative">
                  <div class="mt-1 bg-positive-600 size-8 flex items-center justify-center rounded-full">M</div>
                  <div class="size-4 flex items-center justify-center absolute bottom-2 rounded-full bg-positive-100 text-positive-700">
                    <?php icon('check-line', ['icon_size' => '12']); ?>
                  </div>
                </span>
                <span class="h-px flex-1 bg-positive-500" aria-hidden="true"></span>
                <span class="flex flex-col w-10 h-[68px] items-center justify-between rounded-full bg-positive-400 ring-1 ring-positive-500 text-xs font-semibold text-white relative">
                  <div class="mt-1 bg-positive-600 size-8 flex items-center justify-center rounded-full">T</div>
                  <div class="size-4 flex items-center justify-center absolute bottom-2 rounded-full bg-positive-100 text-positive-700">
                    <?php icon('check-line', ['icon_size' => '12']); ?>
                  </div>
                </span>
                <span class="h-px flex-1 bg-positive-500" aria-hidden="true"></span>
                <span class="flex flex-col w-10 h-[68px] items-center justify-between rounded-full bg-positive-400 ring-1 ring-positive-500 text-xs font-semibold text-white relative">
                  <div class="mt-1 bg-positive-600 size-8 flex items-center justify-center rounded-full">W</div>
                  <div class="size-4 flex items-center justify-center absolute bottom-2 rounded-full bg-positive-100 text-positive-700">
                    <?php icon('check-line', ['icon_size' => '12']); ?>
                  </div>
                </span>
                <span class="h-px flex-1 bg-positive-500" aria-hidden="true"></span>
                <span class="flex flex-col w-10 h-[68px] items-center justify-between rounded-full bg-positive-400 ring-1 ring-positive-500 text-xs font-semibold text-white relative">
                  <div class="mt-1 bg-positive-600 size-8 flex items-center justify-center rounded-full">T</div>
                  <div class="size-4 flex items-center justify-center absolute bottom-2 rounded-full bg-positive-100 text-positive-700">
                    <?php icon('check-line', ['icon_size' => '12']); ?>
                  </div>
                </span>
                <span class="h-px flex-1 bg-brand-300" aria-hidden="true"></span>
                <span class="flex flex-col w-10 h-[68px] items-center justify-between rounded-full bg-primary-400  ring-1 ring-primary-500 text-xs font-semibold text-brand-700 relative shadow-lg shadow-primary-700/60">
                  <div class="mt-1 bg-primary-700 text-white size-8 flex items-center justify-center rounded-full">F</div>
                  <div class="size-4 flex items-center justify-center absolute bottom-2 rounded-full bg-primary-100 text-primary-700">
                    <?php icon('arrow-right-line', ['icon_size' => '12']); ?>
                  </div>
                </span>
                <span class="h-px flex-1 bg-brand-300" aria-hidden="true"></span>
                <span class="flex flex-col w-10 h-[68px] items-center justify-between rounded-full bg-white text-xs font-semibold text-brand-700 ring-1 ring-brand-300 relative">
                  <div class="mt-1 bg-brand-300 size-8 flex items-center justify-center rounded-full">S</div>
                  <div class="size-4 flex items-center justify-center absolute bottom-2 rounded-full bg-brand-100 text-brand-700">
                    <?php icon('arrow-right-line', ['icon_size' => '12']); ?>
                  </div>
                </span>
                <span class="h-px flex-1 bg-brand-300" aria-hidden="true"></span>
                <span class="flex flex-col w-10 h-[68px] items-center justify-between rounded-full bg-white text-xs font-semibold text-brand-700 ring-1 ring-brand-300 relative">
                  <div class="mt-1 bg-brand-300 size-8 flex items-center justify-center rounded-full">S</div>
                  <div class="size-4 flex items-center justify-center absolute bottom-2 rounded-full bg-brand-100 text-brand-700">
                    <?php icon('arrow-right-line', ['icon_size' => '12']); ?>
                  </div>
                </span>
              </div>
            </section>

            <section class="px-5 py-6 border-t border-brand-200">
              <div class="mb-4">
                <h3 class="font-alt text-xs uppercase font-semibold text-brand-900 mb-2 leading-none">Matlamat Harian</h3>
                <p class="text-brand-600">Progress yang padu! Sikit lagi nak cukupkan kuota latihan hari ini.</p>
              </div>

              <div class="progressbar w-full space-y-2">
                <div class="progressbar__track rounded-sm h-4 bg-brand-300" role="progressbar" aria-label="Session Completion" aria-valuemin="0" aria-valuemax="100" aria-valuenow="68">
                  <span class="progressbar__fill block h-full rounded-sm transition-[width] duration-300 ease-out bg-primary-500 ring-1 ring-inset ring-primary-700 shadow-md shadow-primary-600/50" style="width: 68%;"></span>
                </div>
              </div>
              
              <div class="leading-4 flex gap-3 items-center justify-start mt-4">
                <div class="text-base">🥳</div>
                <div class="font-medium text-brand-900">3/5 kuiz dijawab hari ini. Hebat!</div>
                <div class="ml-auto">
                  <div class="font-semibold text-primary-700 text-xs">+250xp</div>
                </div>
              </div>
            </section>

            <section class="px-5 py-6 border-t border-brand-200">
              <div class="mb-2">
                <h3 class="font-alt text-xs uppercase font-semibold text-brand-900 mb-2 leading-none">Fokus Sini Juga</h3>
                <p class="text-brand-600">Topik ini masih boleh dipertingkatkan. Jom ulang dan kuatkan lagi dengan beberapa soalan.</p>
              </div>
              <div class="-mx-5 overflow-x-auto px-5 scrollbar-none">
                <div class="inline-flex gap-3 py-3">
                  <div class="<?php card('bg-white w-[300px] shrink-0 border-brand-300 p-1 ring-2 ring-brand-200') ?>">
                    <div class="card__header p-4 leading-none">
                      <h3 class="font-semibold text-base text-brand-900">Bab 3 : Perdagangan Maritim</h3>
                      <div class="text-brand-500 mt-1">Sejarah Tingkatan 2</div>
                    </div>

                    <div class="card__content space-y-4 p-4">
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Asas</span>
                          <span class="progressbar__value">35%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-300" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="35">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 35%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Pengukuhan</span>
                          <span class="progressbar__value">35%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="35">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 35%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Cabaran</span>
                          <span class="progressbar__value">35%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="35">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 35%;"></span>
                        </div>
                      </div>
                    </div>

                    <div class="card__action p-4 leading-5">
                      <a href="#" class="flex w-full items-center justify-between rounded-lg bg-brand-900 px-4 py-3 text-center font-medium text-white hover:bg-brand-800 shadow-lg shadow-brand-900/30">
                        <span>Jom Buat Topik Ini</span>
                        <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                          <?php icon('arrow-right-up-line', ['icon_size' => '16']); ?>
                        </span>
                      </a>
                    </div>
                  </div>
                  <div class="<?php card('bg-white w-[300px] shrink-0 border-brand-300 p-1 ring-2 ring-brand-200') ?>">
                    <div class="card__header p-4 leading-none">
                      <h3 class="font-semibold text-base text-brand-900">Bab 1 : Hubungan Luar</h3>
                      <div class="text-brand-500 mt-1">Sejarah Tingkatan 2</div>
                    </div>

                    <div class="card__content space-y-4 p-4">
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Asas</span>
                          <span class="progressbar__value">40%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-300" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 40%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Pengukuhan</span>
                          <span class="progressbar__value">28%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="28">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 28%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Cabaran</span>
                          <span class="progressbar__value">25%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 25%;"></span>
                        </div>
                      </div>
                    </div>

                    <div class="card__action p-4 leading-5">
                      <a href="#" class="flex w-full items-center justify-between rounded-lg bg-brand-900 px-4 py-3 text-center font-medium text-white hover:bg-brand-800 shadow-lg shadow-brand-900/30">
                        <span>Jom Buat Topik Ini</span>
                        <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                          <?php icon('arrow-right-up-line', ['icon_size' => '16']); ?>
                        </span>
                      </a>
                    </div>
                  </div>
                  <div class="<?php card('bg-white w-[300px] shrink-0 border-brand-300 p-1 ring-2 ring-brand-200') ?>">
                    <div class="card__header p-4 leading-none">
                      <h3 class="font-semibold text-base text-brand-900">Bab 2 : Bukti Sejarah</h3>
                      <div class="text-brand-500 mt-1">Sejarah Tingkatan 2</div>
                    </div>

                    <div class="card__content space-y-4 p-4">
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Asas</span>
                          <span class="progressbar__value">45%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-300" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="45">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 45%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Pengukuhan</span>
                          <span class="progressbar__value">38%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="38">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 38%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Cabaran</span>
                          <span class="progressbar__value">30%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="30">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 30%;"></span>
                        </div>
                      </div>
                    </div>

                    <div class="card__action p-4 leading-5">
                      <a href="#" class="flex w-full items-center justify-between rounded-lg bg-brand-900 px-4 py-3 text-center font-medium text-white hover:bg-brand-800 shadow-lg shadow-brand-900/30">
                        <span>Jom Buat Topik Ini</span>
                        <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                          <?php icon('arrow-right-up-line', ['icon_size' => '16']); ?>
                        </span>
                      </a>
                    </div>
                  </div>
                  <div class="<?php card('bg-white w-[300px] shrink-0 border-brand-300 p-1 ring-2 ring-brand-200') ?>">
                    <div class="card__header p-4 leading-none">
                      <h3 class="font-semibold text-base text-brand-900">Bab 4 : Perbandingan Kerajaan</h3>
                      <div class="text-brand-500 mt-1">Sejarah Tingkatan 2</div>
                    </div>

                    <div class="card__content space-y-4 p-4">
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Asas</span>
                          <span class="progressbar__value">50%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-300" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 50%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Pengukuhan</span>
                          <span class="progressbar__value">35%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="35">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 35%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Cabaran</span>
                          <span class="progressbar__value">20%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="20">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 20%;"></span>
                        </div>
                      </div>
                    </div>

                    <div class="card__action p-4 leading-5">
                      <a href="#" class="flex w-full items-center justify-between rounded-lg bg-brand-900 px-4 py-3 text-center font-medium text-white hover:bg-brand-800 shadow-lg shadow-brand-900/30">
                        <span>Jom Buat Topik Ini</span>
                        <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                          <?php icon('arrow-right-up-line', ['icon_size' => '16']); ?>
                        </span>
                      </a>
                    </div>
                  </div>
                  <div class="<?php card('bg-white w-[300px] shrink-0 border-brand-300 p-1 ring-2 ring-brand-200') ?>">
                    <div class="card__header p-4 leading-none">
                      <h3 class="font-semibold text-base text-brand-900">Bab 5 : Kronologi Peristiwa</h3>
                      <div class="text-brand-500 mt-1">Sejarah Tingkatan 2</div>
                    </div>

                    <div class="card__content space-y-4 p-4">
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Asas</span>
                          <span class="progressbar__value">42%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-300" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="42">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 42%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Pengukuhan</span>
                          <span class="progressbar__value">31%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="31">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 31%;"></span>
                        </div>
                      </div>
                      <div class="progressbar w-full space-y-1">
                        <div class="progressbar__meta flex items-center justify-between gap-3 font-medium text-brand-700">
                          <span class="progressbar__label">Tahap Cabaran</span>
                          <span class="progressbar__value">18%</span>
                        </div>
                        <div class="progressbar__track h-1 overflow-hidden rounded-full bg-negative-200" role="progressbar" aria-label="Small Progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="18">
                          <span class="progressbar__fill block h-full rounded-full bg-negative-600 transition-[width] duration-300 ease-out" style="width: 18%;"></span>
                        </div>
                      </div>
                    </div>

                    <div class="card__action p-4 leading-5">
                      <a href="#" class="flex w-full items-center justify-between rounded-lg bg-brand-900 px-4 py-3 text-center font-medium text-white hover:bg-brand-800 shadow-lg shadow-brand-900/30">
                        <span>Jom Buat Topik Ini</span>
                        <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                          <?php icon('arrow-right-up-line', ['icon_size' => '16']); ?>
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </article>
      </section>
      
      <section class="column-1 w-full max-w-[400px] space-y-6">
        <article class="h-[800px] mobile-frame border border-dashed border-brand-300 rounded-lg py-5" aria-label="dont-include-this-mobile-frame-in-design">
          <h2 class="mb-5 text-[10px] text-brand-400 uppercase leading-none ml-2 -mt-2">Quiz Setup</h2>
          <header class="subject flex flex-reverse items-start px-5 py-6 justify-between">
            <div class="subject__bio">
              <div class="subject__name leading-none">Sejarah Tingkatan 2</div>
              <div class="subject__chapter text-lg font-semibold leading-5 text-brand-900 mt-2">Bab 1: Kerajaan Alam Melayu</div>
              <div class="subject__stats text-brand-500 mt-2 leading-5">
                Bab ini fokus kepada Kerajaan Srivijaya, Majapahit dan Funan.
              </div>
            </div>
          </header>
          <section class="setup-control p-5 border-t border-brand-200">
            <div class="space-y-4 divide-y divide-brand-200">
              <div class="flex gap-3 items-center justify-start leading-none">
                <div class="size-10 bg-brand-200 rounded-lg flex items-center justify-center text-brand-500">
                  <?php icon('chat-smile-2-line', ['icon_size' => '24 ']); ?>
                </div>
                <div>
                  <div class="text-xs text-brand-500">Soalan</div>
                  <div class="font-semibold text-brand-900 mt-1">10 rawak</div>
                </div>
                <div class="ml-auto flex items-center gap-1 text-brand-700">
                  <a href="#" class="bg-white rounded-lg border border-brand-300 px-4 py-2"><?php icon('subtract-line', ['icon_size' => '16']); ?></a>
                  <a href="#" class="bg-white rounded-lg border border-brand-300 px-4 py-2"><?php icon('add-line', ['icon_size' => '16']); ?></a>
                </div>
              </div>
              <div class="flex gap-3 items-center justify-start leading-none pt-4">
                <div class="size-10 bg-brand-200 rounded-lg flex items-center justify-center text-brand-500">
                  <?php icon('timer-flash-line', ['icon_size' => '24']); ?>
                </div>
                <div>
                  <div class="text-xs text-brand-500">Masa</div>
                  <div class="font-semibold text-brand-900 mt-1">30s / soalan</div>
                </div>
                <div class="ml-auto flex items-center gap-1 text-brand-700">
                  <a href="#" class="bg-white rounded-lg border border-brand-300 px-4 py-2"><?php icon('subtract-line', ['icon_size' => '16']); ?></a>
                  <a href="#" class="bg-white rounded-lg border border-brand-300 px-4 py-2"><?php icon('add-line', ['icon_size' => '16']); ?></a>
                </div>
              </div>
            </div>
          </section>
          <section class="setup-level px-5 py-1 border-t border-brand-200">
            <div class="divide-y divide-brand-200">
              <div class="flex gap-3 items-center justify-between leading-none py-4">
                <div>
                  <div class="font-semibold text-brand-900">Tahap Asas</div>
                  <div class="my-2"><span class="font-semibold text-primary-700">10xp</span> &times; 1 - 50 soalan tersedia</div>
                  <div class="leading-none text-xs text-brand-500">Rekod terbaik 10/10</div>
                </div>
                <a href="#" class="flex gap-4 items-center justify-between rounded-lg bg-brand-900 pl-4 pr-2 py-2 text-center font-medium text-white hover:bg-brand-600 shadow-lg shadow-brand-900/30">
                  <span>Mula</span>
                  <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                    <?php icon('arrow-right-line', ['icon_size' => '16']); ?>
                  </span>
                </a>
              </div>
              <div class="flex gap-3 items-center justify-between leading-none py-4">
                <div>
                  <div class="font-semibold text-brand-900">Tahap Pengukuhan</div>
                  <div class="my-2"><span class="font-semibold text-primary-700">20xp</span> &times; 1 - 50 soalan tersedia</div>
                  <div class="leading-none text-xs text-brand-500">Rekod terbaik 7/10</div>
                </div>
                <a href="#" class="flex gap-4 items-center justify-between rounded-lg bg-brand-900 pl-4 pr-2 py-2 text-center font-medium text-white hover:bg-brand-600 shadow-lg shadow-brand-900/30">
                  <span>Mula</span>
                  <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                    <?php icon('arrow-right-line', ['icon_size' => '16']); ?>
                  </span>
                </a>
              </div>
              <div class="flex gap-3 items-center justify-between leading-none py-4 opacity-40">
                <div>
                  <div class="font-semibold text-brand-900">Tahap Cabaran</div>
                  <div class="my-2"><span class="font-semibold text-primary-700">30xp</span> &times; 1 - 50 soalan tersedia</div>
                  <div class="leading-none text-xs text-brand-500">Tiada Rekod</div>
                </div>
                <a href="#" class="flex gap-4 items-center justify-between rounded-lg bg-brand-900 pl-4 pr-2 py-2 text-center font-medium text-white hover:bg-brand-600 shadow-lg shadow-brand-900/30">
                  <span>Mula</span>
                  <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4">
                    <?php icon('arrow-right-line', ['icon_size' => '16']); ?>
                  </span>
                </a>
              </div>
            </div>
          </section>
          <section class="setup-level px-5 py-1 border-t border-brand-200 opacity--40">
            <h3 class="text-xs uppercase font-semibold text-brand-500 mb-2 leading-none mt-4">Nak Lebih Cabaran?</h3>
            <div class="divide-y divide-brand-200">
              <div class="flex gap-3 items-center justify-between leading-none py-4">
                <div>
                  <div class="font-semibold text-negative-700">Mod Maut</div>
                  <div class="my-2 leading-5">Pantang silap! Buktikan anda pakar Sejarah sejati di mana satu kesalahan bermakna anda kalah.</div>
                  <div class="leading-none text-xs text-brand-500">Tiada Rekod</div>
                </div>
                <a href="#" class="flex gap-4 items-center justify-between rounded-lg bg-negative-700 pl-4 pr-2 py-2 text-center font-medium text-white hover:bg-negative-600 shadow-lg shadow-negative-900/50">
                  <span>Mula</span>
                  <span class="flex size-6 items-center rounded-sm bg-negative-800 p-1 leading-4">
                    <?php icon('arrow-right-line', ['icon_size' => '16']); ?>
                  </span>
                </a>
              </div>
            </div>
          </section>
        </article>
      </section>
      
      <section class="column-1 w-full max-w-[400px] space-y-6">
        <article class="mobile-frame border border-dashed border-brand-300 rounded-lg py-5" aria-label="dont-include-this-mobile-frame-in-design">
          <h2 class="mb-5 text-[10px] text-brand-400 uppercase leading-none ml-2 -mt-2">Quiz Form Default</h2>
          <section class="progress m-5 mt-0">
            <div class="progressbar space-y-2">
              <div class="progressbar__meta flex items-center justify-between gap-3 text-xs font-medium text-brand-700">
                <span class="progressbar__label">Soalan 4/20</span>
                <span class="progressbar__value">25%</span>
              </div>
              <div class="progressbar__track overflow-hidden rounded-full h-2 bg-primary-200" role="progressbar" aria-label="Session Completion" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25">
                <span class="progressbar__fill block h-full rounded-full transition-[width] duration-300 ease-out bg-primary-600" style="width: 25%;"></span>
              </div>
            </div>
          </section>
          <section class="question relative font-mediums text-brand-800 p-4 border border-dashed border-brand-300 rounded-lg m-5 mt-0">
            <div class="question__meta flex items-center justify-between leading-none text-xs text-brand-500">
              <div class="question__module">T2 Sejarah Bab 1 - Tahap Asas</div>
              <div class="question__streak flex items-center">
                <div class="font-medium">0</div>
                <div class="ml-2">
                  <?php icon('flashlight-fill', ['icon_size' => '16']); ?>
                </div>
              </div>
            </div>
            <div class="question__text text-xl pt-6 pb-5">Apakah faktor utama yang membolehkan Srivijaya menguasai perdagangan maritim?</div>
            <div class="question__meta flex items-center justify-between leading-none text-xs text-brand-500">
              <div class="question__tags capitalize">Kerajaan, Analisis</div>
              <div class="question__timer">18s</div>
            </div>
          </section>
          <section class="answer flex flex-col gap-2 m-5 js-quiz-options" aria-label="is-default">
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">A</span>
              <span class="option__text">Kawasan gurun</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">B</span>
              <span class="option__text">Kedudukan di laluan perdagangan utama</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">C</span>
              <span class="option__text">Tiada hubungan luar</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">D</span>
              <span class="option__text">Sistem pengairan</span>
            </button>
          </section>
          <section class="respond m-5">
            <div class="respond__alt font-medium text-xs flex items-center justify-start mt-8 divide-x divide-brand-300 space-x-3">
              <div><a href="#" class="underline underline-offset-4 decoration-brand-300">Laporkan Masalah</a></div>
              <div class="pl-3"><a href="#" class="underline underline-offset-4 decoration-brand-300">Tinggalkan Kuiz</a></div>
              <div class="pl-3"><a href="#" class="underline underline-offset-4 decoration-brand-300">Langkau Dulu</a></div>
            </div>
          </section>
        </article>

        <article class="mobile-frame border border-dashed border-brand-300 rounded-lg py-5" aria-label="dont-include-this-mobile-frame-in-design">
          <h2 class="mb-5 text-[10px] text-brand-400 uppercase leading-none ml-2 -mt-2">Quiz Form Statements</h2>
          <section class="progress m-5 mt-0">
            <div class="progressbar space-y-2">
              <div class="progressbar__meta flex items-center justify-between gap-3 text-xs font-medium text-brand-700">
                <span class="progressbar__label">Soalan 14/20</span>
                <span class="progressbar__value">68%</span>
              </div>
              <div class="progressbar__track overflow-hidden rounded-full h-2 bg-primary-200" role="progressbar" aria-label="Session Completion" aria-valuemin="0" aria-valuemax="100" aria-valuenow="68">
                <span class="progressbar__fill block h-full rounded-full transition-[width] duration-300 ease-out bg-primary-600" style="width: 68%;"></span>
              </div>
            </div>
          </section>
          <section class="question relative font-mediums text-brand-800 p-4 border border-dashed border-brand-300 rounded-lg m-5 mt-0">
            <div class="question__meta flex items-center justify-between leading-none text-xs text-brand-500">
              <div class="question__module">T2 Sejarah Bab 1 - Tahap Asas</div>
              <div class="question__streak flex items-center">
                <div class="font-medium">0</div>
                <div class="ml-2">
                  <?php icon('flashlight-fill', ['icon_size' => '16']); ?>
                </div>
              </div>
            </div>
            <div class="question__text text-base pt-6 pb-5">
              Apakah kesan kehilangan hubungan perdagangan luar?
              <ol class="question__statements text-sm mt-2 space-y-1">
                <li class="pl-1">
                  <?php component('checkbox', [
                    'id'          => 'quiz-statement-economic-decline',
                    'name'        => 'quiz_statement[]',
                    'value'       => 'economic_decline',
                    'label'       => 'Kemerosotan ekonomi',
                    'class'       => 'items-start',
                    'input_class' => 'js-quiz-statement-input',
                    'attributes'  => [
                      'data-quiz-statement' => '1',
                    ],
                  ]); ?>
                </li>
                <li class="pl-1">
                  <?php component('checkbox', [
                    'id'          => 'quiz-statement-cultural-exchange',
                    'name'        => 'quiz_statement[]',
                    'value'       => 'cultural_exchange_reduction',
                    'label'       => 'Pengurangan pertukaran budaya',
                    'class'       => 'items-start',
                    'input_class' => 'js-quiz-statement-input',
                    'attributes'  => [
                      'data-quiz-statement' => '2',
                    ],
                  ]); ?>
                </li>
                <li class="pl-1">
                  <?php component('checkbox', [
                    'id'          => 'quiz-statement-global-influence',
                    'name'        => 'quiz_statement[]',
                    'value'       => 'global_influence_increase',
                    'label'       => 'Peningkatan pengaruh global',
                    'class'       => 'items-start',
                    'input_class' => 'js-quiz-statement-input',
                    'attributes'  => [
                      'data-quiz-statement' => '3',
                    ],
                  ]); ?>
                </li>
                <li class="pl-1">
                  <?php component('checkbox', [
                    'id'          => 'quiz-statement-diplomatic-relations',
                    'name'        => 'quiz_statement[]',
                    'value'       => 'diplomatic_relations_increase',
                    'label'       => 'Pertambahan hubungan diplomatik',
                    'class'       => 'items-start',
                    'input_class' => 'js-quiz-statement-input',
                    'attributes'  => [
                      'data-quiz-statement' => '4',
                    ],
                  ]); ?>
                </li>
              </ol>
            </div>
            <div class="question__meta flex items-center justify-between leading-none text-xs text-brand-500">
              <div class="question__tags capitalize">Kerajaan, Analisis</div>
              <div class="question__timer">18s</div>
            </div>
          </section>
          <section class="answer flex flex-col gap-2 m-5 js-quiz-options" aria-label="is-default">
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400 js-quiz-answer-option"
              data-quiz-answer="A"
              data-quiz-answer-statements="1,3"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">A</span>
              <span class="option__text">I dan III</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400 js-quiz-answer-option"
              data-quiz-answer="B"
              data-quiz-answer-statements="3,4"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">B</span>
              <span class="option__text">III dan IV</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400 js-quiz-answer-option"
              data-quiz-answer="C"
              data-quiz-answer-statements="2,4"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">C</span>
              <span class="option__text">II dan IV</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400 js-quiz-answer-option"
              data-quiz-answer="D"
              data-quiz-answer-statements="1,2"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">D</span>
              <span class="option__text">I dan II</span>
            </button>
          </section>
          <section class="respond m-5">
            <div class="respond__alt font-medium text-xs flex items-center justify-start mt-8 divide-x divide-brand-300 space-x-3">
              <div><a href="#" class="underline underline-offset-4 decoration-brand-300">Laporkan Masalah</a></div>
              <div class="pl-3"><a href="#" class="underline underline-offset-4 decoration-brand-300">Tinggalkan Kuiz</a></div>
              <div class="pl-3"><a href="#" class="underline underline-offset-4 decoration-brand-300">Langkau Dulu</a></div>
            </div>
          </section>
        </article>
      </section>

      <section class="column-1 w-full max-w-[400px] space-y-6">
        <article class="mobile-frame border border-dashed border-brand-300 rounded-lg pt-5 relative overflow-hidden" aria-label="dont-include-this-mobile-frame-in-design">
          <h2 class="mb-5 text-[10px] text-brand-400 uppercase leading-none ml-2 -mt-2">Quiz Form Marked Correct</h2>
          <section class="progress m-5 mt-0">
            <div class="progressbar space-y-2">
              <div class="progressbar__meta flex items-center justify-between gap-3 text-xs font-medium text-brand-700">
                <span class="progressbar__label">Soalan 14/20</span>
                <span class="progressbar__value">68%</span>
              </div>
              <div class="progressbar__track overflow-hidden rounded-full h-2 bg-primary-200" role="progressbar" aria-label="Session Completion" aria-valuemin="0" aria-valuemax="100" aria-valuenow="68">
                <span class="progressbar__fill block h-full rounded-full transition-[width] duration-300 ease-out bg-primary-600" style="width: 68%;"></span>
              </div>
            </div>
          </section>
          <section class="question relative font-mediums text-brand-800 p-4 border border-dashed border-brand-300 rounded-lg m-5 mt-0">
            <div class="question__meta flex items-center justify-between leading-none text-xs text-brand-500">
              <div class="question__module">T2 Sejarah Bab 1 - Tahap Asas</div>
              <div class="question__streak flex items-center">
                <div class="font-medium">0</div>
                <div class="ml-2">
                  <?php icon('flashlight-fill', ['icon_size' => '16']); ?>
                </div>
              </div>
            </div>
            <div class="question__text text-base pt-6 pb-5">
              Apakah kesan kehilangan hubungan perdagangan luar?
              <ol class="question__statements text-sm mt-2 space-y-1">
                <li class="pl-1">
                  <?php component('checkbox', [
                    'id'          => 'quiz-marked-correct-statement-economic-decline',
                    'name'        => 'quiz_marked_correct_statement[]',
                    'value'       => 'economic_decline',
                    'label'       => 'Kemerosotan ekonomi',
                    'checked'     => true,
                    'class'       => 'items-start',
                    'input_class' => 'js-quiz-statement-input',
                    'attributes'  => [
                      'data-quiz-statement' => '1',
                    ],
                  ]); ?>
                </li>
                <li class="pl-1">
                  <?php component('checkbox', [
                    'id'          => 'quiz-marked-correct-statement-cultural-exchange',
                    'name'        => 'quiz_marked_correct_statement[]',
                    'value'       => 'cultural_exchange_reduction',
                    'label'       => 'Pengurangan pertukaran budaya',
                    'class'       => 'items-start',
                    'input_class' => 'js-quiz-statement-input',
                    'attributes'  => [
                      'data-quiz-statement' => '2',
                    ],
                  ]); ?>
                </li>
                <li class="pl-1">
                  <?php component('checkbox', [
                    'id'          => 'quiz-marked-correct-statement-global-influence',
                    'name'        => 'quiz_marked_correct_statement[]',
                    'value'       => 'global_influence_increase',
                    'label'       => 'Peningkatan pengaruh global',
                    'class'       => 'items-start',
                    'input_class' => 'js-quiz-statement-input',
                    'attributes'  => [
                      'data-quiz-statement' => '3',
                    ],
                  ]); ?>
                </li>
                <li class="pl-1">
                  <?php component('checkbox', [
                    'id'          => 'quiz-marked-correct-statement-diplomatic-relations',
                    'name'        => 'quiz_marked_correct_statement[]',
                    'value'       => 'diplomatic_relations_increase',
                    'label'       => 'Pertambahan hubungan diplomatik',
                    'class'       => 'items-start',
                    'input_class' => 'js-quiz-statement-input',
                    'attributes'  => [
                      'data-quiz-statement' => '4',
                    ],
                  ]); ?>
                </li>
              </ol>
            </div>
            <div class="question__meta flex items-center justify-between leading-none text-xs text-brand-500">
              <div class="question__tags capitalize">Kerajaan, Analisis</div>
              <div class="question__timer">18s</div>
            </div>
          </section>
          <section
            class="answer flex flex-col gap-2 m-5 js-quiz-options"
            aria-label="is-default"
            data-confetti
            data-mode="fireworks"
          >
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400 js-quiz-answer-option"
              data-quiz-answer="A"
              data-quiz-answer-statements="1,3"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">A</span>
              <span class="option__text">I dan III</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400 js-quiz-answer-option"
              data-quiz-answer="B"
              data-quiz-answer-statements="3,4"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">B</span>
              <span class="option__text">III dan IV</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400 js-quiz-answer-option"
              data-quiz-answer="C"
              data-quiz-answer-statements="2,4"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">C</span>
              <span class="option__text">II dan IV</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-200 bg-white px-2 py-2 text-left cursor-pointer hover:border-primary-400 hover:ring-brand-400 js-quiz-answer-option"
              data-quiz-answer="D"
              data-quiz-answer-statements="1,2"
              data-quiz-mark-correct="true"
            >
              <span class="option__key h-6 w-8 text-xs leading-6 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 group-hover:ring-brand-800 group-hover:bg-brand-800 group-hover:text-white">D</span>
              <span class="option__text">I dan II</span>
              <template data-quiz-correct-icon>
                <?php icon('check-line', ['icon_size' => '16']); ?>
              </template>
            </button>
          </section>
          <section class="respond bg-white p-5 pb-10 border-t border-brand-200">
            <div class="quiz__feedback">
              <div class="respond__title mb-3 font-semibold text-positive-700 leading-5 uppercase flex items-center justify-between">
                <span>Mantap, Tepat Sekali!</span>
                <span class="ml-2 inline-flex items-center gap-1 capitalize bg-primary-100 font-semibold text-primary-700 rounded-sm py-1 pr-2.5 pl-1.5">
                  <?php icon('add-line', ['icon_size' => '16']); ?>
                  <span>20xp</span>
                </span>
              </div>
              <div class="respond__feedback text-bases pl-4 border-l-2 border-brand-400">Kedudukan strategik Srivijaya membolehkannya menguasai laluan perdagangan maritim.</div>
              <div class="respond__reference mt-4 text-xs font-medium text-brand-600">
                Rujukan: Bab 1.3 Kerajaan Alam Melayu yang Masyhur
              </div>
            </div>

            <a href="#" class="respond__action flex w-full items-center justify-between rounded-lg bg-brand-900 py-3 pl-5 pr-4 text-base leading-5 text-center font-medium text-white hover:bg-brand-800 mt-5 shadow-lg shadow-brand-900/30">
              <span>Soalan Seterusnya</span>
              <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4 animate-bounce-x">
                <?php icon('arrow-right-line', ['icon_size' => '16']); ?>
              </span>
            </a>

            <div class="respond__alt font-medium text-xs flex items-center justify-start mt-8 divide-x divide-brand-300 space-x-3">
              <div><a href="#" class="underline underline-offset-4 decoration-brand-300">Laporkan Masalah</a></div>
              <div class="pl-3"><a href="#" class="underline underline-offset-4 decoration-brand-300">Tinggalkan Kuiz</a></div>
            </div>
          </section>
        </article>
        <article class="h-[800px] mobile-frame border border-dashed border-brand-300 rounded-lg pt-5 overflow-hidden relative" aria-label="dont-include-this-mobile-frame-in-design">
          <h2 class="mb-5 text-[10px] text-brand-400 uppercase leading-none ml-2 -mt-2">Quiz Form Marked Error</h2>
          <section class="progress m-5 mt-0">
            <div class="progressbar space-y-2">
              <div class="progressbar__meta flex items-center justify-between gap-3 text-xs font-medium text-brand-700">
                <span class="progressbar__label">Soalan 19/20 selesai</span>
                <span class="progressbar__value">95%</span>
              </div>
              <div class="progressbar__track overflow-hidden rounded-full h-2 bg-primary-200" role="progressbar" aria-label="Session Completion" aria-valuemin="0" aria-valuemax="100" aria-valuenow="95">
                <span class="progressbar__fill block h-full rounded-full transition-[width] duration-300 ease-out bg-primary-600" style="width: 95%;"></span>
              </div>
            </div>
          </section>
          <section class="question relative font-mediums text-brand-800 p-4 border border-dashed border-brand-300 rounded-lg m-5 mt-0">
            <div class="question__meta flex items-center justify-between leading-none text-xs text-brand-500">
              <div class="question__module">T2 Sejarah Bab 1 - Tahap Asas</div>
              <div class="question__streak text-attention-500 flex items-center">
                <div class="font-medium">3</div>
                <div class="ml-2">
                  <?php icon('flashlight-fill', ['icon_size' => '16']); ?>
                </div>
              </div>
            </div>
            <div class="question__text text-xl pt-6 pb-5">Apakah faktor utama yang membolehkan Srivijaya menguasai perdagangan maritim?</div>
            <div class="question__meta flex items-center justify-between leading-none text-xs text-brand-500">
              <div class="question__tags capitalize">KBAT, Pentadbiran</div>
              <div class="question__timer">18s</div>
            </div>
          </section>
          <section
            class="answer flex flex-col gap-2 m-5 js-quiz-options"
            aria-label="is-marked"
            data-confetti
            data-mode="fireworks"
          >
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-300 bg-white px-2 py-2 text-left opacity-60"
            >
              <span class="option__key h-6 w-8 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 text-xs leading-6">A</span>
              <span class="option__text">Kawasan gurun</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-center gap-3 rounded-lg ring-1 ring-positive-500 bg-positive-400 px-2 py-2 text-left text-positive-900"
              data-confetti-trigger
            >
              <span class="option__key h-6 w-8 flex shrink-0 items-center justify-center rounded-md bg-positive-700 text-white ring-1 ring-positive-700 text-xs leading-6">
                <?php icon('check-line', ['icon_size' => '16']); ?>
              </span>
              <span class="option__text">Kedudukan di laluan perdagangan utama</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-center gap-3 rounded-lg ring-1 ring-negative-300 bg-negative-100 px-2 py-2 text-left text-negative-900"
            >
              <span class="option__key h-6 w-8 flex shrink-0 items-center justify-center rounded-md bg-negative-600 text-white ring-1 ring-negative-600 text-xs leading-6">
                <?php icon('close-line', ['icon_size' => '16']); ?>
              </span>
              <span class="option__text">Tiada hubungan luar</span>
            </button>
            <button
              type="button"
              class="answer__option group leading-6 flex w-full items-start gap-3 rounded-lg ring-1 ring-brand-300 bg-white px-2 py-2 text-left opacity-60"
            >
              <span class="option__key h-6 w-8 flex shrink-0 items-start justify-center rounded-md ring-1 ring-brand-200 bg-brand-100 text-brand-500 text-xs leading-6">D</span>
              <span class="option__text">Sistem pengairan</span>
            </button>
          </section>
          <section class="respond bg-white p-5 pb-10 border-t border-brand-200">
            <div class="quiz__feedback">
              <div class="respond__title mb-3 font-semibold text-negative-700 leading-5 uppercase flex items-center justify-between">
                <span>Ops, Bukan Yang Ini</span>
              </div>
              <div class="respond__feedback text-bases pl-4 border-l-2 border-negative-400">Kedudukan strategik Srivijaya membolehkannya menguasai laluan perdagangan maritim.</div>
              <div class="respond__reference mt-4 text-xs font-medium text-brand-600">
                Rujukan: Bab 1.3 Kerajaan Alam Melayu yang Masyhur
              </div>
            </div>

            <a href="#" class="respond__action flex w-full items-center justify-between rounded-lg bg-brand-900 py-3 pl-5 pr-4 text-base leading-5 text-center font-medium text-white hover:bg-brand-800 mt-5 shadow-lg shadow-brand-900/30">
              <span>Soalan Seterusnya</span>
              <span class="flex size-6 items-center rounded-sm bg-brand-700 p-1 leading-4 animate-bounce-x">
                <?php icon('arrow-right-line', ['icon_size' => '16']); ?>
              </span>
            </a>

            <div class="respond__alt font-medium text-xs flex items-center justify-start mt-8 divide-x divide-brand-300 space-x-3">
              <div><a href="#" class="underline underline-offset-4 decoration-brand-300">Laporkan Masalah</a></div>
              <div class="pl-3"><a href="#" class="underline underline-offset-4 decoration-brand-300">Tinggalkan Kuiz</a></div>
            </div>
          </section>
        </article>
      </section>
    </div>
  </section>
</article>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const get_statement_ids = (value) => value
      .split(',')
      .map((statement_id) => statement_id.trim())
      .filter((statement_id) => statement_id !== '');

    const get_answer_statement_ids = (answer_button) => get_statement_ids(answer_button.dataset.quizAnswerStatements || '');

    const answer_matches_statements = (answer_statement_ids, selected_statement_ids) => selected_statement_ids
      .every((statement_id) => answer_statement_ids.includes(statement_id));

    const set_answer_disabled = (answer_button, is_disabled) => {
      answer_button.disabled = is_disabled;
      answer_button.setAttribute('aria-disabled', is_disabled ? 'true' : 'false');
      answer_button.classList.toggle('opacity-50', is_disabled);
      answer_button.classList.toggle('cursor-not-allowed', is_disabled);
    };

    const set_answer_selected = (answer_button, is_selected) => {
      answer_button.setAttribute('aria-pressed', is_selected ? 'true' : 'false');
      answer_button.classList.toggle('ring-primary-500', is_selected);
      answer_button.classList.toggle('bg-primary-50', is_selected);
      answer_button.classList.toggle('text-primary-900', is_selected);
    };

    const set_statement_disabled = (statement_input, is_disabled) => {
      const statement_label = statement_input.closest('label');
      const statement_label_text = statement_label instanceof HTMLElement
        ? statement_label.querySelector('.choice__label')
        : null;

      statement_input.disabled = is_disabled;

      if (statement_label instanceof HTMLElement) {
        statement_label.classList.toggle('opacity-50', is_disabled);
        statement_label.classList.toggle('cursor-not-allowed', is_disabled);
      }

      if (statement_label_text instanceof HTMLElement) {
        statement_label_text.classList.toggle('line-through', is_disabled);
      }
    };

    const init_quiz_statement_rules = (quiz_node) => {
      const statement_inputs = Array.from(quiz_node.querySelectorAll('.js-quiz-statement-input'));
      const answer_buttons = Array.from(quiz_node.querySelectorAll('.js-quiz-answer-option'));
      let selected_answer = null;

      if (statement_inputs.length === 0 || answer_buttons.length === 0) {
        return;
      }

      const get_selected_statement_ids = () => statement_inputs
        .filter((statement_input) => statement_input.checked)
        .map((statement_input) => statement_input.dataset.quizStatement || '')
        .filter((statement_id) => statement_id !== '');

      const sync_statement_options = () => {
        const selected_statement_ids = get_selected_statement_ids();

        statement_inputs.forEach((statement_input) => {
          const statement_id = statement_input.dataset.quizStatement || '';
          const next_selected_statement_ids = selected_statement_ids.includes(statement_id)
            ? selected_statement_ids
            : selected_statement_ids.concat(statement_id);
          const has_matching_answer = answer_buttons.some((answer_button) => {
            const answer_statement_ids = get_answer_statement_ids(answer_button);

            return answer_matches_statements(answer_statement_ids, next_selected_statement_ids);
          });
          const is_disabled = !statement_input.checked && !has_matching_answer;

          if (is_disabled) {
            statement_input.checked = false;
          }

          set_statement_disabled(statement_input, is_disabled);
        });
      };

      const sync_answer_options = () => {
        const selected_statement_ids = get_selected_statement_ids();

        answer_buttons.forEach((answer_button) => {
          const answer_statement_ids = get_answer_statement_ids(answer_button);
          const is_disabled = !answer_matches_statements(answer_statement_ids, selected_statement_ids);

          if (is_disabled && answer_button === selected_answer) {
            selected_answer = null;
          }

          set_answer_disabled(answer_button, is_disabled);
          set_answer_selected(answer_button, answer_button === selected_answer);
        });
      };

      const sync_quiz_rules = () => {
        sync_statement_options();
        sync_answer_options();
      };

      const mark_answer_correct = (answer_button) => {
        const option_key = answer_button.querySelector('.option__key');
        const icon_template = answer_button.querySelector('template[data-quiz-correct-icon]');
        const confetti_node = answer_button.closest('[data-confetti]');

        answer_button.classList.remove(
          'items-start',
          'ring-brand-200',
          'bg-white',
          'hover:border-primary-400',
          'hover:ring-brand-400',
          'ring-primary-500',
          'bg-primary-50',
          'text-primary-900',
        );
        answer_button.classList.add(
          'items-center',
          'ring-positive-500',
          'bg-positive-400',
          'text-positive-900',
        );
        answer_button.dataset.quizMarkedCorrect = 'true';

        if (option_key instanceof HTMLElement) {
          option_key.classList.remove(
            'items-start',
            'ring-brand-200',
            'bg-brand-100',
            'text-brand-500',
            'group-hover:ring-brand-800',
            'group-hover:bg-brand-800',
            'group-hover:text-white',
          );
          option_key.classList.add(
            'items-center',
            'ring-positive-700',
            'bg-positive-700',
            'text-white',
          );

          if (icon_template instanceof HTMLTemplateElement) {
            option_key.replaceChildren(icon_template.content.cloneNode(true));
          }
        }

        if (confetti_node instanceof HTMLElement) {
          confetti_node.dispatchEvent(new CustomEvent('confetti:fire'));
        }
      };

      statement_inputs.forEach((statement_input) => {
        statement_input.addEventListener('change', sync_quiz_rules);
      });

      answer_buttons.forEach((answer_button) => {
        answer_button.addEventListener('click', () => {
          if (answer_button.disabled) {
            return;
          }

          selected_answer = selected_answer === answer_button ? null : answer_button;
          sync_answer_options();

          if (answer_button.dataset.quizMarkCorrect === 'true' && answer_button.dataset.quizMarkedCorrect !== 'true') {
            mark_answer_correct(answer_button);
          }
        });
      });

      sync_quiz_rules();
    };

    document.querySelectorAll('.question__statements').forEach((statements_node) => {
      const quiz_node = statements_node.closest('article');

      if (quiz_node instanceof HTMLElement) {
        init_quiz_statement_rules(quiz_node);
      }
    });
  });
</script>
<?php layout('kuiz/partials/kuiz-end'); ?>
