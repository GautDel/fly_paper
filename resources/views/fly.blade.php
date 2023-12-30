<x-layout>

    <div class="flex items-center justify-between mx-4 mt-4
                md:w-8/12 md:mx-auto">

        <p class="text-sm ">

            <a href="/wiki/flies">
                <span class="cursor-pointer hover-text">Flies</span>
            </a>

            <span> > </span>

            <a href="/wiki/flies/{{$fly->categories[0]->id}}">
                <span class="cursor-pointer hover-text">{{$fly->categories[0]->name}}</span>
            </a>
        </p>

        <a href="/wiki">
            <p class="text-sm border border-neutral-700 border-dashed
                      cursor-pointer px-1 hover-text">WIKI</p>
        </a>
    </div>

    <div class="mt-6 mb-10
                md:w-8/12 md:mx-auto md:border-2 md:border-neutral-700">

        <h1 class="bg-neutral-700 text-newspaper font-semibold text-center
                   py-2 text-2xl mb-10">
            {{Str::upper($fly->name)}}
        </h1>

         <div class="max-w-md grayscale hover-color hover-border border border-dashed p-2
                    border-neutral-700 mb-12 mx-auto">

            <img class="max-w-full"
            src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>
        </div>

        <div class=" flex w-full px-4 mb-8 md:mt-10 ">

            <p class="font-semibold text-sm mr-2">DESCRIPTION:</p>

            <span class="text-sm">{{$fly->description}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold whitespace-nowrap text-sm mr-2">FISH SPECIES:</p>

            <span class="text-sm">{{$fly->fish_species}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">TYING:</p>

            <span class="text-sm">{{$fly->tying}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">TACTICS:</p>

            <span class="text-sm">{{$fly->tactics}}</span>
        </div>

        <hr class="border-t border-neutral-700 border-dashed mx-4">

        <div class="px-4 pb-8">

            <p class="font-semibold text-xl py-4">COMMENTS</p>


            @forelse($comments as $comment)
            <div x-data="{ open: false }" class="flex flex-col mb-8 md:px-4">


                <span class="self-end text-xs pb-1">{{$comment->updated_at}}</span>

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

            @empty
                <p>Looks like no one has commented on this fly yet... why don't you?</p>
            @endforelse

            @auth
            <form method="POST" action="/flycomment/create"
                  class="w-full flex flex-col md:px-4">

                @csrf

                <input type="hidden" value="{{$fly->id}}" name="fly_id"/>

                <input type="hidden" value="{{Auth::id()}}" name="user_id"/>

                <div x-data="{ count: 0 }"
                    x-init="count = $refs.countme.value.length"
                    class="flex flex-col py-2">

                    <textarea rows="4" name="comment" maxlength="250"
                            id="text"
                            x-ref="countme"
                            x-on:keyup="count = $refs.countme.value.length"
                            placeholder="Do to others as you would have others do to you..."
                            class="border-dashed border bg-newspaper
                                border-neutral-700 text-sm p-2
                                text-blue-900
                                focus:outline-none
                                focus:border-neutral-900
                                focus:border-solid"></textarea>

                    <div class="text-sm mt-1">

                        <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
                    </div>
                </div>

                <button type="submit"
                        class="bg-neutral-700 text-newspaper self-end px-2 py-1
                               font-semibold mt-3 mb-4 hover-bg">COMMENT</button>

                @error('comment')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                @enderror
            </form>
            @endauth
        </div>
    </div>
</x-layout>
