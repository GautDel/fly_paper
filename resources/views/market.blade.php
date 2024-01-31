<x-layout>
    <div class="flex" x-data="{category: 'Dry Flies'}">
        <x-market.side-nav :flyCategories="$fly_categories" :categories="$categories" />

        <div class="" @category.window="category = $event.detail.category">
            <h2 class="text-center my-8 font-semibold text-2xl"
                @foo.window="" x-text="category"></h2>
            <div class="mx-4 mb-4 flex flex-wrap justify-center">
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
                <x-market.product-card />
            </div>
        </div>
    </div>
</x-layout>
