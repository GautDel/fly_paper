<div class="w-full border-b-2 border-neutral-700 pt-8 mb-10
            md:px-8
            xl:px-20">

    <a href="/discussions/{{$slug}}" >
        <div class="flex justify-between bg-neutral-700 text-newspaper px-4
                    py-2 text-2xl font-semibold cursor-pointer hover-bg">

            <h2>{{Str::upper($section)}}</h2>

            <p> > </p>

        </div>
    </a>

    <div class="px-4 pt-8
                md:px-0">

        @foreach($posts as $post)
            <x-discussions.post-card :post="$post"/>
        @endforeach
    </div>
</div>

