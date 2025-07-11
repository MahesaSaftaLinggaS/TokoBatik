<div class="max-w-6xl mx-auto p-6 bg-white rounded-xl shadow space-y-6">

    <h1 class="text-3xl font-bold text-gray-800">Kelola Pesanan</h1>

    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    @if ($orders->isEmpty())
        <p class="text-gray-500">Tidak ada pesanan ditemukan.</p>
    @else
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-blue-700 text-white text-xs uppercase">
                    <tr>
                        <th class="px-4 py-3 text-left">ID Pesanan</th>
                        <th class="px-4 py-3 text-left">Pelanggan</th>
                        <th class="px-4 py-3 text-left">Produk</th>
                        <th class="px-4 py-3 text-left">Alamat</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-right">Total</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }} hover:bg-blue-50 transition">
                            <td class="px-4 py-3">{{ $order->id }}</td>
                            <td class="px-4 py-3">
                                <div class="font-medium">{{ $order->user->name }}</div>
                                <div class="text-gray-500 text-xs">{{ $order->user->email }}</div>
                            </td>
                        <td class="px-4 py-3">
                                <ul class="list-disc list-inside space-y-1 text-sm text-gray-600">
                                    @foreach ($order->products as $product)
                                        <li>{{ $product->name }} <span class="text-gray-500">× {{ $product->pivot->quantity }}</span></li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-4 py-3 text-left">{{ $order->address }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="inline-block px-2 py-1 rounded text-xs font-medium
                                    @if($order->status === 'completed') bg-green-100 text-green-700
                                    @elseif($order->status === 'processing') bg-yellow-100 text-yellow-700
                                    @elseif($order->status === 'cancelled') bg-red-100 text-red-600
                                    @else bg-gray-100 text-gray-600 @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-right">Rp{{ number_format($order->total, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <select wire:change="updateStatus({{ $order->id }}, $event.target.value)"
                                        class="text-sm border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option value="pending" @selected($order->status == 'pending')>Pending</option>
                                        <option value="processing" @selected($order->status == 'processing')>Processing</option>
                                        <option value="completed" @selected($order->status == 'completed')>Completed</option>
                                        <option value="cancelled" @selected($order->status == 'cancelled')>Cancelled</option>
                                    </select>

                                    <button wire:click="deleteOrder({{ $order->id }})"
                                        onclick="return confirm('Yakin ingin menghapus pesanan ini?')"
                                        class="text-red-600 hover:underline text-xs mt-1">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
