<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class ViewController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        return view('home');
    }
    public function brandsIndex() 
    {
        $brands = Brand::all()->sortBy('name');

        return view('brands/index', ['brands' => $brands]);    
    }
}
