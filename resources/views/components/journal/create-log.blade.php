<div x-show="open" class="w-full border-b border-dashed border-neutral-700 pb-10">

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
                    x-model="postLog.formData.fish"/>

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
                        x-model="postLog.formData.weight"/>

                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm"
                        x-model="postLog.formData.mass">
                        <option>kg</option>
                        <option>g</option>
                        <option>lb</option>
                    </select>
                </div>

                <span x-text="postLog.errors.weight"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

                <span x-text="postLog.errors.mass"
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
                        x-model="postLog.formData.length"/>

                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm"
                        x-model="postLog.formData.unit">
                        <option>cm</option>
                        <option>m</option>
                        <option>in</option>
                        <option>ft</option>
                    </select>
                </div>

                <span x-text="postLog.errors.length"
                    class="text-red-800 font-normal mt-1 text-sm">
                </span>

                <span x-text="postLog.errors.unit"
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
                        x-model="postLog.formData.rod"/>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center px-2 text-xs md:text-sm"
                        x-model="postLog.formData.rod_weight">
                        <option value="" disabled>Weight</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>Other</option>
                    </select>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2"
                        x-model="postLog.formData.rod_length">
                        <option>7'</option>
                        <option>7'4"</option>
                        <option>7'6"</option>
                        <option>8'</option>
                        <option>8'4"</option>
                        <option>8'6"</option>
                        <option>9'</option>
                        <option>9'4"</option>
                        <option>9'6"</option>
                        <option>10'</option>
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
                        maxlength="10"
                        placeholder="Hydra"
                        x-model="postLog.formData.reel"/>

                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm"
                        x-model="postLog.formData.reel_weight">
                        <option>1 - 3</option>
                        <option>3 - 5</option>
                        <option>5 - 7</option>
                        <option>7 - 9</option>
                        <option>9 - 12</option>
                        <option>None</option>
                        <option>Other</option>
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
                        x-model="postLog.formData.line"/>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2"
                        x-model="postLog.formData.line_type">
                        <option>Floating</option>
                        <option>Sinking</option>
                        <option>Sink Tip</option>
                        <option>Weight Forward</option>
                        <option>Double Taper</option>
                        <option>Shooting Taper</option>
                        <option>Specialty Taper</option>
                        <option>Long Belly</option>
                        <option>Braided Tenkara</option>
                        <option>Other</option>
                    </select>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2"
                        x-model="postLog.formData.line_weight">
                        <option>00</option>
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
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
                        x-model="postLog.formData.tippet"/>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2"
                        x-model="postLog.formData.tippet_weight">
                        <option>0x</option>
                        <option>1x</option>
                        <option>2x</option>
                        <option>3x</option>
                        <option>4x</option>
                        <option>5x</option>
                        <option>6x</option>
                        <option>7x</option>
                        <option>16lb</option>
                        <option>18lb</option>
                        <option>20lb</option>
                        <option>Other</option>
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
                    maxlength="10"
                    placeholder="Black Ant"
                    x-model="postLog.formData.fly"/>

                <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm"
                    x-model="postLog.formData.fly_type">
                    <option>Nymph</option>
                    <option>Streamer</option>
                    <option>Dry Fly</option>
                    <option>Wet Fly</option>
                </select>
                <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm"
                    x-model="postLog.formData.hook_size">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
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
                    maxlength="10"
                    placeholder="Le Lez, Montpellier, France"
                    x-model="postLog.formData.location"/>

                <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm"
                    x-model="postLog.formData.weather">
                    <option>Sunny</option>
                    <option>Overcast</option>
                    <option>Cloudy</option>
                    <option>Very Cloudy</option>
                    <option>Some Clouds</option>
                    <option>Rain</option>
                    <option>Heavy Rain</option>
                    <option>Light Rain</option>
                    <option>Snowing</option>
                    <option>Hailing</option>
                </select>
                <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm"
                    x-model="postLog.formData.time_of_day">
                    <option>Early Morning</option>
                    <option>Morning</option>
                    <option>Late Morning</option>
                    <option>Early Afternoon</option>
                    <option>Afternoon</option>
                    <option>Late Afternoon</option>
                    <option>Early Evening</option>
                    <option>Evening</option>
                    <option>Late Evening</option>
                    <option>Night</option>
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
                        x-model="postLog.formData.precise_time"/>
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
                        x-model="postLog.formData.water_clarity"/>
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
                        x-model="postLog.formData.water_movement"/>
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
                    x-model="postNote.formData.body"></textarea>

            <span x-text="postNote.errors.note"
                class="text-red-800 font-normal mt-1 text-sm">
            </span>
        </div>

        <div class="flex w-full justify-end">

            <button class="bg-neutral-700 text-newspaper font-semibold
                px-6 py-1">SAVE</button>
        </div>
    </form>
</div>

