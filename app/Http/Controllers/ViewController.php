<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\BrandImage;
use App\Models\ProductImage;


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
        $brandImages = BrandImage::all();
        $productImages = ProductImage::all();

        return view('brands/index', ['brands' => $brands, 
                                     'products' => $products, 
                                     'brandImages' => $brandImages,
                                     'productImages' => $productImages]);    
    }
}
