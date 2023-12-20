<x-layout>

    <div class="flex items-center justify-between mx-4 mt-4
                md:w-8/12 md:mx-auto">
        <p class="text-sm ">
            <a>
                <span class="cursor-pointer hover-text">Flies</span>
            </a>
            <span> > </span>
            <a>
                <span class="cursor-pointer hover-text">Dry Flies</span>
            </a>
        </p>
        <a>
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

            <div class="flex flex-col mb-8
                        md:px-4">
                <span class="self-end text-xs pb-1">12 hours ago</span>
                <div class="flex mb-4">
                    <p class="font-semibold text-blue-900 mr-2
                              text-sm">gramps64:</p>
                    <p class="text-sm">In enim tortor, vestibulum at dui a, congue lobortis nunc. Vestibulum a laoreet velit. Nullam aliquam ante neque, in eleifend risus consectetur sed. Ut at tincidunt nisi, vitae sollicitudin quam. Suspendisse ac dolor vel metus pulvinar gravida.</p>
                </div>
            </div>

            <div class="flex flex-col mb-8
                        md:px-4">
                <span class="self-end text-xs pb-1">12 hours ago</span>
                <div class="flex mb-4">
                    <p class="font-semibold text-blue-900 mr-2
                              text-sm">gramps64:</p>
                    <p class="text-sm">In enim tortor, vestibulum at dui a, congue lobortis nunc. Vestibulum a laoreet velit. Nullam aliquam ante neque, in eleifend risus consectetur sed. Ut at tincidunt nisi, vitae sollicitudin quam. Suspendisse ac dolor vel metus pulvinar gravida.</p>
                </div>
            </div>

            <form class="w-full flex flex-col
                         md:px-4">
                <textarea class="w-full border border-neutral-700 border-dashed
                                 bg-newspaper px-4 py-2 text-sm"
                          rows="4"
                          placeholder="Do to others as you would have others do to you..."></textarea>
                <button type="submit"
                        class="bg-neutral-700 text-newspaper self-end px-2 py-1
                               font-semibold mt-3 mb-4 hover-bg">COMMENT</button>
            </form>
        </div>
    </div>
</x-layout>
