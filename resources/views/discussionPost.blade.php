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
            </div>

            <div class="flex flex-col justify-start">

                <button class="rotate-90 font-bold text-lg hover-text">
                    < </button>

                        <p class="font-semibold text-blue-900">{{$post->votes}}</p>

                        <button class="rotate-90 font-bold text-lg hover-text"> > </button>
            </div>

        </div>

    </div>

    <div class="flex flex-col w-full mx-auto md:max-w-5xl pb-12">
        @forelse($post->forumPostComments as $comment)
        <x-discussions.post-comment :comment="$comment" />
        @empty

            <p class="text-center font-normal text-sm my-10">Be the first to share your thoughts!</p>
        @endforelse
    </div>
    @auth

    <form method="POST" action="/discussions/postcomment/create"
        class="w-full flex flex-col px-4 my-10 mx-auto
            md:max-w-5xl md:px-2">
        @csrf

        <input type="hidden" value="{{$post->id}}" name="forum_post_id" />

        <input type="hidden" value="{{Auth::id()}}" name="user_id" />
        <input type="hidden" value="{{$post->slug}}" name="slug" />
        <input type="hidden" value="{{$post->forumSection->section}}" name="category" />

        <div x-data="{ count: 0 }" x-init="count = $refs.countme.value.length" class="flex flex-col py-2">

            <textarea rows="4" name="comment" maxlength="250" id="text" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" placeholder="Do to others as you would have others do to you..." class="border-dashed border bg-newspaper
                                border-neutral-700 text-sm p-2
                                text-blue-900
                                focus:outline-none
                                focus:border-neutral-900
                                focus:border-solid"></textarea>

            <div class="text-sm mt-1">

                <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
            </div>
        </div>

        <button type="submit" class="bg-neutral-700 text-newspaper self-end px-2 py-1
                               font-semibold mt-3 mb-4 hover-bg">COMMENT</button>

        @error('comment')
        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
        @enderror
    </form>
    @endauth

</x-layout>
