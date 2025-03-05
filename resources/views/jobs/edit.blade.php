<x-layout>
  <x-slot:heading>Edit Job: {{ $job->title }}</x-slot:heading>

  <form method="POST" action="{{ url('/jobs/' . $job->id) }}">
    @csrf
    @method('PATCH')
    
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <div class="sm:col-span-4">
            <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 mb-2 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="title" id="title" class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" value="{{ old('title', $job->title) }}" required placeholder="Full Stack Engineer">
              </div>
              @error('title')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="salary" class="block text-sm font-medium text-gray-900">Salary</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 mb-2 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="salary" id="salary" class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" value="{{ old('salary', $job->salary) }}" required placeholder="50,000">
              </div>
              @error('salary')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="location" class="block text-sm font-medium text-gray-900">Location</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 mb-2 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="location" id="location" class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" value="{{ old('location', $job->location) }}" required placeholder="Seattle">
              </div>
              @error('location')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="company" class="block text-sm font-medium text-gray-900">Company</label>
            <div class="mt-2">
              <div class="flex items-center rounded-md bg-white pl-3 mb-2 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="company" id="company" class="block w-full py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm" value="{{ old('company', $job->company) }}" required placeholder="Leon Holdings Plc">
              </div>
              @error('company')
                <div class="text-red-500 text-sm">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Buttons -->
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="{{ url('/jobs/' . $job->id) }}" class="text-sm font-semibold text-gray-900">Cancel</a>
      <button type="submit"
              class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none">
        Update
      </button>
    </div>
  </form>

</x-layout>
