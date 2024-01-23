<x-layout>
    <div class="mt-6 mb-10
                md:w-8/12 md:mx-auto md:border-2 md:border-neutral-700">

        <h1 class="bg-neutral-700 text-newspaper font-semibold text-center
                   py-2 text-2xl mb-10">
            {{Str::upper($log->fish)}}
        </h1>

         <div class="max-w-md grayscale hover-color hover-border border border-dashed p-2
                    border-neutral-700 mb-12 mx-auto">

            <img class="max-w-full"
            src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>
        </div>

        <div class=" flex w-full px-4 mb-8 md:mt-10 ">

            <p class="font-semibold text-sm mr-2">FISH WEIGHT:</p>

            <span class="text-sm">{{$log->weight}}</span>
            <span class="text-sm">{{$log->mass_unit}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold whitespace-nowrap text-sm mr-2">FISH LENGTH:</p>

            <span class="text-sm">{{$log->fish_length}}</span>
            <span class="text-sm">{{$log->length_unit}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">ROD:</p>

            <span class="text-sm">{{$log->rod}}</span>
            <span class="text-sm">{{$log->rod_weight}}</span>
            <span class="text-sm">{{$log->rod_length}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">LINE:</p>

            <span class="text-sm">{{$log->line}}</span>
            <span class="text-sm">{{$log->line_type}}</span>
            <span class="text-sm">{{$log->line_weight}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">TIPPET:</p>

            <span class="text-sm">{{$log->tippet}}</span>
            <span class="text-sm">{{$log->tippet_weight}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">FLY:</p>

            <span class="text-sm">{{$log->fly}}</span>
            <span class="text-sm">#{{$log->hook_size}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">LOCATION:</p>

            <span class="text-sm">{{$log->location}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">TIME OF DAY:</p>

            <span class="text-sm">{{$log->day_time}}</span>

            @if($log->precise_time !== null)
                <span class="text-sm">{{$log->precise_time}}</span>
            @endif
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">CONDITIONS:</p>

            <span class="text-sm">{{$log->weather}}</span>
            <span class="text-sm">{{$log->water_clarity}}</span>
            <span class="text-sm">{{$log->water_movement}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">ANGLER'S NOTE:</p>

            <span class="text-sm">{{$log->note}}</span>
        </div>

    </div>
</x-layout>
