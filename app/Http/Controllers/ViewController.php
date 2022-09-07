<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\BrandImage;
use App\Models\ProductImage;
use App\Models\Study;
use App\Models\StudyImage;


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

    public function caseStudyIndex()
    {
        $studies = Study::all();
        $featuredImages = StudyImage::where('featured', 1)->get();
        return view('caseStudies/index', ['studies' => $studies,
                                          'featuredImages' => $featuredImages]);
    }
}
