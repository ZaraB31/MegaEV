<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;

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
        $products = Product::all()->sortBy('name');

        return view('brands/index', ['brands' => $brands, 'products' => $products]);    
    }
}
