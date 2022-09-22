<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductImage;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            'product_id' => 'required|unique:product_id',
            'image_id' => 'required',
        ]);

        $product = $request['product_id'];

        $input = $request->all();

        ProductImage::create($input);

        return redirect()->route('showProduct', [$product]);
    }

    public function update(Request $request, $id) {
        $productImage = ProductImage::findOrFail($id);
        $id = $productImage['product_id'];
        $productImage->update($request->all());
        return redirect()->route('showProduct', $id);
    }
}
