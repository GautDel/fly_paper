
<a href="/market/product/{{$product->id}}">
<div class="max-w-xs border-2 border-neutral-700 m-4 h-fit cursor-pointer">

    <div class="w-fit grayscale hover-color hover-border border border-dashed p-2
            border-neutral-700 mb-2 mr-2 ml-2 mt-2">

        <img class="w-full"
            src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>
    </div>

    <div class="bg-neutral-700 text-newspaper font-semibold px-3 py-2">

        <p class="text-xl text-center whitespace-nowrap">{{$product->name}}</p>

        <div class="flex mt-3 items-center">

            @if($product->ratings->count() !== 0)
                @for($i = 0; $i < floor($product->avgRating($product->id)); $i++)
                    <div class="mr-1 rounded-full w-4 h-4 bg-newspaper"></div>
                @endfor

                @if($product->avgRating($product->id) - floor($product->avgRating($product->id)) >= 0.5)
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper">
                        <div class="w-1/2 h-full rounded-l-full bg-newspaper"></div>
                    </div>
                    @for($i = floor($product->avgRating($product->id)); $i < 4; $i++)
                        <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper"></div>
                    @endfor
                @endif
                    <p class="text-neutral-400">({{$product->ratings->count()}})</p>
                @else
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper"></div>
                    <div class="mr-1 rounded-full w-4 h-4 bg-neutral-700 border-2 text-newspaper"></div>
                    <p class="text-neutral-400">(0)</p>
                @endif
        </div>

        <p class="text-newspaper text-lg">€{{$product->price}}</p>

        <p class="text-neutral-400">{{$product->brand}}</p>
    </div>
</div>
</a>
