<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Image;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands = Brand::all()->sortBy('name');
        $products = Product::all()->sortBy('brand_id');
        return view('admin/products/index', ['brands' => $brands, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'details' => 'required',
            'priceRange' => 'required',
            'brand_id' => 'required',
        ]);

        $input = $request->all();

        Product::create($input);

        return redirect('/admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productImage = ProductImage::where('product_id', $id)->first();
        $images = Image::all();


        return view('admin/products/show', ['product' => $product, 'productImage' => $productImage, 'images' => $images]);
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $brands = Brand::all()->sortBy('name');

        return view('admin/products/edit', ['product' => $product, 'brands' => $brands]);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $product->update($request->all());

        return redirect()->route('showProduct', $id);
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/admin/products');
    }
}
