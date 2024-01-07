<script>
    function contactForm() {
      return {
        data: {},

		async submitData() {
			this.message = ''

			res = await fetch('/test2', {
				method: 'GET',
            })
            resJSON = await res.json()
            this.data = resJSON
		}
      }
    }
</script>


<x-layout>



<form action="/test2" method="POST" class="w-64 mx-auto" x-data="contactForm()" @submit.prevent="submitData">
    <button class="bg-gray-700 hover:bg-gray-800 text-white w-full p-2">Submit</button>
<p x-text="data.data"></p>
    @if(isset($data))
    {{$data}}
    @endif
</form>



</x-layout>
