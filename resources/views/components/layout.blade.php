<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>The Daily Flyer</title>

    @if(str_contains(Request::path(), 'checkout'))
    <!-- STRIPE -->
        <script src="https://js.stripe.com/v3/"></script>
    @endif
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=fira-code:300,500,600,700" rel="stylesheet" />

    <!-- Styles/Tailwind -->
    <link rel="stylesheet" href="{{ asset('css/output.css') }}">

    <!-- VITE -->
    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    ])
</head>

<body class="antialiased h-screen w-screen pb-9 px-1 pt-2 bg-newspaper">

    <!-- Container div -->
    <div class="overflow-y-scroll overflow-x-hidden border-2
                    border-neutral-700 h-full mb-2 m-auto relative
                    2xl:w-9/12
                    3xl:w-9/12">

        @if(Session::has('message'))
        <p x-data="{ show: true }"
           x-show="show"
           x-init="setTimeout(() => show = false, 3000)"
           class="fixed top-0 left-1/2 -translate-x-1/2 z-[99] bg-green-900
                  w-1/2 text-center text-newspaper px-4 py-3 font-normal">{{Session::get('message')}}</p>
        @endif

        @if(Session::has('error'))
        <p class="fixed top-0 left-1/2 -translate-x-1/2 z-[99] bg-red-900
                  w-1/2 text-center text-newspaper px-4 py-3 font-normal">{{Session::get('error')}}</p>
        @endif

        <div class="sticky top-0 left-0 bg-newspaper z-50">
            <x-header date={{$date}} brand={{$brand}} slogan={{$slogan}} />

            <x-nav />
        </div>

        {{$slot}}
    </div>

    <x-footer date={{$date}} />
</body>

</html>
