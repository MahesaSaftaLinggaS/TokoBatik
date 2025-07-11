<section class="bg-gray-50 py-10 px-4">
  <div class="max-w-4xl mx-auto">

    <h1 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-8">
      Keranjang Kamu
    </h1>

    <div class="space-y-6">
      @foreach($cartItems as $item)
        <div class="bg-white p-4 rounded-lg shadow-sm">
          <div class="flex flex-col items-center sm:flex-row sm:items-start sm:gap-6">
            <img src="{{ Storage::url($item->product->image) }}" alt="Product Image"
              class="w-32 h-32 rounded object-cover" />

            <div class="mt-4 sm:mt-0 w-full text-center sm:text-left">
              <h2 class="text-base font-semibold text-gray-900">{{ $item->product->name }}</h2>
              <p class="text-xs text-gray-600 mt-1">Size: {{ $item->product->size ?? '-' }} | Color: {{ $item->product->color ?? '-' }}</p>

              <div class="mt-3 flex flex-col sm:flex-row items-center justify-between gap-3">
                <label for="Line{{ $item->id }}Qty" class="sr-only">Jumlah</label>
                <input type="number" min="1" value="{{ $item->quantity }}"
                  id="Line{{ $item->id }}Qty"
                  wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                  class="w-20 h-9 text-sm text-center border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500" />

                <button wire:click="removeItem({{ $item->id }})"
                  class="text-gray-400 hover:text-red-600 transition" title="Hapus item">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Bagian ringkasan checkout (tetap seperti versi sebelumnya) --}}
    <div class="mt-10 border-t pt-6">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <dl class="text-sm text-gray-700 space-y-1 w-full sm:w-1/2">
          <div class="flex justify-between">
            <dt>Subtotal</dt>
            <dd>Rp{{ number_format($subtotal, 0, ',', '.') }}</dd>
          </div>
          <div class="flex justify-between">
            <dt>PPN</dt>
            <dd>Rp{{ number_format($vat, 0, ',', '.') }}</dd>
          </div>
          <div class="flex justify-between">
            <dt>Discount</dt>
            <dd>-Rp{{ number_format($discount, 0, ',', '.') }}</dd>
          </div>
          <div class="flex justify-between text-base font-semibold">
            <dt>Total</dt>
            <dd>Rp{{ number_format($total, 0, ',', '.') }}</dd>
          </div>
        </dl>

        <div class="space-y-2 w-full sm:w-auto">
          @if ($discount > 0)
            <div class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-medium text-indigo-700">
              <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18M3.375 5.25a1.125 1.125 0 00-1.125 1.125v3.026a3 3 0 010 5.198v3.026a1.125 1.125 0 001.125 1.125h17.25a1.125 1.125 0 001.125-1.125v-3.026a3 3 0 010-5.198V6.375A1.125 1.125 0 0020.625 5.25H3.375z"/>
              </svg>
              1 Diskon diterapkan
            </div>
          @endif

          <div class="flex flex-col sm:flex-row gap-3 mt-2">
            <a href="/" class="w-full sm:w-auto text-center rounded bg-gray-200 px-5 py-2 text-sm text-gray-700 hover:bg-gray-300 transition">
              Lanjut Belanja
            </a>
            <a href="{{ route('checkout') }}" class="w-full sm:w-auto text-center inline-flex items-center justify-center gap-2 rounded bg-blue-600 px-5 py-2 text-sm font-medium text-white hover:bg-blue-500 transition">
              <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M9 3v18m6-18v18"/>
              </svg>
              Checkout
            </a>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
