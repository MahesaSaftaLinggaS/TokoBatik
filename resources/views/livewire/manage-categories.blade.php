<!-- Table Section -->
<div>
  <livewire:bread-crumb :url="$currentUrl" />
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">

            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
              <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                  Category
                </h2>
                <p class="text-sm text-gray-600 dark:text-neutral-400">
                  Add category, edit and more.
                </p>
              </div>

              <div class="inline-flex gap-x-2">
                <div class="max-w-md space-y-3">
                  <input type="search" wire:model.live.debounce.300="search" class="peer py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Search category">
                </div>

                <a wire:navigate class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="/add/category">
                  <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M5 12h14" />
                    <path d="M12 5v14" />
                  </svg>
                  Add category
                </a>
              </div>
            </div>
            <!-- End Header -->

            <!-- NOTE: Flash message success -->
            @if (session()->has('success'))
              <div class="mb-4 px-4 text-green-600 font-medium">
                {{ session('success') }}
              </div>
            @endif

            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <thead class="bg-gray-50 dark:bg-neutral-800 px-5">
                <tr>
                  @include('livewire.theaders.th', ['name' => 'name', 'columnName' => 'Category Name'])
                  @include('livewire.theaders.th', ['name' => 'created_at', 'columnName' => 'Created'])
                  <th scope="col" class="px-6 py-3 text-end"></th>
                  <th scope="col" class="px-6 py-3 text-end"></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                @if ($categories->count() > 0)
                  @foreach ($categories as $category)
                    <tr wire:key="{{ $category->id }}">
                      <td class="size-px px-5">
                        <div class="ps-6 pe-6 py-3">
                          <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">
                            {{ str($category->name)->words(3) }}
                          </span>
                        </div>
                      </td>
                      <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-3">
                          <span class="text-sm text-gray-500 dark:text-neutral-500">
                            {{ $category->created_at->format('D M Y, H:i') }}
                          </span>
                        </div>
                      </td>
                      <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-1.5">
                          <a href="#" wire:click.prevent="editCategory({{ $category->id }})" class="inline-flex items-center gap-x-1 text-sm text-blue-600 hover:underline font-medium dark:text-blue-500">
                            Edit
                          </a>
                        </div>
                      </td>
                      <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-1.5">
                          <a href="#" wire:click.prevent="deleteCategory({{ $category->id }})" class="inline-flex items-center gap-x-1 text-sm text-red-500 hover:underline font-medium dark:text-red-400">
                            Delete
                          </a>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                @else
                  <tr>
                    <td colspan="5" class="px-6 py-3 text-center text-sm text-gray-500 dark:text-neutral-400">
                      No Data Found!
                    </td>
                  </tr>
                @endif
              </tbody>
            </table>
            <!-- End Table -->

            <!-- Footer -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
              <div class="flex gap-2 items-center">
                <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
                <select wire:model.live="perPage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                  <option value="5">5</option>
                  <option value="7">10</option>
                  <option value="20">20</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </div>
              <div>
                {{ $categories->links() }}
              </div>
            </div>
            <!-- End Footer -->

          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
</div>

<!-- Edit Modal -->
@if ($categoryIdBeingEdited)
  <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-96">
      <h2 class="text-lg font-semibold mb-4">Edit Category</h2>
      <form wire:submit.prevent="updateCategory">
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
          <input type="text" id="name" wire:model.defer="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
          @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end gap-2">
          <button type="button" wire:click="$set('categoryIdBeingEdited', null)" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancel</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>
      </form>
    </div>
  </div>
@endif
<!-- End Edit Modal -->
