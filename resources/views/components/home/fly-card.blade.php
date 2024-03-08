<article class="pt-12 border-b-2 border-neutral-700
            md:border-b-0 md:border-r-2 md:w-1/2 grow relative">

    <div class="max-w-lg mx-auto">
        <h2 class="font-bold text-2xl pb-4 mx-4
                   md:mx-10">FLY OF THE DAY</h2>

        <div class="mb-6 mx-4
                    md:mx-10">

            <p class="pb-2">

                <span class="font-semibold">TYPE:</span>

                <span class="capitalize font-normal text-blue-900">{{Str::upper($fly->category->name)}}</span>
            </p>

            <p class="line-clamp-2">

                <span class="font-semibold">DESCRIPTION:</span>

                <span class="">{{$fly->description}}</span>
            </p>

        </div>

        <div class="max-w-md grayscale hover-color hover-border border border-dashed p-2
                    border-neutral-700 mb-8 mx-4 items-center justify-center flex
                    md:mx-10">

            <img class="max-w-full" src="{{$fly->getImage()}}"></img>
        </div>

        <div class="flex flex-row justify-evenly font-semibold mx-4 mb-10
                    md:mx-10">

            <a href="/wiki/fly/{{$fly->id}}" class="w-full mr-4">

                <button class="border border-dashed border-neutral-700 w-full
                           py-3 hover-border-solid hover-text
                           md:py-4">READ MORE</button>
            </a>

            <a href="/market/product/{{$fly->id}}" class="w-full">

                <button class="border w-full bg-neutral-700 text-newspaper
                               py-3 hover-bg
                               md:py-4">PURCHASE</button>
            </a>
        </div>

    </div>

    <p class="w-full bg-neutral-700 text-newspaper font-bold text-4xl
              text-center pt-3 pb-2 md:absolute md:left-0 md:bottom-0 ">{{Str::upper($fly->name)}}</p>
</article>
