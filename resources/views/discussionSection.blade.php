<x-layout>

<div class="w-full border-b-2 border-neutral-700 pt-8 mb-10
            md:px-8
            xl:px-20">

     <div class="flex items-center justify-between px-4 mb-8
            md:px-0">

        <p class="text-sm ">

            <a href="/discussions">
                <span class="cursor-pointer hover-text">Discussions</span>
            </a>

            <span> > </span>

            <a href="/discussions/{{$slug}}">
                <span class="cursor-pointer hover-text">{{ucfirst($section)}}</span>
            </a>
        </p>

        @auth
        <a href="/discussions/{{$slug}}/create">
            <p class="bg-neutral-700 text-newspaper font-semibold
                      cursor-pointer px-2 py-1 hover-bg">CREATE</p>
        </a>

        @endauth
    </div>


        <div class="flex justify-between bg-neutral-700 text-newspaper px-4
                    py-2 text-2xl font-semibold cursor-pointer hover-bg
                    ">

            <h2>{{Str::upper($section)}}</h2>
            <p> > </p>
        </div>
    <div class="px-4 pt-8
                md:px-0">
        @foreach($posts as $post)
            <x-discussions.post-card :post="$post" />
        @endforeach
    </div>

</div>
</x-layout>
