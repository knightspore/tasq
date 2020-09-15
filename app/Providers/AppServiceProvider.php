<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share('global', [
            'taskinfo' => Task::all(['id', 'site', 'name', 'user', 'editor']),
            'userinfo' => User::all(['id', 'name']),
            'projectinfo' => Project::all(['id', 'site', 'name']),
        ]);
    }
}
