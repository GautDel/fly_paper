<x-layout>
    <div class="mt-8 m-auto relative flex flex-col justify-center items-center
                mx-4
                md:w-7/12 md:mx-auto">


        <div class="w-full border border-dashed border-neutral-700
                    cursor-pointer my-2 p-4 ">

            <p class="text-neutral-700 font-bold w-full
                      text-5xl text-center mb-4">&#10004;</p>

            <p class="font-semibold text-xl text-center">Thank you for your purchase, {{$customer->name}}!</p>
        </div>

        <div class="w-full border border-dashed border-neutral-700
                    mt-2 mb-4 px-4 pt-4">


            <p class="font-bold text-2xl text-center">ORDER DETAILS</p>
            <p class="font-normal text-center mt-2">Order Number: #{{$order->id}}</p>
            <div class="px-4 pt-4 mb-4">

                <p class="text-xl font-bold mb-2">PRODUCTS</p>

                @foreach($items as $item)
                <div class="flex flex-col mx-auto pl-2 mb-3">
                    <div class="flex justify-between mb-2">
                        <p class="font-semibold">{{Str::upper($item->product->name)}}</p>
                        <p class="font-normal">€{{$item->product->price * $item->qty}}</p>
                    </div>
                    <div class="flex justify-between mb-2">
                        <p class="text-sm">Qty: {{$item->qty}}</p>
                        <p class="text-sm">€{{$item->product->price}} each</p>
                    </div>

                </div>
                @endforeach
                <p class="w-full text-right font-semibold text-xl">SUBTOTAL: €{{$order->total_price}}</p>
            </div>
        </div>
        <p class="font-normal text-sm mb-2">For more information on your order, check your account page under 'orders'</p>
        <p class="font-normal text-sm">Have a question? Contact us @ contact@flypaper.com</p>
    </div>
</x-layout>
