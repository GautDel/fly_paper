<x-layout>
    <div x-data="{chosenImg: 'https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',
                          lg: false}"class="flex flex-col lg:flex-row my-10 mx-4 justify-center items-center
                lg:items-start">

        <div x-show="lg"
             class="absolute top-0 left-0 z-50 w-full h-full bg-transparent flex justify-center items-center">

            <div class="relative border border-neutral-700 border-dashed
                        px-2 py-2 max-w-sm sm:max-w-xl sm:mx-2 flex justify-center items-center">

                <div class="bg-neutral-700 w-fit absolute -right-[1px] -top-[1px] hover-bg">
                    <button @click="lg = false"
                            type="button"
                            class="rotate-45 text-newspaper px-2 text-4xl font-bold">+</button>
                </div>
                 <img @click="lg = true" class="lg:max-h-full opacity-100"
                      :src="chosenImg"></img>
            </div>

        </div>

        <div class="flex flex-col-reverse max-w-2xl lg:mr-2 lg:w-full">

            <x-market.product-recommended :product="$product" />

            <div class="flex flex-col lg:flex-row-reverse lg:h-96 justify-center
                        max-w-lg lg:max-w-full">

                <div class="grayscale hover-color hover-color justify-center
                            hover-border border border-dashed p-2 items-center
                            border-neutral-700 mb-2 lg:mb-0 h-full flex grow">

                    <img @click="lg = true" class="max-w-full max-h-64 lg:max-h-full cursor-pointer "
                        :src="chosenImg"></img>
                </div>

                <div class="border border-dashed border-neutral-700 px-2
                            py-2 flex overflow-hidden lg:flex-col lg:mr-2
                            items-center lg:w-24">

                    <img @click="chosenImg = $el.src"
                         class="w-28 grayscale hover-color cursor-pointer mx-2
                                lg:mx-auto lg:my-1 aspect-square"
                         src="https://images.pexels.com/photos/294674/pexels-photo-294674.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

                    <img @click="chosenImg = $el.src"
                         class="w-28 grayscale hover-color cursor-pointer mx-2
                                lg:mx-auto lg:my-1 aspect-square"
                         src="https://images.pexels.com/photos/1569002/pexels-photo-1569002.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

                    <img @click="chosenImg = $el.src"
                         class="w-28 grayscale hover-color cursor-pointer mx-2
                                lg:mx-auto lg:my-1 aspect-square"
                         src="https://images.pexels.com/photos/3099227/pexels-photo-3099227.jpeg"></img>

                    <img @click="chosenImg = $el.src"
                         class="w-28 grayscale hover-color cursor-pointer mx-2
                                lg:mx-auto lg:my-1 aspect-square"
                         src="https://images.pexels.com/photos/848737/pexels-photo-848737.jpeg"></img>

                </div>
            </div>
        </div>

        <div class="my-8 flex flex-col w-full lg:w-1/3 lg:my-0 max-w-lg">

            <p class="bg-neutral-700 text-newspaper font-semibold px-2 py-1
                      text-center text-2xl">{{ Str::upper($product->name) }}</p>

            <div class="px-4 py-2 border border-dashed border-neutral-700
                        border-t-0">

                <p class="font-semibold text-2xl mt-2">€ {{ $product->price }}</p>

                <p class="text-xs font-normal text-neutral-500">VAT included (where applicable), plus shipping</p>

                <p class="text-sm font-normal my-4">{{ $product->description }}</p>

                <div class="flex my-3 items-center w-full cursor-pointer">

                    @if ($product->ratings->count() !== 0)

                        @for ($i = 0; $i < floor($product->avgRating($product->id)); $i++)
                            <div class="mr-1 rounded-full w-4 h-4
                                        bg-neutral-700"></div>
                        @endfor

                        @if ($product->avgRating($product->id) - floor($product->avgRating($product->id)) >= 0.5)
                            <div class="mr-1 rounded-full w-4 h-4
                                        border-neutral-700 border-2 relative">
                                <div class="w-1/2 h-full rounded-l-full
                                            bg-neutral-700 absolute -left-[1px]"></div>
                            </div>
                            @for ($i = floor($product->avgRating($product->id)); $i < '4'; $i++)
                                <div class="mr-1 rounded-full w-4 h-4
                                            border-neutral-700 border-2"></div>
                            @endfor
                        @endif
                        <p class="text-neutral-400">({{ $product->ratings->count() }})</p>
                    @else
                        <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700
                                    border-2 text-newspaper"></div>
                        <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700
                                    border-2 text-newspaper"></div>
                        <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700
                                    border-2 text-newspaper"></div>
                        <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700
                                    border-2 text-newspaper"></div>
                        <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700
                                    border-2 text-newspaper"></div>
                        <p class="text-neutral-400">(0)</p>
                    @endif
                </div>

                <form x-data="{ chosen: '',
                                totalFlies: 0,
                                price: 2.24 }">
                    @foreach($variations as $variation)
                        @if($variation->display === 'row' )
                            <p class="font-semibold mb-1">{{Str::upper($variation->name)}}</p>

                            <div class="flex">
                                @foreach($variation->options as $option)
                                    <button @click="chosen = $event.target.getAttribute('id')"
                                            id="{{$option->id}}"
                                            :class="chosen === $el.id ? 'bg-blue-900' : 'bg-neutral-700'"
                                            class="text-newspaper px-2 py-1 font-semibold hover-bg mr-2"
                                            type="button">{{Str::upper($option->value)}}</button>
                                @endforeach
                            </div>
                        @endif
                    @endforeach

                    @if($variation->display === 'col' )
                        @foreach($variation->options as $option)
                            <div x-data="{amount: 0,
                                          chosen: '' }"
                                 class="flex justify-between my-4">

                                <div class="flex items-center">
                                    <p class="mr-2 font-normal">SIZE:</p>
                                    <span class="font-semibold">{{$option->value}}</span>
                                </div>


                                <div class="flex">
                                    <button type="button"
                                            class="bg-neutral-700 px-2
                                                   text-newspaper font-semibold
                                                   text-lg hover-bg"
                                            @click="amount > 0 ? (amount--, totalFlies--) : amount = 0">-</button>

                                    <input x-model="amount"
                                       min="0"
                                       name="quantity"
                                       type="number"
                                       class="w-10 bg-newspaper border text-center
                                              border-dashed border-neutral-700 mx-0
                                              outline-none">

                                    <button type="button"
                                        @click="amount++, totalFlies++"
                                        class="bg-neutral-700 px-2 text-newspaper
                                               font-semibold text-lg hover-bg">+</button>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="flex justify-between font-semibold text-xl mt-10">

                        <p>TOTAL:</p>

                        <div x-show="totalFlies !== 0" class="flex self-end">
                            <span>€</span>
                            <p x-text="parseFloat(price * totalFlies).toFixed(2)">
                        </div>

                        <p x-show="totalFlies === 0">€0.00</p>
                    </div>

                    <button class="w-full bg-neutral-700 font-semibold
                                   text-newspaper py-2 text-2xl hover-bg mt-10
                                   mb-4">ADD TO CART</button>
                </form>
            </div>
            <div x-data="{ show: false }" class="mt-10">
                <div class="px-4 py-2 border border-dashed border-neutral-700
                            flex justify-between hover-bg hover-light
                            cursor-pointer mb-2"
                     @click="show = !show">

                    <p class="font-semibold text-center">SHIPPING AND RETURN POLICIES</p>
                    <p x-show="!show" class="font-bold text-center rotate-90">></p>
                    <p x-show="show" class="font-bold text-center -rotate-90">></p>
                </div>

                <div x-show="show"
                     class="px-4 py-2 border border-dashed border-neutral-700
                            mt-1">

                    <p class="font-normal my-2">- Order today to get by <span class="text-blue-900 font-semibold">Jan
                            30 - Feb 9</span></p>
                    <p class="font-normal my-2">- Returns & exchanges accepted within <span
                            class="text-blue-900 font-semibold">14 days</span></p>
                    <p class="font-normal my-2">- Free shipping for orders over <span
                            class="text-blue-900 font-semibold">€50</span></p>
                </div>
            </div>

            <div x-data="{ show: false }">
                <div class="px-4 py-2 border border-dashed border-neutral-700
                            flex justify-between hover-bg hover-light
                            cursor-pointer mt-8"
                     @click="show = !show">

                    <p class="font-semibold text-center">ANGLER REVIEWS</p>
                    <p x-show="!show" class="font-bold text-center rotate-90">></p>
                    <p x-show="show" class="font-bold text-center -rotate-90">></p>
                </div>

                <div x-show="show"
                     class="px-4 py-2 border border-dashed border-neutral-700
                            mt-1">

                    @foreach ($product->ratings as $rating)
                        <x-market.product-comment :rating="$rating" />
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col border border-dashed border-neutral-700
                        mt-10 lg:mt-2 px-4 py-3 lg:w-full lg:hidden">

                <p class="font-semibold text-xl mb-4">YOU MAY ALSO LIKE</p>

                <div class="flex">
                    <div class="border border-neutral-700 w-40 my-2 mx-2">
                        <img class="w-32 grayscale hover-color cursor-pointer
                                    mx-auto my-2 lg:mx-auto lg:my-1"
                             src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

                        <div class="bg-neutral-700 text-newspaper font-semibold
                                    px-3 py-2">

                            <p class="text-center">HARE'S EAR</p>

                            <div class="flex mt-1 items-center">
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper"></div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper"></div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper"></div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-neutral-700 border-2 text-newspaper"></div>
                                <p class="text-xs text-neutral-400">(23)</p>
                            </div>

                            <p class="text-newspaper text-sm">€20.30</p>

                            <p class="text-neutral-400 text-xs">Orvis</p>
                        </div>
                    </div>

                    <div class="border border-neutral-700 w-40 my-2 mx-2">
                        <img class="w-32 grayscale hover-color cursor-pointer
                                    mx-auto my-2 lg:mx-auto lg:my-1"
                             src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

                        <div class="bg-neutral-700 text-newspaper font-semibold
                                    px-3 py-2">

                            <p class="text-center">HARE'S EAR</p>

                            <div class="flex mt-1 items-center">
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper">&nbsp;</div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper">&nbsp;</div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper">&nbsp;</div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-neutral-700 border-2 text-newspaper">
                                    &nbsp;</div>
                                <p class="text-xs text-neutral-400">(23)</p>
                            </div>

                            <p class="text-newspaper text-sm">€20.30</p>

                            <p class="text-neutral-400 text-xs">Orvis</p>
                        </div>
                    </div>

                    <div class="border border-neutral-700 w-40 my-2 mx-2">

                        <img class="w-32 grayscale hover-color cursor-pointer mx-auto my-2 lg:mx-auto lg:my-1"
                            src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

                        <div class="bg-neutral-700 text-newspaper font-semibold px-3 py-2">

                            <p class="text-center">HARE'S EAR</p>

                            <div class="flex mt-1 items-center">
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper">&nbsp;</div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper">&nbsp;</div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-newspaper">&nbsp;</div>
                                <div class="mr-1 rounded-full w-2 h-2 bg-neutral-700 border-2 text-newspaper">
                                    &nbsp;</div>
                                <p class="text-xs text-neutral-400">(23)</p>
                            </div>

                            <p class="text-newspaper text-sm">€20.30</p>


                            <p class="text-neutral-400 text-xs">Orvis</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

