<div class="flex h-fit" x-data="{
        open: false,
        price: true,
        available: true,
        rating: true,
        chosenRating: '',
        chosen: '4',
        openCat: '1',
        categoryId: '5',
        categoryName: 'DRY FLIES',
        range: range(),
        getProductsByCategory: getProductsByCategory(),
        getByFilter: getByFilter(),
        getProducts: getProducts()
    }">

    <div x-show="open" class="border-r-2 border-b-2 border-neutral-700
                        flex flex-col">

        <x-market.search />

        <x-market.categories :categories="$categories"/>
        <x-market.filter :totals="$totals"/>
    </div>

    <p x-show="!open"
       @click="open = true"
       class="bg-neutral-700 text-newspaper font-semibold px-3 py-2
              hover-bg h-fit cursor-pointer">MENU</p>

    <p x-show="open"
       @click="open = false"
       class="bg-neutral-700 text-newspaper font-semibold px-3 py-2
              hover-bg text-2xl h-fit cursor-pointer"> &#x3c; </p>
</div>
