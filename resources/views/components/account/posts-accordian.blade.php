<div x-data="{ open: false }"
     class="flex flex-col w-full px-6 py-2
            border-b-2 border-neutral-700">

    <div @click="open = ! open, refs.plus.remove()"
         class="flex justify-between items-center cursor-pointer">

        <p class="font-normal">POSTS</p>

        <p x-show="!open" class="font-bold text-2xl">+</p>

        <p x-show="open" class="font-bold text-2xl">-</p>
    </div>

    <div x-show="open" @click.outside="open = false" class="w-full pl-4">

    </div>
</div>

