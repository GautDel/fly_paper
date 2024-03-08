<div class="pt-12 pb-12 border-b-2 border-neutral-700 px-4 h-fit flex flex-col
            md:pb-0">


    <h2 class="font-bold text-2xl pb-4">JOKE
        <span class="md:hidden">OF THE DAY</span>
    </h2>

    <p class="border border-dashed border-neutral-700 w-1/2 p-2
              md:w-full md:text-sm
              lg:w-3/4">
        {{$joke->text_1}}
    </p>
    <p class="border border-dashed border-neutral-700 w-1/2 self-end p-2
              my-10 mr-10
              md:w-full md:text-sm md:mr-0
              lg:w-3/4 lg:mr-2">
        {{$joke->text_2}}
    </p>
    <p class="border border-dashed border-neutral-700 w-1/2 p-2 font-normal
              md:w-full md:text-sm md:mb-10 text-blue-900
              lg:w-3/4">

        {{$joke->text_3}}
    </p>

</div>
