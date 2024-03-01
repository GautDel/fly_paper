<div x-show="logs" x-data="{postLog: postLog()}" class="relative pb-24 min-h-screen">

    <h2 class="text-4xl font-bold text-center my-8">FISHING LOGS</h2>


    <div x-data="{open: false}"
        class="mt-10 mb-8 w-full flex flex-col items-end">

        <div class="flex justify-between w-full items-center">
            <p x-show="!open" class="font-semibold text-xl w-full text-right mr-4">ADD A LOG</p>
            <p x-show="open" class="font-semibold text-xl">WHAT DID YOU CATCH?</p>
            <div x-show="!open"></div>
            <button @click="open = !open"
                class="bg-neutral-700 text-newspaper text-2xl font-semibold
                    px-3 py-1 hover-bg w-fit justify-self-end">
                <span x-show="!open">+</span>
                <span x-show="open">-</span>
            </button>
        </div>

        <x-journal.create-log :options="$options" :flyCategories="$flyCategories"/>
    </div>

    @forelse($logs as $log)
        <x-journal.log :log="$log"/>
    @empty
        <template x-if="{{count($logs)}} === 0 ">
            <p class="text-center font-normal px-4">Did you catch something? Share it with us!</p>
        </template>
    @endforelse


    <div class="absolute left-1/2 bottom-8 -translate-x-1/2">
        {{$logs->links()}}
    </div>
</div>
