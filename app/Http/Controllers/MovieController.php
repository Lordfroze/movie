<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class MovieController extends Controller implements HasMiddleware // Implementasi midleware
{
    public $movies; // wadah movies
    
    
    public function __construct()
    {   // menyimpan hasil ke wadah movies
        for ($i = 0; $i < 10; $i++) {
            $this->movies[] = [
                'title' => 'movie controller' . $i,
                'year' => '2022',
                'genre' => 'Action',
            ];
        }
    }

    // method middleware semua fungsi harus melewati middleware ini
    public static function middleware()
    {
        return [
            'isAuth',
            new Middleware('isMember', only: ['show']),   // menerapkan hanya pada method show
            // new Middleware('isMember', except: ['show']), // menerapkan semua method kecuali show
        ];
    }

    // method bernama index untuk menampilkan data
    public function index()
    {
        return $this->movies;
    }

    // method bernama show untuk menampilkan data berdasar id
    public function show($id)
    {
        return $this->movies[$id];
    }

    // method bernama store untuk menambah data
    public function store()
    {
        $this->movies[] = [
            'title' => request('title'),
            'year' => request('year'),
            'genre' => request('genre'),
        ];

        //menampilkan data berbentuk html
        echo '<h1>Movies</h1>';
        echo '<ul>';
        foreach ($this->movies as $movie) {
            echo '<li>' . $movie['title'] . '-' . $movie['year'] . '-' . $movie['genre'] . '</li>';
        }

        echo '</ul>';
    }

    // method update untuk mengupdate data, Dependency Injection
    public function update(Request $request, $id)
    {
    //     $this->movies[$id]['title'] = request('title');
    //     $this->movies[$id]['year'] = request('year');
    //     $this->movies[$id]['genre'] = request('genre');

    //     return $this->movies;
    // }

    // // method destroy untuk menghapus data
    // public function destroy($id)
    // {
    //     unset($this->movies[$id]);
    //     return $this->movies;
    
    return $request->all();
    }

}