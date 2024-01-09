<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>The Daily Flyer</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fira-code:300,500,600,700"
              rel="stylesheet" />

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

            <div class="sticky top-0 left-0 bg-newspaper z-50">
                <x-header date={{$date}} brand={{$brand}} slogan={{$slogan}} />

                <x-nav />
            </div>

                {{$slot}}
        </div>

        <x-footer date={{$date}}/>


    </body>
</html>
