<div>
  <nav class="bg-blue-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            {{-- <img class="size-8" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" /> --}}
            <h1 class="text-xl text-white font-semibold">E-Prescription</h1>
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-blue-900 text-white", Default: "text-blue-300 hover:bg-blue-700 hover:text-white" -->
              <a href="/resep" class="rounded-md px-3 py-2 text-sm font-medium {{request()->is('resep') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Resep</a>
              <a href="/pasien" class="rounded-md px-3 py-2 text-sm font-medium {{request()->is('pasien') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Pasien</a>
              <a href="/dokter" class="rounded-md px-3 py-2 text-sm font-medium {{request()->is('dokter') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Dokter</a>
              <a href="/obat" class="rounded-md px-3 py-2 text-sm font-medium {{request()->is('obat') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Obat</a>
              <a href="/obatRacik" class="rounded-md px-3 py-2 text-sm font-medium {{request()->is('obatRacik') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Obat Racikan</a>
              <a href="{{route('logout')}}" class="rounded-md px-3 py-2 text-sm font-medium text-blue-300 hover:bg-blue-700 hover:text-white">Logout</a>
            </div>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-blue-800 p-2 text-blue-400 hover:bg-blue-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-800 focus:outline-hidden" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <!-- Menu open: "hidden", Menu closed: "block" -->
            <svg class="block size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <!-- Menu open: "block", Menu closed: "hidden" -->
            <svg class="hidden size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-blue-900 text-white", Default: "text-blue-300 hover:bg-blue-700 hover:text-white" -->
        <a href="/resep" class="block rounded-md px-3 py-2 text-base font-medium {{request()->is('resep') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Resep</a>
        <a href="/pasien" class="block rounded-md px-3 py-2 text-base font-medium {{request()->is('pasien') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Pasien</a>
        <a href="/dokter" class="block rounded-md px-3 py-2 text-base font-medium {{request()->is('dokter') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Dokter</a>
        <a href="/obat" class="block rounded-md px-3 py-2 text-base font-medium {{request()->is('obat') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Obat</a>
        <a href="/obatRacik" class="block rounded-md px-3 py-2 text-base font-medium {{request()->is('obatRacik') ? 'text-white bg-blue-900' : 'text-blue-300 hover:bg-blue-700 hover:text-white'}}">Obat Racikan</a>
      </div>
    </div>
  </nav>

</div>