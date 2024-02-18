<x-layout>
    <div class="mt-8 m-auto relative flex flex-col justify-center items-center
                mx-4
                md:w-7/12 md:mx-auto">

        <div class="w-full text-sm flex mb-9">

            <a href="/market">
                <p class="hover-text"> Market </p>
            </a>
        </div>

        <p class="font-bold text-3xl text-blue-900">SHOPPING CART</p>
        @if(count($items) !== 0)
        @foreach($items as $item)
            <div class="flex border border-dashed border-neutral-700 px-2 py-2 w-full my-2 justify-center items-center relative">
                <form method="POST"
                      action="/cart/delete"
                      x-data="{show: false}"
                      :class="`${show === true ? 'bg-red-900' : 'bg-neutral-700 hover-bg'}`"
                      class="flex text-xl absolute -top-[1px] -right-[1px] cursor-pointer">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$item->id}}" />
                    <p x-show="!show" @click="show = true" class="font-normal text-newspaper rotate-45 px-2">+</p>
                    <button x-show="show" type="submit" class="font-normal text-newspaper rotate-45 px-2">+</button>
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

                    <form method="POST"
                          action="/cart/update"
                          class="flex text-sm"
                          x-data="{show:false}">

                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" value="{{$item->id}}" />
                        <p class="font-semibold">Quantity: </p>

                        <select @change="show = true"
                                class="text-newspaper bg-neutral-700 px-2 mx-2
                                       font-semibold text-xs md:text-sm"
                                name="qty">
                            @for ($i = 1; $i <= $item->qty; $i++)
                                @if($i === $item->qty)
                                    <option selected value="{{$i}}">{{$i}}</option>
                                @else
                                    <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                        </select>

                        <button x-show="show" type="submit" class="text-newspaper bg-neutral-700 font-normal px-2 hover-bg">&#10004;</button>
                    </form>


                </div>
                    <p x-data class="font-bold self-end whitespace-nowrap" x-text="`€${parseFloat('{{$item->product->price * $item->qty}}').toFixed(2)}`"></p>
                </div>
        @endforeach
            <div class="flex border border-dashed border-neutral-700 px-2
                        py-2 w-full my-2 justify-end items-center
                        text-xl font-semibold ">
                <p class="mr-2">SUBTOTAL:</p>
                <p class="text-blue-900">€{{$total}}</p>
            </div>
            <a href="/cart/shipping" class="w-full">
                <button class="w-full bg-neutral-700 py-2 my-2 font-semibold text-xl text-newspaper hover-bg">PROCEED TO SHIPPING</button>
            </a>

        @else
            <div class="text-lg text-center relative flex flex-col">
                <pre class="absolute top-3/4 left-1/2 -translate-x-1/2 text-xs
                            font-bold text-neutral-400 md:text-base">


                                    _H_
                                   /___\
                                   \888/
~^~^~^~^~^~^~^~^~^~^~^~^~^~^~^~^~^~^~U~^~^~^~^~^~^~^
                      ~              |
      ~                        o     |        ~
                ___        o         |
       _,.--,.'`   `~'-.._    O      |
      /_  .-"      _   /_\'.         |   ~
     .-';'       (( `  \0/  `\       #
    /__;          ((_  ,_     |  ,   #
    .-;                  \_   /  #  _#,
   /  ;    .-' /  _.--""-.\`~`   `#(('\\        ~
   ;-';   /   / .'                  )) \\
       ; /.--'.'                   ((   ))
        \     |        ~            \\ ((
         \    |                      )) `
   ~      \   |                      `
           \  |
      jgs  .` `""-.
         .'        \         ~               ~
         |    |\    |
         \   /  '-._|
          \.'
                </pre>
                <p class="py-2">There are no items in your cart</p>
                <a href="/market"
                   class="z-50 block w-full h-full border border-dashed
                          border-neutral-700 font-normal px-2 py-1 hover-text">
                    Why not check out or market?
                </a>
            </div>
        @endif
    </div>
</x-layout>
