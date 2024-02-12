<div x-show="notes" x-data="{postNote: postNote()}" class="relative pb-24 min-h-screen">

    <h2 class="text-4xl font-bold text-center my-8">FISHING NOTES</h2>


    <div x-data="{open: false}"
        class="mt-10 mb-8 w-full flex flex-col items-end">

        <div class="flex justify-between w-full">
            <p x-show="open" class="font-semibold text-xl">ADD A NOTE</p>
            <div x-show="!open"></div>
            <button @click="open = !open"
                class="bg-neutral-700 text-newspaper text-2xl font-semibold
                    px-3 py-1 hover-bg w-fit justify-self-end">
                <span x-show="!open">+</span>
                <span x-show="open">-</span>
            </button>
        </div>

        <x-journal.create-note />

    </div>
    <template x-if="postNote.notes.length > 0">

        <template  x-for="note in postNote.notes" :key="note.id">
            <div class="w-full my-8" x-data="{deleteNote: deleteNote(), deleted: false}" x-show="!deleted">
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
                <div class="flex bg-newspaper" x-data="{del: false}">

                    <p class="border border-dashed border-neutral-700 text-sm p-2 break-all
                            w-full" x-text="note.body"></p>

                    <button x-show="!del" @click="del = true" class="bg-neutral-700 text-newspaper text-2xl font-semibold px-2 h-fit">
                        <p class="rotate-45">+</p>
                    </button>

                    <form @submit.prevent="deleteNote.submit()" x-show="del">

                        <input type="hidden" x-init="deleteNote.formData.id = note.id"/>

                        <button @click="deleted = true" @click.outside="del = false" class="bg-red-900 text-newspaper text-2xl font-semibold px-2">
                            <p class="rotate-45">+</p>
                        </button>
                    </form>

                </div>
            </div>
        </template>
            <p class="text-center font-normal text-sm my-10">Fishing in progress...</p>
    </template>


    @forelse($notes as $note)
        <template x-if="postNote.notes.length === 0">
            <x-journal.note :note="$note" />
        </template>
    @empty
        <template x-if="postNote.notes.length === 0 ">
        </template>
    @endforelse

    <div class="absolute left-1/2 bottom-8 -translate-x-1/2">
        {{$notes->links()}}
    </div>
</div>
