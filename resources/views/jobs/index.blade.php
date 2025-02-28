<x-layout>
  <x-slot:heading>Jobs</x-slot:heading>

  <h2 class="text-xl font-semibold mt-6">Available Jobs</h2>
  <ul class="mt-4 space-y-4">
      @foreach ($jobs as $job)
        <li class="bg-white shadow-md rounded-xl hover:bg-gray-200 transition duration-300">
            <a href="{{ url('/jobs', $job->id) }}" class="block p-3">
                <p class="text-sm text-sky-700 font-bold">{{ $job->employer->name }}</p>
                <h3 class="text-lg font-semibold text-gray-900">{{ $job->title }}</h3>
                <p class="text-sm font-bold text-gray-500 mt-1">{{ $job->salary }}</p>
            </a>
        </li>
        @endforeach
  </ul>

  <!-- Pagination -->
  <div class="mt-8">
      {{ $jobs->links() }}
  </div>
</x-layout>
