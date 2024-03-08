<x-layout>
    <div>
        <form action="/wiki/search" method="POST" class="flex border-b-2 border-neutral-700 outline-black">
            @csrf
            <select name="category" class="bg-neutral-700 font-semibold text-sm px-2
                           text-newspaper cursor-pointer text-center">
                <option value="FISH_SPECIES">FISH SPECIES</option>
                <option value="MATERIALS">MATERIALS</option>
                <option value="FLIES">FLIES</option>
            </select>

            <input name="search" class="w-full bg-newspaper px-2 text-blue-900 !outline-none
                          text-sm font-semibold" placeholder="Search for a fly/fish/material" />

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

                    <a href="/wiki/fish_species">
                        <p class="font-normal hover-text">- See All</p>
                    </a>

                    @foreach($fishSpeciesCategories as $category)
                    <a href="/wiki/fish_species/{{$category->id}}">
                        <p class="font-normal hover-text">- {{$category->name}}</p>
                    </a>
                    @endforeach
                </div>
            </div>

            <div x-data="{ open: false }" class="flex flex-col w-full px-6 py-2
                        border-b-2 border-neutral-700 cursor-pointer">

                <div @click="open = ! open, refs.plus.remove()" class="flex justify-between items-center ">
                    <p class="font-normal">MATERIALS</p>
                    <p x-show="!open" class="font-bold text-2xl">+</p>
                    <p x-show="open" class="font-bold text-2xl">-</p>
                </div>
                <div x-show="open" @click.outside="open = false" class="w-full pl-4">
                    <a href="/wiki/materials">
                        <p class="font-normal hover-text">- See All</p>
                    </a>

                    @foreach($materialCategories as $category)
                    <a href="/wiki/materials/{{$category->id}}">
                        <p class="font-normal hover-text">- {{$category->name}}</p>
                    </a>
                    @endforeach
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

                    @foreach($flyCategories as $category)
                    <a href="/wiki/flies/{{$category->id}}">
                        <p class="font-normal hover-text">- {{$category->name}}</p>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
        @isset($chosenCategory)
        <p class="text-center text-2xl font-semibold mt-8">{{Str::upper($chosenCategory->name)}}</p>
        @endisset
        <div class="grid grid-cols-1 px-4 py-8
                    sm:grid-cols-2
                    md:grid-cols-3
                    xl:grid-cols-4">

            @isset($materials)
            @foreach($materials as $material)
            <a href="/wiki/material/{{$material->id}}">


                <div class="grid content-stretch border-2 border-neutral-700
                            mb-14 cursor-pointer
                            sm:mx-4">

                    <div class="mx-auto grayscale hover-color px-4 py-4">
                        <img class="max-w-full" src="{{$material->getImage()}}" />
                    </div>

                    <div class="flex justify-center items-center bg-neutral-700 text-center text-newspaper
                              font-semibold text-2xl py-2 ">
                        <p>{{$material->name}}</p>
                    </div>
                </div>
            </a>

            @endforeach
            @endisset

            @isset($flies)
            @foreach($flies as $fly)
            <a href="/wiki/fly/{{$fly->id}}">


                <div class="grid content-stretch border-2 border-neutral-700
                            mb-14 cursor-pointer
                            sm:mx-4">

                    <div class="mx-auto grayscale hover-color px-4 py-4">

                        <img class="max-w-full" src="{{$fly->getImage()}}" />
                    </div>

                    <div class="flex justify-center items-center bg-neutral-700 text-center text-newspaper
                              font-semibold text-2xl py-2 ">
                        <p>{{$fly->name}}</p>
                    </div>
                </div>
            </a>
            @endforeach
            @endisset

            @isset($fishSpecies)
            @foreach($fishSpecies as $species)
            <a href="/wiki/species/{{$species->id}}">


                <div class="grid content-stretch border-2 border-neutral-700
                            mb-14 cursor-pointer
                            sm:mx-4">

                    <div class="mx-auto grayscale hover-color px-4 py-4">

                        <img class="max-w-full" src="{{$species->getImage()}}" />
                    </div>

                    <div class="flex justify-center items-center bg-neutral-700 text-center text-newspaper
                              font-semibold text-2xl py-2 ">
                        <p>{{$species->name}}</p>
                    </div>
                </div>
            </a>

            @endforeach
            @endisset
        </div>
    </div>

</x-layout>
