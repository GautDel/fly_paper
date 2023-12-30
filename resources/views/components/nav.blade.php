<nav class="w-full border-b-2 border-neutral-700">
   <ul class="flex flex-row text-center text-sm font-normal justify-evenly
              cursor-pointer">
        <a href="/" class="w-full">
            <li class="{{Request::path() == '/' ?
                        'bg-neutral-700 text-newspaper hover-bg' :
                        'hover-text'}}
                         border-r-2 p-3 grow border-neutral-700
                       ">NEWS</li>
        </a>
        <a href="/discussions" class="w-full">
            <li class="{{str_contains(Request::path(), 'discussions') ?
                        'bg-neutral-700 text-newspaper hover-bg' :
                        'hover-text'}}
                         border-r-2 p-3 grow border-neutral-700
                       ">DISCUSSIONS</li>
        </a>
        <a href="/wiki" class="w-full">
            <li class="{{str_contains(Request::path(), 'wiki') ?
                        'bg-neutral-700 text-newspaper hover-bg' :
                        'hover-text'}}
                         border-r-2 p-3 grow border-neutral-700
                       ">WIKI</li>
        </a>
        <a href="/market" class="w-full">
            <li class="{{str_contains(Request::path(), 'market') ?
                        'bg-neutral-700 text-newspaper hover-bg' :
                        'hover-text'}}
                         border-r-2 p-3 grow border-neutral-700
                       ">MARKET</li>
        </a>
        <a href="/account" class="w-full">
            <li class="{{str_contains(Request::path(), 'account') ?
                        'bg-neutral-700 text-newspaper hover-bg' :
                        'hover-text'}}
                       grow p-3
                       ">ACCOUNT</li>

        </a>
    </ul>
</nav>
