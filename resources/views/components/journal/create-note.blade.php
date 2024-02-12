<div x-show="open" class="w-full border-b border-dashed border-neutral-700 pb-10 bg-newspaper">

    <form @submit.prevent="postNote.submit()">

        <div class="flex flex-col mb-4 ">

            <label class="font-semibold text-sm mb-1">TITLE</label>


                <input type="text"
                    class="bg-newspaper border border-dashed p-1
                        font-semibold
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid"
                    maxlength="50"
                    x-model="postNote.formData.title"/>

            <span x-text="postNote.errors.title"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
        </div>

        <div class="flex flex-col mb-4 ">

            <label class="font-semibold text-sm mb-1">BODY</label>


                <textarea
                    class="bg-newspaper border border-dashed p-1
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid"
                    maxlength="1000"
                    rows="5"
                    x-model="postNote.formData.body"></textarea>

            <span x-text="postNote.errors.body"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
        </div>

        <div class="flex w-full justify-end">

            <button class="bg-neutral-700 text-newspaper font-semibold
                px-6 py-1">SAVE</button>
        </div>
    </form>
</div>

