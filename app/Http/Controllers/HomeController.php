<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   //menangkap response dari request yang diterima
        return response(request()->authenticated);
    }

}
