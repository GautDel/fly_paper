<div class="w-full my-8" x-data="{deleteLog: deleteLog(), deleted: false, del: false}" x-show="!deleted" >

    <div class="flex justify-between ">
        <h2 class="font-semibold w-1/2 break-all text-blue-900">{{Str::upper($log->fish)}}</h2>
        <p class="text-xs self-end">{{date("D, d F Y",strtotime($log->created_at))}}</p>
    </div>

    <div class="flex">

<a class="w-full" href="/journal/{{$log->id}}">
    <div class="border border-dashed border-neutral-700 text-sm p-2 break-all
            w-full hover-border-solid">
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

        <div class="flex">
            <p class="font-semibold mr-2">LOCATION:</p>
            <p class="mr-2 text-blue-900 font-semibold">{{$log->location}}</p>
            @if($log->location === null)
                <p class="mr-2 text-neutral-500 font-semibold">Secret spot</p>
            @endif
        </div>
    </div>
</a>
        <div class="flex flex-col">
            <form method="POST" action="/journal/logs/update">
                @csrf
                <input type="hidden" name="id" value="{{$log->id}}" />
                <button class="bg-newspaper text-neutral-700 border-dashed border
                    border-neutral-700 border-l-0 font-semibold px-2
                    hover-border-solid h-fit mb-1 w-full">
                 <p>E</p>
             </button>

            </form>

        <button x-show="!del" @click="del = true"
            class="bg-neutral-700 text-newspaper text-2xl font-semibold px-2
                h-fit hover-bg">
            <p class="rotate-45">+</p>
        </button>

        <form @submit.prevent="deleteLog.submit()" x-show="del">

            <input type="hidden" x-init="deleteLog.formData.id = {{$log->id}}"/>

            <button @click="deleted = true" @click.outside="del = false"
                class="bg-red-900 text-newspaper text-2xl font-semibold px-2">
                <p class="rotate-45">+</p>
            </button>
        </form>

        </div>
    </div>
</div>
