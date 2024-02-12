@props([
    'date',
    'brand',
    'slogan'
])

<header class="flex border-b-2 border-neutral-700">
    <a href="/" class="hidden border-r-2 border-neutral-700 px-3 py-1 font-bold
                    text-blue-900 justify-center items-center min-w-fit
                    md:flex">
            <h1 class="md:text-lg">{{$brand}}</h1>
    </a>
    <div class="text-center py-2 px-3 border-r-2 border-neutral-700
                md:px-10 grow">
        <p class="text-xs font-normal
                  md:pb-1 md:text-sm
                  lg:text-base">{{$date}}</p>
        <h1 class="text-blue-900 font-bold py-1
                   md:hidden">{{$brand}}</h1>
        <p class="text-xs
                  lg:text-sm">{{$slogan}}</p>

    </div>

    <div class="flex flex-col items-center grow justify-center
                md:flex-row md:grow-0 md:w-3/12">

        @guest
            <a href="{{route('register')}}" class="w-full h-full">
                <button class="w-full h-full hover-bg bg-neutral-700 text-newspaper
                               font-semibold md:box-content md:px-1">SIGN UP</button>
            </a>
            <a href="{{route('login')}}" class="w-full h-full">
                <button class="w-full h-full hover-text text-neutral-700
                               font-semibold md:box-content md:px-1">LOGIN</button>
            </a>
        @endguest

        @auth
            <div class="flex flex-col w-full text-center">

                <h1 class="px-2 text-blue-900 font-semibold text-sm">{{$username}}</h1>

                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button class="font-normal text-sm">LOGOUT</button>
                </form>
            </div>

            <div class="flex w-full h-full items-center justify-center">

                <a href="/cart" class="w-8/12 h-full relative">
                    <p class="hidden absolute top-0 right-0 px-[9px] py-[2px]
                              text-xs font-bold text-red-900 bg-newspaper
                              border-dashed border-l border-b border-neutral-700
                              md:block">{{$cartItems}}</p>

                    <button class="h-full w-full border-neutral-700 border-t-2
                                   font-normal md:border-t-0 md:border-l-2 hover-text">CART</button>
                </a>

                <a href="/account" class="w-1/12 h-full grow">
                    <button class="h-full w-full bg-neutral-700 text-newspaper text-xl font-semibold hover-bg">&#9881;</button>
                </a>
            </div>
        @endauth

    </div>
</header>
