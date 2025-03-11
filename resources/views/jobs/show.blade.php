<x-layout>
  <x-slot:heading>Job Details</x-slot:heading>

  <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
    <!-- Job Title -->
    <h2 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h2>

    <!-- Company Name -->
    <p class="text-lg text-gray-700 mt-3">
      <span class="font-semibold">Company:</span> {{ $job->company }}
    </p>

    <!-- Salary -->
    <p class="text-lg text-gray-700 mt-3">
      <span class="font-semibold">Salary:</span> {{ $job->salary }}
    </p>

    <!-- Location -->
    <p class="text-lg text-gray-700 mt-3">
      <span class="font-semibold">Location:</span> {{ $job->location }}
    </p>

    <!-- Posted Time -->
    <p class="text-sm text-gray-500 mt-3">Posted {{ $job->created_at->diffForHumans() }}</p>

    <!-- Buttons: Update & Delete -->
    <div class="mt-6 flex justify-between">
      @can('edit', $job)
        <div>
          <!-- Update Job Button -->
          <a href="{{ url('/jobs/' . $job->id . '/edit') }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
            Update Job
          </a>
        </div>
      @endcan

      @can('delete', $job)
        <div>
          <!-- Delete Job Button -->
          <form action="{{ url('/jobs/' . $job->id) }}" method="POST" 
                onsubmit="return confirm('Are you sure you want to delete this job?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm">
              Delete Job
            </button>
          </form>
        </div>
      @endcan
    </div>
  </div>
</x-layout>
