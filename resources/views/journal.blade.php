<x-layout>
    <div x-data="{notes: true, log: false, add: false, open: false}">

        <x-journal.nav />
        <div class="mx-3 md:w-8/12 md:mx-auto">


            <div x-show="notes" x-data="{postNote: postNote()}"  >
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
                <template x-if="postNote.notes !== ''">

                    <template  x-for="note in postNote.notes">
                        <div class="w-full my-8">
                            <div class="flex justify-between">
                                <h2 class="text-sm font-semibold w-1/2" x-text="note.title"></h2>

                                <p class="text-xs self-end"
                                    x-text="new Date(note.created_at)
                                        .toLocaleDateString('en-gb', {
                                            weekday: 'short',
                                            year: 'numeric',
                                            month: 'long',
                                            day: 'numeric'
                                    })"></p>
                            </div>
                            <p class="border border-dashed border-neutral-700 text-sm p-2 break-all" x-text="note.body"></p>
                        </div>
                    </template>
                </template>

                    @forelse($notes as $note)
                        <template x-if="postNote.notes === ''">
                            <x-journal.note :note="$note" />
                        </template>
                    @empty
                        <template x-if="postNote.notes === ''">
                            <p class="text-center font-normal text-sm my-10">Nothing here...Press the button in the top left to add a note!</p>
                        </template>
                    @endforelse

                    {{$notes->links()}}
            </div>
        </div>
    </div>
</x-layout>
