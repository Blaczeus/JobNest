<x-layout>
  <x-slot:heading>Create Job</x-slot:heading>

  <h2 class="text-xl font-semibold text-gray-900">We just need some details from you to create a new job.</h2>

  <form method="POST" action="/jobs">
    @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
            <x-form-label for="title">Job Title</x-form-label>
            <div class="mt-2">
              <x-form-input name="title" placeholder="Full Stack Engineer" />
              <x-form-error name="title" />
            </div>
          </x-form-field>
          <x-form-field>
              <x-form-label for="salary">Salary</x-form-label>
              <div class="mt-2">
                  <x-form-input name="salary" placeholder="50,000" />
                  <x-form-error name="salary" />
              </div>
          </x-form-field>
          <x-form-field>
              <x-form-label for="location">Location</x-form-label>
              <div class="mt-2">
                  <x-form-input name="location" placeholder="Seattle" />
                  <x-form-error name="location" />
              </div>
          </x-form-field>
          <x-form-field>
              <x-form-label for="company">Company</x-form-label>
              <div class="mt-2">
                  <x-form-input name="company" placeholder="Leon Holdings Plc" />
                  <x-form-error name="company" />
              </div>
          </x-form-field>
        </div>
      </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="{{ url('/jobs/') }}" class="text-sm font-semibold text-gray-900">Cancel</a>
      <x-form-button>Save</x-form-button>
    </div>
</form>

</x-layout>
