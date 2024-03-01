<div class="flex fixed top-1/2 -translate-y-1/2 z-50">
    <nav x-show="open"
         @click.outside="open = false"
         class="border-r-2 border-t-2 border-b-2 border-neutral-700 flex
                flex-col bg-newspaper">
        <div @click="notes = true; logs = false"
             class="border-b-2 border-neutral-700 flex
                    justify-center items-center grow cursor-pointer hover-text ">
            <p class="px-4 py-4 font-normal text-sm">NOTES</p>
        </div>
        <div @click="notes = false; logs = true"
             class="flex justify-center items-center grow
                    cursor-pointer hover-text ">
            <p class="px-4 py-4 font-normal text-sm">FISH LOG</p>
        </div>
    </nav>

    <button @click="open = !open"
            class="bg-neutral-700 font-normal text-newspaper px-2 h-10
                   flex justify-center items-center hover-bg self-center">
        <div x-show="!open">
            <p class="text-lg"> &#x3e; </p>
        </div>

        <div x-show="open" class="relative">
            <p class="text-lg"> &#x3c; </p>
        </div>
    </button>
</div>
