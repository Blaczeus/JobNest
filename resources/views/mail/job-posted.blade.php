<x-mail::message>
    # Job Posted

    {{ $job->title }}

    Congrats! Your job is now live on our website.

    <x-mail::button :url="url('/jobs/' . $job->id)" color="green">
        View Your Job Listing
    </x-mail::button>

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
