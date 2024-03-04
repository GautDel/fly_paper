<div x-data="{ open: false,
               moneyFormat: new Intl.NumberFormat('en-EU', {style:'currency', currency: 'EUR'})}" class="flex flex-col w-full px-6 py-2

           border-b-2 border-neutral-700">

    <div @click="open = ! open" class="flex justify-between items-center w-full cursor-pointer">
        <p class="font-normal">ORDERS</p>
        <p x-show="!open" class="font-bold text-2xl">+</p>
        <p x-show="open" class="font-bold text-2xl">-</p>
    </div>

    <div x-show="open" @click.outside="open = false" class="w-full md:w-6/12 mx-auto">

        @foreach($orders as $order)

        <div class="w-full border border-dashed border-neutral-700 mt-2 mb-4
                    px-4 pt-4">

            <p class="font-normal text-center mt-2 text-sm">Order Number: #{{$order->id}}</p>
            <div class="px-4 pt-4 mb-4">

                <p class="font-bold mb-2">PRODUCTS</p>

                @foreach($order->lineItems as $item)
                <div class="flex flex-col mx-auto pl-2 mb-3">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <p class="font-semibold text-sm mr-2">{{Str::upper($item->product->name)}}</p>
                            <a class="hover-border-solid hover-text text-xs font-normal px-1 border border-dashed border-neutral-700" href="/market/rating/{{$item->product->id}}">LEAVE A RATING</a>
                        </div>
                        <p class="font-normal text-sm" x-text="`${moneyFormat.format('{{$item->product->price * $item->qty}}')} each`"></p>
                    </div>

                    @foreach($item->productEntry->getVariants($item->productEntry->sku) as $variant)
                    <div class="flex pl-2">
                        <p class="text-xs font-normal">{{$variant->variation->name}}: </p>
                        <p class="text-xs">{{ucFirst($variant->value)}}</p>
                    </div>
                    @endforeach

                    <div class="flex justify-between my-1 pl-2">
                        <p class="text-sm font-normal">Qty: {{$item->qty}}</p>
                        <p class="text-xs" x-text="`${moneyFormat.format('{{$item->product->price}}')} each`"></p>
                    </div>

                </div>

                @endforeach
                <p class="w-full text-right font-semibold" x-text="`SUBTOTAL: ${moneyFormat.format('{{$order->total_price}}')}`"></p>
            </div>
        </div>

        @endforeach
    </div>
</div>
