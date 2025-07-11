<section class="bg-gradient-to-br from-blue-50 via-white to-blue-100">
  <div class="mx-auto max-w-screen-xl px-4 py-20 lg:py-28 lg:flex lg:items-center lg:justify-between">
    
    <div class="text-center lg:text-left max-w-xl mx-auto">
      <h1 class="text-4xl font-extrabold text-gray-800 sm:text-5xl leading-tight">
        Toko Batik
        <span class="block text-blue-700 mt-1 text-3xl sm:text-4xl">Karya Tradisi, Gaya Masa Kini</span>
      </h1>

      <p class="mt-6 text-lg text-gray-600 sm:text-xl">
        Nikmati pengalaman berbelanja online yang mudah, aman, dan penuh gaya.
        Jelajahi ragam produk pilihan kami yang memadukan budaya dengan tren modern.
      </p>

      <div class="mt-10 flex flex-wrap justify-center lg:justify-start gap-4">
        @if (auth()->check())
          <a
            href="/offer"
            class="inline-flex items-center justify-center rounded bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700 shadow transition"
          >
            Tukar Sekarang Khusus untuk mu
          </a>
        @else
          <a
            href="/auth/login"
            class="inline-flex items-center justify-center rounded bg-blue-600 px-6 py-3 text-sm font-semibold text-white hover:bg-blue-700 shadow transition"
          >
            Dapatkan Sekarang
          </a>
        @endif

        <a
          wire:navigate
          href="all/products"
          class="inline-flex items-center justify-center rounded border border-blue-600 px-6 py-3 text-sm font-semibold text-blue-600 hover:text-white hover:bg-blue-600 shadow transition"
        >
          Explore More
        </a>
      </div>
    </div>

  </div>
</section>