<x-layout>
    <div class="px-4 mx-auto mt-24 md:w-10/12 lg:w-7/12">
        <p class="text-2xl font-bold text-blue-900 text-center">FISH LOGS</p>
        @foreach($logs as $log)
        <div class="w-full my-8 bg-newspaper" x-data="{deleteLog: deleteLog(), deleted: false, del: false}" x-show="!deleted">

            <div class="flex justify-between ">
                <h2 class="font-semibold w-1/2 break-all text-blue-900">{{Str::upper($log->fish)}}</h2>
                <p class="text-xs self-end">{{date("D, d F Y",strtotime($log->created_at))}}</p>
            </div>

            <div class="flex">

                <a class="w-full" href="/journal/{{$log->id}}">

                    <div class="border border-dashed border-neutral-700 text-sm p-2
                        break-all w-full hover-border-solid flex
                        flex-col-reverse md:flex-row items-center">

                        <div class="flex flex-col justify-center w-full">
                            <div class="flex mb-2">
                                <p class="font-semibold mr-2">WEIGHT: </p>
                                <p class="pr-1 text-blue-900 font-normal ">{{$log->weight}}</p>
                                <p class="font-normal">{{$log->mass_unit}}</p>
                            </div>
                            <div class="flex mb-2">
                                <p class="font-semibold mr-2">LENGTH: </p>
                                <p class="pr-1 text-blue-900 font-semibold">{{$log->fish_length}}</p>
                                <p class="font-normal">{{$log->length_unit}}</p>
                            </div>
                            <div class="flex mb-2">
                                <p class="font-semibold mr-2">ROD: </p>
                                <p class="mr-2 text-blue-900 font-semibold">{{$log->rod}}</p>
                                <p class="mr-1 font-normal">{{$log->rod_weight}}</p>
                                <p class="mr-2 font-normal">weight</p>
                                <p class="font-normal">{{$log->rod_length}}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="font-semibold mr-2">REEL: </p>
                                <p class="mr-2 text-blue-900 font-semibold">{{$log->reel}}</p>

                                @if($log->reel_weight !== 'other')
                                <p class="mr-1 font-normal">{{$log->reel_weight}}</p>
                                <p class="mr-2 font-normal">weight</p>
                                @endif
                            </div>

                            <div class="flex mb-2">
                                <p class="font-semibold mr-2">FLY:</p>
                                <p class="mr-2 text-blue-900 font-semibold">{{$log->fly}}</p>
                                <p class="mr-1 font-normal">{{$log->fly_category}}</p>
                                <p class="mr-1 font-normal"> #{{$log->hook_size}}</p>
                            </div>

                            <div class="flex mb-2">
                                <p class="font-semibold mr-2">LOCATION:</p>
                                <p class="mr-2 text-blue-900 font-semibold">{{$log->location}}</p>
                                @if($log->location === null)
                                <p class="mr-2 text-neutral-500 font-semibold">Secret spot</p>
                                @endif
                            </div>

                            <div class="flex">
                                <p class="font-semibold mr-2">VISIBILITY:</p>
                                @if($log->visibility === 1)
                                <p class="mr-2 text-blue-900 font-semibold">PRIVATE</p>
                                @else
                                <p class="mr-2 text-blue-900 font-semibold">PUBLIC</p>
                                @endif
                            </div>

                        </div>
                        <div class="mb-2 grayscale hover-color mx-auto md:mb-0">

                            @if($log->image === 'test.png')
                            <pre class="flex justify-center items-center text-sm mr-2">
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
                </a>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>
