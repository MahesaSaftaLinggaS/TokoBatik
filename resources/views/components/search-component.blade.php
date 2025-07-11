<section class="relative bg-gradient-to-br from-white to-slate-100 py-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
  <div class="max-w-3xl mx-auto text-center">
    <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-800">
      Temukan Koleksi Terbaik
    </h1>
    <p class="mt-4 text-lg text-gray-600">
      Jelajahi ragam batik dengan karakter budaya dan desain masa kini.
    </p>

    <!-- Form Search -->
    <div class="mt-10 relative">
      <form>
        <div class="flex flex-col sm:flex-row gap-3 items-center bg-white rounded-xl shadow-md border px-4 py-3 relative z-10">
          <input 
            type="text"
            wire:model.live.debounce.300ms="searchTerm"
            placeholder="Cari produk batik..."
            class="w-full rounded-md border-none focus:ring-2 focus:ring-blue-500 text-sm py-2.5 px-4"
          />
          <a href="#" class="inline-flex justify-center items-center w-11 h-11 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>
            </svg>
          </a>
        </div>
      </form>

      <!-- Ornamental SVG top right -->
      <div class="hidden md:block absolute top-[-40px] end-[-60px]">
        <svg class="w-20 h-auto text-orange-400" viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M5 16C11.8 27 21 57 5 89" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
          <path d="M34 112C45 98 74 57 83 5" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
          <path d="M50 130C68 127 111 117 116 78" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
        </svg>
      </div>

      <!-- Ornamental SVG bottom left -->
      <div class="hidden md:block absolute bottom-[-60px] start-[-80px]">
        <svg class="w-48 h-auto text-cyan-500" viewBox="0 0 347 188" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M4 82C55 92 31 162 68 181C113 203 128 78 122 25C120 2 93 -8 90 25C86 61 130 199 181 146L215 107C224 95 243 79 259 107C274 135 299 126 310 118L343 93" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
        </svg>
      </div>
    </div>

    <!-- Categories Section -->
    <div class="mt-14">
      @foreach ($categories as $category)
        @include('components.categories', [
          'categoryName' => $category->name,
          'category_id' => $category->id
        ])
      @endforeach
    </div>
  </div>
</section>