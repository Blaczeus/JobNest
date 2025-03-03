<x-layout>
  <x-slot:heading>Job Details</x-slot:heading>

  <div class="mx-auto">
    <!-- Job Title -->
    <h2 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h2>

    <!-- Company Name -->
    <p class="text-lg text-gray-700 mt-2">Company: <span class="font-semibold">{{ $job->company }}</span></p>

    <!-- Salary -->
    <p class="text-lg text-gray-700 mt-2">Salary: <span class="font-semibold">{{ $job->salary }}</span></p>

    <!-- Location -->
    <p class="text-lg text-gray-700 mt-2">Location: <span class="font-semibold">{{ $job->location }}</span></p>

    <!-- Posted Time -->
    <p class="text-sm text-gray-500 mt-2">Posted {{ $job->created_at->diffForHumans() }}</p>

    <!-- Update Job Button -->
    <div class="mt-6">
      <a href="{{ url('/jobs/' . $job->id . '/edit') }}" 
         class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm">
        Update Job
      </a>
    </div>
  </div>
</x-layout>
