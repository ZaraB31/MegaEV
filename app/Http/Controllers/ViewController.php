<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\BrandImage;
use App\Models\ProductImage;
use App\Models\Study;
use App\Models\StudyImage;
use App\Models\Article;
use App\Models\ArticleImage;
use App\Models\ArticleTag;


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

    public function caseStudyShow($id)
    {
        $study = Study::findOrFail($id);
        $galleryImages = StudyImage::where('study_id', $id)->get();
        return view('caseStudies/show', ['study' => $study, 'galleryImages' => $galleryImages]);
    }

    public function articleIndex() {
        $articles = Article::all()->sortBy('updated_at');
        $articleImages = ArticleImage::all();
        $articleTags = ArticleTag::all();

        return view('articles/index', ['articles' => $articles,
                                       'articleImages' => $articleImages,
                                       'articleTags' => $articleTags]);
    }
}
