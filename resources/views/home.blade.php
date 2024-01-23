<x-layout>
    <div class="flex flex-col
                md:flex-row md:border-b-2 md:border-neutral-700 ">


        <x-home.log-card :log="$log"/>
        <x-home.fly-card />

        <div class="flex flex-col
                    md:w-1/4">

            <x-home.joke />

            <x-home.one-liner />
        </div>
    </div>

    <x-home.article />

    <section class="px-4 pt-12 pb-8
                md:px-10">

        <h2 class="font-bold text-2xl pb-4">DISCUSSIONS</h2>

        @foreach($posts as $post)
            <x-discussions.post-card :post="$post" />
        @endforeach

        <a href="/discussions">
            <button class="bg-neutral-700 text-newspaper w-full font-semibold
                        py-3 hover-bg mt-10 text-xl
                        md:py-4 md:w-1/4">SEE ALL</button>
        </a>
    </section>
</x-layout>

