<x-layout>
    <div class="mt-8 m-auto relative flex flex-col justify-center items-center
                mx-4
                md:w-6/12 md:mx-auto">

        <div class="w-full text-sm flex mb-9">
            <a href="/market">
                <p class="hover-text"> Market </p>
            </a>

            <span class="mx-1">></span>

            <a href="/cart">
                <p class="hover-text"> Cart </p>
            </a>

            <span class="mx-1">></span>
            <a href="/cart/shipping">
                <p class="hover-text"> Shipping </p>
            </a>
        </div>


        <p class="font-bold text-3xl text-blue-900 mb-2">ORDER CONFIRMATION</p>

        <div x-data class="w-full">

            <div class="border border-dashed border-neutral-700
                        px-4 pt-4 pb-2 mb-4">

                <p class="text-xl font-bold mb-2">PRODUCTS</p>

                    @foreach($cartItems as $cartItem)
                        <div class="flex flex-col mx-auto pl-2 mb-3">
                            <div class="flex justify-between mb-2">
                                <p class="font-semibold">{{Str::upper($cartItem->product->name)}}</p>
                                <p class="font-normal">€{{$cartItem->product->price * $cartItem->qty}}</p>
                            </div>
                            <div class="flex justify-between mb-2">
                                <p class="text-sm">Qty: {{$cartItem->qty}}</p>
                                <p class="text-sm">€{{$cartItem->product->price}} each</p>
                            </div>

                        </div>
                    @endforeach
                <p class="w-full text-right font-semibold text-xl">SUBTOTAL: €{{$total}}</p>
            </div>

            <div class="border border-dashed border-neutral-700 p-4 mb-2">

                <p class="text-xl font-bold">SHIPPING DETAILS</p>

                <div class="w-full my-2 pl-2">

                    <div class="flex flex-col w-full">

                        <p class="font-semibold">NAME</p>

                        <p class="font-normal text-blue-900" >
                            {{$shippingAddress->first_name}}
                            {{$shippingAddress->last_name}}
                        </p>
                    </div>

                    <div class="flex flex-col w-full">

                        <p class="font-semibold">ADDRESS</p>
                        <p class="font-normal text-blue-900" >
                            {{$shippingAddress->address_1}},
                            @if($shippingAddress->address_2)
                                {{$shippingAddress->address_2}},
                            @endif
                            {{$shippingAddress->city}},
                            {{$shippingAddress->state_province}}
                            {{$shippingAddress->zip}},
                            {{$shippingAddress->country}}
                        </p>
                    </div>
                </div>
            </div>

            <form @submit.prevent.stop="[initialize({{$shippingAddress->id}}), show = false]" class="w-full">
                <button class="w-full bg-neutral-700 py-2 my-2 font-semibold
                               text-xl text-newspaper hover-bg">PROCEED TO PAYMENT</button>
            </form>
        </div>
    </div>

    <script>
        const stripe = Stripe('pk_test_51OjKI3ArO0YW2nD7MIAH5U3MJY5ta5nsLefP95s9zNx0SdKXOj1VfMkzSZCC9twq4W8D5NroiaSxVoa2iYqBsQDB00mDFGTgcj');
        const token = document.head.querySelector('meta[name="csrf-token"]').content;

        async function initialize(addressId) {
            const response = await fetch("/checkout", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": token
                },
                body: JSON.stringify({'addressId': addressId})
            });

            const {clientSecret} = await response.json();

            window.location.href = clientSecret
        }
    </script>
</x-layout>
