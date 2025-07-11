<div class="max-w-3xl mx-auto p-8 bg-white rounded-xl shadow-md text-center space-y-6">

    {{-- Success Icon --}}
    <div class="flex justify-center">
        <div class="bg-green-100 text-green-600 rounded-full p-4">
            <svg class="w-10 h-10 animate-pulse" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 13l4 4L19 7" />
            </svg>
        </div>
    </div>

    <h1 class="text-3xl font-bold text-gray-800">Terima kasih atas pesanan Anda!</h1>

    <p class="text-gray-600 text-lg">
        Pesanan Anda telah berhasil dibuat. Kami akan segera memproses dan mengirimkannya.
    </p>

    <a href="{{ url('/') }}"
        class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-6 py-3 rounded-md transition">
        Lanjut Belanja
    </a>

</div>
