<x-layout>
    <div x-data="{notes: false, logs: true, open: false}">

        <x-journal.nav />

        <div class="mx-3 md:w-10/12 md:mx-auto lg:w-7/12">

            <x-journal.note-section :notes="$notes"/>
            <x-journal.log-section :options="$options" :flyCategories="$flyCategories" :logs="$logs"/>
        </div>
    </div>
</x-layout>
