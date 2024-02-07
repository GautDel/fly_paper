<div class="border-b border-neutral-700 pb-2 mb-10">
    <div class="flex mt-3 items-center my-4">

        @for($i = 0; $i < $rating->rating; $i++)
            <div class="mr-1 rounded-full w-3 h-3 bg-neutral-700"></div>
        @endfor

        @for($i = $rating->rating; $i < 5; $i++)
            <div class="mr-1 rounded-full w-3 h-3 bg-newspaper border-2 border-neutral-700"></div>
        @endfor


        @if($rating->recommend )
            <span class="text-xs whitespace-nowrap"> <span class="ml-2 font-semibold text-blue-900">&#10003;</span> Recommends this item!</span>
        @endif
    </div>

    <p class="text-sm mb-3 text-blue-900">
        <span class="font-bold text-lg text-neutral-700">"</span>{{$rating->comment}}<span class="font-bold text-lg text-neutral-700">"</span>
    </p>

    <div class="my-2">
        <p class="text-xs font-semibold">Quality</p>
        <div class="w-full h-2 border border-neutral-700">
            @switch($rating->quality)
                @case(5)
                    <div class="bg-neutral-700 w-full h-full"></div>
                    @break

                @case(4)
                    <div class="bg-neutral-700 w-4/5 h-full"></div>
                    @break

                @case(3)
                    <div class="bg-neutral-700 w-3/5 h-full"></div>
                    @break

                @case(2)
                    <div class="bg-neutral-700 w-2/5 h-full"></div>
                    @break

                @case(1)
                    <div class="bg-neutral-700 w-1/5 h-full"></div>
                    @break

                @case(0)
                    <div class="bg-neutral-700 w-0 h-full"></div>
            @endswitch

        </div>
    </div>
    <div class="my-2">
        <p class="text-xs font-semibold">Shipping</p>
        <div class="w-full h-2 border border-neutral-700">
            @switch($rating->shipping)
                @case(5)
                    <div class="bg-neutral-700 w-full h-full"></div>
                    @break

                @case(4)
                    <div class="bg-neutral-700 w-4/5 h-full"></div>
                    @break

                @case(3)
                    <div class="bg-neutral-700 w-3/5 h-full"></div>
                    @break

                @case(2)
                    <div class="bg-neutral-700 w-2/5 h-full"></div>
                    @break

                @case(1)
                    <div class="bg-neutral-700 w-1/5 h-full"></div>
                    @break

                @case(0)
                    <div class="bg-neutral-700 w-0 h-full"></div>
            @endswitch
        </div>
    </div>
    <div class="my-2">
        <p class="text-xs font-semibold">Customer Service</p>
        <div class="w-full h-2 border border-neutral-700">
            @switch($rating->service)
                @case(5)
                    <div class="bg-neutral-700 w-full h-full"></div>
                    @break

                @case(4)
                    <div class="bg-neutral-700 w-4/5 h-full"></div>
                    @break

                @case(3)
                    <div class="bg-neutral-700 w-3/5 h-full"></div>
                    @break

                @case(2)
                    <div class="bg-neutral-700 w-2/5 h-full"></div>
                    @break

                @case(1)
                    <div class="bg-neutral-700 w-1/5 h-full"></div>
                    @break

                @case(0)
                    <div class="bg-neutral-700 w-0 h-full"></div>
                    @break
            @endswitch
        </div>
    </div>
    <p class="text-xs mt-4 mb-2 font-semibold">ANGLER: <span class="text-blue-900 font-semibold">{{$rating->user->name}}</span> <span class="font-light">28/01/2024</span></p>

</div>

