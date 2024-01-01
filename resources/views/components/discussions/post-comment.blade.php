<div x-data="{ open: false }"
    class="flex flex-col border-dashed border-b
        border-neutral-700 mx-3 pt-8 pb-2">

    <div class="self-end pb-1">
        <span class="text-xs">{{TimeAgo::getTime(strtotime($comment->updated_at))}}</span>
        <span class="text-xs font-semibold">#1</span>
    </div>

    <div class="flex mb-4">
        <p class="font-semibold text-blue-900 mr-2
                              text-sm">{{$comment->user->name}}</p>

        <p x-show="!open" class="text-sm">{{$comment->comment}}</p>

        @auth
        @if(Auth::user()->id === $comment->user_id)
            <form x-show="open" method="POST" action="/discussions/postcomment/update"
                class="flex flex-col w-full items-end">
                @csrf
                @method('PUT')

                <input type="hidden" value="{{$comment->forumPost->slug}}" name="slug" />
                <input type="hidden" value="{{$comment->forumPost->forumSection->section}}" name="category" />
                <input type="hidden" value="{{$comment->id}}" name="id"/>


                <textarea rows="2" name="comment"
                    class="w-full bg-newspaper text-blue-900
                        border-dashed border border-neutral-700
                        text-sm p-1 focus:border-solid
                        outline-none">{{$comment->comment}}</textarea>

                    <button x-show="open"
                        class="text-xs font-semibold px-2 py-1 mt-1
                        hover-bg bg-neutral-700 text-newspaper">SAVE</button>
            </form>

        @endif
        @endauth
    </div>

<div class="flex justify-start items-center text-sm ">

    <button class="rotate-90 font-bold hover-text"> < </button>

    <p class="font-semibold text-blue-900 mx-2 text-xs">{{$comment->votes}}</p>

    <button class="rotate-90 font-bold hover-text"> > </button>
</div>


                @auth
                @if(Auth::user()->id === $comment->user_id)
                    <div  class="flex justify-end">

                        <button x-show="!open" x-on:click="open = ! open"
                            class="text-xs font-semibold p-1 mr-2
                                border-dashed border hover-text
                                border-neutral-700">EDIT</button>

                        <form x-show="!open" method="POST" action="/discussions/postcomment/delete">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" value="{{$comment->forumPost->slug}}" name="slug" />
                            <input type="hidden" value="{{$comment->forumPost->forumSection->section}}" name="category" />
                            <input type="hidden" value="{{$comment->id}}" name="id"/>

                            <button class="bg-red-900 text-newspaper border
                                        text-xs font-semibold p-1
                                        border-red-900">DELETE</button>
                        </form>

                    </div>
                @endif
                @endauth

</div>
