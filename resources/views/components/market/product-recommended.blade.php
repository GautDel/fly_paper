<div class="flex-col border border-dashed border-neutral-700 mt-2 px-4 py-3
            lg:w-full hidden lg:flex">

    <p class="font-semibold text-xl mb-4">YOU MAY ALSO LIKE</p>
    <div class="flex w-full overflow-auto">
        <div class="flex">
            @foreach($suggestedProducts as $product)
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
            @endforeach
        </div>
    </div>

</div>
