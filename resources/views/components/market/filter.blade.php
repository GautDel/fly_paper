<div>
    <form class="flex flex-col"
          @change="$refs.availability.requestSubmit()"
          @submit.prevent.stop="$dispatch( 'data', {'category': categoryName,
                                                    'data': await getByFilter.submit()})"
          x-ref="availability">

        <p class="w-full bg-neutral-700 text-newspaper font-semibold
                  px-4 py-2 text-xl text-center">FILTER</p>

        <div class="mx-4 my-2">

            <div @click="price = !price"
                 class="font-semibold hover-text flex relative">

                <span x-show="!price"
                      class="cursor-pointer absolute top-0 left-0">-></span>

                <span x-show="price"
                      class="inline-block rotate-90 cursor-pointer absolute
                             top-0 left-0">></span>

                <span class="cursor-pointer ml-7 ">PRICE</span>
            </div>

            <div x-show="price" class="ml-7">

                <div x-init="range.mintrigger(); range.maxtrigger()"
                     class="relative w-full mt-6 mb-6">

                    <div>
                        <input type="range"
                               :min="range.min"
                               :max="range.max"
                               @input="range.mintrigger()"
                               x-model="range.minprice"
                               class="absolute pointer-events-none
                                      appearance-none z-20 h-2 w-full
                                      opacity-0 cursor-pointer">

                        <input type="range"
                               :min="range.min"
                               :max="range.max"
                               @input="range.maxtrigger()"
                               x-model="range.maxprice"
                               class="absolute pointer-events-none
                                      appearance-none z-20 h-2 w-full opacity-0
                                      cursor-pointer">

                        <div class="relative z-10 h-1">
                            <div class="absolute z-10 left-0 right-0 h-0
                                        bottom-0 top-1/2 -translate-y-1/2
                                        border border-dashed border-neutral-700"></div>

                            <div class="absolute z-20 top-0 bottom-0 rounded-md
                                        bg-neutral-700"
                                 :style="'right:'+range.maxthumb+'%; left:'+range.minthumb+'%'"></div>

                            <div class="absolute z-30 w-6 h-6 top-1/2 left-0
                                        bg-newspaper border-2 border-neutral-700
                                        rounded-full -translate-y-1/2 -ml-1"
                                 :style="'left: '+range.minthumb+'%'"></div>

                            <div class="absolute z-30 w-6 h-6 top-1/2 right-0
                                        bg-newspaper border-2 border-neutral-700
                                        rounded-full -translate-y-1/2 -mr-3"
                                 :style="'right: '+range.maxthumb+'%'"></div>
                        </div>
                    </div>

                    <div class="flex w-full justify-between mt-4">
                        <p class="border border-dashed border-neutral-700 px-2
                                  font-semibold"
                           x-text="`€ ${range.minprice}`"></p>

                        <p class="border border-dashed border-neutral-700 px-2
                                  font-semibold"
                           x-text="`€ ${range.maxprice}`"></p>

                    </div>
                </div>
            </div>
        </div>

        <div class="mx-4 my-2">

            <div @click="available = !available"
                 class="font-semibold hover-text flex relative">

                <span x-show="!available"
                      class="cursor-pointer absolute top-0 left-0">-></span>

                <span x-show="available"
                      class="inline-block rotate-90 cursor-pointer absolute
                             top-0 left-0">></span>

                <span class="cursor-pointer ml-7 ">AVAILABLE</span>
            </div>

            <div x-show="available" class="ml-7">

                <input type="hidden"
                       x-model="getByFilter.formData.category = categoryId" />

                <input type="hidden"
                       x-model="getByFilter.formData.minPrice = range.minprice" />

                <input type="hidden"
                       x-model="getByFilter.formData.maxPrice = range.maxprice" />

                <div class="flex items-center">

                    <input x-ref="inStockCheckbox"
                           class="mr-3 checkbox"
                           type="checkbox"
                           x-model="getByFilter.formData.in_stock">

                    <label class="mr-2"> In Stock </label>

                    <p class="text-blue-900 text-sm font-normal"
                       x-text="totals !== '' ? totals.in_stock : $el.innerText">{{$totals->in_stock}}</p>
                </div>

                <div class="flex items-center">

                    <input x-ref="newCheckbox"
                           class="mr-3 checkbox"
                           type="checkbox"
                           x-model="getByFilter.formData.new">

                    <label class="mr-2"> New </label>

                    <p class="text-blue-900 text-sm font-normal"
                       x-text="totals !== '' ? totals.new : $el.innerText">{{$totals->new}}</p>
                </div>

                <div class="flex items-center">
                    <input class="mr-3 checkbox" type="checkbox" disabled />
                    <label class="mr-2"> Pre-Order </label>
                    <p class="text-blue-900 text-sm font-normal">0</p>
                </div>

                <div class="flex items-center">

                    <input x-ref="saleCheckbox"
                           class="mr-3 checkbox"
                           type="checkbox"
                           x-model="getByFilter.formData.sale">

                    <label class="mr-2"> On Sale </label>

                    <p class="text-blue-900 text-sm font-normal"
                       x-text="totals !== '' ? totals.sale : $el.innerText">{{$totals->sale}}</p>
                </div>
            </div>
        </div>

        <div class="mx-4 my-2">
            <div @click="rating = !rating"
                 class="font-semibold hover-text flex relative">

                <span x-show="!rating"
                      class="cursor-pointer absolute top-0 left-0">-></span>

                <span x-show="rating"
                      class="inline-block rotate-90 cursor-pointer  absolute
                             top-0 left-0">></span>

                <span class="cursor-pointer ml-7 ">RATINGS</span>
            </div>

            <div x-show="rating" class="ml-7">

                <div id="5"
                     @click="[getByFilter.formData.minRating = 5,
                              getByFilter.formData.maxRating = 6,
                              $refs.availability.requestSubmit(),
                              chosenRating = 5]"
                     :class="chosenRating == $el.id ? 'chosen-rating' : ''"
                     class="flex items-center my-2 cursor-pointer">

                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                </div>

                <div id="4"
                     @click="[getByFilter.formData.minRating = 4,
                              getByFilter.formData.maxRating = 5,
                              $refs.availability.requestSubmit(),
                              chosenRating = 4]"
                     :class="chosenRating == $el.id ? 'chosen-rating' : ''"
                     class="flex items-center my-2 cursor-pointer">

                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                </div>

                <div id="3"
                     @click="[getByFilter.formData.minRating = 3,
                              getByFilter.formData.maxRating = 4,
                              $refs.availability.requestSubmit(), chosenRating = 3]"
                     :class="chosenRating == $el.id ? 'chosen-rating' : ''"
                     class="flex items-center my-2 cursor-pointer">

                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                </div>

                <div id="2"
                     @click="[getByFilter.formData.minRating = 2,
                              getByFilter.formData.maxRating = 3,
                              $refs.availability.requestSubmit(),
                              chosenRating = 2]"
                     :class="chosenRating == $el.id ? 'chosen-rating' : ''"
                     class="flex items-center my-2 cursor-pointer">

                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                </div>

                <div id="1"
                     @click="[getByFilter.formData.minRating = 1,
                              getByFilter.formData.maxRating = 2,
                              $refs.availability.requestSubmit(),
                              chosenRating = 1]"
                     :class="chosenRating == $el.id ? 'chosen-rating' : ''"
                     class="flex items-center my-2 cursor-pointer">

                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700"></div>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                    <p class="mr-1 rounded-full w-4 h-4 bg-newspaper border-2 border-neutral-700"></p>
                </div>

                <div @click="[getByFilter.formData.minRating = '',
                              getByFilter.formData.maxRating = '',
                              chosenRating = '',
                              $refs.availability.requestSubmit()]"
                     class="w-fit bg-neutral-700 flex items-center my-2
                            cursor-pointer text-newspaper hover-bg
                            font-semibold px-2 py-1">

                    <p>RESET</p>
                </div>
            </div>
        </div>
    </form>
</div>
