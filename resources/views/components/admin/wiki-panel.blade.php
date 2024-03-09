<div x-data="{ open: false }" class="flex flex-col w-full px-6 py-2
                border-b-2 border-neutral-700">

    <div @click="open = ! open, refs.plus.remove()" class="flex justify-between items-center cursor-pointer">

        <p class="font-normal">WIKI PANEL</p>

        <p x-show="!open" class="font-bold text-2xl">+</p>

        <p x-show="open" class="font-bold text-2xl">-</p>
    </div>

    <div x-show="open" class="flex flex-wrap">
        <div class="mx-auto lg:m-4 w-full lg:w-1/4 mb-10
                    border-2 border-neutral-700 p-3 grow">

            <p class="font-semibold">ADD A FLY</p>
            <div class="flex flex-wrap">
                @foreach($flies as $fly)
                <p class="whitespace-nowrap bg-neutral-700 text-newspaper mr-1 mb-1 px-1 font-semibold">{{$fly->name}}</p>
                @endforeach
            </div>


            <form class="mx-auto md:w-full" action="/admin/add_fly" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mb-4 ">

                    <label class="font-semibold text-sm mb-1">NAME</label>

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" placeholder="Adam's Fly" name="fly_name" value="{{ old('name')}}" />

                    @error('fly_name')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>


                <div class="flex flex-col w-full mb-4">

                    <label class="font-semibold text-sm mb-1">DESCRIPTION</label>

                    <div class="flex w-full">

                        <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="fly_description" placeholder="The best fly for trout">{{old('fly_description')}}</textarea>
                    </div>

                    @error('fly_description')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>


                <div class="flex flex-col mb-4 ">

                    <div class="flex-col mr-10 w-full mb-4">

                        <label class="font-semibold text-sm mb-1">FISH SPECIES</label>

                        <div class="flex w-full">

                            <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="fish_species" placeholder="trout, salmon, walleye" value="{{old('fish_species')}}" />
                        </div>

                        @error('fish_species')
                        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mb-4 ">

                    <div class="flex-col mr-10 w-full mb-4">

                        <label class="font-semibold text-sm mb-1">TYING</label>

                        <div class="flex w-full">

                            <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="fly_tying" placeholder="Tying information">{{old('tying')}}</textarea>
                        </div>

                        @error('fly_tying')
                        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mb-4 ">

                    <div class="flex-col mr-10 w-full mb-4">

                        <label class="font-semibold text-sm mb-1">TACTICS</label>

                        <div class="flex w-full">

                            <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="fly_tactics" placeholder="Fishing tactics">{{old('tactics')}}</textarea>
                        </div>

                        @error('fly_tactics')
                        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                        @enderror
                    </div>

                </div>

                <div class="flex flex-col mb-4">

                    <label class="font-semibold text-sm mb-1">FLY CATEGORY</label>

                    <div class="flex w-full">
                        <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2 py-1" name="fly_category">
                            @foreach($flyCategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('fly_category')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex flex-col w-full mb-4">
                    <label class=" font-semibold text-sm mb-1">IMAGE</label>
                    <div class="flex w-full">
                        <input type="file" name="image" accept="image/png, image/jpeg" />
                    </div>

                    @error('image')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex w-full justify-end items-center">
                    <button class="bg-neutral-700 text-newspaper font-semibold
                                        px-6 py-2 w-full">ADD</button>
                </div>
            </form>
        </div>

        <div class="mx-auto lg:m-4 w-full lg:w-1/4 mb-10
                    border-2 border-neutral-700 p-3 grow">

            <p class="font-semibold">ADD A MATERIAL</p>
            <div class="flex flex-wrap">
                @foreach($materials as $material)
                <p class="whitespace-nowrap bg-neutral-700 text-newspaper mr-1 mb-1 px-1 font-semibold">{{$material->name}}</p>
                @endforeach
            </div>


            <form class="mx-auto md:w-full" action="/admin/add_material" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mb-4 ">

                    <label class="font-semibold text-sm mb-1">NAME</label>

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" placeholder="Pheasant Feather" name="material_name" value="{{ old('material_name')}}" />

                    @error('material_name')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>


                <div class="flex flex-col w-full mb-4">

                    <label class="font-semibold text-sm mb-1">DESCRIPTION</label>

                    <div class="flex w-full">

                        <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="material_description" placeholder="The best fly for trout">{{old('description')}}</textarea>
                    </div>

                    @error('material_description')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-col mb-4">

                    <label class="font-semibold text-sm mb-1">MATERIAL CATEGORY</label>

                    <div class="flex w-full">
                        <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2 py-1" name="material_category">
                            @foreach($materialCategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('material_category')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-col w-full mb-4">
                    <label class=" font-semibold text-sm mb-1">IMAGE</label>
                    <div class="flex w-full">
                        <input type="file" name="material_image" accept="image/png, image/jpeg" />
                    </div>

                    @error('image')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex w-full justify-end items-center">
                    <button class="bg-neutral-700 text-newspaper font-semibold
                                        px-6 py-2 w-full">ADD</button>
                </div>
            </form>
        </div>

        <div class="mx-auto lg:m-4 w-full lg:w-1/4 mb-10
                    border-2 border-neutral-700 p-3 grow">

            <p class="font-semibold">ADD A FISH SPECIES</p>
            <div class="flex flex-wrap">
                @foreach($fishSpecies as $species)
                <p class="whitespace-nowrap bg-neutral-700 text-newspaper mr-1 mb-1 px-1 font-semibold">{{$species->name}}</p>
                @endforeach
            </div>


            <form class="mx-auto md:w-full" action="/admin/add_fish_species" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="flex flex-col mb-4 ">

                    <label class="font-semibold text-sm mb-1">NAME</label>

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" placeholder="Trout" name="fish_species_name" value="{{ old('fish_species_name')}}" />

                    @error('fish_species_name')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>


                <div class="flex flex-col w-full mb-4">

                    <label class="font-semibold text-sm mb-1">DESCRIPTION</label>

                    <div class="flex w-full">

                        <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="fish_species_description" placeholder="The best fly for trout">{{old('fish_species_description')}}</textarea>
                    </div>

                    @error('fish_species_description')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-col w-full mb-4">

                    <label class="font-semibold text-sm mb-1">TACTICS</label>

                    <div class="flex w-full">

                        <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="fish_species_tactics" placeholder="Tactics to catch fish">{{old('fish_species_tactics')}}</textarea>
                    </div>

                    @error('fish_species_tactics')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-col w-full mb-4">

                    <label class="font-semibold text-sm mb-1">WATER</label>

                    <div class="flex w-full">

                        <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="fish_species_water" placeholder="Type of water that the species likes">{{old('fish_species_water')}}</textarea>
                    </div>

                    @error('fish_species_water')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex flex-col w-full mb-4">

                    <label class="font-semibold text-sm mb-1">ENVIRONMENT</label>

                    <div class="flex w-full">

                        <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="fish_species_environment" placeholder="The environment that the species likes">{{old('fish_species_environment')}}</textarea>
                    </div>

                    @error('fish_species_environment')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-col w-full mb-4">
                    <label class=" font-semibold text-sm mb-1">IMAGE</label>
                    <div class="flex w-full">
                        <input type="file" name="fish_species_image" accept="image/png, image/jpeg" />
                    </div>

                    @error('fish_species_image')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex w-full justify-end items-center">
                    <button class="bg-neutral-700 text-newspaper font-semibold
                                        px-6 py-2 w-full">ADD</button>
                </div>
            </form>
        </div>


        <div class="mx-auto lg:m-4 w-full lg:w-1/4 mb-10
                    border-2 border-neutral-700 p-3 grow">
            <p class="font-semibold">ADD A FLY CATEGORY</p>
            <div class="flex flex-wrap">
                @foreach($flyCategories as $category)
                <p class="bg-neutral-700 text-newspaper mr-1 mb-1 px-1 font-semibold">{{$category->name}}</p>
                @endforeach
            </div>

            <form class="mx-auto md:w-full" action="/admin/add_fly_category" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mb-4 ">

                    <label class="font-semibold text-sm mb-1">NAME</label>

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" placeholder="Adam's Fly" name="fly_category_name" value="{{ old('name')}}" />

                    @error('fly_category_name')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex w-full justify-end items-center">
                    <button class="bg-neutral-700 text-newspaper font-semibold
                                        px-6 py-2 w-full">ADD</button>
                </div>
            </form>
        </div>

        <div class="mx-auto lg:m-4 w-full lg:w-1/4 mb-10
                    border-2 border-neutral-700 p-3 grow">
            <p class="font-semibold">ADD A MATERIAL CATEGORY</p>
            <div class="flex flex-wrap">
                @foreach($materialCategories as $category)
                <p class="bg-neutral-700 text-newspaper mr-1 mb-1 px-1 font-semibold">{{$category->name}}</p>
                @endforeach
            </div>

            <form class="mx-auto md:w-full" action="/admin/add_material_category" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mb-4 ">

                    <label class="font-semibold text-sm mb-1">NAME</label>

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" placeholder="Adam's Fly" name="material_category_name" value="{{ old('material_category_name')}}" />

                    @error('material_category_name')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex w-full justify-end items-center">
                    <button class="bg-neutral-700 text-newspaper font-semibold
                                        px-6 py-2 w-full">ADD</button>
                </div>
            </form>
        </div>

        <div class="mx-auto lg:m-4 w-full lg:w-1/4 mb-10
                    border-2 border-neutral-700 p-3 grow">
            <p class="font-semibold">ADD A FISH SPECIES CATEGORY</p>
            <div class="flex flex-wrap">
                @foreach($fishSpeciesCategories as $category)
                <p class="bg-neutral-700 text-newspaper mr-1 mb-1 px-1 font-semibold">{{$category->name}}</p>
                @endforeach
            </div>

            <form class="mx-auto md:w-full" action="/admin/add_fish_species_category" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mb-4 ">

                    <label class="font-semibold text-sm mb-1">NAME</label>

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" placeholder="Adam's Fly" name="fish_species_category_name" value="{{ old('fish_species_category_name')}}" />

                    @error('fish_species_category_name')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex w-full justify-end items-center">
                    <button class="bg-neutral-700 text-newspaper font-semibold
                                        px-6 py-2 w-full">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>
