<?php

namespace CodePress\CodeTag\Providers;


use Illuminate\Support\ServiceProvider;

class CodeTagServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes(array(
            __DIR__ . '/../../resources/migrations' => base_path('database/migrations')
        ), 'migrations');
    }

    public function register()
    {
        // TODO: Implement register() method.
    }
}