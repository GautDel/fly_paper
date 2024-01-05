


<x-layout>
@push('scripts')
    <script src="/test.js"></script>
@endpush


<form action="/test2" method="POST" class="w-64 mx-auto" x-data="contactForm()" @submit.prevent="submitData">
    <div class="mb-4">
      <label class="block mb-2">Name:</label>
      <input type="text" name="name" class="border w-full p-1" x-model="formData.name">
    </div>

    <div class="mb-4">
      <label class="block mb-2">E-mail:</label>
      <input type="email" name="email" class="border w-full p-1" x-model="formData.email">
    </div>

    <div class="mb-4">
      <label class="block mb-2">Message:</label>
      <textarea name="message" class="border w-full p-1" x-model="formData.message"></textarea>
    </div>
    <button class="bg-gray-700 hover:bg-gray-800 text-white w-full p-2">Submit</button>
<p x-text="message"></p>
    @if(isset($data))
    {{$data}}
    @endif
</form>



</x-layout>
