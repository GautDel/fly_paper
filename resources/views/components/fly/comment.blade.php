            <div x-data="{ open: false }" class="flex flex-col mb-8 md:px-4">


                <span class="self-end text-xs pb-1">{{TimeAgo::getTime(strtotime($comment->updated_at))}}</span>

                <div class="flex mb-4">

                    <p class="font-semibold text-blue-900 mr-2
                              text-sm">{{$comment->user->name}}:</p>

                    <p x-show="!open" class="text-sm"> {{$comment->comment}}</p>

                @auth
                @if(Auth::user()->id === $comment->user_id)
                    <form x-show="open" method="POST" action="/flycomment/update"
                        class="flex flex-col w-full items-end">
                            @csrf
                            @method('PUT')

                            <input type="hidden" value="{{$fly->id}}" name="fly_id"/>
                            <input type="hidden" value="{{$comment->id}}" name="id"/>

                            <textarea rows="2" name="comment"
                                    class="w-full bg-newspaper text-blue-900
                                        border-dashed border border-neutral-700
                                        text-sm p-1 focus:border-solid
                                        outline-none">{{$comment->comment}}</textarea>
                            <button x-show="open"
                                    class="text-xs font-semibold p-1 mt-1
                                        hover-bg bg-neutral-700 text-newspaper">EDIT</button>
                        </form>

                @endif
                @endauth

                </div>

                @auth
                @if(Auth::user()->id === $comment->user_id)
                    <div  class="flex justify-end">

                            <button x-show="!open" x-on:click="open = ! open" class="text-xs font-semibold p-1 mr-2
                                        border-dashed border hover-text
                                        border-neutral-700">EDIT</button>

                        <form x-show="!open" method="POST" action="/flycomment/delete">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" value="{{$fly->id}}" name="fly_id"/>
                            <input type="hidden" value="{{$comment->id}}" name="id"/>

                            <button class="bg-red-900 text-newspaper border
                                        text-xs font-semibold p-1
                                        border-red-900">DELETE</button>
                        </form>

                    </div>
                @endif
                @endauth

            </div>
