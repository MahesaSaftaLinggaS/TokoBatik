<div class="bg-white shadow rounded-lg border border-transparent hover:border-blue-400 transition-all duration-300 overflow-hidden w-full h-full flex flex-col">
  
  <!-- Bagian yang bisa diklik ke detail -->
  <a wire:navigate href="/product/{{ $product->id }}/details" class="flex flex-col h-full">
    <!-- Gambar Produk -->
    <img 
      src="{{ $product->image ?? asset('images/placeholder-image.jpg') }}" 
      alt="product-images" 
      class="w-full h-48 md:h-56 object-cover"
    >

    <!-- Konten Produk -->
    <div class="p-4 flex flex-col justify-between flex-grow">
      <div class="space-y-2">
        <h2 class="text-base font-semibold text-gray-800 line-clamp-1">{{ $product->name }}</h2>
        <p class="text-sm text-gray-600 line-clamp-2">{{ $product->description }}</p>

        <!-- Kategori dan Harga -->
        <div class="flex flex-col gap-1 text-sm mt-2">
          <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full w-fit text-xs sm:text-sm">
            {{ $product->category->name }}
          </span>
          <span class="font-semibold text-gray-900 text-sm sm:text-base">
            Rp{{ number_format($product->price, 0, ',', '.') }}
          </span>
        </div>
      </div>
    </div>
  </a>

  <!-- Tombol di luar link -->
  <div class="px-4 pb-4 mt-auto">
    @if (auth()->check())
      <button 
        wire:click.prevent="addToCart({{ $product->id }})"
        class="w-full flex items-center justify-center gap-2 rounded bg-blue-600 px-4 py-2 text-white text-sm font-medium hover:bg-blue-700 focus:ring focus:ring-blue-300 active:bg-blue-500 transition"
      >
        <div wire:loading class="animate-spin size-4 border-[3px] border-white border-t-transparent rounded-full" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.4..." />
        </svg>
        <span>Tambah ke Keranjang</span>
      </button>
    @else
      <a 
        wire:navigate 
        href="/auth/login"
        class="w-full flex items-center justify-center gap-2 rounded bg-blue-600 px-4 py-2 text-white text-sm font-medium hover:bg-blue-700 focus:ring focus:ring-blue-300 active:bg-blue-500 transition"
      >
        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.4..." />
        </svg>
        <span>Tambah ke Keranjang</span>
      </a>
    @endif
  </div>

</div>
