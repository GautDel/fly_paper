<x-layout>
    <div class="mt-6 mb-10
                lg:w-8/12 lg:mx-auto lg:border-2 lg:border-neutral-700">

        <h1 class="bg-neutral-700 text-newspaper font-semibold text-center
                   py-2 text-2xl mb-10">
            {{Str::upper($log->fish)}}
        </h1>

        <div class="px-2">

            <div class="max-w-lg grayscale hover-color hover-border border border-dashed p-2
                    border-neutral-700 mb-12 mx-auto">
                @if($log->image === 'test.png')
                <pre class="flex justify-center items-center md:text-sm lg:text-base">
  o   o
                  /^^^^^7
    '  '     ,oO))))))))Oo,
           ,'))))))))))))))), /{
      '  ,'o  ))))))))))))))))={
         >    ))))))))))))))))={
         `,   ))))))\ \)))))))={
           ',))))))))\/)))))' \{
             '*O))))))))O*'
     David Riley
            </pre>

                @else
                <img class="max-w-full mx-auto" src="{{Storage::url($log->image)}}"></img>
                @endif
            </div>
        </div>
        <div class="flex flex-wrap flex-col lg:flex-row justify-center lg:px-4 px-2">

            <fieldset class="border border-dashed border-neutral-700 mb-10 px-2
                        py-1 w-full grow lg:w-fit lg:mr-2">

                <legend class="font-semibold px-3">ANGLER</legend>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> USERNAME:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-1">{{$log->user->name}}</span>
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> MEMBER SINCE:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-1">{{date("d F Y", strtotime($log->user->created_at))}}</span>
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> CATCHES:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-1">{{$log->user->fishLogs->count()}}</span>
                </div>
            </fieldset>


            <fieldset class="border border-dashed border-neutral-700 mb-10 lg:w-fit w-full grow">

                <legend class="font-semibold px-3">FISH DETAILS</legend>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> SPECIES:</p>
                    <span class="text-sm font-semibold text-blue-900">{{$log->fish}}</span>
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> WEIGHT:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-1">{{$log->weight}}</span>
                    <span class="text-sm font-normal">{{$log->mass_unit}}</span>
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold whitespace-nowrap text-sm mr-2"><span class="font-bold">-></span> LENGTH:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-1">{{$log->fish_length}}</span>
                    <span class="text-sm font-normal">{{$log->length_unit}}</span>
                </div>
            </fieldset>

            <fieldset class="border border-dashed border-neutral-700 mb-10 lg:w-fit lg:mr-2 w-full grow">

                <legend class="font-semibold px-3">EQUIPMENT</legend>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> ROD:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-2">{{$log->rod}}</span>
                    <span class="text-sm font-normal pr-1">{{$log->rod_weight}}</span>
                    <span class="text-sm font-normal pr-1">weight</span>
                    <span class="text-sm font-normal">{{$log->rod_length}}</span>
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> LINE:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-2">{{$log->line}}</span>
                    <span class="text-sm font-normal pr-1">{{$log->line_type}}</span>
                    <span class="text-sm font-normal">{{$log->line_weight}}</span>
                </div>

                <div class=" flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> TIPPET:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-2">{{$log->tippet}}</span>
                    <span class="text-sm font-normal pr-1">{{$log->tippet_weight}}</span>
                </div>

                <div class=" flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> FLY:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-2">{{$log->fly}}</span>
                    <span class="text-sm font-normal pr-1">#{{$log->hook_size}}</span>
                </div>
            </fieldset>

            <fieldset class="border border-dashed border-neutral-700 mb-10 lg:w-fit w-full grow">

                <legend class="font-semibold px-3">CONDITIONS</legend>


                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> LOCATION:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-2">{{$log->location}}</span>
                    @if($log->location === null)
                    <span class="text-sm font-semibold text-neutral-500">Secret Spot</span>
                    @endif
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> TIME OF DAY:</p>
                    <span class="text-sm font-normal pr-1">{{$log->day_time}}</span>
                    @if($log->precise_time !== null)
                    <span class="text-sm font-normal">{{$log->precise_time}}</span>
                    @endif
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> WEATHER:</p>
                    <span class="text-sm font-normal pr-1">{{$log->weather}}</span>
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> WATER CLARITY:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-2">{{$log->water_clarity}}</span>
                    @if($log->water_clarity === null)
                    <span class="text-sm font-semibold text-neutral-500">Unknown</span>
                    @endif
                </div>

                <div class="flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> WATER MOVEMENT:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-2">{{$log->water_movement}}</span>
                    @if($log->water_movement === null)
                    <span class="text-sm font-semibold text-neutral-500">Unknown</span>
                    @endif
                </div>
            </fieldset>

            <fieldset class="border border-dashed border-neutral-700 mb-10 py-1 lg:w-fit w-full grow ">

                <legend class="font-semibold px-3">ANGLER'S NOTE</legend>

                <div class=" flex w-full px-4 my-2">
                    <p class="font-semibold text-sm mr-2 whitespace-nowrap"><span class="font-bold">-></span> NOTE:</p>
                    <span class="text-sm font-semibold text-blue-900 pr-2">{{$log->note}}</span>
                    @if($log->note === null)
                    <span class="text-sm font-semibold text-neutral-500">The Angler didn't leave a note...</span>
                    @endif
                </div>
            </fieldset>
        </div>
    </div>
</x-layout>
