<x-layout>
    <div class="mt-24 m-auto relative flex flex-col justify-center items-center
                mx-4
                2xl:w-9/12
                3xl:w-9/12">
        <p class="font-bold text-3xl text-blue-900">SHOPPING CART</p>
        @foreach($items as $item)
            <div class="flex border border-dashed border-neutral-700 px-2 py-2 w-full my-2 justify-center items-center relative">
                <form class="flex text-xl absolute -top-[1px] -right-[1px] bg-neutral-700 hover-bg cursor-pointer">
                    <button type="submit" class="font-normal text-newspaper rotate-45 px-2">+</button>
                </form>
                <img class="w-32 h-full grayscale hover-color"
                     src="https://images.pexels.com/photos/6478131/pexels-photo-6478131.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"></img>

                <div class="w-full ml-2">

                    <div class="flex justify-between mb-2">
                        <p class="font-bold text-md">{{Str::upper($item->product->name)}}</p>
                    </div>

                    @foreach($item->variants as $key => $variant)
                        <div class="flex text-sm">
                            <p class="font-semibold">{{Str::upper($variant->variation->name)}}: </p>
                            <p class="font-normal text-blue-900">{{ucfirst($variant->value)}}</p>
                        </div>
                    @endforeach

                        <div class="flex text-sm">
                            <p class="font-semibold">Quantity: </p>
                            <p class="font-normal text-blue-900">{{$item->qty}}</p>
                        </div>


                </div>

                    <p class="font-bold self-end">€{{Str::upper($item->product->price) * $item->qty}}</p>
                </div>
        @endforeach
            <div class="flex border border-dashed border-neutral-700 px-2
                        py-2 w-full my-2 justify-end items-center
                        text-xl font-semibold ">
                <p class="mr-2">SUBTOTAL:</p>
                <p class="text-blue-900">€{{$total}}</p>
            </div>
            <form class="w-full">
                <button class="w-full bg-neutral-700 py-2 my-2 font-semibold text-xl text-newspaper hover-bg">PROCEED TO CHECKOUT</button>
            </form>
    </div>
</x-layout>
