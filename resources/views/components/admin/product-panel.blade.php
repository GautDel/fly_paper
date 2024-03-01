<div x-data="{ open: true }" class="flex flex-col w-full px-6 py-2
            lg:border-b-2 border-neutral-700">

    <div @click="open = ! open, refs.plus.remove()" class="flex justify-between items-center cursor-pointer">

        <p class="font-normal">PRODUCTS PANEL</p>

        <p x-show="!open" class="font-bold text-2xl">+</p>

        <p x-show="open" class="font-bold text-2xl">-</p>
    </div>

    <div class="flex flex-col lg:flex-row">

        <div x-show="open" class="mx-auto lg:m-4 w-full mb-10
                    border-2 border-neutral-700 p-3">


            <p class="font-semibold">PRODUCT CATEGORIES</p>
            <div class="flex flex-wrap">
                @foreach($categories as $category)
                @if($category->parent_category_id === null)

                <p class="bg-neutral-700 text-newspaper px-2 mx-1 my-1 font-normal">(P){{$category->name}}</p>
                @else

                <p class="bg-neutral-700 text-newspaper px-2 mx-1 my-1 font-normal">{{$category->name}}</p>
                @endif
                @endforeach
            </div>

            <form method="POST" action="/admin/add_category" class="mt-2">

                @csrf
                <label class="flex flex-col font-semibold"> Add Category</label>
                <div class="flex flex-wrap">

                    <input class="bg-newspaper text-blue-900 outline-none border border-dashed border-neutral-700 px-1 py-1" placeholder="Category Name" name="name" />

                    <select class="bg-neutral-700 text-newspaper py-2 pl-2 font-semibold w-fit" name="parent_category_id">
                        @foreach($categories as $category)
                        @if($category->parent_category_id === null)

                        <option value="{{$category->id}}">(P){{$category->name}}</option>
                        @else

                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif

                        @endforeach
                        <option value="">PARENT</option>
                    </select>

                </div>
                <button class="bg-neutral-700 text-newspaper font-semibold px-4 py-1 mt-2">ADD</button>
            </form>
        </div>

        <div x-show="open" class="mx-auto lg:m-4 w-full mb-10
                    border-2 border-neutral-700 p-3">


            <p class="font-semibold">PRODUCT VARIATIONS</p>
            <div class="flex flex-wrap">

                @foreach($variations as $variation)
                <p class="bg-neutral-700 text-newspaper px-2 mx-1 my-1 font-normal">{{$variation->name}}</p>
                @endforeach
            </div>

            <form method="POST" action="/admin/add_variation" class="mt-2">

                @csrf
                <label class="flex flex-col font-semibold"> Add Variation</label>
                <div class="flex flex-wrap">

                    <input class="bg-newspaper text-blue-900 outline-none border border-dashed border-neutral-700 px-1 py-1" placeholder="Variation Name" name="name" />

                    <select class="bg-neutral-700 text-newspaper py-2 pl-2 font-semibold" name="product_category_id">
                        @foreach($categories as $category)
                        @if($category->parent_category_id !== null)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <button class="bg-neutral-700 text-newspaper font-semibold px-4 py-1 mt-2">ADD</button>
            </form>
        </div>

        <div x-show="open" class="mx-auto lg:m-4 w-full mb-10
                    border-2 border-neutral-700 p-3">


            <p class="font-semibold">VARIATION OPTIONS</p>
            <div class="flex flex-wrap flex-col">
                @foreach($variations as $variation)
                <p class="font-semibold">{{Str::upper($variation->name)}}</p>
                <div class="flex flex-wrap">
                    @foreach($variation->options as $option)
                    <p class="bg-neutral-700 text-newspaper font-normal px-2 mx-1 my-1">{{$option->value}}</p>
                    @endforeach
                </div>
                @endforeach
            </div>

            <form method="POST" action="/admin/add_option" class="mt-2">

                @csrf
                <label class="flex flex-col font-semibold"> Add Variation Option</label>
                <div class="flex flex-wrap">

                    <input class="bg-newspaper text-blue-900 outline-none border border-dashed border-neutral-700 px-1 py-1" placeholder="Option Name" name="value" />

                    <select class="bg-neutral-700 text-newspaper py-2 pl-2 font-semibold" name="product_variation_id">
                        @foreach($variations as $variation)

                        <option value="{{$variation->id}}">{{$variation->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="bg-neutral-700 text-newspaper font-semibold px-4 py-1 mt-2">ADD</button>
            </form>
        </div>
        <div x-show="open" class="mx-auto lg:m-4 w-full mb-10
                    border-2 border-neutral-700 p-3">



            <p class="font-semibold">PRODUCTS</p>

            <div class="flex flex-wrap">
                @foreach($products as $product)

                <p class="bg-neutral-700 text-newspaper px-2 mx-1 my-1 font-normal">{{$product->name}}</p>
                @endforeach
            </div>


            <form class="px-4 mt-10 mx-auto md:w-6/12" action="/admin/add_product" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="text-center font-semibold text-blue-900 text-2xl">ADD A PRODUCT</p>
                <div class="flex flex-col mb-4 ">

                    <label class="font-semibold text-sm mb-1">NAME</label>

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" placeholder="Adam's Fly" name="name" value="{{ old('name')}}" />

                    @error('name')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>


                <div class="flex flex-col w-full mb-4">

                    <label class="font-semibold text-sm mb-1">DESCRIPTION</label>

                    <div class="flex w-full">

                        <textarea type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="description" placeholder="The best fly for trout">{{old('description')}}</textarea>
                    </div>

                    @error('description')
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

                <div class="flex flex-col mb-4 ">

                    <div class="flex-col mr-10 w-full mb-4">

                        <label class="font-semibold text-sm mb-1">PRICE</label>

                        <div class="flex w-full">

                            <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="price" placeholder="2.00" value="{{old('price')}}" />
                        </div>

                        @error('price')
                        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="flex-col w-full ">

                        <label class="font-semibold text-sm mb-1">AVAILABILITY</label>
                        <div class="flex w-full items-center">
                            <label for="in_stock" class="mr-2 font-semibold">In Stock</label>
                            <input type="checkbox" name="in_stock" class="mr-4" checked />

                            <label for="new" class="mr-2 font-semibold">New</label>
                            <input type="checkbox" name="new" class="mr-4" checked />

                            <label for="sale" class="mr-2 font-semibold">Sale</label>
                            <input type="checkbox" name="sale" class="mr-4" />

                            <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold text-sm w-12
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="sale_percent" placeholder="20" value="{{old('sale_percent')}}" />
                        </div>

                        @error('in_stock')
                        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                        @enderror
                        @error('new')
                        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                        @enderror
                        @error('sale')
                        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                        @enderror
                        @error('sale_percent')
                        <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col mb-4 ">

                    <label class="font-semibold text-sm mb-1">BRAND</label>

                    <div class="flex w-full">

                        <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" placeholder="Orvis" name="brand" value="{{old('brand')}}" />
                    </div>

                    @error('brand')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex flex-col mb-4">

                    <label class="font-semibold text-sm mb-1">PRODUCT CATEGORY</label>

                    <div class="flex w-full">
                        <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2" name="product_category">
                            @foreach($categories as $key => $category)
                            @if($category->parent_category_id)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    @error('product_category')
                    <span class="text-red-800 font-normal mt-1 text-sm">{{$message}}</span>
                    @enderror
                </div>



                <div class="flex w-full justify-end items-center">
                    <button class="bg-neutral-700 text-newspaper font-semibold
                px-6 py-1">ADD</button>
                </div>
            </form>



        </div>

        <div x-show="open" class="mx-auto lg:m-4 w-full mb-10
                    border-2 border-neutral-700 p-3">


            <p class="font-semibold">INDIVIDUAL PRODUCT OPTIONS</p>

            <p class="font-semibold">Products</p>
            <div class="flex flex-wrap">
                @foreach($products as $product)
                <form method="POST" action="/admin/select_product">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                    <button type="submit" class="bg-neutral-700 text-newspaper px-2 mx-1 my-1 font-normal">{{$product->name}}</button>
                </form>
                @endforeach
            </div>

            @if(session('product'))
            <form method="POST" action="/admin/add_product_options" class="mt-2">

                @csrf
                <div class="flex">
                    <p class="font-semibold mr-1">Selected Product:</p>
                    <input type="text" name="product_id" value="{{session('product.id')}}" class="w-10 bg-newspaper font-semibold text-blue-900" disabled />
                    <input type="hidden" name="product_id" value="{{session('product.id')}}" class="w-10 bg-newspaper font-semibold text-blue-900"/>
                </div>
                <p class="font-semibold">Product Options</p>
                <div class="flex flex-wrap">
                    <div class="flex flex-col">

                        @foreach($variations as $variation)
                        @if(session('product.product_category_id') === $variation->product_category_id)
                        <p class="font-semibold">{{Str::upper($variation->name)}}</p>
                        <div class="flex flex-wrap ">
                            @foreach($variation->options as $key => $option)
                            <div class="flex items-center mx-1">
                                <label class="font-semibold mr-1">{{$option->value}}</label>
                                <input type="checkbox" name="option_{{$option->id}}" value="{{$option->id}}" />
                            </div>
                            @endforeach
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>

                <button type="submit" class="bg-neutral-700 text-newspaper font-semibold px-4 py-1 mt-2">ADD</button>
            </form>
            @endif
        </div>

        <div x-show="open" class="mx-auto lg:m-4 w-full mb-10
                    border-2 border-neutral-700 p-3">


            <p class="font-semibold">Product Stock</p>

            <p class="font-semibold">Products</p>
            <div class="flex flex-wrap">
                get product
                then check all available entries
                to add entry:
                    use radio button to select one from each variant
                    sku is auto generated
                    qty is number input
                @foreach($products as $product)
                <form method="POST" action="/admin/">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}" />
                    <button type="submit" class="bg-neutral-700 text-newspaper px-2 mx-1 my-1 font-normal">{{$product->name}}</button>
                </form>
                @endforeach
            </div>

            @if(session('product'))
            <form method="POST" action="/admin/add_product_options" class="mt-2">

                @csrf
                <div class="flex">
                    <p class="font-semibold mr-1">Selected Product:</p>
                    <input type="text" name="product_id" value="{{session('product.id')}}" class="w-10 bg-newspaper font-semibold text-blue-900" disabled />
                    <input type="hidden" name="product_id" value="{{session('product.id')}}" class="w-10 bg-newspaper font-semibold text-blue-900"/>
                </div>
                <p class="font-semibold">Product Options</p>
                <div class="flex flex-wrap">
                    <div class="flex flex-col">

                        @foreach($variations as $variation)
                        @if(session('product.product_category_id') === $variation->product_category_id)
                        <p class="font-semibold">{{Str::upper($variation->name)}}</p>
                        <div class="flex flex-wrap ">
                            @foreach($variation->options as $key => $option)
                            <div class="flex items-center mx-1">
                                <label class="font-semibold mr-1">{{$option->value}}</label>
                                <input type="checkbox" name="option_{{$option->id}}" value="{{$option->id}}" />
                            </div>
                            @endforeach
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>

                <button type="submit" class="bg-neutral-700 text-newspaper font-semibold px-4 py-1 mt-2">ADD</button>
            </form>
            @endif
        </div>

        <!-- end of container -->

    </div>
</div>
