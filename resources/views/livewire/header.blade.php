<header class="bg-white shadow-sm">
  <div class="mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo & Brand -->
      <a href="/" class="flex items-center space-x-2 text-blue-600 hover:text-blue-700 transition">
        <svg class="h-8 w-8" viewBox="0 0 28 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <!-- Ganti dengan icon batik -->
          <path d="..." fill="currentColor" />
        </svg>
        <span class="text-lg font-semibold tracking-wide">Batik Bunga</span>
      </a>

      <!-- Navigation -->
      <nav class="hidden md:flex gap-6 items-center text-sm">
        <a href="/" wire:navigate class="transition hover:text-gray-700 {{ Request::is('/') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Home</a>
        <a href="/all/products" wire:navigate class="transition hover:text-gray-700 {{ Request::is('all/products') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Cari Lebih Banyak</a>
        <a href="/about" wire:navigate class="transition hover:text-gray-700 {{ Request::is('about') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Tentang kami</a>
        <a href="/contacts" wire:navigate class="transition hover:text-gray-700 {{ Request::is('contacts') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Kontak kami</a>
      </nav>

      <!-- Right Actions -->
      <div class="flex items-center gap-4">
        <div class="hidden sm:flex sm:items-center sm:gap-4">
          @if (auth()->check())
            <livewire:shopping-cart-icon />
            <a href="/admin/dashboard" class="rounded-md bg-gray-600 px-5 py-2.5 text-sm font-medium text-gray-200 hover:bg-gray-700 transition mr-2">
              Admin Dashboard
            </a>
            <form method="POST" action="/auth/logout" class="inline">
              @csrf
              <button type="submit" class="hover:text-red-700 transition flex items-center">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"></path>
                </svg>
                <span class="ml-1">Logout</span>
              </button>
            </form>
          @else
            <a href="/auth/login" class="rounded-md bg-blue-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-700 transition">
              Login
            </a>
          @endif
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="md:hidden rounded p-2 text-gray-600 hover:text-gray-800 transition">
          <span class="sr-only">Toggle menu</span>
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</header>