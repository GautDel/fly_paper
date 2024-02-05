<div class="flex h-fit" x-data="{
        open: true,
        price: true,
        available: true,
        size: false,
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
        <div>
            <p class="w-full bg-neutral-700 text-newspaper font-semibold
                    px-4 py-2 text-xl text-center">SEARCH</p>

            <form class="mx-4 my-8 flex flex-col items-center" @submit.prevent.stop="[
                                   reset($refs.inStockCheckbox, $refs.newCheckbox, $refs.saleCheckbox),
                                   getByFilter.formData.in_stock = false,
                                   getByFilter.formData.new = false,
                                   getByFilter.formData.sale = false,
                                   getByFilter.formData.minPrice = 0,
                                   getByFilter.formData.maxPrice = 100,
                                   categoryName = `SEARCH - ${$refs.search.value}`,
                                   range.reset(),
                                   $dispatch('data', {category: categoryName,
                                                      data: await getByFilter.submit()})]">

                <div class="flex">
                    <input type="text" name="search" x-ref="search" class="bg-newspaper border border-dashed px-2
                                border-neutral-700 outline-none text-blue-900
                                focus:border-solid" x-model="getByFilter.formData.search" placeholder="Search for a product" />
                    <button @click="categoryId = 'search'" class="bg-neutral-700 text-newspaper font-semibold px-2 py-1 hover-bg" type="submit">GO</button>
                </div>
            </form>
        </div>
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
                                    reset($refs.inStockCheckbox, $refs.newCheckbox, $refs.saleCheckbox),
                                    range.reset(),
                                    chosen = $event.target.getAttribute('id'),
                                    $dispatch('data', {category: '{{$subCategory->name}}',
                                                      data: await getProductsByCategory.submit('{{$subCategory->id}}')})]" id="{{$loop->index}}" :class="chosen === $el.id ? 'text-blue-900' : 'text-neutral-700'" class="my-1 cursor-pointer hover-text"><span class="font-normal">-></span> {{$subCategory->name}}</p>
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
                            $dispatch('data', {category: 'All Products',
                                              data: await getProducts.submit()})]" class="font-semibold cursor-pointer hover-text">ALL PRODUCTS</p>
            </div>
        </div>

        <div>

            <form @change="$refs.availability.requestSubmit()" class="flex flex-col" @submit.prevent.stop="$dispatch( 'data', {'category': categoryName, 'data': await getByFilter.submit()})" x-ref="availability">
                <p class="w-full bg-neutral-700 text-newspaper font-semibold
                px-4 py-2 text-xl text-center">FILTER</p>

                <div class="mx-4 my-2">

                    <div @click="price = !price" class="font-semibold hover-text flex relative">

                        <span x-show="!price" class="cursor-pointer absolute top-0 left-0">-></span>

                        <span x-show="price" class="inline-block rotate-90 cursor-pointer absolute top-0 left-0">></span>

                        <span class="cursor-pointer ml-7 ">PRICE</span>
                    </div>

                    <div x-show="price" class="ml-7">

                        <div x-init="range.mintrigger(); range.maxtrigger()" class="relative w-full mt-6 mb-6">

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

                        <input type="hidden" x-model="getByFilter.formData.category = categoryId" />
                        <input type="hidden" x-model="getByFilter.formData.minPrice = range.minprice" />
                        <input type="hidden" x-model="getByFilter.formData.maxPrice = range.maxprice" />

                        <div class="flex items-center">
                            <input x-ref="inStockCheckbox" class="mr-3 checkbox" type="checkbox" x-model="getByFilter.formData.in_stock">
                            <label class="mr-2"> In Stock </label>
                            <p class="text-blue-900 text-sm font-normal" x-text="totals !== '' ? totals.in_stock : $el.innerText">{{$totals->in_stock}}</p>
                        </div>

                        <div class="flex items-center">
                            <input x-ref="newCheckbox" class="mr-3 checkbox" type="checkbox" x-model="getByFilter.formData.new">
                            <label class="mr-2"> New </label>
                            <p class="text-blue-900 text-sm font-normal" x-text="totals !== '' ? totals.new : $el.innerText">{{$totals->new}}</p>
                        </div>

                        <div class="flex items-center">
                            <input class="mr-3 checkbox" type="checkbox" disabled />
                            <label class="mr-2"> Pre-Order </label>
                            <p class="text-blue-900 text-sm font-normal">0</p>
                        </div>

                        <div class="flex items-center">
                            <input x-ref="saleCheckbox" class="mr-3 checkbox" type="checkbox" x-model="getByFilter.formData.sale">
                            <label class="mr-2"> On Sale </label>
                            <p class="text-blue-900 text-sm font-normal" x-text="totals !== '' ? totals.sale : $el.innerText">{{$totals->sale}}</p>
                        </div>
                    </div>
                </div>

                <div class="mx-4">

                        <template x-if="variations !== ''">

                            <template x-for="variation in variations">
                        <div class="flex flex-col my-2" x-data="{show: false}">
                        <div @click="show = !show" class="font-semibold hover-text flex relative">

                            <span x-show="!show" class="cursor-pointer absolute top-0 left-0">-></span>

                            <span x-show="show" class="inline-block rotate-90 cursor-pointer  absolute top-0 left-0">></span>

                            <span class="cursor-pointer ml-7" x-text="variation.name.toUpperCase()"></span>
                        </div>

                            <div x-show="show" class="ml-7">
                                <template x-for="option in options">
                                    <template x-if="option.product_variation_id === variation.id">
                                        <div class="flex items-center">
                                            <input class="mr-3 checkbox" type="checkbox"/>
                                            <label class="mr-2" for="stock" x-text="option.value"></label>
                                            <p class="text-blue-900 text-sm font-normal"></p>
                                        </div>
                                    </template>
                                </template>
                            </div>
                        </div>


                            </template>
                        </template>

                    @foreach($categories[4]->variations as $variation)

                        <template x-if="variations === ''">
                        <div class="flex flex-col my-2" x-data="{show: false}">
                        <div @click="show = !show" class="font-semibold hover-text flex relative">

                            <span x-show="!show" class="cursor-pointer absolute top-0 left-0">-></span>

                            <span x-show="show" class="inline-block rotate-90 cursor-pointer  absolute top-0 left-0">></span>

                            <span class="cursor-pointer ml-7 ">{{Str::upper($variation->name)}}</span>
                        </div>

                            <div x-show="show" class="ml-7">
                                @foreach($variation->options as $option)
                                    <div class="flex items-center">
                                        <input class="mr-3 checkbox" type="checkbox" name="stock" value="stock">
                                        <label class="mr-2" for="stock">{{$option->value}}</label>
                                        <p class="text-blue-900 text-sm font-normal"></p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        </template>
                    @endforeach

            </form>
        </div>

    </div>
</div>

<p x-show="!open" @click="open = true" class="bg-neutral-700 text-newspaper font-semibold px-3 py-2
            hover-bg h-fit cursor-pointer">MENU</p>

<p x-show="open" @click="open = false" class="bg-neutral-700 text-newspaper font-semibold px-3 py-2
            hover-bg text-2xl h-fit cursor-pointer"> < </p>

        <script>
            function reset(el1, el2, el3) {
                el1.checked = false
                el2.checked = false
                el3.checked = false
            }

            function range() {
                return {
                    minprice: 0,
                    maxprice: 100,
                    min: 0,
                    max: 100,
                    minthumb: 0,
                    maxthumb: 0,

                    reset() {
                        this.minprice = 0
                        this.maxprice = 100
                        this.min = 0
                        this.max = 100
                        this.minthumb = 0
                        this.maxthumb = 0
                    },

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
