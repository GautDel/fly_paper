<x-layout>

    <div class="flex items-center justify-between mx-4 mt-4
                md:w-8/12 md:mx-auto">

        <p class="text-sm ">

            <a href="/wiki/flies">
                <span class="cursor-pointer hover-text">Flies</span>
            </a>

            <span> > </span>

            <a href="/wiki/flies/{{$fly->category->id}}">
                <span class="cursor-pointer hover-text">{{$fly->category->name}}</span>
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
                    border-neutral-700 mb-12 mx-auto flex justify-center items-center">

            <img class="max-w-full"
            src="{{$fly->getImage()}}"></img>
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

                <x-fly.comment :comment="$comment" :fly="$fly"/>

            @empty
                <p class="font-normal text-sm text-center pb-4">Looks like no one has commented on this fly yet... why don't you?</p>
            @endforelse

            @auth
            <form method="POST" action="/flycomment/create"
                  class="w-full flex flex-col md:px-4">

                @csrf

                <input type="hidden" value="{{$fly->id}}" name="fly_id"/>

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
