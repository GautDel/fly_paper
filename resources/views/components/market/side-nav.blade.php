<div class="flex h-fit" x-data="{
        open: true,
        minPrice: 0,
        maxPrice: 0,
        price: true,
        available: false,
        size: false,
        chosen: '4',
        openCat: '1',
        categoryId: '5',
        categoryName: 'DRY FLIES',
        range: range(),
        count: '',
        countProducts: countProducts(),
        getProductsByCategory: getProductsByCategory(),
        getProductsByPrice: getProductsByPrice(),
        getByAvailability: getByAvailability(),
        getProductsBySearch: getProductsBySearch(),
        getProducts: getProducts()
    }">

    <div x-show="open" class="border-r-2 border-b-2 border-neutral-700
                        flex flex-col">

        <div>
            <p class="w-full bg-neutral-700 text-newspaper font-semibold
                px-4 py-2 text-xl text-center">CATEGORIES</p>

            @foreach($categories as $category)
            @if($category->parent_category_id === null)
            <div class="mx-4 my-2">
                <div @click="openCat = $event.target.getAttribute('id')" id="{{$category->id}}" class="font-semibold hover-text flex relative cursor-pointer">

                    <span class="cursor-pointer absolute top-0 left-0 -z-10" x-show="openCat !== '{{$category->id}}'">-></span>

                    <span x-show="openCat === '{{$category->id}}'" class="inline-block rotate-90 cursor-pointer  absolute top-0 left-0 -z-10">></span>

                    <span class="cursor-pointer ml-7 -z-10">{{$category->name}}</span>
                </div>

                <div x-show="openCat === '{{$category->id}}'" class="ml-7">

                    @foreach($categories as $subCategory)
                    @if($subCategory->parent_category_id === $category->id)
                    <div>

                        <p @click="[categoryId = '{{$subCategory->id}}',
                                    categoryName = '{{$subCategory->name}}',
                                    chosen = $event.target.getAttribute('id'),
                                    count = await countProducts.submit('{{$subCategory->id}}'),
                                    $dispatch('data', {category: '{{$subCategory->name}}',
                                                      products: await getProductsByCategory.submit('{{$subCategory->id}}')})]"
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
                <p @click="[count = await countProducts.submit('all'),
                            categoryName = 'ALL PRODUCTS',
                            categoryId = 'all',
                            $dispatch('data', {category: 'All Products',
                                              products: await getProducts.submit()})]" class="font-semibold cursor-pointer hover-text">ALL PRODUCTS</p>
            </div>
        </div>

        <div>
            <p class="w-full bg-neutral-700 text-newspaper font-semibold
                px-4 py-2 text-xl text-center">FILTER</p>

            <div class="mx-4 my-2">
                <div @click="price = !price" class="font-semibold hover-text flex relative">

                    <span x-show="!price" class="cursor-pointer absolute top-0 left-0">-></span>

                    <span x-show="price" class="inline-block rotate-90 cursor-pointer absolute top-0 left-0">></span>

                    <span class="cursor-pointer ml-7 ">PRICE</span>
                </div>

                <div x-show="price" class="ml-7">
                    <div @change="[minPrice = range.minprice,
                                   maxPrice = range.maxprice,
                                   $dispatch('data', {category: categoryName,
                                                      products: await getProductsByPrice.submit(minPrice, maxPrice, categoryId)})]" x-init="range.mintrigger(); range.maxtrigger()" class="relative w-full mt-6 mb-6">

                        <div>
                            <input type="range" :min="range.min" :max="range.max" @input="range.mintrigger()" x-model="range.minprice" class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                            <input type="range" :min="range.min" :max="range.max" @input="range.maxtrigger()" x-model="range.maxprice" class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                            <div class="relative z-10 h-1">
                                <div class="absolute z-10 left-0 right-0 h-0 bottom-0 top-1/2 -translate-y-1/2 border border-dashed border-neutral-700"></div>
                                <div class="absolute z-20 top-0 bottom-0 rounded-md bg-neutral-700" :style="'right:'+range.maxthumb+'%; left:'+range.minthumb+'%'"></div>
                                <div class="absolute z-30 w-6 h-6 top-1/2 left-0 bg-newspaper border-2 border-neutral-700 rounded-full -translate-y-1/2 -ml-1" :style="'left: '+range.minthumb+'%'"></div>
                                <div class="absolute z-30 w-6 h-6 top-1/2 right-0 bg-newspaper border-2 border-neutral-700 rounded-full -translate-y-1/2 -mr-3" :style="'right: '+range.maxthumb+'%'"></div>
                            </div>
                        </div>

                        <div class="flex w-full justify-between mt-4">
                            <p class="border border-dashed border-neutral-700 px-2 font-semibold" x-text="`€ ${range.minprice}`"></p>
                            <p class="border border-dashed border-neutral-700 px-2 font-semibold" x-text="`€ ${range.maxprice}`"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mx-4 my-2">
                <div @click="available = !available" class="font-semibold hover-text flex relative">

                    <span x-show="!available" class="cursor-pointer absolute top-0 left-0">-></span>

                    <span x-show="available" class="inline-block rotate-90 cursor-pointer  absolute top-0 left-0">></span>

                    <span class="cursor-pointer ml-7 ">AVAILABLE</span>
                </div>

                <div x-show="available" class="ml-7">
                    <form class="flex flex-col" @submit.prevent.stop="$dispatch( 'data', {'category': categoryName, 'products': getByAvailability.submit()})" x-ref="availability">

                        <input type="hidden" x-model="getByAvailability.formData.category = categoryId"/>

                        <div class="flex items-center">
                            <input @change="$refs.availability.requestSubmit()"  class="mr-3 checkbox" type="checkbox" x-model="getByAvailability.formData.in_stock">
                            <label class="mr-2"> In Stock </label>
                            <p class="text-blue-900 text-sm font-normal" x-text="count !== '' ? count.in_stock : $el.innerText">{{$totals->in_stock}}</p>
                        </div>
                        <div class="flex items-center">
                            <input @change="$refs.availability.requestSubmit()" class="mr-3 checkbox" type="checkbox" x-model="getByAvailability.formData.new">
                            <label class="mr-2"> New </label>
                            <p class="text-blue-900 text-sm font-normal" x-text="count !== '' ? count.new : $el.innerText">{{$totals->new}}</p>
                        </div>
                        <div class="flex items-center">
                            <input @change="$refs.availability.requestSubmit()" class="mr-3 checkbox" type="checkbox" disabled/>
                            <label class="mr-2"> Pre-Order </label>
                            <p class="text-neutral-500 text-sm font-normal">None</p>
                        </div>
                        <div class="flex items-center">
                            <input @change="$refs.availability.requestSubmit()" class="mr-3 checkbox" type="checkbox" x-model="getByAvailability.formData.sale">
                            <label class="mr-2"> On Sale </label>
                            <p class="text-blue-900 text-sm font-normal" x-text="count !== '' ? count.sale : $el.innerText">{{$totals->sale}}</p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mx-4 my-2">
                <div @click="size = !size" class="font-semibold hover-text flex relative">

                    <span x-show="!size" class="cursor-pointer absolute top-0 left-0">-></span>

                    <span x-show="size" class="inline-block rotate-90 cursor-pointer  absolute top-0 left-0">></span>

                    <span class="cursor-pointer ml-7 ">SIZE</span>
                </div>

                <div x-show="size" class="ml-7">
                    <form class="flex flex-col" action="/action_page.php">
                        <div class="flex items-center">
                            <input class="mr-3 checkbox" type="checkbox" name="stock" value="stock">
                            <label class="mr-2" for="stock"> 1 </label>
                            <p class="text-blue-900 text-sm font-normal">(219)</p>
                        </div>
                        <div class="flex items-center">
                            <input class="mr-3 checkbox" type="checkbox" name="stock" value="stock">
                            <label class="mr-2" for="stock"> 2 </label>
                            <p class="text-blue-900 text-sm font-normal">(12)</p>
                        </div>
                        <div class="flex items-center">
                            <input class="mr-3 checkbox" type="checkbox" name="stock" value="stock">
                            <label class="mr-2" for="stock"> 3 </label>
                            <p class="text-neutral-500 text-sm font-normal">None</p>
                        </div>
                        <div class="flex items-center">
                            <input class="mr-3 checkbox" type="checkbox" name="stock" value="stock">
                            <label class="mr-2" for="stock"> 4 </label>
                            <p class="text-blue-900 text-sm font-normal">(1)</p>
                        </div>
                        <div class="flex items-center">
                            <input class="mr-3 checkbox" type="checkbox" name="stock" value="stock">
                            <label class="mr-2" for="stock"> 1/0 </label>
                            <p class="text-blue-900 text-sm font-normal">(14)</p>
                        </div>
                        <div class="flex items-center">
                            <input class="mr-3 checkbox" type="checkbox" name="stock" value="stock">
                            <label class="mr-2" for="stock"> 2/0 </label>
                            <p class="text-blue-900 text-sm font-normal">(12)</p>
                        </div>
                        <div class="flex items-center">
                            <input class="mr-3 checkbox" type="checkbox" name="stock" value="stock">
                            <label class="mr-2" for="stock"> 3/0 </label>
                            <p class="text-blue-900 text-sm font-normal">(2)</p>
                        </div>

                    </form>

                </div>
            </div>
            <div>
                <p class="w-full bg-neutral-700 text-newspaper font-semibold
                    px-4 py-2 text-xl text-center">SEARCH</p>

                <form class="mx-4 my-8 flex flex-col items-center" @submit.prevent.stop="
                                   $dispatch('data', {category: categoryName,
                                                      products: await getProductsBySearch.submit()})" x-ref="searchForm">

                    <div class="flex">
                        <input type="text" name="search" class="bg-newspaper border border-dashed px-2
                                border-neutral-700 outline-none text-blue-900
                                focus:border-solid"
                            x-ref="search"
                            x-model="getProductsBySearch.formData.search"
                            placeholder="Search for a product" />
                        <button class="bg-neutral-700 text-newspaper font-semibold px-2 py-1 hover-bg" type="submit">GO</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <p x-show="!open" @click="open = true" class="bg-neutral-700 text-newspaper font-semibold px-3 py-2
            hover-bg h-fit cursor-pointer">MENU</p>

    <p x-show="open" @click="open = false" class="bg-neutral-700 text-newspaper font-semibold px-3 py-2
            hover-bg text-2xl h-fit cursor-pointer"><</p>

            <script>
                function range() {
                    return {
                        minprice: 0,
                        maxprice: 75,
                        min: 0,
                        max: 100,
                        minthumb: 0,
                        maxthumb: 0,

                        mintrigger() {
                            this.minprice = Math.min(this.minprice, this.maxprice - 20);
                            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                        },

                        maxtrigger() {
                            this.maxprice = Math.max(this.maxprice, this.minprice + 20);
                            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                        },
                    }
                }
            </script>

</div>
