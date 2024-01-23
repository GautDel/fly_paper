<div class="px-4 pt-12 pb-8 border-b-2 border-neutral-700
            md:pb-0 md:border-b-0 md:border-r-2 md:px-10 md:w-1/2
            ">

    <div class="max-w-lg mx-auto">
        <h2 class="font-bold text-2xl pb-4">LATEST CATCH</h2>


        <div class="max-w-md grayscale hover-color hover-border border border-dashed p-2
                    border-neutral-700
                    ">
            <img class="max-w-full" src="https://images.pexels.com/photos/6831250/pexels-photo-6831250.jpeg"></img>
        </div>

        <div class="my-6 max-w-lg">
            <p class="">
                <span class="font-semibold">ANGLER:</span>
                <span class="text-blue-900 font-normal">{{$log->user->name}}</span>
            </p>
            <p class="">
                <span class="font-semibold">SPECIES:</span>
                <span class="text-blue-900 font-normal">{{$log->fish}}</span>
            </p>
            <p>
                <span class="font-semibold">WEIGHT:</span>
                <span class="text-blue-900 font-normal">{{$log->weight}}</span>
                <span>{{$log->mass_unit}}</span>
            </p>
            <p>
                <span class="font-semibold">LENGTH:</span>
                <span class="text-blue-900 font-normal">{{$log->fish_length}}</span>
                <span>{{$log->length_unit}}</span>
            </p>
            <p>
                <span class="font-semibold">LOCATION:</span>
                <span class="text-blue-900 font-normal">{{$log->location}}</span>
            </p>
            <p>
                <span class="font-semibold">DATE:</span>
                <span>{{date("D, d F Y",strtotime($log->created_at))}}</span>
            </p>
            <p>
                <span class="font-semibold">FLY:</span>
                <span class="text-blue-900 font-normal">{{$log->fly}} </span>
                <span>#{{$log->hook_size}}</span>

            </p>
        </div>
        <div class="flex flex-row justify-evenly font-semibold">
            <a class="w-full mr-4" href="/journal/{{$log->id}}">
                <button class="border border-dashed border-neutral-700 w-full
                            py-3 hover-border-solid
                            md:py-4">VIEW LOG</button>
            </a>

            <a class="w-full" href="/journal">
                <button class="border w-full bg-neutral-700 text-newspaper
                            py-3 hover-bg
                            md:py-4">JOURNAL</button>
            </a>
        </div>

    </div>
</div>
