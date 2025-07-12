<div class="bg-white">
  <!-- Container pembatas lebar -->
  <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
      
      <!-- Gambar -->
      <div class="w-full lg:w-1/3">
        <div class="w-full aspect-[4/3] max-h-[320px] overflow-hidden rounded-lg">
          <img 
            src="{{ $product->image ?? asset('images/placeholder-image.jpg') }}" 
            alt="product-images" 
            class="w-full h-full object-cover"
          >
        </div>
      </div>

      <!-- Konten -->
      <div class="flex-1">
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $product->name }}</h2>
        <p class="text-gray-600 mb-4">{{ $product->description }}</p>

        <div class="flex flex-col sm:flex-row sm:items-center sm:gap-6 gap-2 mb-4">
          <div class="bg-green-100 text-green-800 px-3 py-1 rounded-md w-fit text-sm">
            {{ $product->category->name }}
          </div>
          <div class="text-lg sm:text-xl font-semibold text-gray-900">
            Rp {{ number_format($product->price, 0, ',', '.') }}
          </div>
        </div>

        <!-- Tombol -->
        <div>
          @if (auth()->check())
            <button wire:click="addToCart({{ $product->id }})" class="w-full sm:w-auto flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow text-sm font-medium transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 3h1.386..." />
              </svg>
              <span>Tambah Ke Keranjang</span>
            </button>
          @else
            <a wire:navigate href="/auth/login" class="w-full sm:w-auto flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded shadow text-sm font-medium transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 3h1.386..." />
              </svg>
              <span>Tambah Ke Keranjang</span>
            </a>
          @endif
        </div>
      </div>
    </div>

    <!-- Produk Terkait -->
    <div class="mt-12">
      <h2 class="text-xl font-semibold mb-4">Produk Terkait</h2>
      <livewire:product-listing :category_id="$product->category_id" :current_product_id="$product->id"/>
    </div>
  </div>
</div>
