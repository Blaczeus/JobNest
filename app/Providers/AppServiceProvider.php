<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        // Paginator::useBootstrapFive();

        // Gate::define('edit-job', function(User $user, Job $job) {
        //     return $job->employer->user->is($user);
        // }); 

        // Gate::define('delete-job', function(User $user, Job $job) {
        //     return $job->employer && $job->employer->user->is($user);
        // }); 
    }
}
