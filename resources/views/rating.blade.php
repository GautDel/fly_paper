<x-layout>
    <div class="mt-24 m-auto relative flex flex-col justify-center items-center
            2xl:w-9/12
            3xl:w-9/12">

        <h1 class="text-blue-900 font-bold text-3xl
                       mb-4">SHARE YOUR THOUGHTS</h1>


        <form method="POST" action="/market/rating/{{$productId}}" class="flex flex-col border border-dashed border-neutral-700 p-4">

            @csrf
            <input type="hidden" name="productId" value="{{$productId}}" />

            <div class="flex items-center mb-2">
                <label class="mr-2 font-normal">Would you recommend this product?</label>
                <input type="checkbox" name="recommend" value="1" />
            </div>

            <div class="flex flex-col mb-2">
                <p class="font-semibold">RATING</p>
                <div class="flex">
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">1</label>
                        <input type="radio" name="rating" value="1" checked />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">2</label>
                        <input type="radio" name="rating" value="2" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">3</label>
                        <input type="radio" name="rating" value="3" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">4</label>
                        <input type="radio" name="rating" value="4" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">5</label>
                        <input type="radio" name="rating" value="5" />
                    </div>
                </div>
            </div>

            <div class="flex flex-col mb-2">
                <p class="font-semibold">QUALITY</p>
                <div class="flex">
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">1</label>
                        <input type="radio" name="quality" value="1" checked />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">2</label>
                        <input type="radio" name="quality" value="2" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">3</label>
                        <input type="radio" name="quality" value="3" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">4</label>
                        <input type="radio" name="quality" value="4" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">5</label>
                        <input type="radio" name="quality" value="5" />
                    </div>
                </div>
            </div>
            <div class="flex flex-col mb-2">
                <p class="font-semibold">SHIPPING</p>
                <div class="flex">
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">1</label>
                        <input type="radio" name="shipping" value="1" checked />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">2</label>
                        <input type="radio" name="shipping" value="2" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">3</label>
                        <input type="radio" name="shipping" value="3" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">4</label>
                        <input type="radio" name="shipping" value="4" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">5</label>
                        <input type="radio" name="shipping" value="5" />
                    </div>
                </div>
            </div>
            <div class="flex flex-col mb-2">
                <p class="font-semibold">SERVICE</p>
                <div class="flex">
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">1</label>
                        <input type="radio" name="service" value="1" checked />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">2</label>
                        <input type="radio" name="service" value="2" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">3</label>
                        <input type="radio" name="service" value="3" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">4</label>
                        <input type="radio" name="service" value="4" />
                    </div>
                    <div class="mr-2 flex justify-center items-center">
                        <label class="mr-1 font-normal">5</label>
                        <input type="radio" name="service" value="5" />
                    </div>
                </div>
            </div>
            <textarea class="bg-newspaper text-blue-900 border border-dashed border-neutral-700 outline-none mb-4" name="comment" placeholder="Leave a comment"></textarea>

            <button class="hover-bg bg-neutral-700 text-newspaper font-semibold py-2">ADD RATING</button>

            @error('comment')
            <span class="text-red-800 font-normal mt-1">
                {{$message}}
            </span>
            @enderror
            @error('rating')
            <span class="text-red-800 font-normal mt-1">
                {{$message}}
            </span>
            @enderror
            @error('recommend')
            <span class="text-red-800 font-normal mt-1">
                {{$message}}
            </span>
            @enderror
            @error('quality')
            <span class="text-red-800 font-normal mt-1">
                {{$message}}
            </span>
            @enderror
            @error('shipping')
            <span class="text-red-800 font-normal mt-1">
                {{$message}}
            </span>
            @enderror
            @error('service')
            <span class="text-red-800 font-normal mt-1">
                {{$message}}
            </span>
            @enderror
            @error('productId')
            <span class="text-red-800 font-normal mt-1">
                {{$message}}
            </span>
            @enderror
        </form>
    </div>
</x-layout>
