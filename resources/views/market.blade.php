<x-layout>
    <div
        x-data="{
            category: 'Dry Flies',
            products: [],
        }" class="flex">

        <x-market.side-nav :flyCategories="$fly_categories" :categories="$categories" />

        <div class="w-full"
            @data.window="[category = $event.detail.category, products = $event.detail.products]">
            <h2 class="text-center my-8 font-semibold text-2xl"
                x-text="category"></h2>

            <div class="mx-4 mb-4 flex flex-wrap justify-center ">

                    <template x-for="product in products">
                        <div>

                            <a href="/market/product">
                                <div class="max-w-xs border-2 border-neutral-700 m-4 h-fit cursor-pointer">

                                    <div class="w-fit grayscale hover-color hover-border border border-dashed p-2
                                                border-neutral-700 mb-2 mr-2 ml-2 mt-2">

                                        <img class="w-full"
                                            src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

                                    </div>

                                    <div class="bg-neutral-700 text-newspaper font-semibold px-3 py-2">

                                        <p class="text-xl text-center whitespace-nowrap" x-text="product.name"></p>

                                        <div class="flex mt-3 items-center">
                                        <div class="mr-1 rounded-full w-4 h-4 bg-newspaper">&nbsp;</div>
                                        <div class="mr-1 rounded-full w-4 h-4 bg-newspaper">&nbsp;</div>
                                        <div class="mr-1 rounded-full w-4 h-4 bg-newspaper">&nbsp;</div>
                                        <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">&nbsp;</div>
                                        <p class="text-neutral-400">(23)</p>
                                    </div>

                                    <p class="text-newspaper text-lg" x-text="`€${product.price}`">€</p>

                                    <p class="text-neutral-400" x-text="product.brand"></p>
                                </div>
                                </div>
                            </a>
                        </div>
                    </template>


                @forelse($products as $product)
                    <template x-if="products.length === 0">
                        <x-market.product-card :product="$product"/>
                    </template>
                @empty
                <template x-if="products.length === 0 ">
                    <p class="text-center font-normal text-sm my-10">Couldn't find any products matching your search</p>
                </template>

                @endforelse
            </div>
        </div>
    </div>
</x-layout>
