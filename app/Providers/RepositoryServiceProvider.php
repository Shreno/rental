<?php

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach($this->getModels() as $model){
            $this->app->bind(
                "App\Repositories\I{$model}Repository",
                "App\Repositories\Eloquent\\{$model}Repository");
        }

        $this->app->bind(
            "App\Repositories\IClientRepository",
            "App\Repositories\Eloquent\\ClientRepository");

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    public function getModels(){
        $files = Storage::disk('app')->files('Models');
        return collect($files)->map(function($file){
            return basename($file, '.php');
        });
    }
}