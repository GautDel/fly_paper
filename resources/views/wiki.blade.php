<x-layout>
    <div>
        <form action="/wiki/search"
              method="POST"
              class="flex border-b-2 border-neutral-700 outline-black">
            @csrf
            <select name="category"
                    class="bg-neutral-700 font-semibold text-sm px-2
                           text-newspaper cursor-pointer text-center">
                <option>FISH SPECIES</option>
                <option>MATERIALS</option>
                <option>FLIES</option>
            </select>

            <input name="search"
                   class="w-full bg-newspaper px-2 text-blue-900 !outline-none
                          text-sm font-semibold"
                   placeholder="Search for a fly/fish/material" />

            <button class="bg-neutral-700 text-newspaper font-normal
                           px-2 py-2 hover-bg">SEARCH</button>
        </form>

        <div class="border-2">
            <div x-data="{ open: false }" class="flex flex-col w-full px-6 py-2
                        border-b-2 border-neutral-700 cursor-pointer">
                <div @click="open = ! open" class="flex justify-between items-center ">
                    <p class="font-normal">FISH SPECIES</p>
                    <p x-show="!open" class="font-bold text-2xl">+</p>
                    <p x-show="open" class="font-bold text-2xl">-</p>
                </div>
                <div x-show="open" @click.outside="open = false" class="w-full pl-4 ">

                    <p class="font-normal hover-text">- Dry Flies</p>
                    <p class="font-normal hover-text">- Streamers</p>
                    <p class="font-normal hover-text">- Zonkers</p>
                    <p class="font-normal hover-text">- Nymphs</p>
                    <p class="font-normal hover-text">- Eggs</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="flex flex-col w-full px-6 py-2
                        border-b-2 border-neutral-700 cursor-pointer">

                <div  @click="open = ! open, refs.plus.remove()" class="flex justify-between items-center ">
                    <p class="font-normal">MATERIALS</p>
                    <p x-show="!open" class="font-bold text-2xl">+</p>
                    <p x-show="open" class="font-bold text-2xl">-</p>
                </div>
                <div x-show="open" @click.outside="open = false" class="w-full pl-4">

                    <a href="/wiki/dry_flies">
                        <p class="font-normal hover-text">- Dry Flies</p>
                    </a>
                    <p class="font-normal hover-text">- Streamers</p>
                    <p class="font-normal hover-text">- Zonkers</p>
                    <p class="font-normal hover-text">- Nymphs</p>
                    <p class="font-normal hover-text">- Eggs</p>
                </div>
            </div>

            <div x-data="{ open: false }" class="flex flex-col w-full px-6 py-2
                        border-b-2 border-neutral-700 cursor-pointer">
                <div @click="open = ! open" class="flex justify-between items-center ">
                    <p class="font-normal">FLIES</p>
                    <p x-show="!open" class="font-bold text-2xl">+</p>
                    <p x-show="open" class="font-bold text-2xl">-</p>
                </div>
                <div x-show="open" @click.outside="open = false" class="w-full pl-4">
                    <a href="/wiki/flies">
                        <p class="font-normal hover-text">- See All</p>
                    </a>
                    <a href="/wiki/flies/1">
                        <p class="font-normal hover-text">- Dry Flies</p>
                    </a>
                    <a href="/wiki/flies/2">
                        <p class="font-normal hover-text">- Wet Flies</p>
                    </a>
                    <a href="/wiki/flies/3">
                        <p class="font-normal hover-text">- Nymphs</p>
                    </a>
                    <a href="/wiki/flies/4">
                        <p class="font-normal hover-text">- Streamers</p>
                    </a>
                </div>
            </div>
        </div>
        @isset($category)
            <p class="text-center text-2xl font-semibold mt-8">{{Str::upper($category)}}</p>
        @endisset
        <div class="grid grid-cols-1 px-4 py-8
                    sm:grid-cols-2
                    md:grid-cols-3
                    xl:grid-cols-4">

            @foreach($flies as $fly)
            <a href="/wiki/fly/{{$fly->id}}">


                <div class="grid content-stretch border-2 border-neutral-700
                            mb-14 cursor-pointer
                            sm:mx-4">

                    <div class="mx-auto grayscale hover-color px-4 py-4">

                    <img class="max-w-full"
                        src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>
                </div>

                    <div class="flex justify-center items-center bg-neutral-700 text-center text-newspaper
                              font-semibold text-2xl py-2 ">
                        <p>{{$fly->name}}</p>
                    </div>
                </div>
            </a>

            @endforeach
        </div>
    </div>

</x-layout>
