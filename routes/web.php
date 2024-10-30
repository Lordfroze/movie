<?php

use App\Http\Middleware\CheckMembership;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;

//array movies untuk keperluan dev 
$movies = [];

Route::group(
    [
        'prefix' => 'movie',
        'as' => 'movie.'
    ],
    function () use ($movies) {

        // Mengambil data index dari app/Http/Controllers/MovieController.php
        Route::get('/', [MovieController::class, 'index']);
        
        // Mengambil data id dari app/Http/Controllers/MovieController.php
        Route::get('/{id}',[MovieController::class, 'show']);

        // Menambah data dari app/Http/Controllers/MovieController.php
        Route::post('/',[MovieController::class, 'store']);

        // Mengupdate data dengan put dari app/Http/Controllers/MovieController.php
        Route::put('/{id}',[MovieController::class, 'update']);

        // Mengupdate data dengan patch dari app/Http/Controllers/MovieController.php
        Route::patch('/{id}',[MovieController::class, 'update']);

        // Menghapus data dengan delete dari app/Http/Controllers/MovieController.php
        Route::delete('/{id}',[MovieController::class, 'destroy']);
    }
);

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/test', function () {
    echo "HALO INI ADALAH TEST DARI VM UBUNTU";
});

// Route pricing
Route::get('/pricing', function () {
    return "Please,buy a membership!";
});

// Route login dengan alias login
Route::get('/login', function () {
    return 'Login Page';
})->name('login');

// Route request untuk melihat semua isi request
Route::get('/request', function(Request $request){
    dd($request);
});
