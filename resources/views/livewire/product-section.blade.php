<div class='px-10 md:px-20 sm:px-30 py-3'>
        <!-- Produk Baru -->
        @include('components.navigation.view-all',[
            'Category' => 'Produck Baru'
        ])
        <livewire:product-listing :category_id="0" :current_product_id="0"/>

        <!-- Produk -->
        @include('components.navigation.view-all',[
            'Category' => 'Batik Couple'
        ])
        <livewire:product-listing :category_id="3" :current_product_id="0"/>

        <!-- Produk -->
        @include('components.navigation.view-all',[
            'Category' => 'Batik Laki-Laki'
        ])
        <livewire:product-listing :category_id="1" :current_product_id="0"/>

        <!-- Produk -->
        @include('components.navigation.view-all',[
            'Category' => 'Batik Tunik Wanita'
        ])
        <livewire:product-listing :category_id="2" :current_product_id="0"/>


    </div>