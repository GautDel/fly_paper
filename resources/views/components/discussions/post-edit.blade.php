@auth
    @if(Auth::user()->id === $post->user_id)
        <div  class="flex justify-end">
            <form method="GET" action="/discussion/update/{{$post->id}}">
                @csrf
                <button class="text-xs font-semibold p-1 mr-2
                            border-dashed border hover-text
                            border-neutral-700">EDIT</button>
            </form>

            <div x-data="{open: false}">
                <button @click="open = true" x-show="!open"
                    class="bg-red-900 text-newspaper border
                        text-xs font-semibold p-1
                        border-red-900">DELETE</button>

                <form method="POST"
                    action="/discussions/delete"
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

