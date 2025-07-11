<div>
    <livewire:bread-crumb :url="$currentUrl" />
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="bg-slate-100 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
            <form wire:submit.prevent="save">
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 border-t border-gray-200 dark:border-neutral-700">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Add New Product</h2>
                    </div>

                    <div class="sm:col-span-3">
                        <label class="text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">Product name</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text" wire:model="product_name" class="w-full rounded-lg text-sm border-gray-200 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                        @error('product_name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label class="text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">Harga</label>
                    </div>
                    <div class="sm:col-span-9">
                        <input type="text" wire:model="product_price" inputmode="decimal" class="w-full rounded-lg text-sm border-gray-200 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                        @error('product_price') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label class="text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">Kategori</label>
                    </div>
                    <div class="sm:col-span-9">
                        <select wire:model="category_id" class="w-full rounded-lg text-sm border-gray-200 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                            <option selected="">Pilih Produk Kategori</option>
                            @foreach ($all_categories as $category)
                                <option value="{{ $category->id }}" wire:key="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 border-t border-gray-200 dark:border-neutral-700">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">Detail</h2>
                    </div>

                    <div class="sm:col-span-3"></div>
                    <div class="sm:col-span-9">
                        @if ($photo)
                            <img src="{{ $photo }}" alt="Uploaded image" width="300" class="rounded-lg">
                        @else
                            <img src="{{ secure_asset('images/placeholder-image.jpg') }}" alt="default image" width="300" class="rounded-lg">
                        @endif
                    </div>

                    <div class="sm:col-span-3">
                        <label class="text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">Gambar Produk</label>
                    </div>
                    <div class="sm:col-span-9" wire:ignore>
    <div 
        x-data="{
            uploading: false,
            imageUrl: '',
            async uploadImage(event) {
                const file = event.target.files[0];
                if (!file) return;

                this.uploading = true;
                const formData = new FormData();
                formData.append('file', file);
                formData.append('upload_preset', 'https://res.cloudinary.com/dpcwujbqs/image/upload/v1752245812/bati.jpeg_diqsyh.jpg'); // GANTI DENGAN PUNYA KAMU
                try {
                    const res = await fetch('https://api.cloudinary.com/v1_1/dpcwujbqs/image/upload', {

                        method: 'POST',
                        body: formData
                    });
                    const data = await res.json();
                    this.imageUrl = data.secure_url;

                    // Kirim ke Livewire
                    window.livewire.find('{{ $this->id }}').set('photo', data.secure_url);

                } catch (e) {
                    alert('Upload gagal!');
                    console.error(e);
                } finally {
                    this.uploading = false;
                }
            }
        }"
    >
        <input type="file" @change="uploadImage($event)" accept="image/*" class="w-full border rounded-lg text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
        <div x-show="uploading" class="text-blue-500 mt-2 text-sm">Uploading...</div>
        <template x-if="imageUrl">
            <img :src="imageUrl" class="rounded mt-2" width="200">
        </template>
    </div>
</div>


                    <div class="sm:col-span-3">
                        <label class="text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">Deskripsi Produk</label>
                    </div>
                    <div class="sm:col-span-9">
                        <textarea wire:model="product_description" rows="6" class="w-full rounded-lg text-sm border-gray-200 focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400" placeholder="Add a product description here!"></textarea>
                        @error('product_description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                    <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white rounded-full" role="status" aria-label="loading">
                        <span class="sr-only">Loading...</span>
                    </div>
                    Kirim Dan Simpan
                </button>
            </form>
        </div>
    </div>
</div>
