<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FileManager;

class FilesServiceProvider extends ServiceProvider
{

    protected $defer = true;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(FileManager::class, function ($app) {
            return new FileManager();
        });
    }


    public function provides(){
        return [FileManager::class];
    }
}
