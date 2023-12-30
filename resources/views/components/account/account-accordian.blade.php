<div x-data="{ open: true }"
    class="flex flex-col w-full px-6 py-2
           border-b-2 border-neutral-700">

    <div @click="open = ! open"
         class="flex justify-between items-center w-full cursor-pointer">
        <p class="font-normal">ACCOUNT DETAILS</p>
        <p x-show="!open" class="font-bold text-2xl">+</p>
        <p x-show="open" class="font-bold text-2xl">-</p>
    </div>

    <form method="POST"
          action="{{route('user-profile-information.update')}}"
          x-show="open"
          @click.outside="open = false"
          autocomplete="off"
          class="w-full mx-auto
                  md:w-1/2 md:border-2 md:border-neutral-700
                  md:px-4 md:py-2 md:my-8">
          @csrf
          @method('PUT')

        <div class="flex flex-col py-2">

            <label class="font-normal mr-2 mb-1 text-sm">USERNAME</label>

            <input class="font-normal text-blue-900
                          text-sm border-dashed border bg-newspaper
                          border-neutral-700 px-2 py-1 outline-none
                          focus:border-solid"
                   value="{{$username}}"
                   name="name"
                   x-ref="username" />
        </div>

        <div class="flex flex-col py-2">

            <label class="font-normal mr-2 mb-1 text-sm ">EMAIL</label>

            <input class="font-normal text-blue-900
                          text-sm border-dashed border bg-newspaper
                          border-neutral-700 px-2 py-1 outline-none
                          focus:border-solid"
                   value="{{$email}}"
                   name="email"
                   x-ref="email" />
        </div>


        <div x-data="{ count: 0 }"
            x-init="count = $refs.countme.value.length"
            class="flex flex-col py-2 ">

        <label class="font-normal mr-2 mb-1 text-sm">ABOUT</label>

        <textarea rows="2" name="about" maxlength="250"
                x-ref="countme"
                x-on:keyup="count = $refs.countme.value.length"
                placeholder="{{$about}}"
                class="border-dashed border bg-newspaper
                    border-neutral-700 text-sm p-2
                    text-blue-900
                    focus:outline-none
                    focus:border-neutral-900
                    focus:border-solid">{{$about}}</textarea>

        <div class="text-sm">
            <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
        </div>

        <button type="submit" class="bg-neutral-700 text-newspaper
                                w-fit self-end mt-4 px-4 py-1
                                font-normal hover-bg">SAVE</button>


        </div>

        <span class="text-red-800 font-normal mt-1 text-sm">{{$errors->updateProfileInformation->first('name')}}</span>
        <span class="text-red-800 font-normal mt-1 text-sm">{{$errors->updateProfileInformation->first('email')}}</span>
        <span class="text-red-800 font-normal mt-1 text-sm">{{$errors->updateProfileInformation->first('about')}}</span>
    </form>
</div>
