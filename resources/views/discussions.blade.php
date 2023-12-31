<x-layout>

    @foreach($sections as $section)

        <x-discussions.category-card
            :section="$section->section"
            :slug="$section->slug"
            :id="$section->id"
            :posts="$section->posts"
            />
    @endforeach

</x-layout>
