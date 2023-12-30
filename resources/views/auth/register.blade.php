<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Daily Flyer</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=fira-code:300,500,600,700"
              rel="stylesheet" />

        <!-- Styles/Tailwind -->
        <link rel="stylesheet" href="{{ asset('css/output.css') }}">
    </head>
    <body class="antialiased h-screen w-screen pb-9 px-1 pt-2 bg-newspaper">

        <!-- Container div -->
        <div class="overflow-y-scroll overflow-x-hidden border-2
                    border-neutral-700 h-full mb-2 m-auto relative
                    flex flex-col justify-center items-center
                    2xl:w-9/12
                    3xl:w-9/12">

            <h1 class="text-blue-900 font-bold text-3xl
                       mb-4">THE DAILY FLYER</h1>

            <form method="POST" action="/register"
            class="border-2 border-neutral-700 w-3/4 max-w-md px-4 py-6
                         mb-10">
                @csrf

                <div class="flex flex-col mb-6">
                    <label class="font-semibold text-sm mb-1">USERNAME</label>
                    <input class="bg-newspaper border border-dashed p-1
                                  border-neutral-500"
                           type="text"
                           name="name"
                           value="{{old('name')}}"

                           placeholder="trout89"/>

                    @error('name')
                        <span class="text-red-800 font-normal mt-1">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label type="email"
                        class="font-semibold text-sm mb-1">EMAIL</label>
                    <input class="bg-newspaper border border-dashed p-1
                                  border-neutral-500"
                           type="text"
                           name="email"
                           value="{{old('email')}}"
                           placeholder="email@ex.com"/>

                    @error('email')
                        <span class="text-red-800 font-normal mt-1">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="font-semibold text-sm mb-1">PASSWORD</label>
                    <input class="bg-newspaper border border-dashed p-1
                                  border-neutral-500"
                           name="password"
                           type="password"
                           placeholder="NOT 'password'"/>

                    @error('password')
                        <span class="text-red-800 font-normal mt-1">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-10">
                    <label class="font-semibold text-sm mb-1">CONFIRM PASSWORD</label>
                    <input class="bg-newspaper border border-dashed p-1
                                  border-neutral-500"
                           type="password"
                           name="password_confirmation"
                           placeholder="NOT 'trout89123'"/>
                </div>

                <button type="submit"
                    class="border w-full bg-neutral-700 text-newspaper
                           py-3 hover-bg font-semibold text-2xl
                           md:py-4">SIGN UP</button>
            </form>

            <p>Already have an account?
                <a href="{{route('login')}}" class="cursor-pointer border border-dashed
                          border-neutral-700 p-1 hover-text">LOGIN</a>
            </p>

        </div>

    </body>
</html>
