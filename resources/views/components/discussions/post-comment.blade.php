<div x-data="{ edit: false, verify: false }"
    class="flex flex-col border-dashed border-b
        border-neutral-700 mx-3 pt-8 pb-2">

    <div class="self-end pb-1">
        <span class="text-xs">{{TimeAgo::getTime(strtotime($comment->updated_at))}}</span>
        <span class="text-xs font-semibold">#{{$order + 1}}</span>
    </div>

    <div class="flex mb-4">
        <p class="font-semibold text-blue-900 mr-2
                              text-sm">{{$comment->user->name}}</p>

        <p x-show="!edit" class="text-sm">{{$comment->comment}}</p>

        @auth
        @if(Auth::user()->id === $comment->user_id)
            <form x-show="edit" method="POST" action="/discussions/postcomment/update"
                class="flex flex-col w-full items-end">
                @csrf
                @method('PUT')

                <input type="hidden" value="{{$comment->forumPost->slug}}" name="slug" />
                <input type="hidden" value="{{$comment->forumPost->forumSection->slug}}" name="category" />
                <input type="hidden" value="{{$comment->id}}" name="id"/>

                <x-global.char-counter >
                    <textarea rows="2" name="comment" maxlength="250"
                        x-ref="countme"
                        x-on:keyup="count = $refs.countme.value.length"
                        class="w-full bg-newspaper text-blue-900
                            border-dashed border border-neutral-700
                            text-sm p-1 focus:border-solid
                            outline-none">{{$comment->comment}}</textarea>


                </x-global.char-counter>
                    <button x-show="edit"
                        class="text-xs font-semibold px-2 py-1 mt-1
                        hover-bg bg-neutral-700 text-newspaper">SAVE</button>
            </form>

        @endif
        @endauth
    </div>

            <div class="flex flex-row justify-start items-center w-fit px-2">
                <x-discussions.comment-vote :comment="$comment" />
            </div>

    @auth
        @if(Auth::user()->id === $comment->user_id)
            <div x-show="!edit" class="flex justify-end">

                <button x-on:click="edit = ! edit"
                    class="text-xs font-semibold p-1 mr-2
                        border-dashed border hover-text
                        border-neutral-700">EDIT</button>

                    <button @click="verify = true" x-show="!verify"
                        class="bg-red-900 text-newspaper border
                            text-xs font-semibold p-1
                            border-red-900">DELETE</button>

                    <form x-show="verify" method="POST" action="/discussions/postcomment/delete">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" value="{{$comment->forumPost->slug}}" name="slug" />
                        <input type="hidden" value="{{$comment->forumPost->forumSection->slug}}" name="category" />
                        <input type="hidden" value="{{$comment->id}}" name="id"/>

                        <button class="bg-red-900 text-newspaper border
                                    text-xs font-semibold p-1
                                    border-red-900">ARE YOU SURE?</button>
                </form>

            </div>
        @endif
    @endauth
</div>
