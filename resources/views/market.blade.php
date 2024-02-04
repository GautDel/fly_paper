<x-layout>
    <div
        x-data="{
            category: 'Dry Flies',
            products: 'init',
            variations: '',
            options: '',
            totals: ''
        }" class="flex">

        <x-market.side-nav :categories="$categories" :totals="$totals"/>
        <div class="w-full"
            @data.window="[
                category = $event.detail.category,
                products = $event.detail.data.products,
                variations = $event.detail.data.variations,
                options = $event.detail.data.options,
                totals = $event.detail.data.totals]">

            <h2 class="text-center my-8 font-semibold text-2xl"
                x-text="category.toUpperCase()"></h2>

            <div class="mx-4 mb-4 flex flex-wrap justify-center ">

                    <template x-if="products !== 'init'">
                        <template x-for="product in products" >
                            <x-market.alpine-product-card />
                        </template>
                    </template>

                <template x-if="products.length === 0">
                    <p class="text-center font-normal text-sm my-10">Couldn't find any products matching your search</p>
                </template>

                @foreach($products as $product)
                    <template x-if="products === 'init'">
                        <x-market.product-card :product="$product"/>
                    </template>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
