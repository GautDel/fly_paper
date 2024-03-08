<div x-data="{ open: false }" class="flex flex-col w-full px-6 py-2
            border-b-2 border-neutral-700">

    <div @click="open = ! open, refs.plus.remove()" class="flex justify-between items-center cursor-pointer">

        <p class="font-normal">POSTS</p>

        <p x-show="!open" class="font-bold text-2xl">+</p>

        <p x-show="open" class="font-bold text-2xl">-</p>
    </div>

    <div x-show="open" @click.outside="open = false" class="mx-auto w-full
                    lg:w-1/2 lg:border-2 lg:border-neutral-700
                    lg:px-4 lg:py-4 lg:mb-8 lg:mt-4">



        @forelse($posts as $post)
        <div class="flex w-full">
            <a class="w-full" href="/discussions/{{$post->forumSection->slug}}/{{$post->slug}}">

                <div class="border-dashed border mb-8 w-full
                                    border-neutral-700 px-2 py-2
                                    hover-text hover:border-solid">

                    <p class="text-blue-900 text-sm mb-1
                                      font-normal">
                        <span class="text-neutral-700">SECTION: </span>{{Str::upper($post->forumSection->section)}}
                    </p>

                    <p class="text-blue-900 text-sm mb-1
                                      font-normal">
                        <span class="text-neutral-700">TITLE: </span>{{$post->title}}
                    </p>

                    <p class="text-blue-900 text-sm mb-1
                                      font-normal">
                        <span class="text-neutral-700">TIME: </span>
                        <span class="font-thin">{{TimeAgo::getTime(strtotime($post->created_at))}}</span>
                    </p>

                </div>

            </a>
        </div>

        @empty

        <p class="text-center font-normal text-sm my-10">Nothing here... Start commenting and see all your comments here!</p>

        @endforelse

    </div>
</div>
