<x-layout>
    <div class="mt-24 m-auto relative flex flex-col justify-center items-center
                    2xl:w-11/12
                    3xl:w-11/12">

        <h1 class="text-blue-900 font-bold text-3xl
                       mb-4">UPDATE LOG</h1>

        <form method="POST" action="/journal/logs" class="md:border-2 md:border-neutral-700 max-w-3xl px-4 py-6 mb-10">
            @csrf
            @method('PUT')

            <div class="flex flex-col mb-4">

                <label class="font-semibold text-sm mb-1">FISH TYPE</label>

                <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" maxlength="100" name="fish" value="{{$log->fish}}"/>

                @error('fish')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="flex flex-row mb-4 ">

                <div class="flex-col mr-10 w-full">

                    <label class="font-semibold text-sm mb-1">FISH WEIGHT</label>

                    <div class="flex w-full">

                        <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" maxlength="10" name="weight" value="{{$log->weight}}" />

                        <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm" name="mass_unit">
                            @foreach($options['mass_units'] as $unit)

                                @if($unit === $log->mass_unit)
                                    <option selected>{{$unit}}</option>
                                @else

                                    <option>{{$unit}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    @error('weight')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror

                    @error('mass_unit')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="flex-col w-full">

                    <label class="font-semibold text-sm mb-1">FISH LENGTH</label>
                    <div class="flex w-full">
                        <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" maxlength="10" name="length" value="{{$log->fish_length}}" />

                        <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm" name="length_unit">
                            @foreach($options['length_units'] as $unit)
                                @if($unit === $log->length_unit)
                                    <option selected>{{$unit}}</option>
                                @else

                                    <option>{{$unit}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    @error('fish_length')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror

                    @error('length_unit')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col mb-4 ">

                <div class="flex-col mr-10 w-full mb-4">

                    <label class="font-semibold text-sm mb-1">ROD</label>

                    <div class="flex w-full">

                        <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" maxlength="50"name="rod" value="{{$log->rod}}"/>

                        <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center px-2 text-xs md:text-sm" name="rod_weight">
                            @foreach($options['rod_weights'] as $weight)
                                @if($weight === $log->rod_weight)
                                    <option selected>{{$weight}}</option>
                                @else

                                    <option>{{$weight}}</option>
                                @endif
                            @endforeach
                        </select>

                        <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2" name="rod_length">
                            @foreach($options['rod_lengths'] as $length)
                                @if($length === $log->rod_length)
                                    <option selected>{{$length}}</option>
                                @else
                                    <option>{{$length}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('rod')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                    @error('rod_weight')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                    @error('rod_length')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="flex-col w-full">
                    <label class="font-semibold text-sm mb-1">REEL</label>
                    <div class="flex w-full">

                        <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" maxlength="50" name="reel" value="{{$log->reel}}" />

                        <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-xs md:text-sm" name="reel_weight">
                            @foreach($options['reel_weights'] as $weight)
                                @if($weight === $log->reel_weight)
                                    <option selected>{{$weight}}</option>
                                @else
                                    <option>{{$weight}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @error('reel')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                    @error('reel_weight')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex flex-col mb-4 ">

                <label class="font-semibold text-sm mb-1">LINE</label>

                <div class="flex w-full">

                    <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" maxlength="50" name="line" value="{{$log->line}}"/>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2" name="line_type">
                        @foreach($options['line_types'] as $type)
                            @if($type === $log->line_type)
                                <option selected>{{$type}}</option>
                            @else
                                <option>{{$type}}</option>
                            @endif
                        @endforeach
                    </select>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2" name="line_weight">
                        @foreach($options['line_weights'] as $weight)
                            @if($weight === $log->line_weight)
                                <option selected>{{$weight}}</option>
                            @else
                                <option>{{$weight}}</option>
                            @endif
                        @endforeach
                    </select>

                </div>

                @error('line')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
                @error('line_type')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
                @error('reel_weight')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="flex flex-col mb-4">

                <label class="font-semibold text-sm mb-1">TIPPET</label>

                <div class="flex w-full">

                    <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" maxlength="50"  name="tippet" value="{{$log->tippet_weight}}"/>
                    <select class="text-newspaper bg-neutral-700 font-semibold
                                text-center text-xs md:text-sm px-2" x-model="postLog.formData.tippet_weight" name="tippet_weight">
                        @foreach($options['tippet_weights'] as $weight)
                            @if($weight === $log->tippet_weight)
                                <option selected>{{$weight}}</option>
                            @else
                                <option>{{$weight}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @error('tippet')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
                @error('tippet_weight')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="flex-col w-full mb-6">

                <label class="font-semibold text-sm mb-1">FLY</label>

                <div class="flex w-full">

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold w-full text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" maxlength="50" name="fly" value="{{$log->fly}}"/>

                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm" name="fly_category">

                        @foreach($flyCategories as $category)
                            @if($category->name === $log->fly_category)
                                <option selected>{{$category->name}}</option>
                            @else
                                <option>{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm" x-model="postLog.formData.hook_size" name="hook_size">

                        @foreach($options['hook_sizes'] as $size)
                            @if($size === $log->hook_size)
                                <option selected>{{$size}}</option>
                            @else
                                <option>{{$size}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                @error('fly')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
                @error('fly_category')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
                @error('hook_size')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="flex-col w-full mb-6">

                <label class="font-semibold text-sm mb-1">LOCATION</label>

                <div class="flex w-full">

                    <input type="text" class="bg-newspaper border border-dashed p-1
                        font-semibold w-full text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" maxlength="100" name="location" value="{{$log->location}}" />

                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm" name="weather">
                        @foreach($options['weathers'] as $weather)
                            @if($weather === $log->weather)
                                <option selected>{{$weather}}</option>
                            @else
                                <option>{{$weather}}</option>
                            @endif
                        @endforeach
                    </select>
                    <select class="text-newspaper bg-neutral-700 px-2 font-semibold text-center text-xs md:text-sm" name="day_time">
                        @foreach($options['day_times'] as $time)
                            @if($time === $log->day_time)
                                <option selected>{{$time}}</option>
                            @else
                                <option>{{$time}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                @error('location')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
                @error('weatherj')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
                @error('day_time')
                    <span class="text-red-800 font-normal mt-1 text-sm">
                        {{$message}}
                    </span>
                @enderror
            </div>

            <div class="flex flex-row mb-4 ">

                <div class="flex-col w-full mr-10">

                    <label class="font-semibold text-sm mb-1">PRECISE TIME</label>

                    <div class="flex w-full text-center">

                        <input type="time" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm text-center
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" name="precise_time" value="{{$log->precise_time}}" />
                    </div>
                    @error('precise_time')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="flex-col w-full mr-10">

                    <label class="font-semibold text-sm mb-1">CLARITY</label>
                    <div class="flex w-full">

                        <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" maxlength="50" name="water_clarity" value="{{$log->water_clarity}}" />
                    </div>

                    @error('water_clarity')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="flex-col w-full">

                    <label class="font-semibold text-sm mb-1">MOVEMENT</label>
                    <div class="flex w-full">

                        <input type="text" class="bg-newspaper border border-dashed p-1
                            font-semibold w-full text-sm
                            border-neutral-700 outline-none text-blue-900
                            focus:border-solid" maxlength="50" name="water_movement" value="{{$log->water_movement}}" />
                    </div>

                    @error('water_movement')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
                </div>
            </div>



            <div class="flex flex-col mb-4 ">

                <label class="font-semibold text-sm mb-1">NOTE</label>

                <textarea class="bg-newspaper border border-dashed p-1 text-sm
                        border-neutral-700 outline-none text-blue-900
                        focus:border-solid" maxlength="500" rows="5"name="note">{{$log->note}}</textarea>

                    @error('note')
                        <span class="text-red-800 font-normal mt-1 text-sm">
                            {{$message}}
                        </span>
                    @enderror
            </div>

            <div class="flex w-full justify-end">

                <button class="bg-neutral-700 text-newspaper font-semibold
                px-6 py-1">SAVE</button>
            </div>
        </form>
    </div>

</x-layout>
