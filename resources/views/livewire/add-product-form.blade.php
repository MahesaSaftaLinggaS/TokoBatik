<div>
    <livewire:bread-crumb :url="$currentUrl" />
    <!-- Card Section -->
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="bg-slate-100 rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
            <form wire:submit="save">
                <!-- Section -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Add New Product
                        </h2>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-full-name" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Product name
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <div>
                            <input type="text" wire:model="product_name" id="af-submit-application-full-name" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
							@error('product_name') <span class="text-red-500">{{ $message }}</span> @enderror
						</div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-3">
                        <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Harga
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <input id="af-submit-application-email" wire:model="product_price" type="text" inputmode="decimal" pattern="[0-9]*[.,]?[0-9]*" class="py-2 px-3 pe-11 block w-full  shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
						@error('product_price') <span class="text-red-500">{{ $message }}</span> @enderror
					</div>
                    <!-- End Col -->

					<div class="sm:col-span-3">
                        <label for="af-submit-application-email" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Kategori
                        </label>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
						<select wire:model="category_id" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
							<option selected="">Pilih Produk Kategori</option>
							@foreach ($all_categories as $category)
								<option value="{{ $category->id }}" wire:key="{{ $category->id }}">{{$category->name}}</option>
							@endforeach
							
						</select>
						@error('category_id') <span class="text-red-500">{{ $message }}</span> @enderror
					</div>
                    <!-- End Col -->
                </div>
                <!-- End Section -->

                <!-- Section -->
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                            Detail.
                        </h2>
                    </div>
                    <!-- End Col -->
					<div class="sm:col-span-3">
                        
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
					@if ($photo)
    <img src="{{ $photo }}" alt="Uploaded image" width="300" class="rounded-lg">
@else
    <img src="{{ secure_asset('images/placeholder-image.jpg')}}" alt="default image" width="300" class="rounded-lg">
@endif

					</div>
                    <!-- End Col -->
                    <div class="sm:col-span-3">
                        <label for="af-submit-application-resume-cv" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                            Gambar Produk
                        </label>
                    </div>
                    <!-- End Col -->
					
<!-- Upload Gambar via Cloudinary -->
<div 
    x-data="{
        uploading: false,
        progress: 0,
        imageUrl: '',
        async uploadImage(event) {
            const file = event.target.files[0];
            if (!file) return;

            this.uploading = true;
            const formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', 'your_unsigned_preset'); // GANTI
            try {
                const res = await fetch('https://api.cloudinary.com/v1_1/your_cloud_name/image/upload', { // GANTI
                    method: 'POST',
                    body: formData
                });

                const data = await res.json();
                this.imageUrl = data.secure_url;
                @this.set('photo', data.secure_url); // Simpan URL ke properti Livewire
            } catch (error) {
                alert('Gagal upload');
                console.error(error);
            } finally {
                this.uploading = false;
            }
        }
    }"
    class="sm:col-span-9"
>
    <input type="file" @change="uploadImage($event)" accept="image/*" class="block w-full border shadow-sm rounded-lg text-sm dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
    <div x-show="uploading">Uploading...</div>
    <template x-if="imageUrl">
        <img :src="imageUrl" class="rounded mt-2" width="200">
    </template>
</div>

                            <!-- End Progress Bar -->
                        </div>
                        <!-- End File Uploading Progress Form -->
                    </div>

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="af-submit-application-bio" class="inline-block text-sm font-medium text-gray-500 mt-2.5 dark:text-neutral-500">
                                Deskripsi Produk
                            </label>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="sm:col-span-9">
                        <textarea id="af-submit-application-bio" wire:model="product_description" class="py-2 px-3 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" rows="6" placeholder="Add a product description here!"></textarea>
						@error('product_description') <span class="text-red-500">{{ $message }}</span> @enderror
					</div>
                    <!-- End Col -->
                </div>
                <!-- End Section -->
                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <div wire:loading class="animate-spin inline-block size-4 border-[3px] border-current border-t-transparent text-white-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
                      <span class="sr-only">Loading...</span>
                    </div>  
                  Kirim Dan Simpan
                </button>
            </form>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Card Section -->
</div>
