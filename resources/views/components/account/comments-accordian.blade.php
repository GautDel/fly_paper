<div x-data="{ open: false }" class="flex flex-col w-full px-6 py-2
            border-b-2 border-neutral-700">

    <div @click="open = ! open" class="flex justify-between items-center cursor-pointer">

        <p class="font-normal">COMMENTS</p>

        <p x-show="!open" class="font-bold text-2xl">+</p>

        <p x-show="open" class="font-bold text-2xl">-</p>
    </div>

    <div x-show="open" @click.outside="open = false" class="flex flex-col w-full">

        <h2 class="mt-8 text-center font-semibold">FLY COMMENTS</h2>

        <div class="mx-auto w-full
                    lg:w-1/2 lg:border-2 lg:border-neutral-700
                    lg:px-4 lg:py-2 lg:mb-8 lg:mt-4">


            @forelse($flyComments as $flyComment)
            <div class="flex items-start">
                <a href="/wiki/fly/{{$flyComment->fly->id}}">

                    <div class="border-dashed border mb-8 w-full
                                    border-neutral-700 px-2 py-2
                                    hover-text hover:border-solid">

                        <p class="text-blue-900 text-sm mb-1
                                      font-normal">
                            <span class="text-neutral-700">POST: </span>{{$flyComment->fly->name}}
                        </p>

                        <p class="text-blue-900 text-sm">

                            <span class="font-normal
                                             text-neutral-700">COMMENT: </span>{{$flyComment->comment}}
                        </p>
                    </div>

                </a>
                <div x-data="{verify: false}">
                    <button x-show="!verify" @click="verify = true" class="bg-neutral-700 text-newspaper font-semibold
                            px-3 py-1 hover-bg cursor-pointer">
                        <p class="rotate-45 text-2xl">+</p>
                    </button>


                    <form x-show="verify" method="POST" action="/account/fly_comment/delete" class="bg-red-900 text-newspaper font-semibold
                            px-3 py-1 cursor-pointer">

                        @csrf
                        @method('DELETE')

                        <input hidden name="id" value="{{$flyComment->id}}" />

                        <button type="submit" class="rotate-45 text-2xl">+</button>
                    </form>
                </div>
            </div>

            @empty
            <p class="text-center font-normal text-sm my-10">Nothing here... Start commenting on flies and see all your comments here!</p>
            @endforelse
        </div>


        <h2 class="mt-8 text-center font-semibold">POST COMMENTS</h2>
        <div class="mx-auto w-full
                    lg:w-1/2 lg:border-2 lg:border-neutral-700 py-6
                    lg:px-4 lg:py-8 lg:mb-8 lg:mt-4">

            @forelse($postComments as $postComment)
            <div class="flex items-start">
                <a class="w-full" href="/discussions/{{$postComment->forumPost->forumSection->slug}}/{{$postComment->forumPost->slug}}">

                    <div class="border-dashed border mb-8 w-full
                                    border-neutral-700 px-2 py-2
                                    hover-text hover:border-solid">

                        <p class="text-blue-900 text-sm mb-1
                                      font-normal">
                            <span class="text-neutral-700">POST: </span>{{$postComment->forumPost->title}}
                        </p>

                        <p class="text-blue-900 text-sm">

                            <span class="font-normal
                                             text-neutral-700">COMMENT: </span>{{$postComment->comment}}
                        </p>
                    </div>

                </a>
                <div x-data="{verify: false}">
                    <button x-show="!verify" @click="verify = true" class="bg-neutral-700 text-newspaper font-semibold
                            px-3 py-1 hover-bg cursor-pointer">
                        <p class="rotate-45 text-2xl">+</p>
                    </button>

                    <form x-show="verify" method="POST" action="/account/post_comment/delete" class="">

                        @csrf
                        @method('DELETE')

                        <input hidden name="id" value="{{$postComment->id}}" />

                        <button type="submit" class="bg-red-900 text-newspaper font-semibold
                            px-3 py-1 cursor-pointer">
                            <p class="rotate-45 text-2xl">+</p>
                        </button>
                    </form>
                </div>
            </div>

            @empty
            <p class="text-center font-normal text-sm my-10">Nothing here... Start commenting on posts and see all your comments here!</p>
            @endforelse
        </div>
    </div>
</div>
