<x-layout>
  <x-slot:heading>Create Job</x-slot:heading>

  <h2 class="text-xl font-semibold text-gray-900">We just need some details from you to create a new job.</h2>

  <form method="POST" action="/jobs">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 mb-2 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="title" id="title" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ old('title') }}" required placeholder="Full Stack Engineer" >
              </div>
              @error('title')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 mb-2 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"   >
                <input type="text" name="salary" id="salary" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ old('salary') }}" required placeholder="$50,000" >
              </div>
               @error('salary')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>

            <div class="sm:col-span-4">
            <label for="location" class="block text-sm/6 font-medium text-gray-900">Location</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 mb-2 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"   >
                <input type="text" name="location" id="location" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ old('location') }}" required placeholder="Seattle" >
              </div>
               @error('location')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="company" class="block text-sm/6 font-medium text-gray-900">Company</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 mb-2 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600"   >
                <input type="text" name="company" id="company" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="{{ old('company') }}" required placeholder="Leon Holdings Plc" >
              </div>
              @error('title')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
      <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
</form>

</x-layout>
