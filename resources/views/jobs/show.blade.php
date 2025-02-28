<x-layout>
  <x-slot:heading>Job</x-slot:heading>

  <h2 class="text-xl font-semibold mt-6">{{ $job['title'] }}</h2>

  <p class="text-gray-600 mb-4">{{ $job['salary'] }}</p>
</x-layout>
