<div x-show="open" class="w-full border-b border-dashed border-neutral-700 pb-10 bg-newspaper">
    <form @submit.prevent="postLog.submit()">
        <div class="flex flex-col mb-4 ">

            <label class="font-semibold text-sm mb-1">FISH TYPE</label>

                <input type="text"
                    class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid"
                    maxlength="100"
                    placeholder="Rainbow Trout"
                    x-model="postLog.formData.fish"
                    name="fish"/>

            <span x-text="postLog.errors.fish"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
        </div>

        <div class="flex flex-row mb-4 ">

            <div class="flex-col mr-10 w-full">

                <label class="font-semibold text-sm mb-1">FISH WEIGHT</label>

                <div class="flex w-full">

                    <input type="text"
                        class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        maxlength="10"
                        placeholder="21.77"
                        x-model="postLog.formData.weight"
                        name="weight"/>

                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm"
                        x-model="postLog.formData.mass_unit"

                        name="mass_unit">
                        @foreach($options['mass_units'] as $unit)
                            <option >{{$unit}}</option>
                        @endforeach
                    </select>
                </div>

                <span x-text="postLog.errors.weight"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

                <span x-text="postLog.errors.mass_unit"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
            </div>

            <div class="flex-col w-full">

                <label class="font-semibold text-sm mb-1">FISH LENGTH</label>
                <div class="flex w-full">
                    <input type="text"
                        class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        maxlength="10"
                        placeholder="106"
                        x-model="postLog.formData.fish_length"
                        name="length"/>

                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm"
                        x-model="postLog.formData.length_unit"
                        name="length_unit">
                        @foreach($options['length_units'] as $unit)
                            <option>{{$unit}}</option>
                        @endforeach
                    </select>
                </div>

                <span x-text="postLog.errors.fish_length"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

                <span x-text="postLog.errors.length_unit"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
            </div>
        </div>

        <div class="flex flex-col mb-4 ">

            <div class="flex-col mr-10 w-full mb-4">

                <label class="font-semibold text-sm mb-1">ROD</label>

                <div class="flex w-full">

                    <input type="text"
                        class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        maxlength="50"
                        placeholder="Penn’s Creek Full-Flex Bamboo Fly Rod"
                        x-model="postLog.formData.rod"
                        name="rod"/>

                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center px-2 text-xs md:text-sm"
                        x-model="postLog.formData.rod_weight"
                        name="rod_weight">
                        @foreach($options['rod_weights'] as $weight)
                            <option>{{$weight}}</option>
                        @endforeach
                    </select>

                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2"
                        x-model="postLog.formData.rod_length"
                        name="rod_length">
                        @foreach($options['rod_lengths'] as $length)
                            <option>{{$length}}</option>
                        @endforeach
                    </select>
                </div>

                <span x-text="postLog.errors.rod"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
                 <span x-text="postLog.errors.rod_weight"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

               <span x-text="postLog.errors.rod_length"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
            </div>

            <div class="flex-col w-full">

                <label class="font-semibold text-sm mb-1">REEL</label>
                <div class="flex w-full">

                    <input type="text"
                        class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        maxlength="50"
                        placeholder="Hydra"
                        x-model="postLog.formData.reel"
                        name="reel"/>

                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm"
                        x-model="postLog.formData.reel_weight"
                        name="reel_weight">
                        @foreach($options['reel_weights'] as $weight)
                            <option>{{$weight}}</option>
                        @endforeach
                    </select>
                </div>

                <span x-text="postLog.errors.reel"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

                <span x-text="postLog.errors.reel_weight"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
            </div>
        </div>

        <div class="flex flex-col mb-4 ">

                <label class="font-semibold text-sm mb-1">LINE</label>

                <div class="flex w-full">

                    <input type="text"
                        class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        maxlength="50"
                        placeholder="Hydros Trout"
                        x-model="postLog.formData.line"
                        name="line"/>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2"
                        x-model="postLog.formData.line_type"
                        name="line_type">
                        @foreach($options['line_types'] as $type)
                            <option>{{$type}}</option>
                        @endforeach
                    </select>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2"
                        x-model="postLog.formData.line_weight"
                        name="line_weight">
                        @foreach($options['line_weights'] as $weight)
                            <option>{{$weight}}</option>
                        @endforeach
                    </select>

                </div>

                <span x-text="postLog.errors.line"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

                <span x-text="postLog.errors.line_type"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

                <span x-text="postLog.errors.line_weight"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
        </div>

        <div class="flex flex-col mb-4">

                <label class="font-semibold text-sm mb-1">TIPPET</label>

                <div class="flex w-full">

                    <input type="text"
                        class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        maxlength="50"
                        placeholder="SuperStrong Plus"
                        x-model="postLog.formData.tippet"
                        name="tippet"/>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2"
                        x-model="postLog.formData.tippet_weight"
                        name="tippet_weight">
                        @foreach($options['tippet_weights'] as $weight)
                            <option>{{$weight}}</option>
                        @endforeach
                    </select>
                </div>

                <span x-text="postLog.errors.tippet"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

                <span x-text="postLog.errors.tippet_weight"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
        </div>


        <div class="flex-col w-full mb-6">

            <label class="font-semibold text-sm mb-1">FLY</label>

            <div class="flex w-full">

                <input type="text"
                    class="bg-newspaper border border-dashed p-1
                        font-semibold w-full text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid"
                    maxlength="50"
                    placeholder="Black Ant"
                    x-model="postLog.formData.fly"
                    name="fly"/>

                <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm"
                    x-model="postLog.formData.fly_category"
                    name="fly_category">

                    @foreach($flyCategories as $category)
                        <option>{{$category->name}}</option>
                    @endforeach
                </select>
                <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm"
                    x-model="postLog.formData.hook_size"
                    name="hook_size">

                    @foreach($options['hook_sizes'] as $size)
                        <option>{{$size}}</option>
                    @endforeach
                </select>
            </div>

            <span x-text="postLog.errors.fly"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>

            <span x-text="postLog.errors.fly_type"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
            <span x-text="postLog.errors.hook_size"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
        </div>

        <div class="flex-col w-full mb-6">

            <label class="font-semibold text-sm mb-1">LOCATION</label>

            <div class="flex w-full">

                <input type="text"
                    class="bg-newspaper border border-dashed p-1
                        font-semibold w-full text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid"
                    maxlength="100"
                    placeholder="Le Lez, Montpellier, France"
                    x-model="postLog.formData.location"
                    name="location"/>

                <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm"
                    x-model="postLog.formData.weather"
                    name="weather">
                    @foreach($options['weathers'] as $weather)
                        <option>{{$weather}}</option>
                    @endforeach
                </select>
                <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm"
                    x-model="postLog.formData.day_time"
                    name="day_time">
                    @foreach($options['day_times'] as $time)
                        <option>{{$time}}</option>
                    @endforeach
                </select>
            </div>

            <span x-text="postLog.errors.location"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>

            <span x-text="postLog.errors.weather"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
            <span x-text="postLog.errors.time_of_day"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
        </div>

        <div class="flex flex-row mb-4 ">

            <div class="flex-col w-full mr-10">

                <label class="font-semibold text-sm mb-1">PRECISE TIME</label>

                    <div class="flex w-full text-center">

                        <input type="time"
                            class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm text-center
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        x-model="postLog.formData.precise_time"
                        name="precise_time"/>
                </div>

                <span x-text="postLog.errors.precise_time"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

            </div>

            <div class="flex-col w-full mr-10">

                <label class="font-semibold text-sm mb-1">CLARITY</label>
                <div class="flex w-full">

                    <input type="text"
                        class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        maxlength="50"
                        placeholder="Crystal clear"
                        x-model="postLog.formData.water_clarity"
                        name="water_clarity"/>
                </div>

                <span x-text="postLog.errors.water_clarity"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
            </div>

            <div class="flex-col w-full">

                <label class="font-semibold text-sm mb-1">MOVEMENT</label>
                <div class="flex w-full">

                    <input type="text"
                        class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid"
                        maxlength="50"
                        placeholder="Still water"
                        x-model="postLog.formData.water_movement"
                        name="water_movement"/>
                </div>

                <span x-text="postLog.errors.water_movement"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>
            </div>
        </div>



        <div class="flex flex-col mb-4 ">

            <label class="font-semibold text-sm mb-1">NOTE</label>


                <textarea
                    class="bg-newspaper border border-dashed p-1 text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid"
                    maxlength="500"
                    rows="5"
                    placeholder="This fish was a rascal!"
                    x-model="postLog.formData.note"
                    name="note"></textarea>

            <span x-text="postLog.errors.note"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
        </div>

        <div class="flex w-full justify-end">

            <button class="bg-neutral-700 text-newspaper font-semibold
                px-6 py-1">SAVE</button>
        </div>
    </form>
</div>

