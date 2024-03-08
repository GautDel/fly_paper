<x-layout>

    <div class="flex items-center justify-between mx-4 mt-4
                md:w-8/12 md:mx-auto">

        <p class="text-sm ">

            <a href="/wiki/fish_species">
                <span class="cursor-pointer hover-text">Flies</span>
            </a>

            <span> > </span>

            <a href="/wiki/fish_species/{{$fishSpecies->category->id}}">
                <span class="cursor-pointer hover-text">{{$fishSpecies->category->name}}</span>
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
            {{Str::upper($fishSpecies->name)}}
        </h1>

         <div class="max-w-md grayscale hover-color hover-border border border-dashed p-2
                    border-neutral-700 mb-12 mx-auto flex justify-center items-center">

            <img class="max-w-full"
            src="{{$fishSpecies->getImage()}}"></img>
        </div>

        <div class=" flex w-full px-4 mb-8 md:mt-10 ">

            <p class="font-semibold text-sm mr-2">DESCRIPTION:</p>

            <span class="text-sm">{{$fishSpecies->description}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold whitespace-nowrap text-sm mr-2">TACTICS:</p>

            <span class="text-sm">{{$fishSpecies->tactics}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">WATER:</p>

            <span class="text-sm">{{$fishSpecies->water}}</span>
        </div>

        <div class=" flex w-full px-4 mb-8">

            <p class="font-semibold text-sm mr-2">ENVIRONMENT:</p>

            <span class="text-sm">{{$fishSpecies->environment}}</span>
        </div>
    </div>
</x-layout>
