<?php

namespace App\Providers;

use App\Views\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Menu website dengan method view share
        // View::share('menu', [
        //     'Home' => '/',
        //     'About' => '/about',
        //     'Contact' => '/contact',
        // ]);

        // Menu website dengan method composer hanya dapat diakses halaman index dan show
        // View::composer(['movies.index','movies.show'], function ($view){
        //     $view->with('menu', [
        //         'Home' => '/',
        //         'About' => '/about',
        //         'Contact' => '/contact',
        //     ]);
        // });

        // Menu website dengan method composer dapat diakses semua halaman
        // View::composer('*', function ($view){
        //     $view->with('menu', [
        //         'Home' => '/',
        //         'About' => '/about',
        //         'Contact' => '/contact',
        //     ]);
        // });

        // Menu website dengan method composer dapat diakses semua halaman
        // View::composer('*', function ($view){
        //     $menu = [
        //         'Home' => '/',
        //         'About' => '/about',
        //         'Contact' => '/contact',
        //     ];

        //     $authenticated = true; // untuk development

        //     // Logic untuk menambah menu jika user $authenticated bernilai true
        //     if ($authenticated){
        //         $menu = array_merge($menu, [
        //             'Logout' => '/logout',
        //             'Profile' => '/profile',
        //             'Dashboard' => '/dashboard',
        //         ]);
        //     }

        //     $view->with('menu',$menu);
        // });


       // Memisah Logic data view composer,diambil dari view dari app/Views/Composers/MenuComposer.php
        View::composer('*', MenuComposer::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        
    }
}
