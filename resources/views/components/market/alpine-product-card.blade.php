<a :href="`/market/product/${product.product.id}`">

<div class="max-w-xs border-2 border-neutral-700 m-4 h-fit cursor-pointer">

    <div class="w-fit grayscale hover-color hover-border border border-dashed p-2
                                                    border-neutral-700 mb-2 mr-2 ml-2 mt-2">

        <img class="w-full" src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

    </div>

    <div class="bg-neutral-700 text-newspaper font-semibold px-3 py-2">

        <p class="text-xl text-center whitespace-nowrap" x-text="product.product.name"></p>

        <div class="flex mt-3 items-center">

            <template x-if="product.product.ratings.length !== 0">

                <div class="flex items-center">

                    <template x-for="i in Math.floor(product.avgRating)">
                        <div class="mr-1 rounded-full w-4 h-4 bg-newspaper">&nbsp;</div>
                    </template>

                    <template x-if="product.avgRating - Math.floor(product.avgRating) >= 0.5">

                        <div class="flex">

                            <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">
                                <div class="w-1/2 h-full rounded-l-full bg-newspaper">&nbsp;</div>
                            </div>

                            <template x-for="i in 4 - Math.floor(product.avgRating)">
                                <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">&nbsp;</div>
                            </template>
                        </div>

                        <div class="mr-1 rounded-full w-4 h-4 bg-newspaper">&nbsp;</div>

                    </template>

                    <p class="text-neutral-400" x-text="`(${product.product.ratings.length})`"></p>

                </div>
            </template>

            <template x-if="product.product.ratings.length === 0">
                <div class="flex items-center">
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">&nbsp;</div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">&nbsp;</div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">&nbsp;</div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">&nbsp;</div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">&nbsp;</div>
                    <p class="text-neutral-400">(0)</p>
                </div>
            </template>
        </div>

        <p class="text-newspaper text-lg" x-text="`€${product.product.price}`">€</p>

        <p class="text-neutral-400" x-text="product.product.brand"></p>
    </div>
</div>
</a>

