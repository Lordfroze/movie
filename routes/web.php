<?php

use App\Http\Controllers\HomeController;
use App\Http\Middleware\CheckMembership;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('app');
});

Route::get('/test', function () {
    echo "HALO INI ADALAH TEST DARI SERVER";
});

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
    // dd($request);    menampilkan isi seluruh parameter request
    // return $request->host(); menampilkan host
    //return $request->nama; memanmpilkan request yang berisi parameter nama

    // Contoh mengolah data mengubah ke kapital
    // $filtered = $request->collect()->map(function ($value){
    //     return strtoupper($value);
    // });
    // return $filtered;

    // Contoh hanya mengambil data name dan age
    $filtered = $request->collect()->only(['name', 'age']);
    return $filtered;
});

// Route request untuk data input dan query params
Route::post('/request', function (Request $request){
    
    // method input untuk menangani form
    // $input = $request->input('colors.*'); 
    // return $input;

    // method input untuk menangani query
    // $query = $request->query(); 
    // return $query;

    // Method Khusus Untuk Data Tanggal
    // $date = $request->date('schedule', 'd-m-Y', 'Asia/Jakarta')
    // //menambah 3 hari
    // ->addDays(3);
    // return $date->diffForHumans();

    // Cek Data Dari Request kedua syarat harus terpenuhi seperti AND menggunakan (has)
    // if ($request->has(['email','password',])){
    //     return 'Login berhasil';
    // }

    // Cek Data Dari Request salah satu syarat harus terpenuhi seperti OR menggunakan (hasAny)
    // if ($request->hasAny(['email','password',])){
    //     return 'Login berhasil';
    // }

    // return 'Gagal';

    // Mencari Request Yg Hilang Dan Menambahkannya
    // $request->merge(['email' => 'email@mail.com']);

    // if($request->missing('email')){
    //     return 'Email tidak ada';
    // } else {
    //     return 'Datanya ada';
    // }
    // return 'Gagal';

    //Mengenal Response Dan Response Pada Header
    return response('OK', 201)->header('Content-Type', 'text/plain');
});

// Menambahkan Data Headers Untuk Cache
Route::get('/cache-control', function(){
    return Response::make('page allow to cache', 200)
    ->header('Cache-Control', 'public, max-age=86400');
});

// Menambahkan cache pada middleware
Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {

    // Halaman home yang diarahkan ke HomeContoller
    Route::get('/home',[HomeController::class, 'index'])->name('home');

    // Menambahkan cookie
    Route::get('/dashboard',function(){
        $user = 'admin';
        return response('login successfully', 200)->cookie('user', $user);
    });

    Route::get('/privacy', function () {
        return 'Privacy Page';
    });

    Route::get('/terms', function () {
        return 'Terms Page';
    });

    // Menghapus cookie dan redirect ke halaman home
    Route::get('/logout', function(){
        //return response('logout successfully', 200)->withoutCookie('user');
        // return redirect()->route('home')->withoutCookie('user');    
        return redirect()->action([HomeController::class, 'index'], ['authenticated' => false])->withoutCookie('user');
    });


});

// Redirect ke external
Route::get('/external', function (){
    return redirect('https://www.google.com');
});

// Membuka halaman home dari views
Route::get('/home', function(){
    // $name = '<h1>Laravel</h1>';
    // return view('home', compact('name')); // mengirim view dengan variabel name yang bisa diakses dimanapun

    // mengirim view dengan variabel $user
    // $user = [
    //     'name'  => 'Jhon doe',
    //     'email' => 'jdoe@mail.com',
    //     'role'  => 'admin'
    // ];
    // return view('home', compact('user')); 

    // Mengirim movie category untuk teknik switch
    // $movieCategory = 'drama';
    // return view('home',compact('movieCategory'));

    // Mengirim $movies berisikan array movies
    $movies = [ 
        ['title' => 'The Matrix', 'year' =>  1999],
        ['title' => 'Inception', 'year' =>  2010],
        ['title' => 'The Matrix', 'year' =>  2014],
        ['title' => 'Interstellar', 'year' =>  2008],
        ['title' => 'The Dark Knight', 'year' =>  2018],

    ];

    return view('home', compact('movies'));
});