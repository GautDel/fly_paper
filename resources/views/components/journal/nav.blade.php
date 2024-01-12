<div x-data="{open: false}" class="relative flex w-full">
<nav x-show="open" @click.outside="open = false"
    class="border-b-2 border-neutral-700 flex w-full">
        <div class="border-r-2 border-neutral-700 flex justify-center items-center grow cursor-pointer hover-text">
            <p class="px-4 font-normal text-sm">NOTES</p>
        </div>
        <div class="border-r-2 border-neutral-700 flex justify-center items-center grow cursor-pointer hover-text">
            <p class="px-4 font-normal text-sm">FISH LOG</p>
        </div>
        <div class="border-r-2 border-neutral-700 flex justify-center items-center grow cursor-pointer hover-text">
            <p class="px-4 font-normal text-sm">ADD A LOG</p>
        </div>
</nav>

<button @click="open = !open"
    class="bg-neutral-700 font-normal text-newspaper px-2 py-1
        flex justify-center items-center hover-bg">
    <div x-show="!open">
        <p class="text-xl">-></p>
    </div>

    <div x-show="open" class="relative">
        <p class="text-xl"><-</p>
    </div>
</button>


</div>
