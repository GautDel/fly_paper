<div class="w-full my-8">
    <div class="flex justify-between ">
        <h2 class="text-sm font-semibold w-1/2 break-all">{{$note->title}}</h2>

        <p class="text-xs self-end ">{{date("D, d F Y",strtotime($note->created_at))}}</p>
    </div>
    <div class="flex" x-data="{del: false}">

        <p class="border border-dashed border-neutral-700 text-sm p-2 break-all
            w-full">{{$note->body}}</p>

        <button x-show="!del" @click="del = true" class="bg-neutral-700 text-newspaper text-2xl font-semibold px-2 h-fit">
            <p class="rotate-45">+</p>
        </button>

        <form x-show="del">
            <button @click.outside="del = false" class="bg-red-900 text-newspaper text-2xl font-semibold px-2">
                <p class="rotate-45">+</p>
            </button>
        </form>

    </div>
</div>
