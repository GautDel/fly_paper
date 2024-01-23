<div x-show="logs" x-data="{postLog: postLog()}" class="relative pb-24 min-h-screen">

    <h2 class="text-4xl font-bold text-center my-8">FISHING LOGS</h2>


    <div x-data="{open: false}"
        class="mt-10 mb-8 w-full flex flex-col items-end">

        <div class="flex justify-between w-full">
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

            @foreach($logs as $log)
                <x-journal.log :log="$log"/>
            @endforeach

    <div class="absolute left-1/2 bottom-8 -translate-x-1/2">
    </div>
</div>
