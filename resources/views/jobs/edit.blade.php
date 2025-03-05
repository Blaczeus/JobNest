<x-layout>
  <x-slot:heading>Edit Job: {{ $job->title }}</x-slot:heading>

  <form method="POST" action="{{ url('/jobs/' . $job->id) }}">
    @csrf
    @method('PATCH')
    
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="title">Job Title</x-form-label>
            <div class="mt-2">
                <x-form-input name="title" value="{{ old('title', $job->title) }}" placeholder="Full Stack Engineer" />
                <x-form-error name="title" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="salary">Salary</x-form-label>
            <div class="mt-2">
                <x-form-input name="salary" value="{{ old('salary', $job->salary) }}" placeholder="50,000" />
                <x-form-error name="salary" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="location">Location</x-form-label>
            <div class="mt-2">
                <x-form-input name="location" value="{{ old('location', $job->location) }}" placeholder="Seattle" />
                <x-form-error name="location" />
            </div>
          </x-form-field>

          <x-form-field>
            <x-form-label for="company">Company</x-form-label>
            <div class="mt-2">
                <x-form-input name="company" value="{{ old('company', $job->company) }}" placeholder="Leon Holdings Plc" />
                <x-form-error name="company" />
            </div>
          </x-form-field>
        </div>
      </div>
    </div>

    <!-- Buttons -->
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="{{ url('/jobs/' . $job->id) }}" class="text-sm font-semibold text-gray-900">Cancel</a>
      <x-form-button>Update</x-form-button>
    </div>
  </form>

</x-layout>
