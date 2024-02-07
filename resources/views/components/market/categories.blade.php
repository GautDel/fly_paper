<div>
    <p class="w-full bg-neutral-700 text-newspaper font-semibold
              px-4 py-2 text-xl text-center">CATEGORIES</p>

        @foreach($categories as $category)
            @if($category->parent_category_id === null)
                <div class="mx-4 my-2">
                    <div @click="openCat = $event.target.getAttribute('id')"
                         id="{{$category->id}}"
                         class="font-semibold hover-text flex relative
                                cursor-pointer">

                        <span class="cursor-pointer absolute top-0 left-0 -z-10"
                              x-show="openCat !== '{{$category->id}}'">-></span>

                        <span class="inline-block rotate-90 cursor-pointer
                                     absolute top-0 left-0 -z-10"
                              x-show="openCat === '{{$category->id}}'">></span>

                        <span class="cursor-pointer ml-7 -z-10">{{$category->name}}</span>
                    </div>

                    <div x-show="openCat === '{{$category->id}}'" class="ml-7">

                        @foreach($categories as $subCategory)
                            @if($subCategory->parent_category_id === $category->id)
                                <div>

                                    <p @click="[categoryId = '{{$subCategory->id}}',
                                                categoryName = '{{$subCategory->name}}',
                                                reset($refs.inStockCheckbox, $refs.newCheckbox, $refs.saleCheckbox),
                                                range.reset(),
                                                chosenRating = '',
                                                getByFilter.formData.minRating = '',
                                                getByFilter.formData.maxRating = '',
                                                chosen = $event.target.getAttribute('id'),
                                                $dispatch('data', {category: '{{$subCategory->name}}',
                                                                   data: await getProductsByCategory.submit('{{$subCategory->id}}')})]"
                                        id="{{$loop->index}}"
                                        :class="chosen === $el.id ? 'text-blue-900' : 'text-neutral-700'"
                                        class="my-1 cursor-pointer hover-text"><span class="font-normal">-></span> {{$subCategory->name}}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

    <div class="mx-4 my-2">

        <p @click="[categoryName = 'ALL PRODUCTS',
                    categoryId = 'all',
                    reset($refs.inStockCheckbox, $refs.newCheckbox, $refs.saleCheckbox),
                    range.reset(),
                    chosenRating = '',
                    getByFilter.formData.minRating = '',
                    getByFilter.formData.maxRating = '',
                    $dispatch('data', {category: 'All Products',
                                       data: await getProducts.submit()})]"
            class="font-semibold cursor-pointer hover-text">ALL PRODUCTS</p>
    </div>
</div>
