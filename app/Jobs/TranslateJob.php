<?php

namespace App\Jobs;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class TranslateJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public Job $jobListing)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $recipient = $this->jobListing->employer->user->email;

        if ($recipient) {
            Mail::to($recipient)->send(new JobPosted($this->jobListing));
        }
    }
}
