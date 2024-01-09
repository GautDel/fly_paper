<x-layout>
    <div class="flex justify-between border-dashed
            border-b border-neutral-700 px-4 py-8">

        <div class="flex w-full md:max-w-6xl mx-auto">
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

                <p class="text-sm pr-10">{{$post->body}}</p>

                <x-discussions.post-edit :post="$post" />
            </div>

                <x-discussions.post-vote :post="$post"/>

        </div>
    </div>

    <div class="flex flex-col w-full mx-auto md:max-w-5xl pb-12">

        @forelse($post->forumPostComments as $order=>$comment)
            <x-discussions.post-comment :comment="$comment" :order="$order"  />
        @empty
            <p class="text-center font-normal text-sm my-10">Be the first to share your thoughts!</p>
        @endforelse

    </div>

    <x-discussions.create-comment :post="$post" />
</x-layout>
