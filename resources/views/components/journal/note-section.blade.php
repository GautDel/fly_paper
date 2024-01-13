<div x-show="notes">
    <div x-data="{open: false}"
        class="mt-10 mb-8 w-full flex flex-col items-end">
        <button @click="open = !open"
            class="bg-neutral-700 text-newspaper text-2xl font-semibold
                px-3 py-1 hover-bg w-fit">
            <span x-show="!open">+</span>
            <span x-show="open">-</span>
        </button>
        <x-journal.create-note />
    </div>

        @forelse($notes as $note)
            <p x-text=""></p>
            <x-journal.note :note="$note" />
        @empty
            <p>No notes yet!</p>
        @endforelse

</div>
