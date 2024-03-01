<a :href="`/market/product/${product.product.id}`">

    <div class="max-w-xs border-2 border-neutral-700 m-4 h-fit cursor-pointer relative">
        <template x-if="product.product.new">
            <p class="absolute top-0 right-0 bg-neutral-700 px-4 py-1 z-50 font-semibold text-newspaper">NEW</p>
        </template>

        <template x-if="product.product.sale">
            <p class="absolute top-0 right-0 bg-neutral-700 px-4 py-1 z-50 font-semibold text-newspaper">ON SALE</p>
        </template>

        <div class="w-fit grayscale hover-color hover-border border border-dashed p-2
                                                    border-neutral-700 mb-2 mr-2 ml-2 mt-2">

            <img class="w-full" :src="`storage/${product.product.image.replace('public/', '')}`"></img>

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

            <div x-data="{moneyFormat: new Intl.NumberFormat('en-EU', {style:'currency', currency: 'EUR'})}">
                <template x-if="!product.product.sale">
                    <p class="text-newspaper text-lg" x-text="moneyFormat.format(product.product.price)">€</p>
                </template>
                <template x-if="product.product.sale">
                    <div class="flex">
                        <p class="text-newspaper text-lg line-through opacity-50 mr-4" x-text="moneyFormat.format(product.product.price)">€</p>
                        <p class="text-newspaper text-lg " x-text="moneyFormat.format(product.product.price - (product.product.price * product.product.sale_percent / 100))">€</p>
                    </div>
                </template>
            </div>
            <p class="text-neutral-400" x-text="product.product.brand"></p>
        </div>
    </div>
</a>
