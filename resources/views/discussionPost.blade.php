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
                @auth
                    @if(Auth::user()->id === $post->user_id)
                        <div  class="flex justify-end">
                            <form method="POST" action="/discussions/update">
                                @csrf
                                <input type="hidden" name="id" value="{{$post->id}}" />
                                <button class="text-xs font-semibold p-1 mr-2
                                            border-dashed border hover-text
                                            border-neutral-700">EDIT</button>
                            </form>

                            <div x-data="{open: false}">
                            <button @click="open = true" x-show="!open"
                                class="bg-red-900 text-newspaper border
                                    text-xs font-semibold p-1
                                    border-red-900">DELETE</button>

                            <form method="POST" action="/discussions/delete"
                                x-show="open">
                                @csrf
                                @method('DELETE')

                                <input type="hidden" value="{{$post->forumSection->slug}}" name="category" />
                                <input type="hidden" value="{{$post->id}}" name="id"/>

                                <button class="bg-red-900 text-newspaper border
                                            text-xs font-semibold p-1
                                            border-red-900">ARE YOU SURE?</button>
                            </form>
                            </div>
                        </div>
                    @endif
                @endauth
            </div>

            @auth
            <div class="flex flex-col justify-start items-end">
                @if(isset($post->likedByUser[0]))
                    @if($post->likedByUser[0]->upvote == true)
                    <button type="submit" class="text-blue-900 rotate-90 font-bold text-lg hover-text"> < </button>
                    @else
                    <form method="POST" action="/discussions/upvote">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="slug" value="{{$post->slug}}" />
                        <input type="hidden" name="category" value="{{$post->forumSection->slug}}" />
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="upvote" value="true" />
                        <input type="hidden" name="forum_post_id" value="{{$post->id}}" />
                        <button type="submit" class="rotate-90 font-bold text-lg hover-text"> < </button>
                    </form>
                    @endif
                @else
                    <form method="POST" action="/discussions/upvote">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="slug" value="{{$post->slug}}" />
                        <input type="hidden" name="category" value="{{$post->forumSection->slug}}" />
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="upvote" value="true" />
                        <input type="hidden" name="forum_post_id" value="{{$post->id}}" />
                        <button type="submit" class="rotate-90 font-bold text-lg hover-text"> < </button>
                    </form>
                @endif
                <p class="font-semibold text-blue-900">{{$post->countVotes($post->id)}}</p>

                @if(isset($post->likedByUser[0]))
                    @if($post->likedByUser[0]->upvote == false)
                    <button type="submit" class="text-blue-900 rotate-90 font-bold text-lg hover-text"> > </button>
                    @else
                    <form method="POST" action="/discussions/upvote">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="slug" value="{{$post->slug}}" />
                        <input type="hidden" name="category" value="{{$post->forumSection->slug}}" />
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="upvote" value="false" />
                        <input type="hidden" name="forum_post_id" value="{{$post->id}}" />
                        <button type="submit" class="rotate-90 font-bold text-lg hover-text"> > </button>
                    </form>
                    @endif

                    @else
                    <form method="POST" action="/discussions/upvote">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="slug" value="{{$post->slug}}" />
                        <input type="hidden" name="category" value="{{$post->forumSection->slug}}" />
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
                        <input type="hidden" name="upvote" value="false" />
                        <input type="hidden" name="forum_post_id" value="{{$post->id}}" />
                        <button type="submit" class="rotate-90 font-bold text-lg hover-text"> > </button>
                    </form>
                @endif
            </div>
            @endauth

            @guest
            <div class="flex flex-col justify-start">
                <a href="/login">
                    <button type="submit" class="rotate-90 font-bold text-lg hover-text"> < </button>
                </a>

                    <p class="font-semibold text-blue-900">{{$post->countVotes($post->id)}}</p>

                <a href="/login">
                    <button type="submit" class="rotate-90 font-bold text-lg hover-text"> > </button>
                </a>
            </div>
            @endguest

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
        <input type="hidden" value="{{$post->forumSection->slug}}" name="category" />

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
