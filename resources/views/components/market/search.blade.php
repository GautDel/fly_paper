<div>
    <p class="w-full bg-neutral-700 text-newspaper font-semibold
        px-4 py-2 text-xl text-center">SEARCH</p>

    <form class="mx-4 my-8 flex flex-col items-center"
        @submit.prevent.stop="[
            reset($refs.inStockCheckbox, $refs.newCheckbox, $refs.saleCheckbox),
            getByFilter.formData.in_stock = false,
            getByFilter.formData.new = false,
            getByFilter.formData.sale = false,
            getByFilter.formData.minPrice = 0,
            getByFilter.formData.minRating = '',
            getByFilter.formData.maxRating = '',
            chosenRating = '',
            getByFilter.formData.maxPrice = 100,
            categoryName = `SEARCH - ${$refs.search.value}`,
            range.reset(),
            $dispatch('data', {category: categoryName,
                               data: await getByFilter.submit()})]">
        <div class="flex">

            <input type="text"
                   name="search"
                   x-ref="search"
                   class="bg-newspaper border border-dashed px-2
                          border-neutral-700 outline-none text-blue-900
                          focus:border-solid"
                   x-model="getByFilter.formData.search"
                   placeholder="Search for a product" />

                <button @click="categoryId = 'search'"
                    class="bg-neutral-700 text-newspaper font-semibold px-2
                           py-1 hover-bg"
                    type="submit">GO</button>
        </div>
    </form>
</div>
