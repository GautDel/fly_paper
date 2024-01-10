<div x-data="{ count: 0 }"
    x-init="count = $refs.countme.value.length"

    class=" w-full flex flex-col py-2">
    {{$slot}}
    <div class="text-sm mt-1">
        <span x-html="count"></span> / <span x-html="$refs.countme.maxLength"></span>
    </div>
</div>
