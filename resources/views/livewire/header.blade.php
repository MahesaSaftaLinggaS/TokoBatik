<header x-data="{ open: false }" class="bg-white shadow-sm relative z-50">
  <div class="mx-auto max-w-screen-xl px-4 md:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      
      <!-- Logo & Brand -->
      <a href="/" class="flex items-center space-x-2 text-blue-600 hover:text-blue-700 transition">
        <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 28 24" xmlns="http://www.w3.org/2000/svg">
          <path d="..." />
        </svg>
        <span class="text-lg font-semibold tracking-wide">Batik Bunga</span>
      </a>

      <!-- Desktop Navigation -->
      <nav class="hidden md:flex gap-6 items-center text-sm">
        <a href="/" wire:navigate class="transition hover:text-gray-700 {{ Request::is('/') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Home</a>
        <a href="/all/products" wire:navigate class="transition hover:text-gray-700 {{ Request::is('all/products') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Cari Lebih Banyak</a>
        <a href="/about" wire:navigate class="transition hover:text-gray-700 {{ Request::is('about') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Tentang Kami</a>
        <a href="/contacts" wire:navigate class="transition hover:text-gray-700 {{ Request::is('contacts') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Kontak Kami</a>
      </nav>

      <!-- Right Actions (Desktop) -->
      <div class="hidden md:flex items-center gap-4">
        @if (auth()->check())
          <livewire:shopping-cart-icon />
          <a href="/admin/dashboard" class="bg-gray-600 px-4 py-2 rounded-md text-white text-sm hover:bg-gray-700">Admin Dashboard</a>
          <form method="POST" action="/auth/logout" class="inline">
            @csrf
            <button type="submit" class="flex items-center text-sm hover:text-red-600">
              <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"/>
              </svg>
              Logout
            </button>
          </form>
        @else
          <a href="/auth/login" class="bg-blue-600 px-4 py-2 rounded-md text-white text-sm hover:bg-blue-700">Login</a>
        @endif
      </div>

      <!-- Mobile Menu Toggle -->
      <button @click="open = !open" class="md:hidden text-gray-600 hover:text-gray-800 transition">
        <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="open" x-transition class="md:hidden absolute top-16 inset-x-0 bg-white border-t border-gray-200 shadow-md">
    <nav class="flex flex-col px-4 py-4 text-sm space-y-2">
      <a href="/" wire:navigate class="{{ Request::is('/') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Home</a>
      <a href="/all/products" wire:navigate class="{{ Request::is('all/products') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Cari Lebih Banyak</a>
      <a href="/about" wire:navigate class="{{ Request::is('about') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Tentang Kami</a>
      <a href="/contacts" wire:navigate class="{{ Request::is('contacts') ? 'text-gray-700 font-bold' : 'text-gray-500' }}">Kontak Kami</a>

      <div class="border-t border-gray-200 pt-4 mt-4">
        @if (auth()->check())
          <livewire:shopping-cart-icon />
          <a href="/admin/dashboard" class="block rounded-md bg-gray-600 px-4 py-2 text-white text-sm hover:bg-gray-700 mb-2">Admin Dashboard</a>
          <form method="POST" action="/auth/logout">
            @csrf
            <button type="submit" class="w-full text-left text-sm text-red-600 hover:underline flex items-center">
              <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"/>
              </svg>
              Logout
            </button>
          </form>
        @else
          <a href="/auth/login" class="block rounded-md bg-blue-600 px-4 py-2 text-white text-sm hover:bg-blue-700">Login</a>
        @endif
      </div>
    </nav>
  </div>
</header>
