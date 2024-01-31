<x-layout>

@foreach($categories as $category)
    <p>{{$category->name}}</p>
    <p>{{$category->id}}</p>
@endforeach
</x-layout>
