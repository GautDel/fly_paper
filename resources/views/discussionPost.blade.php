<x-layout>
    <div class="flex justify-between border-dashed
            border-b border-neutral-700 px-4 py-8">

     <div class="flex flex-col justify-between w-full">

        <p class="text-sm">

            <a href="/discussions">
                <span class="cursor-pointer hover-text">Discussions</span>
            </a>

            <span> > </span>

            <a href="/discussions/{{$post->forumSection->slug}}">
                <span class="cursor-pointer hover-text">{{ucfirst($post->forumSection->section)}}</span>
            </a>
        </p>

        <h1 class="font-semibold text-2xl my-6">{{$post->title}}</h1>

        <p class="text-sm">{{$post->body}}</p>
     </div>

        <div class="flex flex-col justify-start">

            <button class="rotate-90 font-bold text-lg hover-text"> < </button>

                    <p class="font-semibold text-blue-900">{{$post->votes}}</p>

            <button class="rotate-90 font-bold text-lg hover-text"> > </button>
        </div>
    </div>
</x-layout>
