<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // $config untuk dishare 
        $config = [
            'title' => 'Config Service Provider',
            'year'  => '2024',
            'author'=> 'Laravel Yoga',
            'theme' => 'dark',
        ];

        //mendaftarkan ke view
        View::share('config', $config);
    }
}