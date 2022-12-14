<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\BrandImage;
use App\Models\Image;


class BrandController extends Controller
{
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
        return view('admin/brands/index', ['brands' => $brands]);
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
            'name' => 'required|unique:brands',
            'details' => 'required',
            'link' => 'required'
        ]);

        $input = $request->all();

        Brand::create($input);

        return redirect('/admin/brands');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tender  $tender
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        $brandImage = BrandImage::where('brand_id', $id)->first();
        $images = Image::all();

        return view('admin/brands/show', ['brand' => $brand, 'brandImage' => $brandImage, 'images' => $images]);
    }

    public function edit($id) {
        $brand = Brand::findOrFail($id);

        return view('admin/brands/edit', ['brand' => $brand]);
    }

    public function update(Request $request, $id) {
        $brand = Brand::findOrFail($id);

        $brand->update($request->all());

        return redirect()->route('showBrand', $id);
    }  

    public function delete($id) {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/admin/brand');
    }
}
