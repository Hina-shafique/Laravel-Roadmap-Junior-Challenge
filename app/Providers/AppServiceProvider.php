<?php

namespace App\Providers;

use App\Services\TaskActivityServices;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\Actions\LogShow;
use TaskActivity;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->when('App\Http\Controllers\S3MediaController')
            ->needs('Filesystem')
            ->give(function () {
                return Storage::disk('s3');
            });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
