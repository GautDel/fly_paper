<x-layout>
    <div class="mt-8 m-auto relative flex flex-col justify-center items-center
                mx-4
                md:w-7/12 md:mx-auto">

        <div class="w-full text-sm flex mb-9">

            <a href="/market">
                <p class="hover-text"> Market </p>
            </a>

            <span class="mx-1">></span>

            <a href="/cart">
                <p class="hover-text"> Cart </p>
            </a>
        </div>

        @if(count($shippingAddresses) !== 0)
        <p class="font-bold text-3xl text-blue-900">SAVED ADDRESSES</p>
        @endif
        @foreach($shippingAddresses as $address)
        <form method="POST" action="/cart/checkout" class="w-full border border-dashed border-neutral-700
                         hover-border-solid cursor-pointer my-2 ">
            @csrf
            <input type="hidden" name="address_id" value="{{$address->id}}" />
            <button class="flex flex-col font-semibold w-full h-full text-left
                           px-4 py-4 ">

                <div class="flex flex-col w-full">

                    <p class="font-semibold">NAME</p>

                    <p class="font-normal text-blue-900">
                        {{$address->first_name}}
                        {{$address->last_name}}
                    </p>
                </div>

                <div class="flex flex-col w-full">

                    <p class="font-semibold">ADDRESS</p>
                    <p class="font-normal text-blue-900">
                        {{$address->address_1}},
                        @if($address->address_2)
                        {{$address->address_2}},
                        @endif
                        {{$address->city}},
                        {{$address->state_province}}
                        {{$address->zip}},
                        {{$address->country}}
                    </p>
                </div>

            </button>
        </form>
        @endforeach

        <p class="font-bold text-3xl text-blue-900 mt-8">ADD AN ADDRESS</p>
        <form method="POST" action="/cart/checkout" class="flex flex-col border border-dashed border-neutral-700 px-4
                     py-4 my-2 items-center font-semibold w-full mb-8">

            @csrf

            <div class="flex flex-col w-full">

                <p class="text-xl mb-2">NAME</p>

                <input class="font-normal text-blue-900 mb-2
                              border-dashed border bg-newspaper
                              border-neutral-700 px-2 py-1 outline-none
                              focus:border-solid" name="first_name" placeholder="First Name" value="{{old('first_name')}}" />

                @error('first_name')
                <span class="text-red-800 font-normal">
                    {{$message}}
                </span>
                @enderror

                <input class="font-normal text-blue-900 my-2
                              border-dashed border bg-newspaper
                              border-neutral-700 px-2 py-1 outline-none
                              focus:border-solid" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" />

                @error('last_name')
                <span class="text-red-800 font-normal">
                    {{$message}}
                </span>
                @enderror


            </div>

            <div class="flex flex-col w-full">

                <p class="text-xl mb-2">ADDRESS</p>

                <input class="font-normal text-blue-900 mb-2
                              border-dashed border bg-newspaper
                              border-neutral-700 px-2 py-1 outline-none
                              focus:border-solid" name="address_1" placeholder="Address" value="{{old('address_1')}}" />

                @error('address_1')
                <span class="text-red-800 font-normal">
                    {{$message}}
                </span>
                @enderror

                <input class="font-normal text-blue-900 my-2
                              border-dashed border bg-newspaper
                              border-neutral-700 px-2 py-1 outline-none
                              focus:border-solid" name="address_2" placeholder="Address 2" value="{{old('address_2')}}" />

                @error('address_2')
                <span class="text-red-800 font-normal">
                    {{$message}}
                </span>
                @enderror

                <div class="flex w-full justify-between my-2">
                    <input class="font-normal text-blue-900 w-full
                              border-dashed border bg-newspaper
                              border-neutral-700 px-2 py-1 outline-none
                              focus:border-solid mr-4" name="city" placeholder="City" value="{{old('city')}}" />

                    <input class="font-normal text-blue-900 w-full
                              border-dashed border bg-newspaper
                              border-neutral-700 px-2 py-1 outline-none
                              focus:border-solid " name="state_province" placeholder="State / Province" value="{{old('state_province')}}" />
                </div>

                @error('city')
                <span class="text-red-800 font-normal">
                    {{$message}}
                </span>
                @enderror

                @error('state_province')
                <span class="text-red-800 font-normal">
                    {{$message}}
                </span>
                @enderror
                <input class="font-normal text-blue-900 my-2
                              border-dashed border bg-newspaper
                              border-neutral-700 px-2 py-1 outline-none
                              focus:border-solid" name="zip" placeholder="Zip / Postcode" value="{{old('zip')}}" />

                @error('zip')
                <span class="text-red-800 font-normal">
                    {{$message}}
                </span>
                @enderror


                <select class="font-normal text-newspaper mt-2 mb-4 mr-4 py-2 px-2
                               bg-neutral-700 outline-none grow w-full
                               focus:border-solid" name="country">
                    <option selected value="france">France</option>
                    <option value="ireland">Ireland</option>
                    <option value="sweden">Sweden</option>
                    <option value="austria">Austria</option>
                    <option value="italy">Italy</option>
                    <option value="spain">Spain</option>
                    <option value="belgium">Belgium</option>
                    <option value="poland">Poland</option>
                    <option value="portugal">Portugal</option>
                </select>
            </div>
            @error('country')
            <span class="text-red-800 font-normal">
                {{$message}}
            </span>
            @enderror

            <button type="submit" class="w-full bg-neutral-700 py-2 my-2 font-semibold
                          text-xl text-newspaper hover-bg">PROCEED TO CHECKOUT</button>
        </form>
    </div>
</x-layout>
