<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow space-y-8">

    <h1 class="text-3xl font-bold text-gray-800">Checkout</h1>

    {{-- Flash Messages --}}
    @if (session()->has('error'))
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    {{-- Cart Section --}}
    <div>
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Keranjang Kamu</h2>
        @if ($cartItems->isEmpty())
            <p class="text-gray-500">Keranjang kamu masih kosong.</p>
        @else
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full text-sm text-gray-700">
                    <thead class="bg-blue-700 text-white uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">Produk</th>
                            <th class="px-4 py-3 text-center">Jumlah</th>
                            <th class="px-4 py-3 text-right">Harga</th>
                            <th class="px-4 py-3 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $index => $item)
                            <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} hover:bg-blue-50 transition">
                                <td class="px-4 py-3">{{ $item->product->name }}</td>
                                <td class="px-4 py-3 text-center">{{ $item->quantity }}</td>
                                <td class="px-4 py-3 text-right">Rp{{ number_format($item->product->price, 0, ',', '.') }}</td>
                                <td class="px-4 py-3 text-right">Rp{{ number_format($item->quantity * $item->product->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Order Summary --}}
    <div>
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Ringkasan Pesanan</h2>
        <dl class="space-y-2 text-gray-700">
            <div class="flex justify-between">
                <dt>Subtotal</dt>
                <dd>Rp{{ number_format($subtotal, 0, ',', '.') }}</dd>
            </div>
            <div class="flex justify-between">
                <dt>PPN (11%)</dt>
                <dd>Rp{{ number_format($vat, 0, ',', '.') }}</dd>
            </div>
            <div class="flex justify-between">
                <dt>Diskon</dt>
                <dd>-Rp{{ number_format($discount, 0, ',', '.') }}</dd>
            </div>
            <div class="flex justify-between text-lg font-bold text-gray-800 border-t pt-2">
                <dt>Total</dt>
                <dd>Rp{{ number_format($total, 0, ',', '.') }}</dd>
            </div>
        </dl>
    </div>

    {{-- Checkout Form --}}
    <form wire:submit.prevent="placeOrder" class="space-y-6">
        <div>
            <label for="address" class="block font-semibold text-gray-700 mb-1">Alamat Pengiriman</label>
            <textarea id="address" wire:model="address"
                class="w-full border border-gray-300 rounded-md p-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                rows="3" placeholder="Masukkan alamat lengkap..."></textarea>
            @error('address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="payment_method" class="block font-semibold text-gray-700 mb-1">Metode Pembayaran</label>
            <select id="payment_method" wire:model="payment_method"
                class="w-full border border-gray-300 rounded-md p-3 bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">-- Pilih Metode --</option>
                <option value="credit_card">Kartu Kredit</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="cash_on_delivery">Bayar di Tempat</option>
            </select>
            @error('payment_method') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center gap-2 bg-blue-700 hover:bg-blue-600 text-white font-medium px-6 py-2 rounded-md transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 3h18M9 3v18m6-18v18" />
                </svg>
                Buat Pesanan
            </button>
        </div>
    </form>
</div>
