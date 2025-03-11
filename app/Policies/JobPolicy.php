<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    /**
     * Determine whether the user can update the model.
     */
    public function edit(User $user, Job $job): bool
    {
        return optional($job->employer)->user?->is($user) ?? false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Job $job): bool
    {
        return optional($job->employer)->user?->is($user) ?? false;
    }
}
