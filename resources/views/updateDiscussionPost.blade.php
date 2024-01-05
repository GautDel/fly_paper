<x-layout>
        <div class="mt-24 m-auto relative flex flex-col justify-center items-center
                    2xl:w-9/12
                    3xl:w-9/12">

            <h1 class="text-blue-900 font-bold text-3xl
                       mb-4">UPDATE DISCUSSION</h1>

            <form method="POST" action="/discussions/update"
                class="border-2 border-neutral-700 w-3/4 max-w-md px-4 py-6
                    mb-10">
                @csrf
                @method('PUT')

                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"  />
                <input type="hidden" name="id" value="{{$post->id}}"  />

                <div class="flex flex-col mb-6">
                    <label class="font-semibold text-sm mb-1">TITLE</label>
                    <input class="bg-newspaper border border-dashed p-1
                            font-semibold
                            border-neutral-500 outline-none text-blue-900
                            focus:border-solid"
                           type="text"
                           name="title"
                           value="{{$post->title}}"/>

                    @error('title')
                        <span class="text-red-800 font-normal mt-1">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="flex flex-col mb-6">
                    <label class="font-semibold text-sm mb-1">SECTION</label>
                    <select name="forum_section_id"
                        class="bg-newspaper border-dashed border
                            border-neutral-700 px-2 py-1 text-sm
                            focus:border-solid">

                        @foreach($sections as $section)
                            <option value="{{$section->id}}" class="text-sm">{{Str::upper($section->section)}}</option>
                        @endforeach
                    </select>

                    @error('forum_section_id')
                        <span class="text-red-800 font-normal mt-1">
                            {{$message}}
                        </span>
                    @enderror
                </div>


                <div class="flex flex-col mb-6">

                    <label class="font-semibold text-sm mb-1">BODY</label>

                    <textarea class="bg-newspaper border border-dashed p-1
                                border-neutral-500 outline-none text-sm
                                text-blue-900
                                focus:border-solid"
                           rows="5"
                           name="body">{{$post->body}}</textarea>

                    @error('body')
                        <span class="text-red-800 font-normal mt-1">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <button type="submit"
                    class="border w-full bg-neutral-700 text-newspaper
                           py-3 hover-bg font-semibold text-2xl
                           md:py-4">UPDATE</button>
            </form>
        </div>
</x-layout>
