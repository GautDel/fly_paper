<x-layout>
    <div x-data="{chosenImg: '{{$product->getImage()}}',
                  lg: false,
                  amount: 0,
                  formStep: '{{session()->has('qty')}}' ? '99' : '0',
                  moneyFormat: new Intl.NumberFormat('en-EU', {style:'currency', currency: 'EUR'}),
                  cart: cart()}" class="flex flex-col lg:flex-row my-10 mx-4 justify-center items-center
                  lg:items-start">

        <div x-show="lg" class="absolute top-0 left-0 z-50 w-full h-full bg-transparent flex justify-center items-center">

            <div class="relative border border-neutral-700 border-dashed
                        px-2 py-2 max-w-sm sm:max-w-xl sm:mx-2 flex justify-center items-center">

                <div class="bg-neutral-700 w-fit absolute -right-[1px] -top-[1px] hover-bg">
                    <button @click="lg = false" type="button" class="rotate-45 text-newspaper px-2 text-4xl font-bold">+</button>
                </div>

                <img @click="lg = true" class="lg:max-h-full opacity-100" :src="chosenImg"></img>
            </div>
        </div>
        <div class="flex flex-col-reverse max-w-2xl lg:mr-2 lg:w-full">

            <x-market.product-recommended :product="$product" :suggestedProducts="$suggestedProducts" />

            <div class="flex flex-col lg:flex-row-reverse lg:h-96 justify-center
                        max-w-lg lg:max-w-full">

                <div class="grayscale hover-color hover-color justify-center
                            hover-border border border-dashed p-2 items-center
                            border-neutral-700 mb-2 lg:mb-0 h-full flex grow">

                    <img @click="lg = true" class="max-w-full max-h-64 lg:max-h-full cursor-pointer " :src="chosenImg"></img>
                </div>
            </div>
        </div>

        <div class="my-8 flex flex-col w-full lg:w-1/3 lg:my-0 max-w-lg">

            <p class="bg-neutral-700 text-newspaper font-semibold px-2 py-1
                      text-center text-2xl">{{ Str::upper($product->name) }}</p>

            <div class="px-4 py-2 border border-dashed border-neutral-700
                        border-t-0">

                <p class="font-semibold text-2xl mt-2" x-text="moneyFormat.format('{{$product->price}}')"></p>

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
                        @for ($i = floor($product->avgRating($product->id)); $i < '4' ; $i++) <div class="mr-1 rounded-full w-4 h-4
                                            border-neutral-700 border-2">
                </div>
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

            <form method="post" action="/market/availability" x-data="{ chosen: '',
                                totalFlies: 0,
                                price: 2.24 }" x-ref="productForm" novalidate>
                @csrf

                <input type="hidden" name="product_id" value="{{$product->id}}" />

                @foreach($variations as $key => $variation)
                <div x-data="{option: '{{session($variation->name)}}' }" id="{{$key}}" :class="formStep >= $el.id ? 'block' : 'hidden'" x-ref="stepContainer">

                    <input type="hidden" name="{{$variation->name}}" value="'{{session()->has($variation->name)}}' &&
                                   '{{session($variation->name)}}'" :value="option" />

                    <p class="font-semibold mb-1">{{Str::upper($variation->name)}}</p>

                    <div class="flex mb-8">
                        @foreach($product->options as $option)
                        @if($option->variant->product_variation_id === $variation->id)
                        @if($key === count($variations) - 1)

                        <button @click="[option = $event.target.getAttribute('id'), formStep = parseInt($refs.stepContainer.id) + 1]" id="{{$option->variant->value}}" :class="option === $el.id && '!bg-blue-900'" class="@if(session($variation->name) === $option->variant->value) bg-neutral-900 @else bg-neutral-700 @endif text-newspaper px-2 py-1 font-semibold hover-bg mr-2" type="submit">{{str_replace('_', ' ', Str::upper($option->variant->value))}}</button>
                        @else
                        <button @click="[option = $event.target.getAttribute('id'), formStep = parseInt($refs.stepContainer.id) + 1]" id="{{$option->variant->value}}" :class="option === $el.id && '!bg-blue-900'" class="@if(session($variation->name) === $option->variant->value) bg-neutral-900 @else bg-neutral-700 @endif  text-newspaper px-2 py-1 font-semibold hover-bg mr-2" type="button">{{str_replace('_', ' ', Str::upper($option->variant->value))}}</button>

                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach

                <div class="flex flex-col" id="98" :class="formStep >= $el.id ? 'block' : 'hidden'">


                    <p class="font-normal mb-1 text-sm">IN STOCK: <span class="text-blue-900">{{session('qty')}}</span></p>
                    <p class="font-semibold mb-1">QUANTITY</p>
                    <div class="flex">
                        <button type="button" class="bg-neutral-700 px-2
                                       text-newspaper font-semibold
                                       text-lg hover-bg" @click="amount > 0 ? (amount--, totalFlies--) : amount = 0">-</button>

                        <input x-model="amount" min="0" :max="'{{session()->has('qty')}}' && '{{session('qty')}}'" name="quantity" type="number" :value="amount" @change="amount = $el.value" class="w-10 bg-newspaper border text-center
                                      border-dashed border-neutral-700 mx-0
                                      outline-none font-semibold">

                        <button type="button" @click="[totalFlies++, amount >= '{{session('qty')}}' ? amount = '{{session('qty')}}' : amount++]" class="bg-neutral-700 px-2 text-newspaper
                                           font-semibold text-lg hover-bg">+</button>
                    </div>
                </div>

                <div class="flex justify-between font-semibold text-2xl mt-10">

                    <p>TOTAL:</p>

                    <div x-show="totalFlies !== 0" class="flex self-end text-blue-900">
                        <p x-text="moneyFormat.format('{{$product->price}}' * amount)">
                    </div>

                    <p x-show="totalFlies === 0">€0.00</p>
                </div>

            </form>
            <form action="/market/cart" method="POST" id="cartForm">
                @csrf
                <input type="hidden" name="quantity" :value="amount" />
                <input type="hidden" name="product_id" value="{{$product->id}}" />

                @foreach($variations as $variation)
                <input type="hidden" name="{{$variation->name}}" value="{{session($variation->name)}}" />
                @endforeach
                <button form="cartForm" class="w-full bg-neutral-700 font-semibold
                                   text-newspaper py-2 text-2xl hover-bg mt-10
                                   mb-4">ADD TO CART</button>

            </form>

        </div>
        <div x-data="{ show: false }" class="mt-10">
            <div class="px-4 py-2 border border-dashed border-neutral-700
                            flex justify-between hover-bg hover-light
                            cursor-pointer mb-2" @click="show = !show">

                <p class="font-semibold text-center">SHIPPING AND RETURN POLICIES</p>
                <p x-show="!show" class="font-bold text-center rotate-90">></p>
                <p x-show="show" class="font-bold text-center -rotate-90">></p>
            </div>

            <div x-show="show" class="px-4 py-2 border border-dashed border-neutral-700
                            mt-1">

                <p class="font-normal my-2">- Orders usually ship in <span class="text-blue-900 font-semibold">3 - 5 business days</span></p>
                <p class="font-normal my-2">- Returns & exchanges accepted within <span class="text-blue-900 font-semibold">14 days</span></p>
                <p class="font-normal my-2">- Free shipping for orders over <span class="text-blue-900 font-semibold">€50</span></p>
            </div>
        </div>

        <div x-data="{ show: false }">
            <div class="px-4 py-2 border border-dashed border-neutral-700
                            flex justify-between hover-bg hover-light
                            cursor-pointer mt-8" @click="show = !show">

                <p class="font-semibold text-center">ANGLER REVIEWS</p>
                <p x-show="!show" class="font-bold text-center rotate-90">></p>
                <p x-show="show" class="font-bold text-center -rotate-90">></p>
            </div>

            <div x-show="show" class="px-4 py-2 border border-dashed border-neutral-700
                            mt-1">

                @forelse ($product->ratings as $rating)
                <x-market.product-comment :rating="$rating" />
                @empty
                <p class="text-center text-sm py-2 font-normal">Anglers haven't left any comments on this product yet</p>
                @endforelse
            </div>
        </div>
        <div class="flex flex-col border border-dashed border-neutral-700
                    overflow-auto mt-10 lg:mt-2 px-4 py-3 lg:w-full lg:hidden">

            <p class="font-semibold text-xl mb-4">YOU MAY ALSO LIKE</p>

            <div class="flex w-full overflow-auto">
                <div class="flex">
                    @foreach($suggestedProducts as $product)

                    <a href="/market/product/{{ $product->id }}">
                        <div class="border border-neutral-700 w-40 my-2 mx-2">
                            <img class="w-32 grayscale hover-color cursor-pointer
                                    mx-auto my-2 lg:mx-auto lg:my-1" src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

                            <div class="bg-neutral-700 text-newspaper font-semibold
                                    px-3 py-2">

                                <p class="text-center">{{$product->name}}</p>

                                <div class="flex mt-1 items-center">
                                    <div class="mr-1 rounded-full w-2 h-2 bg-newspaper"></div>
                                    <div class="mr-1 rounded-full w-2 h-2 bg-newspaper"></div>
                                    <div class="mr-1 rounded-full w-2 h-2 bg-newspaper"></div>
                                    <div class="mr-1 rounded-full w-2 h-2 bg-neutral-700 border-2 text-newspaper"></div>
                                    <p class="text-xs text-neutral-400">{{$product->ratings->count()}}</p>
                                </div>

                                <p class="text-newspaper text-sm" x-text="moneyFormat.format('{{$product->price}}')"></p>

                                <p class="text-neutral-400 text-xs">{{$product->brand}}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
