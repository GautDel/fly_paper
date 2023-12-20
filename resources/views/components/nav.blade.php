<nav class="w-full border-b-2 border-neutral-700">
   <ul class="flex flex-row text-center text-sm font-normal justify-evenly
              cursor-pointer">
        <a href="/" class="w-full">
            <li class="{{Request::path() == '/' ? 'bg-neutral-700 text-newspaper hover-bg' : ''}}
                       border-r-2 p-3 border-neutral-700 grow

                       ">NEWS</li>
        </a>
        <a href="/discussions" class="w-full">
            <li class="{{Request::path() == '/discussions' ? 'bg-neutral-700 text-newspaper hover-bg' : ''}}
                        border-r-2 p-3 border-neutral-700 grow hover-text
                       ">DISCUSSIONS</li>
        </a>
        <a href="/wiki" class="w-full">
            <li class="{{Request::path() == '/wiki' ? 'bg-neutral-700 text-newspaper hover-bg' : ''}}
                       border-r-2 p-3 border-neutral-700 grow hover-text
                       ">WIKI</li>
        </a>
        <a href="/market" class="w-full">
            <li class="{{Request::path() == '/market' ? 'bg-neutral-700 text-newspaper hover-bg' : ''}}
                       border-r-2 p-3 border-neutral-700 grow hover-text
                       ">MARKET</li>
        </a>
        <a href="/account" class="w-full">
            <li class="{{Request::path() == '/account' ? 'bg-neutral-700 text-newspaper hover-bg' : ''}}
                       grow p-3 hover-text
                       ">ACCOUNT</li>

        </a>
    </ul>
</nav>
